<?php
    $chaveEncomenda = $EncomendaNasocialDAO->chaveDaEncomenda($usuario_final,$id,$us);
    
    if($EncomendaNasocialDAO->EncomendaExistente($usuario_final,$id) > 0)
    {
        setlocale(LC_MONETARY, "de_DE");
        ?>
            <div class="input-group">
                <span class="input-group-addon" style="font-weight:bolder;">Referência: <?php print $EncomendaNasocialDAO->ReferenciaEncomendada($chaveEncomenda);?></span>
            </div>
            <div style="margin-top:10px;"></div>
            <div class="input-group">
                <span class="input-group-addon" id="qtdLab" style="border-radius:5px 0px 0px 5px !important;">Quantidade</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php print $EncomendaNasocialDAO->QuantidadeEncomendada($chaveEncomenda); ?>" id="qtd_total"  style="padding-right:15px; border-radius:0px 5px 5px 0px !important; text-align:right; font-size:18px;" readonly>
            </div>
            <div style="margin-top:10px;"></div>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="padding-left:57px; border-radius:5px 0px 0px 5px !important;">Total</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php print money_format("%!n",$EncomendaNasocialDAO->TotalApagarEncomenda($chaveEncomenda)); ?> Kz" id="preco_total"  style="padding-right:15px; border-radius:0px 5px 5px 0px !important; text-align:right; font-size:18px; color:#ff4200;" readonly>
            </div>
            <div style="margin-top:10px;"></div>
            <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $chaveEncomenda; ?>&dtls=false&ent=<?php print $cat; ?>" class="btn-minier btn btn-success" type="button" style="width:100%; border-radius:5px;">
                <span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span> Pagar Encomenda
            </a>
            <div style="margin-top:10px;"></div>
            <div class="row">
                <div class="col-sm-6" style="margin-bottom: 10px;">
                    <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $chaveEncomenda; ?>&dtls=true&ent=2&abe=1" class="btn btn-minier btn-abr" type="button" style="width:100%; border-radius:5px;">
                        <span class="glyphicon glyphicon-folder-open" style="margin-right:4px;" aria-hidden="true"></span> Encomenda 
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="#" class="btn btn-danger btn-minier" type="button" style="width:100%; border-radius:5px;" onClick="EliminarEncomenda(<?php print $chaveEncomenda; ?>)">
                        <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Cancelar 
                    </a>
                </div>
            </div>
            <div style="margin-top:10px;"> </div>
        <?php
    }
    else
    {
        ?>
            <div id="encomendar" style="display:block">
                
                <?php
                    if($EncomendaNasocialDAO->ConfirmarExistenciaDeEncomendasNoCarrinhoNassocial($usuario_final,$us) > 0) 
                    {
                        ?>
                            <div class="input-group" style="margin-bottom:10px;border-radius:5px 5px 5px 5px !important; width:100%;">
                                <button id="estadoEncomenda" type="button" value="true" class="btn btn-primary" style="padding:8px;width:100%; border-radius:5px 5px 5px 5px !important;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                                        <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5"/>
                                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
                                    </svg>  <span style="margin-left:15px;padding-bottom:3px;"> Adicionar a uma Encomenda </span> 
                                </button>
                                <select id="encomendas" class="form-control" style="border-radius:5px 5px 5px 5px !important; display:none" readonly="readonly">
                                    <option value="0">Seleciona Uma Encomenda</option> 
                                    <?php $EncomendaNasocialDAO->EncomendasParaAnexarNassocial($usuario_final); ?>
                                </select>
                            </div>
                            <div class="input-group" style="margin-bottom:10px;border-radius:5px 5px 5px 5px !important; width:100%;">
                                <button id="voltarEstado" type="button" value="true" class="btn btn-primary" style="width:100%; hieght:6px; font-size:10px; border-radius:5px 5px 5px 5px !important;display:none;">
                                    Adicionar Como Uma Nova Encomenda  
                                </button>
                            </div>
                        <?php
                    }
                ?>
                
                <button class="btn btn-danger" type="button" style="width:100%; border-radius:5px; padding:0px;" id="btn-click">
                    <span style="font-size:30px;" id="preco_tag"></span> Kz 
                </button>
                <div style="margin-top:10px;"></div>
                <div class="input-group" >
                    <span class="input-group-addon target_diminuir" id="target_diminuir" style="border-radius:5px 0px 0px 5px!important;">-</span>
                    <input id="qtd" type="text" class="form-control quantidade" aria-label="Amount (to the nearest dollar)" value="1">
                    <span class="input-group-addon target_aumenta" id="target_aumenta" style="border-radius:0px 5px 5px 0px!important;">+</span>
                </div>
                <div style="margin-top:10px;"></div>
                <button onclick="EncomendarNasocial();" class="btn btn-success btn-minier" type="button" style="width:100%; border-radius:5px;" id="btn-click">
                    <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Comprar 
                </button>
                <div style="margin-top:10px;"></div>
                <a href="https://www.lea.co.ao/nasocial/loja/catalogo.php?cat=1&us=<?php print $us; ?>" class="btn btn-default btn-minier" type="button" style="width:100%; border-radius:5px;">
                    <span class="glyphicon glyphicon-tag" aria-hidden="true"></span> Catálogo 
                </a>
                <div style="margin-top:10px;"></div>
                <a href="https://www.lea.co.ao/nasocial/loja/kitanda-dos-outros.php" class="btn btn-default btn-minier" type="button" style="width:100%; border-radius:5px;">
                    <span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span> Regressar 
                </a>
                
                <input id="preco_painel" type="hidden" value="<?php print $EncomendaNasocialDAO->PrecoEncomendaNasocial($us,$id,$cat); ?>">
                
            </div>
            
            <div id="pagar" style="display:none">
                <div class="input-group">
                    <span class="input-group-addon" style="border-radius:5px 0px 0px 5px !important;">Quantidade</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php print $EncomendaNasocialDAO->EncomendaExistente($us,$id); ?>" id="qtd_total"  style="padding-right:15px; border-radius:0px 5px 5px 0px !important; text-align:right; font-size:18px;" readonly>
                </div>
                <div style="margin-top:10px;"></div>
                <div class="input-group">
                    <span class="input-group-addon" style="padding-left:29px; border-radius:5px 0px 0px 5px !important;">Sub-Total</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" value="0" id="preco_total"  style="padding-right:15px; border-radius:0px 5px 5px 0px !important; text-align:right; font-size:18px;" readonly>
                </div>
                <div style="margin-top:10px;"></div>
                <a href="#" class="btn btn-success btn-minier" type="button" style="width:100%; border-radius:5px;" onClick="PagarEncomenda()">
                    <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Pagar 
                </a>
                <div style="margin-top:10px;"></div>
                <div class="row">
                    <div class="col-sm-6" style="margin-bottom: 10px;">
                        <a href="#" class="btn btn-minier btn-abr" type="button" style="width:100%; border-radius:5px;" onClick="AbrirEncomenda()">
                            <span class="glyphicon glyphicon-folder-open" style="margin-right:4px;" aria-hidden="true"></span> Encomenda 
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="btn btn-danger btn-minier" type="button" style="width:100%; border-radius:5px;" onClick="EliminarEncomenda(<?php print $chaveEncomenda; ?>)">
                            <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Cancelar 
                        </a>
                    </div>
                </div>
            </div>
            <div style="margin-top:10px;"></div>
        <?php
    }
?>
