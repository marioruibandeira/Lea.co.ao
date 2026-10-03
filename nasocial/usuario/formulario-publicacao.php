<div class="widget-box">
    <div class="widget-header" style="padding:  0px;">
        <h4 class="widget-title lighter smaller"> <i class="ace-icon fa fa-comment blue" style="padding-left: 25px;"></i> Qual é a ideia? </h4>
        <form action="/nasocial/logica/controller/usuario/timelineInlineFormularioController.php" enctype="multipart/form-data" method="post">
            <div class="form-actions" style="margin:  0px; padding:  10px 0px 0px 0px;">
                <div class="input-group">
                    <div class="form-row">
                        <div class="col-md-12 mb-12" style="margin:0px 0px 8px 0px; width: 100%;">
                            <textarea class="form-control" name="pblicacao" placeholder="Qua é a ideia?..." id="TextBox1" style="height: 100%; width: 100%" onblur="this.value=removedorSpaco(this.value);"></textarea>
                        </div>
                        <div class="col-md-6 mb-6" style="margin:0px 0px 8px 0px;"> <input name="img_pblicacao" type="file" style="width:100%;"/></div>
                        <div class="col-md-6 mb-6" style="margin:0px 0px 8px 0px;">
                            <button style="width:100%;" class="btn btn-sm btn-info no-radius" type="submit"> <i class="ace-icon fa fa-share"></i> Publicar </button> 
                        </div>
                    </div>                 
                </div>
                <input type="hidden" name="usuario" value="<?php print $u_fnal; ?>">
            </div>
        </form>
    </div>
</div>