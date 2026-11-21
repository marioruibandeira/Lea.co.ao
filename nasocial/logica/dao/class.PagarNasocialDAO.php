<?php
    
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.PagarNasocial.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UtilidadeDAO.php');
    
    class PagarNasocialDAO
    {
        public function InserirInserirPagamentoFlag(PagarNasocial $PagarNasocial)  
        {    
            $UtilidadeDAO = new UtilidadeDAO();
            
            $connection = new cnx();
            $connection->connect();

            $getComprador_id = $UtilidadeDAO->Decodificar($PagarNasocial->getComprador_id());
            $getVendedor_id = $UtilidadeDAO->Decodificar($PagarNasocial->getVendedor_id());
            $getPagamento_flag = $PagarNasocial->getPagamento_flag();
            $getTotal_pago = $PagarNasocial->getTotal_pago();
            $getEncomenda = $PagarNasocial->getCe_encomenda();
            
            $string = "INSERT INTO tblencomendado_pago (ce_comprador,ce_vendedor,pagamento_flag,total_pago,ce_encomenda) VALUES (?,?,?,?,?)";         
            $stmt = mysqli_prepare($connection->myconn, $string);        
            $stmt->bind_param("iiidi", $getComprador_id,$getVendedor_id,$getPagamento_flag,$getTotal_pago,$getEncomenda);
            $stmt->execute(); 
  
            return true;
            $connection->close($connection->myconn);
        }
        
        function ReferenciaEncomenda(PagarNasocial $PagarNasocial)
        {
            $connection = new cnx();
            $connection->connect();
        
            $ce_encomenda = (int) $PagarNasocial->getCe_encomenda();
        
            $query = "SELECT referencia FROM tblencomendado_header WHERE encomendado_header_id = ? LIMIT 1";
        
            $stmt = $connection->myconn->prepare($query);
            $stmt->bind_param("i", $ce_encomenda);
            $stmt->execute();
        
            $result = $stmt->get_result();
        
            if ($row = $result->fetch_object()) {
                $connection->close($connection->myconn);
                return $row->referencia;
            }
        
            $connection->close($connection->myconn);
            return 0;
        }
        
        function CabecalhoDaEncomenda(PagarNasocial $PagarNasocial)
        {
            $connection = new cnx();
            $connection->connect();
        
            $ce_encomenda = (int) $PagarNasocial->getCe_encomenda();
        
            $query = "SELECT DATE_FORMAT(date_header, '%d/%m/%Y') as date_header, referencia, date_header, total_encomendado, encomendado_header_id   FROM tblencomendado_header WHERE encomendado_header_id = ? LIMIT 1";
        
            $stmt = $connection->myconn->prepare($query);
            $stmt->bind_param("i", $ce_encomenda);
            $stmt->execute();
        
            $result = $stmt->get_result();
        
            if ($row = $result->fetch_object()) 
            {
                ?>
                <b> REF : <?php print $row->referencia; ?> | Data : <?php print $row->date_header; ?> | Total : <?php print $row->total_encomendado; ?></b> 
                <?php
            }
            $connection->close($connection->myconn);

        }
        
        function ResumoEncomenda(PagarNasocial $PagarNasocial)
        {
            setlocale(LC_MONETARY, 'en_US');
            $connection = new cnx();
            $connection->connect();
            $ce_encomenda = $PagarNasocial->getCe_encomenda();
                 
            $query = "SELECT eu.encomendado_usuarios_id AS Primaria, eh.referencia, DATE_FORMAT(eh.date_header, '%d/%m/%Y') AS data, eu.produto_servico_id AS ProdutoServico, eu.ce_vendedor AS Vendedor, SUM(eu.qtd) AS Quantidade, eu.data_encomenda, eu.ce_usuario, eu.preco, SUM(eu.qtd) * eu.preco AS Total_Ao, eu.total_encomenda, eu.ce_categoria, eu.encomendado_header_id FROM tblencomendado_usuarios eu INNER JOIN tblencomendado_header eh ON eh.encomendado_header_id = eu.encomendado_header_id WHERE eu.encomendado_header_id = ? LIMIT 1" ;
            $stmt = $connection->myconn->prepare($query);
            $stmt->bind_param("i", $ce_encomenda);
            $stmt->execute();
        
            $result = $stmt->get_result();
            
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_object($result))
                {
                    ?>
                        <li class="list-group-item"><span class="badge"><?php print $row->data; ?></span> <b>Data:</b></li>
                        <li class="list-group-item"><span class="badge"><?php print $row->Quantidade; ?></span> <b>Quantidade:</b></li>
                        <li class="list-group-item"><span class="badge"><?php print money_format('%!i', $row->Total_Ao); ?></span> <b>Total em AO:</b></li>
                        <li class="list-group-item"><span class="badge">Reservado</span> <b>Estado:</b></li>
                    <?php
                }
            }else{
                $connection->close($connection->myconn);
                return 0;
            }
        }
        
        function DetalhesDaEncomenda(PagarNasocial $PagarNasocial)
        {
            setlocale(LC_MONETARY, 'en_US');
            $connection = new cnx();
            $connection->connect();
            $ce_encomenda = $PagarNasocial->getCe_encomenda();
                 
            $query = "SELECT eu.produto_servico_id AS ProdutoServico, CASE WHEN d.d_ID = eu.produto_servico_id AND eu.ce_categoria = 3 THEN d.d_nome WHEN a.id = eu.produto_servico_id AND eu.ce_categoria = 4 THEN a.evento WHEN m.idmusicapromo = eu.produto_servico_id AND eu.ce_categoria = 1 THEN m.titulo WHEN l.id_livro = eu.produto_servico_id AND eu.ce_categoria = 2 THEN l.titulo ELSE NULL END AS produto, cs.cagegoria_servicos, eu.qtd AS Quantidade, eu.preco, eu.total_encomenda, eu.ce_categoria, eu.encomendado_header_id FROM tblencomendado_usuarios eu INNER JOIN tblencomendado_header eh ON eh.encomendado_header_id = eu.encomendado_header_id JOIN categoria_servico cs ON cs.id = eu.ce_categoria LEFT JOIN discos d ON d.d_ID = eu.produto_servico_id LEFT JOIN agenda a ON a.id = eu.produto_servico_id LEFT JOIN musicapromocional m ON m.idmusicapromo = eu.produto_servico_id LEFT JOIN livro l ON l.id_livro = eu.produto_servico_id WHERE eu.encomendado_header_id = ?" ;
            $stmt = $connection->myconn->prepare($query);
            $stmt->bind_param("i", $ce_encomenda);
            $stmt->execute();
        
            $result = $stmt->get_result();
            
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_object($result))
                {
                    ?>
                        <li class="list-group-item"><span class="badge"><?php print $row->produto ."- (".$row->cagegoria_servicos.")"; ?></span> <b>Produto/Serviço:</b></li>
                        <li class="list-group-item"><span class="badge"><?php print $row->Quantidade; ?></span> <b>Quantidade:</b></li>
                        <li class="list-group-item" style="margin-bottom:5px;"><span class="badge"><?php print money_format('%!i', $row->preco); ?></span> <b>Preço:</b></li>
                    <?php
                }
            }else{
                $connection->close($connection->myconn);
                return 0;
            }
        }
        
        function EliminarEncomenda(PagarNasocial $PagarNasocial)
        {
            $connection = new cnx();
            $connection->connect();
            
            $ce_encomenda = $PagarNasocial->getCe_encomenda();
            
            $query1 = "DELETE FROM tblencomendado_usuarios WHERE encomendado_header_id = ?";
            $stmt1 = $connection->myconn->prepare($query1);
            $stmt1->bind_param("i", $ce_encomenda);
            $stmt1->execute();
        
            $query2 = "DELETE FROM tblencomendado_header WHERE encomendado_header_id = ?";
            $stmt2 = $connection->myconn->prepare($query2);
            $stmt2->bind_param("i", $ce_encomenda);
            $stmt2->execute();
        
            $connection->close($connection->myconn);
            return 1;
        }

        function PagamentoEfectuadoFlag(PagarNasocial $PagarNasocial)
        {
            $connection = new cnx();
            $connection->connect();
            $getEncomenda = $PagarNasocial->getCe_encomenda();
                 
            $query = "SELECT * FROM `tblencomendado_pago` WHERE `ce_encomenda` = $getEncomenda ORDER BY encomendado_pago_header_id DESC LIMIT 1" ;
            $result = mysqli_query($connection->myconn,$query);
            $connection->close($connection->myconn);
            $row = mysqli_fetch_object($result);
            $connection->close($connection->myconn);
            
            return array("pagamento_flag" => $row->pagamento_flag, "ce_encomenda" => $row->ce_encomenda);
        }
        
        function VerificarPagamentoEncomenda(PagarNasocial $PagarNasocial)
        {
            $connection = new cnx();
            $connection->connect();
            $getEncomenda = $PagarNasocial->getCe_encomenda();
                 
            $query = "SELECT * FROM `tblencomendado_pago` WHERE `ce_encomenda` = $getEncomenda" ;
            $result = mysqli_query($connection->myconn,$query);
            
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_object($result))
                {
                    $connection->close($connection->myconn);
                    return 1;
                }
            }else{
                $connection->close($connection->myconn);
                return 0;
            }
        }
        
        function VerificarPagamentoEncomendaComFlag(PagarNasocial $PagarNasocial)
        {
            $connection = new cnx();
            $connection->connect();
            $getEncomenda = $PagarNasocial->getCe_encomenda();
                 
            $query = "SELECT * FROM `tblencomendado_pago` WHERE `ce_encomenda` = $getEncomenda" ;
            $result = mysqli_query($connection->myconn,$query);
            
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_object($result))
                {
                    $connection->close($connection->myconn);
                    return $row->pagamento_flag;
                }
            }else{
                $connection->close($connection->myconn);
                return 0;
            }
        }
        
        function ChaveDaEncomendaPaga(PagarNasocial $PagarNasocial)
        {
            $connection = new cnx();
            $connection->connect();
            $getEncomenda = $PagarNasocial->getCe_encomenda();
                 
            $query = "SELECT * FROM `tblencomendado_pago` WHERE `ce_encomenda` = $getEncomenda" ;
            $result = mysqli_query($connection->myconn,$query);
            
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_object($result))
                {
                    $connection->close($connection->myconn);
                    return $row->encomendado_pago_header_id;
                }
            }else{
                $connection->close($connection->myconn);
                return 0;
            }
        }
        
        function ChaveDoVendedor(PagarNasocial $PagarNasocial)
        {
            $UtilidadeDAO = new UtilidadeDAO();
            
            $connection = new cnx();
            $connection->connect();

            $ce_encomenda = $PagarNasocial->getCe_encomenda();
            //
            $query = "SELECT encomendado_header_id, ce_vendedor FROM tblencomendado_header WHERE encomendado_header_id = $ce_encomenda";
            $result = mysqli_query($connection->myconn,$query);

            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_object($result))
                {
                    $connection->close($connection->myconn);
                    return $UtilidadeDAO->Codificar($row->ce_vendedor);
                }
            }else{
                $connection->close($connection->myconn);
                return 0;
            }
            
        }
        
        function ChaveDoComprador(PagarNasocial $PagarNasocial)
        {
            $UtilidadeDAO = new UtilidadeDAO();
            
            $connection = new cnx();
            $connection->connect();

            $ce_encomenda = $PagarNasocial->getCe_encomenda();
            //
            $query = "SELECT encomendado_header_id, ce_comprador FROM tblencomendado_header WHERE encomendado_header_id = $ce_encomenda";
            $result = mysqli_query($connection->myconn,$query);

            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_object($result))
                {
                    $connection->close($connection->myconn);
                    return $UtilidadeDAO->Codificar($row->ce_comprador);
                }
            }else{
                $connection->close($connection->myconn);
                return 0;
            }
            
        }
        
        function TotalEncomendadoPago(PagarNasocial $PagarNasocial)
        {
            $UtilidadeDAO = new UtilidadeDAO();
            
            $connection = new cnx();
            $connection->connect();

            $ce_encomenda = $PagarNasocial->getCe_encomenda();
            //
            $query = "SELECT encomendado_header_id, total_encomendado FROM tblencomendado_header WHERE encomendado_header_id = $ce_encomenda";
            $result = mysqli_query($connection->myconn,$query);

            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_object($result))
                {
                    $connection->close($connection->myconn);
                    return $UtilidadeDAO->Codificar($row->total_encomendado);
                }
            }else{
                $connection->close($connection->myconn);
                return 0;
            }
            
        }
        
        function TotalEncomendadoNasocial(PagarNasocial $PagarNasocial)
        {
            $connection = new cnx();
            $connection->connect();
            //
            $ce_encomenda = $PagarNasocial->getCe_encomenda();
            //
            $query = "SELECT encomendado_header_id, SUM(total_encomenda) as total_encomenda FROM tblencomendado_usuarios WHERE encomendado_header_id = $ce_encomenda";
            $result = mysqli_query($connection->myconn,$query);
            $connection->close($connection->myconn);
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_object($result)){
                    return $row->total_encomenda;
                }
            }else{
                return 0;
            }
            
        }
        
        function UtilizadorRelacionadoNaCompra($user_id_, $entidade)
        {
            $connection = new cnx();
            $connection->connect();
            $user_id = base64_decode($user_id_);
            //
            $query = "SELECT * FROM vw_perfil_utilizador WHERE user_id = $user_id LIMIT 1";
            $result = mysqli_query($connection->myconn,$query);
            $connection->close($connection->myconn);
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_object($result))
                {
                    ?>
                        <h4 class="blue smaller" style="margin-left:10px;"> 
                            <span style="color:#000;">
                                <?php if($entidade == 1) { ?> Comprador :<?php } else { ?> Vendedor :<?php } ?>
                            </span>
                            <?php print $texto = ucfirst($row->username); ?> 
                        </h4>
                        
                        <div class="search-filter-element"  style="padding:2px;border-radius:5px;"> 
                            <img class="media-object" src="<?php print $row->fotoPerfil; ?>" style="width:100%; border-radius:5px;" /> 
                        </div>
    				    
    				    <div class="hr hr-dotted hr-10"></div>
    				    
        				<dl id="dt-list-1">
        				    <dt><?php if($entidade == 1) { ?> Comprador :<?php } else { ?> Vendedor :<?php } ?></dt>
                            <dd><?php print $row->first_name . " " . $row->last_name; ?></dd>
                            <dt>Banco</dt>
                            <dd>Standard Bank</dd>
                            <dt>Conta</dt>
                            <dd>39487510324</dd>
                            <dt>IBAN</dt>
                            <dd>AO06 9876897 8689 86886</dd>
                            <dt>Telefone</dt>
                            <dd><?php print "(+244)" . $row->telefone; ?> </dd>
                            <dt>E-mail</dt>
                            <dd><?php print $row->email; ?></dd>
                            <dt>Localidade</dt>
                            <dd><?php print $row->provincia; ?></dd>
        				</dl>
    				    
    				    <div class="space-4"></div>
                    <?php
                }
            }else{
                return 0;
            }
            
        }
        
        function ActualizarVoltarPagarFlag(PagarNasocial $PagarNasocial)
        {
            $connection = new cnx();
            $connection->connect();
            
            $pagamento_flag = $PagarNasocial->getPagamento_flag();
            $total_pago = $PagarNasocial->getTotal_pago();
            $ce_encomenda = $PagarNasocial->getCe_encomenda();
            
            $query = "UPDATE tblencomendado_pago set pagamento_flag = $pagamento_flag, total_pago = $total_pago WHERE ce_encomenda =  $ce_encomenda ";  
            mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));

            $connection->close($connection->myconn);
            return array("pagamento_flag" => $pagamento_flag, "ce_encomenda" => $ce_encomenda);
        }
        
        public function InserirConfirmacaoPagamento(PagarNasocial $PagarNasocial)  
        {    
            $UtilidadeDAO = new UtilidadeDAO();
            
            $connection = new cnx();
            $connection->connect();

            $encomendado_pago_header_id = $PagarNasocial->getEncomendado_pago_header_id();
            //$getVendedor_id = $UtilidadeDAO->Decodificar($PagarNasocial->getVendedor_id());
            $getComprador_id = base64_decode($PagarNasocial->getComprador_id());
            $getVendedor_id = base64_decode($PagarNasocial->getVendedor_id());
            $getTotal_pago = $PagarNasocial->getTotal_pago($total_pago);;
            $getFlag_entrega = $PagarNasocial->getFlag_entrega();
            
            $string = "INSERT INTO tblpagamentos_recebidos (encomendado_pago_header_id,ce_comprador,ce_vendedor,total_pago,flag_entrega) VALUES (?,?,?,?,?)";         
            $stmt = mysqli_prepare($connection->myconn, $string);        
            $stmt->bind_param("iiidi", $encomendado_pago_header_id,$getComprador_id,$getVendedor_id,$getTotal_pago,$getFlag_entrega);
            $stmt->execute(); 
  
            return true;
            $connection->close($connection->myconn);
        }
        
        function VerificarPagamentoComFlag(PagarNasocial $PagarNasocial)
        {
            $connection = new cnx();
            $connection->connect();
            $getChave_pagamento = $PagarNasocial->getChave_pagamento();
                 
            $query = "SELECT * FROM `tblpagamentos_recebidos` WHERE `encomendado_pago_header_id` = $getChave_pagamento" ;
            $result = mysqli_query($connection->myconn,$query);
            
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_object($result))
                {
                    $connection->close($connection->myconn);
                    return $row->flag_entrega;
                }
            }else{
                $connection->close($connection->myconn);
                return 0;
            }
        }
        
    }
?>