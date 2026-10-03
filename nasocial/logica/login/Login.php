<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/conexao/cnx.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.SiteUserInfo.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UtilidadeDAO.php');
//
class Login 
{
    function logInSistema($username, $password)
    {
        $connection = new cnx();
        $connection->connect();
        $UtilidadeDAO = new UtilidadeDAO();
        
        $senha = $UtilidadeDAO->Codificar($password);
    
        if (empty($senha) || empty($password)) {
            return 0;
        }
    
        $stmt = $connection->myconn->prepare(
            "SELECT password FROM tblsite_user WHERE username = ? LIMIT 1"
        );
    
        $stmt->bind_param("s", $username);
        $stmt->execute();
    
        $result = $stmt->get_result();
    
        if ($row = $result->fetch_assoc()) {
            if ($senha === $row['password']) {
                return 1; 
            }
        }
    
        return 0; 
    }
    //
    function Logado_($username)
    {
        $connection = new cnx();
        $connection->connect();
        
        $query = 'SELECT * FROM tbllog_usuario WHERE ce_usuario = "' . $username . '"' ;	
        $result = mysqli_query($connection->myconn,$query);
		
        if (mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                $logado = $row->logado;
                return $logado;
            }
        }else{
                $logado = 0;
                return $logado;
        }
    }
    //
    function checkerUsuario($n_usuario)
    {
        $connection = new cnx();
        $connection->connect();
        
        $query = 'SELECT * FROM tblsite_user WHERE username = "'.$n_usuario.'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            $valor_exist = 1;
            return $valor_exist;
        }else{
            $valor_exist = 0;
            return $valor_exist;
        }
    }
    
    function nomeUsuario($n_usuario)
    {
        $connection = new cnx();
        $connection->connect();
        $u_f = base64_decode($n_usuario);
        
        $query = 'SELECT * FROM tblsite_user WHERE user_id = "'.$u_f.'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                $n_usuario = $row->username;
                return $n_usuario;
            }
        }else{
            $n_usuariot = 0;
            return $n_usuario;
        }
    }
    //
    function nomeUsuarioStatuUsuario($n_usuario)
    {
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
            print '<script type="text/javascript"> window.location = "/nasocial/login/login.php?pes=MA==" </script>';
        }
    }
    //
    function FotoPerfilTopMenuDireita($n_usuario)
    {
        $connection = new cnx();
        $connection->connect();
        $u_f = base64_decode($n_usuario);
        $caminho = "/nasocial/imgs/perfil/";
        
        $query = 'SELECT * FROM  tblsite_user_info WHERE ce_usuario = "'.$u_f.'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result))
            {
                if($caminho != $row->fotoPerfil && $row->fotoPerfil != '' && $row->fotoPerfil != null)
                {
                    ?> <img class="nav-user-photo" alt="Foto do Utilizador" src="<?php print $row->fotoPerfil;   ?>" /><?php
                }else if($row->ce_sexo == 1)
                {
                    ?> <img class="nav-user-photo" alt="Foto do Utilizador" src="/nasocial/assets/images/avatars/avatar.png"  /><?php
                }else if($row->ce_sexo == 2)
                {
                    ?> <img class="nav-user-photo" alt="Foto do Utilizador" src="/nasocial/assets/images/avatars/avatar3.png" /><?php
                }else{
                    ?> <img class="nav-user-photo" alt="Foto do Utilizador" src="/nasocial/assets/images/avatars/avatar2.png" /><?php   
                }
            }            
        }else{
            print '<script type="text/javascript"> window.location = "/nasocial/login/login.php?pes=MA==" </script>';
        }
    }
    //
    function FotoPerfilTopMenuDireitaLEAcoao($n_usuario)
    {
        $connection = new cnx();
        $connection->connect();
        $u_f = base64_decode($n_usuario);
        
        $query = 'SELECT * FROM  tblsite_user_info WHERE ce_usuario = "'.$u_f.'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result))
            {
                if($row->fotoPerfil != '' || $row->fotoPerfil != null)
                {
                    ?> 
                        <a href="http://www.lea.co.ao/nasocial/perfil.php" class="header-wrapicon1 dis-block" >
						    <img src="<?php print $row->fotoPerfil;   ?>" class="header-icon1" alt="lea.co.ao" style="border-radius: 50%;">
					    </a>
			        <?php
                }else{
                    ?> 
                        <a href="http://www.lea.co.ao/nasocial/perfil.php" class="header-wrapicon1 dis-block">
						    <img src="http://lea.co.ao/images/icons/icon-header-01.png" class="header-icon1" alt="lea.co.ao">
					    </a>
			        <?php   
                }
            }            
        }
    }
    //
    function FotoPerfilTopMenuDireitaLEAcoao_($n_usuario)
    {
        $connection = new cnx();
        $connection->connect();
        $u_f = base64_decode($n_usuario);
        
        $query = 'SELECT * FROM  tblsite_user_info WHERE ce_usuario = "'.$u_f.'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result))
            {
                if($row->fotoPerfil != '' || $row->fotoPerfil != null)
                {
                    ?> <a href="http://www.lea.co.ao/nasocial/perfil.php" class="header-wrapicon1 dis-block" ><img src="<?php print $row->fotoPerfil;?>" class="header-icon1" alt=" " style="border-radius:50%;border: 1px solid #ccc;" width="37" height="37"></a> <?php
                }else{
                    ?> <a href="http://www.lea.co.ao/nasocial/perfil.php" class="header-wrapicon1 dis-block"> <img src="http://lea.co.ao/images/icons/icon-header-01.png" class="header-icon1" alt=" " width="36" height="36"></a><?php   
                }
            }            
        }else{
            print '<script type="text/javascript"> window.location = "http://www.lea.co.ao/nasocial/login/login.php?pes=MA==" </script>';
        }
    }
    //
    function chaveUsuario($usuario)
    {
        $connection = new cnx();
        $connection->connect();
        $dsc_f = base64_decode($usuario);
        
        $query = 'SELECT * FROM tblsite_user WHERE username = "'.$dsc_f.'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                $valor_user_id = $row->user_id;
                return base64_encode($valor_user_id);
            }    
        }
    }
    //
    function NumeroVendedor($usuario)
    {
        $connection = new cnx();
        $connection->connect();
        $dsc_f = base64_decode($usuario);
        
        $query = "SELECT * FROM tblsite_user WHERE user_id = $dsc_f";
        $result = mysqli_query($connection->myconn,$query);
        
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                print "0" . $row->user_id . "0";
            }    
        }
    }
    //
    /*function inserirNovoUsuario($n_usuario,$p_pass,$u_email)
    {
        $connection = new cnx();
        $connection->connect();
        $UtilidadeDAO = new UtilidadeDAO();
        $senha = $UtilidadeDAO->Codificar($p_pass);

        $query = 'INSERT INTO tblsite_user (username, password) VALUES ("' . mysqli_real_escape_string($connection->myconn,$n_usuario) . '","' . mysqli_real_escape_string($connection->myconn,$senha) . '" )';
        $result = mysqli_query($connection->myconn,$query);
        $user_id = mysqli_insert_id($connection->myconn);
        //
        $query2 = 'INSERT INTO tblsite_user_info (ce_usuario,email) VALUES (' . $user_id . ', ' . '"' . mysqli_real_escape_string($connection->myconn,$u_email).'")';
        $result2 = mysqli_query($connection->myconn,$query2);

        return $result2;
    }*/
    //
    function inserirNovoUsuario($n_usuario, $p_pass, $u_email)
    {
        $connection = new cnx();
        $connection->connect();
        $UtilidadeDAO = new UtilidadeDAO();
        $senha = $UtilidadeDAO->Codificar($p_pass);
    
        // Inserir na tblsite_user
        $stmt = $connection->myconn->prepare(
            "INSERT INTO tblsite_user (username, password) VALUES (?, ?)"
        );
        $stmt->bind_param("ss", $n_usuario, $senha);
        $stmt->execute();
    
        $user_id = $connection->myconn->insert_id;
        $stmt->close();
    
        if (!$user_id) {
            return false; // falha ao inserir usuário
        }
    
        // Inserir na tblsite_user_info
        $stmt2 = $connection->myconn->prepare(
            "INSERT INTO tblsite_user_info (ce_usuario, email) VALUES (?, ?)"
        );
        $stmt2->bind_param("is", $user_id, $u_email);
        $result2 = $stmt2->execute();
        $stmt2->close();
    
        return $result2;
    }
