<?php 
    //
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/header.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UsuarioDAO.php');
    $u_l = new UsuarioDAO();    
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/utilidades/class.Provincias.php');
    $provi = new Provincias();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Idioma.php');
    $idi = new Idioma();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/usuario/class.PedidoAmizadeDAO.php');
    $p_a_dao = new PedidoAmizadeDAO(); 
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.AgendaEventoDAO.php');
    $AGENDA_EVENTO = new AgendaEventoDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.DiscografiaDAO.php');
    $DiscografiaDAO = new DiscografiaDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.LivrosDAO.php');
    $LivrosDAO = new LivrosDAO();
    //
    $utilizador = $usuario;
    $n = 10;
?>

<style>
   .custom-file-upload 
    {
        margin:0px;
        position: relative;
        padding: 8px;
        cursor: pointer;
        background-color: #ff4402;
        color: #fff;
        border-radius: 0px;
    }
 
    .file-input 
    {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }
    
    .p-b{ margin-bottom:20px !important;}
    
    
    /**/
    /**/
    /**/
    .container {
      max-width: 100%;
      margin: auto;
      background: white;
      padding: 15px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .upload-area {
      border: 2px dashed #ccc;
      padding: 20px;
      text-align: center;
      margin-bottom: 15px;
      cursor: pointer;
      border-radius: 8px;
    }
    .upload-area:hover, .upload-area.dragover { border-color: #007bff; }
    .cropper {
      position: relative;
      width: 100%;
      height: 60vw;
      max-height: 70vh;
      overflow: hidden;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      background: #fafafa;
      border-radius: 8px;
    }
    .cropper img {
      max-width: 100%;
      max-height: 100%;
      position: absolute;
      top: 50%; left: 50%;
      transform: translate(-50%, -50%);
      touch-action: none;
    }
    .crop-box {
      position: absolute;
      border: 2px solid #007bff;
      background: rgba(0,123,255,0.15);
      cursor: move;
      box-shadow: 0 0 0 9999px rgba(0,0,0,0.4);
      touch-action: none;
      min-width: 50px;
      min-height: 50px;
    }
    .resize-handle {
      position: absolute;
      width: 14px; height: 14px;
      background: #007bff;
      border: 2px solid #fff;
      border-radius: 50%;
    }
    .resize-handle.tl { top: -7px; left: -7px; cursor: nwse-resize; }
    .resize-handle.tr { top: -7px; right: -7px; cursor: nesw-resize; }
    .resize-handle.bl { bottom: -7px; left: -7px; cursor: nesw-resize; }
    .resize-handle.br { bottom: -7px; right: -7px; cursor: nwse-resize; }
    .controls {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      justify-content: center;
      margin-bottom: 15px;
    }
    button {
      padding: 12px 18px;
      background: #007bff;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 1rem;
      flex: 1;
      min-width: 120px;
    }
    button:hover { background: #0056b3; }
    button:disabled {
      background: #ccc;
      cursor: not-allowed;
    }
    #cropped-preview {
      width: 250px;
      height: 250px;
      object-fit: contain;
      margin: 15px auto;
      display: none;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      border: 1px solid #ddd;
    }
    #saveBtn {
      background: #28a745;
      min-width: 220px;
      margin: 0 auto 10px;
      display: none;
    }
    #saveBtn:hover { background: #218838; }
    #message {
      text-align: center;
      margin-top: 12px;
      font-weight: bold;
      min-height: 1.4em;
    }
    .success { color: #28a745; }
    .error   { color: #dc3545; }
    @media (max-width: 480px) {
      .cropper { height: 70vw; }
      button { padding: 14px; font-size: 1.1rem; }
      .resize-handle { width: 18px; height: 18px; }
      .resize-handle.tl { top: -9px; left: -9px; }
      .resize-handle.tr { top: -9px; right: -9px; }
      .resize-handle.bl { bottom: -9px; left: -9px; }
      .resize-handle.br { bottom: -9px; right: -9px; }
    }
</style>

<div class="page-header">
    <h1> Perfil & Preferências </h1>
</div>

<!-- /.page-header -->
<div class="row">
    <div class="col-xs-12">
	    <!-- PAGE CONTENT BEGINS -->
	    <div class="clearfix">
            <div class="pull-right">
		        <span class="green middle bolder">Preferências: &nbsp;</span>
                <div class="btn-toolbar inline middle no-margin">
                    <div data-toggle="buttons" class="btn-group no-margin">
                        <label class="btn btn-sm btn-yellow active">
                            <span class="bigger-110">Perfil</span>
                            <input type="radio" value="1" />
                        </label>
                        <label class="btn btn-sm btn-yellow">
                            <span class="bigger-110">Actividades</span>
                            <input type="radio" value="2" />
                        </label>
                        <label class="btn btn-sm btn-yellow">
                            <span class="bigger-110" id="bigger-110">Configurações</span>
                            <input type="radio" value="3" />
                        </label>
                    </div>
                </div>
            </div>
	    </div>
	    <div class="hr dotted"></div>
    <div>
    
    <div id="user-profile-1" class="user-profile row">
        <div class="col-xs-12 col-sm-3 center">
            <span class="profile-picture"> <?php  $u_l->fotoPerfilUtilizador($u_fnal) ;?> </span>
            <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right p-b">
			        <div class="inline position-relative">
			            <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
			                <i class="ace-icon fa fa-circle light-green"></i> &nbsp;
                            <span class="white"><?php $u_l->firstName($u_fnal); ?> <?php $u_l->lastNome($u_fnal); ?></span>
				        </a>
				        <ul class="align-left dropdown-menu dropdown-caret dropdown-lighter ">
				            <li class="dropdown-header"> Estato </li>
				            <li><a href="#"><i class="ace-icon fa fa-circle green"></i> &nbsp; <span class="green">Disponível</span></a></li>
                            <li><a href="#"><i class="ace-icon fa fa-circle red"></i> &nbsp; <span class="red">Ocupado</span></a></li>
                            <li><a href="#"><i class="ace-icon fa fa-circle grey"></i> &nbsp; <span class="grey">Invisível</span></a></li>
				        </ul>
                    </div>
                </div>
        </div>
        
        <div class="col-xs-12 col-sm-9">
			<div class="center">
                <span class="btn btn-app btn-sm btn-light no-hover">
                    <span class="line-height-1 bigger-170 blue"><?php $amigo->totalVisitasUsuario($u_fnal);  ?></span> <br /> 
                    <span class="line-height-1 smaller-90"> Visitas </span>
                </span>
                <a href="https://www.lea.co.ao/nasocial/meus-amigos/">
                    <span class="btn btn-app btn-sm btn-yellow no-hover">
                        <span class="line-height-1 bigger-170"> <?php print $amigo->totolAmigosAmigo($u_fnal);  ?> </span> <br />
                        <span class="line-height-1 smaller-90"> Amigos </span>
                    </span>
                </a>
                
                <a href="https://www.lea.co.ao/nasocial/loja/agendar.php?acao=3">
                    <span class="btn btn-app btn-sm btn-pink no-hover">
                        <span class="line-height-1 bigger-170"> <?php print $AGENDA_EVENTO->ContarEventosPorUsuario($utilizador); ?> </span> <br />
                        <span class="line-height-1 smaller-90"> Ingressos </span>
                    </span>
                </a>
                
                <a href="https://www.lea.co.ao/nasocial/loja/discografia.php?acao=3">
                    <span class="btn btn-app btn-sm btn-grey no-hover">
                        <span class="line-height-1 bigger-170"><?php print $DiscografiaDAO->ContarDiscosPorVender($utilizador); //print $amigo->totolDiscosAmigo($u_fnal);  ?></span> <br />
                        <span class="line-height-1 smaller-90"> CD </span>
                    </span>
                </a>
                
                <a href="https://www.lea.co.ao/nasocial/loja/livros.php?acao=3">
                    <span class="btn btn-app btn-sm btn-success no-hover">
                        <span class="line-height-1 bigger-170"> <?php print $LivrosDAO->ContarLivrosPorUsuario($utilizador); ?> </span> <br />
                        <span class="line-height-1 smaller-90"> Livros </span>
                    </span>
                </a>
                
                <a href="https://www.lea.co.ao/nasocial/loja/catalogo.php?us=<?php print $u_fnal;  ?>&cat=4">
                    <span class="btn btn-app btn-sm btn-primary no-hover" >
                    <span class="line-height-1 bigger-170">0<?php //print $amigo->totolCamisolasAmigo($u_fnal);  ?></span> <br />
                    <span class="line-height-1 smaller-90"> Lembr... </span>
                    </span>
                </a>
            </div>
            
            <div class="space-12"></div>
            
            <div class="profile-user-info profile-user-info-striped">
                <div class="profile-info-row">
                    <div class="profile-info-name"> Nome Usuário </div>
                    <div class="profile-info-value">
                    <span class="editable" id="username"><?php $u_l->nomeUsuarioImprenso($u_fnal); ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> Local </div>
                        <div class="profile-info-value">
                            <i class="fa fa-map-marker light-orange bigger-110"></i>
                            <?php print $u_l->naturalidade($u_fnal); ?>
                        </div>
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name"> Idade </div>
                        <div class="profile-info-value">
                            <span class="editable" id="age"><?php $u_l->idadeUsuario($u_fnal); ?></span>
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name"> Data de Registo </div>
                        <div class="profile-info-value">
                            <span class="editable" id="signup"><?php $u_l->dataRegistoUsuario($u_fnal); ?></span>
                        </div>
                    </div>
                    <!--
                    <div class="profile-info-row">
                        <div class="profile-info-name"> Último Log </div>

                        <div class="profile-info-value">
                            <span class="editable" id="login">3 hours ago</span>
                        </div>
                    </div>
                    -->
                    <div class="profile-info-row">
                        <div class="profile-info-name"> Sobre </div>
                        <div class="profile-info-value"> <span class="editable" id="about"><?php $u_l->sobreUsuario($u_fnal); ?></span> </div>
                    </div>
                </div>
				
				<div class="space-20"></div> 
			</div>
		</div>
	</div>

	<div class="hide">
	    <div id="user-profile-2" class="user-profile">
            <div class="tabbable">
    		    <ul class="nav nav-tabs padding-18">
                    <li class="active"><a data-toggle="tab" href="#feed"> <i class="orange ace-icon fa fa-rss bigger-120"></i> <?php if(is_mobile()){ ?>Act...<?php }else{ ?>Actividades<?php } ?> </a> </li>
                    <!--<li > <a data-toggle="tab" href="#friends"> <i class="blue ace-icon fa fa-users bigger-120"></i> Amigos </a> </li>-->
                    <li> <a data-toggle="tab" href="#pedidos"> <i class="blue ace-icon fa fa-users bigger-120"></i> <?php if(is_mobile()){ ?>Amizades<?php }else{ ?>Pedidos de Amizades<?php } ?>  </a> </li>
    		    </ul>
		        <div class="tab-content no-border padding-24" <?php if(is_mobile()){ ?> style="padding: 24px 0px 24px 0px;" <?php } ?>>
		            <div id="feed" class="tab-pane in active"> <div style="border-bottom:#ccc dotted 1px;"><h2>Hoops, Você não tem nenhuma actividade ainda!</h2></div> </div>
                    <div id="friends" class="tab-pane"> <div class="profile-users clearfix"> <?php $amigo->meusAmigos($u_fnal) ?> </div> </div> 
                    <div id="pedidos" class="tab-pane"> <?php $p_a_dao->pedidoAmizadePendente($u_fnal) ?> </div> 
                </div>
			</div>
        </div>
    </div>
    <div class="hide">
        <div id="user-profile-3" class="user-profile row">
            <div class="col-sm-offset-1 col-sm-10">
                <div class="well well-sm">
                    <!--<div class="inline middle blue bigger-110"> Seu perfil está quase completo </div>
                        &nbsp; &nbsp; &nbsp;
                        <div style="width:200px;" data-percent="99%" class="inline middle no-margin progress progress-striped active pos-rel">
						    <div class="progress-bar progress-bar-success" style="width:70%"></div>
				        </div>
			        </div>-->
			        <div class="space"></div>
			        <form class="form-horizontal" action="/nasocial/logica/controller/usuario/perfilController.php" enctype="multipart/form-data" method="post">
					    
					    <input type="hidden" name="dono" value="<?php print $utilizador; ?>"/>
                        
                        <div class="tabbable">
                            <ul class="nav nav-tabs padding-12">
                                <li class="active">
            						<a data-toggle="tab" href="#edit-basic">
                                        <i class="green ace-icon fa fa-pencil-square-o bigger-125"></i> Info
            						</a>
                                </li>
                                <li>
            						<a data-toggle="tab"  href="#edit-settings" class="click-edit-settings">
                                        <i class="purple ace-icon fa fa-cog bigger-125"></i> Opções
            						</a>
                                <li>
                                    <!--<a data-toggle="tab" href="#edit-password">
                                        <i class="blue ace-icon fa fa-camera bigger-125"></i> Foto
                				    </a>-->
                				    <a data-toggle="tab" href="#edit-password">
                                        <i class="blue ace-icon fa fa-key bigger-125"></i> Senha
                				    </a>
                                </li>
            		        </ul>
            			        
            			    <?php $array = $u_l->fotoPerfil($u_fnal);  ?>
            			        
                                <div class="tab-content profile-edit-tab-content">
                                    <div id="edit-basic" class="tab-pane in active">
                        				<h4 class="header blue bolder smaller">Geral</h4>
                        				<div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right">Foto de Perfil</label>
                                            <div class="col-sm-9">
                                                <!--<div class="custom-file-upload">
                                                    <i class="glyphicon glyphicon-open"></i> Carregar foto de perfil 
                                                    <input type="file" id="profilePic" name="profilePic" class="file-input" accept="image/*" value="<?php //print $array[4]; ?>">
                                                    (<span id="carregarFotoPerfil_"></span>)
                                                    <input type="hidden" name="foto_perfil" value="<?php //print $array[4]; ?>"/>
                                                </div>-->
                                                <a href="#" class="btn btn-danger btn-block" 
                                                   data-toggle="modal" 
                                                   data-target="#modalCamera">
                                                    <i class="blue ace-icon fa fa-camera bigger-130" style="color:#fff !important;"></i>
                                                </a>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right">Nome Usuário</label>
                                                <div class="col-sm-9">
                                                    <span class="input-icon input-icon-right largura">
                                                    <input name="username" class="input-medium largura" type="text" id=" " placeholder="Nome Usuário" readonly="readonly" value="<?php $u_l->nomeUsuarioImprenso($u_fnal); ?>" />
                                                </span>
                                            </div>
                                        </div>
                                                            
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right">Nome</label>
                                            <div class="col-sm-9">
                                                <span class="input-icon input-icon-right largura">
                                                    <input name="p_nome" class="input-medium largura" type="text" id="form-field-first" placeholder="Primeiro Nome" value="<?php $u_l->firstName($u_fnal); ?>" />
                                                </span>
                                            </div>
                                        </div>
                                                            
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right">Último Nome</label>
                                            <div class="col-sm-9">
                                                <span class="input-icon input-icon-right largura">
                                                    <input name="u_nome" class="input-medium largura" type="text" id="form-field-last" placeholder="Ultimo Nome" value="<?php $u_l->lastNome($u_fnal); ?>" />
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <hr />
                                        
                                        <div class="form-group">
                                			<label class="col-sm-3 control-label no-padding-right" for="form-field-date">Data de Nascimento </label>
                                            <div class="col-sm-9">
                                                <div class="input-medium largura">
                                                	<div class="input-group">
                                                	    <input name="data_nasc" class="input-medium date-picker largura" id="form-field-date" type="text" data-date-format="yyyy-mm-dd" placeholder="dd-mm-yyyy" value="<?php $u_l->dataNascimento($u_fnal); ?>" />
                                                		<span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
                                                    </div>
                                                </div>
                                            </div>
                                		</div>
                        				
                        				<div class="space-4"></div>
                        							
                        				<div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right">Genero</label>
                                            <div class="col-sm-9">
                                                <label class="inline">
                                                    <input name="r_sexo" type="radio" class="ace" value="1" <?php if($u_l->sexoUsuario($u_fnal) ==1 ){ print "checked";} ?> />
                                                    <span class="lbl middle"> Masculino</span>
                                                </label>                                                                                                                                
                                                &nbsp; &nbsp; &nbsp;
                                                <label class="inline">
                                                    <input name="r_sexo" type="radio" class="ace" value="2" <?php if($u_l->sexoUsuario($u_fnal) ==2 ){ print "checked";} ?> />
                                                    <span class="lbl middle"> Feminino</span>
                                                </label>
                                            </div>
                                        </div>
                                                    
                                        <div class="space-4"></div>
                                        
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-comment">Local </label>
                                            <div class="col-sm-9">
                                                <select class="col-sm-5 input-medium largura" name="c_prov"><?php $provi->idProvincia($u_fnal); $provi->listarProvinciasUsuario($u_fnal); ?></select>
                                            </div>
                        				</div>
                        							
                        				<div class="space-4"></div>
                        				
                        				<div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-comment">Sobre me</label>
                                            <div class="col-sm-9">
                                                <textarea class="largura" name="sobre_me" id="form-field-comment"><?php $u_l->sobreUsuario($u_fnal); ?></textarea>
                                            </div>
                                        </div>
                                                    
                                                    <h4 class="header blue bolder smaller">Contactos</h4>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right">Email</label>
                                                        <div class="col-sm-9">
                                                            <span class="input-icon input-icon-right largura">
                                                                <input name="email" class="input-medium largura" type="email" id="" placeholder="Email" value="<?php $u_l->emailUsuario($u_fnal); ?>"/>
                                                                <i class="ace-icon fa fa-envelope"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="space-4"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-website">Página Web</label>
                                                        <div class="col-sm-9">
                                                            <span class="input-icon input-icon-right largura">
                                                                <input name="p_web" class="input-medium largura" type="url" id="form-field-website" value="<?php $u_l->paginaWebUsuario($u_fnal); ?>"/>
                                                                <i class="ace-icon fa fa-globe"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="space-4"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-phone">Telefone</label>
                                                        <div class="col-sm-9"> 
                                                            <span class="input-icon input-icon-right largura">
                                                                <input name="telefone" class="input-medium largura" type="text" id="telefone" placeholder="Telefone" value="<?php $u_l->telefoneUsuario($u_fnal); ?>" />
                                                                <i class="ace-icon fa fa-phone fa-flip-horizontal"></i>
                        									</span>
                        								</div>
                        							</div>
                        							<div class="space-4"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-phone">Whatsapp</label>
                                                        <div class="col-sm-9"> 
                                                            <span class="input-icon input-icon-right largura">
                                                                <input type="text" id="whatsapp" name="whatsapp" class="input-medium largura" placeholder="Número Whatsapp" value="<?php $u_l->whatsappUsuario($u_fnal); ?>"/>
                                                                <i class="ace-icon fa fa-phone fa-flip-horizontal"></i>
                        									</span>
                        								</div>
                        							</div>
                        							<div class="space"></div>
                        							
                        							<h4 class="header blue bolder smaller">Social</h4>
                        							<div class="form-group">
                        							    <label class="col-sm-3 control-label no-padding-right">Facebook</label>
                        							    <div class="col-sm-9">
                        							        <span class="input-icon input-icon-right largura">
                        							            <input type="url" id="facebook" name="facebook" class="largura" placeholder="Facebook" value="<?php $u_l->facebookUsuario($u_fnal); ?>"/>
                        							            <!--<i class="ace-icon fa fa-facebook blue"></i>-->
                        							        </span>
                        							    </div>
                        							</div>
                        							<div class="space-4"></div>
                        							<div class="form-group">
                        							    <label class="col-sm-3 control-label no-padding-right">X.com</label>
                        							    <div class="col-sm-9">
                        							        <span class="input-icon input-icon-right largura">
                        							            <input type="url" id="twitter" name="twitter" class="largura" placeholder="X.com" value="<?php $u_l->twitterUsuario($u_fnal); ?>"  />
                        							        </span>
                        							    </div>
                        							</div>
                        							<div class="space-4"></div>
                        							<div class="form-group">
                        							    <label class="col-sm-3 control-label no-padding-right">TikTok</label>
                        							    <div class="col-sm-9">
                        							        <span class="input-icon input-icon-right largura">
                        							            <input type="url" id="tiktok" name="tiktok" class="largura" placeholder="TikTok" value="<?php $u_l->tiktokUsuario($u_fnal); ?>"/>
                        							        </span>
                        							    </div>
                        							</div>
                        							<div class="space-4"></div>
                        							<div class="form-group">
                        							    <label class="col-sm-3 control-label no-padding-right">Instagram</label>
                        							    <div class="col-sm-9">
                        							        <span class="input-icon input-icon-right largura">
                        							            <input type="url" id="instagram" name="instagram" class="largura" placeholder="Instagram" value="<?php $u_l->Instagram($u_fnal); ?>" />
                        							        </span>
                        							    </div>
                        							</div>
                        							
                        							<h4 class="header blue bolder smaller">Detalhes Bancários</h4>
                        							
                        							<div class="form-group">
                        						    <label class="col-sm-3 control-label no-padding-right">Dependência</label>
                        						    <div class="col-sm-9">
                        							    <span class="input-icon input-icon-right largura"> 
                        							        <input type="text"  id="dependencia" name="dependencia" class="largura" placeholder="Dependência" value="<?php $u_l->Dependencia($u_fnal); ?>"/> 
                        							    </span>
                        						    </div>
                        						</div>
                        						<div class="space-4"></div>
                        						
                        						<div class="form-group">
                        						    <label class="col-sm-3 control-label no-padding-right">Conta</label>
                        						    <div class="col-sm-9">
                        							    <span class="input-icon input-icon-right largura"> 
                        							        <input type="text" id="conta" name="conta" class="largura" placeholder="Conta" value="<?php $u_l->Conta($u_fnal); ?>"/> 
                        							    </span>
                        						    </div>
                        						</div>
                        						<div class="space-4"></div>
                        						
                        						<div class="form-group">
                        						    <label class="col-sm-3 control-label no-padding-right">IBAN</label>
                        						    <div class="col-sm-9">
                        							    <span class="input-icon input-icon-right largura"> 
                        							        <input type="text" id="iban" name="iban" class="largura" placeholder="IBAN" value="<?php $u_l->Iban($u_fnal); ?>"/> 
                        							    </span>
                        						    </div>
                        						</div>
                        							
                        						<h4 class="header blue bolder smaller">Detalhes Pessoais</h4>
                        							
                        					    <div class="form-group">
                        						    <label class="col-sm-3 control-label no-padding-right">BI</label>
                        						    <div class="col-sm-9">
                        							    <span class="input-icon input-icon-right largura"> 
                        							        <input type="text" id="bi" name="bi" class="largura" placeholder="BI" value="<?php $u_l->Bi($u_fnal); ?>"/> 
                        							    </span>
                        						    </div>
                        						</div>
                        						<div class="space-4"></div>
                        						
                        						<div class="form-group">
                        						    <label class="col-sm-3 control-label no-padding-right">Nº Contribuente</label>
                        						    <div class="col-sm-9">
                        							    <span class="input-icon input-icon-right largura"> 
                        							        <input type="text" id="nContribuente" name="nContribuente" class="largura" placeholder="Nº Contribuente" value="<?php $u_l->Contribuente($u_fnal); ?>"/> 
                        							    </span>
                        						    </div>
                        						</div>
                        			        </div>
                        					    
                        					<div id="edit-settings" class="tab-pane">
                        				        <div class="space-10"></div>
                                                    <div>
                                                        <label class="inline">
                                                            <input type="checkbox" name="perfil_p" value="1" class="ace" <?php if($u_l->tornaMeuPerfilPrivado($u_fnal) ==1 ){ print "checked";} ?>/>
                                                            <span class="lbl"> Torna o meu perfil privado</span>
                                                        </label>
                                                    </div>
                                                    <div class="space-8"></div>
                                                    <div>
                                                        <label class="inline">
                                                            <input type="checkbox" name="envia_email" class="ace" value="1" <?php if($u_l->meEnviaUmEmail($u_fnal) == 1 ){ print "checked";} ?>/>
                                                            <span class="lbl"> Envia-me email sobre o que acontece na lea.co.ao</span>
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label class="inline">
                                                            <select class="ace" id="form-field-select-1" name="id_idio" > <?php print $idi->idIdiomaSelecionado($u_fnal); $idi->listarIdioma($u_fnal); ?></select>
                                                            <span class="lbl" style=""> Idioma</span>
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" name="manter_histo" class="ace" value="1" <?php if($u_l->checkerManterHistorico($u_fnal) ==1 ){ print "checked";} ?>/>
                                                            <span class="lbl"> Manter um histórico das minhas conversas</span>
                                                        </label>
                                                        <label>
                                                            <span class="space-2 block"></span> 
                                                            por <input type="text" class="input-mini" maxlength="3" name="n_dias" value="<?php $u_l->listarNumeroDias($u_fnal);?>"/>dias
                                                        </label>
                                                    </div>
                                                </div>
                                                <div id="edit-password" class="tab-pane">
                                                    <div class="space-10"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">Nova Senha</label>
                                                        <div class="col-sm-9">
                                                            <input type="password" id="form-field-pass2" name="p_senha" style="width: 211px;" />
                                                        </div>
                                                    </div> 
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-pass2">Confirmar Senha</label>
                                                        <div class="col-sm-9">
                                                            <input type="password" id="form-field-pass2" name="s_senha"style="width: 211px;" />
                                                        </div>
                                                    </div>
                                                </div>
                        				    </div>
                                        </div>
            
                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit">
                                    <i class="ace-icon fa fa-check bigger-110"></i> Guardar
                                </button>
                                &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                    <i class="ace-icon fa fa-undo bigger-110"></i> Reset
                                </button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.span -->
            </div><!-- /.user-profile -->
        </div> <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- /. FIM DO TAG Principal desta pagina -->                                            
        </div><!-- /. Tag proveniente do cabeçalho 1 -->
    </div><!-- /. Tag proveniente do cabeçalho 2 -->
</div><!-- /. Tag proveniente do cabeçalho 3 -->



<div class="modal fade" id="modalCamera" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  
  <div class="container">
  <h2 style="text-align:center; margin-bottom:15px;">Corta a tua imagem</h2>
  <div class="upload-area" id="uploadArea">
    <p>Toca ou arrasta uma imagem aqui</p>
    <input type="file" id="fileInput" accept="image/*" style="display:none;">
  </div>
  <div class="cropper" id="cropper">
    <img id="image" />
    <div id="cropBox" class="crop-box" style="display:none;">
      <div class="resize-handle tl"></div>
      <div class="resize-handle tr"></div>
      <div class="resize-handle bl"></div>
      <div class="resize-handle br"></div>
    </div>
  </div>
  <div class="controls">
    <button id="cropBtn">Cortar (250×250)</button>
    <button id="resetBtn">Reiniciar</button>
  </div>

  <img id="cropped-preview" alt="Pré-visualização 250×250" />
  <button id="saveBtn">Guardar Recorte</button>
  <div id="message"></div>

  <canvas id="canvas" style="display:none;"></canvas>
</div>

</div>
</div>



                        


		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="https://lea.co.ao/nasocial/assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="/nasocial/assets/js/jquery-ui.custom.min.js"></script>
		<script src="/nasocial/assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="/nasocial/assets/js/jquery.gritter.min.js"></script>
		<script src="/nasocial/assets/js/bootbox.js"></script>
		<script src="/nasocial/assets/js/jquery.easypiechart.min.js"></script>
		<script src="/nasocial/assets/js/bootstrap-datepicker.min.js"></script>
		<script src="/nasocial/assets/js/jquery.hotkeys.index.min.js"></script>
		<script src="/nasocial/assets/js/bootstrap-wysiwyg.min.js"></script>
		<script src="/nasocial/assets/js/select2.min.js"></script>
		<script src="/nasocial/assets/js/spinbox.min.js"></script>
		<script src="/nasocial/assets/js/bootstrap-editable.min.js"></script>
		<script src="/nasocial/assets/js/ace-editable.min.js"></script>
		<script src="/nasocial/assets/js/jquery.maskedinput.min.js"></script>

		<!-- ace scripts -->
		<script src="https://lea.co.ao/nasocial/assets/js/ace-elements.min.js"></script>
		

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) 
			{
			    
			    /*----------------------------------------------*/
			    $('#id-foto-perfil').ace_file_input({
					no_file:'Procurar Foto ...',
					btn_choose:'Foto de Perfil',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false 
				});
			    /**/
			
				//editables on first profile page
				$.fn.editable.defaults.mode = 'inline';
				$.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
			    $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+
			                                '<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';    
				
				//editables 
				
				//text editable
			    $('#username')
				.editable({
					type: 'text',
					name: 'username'		
			    });
			
			
				
				//select2 editable
				var countries = [];
			    $.each({ "CA": "Canada", "IN": "India", "NL": "Netherlands", "TR": "Turkey", "US": "United States"}, function(k, v) {
			        countries.push({id: k, text: v});
			    });
			
				var cities = [];
				cities["CA"] = [];
				$.each(["Toronto", "Ottawa", "Calgary", "Vancouver"] , function(k, v){
					cities["CA"].push({id: v, text: v});
				});
				cities["IN"] = [];
				$.each(["Delhi", "Mumbai", "Bangalore"] , function(k, v){
					cities["IN"].push({id: v, text: v});
				});
				cities["NL"] = [];
				$.each(["Amsterdam", "Rotterdam", "The Hague"] , function(k, v){
					cities["NL"].push({id: v, text: v});
				});
				cities["TR"] = [];
				$.each(["Ankara", "Istanbul", "Izmir"] , function(k, v){
					cities["TR"].push({id: v, text: v});
				});
				cities["US"] = [];
				$.each(["New York", "Miami", "Los Angeles", "Chicago", "Wysconsin"] , function(k, v){
					cities["US"].push({id: v, text: v});
				});
				
				var currentValue = "NL";
			    $('#country').editable({
					type: 'select2',
					value : 'NL',
					//onblur:'ignore',
			        source: countries,
					select2: {
						'width': 140
					},		
					success: function(response, newValue) {
						if(currentValue == newValue) return;
						currentValue = newValue;
						
						var new_source = (!newValue || newValue == "") ? [] : cities[newValue];
						
						//the destroy method is causing errors in x-editable v1.4.6+
						//it worked fine in v1.4.5
						/**			
						$('#city').editable('destroy').editable({
							type: 'select2',
							source: new_source
						}).editable('setValue', null);
						*/
						
						//so we remove it altogether and create a new element
						var city = $('#city').removeAttr('id').get(0);
						$(city).clone().attr('id', 'city').text('Select City').editable({
							type: 'select2',
							value : null,
							//onblur:'ignore',
							source: new_source,
							select2: {
								'width': 140
							}
						}).insertAfter(city);//insert it after previous instance
						$(city).remove();//remove previous instance
						
					}
			    });
			
				$('#city').editable({
					type: 'select2',
					value : 'Amsterdam',
					//onblur:'ignore',
			        source: cities[currentValue],
					select2: {
						'width': 140
					}
			    });
			
			
				
				//custom date editable
				$('#signup').editable({
					type: 'adate',
					date: {
						//datepicker plugin options
						    format: 'yyyy/mm/dd',
						viewformat: 'yyyy/mm/dd',
						 weekStart: 1
						 
						//,nativeUI: true//if true and browser support input[type=date], native browser control will be used
						//,format: 'yyyy-mm-dd',
						//viewformat: 'yyyy-mm-dd'
					}
				})
			
			    $('#age').editable({
			        type: 'spinner',
					name : 'age',
					spinner : {
						min : 16,
						max : 99,
						step: 1,
						on_sides: true
						//,nativeUI: true//if true and browser support input[type=number], native browser control will be used
					}
				});
				
			
			    $('#login').editable({
			        type: 'slider',
					name : 'login',
					
					slider : {
						 min : 1,
						  max: 50,
						width: 100
						//,nativeUI: true//if true and browser support input[type=range], native browser control will be used
					},
					success: function(response, newValue) {
						if(parseInt(newValue) == 1)
							$(this).html(newValue + " hour ago");
						else $(this).html(newValue + " hours ago");
					}
				});
			
				$('#about').editable({
					mode: 'inline',
			        type: 'wysiwyg',
					name : 'about',
			
					wysiwyg : {
						//css : {'max-width':'300px'}
					},
					success: function(response, newValue) {
					}
				});
				
				
				
				// *** editable avatar *** //
				try {//ie8 throws some harmless exceptions, so let's catch'em
			
					//first let's add a fake appendChild method for Image element for browsers that have a problem with this
					//because editable plugin calls appendChild, and it causes errors on IE at unpredicted points
					try {
						document.createElement('IMG').appendChild(document.createElement('B'));
					} catch(e) {
						Image.prototype.appendChild = function(el){}
					}
			
					var last_gritter
					$('#avatar').editable({
						type: 'image',
						name: 'avatar',
						value: null,
						//onblur: 'ignore',  //don't reset or hide editable onblur?!
						image: {
							//specify ace file input plugin's options here
							btn_choose: 'Trocar Foto',
							droppable: true,
							maxSize: 110000,//~100Kb
			
							//and a few extra ones here
							name: 'avatar',//put the field name here as well, will be used inside the custom plugin
							on_error : function(error_type) {//on_error function will be called when the selected file has a problem
								if(last_gritter) $.gritter.remove(last_gritter);
								if(error_type == 1) {//file format error
									last_gritter = $.gritter.add({
										title: 'File is not an image!',
										text: 'Please choose a jpg|gif|png image!',
										class_name: 'gritter-error gritter-center'
									});
								} else if(error_type == 2) {//file size rror
									last_gritter = $.gritter.add({
										title: 'File too big!',
										text: 'Image size should not exceed 100Kb!',
										class_name: 'gritter-error gritter-center'
									});
								}
								else {//other error
								}
							},
							on_success : function() {
								$.gritter.removeAll();
							}
						},
					    url: function(params) {
							// ***UPDATE AVATAR HERE*** //
							//for a working upload example you can replace the contents of this function with 
							//examples/profile-avatar-update.js
			
							var deferred = new $.Deferred
			
							var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
							if(!value || value.length == 0) {
								deferred.resolve();
								return deferred.promise();
							}
			
			
							//dummy upload
							setTimeout(function(){
								if("FileReader" in window) {
									//for browsers that have a thumbnail of selected image
									var thumb = $('#avatar').next().find('img').data('thumb');
									if(thumb) $('#avatar').get(0).src = thumb;
								}
								
								deferred.resolve({'status':'OK'});
			
								if(last_gritter) $.gritter.remove(last_gritter);
								last_gritter = $.gritter.add({
									title: 'Avatar Updated!',
									text: 'Uploading to server can be easily implemented. A working example is included with the template.',
									class_name: 'gritter-info gritter-center'
								});
								
							 } , parseInt(Math.random() * 800 + 800))
			
							return deferred.promise();
							
							// ***END OF UPDATE AVATAR HERE*** //
						},
						
						success: function(response, newValue) {
						}
					})
				}catch(e) {}
				
				/**
				//let's display edit mode by default?
				var blank_image = true;//somehow you determine if image is initially blank or not, or you just want to display file input at first
				if(blank_image) {
					$('#avatar').editable('show').on('hidden', function(e, reason) {
						if(reason == 'onblur') {
							$('#avatar').editable('show');
							return;
						}
						$('#avatar').off('hidden');
					})
				}
				*/
			
				//another option is using modals
				$('#avatar2').on('click', function(){
					var modal = 
					'<div class="modal fade">\
					  <div class="modal-dialog">\
					   <div class="modal-content">\
						<div class="modal-header">\
							<button type="button" class="close" data-dismiss="modal">&times;</button>\
							<h4 class="blue">Trocar Foto 1</h4>\
						</div>\
						\
						\
						 <div class="modal-body">\
							<div class="space-4"></div>\
							<div style="width:75%;margin-left:12%;"><input type="file" name="profilePic" value="<?php print $array[4]; ?>"/></div>\
						 </div>\
						\
						 <div class="modal-footer center">\
							<button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Submit</button>\
							<button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
						 </div>\
						\
					  </div>\
					 </div>\
					</div>';
					
					
					var modal = $(modal);
					modal.modal("show").on("hidden", function(){
						modal.remove();
					});
			
					var working = false;
			
					var form = modal.find('form:eq(0)');
					var file = form.find('input[type=file]').eq(0);
					file.ace_file_input({
						style:'well',
						btn_choose:'Click to choose new avatar',
						btn_change:null,
						no_icon:'ace-icon fa fa-picture-o',
						thumbnail:'small',
						before_remove: function() {
							//don't remove/reset files while being uploaded
							return !working;
						},
						allowExt: ['jpg', 'jpeg', 'png', 'gif'],
						allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
					});
			
					form.on('submit', function(){
						if(!file.data('ace_input_files')) return false;
						
						file.ace_file_input('disable');
						form.find('button').attr('disabled', 'disabled');
						form.find('.modal-body').append("<div class='center'><i class='ace-icon fa fa-spinner fa-spin bigger-150 orange'></i></div>");
						
						var deferred = new $.Deferred;
						working = true;
						deferred.done(function() {
							form.find('button').removeAttr('disabled');
							form.find('input[type=file]').ace_file_input('enable');
							form.find('.modal-body > :last-child').remove();
							
							modal.modal("hide");
			
							var thumb = file.next().find('img').data('thumb');
							if(thumb) $('#profilePic').get(0).src = thumb;
			
							working = false;
						});
						
						setTimeout(function(){
							deferred.resolve();
						} , parseInt(Math.random() * 800 + 800));
			
						return false;
					});
							
				});
			
				//////////////////////////////
				$('#profile-feed-1').ace_scroll({
					height: '250px',
					mouseWheelLock: true,
					alwaysVisible : true
				});
			
				$('a[ data-original-title]').tooltip();
			
				$('.easy-pie-chart.percentage').each(function(){
				var barColor = $(this).data('color') || '#555';
				var trackColor = '#E2E2E2';
				var size = parseInt($(this).data('size')) || 72;
				$(this).easyPieChart({
					barColor: barColor,
					trackColor: trackColor,
					scaleColor: false,
					lineCap: 'butt',
					lineWidth: parseInt(size/10),
					animate:false,
					size: size
				}).css('color', barColor);
				});
				///////////////////////////////////////////
			
				//right & left position
				//show the user info on right or left depending on its position
				$('#user-profile-2 .memberdiv').on('mouseenter touchstart', function(){
					var $this = $(this);
					var $parent = $this.closest('.tab-pane');
			
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $this.offset();
					var w2 = $this.width();
			
					var place = 'left';
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) place = 'right';
					
					$this.find('.popover').removeClass('right left').addClass(place);
				}).on('click', function(e) {
					e.preventDefault();
				});
				///////////////////////////////////////////
				
				$('.input-mask-phone').mask('(999) 999-9999');
			
				//$('#user-profile-3').find('input[type=file]').ace_file_input('show_file_list', [{type: 'image', name: $('#avatar').attr('src')}]);
				////////////////////
				//change profile
				$('[data-toggle="buttons"] .btn').on('click', function(e){
					var target = $(this).find('input[type=radio]');
					var which = parseInt(target.val());
					$('.user-profile').parent().addClass('hide');
					$('#user-profile-'+which).parent().removeClass('hide');
				});
				
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove remaining elements before leaving page
					try {
						$('.editable').editable('destroy');
					} catch(e) {}
					$('[class*=select2]').remove();
				});
			
                $('#profile').click(function(){
                    $("#bigger-110").click();
                    $('.click-edit-settings').click();
                })
				
			});
			
			//
			//
			document.getElementById('profilePic').addEventListener('change', function(e) {
                if (e.target.files[0]) {
                    //document.getElementById('carregarFotoPerfil_').value = e.target.files[0].name;
                    document.getElementById('carregarFotoPerfil_').innerHTML = e.target.files[0].name;
                    console.log(e.target.files[0].name);
                }
            });
            //
            $(document).ready(function() {
                document.getElementById('carregarFotoPerfil_').innerHTML = "<?php print $array[4]; ?>";
            });

		</script>
		
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/footer.php'); ?>

