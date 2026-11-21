<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Publicar.php');
    $publicar = new Publicar();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.MinhasMusicasDAO.php');
    $MinhasMusicasDAO = new MinhasMusicasDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/usuario/class.PublicarDAO.php');
    $publicar_dao = new PublicarDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Usuario.php');
    $usuario = new Usuario();
    include_once($_SERVER['DOCUMENT_ROOT'].'/logica/dao/class.MusicaDAO.php');
    $MusicaDAO = new MusicaDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/logica/artistas/Perfil.php');
    $artistas = new Perfil();
    
    $accao = $_GET['accao'];
    $id = $_GET['id'] ? trim($_GET['id']) : '';
    $som = $_GET['som'] ? trim($_GET['som']) : '';
    $id_artista = $_GET['art'] ? trim($_GET['art']) : '';
    $ce_usuario = $_GET['usr'] ? trim($_GET['usr']) : '';
    $nomeArtistico = $artistas->nomeArtistico($id_artista);
    $titulo = $MusicaDAO->tituloMusicaSimples($som);
    if($accao == 0)
    {
        $MinhasMusicasDAO->EliminarMusicaNasocial($id);
        print "Você acabou de eliminar a música com sucesso.";
        print '<script type="text/javascript"> window.location = "https://www.lea.co.ao/nasocial/minhas-musicas/?dlt=1"</script>';
    }
    
    if($accao == 1)
    {
        $pblicacao = "Curto bwé desta música \"<b>$titulo</b>\" do/a <a href='https://lea.co.ao/artista.php?a=$ce_usuario'>$nomeArtistico</a> e gostaria que a ouvisses e partilhasses com outras pessoas.
        <br>
        <div class='btn-group btn-group-justified btn-group-xs' style='margin-top:12px;'>
            <a href='https://lea.co.ao/discografia/musica-detail.php?som=$som&ori=naso' class='btn btn-success' style='width:100%;'><span class='glyphicon glyphicon-headphones' style='margin-right:10px;'></span> OUVIR OU BAIXAR </a>
        </div>";
        $publicar->setPublicacao($pblicacao);
        $publicar->setImg_publicacao($MusicaDAO->CapaFrenteMusicaCaminho($som));
        $_CE_CAT_POST = 7;
        $publicar->setCe_categoria_post($_CE_CAT_POST);
            //
        $usuario->setUser_id($ce_usuario);
            
        if($publicar_dao->inserirPublicacao($publicar,$usuario)) 
        { 
            print '<script type="text/javascript"> window.location = "https://www.lea.co.ao/nasocial/minhas-musicas/?prtl=2"</script>';
        } 
    }
?>