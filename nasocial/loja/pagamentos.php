<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/header.php'); 
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.PagarNasocial.php');
    $PagarNasocial = new PagarNasocial();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.PagarNasocialDAO.php');
    $PagarNasocialDAO = new PagarNasocialDAO();
    
    $ENCOMENDA_FINAL = 'true';
    
    $ce_encomenda = $_GET['enco'];
    $enco_detalhes = $_GET['dtls'];
    $entidade = $_GET['ent'];
    $enc_detalhes = $_GET['abe'];
    
    $PagarNasocial->setCe_encomenda($ce_encomenda);
    
    
    $ChaveDoVendedor = $PagarNasocialDAO->ChaveDoVendedor($PagarNasocial);
    $ChaveDoComprador = $PagarNasocialDAO->ChaveDoComprador($PagarNasocial);
    $TotalEncomendadoPago = $PagarNasocialDAO->TotalEncomendadoPago($PagarNasocial);
    $totalEncomendado = $PagarNasocialDAO->TotalEncomendadoNasocial($PagarNasocial);
    $VerificarPagamentoEncomendaComFlag = $PagarNasocialDAO->VerificarPagamentoEncomendaComFlag($PagarNasocial);
    $ChaveDaEncomendaPaga = $PagarNasocialDAO->ChaveDaEncomendaPaga($PagarNasocial);
    $PagarNasocial->setChave_pagamento($ChaveDaEncomendaPaga);
    $PagarNasocial->setPagamento_flag($VerificarPagamentoEncomendaComFlag);
    
    $utilizador = 0;
    if($entidade == 1)
    {
        $utilizador = $ChaveDoComprador;
    }else{
        $utilizador = $ChaveDoVendedor;
    }
?>

