<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/conexao/cnx.php');
    class ColecoesDAO {
        public function ColecaoArtistasCurtidos(){
            $connection = new cnx();
            $connection->connect();
            $id_p = base64_decode($id_p_);
            $query = "SELECT uas.Id, uas.FK_Artista, uas.FK_Utilizador, a.art_img_url, a.nomeA FROM `tblusuario_artista_soufa` uas JOIN artistas a on a.artID = uas.FK_Artista WHERE FK_Utilizador =  21 ";
            $result = mysqli_query($connection->myconn,$query);
            //if records present
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    ?>
                        <li>
                            <div>
												<img width="150" height="150" alt="150x150" src="<?php print $row->art_img_url; ?>" />
												<div class="text">
													<div class="inner">
														<span><?php print $row->nomeA; ?></span>

														<br />
														<a href="#" data-rel="colorbox">
															<i class="ace-icon fa fa-search-plus"></i>
														</a>

														<a href="http://www.lea.co.ao/artista.php?a=<?php print base64_encode($row->FK_Artista); ?>">
															<i class="ace-icon fa fa-user"></i>
														</a>

														<!--<a href="#">
															<i class="ace-icon fa fa-share"></i>
														</a>-->
													</div>
												</div>
											</div>
						</li>
					<?php 
                }
    	    } 
        }
        //
        
    }
?>