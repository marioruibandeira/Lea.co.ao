<?php
    //Importar Ficheiros
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.AgendaEvento.php');
    $ENCOMENDA_NASOCIAL = new AgendaEvento();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.EncomendaNasocialDAO.php');
    $EncomendaNasocialDAO = new EncomendaNasocialDAO();

    $accao = $_POST['accao'] ? trim($_POST['accao']) : '';
    //$cat = $_POST['cat'] ? trim($_POST['cat']) : '';
    $cat = $_POST['cat'];
    $ref_selec = $_POST['encomendas'] ? trim($_POST['encomendas']) : '';
    //
    if($accao == 10)
    {
        echo json_encode($EncomendaNasocialDAO->EliminarEncomenda($ref_selec));
    }
    /*
    else if($accao == 9)
    {
        echo json_encode(99);
    }
    */
    $produto_servico_id = $_POST['id_servico_produto'] ? trim($_POST['id_servico_produto']) : '';
    $ce_usuario = $_POST['ce_usuario'] ? trim($_POST['ce_usuario']) : '';
    $ce_vendedor = $_POST['ce_vendedor'] ? trim($_POST['ce_vendedor']) : '';
    $quantidadeEncomenda = $_POST['qtd'] ? trim($_POST['qtd']) : '';
    $preco_painel = $_POST['preco_painel'] ? trim($_POST['preco_painel']) : '';

    $ENCOMENDA_NASOCIAL->setCeEncomenda($ref_selec);
    $ENCOMENDA_NASOCIAL->setId_agenda_evento($produto_servico_id);

    $ENCOMENDA_NASOCIAL->setQuantidade($quantidadeEncomenda);
    $ENCOMENDA_NASOCIAL->setFK_usuario($ce_usuario);
    $ENCOMENDA_NASOCIAL->setCe_vendedor($ce_vendedor);
    $ENCOMENDA_NASOCIAL->setPreco_agenda($preco_painel);
    $ENCOMENDA_NASOCIAL->setCategoria($cat);
    //
    
    if($accao == 8)
    {
        if($ref_selec > 0)
        {
            $result = $EncomendaNasocialDAO->ActualizarEncomendaNassocial($ENCOMENDA_NASOCIAL);
            echo json_encode($result);
            //echo json_encode([ "success" => true, "qtd" => $ENCOMENDA_NASOCIAL->getId_agenda_evento($produto_servico_id), "ce_encomenda" => $ENCOMENDA_NASOCIAL->getCeEncomenda($ref_selec) ]);
        }
        else
        {
            if($EncomendaNasocialDAO->inserirEncomendaNasocial($ENCOMENDA_NASOCIAL)) 
            { 
                echo json_encode($EncomendaNasocialDAO->EncomendaEfectuada($ce_vendedor,$produto_servico_id));
            }
        }
    }
    
?>