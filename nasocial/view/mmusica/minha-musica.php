<?php
    //
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/header.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/loja/class.MinhaMusicaDAO.php');
    $MinhasMusicas = new MinhaMusicaDAO();
    //
    $strt = $_GET['strt'];
    $ritm = $_GET['ritm'];
    $dlt = $_GET['dlt'];
    $enc = $_GET['enc'];
    //print "---->" . $utilizador; 
?>

					<div class="page-content">
						<div class="page-header"> <h1>Minhas Músicas </h1> </div>
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div>
									<div class="row search-page" id="search-page-1">
										<div class="col-xs-12">
											<div class="row">
												<div class="col-xs-12 col-sm-12">
													<div class="row">
														<div class="search-area well col-xs-12">
															<div class="pull-left">
																<b class="text-primary"><?php $MinhasMusicas->GeneroSelecionado($ritm); ?></b>
																<!--&nbsp;
																<div id="toggle-result-format" class="btn-group btn-overlap" data-toggle="buttons">
																	<label title="Thumbnail view" class="btn btn-lg btn-white btn-success active" data-class="btn-success" aria-pressed="true">
																		<input type="radio" value="2" autocomplete="off" />
																		<i class="icon-only ace-icon fa fa-th"></i>
																	</label>

																	<label title="List view" class="btn btn-lg btn-white btn-grey" data-class="btn-primary">
																		<input type="radio" value="1" checked="" autocomplete="off" />
																		<i class="icon-only ace-icon fa fa-list"></i>
																	</label>

																	<label title="Map view" class="btn btn-lg btn-white btn-grey" data-class="btn-warning">
																		<input type="radio" value="3" autocomplete="off" />
																		<i class="icon-only ace-icon fa fa-crosshairs"></i>
																	</label>
																</div>-->
															</div>

															<div class="pull-right">
																<select id="selectopt" onchange="selectFunction(this);" name="ritmo"> 
																    <option value="0">Ritmos</option>
																    <?php $MinhasMusicas->MinhasMusicasGenero($utilizador,$ritm); ?> 
																</select>
															</div>
														</div>
													</div>

													<div class="row"> 
													    <?php
													        if($dlt === '1')
													        {
													            if($MinhasMusicas->ApagarEncomendaMP3($enc))
													            {
    													            ?>
    													                <div class="alert alert-block alert-success">
                                											<button type="button" class="close" data-dismiss="alert"> <i class="ace-icon fa fa-times"></i> </button>
                                
                                											<p> <strong> <i class="ace-icon fa fa-check"></i> Muito Bem! </strong> Música eliminada com sucesso. </p>
                                
                                											<p>
                                												<a href="http://www.lea.co.ao/nasocial/view/mmusica/minha-musica.php?start=0&ritm=0" class="btn btn-sm btn-success"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                                                                                  <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                                                                                </svg> Minhas Músicas</a>
                                												<a href="http://lea.co.ao/discografia/musicas.php?strt=0&cat=MA==&check=0&opm=1" class="btn btn-sm">
                                												        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-music" viewBox="0 0 16 16">
                                                                                          <path d="M11 6.64a1 1 0 0 0-1.243-.97l-1 .25A1 1 0 0 0 8 6.89v4.306A2.572 2.572 0 0 0 7 11c-.5 0-.974.134-1.338.377-.36.24-.662.628-.662 1.123s.301.883.662 1.123c.364.243.839.377 1.338.377.5 0 .974-.134 1.338-.377.36-.24.662-.628.662-1.123V8.89l2-.5V6.64z"/>
                                                                                          <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                                                                        </svg>
                                                                                        Mais Músicas
                                                                                </a>
                                											</p>
                                										</div>
    													            <?php
													            }
													        }
													        else
													        {
													            $MinhasMusicas->ListarMinhaMusica($strt,$utilizador,is_mobile(),$ritm);   
													        }
													         
													    ?> 
											        </div>

													<div class="space-12"></div>

													
												</div>
											</div>
										</div>
									</div>
								</div> <!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
			<?php include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/footer.php'); ?>

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/js/tree.min.js"></script>
		<script src="assets/js/select2.min.js"></script>
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/holder.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
		    function baixarMusica(som,ref) { window.open("http://lea.co.ao/downloads/m-downloads.php?som="+ som+"&ref="+ref+"","_self"); }
		    function tocarMusica(som) { window.open("http://lea.co.ao/artistas/reprodutor.php?som=" + som +"","_self"); }
		    function apagarMusica(id_mus) { window.open("http://www.lea.co.ao/nasocial/view/mmusica/minha-musica.php?start=0&ritm=0&dlt=1&enc=" + id_mus + "","_self"); }
		    //
		    function selectFunction() {
                var x = document.getElementById("selectopt").value;
                //document.getElementById("mylink").innerHTML = x;
              
               //document.getElementById("mylink").href = "lea.co.ao";
               if(x != '')
               {
                   window.open("http://www.lea.co.ao/nasocial/view/mmusica/minha-musica.php?start=0&ritm=" + x, "_self" );
               }
            }
		    
		    //
			jQuery(function($) {
			
				//data for tree element
				var category = {
					'for-sale' : {text: 'For Sale', type: 'folder'}	,
					'vehicles' : {text: 'Vehicles', type: 'item'}	,
					'rentals' : {text: 'Rentals', type: 'item'}	,
					'real-estate' : {text: 'Real Estate', type: 'item'}	,
					'pets' : {text: 'Pets', type: 'item'}	,
					'tickets' : {text: 'Tickets', type: 'item'}
				}
				category['for-sale']['additionalParameters'] = {
					'children' : {
						'appliances' : {text: 'Appliances', type: 'item'},
						'arts-crafts' : {text: 'Arts & Crafts', type: 'item'},
						'clothing' : {text: 'Clothing', type: 'item'},
						'computers' : {text: 'Computers', type: 'item'},
						'jewelry' : {text: 'Jewelry', type: 'item'},
						'office-business' : {text: 'Office', type: 'item'},
						'sports-fitness' : {text: 'Sports & Fitness', type: 'item'}
					}
				}
				
				var dataSource1 = function(options, callback){
					var $data = null
					if(!("text" in options) && !("type" in options)){
						$data = category;//the root tree
						callback({ data: $data });
						return;
					}
					else if("type" in options && options.type == "folder") {
						if("additionalParameters" in options && "children" in options.additionalParameters)
							$data = options.additionalParameters.children || {};
						else $data = {}//no data
					}
					
					callback({ data: $data })
				}
				
				$('#cat-tree').ace_tree({
					dataSource: dataSource1,
					multiSelect: true,
					cacheItems: true,
					'open-icon' : 'ace-icon tree-minus',
					'close-icon' : 'ace-icon tree-plus',
					'itemSelect' : true,
					'folderSelect': false,
					'selected-icon' : 'ace-icon fa fa-check',
					'unselected-icon' : 'ace-icon fa fa-times',
					loadingHTML : '<div class="tree-loading"><i class="ace-icon fa fa-refresh fa-spin blue"></i></div>'
				});
				
			
				$('.tree-container').ace_scroll({size: 250, mouseWheelLock: true});
				$('#cat-tree').on('closed.fu.tree disclosedFolder.fu.tree', function() {
					$('.tree-container').ace_scroll('reset').ace_scroll('start');	
				});
				
				
				
				//select2 location element
				$('.select2').css('min-width', '150px').select2({allowClear:true});
				
				
				//jQuery ui distance slider
				$( "#slider-range" ).css('width','150px').slider({
					range: true,
					min: 0,
					max: 100,
					values: [ 17, 67 ],
					slide: function( event, ui ) {
						var val = ui.values[$(ui.handle).index()-1] + "";
			
						if( !ui.handle.firstChild ) {
							$("<div class='tooltip bottom in' style='display:none;left:-6px;top:14px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>")
							.prependTo(ui.handle);
						}
						$(ui.handle.firstChild).show().children().eq(1).text(val);
					}
				}).find('span.ui-slider-handle').on('blur', function(){
					$(this.firstChild).hide();
				});
				
			
				//this is for demo only
				$('.thumbnail').on('mouseenter', function() {
					$(this).find('.info-label').addClass('label-primary');
				}).on('mouseleave', function() {
					$(this).find('.info-label').removeClass('label-primary');
				});
				
			
				//toggle display format buttons
				$('#toggle-result-format .btn').tooltip({container: 'body'}).on('click', function(e){
					$(this).siblings().each(function() {
						$(this).removeClass($(this).attr('data-class')).addClass('btn-grey');
					});
					$(this).removeClass('btn-grey').addClass($(this).attr('data-class'));
				});
				
				////////////////////
				//show different search page
				$('#toggle-result-page .btn').on('click', function(e){
					var target = $(this).find('input[type=radio]');
					var which = parseInt(target.val());
					$('.search-page').parent().addClass('hide');
					$('#search-page-'+which).parent().removeClass('hide');
				});
			});
		</script>
	