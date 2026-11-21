<?php 
session_start(); 

$ori = (isset($_GET['ori'])) ? trim($_GET['ori']) : '';

$referencia = $_SESSION['referencia'] ?? null;

include($_SERVER['DOCUMENT_ROOT'].'/nasocial/login/util.php'); 
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Registo - Nasocial</title>

	<meta name="description" content="User login page" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="/nasocial/assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/nasocial/assets/font-awesome/4.5.0/css/font-awesome.min.css" />

	<!-- text fonts -->
	<link rel="stylesheet" href="/nasocial/assets/css/fonts.googleapis.com.css" />

	<!-- ace styles -->
	<link rel="stylesheet" href="/nasocial/assets/css/ace.min.css" />

	<!--[if lte IE 9]>
	<link rel="stylesheet" href="/nasocial/assets/css/ace-part2.min.css" />
	<![endif]-->
	<link rel="stylesheet" href="/nasocial/assets/css/ace-rtl.min.css" />

	<!--[if lte IE 9]>
            <link rel="stylesheet" href="/nasocial/assets/css/ace-ie.min.css" />
	<![endif]-->

	<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

	<!--[if lte IE 8]>
	<script src="/nasocial/nasocial/assets/js/html5shiv.min.js"></script>
	<script src="/nasocial/nasocial/assets/js/respond.min.js"></script>
	<![endif]-->
	
	<style>
        #aceita_regra:checked {
            background-color: green;  
            border-color: green;      
        }
    
        #aceita_regra:checked + .lbl {
            color: green;  
        }
    
        #aceita_regra:checked + .lbl a {
            color: green;  
        }
    
        .ace {
            width: 20px;
            height: 20px;
            accent-color: green;  
        }
    </style>
    <script src="https://www.lea.co.ao/nasocial/assets/js/jquery-1.11.3.min.js"></script>
    </head>

    <body class="login-layout">
	    <div class="main-container">
            <div class="main-content">
		        <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
			            <div class="login-container">
                            <div class="center">
				                <h1>
                                    <!--<i class="ace-icon fa fa-leaf green"></i>-->
                                    <span class="red">Na</span>
                                    <span class="white" id="id-text2">Social</span>
				                </h1>
				                <!--<h4 class="blue" id="id-company-text">&copy; Lés Entretenimento Angola</h4>-->
                            </div>

                            <div class="space-6"></div>
                                <div class="position-relative">
				                    <div class="signup-box no-border">
                                        <div class="widget-body">
					                        <div class="widget-main">
                                                <h4 class="header green lighter bigger">
						                            <i class="ace-icon fa fa-users blue"></i>Registo de Novos Usuarios
						                            <?php //print "---->" . $referencia; ?>
                                                </h4>

                                                <div class="space-6"></div>
                                                <p> Escreva seus detalhes para começar: </p>
                                                <form > 
                                                    <input id="origem" type="hidden" value="<?php print $ori; ?>"/>
                                                    <input id="referencia" type="hidden" value="<?php print $referencia; ?>"/>
                                                    <fieldset>
                                                        <label class="block clearfix"> 
                                                            <p id="erro_usuario" style="display:none;color:#770402;">Este nome de utilizador já existe!</p>
                                                            <span class="block input-icon input-icon-right">
                                                                <input id="n_usuario" name="n_usuario" type="text" autocomplete="off" class="form-control" 
                                                                       placeholder="Nome Usuario" oninput="validateUsername()" required="required"/>
                                                                <i class="ace-icon fa fa-user"></i>
                                                            </span>
                                                        </label>
                                                        <label class="block clearfix">
                                                            <p id="erro_email" style="display:none;color:#770402;">Este email não é valido!</p>
                                                            <span class="block input-icon input-icon-right">
                                                                <input id="email" name="email" type="text" autocomplete="off" class="form-control" 
                                                                       placeholder="E-mail" oninput="validateEmail()" required="required"/>
                                                                <i class="ace-icon fa fa-envelope"></i>
                                                            </span>
                                                        </label>
                                                        <label class="block clearfix">
                                                            <p id="erro_senha" style="display:none;color:#770402;">As senhas não são iguais!</p>
                                                            <span class="block input-icon input-icon-right">
                                                                <input id="p_pass" name="p_pass" type="password" autocomplete="new-password" class="form-control" 
                                                                       placeholder="Palavra Pass" oninput="validatePasswords()" required="required"/>
                                                                <i class="ace-icon fa fa-lock"></i>
                                                            </span>
                                                        </label>
                                                        <label class="block clearfix">
                                                            <span class="block input-icon input-icon-right">
                                                                <input id="p_pass_2" name="p_pass_2" type="password" autocomplete="new-password" class="form-control" 
                                                                       placeholder="Repete Palavra Pass" oninput="validatePasswords()" required="required"/>
                                                                <i class="ace-icon fa fa-retweet"></i>
                                                            </span>
                                                        </label>
                                                        <label class="block">
                                                            <input id="aceita_regra" name="aceita_regra" type="checkbox" class="ace" value="1" required="required" />
                                                            <span class="lbl"> Eu aceito as <a href="https://www.lea.co.ao/sobre-nos/termos-servicos.php"> Regras de Usabilidade</a></span>
                                                        </label>
                                                        <label class="block">
                                                            <span class="lbl"><a href="https://lea.co.ao/nasocial/login/login.php?pes=MA=="> Voltar ao Login</a></span>
                                                        </label>
                                                        <label class="block">
                                                            <span class="lbl"><a href="https://lea.co.ao/"> Navegar Para Lea.co.ao</a></span>
                                                        </label>
                                                        <!--<div class="space-24"></div>-->
                                                        <div class="clearfix">
							                                <button type="reset" class="width-30 pull-left btn btn-sm">
                                                                <i class="ace-icon fa fa-refresh"></i><span class="bigger-110">Re-iniciar</span>
							                                </button>
                                                            <button style="display:none" id="registro" type="submit" name="tbn_reg" class="width-65 pull-right btn btn-sm btn-success">
                                                                <span class="bigger-110">Registar</span><i class="ace-icon fa fa-arrow-right icon-on-right"></i>
							                                </button>
                                                        </div>
						                            </fieldset>
                                                </form>
					                        </div>
                                        </div><!-- /.widget-body -->
				                    </div><!-- /.signup-box -->
                                </div><!-- /.position-relative -->
                            </div>
                        </div><!-- /.col -->
		            </div><!-- /.row -->
                </div><!-- /.main-content -->
	        </div><!-- /.main-container -->
        </body>
    </html>
    <script src="processingForm.js"></script>


