<?php 
    //
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/header.php'); 
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.MinhasMusicasDAO.php'); 
    $m_musicas = new MinhasMusicasDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/usuario/class.AmigoDAO.php'); 
    $amigos = new AmigoDAO();
    
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

                        <input type="hidden" id="ce_usuario" value="<?php print $utilizador; ?>"
                        <!-- /.page-header http://unicode.org/emoji/charts/full-emoji-list.html https://freek.dev/376-using-emoji-in-php-->
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <?php 
                                    if(is_mobile()) 
                                    {
                                        if($amigos->MeusAmigos_Validar($utilizador,is_mobile()) > 0)
                                        {
                                            ?> 
                                                <H3><b>Meus Amigos</b></H3> 
                                                <hr/> 
                                                <?php $amigos->MeusAmigos_($utilizador,is_mobile());  ?>
                                                <hr/>
                                            <?php 
                                        }
                                        
                                        ?>
                                            <H3><b>Pessoas que você talvez conheça</b></H3>
                                            <hr/>
                                        <?php 
                                            $amigos->PessoasQueTalvezConheca($utilizador,is_mobile()); 
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
                                                        if($amigos->MeusAmigos_Validar($utilizador,is_mobile()) > 0)
                                                        {
                                                            ?>
                                                                <H3>Meus Amigos</H3>
                                                                <hr/>
                                                                <?php $amigos->MeusAmigos_($utilizador,is_mobile()); ?>
                                                                <hr/>
                                                            <?php 
                                                        }
                                        
                                                    ?>
                                                    <H3>Pessoas que você talvez conheça</H3>
                                                    <hr/>
                                                    <?php $amigos->PessoasQueTalvezConheca($utilizador,is_mobile()); ?>
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
