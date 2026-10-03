<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/logica/Utilidade.php');
    
    class MinhaMusicaDAO
    {
        function ListarMinhaMusica($start,$utilizador_,$is_mobile,$ritm)
        {
            $utilidade = new Utilidade();
            
            $connection = new cnx(); 
            $connection->connect();

            $caminho = "/nasocial/view/mmusica/minha-musica.php";
            //number of page to be displayed per page
            $records_per_page = 20;
            $start = 0;
            $utilizador = base64_decode($utilizador_);

            //select and execute query to count records DATE_FORMAT(anoreg,'%d/%m/%Y')
            if($ritm)
            {
                $query = "SELECT COUNT(*) FROM vw_lea_minhas_musicas WHERE ce_utilizador = $utilizador AND gnr_id = $ritm";   
            }else{
                $query = "SELECT COUNT(*) FROM vw_lea_minhas_musicas WHERE ce_utilizador = $utilizador";
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
                $query = "SELECT * FROM vw_lea_minhas_musicas WHERE ce_utilizador = $utilizador ORDER BY id ASC limit $start, $records_per_page";
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
						            if($row->preco <= 0) { ?> <span class="search-promotion label label-danger arrowed-in arrowed-in-right">Música Grátis</span> <?php }
						            if($row->preco > 0) { ?> <span class="search-promotion label label-success arrowed-in arrowed-in-right">Música Paga</span> <?php }
						            if($row->capa != "") { 
						                ?> <a href="/downloads/m-downloads.php?som=<?php print Base64_encode($row->ce_servico); ?>" class="blue"> <img class="media-object" src="<?php print $row->capa; ?>" />  </a><?php 
						            }else { 
						                ?> <a href="/downloads/m-downloads.php?som=<?php print Base64_encode($row->ce_servico); ?>" class="blue"><img class="media-object" src="<?php print $row->art_img_url; ?>" /></a>  <?php 
						            }
						        ?>
						        <div class="caption">
								    <div class="clearfix">
								        <span class="pull-right label label-grey info-label"><a href="http://lea.co.ao/artista.php?a=<?php print $utilidade->CodificadorEncripcao($row->artID);  ?>"><b><?php print $row->nomeA; ?></b></a></span>
								        <div class="pull-left bigger-110">
										    <i class="ace-icon fa fa-star orange2"></i>
										    <i class="ace-icon fa fa-star orange2"></i>
										    <i class="ace-icon fa fa-star orange2"></i>
									        <i class="ace-icon fa fa-star-half-o orange2"></i>
										    <i class="ace-icon fa fa-star light-grey"></i>
								        </div>
								    </div>
								    <h3 class="search-title">
									    <span class="blue"><?php print $row->titulo; ?></span>
									</h3>
									<p><b>Genero : </b><?php print $row->genero; ?> - <b>Ano : </b><?php print $row->ano; ?></p>
									
									<div data-toggle="buttons" class="btn-group btn-overlap btn-corner">
									    <label class="btn btn-sm btn-white btn-info">
										    <?php print "<input type='checkbox' onChange=tocarMusica('" . $utilidade->CodificadorEncripcao($row->ce_servico) . "') />"; ?> Tocar
										    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-file-play" viewBox="0 0 16 16">
                                                <path d="M6 10.117V5.883a.5.5 0 0 1 .757-.429l3.528 2.117a.5.5 0 0 1 0 .858l-3.528 2.117a.5.5 0 0 1-.757-.43z"/>
                                                <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                                            </svg>
								        </label>
								        <label class="btn btn-sm btn-white btn-info">
										    <?php print "<input type='checkbox' onChange=baixarMusica('".$utilidade->CodificadorEncripcao($row->ce_servico)."','".$row->referencia."') />";?> Baixar
										    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                            </svg>
									    </label>
									    <label class="btn btn-sm btn-white btn-info">
										    <?php print "<input type='checkbox' onChange=apagarMusica('" . $utilidade->CodificadorEncripcao($row->id) . "') />"; ?> Apagar
										    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                            </svg>
									    </label>
								    </div>
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
        function MinhasMusicasGenero($utilizador){
            $connection = new cnx();
            $connection->connect();
            $utilizador_ = base64_decode($utilizador);
            
            $query = "SELECT  gnr_id,genero FROM vw_lea_minhas_musicas WHERE ce_utilizador = $utilizador_ GROUP BY genero";
            $result = mysqli_query($connection->myconn,$query);
            $i = 1;

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    ?> <option value="<?php print $row->gnr_id; ?>"><?php print $row->genero; ?></option> <?php 
                }
            }
            $connection->close($connection->myconn);
        }
        //
        function GeneroSelecionado($ritm){
            $connection = new cnx();
            $connection->connect();
            $utilizador_ = base64_decode($utilizador);
            
            $query = "SELECT  gnr_id,genero FROM generos WHERE gnr_id = $ritm ";
            $result = mysqli_query($connection->myconn,$query);
            $i = 1;

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    print $row->genero; 
                }
            }
            $connection->close($connection->myconn);
        }
        //
        function MinhasMusicasGeneroSelecionado($utilizador,$ritm){
            $connection = new cnx();
            $connection->connect();
            $utilizador_ = base64_decode($utilizador);
            
            $query = "SELECT  gnr_id,genero FROM vw_lea_minhas_musicas WHERE ce_utilizador = $utilizador_ ";
            $result = mysqli_query($connection->myconn,$query);
            $i = 1;

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    ?> <option value="<?php if($ritm == $row->gnr_id){ print $ritm; }else{ print $row->gnr_id; } ?>"><?php print $row->genero; ?></option> <?php 
                }
            }
            $connection->close($connection->myconn);
        }
        //
        function ApagarEncomendaMP3($encomenda)
        {
            $connection = new cnx();
            $connection->connect();
            $utilidade = new Utilidade();
            //
            //$encomenda_ = $utilidade->DecodificadorEncripcao($encomenda);
            $encomenda_ = base64_decode($encomenda);
            //
            $sqlQuery  =  "DELETE FROM encomendas WHERE id = ?";        
            $statement =  $connection->myconn->prepare($sqlQuery);
            $statement->bind_param("i", $encomenda_);
            $statement->execute();
            //
            $this->ApagarEncomendaLinhaMP3($encomenda);
            $connection->close($connection->myconn);
            return true;
        }
        //
        function ApagarEncomendaLinhaMP3($encomenda)
        {
            $connection = new cnx();
            $connection->connect();
            $utilidade = new Utilidade();
            //
            $encomenda_ = $utilidade->DecodificadorEncripcao($encomenda);
            //
            $sqlQuery  =  "DELETE FROM encomendas_linhas WHERE ce_encomenda = ?";        
            $statement =  $connection->myconn->prepare($sqlQuery);
            $statement->bind_param("i", $encomenda_);
            $statement->execute();
            //
            $connection->close($connection->myconn);
            return $result;
        }
        //
        function ListaMusicaDoAmigo($utilizador){
            $connection = new cnx();
            $connection->connect();
            $utilizador_ = base64_decode($utilizador);
            
            $query = "SELECT  titulo,capa,ce_utilizador,art_img_url FROM vw_lea_minhas_musicas WHERE ce_utilizador = $utilizador_ limit 6";
            $result = mysqli_query($connection->myconn,$query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    ?> 
                        <div class="col-xs-6 col-sm-4 col-md-2">
							<div class="thumbnail search-thumbnail">
								<img class="media-object" src="<?php if($row->capa === "" || $row->capa === null){ print $row->art_img_url; }else{ print $row->capa; } ; ?>" />
								<div class="caption">
									<h4 class="search-title">
									    <a href="#" class="blue"><?php print $row->titulo; ?></a>
									</h4>
								</div>
							</div>
						</div> 
                    <?php 
                }
            }else{
                ?> <p>As músicas adicionadas à sua playlist através da Lea também são refletidas aqui. <a href="https://lea.co.ao/discografia/musicas.php?strt=0&cat=MA==&check=0&opm=1">Clique aqui para começar a adicionar músicas à sua playlist</a></p> <?php
            }
            $connection->close($connection->myconn);
        }
    }
?>