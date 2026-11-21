<div class="input-group">
    <span class="input-group-addon">
        <input type="checkbox" id="toglePreco" onclick="toglePreco()"/>
    </span>
    <input type="text" class="form-control" value="Em promoção"  readonly>
</div><!-- /input-group -->

<div style="margin-top:10px;"></div>
<div class="form-group" style="display: none;" id="data_promocional">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-date">Período Promocional </label>
    <div class="col-sm-9" style="padding:0px">
        <div class="input-medium largura" style="width:100%;">
            <div class="input-group">
                <input style="width:100%;" name="data_nasc" class="input-medium date-picker largura" id="peridoPromocional" type="text" data-date-format="yyyy-mm-dd" placeholder="dd-mm-yyyy" value="<?php //$u_l->dataNascimento($u_fnal); ?>" />
                <span class="input-group-addon"> <i class="ace-icon fa fa-calendar"></i> </span>
            </div>
        </div>
    </div>
    <?php if(!$detect->isMobile() || $detect->isTablet()) { ?> <div style="padding:15px;"></div> <?php } ?>
</div>

<div style="margin-top:10px;"></div>                                		
<div id="preco" style="display: block;">
    <div class="input-group">
        <span class="input-group-addon" >Preço</span>
        <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php print money_format("%!n",$AGENDA_EVENTO->PrecoServicoProduto($usuario_final,$id,$cat)); ?>" id="preco_normal"  style="border-radius:5px;text-align:right;">
    </div>
</div>
<div id="preco_promocional" style="display: none;">
    <div class="input-group" >
        <span class="input-group-addon" >Preço Promocional  </span>
        <input type="text" class="form-control" aria-describedby="basic-addon1" value="" id="precoPromocional"  style="border-radius:5px;text-align:right;">
    </div>
</div>
<div style="margin-top:10px;"></div>
<div class="input-group">
    <span class="input-group-addon target_diminuir" id="target_diminuir">-</span>
    <script> var js_qtd = "<?php print $AGENDA_EVENTO->QuantidadeServicoProduto($usuario_final,$id_,$cat); ?>"; </script>
    <input id="qtd" type="text" class="form-control" style="text-align:center;" aria-label="Amount (to the nearest dollar)" value="<?php print $AGENDA_EVENTO->QuantidadeServicoProduto($usuario_final,$id_,$cat); ?>">
    <span class="input-group-addon target_aumenta" id="target_aumenta">+</span>
</div>

<div style="margin-top:10px;"></div>
<div class="form-group" style="" id=" ">
    <?php
        if(is_mobile())
        {
            ?>
                <label class="col-sm-3 control-label no-padding-right" for="form-field-date">Estado de uso </label>
                <div class="col-sm-9" style="padding:0px">
                    <div class="input-medium largura" style="width:100%;">
                        <div class="input-group" style="width:100%;">
                            <select style="width:100%;" id="estadoProduto" onchange="verificarEstado(this.value)">
                                <option value="0">Selecionar uma opção</option>
                                <option value="1">Produto digital</option>
                                <option value="2">Novo na caixa</option>
                                <option value="3">Novo semi usado</option>
                                <option value="4">Usado em boas condições</option>
                                <option value="5">Usado com mazelas</option>
                            </select>
                        </div>
                    </div>
                </div>
            <?php
        }else{
            ?>
                <div class="input-group">
                    <span class="input-group-addon">Estado de uso</span>
                    <select style="width:100%;" id="estadoProduto" onchange="verificarEstado(this.value)">
                        <option value="0">Selecionar uma opção</option>
                        <option value="1">Produto digital</option>
                        <option value="2">Novo na caixa</option>
                        <option value="3">Novo semi usado</option>
                        <option value="4">Usado em boas condições</option>
                        <option value="5">Usado com mazelas</option>
                    </select>
                </div>
            <?php
        }
    ?>
    
</div>

<div>
    <h5><b>Preferências de como receber</b></h5>
    Os compradores poderão ver suas preferências em sua listagem. <a href="#">Saiba mais</a>
</div>

<div id="divDownload" style="display:none">
    <div style="margin-top:10px;"></div>
    <div class="input-group">
      <span class="input-group-addon" style="padding:0px;"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M480-320 280-520l56-58 104 104v-326h80v326l104-104 56 58-200 200ZM240-160q-33 0-56.5-23.5T160-240v-120h80v120h480v-120h80v120q0 33-23.5 56.5T720-160H240Z"/></svg></span>
      <input type="text" class="form-control" value="Disponível para download" readonly>
      <span class="input-group-addon"><input type="checkbox" id="opcDownload" checked disabled /></span>
    </div>
