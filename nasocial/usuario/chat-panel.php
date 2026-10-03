<div class="widget-box">
    <div class="widget-header" style="padding:  0px;">
        <h4 class="widget-title lighter smaller">
            <i class="ace-icon fa fa-comment blue" style="padding-left: 5px;"></i> Conversas
        </h4>                                                                                            
        <form action="/nasocial/logica/controller/chatController/chatController.php" method="post">
            <div class="form-actions" style="margin:0px;padding: 2px;">
                <div class="input-group">
                    <input placeholder="Sua mensagem aqui ..." type="text" class="form-control" name="mensagem" required="required" />
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-info no-radius" type="submit"> <i class="ace-icon fa fa-share"></i> Enviar </button>
                    </span>
                </div>
            </div>
            <input type="hidden" name='ce_usuario' value="<?php $ce_usuario_ = $ce_u; print $ce_usuario_; ?>">
            <?php 
                $ce_amigo = $amg; 
                if($ce_amigo != null) { 
                    ?>  <input type="hidden" name='ce_amigo' value="<?php print $ce_amigo; ?>"> <?php
                } 
            ?>                            
        </form>
    </div>
                    
    <div class="widget-body">
        <div class="widget-main no-padding">
            <div class="dialogs" style="padding: 2px !important;">
                <?php 
                    $ce_amigo_ = $amg; 
                    $ce_usuario_ = $ce_u; 
                    $mensagemDAO->conversas($ce_usuario_,$ce_amigo_);  
                ?>
            </div>
        </div><!-- /.widget-main -->
    </div><!-- /.widget-body -->
</div><!-- /.widget-box -->
