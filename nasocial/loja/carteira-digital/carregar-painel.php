<style>
    .largura
    {
        width:100%;
        border-radius:5px;
    }
    
    .p-card
    {
       background-color:#FC7619;
       border-radius: 10px;
       padding:6px 30px 6px 30px;
    }
    
    .s-card
    {
        background-color:#C1F010;
        border-radius: 10px;
        height:100px;
    }
    .t-card
    {
       background-color:#1DF010;
       border-radius: 10px;
       height:100px;
    }
    
    .q-card
    {
        background-color:#10F08E;
        border-radius: 10px;
        height:100px;
    }
    .qi-card
    {
        background-color:#B990FA;
        border-radius: 10px;
        height:100px;
    }
    .pontos{
        color:#fff;
    }
    .txt-centro{
        width:100%;
    }
    .resgate{border-radius:3px;background:#3498DB;}
    .alerta-box{background:#bae0fa;margin-top:8px;border-radius:5px;color:#022e4d;border:#51b2f6 1px solid;font-size:10px;padding:4px 10px 4px 10px;}
    .txt-size-box{font-size:12px;padding:4px !important;text-align:center;}
    .txt-size{font-size:9px;padding:4px !important;text-align:center;}
    .txt-size-m{font-size:9px;border-radius:5px;padding:2px 4px 0px 4px;height:14px;}
    .txt-icon{font-size:14px;}
</style>

<div class="row">
    <div class="col-md-12">
        <hr style=" margin-top:0px;"/>
        <?php
            $carteira = 0;
            if($carteira > 0){
                ?> <button class="btn-success largura" style="margin:0px 0px 20px 0px;"> <b>Total Disponível</b>: 0.00 </button> <?php
            }else{
               ?> <button class="btn-danger largura" style="margin:0px 0px 20px 0px;"> <b>Total Disponível</b>: 0.00 </button> <?php
            }
        ?>
        
        <div class="widget-body" style="margin-top:0px;">
            <div class="widget-main" style="margin-top:0px;padding:0px;">
                <div class="alert alert-info">
                    <div class="form-group" style="margin-bottom:0px;">
                        <?php
                            if(is_mobile())
                            {
                                ?>
                                    <label class="col-sm-3 control-label no-padding-right" style="color:#022e4d;"><b>Valor a Carregar AO</b></label>
                                    <div class="col-sm-9" style="padding:0px">
                                        <div class="input-medium largura" style="width:100%;">
                                            <div class="input-group" style="width:100%;">
                                                <input type="text" style="width:100%;border-radius:5px !important;text-align:right;">
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }else{
                                ?>
                                    <div class="input-group">
                                        <span class="input-group-addon" style="color:#022e4d;border-radius:5px 0px 0px 5px !important"><b>Valor a Carregar AO</b></span>
                                        <input type="text" style="width:100%;border-radius:0px 5px 5px 0px !important;text-align:right;">
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                    
                    <span class="badge" style="margin:0px 4px 0px 5px;padding:0px !important;background:#c9e8fd;"><input type="checkbox" ></span><span style="font-size:10px;margin-bottom:4px;">Concordo com os termos de uso</span> 
                     
                    <button class="btn-success largura" style="margin:4px 0px 4px 0px;">
                        CONFIRMAR VIA WHATSAPP
                    </button>
                    <div class="alert alert-info alerta-box">
                        Após realizar um pagamento via transferência bancária, depósito, MB Way ou PayPal, envie o comprovativo pelo WhatsApp para validação. Assim que a confirmação for efetuada, o saldo será carregado na sua carteira.
                    </div>
                    
                </div>
            </div>
        </div>
        
        <br/>
        <!--
        <div class="panel panel-default">
            <div class="panel-heading"><b>Carregamentos</b></div>
            <div class="panel-body" style="padding:0px;">
                <table class="table table-striped table-bordered" style="margin-bottom:0px;">
                    <thead>
                        <tr>
                            <th class="center txt-size-box">#</th>
                            <th class="txt-size-box">Data</th>
                            <th class="txt-size-box">Ref.</th>
                            <th class="txt-size-box">Total</th>
                            <th class="txt-size-box">Estado</th>
                            <th class="txt-size-box"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="txt-size" style="text-align:center;width:5%;"></th>
                            <th class="txt-size"></th>
                            <th class="txt-size"></th>
                            <th class="txt-size"></th>
                            <th class="txt-size"><!--<span class="label label-warning txt-size-m">Pendente</span></th>
                            <th class="txt-size" style="width:8%;padding:3px 0px 0px 0px !important;"> <!--<a href="#"><span class="glyphicon glyphicon-eye-open txt-icon"></span></a> </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        -->
    </div>
</div>

