<?php 
    //
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/header.php');
    //
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UsuarioDAO.php');
    $u_l = new UsuarioDAO();    
    //include_once($_SERVER['DOCUMENT_ROOT'].'/lea/nasocial/logica/utilidades/class.Provincias.php');
    //$provi = new Provincias();
    //include_once($_SERVER['DOCUMENT_ROOT'].'/lea/nasocial/logica/entidade/class.Idioma.php');
    //$idi = new Idioma();
    //include_once($_SERVER['DOCUMENT_ROOT'].'/lea/nasocial/logica/dao/usuario/class.AmigoDAO.php');
    //$amigo = new AmigoDAO();
    //include_once($_SERVER['DOCUMENT_ROOT'].'/lea/nasocial/logica/dao/usuario/class.PedidoAmizadeDAO.php');
    //$p_a_dao = new PedidoAmizadeDAO();
?>

<div class="page-header">
    <h1> User Profile Page <small><i class="ace-icon fa fa-angle-double-right"></i> 3 styles with inline editable feature </small> </h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
            <div class="widget-box transparent">
                    <div class="widget-header widget-header-small">
                        <h4 class="widget-title blue smaller">
                            <i class="ace-icon fa fa-users orange"></i> Pessoas que talvez conheces
                        </h4>

                        <div class="widget-toolbar action-buttons">
                            <a href="#" data-action="reload">
                                <i class="ace-icon fa fa-refresh blue"></i>
                            </a>
                            &nbsp;
                            <a href="#" class="pink">
                                <i class="ace-icon fa fa-trash-o"></i>
                            </a>
                        </div>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main padding-8">
                            <div id="profile-feed-1" class="profile-feed"><?php //$u_l->listarAmingosPerfil($u_fnal); ?></div>
                        </div>
                    </div>
                </div>
	<!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/footer.php'); ?>