<style> .largura{width:100%;} </style>



<script>
// ───────────────────────────────────────────────
//               ELEMENTOS
// ───────────────────────────────────────────────
const uploadArea  = document.getElementById('uploadArea');
const fileInput   = document.getElementById('fileInput');
const image       = document.getElementById('image');
const cropper     = document.getElementById('cropper');
const cropBox     = document.getElementById('cropBox');
const cropBtn     = document.getElementById('cropBtn');
const resetBtn    = document.getElementById('resetBtn');
const saveBtn     = document.getElementById('saveBtn');
const preview     = document.getElementById('cropped-preview');
const message     = document.getElementById('message');
const canvas      = document.getElementById('canvas');

let isDragging = false;
let isResizing = false;
let resizeHandle = null;
let startX, startY;
let hasCropped = false;

// ───────────────────────────────────────────────
//               UPLOAD
// ───────────────────────────────────────────────
uploadArea.addEventListener('click', () => fileInput.click());

['dragover','dragenter'].forEach(ev => uploadArea.addEventListener(ev, e => {
  e.preventDefault();
  uploadArea.classList.add('dragover');
}));

['dragleave','drop'].forEach(ev => uploadArea.addEventListener(ev, e => {
  e.preventDefault();
  uploadArea.classList.remove('dragover');
}));

