<?php 
    session_start();
    $usuario = $_SESSION['logged'];
    if($usuario == null){
        header('Refresh: 0; URL=http://localhost/lea/nasocial/login/login.php?pes=0');
    }
    include_once($_SERVER['DOCUMENT_ROOT'].'/lea/nasocial/header_.php');
    
?>

<div class="page-header">
    <h1>Resultados das Lembranças do/a Cigano </h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
	
	<div>
            <div class="row search-page" id="search-page-1">
                <div class="col-xs-12">
                    <div class="row">
			<div class="col-xs-12 col-sm-3">
                            <div class="search-area well well-sm">
				<div class="search-filter-header bg-primary">
                                    <h5 class="smaller no-margin-bottom"><i class="ace-icon fa fa-sliders light-green bigger-130"></i>&nbsp; Refine your Search </h5>
				</div>

				<div class="space-10"></div>

				<form>
                                    <div class="row">
					<div class="col-xs-12 col-sm-11 col-md-10">
                                            <div class="input-group">
						<input type="text" class="form-control" name="keywords" placeholder="Look within results" />
						<div class="input-group-btn">
                                                    <button type="button" class="btn btn-default no-border btn-sm">
							<i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
                                                    </button>
						</div>
                                            </div>
					</div>
                                    </div>
				</form>

				<div class="hr hr-dotted"></div>

				<h4 class="blue smaller">
                                    <i class="fa fa-tags"></i> Categorias
				</h4>

				<div class="tree-container">
                                    <ul id="cat-tree"></ul>
				</div>

														

														

														<div class="space-4"></div>
													</div>
												</div>

												<div class="col-xs-12 col-sm-9">
													<div class="row">
														<div class="search-area well col-xs-12">
															<div class="pull-left">
																<b class="text-primary">Display</b>

																&nbsp;
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
																</div>
															</div>

															<div class="pull-right">
																<b class="text-primary">Order</b>

																&nbsp;
																<select>
																	<option>Relevance</option>
																	<option>Newest First</option>
																	<option>Rating</option>
																</select>
															</div>
														</div>
													</div>

													<div class="row">
														<div class="col-xs-6 col-sm-4 col-md-3">
															<div class="thumbnail search-thumbnail">
																<span class="search-promotion label label-success arrowed-in arrowed-in-right">Sponsored</span>

																<img class="media-object" data-src="holder.js/100px200?theme=gray" />
																<div class="caption">
																	<div class="clearfix">
																		<span class="pull-right label label-grey info-label">London</span>

																		<div class="pull-left bigger-110">
																			<i class="ace-icon fa fa-star orange2"></i>

																			<i class="ace-icon fa fa-star orange2"></i>

																			<i class="ace-icon fa fa-star orange2"></i>

																			<i class="ace-icon fa fa-star-half-o orange2"></i>

																			<i class="ace-icon fa fa-star light-grey"></i>
																		</div>
																	</div>

																	<h3 class="search-title">
																		<a href="#" class="blue">Thumbnail label</a>
																	</h3>
																	<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam ...</p>
																</div>
															</div>
														</div>

														<div class="col-xs-6 col-sm-4 col-md-3">
															<div class="thumbnail search-thumbnail">
																<img class="media-object" data-src="holder.js/100px200?theme=gray" />
																<div class="caption">
																	<div class="clearfix">
																		<span class="pull-right label label-grey info-label">Tokyo</span>
																	</div>

																	<h3 class="search-title">
																		<a href="#" class="blue">Thumbnail label</a>
																	</h3>
																	<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam ...</p>
																</div>
															</div>
														</div>

														<div class="col-xs-6 col-sm-4 col-md-3">
															<div class="thumbnail search-thumbnail">
																<img class="media-object" data-src="holder.js/100px200?theme=gray" />
																<div class="caption">
																	<div class="clearfix">
																		<span class="pull-right label label-grey info-label">Istanbul</span>
																	</div>

																	<h3 class="search-title">
																		<a href="#" class="blue">Thumbnail label</a>
																	</h3>
																	<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam ...</p>
																</div>
															</div>
														</div>

														<div class="col-xs-6 col-sm-4 col-md-3">
															<div class="thumbnail search-thumbnail">
																<img class="media-object" data-src="holder.js/100px200?theme=social" />
																<div class="caption">
																	<div class="clearfix">
																		<span class="pull-right label label-grey info-label">Chicago</span>
																	</div>

																	<h3 class="search-title">
																		<a href="#" class="blue">Thumbnail label</a>
																	</h3>
																	<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam ...</p>
																</div>
															</div>
														</div>
													</div>

													<div class="space-12"></div>

													
			</div>
                    </div>
		</div>
            </div>
	</div>

								<div class="hide">
									<div class="row search-page" id="search-page-2">
										<div class="col-xs-12 col-md-10 col-md-offset-1">
											<div class="search-area well no-margin-bottom">
												<form>
													<div class="row">
														<div class="col-md-6">
															<div class="input-group">
																<input type="text" class="form-control" name="search" value="Hello World" />
																<div class="input-group-btn">
																	<button type="button" class="btn btn-primary btn-sm">
																		<i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
																	</button>
																</div>
															</div>
														</div>
													</div>
												</form>

												<div class="space space-6"></div>
												<span class="grey">About 263,000,000 results (0.74 seconds)</span>
											</div>

											<div class="search-results">
												<div class="search-result">
													<h5 class="search-title">
														<a href="#">&quot;Hello, World!&quot; - Wikipedia, the free encyclopedia</a>
													</h5>
													<a class="text-success" href="#">en.wikipedia.org</a>

													<p class="search-content">
														A &quot;
														<b>Hello</b>
