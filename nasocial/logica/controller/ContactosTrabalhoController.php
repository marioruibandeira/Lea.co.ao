<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.ContactosTrabalho.php');
    $ContactosTrabalho_ = new ContactosTrabalho();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.ContactosTrabalhoDAO.php');
    $ContactosTrabalhoDAO_ = new ContactosTrabalhoDAO();
    //Pegando Valores
    $main = isset($_POST['main']) ? trim($_POST['main']) : '';
    $accao = isset($_POST['accao']) ? trim($_POST['accao']) : '';
    
    $ce_artista = $_POST['ce_artista'] ? trim($_POST['ce_artista']) : '';
    $ContactosTrabalho_->setCe_artista($ce_artista);
    $ce_usuario = $_POST['ce_usuario'] ? trim($_POST['ce_usuario']) : '';
    $ContactosTrabalho_->setCe_usuario($ce_usuario);
    $telefone = $_POST['telefone'] ? trim($_POST['telefone']) : '';
    $ContactosTrabalho_->setTelefone($telefone);
    $whatsapp = $_POST['whatsApp'] ? trim($_POST['whatsApp']) : '';
    $ContactosTrabalho_->setWhatsapp($whatsapp);
    
    if($main === "1")
    {
        if($accao === "0")
        {
            echo json_encode( $ContactosTrabalhoDAO_->InserirContactoWhatsapp($ContactosTrabalho_));
        }
    }
    else
    {
        if($accao === "0")
        {
            echo json_encode( $ContactosTrabalhoDAO_->InserirContactoTrabalho($ContactosTrabalho_));
        }
    }
    
    if($accao === "1")
    {
        echo json_encode( $ContactosTrabalhoDAO_->ActualizarContacto($ContactosTrabalho_));
    }
    
    if($accao === "2")
    {
        echo json_encode( $ContactosTrabalhoDAO_->EliminarContactoTrabalho($ContactosTrabalho_));
    }
?>