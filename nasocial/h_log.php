<?php
    //Log in sistema
    //Security validation
    //Version 0.2
    //lasta update 17/02/2023
    
    if($login->VerificarSessionID($logado) > 0 )
    {
        if($login->VerificarAgente($util->getUseragent())) 
        { 
            if($login->VerificarlogId($util->getUseragent()) == 1)
            { 
                $sessionOn = $login->VerificarSessionID($logado);
                $usuario = $u_fnal = $usuario_final = $login->VerificarUserAccount($logado);  
                $utilizador = $login->VerificarUserAccount($logado); 
                
                $idioma = $cla_idioma->idiomaPreferencia($login->VerificarUserAccount($logado));
            } 
        }
        else
        { 
            echo '<script type="text/javascript"> window.location = "https://lea.co.ao/nasocial/login/login.php" </script>'; 
        } 
    }
    else
    { 
        echo '<script type="text/javascript"> window.location = "https://lea.co.ao/nasocial/login/login.php" </script>'; 
    }
?>