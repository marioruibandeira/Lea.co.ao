<?php
    //
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/header.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/usuario/LinhaTempo.php');
    $lt = new LinhaTempo();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/usuario/ColecoesDAO.php');
    $colecao = new ColecoesDAO();
    //
?>
<div class="page-content">
    <div class="ace-settings-container" id="ace-settings-container">
        <div class="ace-settings-box clearfix" id="ace-settings-box">
            <div class="pull-left width-50">
                <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
                    <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
				</div>
				<div class="ace-settings-item">
				    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
				    <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
				</div>
				<div class="ace-settings-item">
				    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
				    <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
				</div>
			</div><!-- /.pull-left -->
		</div><!-- /.ace-settings-box -->
	</div><!-- /.ace-settings-container -->
	<div class="page-header">
	    <h1>
	        Galeria
	        <small>
	            <i class="ace-icon fa fa-angle-double-right"></i> Galeria de artistas que curtes
	       </small>
	   </h1>
	</div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div id="accordion" class="accordion-style1 panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                <i class="ace-icon fa fa-angle-down bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i> &nbsp;Artistas Favoritos
							</a>
						</h4>
					</div>
					<div class="panel-collapse collapse in" id="collapseOne">
					    <div class="panel-body">
					        <div>
					            <ul class="ace-thumbnails clearfix"> 
					                <?php $colecao->ColecaoArtistasCurtidos(); ?>   
                                </ul>
						    </div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
															<i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
															&nbsp;Artistas Recomendados Por Ti
														</a>
													</h4>
												</div>

												<div class="panel-collapse collapse" id="collapseTwo">
													<div class="panel-body">
														Continua a visitar
													</div>
												</div>
											</div>

											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
															<i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
															&nbsp;Discos que Curtes
														</a>
													</h4>
												</div>

												<div class="panel-collapse collapse" id="collapseThree">
													<div class="panel-body">
														Continua a visitar
													</div>
												</div>
											</div>
										</div>
									</div><!-- /.col -->













								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/footer.php'); ?>
<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
	var $overflow = '';
	var colorbox_params = {
		rel: 'colorbox',
		reposition:true,
		scalePhotos:true,
		scrolling:false,
		previous:'<i class="ace-icon fa fa-arrow-left"></i>',
		next:'<i class="ace-icon fa fa-arrow-right"></i>',
		close:'&times;',
		current:'{current} of {total}',
		maxWidth:'100%',
		maxHeight:'100%',
		onOpen:function(){
			$overflow = document.body.style.overflow;
			document.body.style.overflow = 'hidden';
		},
		onClosed:function(){
			document.body.style.overflow = $overflow;
		},
		onComplete:function(){
			$.colorbox.resize();
		}
	};

	$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
	$("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange fa-spin'></i>");//let's add a custom loading icon
	
	
	$(document).one('ajaxloadstart.page', function(e) {
		$('#colorbox, #cboxOverlay').remove();
   });
})
		</script>