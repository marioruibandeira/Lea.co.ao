<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Comentarios.php');
    $Comentario = new Comentarios();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.ComentariosDAO.php');
    $ComentarioDAO = new ComentariosDAO();
    //
    $origem = $_POST['origem'] ? trim($_POST['origem']) : '';
    $origem_ = $_POST['origem_'] ? trim($_POST['origem_']) : '';
    $fk_publicacao = $_POST['id_publicacao'] ? trim($_POST['id_publicacao']) : '';
    $Comentario->setId_comentario_post($fk_publicacao);
    $fk_utilizador = $_POST['fk_utilizador'] ? trim($_POST['fk_utilizador']) : '';
    $Comentario->setFk_utilizador($fk_utilizador);
    $comentario = $_POST['comentario'] ? trim($_POST['comentario']) : '';
    $Comentario->setComentario($comentario);
    //
    if($origem == '400' ) {
        if($ComentarioDAO->VerificarExistenGostoPublicacao($fk_publicacao,$fk_utilizador) > 0)
        {
            $ComentarioDAO->EliminarGostoPublicacao($Comentario);
            //print "Curtição Eliminado com Sucesso!";
                
            if($origem_ == 40)
            {
               echo '<script type="text/javascript"> window.location = "/nasocial/publicacao.php?pub='.$fk_publicacao.'" </script>';    
            }
            if($origem_ == 41){
               echo '<script type="text/javascript"> window.location = "/nasocial/publicacao.php?pub='.$fk_publicacao.'" </script>'; 
            }
        }else{
            //print "Curtição inserido com Sucesso!";
            $ComentarioDAO->InserirGostoPublicacao($Comentario);
            if($origem_ == 40)
            {
               echo '<script type="text/javascript"> window.location = "/nasocial/publicacao.php?pub='.$fk_publicacao.'" </script>';    
            }
            if($origem_ == 41){
                echo '<script type="text/javascript"> window.location = "/nasocial/publicacao.php?pub='.$fk_publicacao.'" </script>'; 
            }  
        }
    }else{
        if($ComentarioDAO->inserirComentario($Comentario))
        {
            if($origem == 0 ) {
                print "Comentario Inserido Com Sucesso!";
                echo '<script type="text/javascript"> window.location = "/nasocial/publicacao.php?pub='.$fk_publicacao.'" </script>';
            }
            if($origem == 1 ) {
                print "Comentario Inserido Com Sucesso!";
                echo '<script type="text/javascript"> window.location = "/nasocial/publicacao.php?pub='.$fk_publicacao.'" </script>';
            }
        }
    }
    //
    print $ComentarioDAO->TotalDeCurtidasComentarios($fk_publicacao);
    
?>