</div>

<div id="divOtrasOps" style="display:block">
    <div style="margin-top:10px;"></div>
    <div class="input-group">
      <span class="input-group-addon" style="padding:0px;"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm-40-82v-78q-33 0-56.5-23.5T360-320v-40L168-552q-3 18-5.5 36t-2.5 36q0 121 79.5 212T440-162Zm276-102q20-22 36-47.5t26.5-53q10.5-27.5 16-56.5t5.5-59q0-98-54.5-179T600-776v16q0 33-23.5 56.5T520-680h-80v80q0 17-11.5 28.5T400-560h-80v80h240q17 0 28.5 11.5T600-440v120h40q26 0 47 15.5t29 40.5Z"/></svg></span>
      <input type="text" class="form-control" value="Encontro em publico" readonly>
      <span class="input-group-addon"><input type="checkbox" id="encontroPublico"/></span>
    </div>
    
    <div style="margin-top:10px;"></div> 
    <div class="input-group">
      <span class="input-group-addon" style="padding:0px;"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M440-440q17 0 28.5-11.5T480-480q0-17-11.5-28.5T440-520q-17 0-28.5 11.5T400-480q0 17 11.5 28.5T440-440ZM280-120v-80l240-40v-445q0-15-9-27t-23-14l-208-34v-80l220 36q44 8 72 41t28 77v512l-320 54Zm-160 0v-80h80v-560q0-34 23.5-57t56.5-23h400q34 0 57 23t23 57v560h80v80H120Zm160-80h400v-560H280v560Z"/></svg></span>
      <input type="text" class="form-control" value="Pegar na porta" readonly>
      <span class="input-group-addon"><input type="checkbox" id="pegarNaPorta"/></span>
    </div>
    
    <div style="margin-top:10px;"></div>
    <div class="input-group">
      <span class="input-group-addon" style="padding:0px;"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M440-440q17 0 28.5-11.5T480-480q0-17-11.5-28.5T440-520q-17 0-28.5 11.5T400-480q0 17 11.5 28.5T440-440ZM280-120v-80l240-40v-445q0-15-9-27t-23-14l-208-34v-80l220 36q44 8 72 41t28 77v512l-320 54Zm-160 0v-80h80v-560q0-34 23.5-57t56.5-23h400q34 0 57 23t23 57v560h80v80H120Zm160-80h400v-560H280v560Z"/></svg></span>
      <input type="text" class="form-control" value="Entregar na porta" readonly>
      <span class="input-group-addon"><input type="checkbox" id="entregarNaPorta"/></span>
    </div>
</div>

<div style="margin-top:10px;"></div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-comment">Descrição</label>
        <div class="col-sm-9" style="padding:0px">
        <textarea class="largura" name="sobre_me" id="descricao"  style="width:100%;"><?php //$u_l->sobreUsuario($u_fnal); ?></textarea>
    </div>
</div>

<!--
<input type="hidden" id="id" value="">
<input type="hidden" id="id_" value="">-->

<?php if(!$detect->isMobile()) { ?> <div style="padding:30px;"></div> <?php } ?>

<div style="margin-top:10px;"></div>
<a href="#" class="btn btn-success" onclick="ActualizarProdutoServico()" style="width:100%; border-radius:5px;">
    <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar 
</a>
<div style="margin-top:10px;"></div>
<?php
    if($cat == 1)
    {
        ?>
            <a href="#" class="btn btn-danger" onclick="#" style="width:100%; border-radius:5px;">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar 
            </a>
        <?php 
    }elseif($cat == 2)
    { //Livros
        ?>
            <a href="https://www.lea.co.ao/nasocial/logica/controller/GerirProdutoServicoController.php?id_ps=<?php print $id_; ?>&accao=1" class="btn btn-danger" onclick="#" style="width:100%; border-radius:5px;">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar 
            </a>
        <?php
    }elseif($cat == 3){ //Disco / Produto
        ?>
            <a href="https://www.lea.co.ao/nasocial/logica/controller/GerirProdutoServicoController.php?id_ps=<?php print $id_; ?>&accao=0" class="btn btn-danger" style="width:100%; border-radius:5px;">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar 
            </a>
        <?php
    }elseif($cat == 4){ //Ingressos
        ?>
            <a href="/nasocial/logica/controller/agenda/eliminarEventoController.php?id_agen=<?php print $id_; ?>&u_e=<?php print $us; ?>" class="btn btn-danger" onclick="#" style="width:100%; border-radius:5px;">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar 
            </a>
        <?php
    }elseif($cat == 5){
        ?>
            <a href="#" class="btn btn-danger" onclick="#" style="width:100%; border-radius:5px;">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar 
            </a>
        <?php
    }
