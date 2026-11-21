<?php
    //Ficheiro Necessários
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UtilidadeDAO.php');
    $UtilidadeDAO = new UtilidadeDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.ReacoesDAO.php');
    $ReacoesDAO = new ReacoesDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Reacoes.php');
    $Reacoes = new Reacoes();
    //
    $id_reacoes = $_POST['id_reacoes'] ? trim($_POST['id_reacoes']) : '';
    $Reacoes->setId_emojis($id_reacoes);
    $user_id = $_POST['user_id'] ? trim($_POST['user_id']) : '';
    $Reacoes->setUser_id($user_id);
    $id_linha_tempo = $_POST['id_linha_tempo'] ? trim($_POST['id_linha_tempo']) : '';
    $Reacoes->setId_linha_tempo($id_linha_tempo);
    
    if($id_reacoes == '1')
    {
        if($ReacoesDAO->ValidarExistenciaDeEmojisAmei($id_linha_tempo,$user_id) > 0)
        {
            if($ReacoesDAO->EliminarEmojis($Reacoes)){
                echo $ReacoesDAO->TotalReacoesAmei($id_linha_tempo,$id_reacoes);    
            }    
        }else{
            if($ReacoesDAO->InserirEmojisPublicacao($Reacoes)){
                echo $ReacoesDAO->TotalReacoesAmei($id_linha_tempo,$id_reacoes);    
            }   
        }   
    }elseif($id_reacoes == '2')
    {
        if($ReacoesDAO->ValidarExistenciaDeEmojisEngracado($id_linha_tempo,$user_id) > 0)
        {
            if($ReacoesDAO->EliminarEmojis($Reacoes)){
                echo $ReacoesDAO->TotalReacoesEngracado($id_linha_tempo,$id_reacoes);    
            }    
        }else{
            if($ReacoesDAO->InserirEmojisPublicacao($Reacoes)){
                echo $ReacoesDAO->TotalReacoesEngracado($id_linha_tempo,$id_reacoes);    
            }   
        }     
    }elseif($id_reacoes == '3'){
        if($ReacoesDAO->ValidarExistenciaDeEmojisTriste($id_linha_tempo,$user_id) > 0)
        {
            if($ReacoesDAO->EliminarEmojis($Reacoes)){
                echo $ReacoesDAO->TotalReacoesTriste($id_linha_tempo,$id_reacoes);    
            }    
        }else{
            if($ReacoesDAO->InserirEmojisPublicacao($Reacoes)){
                echo $ReacoesDAO->TotalReacoesTriste($id_linha_tempo,$id_reacoes);    
            }   
        }     
    }elseif($id_reacoes == '5'){
        if($ReacoesDAO->ValidarExistenciaDeEmojisChateado($id_linha_tempo,$user_id) > 0)
        {
            if($ReacoesDAO->EliminarEmojis($Reacoes)){
                echo $ReacoesDAO->TotalReacoesChateado($id_linha_tempo,$id_reacoes);    
            }    
        }else{
            if($ReacoesDAO->InserirEmojisPublicacao($Reacoes)){
                echo $ReacoesDAO->TotalReacoesChateado($id_linha_tempo,$id_reacoes);    
            }   
        }     
    }elseif($id_reacoes == '6'){
        if($ReacoesDAO->ValidarExistenciaDeEmojisSupreso($id_linha_tempo,$user_id) > 0)
        {
            if($ReacoesDAO->EliminarEmojis($Reacoes)){
                echo $ReacoesDAO->TotalReacoesSupreso($id_linha_tempo,$id_reacoes);    
            }    
        }else{
            if($ReacoesDAO->InserirEmojisPublicacao($Reacoes)){
                echo $ReacoesDAO->TotalReacoesSupreso($id_linha_tempo,$id_reacoes);    
            }   
        }     
    }
    //
?>