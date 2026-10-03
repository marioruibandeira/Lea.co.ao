<?php
/**
 * @author Mário Bandeira
 */

include_once($_SERVER['DOCUMENT_ROOT'].'/conexao/cnx.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UtilidadeDAO.php');
//
class AmigoDAO {
    function paginaWebUsuarioAmigo($ce_usuario){
        $connection = new cnx();
        $connection->connect();
        
        $query = 'SELECT website FROM tblcontacto WHERE ce_usuario = "'.$ce_usuario.'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                 if($row->website !=NULL){ ?> 
                    <div class="profile-info-row">
                        <div class="profile-info-name"> Website </div>
                        <div class="profile-info-value"><a href="<?php print $row->website; ?>" target="_blank"><?php print $row->website; ?></a></div>
                    </div>
                 <?php    }            
            }
        }
    }
    //
    function FotoPerfilPaginaAmigos($ce_usuario_){
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($ce_usuario_);
        $query = "SELECT * FROM tblsite_user_info WHERE ce_usuario = $ce_usuario";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                ?> 
                    <span class="profile-picture"> 
                        <?php 
                            if($row->fotoPerfil == " " || $row->fotoPerfil == null)
                            {
                                ?> <img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src="http://lea.co.ao/nasocial/assets/images/avatars/profile-pic.jpg" /> <?php
                            }else{
                                ?> <img class="editable img-responsive" alt=" " src="<?php print $row->fotoPerfil; ?>" /> <?php
                            }
                        ?>  
                    </span> 
                <?php                
            }
        }
    }
    //
    function FotoPerfilPaginaAmigos_($ce_usuario_){
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($ce_usuario_);
        $query = "SELECT * FROM tblsite_user_info sui join  tblsite_user su on su.user_id = sui.ce_usuario WHERE ce_usuario = $ce_usuario";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                if($row->fotoPerfil == " " || $row->fotoPerfil == null)
                {
                    ?> <div style="background-image:url(/nasocial/assets/images/avatars/profile-pic.jpg);border: 2px solid #fff;border-radius:50px;width: 180px;height: 180px;top: 30px;position: absolute;background-size: cover;background-repeat: no-repeat;"></div> <?php
                }else{
                    ?> <div style="background-image:url(<?php print $row->fotoPerfil; ?>);border: 2px solid #fff;border-radius:50px;width: 180px;height: 180px;top: 30px;position: absolute;background-size: cover;background-repeat: no-repeat;"></div><?php
                }          
            }
        }
    }
    //
    function facebookUsuarioAmigo($ce_usuario){
        $connection = new cnx();
        $connection->connect();        
        $query = 'SELECT facebook FROM tblcontacto_social WHERE ce_usuario = "'.$ce_usuario.'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                if($row->facebook !=NULL){ ?>
                    <div class="profile-info-row">
                        <div class="profile-info-name">
                            <i class="middle ace-icon fa fa-facebook-square bigger-150 blue"></i>
                        </div>
                        <div class="profile-info-value"><a href="<?php print $row->facebook; ?>">Sigua-me no Facebook</a></div>
                    </div>
                <?php  }                
            }
        }
    }
    //
    function twitterUsuarioAmigo($ce_usuario){
        $connection = new cnx();
        $connection->connect();        
        $query = 'SELECT twitter FROM tblcontacto_social WHERE ce_usuario = "'.$ce_usuario.'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                if($row->twitter !=NULL){ ?>
                    <div class="profile-info-row">
                        <div class="profile-info-name"> <i class="middle ace-icon fa fa-twitter-square bigger-150 light-blue"></i></div>
                        <div class="profile-info-value"><a href="<?php print $row->twitter; ?>">Sigua-me no Twitter</a></div>
                    </div>
                <?php  }
            }
        }
    }
    //
    function googleUsuarioAmigo($ce_usuario){
        $connection = new cnx();
        $connection->connect();        
        $query = 'SELECT google FROM tblcontacto_social WHERE ce_usuario = "'.$ce_usuario.'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                if($row->google !=NULL){ ?>
                    <div class="profile-info-row">
                        <div class="profile-info-name"> <i class="middle ace-icon fa fa-google bigger-150 red"></i></div>
                        <div class="profile-info-value"><a href="<?php print $row->google; ?>">Sigua-me no Google+</a></div>
                    </div>
                <?php  }
            }
        }
    }
    //
     function localWebUsuarioAmigo($ce_usuario_){
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($ce_usuario_);
        
        $query = 'SELECT p.provincia AS provincia FROM tblsite_user_info sui JOIN provincia p on p.id_provincia = sui.ce_local WHERE ce_usuario = "'.$ce_usuario.'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                 if($row->provincia !=NULL){ ?> 
                    <div class="profile-info-row">
                        <div class="profile-info-name"> Local </div>
                        <div class="profile-info-value">
                            <i class="fa fa-map-marker light-orange bigger-110"></i>
                            <span><?php print $row->provincia; ?></span>
                        </div>
                    </div>
                 <?php    }            
            }
        }
    }
    //
    function amigoSexoUsuario($ce_usuario_){
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($ce_usuario_);
        
        $query = 'SELECT s.sexo AS sexo FROM tblsite_user_info sui JOIN tblsexo s ON s.id_sexo = sui.ce_sexo WHERE ce_usuario = "' . $ce_usuario . '"';
        $result = mysqli_query($connection->myconn,$query);
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){               
                if($row->sexo !=NULL){ ?> 
                    <div class="profile-info-row">
                        <div class="profile-info-name"> Genero </div>
                        <div class="profile-info-value"><span><?php  print $row->sexo; ?></span></div>
                    </div>
                <?php    } 
            }
        }else{
            
        }
    }
    //
    function amigoIdadeUsuario($ce_usuario_){
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($ce_usuario_);
        $query = 'SELECT YEAR(CURDATE()) - YEAR(data_nascimento) AS idade FROM tblsite_user_info WHERE ce_usuario = "'.$ce_usuario.'"';
        $result = mysqli_query($connection->myconn,$query);
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){               
                if($row->idade !=NULL){ ?> 
                    <div class="profile-info-row">
                        <div class="profile-info-name"> Idade </div>
                        <div class="profile-info-value"><span><?php  print $row->idade; ?></span></div>
                    </div>
                <?php    } 
            }
        }
    }
    //
    function totalVisitasUsuario($u_fnal){
        $connection = new cnx();
        $connection->connect();
        $ce_amigo = base64_decode($u_fnal);
        $query = 'SELECT usu_visita FROM tblusuario_historico WHERE ce_amigo = "'. $ce_amigo .'"';
        $result = mysqli_query($connection->myconn,$query);
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){               
                print $row->usu_visita;
            }
        }else{
            print 0;
        }
    }
    //
    function totalVisitasUsuarioPerfilAmigo($ce_amigo_){
        $connection = new cnx();
        $connection->connect();
         $ce_amigo = base64_decode($ce_amigo_);
        $query = 'SELECT usu_visita FROM tblusuario_historico WHERE ce_amigo = "'. $ce_amigo .'"';
        $result = mysqli_query($connection->myconn,$query);
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){               
                print $row->usu_visita;
            }
        }
    }
    //
    function amigoLogUsuario($ce_amigo){
        $connection = new cnx();
        $connection->connect();
        $ce_amigo_ = base64_decode($ce_amigo);
        $query = 'SELECT data_hora FROM tbllog_usuario WHERE ce_usuario = "'.$ce_amigo_.'"';
        $result = mysqli_query($connection->myconn,$query);
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){               
                print $row->data_hora;
            }
        }
    }
    //
    function amigoLogadoUsuario($ce_amigo){
        $connection = new cnx();
        $connection->connect();
        $ce_amigo_ = base64_decode($ce_amigo);
        $query = 'SELECT logado FROM tbllog_usuario WHERE ce_usuario = "'.$ce_amigo_.'" AND logado =1';
        $result = mysqli_query($connection->myconn,$query);
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){               
                $log = $row->logado;
                return $log;
            }
        }
    }
    //
    function amigoPedidoAmizadeUsuario($ce_amigo_,$ce_usuario_){
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($ce_usuario_);
        $ce_amigo = base64_decode($ce_amigo_);
        $query = 'SELECT ce_amigo FROM tblpedido_amizade WHERE ce_usuario = "'.$ce_usuario.'" AND ce_amigo = "'.$ce_amigo.'"';
        $result = mysqli_query($connection->myconn,$query);
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){               
                $log = $row->ce_amigo;
                return $log;
            }
        }
    }
    //
    function verificarAmizade($ce_amigo_,$ce_usuario_){
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($ce_usuario_);
        $ce_amigo = base64_decode($ce_amigo_);
        $query = 'SELECT ce_usuario FROM tblamigo WHERE ce_usuario = "'.$ce_usuario.'" AND ce_amigo = "'.$ce_amigo.'"';
        $result = mysqli_query($connection->myconn,$query);
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){               
                $v_amizade = $row->ce_usuario;
                echo("<script>console.log('PHP: verificar Existencia da amizade ->$v_amizade.');</script>");
                return $v_amizade;
                
            }
        }
    }
    //
    function amigoPedidoAmizadeQuemPedio($ce_amigo_,$ce_usuario_){
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($ce_usuario_);
        $ce_amigo = base64_decode($ce_amigo_);
        $query = 'SELECT quem_pedio FROM tblpedido_amizade WHERE ce_usuario = "'.$ce_usuario.'" AND ce_amigo = "'.$ce_amigo.'"';
        $result = mysqli_query($connection->myconn,$query);
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){               
                $quem_pedio = $row->quem_pedio;
                echo("<script>console.log('PHP: Pedido de amizade efectuado ->$quem_pedio com sucesso2!');</script>");
                return $quem_pedio;
                
            }
        }
    }
    //
    function totolAmigosAmigo($ce_amigo_){
        $connection = new cnx();
        $connection->connect();
        $ce_amigo = base64_decode($ce_amigo_);
        $query = 'SELECT IFNULL(COUNT(ce_amigo),0)  AS total_amigos FROM tblamigo WHERE ce_amigo = "'.$ce_amigo.'"';
        $result = mysqli_query($connection->myconn,$query);
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){               
                print $row->total_amigos;
            }
        }else{
            print 0;
        }
    }
    //
    function totolDiscosAmigo($ce_amigo_){
        $connection = new cnx();
        $connection->connect();
        $ce_amigo = base64_decode($ce_amigo_);
        $query = 'SELECT IFNULL(COUNT(ce_disco),0)  AS total_discos FROM tblproduto_em_estoque WHERE ce_usuario = "'.$ce_amigo.'"';
        $result = mysqli_query($connection->myconn,$query);
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){               
                $total_discos = $row->total_discos;
                return $total_discos;
            }
        }
    }
    //
    function totolCamisolasAmigo($ce_amigo_){
        $connection = new cnx();
        $connection->connect();
        $ce_amigo = base64_decode($ce_amigo_);
        $query = 'SELECT IFNULL(COUNT(marca_modelo),0)  AS total_camisolas FROM tblcamisola WHERE ce_usuario = "'.$ce_amigo.'"';
        $result = mysqli_query($connection->myconn,$query);
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){               
                $total_camisolas = $row->total_camisolas;
                return $total_camisolas;
            }
        }
    }
    //
    function contarVisualizacoesAmigo($ce_amigo_){
        $connection = new cnx();
        $connection->connect();        
        //Begin
        $ce_amigo = base64_decode($ce_amigo_);
        $querySelect = mysqli_query($connection->myconn,'SELECT usu_visita FROM tblusuario_historico WHERE ce_amigo = "'.$ce_amigo.'"');
        $row = mysqli_fetch_assoc($querySelect);
        $counter = $row['usu_visita'];
        //check if any value is present
        if ($counter===0 || $counter===null ){
            $counter = 1;            
            mysqli_query($connection->myconn,'INSERT INTO tblusuario_historico (usu_visita,ce_amigo) VALUES("'.$counter.'","'.$ce_amigo.'")');
        }
        //increment data at every refresh
        $add = $counter + 1;
        mysqli_query($connection->myconn,'UPDATE tblusuario_historico SET usu_visita = "'.$add.'" WHERE ce_amigo = "'.$ce_amigo.'"');
        //
        mysqli_free_result($querySelect);
        //mysqli_close($connection->close());
    }
    //
    function meusAmigos($u_fnal){
        $connection = new cnx();
        $connection->connect();
        $utilidade = new UtilidadeDAO();
        $ce_usuario = $utilidade->Decodificar($u_fnal);
        //
        $query = 'SELECT * FROM vwamigos WHERE ce_usuario = "'.$ce_usuario.'"';
        $result = mysqli_query($connection->myconn,$query);
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){ 
                ?>
                    <div class="itemdiv memberdiv">
			            <div class="inline pos-rel">
                            <div class="user">
                                <?php 
                                    if($row->fotoPerfil =='' || $row->fotoPerfil ==null)
                                    {
                                        ?> <a onClick="visitarAmigo()" style="cursor: pointer;"><img src="/nasocial/assets/images/avatars/avatar2.png" alt="Alexa Doe's avatar" /> </a><?php 
                                    }else{
                                        ?> <a onClick="visitarAmigo()" style="cursor: pointer;"><img src="<?php print $row->fotoPerfil; ?>" alt="Alexa Doe's avatar" style="width:70px;height:70px;" /> </a><?php
                                    }
                                ?>
                            </div>
                            <div class="body">
				                <div class="name"> <a onClick="visitarAmigo()" style="cursor: pointer;"> <span class="user-status status-online"></span> <?php print $row->username; ?> </a> </div>
                            </div>
                            <div class="popover">
                                <div class="arrow"></div>
                                <div class="popover-content">
                                    
                                    <div class="btn-group" style="width:100%">
										<button data-toggle="dropdown" class="btn btn-primary btn-white dropdown-toggle" style="width:100%">
										    Selecione <i class="ace-icon fa fa-angle-down icon-on-right"></i>
										</button>
										<ul class="dropdown-menu">
										    <li> <a onClick="rejeitar_amizade()" style="cursor: pointer"onmouseout="this.style.background ='white',this.style.color ='black'" onMouseOver="this.style.background ='red',this.style.color ='white'">Acabar Amizade</a> </li>
										    <script> function rejeitar_amizade() { window.location.href='/nasocial/logica/controller/usuario/AceitarRejeitarAmizadeController.php?ce_amig=<?php print $utilidade->Codificar($row->ce_amigo); ?>&ce_us=<?php print $u_fnal; ?>&orgn=dlt'; } </script>
										    <li> <a href="#">Reportar Abusos</a> </li>
										    <li class="divider"></li>
										    <li> <a href="#" style="background:red;color:white" onMouseOver="this.style.background ='red',this.style.color ='white'">Bloquear</a> </li>
										</ul>
								    </div>
											
                                    <div class="bolder">Content Editor</div>
                                    <div class="time">
                                        <i class="ace-icon fa fa-clock-o middle bigger-120 orange"></i>
                                        <span class="green"> <?php print $row->data_amigo; ?> </span>
                                    </div>
                                    <div class="hr dotted hr-8"></div>
                                    <div class="tools action-buttons">
                                        <?php if($row->facebook != null ){?><a href="<?php print $row->facebook; ?>"><i class="ace-icon fa fa-facebook-square blue bigger-150"></i> </a> <?php }?>
                                        <?php if($row->twitter != null ){?><a href="<?php print $row->twitter; ?>"> <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i> </a> <?php }?>
                                        <?php if($row->google != null ){?><a href="<?php print $row->google; ?>"><i class="ace-icon fa fa-google-plus-square red bigger-150"></i></a> <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!--
                    <div class="hr hr10 hr-double"></div>

                    <ul class="pager pull-right">
			<li class="previous disabled"> <a href="#">&larr; Prev</a> </li>
                        <li class="next"> <a href="#">Next &rarr;</a> </li>
                    </ul>
-->
                    <script> function visitarAmigo() { window.location.href='/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->ce_amigo); ?>'; } </script>
                <?php
            }
            $connection->close($connection->myconn);
        }else{
            $usuario =$u_fnal; $sessao = $u_fnal; $quantidade = 10;
            $utilidade->AmigosQueTavesConheces($usuario,$sessao,$quantidade);
        }
        
    }
    //
    function meusAmigosChat($ce_usuario_){
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($ce_usuario_);
        //
        $query = "SELECT a.id_amigo AS id_amigo, a.ce_usuario AS ce_usuario, a.ce_amigo AS ce_amigo, date_format(a.data_amigo,'%d/%m/%Y') AS data_amigo, su.username AS username , sui.fotoPerfil AS fotoPerfil FROM tblamigo a left join tblsite_user su on su.user_id = a.ce_amigo join tblsite_user_info sui on sui.ce_usuario = a.ce_amigo WHERE a.ce_usuario = $ce_usuario";
        $result = mysqli_query($connection->myconn,$query);
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){ 
                ?>
                    <div class="itemdiv memberdiv">
                        <div class="user">
                            <?php
                                if($row->fotoPerfil === '' || $row->fotoPerfil === null)
                                {
                                    ?> <img alt="<?php print $row->username; ?>" src="/nasocial/assets/images/avatars/avatar2.png" /> <?php
                                }else{
                                    ?> <img alt="<?php print $row->username; ?>" src="<?php print $row->fotoPerfil;  ?>" /> <?php
                                }
                            ?>
                            
                        </div>
                        <div class="body" style="background-color:#ccc; margin-right:0px">
                            <div style="float:left;">
                                <div class="name"><a href="/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->ce_amigo); ?>"><?php print $row->username; ?></a></div>
                                <div class="time"><i class="ace-icon fa fa-clock-o"></i><span class="default"> <?php print $row->data_amigo; ?></span></div>
                                <?php
                                if(!is_mobile())
                                {
                                   ?> 
                                        
                                            <a href="/nasocial/usuario/chat.php?amg=<?php print base64_encode($row->ce_amigo); ?>&us=<?php print base64_encode($row->ce_usuario); ?>&onchat=1">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32"><path d="M1.513 1.96a1.374 1.374 0 0 1 1.499-.21l19.335 9.215a1.147 1.147 0 0 1 0 2.07L3.012 22.25a1.374 1.374 0 0 1-1.947-1.46L2.49 12 1.065 3.21a1.375 1.375 0 0 1 .448-1.25Zm2.375 10.79-1.304 8.042L21.031 12 2.584 3.208l1.304 8.042h7.362a.75.75 0 0 1 0 1.5Z"></path></svg>
                                            </a>    
                                       
                                    <?php
                                }
                            ?>
                            </div>
                            <?php
                                if(is_mobile())
                                {
                                   ?> 
                                        <div style="float:right; padding-top:8px;">
                                            <a href="/nasocial/usuario/chat.php?amg=<?php print base64_encode($row->ce_amigo); ?>&us=<?php print base64_encode($row->ce_usuario); ?>&onchat=1">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32"><path d="M1.513 1.96a1.374 1.374 0 0 1 1.499-.21l19.335 9.215a1.147 1.147 0 0 1 0 2.07L3.012 22.25a1.374 1.374 0 0 1-1.947-1.46L2.49 12 1.065 3.21a1.375 1.375 0 0 1 .448-1.25Zm2.375 10.79-1.304 8.042L21.031 12 2.584 3.208l1.304 8.042h7.362a.75.75 0 0 1 0 1.5Z"></path></svg>
                                            </a>    
                                        </div>
                                    <?php
                                }
                            ?>
                            
                            
                        </div>
                    </div>
                <?php
            }
        }
    }
    //
    function TotalAmigos($ce_usuario_){
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($ce_usuario_);
        //
        $query = "SELECT COUNT(pa.ce_amigo) AS total_amigos FROM tblpedido_amizade pa WHERE pa.ce_usuario = $ce_usuario and quem_pedio > 0 and pa.ce_amigo NOT IN ( SELECT ce_amigo FROM `tblamigo` WHERE ce_usuario = $ce_usuario)";
        $result = mysqli_query($connection->myconn,$query);
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){ 
                return $row->total_amigos;
            }
        }else{
            return 0;
        }
    }
    //
    function MeusAmigos_($id,$is_mobile)
        {
            $connection = new cnx();
            $connection->connect();
            $caminho = "/nasocial/imgs/perfil/";
            //
            $id_ = base64_decode($id);
            //
            $query = "SELECT a.id_amigo AS id_amigo, a.ce_usuario AS ce_usuario, a.ce_amigo AS ce_amigo, date_format(a.data_amigo,'%d/%m/%Y') AS data_amigo, su.username AS username , sui.fotoPerfil AS fotoPerfil FROM tblamigo a left join tblsite_user su on su.user_id = a.ce_amigo join tblsite_user_info sui on sui.ce_usuario = a.ce_amigo WHERE a.ce_usuario = $id_ ORDER BY id_amigo DESC";
            //
            $result = mysqli_query($connection->myconn,$query);
            //
            if(mysqli_num_rows($result) > 0)
            { 
                while($row = mysqli_fetch_object($result))
                {
                    ?>
                        <div class="media">
                            <div class="media-left">
                                <?php 
                                    if($caminho != $row->fotoPerfil && $row->fotoPerfil != '' && $row->fotoPerfil != null)
                                    {
                                        ?> 
                                            <a onClick="/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->ce_amigo); ?>" style="cursor: pointer;">
                                                <div style="background-image:url(<?php print $row->fotoPerfil; ?>); border: 2px solid #ccc;width: 100px;height:100px;border-radius: 20px;background-repeat: no-repeat;background-size: cover;background-position: center;"></div>
                                            </a>
                                        <?php 
                                    }else{
                                        ?>
                                            <a onClick="/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->ce_amigo); ?>" style="cursor: pointer;">
                                                <img style="border: 2px solid #ccc; border-radius: 20px;" class=" " width="1<?php if($is_mobile){ print 0;}else{print 5;} ?>0" src="/nasocial/assets/images/avatars/avatar2.png" alt="Lea.co.ao">
                                            </a>
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="media-body" style="width:100%;padding-top:0px;">
                                <div style="float:right; padding: <?php if($is_mobile){ print 16;}else{print 40;} ?>px <?php if($is_mobile){ print 0;}else{print 4;} ?>0px 0px 0px; ">
                                    <a href="/nasocial/usuario/chat.php?amg=<?php print base64_encode($row->ce_amigo); ?>&us=<?php print $id; ?>&onchat=1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="<?php if($is_mobile){ print 44;}else{print 64;} ?>" height="<?php if($is_mobile){ print 44;}else{print 64;} ?>"><path fill-rule="evenodd" d="M1.513 1.96a1.374 1.374 0 011.499-.21l19.335 9.215a1.146 1.146 0 010 2.07L3.012 22.25a1.374 1.374 0 01-1.947-1.46L2.49 12 1.065 3.21a1.374 1.374 0 01.448-1.25zm2.375 10.79l-1.304 8.042L21.031 12 2.584 3.208l1.304 8.042h7.362a.75.75 0 010 1.5H3.888z"></path></svg></a>
                                </div>
                                <h3 <?php if($is_mobile){ print 'style="line-height: 25px; margin-top:10px;"';}else{print 5;} ?>  ><a href="/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->ce_amigo); ?>" style="color:#000;"><b><?php print $row->username;?></b></a></h3> 
                                <p ><?php print "Amigos desde<br/> " . $row->data_amigo;?></p>
                                <?php if(!is_mobile()) { ?> <p <?php if($is_mobile){ print 'style="line-height: 0;"';}else{print 5;} ?>><?php print "Local " . "<b >".$row->provincia . "</b>"?></p> <?php } ?>
                            </div>
                        </div>
                        <hr style="padding:5px 0px 0px 0px; margin:10px 0px 0px 0px;" />
                        <div class="btn-group btn-group-justified btn-group-xs">
                            <a href="/nasocial/logica/controller/usuario/AceitarRejeitarAmizadeController.php?ce_amig=<?php print base64_encode($row->ce_amigo); ?>&ce_us=<?php print $id; ?>&orgn=dlt" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span> Apagar </a>
                            <a href="https://lea.co.ao/downloads/downloads.php?som=<?php print base64_encode($row->ce_musica); ?>" class="btn btn-default"><span class="glyphicon glyphicon-remove-sign"></span> Bloqueiar</a>
                            <a href="https://lea.co.ao/discografia/musicas.php?strt=0&cat=MA==&check=1&opm=1" class="btn btn-default"><span class="glyphicon glyphicon-bullhorn"></span> Denunciar</a>
                        </div>
                        <hr style="padding:0px 0px 0px 0px; margin:5px 0px 0px 0px;" />
                    <?php
                }
            }   
        }
        
        function MeusAmigos_Validar($id,$is_mobile)
        {
            $connection = new cnx();
            $connection->connect();
            $id_ = base64_decode($id);
            
            $query = "SELECT a.id_amigo AS id_amigo, a.ce_usuario AS ce_usuario, a.ce_amigo AS ce_amigo, date_format(a.data_amigo,'%d/%m/%Y') AS data_amigo, su.username AS username , sui.fotoPerfil AS fotoPerfil FROM tblamigo a left join tblsite_user su on su.user_id = a.ce_amigo join tblsite_user_info sui on sui.ce_usuario = a.ce_amigo WHERE a.ce_usuario = $id_ ORDER BY id_amigo DESC";
            //
            $result = mysqli_query($connection->myconn,$query);
            //
            if(mysqli_num_rows($result) > 0)
            { 
                return 1;
            }   
            else 
            { 
                return 0; 
            }
        }
        
        function PessoasQueTalvezConheca($ce_usuario,$is_mobile)
        {
            $connection = new cnx();
            $connection->connect();
            $caminho = "/nasocial/imgs/perfil/";
            //
            $id_ = base64_decode($ce_usuario);
            //
            $query = "SELECT su.user_id, su.username, date_format(sui.data_registo,'%d/%m/%Y') as data_reg, sui.fotoPerfil AS fotoPerfil, p.provincia as provincia FROM tblsite_user su join tblsite_user_info sui on sui.ce_usuario = su.user_id JOIN provincia p on p.id_provincia = sui.ce_local WHERE su.user_id != $id_ and su.user_id not IN (SELECT a.ce_amigo FROM tblamigo a WHERE a.ce_usuario = $id_) ORDER by su.user_id DESC LIMIT 20";
            // 
            $result = mysqli_query($connection->myconn,$query);
            //
            if(mysqli_num_rows($result) > 0)
            { 
                while($row = mysqli_fetch_object($result))
                {
                    ?>
                        <div class="media">
                            <div class="media-left">
                                <?php 
                                    if($caminho != $row->fotoPerfil && $row->fotoPerfil != '' && $row->fotoPerfil != null)
                                    {
                                        ?> 
                                            <a onClick="https://www.lea.co.ao/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->user_id); ?>" style="cursor: pointer;">
                                                <div style="background-image:url(<?php print $row->fotoPerfil; ?>); border: 2px solid #ccc;width: 100px;height:100px;border-radius: 20px;background-repeat: no-repeat;background-size: cover;background-position: center;"></div>
                                            </a>
                                        <?php 
                                    }else{
                                        ?>
                                            <a onClick="https://www.lea.co.ao/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->user_id); ?>" style="cursor: pointer;">
                                                <img style="border: 2px solid #ccc; border-radius: 20px; width: 100px;height:100px;" src="/nasocial/assets/images/avatars/avatar2.png" alt="Lea.co.ao">
                                            </a>
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="media-body" style="width:100%;padding-top:0px;">
                                <div style="float:right; padding: <?php if($is_mobile){ print 16;}else{print 40;} ?>px <?php if($is_mobile){ print 0;}else{print 4;} ?>0px 0px 0px; ">
                                    <a href="https://www.lea.co.ao/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->user_id); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="<?php if($is_mobile){ print 44;}else{print 64;} ?>" height="<?php if($is_mobile){ print 44;}else{print 64;} ?>" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 24 24">
                                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                            <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
                                        </svg>
                                    </a>
                                </div>
                                <h3 <?php if($is_mobile){ print 'style="line-height: 3px; margin-top:28px;font-size: larger;"';}else{print 5;} ?>  ><a href="https://www.lea.co.ao/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->user_id); ?>" style="color:#000;"><b><?php print $row->username;?></b></a></h3> 
                                <p style="font-size: x-small;"><?php print "<b>Entrou Em :</b> " . $row->data_reg;?></p>
                                <p style="font-size: x-small;line-height: 3px;"><?php print "<b>Local :</b> " . $row->provincia;?></p>
                            </div>
                        </div>
                        <hr style="padding:0px 0px 0px 0px; margin:15px 0px 0px 0px; border:#ccc solid 2px;" />
                    <?php
                }
            }   
        }
        
}
