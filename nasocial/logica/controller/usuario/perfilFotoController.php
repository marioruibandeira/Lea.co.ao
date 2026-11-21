<?php

header('Content-Type: application/json');

// 1. Configurações e Inclusões
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UsuarioDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.SiteUserInfo.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Usuario.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/usuario/class.PublicarDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Publicar.php');

// Captura segura dos dados enviados via formData.append()
$ce_usuario = isset($_POST['dono']) ? trim($_POST['dono']) : '';
$un = isset($_POST['username']) ? trim($_POST['username']) : '';

$updateDados = new UsuarioDAO();
$publicar_dao = new PublicarDAO();
$publicar = new Publicar();
$usuario_info = new SiteUserInfo();

// Configura a entidade com os dados recebidos
$usuario_info->setUsername($un);
$usuario_info->setUser_id($ce_usuario);

$response = ['success' => false, 'message' => ''];

// 2. Verificação do Ficheiro (Chave 'cropped_image' alinhada com JS)
if (isset($_FILES['cropped_image']) && $_FILES['cropped_image']['error'] === UPLOAD_ERR_OK) 
{
    $file_tmp = $_FILES['cropped_image']['tmp_name'];
    $uploaddir = '/nasocial/imgs/perfil/';
    
    // Geração de Nome Único
    $file_ext = strtolower(pathinfo($_FILES['cropped_image']['name'], PATHINFO_EXTENSION));
    $file_name = "user_" . $ce_usuario . "_" . time() . "." . $file_ext;
    $upload_path = $_SERVER['DOCUMENT_ROOT'] . $uploaddir . $file_name;

    // 3. Validação de Extensões
    $extensions = array("jpeg","jpg","png","webp");
    if (in_array($file_ext, $extensions)) 
    {
        // 4. Gestão da Foto Antiga
        $fotoAntigaRaw = $updateDados->fotoPerfilValidacao($ce_usuario);
        if (!empty($fotoAntigaRaw)) {
            $caminhoAntigo = $_SERVER['DOCUMENT_ROOT'] . $fotoAntigaRaw;
            if (file_exists($caminhoAntigo) && is_file($caminhoAntigo)) {
                unlink($caminhoAntigo);
            }
        }

        // 5. Mover Novo Ficheiro e Atualizar BD
        if (move_uploaded_file($file_tmp, $upload_path)) {
            
            $perfilPic_db_path = $uploaddir . $file_name;
            
            if ($updateDados->updateUpLoadFotoPerfil($ce_usuario, $perfilPic_db_path)) {
                
                // 6. Criar Publicação Automática no Feed
                $pblicacao = "Actualizei a foto do meu perfil, me diz o que achas.";
                $publicar->setPublicacao($pblicacao);
                $publicar->setImg_publicacao($perfilPic_db_path);
                $publicar->setCe_categoria_post(7);
                
                $usuario_obj = new Usuario();
                $usuario_obj->setUser_id($ce_usuario);
                $publicar_dao->inserirPublicacao($publicar, $usuario_obj);

                $response['success'] = true;
                $response['message'] = 'Foto de perfil atualizada com sucesso!';
                $response['new_image'] = $perfilPic_db_path; 
            } else {
                $response['message'] = 'Erro ao atualizar os dados no banco de dados.';
            }
        } else {
            $response['message'] = 'Erro ao gravar o ficheiro no diretório.';
        }
    } else {
        $response['message'] = 'Formato de imagem não permitido.';
    }
} else {
    $response['message'] = 'Nenhum ficheiro recebido ou erro no upload.';
}

echo json_encode($response);
exit;

?>