,
														<b>World</b>
!&quot; program is a computer program that outputs &quot;
														<b>Hello</b>
,
														<b>World</b>!&quot; (or some variant thereof) on a display device. Because it is typically one of the ...
													</p>
												</div>

												<div class="search-result">
													<h5 class="search-title">
														<a href="#">Hello World! - GNU Project</a>
													</h5>
													<a class="text-success" href="#">www.gnu.org</a>

													<p class="search-content">
														<b>Hello World</b>
! How the way people code “
														<b>Hello World</b>” varies depending on their age and job ...
													</p>
												</div>

												<div class="search-result">
													<h5 class="search-title">
														<a href="#">HelloWorld.java - Introduction to Programming in Java</a>
													</h5>
													<a class="text-success" href="#">introcs.cs.princeton.edu</a>

													<p class="search-content">
														<b>HelloWorld</b>
														code in Java. ...
														<b>HelloWorld</b>
.java. Below is the syntax highlighted version of
														<b>HelloWorld</b>.java from ...
													</p>
												</div>

												<div class="search-result">
													<h5 class="search-title">
														<a href="#">Hello, World! - Learn Python - Free Interactive Python Tutorial</a>
													</h5>
													<a class="text-success" href="#">www.learnpython.org</a>

													<p class="search-content">
														<b>Hello</b>
,
														<b>World</b>! Python is a very simple language, and has a very straightforward syntax. It encourages programmers to program without boilerplate (prepared) ...
													</p>
												</div>

												<div class="search-result">
													<h5 class="search-title">
														<a href="#">Hello World · GitHub Guides</a>
													</h5>
													<a class="text-success" href="#">guides.github.com</a>

													<p class="search-content">
														The
														<b>Hello World</b>
														project is a time-honored tradition in computer programming. It is a simple exercise that gets you started when learning something new. Let's get ...
													</p>
												</div>
											</div>

											<div class="search-area well well-sm text-center">
												<ul class="pagination">
													<li class="disabled">
														<a href="#">
															<i class="ace-icon fa fa-angle-double-left"></i>
														</a>
													</li>

													<li class="active">
														<a href="#">1</a>
													</li>

													<li>
														<a href="#">2</a>
													</li>

													<li>
														<a href="#">3</a>
													</li>

													<li>
														<a href="#">4</a>
													</li>

													<li>
														<a href="#">5</a>
													</li>

													<li>
														<a href="#">
															<i class="ace-icon fa fa-angle-double-right"></i>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>

								<!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

			











<?php include_once($_SERVER['DOCUMENT_ROOT'].'/lea/nasocial/footer.php'); ?>
<!-- page specific plugin scripts -->
<script src="http://localhost/lea/nasocial/assets/js/tree.min.js"></script>
<script src="http://localhost/lea/nasocial/assets/js/select2.min.js"></script>
<script src="http://localhost/lea/nasocial/assets/js/jquery-ui.custom.min.js"></script>
<script src="http://localhost/lea/nasocial/assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="http://localhost/lea/nasocial/assets/js/holder.min.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
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
	</body>
</html>
