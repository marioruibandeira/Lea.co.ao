<?php 
session_start();

if (isset($_COOKIE['user_logged'])) 
{
    setcookie("user_logged", "", time() - 3600, "/");
    setcookie("user_logged", "", time() - 3600, "/", "lea.co.ao");
    setcookie("user_logged", "", time() - 3600, "/", ".lea.co.ao");
    setcookie("user_logged", "", time() - 3600, "/", "www.lea.co.ao");
    
    unset($_COOKIE['user_logged']);
}

$_SESSION = array();

if (ini_get("session.use_cookies")) 
{
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();

include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.SiteUserInfo.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/login/Login.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UtilidadeDAO.php');

$usuario = new SiteUserInfo();
$u_l = new Login();

if (isset($_GET['lo'])) {
    $usuario->setUser_id($_GET['lo']);
    $u_l->actualizarLog($usuario); 
}

?>
<!DOCTYPE html>
<html lang="pt">
    <head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Logout | Nasocial</title>
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
        <link rel="stylesheet" href="assets/css/ace-part2.min.css" />
	<![endif]-->
	<link rel="stylesheet" href="/nasocial/assets/css/ace-rtl.min.css" />
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
				            <div id="login-box" class="login-box visible widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header blue lighter bigger"> <i class="ace-icon fa fa-coffee green"></i> Logout </h4>
                                        <div class="space-6"></div>
                                            <form action="/nasocial/login/proc_log.php" method="post">
                                                <fieldset>
							                        <label class="block clearfix"> Você fez logout com sucesso, obrigado pela preferencia e volte sempre. </label>
                                                    <div class="space"></div>
                                                        <div class="space-4"></div>
                                                    </fieldset>
                                                    <input type="hidden" name="dsc" value="<?php print $dsc; ?>">
                                                </form>
                                            </div><!-- /.widget-main -->
                                            <div class="toolbar clearfix">
                                                <div>
                                                    <a href="https://lea.co.ao/" data-target="#forgot-box" class="forgot-password-link">
                                                        <i class="ace-icon fa fa-arrow-left"></i> www.lea.co.ao
                                                    </a>
                                                </div>
                                                <div>        
                                                    <a href="https://lea.co.ao/nasocial/login/login.php" class="user-signup-link"> Voltar para Nasocial
                                                        <i class="ace-icon fa fa-arrow-right"></i>
                                                    </a>
                                                </div>
					                        </div>
                                        </div><!-- /.widget-body -->
				                    </div><!-- /.login-box -->
                                </div><!-- /.position-relative -->
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.main-content -->
            </div><!-- /.main-container -->
        </script>
    </body>
</html>