?>

<div style="margin-top:20px;"></div>
<hr/> 
<ul class="list-group">
    <a href="#" class="list-group-item active"> Encomendas</a>
    <li class="list-group-item" style="border:0px; margin-top:1px;">
        <span class="badge">0.00 <b>AO</b></span> <b>Possiveis Vendas</b>
    </li>
</ul>

<script src="/nasocial/assets/js/bootstrap-datepicker.min.js"></script>

<script>
    function ActualizarProdutoServico()
    {
        var accao = 11;
        var ce_agenda_estoque = $("#ce_agenda_estoque").val();
        var ce_usuario = $("#ce_usuario").val();
        var isPromocao = $("#toglePreco").is(":checked");
        var data_fim = $("#peridoPromocional").val();
        var precoPromocional = $("#precoPromocional").val();
        var preco = $("#preco_normal").val();
        var qtd = $("#qtd").val();
        var estadoProduto = $("#estadoProduto").val();
        var encontroPublico = $("#encontroPublico").is(":checked");
        var opcDownload = $("#opcDownload").is(":checked");
        var pegarNaPorta = $("#pegarNaPorta").is(":checked");
        var entregarNaPorta = $("#entregarNaPorta").is(":checked");
        var descricao = $("#descricao").val();
        
        $.post('/nasocial/logica/controller/ActualizarProdutoServicoController.php', 
        {
            accao : accao,
            ce_agenda_estoque : ce_agenda_estoque,
            ce_usuario : ce_usuario,
            isPromocao : isPromocao,
            data_fim : data_fim,
            precoPromocional : precoPromocional,
            preco : preco,
            qtd : qtd,
            estadoProduto : estadoProduto,
            opcDownload : opcDownload,
            encontroPublico : encontroPublico,
            pegarNaPorta : pegarNaPorta,
            entregarNaPorta : entregarNaPorta,
            descricao : descricao
        }, 
        function(response)
        {
            console.log(response);
            
        });
    }
    //
    function EliminarProdutoServico()
    {
        var cat = $("#cat").val();
        var id = $("#id_").val();
        var preco = $("#preco").val();
        var preco_promocional = $("#preco_promocional").val();
        var qtd = $("#qtd").val();
        var accao = 10;
        
        $.post('/nasocial/logica/controller/agenda/EcomendarEventoController.php', 
        {
            cat:cat,
            id:id,
            preco:preco,
            preco_promocional:preco_promocional,
            qtd:qtd,
            accao:accao
        }, 
        function(response)
        {
            console.log(response);
            
        });
    } 
    //
    function toglePreco()
    {
        var preco = document.getElementById("preco");
        var preco_promocional = document.getElementById("preco_promocional");
        var data_promocional = document.getElementById("data_promocional");
        const cb = document.querySelector('#toglePreco');
        
        if (cb.checked) {
            preco.style.display = "none";
            preco_promocional.style.display = "block";
            data_promocional.style.display = "block";
        } else {
            preco.style.display = "block";
            preco_promocional.style.display = "none";
            data_promocional.style.display = "none";
        }
    }
    //
    //custom date editable
    $('#signup').editable({
        type: 'adate',
        date: {
            //datepicker plugin options
            format: 'yyyy/mm/dd',
            viewformat: 'yyyy/mm/dd',
            weekStart: 1
						 
            //,nativeUI: true//if true and browser support input[type=date], native browser control will be used
            //,format: 'yyyy-mm-dd',
            //viewformat: 'yyyy-mm-dd'
        }
    })
    //
    function verificarEstado(valor) {
        if (valor === "1") {
            divDownload.style.display = "block";
            divOtrasOps.style.display = "none";
        }else{
            divDownload.style.display = "none";
            divOtrasOps.style.display = "block";
        }
    }

				
</script>