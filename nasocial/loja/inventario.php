<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/header.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/login/Login.php');
    $lgin = new Login();
?>
                <div class="row">
                	<div class="col-xs-12">
                	    <div class="space-6"></div>
                	    <div class="row">
                	        <div class="col-sm-10 col-sm-offset-1">
                	            <div class="widget-box transparent">
                	                <div class="widget-header widget-header-large">
                	                    <h3 class="widget-title grey lighter"> <i class="ace-icon fa fa-leaf green">Inventario</i>  </h3>
                	                    <div class="widget-toolbar no-border invoice-info">
                	                        <span class="invoice-info-label">Vendedor :</span>
                	                        <span class="red">#<?php $lgin->NumeroVendedor($utilizador);?></span>
                	                        <br />
                	                        <span class="invoice-info-label">Data:</span>
                	                        <span class="blue"><?php print date("d / m / Y");?></span>
                				        </div>
                				        <div class="widget-toolbar hidden-480"> <a href="#"> <i class="ace-icon fa fa-print"></i> </a></div>
                		            </div>
                
                		            <div class="widget-body">
                                        <div class="widget-main padding-24"> <div> <?php $inventario->produtoCompleto($utilizador);  ?>
                			        </div>
                			        <div class="hr hr8 hr-double hr-dotted"></div>
                                        <div class="row">
                                            <div class="col-sm-5 pull-right">
                                                <h4 class="pull-right"> Total do Inventario : <span class="red">Kz <?php $inventario->totalEmEstoque($utilizador);  ?></span></h4>
                                            </div>
                                            <div class="col-sm-7 pull-left"> Informação de Utilidade </div>
                			            </div>
                                        <div class="space-6"></div>
                			            <div class="well"> Muito Obrigado por escolher Lés Entretenimento Angola. Acreditamos de que Ficará Satisfeitos Com os Nossos Serviços </div>
                                    </div>
                		        </div>
                            </div>
                	    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/footer.php'); ?>