<style>
    .main-li{background-color:#fff;border:#fff 1px solid;border-radius:50px;}
    .icons-tag{font-weight:bolder;font-size:16px;color:#222843;padding-right: 10px;}
    .main-li:hover {background-color: #ccc; border:#fff 1px solid;border-radius:50px;cursor: pointer;}
    .txt-meuno{color:#222843;font-weight:bolder;font-size:16px;padding-top:20px;}
    .espaco{padding:5px 5px 5px 5px;}
    .fix-image { position: relative; height: <?php if(is_mobile()){ print "109px"; }else{ print "218px"; } ?>;  background-size: cover; background-repeat: no-repeat; background-position: 100%;}
    .sucesso { background-color: #2AA63E !important; color:#fff !important;} 
    .perigo { background-color: #E7180B !important; color:#fff !important; }
    .sucesso_ { background-color: #2AA63E !important;} 
    .perigo_ { background-color: #E7180B !important; }
</style>
    <input type="hidden" id="ce_encomenda" value="<?php print $PagarNasocial->getCe_encomenda(); ?>">
    <input type="hidden" id="pagamento_flag" value="1">
    <input type="hidden" id="ce_comprador" value="<?php print $usuario; ?>">
    <input type="hidden" id="ce_vendedor" value="<?php print $ChaveDoVendedor; ?>">
    <input type="hidden" id="total_pago" value="<?php print $totalEncomendado; ?>">
    

                        <div class="page-header">
                            <!--<h1>
                        	    <?php //$idiom->idiomaPreferidoSelecionado(11, $lingua); ?>
                        	    <small>
                                    <i class="ace-icon fa fa-angle-double-right"></i>
                                    <?php //$idiom->idiomaPreferidoSelecionado(12, $lingua); ?>
                        	    </small>
                            </h1>-->
                            <h1> Pagamentos <small> <i class="ace-icon fa fa-angle-double-right"></i> <!--Common UI Features &amp; Elements </small>--> </h1>
                        </div>                   

                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <?php
                            	    if(is_mobile())
                            	    {
                            	        include($_SERVER['DOCUMENT_ROOT'].'/nasocial/loja/pagamentos-painel.php');
                                    }
                                    else 
                                    {
                                        ?>
                                            <div class="row">
                                                <div class="col-xs-3 col-md-3">
                                                    <div class="card" style="width: 100%;">
                                                        <?php $utilidade->MainSideMenu($usuario_final); ?>
                                                        <?php $utilidade->SideMenuProdutosAvendas($usuario_final); ?>
                                                        <?php $utilidade->SideMenuContaLea(); ?>
                                                    </div>
                                                </div>
                                                <div class="col-xs-9 col-md-9"> <?php include($_SERVER['DOCUMENT_ROOT'].'/nasocial/loja/pagamentos-painel.php'); ?></div>
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
	</body>
</html>
<script>
    var imageHistory = $(".linkw img").get(0).cloneNode(true);
    var flag = "<?php print $VerificarPagamentoEncomendaComFlag; ?>";
    
    var aviso_ = document.getElementById("aviso_");
    var aviso = document.getElementById("aviso");
    var pagar_div = document.getElementById("pagar_div");
    var voltar_pagar_div = document.getElementById("voltar_pagar_div");
                
    var invoice = localStorage.getItem("invoice"+$("#ce_encomenda").val());
    
    if(invoice){
        if(invoice == 1){
            $('.linkw').remove();
        }
    }

    $('.linkw').on('click', function(e){
        e.preventDefault();
        var ce_comprador = $("#ce_comprador").val();
        var ce_encomenda = $("#ce_encomenda").val();
        var pagamento_flag = $("#pagamento_flag").val();
        var ce_vendedor = $("#ce_vendedor").val();
        var total_pago = $("#total_pago").val();
        var accao = 0;
        t = this;
        hrf = t.href;
        $(t).find("img").remove();
        
        $.post('/nasocial/logica/controller/PagarNasocialController.php', 
        {
            ce_comprador:ce_comprador,
            ce_encomenda:ce_encomenda,
            pagamento_flag:pagamento_flag,
            ce_vendedor:ce_vendedor,
            total_pago:total_pago,
            accao:accao
        }, 
        function(response)
        {
           var json = JSON.parse(response);
                
            if(json.pagamento_flag > 0)
            {
                aviso_.style.display="block"; 
                aviso.style.display="none";
                pagar_div.style.display="none"; 
                voltar_pagar_div.style.display="block";
            }
            localStorage.setItem("invoice"+$("#ce_encomenda").val(), json.pagamento_flag);
            window.open(hrf);
            
        });
    });
 
    function EliminarPagamentoNasocial()
    {
        
        var ce_encomenda = $("#ce_encomenda").val();
        var accao = 1;
        
        $.post('/nasocial/logica/controller/PagarNasocialController.php', 
        {
            ce_encomenda:ce_encomenda,
            accao:accao
        }, 
        function(response)
        {
           var json = JSON.parse(response);
                
            if(json.pagamento_flag == 0)
            {
                aviso_.style.display="none"; 
                aviso.style.display="block";
                pagar_div.style.display="block"; 
                voltar_pagar_div.style.display="none";
                localStorage.setItem("invoice"+$("#ce_encomenda").val(), json.pagamento_flag);
                $(".linkw").append(imageHistory);
            }
        });
    }

    
        if(flag > 0)
        {
            localStorage.clear();
            aviso_.style.display="block"; 
            aviso.style.display="none";
            pagar_div.style.display="none"; 
            voltar_pagar_div.style.display="block";
            localStorage.setItem("invoice"+$("#ce_encomenda").val(), flag);  
        }else{
            localStorage.clear();
            aviso_.style.display="none"; 
            aviso.style.display="block";
            pagar_div.style.display="block"; 
            voltar_pagar_div.style.display="none";
            localStorage.setItem("invoice"+$("#ce_encomenda").val(), flag);
        }
    
    function ReceberPagamento()
    {
        //var pagamentos_recebidos_header_id = $("#ce_encomenda").val();
        var encomendado_pago_header_id = "<?php print $ChaveDaEncomendaPaga; ?>";
        var ce_comprador = "<?php print $ChaveDoComprador; ?>";
        var ce_vendedor = "<?php print $ChaveDoVendedor; ?>";
        //var data_pagamento = $("#ce_encomenda").val();
        var total_pago = "<?php print $TotalEncomendadoPago; ?>";
        var flag_entrega = 1;
        var accao = 3;
        
        $.post('/nasocial/logica/controller/PagarNasocialController.php', 
        {
            //pagamentos_recebidos_header_id:pagamentos_recebidos_header_id,
            encomendado_pago_header_id:encomendado_pago_header_id,
            ce_comprador:ce_comprador,
            ce_vendedor:ce_vendedor,
            //data_pagamento:data_pagamento,
            total_pago:total_pago,
            flag_entrega:flag_entrega,
            accao:accao
        }, 
        function(response)
        {
            console.log(encomendado_pago_header_id);
             console.log(ce_comprador);
              console.log(ce_vendedor);
               console.log(total_pago);
                console.log(flag_entrega);
                console.log(accao);
            
            /*var json = JSON.parse(response);
                
            if(json.pagamento_flag == 0)
            {
                console.log("passamos");
            }*/
        });
    }
    
</script>