<ul class="list-group" style="margin-bottom:10px;">
    <li class="list-group-item" style="padding:6px 4px 4px 8px;height:51px;">
        <div style="float:left;">
            <?php
                if($row->fotoPerfil != '' && $row->fotoPerfil != null) {
                    ?> <a href="/nasocial/usuario/per-ami.php?ami=<?php print $UtilidadeDAO->Codificar($row->ce_usuario); ?>"><img alt="<?php print $row->username; ?>" src="<?php print $row->fotoPerfil;?>" style="width:35px; height:35px;border-radius: 50%; border:#ccc solid 1px; margin-right:6px; " /></a><?php
                }else if($row->ce_sexo == 1) {
                    ?> <a href="/nasocial/usuario/per-ami.php?ami=<?php print $UtilidadeDAO->Codificar($row->ce_usuario); ?>"><img alt="<?php print $row->username; ?>" src="/nasocial/assets/images/avatars/avatar.png" style="width:35px; height:35px;border-radius: 50%; border:#ccc solid 1px; margin-right:6px;" /></a><?php
                }else if($row->ce_sexo == 2) {
                    ?> <a href="/nasocial/usuario/per-ami.php?ami=<?php print $UtilidadeDAO->Codificar($row->ce_usuario); ?>"><img alt="<?php print $row->username; ?>" src="/nasocial/assets/images/avatars/avatar3.png" style="width:35px; height:35px;border-radius: 50%; border:#ccc solid 1px;margin-right:6px;" /></a><?php
                }else{
                    ?> <a href="/nasocial/usuario/per-ami.php?ami=<?php print $UtilidadeDAO->Codificar($row->ce_usuario); ?>"><img alt="<?php print $row->username; ?>" src="/nasocial/assets/images/avatars/avatar2.png" style="width:35px; height:35px;border-radius: 50%; border:#ccc solid 1px;margin-right:6px;" /></a><?php   
                }
            ?>
        </div>
        <div style="float:left;">
            <p style="line-height :15px;padding-top:3px;"><a href="/nasocial/usuario/per-ami.php?ami=<?php print $UtilidadeDAO->Codificar($row->ce_usuario); ?>" class="blue" > <b><?php print strtolower($row->username); ?></b> </a><br/>
            <span style="font-size:12px;color:#A8A7A7;"><i class="ace-icon fa fa-clock-o bigger-110"></i> <?php print $row->hora; ?></span></p>
        </div>    
        <div style="float:right;padding:8px;">
            <a href="#"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span></a>    
        </div>   
    </li>
    <?php
        if($row->img_publicacao != "/nasocial/imgs/posts/" && $row->img_publicacao != '' && $row->img_publicacao != null)
        {
            ?> 
                <li class="list-group-item" style="padding:0px; text-align:center;">
                    <a href="/nasocial/usuario/publicacao.php?id_p=<?php print $UtilidadeDAO->Codificar($row->id_linha_tempo); ?>">
                        <img alt="<?php print $row->d_nome; ?>" src="<?php print $row->img_publicacao; ?>"  style=" margin-top:0px;max-width: 100%;" />
                    </a>
                </li>
            <?php 
        }
    ?>
    <li class="list-group-item"><?php print $row->post;?></li>
    <li class="list-group-item" style="padding:0px;">
        <ul class="nav nav-pills" style="padding:0px;margin-left:2px;">
            <li role="presentation"><a onclick="var amei = this; $.post('/nasocial/logica/controller/reacoesController.php', { id_reacoes:1,user_id:'<?php print $usuario_final; ?>',id_linha_tempo:'<?php print $UtilidadeDAO->Codificar($row->id_linha_tempo); ?>'}, function(e){ $(amei).find('#amei_div').html(e); });"  style="font-size:20px; padding:0px 10px 0px 10px;color:red;cursor: pointer;"><?php echo "\u{2764}";?><span style="font-size:12px;">(<span id="amei_div"><?php echo $ReacoesDAO->TotalReacoesAmei($UtilidadeDAO->Codificar($row->id_linha_tempo),1); ?></span>)</span></a></li>
            <li role="presentation"><a onclick="var engracado = this; $.post('/nasocial/logica/controller/reacoesController.php', { id_reacoes:2,user_id:'<?php print $usuario_final; ?>',id_linha_tempo:'<?php print $UtilidadeDAO->Codificar($row->id_linha_tempo); ?>'}, function(e){ $(engracado).find('#engracado_div').html(e); });" style="font-size:20px; padding:0px 10px 0px 10px;cursor: pointer;"><?php echo "\u{1F600}";?><span style="font-size:12px;">(<span id="engracado_div"><?php echo $ReacoesDAO->TotalReacoesEngracado($UtilidadeDAO->Codificar($row->id_linha_tempo),2); ?></span>)</span></a></li>
            <li role="presentation"><a onclick="var triste = this; $.post('/nasocial/logica/controller/reacoesController.php', { id_reacoes:3,user_id:'<?php print $usuario_final; ?>',id_linha_tempo:'<?php print $UtilidadeDAO->Codificar($row->id_linha_tempo); ?>'}, function(e){ $(triste).find('#triste_div').html(e); });" style="font-size:20px; padding:0px 10px 0px 10px;cursor: pointer;">  <?php echo "\u{1F625}";?><span style="font-size:12px;">(<span id="triste_div"><?php echo $ReacoesDAO->TotalReacoesTriste($UtilidadeDAO->Codificar($row->id_linha_tempo),3); ?></span>)</span></a></li>
            <li role="presentation"><a onclick="var supreso = this; $.post('/nasocial/logica/controller/reacoesController.php', { id_reacoes:6,user_id:'<?php print $usuario_final; ?>',id_linha_tempo:'<?php print $UtilidadeDAO->Codificar($row->id_linha_tempo); ?>'}, function(e){ $(supreso).find('#supreso_div').html(e); });" style="font-size:20px; padding:0px 10px 0px 10px;cursor: pointer;">  <?php echo "\u{1F62E}";?><span style="font-size:12px;">(<span id="supreso_div"><?php echo $ReacoesDAO->TotalReacoesSupreso($UtilidadeDAO->Codificar($row->id_linha_tempo),6); ?></span>)</span></a></li>
            <li role="presentation"><a onclick="var chateado = this; $.post('/nasocial/logica/controller/reacoesController.php', { id_reacoes:5,user_id:'<?php print $usuario_final; ?>',id_linha_tempo:'<?php print $UtilidadeDAO->Codificar($row->id_linha_tempo); ?>'}, function(e){ $(chateado).find('#chateado_div').html(e); });" style="font-size:20px; padding:0px 10px 0px 10px;cursor: pointer;">  <?php echo "\u{1F621}";?><span style="font-size:12px;">(<span id="chateado_div"><?php echo $ReacoesDAO->TotalReacoesChateado($UtilidadeDAO->Codificar($row->id_linha_tempo),5); ?></span>)</span></a></li>
        </ul>
    </li>
    <li class="list-group-item" style="padding:0px;">
        <div class="btn-group btn-group-justified" role="group" aria-label="..." style="padding:0px;">
            <div class="btn-group" role="group">
                <button type="button" onclick="var elene = this; $.post('/nasocial/logica/controller/comentariosController.php', { id_publicacao:'<?php print $UtilidadeDAO->Codificar($row->id_linha_tempo); ?>', fk_utilizador:'<?php print $usuario_final; ?>', origem:400, origem_:0}, function(e){ $(elene).find('#counts').html(e); });" class="btn"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> (<span id="counts"><?php print $Comentario->TotalDeCurtidasComentarios($UtilidadeDAO->Codificar($row->id_linha_tempo));?></span>)</button>
            </div>
            <div class="btn-group" role="group">
                <button onclick="FormularioComentarios.call(this)" type="button" title="Comentários" class="btn"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> (<?php print $this->TotalDeComentarios($UtilidadeDAO->Codificar($row->id_linha_tempo)); ?>)</button>
            </div>
            <div class="btn-group" role="group">
                <a href="/nasocial/usuario/publicacao.php?id_p=<?php print $UtilidadeDAO->Codificar($row->id_linha_tempo); ?>" class="btn"><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> Mais</a>
            </div>
        </div>
    </li>
    <!--<li class="list-group-item">Vestibulum at eros</li>-->
    <li class="list-group-item" id="comentar" style="display:none; padding:0px;">
        <div class="widget-header" >
            <h4 class="widget-title lighter smaller"> <i class="ace-icon fa fa-comment blue"></i> Comentários </h4>
        </div>
        <form action="/nasocial/logica/controller/comentariosController.php" method="POST">
            <div class="form-actions" style="margin:0px 0px 0px 0px;">
                <div class="input-group">
                    <input placeholder="Seu Comentario ..." type="text" class="form-control" name="comentario" />
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-info no-radius" type="submit"> <i class="ace-icon fa fa-share"></i> <?php if(!is_mobile()){ echo "Enviar";} ?>  </button>
                    </span>
                </div>
            </div>
            <input type="hidden" name="id_publicacao" value="<?php print $UtilidadeDAO->Codificar($row->id_linha_tempo); ?>">
            <input type="hidden" name="fk_utilizador" value="<?php print $usuario_final; ?>">
            <input type="hidden" name="origem" value="0">
        </form>
        <?php $this->ComentariosPrincipal($UtilidadeDAO->Codificar($row->id_linha_tempo),$limite);?> 
    </li>
</ul>