<?php 
    //
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.LivroNasocial.php');
    $InsertLivro = new LivroNasocial();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/loja/class.LivrosDAO.php');
    $LivrosDAO = new LivrosDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.SiteUserInfo.php');
    $site_user = new SiteUserInfo();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/lojaonline/NovoProduto.php');
    $novo_p = new NovoProduto();
    //
    $InsertLivro->setId_livro(is_string($_POST['lvr']) ? trim($_POST['lvr']) : '');
    $InsertLivro->setCe_editora_livro(is_string($_POST['ce_editora_livro']) ? trim($_POST['ce_editora_livro']) : '');
    $InsertLivro->setCe_genero(is_string($_POST['ce_editora_livro']) ? trim($_POST['ce_editora_livro']) : '');
    $InsertLivro->setPreco_livro(is_string($_POST['preco_livro']) ? trim($_POST['preco_livro']) : '');
    $InsertLivro->setQtd_livro(is_string($_POST['qtd_livro']) ? trim($_POST['qtd_livro']) : '');
    $InsertLivro->setDescricao_livro(is_string($_POST['descri_livro']) ? trim($_POST['descri_livro']) : '');
    $site_user->setUser_id(is_string($_POST['us']) ? trim($_POST['us']) : '');
    $InsertLivro->setCat(is_string($_POST['cat']) ? trim($_POST['cat']) : '');
    //
    $id_livro = $InsertLivro->getId_livro();
    $l_existe = base64_encode($id_livro);
    $liv_existe = $LivrosDAO->livroExiste($l_existe,$site_user->getUser_id());
    //  
    if($liv_existe > 0)
    {
        echo '<script type="text/javascript"> window.location = "/nasocial/loja/livros.php?acao=3" </script>';   
    }
    else
    {
        if($LivrosDAO->inserirLivros($InsertLivro,$site_user))
        {
            //https://www.lea.co.ao/nasocial/loja/carrinho.php?pro=NjI=&cat=2&us=MTgw
            print "Livro disponibilizado com sucesso!<br/>";
            //
            $cat_post = 2;
            $btn = '<br/><a style="width:100%; margin-top:10px;" href="https://www.lea.co.ao/nasocial/loja/carrinho.php?pro='.$id_livro.'&cat=2&us='.$site_user->getUser_id().'" class="btn btn-success btn-sm"> <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Comprar Ingresso</a>' ;
            $post = "Estou a vender o livro <b>". $LivrosDAO->tituloLivroString($id_livro) ."</b> a bom preço visita o meu <a href=\"https://www.lea.co.ao/nasocial/loja/catalogo.php?cat=2&us=".$site_user->getUser_id()."\"><b>catalogo</b></a> ou <a href=\"https://lea.co.ao/literatura/exemplar.php?code=$id_livro&artst=".$site_user->getUser_id()."\">clica aqui para saber mais</a>$btn";
            $produto_i =  $InsertLivro->getId_livro();
            $img_publicacao = $LivrosDAO->CapaFrenteLivro($id_livro);
            $formato = 2;
                
            if($novo_p->inserirNaLinhaDoTempo($site_user->getUser_id(),$cat_post,$post,$produto_i,$img_publicacao,$formato))
            {
                print "Publicação postada com sucesso!<br/>";
            }
            echo '<script type="text/javascript"> window.location = "/nasocial/loja/livros.php?acao=3" </script>';
        }
    }
?>