uploadArea.addEventListener('drop', e => {
  const file = e.dataTransfer.files[0];
  if (file?.type.startsWith('image/')) loadImage(file);
});

fileInput.addEventListener('change', e => {
  const file = e.target.files[0];
  if (file) loadImage(file);
});

function loadImage(file) {
  const reader = new FileReader();
  reader.onload = e => {
    image.src = e.target.result;
    image.onload = initializeAfterImageLoad;
  };
  reader.readAsDataURL(file);
}

function initializeAfterImageLoad() {
  resetCropper();
  cropBox.style.display = 'block';
  hasCropped = false;
  preview.style.display = 'none';
  saveBtn.style.display = 'none';
  message.textContent = '';
  cropBtn.disabled = false;
}

// ───────────────────────────────────────────────
//          RESET / REINICIAR
// ───────────────────────────────────────────────
function resetCropper() {
  const rect = cropper.getBoundingClientRect();
  const size = Math.min(rect.width, rect.height) * 0.75;
  cropBox.style.width  = `${size}px`;
  cropBox.style.height = `${size}px`;
  cropBox.style.left   = `${(rect.width  - size)/2}px`;
  cropBox.style.top    = `${(rect.height - size)/2}px`;
}

resetBtn.addEventListener('click', () => {
  fileInput.value = '';
  image.src = '';
  cropBox.style.display = 'none';
  preview.style.display = 'none';
  saveBtn.style.display = 'none';
  message.textContent = '';
  cropBtn.disabled = true;
});

