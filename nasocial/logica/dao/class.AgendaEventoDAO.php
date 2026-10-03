<?php
/**
 * Este cript visa gerir todas as accoes da gestao da agenda no systema
 *
 * @author Mário Bandeira
 * Data de Criação : 23/12/2018
 * Última Actualização : 12/01/2019
 * @copyright (c) 2019, Lés Corporation
 * @version 0.2
 */
include_once($_SERVER['DOCUMENT_ROOT'].'/conexao/cnx.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.AgendaEvento.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/utilidades/class.Provincias.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/login/Login.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Telefone.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Usuario.php');

class AgendaEventoDAO {
    //
    public function insertEvento(AgendaEvento $agendaEvento)  
    {  
        $connection = new cnx();
        $connection->connect();
        
        $ce_usuario = base64_decode($agendaEvento->getFK_usuario());
        $produto_servico = $agendaEvento->getId_agenda_evento();
        $categoria = $agendaEvento->getCategoria();
        $preco = $agendaEvento->getPreco();
        $quantidade = $agendaEvento->getQuantidade();
        
        $string = "INSERT INTO tblagenda_evento (ce_usuario,ce_agenda,ce_categoria,preco,qtd) VALUES (?,?,?,?,?)"; 
        $stmt = mysqli_prepare($connection->myconn, $string);
        $stmt->bind_param("iiidi", $ce_usuario,$produto_servico,$categoria,$preco,$quantidade);
        $rsint = $stmt->execute();
        $agenda_evento_id = mysqli_insert_id($connection->myconn);
        
        $string_ = "INSERT INTO tbldetalhes_promocao_entrega (ce_servico_produto,ce_categoria) VALUES (?,?)"; 
        $stmt_ = mysqli_prepare($connection->myconn, $string_);
        $stmt_->bind_param("ii", $agenda_evento_id,$categoria);
        $stmt_->execute();
        
        if ($rsint) {
            $response = [ "success" => true, "ce_usuario" => $ce_usuario, "insert_id" => mysqli_insert_id($connection->myconn) ];
        } else {
            $response = [ "success" => false, "message" => "Erro ao inserir evento", "error" => mysqli_error($connection->myconn) ];
        }
    
        header('Content-Type: application/json');
        return json_encode($response);
    }
    //
    function AtualizarAgendaEvento(AgendaEvento $agendaEvento)
    {
        $connection = new cnx();
        $connection->connect();
    
        $ce_usuario = base64_decode($agendaEvento->getFK_usuario()); 
        $ce_agenda_estoque = $agendaEvento->getCe_agenda_estoque();
        
        $is_promocao = $agendaEvento->getIs_Promocao();
        $is_promocao = filter_var($is_promocao, FILTER_VALIDATE_BOOLEAN) ? 1 : 0;
        
        $data_inicio = (new DateTime())->format('Y-m-d');
        $data_fim = $agendaEvento->getPerido_promocional();
        $preco_promocional = $agendaEvento->getPreco_promocional();
        $preco = $agendaEvento->getPreco_agenda();
        $quantidade = $agendaEvento->getQuantidade();
        $estado_produto = $agendaEvento->getEstado_produto();
        
        $encontro_publico = $agendaEvento->getEncontro_publico();
        $encontro_publico = filter_var($encontro_publico, FILTER_VALIDATE_BOOLEAN) ? 1 : 0;
        
        $opcao_download = $agendaEvento->getOpcao_download();
        $opcao_download = filter_var($opcao_download, FILTER_VALIDATE_BOOLEAN) ? 1 : 0;
        
        $pegar_na_porta = $agendaEvento->getPegar_na_porta();
        $pegar_na_porta = filter_var($pegar_na_porta, FILTER_VALIDATE_BOOLEAN) ? 1 : 0;
        
        $entregar_na_porta = $agendaEvento->getEntregar_na_porta();
        $entregar_na_porta = filter_var($entregar_na_porta, FILTER_VALIDATE_BOOLEAN) ? 1 : 0;
        
        $descricao = $agendaEvento->getDescricao();
        $categoria = $agendaEvento->getCategoria();
        
        $string = "UPDATE tbldetalhes_promocao_entrega SET is_promocao = ?, data_inicio = ?, data_fim = ?, preco_promocional = ?, estado_produto_id = ?, opcao_download = ?, encontro_publico = ?,  pegar_na_porta = ?, entregar_na_porta = ?, descricao = ? WHERE ce_servico_produto = ? AND ce_categoria = ?";
        $stmt = mysqli_prepare($connection->myconn, $string);
        $stmt->bind_param("issdiiiiisii", $is_promocao, $data_inicio, $data_fim, $preco_promocional, $estado_produto, $opcao_download, $encontro_publico, $pegar_na_porta, $entregar_na_porta, $descricao, $ce_agenda_estoque, $categoria);
        $rsint = $stmt->execute();
        
        $preco_original = $this->PrecoAgendaEvento($ce_agenda_estoque);
        $quantidade_original = $this->QuantidadeAgendaEvento($ce_agenda_estoque);
        
        $partes = explode(',', $preco);
        $preco_final = ($partes[1] === '00') ? (int)$partes[0] : str_replace(',', '.', $preco);
        
        if($preco_final != $preco_original || $quantidade != $quantidade_original)
        {
            $string_ = "UPDATE tblagenda_evento SET preco = ?, qtd = ? WHERE id = ?";
            $stmt_ = mysqli_prepare($connection->myconn, $string_);
            $stmt_->bind_param("dii", $preco_final, $quantidade, $ce_agenda_estoque);
            $rsint_ = $stmt_->execute();
        }
        
        $response = [ 
            "success" => true, 
            "ce_usuario" => $agendaEvento->getFK_usuario(),
            "ce_agenda_estoque" => $ce_agenda_estoque,
            "is_Promocao" => $is_promocao,
            "data_fim" => $data_fim,
            "preco_promocional" => $preco_promocional,
            "preco" => $preco,
            "quantidade" => $quantidade,
            "estado_produto" => $estado_produto,
            "opcao_download" => $opcao_download,
            "encontro_publico" => $encontro_publico,
            "pegar_na_porta" => $pegar_na_porta,
            "entregar_na_porta" => $entregar_na_porta,
            "descricao" => $descricao,
            "categoria" => $categoria
        ];
        
        mysqli_close($connection->myconn);
        
        return $response;
    }
    // 
    function QuantidadeAgendaEvento($agendaEvento)
    {
        $connection = new cnx();
        $connection->connect();
        
        $query = "SELECT qtd FROM tblagenda_evento where id = $agendaEvento";
        $result = mysqli_query($connection->myconn,$query);
        
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                return $row->qtd;
            }
        }
    }
    //
    function PrecoAgendaEvento($agendaEvento)
    {
        $connection = new cnx();
        $connection->connect();
        
        $query = "SELECT preco FROM tblagenda_evento where id = $agendaEvento";
        $result = mysqli_query($connection->myconn,$query);
        
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                return $row->preco;
            }
        }
    }
    function ultimaChaveDoEvento()
    {
        $connection = new cnx();
        $connection->connect();
        $query = "SELECT * FROM tblagenda_evento ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_object($result))
            {
                $uChaveDoEvento = $row->id; 
                return $uChaveDoEvento;
            }
	    }
    }
    //
    public function inserirTelefone(Telefone $tlfn) {
        $connection = new cnx();
        $connection->connect();
        $telefon = $tlfn->getTelefone();
        $ce_agenda = $this->ultimaChaveDoEvento();
        
        if(is_array($telefon)){
            foreach ($telefon as $value) {
                $stmt = $connection->myconn->prepare("INSERT INTO tbltelefone_agenda (telefone_agenda,ce_agenda_evento) VALUES (?,?)");            
                $stmt->bind_param("ii", $value,$ce_agenda);
                $stmt->execute();
                $stmt->close();
                $connection->close($connection->myconn);
                echo("<script>console.log('PHP: Telefone inserido com sucesso!');</script>");
                return $stmt;    
            }
        }
   }
   function existEventos($ce_usuario,$agenda){
        $connection = new cnx();
        $connection->connect();
        $ce_usuario_ = base64_decode($ce_usuario);
        $query = "SELECT COUNT(ae.id) existe FROM tblagenda_evento ae WHERE ae.ce_usuario = $ce_usuario_ and ce_agenda = $agenda";	
        $result = mysqli_query($connection->myconn,$query);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                return $row->existe;
            }
        }
    }
    
    function listarEventosPorUsuario($ce_usuario,$start,$u_e) {
        $connection = new cnx(); 
        $connection->connect();
        $ce_usuario_ = base64_decode($ce_usuario);
        
        $query = "SELECT ae.id, ae.ce_usuario, ae.qtd, ae.preco, ae.ce_categoria, a.evento, ae.ce_agenda FROM tblagenda_evento ae JOIN agenda a ON a.id = ae.ce_agenda where ae.ce_usuario = $ce_usuario_";
        $result = mysqli_query($connection->myconn,$query);
        
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                ?>
                    <tr>
                        <td><a href="https://lea.co.ao/agenda/agenda-detail.php?agnd=<?php print $row->ce_agenda; ?>" target="_blank"><?php print $row->evento; ?></a></td>
                        <td><?php print $row->qtd; ?></td>
                        <td><?php print $row->preco; ?></td>
                        <td><?php print ($row->qtd * $row->preco); ?></td>
                        <td style="text-align:right;width:52px;">
                            <a href="https://www.lea.co.ao/nasocial/loja/carrinho.php?pro=<?php print base64_encode($row->ce_agenda); ?>&us=<?php print $ce_usuario; ?>&cat=4&id=<?php print $row->id; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></span></a>
                        </td>
                    </tr>
                <?php
            }
        }
    }
    
    function ContarEventosPorUsuario($ce_usuario) {
        $connection = new cnx(); 
        $connection->connect();
        $ce_usuario_ = base64_decode($ce_usuario);
        
        $query = "SELECT  COUNT(ae.ce_usuario) AS TotalIngressos  FROM tblagenda_evento ae JOIN agenda a on a.id = ae.id_agenda where ae.ce_usuario = $ce_usuario_";
        $result = mysqli_query($connection->myconn,$query);
        
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                return $row->TotalIngressos;
            }
        }
    }
   
    //
    function eliminarEvento($param) {
        $connection = new cnx();
        $connection->connect();
        
        $sqlQuery  =  "DELETE FROM tblagenda_evento WHERE id=?";
        
        $statement =  $connection->myconn->prepare($sqlQuery);
        $statement->bind_param("i", $param);
        $statement->execute();
        $statement->close();
        echo("<script>console.log('PHP: Eliminado com sucesso');</script>");
        return $statement;        	
    }
    //
    function TituloDoEvento($agnd){
        $connection = new cnx();
        $connection->connect();
        
        $query = "SELECT id,evento FROM agenda where id = $agnd";
        $result = mysqli_query($connection->myconn,$query);
        
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                return $row->evento;
            }
        }
    }
    //
    function ImagemDoEvento($agnd){
        $connection = new cnx();
        $connection->connect();
        
        $query = "SELECT id,caminho FROM agenda where id = $agnd";
        $result = mysqli_query($connection->myconn,$query);
        
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                return $row->caminho;
            }
        }
    }
    //
    function IngressoPorVenderTitulo($agnd){
        $connection = new cnx();
        $connection->connect();
        //$agnd_ = base64_decode($agnd);
        
        $query = "SELECT id,evento FROM agenda where id = $agnd";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                return $row->evento;
            }
        }
    }
    //
    function IngressoPorVenderData($agnd){
        $connection = new cnx();
        $connection->connect();
        //$agnd_ = base64_decode($agnd);
        
        $query = "SELECT id,data_evento FROM agenda where id = $agnd";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                return $row->data_evento;
            }
        }
    }
    //
    function IngressoPorVenderId($agnd){
        $connection = new cnx();
        $connection->connect();
        //$agnd_ = base64_decode($agnd);
        
        $query = "SELECT id,data_evento FROM agenda where id = $agnd";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                return $row->id;
            }
        }
    }
    //
    function TotalIngressoPorVender($agnd){
        $connection = new cnx();
        $connection->connect();
        $agnd_ = base64_decode($agnd);
        
        $query = "SELECT sum(ae.qtd * ae.preco_agenda) subtotal_linha FROM tblagenda_evento ae WHERE ae.ce_usuario = $agnd_";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                return $row->subtotal_linha;
            }
        }else{
            return 0;
        }
    }
    //
    
    //
    function PrecoServicoProduto($utilizador,$id_,$cat){
        $connection = new cnx();
        $connection->connect();
        $utilizador_ = base64_decode($utilizador);
        $id = base64_decode($id_);
        
        $query = "SELECT  preco  FROM vw_catalogo where ce_usuario = $utilizador_ and id_servico_produto = $id and categoria = $cat";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                return $row->preco;
            }
        }
    }
    //
    function QuantidadeServicoProduto($utilizador,$id,$categoria)
    {
        $connection = new cnx();
        $connection->connect();
        $utilizador_ = base64_decode($utilizador);
        //$id = base64_decode($id_);
        $query = "SELECT sum(qtd) as qtd FROM `vw_catalogo` WHERE ce_usuario = $utilizador_ and id = $id and 	categoria =$categoria ";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                return $row->qtd;
            }
        }
    }
    
    function QuantidadeIngressosAvenda($utilizador,$id)
    {
        $connection = new cnx();
        $connection->connect();
        $utilizador_ = base64_decode($utilizador);
        
        $query = "SELECT ae.id, a.caminho, ae.qtd, ae.preco_agenda, a.data_evento, a.evento, su.username FROM tblagenda_evento ae JOIN agenda a on a.id = ae.id_agenda JOIN tblsite_user su on su.user_id = ae.ce_usuario where ae.ce_usuario = $utilizador_ and ae.id_agenda = $id";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                return $row->qtd;
            }
        }
    }
    function CeVendedor($utilizador,$id)
    {
        $connection = new cnx();
        $connection->connect();
        $utilizador_ = base64_decode($utilizador);
        
        $query = "SELECT ae.id, a.caminho, ae.qtd, ae.preco_agenda, a.data_evento, a.evento, su.username,su.user_id FROM tblagenda_evento ae JOIN agenda a on a.id = ae.id_agenda JOIN tblsite_user su on su.user_id = ae.ce_usuario where ae.ce_usuario = $utilizador_ and ae.id_agenda = $id";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
               return base64_encode($row->user_id); 
            }
        }
    }
    
    
    
    
   
    
    
    //
    function EliminarEventoCatalogo($param) {
        $connection = new cnx();
        $connection->connect();
        
        $sqlQuery  =  "DELETE FROM tblagenda_evento WHERE id =?";
        
        $statement =  $connection->myconn->prepare($sqlQuery);
        $statement->bind_param("i", $param);
        $statement->execute();
        $statement->close();
        return 1;        	
    }
    //
    
}
?>
