<?php
/**
 * @author Mário Bandeira 
 */
include_once($_SERVER['DOCUMENT_ROOT'].'/conexao/cnx.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.SiteUserInfo.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Usuario.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Contacto.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.ContactoSocial.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/utilidades/class.Provincias.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Preferencia.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.PedidoAmizade.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UtilidadeDAO.php');
//
class UsuarioDAO 
{
    function fotoPerfil($u_fnal)
    {
        $connection = new cnx();
        $connection->connect();
        $u_f = base64_decode($u_fnal);
        
        $query = 'SELECT fotoPerfil FROM tblsite_user_info WHERE ce_usuario = "' . $u_f . '"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                return explode('/',$row->fotoPerfil);
            }
        }else{
            print "Sem dados para exibir";
        }
        $connection->close($connection->myconn);
    }
    //
    function nomeUsuarioImprenso($u_fnal)
    {
        $connection = new cnx();
        $connection->connect();
        $u_f = base64_decode($u_fnal);
        
        $query = 'SELECT * FROM tblsite_user WHERE user_id = "' . $u_f . '"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                print $row->username;
            }
        }else{
            print "Sem dados para exibir";
        }
        $connection->close($connection->myconn);
    }
    //
    function nomeUsuarioAmigo($n_usuario){
        $connection = new cnx();
        $connection->connect();
        $u_f = base64_decode($n_usuario);
        
        $query = 'SELECT * FROM tblsite_user WHERE user_id = "'.$u_f.'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                print $row->username;
            }
        }else{
            print "Sem dados para exibir";
        }
        $connection->close($connection->myconn);
    }
    //
    /*public function updateUsuario(SiteUserInfo $usuario)  
    {       
        $connection = new cnx();
        $connection->connect();
        
        $n_usuario = $usuario->getUsername();
        /$ce_usuario = base64_decode($usuario->getUser_id());  
        
        $query = 'UPDATE tblsite_user SET username = "'. $n_usuario . '" WHERE user_id = "' . $ce_usuario . '"';
        mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));

        $u_n = $_SESSION['username'] = base64_encode($n_usuario);
        $_SESSION['logged'] = $u_n;
        echo("<script>console.log('PHP: Nome usuario actualizado com sucesso!');</script>");
        return $ce_usuario;
        $connection->close($connection->myconn);
    }*/
    //
    function firstName($n_usuario){
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($n_usuario);
        
        $query = 'SELECT * FROM tblsite_user_info WHERE ce_usuario = "'.$ce_usuario.'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                print $row->first_name;
            }
        }
    }
    //
    function lastNome($n_usuario){
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($n_usuario);
        
        $query = 'SELECT * FROM tblsite_user_info WHERE ce_usuario = "'.$ce_usuario.'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                print $row->last_name;
            }
        }
    }
    //
    function dataNascimento($n_usuario){
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($n_usuario);
        
        $query = 'SELECT DATE_FORMAT(data_nascimento,"%d/%m/%Y") as data_nascimento  FROM tblsite_user_info WHERE ce_usuario = "'. $ce_usuario .'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                print $row->data_nascimento;
            }
        }
        $connection->close($connection->myconn);
    }
    //
    function dataNascimentoComparacao($n_usuario){
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($n_usuario);
        
        $query = 'SELECT DATE_FORMAT(data_nascimento,"%d/%m/%Y") as data_nascimento  FROM tblsite_user_info WHERE ce_usuario = "'. $ce_usuario .'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                $data_nasce = $row->data_nascimento;
                return $data_nasce;
            }
        }
        $connection->close($connection->myconn);
    }
    //
    function fotoPerfilValidacao($n_usuario){
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($n_usuario);
        
        $query = 'SELECT fotoPerfil  FROM tblsite_user_info WHERE ce_usuario = "'. $ce_usuario .'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                return $row->fotoPerfil;
            }
        }
        else
        {
            return 0;
        }
        $connection->close($connection->myconn);
    }
    //
    public function updateUpLoadFotoPerfil($c_usuario,$perfilPic_)
    {       
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($c_usuario);
        $query = 'UPDATE tblsite_user_info SET 	fotoPerfil = "'. $perfilPic_ . '" WHERE ce_usuario = "' . $ce_usuario . '"';
        mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
        return $ce_usuario;
        $connection->close($connection->myconn);
    }
    //
    function fotoPerfilUtilizador($n_usuario){
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($n_usuario);
        
        $query = 'SELECT fotoPerfil, first_name  FROM tblsite_user_info WHERE ce_usuario = "'. $ce_usuario .'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                if($row->fotoPerfil == '' || $row->fotoPerfil == null || $row->fotoPerfil =='/nasocial/imgs/perfil/')
                {
                    ?><img id="avatar" class="editable img-responsive" alt="<?php print $row->first_name; ?>" src="/nasocial/assets/images/avatars/profile-pic.jpg" /><?php
                }else{
                   ?> <img id="avatar" class="editable img-responsive" alt="<?php print $row->first_name; ?>" src="<?php print $row->fotoPerfil; ?>" /> <?php
                } 
            }
        }
        else
        {
            return 0;
        }
        $connection->close($connection->myconn);
    }
    //
    function sexoUsuario($ce_usuario){
        $connection = new cnx();
        $connection->connect();
        
        $query = 'SELECT * FROM tblsite_user_info WHERE ce_usuario = "'.base64_decode($ce_usuario).'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                $sexo = $row->ce_sexo;
                return $sexo;
            }
        }
    }
    //
    function sobreUsuario($n_usuario){
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($n_usuario);
        
        $query = 'SELECT * FROM tblsite_user_info WHERE ce_usuario = "'.$ce_usuario.'"';
        $result = mysqli_query($connection->myconn,$query);
        //
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                if($row->sobre_me != ''){
                    print $row->sobre_me;
                }else{
                    ?> <p>Este utilizador ainda não adicionou nada sobre ele, têm calma</p> <?php
                }
            }
        }
        $connection->close($connection->myconn);
    }
    //
    public function updatePrimeiroNome($p_n,$ce_usuario){       
        $connection = new cnx();
        $connection->connect();       
        $query = 'UPDATE tblsite_user_info SET first_name = "'. $p_n . '" WHERE ce_usuario = "' . base64_decode($ce_usuario) . '"';
        mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
        return $ce_usuario;
    }
    //
    public function updateUltimoNome($u_n,$ce_usuario){       
        $connection = new cnx();
        $connection->connect();
        $query = 'UPDATE tblsite_user_info SET last_name = "'. $u_n . '" WHERE ce_usuario = "' . base64_decode($ce_usuario) . '"';
        mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
        return $ce_usuario;
    }
    //
    public function updateSobreMe($sobre_me,$n_usuario)  
    {       
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($n_usuario);
       
        $query = 'UPDATE tblsite_user_info SET sobre_me = "'. $sobre_me . '" WHERE ce_usuario = "' . $ce_usuario . '"';
        mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
        return $ce_usuario;
    }
    //
    public function updateProvincia($c_prov,$ce_usuario)  
    {       
        $connection = new cnx();
        $connection->connect();       
        $query = 'UPDATE tblsite_user_info SET ce_local = "'. $c_prov . '" WHERE ce_usuario = "' . base64_decode($ce_usuario) . '"';
        mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
        return $c_prov;
    }   
    function naturalidade($ce_usuario_){
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($ce_usuario_);
        $query = 'SELECT p.provincia, p.id_provincia FROM tblsite_user_info ui join provincia p ON ui.ce_local = p.id_provincia WHERE ui.ce_usuario = "'.$ce_usuario.'"';
        $result = mysqli_query($connection->myconn,$query);
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){               
                $provincia = $row->provincia;
                return $provincia;
            }
        }
    }
    //
    public function updateSexoUsuario($ce_usuario,$sexo)  
    {       
        $connection = new cnx();
        $connection->connect();
        $query = 'UPDATE tblsite_user_info SET ce_sexo = "'. $sexo . '" WHERE ce_usuario = "' . base64_decode($ce_usuario) . '"';
        mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
        return $ce_usuario;
    }
    //
    public function updateDataNascimento($c_usuario,$data_nasc){       
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($c_usuario);
        $query = 'UPDATE tblsite_user_info SET data_nascimento = "'. $data_nasc . '" WHERE ce_usuario = "' . $ce_usuario . '"';
        mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
        return $ce_usuario;
        $connection->close($connection->myconn);
    }
    //
    public function insertContactoEmail(SiteUserInfo $usuario, Contacto $contacto)  
    {  
        $connection = new cnx();
        $connection->connect();
        
        $ce_usuario = base64_decode($usuario->getUser_id());
        $email = $contacto->getEmail();
                   
        $string = "INSERT INTO tblcontacto (ce_usuario,email) VALUES (?,?)"; 
        $stmt = mysqli_prepare($connection->myconn, $string);
        $stmt->bind_param("is", $ce_usuario,$email);
        $i_contacto = $stmt->execute();
        echo("<script>console.log('PHP: Email Inserido Com Sucesso! $ce_usuario ');</script>");
        return $i_contacto;
    }
    //
    public function insertContactoPWeb(SiteUserInfo $usuario, Contacto $contacto)  
    {  
        $connection = new cnx();
        $connection->connect();
        
        $ce_usuario = base64_decode($usuario->getUser_id());

        $pagina_web = $contacto->getPagina_web();        
                   
        $string = "INSERT INTO tblcontacto (ce_usuario,website) VALUES (?,?)"; 
        $stmt = mysqli_prepare($connection->myconn, $string);
        $stmt->bind_param("is", $ce_usuario,$pagina_web);
        $i_contacto = $stmt->execute();
        echo("<script>console.log('PHP: Pagina Web Inserido Com Sucesso! $ce_usuario ');</script>");
        return $i_contacto;
    }
    public function insertContacto(SiteUserInfo $usuario, Contacto $contacto)  
    {  
        $connection = new cnx();
        $connection->connect();
        
        $ce_usuario = base64_decode($usuario->getUser_id());
        $telefone = $contacto->getTelefone();
                   
        $string = "INSERT INTO tblcontacto (ce_usuario,telefone) VALUES (?,?)"; 
        $stmt = mysqli_prepare($connection->myconn, $string);
        $stmt->bind_param("is", $ce_usuario,$telefone);
        $i_contacto = $stmt->execute();
        echo("<script>console.log('PHP: Telefone Inserido Com Sucesso! $ce_usuario ');</script>");
        return $i_contacto;
    }
    //
    public function insertContactoWhatsapp(SiteUserInfo $usuario, Contacto $contacto)  
    {  
        $connection = new cnx();
        $connection->connect();
        
        $ce_usuario = base64_decode($usuario->getUser_id());
        $whatsapp = $contacto->getWhatsapp();
                   
        $string = "INSERT INTO tblcontacto (ce_usuario,whatsapp) VALUES (?,?)"; 
        $stmt = mysqli_prepare($connection->myconn, $string);
        $stmt->bind_param("ii", $ce_usuario,$whatsapp);
        $i_contacto = $stmt->execute();
        echo("<script>console.log('PHP: whatsapp Inserido Com Sucesso! $ce_usuario ');</script>");
        return $i_contacto;
    }
    //
    function emailUsuario($c_usuario){
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($c_usuario);
        $query = 'SELECT * FROM tblcontacto WHERE ce_usuario = "'. $ce_usuario .'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                print $row->email;
            }
        }else{
            //print "Ultimo Nome";
        }
    }
    //
    function paginaWebUsuario($ce_usuario){
        $connection = new cnx();
        $connection->connect();
        
        $query = 'SELECT * FROM tblcontacto WHERE ce_usuario = "'.base64_decode($ce_usuario).'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                print $row->website;
            }
        }
    }
    //
    function telefoneUsuario($ce_usuario){
        $connection = new cnx();
        $connection->connect();
        
        $query = 'SELECT * FROM tblcontacto WHERE ce_usuario = "'.base64_decode($ce_usuario).'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                print $row->telefone;
            }
        }else{
            //print "Ultimo Nome";
        }
    }
    //
    function whatsappUsuario($ce_usuario)
    {
        $connection = new cnx();
        $connection->connect();
        
        $query = 'SELECT whatsapp FROM tblcontacto WHERE ce_usuario = "'.base64_decode($ce_usuario).'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                print $row->whatsapp;
            }
        }else{
            //print " ";
        }
    }
    //
    function chaveUsuarioContacto($ce_usuario){
        $connection = new cnx();
        $connection->connect();
        
        $query = 'SELECT * FROM tblcontacto WHERE ce_usuario = "'. base64_decode($ce_usuario) .'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                $ce_usuario = $row->ce_usuario;
                return base64_encode($ce_usuario);
            }
        }
    }
    //
    function dataRegistoUsuarioAmigo($ce_usuario){
        $connection = new cnx();
        $connection->connect();
        $ce_usuario_ = base64_decode($ce_usuario);
        
        $query = 'SELECT DATE_FORMAT(data_registo,"%d/%m/%Y") AS data_registo, ce_usuario FROM tblsite_user_info WHERE ce_usuario = "'. $ce_usuario_ .'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                print $row->data_registo;
            }
        }
    }
    //
    function dataRegistoUsuario($u_fnal){
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($u_fnal);
        
        $query = 'SELECT DATE_FORMAT(data_registo,"%d/%m/%Y") AS data_registo, ce_usuario FROM tblsite_user_info WHERE ce_usuario = "'. $ce_usuario .'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                print $row->data_registo;
            }
        }
    }
    //
    function idadeUsuario($u_fnal){
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($u_fnal);
        
        $query = 'SELECT YEAR(CURDATE()) - YEAR(data_nascimento) AS idade,ce_usuario FROM tblsite_user_info WHERE ce_usuario = "'. $ce_usuario .'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                print $row->idade;
            }
        }else{
            print "_";
        }
    }
    //
    public function updateContacto(SiteUserInfo $usuario, Contacto $contacto)  
    {       
        $connection = new cnx();
        $connection->connect();
        
        $ce_usuario = base64_decode($usuario->getUser_id());
        $email = $contacto->getEmail();
        $pagina_web = $contacto->getPagina_web();
        $telefone = $contacto->getTelefone();
        $whatsapp = $contacto->getWhatsapp();
        
        $query = 'UPDATE tblcontacto SET email = "'. $email . '",website = "'. $pagina_web . '", telefone = "'. $telefone . '", whatsapp = "'. $whatsapp . '" WHERE ce_usuario = "' . $ce_usuario . '"';
        mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
        echo("<script>console.log('PHP: contactos actualizado com sucesso!');</script>");
        return $ce_usuario;
        $connection->close($connection->myconn);
    }
    //
    public function insertFacebookContactoSocial(SiteUserInfo $usuario, ContactoSocial $c_social)  
    {  
        $connection = new cnx();
        $connection->connect();
        
        $ce_usuario = base64_decode($usuario->getUser_id());
        $facebook = $c_social->getFacebook();
                   
        $string = "INSERT INTO tblcontacto_social (ce_usuario,facebook) VALUES (?,?)"; 
        $stmt = mysqli_prepare($connection->myconn, $string);
        $stmt->bind_param("is", $ce_usuario,$facebook);
        $contacto_soc = $stmt->execute();
        echo("<script>console.log('PHP: Contactos Sociais $facebook Inserido Com Sucesso!');</script>");
        return $contacto_soc;
    }
    //
    public function insertTwitterContactoSocial(SiteUserInfo $usuario, ContactoSocial $c_social)  
    {  
        $connection = new cnx();
        $connection->connect();
        
        $ce_usuario = base64_decode($usuario->getUser_id());
        $twitter = $c_social->getTwitter();
                   
        $string = "INSERT INTO tblcontacto_social (ce_usuario,twitter) VALUES (?,?)"; 
        $stmt = mysqli_prepare($connection->myconn, $string);
        $stmt->bind_param("is", $ce_usuario,$twitter);
        $contacto_soc = $stmt->execute();
        echo("<script>console.log('PHP: Contactos Sociais $twitter Inserido Com Sucesso!');</script>");
        return $contacto_soc;
    }
    public function insertGoogleContactoSocial(SiteUserInfo $usuario, ContactoSocial $c_social)  
    {  
        $connection = new cnx();
        $connection->connect();
        
        $ce_usuario = base64_decode($usuario->getUser_id());
        $google = $c_social->getGoogle();
                   
        $string = "INSERT INTO tblcontacto_social (google,ce_usuario) VALUES (?,?)"; 
        $stmt = mysqli_prepare($connection->myconn, $string);
        $stmt->bind_param("si", $google,$ce_usuario);
        $contacto_soc = $stmt->execute();
        echo("<script>console.log('PHP: Contactos Sociais $google Inserido Com Sucesso!');</script>");
        return $contacto_soc;
    }
    //
    public function insertInstagramContactoSocial(SiteUserInfo $usuario, ContactoSocial $c_social)  
    {  
        $connection = new cnx();
        $connection->connect();
        
        $ce_usuario = base64_decode($usuario->getUser_id());
        $instagram = $c_social->getInstagram();
                   
        $string = "INSERT INTO tblcontacto_social (ce_usuario,instagram) VALUES (?,?)"; 
        $stmt = mysqli_prepare($connection->myconn, $string);
        $stmt->bind_param("is", $ce_usuario,$instagram);
        $contacto_soc = $stmt->execute();
        echo("<script>console.log('PHP: Contactos Sociais $instagram Inserido Com Sucesso!');</script>");
        return $contacto_soc;
    }
    //
    function chaveUsuarioContactoSocial($ce_usuario){
        $connection = new cnx();
        $connection->connect();
        
        $query = 'SELECT * FROM tblcontacto_social WHERE ce_usuario = "'.base64_decode($ce_usuario).'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                $ce_usuario = $row->ce_usuario;
                return base64_encode($ce_usuario);
            }
        }
        $connection->close($connection->myconn);
    }
    //
    function facebookUsuario($ce_usuario){
        $connection = new cnx();
        $connection->connect();
        
        $query = 'SELECT * FROM tblcontacto_social WHERE ce_usuario = "'.base64_decode($ce_usuario).'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                print $row->facebook;
            }
        }
        $connection->close($connection->myconn);
    }
    //
    function twitterUsuario($ce_usuario){
        $connection = new cnx();
        $connection->connect();
        
        $query = 'SELECT * FROM tblcontacto_social WHERE ce_usuario = "'.base64_decode($ce_usuario).'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                print $row->twitter;
            }
        }
        $connection->close($connection->myconn);
    }
    //
    function tiktokUsuario($ce_usuario){
        $connection = new cnx();
        $connection->connect();
        
        $query = 'SELECT * FROM tblcontacto_social WHERE ce_usuario = "'.base64_decode($ce_usuario).'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                print $row->google;
            }
        }
        $connection->close($connection->myconn);
    }
    //
    function Instagram($ce_usuario){
        $connection = new cnx();
        $connection->connect();
        
        $query = 'SELECT * FROM tblcontacto_social WHERE ce_usuario = "'.base64_decode($ce_usuario).'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                print $row->instagram ;
            }
        }
        $connection->close($connection->myconn);
    }
    //
    public function updateContactoSocial(SiteUserInfo $usuario, ContactoSocial $c_social)  
    {       
        $connection = new cnx();
        $connection->connect();
        
        $ce_usuario = base64_decode($usuario->getUser_id());
        $facebook = $c_social->getFacebook();
        $twitter = $c_social->getTwitter();
        $tiktok = $c_social->getGoogle(); 
        $instagram = $c_social->getInstagram(); 
        
        $query = 'UPDATE tblcontacto_social SET facebook = "'. $facebook . '",twitter = "'. $twitter . '", google = "'. $tiktok . '", instagram  = "'. $instagram  . '" WHERE ce_usuario = "' . $ce_usuario . '"';
        mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
 
        echo("<script>console.log('PHP: tblcontacto_social Nome usuario actualizado com sucesso!');</script>");
        return $ce_usuario;
        $connection->close($connection->myconn);
    }
    //
    public function insertPreferencias(SiteUserInfo $usuario, Preferencia $prefer)  
    {  
        $connection = new cnx();
        $connection->connect();        
        $ce_usuario = base64_decode($usuario->getUser_id());
        $pref = $prefer->getPerfil_estato();
        $string = "INSERT INTO tblpreferencia (ce_usuario,perfil_estato) VALUES (?,?)"; 
        $stmt = mysqli_prepare($connection->myconn, $string);
        $stmt->bind_param("ii", $ce_usuario,$pref);
        $perfil_estato = $stmt->execute();
        echo("<script>console.log('PHP: Estado inserido com sucesso!');</script>");
        return $perfil_estato;
        $connection->close($connection->myconn);
    }
    function existePreferencias($c_usuario)
    {
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($c_usuario);
        $query = 'SELECT * FROM tblpreferencia WHERE ce_usuario = "'. $ce_usuario .'"';
        $result = mysqli_query($connection->myconn,$query);

        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                $exist = $row->ce_usuario;
                return base64_encode($exist);
            }
        }
        $connection->close($connection->myconn);
    }
    function tornaMeuPerfilPrivado($c_usuario){
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($c_usuario);
        $query = 'SELECT * FROM tblpreferencia WHERE ce_usuario = "'. $ce_usuario .'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                $exist = $row->perfil_estato;
                return $exist;
            }
        }
        $connection->close($connection->myconn);
    }
    //
    function meEnviaUmEmail($c_usuario){
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($c_usuario);
        $query = 'SELECT * FROM tblpreferencia WHERE ce_usuario = "'.  $ce_usuario .'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                $exist = $row->quero_email;
                return $exist;
            }
        }
        $connection->close($connection->myconn);
    }
    //
    public function updatePreferencias(SiteUserInfo $usuario, Preferencia $prefer)  
    {       
        $connection = new cnx();
        $connection->connect();        
        $ce_usuario = $usuario->getUser_id();
        $pref = $prefer->getPerfil_estato();        
        $query = 'UPDATE tblpreferencia SET perfil_estato = "'. $pref . '" WHERE ce_usuario = "' . base64_decode($ce_usuario) . '"';
        mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn)); 
        echo("<script>console.log('PHP: tblpreferencia Preferencia actualizado com sucesso!');</script>");
        return $ce_usuario;
    }
    //
    public function insertPreferenciasEmail(SiteUserInfo $usuario, Preferencia $prefer)  
    {  
        $connection = new cnx();
        $connection->connect();        
        $ce_usuario = base64_decode($usuario->getUser_id());
        $email = $prefer->getQuero_email();
        $string = "INSERT INTO tblpreferencia (ce_usuario,quero_email) VALUES (?,?)"; 
        $stmt = mysqli_prepare($connection->myconn, $string);
        $stmt->bind_param("ii", $ce_usuario,$email);
        $email_ = $stmt->execute();
        echo("<script>console.log('PHP: Estado inserido com sucesso!');</script>");
        return $email_;
        $connection->close($connection->myconn);
    }
    public function updatePreferenciasEmail(SiteUserInfo $usuario, Preferencia $prefer)  
    {       
        $connection = new cnx();
        $connection->connect();        
        $ce_usuario = base64_decode($usuario->getUser_id());
        $email_ = $prefer->getQuero_email();        
        $query = 'UPDATE tblpreferencia SET quero_email = "'. $email_ . '" WHERE ce_usuario = "' . $ce_usuario . '"';
        mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn)); 
        echo("<script>console.log('PHP: tblpreferencia Preferencia actualizado com sucesso!');</script>");
        return $ce_usuario;
    }
    //
    public function insertPreferenciasManterHistorico(SiteUserInfo $usuario, Preferencia $prefer)  
    {  
        $connection = new cnx();
        $connection->connect();        
        $ce_usuario = base64_decode($usuario->getUser_id());
        $manter_histo = $prefer->getManter_historia();
        $string = "INSERT INTO tblpreferencia (ce_usuario,manter_historia) VALUES (?,?)"; 
        $stmt = mysqli_prepare($connection->myconn, $string);
        $stmt->bind_param("ii", $ce_usuario,$manter_histo);
        $email_ = $stmt->execute();
        echo("<script>console.log('PHP: Estado inserido $manter_histo com sucesso!');</script>");
        return $email_;
        $connection->close($connection->myconn);
    }
    public function updatePreferenciasManterHistorico(SiteUserInfo $usuario, Preferencia $prefer)  
    {       
        $connection = new cnx();
        $connection->connect();        
        $ce_usuario = $usuario->getUser_id();
        $manter_histo = $prefer->getManter_historia();        
        $query = 'UPDATE tblpreferencia SET manter_historia = "'. $manter_histo . '" WHERE ce_usuario = "' . base64_decode($ce_usuario) . '"';
        mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn)); 
        echo("<script>console.log('PHP: tblpreferencia manter_historia actualizado com sucesso!');</script>");
        return $ce_usuario;
        $connection->close($connection->myconn);
    }
    function checkerManterHistorico($ce_usuario){
        $connection = new cnx();
        $connection->connect();
        
        $query = 'SELECT * FROM tblpreferencia WHERE ce_usuario = "'. base64_decode($ce_usuario) .'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                $exist = $row->manter_historia;
                return $exist;
            }
        }
        $connection->close($connection->myconn);
    }
    //
    public function insertPreferenciasNumeroDias(SiteUserInfo $usuario, Preferencia $prefer)  
    {  
        $connection = new cnx();
        $connection->connect();        
        $ce_usuario = base64_decode($usuario->getUser_id());
        $n_dias = $prefer->getDias_historia();
        $string = "INSERT INTO tblpreferencia (ce_usuario,dias_historia) VALUES (?,?)"; 
        $stmt = mysqli_prepare($connection->myconn, $string);
        $stmt->bind_param("ii", $ce_usuario,$n_dias);
        $n_dias_ = $stmt->execute();
        echo("<script>console.log('PHP: Estado inserido dias_historia com sucesso!');</script>");
        return $n_dias_;
        $connection->close($connection->myconn);
    }
    public function updatePreferenciasNumeroDias(SiteUserInfo $usuario, Preferencia $prefer)  
    {       
        $connection = new cnx();
        $connection->connect();        
        $ce_usuario = $usuario->getUser_id();
        $dias_historia = $prefer->getDias_historia();        
        $query = 'UPDATE tblpreferencia SET dias_historia = "'. $dias_historia . '" WHERE ce_usuario = "' . base64_decode($ce_usuario) . '"';
        mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn)); 
        echo("<script>console.log('PHP: tblpreferencia $dias_historia actualizado com sucesso!');</script>");
        return $ce_usuario;
        $connection->close($connection->myconn);
    }
    public function updatePreferenciasNumeroDiasNull(SiteUserInfo $usuario, Preferencia $prefer)  
    {       
        $connection = new cnx();
        $connection->connect();        
        $ce_usuario = $usuario->getUser_id();
        $dias_historia = $prefer->getDias_historia();        
        $query = 'UPDATE tblpreferencia SET dias_historia = NULL WHERE ce_usuario = "' . base64_decode($ce_usuario) . '"';
        mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn)); 
        echo("<script>console.log('PHP: tblpreferencia $dias_historia actualizado com sucesso!');</script>");
        return $ce_usuario;
        $connection->close($connection->myconn);
    }
    function listarNumeroDias($ce_usuario){
        $connection = new cnx();
        $connection->connect();
        
        $query = 'SELECT * FROM tblpreferencia WHERE ce_usuario = "'.base64_decode($ce_usuario).'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                print $row->dias_historia;
            }
        }
        $connection->close($connection->myconn);
    }
    //
    public function updateId_idioma(SiteUserInfo $usuario, Preferencia $prefer)  
    {       
        $connection = new cnx();
        $connection->connect();  
        $ce_usuario = base64_decode($usuario->getUser_id());
        $ce_idioma = $prefer->getCe_idioma();
        $query = 'UPDATE tblpreferencia SET ce_idioma = "'. $ce_idioma . '" WHERE ce_usuario = "' . $ce_usuario . '"';
        mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
        return $ce_idioma;
        $connection->close($connection->myconn);
    }
    public function insertPreferenciasIdioma(SiteUserInfo $usuario, Preferencia $prefer)  
    {  
        $connection = new cnx();
        $connection->connect();        
        $ce_usuario = base64_decode($usuario->getUser_id());
        $ce_idioma = $prefer->getCe_idioma();

        $string = "INSERT INTO tblpreferencia (ce_usuario,ce_idioma) VALUES (?,?)"; 
        $stmt = mysqli_prepare($connection->myconn, $string);
        $stmt->bind_param("ii", $ce_usuario,$ce_idioma);
        $id_idio = $stmt->execute();

        return $id_idio;
        $connection->close($connection->myconn);
    }
    //
    /*public function updateSenha($ce_usuario,$p_senha)  
    {       
        $connection = new cnx();
        $connection->connect();  
        $UtilidadeDAO = new UtilidadeDAO();
        $senha = $UtilidadeDAO->Codificar($p_senha);
        //$query = 'UPDATE tblsite_user SET password = PASSWORD("' . mysqli_real_escape_string($connection->myconn,$p_senha) . '") WHERE user_id = "' . base64_decode($ce_usuario) . '"';
        $query = 'UPDATE tblsite_user SET password = "' . mysqli_real_escape_string($connection->myconn,$senha) . '" WHERE user_id = "' . base64_decode($ce_usuario) . '"';
        mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
        return $query;
        $connection->close($connection->myconn);
    }*/
    //
    public function updateSenha($ce_usuario, $p_senha)
    {
        $connection = new cnx();
        $connection->connect();
    
        $UtilidadeDAO = new UtilidadeDAO();
    
        $userId = (int) base64_decode($ce_usuario);
        $senha = $UtilidadeDAO->Codificar($p_senha);
    
        $stmt = mysqli_prepare($connection->myconn,"UPDATE tblsite_user SET password = ? WHERE user_id = ?");
    
        mysqli_stmt_bind_param($stmt,"si",$senha,$userId);
    
        mysqli_stmt_execute($stmt);
    
        mysqli_stmt_close($stmt);
        $connection->close($connection->myconn);
    
        return true;
    }
    //
    function listarAmingosPerfil($u_fnal,$ses,$n){
        $connection = new cnx();
        $connection->connect();  
        $ce_usuario = base64_decode($u_fnal);
        //$query = 'SELECT su.user_id, su.username, DATE_FORMAT(sui.data_registo,"%d-%m-%Y") AS data_reg FROM tblsite_user su JOIN tblsite_user_info sui ON sui.ce_usuario = su.user_id WHERE su.user_id != "'.$ce_usuario.'" AND user_id not in (SELECT ce_amigo FROM tblamigo )';
        
        $query = "SELECT su.user_id, su.username, DATE_FORMAT(sui.data_registo,'%d-%m-%Y') AS data_reg, sui.ce_sexo as ce_sexo, fotoPerfil FROM tblsite_user su JOIN tblsite_user_info sui ON sui.ce_usuario = su.user_id LEFT JOIN tblamigo a ON a.ce_amigo = su.user_id WHERE su.user_id != $ce_usuario AND su.user_id NOT IN (SELECT ce_amigo FROM tblamigo) ORDER BY RAND() DESC LIMIT $n ";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                ?>
                    <div class="profile-activity clearfix">
                        <div>
                            <?php
                                if($row->fotoPerfil != '' || $row->fotoPerfil != null)
                                {
                                    ?> <img class="nav-user-photo" alt="" src="<?php print $row->fotoPerfil;   ?>" /><?php
                                }else if($row->ce_sexo == 1)
                                {
                                    ?> <img class="nav-user-photo" alt="" src="/nasocial/assets/images/avatars/avatar.png" /><?php
                                }else if($row->ce_sexo == 2)
                                {
                                    ?> <img class="nav-user-photo" alt="" src="/nasocial/assets/images/avatars/avatar3.png" /><?php
                                }else{
                                    ?> <img class="nav-user-photo" alt="" src="/nasocial/assets/images/avatars/avatar2.png" /><?php   
                                }                            ?>
                            
                            <a class="user" href="/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->user_id); ?>"> <?php print $row->username; ?> </a> registou-se à um tempo atraz. 
                            <a href="/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->user_id); ?>&ses=<?php print $ses; ?>">Visitar Perfil</a>
                            <div class="time">
                                <i class="ace-icon fa fa-calendar bigger-110"></i> <?php print $row->data_reg; ?>
                            </div>
			            </div>
                    </div>
                <?php
            }
        }
        $connection->close($connection->myconn);
    }
    //
    function listarUtilizadoresActivos($u_fnal,$ses,$n)
    {
        $connection = new cnx();
        $connection->connect();  
        $ce_usuario = base64_decode($u_fnal);
        //$query = 'SELECT su.user_id, su.username, DATE_FORMAT(sui.data_registo,"%d-%m-%Y") AS data_reg FROM tblsite_user su JOIN tblsite_user_info sui ON sui.ce_usuario = su.user_id WHERE su.user_id != "'.$ce_usuario.'" AND user_id not in (SELECT ce_amigo FROM tblamigo )';
        
        $query = "SELECT su.user_id, su.username, DATE_FORMAT(sui.data_registo,'%d-%m-%Y') AS data_reg, sui.ce_sexo as ce_sexo, sui.fotoPerfil, lu.logado, DATE_FORMAT(lu.data_hora,'%d-%m-%Y') as data_hora FROM tblsite_user su JOIN tblsite_user_info sui ON sui.ce_usuario = su.user_id JOIN tbllog_usuario lu ON lu.ce_usuario = su.user_id WHERE su.user_id != $ce_usuario AND lu.logado = 1 ORDER BY lu.data_hora DESC LIMIT $n";
        //$query = "SELECT su.user_id, su.username, DATE_FORMAT(sui.data_registo,'%d-%m-%Y') AS data_reg, sui.ce_sexo as ce_sexo, fotoPerfil FROM tblsite_user su JOIN tblsite_user_info sui ON sui.ce_usuario = su.user_id LEFT JOIN tblamigo a ON a.ce_amigo = su.user_id WHERE su.user_id != $ce_usuario AND su.user_id NOT IN (SELECT ce_amigo FROM tblamigo) ORDER BY RAND() DESC LIMIT $n ";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                ?>
                    <div class="profile-activity clearfix">
                        <div>
                            <?php
                                if($row->fotoPerfil != '' || $row->fotoPerfil != null)
                                {
                                    ?> 
                                        <img class="nav-user-photo" alt="" src="<?php print $row->fotoPerfil;   ?>" style="height:40px;width:40px;"/>
                                        <!--<div class="nav-user-photo" style="background: url(<?php //print "https://www.lea.co.ao".$row->fotoPerfil; ?>); no-repeat ;height: 10vh;width: 10vh;"></div>-->
                                    <?php
                                }
                                else if($row->ce_sexo == 1)
                                {
                                    ?> <img class="nav-user-photo" alt="" src="https://www.lea.co.ao/nasocial/assets/images/avatars/avatar.png" /><?php
                                }
                                else if($row->ce_sexo == 2)
                                {
                                    ?> <img class="nav-user-photo" alt="" src="https://www.lea.co.ao/nasocial/assets/images/avatars/avatar3.png" /><?php
                                }
                                else
                                {
                                    ?> <img class="nav-user-photo" alt="" src="https://www.lea.co.ao/nasocial/assets/images/avatars/avatar2.png" /><?php   
                                }
                            ?>
                            <a style="color:#2ECC71;" class="user" href="https://www.lea.co.ao/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->user_id); ?>"> <?php print $row->username; ?></a> <?php print $row->data_hora; ?>
			            </div>
                    </div>
                <?php
            }
        }
        $connection->close($connection->myconn);
    }
    //
    function UtilizadoresActivosVerificacao($u_fnal,$ses,$n){
        $connection = new cnx();
        $connection->connect();  
        $ce_usuario = base64_decode($u_fnal);
        //$query = 'SELECT su.user_id, su.username, DATE_FORMAT(sui.data_registo,"%d-%m-%Y") AS data_reg FROM tblsite_user su JOIN tblsite_user_info sui ON sui.ce_usuario = su.user_id WHERE su.user_id != "'.$ce_usuario.'" AND user_id not in (SELECT ce_amigo FROM tblamigo )';
        
        $query = "SELECT su.user_id, su.username, DATE_FORMAT(sui.data_registo,'%d-%m-%Y') AS data_reg, sui.ce_sexo as ce_sexo, sui.fotoPerfil, lu.logado FROM tblsite_user su JOIN tblsite_user_info sui ON sui.ce_usuario = su.user_id JOIN tbllog_usuario lu ON lu.ce_usuario = su.user_id WHERE su.user_id != $ce_usuario AND lu.logado = 1 ORDER BY RAND() DESC LIMIT $n";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                return mysqli_num_rows($result);
            }
        }
        $connection->close($connection->myconn);
    }//
    public function insertPedidoAmizade(PedidoAmizade $p_amizade,SiteUserInfo $usuario)  
    {         
        $connection = new cnx();
        $connection->connect();
        //        
        $ce_usuario_ = base64_decode($usuario->getUser_id());
        $ce_amigo_ = base64_decode($p_amizade->getCe_amigo());
        $QUEM_PEDIU = 0;
        $QUEM_RECEBEU_PEDIDO = 1;
        //
        $string = "INSERT INTO tblpedido_amizade (ce_usuario,ce_amigo,quem_pedio) VALUES (?,?,?)"; 
        $stmt = mysqli_prepare($connection->myconn, $string);
        $stmt->bind_param("iii", $ce_usuario_, $ce_amigo_,$QUEM_PEDIU);
        $contacto_soc = $stmt->execute();
        //
        $string = "INSERT INTO tblpedido_amizade (ce_usuario,ce_amigo,quem_pedio) VALUES (?,?,?)"; 
        $stmt = mysqli_prepare($connection->myconn, $string);
        $stmt->bind_param("iii", $ce_amigo_, $ce_usuario_,$QUEM_RECEBEU_PEDIDO);
        $contacto_soc = $stmt->execute();
        //
        echo("<script>console.log('PHP: Pedido de amizade efectuado com sucesso2! $usuario->getUser_id() ..... $p_amizade->getCe_amigo()');</script>");
        return $contacto_soc;
        $connection->close($connection->myconn);
    }
    //
    public function insertPedidoAmizadeDinamico(PedidoAmizade $p_amizade,SiteUserInfo $usuario)  
    {         
        $connection = new cnx();
        $connection->connect();
        //        
        $ce_usuario_ = base64_decode($usuario->getUser_id());
        $ce_amigo_ = base64_decode($p_amizade->getCe_amigo());
        $QUEM_PEDIU = 0;
        $QUEM_RECEBEU_PEDIDO = 1;
        //
        $string = "INSERT INTO tblpedido_amizade (ce_usuario,ce_amigo,quem_pedio) VALUES (?,?,?)"; 
        $stmt = mysqli_prepare($connection->myconn, $string);
        $stmt->bind_param("iii", $ce_usuario_, $ce_amigo_,$QUEM_PEDIU);
        $contacto_soc = $stmt->execute();
        //
        $string = "INSERT INTO tblpedido_amizade (ce_usuario,ce_amigo,quem_pedio) VALUES (?,?,?)"; 
        $stmt = mysqli_prepare($connection->myconn, $string);
        $stmt->bind_param("iii", $ce_amigo_, $ce_usuario_,$QUEM_RECEBEU_PEDIDO);
        $contacto_soc = $stmt->execute();
        //
        $connection->close($connection->myconn);
        return  array("pedido_efectuado" => 1);
        
    }
    //
    function eliminarPedidoAmizade($usuario_,$amigo_) {
        $connection = new cnx();
        $connection->connect();
        $utilidade = new UtilidadeDAO();
        
        $usuario = $utilidade->Decodificar($usuario_);
        $amigo = $utilidade->Decodificar($amigo_);
        
        $sqlQuery  =  "DELETE FROM tblpedido_amizade WHERE ce_usuario = ? AND ce_amigo = ?";        
        $statement =  $connection->myconn->prepare($sqlQuery);
        $statement->bind_param("ii", $usuario,$amigo);
        $statement->execute();
        //
        $sqlQuery  =  "DELETE FROM tblpedido_amizade WHERE ce_usuario = ? AND ce_amigo = ?";        
        $statement =  $connection->myconn->prepare($sqlQuery);
        $statement->bind_param("ii",$amigo,$usuario);
        $statement->execute();
        $statement->close();
        echo("<script>console.log('PHP: Pedido de Amizade Eliminado com sucesso entre $usuario e $amigo');</script>");
        return $statement;    
        $connection->close($connection->myconn);
    }
    //
    function ExistenciaDeDetalhesBancarios($c_usuario)
    {
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($c_usuario);
        $query = 'SELECT user_id FROM  tblContacto_bancario WHERE user_id = "'. $ce_usuario .'"';
        $result = mysqli_query($connection->myconn,$query);

        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                $exist = $row->user_id;
                return $exist;
            }
        }else{
            return 0;
        }
        $connection->close($connection->myconn);
    }
    //
    public function insertDetalhesBancarios(Usuario $usuario, SiteUserInfo $SiteUserInfo)  
    {  
        $connection = new cnx();
        $connection->connect();
        
        $ce_usuario = base64_decode($usuario->getUser_id());

        $dependencia = $SiteUserInfo->getDependencia();
        $conta = $SiteUserInfo->getConta();
        $iban = $SiteUserInfo->getIban();
                   
        $string = "INSERT INTO tblContacto_bancario (user_id,dependencia,conta,iban) VALUES (?,?,?,?)"; 
        $stmt = mysqli_prepare($connection->myconn, $string);
        $stmt->bind_param("isis", $ce_usuario,$dependencia,$conta,$iban);
        $i_contacto = $stmt->execute();
        echo("<script>console.log('PHP: Detalhes Bancarios Inserido Com Sucesso');</script>");
        return $i_contacto;
    }
    //
    public function ActualizarDetalhesBancarios($ce_usuario,$dependencia,$conta,$iban)  
    {       
        $connection = new cnx();
        $connection->connect();  
        $query = 'UPDATE tblContacto_bancario SET dependencia = "'.$dependencia.'", conta = "'.$conta.'", iban  = "'.$iban.'" WHERE user_id = "' . base64_decode($ce_usuario) . '"';
        mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
        return $query;
        $connection->close($connection->myconn);
    }
    //
    function Dependencia($ce_usuario){
        $connection = new cnx();
        $connection->connect();
        
        $query = 'SELECT * FROM tblContacto_bancario WHERE user_id = "'.base64_decode($ce_usuario).'"';
        $result = mysqli_query($connection->myconn,$query);
        //
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                print $row->dependencia;
            }
        }
        $connection->close($connection->myconn);
    }
    //
    function Conta($ce_usuario){
        $connection = new cnx();
        $connection->connect();
        
        $query = 'SELECT * FROM tblContacto_bancario WHERE user_id = "'.base64_decode($ce_usuario).'"';
        $result = mysqli_query($connection->myconn,$query);
        //
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                print $row->conta;
            }
        }
        $connection->close($connection->myconn);
    }
    //
    function Iban($ce_usuario){
        $connection = new cnx();
        $connection->connect();
        
        $query = 'SELECT * FROM tblContacto_bancario WHERE user_id = "'.base64_decode($ce_usuario).'"';
        $result = mysqli_query($connection->myconn,$query);
        //
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                print $row->iban;
            }
        }
        $connection->close($connection->myconn);
    }
    //
    //
    function ExistenciaDetalhesPessoais($c_usuario)
    {
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($c_usuario);
        $query = 'SELECT user_id FROM  tbldetalhe_pessoal WHERE user_id = "'. $ce_usuario .'"';
        $result = mysqli_query($connection->myconn,$query);

        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                $exist = $row->user_id;
                return $exist;
            }
        }else{
            return 0;
        }
        $connection->close($connection->myconn);
    }
    //
    public function insertDetalhesPessoais (Usuario $usuario, SiteUserInfo $SiteUserInfo)  
    {  
        $connection = new cnx();
        $connection->connect();
        
        $ce_usuario = base64_decode($usuario->getUser_id());

        $bi = $SiteUserInfo->getBi();
        $nContribuente = $SiteUserInfo->getContribuente();
                   
        $string = "INSERT INTO tbldetalhe_pessoal (user_id,bi,n_contribuente) VALUES (?,?,?)"; 
        $stmt = mysqli_prepare($connection->myconn, $string);
        $stmt->bind_param("iss", $ce_usuario,$bi,$nContribuente);
        $execucao = $stmt->execute();
        echo("<script>console.log('PHP: Detalhes Pessoais Inserido Com Sucesso');</script>");
        return $execucao;
    }
    //
    public function ActualizarDetalhesPessoais($ce_usuario,$bi,$nContribuente)  
    {       
        $connection = new cnx();
        $connection->connect();  
        $query = 'UPDATE tbldetalhe_pessoal SET bi = "'.$bi.'", n_contribuente = "'.$nContribuente.'" WHERE user_id = "' . base64_decode($ce_usuario) . '"';
        mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
        return $query;
        $connection->close($connection->myconn);
    }
    //
    function Bi($ce_usuario){
        $connection = new cnx();
        $connection->connect();
        
        $query = 'SELECT * FROM tbldetalhe_pessoal WHERE user_id = "'.base64_decode($ce_usuario).'"';
        $result = mysqli_query($connection->myconn,$query);
        //
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                print $row->bi;
            }
        }
        $connection->close($connection->myconn);
    }
    //
    function Contribuente($ce_usuario){
        $connection = new cnx();
        $connection->connect();
        
        $query = 'SELECT * FROM tbldetalhe_pessoal WHERE user_id = "'.base64_decode($ce_usuario).'"';
        $result = mysqli_query($connection->myconn,$query);
        //
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                print $row->n_contribuente;
            }
        }
        $connection->close($connection->myconn);
    }
}
//FIM DA CLASS    
?>