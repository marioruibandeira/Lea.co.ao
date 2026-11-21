<?php
    //
    include_once($_SERVER['DOCUMENT_ROOT'].'/conexao/cnx.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UtilidadeDAO.php');
    //
    class ComponentesDetalhesPerfilDAO
    {
        function ArtistasQueEuSigo($id,$is_mobile)
        {
            $connection = new cnx();
            $connection->connect();
            //
            $id_ = base64_decode($id);
            //
            $query = "SELECT uas.Id, uas.FK_Artista, uas.FK_Utilizador, a.prof, a.art_img_url, a.nomeA, a.artID, a.nomeV, a.dataNac, a.provincia FROM tblusuario_artista_soufa uas JOIN vwartistas a ON a.artID = uas.FK_Artista WHERE uas.FK_Utilizador = $id_ ORDER BY a.nomeA DESC";
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
                                <a onClick="#" style="cursor: pointer;">
                                    <div style="background-image:url('<?php print $row->art_img_url; ?>'); border: 2px solid #ccc;width: 100px;height:100px;border-radius: 20px;background-repeat: no-repeat;background-size: cover;background-position: center;"></div>
                                </a>
                            </div>
                            <div class="media-body" style="width:100%;padding-top:10px;">
                                <div style="float:right; padding: <?php if($is_mobile){ print 16;}else{print 40;} ?>px <?php if($is_mobile){ print 0;}else{print 4;} ?>0px 0px 0px; ">
                                    <a href="/artista.php?a=<?php print base64_encode($row->artID); ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="44" height="44"><path d="M14.78 3.653a3.936 3.936 0 1 1 5.567 5.567l-3.627 3.627a3.936 3.936 0 0 1-5.88-.353.75.75 0 0 0-1.18.928 5.436 5.436 0 0 0 8.12.486l3.628-3.628a5.436 5.436 0 1 0-7.688-7.688l-3 3a.75.75 0 0 0 1.06 1.061l3-3Z"></path><path d="M7.28 11.153a3.936 3.936 0 0 1 5.88.353.75.75 0 0 0 1.18-.928 5.436 5.436 0 0 0-8.12-.486L2.592 13.72a5.436 5.436 0 1 0 7.688 7.688l3-3a.75.75 0 1 0-1.06-1.06l-3 3a3.936 3.936 0 0 1-5.567-5.568l3.627-3.627Z"></path></svg></a>
                                </div>
                                
                                <h3 <?php if($is_mobile){ print 'style="line-height: 25px; margin-top:2px;"';}else{print 'style="margin-top:0px;"';} ?>  ><a href="#" style="color:#000;"><b><?php print $row->nomeA;?></b></a></h3> 
                                <p style="line-height: 5px;"><?php print "Categoria: " . "<b >".$row->prof . "</b>";?></p>
                                <p <?php if($is_mobile){ print 'style="line-height: 0;"';}else{print 5;} ?>><?php print "Naturalidade: " . "<b >".$row->provincia . "</b>"?></p>
                                <?php
                                    if(!is_mobile())
                                    {
                                        ?>  
                                            <a href="https://lea.co.ao/nasocial/logica/controller/ArtistaQueSigoController.php?accao=0&id=<?php print base64_encode($row->Id); ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M16 1.75V3h5.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H8V1.75C8 .784 8.784 0 9.75 0h4.5C15.216 0 16 .784 16 1.75zm-6.5 0a.25.25 0 01.25-.25h4.5a.25.25 0 01.25.25V3h-5V1.75z"></path><path d="M4.997 6.178a.75.75 0 10-1.493.144L4.916 20.92a1.75 1.75 0 001.742 1.58h10.684a1.75 1.75 0 001.742-1.581l1.413-14.597a.75.75 0 00-1.494-.144l-1.412 14.596a.25.25 0 01-.249.226H6.658a.25.25 0 01-.249-.226L4.997 6.178z"></path><path d="M9.206 7.501a.75.75 0 01.793.705l.5 8.5A.75.75 0 119 16.794l-.5-8.5a.75.75 0 01.705-.793zm6.293.793A.75.75 0 1014 8.206l-.5 8.5a.75.75 0 001.498.088l.5-8.5z"></path></svg></a>
                                            <a href="https://lea.co.ao/nasocial/logica/controller/ArtistaQueSigoController.php?accao=1&id=<?php print base64_encode($row->Id); ?>&art=<?php print base64_encode($row->FK_Artista); ?>&usr=<?php print base64_encode($row->FK_Utilizador); ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M20 5.5a3.498 3.498 0 0 1-6.062 2.385l-5.112 3.021a3.498 3.498 0 0 1 0 2.188l5.112 3.021a3.5 3.5 0 1 1-.764 1.29l-5.112-3.02a3.499 3.499 0 1 1-3.843-5.642 3.499 3.499 0 0 1 3.843.872l5.112-3.021A3.5 3.5 0 1 1 20 5.5Zm-1.5 13a2 2 0 1 0-3.999-.001 2 2 0 0 0 3.999.001Zm0-13a2 2 0 1 0-3.999-.001A2 2 0 0 0 18.5 5.5ZM5.5 14a2 2 0 1 0 .001-3.999A2 2 0 0 0 5.5 14Z"></path></svg></a>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <?php 
                            if(is_mobile())
                            { 
                                ?>
                                    <hr style="padding:5px 0px 0px 0px; margin:10px 0px 0px 0px;" />
                                    <div class="btn-group btn-group-justified btn-group-xs">
                                        <a href="https://lea.co.ao/nasocial/logica/controller/ArtistaQueSigoController.php?accao=0&id=<?php print base64_encode($row->Id); ?>" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span> Apagar </a>
                                        <a href="https://lea.co.ao/nasocial/logica/controller/ArtistaQueSigoController.php?accao=1&id=<?php print base64_encode($row->Id); ?>&art=<?php print base64_encode($row->FK_Artista); ?>&usr=<?php print base64_encode($row->FK_Utilizador); ?>" class="btn btn-default"><span class="glyphicon glyphicon-retweet"></span> Partilhar</a>
                                    </div>
                                    <hr style="padding:0px 0px 0px 0px; margin:5px 0px 0px 0px;" />
                                <?php
                            }
                            
                    if(!is_mobile()){ print "<hr/>";}
                }
            }else{
                ?> <div class="alert alert-danger" role="alert"> Você ainda não começou a seguir nenhum artista, <a style='color:#900; font-weight:bolder;' href="https://lea.co.ao/artistas/todos_artistas.php?strt=0">clica aqui para começar a seguir!</a> </div> <?php                                                                                                 
            }   
        }
        
        function EliminarSouFa($id)
        {
            $connection = new cnx();
            $connection->connect();
            $utilidade = new UtilidadeDAO();
            
            $id_ = $utilidade->Decodificar($id);
            
            $sql = "DELETE FROM tblusuario_artista_soufa WHERE Id = $id_";
            mysqli_query($connection->myconn, $sql);
            mysqli_close($connection->myconn);
            
            return 0;
            //echo("<script>console.log('PHP: Eliminar com $user_id_ e $art_id_');</script>");
        }
    }
?>