//
    public function inserirLog(SiteUserInfo $usuario)  
    {  
        $connection = new cnx();
        $connection->connect();
        
        $ce_usuario = base64_decode($usuario->getUser_id());

        $logado = 1;
        $agente = $usuario->getAgente();
        $session = $usuario->getSession();
                   
        $string = "INSERT INTO tbllog_usuario (ce_usuario,logado, agente,session) VALUES (?,?,?,?)"; 
        $stmt = mysqli_prepare($connection->myconn, $string);
        $stmt->bind_param("iiss", $ce_usuario,$logado,$agente,$session);
        $log = $stmt->execute();
        
        return $log;
    }
    //
    function log_existe($ce_usuario)
    {
        $connection = new cnx();
        $connection->connect();
    
        $ce_usuario_ = base64_decode($ce_usuario);
    
        $stmt = $connection->myconn->prepare(
            "SELECT ce_usuario FROM tbllog_usuario WHERE ce_usuario = ? LIMIT 1"
        );
    
        $stmt->bind_param("s", $ce_usuario_);
        $stmt->execute();
    
        $result = $stmt->get_result();
    
        if ($row = $result->fetch_assoc()) {
            return $row['ce_usuario'];
        }
    
        return 0; // não existe
    }
    //
    function actualizarLog(SiteUserInfo $usuario)
    {
        $connection = new cnx();
        $connection->connect();
        //
        $ce_usuario = base64_decode($usuario->getUser_id());
        //
        $query = 'UPDATE tbllog_usuario SET logado = "0", agente=" ", session=" " WHERE ce_usuario = "' . $ce_usuario . '"';
        mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
        echo("<script>console.log('PHP: Utilizador Saio Com Sucesso! $ce_usuario');</script>");
    }
    //
    function actualizarLogLonIn(SiteUserInfo $usuario)
    {
        $connection = new cnx();
        $connection->connect();
    
        $ce_usuario = base64_decode($usuario->getUser_id());
        $agente_ = $usuario->getAgente();
        $session = $usuario->getSession();
    
        $stmt = $connection->myconn->prepare(
            "UPDATE tbllog_usuario 
             SET data_hora = CURRENT_TIME,
                 logado = 1,
                 agente = ?,
                 session = ?
             WHERE ce_usuario = ?"
        );
    
        $stmt->bind_param("sss", $agente_, $session, $ce_usuario);
    
        $stmt->execute();
    }
    //
    function VerificarAgente($agente){
        $connection = new cnx();
        $connection->connect();
        
        $query = 'SELECT * FROM tbllog_usuario WHERE agente = "'.$agente.'"';
        $result = mysqli_query($connection->myconn,$query);
        //
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                $agente_ = $row->agente;
                return $agente_;
            }
        }else{
            $agente_ = 0;
            return $agente_;
        }
    }
    //
    function VerificarSession($session){
        $connection = new cnx();
        $connection->connect();
        
        $query = 'SELECT * FROM tbllog_usuario WHERE session = "'.$session.'"';
        $result = mysqli_query($connection->myconn,$query);
        //
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                $session_ = $row->session;
                return $session_;
            }
        }else{
            $session_ = 0;
            return $session_;
        }
    }
    //
    function VerificarSessionID($session) {
        $connection = new cnx();
        $connection->connect();
    
        // Prepared statement para segurança
        $stmt = $connection->myconn->prepare(
            "SELECT 1 FROM tbllog_usuario WHERE session = ? LIMIT 1"
        );
        $stmt->bind_param("s", $session);
        $stmt->execute();
    
        $stmt->store_result(); // necessário para mysqli_num_rows
        $exists = $stmt->num_rows > 0 ? 1 : 0;
    
        $stmt->close();
        return $exists;
    }
    //
    function VerificarAgenteUserId($agente)
    {
        $connection = new cnx();
        $connection->connect();
        //$agente = base64_decode($agente_);
        echo("<script>console.log('PHP: ok entendi $agente');</script>");

        $query = 'SELECT * FROM tbllog_usuario WHERE agente = "'. $agente .'"';
        $result = mysqli_query($connection->myconn,$query);

        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                $ce_usuario = base64_encode($row->ce_usuario);
                return $ce_usuario;
            }
        }else{
            $ce_usuario = 0;
            return $ce_usuario;
        }
    }
    //
    function VerificarUserAccount($session)
    {
        $connection = new cnx();
        $connection->connect();
    
        $stmt = $connection->myconn->prepare(
            "SELECT ce_usuario FROM tbllog_usuario WHERE session = ? LIMIT 1"
        );
    
        $stmt->bind_param("s", $session);
        $stmt->execute();
    
        $result = $stmt->get_result();
    
        if ($row = $result->fetch_object()) {
            return base64_encode($row->ce_usuario);
        } else {
            return 0;
        }
    }
	
	function VerificarUserAccount_($session)
	{
		$connection = new cnx();
		$connection->connect();

		$stmt = $connection->myconn->prepare(
			"SELECT ce_usuario FROM tbllog_usuario WHERE session = ? LIMIT 1"
		);

		$stmt->bind_param("s", $session);
		$stmt->execute();

		$result = $stmt->get_result();

		if ($row = $result->fetch_object()) {
			return (int) $row->ce_usuario;   
		} else {
			return 0;
		}
	}
    //
    function VerificarlogId($agente){
        $connection = new cnx();
        $connection->connect();
        //$agente = base64_decode($agente_);
        echo("<script>console.log('PHP: ok entendi $agente');</script>");

        $query = 'SELECT * FROM tbllog_usuario WHERE agente = "'. $agente .'"';
        $result = mysqli_query($connection->myconn,$query);

        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                $logado = $row->logado;
                return $logado;
            }
        }else{
            $logado = 0;
            return $logado;
        }
    }
    //
    function VerificarSessao($sessao){
        $connection = new cnx();
        $connection->connect();
        //$agente = base64_decode($agente_);

        $query = 'SELECT * FROM tbllog_usuario WHERE session = "'. $sessao .'"';
        $result = mysqli_query($connection->myconn,$query);

        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                return 1;
            }
        }else{
            $logado = 0;
            return $logado;
        }
    }
    
}

