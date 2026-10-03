<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/header.php'); 
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.PromocoesRegistroDAO.php');
    $PromocoesRegistroDAO = new PromocoesRegistroDAO();
?>


                <div class="page-header">
                    <h1> Minhas Promoções <small> <!--<i class="ace-icon fa fa-angle-double-right"></i> Músicas Em Destaque </small></h1>-->
                </div>
                
                
                <?php 
                    if($PromocoesRegistroDAO->ValidacaoDeExistenciaMusicaEmDestaque($u_fnal))
                    {
                        ?>
                                <h4 class="widget-title lighter"> <i class="ace-icon fa fa-star orange"></i> Performance </h4>        
                                <div class="hr  hr-dotted"></div>
                                <div class="row">
                                    <div class="col-sm-12 infobox-container">
                                        <?php $PromocoesRegistroDAO->PerformanceDoServico($u_fnal); ?>
                                		<!--<div class="space-6"></div>-->
                                    </div>
                                </div>
                                <h4 class="widget-title lighter"> <i class="ace-icon fa fa-star orange"></i> Detalhes </h4>
                                
                                <div class="hr  hr-dotted"></div>
                
                                <div class="form-row"> <?php $PromocoesRegistroDAO->DetalhesDoServico($u_fnal); ?> </div>
                
                                <div class="vspace-12-sm"></div>
                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="widget-box transparent">
                                            <div class="widget-header widget-header-flat">
                                                <h4 class="widget-title lighter"> <i class="ace-icon fa fa-star orange"></i> Benefícios </h4> 
                                                <div class="widget-toolbar"> <a href="#" data-action="collapse"> <i class="ace-icon fa fa-chevron-up"></i> </a> </div>
                                			</div>
                                			<div class="widget-body">
                                				<div class="widget-main no-padding">
                                				    <table class="table table-bordered table-striped">
                                				        <thead class="thin-border-bottom"> <tr> <th> <i class="ace-icon fa fa-caret-right blue"></i># </th> <th> <i class="ace-icon fa fa-caret-right blue"></i>Descrição </th> </tr> </thead>
                                							<tbody> <?php $PromocoesRegistroDAO->BeneficiosDoServico($u_fnal); ?> </tbody>
                                						</table>
                                					</div>
                                				</div>
                                			</div>
                                		</div>
                                	</div>
                                </div>
                        <?php
                    }
                    else
                    {
                        ?>
                            <h4 class="widget-title lighter"> 
                                <i class="ace-icon fa fa-star orange"></i> Você ainda não possui um plano. <a href="https://lea.co.ao/sobre-nos/contactos.php">Clique aqui e assine o 'Música em Destaque'!</a> 
                            </h4> 
                        <?php
                    }
                ?>
                
            </div>
        </div>
    </div>
</div>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/footer.php'); ?>