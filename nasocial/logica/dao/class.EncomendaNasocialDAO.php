<?php
    //
    include_once($_SERVER['DOCUMENT_ROOT'].'/conexao/cnx.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.AgendaEvento.php');
    //
    class EncomendaNasocialDAO
    {
        public function inserirEncomendaNasocial(AgendaEvento $AgendaEvento)  
        {    
            $connection = new cnx();
            $connection->connect();
             
            $produto_servico_id = base64_decode($AgendaEvento->getId_agenda_evento());
            $ce_vendedor = base64_decode($AgendaEvento->getCe_vendedor());
            $quantidade = $AgendaEvento->getQuantidade();
            $ce_usuario = base64_decode($AgendaEvento->getFK_usuario());
            $preco = $AgendaEvento->getPreco_agenda();
            $total_encomenda = $quantidade * $preco;
            $ce_categoria = $AgendaEvento->getCategoria();
            $estato = 0;
            $referencia = date("dm/Y") . "/" . date("His");
            
            $string = "INSERT INTO tblencomendado_header (referencia,ce_vendedor,ce_comprador,estato) VALUES (?,?,?,?)";         
            $stmt = mysqli_prepare($connection->myconn, $string);        
            $stmt->bind_param("siii", $referencia,$ce_vendedor,$ce_usuario,$estato);
            $stmt->execute(); 
            $ce_encomenda = mysqli_insert_id($connection->myconn);
            
            $string2 = "INSERT INTO tblencomendado_usuarios (produto_servico_id,ce_vendedor,qtd,ce_usuario,preco,total_encomenda,ce_categoria,encomendado_header_id) VALUES (?,?,?,?,?,?,?,?)";
            $stmt2 = mysqli_prepare($connection->myconn, $string2);
            $stmt2->bind_param("iiiiddii", $produto_servico_id,$ce_vendedor,$quantidade,$ce_usuario,$preco,$total_encomenda,$ce_categoria,$ce_encomenda);
            $inserir_msgm = $stmt2->execute();
            
            $total = $this->ActualizarEncomendaHeader($ce_encomenda);

            $sqlUpdate = "UPDATE tblencomendado_header SET total_encomendado = ? WHERE encomendado_header_id = ?";
        
            $stmtt = mysqli_prepare($connection->myconn, $sqlUpdate);
            $stmtt->bind_param("di", $total, $ce_encomenda);
            $stmtt->execute();

            $connection->close($connection->myconn);
    
            return true;
        }
        //
        function ActualizarEncomendaHeader($encomenda)
        {
            $connection = new cnx();
            $connection->connect();
        
            $string = "SELECT SUM(total_encomenda) AS total_encomenda FROM tblencomendado_usuarios WHERE encomendado_header_id = ?";
        
            $stmt = $connection->myconn->prepare($string);
            $stmt->bind_param("i", $encomenda);
            $stmt->execute();
        
            $result = $stmt->get_result();
            $row = $result->fetch_object();
        
            $connection->close($connection->myconn);
        
            return $row->total_encomenda ?? 0;
        }

        function ConfirmarExistenciaDeEncomendasNoCarrinhoNassocial($utilizador_, $us){
            $connection = new cnx();
            $connection->connect();
            $utilizador = base64_decode($utilizador_);
            $ce_vendedor = base64_decode($us);
            
            $query = "SELECT COUNT(ce_comprador) as ce_comprador FROM `tblencomendado_header` WHERE ce_comprador = '$utilizador' AND ce_vendedor = $ce_vendedor  ";
            $result = mysqli_query($connection->myconn,$query);
            //if records present
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    return $row->ce_comprador; 
                }
            }else{
                return 0;
            }
        }
        //
        function EncomendasParaAnexarNassocial($ce_usuario_)
        {
            $connection = new cnx();
            $connection->connect();
            $ce_usuario = base64_decode($ce_usuario_);
            $query = "SELECT e.encomendado_header_id, e.referencia, e.encomendado_header_id FROM tblencomendado_header e WHERE e.ce_comprador = $ce_usuario  AND estato = 0 GROUP BY referencia";
            
            $result = mysqli_query($connection->myconn,$query);
            //if records present
            if(mysqli_num_rows($result) > 0)
            { 
                while($row = mysqli_fetch_object($result))
                {
                    ?>
                        <option value="<?php print $row->encomendado_header_id; ?>"><?php print $row->referencia; ?></option>
                    <?php
                }
            } 
        }
        //
        function ActualizarEncomendaNassocial(AgendaEvento $encomenda)
        {
            $connection = new cnx();
            $connection->connect();
            
            $produto = base64_decode($encomenda->getId_agenda_evento());
            $vendedor = base64_decode($encomenda->getCe_vendedor());
            $quantidade = $encomenda->getQuantidade();
            $ce_usuario = base64_decode($encomenda->getFK_usuario());
            $preco = $encomenda->getPreco_agenda();
            $total_pagar = ($quantidade * $encomenda->getPreco_agenda());
            $categoria_servico = $encomenda->getCategoria();
            $ce_encomenda = $encomenda->getCeEncomenda();

            $sql = "INSERT INTO tblencomendado_usuarios  
                (produto_servico_id,ce_vendedor,qtd,ce_usuario,preco,total_encomenda,ce_categoria,encomendado_header_id) VALUES (?,?,?,?,?,?,?,?)";
        
            $stmt = $connection->myconn->prepare($sql);
            $stmt->bind_param("iiiiddii", $produto, $vendedor, $quantidade, $ce_usuario, $preco, $total_pagar, $categoria_servico, $ce_encomenda);
            $stmt->execute();
        
            $connection->close($connection->myconn);
            
            return [
                "success" => true,
                "qtd" => $quantidade,
                "total_encomenda" => $total_pagar,
                "ce_encomenda" => $ce_encomenda
            ];
        }

        //
        function EncomendaEfectuada($ce_vendedor, $id_)
        {
            $connection = new cnx();
            $connection->connect();
        
            $ce_vendedor_ = base64_decode($ce_vendedor);
            $id = base64_decode($id_);
        
            $query = "SELECT produto_servico_id, qtd, total_encomenda,encomendado_header_id 
                      FROM tblencomendado_usuarios 
                      WHERE ce_vendedor = ? AND produto_servico_id = ?";
        
            $stmt = $connection->myconn->prepare($query);
            $stmt->bind_param("ii", $ce_vendedor_, $id);
            $stmt->execute();
        
            $result = $stmt->get_result();
            $row = $result->fetch_object();
        
            $connection->close($connection->myconn);
        
            return [
                "success" => true,
                "qtd" => $row->qtd ?? 0,
                "total_encomenda" => $row->total_encomenda ?? 0,
                "chave_encomenda" => $row->encomendado_header_id
            ];
        }

        //
        function ImagemDoIngressosAvenda($utilizador,$id_,$cat){
            $connection = new cnx();
            $connection->connect();
            $utilizador_ = base64_decode($utilizador);
            $id = base64_decode($id_);
            
            $query = "SELECT  caminho  FROM vw_catalogo where ce_usuario = $utilizador_ and id_servico_produto = $id and categoria = $cat";
            $result = mysqli_query($connection->myconn,$query);
            //if records present
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    ?> <div class="thumbnail"> <img src="<?php print $row->caminho; ?>" alt="..."> </div> <?php
                }
            }
        }
        //
        function DetalhesDoProdutoServicoAvenda($utilizador,$id_,$cat)
        {
            $connection = new cnx();
            $connection->connect();
            $utilizador_ = base64_decode($utilizador);
            $id = base64_decode($id_);
            
            $query = "SELECT * FROM vw_catalogo where ce_usuario = $utilizador_ and id_servico_produto = $id and categoria = $cat";
            $result = mysqli_query($connection->myconn,$query);
            //if records present
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    ?> 
                        <li class="list-group-item" style="background:#ccc;border-radius:5px 5px 0px 0px !important;" > <b><?php print $row->evento; ?></b> </li>
                        <li class="list-group-item">
                            <span class="badge"><?php print $row->data; ?></span> Data
                        </li>
                        <li class="list-group-item">
                            <span class="badge"><?php print $row->preco; ?></span> Preço
                            <input type="hidden" id="preco_na_grid" value="<?php print $row->preco; ?>">
                        </li>
                        <li class="list-group-item">
                            <span class="badge"><?php print $row->qtd; ?></span> Qtd Disponível
                        </li>
                        <a href="https://www.lea.co.ao/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->ce_usuario);?>">
                            <li class="list-group-item" style="border-radius:0px 0px 5px 5px !important;"> <span class="badge"><?php print $row->username; ?></span> Vendedor </li>
                        </a>
                    <?php
                }
            }
        }
        //
        function EliminarEncomenda($encomenda)
        {
            $connection = new cnx();
            $connection->connect();
        
            $encomenda_ = (int)$encomenda;
        
            $query1 = "DELETE FROM tblencomendado_usuarios WHERE encomendado_header_id = ?";
            $stmt1 = $connection->myconn->prepare($query1);
            $stmt1->bind_param("i", $encomenda_);
            $stmt1->execute();
        
            $query2 = "DELETE FROM tblencomendado_header WHERE encomendado_header_id = ?";
            $stmt2 = $connection->myconn->prepare($query2);
            $stmt2->bind_param("i", $encomenda_);
            $stmt2->execute();
        
            $connection->close($connection->myconn);
        
            return [
                "success" => true,
                "ce_encomenda" => 0
            ];
        }

        //
        function ReferenciaEncomendada($encomenda)
        {
            $connection = new cnx();
            $connection->connect();
        
            $query = "SELECT referencia FROM tblencomendado_header WHERE encomendado_header_id = ?";
        
            $stmt = $connection->myconn->prepare($query);
            $stmt->bind_param("i", $encomenda);
            $stmt->execute();
        
            $result = $stmt->get_result();
            $row = $result->fetch_object();
        
            $connection->close($connection->myconn);
        
            return $row->referencia ?? "Referência Invalida";
        }
        //
        function QuantidadeEncomendada($encomenda)
        {
            $connection = new cnx();
            $connection->connect();
        
            $query = "SELECT SUM(qtd) AS qtd 
                      FROM tblencomendado_usuarios 
                      WHERE encomendado_header_id = ?";
        
            $stmt = $connection->myconn->prepare($query);
            $stmt->bind_param("i", $encomenda);
            $stmt->execute();
        
            $result = $stmt->get_result();
            $row = $result->fetch_object();
        
            $connection->close($connection->myconn);
        
            return $row->qtd ?? 0;
        }
        //
        function TotalApagarEncomenda($encomenda)
        {
            $connection = new cnx();
            $connection->connect();
        
            $query = "SELECT SUM(total_encomenda) AS total_encomenda 
                      FROM tblencomendado_usuarios 
                      WHERE encomendado_header_id = ?";
        
            $stmt = $connection->myconn->prepare($query);
            $stmt->bind_param("i", $encomenda);
            $stmt->execute();
        
            $result = $stmt->get_result();
            $row = $result->fetch_object();
        
            $connection->close($connection->myconn);
        
            return $row->total_encomenda ?? 0;
        }
        //
        function chaveDaEncomenda($ce_usuario,$id_,$vendedor)
        {
            $connection = new cnx();
            $connection->connect();
            $ce_usuario_ = base64_decode($ce_usuario);
            $vendedor_ = base64_decode($vendedor);
            $id = base64_decode($id_);
            
            $query = "SELECT eu.encomendado_header_id FROM `tblencomendado_usuarios` eu JOIN tblencomendado_header eh ON eh.encomendado_header_id = eu.encomendado_header_id WHERE eu.ce_usuario = $ce_usuario_ AND eu.produto_servico_id = $id AND eu.ce_vendedor = $vendedor_ AND eh.estato = 0";
            $result = mysqli_query($connection->myconn,$query);
            //if records present
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                   return $row->encomendado_header_id; 
                }
            }else{ return 0;}
        }
        //
         function PrecoEncomendaNasocial($utilizador,$id_,$cat)
        {
            $connection = new cnx();
            $connection->connect();
            $utilizador_ = base64_decode($utilizador);
            $id = base64_decode($id_);
            
            $query = "SELECT * FROM vw_catalogo where ce_usuario = $utilizador_ and id_servico_produto = $id and categoria = $cat";
            $result = mysqli_query($connection->myconn,$query);
            //if records present
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    return $row->preco; 
                }
            }
        }
        function EncomendaExistente($ce_usuario,$id_)
        {
            $connection = new cnx();
            $connection->connect();
            $ce_usuario_ = base64_decode($ce_usuario);
            $id = base64_decode($id_);
            
            $query = "SELECT COUNT(produto_servico_id) as qtd_evento FROM `tblencomendado_usuarios` WHERE `ce_usuario` = $ce_usuario_ and `produto_servico_id` = $id";
            $result = mysqli_query($connection->myconn,$query);
            //if records present
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                   return $row->qtd_evento; 
                }
            }else{ return 0;}
        }
        
        
    }
?>