<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/conexao/cnx.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Mensagem.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.SiteUserInfo.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Amigo.php');
/**
 * Description of class
 *
 * @author Mario Bandeira
 */
class MensagemDAO {
    //
    public function inserirMensangem(Mensagem $msgem,SiteUserInfo $usuario,Amigo $amgo)  
    {    
        $connection = new cnx();
        $connection->connect();
        //      
        try 
        {
            $usrio  = (int) base64_decode($usuario->getUser_id());
            $amg    = (int) base64_decode($amgo->getId_amigo());
            $emsor  = (int) base64_decode($msgem->getEmissor());
            
            $msgm   = htmlspecialchars($msgem->getMensagem(), ENT_QUOTES, 'UTF-8');
            
            $sql = "INSERT INTO tblmensagens (ce_usuario, ce_amigo, mensagem, emissor) VALUES (?, ?, ?, ?)";
            $stmt = $connection->myconn->prepare($sql);
    
            if (!$stmt) {
                throw new Exception("Erro na preparação: " . $connection->myconn->error);
            }
            
            $stmt->bind_param("iisi", $usrio, $amg, $msgm, $emsor);
            $resultado = $stmt->execute();
    
            $stmt->close();
            
            return $resultado;
            
        }catch (Exception $e){
            // Log do erro (podes enviar para um ficheiro de logs)
            error_log($e->getMessage());
            return false;
        }
    }
    //
    function conversas($ce_usuario, $ce_amigo)
    {
        $connection = new cnx();
        $connection->connect();
            
        $amigo = (int) base64_decode($ce_amigo);
        $ce_usuario_ = (int) base64_decode($ce_usuario);
        
        $query = "SELECT * FROM vwmensagem WHERE (ce_usuario = ? AND ce_amigo = ?) OR (ce_amigo = ? AND ce_usuario = ?) GROUP BY id_mensagens ORDER BY id_mensagens DESC";
        $stmt = mysqli_prepare($connection->myconn, $query);
        mysqli_stmt_bind_param($stmt, "iiii", $ce_usuario_, $amigo, $ce_usuario_, $amigo);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        //
        //$query = 'SELECT * FROM vwmensagem WHERE ce_usuario = "' . $ce_usuario_ .'" AND ce_amigo = "' . $amigo .'" OR ce_amigo = "' . $ce_usuario_ .'"  AND ce_usuario = "' . $amigo .'" GROUP BY id_mensagens ORDER BY id_mensagens DESC';
        //$result = mysqli_query($connection->myconn,$query);
        //
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result))
            {
                ?>
                    <div class="itemdiv dialogdiv">
                        <div class="user" style="padding: 4px;">
                            <?php
                                if($row->fotoPerfil != null)
                                {
                                    ?> 
                                        <a href="https://lea.co.ao/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->ce_usuario); ?>">
                                            <img src="<?php print $row->fotoPerfil; ?>" style="width:100%;border-radius: 50%;"/>
                                        </a> 
                                    <?php    
                                }else{
                                    ?> 
                                        <a href="https://lea.co.ao/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->ce_usuario); ?>">
                                            <img src="https://lea.co.ao/nasocial/assets/images/avatars/profile-pic.jpg" style="width:100%;border-radius: 50%;"/> 
                                        </a>
                                    <?php
                                }
                            ?>
                        </div>
                        <div class="body">
                            <div class="time"><i class="ace-icon fa fa-clock-o"></i><span class="green"><?php print $row->mensagem_data; ?></span></div>
                            <div class="name"><a href="https://lea.co.ao/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->ce_usuario); ?>"><?php print $row->username; ?></a></div>
                            <div class="text"><?php print $row->mensagem; ?>.</div>
                            <div class="tools"><a href="#" class="btn btn-minier btn-info"><i class="icon-only ace-icon fa fa-share"></i></a></div>
			            </div>
                    </div>
                <?php                    
            }
        }   
    }
    //
    function ultimasMensagensPorUsuario($ce_usuario,$is_mobile)
    {
        $connection = new cnx();
        $connection->connect();
        
        $ce_usuario_ = (int) base64_decode($ce_usuario);
        //
        $query = "SELECT * FROM tblmensagens msg JOIN tblsite_user_info su ON su.ce_usuario = msg.emissor WHERE msg.ce_usuario != ? AND msg.ce_amigo = ? ORDER BY msg.id_mensagens DESC";
        $stmt = mysqli_prepare($connection->myconn, $query);
        mysqli_stmt_bind_param($stmt, "ii", $ce_usuario_, $ce_usuario_);
        
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        //$query ='SELECT * FROM tblmensagens msg JOIN tblsite_user_info su ON su.ce_usuario = msg.emissor WHERE msg.ce_usuario != "' . $ce_usuario_ . '" and msg.ce_amigo = "' . $ce_usuario_ . '" ORDER BY id_mensagens DESC';
        //$result = mysqli_query($connection->myconn,$query);
        //
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result))
            {
                ?>
                    <div class="itemdiv commentdiv">
                        <div class="user">
                            <?php
                                if($row->fotoPerfil != null)
                                {
                                    ?> 
                                        <a href="https://www.lea.co.ao/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->ce_usuario); ?>">
                                            <img src="<?php print $row->fotoPerfil; ?>" style="width:100%;border-radius: 50%;"/>
                                        </a> 
                                    <?php    
                                }else{
                                    ?> <img src="https://www.lea.co.ao/nasocial/assets/images/avatars/profile-pic.jpg" style="width:100%;border-radius: 50%;"/> <?php
                                }
                            ?>
                        </div>
                        <div class="body">
                            <div class="name"> <a href="#"><?php print $row->username; ?></a> </div>
                            <div class="text">
                                <i class="ace-icon fa fa-quote-left"></i> <?php print $row->mensagem; ?> &hellip;
                                <i class="ace-icon fa fa-clock-o"></i> <span class="red"><?php print $row->mensagem_data; ?></span>
                                <a href="/nasocial/usuario/chat.php?amg=<?php print base64_encode($row->ce_usuario); ?>&us=<?php print $ce_usuario; ?>">
                                    <i class="ace-icon fa fa-comments-o fa-2x green middle" style="font-size: 17px;"></i> 
                                    <b style="font-size: 12px;">Ler</b>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php                    
            }
        }   
    }
}

?>
