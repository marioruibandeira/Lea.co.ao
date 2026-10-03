<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UtilidadeDAO.php');
    class MinhasMusicasDAO
    {
        function MinhasMusicas($ce_usuario,$is_mobile)
        {
            $connection = new cnx();
            $connection->connect();
            $utilidade = new UtilidadeDAO();
            //
            $id_ = base64_decode($ce_usuario);
            //
            $query = "SELECT * FROM vw_nas_minhas_musicas WHERE user_id  = $id_ order by id_minhas_musicas desc";
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
                                <a href="#"> <img style="border: 2px solid #ccc; border-radius: 20px;" class=" " width="<?php if($is_mobile){ print 8;}else{print 15;} ?>0" src="<?php print $row->	capa?>" alt="Lea.co.ao"> </a>
                            </div>
                            <div class="media-body" style="width:100%;padding-top:0px;">
                                
                                <a href="#" style="color:#000;">
                                    <?php 
                                        if($is_mobile)
                                        {
                                            ?> <h5 <?php if($is_mobile){ print 'style="line-height: 25px; margin:4px 0px 0px 0px;  "';}else{print 5;} ?>  ><b><?php print $row->titulo?></b></h5> <?php
                                        }else{
                                            ?> <h3 <?php if($is_mobile){ print 'style="line-height: 25px; margin-top:4px;  "';}else{print 5;} ?>  ><b><?php print $row->titulo?></b></h3> <?php
                                        }
                                    ?>
                                    <p><?php print $row->nomeA?></p>
                                    <p <?php if($is_mobile){ print 'style="line-height: 0;"';}else{print 5;} ?>><b ><?php print $row->genero?> - <?php print $row->ano?></b></p>
                                </a>
                            </div>
                        </div>
                        <hr style="padding:5px 0px 0px 0px; margin:10px 0px 0px 0px;" />
                        <div class="btn-group btn-group-justified btn-group-xs">
                            <a href="https://lea.co.ao/nasocial/logica/controller/MinhasMusicasController.php?id=<?php print $utilidade->Codificar($row->id_minhas_musicas); ?>&accao=0" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span> Apagar </a>
                            <a href="https://lea.co.ao/downloads/downloads.php?som=<?php print base64_encode($row->ce_musica); ?>" class="btn btn-default"><span class="glyphicon glyphicon-save"></span> Baixar</a>
                            <a href="https://lea.co.ao/nasocial/logica/controller/MinhasMusicasController.php?som=<?php print $utilidade->Codificar($row->ce_musica); ?>&accao=1&art=<?php print $utilidade->Codificar($row->artID); ?>&usr=<?php print $utilidade->Codificar($row->user_id); ?>" class="btn btn-default"><span class="glyphicon glyphicon-retweet"></span> Partilhar</a>
                            <a href="https://lea.co.ao/discografia/musica-detail.php?som=<?php print base64_encode($row->ce_musica); ?>&ori=naso" class="btn btn-default"><span class="glyphicon glyphicon-play-circle"></span> Ouvir</a>
                        </div>
                        <hr style="padding:0px 0px 0px 0px; margin:5px 0px 0px 0px;" />
                    <?php
                }
                
            }else{
                ?> <div class="alert alert-danger" role="alert"> Você ainda não tem músicas, <a style='color:#900; font-weight:bolder;' href="/discografia/musicas.php?strt=0&cat=MA==&check=0&opm=1">clica aqui para começar a baixar grátis!</a> </div> <?php                                                                                                 
            } 
            
        }
        
        function EliminarMusicaNasocial($id)
        {
            $connection = new cnx();
            $connection->connect();
            $utilidade = new UtilidadeDAO();
            
            $id_ = $utilidade->Decodificar($id);
            
            $sql = "DELETE FROM tblminhas_musicas_playlist WHERE id_minhas_musicas = $id_";
            mysqli_query($connection->myconn, $sql);
            mysqli_close($connection->myconn);
            
            return 0;
        }
    }
?>