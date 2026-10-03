<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/login/Login.php');
    $lo_in = new Login();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UtilidadeDAO.php');
    $util = new UtilidadeDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/login/Login.php');
    $login = new Login();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/login/g_variaveis.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UtilidadeDAO.php');
    $utilidade = new UtilidadeDAO();  
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Idioma.php');
    $cla_idioma = new Idioma();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/usuario/class.AmigoDAO.php');
    $amigo = new AmigoDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/lojaonline/NovoProduto.php');
    $novo_p = new NovoProduto();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/usuario/class.PublicarDAO.php');
            $postes = new PublicarDAO();
            include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/usuario/LinhaTempo.php');
            $lt = new LinhaTempo();
            ////930096103//
            $menu_ativo = basename($_SERVER['SCRIPT_NAME']);
            $lo = $GET_['lo'];
            //
            /*
            if($util->getUseragent() === $login->VerificarAgente($util->getUseragent()))
            { 
                if($login->VerificarlogId($util->getUseragent()) === 1){
                    $usuario = $u_fnal = $usuario_final = $login->VerificarAgenteUserId($util->getUseragent());
                    $utilizador = $usuario_final;
                    $idioma = $cla_idioma->idiomaPreferencia($login->VerificarAgenteUserId($util->getUseragent())); 
                }
            }else{ 
                echo '<script type="text/javascript"> window.location = "/nasocial/login/login.php?pes=0&ses=0" </script>'; 
            }
            */
?>