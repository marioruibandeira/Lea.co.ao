<?php
    session_start();
    //Importação de ficheiros uteis
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/login/Login.php');
    $log_in = new Login();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UsuarioDAO.php');
    $updateDados = new UsuarioDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Preferencia.php');
    $prefe = new Preferencia();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.SiteUserInfo.php');
    $usuario_info = new SiteUserInfo();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UtilidadeDAO.php');
    $util = new UtilidadeDAO();
    //
    $n_usuario = (isset($_POST['n_usuario'])) ? trim($_POST['n_usuario']) : '';
    $email = (isset($_POST['email'])) ? trim($_POST['email']) : '';
    $p_pass = (isset($_POST['p_pass'])) ? trim($_POST['p_pass']) : '';
    $p_pass_2 = (isset($_POST['p_pass_2'])) ? trim($_POST['p_pass_2']) : '';
    $aceito_regras = (isset($_POST['aceita_regra'])) ? trim($_POST['aceita_regra']) : '';
    $btn_registar = (isset($_POST['tbn_reg'])) ? trim($_POST['tbn_reg']) : '';
    //
    $u_email = $email;
    
    $dominio = ".lea.co.ao";
    //
    if($p_pass != $p_pass_2)
    {
        if (isset($_COOKIE['user_logged'])) {
            setcookie("user_logged", "", time() - 42000, "/", $dominio, true, true);
        }
        
        // 2. Limpar a Sessão do servidor (por segurança extra)
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
    
        echo 0;
        
        session_unset();
        session_destroy();
    }
    else
    {
        $u_existe = $log_in->checkerUsuario($n_usuario); 
        //
        if ($u_existe > 0) 
        { 
            print 1; 
            session_unset();
            session_destroy();
            
            setcookie("user_logged", "", time() - 3600, "/", $dominio, true, true);
            unset($_COOKIE['user_logged']);
        }
        else
        { 
            $cookie_value = $util->Codificar($n_usuario);

            setcookie("user_logged", $cookie_value, time() + (86400 * 30), "/", $dominio, false, true);
            
            $cookie = $_COOKIE['user_logged'];
            
            $log_in->inserirNovoUsuario($n_usuario,$p_pass,$u_email);  
            
            $u_n = $util->Codificar($n_usuario);

            $id_usuario = $log_in->chaveUsuario($u_n);
            //
            $usuario_info->setUser_id($id_usuario);
            $usuario_info->setAgente($util->getUseragent());
            $usuario_info->setSession($cookie_value);
            
            print 2;
            
            $prefe->setCe_idioma(1); 
            
            if($updateDados->existePreferencias($id_usuario) == $id_usuario){
                if($id_idio > 0){
                    if($updateDados->updateId_idioma($usuario_info,$prefe)) { }        
                }
            }
            else
            {        
                if($updateDados->insertPreferenciasIdioma($usuario_info,$prefe)) { }
            }
            //
            $existe = $log_in->log_existe($id_usuario,$session);
            //
            if($existe > 0){                 
                $log_in->actualizarLogLonIn($usuario_info);                                 
            } else {     
                $log_in->inserirLog($usuario_info);
            }
        }
    }
    //
?>
