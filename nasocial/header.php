<?php
    if(isset($_COOKIE['user_logged'])) {
        $logado = $_COOKIE['user_logged'];
    } 
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	    <meta charset="utf-8" />
	    <title>Nasocial</title>

    	<meta name="description" content="redes sociais, lea.co.ao, angola" />
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    	<!-- bootstrap & fontawesome -->
    	<link rel="stylesheet" href="https://www.lea.co.ao/nasocial/assets/css/bootstrap.min.css" />
    	<link rel="stylesheet" href="https://www.lea.co.ao/nasocial/assets/font-awesome/4.5.0/css/font-awesome.min.css" />
        <!-- page specific plugin styles -->
    	<link rel="stylesheet" href="https://www.lea.co.ao/nasocial/assets/css/jquery-ui.custom.min.css" />
    	<link rel="stylesheet" href="https://www.lea.co.ao/nasocial/assets/css/chosen.min.css" />
    	<link rel="stylesheet" href="https://www.lea.co.ao/nasocial/assets/css/bootstrap-datepicker3.min.css" />
    	<link rel="stylesheet" href="https://www.lea.co.ao/nasocial/assets/css/bootstrap-timepicker.min.css" />
    	<link rel="stylesheet" href="https://www.lea.co.ao/nasocial/assets/css/daterangepicker.min.css" />
    	<link rel="stylesheet" href="https://www.lea.co.ao/nasocial/assets/css/bootstrap-datetimepicker.min.css" />
    	<link rel="stylesheet" href="https://www.lea.co.ao/nasocial/assets/css/bootstrap-colorpicker.min.css" />
    	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    	<!-- page specific plugin styles -->
		<link rel="stylesheet" href="https://www.lea.co.ao/nasocial/assets/css/colorbox.min.css" />
    	<!-- page specific plugin styles -->
    	<?php
            //
            include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/login/Login.php');
            $lo_in = new Login();
            include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UtilidadeDAO.php');
            $util = new UtilidadeDAO();
            include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/login/Login.php');
            $login = new Login();
            include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/login/g_variaveis.php');
            include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UtilidadeDAO.php');
            $utilidade = new UtilidadeDAO();  
            include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.MeuPerfil.php');
            $MeuPerfilDAO = new MeuPerfil();
            include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Idioma.php');
            $cla_idioma = new Idioma();
            include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/usuario/class.AmigoDAO.php');
            $amigo = new AmigoDAO();
            include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/lojaonline/NovoProduto.php');
            $novo_p = new NovoProduto();
            include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/usuario/class.PublicarDAO.php');
            $postes = new PublicarDAO();
            include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/usuario/LinhaTempo.php');
            $lt = new LinhaTempo();
            include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Usuario.php');
            $_usuario_statico = new Usuario();
            include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.PromocoesRegistroDAO.php');
            $PromocoesRegistroDAO = new PromocoesRegistroDAO();
            include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UtilidadeDAO.php');
            $utilidade = new UtilidadeDAO();
            include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.MuralDAO.php');
            $mural = new MuralDAO();
            //
            $menu_ativo = basename($_SERVER['SCRIPT_NAME']);
            //
            $url = $_SERVER["REQUEST_URI"];
            $tokens = explode('/', $url);
            $menu_ativo_2 = $tokens[sizeof($tokens)-2];
            //
            $lo = $GET_['lo'];
            //
            include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/h_log.php');
            //
            include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/lojaonline/NovoProduto.php');
            $inventario = new NovoProduto();
            //
            function is_mobile() {
                if (empty($_SERVER['HTTP_USER_AGENT'])) {
                    $is_mobile = false;
                } else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false
                    // many mobile devices (all iPhone, iPad, etc.)
                    || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false) { $is_mobile = true;
                } else {
                    $is_mobile = false;
                }
                return $is_mobile;
            }
            //
            if($login->VerificarSessionID($logado) != 1) { echo '<script type="text/javascript"> window.location = "https://lea.co.ao/nasocial/login/login.php" </script>'; }
        ?>
    	<!-- text fonts -->
    	<link rel="stylesheet" href="/nasocial/assets/css/fonts.googleapis.com.css" />
    	<!-- ace styles -->
    	<link rel="stylesheet" href="/nasocial/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    	<!--[if lte IE 9]>
            <link rel="stylesheet" href="https://www.lea.co.ao/nasocial/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
    	<![endif]-->
    	<link rel="stylesheet" href="/nasocial/assets/css/ace-skins.min.css" />
    	<link rel="stylesheet" href="/nasocial/assets/css/ace-rtl.min.css" />
    	<!--[if lte IE 9]>
            <link rel="stylesheet" href="https://www.lea.co.ao/nasocial/assets/css/ace-ie.min.css" />
    	<![endif]-->       
    	<!-- inline styles related to this page -->
    	<!-- ace settings handler -->
    	<script src="/nasocial/assets/js/ace-extra.min.js"></script>
    	<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
    	<!--[if lte IE 8]>
            <script src="https://www.lea.co.ao/nasocial/assets/js/html5shiv.min.js"></script>
            <script src="https://www.lea.co.ao/nasocial/assets/js/respond.min.js"></script>
    	<![endif]-->
    	<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
    	<!--[if lte IE 8]>
        	<script src="https://www.lea.co.ao/assets/js/html5shiv.min.js"></script>
        	<script src="https://www.lea.co.ao/nasocial/assets/js/respond.min.js"></script>
    	<![endif]-->
    	<script src="/nasocial/assets/js/jquery-2.1.4.min.js"></script>
    	<script src="/nasocial/assets/js/chosen.jquery.min.js"></script>
    	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    	
    </head>
    
    <body class="no-skin">
        <div id="navbar" class="navbar navbar-default          ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container" >
                <?php 
                    if(is_mobile())
                    {
                        ?>
                            <a href="/nasocial/combo-menu.php" class="navbar-toggle menu-toggler pull-left" style="padding-top:10px;">
                                <span class="sr-only">Toggle sidebar</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </a>
                        <?php
                    }else{
                        ?>
                            <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                                <span class="sr-only">Toggle sidebar</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        <?php
                    }
                ?>
                <div class="navbar-header pull-left">
                    <a href="/nasocial/" class="navbar-brand" >
                        <small> <?php if(!is_mobile()) { ?> <i class="ace-icon fa fa-users"></i> <?php } ?>
                        <b> Nasocial </b> </small>
                    </a>
                    <?php
                    if($lo_in->nomeUsuario($usuario_final)){
                        if(is_mobile()) {
                            ?>
                                <div class="navbar-buttons navbar-header pull-right" role="navigation" >
                                    <ul class="nav ace-nav">
                                        
                                        <li class="purple dropdown-modal">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                                <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                                                <span class="badge badge-important"><?php print $amigo->TotalAmigos($usuario_final); ?></span>
                                            </a>
                                            
                                            <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                                                <li class="dropdown-header"> 
                                                    <i class="ace-icon fa fa-exclamation-triangle"></i>
                                                    <?php print $amigo->TotalAmigos($usuario_final); ?> Notificações 
                                                </li>
                                                <li class="dropdown-content">
                                                    <ul class="dropdown-menu dropdown-navbar navbar-pink">
                                                        <li>
                                                            <div class="clearfix">
                                                                <a href="/nasocial/perfil.php?view=atividades">
                                                                    <span class="pull-left">
                                                                        <i class="btn btn-xs no-hover btn-pink fa fa-comment"></i> Pedido de Amizade
                                                                    </span>
                                                                    <span class="pull-right badge badge-info" <?php if(is_mobile()){?> style="margin: 13px;" <?php } ?> ><?php print $amigo->TotalAmigos($usuario_final); ?></span>
                                                                </a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li> 
                                                <!--<li class="dropdown-footer"><a href="#"> Todas Notificações <i class="ace-icon fa fa-arrow-right"></i> </a> </li>-->
                                            </ul>
                                        </li>
                                        
                                        <li class="green dropdown-modal">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                                <i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
                                                <span class="badge badge-success">0</span>
                                            </a>
                                        </li>
                                    
                                        <li class="light-blue dropdown-modal">
                                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                                <?php 
                                                    $lo_in->FotoPerfilTopMenuDireita($usuario_final); 
                                                    if(!is_mobile())
                                                    {
                                                        ?>
                                                            <span class="user-info">
                                                                <small><?php $cla_idioma->idiomaSelecionadoLables(15, $idioma); ?>,</small> <?php $lo_in->nomeUsuarioStatuUsuario($usuario_final); ?>
                                                            </span>
                                                            <i class="ace-icon fa fa-caret-down"></i>
                                                        <?php
                                                    }
                                                ?>
                                            </a>
                                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close" <?php  if(is_mobile()){ ?> style="padding-top: 11px !important;" <?php } ?>>
                                                <li><a href="#"><i class="ace-icon fa fa-cog"></i><?php $cla_idioma->idiomaSelecionadoLables(27, $idioma) ?></a></li>
                                                <li><a href="javascript:void(0)"><i class="ace-icon fa fa-user"></i> <?php $cla_idioma->idiomaSelecionadoLables(28, $idioma) ?> </a> </li>
                                                <li class="divider"></li>
                                                <li><a href="/nasocial/login/logout.php?lo=<?php print $utilizador; ?>"><i class="ace-icon fa fa-power-off"></i> <?php $cla_idioma->idiomaSelecionadoLables(26, $idioma) ?> </a> </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            <?php
                        }
                    }
                ?>
                </div>

                <?php
                    if($lo_in->nomeUsuario($usuario_final)){
                         if(!is_mobile()) {
                            ?>
                                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                                    <ul class="nav ace-nav">
                                        <li class="purple dropdown-modal">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                                <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                                                <span class="badge badge-important"><?php print $amigo->TotalAmigos($usuario_final); ?></span>
                                            </a>
                                            
                                            <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                                                <li class="dropdown-header"> <i class="ace-icon fa fa-exclamation-triangle"></i><?php print $amigo->TotalAmigos($usuario_final); ?> Notificações </li>
                                                
                                                <li class="dropdown-content">
                                                    <ul class="dropdown-menu dropdown-navbar navbar-pink">
                                                        <li>
                                                            <a href="/nasocial/perfil.php">
                                                                <div class="clearfix">
                                                                    <span class="pull-left">
                                                                        <i class="btn btn-xs no-hover btn-pink fa fa-comment"></i> Pedido de Amizade
                                                                    </span>
                                                                    <span class="pull-right badge badge-info"><?php print $amigo->TotalAmigos($usuario_final); ?></span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <!--
                                                        <li>
                                                            <a href="#">
                                                                <i class="btn btn-xs btn-primary fa fa-user"></i> Bob just signed up as an editor ...
                                                            </a>
                                                        </li>
    
                                                        <li>
                                                            <a href="#">
                                                                <div class="clearfix">
                                                                    <span class="pull-left">
                                                                        <i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>New Orders
                                                                        </span>
                                                                        <span class="pull-right badge badge-success">+8</span>
                                                                    </div>
                                                                </a>
                                                            </li>
    
                                                            <li>
                                                                <a href="#">
                                                                    <div class="clearfix">
                                                                        <span class="pull-left">
                                                                            <i class="btn btn-xs no-hover btn-info fa fa-twitter"></i> Followers
                                                                        </span>
                                                                        <span class="pull-right badge badge-info">+11</span>
                                                                    </div>
                                                                </a>
                                                            </li>-->
                                                        </ul>
                                                        
                                                    </li> 
                                                <!--<li class="dropdown-footer"><a href="#"> Todas Notificações <i class="ace-icon fa fa-arrow-right"></i> </a> </li>-->
                                            </ul>
                                            
                                        </li>
                                        <li class="green dropdown-modal">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                                <i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
                                                <span class="badge badge-success">0</span>
                                            </a>
                                            <!--<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                                                    <li class="dropdown-header">
                                                        <i class="ace-icon fa fa-envelope-o"></i> 5 Messages
                                                    </li>
    
                                                    <li class="dropdown-content">
                                                        <ul class="dropdown-menu dropdown-navbar">
                                                            <li>
                                                                <a href="#" class="clearfix">
                                                                    <img src="https://www.lea.co.ao/assets/images/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
                                                                    <span class="msg-body">
                                                                        <span class="msg-title">
                                                                            <span class="blue">Alex:</span> Ciao sociis natoque penatibus et auctor ...
                                                                        </span>
    
                                                                        <span class="msg-time">
                                                                            <i class="ace-icon fa fa-clock-o"></i>
                                                                            <span>a moment ago</span>
                                                                        </span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="clearfix">
                                                                    <img src="https://www.lea.co.ao/assets/images/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
                                                                    <span class="msg-body">
                                                                        <span class="msg-title">
                                                                            <span class="blue">Susan:</span> Vestibulum id ligula porta felis euismod ...
                                                                        </span>
        
                                                                        <span class="msg-time">
                                                                            <i class="ace-icon fa fa-clock-o"></i>
                                                                            <span>20 minutes ago</span>
                                                                        </span>
                                                                    </span>
                                                                </a>
                                                            </li>
    
                                                            <li>
                                                                <a href="#" class="clearfix">
                                                                    <img src="http://www.lea.co.ao/assets/images/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
                                                                    <span class="msg-body">
                                                                        <span class="msg-title">
                                                                            <span class="blue">Bob:</span> Nullam quis risus eget urna mollis ornare ...
                                                                        </span>
            
                                                                        <span class="msg-time">
                                                                            <i class="ace-icon fa fa-clock-o"></i>
                                                                            <span>3:15 pm</span>
                                                                        </span>
                                                                    </span>
                                                                </a>
                                                            </li>
    
                                                    <li>
                                                        <a href="#" class="clearfix">
                                                            <img src="http://www.lea.co.ao/assets/images/avatars/avatar2.png" class="msg-photo" alt="Kate's Avatar" />
                                                            <span class="msg-body">
                                                                <span class="msg-title">
                                                                    <span class="blue">Kate:</span> Ciao sociis natoque eget urna mollis ornare ...
                                                                </span>
    
                                                                <span class="msg-time">
                                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                                    <span>1:33 pm</span>
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </li>
    
                                                    <li>
                                                        <a href="#" class="clearfix">
                                                            <img src="http://www.lea.co.ao/assets/images/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar" />
                                                            <span class="msg-body">
                                                                <span class="msg-title">
                                                                    <span class="blue">Fred:</span> Vestibulum id penatibus et auctor  ...
                                                                </span>
    
                                                                <span class="msg-time">
                                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                                    <span>10:09 am</span>
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
    
                                            <li class="dropdown-footer">
                                                <a href="inbox.html"> See all messages <i class="ace-icon fa fa-arrow-right"></i> </a>
                                            </li>
                                        </ul>-->
                                        </li>
                                    
                                        <li class="light-blue dropdown-modal">
                                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                                <?php $lo_in->FotoPerfilTopMenuDireita($usuario_final); ?>
                                                <span class="user-info">
                                                    <small><?php $cla_idioma->idiomaSelecionadoLables(15, $idioma); ?>,</small> <?php $lo_in->nomeUsuarioStatuUsuario($usuario_final); ?>
                                                </span>
                                                <i class="ace-icon fa fa-caret-down"></i>
                                            </a>
                                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                                <li><a href="#"><i class="ace-icon fa fa-cog"></i><?php $cla_idioma->idiomaSelecionadoLables(27, $idioma) ?></a></li>
                                                <li><a href="javascript:void(0)"><i class="ace-icon fa fa-user"></i> <?php $cla_idioma->idiomaSelecionadoLables(28, $idioma) ?> </a> </li>
                                                <li class="divider"></li>
                                                <li><a href="https://lea.co.ao/nasocial/login/logout.php?lo=<?php print $utilizador; ?>"><i class="ace-icon fa fa-power-off"></i> <?php $cla_idioma->idiomaSelecionadoLables(26, $idioma) ?> </a> </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            <?php
                         }
                    }
                ?>
        </div>
    </div>

	<div class="main-container ace-save-state" id="main-container">
	    <script type="text/javascript"> try{ace.settings.loadState('main-container')}catch(e){} </script>
	    <?php
	        if($menu_ativo_2 !='carteira-digital' && $menu_ativo_2 !='artistas-que-sigo' && $menu_ativo_2 !='nasocial' && $menu_ativo !='catalogo.php' && $menu_ativo !='kitanda-dos-outros.php' && $menu_ativo_2 !='minhas-musicas' && $menu_ativo_2 !='minha-discografia' && $menu_ativo !='discografia.php' && $menu_ativo_2 !='meus-livros' && $menu_ativo !='per-ami.php' && $menu_ativo_2 !='meus-amigos' &&  $menu_ativo != 'livro-int.php' &&  $menu_ativo != 'agendar.php' &&  $menu_ativo != 'livros.php' &&  $menu_ativo != 'chat.php' &&  $menu_ativo != 'carrinho.php' &&  $menu_ativo != 'relatorio.php' && $menu_ativo != 'pagamentos.php' && $menu_ativo != 'carteir-digital.php' && $menu_ativo != 'recordacoes.php' && $menu_ativo != 'cursos-formacoes.php'  && $menu_ativo_2 !='meu-perfil' && $menu_ativo_2 !='publicidades'){
	            
	            ?>
	                <div id="sidebar" class="sidebar responsive ace-save-state">
	                    
	                    <script type="text/javascript"> try{ace.settings.loadState('sidebar')}catch(e){} </script>
	        
            	        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
            	            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            	                <a href="/nasocial/" class="btn btn-success" > <span class="glyphicon glyphicon-th" aria-hidden="true"></span> </a>
            				    <a href="/nasocial/perfil.php" class="btn btn-info"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> </a>
            				    <a href="/nasocial/usuario/chat.php" class="btn btn-warning" > <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> </a>
            					<a href="javascript:void(0)" id="profile" class="btn btn-danger"> <!--<i class="ace-icon fa fa-cogs"></i>--> <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> </a>
            				</div>
            				
            				<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            					<span class="btn btn-success"></span>
            					<span class="btn btn-info"></span>
            					<span class="btn btn-warning"></span>
            					<span class="btn btn-danger"></span>
            				</div>
            			</div>

			            <ul class="nav nav-list">
        				    <!--<li <?php if ($menu_ativo == 'nasocial.php') { echo 'class="active open"'; } ?>>
        				        <a href="/nasocial/nasocial.php">
        				            <i class="menu-icon fa fa-tachometer"></i>
        				            <span class="menu-text"> <?php $cla_idioma->idiomaSelecionadoLables(13,$idioma); ?> </span>
        				        </a>
        				        <b class="arrow"></b>
        				    </li>-->
				    <li <?php if ($menu_ativo == 'publicacao.php' or $menu_ativo == 'perfil.php' or $menu_ativo == 'timeline.php' or $menu_ativo == 'chat.php' or $menu_ativo == 'per-ami.php' or $menu_ativo == 'usuarios-novos.php' ) { echo 'class="active open"'; } ?>>
					    <a href="#" class="dropdown-toggle">
                            <i class="menu-icon glyphicon glyphicon-user"></i>
                            <span class="menu-text"> <?php $cla_idioma->idiomaSelecionadoLables(14, $idioma); ?> </span>
                            <b class="arrow fa fa-angle-down"></b>
					    </a>
					    <b class="arrow"></b>
					    <ul class="submenu">
                            <li <?php if ($menu_ativo == 'perfil.php' or $menu_ativo == 'usuarios-novos.php') { echo 'class="active"'; } ?>>
                        	    <a href="https://www.lea.co.ao/nasocial/perfil.php?ses=<?php print $usuario ?>">
                        		    <i class="menu-icon fa fa-caret-right"></i> Perfil
                        	    </a>
                        	    <b class="arrow"></b>
                            </li>
                            <li <?php if ($menu_ativo == 'timeline.php' or $menu_ativo == 'publicacao.php') { echo 'class="active"'; } ?>>
                        	    <a href="https://www.lea.co.ao/nasocial/usuario/timeline.php?ses=<?php print $usuario ?>">
                        		    <i class="menu-icon fa fa-caret-right"></i> Mural
                        		</a>
                        	    <b class="arrow"></b>
                            </li>
                            <li <?php if ($menu_ativo == 'chat.php') { echo 'class="active"'; } ?>>
                                <a href="https://www.lea.co.ao/nasocial/usuario/chat.php">
                        	        <i class="menu-icon fa fa-caret-right"></i> Mensagens
                        	    </a>
                        	    <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>
                    <li <?php if ($menu_ativo == 'rel_contal.php' or $menu_ativo == 'camisolas.php' or $menu_ativo == 'camisola.php' or $menu_ativo == 'novo-produto.php' or $menu_ativo == 'agendar.php' or $menu_ativo == 'camisolas.php' or $menu_ativo == 'produto.php' or $menu_ativo == 'inventario.php' or $menu_ativo == 'livro.php' or $menu_ativo == 'relatorio.php' or $menu_ativo == 'catalogo.php' or $menu_ativo == 'ca-catalogo-cd.php' or $menu_ativo == 'movimentos.php' or $menu_ativo == 'ca-catalogo-ingrs.php' or $menu_ativo == 'ca-catalogo-lvr.php' or $menu_ativo == 'ca-catalogo-lmbc.php' or $menu_ativo == 'camisola.php' or $menu_ativo == 'novo-produto-musica.php'  ) { echo 'class="active open"'; } ?>>
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon glyphicon glyphicon-shopping-cart"></i>
                            <span class="menu-text"> Loja </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li <?php if ($menu_ativo == 'livro.php' or $menu_ativo == 'agendar.php' or $menu_ativo == 'camisola.php' or $menu_ativo == 'novo-produto-musica.php') { echo 'class="active"'; } ?>>
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i> Produtos
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>
                                <ul class="submenu">
                                    <li <?php if ($menu_ativo == 'novo-produto.php' or $menu_ativo == 'produto.php' or $menu_ativo == 'novo-produto-musica.php') { echo 'class="active"'; } ?>>
                            	        <a href="/nasocial/loja/novo-produto-musica.php?disco=0&d=1"> <i class="menu-icon fa fa-caret-right"></i> Novo Disco </a> <b class="arrow"></b>
                                    </li> 
                                    <li <?php if ($menu_ativo == 'livro.php') { echo 'class="active"'; } ?>>
                            		    <a href="#"> <i class="menu-icon fa fa-caret-right"></i> Livros </a> <b class="arrow"></b>
                                    </li>
                                    <li <?php if ($menu_ativo == 'camisola.php') { echo 'class="active"'; } ?>>
                            		    <a href="#"> <i class="menu-icon fa fa-caret-right"></i> Recordações </a> <b class="arrow"></b>
                                    </li>
                                    <li <?php if ($menu_ativo == 'agendar.php') { echo 'class="active"'; } ?>>
                            		    <a href="/nasocial/loja/agendar.php?acao=3"> <i class="menu-icon fa fa-caret-right"></i> Ingressos </a> <b class="arrow"></b>
                                    </li>
                                </ul>
                            </li>
                            <li <?php if ($menu_ativo == 'catalogo.php' or $menu_ativo == 'ca-catalogo-cd.php' or $menu_ativo == 'ca-catalogo-ingrs.php' or $menu_ativo == 'ca-catalogo-lvr.php' or $menu_ativo == 'ca-catalogo-lmbc.php') { echo 'class="active"'; } ?>>
                                <a href="#">
                                    <i class="menu-icon fa fa-caret-right"></i> Catalogo
                                </a>
                                <b class="arrow"></b>
                            </li>
                            <li <?php if ($menu_ativo == 'inventario.php' or $menu_ativo == 'produto.php') { echo 'class="active"'; } ?>>
                        	    <a href="#">
                                    <i class="menu-icon fa fa-caret-right"></i> Inventario
                        		</a>
                        		<b class="arrow"></b>
                            </li>
                            <li <?php if ($menu_ativo == 'movimentos.php') { echo 'class="active"'; } ?>>
                                <a href="#"> <i class="menu-icon fa fa-caret-right"></i> Movimentos </a>
                                <b class="arrow"></b>
                            </li>
                            <li <?php if ($menu_ativo == 'rel_contal.php' or $menu_ativo == 'relatorio.php') { echo 'class="active"'; } ?>>
                        	    <a href="#"> <i class="menu-icon fa fa-caret-right"></i> Contas </a>
                        	    <b class="arrow"></b>
                            </li>
						</ul>
                    </li>
                    <li <?php if ($menu_ativo_2 == 'meu-perfil' || $menu_ativo == 'artistas.php' || $menu_ativo == 'minha-musica.php' || $menu_ativo == 'biblioteca.php' || $menu_ativo_2 == 'musicas-em-destaque') { echo 'class="active open"'; } ?>>
                        <a href="#" class="dropdown-toggle">
                                <i class="menu-icon glyphicon glyphicon-certificate"></i>
                                <span class="menu-text"> Lea  </span>
                                <b class="arrow fa fa-angle-down"></b>
				        </a>
					    <b class="arrow"></b>
					    <ul class="submenu">
					        <li <?php if ($menu_ativo == 'artistas.php') { echo 'class="active"'; } ?>>
					            <a href="http://lea.co.ao/index.php">
					                <i class="menu-icon fa fa-caret-right"></i> Lea.co.ao
					            </a>
					            <b class="arrow"></b>
					        </li>
					        <?php
					            if($MeuPerfilDAO->ValidacaoDeExistenciaMeuPerfil($usuario_final) == true)
					            {
					                ?>
					                    <li <?php if ($menu_ativo_2 == 'meu-perfil') { echo 'class="active"'; } ?>>
            					            <a href="/nasocial/meu-perfil/"> <i class="menu-icon fa fa-caret-right"></i> Meu Perfil </a>
            					            <b class="arrow"></b>
            					        </li>
					                <?php
					            }
					        ?>
					        
					        <li <?php if ($menu_ativo == 'minha-musica.php' || $menu_ativo == 'biblioteca.php') { echo 'class="active"'; } ?>>
					            <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i> Minha Biblioteca
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
					            <b class="arrow"></b>
					            <ul class="submenu">
                                    <li <?php if ($menu_ativo == 'minha-musica.php' ) { echo 'class="active"'; } ?>>
                            	        <a href="/nasocial/view/mmusica/minha-musica.php?start=0&ritm=0"> <i class="menu-icon fa fa-caret-right"></i> MP3 </a> <b class="arrow"></b>
                                    </li> 
                                    <li <?php if ($menu_ativo == 'minha-musica-.php' ) { echo 'class="active"'; } ?>>
                            	        <a href="#"> <i class="menu-icon fa fa-caret-right"></i> Álbuns </a> <b class="arrow"></b>
                                    </li>
                                    <li <?php if ($menu_ativo == 'biblioteca.php') { echo 'class="active"'; } ?>>
                            	        <a href="/nasocial/usuario/biblioteca.php?bib=1"> <i class="menu-icon fa fa-caret-right"></i> Artistas </a> <b class="arrow"></b>
                                    </li>
                                </ul>
					        </li>
					        <?php 
					            if($PromocoesRegistroDAO->ValidacaoDeExistenciaMusicaEmDestaque($usuario_final) == true)
					            {
					                ?>
					                    <li <?php if ($menu_ativo == ' ' || $menu_ativo == ' ' || $menu_ativo_2 == 'musicas-em-destaque') { echo 'class="active"'; } ?>>
            					            <a href="#" class="dropdown-toggle">
                                                <i class="menu-icon fa fa-caret-right"></i> Minhas Promoções
                                                <b class="arrow fa fa-angle-down"></b>
                                            </a>
            					            <b class="arrow"></b>
            					            <ul class="submenu">
                                                <li <?php if ($menu_ativo_2 == 'musicas-em-destaque' ) { echo 'class="active"'; } ?>>
                                        	        <a href="/nasocial/minhas-promocoes/musicas-em-destaque/"> <i class="menu-icon fa fa-caret-right"></i> Música Em Destaque </a> <b class="arrow"></b>
                                                </li> 
                                                <li <?php if ($menu_ativo == ' ' ) { echo 'class="active"'; } ?>>
                                        	        <a href="#"> <i class="menu-icon fa fa-caret-right"></i> Publicidades </a> <b class="arrow"></b>
                                                </li>
                                            </ul>
            					        </li>
					                <?php
					            }
					        ?>
				        </ul>
                    </li>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>
	            <?php
	        }
	   ?>
	    

			<div class="main-content">
				<div class="main-content-inner">
					<!--<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Início</a>
							</li>

							<li>
								<a href="#">More Pages</a>
							</li>
							<li class="active">Invoice</li>
						</ul>

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div>
					</div>-->
            <div class="page-content">
                <?php
                    if($menu_ativo == 'perfil_.php')
                    { 
                        ?>
                            <div class="ace-settings-container" id="ace-settings-container">
        						<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                                    <i class="ace-icon fa fa-cog bigger-130"></i>
        						</div>
        						
        						<div class="ace-settings-box clearfix" id="ace-settings-box">
                                    <div class="pull-left width-50">
                                        <div class="ace-settings-item">
                                            <div class="pull-left">
    								            <select id="skin-colorpicker" class="hide">
                                                    <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                                                    <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                                    <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                                    <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                                                </select>
                                            </div>
                                            <span>&nbsp; Fundos</span>
    							        </div>

                                        <div class="ace-settings-item">
                                            <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
                                            <label class="lbl" for="ace-settings-navbar"> Nav Fixa</label>
                                        </div>

    							        <div class="ace-settings-item">
                                            <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
                                            <label class="lbl" for="ace-settings-sidebar"> Fixo do Lado</label>
    							        </div>

            							<div class="ace-settings-item">
                                            <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
                                            <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
            							</div>

            							<div class="ace-settings-item">
                                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
                                            <label class="lbl" for="ace-settings-rtl"> Direita / Esquerda (rtl)</label>
            							</div>

            							<div class="ace-settings-item">
                                            <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
                                            <label class="lbl" for="ace-settings-add-container">
                                                Dentro <b>.Painel</b>
                                            </label>
            							</div>
                                    </div><!-- /.pull-left -->

                                    <div class="pull-left width-50">
            							<div class="ace-settings-item">
                                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
                                            <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
            							</div>
            
            							<div class="ace-settings-item">
                                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
                                            <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
            							</div>
            
                                        <div class="ace-settings-item">
                                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
                                            <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
            							</div>
                                    </div><!-- /.pull-left -->
					            </div><!-- /.ace-settings-box -->
                            </div>
                        <?php
                    }
                ?>
