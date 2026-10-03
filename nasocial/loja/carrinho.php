<?php 
    
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/header.php'); 
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.AgendaEventoDAO.php'); 
    $AGENDA_EVENTO = new AgendaEventoDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.EncomendaNasocialDAO.php'); 
    $EncomendaNasocialDAO = new EncomendaNasocialDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/lerui/admin/logica/dao/Mobile_Detect.php');
	$detect = new Mobile_Detect();
    
    $inicio = $_GET['strt'];
    if($inicio == null || $inicio == ''){
        $inicio = 0;    
    }
    $origem = 0;
    
    $id_ = $_GET['id'];
    $id = $_GET['pro'];
    $us = $_GET['us'];
    $cat = $_GET['cat'];
    
    $referer = isset( $_SERVER['HTTP_REFERER'] );
    
    setlocale(LC_MONETARY, "de_DE");

?>

<style>
    .main-li{background-color:#fff;border:#fff 1px solid;border-radius:50px;}
    .icons-tag{font-weight:bolder;font-size:16px;color:#222843;padding-right: 10px;}
    .main-li:hover {background-color: #ccc; border:#fff 1px solid;border-radius:50px;cursor: pointer;}
    .txt-meuno{color:#222843;font-weight:bolder;font-size:16px;padding-top:20px;}
    .quantidade{width:100%; border-radius:5px; margin-bottom:10px; text-align:center;}
    .target_diminuir{cursor: pointer; font-weight:bolder; font-size:20px;}
    .target_aumenta{cursor: pointer;font-weight:bolder;font-size:20px;}
    .btn-basico{width:100%; border-radius:5px;}
    .btn-abr{width:100%; border-radius:5px; background-color:#fff!important; border:#ccc 1px solid; color:#000!important;}
    /**/
    
</style>
                        <!-- /.page-header http://unicode.org/emoji/charts/full-emoji-list.html https://freek.dev/376-using-emoji-in-php  class="id_encomendaEvento"-->
                        <input type="hidden" value="" id="chave_encomenda">
                        <input type="hidden" value="<?php print $id_; ?>" id="ce_agenda_estoque">
                        <input id="id_servico_produto" type="hidden" value="<?php print $id; ?>">
                        <input id="ce_usuario" type="hidden" value="<?php print $usuario_final; ?>">
                        <input id="ce_vendedor" type="hidden" value="<?php print $us; ?>">
                        <input id="cat" type="hidden" value="<?php print $cat; ?>"> 
                        
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <input type="hidden" id="us" value="<?php print $us; ?>">
                                <input type="hidden" id="usuario_final" value="<?php print $usuario_final; ?>">
                                <?php 
                                    if(is_mobile()) 
                                    {
                                        if($cat == 1)
                                        { 
                                            ?> 
                                                <H3>
                                                    <b>Música / Produto</b>
                                                    <span style="float:right;">
                                                        <a href="https://www.lea.co.ao/nasocial/loja/kitanda-dos-outros.php"> <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#000"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg></a>
                                                    </span>
                                                </H3> 
                                            <?php 
                                        }
                                        if($cat == 2)
                                        { 
                                            ?> 
                                                <H3>
                                                    <b>Livro / Produto</b>
                                                    <span style="float:right;">
                                                        <a href="https://www.lea.co.ao/nasocial/loja/kitanda-dos-outros.php"><svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#000"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg></a>
                                                    </span>
                                                </H3> 
                                            <?php 
                                        }
                                        if($cat == 3)
                                        { 
                                            ?> 
                                                <H3>
                                                    <b>Disco / Produto</b> 
                                                    <span style="float:right;">
                                                        <a href="https://www.lea.co.ao/nasocial/loja/kitanda-dos-outros.php"><svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#000"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg></a>
                                                    </span> 
                                                </H3> 
                                            <?php 
                                        }
                                        if($cat == 4)
                                        { 
                                            ?> 
                                                <H3>
                                                    <b>Ingressos / Serviços</b>
                                                    <span style="float:right;">
                                                        <a href="https://www.lea.co.ao/nasocial/loja/kitanda-dos-outros.php"><svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#000"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg></a>
                                                    </span>
                                                </H3> 
                                            <?php 
                                        }
                                        if($cat == 5)
                                        { 
                                            ?> 
                                                <H3>
                                                    <b>Recordação / Produtos</b>
                                                    <span style="float:right;">
                                                        <a href="https://www.lea.co.ao/nasocial/loja/kitanda-dos-outros.php"><svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#000"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg></a>
                                                    </span>
                                                </H3> 
                                            <?php 
                                        }
                                    ?> 
                                    
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <?php $EncomendaNasocialDAO->ImagemDoIngressosAvenda($us,$id,$cat); ?>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <?php
                                                if($us === $usuario_final)
                                                {
                                                    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/loja/carrinho-gerir-produto.php');
                                                }
                                                else
                                                {
                                                    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/loja/carrinho-gerir-compra.php'); 
                                                    ?><ul class="list-group"><?php $EncomendaNasocialDAO->DetalhesDoProdutoServicoAvenda($us,$id,$cat); ?></ul><?php
                                                }
                                            ?>
                                            <a href="https://www.lea.co.ao/nasocial/loja/kitanda-dos-outros.php" class="btn btn-default" type="button" style="width:100%; border-radius:5px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
                                                    <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z"/>
                                                </svg> Kitanda Dos Outros 
                                            </a>
                                        </div>
                                                
                                            </div>
                                        <?php
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
                                                <div class="col-xs-6 col-md-9">
                                                    <?php
                                                        if($cat == 1){ ?> <H3><b>Música / Produto</b></H3> <?php }
                                                        if($cat == 2)
                                                        { 
                                                            ?> 
                                                                <H3>
                                                                    <b>Livro / Produto</b>
                                                                    <span style="float:right;">
                                                                        <a href="https://www.lea.co.ao/nasocial/loja/livros.php?acao=3"><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#000"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg></a>
                                                                    </span>
                                                                </H3> 
                                                            <?php 
                                                        }
                                                        if($cat == 3)
                                                        { 
                                                            ?> 
                                                                <H3>
                                                                    <b>Disco / Produto</b>
                                                                    <span style="float:right;">
                                                                        <a href="https://www.lea.co.ao/nasocial/loja/discografia.php?acao=3"><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#000"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg></a>
                                                                    </span>
                                                                </H3> 
                                                            <?php 
                                                        }
                                                        if($cat == 4)
                                                        { 
                                                            ?> 
                                                                <H3>
                                                                    <b>Ingressos / Serviços</b>
                                                                    <span style="float:right;">
                                                                        <a href="https://www.lea.co.ao/nasocial/loja/agendar.php?acao=3"><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#000"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg></a>
                                                                    </span>
                                                                </H3> 
                                                            <?php 
                                                        }
                                                        if($cat == 5){ ?> <H3><b>Recordação / Produtos</b></H3> <?php }
                                                    ?>
                                                    <hr/>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-4"><?php $EncomendaNasocialDAO->ImagemDoIngressosAvenda($us,$id,$cat); ?></div>
                                                        <div class="col-sm-6 col-md-8">
                                                            <?php 
                                                                if($us === $usuario_final)
                                                                {
                                                                     include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/loja/carrinho-gerir-produto.php');
                                                                }
                                                                else
                                                                {
                                                                    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/loja/carrinho-gerir-compra.php');
                                                                    
                                                                    ?> <ul class="list-group"><?php $EncomendaNasocialDAO->DetalhesDoProdutoServicoAvenda($us,$id,$cat); ?></ul> <?php
                                                                }
                                                            ?>
                                                            <a href="https://www.lea.co.ao/nasocial/loja/kitanda-dos-outros.php" class="btn btn-default" type="button" style="width:100%; border-radius:5px;">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
                                                                  <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z"/>
                                                                </svg> Kitanda Dos Outros 
                                                            </a>
                                                        </div>
                                                    </div>
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

<script>

    let preco_inicial = 0;
    setTimeout(function() {

        preco_inicial = $("#preco_na_grid").val();
    
        var preco_num = parseFloat(
            preco_inicial.replace(/\./g, "").replace(",", ".")
        );
    
        var preco_formatado = preco_num.toLocaleString("pt-PT", {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    
        $("#preco_tag").html(preco_formatado);
    
    }, 50);
    //
    $( "#target_diminuir" ).on( "click", function() 
    {
        var qtd_ = $("#qtd").val();
        var qtd_final = parseInt(qtd_)-1;
        
        if( qtd_final < 1 )
        {
            $("#qtd").val(1);
            Intl.NumberFormat().format($("#preco_tag").html(parseInt(1) * preco_inicial));
        }else{
            $("#qtd").val(qtd_final);
            Intl.NumberFormat().format($("#preco_tag").html(parseInt(qtd_final) * preco_inicial));
        }
        
    });
    $( "#target_aumenta" ).on( "click", function() 
    {
        var usuario_final = $("#usuario_final").val();
        var us = $("#us").val();
        var quantida_inicial = "<?php print $AGENDA_EVENTO->QuantidadeIngressosAvenda($us,$id); ?>";
        var quantida_inicial_ = parseInt(quantida_inicial);
        
        var qtd_ = $("#qtd").val();
        var qtd_final_ = parseInt(qtd_)+1;
        
        if(qtd_final_ > quantida_inicial_)
        {
            if(us == usuario_final)
            { 
                $("#qtd").val(qtd_final_);
                Intl.NumberFormat().format($("#preco_tag").html(parseInt(qtd_final_) * preco_inicial));
            }
            else
            {
                $("#qtd").val(parseInt(quantida_inicial)); 
                Intl.NumberFormat().format($("#preco_tag").html(parseInt(quantida_inicial) * preco_inicial));
            }
        }else{
            $("#qtd").val(qtd_final_);
            Intl.NumberFormat().format($("#preco_tag").html(parseInt(qtd_final_) * preco_inicial));
             
        }
    });
    //
    function EncomendarNasocial()
    {
        let ce_encomenda_global = null;
        
        var qtd = $("#qtd").val();
        var id_servico_produto = $("#id_servico_produto").val();
        var ce_usuario =$("#ce_usuario").val();
        var ce_vendedor = $("#ce_vendedor").val();
        var preco_painel = $("#preco_painel").val();
        var cat = $("#cat").val();
        var accao = 8;
        var encomendas = $("#encomendas").val();
        
        var chave_encomenda = 0;
    
        $.post('/nasocial/logica/controller/EncomendarNasocialController.php', 
        {
            qtd:qtd,
            id_servico_produto:id_servico_produto,
            ce_usuario:ce_usuario,
            ce_vendedor:ce_vendedor,
            preco_painel:preco_painel,
            cat:cat,
            accao:accao,
            encomendas:encomendas
            //,iuiui:43
        }, 
        function(response)
        {
            var encomendar = document.getElementById("encomendar");
            var pagar = document.getElementById("pagar");
            var qtd_total = document.getElementById("qtd_total");
            var preco_total = document.getElementById("preco_total");
            
            var json = JSON.parse(response);

            let dataSource = JSON.parse(response);
            
            setTimeout(() => {
                $("#chave_encomenda").val(dataSource.chave_encomenda);
                ce_encomenda_global = dataSource.chave_encomenda;
            }, 100);
                
            if(dataSource.qtd > 0)
            {
               encomendar.style.display="none"; 
               pagar.style.display="block";
               qtd_total = dataSource.qtd;
               preco_total = dataSource.total_encomenda;
               
               $("#qtd_total").val(qtd_total);
               $("#preco_total").val(preco_total);
            }
            window.chave_encomenda_global = dataSource.chave_encomenda;
        });
    }  
    //************************************************************************//
    function EliminarEncomenda(_ce_encomenda)
    {
        var ce_encomenda = $("#chave_encomenda").val();

        if (!ce_encomenda) {
            console.log("A chave ainda não foi carregada");
            ce_encomenda = _ce_encomenda;
        }
        
        $.ajax({
            url: '/nasocial/logica/controller/EncomendarNasocialController.php',
            type: 'POST',
            data: {
                accao: 10,
                encomendas: ce_encomenda   
            },
            dataType: 'json',            
            success: function(dataSource) {
    
                console.log(dataSource);
    
                if (dataSource.success) 
                {
                    var id_servico_produto = $("#id_servico_produto").val();
                    var cat = $("#cat").val();
                    var ce_vendedor =$("#ce_vendedor").val();
                    
                    location.href = "https://www.lea.co.ao/nasocial/loja/carrinho.php?pro=" + id_servico_produto + "&cat=" + cat + "&us=" + ce_vendedor;

                }
            }
        });
    }
    //
    function AbrirEncomenda()
    {
        var ce_encomenda = $("#chave_encomenda").val();
        var cat = $("#cat").val();
        location.href = "https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco="+ce_encomenda+"&dtls=true&ent=2&abe=1";
    }
    function PagarEncomenda()
    {
        var ce_encomenda = $("#chave_encomenda").val();
        var cat = $("#cat").val();
        location.href = "https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco="+ce_encomenda+"&dtls=false&ent=" + cat + "";
    }
    //************************************************************************//
    $("#estadoEncomenda").click(function () {
        var est_encomendas = $("#estadoEncomenda").val();
        if(est_encomendas)
        {
            $("#encomendas").css("display", "block");
            $("#estadoEncomenda").css("display", "none");
            $("#voltarEstado").css("display", "block");
        }else{
            $("#encomendas").css("display", "none");
        }
    });
    //
    $("#voltarEstado").click(function () { 
        var est_encomendas = $("#estadoEncomenda").val();
        if(est_encomendas)
        {
            $("#encomendas").css("display", "none");
            $("#estadoEncomenda").css("display", "block");
            $("#voltarEstado").css("display", "none");
        }else{
            $("#encomendas").css("display", "none");
        }
    });
    
</script>