// ───────────────────────────────────────────────
//          INÍCIO DO DRAG / RESIZE
// ───────────────────────────────────────────────
function startEvent(e) {
  e.preventDefault();
  const touch = e.touches ? e.touches[0] : e;

  if (e.target.classList.contains('resize-handle')) {
    isResizing = true;
    resizeHandle = e.target.className.split(' ').pop();
  } else if (cropBox === e.target || cropBox.contains(e.target)) {
    isDragging = true;
  }

  const rect = cropBox.getBoundingClientRect();
  startX = touch.clientX - rect.left;
  startY = touch.clientY - rect.top;
}

// ───────────────────────────────────────────────
//          MOVIMENTO (principal correção aqui)
// ───────────────────────────────────────────────
function moveEvent(e) {
  if (!isDragging && !isResizing) return;
  e.preventDefault();

  const touch = e.touches ? e.touches[0] : e;
  const contRect = cropper.getBoundingClientRect();
  const imgRect  = image.getBoundingClientRect();

  let left = parseFloat(cropBox.style.left)   || 0;
  let top  = parseFloat(cropBox.style.top)    || 0;
  let size = parseFloat(cropBox.style.width)  || 50;

  const relX = touch.clientX - contRect.left;
  const relY = touch.clientY - contRect.top;

  if (isResizing) {
    let newLeft = left;
    let newTop  = top;
    let newSize = size;

    const right  = left + size;
    const bottom = top  + size;

    let candidate;

    if      (resizeHandle === 'br') candidate = Math.max(relX - left, relY - top);
    else if (resizeHandle === 'bl') { candidate = Math.max(right - relX, relY - top);      newLeft = right - candidate; }
    else if (resizeHandle === 'tr') { candidate = Math.max(relX - left, bottom - relY);    newTop  = bottom - candidate; }
    else if (resizeHandle === 'tl') { candidate = Math.max(right - relX, bottom - relY);   newLeft = right - candidate; newTop = bottom - candidate; }

    newSize = Math.max(50, candidate);

    // LIMITES DA IMAGEM
    const imgLeft   = imgRect.left   - contRect.left;
    const imgTop    = imgRect.top    - contRect.top;
    const imgRight  = imgLeft + imgRect.width;
    const imgBottom = imgTop  + imgRect.height;

    newLeft = Math.max(imgLeft,   Math.min(newLeft,   imgRight  - newSize));
    newTop  = Math.max(imgTop,    Math.min(newTop,    imgBottom - newSize));
    newSize = Math.min(newSize, imgRight  - newLeft);
    newSize = Math.min(newSize, imgBottom - newTop);

    cropBox.style.left   = `${newLeft}px`;
    cropBox.style.top    = `${newTop}px`;
    cropBox.style.width  = `${newSize}px`;
    cropBox.style.height = `${newSize}px`;  // sempre igual!
  }
  else if (isDragging) {
    let newLeft = relX - startX;
    let newTop  = relY  - startY;

    const imgLeft   = imgRect.left   - contRect.left;
    const imgTop    = imgRect.top    - contRect.top;
    const imgRight  = imgLeft + imgRect.width;
    const imgBottom = imgTop  + imgRect.height;

    newLeft = Math.max(imgLeft, Math.min(newLeft, imgRight  - size));
    newTop  = Math.max(imgTop,  Math.min(newTop,  imgBottom - size));

    cropBox.style.left = `${newLeft}px`;
    cropBox.style.top  = `${newTop}px`;
  }
}

