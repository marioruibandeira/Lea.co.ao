<?php
    //include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.DiscografiaDAO.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UtilidadeDAO.php');
    class DiscografiaDAO
    {
        function MinhaDicografia($ce_usuario,$is_mobile)
        {
            $connection = new cnx();
            $connection->connect();
            $utilidade = new UtilidadeDAO();
            
            $id_ = $utilidade->Decodificar($ce_usuario);
            //
            $query = "SELECT * FROM vw_meus_discos WHERE ce_usuario  = $id_ order by id_meus_discos desc";
            //
            $result = mysqli_query($connection->myconn,$query);
            //
            if(mysqli_num_rows($result) > 0)
            { 
                while($row = mysqli_fetch_object($result))
                {
                    ?>
                        <div class="media">
                            <div class="media-left">
                                <a href="https://lea.co.ao/discografia/produto-detail.php?dsc=<?php print $utilidade->Decodificar($row->ce_disco); ?>">
                                    <img style="border: 2px solid #ccc; border-radius: 20px;" class=" " width="<?php if($is_mobile){ print 8;}else{print 15;} ?>0" src="<?php print $row->d_capa?>" alt="Lea.co.ao">
                                </a>
                            </div>
                            <div class="media-body" style="width:100%;padding-top:0px;">
                                <div style="float:right; padding: <?php if($is_mobile){ print 16;}else{print 60;} ?>px <?php if($is_mobile){ print 0;}else{print 4;} ?>0px 0px 0px; ">
                                     <?php
                                        if($row->caminho !='' && !$is_mobile){ 
                                            ?><a href="<?php print $row->caminho?>" target="_blank">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="<?php if($is_mobile) {print '34'; }else{ print '64'; } ?>" height="<?php if($is_mobile) {print '34'; }else{ print '64'; } ?>"><path d="M4.75 17.25a.75.75 0 0 1 .75.75v2.25c0 .138.112.25.25.25h12.5a.25.25 0 0 0 .25-.25V18a.75.75 0 0 1 1.5 0v2.25A1.75 1.75 0 0 1 18.25 22H5.75A1.75 1.75 0 0 1 4 20.25V18a.75.75 0 0 1 .75-.75Z"></path><path d="M5.22 9.97a.749.749 0 0 1 1.06 0l4.97 4.969V2.75a.75.75 0 0 1 1.5 0v12.189l4.97-4.969a.749.749 0 1 1 1.06 1.06l-6.25 6.25a.749.749 0 0 1-1.06 0l-6.25-6.25a.749.749 0 0 1 0-1.06Z"></path></svg>
                                            </a> <?php  
                                        } 
                                    ?>
                                </div>
                                <a href="https://lea.co.ao/discografia/produto-detail.php?dsc=<?php print $utilidade->Decodificar($row->ce_disco); ?>" style="color:#000;">
                                    <?php 
                                        if($is_mobile)
                                        {
                                            ?> <h5 <?php if($is_mobile){ print 'style="line-height: 25px; margin:6px 0px 0px 0px;  "';}else{print 5;} ?>  ><b><?php print $row->d_nome?></b></h5> <?php
                                        }else{
                                            ?> <h3 <?php if($is_mobile){ print 'style="line-height: 25px; margin-top:6px;  "';}else{print 5;} ?>  ><b><?php print $row->d_nome?></b></h3> <?php
                                        }
                                    ?>
                                </a>
                                <p  style ="margin-bottom:0px;" ><b><?php print $row->nomeA?></b></p>
                                <p style ="font-size:10px;" <?php if($is_mobile){ print 'style="line-height: 0;"';}else{print 5;} ?>><?php print $row->genero?> - <?php print $row->d_ano?></p>
                                
                                <?php
                                    if(!$is_mobile)
                                    { 
                                        ?> 
                                            <a href="https://www.lea.co.ao/nasocial/logica/controller/MinhaDiscografiaController.php?id=<?php print $utilidade->Codificar($row->id_meus_discos); ?>&accao=0&dsc=<?php print $utilidade->Codificar($row->ce_disco); ?>&art=<?php print $utilidade->Codificar($row->artID); ?>" style="margin-right:5px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M16 1.75V3h5.25a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1 0-1.5H8V1.75C8 .784 8.784 0 9.75 0h4.5C15.216 0 16 .784 16 1.75Zm-6.5 0V3h5V1.75a.25.25 0 0 0-.25-.25h-4.5a.25.25 0 0 0-.25.25ZM4.997 6.178a.75.75 0 1 0-1.493.144L4.916 20.92a1.75 1.75 0 0 0 1.742 1.58h10.684a1.75 1.75 0 0 0 1.742-1.581l1.413-14.597a.75.75 0 0 0-1.494-.144l-1.412 14.596a.25.25 0 0 1-.249.226H6.658a.25.25 0 0 1-.249-.226L4.997 6.178Z"></path><path d="M9.206 7.501a.75.75 0 0 1 .793.705l.5 8.5A.75.75 0 1 1 9 16.794l-.5-8.5a.75.75 0 0 1 .705-.793Zm6.293.793A.75.75 0 1 0 14 8.206l-.5 8.5a.75.75 0 0 0 1.498.088l.5-8.5Z"></path></svg></a>
                                            <a href="https://www.lea.co.ao/nasocial/logica/controller/MinhaDiscografiaController.php?accao=1&dsc=<?php print $utilidade->Codificar($row->ce_disco); ?>&art=<?php print $utilidade->Codificar($row->artID); ?>&usr=<?php print $utilidade->Codificar($row->ce_usuario); ?>" style="margin-right:5px;"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" ><path d="M0 0h24v24H0z" fill="none"/><path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92 1.61 0 2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92z"/></svg></a>
                                            <a href="https://www.lea.co.ao/nasocial/loja/discografia.php?disco=<?php print $utilidade->Codificar($row->ce_disco); ?>&novo=1&acao=2&cat=3" style="margin-right:5px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="24" height="24"><path d="M1 7.775V2.75C1 1.784 1.784 1 2.75 1h5.025c.464 0 .91.184 1.238.513l6.25 6.25a1.75 1.75 0 0 1 0 2.474l-5.026 5.026a1.75 1.75 0 0 1-2.474 0l-6.25-6.25A1.752 1.752 0 0 1 1 7.775Zm1.5 0c0 .066.026.13.073.177l6.25 6.25a.25.25 0 0 0 .354 0l5.025-5.025a.25.25 0 0 0 0-.354l-6.25-6.25a.25.25 0 0 0-.177-.073H2.75a.25.25 0 0 0-.25.25ZM6 5a1 1 0 1 1 0 2 1 1 0 0 1 0-2Z"></path></svg></a>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                        if(!$is_mobile) {print "<hr/>"; }
                            if($is_mobile)
                            { 
                                ?>
                                    <hr style="padding:5px 0px 0px 0px; margin:10px 0px 0px 0px;" />
                                    <div class="btn-group btn-group-justified btn-group-xs">
                                        <a href="https://www.lea.co.ao/nasocial/logica/controller/MinhaDiscografiaController.php?id=<?php print $utilidade->Codificar($row->id_meus_discos); ?>&accao=0&dsc=<?php print $utilidade->Codificar($row->ce_disco); ?>&art=<?php print $utilidade->Codificar($row->artID); ?>" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span> Apagar </a>
                                        <?php if($row->caminho !=''){ ?> <a href="<?php print $row->caminho; ?>" class="btn btn-default" target="_blank"><span class="glyphicon glyphicon-save"></span> Baixar</a><?php } ?>
                                        <a href="https://www.lea.co.ao/nasocial/logica/controller/MinhaDiscografiaController.php?accao=1&dsc=<?php print $utilidade->Codificar($row->ce_disco); ?>&art=<?php print $utilidade->Codificar($row->artID); ?>&usr=<?php print $utilidade->Codificar($row->ce_usuario); ?>" class="btn btn-default"><span class="glyphicon glyphicon-retweet"></span> Partilhar</a>
                                        <a href="https://www.lea.co.ao/nasocial/loja/discografia.php?disco=<?php print $utilidade->Codificar($row->ce_disco); ?>&novo=1&acao=2&cat=3" class="btn btn-default"><span class="glyphicon glyphicon-tag"></span> Vender</a>
                                    </div>
                                    <hr style="padding:0px 0px 0px 0px; margin:5px 0px 0px 0px;" />
                                <?php
                            }
                        ?>
                    <?php
                }
                
            }else{
                ?> <div class="alert alert-danger" role="alert"> Você ainda não tem nenhuma obra discografica listada, <a style='color:#900; font-weight:bolder;' href="https://lea.co.ao/discografia/discografia_.php?strt=0">clica aqui para recomendares uma ou duas!</a> </div> <?php                                                                                                 
            } 
            
        }
        //
        function DiscoPorVenderId($disco){
            $connection = new cnx();
            $connection->connect();
            //$agnd_ = base64_decode($agnd);
            
            $query = "SELECT id,data_evento FROM agenda where id = $disco";
            $result = mysqli_query($connection->myconn,$query);
            //if records present
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    return $row->id;
                }
            }
        }
        //
       function listarDiscosPorVender($ce_usuario,$start,$u_e) 
       {
            $connection = new cnx(); 
            $connection->connect();
            $ce_usuario_ = base64_decode($ce_usuario);
            
            $query = "SELECT  * FROM vwproduto_em_estoque where ce_usuario = $ce_usuario_";
            $result = mysqli_query($connection->myconn,$query);
            
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){  
                    ?>
                        <tr>
                            <td><a href="https://lea.co.ao/discografia/produto-detail.php?dsc=<?php print base64_encode($row->ce_disco); ?>" target="_blank"><?php print $row->d_nome; ?></a></td>
                            <td><?php print $row->qtd_p_emestoque; ?></td>
                            <td><?php print $row->preco_emestoque; ?></td>
                            <td><?php print ($row->qtd_p_emestoque * $row->preco_emestoque); ?></td>
                            <td style="text-align:right;width:52px;">
                                <a href="https://www.lea.co.ao/nasocial/loja/carrinho.php?pro=<?php print base64_encode($row->ce_disco); ?>&us=<?php print $ce_usuario; ?>&cat=3&id=<?php print $row->id_produto_em_estoque; ?>" style="margin-right:5px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                <!--<a href="https://www.lea.co.ao/nasocial/logica/controller/GerirProdutoServicoController.php?id_ps=<?php //print $row->id_produto_em_estoque; ?>&accao=0" style="color:red;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>-->
                            </td>
                        </tr>
                    <?php
                }
            }
        }
        function ContarDiscosPorVender($ce_usuario) {
            $connection = new cnx(); 
            $connection->connect();
            $ce_usuario_ = base64_decode($ce_usuario);
            
            $query = "SELECT  COUNT(ce_usuario) AS TotalDiscos FROM vwproduto_em_estoque where ce_usuario = $ce_usuario_";
            $result = mysqli_query($connection->myconn,$query);
            
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    return $row->TotalDiscos;
                }
            }else{ return 0;}
        }
        //
        function ProdutoPegado($dsc){
            $connection = new cnx();
            $connection->connect();
            $dsc_f = base64_decode($dsc);
            
            $query = 'SELECT d_nome,d_ID FROM discos WHERE d_ID ="'.$dsc_f.'" LIMIT 0 , 1';
            $result = mysqli_query($connection->myconn,$query);
            //if records present
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    return strtoupper($row->d_nome);
                }
            }
        }
        //
        function FormatosDDiscos(){
    	    $connection = new cnx();
            $connection->connect();
                	
            $query = 'SELECT id_formato_produto,formato_produto FROM tblformato_produto';
            $result = mysqli_query($connection->myconn,$query);
    			
            if(mysqli_num_rows($result) > 0){
                while($row =  mysqli_fetch_object($result)){
                    ?> <option value="<?php print $row->id_formato_produto;?>"><?php print strtoupper($row->formato_produto);?></option> <?php
                }
            }else{
                print "Este aluno não existe no sistema!";				
            }
        }
        //
        function DiscoParaDownload($disco){
            $connection = new cnx();
            $connection->connect();
            $disco_ = base64_decode($disco);
            $query = "SELECT Id_EstadoCliente FROM discos WHERE d_ID = $disco_";
            $result = mysqli_query($connection->myconn,$query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    return $row->Id_EstadoCliente;
                }
            }
            $connection->close($connection->myconn);
        }
        
        function EliminarMinhaDiscografia($id)
        {
            $connection = new cnx();
            $connection->connect();
            $utilidade = new UtilidadeDAO();
            
            $id_ = $utilidade->Decodificar($id);
            
            $sql = "DELETE FROM  tblmeus_discos WHERE id_meus_discos = $id_";
            mysqli_query($connection->myconn, $sql);
            mysqli_close($connection->myconn);
            
            return 0;
        }
        
        function tituloDisco($dsc){
            $connection = new cnx();
            $connection->connect();
            $disco = base64_decode($dsc);
            $query = "SELECT * FROM vwdiscografia where d_ID = $disco";
            $result = mysqli_query($connection->myconn,$query);
            //if records present
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    return $row->d_nome;
                }
            }
        }
        
        function capaFrenteDisco($dsc){
            $connection = new cnx();
            $connection->connect();
            $disco = base64_decode($dsc);
            $query = "SELECT * FROM vwdiscografia where d_ID = $disco";
            $result = mysqli_query($connection->myconn,$query);
            //if records present
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    return $row->d_capa;
                }
            }
        }
        
        function EliminarObraDiscografica($param) 
        {
            $connection = new cnx();
            $connection->connect();
            
            $sqlQuery  =  "DELETE FROM tblproduto_em_estoque WHERE id_produto_em_estoque = ? ";
            
            $statement =  $connection->myconn->prepare($sqlQuery);
            $statement->bind_param("i", $param);
            $statement->execute();
            $statement->close();
            
            return $statement;        	
        }
        
        function TotalObrasDiscografiaPorVender($ce_usuario)
        {
            $connection = new cnx();
            $connection->connect();
            $ce_usuario_ = base64_decode($ce_usuario);
            
            $query = "SELECT sum(qtd_p_emestoque * preco_emestoque) as total_discos FROM `tblproduto_em_estoque` WHERE ce_usuario = $ce_usuario_";
            $result = mysqli_query($connection->myconn,$query);
            //if records present
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    return $row->total_discos;
                }
            }else{
                return 0;
            }
        }
    }
?>