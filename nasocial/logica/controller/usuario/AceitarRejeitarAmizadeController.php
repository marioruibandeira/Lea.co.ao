<?php
/* --/---*/
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Amizade.php');
$amizade = new Amizade();
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/usuario/class.PedidoAmizadeDAO.php');
$amigoDAO = new PedidoAmizadeDAO();
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UsuarioDAO.php');
$updateDados = new UsuarioDAO();
//
$orgn = $_GET['orgn'] ? trim($_GET['orgn']) : '';
//
$ce_usuario = $_GET['ce_us'] ? trim($_GET['ce_us']) : '';
$amizade->setCe_usuario($ce_usuario);
$ce_amigo = $_GET['ce_amig'] ? trim($_GET['ce_amig']) : '';
$amizade->setCe_amigo($ce_amigo);
//adicionar a aceitação de amizade
if($orgn===ins){
    if($amigoDAO->insertAceitarAmizade($amizade)){
        print "Pedido de Amizade aceite com sucesso!<br/>";
        print "<script type='text/javascript'> window.location = '/nasocial/perfil.php' </script>";
    }
}
//eliminar pedido de amizade
if($orgn===dlt){ 
    if($amigoDAO->eliminarAmizade($ce_usuario,$ce_amigo)){
        print "Amizade Eliminado Com Sucesso!<br/>";
        if($updateDados->eliminarPedidoAmizade($ce_usuario,$ce_amigo)){
            print "Pedido de Amizade Eliminado Com Sucesso!<br/>"; 
            print "<script type='text/javascript'> window.location = '/nasocial/perfil.php' </script>";
        }
    }
}

?>

