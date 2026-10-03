<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/header.php'); 
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.MinhasMusicasDAO.php'); 
    $m_musicas = new MinhasMusicasDAO();
    
    $inicio = $_GET['strt'];
    if($inicio == null || $inicio == ''){
        $inicio = 0;    
    }
    $origem = 0;
    //print "inicio" . $inicio;
    $dlt = $_GET['dlt'];
    $prtl = $_GET['prtl'];
?>
<style>
    .main-li{background-color:#fff;border:#fff 1px solid;border-radius:50px;}
    .icons-tag{font-weight:bolder;font-size:16px;color:#222843;padding-right: 10px;}
    .main-li:hover {background-color: #ccc; border:#fff 1px solid;border-radius:50px;cursor: pointer;}
    .txt-meuno{color:#222843;font-weight:bolder;font-size:16px;padding-top:20px;}
</style>
                        <!-- /.page-header http://unicode.org/emoji/charts/full-emoji-list.html https://freek.dev/376-using-emoji-in-php-->
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <?php 
                                    if(is_mobile()) 
                                    {
                                        ?> 
                                            <div class="row">
                                                <div class="col-xs-8 col-md-8" style="text-align:left;"> <H3> <b>Minhas Músicas</b> </H3> </div>
                                                <div class="col-xs-4 col-md-4" style="text-align:right;padding-top:12px;"><a href="https://lea.co.ao/discografia/musicas.php?strt=0&cat=MA==&check=1&opm=1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40"><path d="M12.75 7.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z"></path><path d="M12 1c6.075 0 11 4.925 11 11s-4.925 11-11 11S1 18.075 1 12 5.925 1 12 1ZM2.5 12a9.5 9.5 0 0 0 9.5 9.5 9.5 9.5 0 0 0 9.5-9.5A9.5 9.5 0 0 0 12 2.5 9.5 9.5 0 0 0 2.5 12Z"></path></svg></a></div>
                                            </div>
                                            <hr style="margin-top:8px;"/>
                                            <?php 
                                                if($prtl == 2)
                                                {
                                                    ?>
                                                        <div class="btn-group btn-group-justified btn-group-xs">
                                                            <div class="btn btn-success" style="width:100%;"><span class="glyphicon glyphicon-retweet" style="margin-right:10px;"></span> Perfil partilhado com sucesso.</div>
                                                        </div>
                                                        <hr style="margin-top:22px;"/>
                                                        <?php 
                                                    }
                                                if($dlt == 1)
                                                {
                                                    ?>
                                                        <div class="btn-group btn-group-justified btn-group-xs">
                                                            <div class="btn btn-danger" style="width:100%;"><span class="glyphicon glyphicon-trash" style="margin-right:10px;"></span> Artista eliminado com sucesso.</div>
                                                        </div>
                                                        <hr style="margin-top:22px;"/>
                                                    <?php 
                                                }
                                            ?>
                                        <?php
                                            $m_musicas->MinhasMusicas($utilizador,is_mobile()); 
                                    }else {
                                        ?>
                                            <div class="row">
                                                <div class="col-xs-3 col-md-3">
                                                    <div class="card" style="width: 100%;">
                                                        <?php $utilidade->MainSideMenu($usuario_final); ?>
                                                        <?php $utilidade->SideMenuProdutosAvendas($usuario_final); ?>
                                                        <?php $utilidade->SideMenuContaLea(); ?>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-5">
                                                    <div class="row">
                                                        <div class="col-xs-8 col-md-8" style="text-align:left;"> <H3> <b>Minhas Músicas</b> </H3> </div>
                                                        <div class="col-xs-4 col-md-4" style="text-align:right;padding-top:12px;"><a href="https://lea.co.ao/discografia/musicas.php?strt=0&cat=MA==&check=1&opm=1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40"><path d="M12.75 7.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z"></path><path d="M12 1c6.075 0 11 4.925 11 11s-4.925 11-11 11S1 18.075 1 12 5.925 1 12 1ZM2.5 12a9.5 9.5 0 0 0 9.5 9.5 9.5 9.5 0 0 0 9.5-9.5A9.5 9.5 0 0 0 12 2.5 9.5 9.5 0 0 0 2.5 12Z"></path></svg></a></div>
                                                    </div>
                                                    <hr style="margin-top:8px;"/>
                                                    <?php 
                                                        if($prtl == 2)
                                                        {
                                                            ?>
                                                                <div class="btn-group btn-group-justified btn-group-xs">
                                                                    <div class="btn btn-success" style="width:100%;"><span class="glyphicon glyphicon-retweet" style="margin-right:10px;"></span> Música partilhada com sucesso.</div>
                                                                </div>
                                                                <hr style="margin-top:22px;"/>
                                                                <?php 
                                                            }
                                                        if($dlt == 1)
                                                        {
                                                            ?>
                                                                <div class="btn-group btn-group-justified btn-group-xs">
                                                                    <div class="btn btn-danger" style="width:100%;"><span class="glyphicon glyphicon-trash" style="margin-right:10px;"></span> Música eliminado com sucesso.</div>
                                                                </div>
                                                                <hr style="margin-top:22px;"/>
                                                            <?php 
                                                        }
                                                    ?>
                                                    <?php $m_musicas->MinhasMusicas($utilizador,is_mobile()); ?>
                                                </div>
                                                    
                                                <div class="col-xs-4 col-md-4"> 
                                                    <div style="color:#ccc;"> Pub </div>
                                                    <?php include($_SERVER['DOCUMENT_ROOT'].'/nasocial/pub_lat.php'); ?>
                                                    <br/>
                                                    <?php include($_SERVER['DOCUMENT_ROOT'].'/nasocial/usuario/pg_pessoas_act.php'); ?>
                                                </div>
                                            </div>
                                        <?php
                                    }
                                ?> <!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/footer.php'); ?>
<script type="text/javascript">
    function FormularioComentarios() {
        var x = this.closest('.list-group').querySelector("#comentar");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>