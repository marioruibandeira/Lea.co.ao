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
	            <div class="col-xs-10 col-md-10" style="text-align:left;padding-left:0px;"><H3 style="margin-top:6px;"><b>Minha Carteira Digital</b></H3></div>
	            <div class="col-xs-2 col-md-2" style="text-align:right;padding-right:0px;"><a href="https://www.lea.co.ao/nasocial/combo-menu.php"><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#000"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg></a></div>
                <hr/>
            <?php 
            include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/loja/carteira-digital/carteira-digital-painel.php'); 
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
                        <H3><b>Minha Carteira Digital</b></H3>
        	            <hr/>
                        <?php include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/loja/carteira-digital/carteira-digital-painel.php'); ?>
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