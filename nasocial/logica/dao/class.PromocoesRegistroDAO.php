<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/conexao/cnx.php');
    //
    class PromocoesRegistroDAO
    {
        function ValidacaoDeExistenciaMusicaEmDestaque($fk_utilizado)
        {
            $connection = new cnx();
            $connection->connect();  
            $fk_utilizado_ = base64_decode($fk_utilizado);
            
            $query = "SELECT fk_utilizador FROM tblpromocoes_registro WHERE fk_utilizador = $fk_utilizado_";
            $result = mysqli_query($connection->myconn,$query);
            //
            if(mysqli_num_rows($result) > 0){
                while($row =  mysqli_fetch_object($result)){
                    return true;
                }
            }else{
                return false;
            }
            $connection->close($connection->myconn);
        }
        //
        function PerformanceDoServico($fk_utilizado)
        {
            $connection = new cnx();
            $connection->connect();  
            $fk_utilizado_ = base64_decode($fk_utilizado);
            
            $query = "SELECT * FROM vw_nas_promocoes_registro WHERE fk_utilizador = $fk_utilizado_";
            $result = mysqli_query($connection->myconn,$query);
            //
            if(mysqli_num_rows($result) > 0){
                while($row =  mysqli_fetch_object($result)){
                    ?>
                        <div class="infobox infobox-green">
                            <div class="infobox-icon"> <span class="material-icons"> approval </span> </div>
                            <div class="infobox-data">
                                <span class="infobox-data-number"><?php  print $row->impressoes;  ?></span>
                                <div class="infobox-content">Impressões</div>
                            </div>
                            <div class="stat stat-success"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M9.002 2.5a.75.75 0 01.691.464l6.302 15.305 2.56-6.301a.75.75 0 01.695-.468h4a.75.75 0 010 1.5h-3.495l-3.06 7.532a.75.75 0 01-1.389.004L8.997 5.21l-3.054 7.329A.75.75 0 015.25 13H.75a.75.75 0 010-1.5h4l3.558-8.538a.75.75 0 01.694-.462z"></path></svg></div>
                	    </div>
                	    
                	    <div class="infobox infobox-blue">
                	        <div class="infobox-icon"> <span class="material-icons"> tour </span> </div>
                	        <div class="infobox-data">
                	            <span class="infobox-data-number"><?php  print $row->visitas;  ?></span>
                	            <div class="infobox-content">Visitas</div>
                	        </div>
                	        <div class="badge badge-success"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M9.002 2.5a.75.75 0 01.691.464l6.302 15.305 2.56-6.301a.75.75 0 01.695-.468h4a.75.75 0 010 1.5h-3.495l-3.06 7.532a.75.75 0 01-1.389.004L8.997 5.21l-3.054 7.329A.75.75 0 015.25 13H.75a.75.75 0 010-1.5h4l3.558-8.538a.75.75 0 01.694-.462z"></path></svg> </div>
                        </div>
                        
                        <div class="infobox infobox-pink">
                		        <div class="infobox-icon"> <span class="material-icons"> play_arrow </span> </div>
                				<div class="infobox-data">
                				    <span class="infobox-data-number"><?php  print $this->ReproducoesDaMusicaNoServico($fk_utilizado); ?></span>
                				    <div class="infobox-content">Reproduções</div>
                				</div>
                				<div class="stat stat-important"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M9.002 2.5a.75.75 0 01.691.464l6.302 15.305 2.56-6.301a.75.75 0 01.695-.468h4a.75.75 0 010 1.5h-3.495l-3.06 7.532a.75.75 0 01-1.389.004L8.997 5.21l-3.054 7.329A.75.75 0 015.25 13H.75a.75.75 0 010-1.5h4l3.558-8.538a.75.75 0 01.694-.462z"></path></svg> </div>
                			</div>
                
                			<div class="infobox infobox-red">
                			    <div class="infobox-icon"> <span class="material-icons"> download </span> </div>
                			    <div class="infobox-data">
                			        <span class="infobox-data-number"><?php  print $row->n_x_baixada;  ?></span>
                			        <div class="infobox-content">Downloads</div>
                			    </div>
                			    <div class="stat "> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M9.002 2.5a.75.75 0 01.691.464l6.302 15.305 2.56-6.301a.75.75 0 01.695-.468h4a.75.75 0 010 1.5h-3.495l-3.06 7.532a.75.75 0 01-1.389.004L8.997 5.21l-3.054 7.329A.75.75 0 015.25 13H.75a.75.75 0 010-1.5h4l3.558-8.538a.75.75 0 01.694-.462z"></path></svg> </div>
                			</div>
                			
                			<div class="infobox infobox-orange2">
                			    <div class="infobox-icon"> <span class="material-icons"> groups </span> </div>
                			    <div class="infobox-data">
                			        <span class="infobox-data-number"><?php  print $row->seguidores; ?></span>
                				    <div class="infobox-content">Seguidores</div>
                				</div>
                			<div class="badge"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M9.002 2.5a.75.75 0 01.691.464l6.302 15.305 2.56-6.301a.75.75 0 01.695-.468h4a.75.75 0 010 1.5h-3.495l-3.06 7.532a.75.75 0 01-1.389.004L8.997 5.21l-3.054 7.329A.75.75 0 015.25 13H.75a.75.75 0 010-1.5h4l3.558-8.538a.75.75 0 01.694-.462z"></path></svg>  </div>
                		</div>
                    <?php 
                }
            }
            $connection->close($connection->myconn);
        }
        //
        function ReproducoesDaMusicaNoServico($fk_utilizado)
        {
            $connection = new cnx();
            $connection->connect();  
            $fk_utilizado_ = base64_decode($fk_utilizado);
            
            $query = "SELECT COUNT(mp.fk_musica) AS reproducoes, pr.fk_utilizador FROM `musicasMaisTocadas` mp JOIN tblpromocoes_registro pr on pr.fk_musicapromo = mp.fk_musica WHERE pr.fk_utilizador = $fk_utilizado_";
            $result = mysqli_query($connection->myconn,$query);
            //
            if(mysqli_num_rows($result) > 0){
                while($row =  mysqli_fetch_object($result)){
                    return $row->reproducoes;
                }
            }
            $connection->close($connection->myconn);
        }
        //
        function DetalhesDoServico($fk_utilizado)
        {
            $connection = new cnx();
            $connection->connect();  
            $fk_utilizado_ = base64_decode($fk_utilizado);
            
            $query = "SELECT * FROM vw_nas_promocoes_registro WHERE fk_utilizador = $fk_utilizado_";
            $result = mysqli_query($connection->myconn,$query);
            //
            if(mysqli_num_rows($result) > 0){
                while($row =  mysqli_fetch_object($result)){
                    ?>
                        <div class="form-group col-md-3"> <label for="inputEmail4">Responsável</label> <input type="text" class="form-control" Disabled value="<?php print $row->responsavel; ?>"> </div>
                        <div class="form-group col-md-3"> <label for="inputEmail4">Tipo de Serviço</label> <input type="text" class="form-control" Disabled value="<?php print $row->	promocoes_tipo_servicos; ?>"> </div>
                        <div class="form-group col-md-3"> <label for="inputPassword4">Serviço</label> <input type="text" class="form-control" Disabled value="<?php print $row->promocoes_servicos; ?>"> </div>
                        <div class="form-group col-md-3"> <label for="inputEmail4">Investimento</label> <input type="text" class="form-control" Disabled value="<?php print $row->preco; ?>"> </div>
                        <div class="form-group col-md-3"> <label for="inputEmail4">Artista</label> <input type="text" class="form-control" Disabled value="<?php print $row->nomeA; ?>"> </div>
                        <div class="form-group col-md-3"> <label for="inputEmail4">Música</label> <input type="text" class="form-control" Disabled value="<?php print $row->titulo; ?>"> </div>
                        <div class="form-group col-md-2"> <label for="inputEmail4">Data Início</label> <input type="text" class="form-control" Disabled value="<?php print $row->data_inicio; ?>"> </div>
                        <div class="form-group col-md-2"> <label for="inputPassword4">Data Fim</label> <input type="text" class="form-control" Disabled value="<?php print $row->data_fim; ?>"> </div>
                        <div class="form-group col-md-2"> <label for="inputPassword4">Dias Em Falta</label> <input type="text" class="form-control" Disabled value="<?php print $row->Dias_Faltas; ?>"> </div>
                        <div class="form-group col-md-6"> <label for="inputPassword4">Link da Música</label> <input type="text" class="form-control" value="<?php print $row->link_musica; ?>"> <a href="/discografia/musica-detail.php?som=<?php print base64_encode($row->fk_musicapromo); ?>"><span style="float:right;" class="material-icons"> links </span></a> </div>
                        <div class="form-group col-md-6"> <label for="inputPassword4">Link do Artista</label> <input type="text" class="form-control" value="<?php print $row->link_artista; ?>"> <a href="https://lea.co.ao/artista.php?a=<?php print base64_encode($row->fk_artista); ?>=="><span style="float:right;" class="material-icons"> links </span></a> </div>
                    <?php
                }
            }
            $connection->close($connection->myconn);
        }  
        //
        function BeneficiosDoServico($fk_utilizado)
        {
            $connection = new cnx();
            $connection->connect();  
            $fk_utilizado_ = base64_decode($fk_utilizado);
            
            $query = "SELECT promocoes_beneficio FROM `tblpromocoes_beneficios` pb JOIN tblpromocoes_servicos ps ON ps.id_promocoes_servicos = pb. fk_promocoes_servicos JOIN tblpromocoes_registro pr ON pr.fk_promocoes_servicos = ps.id_promocoes_servicos WHERE pr.fk_utilizador = $fk_utilizado_";
            $result = mysqli_query($connection->myconn,$query);
            //
            if(mysqli_num_rows($result) > 0){
                while($row =  mysqli_fetch_object($result)){
                    ?>
                        <tr>
                            <td>#</td>
						    <td> <?php print $row->promocoes_beneficio; ?> </td>
						</tr>
                    <?php
                }
            }
            $connection->close($connection->myconn);
        }
        //
        
    }
?>