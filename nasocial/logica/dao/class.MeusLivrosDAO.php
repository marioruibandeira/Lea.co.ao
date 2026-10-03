<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UtilidadeDAO.php');
    include($_SERVER['DOCUMENT_ROOT'].'/logica/dao/class.LiteraturaDAO.php');
    
    class MeusLivrosDAO
    {
        function MeusLivros($ce_usuario,$is_mobile)
        {
            $connection = new cnx();
            $connection->connect();
            $utilidade = new UtilidadeDAO();
            $exemplar_ = new LiteraturaDAO();
            
            $id_ = $utilidade->Decodificar($ce_usuario);
            
            $query = "SELECT * FROM vw_meus_livros WHERE ce_usuario  = $id_ order by id_meus_livros desc";
            
            $result = mysqli_query($connection->myconn,$query);
            
            if(mysqli_num_rows($result) > 0)
            { 
                while($row = mysqli_fetch_object($result))
                {
                    ?>
                        <div class="media">
                            <div class="media-left">
                                <a target="_blank" href="https://lea.co.ao/literatura/exemplar.php?code=<?php print $utilidade->Codificar($row->ce_livro); ?>&artst=<?php  print $utilidade->Codificar($row->artID); ?>">
                                    <img style="border: 2px solid #ccc; border-radius: 20px;" class=" " width="<?php if($is_mobile){ print 8;}else{print 15;} ?>0" src="<?php print $row->capa_livro?>" alt="Lea.co.ao">
                                </a>
                            </div>
                            <div class="media-body" style="width:100%;padding-top:0px;">
                                <?php
                                    if($exemplar_->CaminhoLivro($utilidade->Codificar($row->ce_livro)) != '0')
                        	        { 
                            	        ?>
                                            <div style="float:right; padding: <?php if($is_mobile){ print 16;}else{print 60;} ?>px <?php if($is_mobile){ print 0;}else{print 4;} ?>0px 0px 0px; ">
                                                <a href="/literatura/livros/<?php print $row->caminho; ?>" target="_blank">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="<?php if($is_mobile) {print '34'; }else{ print '64'; } ?>" height="<?php if($is_mobile) {print '34'; }else{ print '64'; } ?>"><path d="M0 3.75A.75.75 0 0 1 .75 3h7.497c1.566 0 2.945.8 3.751 2.014A4.495 4.495 0 0 1 15.75 3h7.5a.75.75 0 0 1 .75.75v15.063a.752.752 0 0 1-.755.75l-7.682-.052a3 3 0 0 0-2.142.878l-.89.891a.75.75 0 0 1-1.061 0l-.902-.901a2.996 2.996 0 0 0-2.121-.879H.75a.75.75 0 0 1-.75-.75Zm12.75 15.232a4.503 4.503 0 0 1 2.823-.971l6.927.047V4.5h-6.75a3 3 0 0 0-3 3ZM11.247 7.497a3 3 0 0 0-3-2.997H1.5V18h6.947c1.018 0 2.006.346 2.803.98Z"></path></svg>
                                                </a>
                                            </div>
                                        <?php
                                    }
                            	?>
                                
                                <a target="_blank" href="https://lea.co.ao/literatura/exemplar.php?code=<?php print $utilidade->Codificar($row->ce_livro); ?>&artst=<?php  print $utilidade->Codificar($row->artID); ?>" style="color:#000;">
                                    <?php 
                                        if($is_mobile)
                                        {
                                            ?> <h5 <?php if($is_mobile){ print 'style="line-height: 25px; margin:6px 0px 0px 0px;  "';}else{print 5;} ?>  ><b><?php print $row->titulo?></b></h5> <?php
                                        }else{
                                            ?> <h3 <?php if($is_mobile){ print 'style="line-height: 25px; margin-top:6px;  "';}else{print 5;} ?>  ><b><?php print $row->titulo?></b></h3> <?php
                                        }
                                    ?>
                                    <p><?php print $row->nomeA?></p>
                                    <p <?php if($is_mobile){ print 'style="line-height: 0;"';}else{print 5;} ?>><b ><?php print $row->genero?> - <?php print $row->ano_pub_livro?></b></p>
                                </a>
                                <?php
                                    if(!$is_mobile){ ?>
                                    <a href="https://www.lea.co.ao/nasocial/logica/controller/MeusLivrosController.php?accao=0&id=<?php print $utilidade->Codificar($row->id_meus_livros); ?>" style="margin-right:6px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M16 1.75V3h5.25a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1 0-1.5H8V1.75C8 .784 8.784 0 9.75 0h4.5C15.216 0 16 .784 16 1.75Zm-6.5 0V3h5V1.75a.25.25 0 0 0-.25-.25h-4.5a.25.25 0 0 0-.25.25ZM4.997 6.178a.75.75 0 1 0-1.493.144L4.916 20.92a1.75 1.75 0 0 0 1.742 1.58h10.684a1.75 1.75 0 0 0 1.742-1.581l1.413-14.597a.75.75 0 0 0-1.494-.144l-1.412 14.596a.25.25 0 0 1-.249.226H6.658a.25.25 0 0 1-.249-.226L4.997 6.178Z"></path><path d="M9.206 7.501a.75.75 0 0 1 .793.705l.5 8.5A.75.75 0 1 1 9 16.794l-.5-8.5a.75.75 0 0 1 .705-.793Zm6.293.793A.75.75 0 1 0 14 8.206l-.5 8.5a.75.75 0 0 0 1.498.088l.5-8.5Z"></path></svg>
                                    <?php
                                        if($exemplar_->CaminhoLivro($utilidade->Codificar($row->ce_livro)) != '0') { 
                                	        ?> <a target="_blank" href="https://lea.co.ao/literatura/downloads.php?lvr=<?php print $utilidade->Codificar($row->ce_livro); ?>=&artst=<?php print $utilidade->Codificar($row->artID); ?>" style="margin-right:7px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M4.75 17.25a.75.75 0 0 1 .75.75v2.25c0 .138.112.25.25.25h12.5a.25.25 0 0 0 .25-.25V18a.75.75 0 0 1 1.5 0v2.25A1.75 1.75 0 0 1 18.25 22H5.75A1.75 1.75 0 0 1 4 20.25V18a.75.75 0 0 1 .75-.75Z"></path><path d="M5.22 9.97a.749.749 0 0 1 1.06 0l4.97 4.969V2.75a.75.75 0 0 1 1.5 0v12.189l4.97-4.969a.749.749 0 1 1 1.06 1.06l-6.25 6.25a.749.749 0 0 1-1.06 0l-6.25-6.25a.749.749 0 0 1 0-1.06Z"></path></svg></a><?php
                            	        }
                                	?>
                                    <a href="https://www.lea.co.ao/nasocial/logica/controller/MeusLivrosController.php?accao=1&id=<?php print $utilidade->Codificar($row->ce_livro); ?>&art=<?php print $utilidade->Codificar($row->artID); ?>&usr=<?php print $utilidade->Codificar($row->ce_usuario); ?>" style="margin-right:7px;"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"><path d="M0 0h24v24H0z" fill="none"/><path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92 1.61 0 2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92z"/></svg></a> 
                            	    <a href="https://www.lea.co.ao/nasocial/loja/livro-int.php?lvr=<?php print $utilidade->Codificar($row->ce_livro); ?>&novo=1&cat=2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="24" height="24"><path d="M1 7.775V2.75C1 1.784 1.784 1 2.75 1h5.025c.464 0 .91.184 1.238.513l6.25 6.25a1.75 1.75 0 0 1 0 2.474l-5.026 5.026a1.75 1.75 0 0 1-2.474 0l-6.25-6.25A1.752 1.752 0 0 1 1 7.775Zm1.5 0c0 .066.026.13.073.177l6.25 6.25a.25.25 0 0 0 .354 0l5.025-5.025a.25.25 0 0 0 0-.354l-6.25-6.25a.25.25 0 0 0-.177-.073H2.75a.25.25 0 0 0-.25.25ZM6 5a1 1 0 1 1 0 2 1 1 0 0 1 0-2Z"></path></svg></a>
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
                                        <a href="https://www.lea.co.ao/nasocial/logica/controller/MeusLivrosController.php?accao=0&id=<?php print $utilidade->Codificar($row->id_meus_livros); ?>" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span> Apagar </a>
                                        <?php
                                            if($exemplar_->CaminhoLivro($utilidade->Codificar($row->ce_livro)) != '0') { 
                                    	        ?> <a target="_blank" href="https://lea.co.ao/literatura/downloads.php?lvr=<?php print $utilidade->Codificar($row->ce_livro); ?>&artst=<?php print $utilidade->Codificar($row->artID); ?>" class="btn btn-default"><span class="glyphicon glyphicon-save"></span> Baixar</a><?php
                                	        }
                                    	?>
                                        <a href="https://www.lea.co.ao/nasocial/logica/controller/MeusLivrosController.php?accao=1&id=<?php print $utilidade->Codificar($row->ce_livro); ?>&art=<?php print $utilidade->Codificar($row->artID); ?>&usr=<?php print $utilidade->Codificar($row->ce_usuario); ?>" class="btn btn-default"><span class="glyphicon glyphicon-retweet"></span> Partilhar</a> 
                                        <a href="https://www.lea.co.ao/nasocial/loja/livro-int.php?lvr=<?php print $utilidade->Codificar($row->ce_livro); ?>&novo=1&cat=2" class="btn btn-default"><span class="glyphicon glyphicon-tag"></span> Vender</a>
                                    </div>
                                    <hr style="padding:0px 0px 0px 0px; margin:5px 0px 0px 0px;" />
                                <?php
                            }
                        ?>
                    <?php
                }
                
            }else{
                ?> <div class="alert alert-danger" role="alert"> Você ainda não tem livros, <a style='color:#900; font-weight:bolder;' href="/downloads/todos-livros.php?strt=0&acc=1">clica aqui</a> e depois recomenda um livro para aparecer aqui! </div> <?php                                                                                                 
            } 
        }
        
        function EliminarMeusLivros($id)
        {
            $connection = new cnx();
            $connection->connect();
            $utilidade = new UtilidadeDAO();
            
            $id_ = $utilidade->Decodificar($id);
            
            $sql = "DELETE FROM  tblmeus_livros WHERE id_meus_livros = $id_";
            mysqli_query($connection->myconn, $sql);
            mysqli_close($connection->myconn);
            
            return 0;
        }
    }
?>