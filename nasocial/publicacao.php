<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/header.php'); 
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UtilidadeDAO.php');
    $UtilidadeDAO = new UtilidadeDAO();
    //
    $pub_id = $_GET['pub'] ? trim($_GET['pub']) : '';
    if($pub_id == null || $pub_id == ''){ $UtilidadeDAO->RedirecionamentoPrincipal(); }
?>

                        <!-- /.page-header http://unicode.org/emoji/charts/full-emoji-list.html https://freek.dev/376-using-emoji-in-php-->
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <?php 
                                    if(is_mobile())
                                    { 
                                        include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/mini-header.php');
                                        $mural->MiniPublicacao($pub_id,$usuario_final); 
                                    }else
                                    {
                                        ?>
                                            <div class="row">
                                                <div class="col-xs-3 col-md-3"></div>
                                                <div class="col-xs-6 col-md-6">
                                                    <?php include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/mini-header.php');?>
                                                    <?php $mural->MiniPublicacao($pub_id,$usuario_final); ?>
                                                </div>
                                                <div class="col-xs-3 col-md-3"></div>
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
<script type="text/javascript">
    function FormularioComentarios() {
        var x = this.closest('.list-group').querySelector("#comentar");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>