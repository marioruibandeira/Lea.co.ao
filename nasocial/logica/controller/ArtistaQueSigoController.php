<?php
    //
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.ComponentesDetalhesPerfilDAO.php');
    $ComponentesDetalhesPerfilDAO = new ComponentesDetalhesPerfilDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Publicar.php');
    $publicar = new Publicar();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/usuario/class.PublicarDAO.php');
    $publicar_dao = new PublicarDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Usuario.php');
    $usuario = new Usuario();
    include_once($_SERVER['DOCUMENT_ROOT'].'/logica/artistas/Perfil.php');
    $artistas = new Perfil();
    
    $accao = $_GET['accao'];
    $id = $_GET['id'] ? trim($_GET['id']) : '';
    $id_artista = $_GET['art'] ? trim($_GET['art']) : '';
    $ce_usuario = $_GET['usr'] ? trim($_GET['usr']) : '';
    $nomeArtistico = $artistas->nomeArtistico($id_artista);
    
    if($accao == 0)
    {
        $ComponentesDetalhesPerfilDAO->EliminarSouFa($id);
        print "Você deixou de seguir o/a $nomeArtistico.";
        print '<script type="text/javascript"> window.location = "https://www.lea.co.ao/nasocial/artistas-que-sigo/?dlt=1"</script>';
    }
    
    if($accao == 1)
    {
        $pblicacao = "Sabes, eu curto bwé do/a <a href='https://lea.co.ao/artista.php?a=$id_artista'>$nomeArtistico</a> e gostaria que desses uma chance aos seus trabalhos. Visite o perfil <a href='https://lea.co.ao/artista.php?a=$id_artista'>aqui</a>.
        <br>
        <div class='btn-group btn-group-justified btn-group-xs' style='margin-top:12px;'>
            <a href='https://lea.co.ao/artista.php?a=$id_artista' class='btn btn-success' style='width:100%;'><span class='glyphicon glyphicon-eye-open' style='margin-right:10px;'></span> VISITE O PERFIL</a>
        </div>";
        $publicar->setPublicacao($pblicacao);
        $publicar->setImg_publicacao($artistas->ImageDoPerfilCaminho($id_artista));
        $_CE_CAT_POST = 7;
        $publicar->setCe_categoria_post($_CE_CAT_POST);
            //
        $usuario->setUser_id($ce_usuario);
            
        if($publicar_dao->inserirPublicacao($publicar,$usuario)) 
        { 
            print '<script type="text/javascript"> window.location = "https://www.lea.co.ao/nasocial/artistas-que-sigo/?prtl=2"</script>';
        } 
        
    }  
?>