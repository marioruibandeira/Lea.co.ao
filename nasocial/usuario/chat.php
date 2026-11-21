<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/header.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/usuario/class.AmigoDAO.php');
    $amigao = new AmigoDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/chat/class.MensagemDAO.php');
    $mensagemDAO = new MensagemDAO();
    
    $amg    = isset($_GET['amg']) ? htmlspecialchars(trim($_GET['amg']), ENT_QUOTES, 'UTF-8') : '';
    $ce_u   = isset($_GET['us'])  ? htmlspecialchars(trim($_GET['us']),  ENT_QUOTES, 'UTF-8') : '';
    $onchat = isset($_GET['onchat']) ? htmlspecialchars(trim($_GET['onchat']), ENT_QUOTES, 'UTF-8') : '';

    if($onchat != '0')
    {
        if (empty($amg) || empty($ce_u) || $amg > 0 || $ce_u > 0) {
            print '<script type="text/javascript"> window.location = "https://www.lea.co.ao/nasocial/"</script>';
        }
    }
?>

<style>
    .main-li{background-color:#fff;border:#fff 1px solid;border-radius:50px;}
    .icons-tag{font-weight:bolder;font-size:16px;color:#222843;padding-right: 10px;}
    .main-li:hover {background-color: #ccc; border:#fff 1px solid;border-radius:50px;cursor: pointer;}
    .txt-meuno{color:#222843;font-weight:bolder;font-size:16px;padding-top:20px;}
</style>
<div class="row">
    <div class="col-xs-12" style="padding:0px 0px 0px 0px;">
        <!-- PAGE CONTENT BEGINS -->
        <?php 
            if(is_mobile()) 
            {
                if($onchat == 1)
                {
                    ?>
                        <div class="col-sm-12">  
                            <?php include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/usuario/chat-panel.php'); ?> 
                        </div>
                        
                        <div class="col-sm-12">
                            <div class="widget-box transparent" id="recent-box">
                                <div class="widget-header">
                                    <h4 class="widget-title lighter smaller"> <i class="ace-icon fa fa-rss orange"></i>Ultimas mensagens </h4>
                                    <div class="widget-toolbar no-border">
                                        <ul class="nav nav-tabs" id="recent-tab">
                                            <li class="active"> <a data-toggle="tab" href="#task-tab">Mensagens</a></li>
                                            <li> <a data-toggle="tab" href="#member-tab">Amigos</a> </li>														
                                		</ul>
                                	</div>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main padding-4" style="margin:10px 0px 0px 0px; padding:0px 0px 0px 0px;">
                                        <div class="tab-content padding-8" style="margin:0px 0px 0px 0px; padding:0px 0px 0px 0px;">
                                            <div id="task-tab" class="tab-pane active">
                                                <div class="comments"><?php $mensagemDAO->ultimasMensagensPorUsuario($u_fnal,is_mobile()) ?></div>                                                                          
                                				<div class="hr hr8"> </div>
                                			</div>
                                			<div id="member-tab" class="tab-pane" >
                                				<div class="clearfix" > <?php $amigao->meusAmigosChat($utilizador); ?> </div>
                                			</div><!-- /.#member-tab -->
                                		</div>
                                	</div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div><!-- /.widget-box -->
                        </div>
                    <?php
                }
                if($onchat == 0)
                {
                    ?>
                        <div class="col-sm-12">
                            <div class="widget-box transparent" id="recent-box">
                                <div class="widget-header">
                                    <h4 class="widget-title lighter smaller"> <i class="ace-icon fa fa-rss orange"></i>Ultimas mensagens </h4>
                                		
                                	<div class="widget-toolbar no-border">
                                		<ul class="nav nav-tabs" id="recent-tab">
                                			<li class="active"> <a data-toggle="tab" href="#task-tab">Mensagens</a></li>
                                			<li> <a data-toggle="tab" href="#member-tab">Amigos</a> </li>														
                                		</ul>
                                	</div>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main padding-4" style="margin:10px 0px 0px 0px; padding:0px 0px 0px 0px;">
                                		<div class="tab-content padding-8" style="margin:0px 0px 0px 0px; padding:0px 0px 0px 0px;">
                                			<div id="task-tab" class="tab-pane active">
                                				<div class="comments"><?php $mensagemDAO->ultimasMensagensPorUsuario($u_fnal,is_mobile()) ?></div>                                                                          
                                				<div class="hr hr8"></div>
                                		    </div>
                                		    <div id="member-tab" class="tab-pane" >
                                			    <div class="clearfix" > <?php $amigao->meusAmigosChat($utilizador); ?> </div>
                                		    </div><!-- /.#member-tab -->
                                	    </div>
                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div><!-- /.widget-box -->
                        </div>
                    <?php
                }
                
            }else {
                ?>
                    <div class="row">
                        <div class="col-xs-3 col-md-3">
                            <div class="card" style="width: 100%;">
                                <?php $utilidade->MainSideMenu($usuario_final); ?>
                                <?php $utilidade->SideMenuProdutosAvendas($usuario_final); ?>
                                <?php $utilidade->SideMenuContaLea(); ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="widget-box transparent" id="recent-box">
                                <div class="widget-header">
                                    <h4 class="widget-title lighter smaller"> <i class="ace-icon fa fa-rss orange"></i>Ultimas mensagens </h4>
                                    <div class="widget-toolbar no-border">
                                        <ul class="nav nav-tabs" id="recent-tab">
                                            <li class="active"> <a data-toggle="tab" href="#task-tab">Mensagens</a></li>
                                            <li> <a data-toggle="tab" href="#member-tab">Amigos</a> </li>														
                                        </ul>
                                    </div>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main padding-4" style="margin:10px 0px 0px 0px; padding:0px 0px 0px 0px;">
                                        <div class="tab-content padding-8" style="margin:0px 0px 0px 0px; padding:0px 0px 0px 0px;">
                                            <div id="task-tab" class="tab-pane active">
                                                <div class="comments"><?php $mensagemDAO->ultimasMensagensPorUsuario($u_fnal,is_mobile()) ?></div>                                                                          
                                                <div class="hr hr8"> </div>
                                            </div>
                                            <div id="member-tab" class="tab-pane" >
                                                <div class="clearfix" > <?php $amigao->meusAmigosChat($utilizador); ?> </div>
                                            </div><!-- /.#member-tab -->
                                        </div>
                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div><!-- /.widget-box -->
                        </div>
                        <div class="col-sm-5">
                            <?php  
                                if($onchat == 1 && !empty($ce_u) && !empty($amg))
                                {
                                    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/usuario/chat-panel.php');
                                }
                            ?>
                        </div>
                    </div>
                <?php
            }
        ?>
    </div>
</div>


</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/footer.php'); ?>