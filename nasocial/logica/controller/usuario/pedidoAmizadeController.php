<?php
    //session_start();
    //
    //$mysession = $_SESSION['logged'];
    //
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.PedidoAmizade.php');
    $p_amizade = new PedidoAmizade();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.SiteUserInfo.php');
    $usuario_info = new SiteUserInfo();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UsuarioDAO.php');
    $updateDados = new UsuarioDAO();
    //
    $ce_usuario_ = isset($_POST['ce_usuario']) ? trim($_POST['ce_usuario']) : '';
    $usuario_info->setUser_id($ce_usuario_);
    //
    $ce_amigo_ = isset($_POST['ce_amigo']) ? trim($_POST['ce_amigo']) : '';
    $p_amizade->setCe_amigo($ce_amigo_);
    //
    $orgen = isset($_POST['orgen']) ? trim($_POST['orgen']) : '';
    //    
    if($orgen===ami){
        if($updateDados->insertPedidoAmizade($p_amizade,$usuario_info)){
                print "Pedido de Amizade efectuada com sucesso!<br/>";
                $ce_amigo_f = base64_encode($ce_amigo_);
                print "<script type='text/javascript'> window.location = 'https://www.lea.co.ao/nasocial/usuario/per-ami.php?ami=$ce_amigo_' </script>";
        }
    }
    //
    if($orgen===desc){
        if($updateDados->eliminarPedidoAmizade($ce_usuario_,$ce_amigo_)){
            print "Pedido de Amizade Eliminado Com Sucesso!<br/>";
            $ce_amigo_f = base64_encode($ce_amigo_);
            print "<script type='text/javascript'> window.location = 'https://www.lea.co.ao/nasocial/usuario/per-ami.php?ami=$ce_amigo_' </script>";
        }
    }
    //
    if($orgen==='amigos')
    {
        echo json_encode($updateDados->insertPedidoAmizadeDinamico($p_amizade,$usuario_info));
    }
?>