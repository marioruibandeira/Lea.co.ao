<?php
/**
 * Description of class
 *
 * @author key
 */
include_once($_SERVER['DOCUMENT_ROOT'].'/conexao/cnx.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Publicar.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Usuario.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/login/Login.php');
//
class PublicarDAO {
    //
    public function inserirPublicacao(Publicar $publicar,Usuario $usuario )  
    {  
        $connection = new cnx();
        $connection->connect();
        //
        $ce_usuario = base64_decode($usuario->getUser_id());
        $ce_cat_post = $publicar->getCe_categoria_post();
        $pblicacao = $publicar->getPublicacao();
        $imagem_post = "";
        if($publicar->getImg_publicacao() != '' || $publicar->getImg_publicacao() != null)
        {
            $imagem_post =  "" . $publicar->getImg_publicacao();  
        }
        //
        $string = "INSERT INTO tbllinha_tempo (ce_usuario,ce_categoria_post,post,img_publicacao) VALUES (?,?,?,?)"; 
        $stmt = mysqli_prepare($connection->myconn, $string);
        $stmt->bind_param("iiss", $ce_usuario,$ce_cat_post,$pblicacao,$imagem_post);
        $ex_publicacao = $stmt->execute();
        //echo("<script>console.log('PHP: Publicação inserido com sucesso!');</script>");
        return $ex_publicacao;
    }
    //
    public function inserirPublicacaoInterno($utilizador,$ce_categoria_post,$post,$img_publicacao)  
    {  
        $connection = new cnx();
        $connection->connect();
        //
        $ce_usuario = base64_decode($utilizador);
        //
        $string = "INSERT INTO tbllinha_tempo (ce_usuario,ce_categoria_post,post,img_publicacao) VALUES (?,?,?,?)"; 
        $stmt = mysqli_prepare($connection->myconn, $string);
        $stmt->bind_param("iiss", $ce_usuario,$ce_categoria_post,$post,$img_publicacao);
        $ex_publicacao = $stmt->execute();
        echo("<script>console.log('PHP: Publicação inserido com sucesso INTERNO!');</script>");
        return $ex_publicacao;
    }
    //
    public function publicacaoPPublicacao($id_p_){
        $connection = new cnx();
        $connection->connect();
        $id_p = base64_decode($id_p_);
        $query = "SELECT * FROM tbllinha_tempo WHERE id_linha_tempo = $id_p ";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                return $row->post; 
            }
	    } 
    }
    //
    public function DataHoraPublicacao($id_p_){
        $connection = new cnx();
        $connection->connect();
        $id_p = base64_decode($id_p_);
        $query = "SELECT * FROM vwlinha_do_tempo WHERE id_linha_tempo = $id_p ";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                print $row->data_formatada; 
            }
	    } 
    }
    //
    public function UtilizadorPublicacao($id_p_){
        $lo_in = new Login();
        $connection = new cnx();
        $connection->connect();
        $id_p = base64_decode($id_p_);
        $query = "SELECT * FROM vwlinha_do_tempo WHERE id_linha_tempo = $id_p ";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                ?>
                    <h4 class="blue">
                        <a href="http://www.lea.co.ao/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->ce_usuario); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>
                            <?php print $row->username; ?><?php //print $lo_in->nomeUsuarioStatuUsuario($usuario_final); ?>
                        </a>
                    </h4>
                <?php
            }
	    } 
    }
    //
    public function CategoriaPublicacao($id_p_){
        $connection = new cnx();
        $connection->connect();
        $id_p = base64_decode($id_p_);
        $query = "SELECT * FROM vwlinha_do_tempo WHERE id_linha_tempo = $id_p ";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                return $row->ce_categoria_post; 
            }
	    } 
    } 
    public function usuarioDonoPublicacao($id_p_){
        $connection = new cnx();
        $connection->connect();
        $id_p = base64_decode($id_p_);
        $query = "SELECT * FROM tbllinha_tempo WHERE id_linha_tempo = $id_p ";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                $chave_do_usuario = $row->ce_usuario; 
                return base64_encode($chave_do_usuario);
            }
	    } 
    }
    //
    public function fotoPublicacao($id_p_){
        $connection = new cnx();
        $connection->connect();
        $id_p = base64_decode($id_p_);
        $query = "SELECT * FROM tbllinha_tempo WHERE id_linha_tempo = $id_p ";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                ?>  <?php
                
                if($row->img_publicacao == '/nasocial/imgs/posts/' || $row->img_publicacao == null)
                { 
                    ?>  <?php
                } else { 
                    ?> 
                        <img class="media-object" src="<?php print $row->img_publicacao; ?>" style="width:100%;"/>
                        <div class="hr hr-double hr-dotted hr18"></div> 
                    <?php 
                }       
            }
	    } 
    }
    //
    public function NomeDeQuemPublicou($id_p_){
        $lo_in = new Login();
        $connection = new cnx();
        $connection->connect();
        $id_p = base64_decode($id_p_);
        $query = "SELECT * FROM vwlinha_do_tempo WHERE id_linha_tempo = $id_p ";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                ?> <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3"/><circle cx="12" cy="10" r="3"/><circle cx="12" cy="12" r="10"/></svg> <?php print $row->username; ?> <?php
            }
	    } 
    }
    //
    public function ChaveDeQuemPublicou($id_p_){
        $lo_in = new Login();
        $connection = new cnx();
        $connection->connect();
        $id_p = base64_decode($id_p_);
        $query = "SELECT * FROM vwlinha_do_tempo WHERE id_linha_tempo = $id_p ";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
               return $row->ce_usuario; 
            }
	    } 
    }
    //
    public function FotoDeQuemPublicou($id_p_){
        $lo_in = new Login();
        $connection = new cnx();
        $connection->connect();
        $id_p = base64_decode($id_p_);
        $query = "SELECT * FROM vwlinha_do_tempo WHERE id_linha_tempo = $id_p ";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                if($row->fotoPerfil != null)
                {
                    ?> <a href="http://www.lea.co.ao/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->ce_usuario); ?>"><img class="media-object" src="<?php print $row->fotoPerfil; ?>" style="width:100%;"/></a> <?php    
                }else{
                    ?> <img class="media-object" src="http://lea.co.ao/nasocial/assets/images/avatars/profile-pic.jpg" style="width:100%;"/> <?php
                }
            }
	    } 
    }
    //
    public function EstatoDeAmizadeDeQuemPublicou_($u_logado_,$u_logado){
        $lo_in = new Login();
        $connection = new cnx();
        $connection->connect();
        $query = "SELECT * FROM tblamigo where ce_usuario = $u_logado_ AND ce_amigo = $u_logado";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
               return true; 
            }
	    } 
    }
    //
    public function EstatoPedidoDeAmizadeDeQuemPublicou_($u_logado_,$u_amigo){
        $lo_in = new Login();
        $connection = new cnx();
        $connection->connect();
        $query = "SELECT * FROM tblpedido_amizade where ce_usuario = $u_logado_ AND ce_amigo = $u_amigo";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
               return true; 
            }
	    } 
    }
    //
    public function EstatoDeAmizadeDeQuemPublicou($id_p_,$u_logado){
        $lo_in = new Login();
        $connection = new cnx();
        $connection->connect();
        $id_p = base64_decode($id_p_);
        $u_logado_ = base64_decode($u_logado);
        $query = "SELECT * FROM vwlinha_do_tempo WHERE id_linha_tempo = $id_p ";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                if($row->ce_usuario === $u_logado_ )
                { }else{
                    if($this->EstatoDeAmizadeDeQuemPublicou_($u_logado_,$row->ce_usuario) == true)
                    {
                        ?> 
                            <button type="button" class="btn btn-success btn-lg btn-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                Amigos
                            </button> 
                        <?php
                    }
                    if($this->EstatoPedidoDeAmizadeDeQuemPublicou_($u_logado_,$row->ce_usuario) == true && $this->EstatoDeAmizadeDeQuemPublicou_($u_logado_,$row->ce_usuario) == false)
                    {
                        ?> 
                            <button type="button" class="btn btn-Secondary btn-lg btn-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                Pedido Enviado
                            </button>
                        <?php
                    }
                    if($this->EstatoPedidoDeAmizadeDeQuemPublicou_($u_logado_,$row->ce_usuario) == false && $this->EstatoDeAmizadeDeQuemPublicou_($u_logado_,$row->ce_usuario) == false)
                    {
                        ?> 
                            <button type="button" class="btn btn-Secondary btn-lg btn-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                Pedido Enviado
                            </button>
                        <?php
                    }
                    
                }
            }
	    } 
    }
    //
    public function EstatoDeBloqueioNaPublicacao($id_p_,$u_logado){
        $lo_in = new Login();
        $connection = new cnx();
        $connection->connect();
        $id_p = base64_decode($id_p_);
        $u_logado_ = base64_decode($u_logado);
        $query = "SELECT * FROM vwlinha_do_tempo WHERE id_linha_tempo = $id_p ";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                if($row->ce_usuario != $u_logado_ )
                { 
                     ?> 
                        <button type="button" class="btn btn-danger btn-lg btn-block"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line></svg> Bloqueiar
                        </button>
                     <?php
                }
            }
	    } 
    }
}
