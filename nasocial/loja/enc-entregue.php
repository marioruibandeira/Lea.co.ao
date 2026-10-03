<?php 
    session_start();
    $usuario = $_SESSION['logged'];
    if($usuario == null){
        header('Refresh: 0; URL=http://localhost/lea/nasocial/login/login.php?pes=0');
    }
    include_once($_SERVER['DOCUMENT_ROOT'].'/lea/nasocial/header_.php');
?>

<div class="page-header">
    <h1>
	Entrega Confirmada
	<small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Enta encomenda foi efectuada com sucesso!
	</small>
    </h1>
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
                                <h4 class="blue smaller">
                                    <i class="glyphicon glyphicon-credit-card light-grey bigger-110"></i> Nome do Produto
				</h4>

				<div class="search-filter-element">
                                    <img class="media-object" data-src="holder.js/100px200?theme=social" />
				</div>
                                <div class="caption">
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam ...</p>
                                </div>
				<div class="hr hr-dotted hr-24"></div>

				<div class="text-center">
                                    <div class="row">
					<div class="col-sm-12 pull-right">
                                            <h4 class="pull-right">
						Total a pagar : <span class="red">Kz 395</span>
                                            </h4>
					</div>														
                                    </div>
				</div>
                                
                                <div class="hr hr-dotted hr-24"></div>
                                
                                <dl id="dt-list-1">
                                    <dt>Vendedor</dt>
                                        <dd>Jhabem Bandeira</dd>
                                    <dt>Banco</dt>
                                        <dd>Standard Bank</dd>
                                    <dt>Conta</dt>
                                        <dd>39487510324</dd>
                                    <dt>IBAN</dt>
                                        <dd>AO06 9876897 8689 86886</dd>
                                    <dt>Telefone</dt>
                                        <dd>(+244) 999 999 999</dd>
                                    <dt>E-mail</dt>
                                        <dd>liplight@gmail.com</dd>
                                    <dt>Localidade</dt>
                                        <dd>Lubango</dd>
				</dl>

				<div class="space-4"></div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-9">
                            <div class="row">
                                <div class="col-xs-12 col-md-7">
                                    <form name="glivro" onsubmit="return validateForm()" method="post" class="form-horizontal" role="form">
                                        <div class="well well-lg">
                                        
                                        <h4 class="blue">EFECTUAR ENTREGA</h4>
                                        
                                    
                                        <div class="hr hr-double hr-dotted hr18"></div>
                                    
                                        <!--//TIPO DE ENTREGA--->
                                        <div class="form-group">
                                            <div>
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <b> Tipo de Entrega</b> </label>
                                                <div class="col-sm-9">
                                                    <select class="chosen-select form-control"  data-placeholder="Choose a State..." readonly="readonly">																
                                                        <option value="PA">Entrega Pessoal</option>
                                                        <option value="RI">Caixa Postal</option>
                                                        <option value="SC">DHL</option>
                                                        <option value="SD">Fedex</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--//FIM DO TIPO DE ENTREGA--> 
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>Recebido Por</b></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="titulo" placeholder="Calor e Frio Vol. 5"  class="col-xs-12"  readonly="readonly"/>
                                            </div>
                                        </div>                                                                    
                                        <!--//PROVINCIA--->
                                        <div class="form-group">
                                            <div>
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <b> Provincia</b> </label>
                                                <div class="col-sm-9">
                                                    <select class="chosen-select form-control"  data-placeholder="Choose a State..." readonly="readonly">																
                                                        <option value="PA">Luanda</option>
                                                        <option value="RI">Lubango</option>
                                                        <option value="SC">Benguela</option>
                                                        <option value="SD">Kwanza Sul</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--//FIM DA PROVINCIA-->                            
                                        <!--//MUNICIPIO--->
                                        <div class="form-group">
                                            <div>
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <b> Municipio</b> </label>
                                                <div class="col-sm-9">
                                                    <select class="chosen-select form-control"  data-placeholder="Choose a State..." readonly="readonly">																
                                                        <option value="PA">Viana</option>
                                                        <option value="RI">Belas</option>
                                                        <option value="SC">Ingombota</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--//FIM DO MUNICIPIO-->
                                        <!--//DISTRITO--->
                                        <div class="form-group">
                                            <div>
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>  Dristito</b> </label>
                                                <div class="col-sm-9">
                                                    <select class="chosen-select form-control" data-placeholder="Choose a State..." readonly="readonly">																
                                                        <option value="PA">Maianga</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--//FIM DO DISTRITO-->
                                        <!--//comuna--->
                                        <div class="form-group">
                                            <div>
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>  Comuna</b> </label>
                                                <div class="col-sm-9">
                                                    <select class="chosen-select form-control" data-placeholder="Choose a State..." readonly="readonly">																
                                                        <option value="PA">Comuna</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--//COMUNA-->
                                        <!--//VILA--->
                                        <div class="form-group">
                                            <div>
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>  Vila</b> </label>
                                                <div class="col-sm-9">
                                                    <select class="chosen-select form-control" data-placeholder="Choose a State..." readonly="readonly">																
                                                        <option value="PA">Comuna</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--//VILA-->
                                        <div class="form-group">
                                            <div>
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>  Quarteira / Bairro</b> </label>
                                                <div class="col-sm-9">
                                                    <input required="required" placeholder="7098123456" type="text" class="col-xs-12" readonly="readonly"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!--//VILA-->
                                                                       
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><b>  Rua </b> </label>
                                            <div class="col-sm-9">
                                                <input required="required" placeholder="7098123456" type="text" class="col-xs-12" readonly="readonly"/>
                                            </div>
                                        </div>            
            
                                        <div class="space-4"></div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> <b>Numero da Casa </b></label>
                                            <div class="col-sm-9">
                                                <input type="number" id="form-field-1-1" placeholder="5,900.00 Kz" name="preco" readonly="readonly"  required="required" class="col-xs-12" placeholder="0.00" required min="0" step="0.01" pattern="\d+(\.\d{2})?"/>
                                            </div>
                                        </div>
                                        <div class="space-4"></div>
            
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><b>  Tel. Alternativo </b> </label>
                                            <div class="col-sm-9">
                                                <input required="required" placeholder="5,900.00 Kz" type="text" class="col-xs-12" readonly="readonly"/>
                                            </div>
                                        </div> 
                      

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><b>  Email Alternativo</b>  </label>
                                            <div class="col-sm-9">
                                                <input required="required" placeholder="5,900.00 Kz" type="text" class="col-xs-12" readonly="readonly"/>
                                            </div>                    
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><b> Observação </b></label>
                                            <div class="col-sm-9">
                                                <textarea cols="50" id="form-field-11" class="autosize-transition form-control" readonly="readonly" ></textarea>
                                            </div>												
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><b>  Email</b>  </label>
                                            <div class="col-sm-9">
                                                <input required="required" placeholder="5,900.00 Kz" type="text" class="col-xs-12" />
                                            </div>                    
                                        </div>
                                    </div>
                                    
                                    <div class="clearfix form-actions">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button class="btn btn-danger" type="submit">
                                                <i class="glyphicon glyphicon-print bigger-110"></i> Imprimir
                                            </button>

                                            &nbsp; &nbsp; &nbsp;
                                            <button class="btn btn-danger" type="submit">
                                                <i class="glyphicon glyphicon-envelope bigger-110"></i> E-mail
                                            </button>

                                            &nbsp; &nbsp; &nbsp;
                                            <a href="http://localhost/lea/nasocial/loja/relatorio.php" class="btn">
                                                <i class="ace-icon glyphicon glyphicon-log-out bigger-110"></i> <?php $idiom->idiomaPreferidoSelecionado(23,$lingua); ?>
                                            </a>
                                        </div>
                                    </div>
                                    
                                    </form>
                                    
                                    
                                    
                                    <div class="widget-box">
					<div class="widget-header widget-header-flat">
                                            <h4 class="widget-title">Confirmação da Entrega</h4>
					</div>

					<div class="widget-body">
                                            <div class="widget-main">
						<div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="alert alert-block alert-success">
                                                            <p>
								<strong>
                                                                    <i class="ace-icon fa fa-check"></i> Parabéns!
								</strong>
								A entre foi efectuada com sucesso, pode proseguir para umas das seguintes opções:
                                                            </p>
							</div> 
                                                    </div>
                                                </div>

						<hr />
						<div class="row">
                                                    <div class="col-xs-12">
							<ul class="list-unstyled spaced2">
                                                            <li>
								<ul class="list-inline">
                                                                    <li>
									<i class="ace-icon fa fa-share green bigger-110"></i>
                                                                        <a href="http://localhost/lea/nasocial/loja/catalogo.php"> Catalogo Global</a>
                                                                    </li>
                                                                    <li>
                                                                        <i class="ace-icon fa fa-share green bigger-110"></i>
									<a href="#">Pagamentos Efectuado</a>
                                                                    </li>
                                                                    <li>
                                                                        <i class="ace-icon fa fa-share green bigger-110"></i>
									<a href="http://localhost/lea/nasocial/nasocial.php">Dashboard</a>
                                                                    </li>
                                                                    <li>
                                                                        <i class="ace-icon fa fa-share green bigger-110"></i>
                                                                        <a href="http://localhost/lea/nasocial/usuario/timeline.php">Linha do Tempo</a>
                                                                    </li>
								</ul>
                                                            </li>
							</ul>
                                                    </div>
                                                </div>
                                                <!--//FIM-->
                                            </div>
					</div>
                                    </div>
				</div>
                                
                                <!--//OFERTAS DISPONIVEIS-->
                                <div class="col-xs-12 col-md-5">
                                    <div class="thumbnail search-thumbnail">
                                        
                                        
                                        
                                        
                                        

														

														<form>
															<div class="row">
																<div class="col-xs-12 col-sm-11 col-md-12">
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
                                                                                                                
                                                                                                                
                                                                                                                
					<div>
														<table class="table table-striped table-bordered">
															<thead>
																<tr>
																	<th class="center">#</th>
																	<th>Vendedor</th>
																	<th class="hidden-xs">Pagamento</th>
																	<th>Total</th>
																</tr>
															</thead>

															<tbody>
																<tr>
																	<td class="center">1</td>

																	<td>
																		<a href="#">google.com</a>
																	</td>
																	<td class="hidden-xs">
																		1 year domain registration
																	</td>
																	<td>$10</td>
																</tr>

																<tr>
																	<td class="center">2</td>

																	<td>
																		<a href="#">yahoo.com</a>
																	</td>
																	<td class="hidden-xs">
																		5 year domain registration
																	</td>
																	<td>$45</td>
																</tr>

																<tr>
																	<td class="center">3</td>
																	<td>Hosting</td>
																	<td class="hidden-xs"> 1 year basic hosting </td>
																	<td>$90</td>
																</tr>

																<tr>
																	<td class="center">4</td>
																	<td>Design</td>
																	<td class="hidden-xs"> Theme customization </td>
																	<td>$250</td>
																</tr>
															</tbody>
														</table>
													</div>
                                    </div>
                                </div>
                            </div>												
                        </div>
                    </div>
		</div>
            </div>
        </div>
	<!-- PAGE CONTENT BEGINS -->
        <!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

