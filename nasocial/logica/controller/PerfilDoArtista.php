<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.PerfilDoArtista.php');
    $PerfilDoArtista_ = new PerfilDoArtista();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.PerfilDoArtistaDAO.php');
    $PerfilDoArtistaDAO_ = new PerfilDoArtistaDAO();
    //Pegando Valores
    $accao = isset($_POST['accao']) ? trim($_POST['accao']) : '';
    
    $actual_input = $_POST['actual_input'] ? trim($_POST['actual_input']) : '';
        $PerfilDoArtista_->setActualizacoes($actual_input);
    $ce_artista = $_POST['ce_artista'] ? trim($_POST['ce_artista']) : '';
        $PerfilDoArtista_->setCe_artista($ce_artista);
    $ce_usuario = $_POST['ce_usuario'] ? trim($_POST['ce_usuario']) : '';
        $PerfilDoArtista_->setCe_usuario($ce_usuario);
        
    if($accao === "0")
    {
        echo json_encode( $PerfilDoArtistaDAO_->ActualizarActualizacoesPerfil($PerfilDoArtista_));
    }
?>