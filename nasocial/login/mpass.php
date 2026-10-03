<!DOCTYPE html> 
<html lang="pt">
    <head>
        <title>Erro de Login</title>        
        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="https://lea.co.ao/nasocial/assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://lea.co.ao/nasocial/assets/font-awesome/4.5.0/css/font-awesome.min.css" />
        <!-- text fonts -->
        <link rel="stylesheet" href="https://lea.co.ao/nasocial/assets/css/fonts.googleapis.com.css" />
        <!-- ace styles -->
        <link rel="stylesheet" href="https://lea.co.ao/nasocial/assets/css/ace.min.css" />
        <link rel="stylesheet" href="https://lea.co.ao/nasocial/assets/css/ace-rtl.min.css" />
    </head>
    <body class="login-layout">
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
                                <h4 class="blue" id="id-company-text">&copy; Les Entretenimento Angola</h4>
                            </div>

                            <div class="space-6"></div>
                            <div class="position-relative">
                                                    <div class="signup-box no-border">
                                                        <div class="widget-body">
                                                            <div class="widget-main">
                                                                <h4 class="header green lighter bigger"> <span class="red">Erro de Cadastro!</span> </h4>

                                                                <div class="space-6"></div>

                                                                <form action="proc_reg.php" method="post">
                                                                    <fieldset>
                                                                        <label class="block clearfix">
                                                                            <span class="block input-icon input-icon-right">
                                                                                <input name="u_email" type="email" class="form-control" placeholder="Email" required="required" value="<?php print "A palavra pass não é igual, deve ser igual!"; header('Refresh: 5; URL=register.php'); ?>"/>
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
    </body>
</html>