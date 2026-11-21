<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/logica/Utilidade.php');
    class BibiliotecaDAO
    {
        function ListarMeusArtistas($start,$utilizador_,$is_mobile,$ritm)
        {
            $utilidade = new Utilidade();
            
            $connection = new cnx(); 
            $connection->connect();

            $caminho = "/nasocial/usuario/biblioteca.php";
            //number of page to be displayed per page
            $records_per_page = 20;
            $start = 0;
            $utilizador = base64_decode($utilizador_);

            //select and execute query to count records DATE_FORMAT(anoreg,'%d/%m/%Y')
            if($ritm)
            {
                $query = "SELECT COUNT(*) FROM vw_lea_minhas_musicas WHERE ce_utilizador = $utilizador AND gnr_id = $ritm";   
            }else{
                $query = "SELECT uas.Id, uas.FK_Artista, uas.FK_Utilizador, a.nomeA, a.nomeV, a.dataNac, a.provincia FROM tblusuario_artista_soufa uas JOIN vwartistas a ON a.artID = uas.FK_Artista WHERE uas.FK_Utilizador = $utilizador";
            }
                
            
            $result = mysqli_query($connection->myconn,$query);

            //get total number of records
            $row = mysqli_fetch_row($result);
            $total_records = $row[0];

            //if records exist
            if(($total_records > 0) && ($start < $total_records)) 
            {
                if($ritm)
            {
                $query = "SELECT * FROM vw_lea_minhas_musicas WHERE ce_utilizador = $utilizador AND gnr_id = $ritm ORDER BY id ASC limit $start, $records_per_page";
            }else{
                $query = "SELECT uas.Id, uas.FK_Artista, uas.FK_Utilizador, a.nomeA, a.nomeV, a.dataNac, a.provincia, a.art_img_url,a.categoria_artista,a.ce_categoria_artista FROM tblusuario_artista_soufa uas JOIN vwartistas a ON a.artID = uas.FK_Artista WHERE uas.FK_Utilizador = $utilizador ORDER BY nomeA ASC limit $start, $records_per_page";
            }
            
            $result = mysqli_query($connection->myconn,$query);
            
            while($row = mysqli_fetch_object($result))
            {
                if($is_mobile) {
                        ?> <div class="col-xs-12 col-sm-12 col-md-12"> <?php
                    }else {
                        ?> <div class="col-xs-6 col-sm-4 col-md-3"> <?php
                    }
                    ?>
                        
						    <div class="thumbnail search-thumbnail">
						        <?php 
						            if($row->ce_categoria_artista == '1') { ?> <span class="search-promotion label label-danger arrowed-in arrowed-in-right"><?php print $row->categoria_artista; ?></span> <?php }
						            if($row->ce_categoria_artista == '2') { ?> <span class="search-promotion label label-success arrowed-in arrowed-in-right"><?php print $row->categoria_artista; ?></span> <?php }
						            if($row->ce_categoria_artista == '3') { ?> <span class="search-promotion label label-default arrowed-in arrowed-in-right"><?php print $row->categoria_artista; ?></span> <?php }
						            if($row->ce_categoria_artista == '4') { ?> <span class="search-promotion label label-success arrowed-in arrowed-in-right"><?php print $row->categoria_artista; ?></span> <?php }
						            if($row->ce_categoria_artista == '5') { ?> <span class="search-promotion label label-danger arrowed-in arrowed-in-right"><?php print $row->categoria_artista; ?></span> <?php }
						            if($row->ce_categoria_artista == '6') { ?> <span class="search-promotion label label-success arrowed-in arrowed-in-right"><?php print $row->categoria_artista; ?></span> <?php }
						            if($row->ce_categoria_artista == '7') { ?> <span class="search-promotion label label-danger arrowed-in arrowed-in-right"><?php print $row->categoria_artista; ?></span> <?php }
						            if($row->ce_categoria_artista == '8') { ?> <span class="search-promotion label label-success arrowed-in arrowed-in-right"><?php print $row->categoria_artista; ?></span> <?php }
						            if($row->ce_categoria_artista == '9') { ?> <span class="search-promotion label label-danger arrowed-in arrowed-in-right"><?php print $row->categoria_artista; ?></span> <?php }
						            if($row->ce_categoria_artista == '10') { ?> <span class="search-promotion label label-success arrowed-in arrowed-in-right"><?php print $row->categoria_artista; ?></span> <?php }
						            if($row->ce_categoria_artista == '11') { ?> <span class="search-promotion label label-danger arrowed-in arrowed-in-right"><?php print $row->categoria_artista; ?></span> <?php }
						            if($row->ce_categoria_artista == '12') { ?> <span class="search-promotion label label-success arrowed-in arrowed-in-right"><?php print $row->categoria_artista; ?></span> <?php }
						        ?>
						        <a href="http://lea.co.ao/artista.php?a=<?php print $utilidade->CodificadorEncripcao($row->FK_Artista);  ?>" class="blue"><img class="media-object" src="<?php print $row->art_img_url; ?>" /></a>
						        <div class="caption">
								    <div class="clearfix">
								        <span class="pull-right label label-grey info-label">
								            <b>
								                <?php
								                    if(!$row->nomeV) {
								                        print $row->provincia;
								                    }elseif(!$row->provincia){
								                        print $row->dataNac;    
								                    }elseif($row->nomeV){
								                        print $row->nomeV; 
								                    }else{
								                        print ""; 
								                    }
								                ?>
								            </b>
								        </span>
								        <div class="pull-left bigger-110">
										    <i class="ace-icon fa fa-star orange2"></i>
										    <i class="ace-icon fa fa-star orange2"></i>
										    <i class="ace-icon fa fa-star orange2"></i>
									        <i class="ace-icon fa fa-star-half-o orange2"></i>
										    <i class="ace-icon fa fa-star light-grey"></i>
								        </div>
								    </div>
								    <h3 class="search-title">
									    <span class="blue"><a href="http://lea.co.ao/artista.php?a=<?php print $utilidade->CodificadorEncripcao($row->FK_Artista);  ?>"><?php print $row->nomeA; ?></a></span>
									</h3>
							    </div>
					        </div>
			            </div>   
                    <?php
                }
                ?>
                    <div class="pagination flex-m flex-w p-r-50">
                        <?php
                            if($start >=$records_per_page){
                                print "<a href='" . $caminho . "?strt=" . ($start-$records_per_page )."' class='item-pagination flex-c-m trans-0-4 active-pagination'>««</a>";
                            }
                            if($start+$records_per_page < $total_records && $start >= 0){
                                print "<a href='". $caminho ."?strt=".($start+$records_per_page) ."' class='item-pagination flex-c-m trans-0-4'>»»</a>";
                            }
                        ?>
                    </div>
                <?php
            } else {
                print "<h4>Hoops! Não há conteúdo disponível para esta Categoria. Volte uma outra ocasião.</h4>";
            }
            $connection->close($connection->myconn);
        }
        //
        function ListaArtistasDoAmigo($utilizador)
        {
            $connection = new cnx();
            $connection->connect();
            $utilizador_ = base64_decode($utilizador);
            
            $query = "SELECT uas.Id, uas.FK_Artista, uas.FK_Utilizador, a.nomeA, a.nomeV, a.dataNac, a.provincia, a.art_img_url,a.categoria_artista,a.ce_categoria_artista FROM tblusuario_artista_soufa uas JOIN vwartistas a ON a.artID = uas.FK_Artista WHERE uas.FK_Utilizador = $utilizador_ limit 6";
            $result = mysqli_query($connection->myconn,$query);

            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_object($result))
                {
                    ?>
                        <div class="col-xs-3 col-sm-3 col-md-3" style="padding-left: 0px !important; padding-right: 8px !important;padding-bottom:0px;">
    					    <div class="thumbnail search-thumbnail" style="padding-bottom:0px;">
    						    <a href="https://lea.co.ao/artista.php?a=<?php print base64_encode($row->FK_Artista); ?>" class="blue">
    						        <img class="media-object" src="<?php if($row->capa === "" || $row->capa === null){ print $row->art_img_url; }else{ print $row->capa; } ; ?>" />
    						    </a>
    						    <!--<div class="caption" style"marigin">
    							    <h6 class="search-title"> <?php //print $row->nomeA; ?> </h6>
    						    </div>-->
    				        </div>
    			        </div> 
                    <?php
                }
            }else{
                ?> <p>Este utilizador não está seguindo nenhum artista angolano na Lea.co.ao. <a href="https://lea.co.ao/artistas/todos_artistas.php?strt=0&cat=0">Clica aqui para começar a seguir.</a></p> <?php
            }
            $connection->close($connection->myconn);
        }
        //
    }
?>