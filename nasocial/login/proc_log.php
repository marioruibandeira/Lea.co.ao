<?php
session_start();

    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/login/Login.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Usuario.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.SiteUserInfo.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UtilidadeDAO.php');
    
    $log_in = new Login();
    $usuario = new SiteUserInfo();
    $util = new UtilidadeDAO();
    
    $username = (isset($_POST['username'])) ? trim($_POST['username']) : '';
    $password = (isset($_POST['password'])) ? $_POST['password'] : '';
    
    if (empty($username) || empty($password)) {
        echo 0;
        exit;
    }
    
    $log = $log_in->logInSistema($username, $password);
    
    if ($log > 0) 
    {
        $cookie_value = $util->Codificar($username);
        $idUsuario = $log_in->chaveUsuario($cookie_value);
        $existe = $log_in->log_existe($idUsuario);
                
        if ($existe > 0) 
        {
            $dominio = ".localhost";
            
            $cooki = setcookie("user_logged", $cookie_value, time() + (86400 * 30), "/", $dominio, true, true);
    
            $usuario->setUser_id($idUsuario);
            $usuario->setAgente($util->getUseragent());
            $usuario->setSession($cookie_value);
            
            $log_in->actualizarLogLonIn($usuario); 
            
            echo $log;
            
        } else {
            finalizarSessao();
        }
        
    } else {
        finalizarSessao();
    }
    
    function finalizarSessao() 
    {
        if (isset($_COOKIE['user_logged'])) 
        {
            //setcookie("user_logged", "", time() - 3600, "/");
            setcookie("user_logged", "", time() - 3600, "/", "localhost");
            //setcookie("user_logged", "", time() - 3600, "/", ".localhost:8080");
            //setcookie("user_logged", "", time() - 3600, "/", "www.lea.co.ao");
            
            unset($_COOKIE['user_logged']);
        }
        
        // Limpa a sessão
        $_SESSION = array();
        if (ini_get("session.use_cookies")) 
        {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], 
                $params["domain"],
                $params["secure"], 
                $params["httponly"]
            );
        }
        echo 0;
    }
?>