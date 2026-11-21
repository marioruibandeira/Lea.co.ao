<?php
    //Importar Ficheiros
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.AgendaEvento.php');
    $PRODUTO_SERVICO = new AgendaEvento();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.AgendaEventoDAO.php');
    $encomendarEvento = new AgendaEventoDAO();
    //
    $accao = $_POST['accao'] ? trim($_POST['accao']) : '';
    $PRODUTO_SERVICO->setCe_agenda_estoque(is_string($_POST['ce_agenda_estoque']) ? trim($_POST['ce_agenda_estoque']) : '');
    $ce_usuario = $_POST['ce_usuario'] ? trim($_POST['ce_usuario']) : '';  
    $PRODUTO_SERVICO->setFK_usuario($ce_usuario);
    $PRODUTO_SERVICO->setIs_Promocao(is_string($_POST['isPromocao']) ? trim($_POST['isPromocao']) : '');
    //$is_promocao = isset($_POST['is_promocao']) && $_POST['is_promocao'] === 'true' ? 1 : 0;
    //$PRODUTO_SERVICO->setIs_Promocao($is_promocao);
    $PRODUTO_SERVICO->setPerido_promocional(is_string($_POST['data_fim']) ? trim($_POST['data_fim']) : '');
    $PRODUTO_SERVICO->setPreco_promocional(is_string($_POST['precoPromocional']) ? trim($_POST['precoPromocional']) : '');
    $PRODUTO_SERVICO->setPreco_agenda(isset($_POST['preco']) ? trim($_POST['preco']) : '');
    $PRODUTO_SERVICO->setQuantidade(is_string($_POST['qtd']) ? trim($_POST['qtd']) : '');
    $PRODUTO_SERVICO->setEstado_produto(is_string($_POST['estadoProduto']) ? trim($_POST['estadoProduto']) : '');
    $PRODUTO_SERVICO->setOpcao_download(is_string($_POST['opcDownload']) ? trim($_POST['opcDownload']) : '');
    $PRODUTO_SERVICO->setEncontro_publico(is_string($_POST['encontroPublico']) ? trim($_POST['encontroPublico']) : '');
    $PRODUTO_SERVICO->setPegar_na_porta(is_string($_POST['pegarNaPorta']) ? trim($_POST['pegarNaPorta']) : '');
    $PRODUTO_SERVICO->setEntregar_na_porta(is_string($_POST['entregarNaPorta']) ? trim($_POST['entregarNaPorta']) : '');
    $PRODUTO_SERVICO->setDescricao(is_string($_POST['descricao']) ? trim($_POST['descricao']) : '');
    
    $cat = $_POST['cat'] ? trim($_POST['cat']) : '';
    $produto_servico_id = $_POST['id_servico_produto'] ? trim($_POST['id_servico_produto']) : '';
    $ce_vendedor = $_POST['ce_vendedor'] ? trim($_POST['ce_vendedor']) : '';
    $quantidadeEncomenda = $_POST['qtd'] ? trim($_POST['qtd']) : '';
    $preco_painel = $_POST['preco_painel'] ? trim($_POST['preco_painel']) : '';
    
    $PRODUTO_SERVICO->setCategoria(4);
    
    $PRODUTO_SERVICO->setId_agenda_evento($produto_servico_id);
    $PRODUTO_SERVICO->setQuantidade($quantidadeEncomenda);
    
    $PRODUTO_SERVICO->setCe_vendedor($ce_vendedor);
    $PRODUTO_SERVICO->setPreco($preco_painel);
    

    //
    if($accao == 10)
    {
        $id = $_POST['id'] ? trim($_POST['id']) : '';
        echo json_encode($encomendarEvento->EliminarEventoCatalogo($id));
    }
    else if($accao == 9)
    {
        echo json_encode($encomendarEvento->insertEvento($PRODUTO_SERVICO));
    }
    else if($accao == 8)
    {
        if($encomendarEvento->inserirEncomendaEvento($PRODUTO_SERVICO)) 
        { 
            echo json_encode($encomendarEvento->EncomendaEfectuada($ce_vendedor,$idEncomendaEvento));
        }
    }
    else if($accao == 11)
    {
        echo json_encode($encomendarEvento->AtualizarAgendaEvento($PRODUTO_SERVICO));
    }
    else
    {
        echo json_encode(100);
    }
?>