function endEvent() {
  isDragging = false;
  isResizing = false;
  resizeHandle = null;
}

cropBox.addEventListener('mousedown', startEvent);
cropBox.addEventListener('touchstart', startEvent, { passive: false });
document.addEventListener('mousemove', moveEvent);
document.addEventListener('touchmove', moveEvent, { passive: false });
document.addEventListener('mouseup', endEvent);
document.addEventListener('touchend', endEvent);

// ───────────────────────────────────────────────
//               CORTAR → 250×250 JPEG
// ───────────────────────────────────────────────
cropBtn.addEventListener('click', () => {
  if (!image.complete || cropBox.style.display === 'none') return;

  const contRect = cropper.getBoundingClientRect();
  const imgRect  = image.getBoundingClientRect();
  const cropRect = cropBox.getBoundingClientRect();

  const cropLeft   = cropRect.left   - contRect.left;
  const cropTop    = cropRect.top    - contRect.top;
  const cropSize   = cropRect.width;   // já é quadrado

  const scaleX = image.naturalWidth  / imgRect.width;
  const scaleY = image.naturalHeight / imgRect.height;

  let sx = (cropLeft - (imgRect.left - contRect.left)) * scaleX;
  let sy = (cropTop  - (imgRect.top  - contRect.top )) * scaleY;
  let sSize = cropSize * scaleX;   // assumindo que scaleX ≈ scaleY na maioria dos casos

  sx = Math.max(0, Math.min(sx, image.naturalWidth  - sSize));
  sy = Math.max(0, Math.min(sy, image.naturalHeight - sSize));

  const OUTPUT_SIZE = 250;
  canvas.width = canvas.height = OUTPUT_SIZE;

  const ctx = canvas.getContext('2d');
  ctx.imageSmoothingEnabled = true;
  ctx.imageSmoothingQuality = 'high';

  ctx.drawImage(image, sx, sy, sSize, sSize, 0, 0, OUTPUT_SIZE, OUTPUT_SIZE);

  const dataUrl = canvas.toDataURL('image/jpeg', 0.88);
  preview.src = dataUrl;
  preview.style.display = 'block';
  saveBtn.style.display = 'block';
  hasCropped = true;
  message.textContent = '';
  cropBtn.disabled = true;
});

