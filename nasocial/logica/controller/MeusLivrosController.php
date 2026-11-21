<?php
    //
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.MeusLivrosDAO.php');
    $MeusLivrosDAO = new MeusLivrosDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Publicar.php');
    $publicar = new Publicar();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/usuario/class.PublicarDAO.php');
    $publicar_dao = new PublicarDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Usuario.php');
    $usuario = new Usuario();
    include_once($_SERVER['DOCUMENT_ROOT'].'/logica/artistas/Perfil.php');
    $artistas = new Perfil();
    include_once($_SERVER['DOCUMENT_ROOT'].'/logica/dao/class.LiteraturaDAO.php');
    $LiteraturaDAO = new LiteraturaDAO();
    
    $accao = $_GET['accao'];
    $id = $_GET['id'] ? trim($_GET['id']) : '';
    
    $id_artista = $_GET['art'] ? trim($_GET['art']) : '';
    $ce_usuario = $_GET['usr'] ? trim($_GET['usr']) : '';
    $nomeArtistico = $artistas->nomeArtistico($id_artista);
    $titulo = $LiteraturaDAO->TituloExemplarNasocial($id);
    
    if($accao == 0)
    {
        $MeusLivrosDAO->EliminarMeusLivros($id);
        print "Você acabou de eliminar o livro do/a $nomeArtistico.";
        print '<script type="text/javascript"> window.location = "https://www.lea.co.ao/nasocial/meus-livros/?dlt=1"</script>';
    }
    
    if($accao == 1)
    {
        $pblicacao = "Gostaria de recomendar \"<b>$titulo</b>\" do/a <a href='https://lea.co.ao/artista.php?a=$id_artista'>$nomeArtistico</a> para uma boa leitura ou oferta.
        <br>
        <div class='btn-group btn-group-justified btn-group-xs'  style='margin-top:12px;'>
            <a href='https://lea.co.ao/literatura/exemplar.php?code=$id&artst=$id_artista' class='btn btn-success' style='width:100%;'><span class='glyphicon glyphicon-eye-open' style='margin-right:10px;'></span> SABER MAIS </a>
        </div>";
        $publicar->setPublicacao($pblicacao);
        $publicar->setImg_publicacao($LiteraturaDAO->CapaFrenteExemplarString($id));
        $_CE_CAT_POST = 7;
        $publicar->setCe_categoria_post($_CE_CAT_POST);
            //
        $usuario->setUser_id($ce_usuario);
            
        if($publicar_dao->inserirPublicacao($publicar,$usuario)) 
        { 
            print '<script type="text/javascript"> window.location = "https://www.lea.co.ao/nasocial/meus-livros/?prtl=2"</script>';
        } 
        
    }  
    
?>