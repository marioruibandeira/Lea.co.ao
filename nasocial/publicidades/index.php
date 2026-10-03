<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/header.php'); 
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.PublicidadesDAO.php');
    $PublicidadesDAO = new PublicidadesDAO();
?>
<style>
    .main-li{background-color:#fff;border:#fff 1px solid;border-radius:50px;}
    .icons-tag{font-weight:bolder;font-size:16px;color:#222843;padding-right: 10px;}
    .main-li:hover {background-color: #ccc; border:#fff 1px solid;border-radius:50px;cursor: pointer;}
    .txt-meuno{color:#222843;font-weight:bolder;font-size:16px;padding-top:20px;}
    .b-campos {
        padding-left: 0px;
        padding-right: 0px;
    }
    .caixas{width: 192px !important;}
</style>
                        <!-- /.page-header http://unicode.org/emoji/charts/full-emoji-list.html https://freek.dev/376-using-emoji-in-php-->
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <?php 
                                    if(is_mobile()) 
                                    {
                                        ?> 
                                            <div class="page-header">
                                                <h1> Publicidades <!--<small> <i class="ace-icon fa fa-angle-double-right"></i> Publicidades </small>--> </h1>
                                            </div>
                                            
                                        <?php
                                        include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/publicidades/publicidade-painel.php');
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
                                                <div class="col-xs-9 col-md-9">
                                                    <div class="page-header">
                                                        <h1> Publicidades <!--<small> <i class="ace-icon fa fa-angle-double-right"></i> Publicidades </small>--> </h1>
                                                    </div>
                                                    <?php include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/publicidades/publicidade-painel.php'); ?>
                                                </div>
                                            </div>
                                        <?php
                                    }
                                ?> <!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/footer.php'); ?>
<script type="text/javascript">

</script>