// ───────────────────────────────────────────────
//             GUARDAR VIA AJAX
// ───────────────────────────────────────────────

const dono = "<?php echo $utilizador; ?>";
const username = "<?php echo $u_l->nomeUsuarioImprenso($u_fnal); ?>";

saveBtn.addEventListener('click', async () => {
  if (!hasCropped) return;

  saveBtn.disabled = true;
  message.className = '';
  message.textContent = 'A guardar...';

  try {
    const blob = await (await fetch(preview.src)).blob();
    const formData = new FormData();
    
    // Anexar o ficheiro
    formData.append('cropped_image', blob, 'recorte.jpg');
    
    // Anexar os dados de texto para o PHP ler via $_POST
    formData.append('dono', dono);
    formData.append('username', username);

    const response = await fetch('/nasocial/logica/controller/usuario/perfilFotoController.php', {
      method: 'POST',
      body: formData // Passamos apenas o formData que agora contém tudo
    });

    const result = await response.json();

    if (result.success) {
      message.className = 'success';
      message.textContent = result.message || 'Imagem guardada com sucesso!';
      
      // Opcional: Redirecionar após sucesso como tinhas no PHP original
      setTimeout(() => {
          window.location.href = "https://www.lea.co.ao/nasocial/perfil.php?ses=" + dono;
      }, 1500);
      
    } else {
      message.className = 'error';
      message.textContent = result.message || 'Erro ao guardar a imagem.';
    }
  } catch (err) {
    message.className = 'error';
    message.textContent = 'Erro de ligação. Tenta novamente.';
  } finally {
    saveBtn.disabled = false;
  }
});



// ───────────────────────────────────────────────
//             NAVEGAR AO TAB OPÇOES
// ───────────────────────────────────────────────
$(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);
    
    if (urlParams.get('view') === 'atividades') {
        // 1. Esconde o perfil 1 e mostra o perfil 2 (Actividades/Pedidos)
        $('#user-profile-1').addClass('hide');
        $('#user-profile-2').closest('.hide').removeClass('hide');
        
        // 2. Garante que o botão amarelo "Actividades" no topo está ativo
        $('label.btn').removeClass('active');
        $('label.btn:contains("Actividades")').addClass('active');

        // 3. Ativa a aba de Pedidos de Amizades
        $('.nav-tabs a[href="#pedidos"]').tab('show');
    }
});

</script>
		
		