<?php include_once($_SERVER['DOCUMENT_ROOT'].'/lea/nasocial/footer.php'); ?>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div>
<!-- /.main-container -->

<!-- /
// validação do formulario
//
-->
<script type="text/javascript">
    function validateForm() {
    var x = document.forms["glivro"]["titulo"].value;
    if (x == "") {
      alert("Name must be filled out");
      return false;
    }
} 
</script>
<!-- page specific plugin scripts -->
<script src="http://localhost/lea/nasocial/assets/js/holder.min.js"></script>
<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($) {
				$('#id-disable-check').on('click', function() {
					var inp = $('#form-input-readonly').get(0);
					if(inp.hasAttribute('disabled')) {
						inp.setAttribute('readonly' , 'true');
						inp.removeAttribute('disabled');
						inp.value="This text field is readonly!";
					}
					else {
						inp.setAttribute('disabled' , 'disabled');
						inp.removeAttribute('readonly');
						inp.value="This text field is disabled!";
					}
				});
			
			
				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
			
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}
			
			
				$('[data-rel=tooltip]').tooltip({container:'body'});
				$('[data-rel=popover]').popover({container:'body'});
			
				autosize($('textarea[class*=autosize]'));
				
				$('textarea.limited').inputlimiter({
					remText: '%n character%s remaining...',
					limitText: 'max allowed : %n.'
				});
			
				$.mask.definitions['~']='[+-]';
				$('.input-mask-date').mask('99/99/9999');
				$('.input-mask-phone').mask('(999) 999-9999');
				$('.input-mask-eyescript').mask('~9.99 ~9.99 999');
				$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
			
			
			
				$( "#input-size-slider" ).css('width','200px').slider({
					value:1,
					range: "min",
					min: 1,
					max: 8,
					step: 1,
					slide: function( event, ui ) {
						var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
						var val = parseInt(ui.value);
						$('#form-field-4').attr('class', sizing[val]).attr('placeholder', '.'+sizing[val]);
					}
				});
			
				$( "#input-span-slider" ).slider({
					value:1,
					range: "min",
					min: 1,
					max: 12,
					step: 1,
					slide: function( event, ui ) {
						var val = parseInt(ui.value);
						$('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
					}
				});
			
			
				
				//"jQuery UI Slider"
				//range slider tooltip example
				$( "#slider-range" ).css('height','200px').slider({
					orientation: "vertical",
					range: true,
					min: 0,
					max: 100,
					values: [ 17, 67 ],
					slide: function( event, ui ) {
						var val = ui.values[$(ui.handle).index()-1] + "";
			
						if( !ui.handle.firstChild ) {
							$("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>")
							.prependTo(ui.handle);
						}
						$(ui.handle.firstChild).show().children().eq(1).text(val);
					}
				}).find('span.ui-slider-handle').on('blur', function(){
					$(this.firstChild).hide();
				});
				
				
				$( "#slider-range-max" ).slider({
					range: "max",
					min: 1,
					max: 10,
					value: 2
				});
				
				$( "#slider-eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
					// read initial values from markup and remove that
					var value = parseInt( $( this ).text(), 10 );
					$( this ).empty().slider({
						value: value,
						range: "min",
						animate: true
						
					});
				});
				
				$("#slider-eq > span.ui-slider-purple").slider('disable');//disable third item
			
				
				$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
				//pre-show a file name, for example a previously selected file
				//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])
			
			
				$('#id-input-file-3').ace_file_input({
					style: 'well',
					btn_choose: 'Drop files here or click to choose',
					btn_change: null,
					no_icon: 'ace-icon fa fa-cloud-upload',
					droppable: true,
					thumbnail: 'small'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}
			
				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});
				
				
				//$('#id-input-file-3')
				//.ace_file_input('show_file_list', [
					//{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
					//{type: 'file', name: 'hello.txt'}
				//]);
			
				
				
			
				//dynamically change allowed formats by changing allowExt && allowMime function
				$('#id-file-format').removeAttr('checked').on('change', function() {
					var whitelist_ext, whitelist_mime;
					var btn_choose
					var no_icon
					if(this.checked) {
						btn_choose = "Drop images here or click to choose";
						no_icon = "ace-icon fa fa-picture-o";
			
						whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
						whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
					}
					else {
						btn_choose = "Drop files here or click to choose";
						no_icon = "ace-icon fa fa-cloud-upload";
						
						whitelist_ext = null;//all extensions are acceptable
						whitelist_mime = null;//all mimes are acceptable
					}
					var file_input = $('#id-input-file-3');
					file_input
					.ace_file_input('update_settings',
					{
						'btn_choose': btn_choose,
						'no_icon': no_icon,
						'allowExt': whitelist_ext,
						'allowMime': whitelist_mime
					})
					file_input.ace_file_input('reset_input');
					
					file_input
					.off('file.error.ace')
					.on('file.error.ace', function(e, info) {
						//console.log(info.file_count);//number of selected files
						//console.log(info.invalid_count);//number of invalid files
						//console.log(info.error_list);//a list of errors in the following format
						
						//info.error_count['ext']
						//info.error_count['mime']
						//info.error_count['size']
						
						//info.error_list['ext']  = [list of file names with invalid extension]
						//info.error_list['mime'] = [list of file names with invalid mimetype]
						//info.error_list['size'] = [list of file names with invalid size]
						
						
						/**
						if( !info.dropped ) {
							//perhapse reset file field if files have been selected, and there are invalid files among them
							//when files are dropped, only valid files will be added to our file array
							e.preventDefault();//it will rest input
						}
						*/
						
						
						//if files have been selected (not dropped), you can choose to reset input
						//because browser keeps all selected files anyway and this cannot be changed
						//we can only reset file field to become empty again
						//on any case you still should check files with your server side script
						//because any arbitrary file can be uploaded by user and it's not safe to rely on browser-side measures
					});
					
					
					/**
					file_input
					.off('file.preview.ace')
					.on('file.preview.ace', function(e, info) {
						console.log(info.file.width);
						console.log(info.file.height);
						e.preventDefault();//to prevent preview
					});
					*/
				
				});
			
				$('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
				.closest('.ace-spinner')
				.on('changed.fu.spinbox', function(){
					//console.log($('#spinner1').val())
				}); 
				$('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up bigger-110', icon_down:'ace-icon fa fa-caret-down bigger-110'});
				$('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus bigger-110', icon_down:'ace-icon fa fa-minus bigger-110', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
				$('#spinner4').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'});
			
				//$('#spinner1').ace_spinner('disable').ace_spinner('value', 11);
				//or
				//$('#spinner1').closest('.ace-spinner').spinner('disable').spinner('enable').spinner('value', 11);//disable, enable or change value
				//$('#spinner1').closest('.ace-spinner').spinner('value', 0);//reset to 0
			
			
				//datepicker plugin
				//link
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			
				//or change it into a date range picker
				$('.input-daterange').datepicker({autoclose:true});
			
			
				//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
				$('input[name=date-range-picker]').daterangepicker({
					'applyClass' : 'btn-sm btn-success',
					'cancelClass' : 'btn-sm btn-default',
					locale: {
						applyLabel: 'Apply',
						cancelLabel: 'Cancel',
					}
				})
				.prev().on(ace.click_event, function(){
					$(this).next().focus();
				});
			
			
				$('#timepicker1').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false,
					disableFocus: true,
					icons: {
						up: 'fa fa-chevron-up',
						down: 'fa fa-chevron-down'
					}
				}).on('focus', function() {
					$('#timepicker1').timepicker('showWidget');
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
				
			
				
				
				
			
				$('#colorpicker1').colorpicker();
				//$('.colorpicker').last().css('z-index', 2000);//if colorpicker is inside a modal, its z-index should be higher than modal'safe
			
				$('#simple-colorpicker-1').ace_colorpicker();
				//$('#simple-colorpicker-1').ace_colorpicker('pick', 2);//select 2nd color
				//$('#simple-colorpicker-1').ace_colorpicker('pick', '#fbe983');//select #fbe983 color
				//var picker = $('#simple-colorpicker-1').data('ace_colorpicker')
				//picker.pick('red', true);//insert the color if it doesn't exist
			
			
				$(".knob").knob();
				
				
				var tag_input = $('#form-field-tags');
				try{
					tag_input.tag(
					  {
						placeholder:tag_input.attr('placeholder'),
						//enable typeahead by specifying the source array
						source: ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead
						/**
						//or fetch data from database, fetch those that match "query"
						source: function(query, process) {
						  $.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
						  .done(function(result_items){
							process(result_items);
						  });
						}
						*/
					  }
					)
			
					//programmatically add/remove a tag
					var $tag_obj = $('#form-field-tags').data('tag');
					$tag_obj.add('Programmatically Added');
					
					var index = $tag_obj.inValues('some tag');
					$tag_obj.remove(index);
				}
				catch(e) {
					//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
					tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
					//autosize($('#form-field-tags'));
				}
				
				
				/////////
				$('#modal-form input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'ace-icon fa fa-cloud-upload',
					droppable:true,
					thumbnail:'large'
				})
				
				//chosen plugin inside a modal will have a zero width because the select element is originally hidden
				//and its width cannot be determined.
				//so we set the width after modal is show
				$('#modal-form').on('shown.bs.modal', function () {
					if(!ace.vars['touch']) {
						$(this).find('.chosen-container').each(function(){
							$(this).find('a:first-child').css('width' , '210px');
							$(this).find('.chosen-drop').css('width' , '210px');
							$(this).find('.chosen-search input').css('width' , '200px');
						});
					}
				})
				/**
				//or you can activate the chosen plugin after modal is shown
				//this way select element becomes visible with dimensions and chosen works as expected
				$('#modal-form').on('shown', function () {
					$(this).find('.modal-chosen').chosen();
				})
				*/
			
				
				
				$(document).one('ajaxloadstart.page', function(e) {
					autosize.destroy('textarea[class*=autosize]')
					
					$('.limiterBox,.autosizejs').remove();
					$('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
				});
			
			});
		</script>
	