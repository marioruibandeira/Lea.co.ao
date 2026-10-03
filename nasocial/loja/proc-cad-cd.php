<?php
    session_start();
    
    $usuario = $_SESSION['logged'];
    $usuario_final = $usuario;
    
    if ((!isset($_GET['pes']) || trim($_GET['pes']) == '')) {
        die('Erro : Precisa do Id do Disco');
    }
    $cd = $_GET['pes'];
    $d = base64_decode($cd);
    $reencaminhamento = 'http://www.lea.co.ao/nasocial/lojaonline/novo-produto.php?dsc='.$cd.'&u_e='.$usuario_final.'';
    //echo("<script>console.log('PHP: Disco Existe!".$d."');</script>");
    if($usuario_final!=null){
        if($d > 0){
                    ?>
                     
                <title>Logado Com Sucesso!</title>
                <!-- bootstrap & fontawesome -->
                <link rel="stylesheet" href="http://www.lea.co.ao/nasocial/assets/css/bootstrap.min.css" />
                <!-- text fonts -->
                <link rel="stylesheet" href="http://www.lea.co.ao/nasocial/assets/css/fonts.googleapis.com.css" />
                <!-- ace styles -->
                <link rel="stylesheet" href="http://www.lea.co.ao/nasocial/assets/css/ace.min.css" />
            
                <div class="main-container">
                    <div class="main-content">
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="login-container">
                                    <div class="center">
                                        <h1>
                                            <i class="ace-icon fa fa-leaf green"></i>
                                            <span class="red">Na</span>
                                            <span class="white" id="id-text2">Social</span>
                                        </h1>
                                        <h4 class="blue" id="id-company-text">&copy; Lés Entretenimento Angola</h4>
                                    </div>
                                    <div class="space-6"></div>
                                        <div class="position-relative" style="border: #ccc 1px solid;">
                                            <div class="signup-box no-border">
                                                <div class="widget-body">
                                                    <div class="widget-main">
                                                        <h4 class="header green lighter bigger"> <span class="red">Logado com sucesso</span> </h4>

                                                        <div class="space-6"></div>

                                                        <form action="proc_reg.php" method="post">
                                                            <fieldset>
                                                                <label class="block clearfix">
                                                                    <span class="block input-icon input-icon-right">
                                                                        <div style="border: #ccc 1px solid; padding: 10px;">
                                                                            <?php
                                                                                $u_n = $_SESSION['username'] = base64_encode($username);
                                                                                $_SESSION['logged'] = $u_n;
                                                                            
                                                                                if($d!=1){
                                                                                   header ('Refresh: 5; URL="'.$caminho_agenda.'"');
                                                                                } else {
                                                                                    header ('Refresh: 5; URL="'.$reencaminhamento.'"');
                                                                               }
                                                                                
                                                                                echo '<p> Serás redirecionado em pouco tempo.</p>';
                                                                                echo '<input type="hidden" name="u_e" value="'.$usuario_final.'">';
                                                                                echo '<p> Se o seu  browser não o fizer por favor <a href="'.$reencaminhamento.'" > clique aqui</a>.</p>';
                                                                                
                                                                            ?>
                                                                        </div>
                                                                    </span>
                                                                </label>                                                  
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
                
        <?php
            echo("<script>console.log('PHP: Disco Existe!".$d."');</script>");
        }else{
            ?>
                     
                <title>Logado Com Sucesso!</title>
                <!-- bootstrap & fontawesome -->
                <link rel="stylesheet" href="http://www.lea.co.ao/nasocial/assets/css/bootstrap.min.css" />
                <!-- text fonts -->
                <link rel="stylesheet" href="http://www.lea.co.ao/nasocial/assets/css/fonts.googleapis.com.css" />
                <!-- ace styles -->
                <link rel="stylesheet" href="http://www.lea.co.ao/nasocial/assets/css/ace.min.css" />
            
                <div class="main-container">
                    <div class="main-content">
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="login-container">
                                    <div class="center">
                                        <h1>
                                            <i class="ace-icon fa fa-leaf green"></i>
                                            <span class="red">Na</span>
                                            <span class="white" id="id-text2">Social</span>
                                        </h1>
                                        <h4 class="blue" id="id-company-text">&copy; Lés Entretenimento Angola</h4>
                                    </div>
                                    <div class="space-6"></div>
                                        <div class="position-relative" style="border: #ccc 1px solid;">
                                            <div class="signup-box no-border">
                                                <div class="widget-body">
                                                    <div class="widget-main">
                                                        <h4 class="header green lighter bigger"> <span class="red">Logado com sucesso</span> </h4>

                                                        <div class="space-6"></div>

                                                        <form action="proc_reg.php" method="post">
                                                            <fieldset>
                                                                <label class="block clearfix">
                                                                    <span class="block input-icon input-icon-right">
                                                                        <div style="border: #ccc 1px solid; padding: 10px;">
                                                                            <?php
                                                                                $u_n = $_SESSION['username'] = base64_encode($username);
                                                                                $_SESSION['logged'] = $u_n;

                                                                                if($d!=1){
                                                                                    header ('Refresh: 5; URL="'.$caminho_agenda.'"');
                                                                                } else {
                                                                                    header ('Refresh: 5; URL="'.$reencaminhamento.'"');
                                                                                }
                                                                                //
                                                                                echo '<p> Será redirecionado em pouco tempo.</p>';
                                                                                echo '<input type="hidden" name="u_e" value="'.$usuario_final.'">';
                                                                                echo '<p> Se o seu  browser não o fizer por favor <a href="'.$reencaminhamento.'" > clica aqui</a>.</p>';

                                                                            ?>
                                                                        </div>
                                                                    </span>
                                                                </label>                                                  
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
                
        <?php
        }
    }else{
        ?>
        <!DOCTYPE html>
        <html lang="en">
	<head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Log in falhou!</title>
        <!-- bootstrap & fontawesome -->
                <link rel="stylesheet" href="http://www.lea.co.ao/nasocial/assets/css/bootstrap.min.css" />
                <link rel="stylesheet" href="http://www.lea.co.ao/nasocial/assets/font-awesome/4.5.0/css/font-awesome.min.css" />
                <!-- text fonts -->
                <link rel="stylesheet" href="http://www.lea.co.ao/nasocial/assets/css/fonts.googleapis.com.css" />
                <!-- ace styles -->
                <link rel="stylesheet" href="http://www.lea.co.ao/nasocial/assets/css/ace.min.css" />
                <link rel="stylesheet" href="http://www.lea.co.ao/nasocial/assets/css/ace-rtl.min.css" />
        
                <div class="main-container">
                    <div class="main-content">
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="login-container">
                                    <div class="center">
                                        <h1>
                                            <span class="red">Lés</span>
                                            <span class="white" id="id-text2"><span style="color: #000;">Social</span></span>
                                        </h1>
                                        <h4 class="blue" id="id-company-text">&copy; Lés Entretenimento Angola</h4>
                                    </div>
                                    <div class="space-6"></div>
                                        <div class="position-relative" style="border: #ccc 1px solid;">
                                            <div class="signup-box no-border">
                                                <div class="widget-body">
                                                    <div class="widget-main">
                                                        <h4 class="header green lighter bigger"> <span class="red">Log in falhou!</span> </h4>

                                                        <div class="space-6"></div>

                                                        <form action="proc_reg.php" method="post">
                                                            <fieldset>
                                                                <label class="block clearfix">
                                                                    <span class="block input-icon input-icon-right">
                                                                        <div style="border: #ccc 1px solid; padding: 10px;">
                                                                            <?php
                                                                                header ('Refresh: 1; URL="http://www.lea.co.ao/nasocial/login/login.php?pes='.base64_encode('0').'"');
                                                                                echo '<p>Você não esta logado, seras redirecionado para fazeres um logo in.</p>';
                                                                               
                                                                                echo '<p> Se o seu  browser não o fizer isso por favor <a href="http://www.lea.co.ao/nasocial/login/login.php?pes='.base64_encode('0').'" > clique aqui</a>.</p>';
                                                                                
                                                                            ?>
                                                                        </div>
                                                                    </span>
                                                                </label>                                                  
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
                </head>
            </html>
            <?php
    }
?>