<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.DiscografiaDAO.php');
    $DiscografiaDAO = new DiscografiaDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.LivrosDAO.php');
    $LivrosDAO = new LivrosDAO();
    
    $accao = is_int(intval($_GET['accao'])) ? trim($_GET['accao']) : '';
    $id_produto_servico = is_int(intval($_GET['id_ps'])) ? trim($_GET['id_ps']) : '';
    $ce_usuario = is_int(intval($_GET['usu'])) ? trim($_GET['usu']) : '';
    
    if($accao == '0')
    { 
        if($DiscografiaDAO->EliminarObraDiscografica($id_produto_servico)){
            print "Obra Discografica eliminada com sucesso!";
            echo '<script type="text/javascript"> window.location = "https://www.lea.co.ao/nasocial/loja/discografia.php?acao=1" </script>';
        }
    }
    
    if($accao == '1')
    { 
        if($LivrosDAO->EliminarLivro($id_produto_servico)){
            print "Obra Discografica eliminada com sucesso!";
            echo '<script type="text/javascript"> window.location = "https://www.lea.co.ao/nasocial/loja/livros.php?acao=1" </script>';
        }
    }
?>