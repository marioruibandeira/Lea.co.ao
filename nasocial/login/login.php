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
    	<title>Login | Nasocial</title>
    	<meta name="description" content="User login page" />
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    	<link rel="stylesheet" href="https://www.lea.co.ao/nasocial/assets/css/jquery-ui.custom.min.css" />
    	<!-- bootstrap & fontawesome -->
    	<link rel="stylesheet" href="https://lea.co.ao/nasocial/assets/css/bootstrap.min.css" />
    	<link rel="stylesheet" href="https://lea.co.ao/nasocial/assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    	<!-- text fonts -->
    	<link rel="stylesheet" href="https://lea.co.ao/nasocial/assets/css/fonts.googleapis.com.css" />
    	<!-- ace styles -->
    	<link rel="stylesheet" href="https://lea.co.ao/nasocial/assets/css/ace.min.css" />
    	<!--[if lte IE 9]>
    	<link rel="stylesheet" href="https://lea.co.ao/nasocial/assets/css/ace-part2.min.css" />
    	<![endif]-->
    	<link rel="stylesheet" href="https://lea.co.ao/nasocial/assets/css/ace-rtl.min.css" />
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
                                    <i class="ace-icon fa fa-users" style="color:#fff;"></i>
                                    <span class="red">Na</span><span class="white" id="id-text2">social</span>
				                </h1>
                            </div>

                            <div class="space-6"></div>

                            <div class="position-relative">
                                <div id="login-box" class="login-box visible widget-box no-border">
                                    <div class="widget-body">
					                    <div class="widget-main">
                                            <h4 class="header blue lighter bigger">
						                        <i class="ace-icon fa fa-key "></i> Insira seus credenciais
                                            </h4>
                                            <div class="space-6" ></div>
                                                <h4 id="erro_log" style="margin-top:0px; padding-top:0px; font-size:12px; color:#900; display:none;">Utilizador ou senha está errado ou ainda não fez um registo.</h4>
                                                <form method="post">
                                                    <fieldset>
							                            <label class="block clearfix">
                                                            <span class="block input-icon input-icon-right">
                                                                <input  autocomplete="off" type="text" class="form-control" placeholder="Nome usuário" id="username" name="username" value="" required="required"/>
                                                                <i class="ace-icon fa fa-user"></i>
                                                            </span>
							                            </label>
							                            <label class="block clearfix">
                                                            <span class="block input-icon input-icon-right">
                                                                <input  autocomplete="off" type="password" class="form-control" placeholder="Senha" id="password" name="password" value="" required="required"/>
								                                <i class="ace-icon fa fa-lock"></i>
                                                            </span>
							                            </label>
							                            <div class="space"></div>
                                                        <div class="clearfix">
                                                            <label class="inline">
								                                <input type="checkbox" id="m_lembra" nome="m_lembra" class="ace" /><span class="lbl"> Lembre-me</span>
                                                            </label>
                                                            <button type="submit" id="subiy" class="width-35 pull-right btn btn-sm btn-primary">
								                                <i class="ace-icon fa fa-key"></i> <span class="bigger-110">Login</span>
                                                            </button>
							                            </div>
							                            <div class="space-4"></div>
                                                    </fieldset>
                                                    <!--<input type="hidden" name="dsc" value="<?php //print $dsc; ?>">-->
                                                </form>			
                                            </div>
                                            <div class="toolbar clearfix">
                                                <div><a href="#" data-target="#forgot-box" class="forgot-password-link"> <i class="ace-icon fa fa-arrow-left"></i> Esqueci minha senha </a></div>
                                                <div><a href="https://www.lea.co.ao/nasocial/login/register.php" class="user-signup-link"> Registrar-se <i class="ace-icon fa fa-arrow-right"></i></a></div>
                                            </div>
                                        </div><!-- /.widget-body -->
                                        <div style="text-align:center;"><a href="https://lea.co.ao/">www.lea.co.ao</a></div>
                                    </div><!-- /.login-box -->
                                </div><!-- /.position-relative -->
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.main-content -->
            </div><!-- /.main-container -->
         
    <script>
       $("#subiy").click(function(e){
    
            e.preventDefault();
            var username = document.getElementById("username");
            var password = document.getElementById("password");
            var m_lembra = document.getElementById("m_lembra");
            var erro_log = document.getElementById("erro_log");
            
            var origem = parseInt("<?php echo $ori; ?>", 10) || 100;
            let music_download = "<?php echo $referencia; ?>";
    
            $.post('/nasocial/login/proc_log.php', 
            {
                username:username.value,
                password:password.value,
                m_lembra:m_lembra.value,
                iuiui:43
            }, 
            function(response)
            {
                var response = response.replace(/[\n\r\t]/g, ''); 
                console.log(response);
                if( response == "1" )
                {
                    switch (origem) {
                        case 0:
                            return document.location.href = music_download;
                            break;
                        default:
                            return document.location.href = "/nasocial/";
                    }
                }
                else
                {
                    erro_log.style.display = "block";
                }
            });
        });
    </script>
    </body>
   
</html>


