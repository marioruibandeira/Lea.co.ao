<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.PagarNasocial.php');
    $PagarNasocial = new PagarNasocial();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.PagarNasocialDAO.php');
    $PagarNasocialDAO = new PagarNasocialDAO();
    
    $ce_encomenda = $_GET['ce_enco'] ? trim($_GET['ce_enco']) : '';
    $PagarNasocial->setCe_encomenda($ce_encomenda);
    
    if($PagarNasocialDAO->EliminarEncomenda($PagarNasocial))
    {
        print '<script type="text/javascript"> window.location = "https://www.lea.co.ao/nasocial/loja/relatorio.php"</script>';
    }
    else
    {
        print "Erro ao eliminar a encomenda número " . $ce_encomenda."!";
    }
?>