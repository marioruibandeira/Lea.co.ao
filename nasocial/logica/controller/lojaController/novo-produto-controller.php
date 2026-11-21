
<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/lojaonline/NovoProduto.php');
    $novo_p = new NovoProduto();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.DiscografiaDAO.php');
    $DiscografiaDAO = new DiscografiaDAO();
    //pegar os valores dos campos
    $validador    = (isset($_POST['validador'])) ? trim($_POST['validador']) : '';
    $salvar_p = (isset($_POST['s_p'])) ? trim($_POST['s_p']) : '';
    $album    = (isset($_POST['album'])) ? trim($_POST['album']) : '';
    $usuario  = (isset($_POST['usuario'])) ? trim($_POST['usuario']) : '';
    //$chave_usuario = $usuario;
    $produto_i    = (isset($_POST['chave_disco'])) ? trim($_POST['chave_disco']) : '';
    $produto_existe = $novo_p->chaveProduto($produto_i,$usuario);
    $qtd_pro = (isset($_POST['qtd_produto'])) ? trim($_POST['qtd_produto']) : '';
    $preco = (isset($_POST['preco_produto'])) ? trim($_POST['preco_produto']) : '';~
    $formato = (isset($_POST['chave_formato'])) ? trim($_POST['chave_formato']) : '';

    if( $salvar_p == '1'){
        
        if( $produto_existe > 1 )
        {
            print 'Este produto já existe na sua lista de produtos. Será redirecionado para escolher um outro disco. '; 
            echo '<script type="text/javascript"> window.location = "https://lea.co.ao/discografia/discografia_.php?strt=0"</script>';
        }else{
            print 'O produto '. $novo_p->produtoPegado($produto_i) .' foi inserido com sucessso';  
            //
            $novo_p->inserirProduto($produto_i,$formato,$qtd_pro,$preco,$usuario);
            //
            $cat_post = 2;
            $post = "Estou a vender a obra discografica <b>" . $novo_p->produtoPegado($produto_i) . "</b>, do/a " . $novo_p->NomeArtisticoNovoProduto($produto_i) .", que tal entrares em contacto ou visitar o meu perfil. Clica o produto para comprar! <a href=\"https://www.lea.co.ao/nasocial/loja/carrinho.php?pro=". $produto_i ."&cat=3&us=". $usuario ."\"><div class=\"btn-toolbar btn-success\" style=\"width:100%\"><div class=\"btn-group\" style=\"width:100%; text-align:center;color:#fff;padding:5px 0px 5px 0px;\"><span class=\"glyphicon glyphicon-shopping-cart\"></span> Comprar</div></a> ";
            $img_publicacao = $novo_p->CapaNovoProduto($produto_i);
            $novo_p->inserirNaLinhaDoTempo($usuario,$cat_post,$post,$produto_i,$img_publicacao,$formato);
            echo '<script type="text/javascript"> window.location = "https://www.lea.co.ao/nasocial/loja/discografia.php?u_e='.$usuario.'&acao=3" </script>';  
        }
    }

?>

