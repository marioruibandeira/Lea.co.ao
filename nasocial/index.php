<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/header.php'); 
    
    $inicio = $_GET['strt'];
    if($inicio == null || $inicio == ''){
        $inicio = 0;    
    }
    $origem = 0;
    //print "inicio" . $inicio;
    $feed = $_GET['feed'];
    if($feed ==null || $feed == '' || $feed != 1)
    {
        $feed = 0;
    }
    
?>
<style>
    .main-li {background-color:#fff;border:#fff 1px solid;border-radius:50px;}
    .icons-tag {font-weight:bolder;font-size:16px;color:#222843;padding-right: 10px;}
    .main-li:hover {background-color: #ccc; border:#fff 1px solid;border-radius:50px;cursor: pointer;}
    .txt-meuno {color:#222843;font-weight:bolder;font-size:16px;padding-top:20px;}
    .contorno { border-radius: 5px !important;}
    .header-contorno { border-radius: 5px !important; background-color: #abbac3; border:#abbac3 1px solid;}
    .btn-pesquisa { padding: 5px 0px 0px 0px;border-radius: 0px 5px 5px 0px !important; }
    .btn-mini-painel { padding: 5px 0px 0px 0px; }
    .btn-shop {padding: 5px 0px 0px 0px;border-radius: 5px 0px 0px 5px !important;}
</style>

            <!-- /.page-header http://unicode.org/emoji/charts/full-emoji-list.html https://freek.dev/376-using-emoji-in-php-->
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <?php
                        if(is_mobile())
                        {
                            include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/mini-header.php');
                            
                            if($feed == 0){
                                include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/painel-publicacao.php');
                            }
                            
                            print '<img src="/nasocial/imgs/pub/publicidade_publicacoes.jpg" alt="Publicidade na LEA.co.ao" width="100%" height="100%" style="margin-bottom:10px;">';
                            $mural->DadosDoMural($inicio,$usuario_final,$origem); 
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
                                        <?php include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/mini-header.php');?>
                                        <?php include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/painel-publicacao.php');?>
                                        <?php $mural->DadosDoMural($inicio,$usuario_final,$origem); ?>
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
                    ?>
                    <!-- PAGE CONTENT ENDS -->
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