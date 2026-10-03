<?php
    //
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/header.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.BibiliotecaDAO.php');
    $BibiliotecaDAO = new BibiliotecaDAO();
    //
    //$strt = $_GET['strt'];
    //$ritm = $_GET['ritm'];
    //$dlt = $_GET['dlt'];
    //$enc = $_GET['enc'];
    $bib_ = "";
    $bib = $_GET['bib'];
    if($bib === '1')
    {
        $bib_ =  $bib;  
    }
    else if($bib === 2)
    {
        $bib_ =  $bib;  
    }
    else if($bib === 3)
    {
        $bib_ =  $bib;  
    }else{
        //envia para pagina de erro
    }
    //print "---->" . $utilizador; 
?>

					<div class="page-content">
						<div class="page-header"> <h1>Meus Artistas </h1> </div>
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div>
									<div class="row search-page" id="search-page-1">
										<div class="col-xs-12">
											<div class="row">
												<div class="col-xs-12 col-sm-12">
													<div class="row"> </div>

													<div class="row"> 
													    <?php 
													        if($bib_ === '1')
													        {
													            $BibiliotecaDAO->ListarMeusArtistas($strt,$utilizador,is_mobile(),$ritm);
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
