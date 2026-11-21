<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/header.php');
?>
<style>
    .main-li{background-color:#fff;border:#fff 1px solid;border-radius:50px;}
    .icons-tag{font-weight:bolder;font-size:16px;color:#222843;padding-right: 10px;}
    .main-li:hover {background-color: #ccc; border:#fff 1px solid;border-radius:50px;cursor: pointer;}
    .txt-meuno{color:#222843;font-weight:bolder;font-size:16px;padding-top:20px;}
    .espaco{padding:5px 5px 5px 5px;}
    .fix-image { position: relative; height: <?php if(is_mobile()){ print "109px"; }else{ print "218px"; } ?>;  background-size: cover; background-repeat: no-repeat; background-position: 100%;}
</style>

<div class="row">
    <div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
	<?php
	    if(is_mobile())
	    {
	        ?>
	            <!--<H3><b>Recordações</b></H3> 
                <hr/>-->
            <?php 
            include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/loja/recordacoes-painel.php'); 
        }
        else 
        {
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
                        <!--<H3><b>Recordações</b></H3> 
                        <hr/>-->
                        <?php include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/loja/recordacoes-painel.php'); ?>
                    </div>
                </div>
            <?php
        }
    ?>
	<!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/footer.php'); ?>