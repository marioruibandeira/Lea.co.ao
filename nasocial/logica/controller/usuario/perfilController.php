<?php
    $dono = $_POST['dono'] ? trim($_POST['dono']) : '';
    //
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UsuarioDAO.php');
    $updateDados = new UsuarioDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.SiteUserInfo.php');
    $usuario_info = new SiteUserInfo();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Usuario.php');
    $usuario = new Usuario();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/login/Login.php');
    $id_u = new Login();  
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Contacto.php');
    $contacto = new Contacto();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.ContactoSocial.php');
    $cont_social = new ContactoSocial();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Preferencia.php');
    $prefe = new Preferencia();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/usuario/class.PublicarDAO.php');
    $publicar_dao = new PublicarDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Publicar.php');
    $publicar = new Publicar();
    //
    $un = is_string($_POST['username']) ? trim($_POST['username']) : '';
    $usuario_info->setUsername($un);
    //$ce_usuario = $id_u->chaveUsuario($usuario_s);
    $ce_usuario = $dono;
    $usuario_info->setUser_id($ce_usuario);
    //
    $uploaddir = '/nasocial/imgs/perfil/';
    $profilePic = is_string($_FILES['profilePic']['name']) ? trim($_FILES['profilePic']['name']) : '';
    $usuario_info->SetProfile_pic($profilePic);
    $foto_perfil = is_string($_POST['foto_perfil']) ? trim($_POST['foto_perfil']) : '';
    //
    $p_n = is_string($_POST['p_nome']) ? trim($_POST['p_nome']) : '';
    $u_n = is_string($_POST['u_nome']) ? trim($_POST['u_nome']) : '';
    $data_nasc = $_POST['data_nasc'] ? trim($_POST['data_nasc']) : '';
    $sexo = $_POST['r_sexo'] ? trim($_POST['r_sexo']) : '';
    $sobre_me = is_string($_POST['sobre_me']) ? trim($_POST['sobre_me']) : '';
    $c_prov = $_POST['c_prov'] ? trim($_POST['c_prov']) : '';
    //
    $email = is_string($_POST['email']) ? trim($_POST['email']) : '';
        $contacto->setEmail($email);
    $p_web = is_string($_POST['p_web']) ? trim($_POST['p_web']) : '';
        $contacto->setPagina_web($p_web);
    $telefone = is_string($_POST['telefone']) ? trim($_POST['telefone']) : '';
        $contacto->setTelefone($telefone);
    $whatsapp = is_string($_POST['whatsapp']) ? trim($_POST['whatsapp']) : '';
        $contacto->setWhatsapp($whatsapp);
    //
    $facebook = is_string($_POST['facebook']) ? trim($_POST['facebook']) : '';
        $cont_social->setFacebook($facebook);
    $twitter = is_string($_POST['twitter']) ? trim($_POST['twitter']) : '';
        $cont_social->setTwitter($twitter);
    $tiktok = is_string($_POST['tiktok']) ? trim($_POST['tiktok']) : '';
        $cont_social->setGoogle($tiktok);
    $instagram = is_string($_POST['instagram']) ? trim($_POST['instagram']) : '';
        $cont_social->setInstagram($instagram);
    //
    $perfil_p = is_string($_POST['perfil_p']) ? trim($_POST['perfil_p']) : '';
        $prefe->setPerfil_estato($perfil_p);  
    $envia_email = is_string($_POST['envia_email']) ? trim($_POST['envia_email']) : '';
        $prefe->setQuero_email($envia_email);
    $manter_histo = is_string($_POST['manter_histo']) ? trim($_POST['manter_histo']) : '';
        $prefe->setManter_historia($manter_histo);        
    $id_idio = is_string($_POST['id_idio']) ? trim($_POST['id_idio']) : '';
        $prefe->setCe_idioma($id_idio);          
    $n_dias = is_string($_POST['n_dias']) ? trim($_POST['n_dias']) : '';
        $prefe->setDias_historia($n_dias);
    //
    $p_senha = is_string($_POST['p_senha']) ? trim($_POST['p_senha']) : '';
    $s_senha = is_string($_POST['s_senha']) ? trim($_POST['s_senha']) : '';
    //
    /*if($un != null){
        if($updateDados->updateUsuario($usuario_info)){
            //print "1-Nome usuario actualizado com sucesso!<br/>";            
        }
    }*/
    //
    $dependencia = is_string($_POST['dependencia']) ? trim($_POST['dependencia']) : '';
        $usuario_info->setDependencia($dependencia);   
    $conta = $_POST['conta'] ? trim($_POST['conta']) : '';
        $usuario_info->setConta($conta);   
    $iban = is_string($_POST['iban']) ? trim($_POST['iban']) : '';
        $usuario_info->setIban($iban);   
    
    //
    $bi = $_POST['bi'] ? trim($_POST['bi']) : '';
        $usuario_info->setBi($bi);
    $nContribuente = is_string($_POST['nContribuente']) ? trim($_POST['nContribuente']) : '';
        $usuario_info->setContribuente($nContribuente);   
     
    //Foto de perfil
    /*
    $array = explode('/',$updateDados->fotoPerfilValidacao($ce_usuario));
 
    if($foto_perfil === $array[4] && $foto_perfil != '' && $array[4] != '' && $profilePic != $foto_perfil && $profilePic != $array[4] && $profilePic == ''){  
        //print "Estamos dentro<br/>"  ;
    }else{
        
        //Upload das imagens
        
		$file_name = $_FILES['profilePic']['name'];
			//$_listarImovel->setImagem_imovel($file_name);
		$file_ext = strtolower(end(explode('.',$_FILES['profilePic']['name'])));
		$file_tmp = $_FILES['profilePic']['tmp_name'];

		$extensions = array("jpeg","jpg","png","JPEG","PNG","GIF","gif","tiff","tif","TIFF","TIF","heif","HEIF","HEIC","heic","WebP","RAW","raw");
	  
		if(in_array($file_ext,$extensions)=== false){
			 $errors[]="A extenção usada não é permitido, por favor use ficheiros JPEG or PNG.";
		}

		if(empty($errors)==true){
			move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . '/nasocial/imgs/perfil/' .$file_name);
		}else{
		    //print_r($errors);
		}
		
		if($foto_perfil != '' && $foto_perfil != $perfilPic)
		{ 
		    if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/nasocial/imgs/perfil/' .$foto_perfil))
		    {
                unlink($_SERVER['DOCUMENT_ROOT'] . '/nasocial/imgs/perfil/' .$foto_perfil);
            }
		}
		
		if(empty($file_name)==true)
		{
		    $perfilPic_ = "";
		}else{
		    $perfilPic_ = $uploaddir.$file_name;
		}
		
        if($updateDados->updateUpLoadFotoPerfil($ce_usuario,$perfilPic_)){
            //print "Foto Actualizada com sucesso!<br/>";
            $pblicacao = "Actualizei a foto do meu perfil, me diz o que achas.";
            $publicar->setPublicacao($pblicacao);
            $publicar->setImg_publicacao($perfilPic_);
            $_CE_CAT_POST = 7;
            $publicar->setCe_categoria_post($_CE_CAT_POST);
            //
            $usuario->setUser_id($ce_usuario);
            
            if($publicar_dao->inserirPublicacao($publicar,$usuario)) { }
        }
    }
    
    */
    //Data de Nascimento
    if($data_nasc == $updateDados->dataNascimentoComparacao($ce_usuario)){  
        //print "2-Data de Nascimento Inserido com sucesso!<br/>";
    }else{
        if($updateDados->updateDataNascimento($ce_usuario,$data_nasc)){
            //print "2.1-Data de Nascimento actualizado com sucesso!<br/>";           
        }
    }
    //
    if($updateDados->updatePrimeiroNome($p_n,$ce_usuario)){
        //print "3-Dados Demograficos actualizado com sucesso!<br/>";            
    }
    //
    if($updateDados->updateUltimoNome($u_n,$ce_usuario)){
        //print "4-Dados Ultimo nome actualizado com sucesso!<br/>";           
    }
    //
    if($updateDados->updateSobreMe($sobre_me,$ce_usuario)){
        //print "5-Dados Sobre Me actualizado com sucesso!<br/>";           
    }
    //
    if($updateDados->updateProvincia($c_prov,$ce_usuario)){
        //print "6-Dados Provincia actualizado com sucesso!<br/>";           
    }    
    //
    if($sexo != null){
        if($updateDados->updateSexoUsuario($ce_usuario,$sexo)){
            //print "7-Dados sexo actualizado com sucesso!<br/>";         
        }
    }
    //Inserção e actualizacao dos contactos
    if($updateDados->chaveUsuarioContacto($ce_usuario) == $ce_usuario ){
        if($updateDados->updateContacto($usuario_info,$contacto)){
            //print "8-Contactos Updated Com Sucesso!<br/>";           
        }
    } else {
        print "8.4-Dentro dos contactos!<br/>";
        if(!is_null($email)){
            //$existeEmail = $updateDados->emailUsuario($ce_usuario);
            if($updateDados->insertContactoEmail($usuario_info,$contacto)){
                //print "8.1-Contactos Inserido Com Sucesso!<br/>";           
            }   
        }else{
            $updateDados->emailUsuario($ce_usuario);
        }
        
        if($p_web != null){
            if($updateDados->insertContactoPWeb($usuario_info,$contacto)){
                //print "8.2-Pagina Web Inserido Com Sucesso!<br/>";          
            }
        }
        if($telefone != null){
            if($updateDados->insertContactoTelefone($usuario_info,$contacto)){
                //print "8.3-Contactos Inserido Com Sucesso!<br/>";            
            }
        }
        if($whatsapp != null || $whatsapp != 0){
            if($updateDados->insertContactoWhatsapp($usuario_info,$contacto)){
                //print "8.4-Contactos Inserido Com Sucesso!<br/>";            
            }
        }
    }
    //Inserção e actualização das redes sociais
    if($updateDados->chaveUsuarioContactoSocial($ce_usuario) == $ce_usuario ){
        if($updateDados->updateContactoSocial($usuario_info,$cont_social)){
            //print "9-Contactos Social actualizados Com Sucesso!<br/>";            
        }
    } else {
        if($facebook != null){
            if($updateDados->insertFacebookContactoSocial($usuario_info,$cont_social)){
                //print "9.1-Contactos Social facebook Inserido Com Sucesso!<br/>";            
            }
        }
        if($twitter != null){
            if($updateDados->insertTwitterContactoSocial($usuario_info,$cont_social)){
                //print "9.2-Contactos Social Twitter Inserido Com Sucesso!<br/>";            
            }
        }
        if ($tiktok != null){
            print($tiktok);
            if($updateDados->insertGoogleContactoSocial($usuario_info,$cont_social)){
                //print "9.3-Contactos Social Google Inserido Com Sucesso!<br/>";            
            }
        }
        if ($instagram != null){
            print($instagram);
            if($updateDados->insertInstagramContactoSocial($usuario_info,$cont_social)){
                //print "9.3-Contactos Social Google Inserido Com Sucesso!<br/>";            
            }
        }
    } 
    //
    if($updateDados->existePreferencias($ce_usuario) == $ce_usuario){         
        if($perfil_p == 1){
            if($updateDados->updatePreferencias($usuario_info,$prefe)){
                //print "10-Preferencia actualizados Com Sucesso!<br/>";           
            }
        } else {
            $prefe->setPerfil_estato(0);
             if($updateDados->updatePreferencias($usuario_info,$prefe)){
                //print "10.1-Preferencia actualizados Com Sucesso!<br/>";           
            }
        }
    } else {
        if($perfil_p == 1){
            if($updateDados->insertPreferencias($usuario_info,$prefe)){
                //print "10.2-Preferencia inserido com sucesso!<br/>";           
            }
        }
    }    
    //
    if($updateDados->existePreferencias($ce_usuario) == $ce_usuario){
        if($id_idio > 0){
            if($updateDados->updateId_idioma($usuario_info,$prefe)){
                //print "11-Dados Idioma actualizado com sucesso!<br/>";            
            }        
        }
    }else{        
        if($updateDados->insertPreferenciasIdioma($usuario_info,$prefe)){
            //print "11.1-Preferencia de NumeroDias inserido com sucesso!<br/>";           
        }
    }
    //Preferencia para receber emails
    if($updateDados->existePreferencias($ce_usuario) == $ce_usuario){
        if($envia_email == 1){
            //print "Estou dentro";
            if($updateDados->updatePreferenciasEmail($usuario_info,$prefe)){
                //print "12-Dados de manter email actualizado com sucesso!1<br/>"; 
            }        
        } else {
            $prefe->setQuero_email(NULL);
            if($updateDados->updatePreferenciasEmail($usuario_info,$prefe)){
                //print "12.1-Dados de manter email actualizado com sucesso!2<br/>"; 
            }
        }
    }else{ 
        
        if($updateDados->insertPreferenciasEmail($usuario_info,$prefe)){
            //print "12.3- Preferencia de manter email inserido com sucesso!<br/>";            
        }
    }
    //PREFERENCIA manter historico
    if($updateDados->existePreferencias($ce_usuario) == $ce_usuario){
        if($manter_histo == 1){
            if($updateDados->updatePreferenciasManterHistorico($usuario_info,$prefe)){
                //print "13-Preferencia Email actualizados Com Sucesso!<br/>";           
            }
        } else {
            $prefe->setManter_historia(0);
            $prefe->setDias_historia(NULL);
             if($updateDados->updatePreferenciasManterHistorico($usuario_info,$prefe)){
                //print "13.1-Preferencia Email actualizados Com Sucesso!<br/>";          
            }
            if($updateDados->updatePreferenciasNumeroDiasNull($usuario_info,$prefe)){
                //print "13.2-Preferencia NumeroDias actualizados Com Sucesso!<br/>";            
            }
        }
    } else {
        if($manter_histo == 1){
            if($updateDados->insertPreferenciasManterHistorico($usuario_info,$prefe)){
                //print "13.3- Preferencia de Email inserido com sucesso!<br/>";            
            }
        }
    }
    //$prefe
    if($updateDados->existePreferencias($ce_usuario) == $ce_usuario){
        if($manter_histo == 1){
            if($updateDados->updatePreferenciasNumeroDias($usuario_info,$prefe)){
                //print "14 - Preferencia Numero Dias actualizados Com Sucesso!<br/>";            
            }
        } else {
            if($updateDados->updatePreferenciasNumeroDias($usuario_info,$prefe)){
                //print "14.1- Preferencia Numero Dias actualizados Com Sucesso!<br/>";          
            }
        }
    } else {
        if($manter_histo == 1){
            if($updateDados->insertPreferenciasNumeroDias($usuario_info,$prefe)){
                //print "14.2- Preferencia de Numero Dias inserido com sucesso!<br/>";           
            }
        }
    }    
    if(empty($p_senha) & empty($s_senha)){
        //print "Senha não foi actualizado";
    } else {
        if($p_senha == $s_senha){
            if($updateDados->updateSenha($ce_usuario,$p_senha)){
                //print "15.1- Senha actualizado com sucesso!<br/>";          
            }
        }else{
            //print "As duas senhas não são iguais.";
        }        
    }
    //Parte reservada para inserção dos detalhes bancarios
    if($updateDados->ExistenciaDeDetalhesBancarios($ce_usuario) > 0)
    {
        $updateDados->ActualizarDetalhesBancarios($ce_usuario,$dependencia,$conta,$iban);   
    } else {
        $updateDados->insertDetalhesBancarios($usuario, $usuario_info);
    }
    //parte reservada para os detalhes pessoais
    if($updateDados->ExistenciaDetalhesPessoais($ce_usuario) > 0)
    {
        $updateDados->ActualizarDetalhesPessoais($ce_usuario,$bi,$nContribuente);   
    } else {
        $updateDados->insertDetalhesPessoais($usuario, $usuario_info);
    }
    //print out e redirecionamento
    print "Actualizações efectuadas com sucesso.";
    print '<script type="text/javascript"> window.location = "https://www.lea.co.ao/nasocial/perfil.php?ses='.$usuario_s.'"</script>';
    
?>
