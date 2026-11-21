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
            $query = "SELECT uas.Id, uas.FK_Artista, uas.FK_Utilizador, a.art_img_url,  a.nomeA, a.nomeV, a.dataNac, a.provincia FROM tblusuario_artista_soufa uas JOIN vwartistas a ON a.artID = uas.FK_Artista WHERE uas.FK_Utilizador = $id_";
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
                                <?php 
                                    if($row->fotoPerfil =='' || $row->fotoPerfil ==null)
                                    {
                                        ?> 
                                            <a onClick="/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->ce_amigo); ?>" style="cursor: pointer;">
                                                <img style="border: 2px solid #ccc; border-radius: 20px;" class=" " width="1<?php if($is_mobile){ print 0;}else{print 5;} ?>0" src="/nasocial/assets/images/avatars/avatar2.png" alt="Lea.co.ao">
                                            </a>
                                        <?php 
                                    }else{
                                        ?> 
                                            <a onClick="/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->ce_amigo); ?>" style="cursor: pointer;">
                                                <img style="border: 2px solid #ccc; border-radius: 20px;" class=" " width="1<?php if($is_mobile){ print 0;}else{print 5;} ?>0" src="<?php print $row->art_img_url; ?>" alt="Lea.co.ao">
                                            </a>
                                        <?php
                                    }
                                ?>
                                
                            </div>
                            <div class="media-body" style="width:100%;padding-top:0px;">
                                <div style="float:right; padding: <?php if($is_mobile){ print 16;}else{print 40;} ?>px <?php if($is_mobile){ print 0;}else{print 4;} ?>0px 0px 0px; ">
                                    <a href="/nasocial/usuario/chat.php?amg=<?php print base64_encode($row->ce_amigo); ?>&us=<?php print $id; ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="64" height="64"><path fill-rule="evenodd" d="M1.513 1.96a1.374 1.374 0 011.499-.21l19.335 9.215a1.146 1.146 0 010 2.07L3.012 22.25a1.374 1.374 0 01-1.947-1.46L2.49 12 1.065 3.21a1.374 1.374 0 01.448-1.25zm2.375 10.79l-1.304 8.042L21.031 12 2.584 3.208l1.304 8.042h7.362a.75.75 0 010 1.5H3.888z"></path></svg></a>
                                </div>
                                
                                    <h3 <?php if($is_mobile){ print 'style="line-height: 25px; margin-top:10px;"';}else{print 5;} ?>  ><a href="/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->ce_amigo); ?>" style="color:#000;"><b><?php print $row->nomeA;?></b></a></h3> 
                                    <p ><?php print "Amigos desde " . $row->data_amigo;?></p>
                                    <p <?php if($is_mobile){ print 'style="line-height: 0;"';}else{print 5;} ?>><?php print "Local " . "<b >".$row->provincia . "</b>"?></p>
                                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M1 12C1 5.925 5.925 1 12 1s11 4.925 11 11-4.925 11-11 11S1 18.075 1 12zm8.036-4.024a.75.75 0 00-1.06 1.06L10.939 12l-2.963 2.963a.75.75 0 101.06 1.06L12 13.06l2.963 2.964a.75.75 0 001.061-1.06L13.061 12l2.963-2.964a.75.75 0 10-1.06-1.06L12 10.939 9.036 7.976z"></path></svg></a>
                                    <a href="/nasocial/logica/controller/usuario/AceitarRejeitarAmizadeController.php?ce_amig=<?php print base64_encode($row->ce_amigo); ?>&ce_us=<?php print $id; ?>&orgn=dlt"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M16 1.75V3h5.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H8V1.75C8 .784 8.784 0 9.75 0h4.5C15.216 0 16 .784 16 1.75zm-6.5 0a.25.25 0 01.25-.25h4.5a.25.25 0 01.25.25V3h-5V1.75z"></path><path d="M4.997 6.178a.75.75 0 10-1.493.144L4.916 20.92a1.75 1.75 0 001.742 1.58h10.684a1.75 1.75 0 001.742-1.581l1.413-14.597a.75.75 0 00-1.494-.144l-1.412 14.596a.25.25 0 01-.249.226H6.658a.25.25 0 01-.249-.226L4.997 6.178z"></path><path d="M9.206 7.501a.75.75 0 01.793.705l.5 8.5A.75.75 0 119 16.794l-.5-8.5a.75.75 0 01.705-.793zm6.293.793A.75.75 0 1014 8.206l-.5 8.5a.75.75 0 001.498.088l.5-8.5z"></path></svg></a>
                                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M13 17.5a1 1 0 11-2 0 1 1 0 012 0zm-.25-8.25a.75.75 0 00-1.5 0v4.5a.75.75 0 001.5 0v-4.5z"></path><path fill-rule="evenodd" d="M9.836 3.244c.963-1.665 3.365-1.665 4.328 0l8.967 15.504c.963 1.667-.24 3.752-2.165 3.752H3.034c-1.926 0-3.128-2.085-2.165-3.752L9.836 3.244zm3.03.751a1 1 0 00-1.732 0L2.168 19.499A1 1 0 003.034 21h17.932a1 1 0 00.866-1.5L12.866 3.994z"></path></svg></a>
                                
                            </div>
                        </div>
                        <hr/>
                    <?php
                }
            }else{
                ?> <div class="alert alert-danger" role="alert"> Você ainda não tem músicas, <a style='color:#900; font-weight:bolder;' href="/discografia/musicas.php?strt=0&cat=MA==&check=0&opm=1">clica aqui para começar a baixar grátis!</a> </div> <?php                                                                                                 
            }   
        }
    }
?>