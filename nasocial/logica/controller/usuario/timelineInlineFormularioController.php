<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Publicar.php');
    $publicar = new Publicar();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Usuario.php');
    $usuario = new Usuario();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/usuario/class.PublicarDAO.php');
    $publicar_dao = new PublicarDAO();
    //gets and sets
    
    $ce_usuario = $_POST['usuario'] ? trim($_POST['usuario']) : '';
    $usuario->setUser_id($ce_usuario);
        
    $pblicacao = is_string($_POST['pblicacao']) ? trim($_POST['pblicacao']) : '';
    $publicar->setPublicacao($pblicacao);
    
    $uploaddir = '/nasocial/imgs/posts/';
    $img_pblicacao = is_string($_FILES['img_pblicacao']['name']) ? trim($_FILES['img_pblicacao']['name']) : '';
    $publicar->setImg_publicacao($uploaddir.$img_pblicacao);
    
    $_CE_CAT_POST = 5;
    $publicar->setCe_categoria_post($_CE_CAT_POST);
    
    //print $usuario->getUser_id(). "<br/>"; print $publicar->getPublicacao() . "<br/>"; print $publicar->getCe_categoria_post() . "<br/>";
    if($publicar_dao->inserirPublicacao($publicar,$usuario)){
        print "Publicação efectuada com sucesso!";
        //Upload das imagens
		$file_name = $_FILES['img_pblicacao']['name'];
		//$_listarImovel->setImagem_imovel($file_name);
		$file_ext = strtolower(end(explode('.',$_FILES['img_pblicacao']['name'])));
		$file_tmp = $_FILES['img_pblicacao']['tmp_name'];

		$extensions = array("jpeg","jpg","png","JPEG","PNG","jfif");
	  
		if(in_array($file_ext,$extensions)=== false){
			 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		}

		if(empty($errors)==true){
			move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . '/nasocial/imgs/posts/' .$file_name);
		}else{
			 print_r($errors);
		}
        echo '<script type="text/javascript"> window.location = "/nasocial/" </script>';
    }
    
?>

