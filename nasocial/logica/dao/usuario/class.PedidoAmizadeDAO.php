<?php
/**
 * Description of class
 *
 * @author hash
 */
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/usuario/class.AmigoDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/conexao/cnx.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Amizade.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UsuarioDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UtilidadeDAO.php');
//
class PedidoAmizadeDAO {
    /*function tornaMeuPerfilPrivado($ce_usuario,$ce_usuario){
        $connection = new cnx();
        $connection->connect();        
        $query = 'SELECT * FROM tblpedido_amizade WHERE ce_usuario ="'.$ce_usuario.'" AND ce_amigo="'.$ce_usuario.'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                $exist = $row->perfil_estato;
                return $exist;
            }
        }
    }*/
    //
    function pedidoAmizadePendente($u_fnal){
        $amigo = new AmigoDAO();
        $connection = new cnx();
        $connection->connect();
        $u_l = new UsuarioDAO();
        $utilidade = new UtilidadeDAO();
        $caminho = "/nasocial/imgs/perfil/";
        //
        $ce_usuario = $utilidade->Decodificar($u_fnal);
        $query = "SELECT * FROM vwpedido_amizade pa WHERE pa.ce_usuario = $ce_usuario and quem_pedio > 0 and pa.ce_amigo NOT IN ( SELECT ce_amigo FROM `tblamigo` WHERE ce_usuario = $ce_usuario)";
        $result = mysqli_query($connection->myconn,$query);
        //if records present        
        if(mysqli_num_rows($result) > 0){ 
            while($row =  mysqli_fetch_object($result)){                
                ?>
                    <div class="media search-media disabled" <?php if(is_mobile()){ ?> style="padding:12px 12px 12px 12px !important;" <?php } ?> >
                        <div class="media-left">
                            <a onClick="#" style="cursor: pointer;"> 
                                <?php 
                                    if($caminho != $row->fotoPerfil && $row->fotoPerfil != '' && $row->fotoPerfil != null)
                                    {
                                        ?> <img class="nav-user-photo" alt="Foto do Utilizador" src="<?php print $row->fotoPerfil;  ?>" style="width:80px;height:80px;" /><?php
                                    }
                                    else if($row->ce_sexo == 1)
                                    {
                                        ?> <img class="nav-user-photo" alt="Foto do Utilizador" src="/nasocial/assets/images/avatars/avatar.png"  /><?php
                                    }else if($row->ce_sexo == 2) {
                                        ?> <img class="nav-user-photo" alt="Foto do Utilizador" src="/nasocial/assets/images/avatars/avatar3.png" /><?php
                                    }else{
                                        ?> <img class="nav-user-photo" alt="Foto do Utilizador" src="/nasocial/assets/images/avatars/avatar2.png" /><?php   
                                    }
                                ?>
                            </a>
                        </div>
                        
                        <div class="media-body">
                            <div>
                                <h4 class="media-heading"> <a onClick="visitarAmigo()" style="cursor: pointer;" class="blue"> <span class="user-status status-offline"></span><?php print $row->username; ?></a> </h4>
                                <script> function visitarAmigo() { window.location.href='/nasocial/usuario/per-ami.php?ami=<?php print $utilidade->Codificar($row->ce_amigo); ?>'; } </script>
                            </div>
                            
                            <p><i class="ace-icon fa fa-clock-o middle bigger-120 grey"></i> <?php print $row->data_pedido; ?></p>
                            
                            <a onClick="aceitar_amizade()" style="cursor: pointer;color:green; padding-right:10px; border-right:#ccc solid 3px;"> <span class="bigger-110"><b>Aceitar</b> </span> </a> 
                            <a onClick="rejeitar_amizade()" style="cursor: pointer; color:#900; padding-left:10px;"> <span class="bigger-110"><b>Rejeitar</b></span> </a> 
                            <script> function rejeitar_amizade() { window.location.href='/nasocial/logica/controller/usuario/AceitarRejeitarAmizadeController.php?ce_amig=<?php print $utilidade->Codificar($row->ce_amigo); ?>&ce_us=<?php print $u_fnal; ?>&orgn=dlt'; } </script>
                            <script> function aceitar_amizade() { window.location.href='/nasocial/logica/controller/usuario/AceitarRejeitarAmizadeController.php?ce_amig=<?php print $utilidade->Codificar($row->ce_amigo); ?>&ce_us=<?php print $u_fnal; ?>&orgn=ins'; } </script>
                            
                        </div>
                    </div>
                <?php
            }
        }else{
            
            $usuario =$u_fnal; $sessao = $u_fnal; $quantidade = 10;
            $utilidade->AmigosQueTavesConheces($usuario,$sessao,$quantidade);
             
        }
        $connection->close($connection->myconn);
    }
    //
    function insertAceitarAmizade(Amizade $amizade){
        $connection = new cnx();
        $connection->connect();
        $utilidade = new UtilidadeDAO();
        //        
        $id_p_amizade = $amizade->getId_pedido_amizade();       
        // 
        $id_usuario_ = $utilidade->Decodificar($amizade->getCe_usuario());
        $id_amigo_ = $utilidade->Decodificar($amizade->getCe_amigo());     
        //
        $string = "INSERT INTO tblamigo (ce_usuario,ce_amigo) VALUES (?,?)";         
        $stmt = mysqli_prepare($connection->myconn, $string);        
        $stmt->bind_param("ii", $id_usuario_,$id_amigo_);
        $stmt->execute();         
        //
        $string = "INSERT INTO tblamigo (ce_usuario,ce_amigo) VALUES (?,?)";         
        $stmt = mysqli_prepare($connection->myconn, $string);        
        $stmt->bind_param("ii", $id_amigo_,$id_usuario_); 
        //
        $amigo_scs = $stmt->execute();
        //$connection->close();
        return $amigo_scs;
    }
    //
    function eliminarAmizade($usuario,$amigo) {
        $connection = new cnx();
        $connection->connect();
        $utilidade = new UtilidadeDAO();
        //
        $usuario_ = $utilidade->Decodificar($usuario);
        $amigo_ = $utilidade->Decodificar($amigo);  
        echo("<script>console.log('PHP: Eliminado amizade entre $usuario_ e $amigo_ com sucesso');</script>");
        $sqlQuery  =  "DELETE FROM tblamigo WHERE ce_usuario = ? AND ce_amigo = ?";        
        $statement =  $connection->myconn->prepare($sqlQuery);
        $statement->bind_param("ii", $usuario_,$amigo_);
        $statement->execute();
        //
        $sqlQuery  =  "DELETE FROM tblamigo WHERE ce_usuario = ? AND ce_amigo = ?";        
        $statement =  $connection->myconn->prepare($sqlQuery);
        $statement->bind_param("ii",$amigo_,$usuario_);
        $statement->execute();
        $statement->close();
        
        return $statement;        	
    }
}
