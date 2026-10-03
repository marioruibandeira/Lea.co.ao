<?php 
    //
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/header.php'); 
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.MinhasMusicasDAO.php'); 
    $m_musicas = new MinhasMusicasDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/usuario/class.AmigoDAO.php'); 
    $amigos = new AmigoDAO();
    
    if ((!isset($_GET['ami']) || trim($_GET['ami']) == '')) {
        print "<script type='text/javascript'> window.location = 'https://www.lea.co.ao/nasocial/' </script>";
    }
    $ce_amigo = $_GET['ami'];
    if($ce_amigo === '' || $ce_amigo === '0' || $ce_amigo === 0){
        print "<script type='text/javascript'> window.location = 'https://www.lea.co.ao/nasocial/' </script>";
    }
    
    $inicio = $_GET['strt'];
    if($inicio == null || $inicio == ''){
        $inicio = 0;    
    }
    $origem = 0;

?>
<style>
    .main-li{background-color:#fff;border:#fff 1px solid;border-radius:50px;}
    .icons-tag{font-weight:bolder;font-size:16px;color:#222843;padding-right: 10px;}
    .main-li:hover {background-color: #ccc; border:#fff 1px solid;border-radius:50px;cursor: pointer;}
    .txt-meuno{color:#222843;font-weight:bolder;font-size:16px;padding-top:20px;}
    
</style>
    
    <script type="text/javascript">
        var verificar_pedido = document.getElementById("verificar_pedido");
        $(document).ready(function() {
            /* code here */ 
            
        });
            
        //verificarPedido(verificar_pedido === '0');
        
        var adicionar = document.getElementById("adicionar");
        var remover = document.getElementById("remover");
        
        
        function AdicionarAmigo() 
        {
            var ce_usuario = $("#ce_usuario").val();
            var ce_amigo = $("#ce_amigo").val();
            var orgen = "amigos";
            
            $.post('/nasocial/logica/controller/usuario/pedidoAmizadeController.php', 
            {
                ce_usuario:ce_usuario,
                ce_amigo:ce_amigo,
                orgen:orgen
            }, 
            function(response)
            {
               var json = JSON.parse(response);
                    
                if(json.pedido_efectuado > 0)
                {
                    adicionar.style.display="none"; 
                    remover.style.display="block";
                    console.log("Pedido de Amizade Inserido Com Sucesso!.");
                }
    
            });
        }
        
        function verificarPedido(verificar_pedido == 0)
        {
            alert(0);
        }
    </script>

                        <input type="hidden" id="ce_usuario" value="<?php print $ce_amigo; ?>"
                        <!-- /.page-header http://unicode.org/emoji/charts/full-emoji-list.html https://freek.dev/376-using-emoji-in-php-->
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <?php 
                                    if(is_mobile()) 
                                    {
                                        if($amigos->MeusAmigos_Validar($ce_amigo,is_mobile()) > 0)
                                        {
                                            ?> 
                                                <H3><b>Meus Amigos</b></H3> 
                                                <hr/> 
                                                <?php $amigos->MeusAmigos_($ce_amigo,is_mobile());  ?>
                                                <hr/>
                                            <?php 
                                        }
                                        
                                        ?>
                                            <H3><b>Pessoas que você talvez conheça</b></H3>
                                            <hr/>
                                        <?php 
                                            $amigos->PessoasQueTalvezConheca($ce_amigo,is_mobile()); 
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
                                                    <?php 
                                                        if($amigos->MeusAmigos_Validar($ce_amigo,is_mobile()) > 0)
                                                        {
                                                            ?>
                                                                <H3>Meus Amigos</H3>
                                                                <hr/>
                                                                <?php $amigos->MeusAmigos_($ce_amigo,is_mobile()); ?>
                                                                <hr/>
                                                            <?php 
                                                        }
                                        
                                                    ?>
                                                    <H3>Pessoas que você talvez conheça</H3>
                                                    <hr/>
                                                    <?php $amigos->PessoasQueTalvezConheca($ce_amigo,is_mobile()); ?>
                                                </div>
                                                    
                                                <div class="col-xs-4 col-md-4"> 
                                                    <div style="color:#ccc;"> Pub </div>
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a href="/discografia/musicas.php?strt=0&cat=MA==&check=0&opm=1">
                                                                <img style="border: 2px solid #ccc; border-radius: 20px;" class=" " width="150" src="/images/publicidades/baixar_musica_angolana_gratis336x280.jpg" alt="Lea.co.ao">
                                                            </a>
                                                        </div>
                                                        <div class="media-body" style="width:100%;text-align: justify;">
                                                            <a href="/discografia/musicas.php?strt=0&cat=MA==&check=0&opm=1" style="color:#000;">
                                                                <h3><b>Download & Play</b></h3> 
                                                                <p>Centenas de músicas angolanas grátis.</p>
                                                                <b>(+244) 912 69 69 69 || info@lea.co.ao</b>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img style="border: 2px solid #ccc; border-radius: 20px;" class=" " width="150" src="/images/publicidades/OkiOki_336x228.jpg" alt="...">
                                                            </a>
                                                        </div>
                                                        <div class="media-body" style="width:100%;text-align: justify;">
                                                            <a href="#" style="color:#000;">
                                                                <h3><b>Okioki</b></h3> 
                                                                <p>Sua saúde da pele e muito mais em boas mãos.</p>
                                                                <b>(+244) 943 342 002</b>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    
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
