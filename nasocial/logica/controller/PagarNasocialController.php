<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.PagarNasocial.php');
    $PagarNasocial = new PagarNasocial();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.PagarNasocialDAO.php');
    $PagarNasocialDAO = new PagarNasocialDAO();
    
    $encomendado_pago_header_id = $_POST['encomendado_pago_header_id'] ? trim($_POST['encomendado_pago_header_id']) : '';
    $ce_comprador = $_POST['ce_comprador'] ? trim($_POST['ce_comprador']) : '';
    $ce_encomenda = $_POST['ce_encomenda'] ? trim($_POST['ce_encomenda']) : '';
    $pagamento_flag = $_POST['pagamento_flag'] ? trim($_POST['pagamento_flag']) : '';
    $ce_vendedor = $_POST['ce_vendedor'] ? trim($_POST['ce_vendedor']) : '';
    $total_pago = $_POST['total_pago'] ? trim($_POST['total_pago']) : '';
    //
    $flag_entrega = $_POST['flag_entrega'] ? trim($_POST['flag_entrega']) : '';
    //
    $accao = $_POST['accao'] ? trim($_POST['accao']) : '';
    //
    $PagarNasocial->setComprador_id($ce_comprador);
    $PagarNasocial->setCe_encomenda($ce_encomenda);
    $PagarNasocial->setPagamento_flag($pagamento_flag);
    $PagarNasocial->setVendedor_id($ce_vendedor);
    $PagarNasocial->setTotal_pago($total_pago);
    // 

    if($accao == 0)
    {
        if($PagarNasocialDAO->VerificarPagamentoEncomenda($PagarNasocial) > 0)
        {
            $PagarNasocial->setPagamento_flag(1);
            echo json_encode(($PagarNasocialDAO->ActualizarVoltarPagarFlag($PagarNasocial)));
        }
        else
        {
            if($PagarNasocialDAO->InserirInserirPagamentoFlag($PagarNasocial)) 
            { 
                echo json_encode($PagarNasocialDAO->PagamentoEfectuadoFlag($PagarNasocial));
            }
        }
    }
    
    if($accao == 1)
    {
        $PagarNasocial->setPagamento_flag(0);
        $PagarNasocial->setTotal_pago(0);
        echo json_encode(($PagarNasocialDAO->ActualizarVoltarPagarFlag($PagarNasocial)));
    }
    
    if($accao == 3)
    {
        $PagarNasocial->setEncomendado_pago_header_id($encomendado_pago_header_id);
        $PagarNasocial->setFlag_entrega(1);
        if($PagarNasocialDAO->InserirConfirmacaoPagamento($PagarNasocial)) 
        {
            
        }
    }
?>