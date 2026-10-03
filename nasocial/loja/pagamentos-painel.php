    <div>
        <div class="row search-page" id="search-page-1">
            <div class="col-xs-12">
                <div class="row">
                    
                    <?php
                        //remove o div que mostra a identidade do vendedor no telefone
                        if(!is_mobile())
                        { 
                            ?>
                                <div class="col-xs-12 col-sm-4"> 
                                    <div class="search-area well well-sm" style="border-radius: 5px !important;"> <?php $PagarNasocialDAO->UtilizadorRelacionadoNaCompra($utilizador, $entidade); ?> </div> 
                                </div>
                            <?php
                        }
                    ?>
                    <div class="col-xs-12 col-sm-8">
                        <div class="row">
                            <div class="col-xs-12 col-md-9">
                                <?php
                                    if($enco_detalhes === 'false' )
                                    {
                                        ?>
                                            <div class="panel panel-default" style="margin-bottom:10px !important;">
                                                <div class="panel-heading panel-heading-nav" style="padding-bottom: 0px;">
                                                    <ul class="nav nav-tabs">
                                                        <li role="presentation" class="active"> <a href="#one" aria-controls="one" role="tab" data-toggle="tab"><b>WhatsApp</b></a> </li>
                                                        <!--<li role="presentation"> <a href="#two" aria-controls="two" role="tab" data-toggle="tab"><b>Carteira</b></a> </li>
                                                        <li role="presentation"> <a href="#three" aria-controls="three" role="tab" data-toggle="tab"><b>Sistema</b></a> </li>-->
                                                    </ul>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="tab-content" style="border:0px; padding:0px; height:30%;">
                                                        <div role="tabpanel" class="tab-pane fade in active" id="one"> 
                                                            <p class="aviso" id="aviso_" <?php if($PagarNasocialDAO->VerificarPagamentoEncomenda($PagarNasocial) > 0){ ?> style="display:block;color:#ff4402;"<?php }else{ ?> style="display:none;" <?php } ?> style="color:#ff4402;">Se você acessou o WhatsApp apenas para trocar mensagens ou por acidente e não efetuou o pagamento, clique em "<b>VOLTAR A PAGAR</b>" para ir ao WhatsApp realizar o pagamento.</p>    
                                                            <p class="aviso" id="aviso" <?php if($PagarNasocialDAO->VerificarPagamentoEncomenda($PagarNasocial) > 0){ ?> style="display:none;"<?php }else{ ?> style="display:block;color:#ff4402;" <?php } ?> style="">Dirija-se ao Multicaixa (ATM) ou Agência mais próxima e faça uma transferência ou depósito do valor da encomenda selecionada.</p>
                                                            <div style="padding:0px 0px 0px 0px; border-top: #ccc solid 1px; border-bottom: #ccc solid 1px;">
                                                                <b style="color:#000; font-size:36px;"> Kz </b> <b style="color:#ff4402; font-size:36px;"> <?php print money_format("%!n",$totalEncomendado); ?> </b>
                                                            </div>
                                                            
                                                            <div id="pagar_div" <?php if($VerificarPagamentoEncomendaComFlag > 0){ ?> style="display:none;"<?php }else{ ?> style="display:block;" <?php } ?>>
                                                                <h5>Standard Bank</h5>
                                                                <blockquote style="font-size:13px;">
                                                                    <b>Nome:</b> Mário Bandeira <br/>
                                                                    <b>IBAN:</b> 0060-0110-0100-0094-78204 <br/>
                                                                    <b>Conta:</b> 0100-0094-782 
                                                                </blockquote>
                                                                <h5 class="confirmar" style="color:#ff4402;font-weight:bolder;">Confirmar Pagamento Pelo Whatsapp</h5>
                                                                <a href="https://wa.me/244927297900" class="linkw">
                                                                    <img src="/images/icons/Confirmar-whatsapp.png" alt="Confirmar Pagamento Via Whatsapp" style="width:100%; border-radius: 0px 0px 10px 10px;">
                                                                </a>
                                                                <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $ce_encomenda; ?>&dtls=<?php print $ENCOMENDA_FINAL; ?>&ent=2" class="btn btn-primary" style="width:100%;border-radius:5px;padding: 0px 15px 0px 15px;margin-top:5px;"> <span class="glyphicon glyphicon-folder-open" style="margin-right:15px;"></span>  Ver a Encomenda </a>
                                                            </div>
                                                            <div id="voltar_pagar_div" <?php if($VerificarPagamentoEncomendaComFlag > 0){ ?> style="display:block;"<?php }else{ ?> style="display:none;" <?php } ?> >
                                                                <?php
                                                                    if($PagarNasocialDAO->VerificarPagamentoComFlag($PagarNasocial) == 0)
                                                                    {
                                                                        ?>
                                                                            <button type="button" class="btn btn-warning" style="width:100%;border-radius:5px; margin:10px 0px 5px 0px; height:20%;padding: 0px 15px 0px 15px;"> <span class="glyphicon glyphicon-cog" style="margin-right:15px;"></span> Em Processamento </button>
                                                                            <button type="button" onclick="EliminarPagamentoNasocial()" class="btn btn-success" style="width:100%;border-radius:5px;padding: 0px 15px 0px 15px;"> <span class="glyphicon glyphicon-repeat" style="margin-right:15px;"></span> Voltar a Pagar </button>
                                                                        <?php
                                                                    }
                                                                    else
                                                                    {
                                                                        ?>
                                                                            <span class="label label-warning" style="width:100%; height:30px; border-radius:5px;padding: 8px 15px 0px 15px;margin-bottom:5px;">
                                                                                <span class="glyphicon glyphicon-road" style="margin-right:15px;"></span> EM TRANSITO
                                                                            </span>
                                                                            <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $ce_encomenda; ?>&dtls=<?php print $ENCOMENDA_FINAL; ?>" class="btn btn-success" style="width:100%;border-radius:5px;padding: 0px 15px 0px 15px;margin-top:5px;"> <span class="glyphicon glyphicon-gift" style="margin-right:15px;"></span>  Recebi a encomenda </a>
                                                                        <?php
                                                                    }
                                                                ?>
                                                                <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $ce_encomenda; ?>&dtls=<?php print $ENCOMENDA_FINAL; ?>" class="btn btn-primary" style="width:100%;border-radius:5px;padding: 0px 15px 0px 15px;margin-top:5px;"> <span class="glyphicon glyphicon-folder-open" style="margin-right:15px;"></span>  Ver a Encomenda </a>
                                                            </div>
                                                         </div>

                                                        <div role="tabpanel" class="tab-pane fade in" id="two">
                                                            <?php 
                                                                $cateiraTotal = 0;
                                                                if($cateiraTotal > 0)
                                                                {
                                                                    if($PagarNasocialDAO->VerificarPagamentoComFlag($PagarNasocial) == 0)
                                                                    { 
                                                                        ?> 
                                                                            <p class="aviso" style="font-size:10px;" <?php if($PagarNasocialDAO->VerificarPagamentoEncomenda($PagarNasocial) > 0){ ?> style="display:none;"<?php }else{ ?> style="display:block;color:#ff4402;" <?php } ?> style="">Ao clicar no botão “Confirmar Pagamento”, o valor do pedido será descontado da sua carteira e enviado ao fornecedor deste produto e estará aceitar os Termos de <a href="#">Compra, Vendas</a> e <a href="#">Pontuações.</a></p>
                                                                                <form name="" onsubmit="return validateForm()" method="post" class="form-horizontal" role="form">
                                                                                    <div class="well well-lg" style="border-radius:5px;margin-bottom:2px;padding-right:8px;padding-left:8px;">
                                                                                        <div class="form-group">
                                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><b> Balanço<?php //$idiom->idiomaPreferidoSelecionado(8,$lingua); ?> </b> </label>
                                                                                            <div class="col-sm-9"> <input type="text" style="color:#136c01;font-size:16px;text-align:right;background:#e1e3e3 !important;" readOnly class="autosize-transition form-control" Value="14,080.00"> </div>												
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><b>Total à Pagar em AO<?php //$idiom->idiomaPreferidoSelecionado(8,$lingua); ?> </b> </label>
                                                                                            <div class="col-sm-9"> <input type="text" readOnly style="color:#ff4402;font-size:16px;text-align:right;background:#e1e3e3 !important;" class="autosize-transition form-control" Value="<?php print money_format("%!n",$totalEncomendado); ?>"> </div>												
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><b>Novo Balanço<?php //$idiom->idiomaPreferidoSelecionado(8,$lingua); ?> </b> </label>
                                                                                            <div class="col-sm-9"> <input type="text" readOnly style="color:#136c01;font-size:16px;text-align:right;background:#e1e3e3 !important;" class="autosize-transition form-control" Value="13,080.00"> </div>												
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><b> Mensagem<?php //$idiom->idiomaPreferidoSelecionado(8,$lingua); ?> </b> <b style="color:#D00;">*</b></label>
                                                                                            <div class="col-sm-9"> <textarea id="form-field-11" class="autosize-transition form-control"></textarea> </div>												
                                                                                        </div>
                                                                                    </div>
                                                                                    <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $ce_encomenda; ?>&dtls=<?php print $ENCOMENDA_FINAL; ?>" class="btn btn-primary" style="width:100%;border-radius:5px;padding: 0px 15px 0px 15px;margin-top:5px;"> <span class="glyphicon glyphicon-folder-open" style="margin-right:10px;"></span>  Ver a Encomenda </a>
                                                                                    <div style="padding:4px;"></div>
                                                                                <button type="button" class="btn btn-danger" style="width:100%;border-radius:5px;"> <span class="glyphicon glyphicon-check" style="margin-right:10px;"></span> Confirmar Pagamento </button>
                                                                            </form>  
                                                                            
                                                                        <?php
                                                                    }else{
                                                                        ?> 
                                                                            <span class="label label-warning" style="width:100%; height:30px; border-radius:5px;padding: 8px 15px 0px 15px;margin-bottom:5px;">
                                                                                <span class="glyphicon glyphicon-road" style="margin-right:15px;"></span> EM TRANSITO
                                                                            </span> 
                                                                            <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $ce_encomenda; ?>&dtls=<?php print $ENCOMENDA_FINAL; ?>" class="btn btn-success" style="width:100%;border-radius:5px;padding: 0px 15px 0px 15px;margin-top:5px;"> <span class="glyphicon glyphicon-gift" style="margin-right:15px;"></span>  Recebi a encomenda </a>
                                                                            <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $ce_encomenda; ?>&dtls=<?php print $ENCOMENDA_FINAL; ?>" class="btn btn-primary" style="width:100%;border-radius:5px;padding: 0px 15px 0px 15px;margin-top:5px;"> <span class="glyphicon glyphicon-folder-open" style="margin-right:15px;"></span>  Ver a Encomenda </a>
                                                                        <?php
                                                                    }
                                                                }else{
                                                                    ?> 
                                                                        <a href="https://www.lea.co.ao/nasocial/loja/carregar.php" class="btn btn-success" style="width:100%;border-radius:5px;padding: 0px 15px 0px 15px;margin-top:5px;"> <span class="glyphicon glyphicon-plus-sign" style="margin-right:8px;"></span>  Carregar a Carteira </a>
                                                                        <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $ce_encomenda; ?>&dtls=<?php print $ENCOMENDA_FINAL; ?>" class="btn btn-primary" style="width:100%;border-radius:5px;padding: 0px 15px 0px 15px;margin-top:10px;"> <span class="glyphicon glyphicon-folder-open" style="margin-right:10px;"></span>  Ver a Encomenda </a>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </div>
                                                            
                                                        <div role="tabpanel" class="tab-pane fade" id="three">
                                                            <?php 
                                                                if($PagarNasocialDAO->VerificarPagamentoComFlag($PagarNasocial) == 0)
                                                                { 
                                                                    ?> 
                                                                        <p class="aviso">Dirija-se ao Multicaixa (ATM) ou Agência mais próxima e faça uma transferência ou depósito do valor da encomenda selecionada.</p>
                                                            
                                                                        <div id="pagar_div" <?php if($VerificarPagamentoEncomendaComFlag > 0){ ?> style="display:block;"<?php }else{ ?> style="display:block;" <?php } ?>>
                                                                            <h5>Standard Bank</h5>
                                                                            <blockquote style="font-size:13px;">
                                                                                <b>Nome:</b> Mário Bandeira <br/>
                                                                                <b>IBAN:</b> 0060-0110-0100-0094-78204 <br/>
                                                                                <b>Conta:</b> 0100-0094-782 
                                                                            </blockquote>
                                                                        </div>
                                                                        
                                                                        <form name="glivro" onsubmit="return validateForm()" method="post" class="form-horizontal" role="form">
                                                                            <div class="well well-lg" style="border-radius:5px;margin-bottom:8px;padding-right:8px;padding-left:8px;">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><b> Valor a Pagar<?php //$idiom->idiomaPreferidoSelecionado(8,$lingua); ?> </b> </label>
                                                                                    <div class="col-sm-9"> <input type="text" class="autosize-transition form-control" value="<?php print money_format("%!n",$totalEncomendado); ?>" style="color:#ff4402;font-size:16px;text-align:right;background:#e1e3e3 !important;" readonly> </div>												
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><b>Copia  <?php //$idiom->idiomaPreferidoSelecionado(16,$lingua); ?></b> <b style="color:#D00;">*</b> </label>
                                                                                    <div class="col-sm-9"> <input type="file" id="id-input-file-2" class="custom-file-input" /> </div>                    
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><b> Mensagem<?php //$idiom->idiomaPreferidoSelecionado(8,$lingua); ?> </b> <b style="color:#D00;">*</b></label>
                                                                                    <div class="col-sm-9"> <textarea id="form-field-11" class="autosize-transition form-control"></textarea> </div>												
                                                                                </div>
                                                                            </div>
                                                                            <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $ce_encomenda; ?>&dtls=<?php print $ENCOMENDA_FINAL; ?>" class="btn btn-primary" style="width:100%;border-radius:5px;padding: 0px 15px 0px 15px;"> <span class="glyphicon glyphicon-folder-open" style="margin-right:10px;"></span>  Ver a Encomenda </a>
                                                                            <div style="padding:4px;"></div>
                                                                            <a href="#" class="btn btn-danger" style="width:100%;border-radius:5px;padding: 0px 15px 0px 15px;"> <span class="glyphicon glyphicon-check" style="margin-right:10px;"></span> Confirmar Pagamento </a>
                                                                        </form>
                                                            <?php
                                                                }else{
                                                                    ?> 
                                                                        <span class="label label-warning" style="width:100%; height:30px; border-radius:5px;padding: 8px 15px 0px 15px;margin-bottom:5px;">
                                                                            <span class="glyphicon glyphicon-road" style="margin-right:15px;"></span> EM TRANSITO
                                                                        </span> 
                                                                        <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $ce_encomenda; ?>&dtls=<?php print $ENCOMENDA_FINAL; ?>" class="btn btn-success" style="width:100%;border-radius:5px;padding: 0px 15px 0px 15px;margin-top:5px;"> <span class="glyphicon glyphicon-gift" style="margin-right:15px;"></span>  Recebi a encomenda </a>
                                                                        <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $ce_encomenda; ?>&dtls=<?php print $ENCOMENDA_FINAL; ?>" class="btn btn-primary" style="width:100%;border-radius:5px;padding: 0px 15px 0px 15px;margin-top:5px;"> <span class="glyphicon glyphicon-folder-open" style="margin-right:15px;"></span>  Ver a Encomenda </a>
                                                                    <?php    
                                                                }
                                                            ?>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                    }
                                    if ($enco_detalhes == 'abrir' )
                                    {
                                        ?>
                                            <p STYLE="text-align:center; font-weight:bolder;"><abbr title="HyperText Markup Language" class="initialism">DETALHES DA ENCOMENDA</abbr></p> 
                                            <div class="panel panel-default">
                                                <!-- Default panel contents -->
                                                <div class="panel-heading">Panel heading</div>
                                                <div style="padding:2px;">
                                                    <ul class="list-group">
                                                        <li class="list-group-item" style="padding:4px;"> <b># :</b>1 </li>
                                                        <li class="list-group-item" style="padding:4px;"> <b>Categoria :</b> </li>
                                                        <li class="list-group-item" style="padding:4px;"> <b>Tema :</b> </li>
                                                        <li class="list-group-item" style="padding:3px 2px 2px 2px;height:35px; "> 
                                                            <b>
                                                                <form action="/logica/controller/EncomendaController.php" method="get">
                                                                    <b>Qtd : <?php print $row->quantidade; ?> </b>
                                                                    <div class="flex-w bo5 of-hidden w-size17" style="float:right;width:62px;margin-left:5px; padding:0.5px;">
                                                                        <input type="submit" class="btn btn-prymary btn-sm color1" style="float:right; height:24px;width:60px; padding:0px; font-weight:bolder;" value="Alterar">   
                                                                    </div>
                                                                    <div class="flex-w bo5 of-hidden w-size17" style="float:right;width:94px;">
                                                                        <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2" style="height:25px;width:25px;"> <i class="fs-12 fa fa-minus" aria-hidden="true"></i> </button>
                                                                        <input class="size8 m-text18 t-center num-product" type="number" id="quantidade" name="qtd" value="<?php print $row->quantidade; ?>" style="height:25px;width:35px;">
                                                                        <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2" style="height:25px;width:25px;"> <i class="fs-12 fa fa-plus" aria-hidden="true"></i> </button>
                                                                    </div>
                                                                    <input type="hidden" name="act" value="1">
                                                                    <input type="hidden" name="preco" value="0">
                                                                    <input type="hidden" name="id" value="0">
                                                                    <input type="hidden" name="refe_id" value="0">
                                                                </form>
                                                            </b> 
                                                        </li>
                                                        <li class="list-group-item" style="padding:4px;"> <b>Preço :</b> </li>
                                                        <li class="list-group-item" style="padding:4px;"> <b>Sub-Total :</b> </li>
                                                        <li class="list-group-item" style="padding:4px;"> <b>
                                                            <div style="text-align:right;">
                                                                <span class="label label-danger" style="width:32%;border-radius:8px 8px 8px 8px;margin:0px;">Anular</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>                                                                                
                                                <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $ce_encomenda; ?>&dtls=false ">
                                                    <div class="panel-footer" style="text-align:center;">
                                                        <span class="glyphicon glyphicon-credit-card" style="margin-right:15px;"> PAGAR ENCOMENDA
                                                    </div>
                                                </a>
                                                <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $ce_encomenda; ?>&dtls=true">
                                                    <div class="panel-footer" style="text-align:center;">
                                                        <span class="glyphicon glyphicon-share-alt" style="margin-right:15px;"> VOLTAR À ENCOMENDA
                                                    </div>
                                                </a>
                                                
                                                <div  class="panel-footer" style="text-align:center;padding:4px;background:#ff4402;color:#fff;font-weight:bolder;">
                                                    TOTAL A PAGAR : 0.00    
                                                </div>
                                                
                                            </div>
                                        <?php
                                    }
                                
                                    if($enco_detalhes == 'true')
                                    {
                                        if($enc_detalhes == 1)
                                        {
                                             ?>
                                                <p STYLE="text-align:center; font-weight:bolder; margin-bottom:0px;"><abbr title="HyperText Markup Language" class="initialism">DETALHES DA ENCOMENDAS</abbr></p>

                                                <div class="panel panel-default <?php if($entidade == 1) { ?>sucesso_<?php } else { ?>perigo_<?php } ?>" style="margin-bottom:10px !important;">
                                                    <div class="panel-heading <?php if($entidade == 1) { ?>sucesso<?php } else { ?>perigo<?php } ?>">
                                                        <?php print $PagarNasocialDAO->CabecalhoDaEncomenda($PagarNasocial); ?>
                                                    </div>
                                                    <ul class="list-group">
                                                        <?php $PagarNasocialDAO->DetalhesDaEncomenda($PagarNasocial); ?>
                                                        <li class="list-group-item">
                                                            <?php
                                                                if($enc_detalhes == 1)
                                                                {
                                                                    ?>
                                                                        <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $ce_encomenda; ?>&dtls=true&ent=<?php if($entidade == 1) { ?>1<?php } else { ?>2<?php } ?>">
                                                                            <span class="label label-default" style="width:33%; border-radius:8px 8px 8px 8px;">Voltar</span>
                                                                        </a>
                                                                    <?php
                                                                }
                                                                else
                                                                {
                                                                     ?>
                                                                        <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $ce_encomenda; ?>&dtls=true&ent=<?php if($entidade == 1) { ?>1<?php } else { ?>2<?php } ?>&abe=1">
                                                                            <span class="label label-default" style="width:33%; border-radius:8px 8px 8px 8px;">Abrir</span>
                                                                        </a>
                                                                    <?php
                                                                }
                                                                
                                                                if($entidade == 2)
                                                                {
                                                                    ?> <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $ce_encomenda; ?>&dtls=false"><span class="label label-success" style="width:33%;border-radius:8px 8px 8px 8px;">Pagar</span></a> <?php
                                                                }
                                                            ?>
                                                            <a href="https://www.lea.co.ao/nasocial/logica/controller/eliminarEncomenda.php?ce_enco=<?php print $ce_encomenda; ?>">
                                                                <span class="label label-danger" style="width:32%;border-radius:8px 8px 8px 8px;">Anular</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                              <?php
                                        }
                                        else
                                        {
                                            ?>
                                                <p STYLE="text-align:center; font-weight:bolder; margin-bottom:0px;"><abbr title="HyperText Markup Language" class="initialism">ENCOMENDAS</abbr></p>

                                                <div class="panel panel-default" style="margin-bottom:10px !important;">
                                                    <div class="panel-heading <?php if($entidade == 1) { ?>sucesso<?php } else { ?>perigo<?php } ?>">
                                                        <b> REF : <?php print $PagarNasocialDAO->ReferenciaEncomenda($PagarNasocial); ?> </b> 
                                                    </div>
                                                    <ul class="list-group">
                                                        <?php $PagarNasocialDAO->ResumoEncomenda($PagarNasocial); ?>
                                                        <li class="list-group-item">
                                                            <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $ce_encomenda; ?>&dtls=true&ent=<?php if($entidade == 1) { ?>1<?php } else { ?>2<?php } ?>&abe=1">
                                                                <span class="label label-default" style="width:33%; border-radius:8px 8px 8px 8px;">Abrir</span>
                                                            </a>
                                                            <?php
                                                                if($entidade == 0 && $VerificarPagamentoEncomendaComFlag == 0)
                                                                {
                                                                    ?> <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $ce_encomenda; ?>&dtls=false"><span class="label label-success" style="width:33%;border-radius:8px 8px 8px 8px;">Pagar</span></a> <?php
                                                                }
                                                            ?>
                                                            <a href="https://www.lea.co.ao/nasocial/logica/controller/eliminarEncomenda.php?ce_enco=<?php print $ce_encomenda; ?>">
                                                                <span class="label label-danger" style="width:32%;border-radius:8px 8px 8px 8px;">Anular</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                              <?php
                                        }
                                        
                                        if($entidade == 0 && $VerificarPagamentoEncomendaComFlag > 0 )
                                                {
                                                    if($PagarNasocialDAO->VerificarPagamentoComFlag($PagarNasocial) > 0)
                                                    {
                                                        ?>
                                                            <span class="label label-warning" style="width:100%; height:30px; border-radius:5px;padding: 8px 15px 0px 15px;margin-bottom:5px;">
                                                                <span class="glyphicon glyphicon-road" style="margin-right:15px;"></span> EM TRANSITO
                                                            </span>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                            <span class="label label-warning" style="width:100%; height:30px; border-radius:5px;padding: 8px 15px 0px 15px;margin-bottom:5px;">
                                                                <span class="glyphicon glyphicon-cog" style="margin-right:15px;"></span> EM PROCESSAMENTO
                                                            </span>
                                                        <?php
                                                    }
                                                ?>
                                                
                                                <span class="label label-danger" style="width:100%; height:30px; border-radius:5px;padding: 8px 15px 0px 15px;margin-bottom:5px;">
                                                    <span class="glyphicon glyphicon-remove-circle" style="margin-right:15px;"></span> NÃO RECEBEMOS A ENCOMENDA
                                                </span>
                                                    
                                                <span class="label label-success" style="width:100%; height:30px; border-radius:5px;padding: 8px 15px 0px 15px;margin-bottom:5px;">
                                                    <span class="glyphicon glyphicon-ok-sign" style="margin-right:15px;"></span> RECEBEMOS A ENCOMENDA
                                                </span>
                                            <?php
                                        }
                                    ?>
                                        
                                    <?php
                                            
                                            if($entidade == 1  && $VerificarPagamentoEncomendaComFlag > 0 )
                                            {
                                                if($entidade == 1  && $PagarNasocialDAO->VerificarPagamentoComFlag($PagarNasocial) > 0)
                                                {
                                                    ?>
                                                        <a href="#" onclick="#">
                                                            <span class="label label-success" style="width:100%; height:30px; border-radius:5px;padding: 8px 15px 0px 15px;margin-bottom:5px;">
                                                                <span class="glyphicon glyphicon-ok-sign" style="margin-right:15px;"></span> ENTREGA EFECTUADA COM SUCESSO
                                                            </span>
                                                        </a>
                                                        <a href="#" onclick="#">
                                                            <span class="label label-warning" style="width:100%; height:30px; border-radius:5px;padding: 8px 15px 0px 15px;margin-bottom:5px;">
                                                                <span class="glyphicon glyphicon-adjust" style="margin-right:15px;"></span> A ESPERA DA CONFIRMAÇÃO DE ENTREGA
                                                            </span>
                                                        </a>
                                                    <?php    
                                                }else{
                                                    ?>
                                                        <a href="#" onclick="ReceberPagamento()">
                                                            <span class="label label-success" style="width:100%; height:30px; border-radius:5px;padding: 8px 15px 0px 15px;margin-bottom:5px;">
                                                                <span class="glyphicon glyphicon-ok-sign" style="margin-right:15px;"></span> RECEBEMOS O PAGAMENTO
                                                            </span>
                                                        </a>
                                                        <span class="label label-danger" style="width:100%; height:30px; border-radius:5px;padding: 8px 15px 0px 15px;margin-bottom:5px;">
                                                            <span class="glyphicon glyphicon-remove-circle" style="margin-right:15px;"></span> NÃO RECEBEMOS O PAGAMENO
                                                        </span>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    <?php
                                }
    
                                    if($entidade == 2 && $enco_detalhes == 'true')
                                    {
                                        ?> <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $ce_encomenda; ?>&dtls=false&ent=2" class="btn btn-default" style="width:100%;border-radius:5px;padding: 0px 15px 0px 15px;margin-bottom:5px;"> <span class="glyphicon glyphicon-share-alt" style="margin-right:15px;"></span>  Voltar </a> <?php
                                    }
                                    
                                ?>            
                                    
                                <a href="https://www.lea.co.ao/nasocial/loja/relatorio.php" class="btn btn-default" style="width:100%;border-radius:5px;padding: 0px 15px 0px 15px;margin-bottom:5px;"> <span class="glyphicon glyphicon-log-out" style="margin-right:15px;"></span>  Sair </a>        
                                        
                                <div style="text-align: center; text-decoration: underline;">
                                    <img src="/nasocial/assets/images/gallery/Multicaixa_250x250.png" width="30" height="30">
                                    <h6>
                                        <b style="color:#D00;">*</b> Todos os pagamentos devem ser feitos via depósito ou transferência bancária.<br/>
                                        <b style="color:#D00;">*</b> O comprovativo do pagamento é obrigatorio.
                                        <br/>
                                        <a href="#">Politica de Privacidade</a> & <a href="#">Termos de Uso</a>.
                                    </h6>
                                </div>
                            
                                <?php
                                    $pagamento = 0;
                                    if($pagamento > 1)
                                    {
                                        ?> 
                                            <div class="widget-box">
        									    <div class="widget-header widget-header-flat">
        										    <h4 class="widget-title">Confirmação do Pagamento</h4>
        								        </div>
        
        							            <div class="widget-body">
        										    <div class="widget-main">
        											    <div class="row">
        												    <div class="col-sm-12">
        													    <div class="alert alert-block alert-success">
        													        <p>
                            										    <strong>
                            											    <i class="ace-icon fa fa-check"></i> Parabéns!
                            										    </strong>
        												                O pagamento da sua encomenda foi efectuado com sucesso, pode proseguir para umas das seguintes opções:
        											                </p>
        											            </div>
        											        </div>
        											    </div>
        
        									            <hr />
        										        
        										        <div class="row">
        													    <div class="col-xs-12">
        													        <ul class="list-unstyled spaced2">
        													            <li>
        													                <ul class="list-inline">
        													                    <li>
            																	    <i class="ace-icon fa fa-share green bigger-110"></i>
                                                                                    <a href="/nasocial/loja/catalogo.php"> Catalogo Global</a>
            																    </li>
            																    <li>
            																        <i class="ace-icon fa fa-share green bigger-110"></i>
            																	    <a href="#">Pagamentos Efectuado</a>
            																    </li>
                                                                                <li>
            																        <i class="ace-icon fa fa-share green bigger-110"></i>
            																        <a href="/nasocial/nasocial.php">Dashboard</a>
            																    </li>
                                                                                <li>
            																        <i class="ace-icon fa fa-share green bigger-110"></i>
                                                                                    <a href="/nasocial/usuario/timeline.php">Linha do Tempo</a>
            															        </li>
            														        </ul>
            														    </li>
            												        </ul>
            											        </div>
            									            </div>
        												</div>
        											</div>
        						                </div> 
        						        <?php
            		                }
        						?>
    						
    				        </div>
    				        
    				        <?php
    				            // usado para mostrar a identidade do vendedor quando for telefone
                                if(is_mobile())
                                { 
                                    ?>
                                        <div class="col-xs-12 col-sm-4" style="margin-top:15px;"> 
                                            <div class="search-area well well-sm" style="border-radius: 5px !important;"> <?php $PagarNasocialDAO->UtilizadorRelacionadoNaCompra($usuario); ?> </div> 
                                        </div>
                                    <?php
                                }
                            ?>
                            
                            <!--//dive que mostra o produto em promoção-->
    				        <div class="col-xs-12 col-md-3">
    				            <div class="thumbnail search-thumbnail">
    					            <img class="media-object" src="https://www.lea.co.ao/artistas/capas/Calado Mas Nao Mudo.jpg" />
    					        <div class="caption">
    					            <div class="clearfix">
                                        <span class="pull-right label label-danger info-label">Ofertas</span>
                                    </div>
                                    
                                    <h3 class="search-title"> <a href="#" class="blue">Produto</a> </h3>
                                    <dl id="dt-list-1">
                                        <dt>Descrição</dt>
                                        <dd>Calado Mas Não Mudo</dd>
                                        <dt>Preço</dt>
                                        <dd>Kz 1000.00</dd>
                                    </dl>
    					        </div>
                            </div>
    				    </div>
    				    
                    </div>
                </div>
            </div>
    	</div>
    </div>
</div>

