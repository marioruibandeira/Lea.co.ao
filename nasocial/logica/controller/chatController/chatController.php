<?php
    //
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/chat/class.MensagemDAO.php');
    $mensagemDAO = new MensagemDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.SiteUserInfo.php');
    $usuario = new SiteUserInfo();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Amigo.php');
    $amgo = new Amigo();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Mensagem.php');
    $msgem = new Mensagem();
    //
    $ce_usuario = $_POST['ce_usuario'] ? trim($_POST['ce_usuario']) : '';
    $ce_amigo = $_POST['ce_amigo'] ? trim($_POST['ce_amigo']) : '';
    $mensagem = $_POST['mensagem'] ? trim($_POST['mensagem']) : '';
    //print "ce_usuario->" . $ce_usuario . " | ce_amigo->" . $ce_amigo . " | mensagem->" . $mensagem;
    
    $usuario->setUser_id($ce_usuario);
    $amgo->setId_amigo($ce_amigo);
    $msgem->setMensagem($mensagem);
    $msgem->setEmissor($ce_usuario);
    //
    if($mensagemDAO->inserirMensangem($msgem,$usuario,$amgo)){
        print "Mensagem Inserido Com Sucesso!";
        print '<script type="text/javascript"> window.location = "https://www.lea.co.ao/nasocial/usuario/chat.php?amg='.$amgo->getId_amigo().'&us='.$usuario->getUser_id().'"</script>';
    }
    
?>

