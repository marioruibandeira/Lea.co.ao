<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.ComentariosDAO.php'); 
    $Comentario = new ComentariosDAO();
?>
<div class="well well-lg" style="padding: 10px; margin-bottom:4px;">
    <div class="row" >
        <div class="col-xs-6 col-md-6" style="padding-left: 10px; margin-bottom:0px;"> <?php $postes->UtilizadorPublicacao($id_p_,$usuario_final); ?>  </div>
        <div class="col-xs-6 col-md-6" style="text-align:right;">  <p><?php $postes->DataHoraPublicacao($id_p_); ?></p>  </div>
    </div>
    <div class="hr dotted" style="padding-top: 0px; margin-top:0px;"></div>
    <?php $postes->fotoPublicacao($id_p_); ?>
    <?php 
        $string_count = strlen($postes->publicacaoPPublicacao($id_p_));
        if($string_count > 0) { print $postes->publicacaoPPublicacao($id_p_). '<div class="hr dotted"></div>';}
	?>
	<div class="text-right">
	    <form action="/nasocial/logica/controller/comentariosController.php" method="POST"  class="btn btn-round" style="border:0px; padding:0px;margin-bottom: 2px;">
	        <button type="button" class="btn btn-default btn-round btn-sm btn-white" title="Comentários" style="margin-bottom: 3px;">
		        <i class="ace-icon glyphicon glyphicon-comment red1"></i> <span class="badge badge-primary"><?php print $ComentarioDAO->TotalDeComentarios($id_p_); ?></span>
	        </button>
	     </form>  
	   <form action="/nasocial/logica/controller/comentariosController.php" method="POST" class="btn btn-round" style="border:0px; padding:0px;margin-bottom: 2px;"> 
                <?php
        	        if($Comentario->VerificarExistenGostoPublicacao($id_p_,$usuario_final) > 0)
        	        {
        	            ?> <button type="submit" class="btn btn-default btn-round btn-sm btn-white" title="Nolimão" style="margin-bottom: 3px;">                                         
                    	        <i class="ace-icon fa fa-thumbs-up red1"></i> <span class="badge badge-primary"><?php print $Comentario->TotalDeCurtidasComentarios($id_p_);?> </span> 
                        </button> <?php
        	        }else{
                        ?> <button type="submit" class="btn btn-default btn-round btn-sm btn-white" title="Nolimão" style="margin-bottom: 3px;">                                         
                                <i class="ace-icon fa fa-thumbs-up red1"></i> <span class="badge badge-primary"><?php print $Comentario->TotalDeCurtidasComentarios($id_p_);?></span> 
                        </button> <?php
        	        }
    	        ?>
    	        <input type="hidden" name="id_publicacao" value="<?php print $id_p_; ?>">
    	        <input type="hidden" name="fk_utilizador" value="<?php print $usuario_final; ?>">
    	        <input type="hidden" name="origem" value="400">
    	        <input type="hidden" name="origem_" value="40">
    	   </form>
	        
	        
	        <a href="/nasocial/usuario/timeline.php" class="btn btn-default btn-round btn-sm btn-white" title="Comentar" style="margin-bottom: 3px;"> 
			    <i class="ace-icon fa fa-arrow-circle-left red1"></i> <span class="badge badge-primary">Voltar</span>                                                 
	        </a>
	        <?php
	            if($postes->CategoriaPublicacao($id_p_) === '2'){
				    ?> 
					    <button type="submit" class="btn btn-default btn-round btn-sm btn-white" title="Comprar" style="margin-bottom: 3px;"> 
						    <i class="ace-icon glyphicon glyphicon-shopping-cart red2"></i> 
					    </button>
				    <?php
		        }
	        ?>
        
         
	    
    </div>
    
    <!--<div id="myDIV" style="display:none;"> onclick="myFunction()"  -->
    <div>    
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title lighter smaller"> <i class="ace-icon fa fa-comment blue"></i> Comentários </h4>
		    </div>
		    <div class="widget-body">
		        <div class="widget-main no-padding">
		            <form action="/nasocial/logica/controller/comentariosController.php" method="POST">
                        <div class="form-actions">
                            <div class="input-group">
                                <input placeholder="Seu Comentario ..." type="text" class="form-control" name="comentario" />
                                <span class="input-group-btn">
                                    <button class="btn btn-sm btn-info no-radius" type="submit"> <i class="ace-icon fa fa-share"></i> Enviar </button>
                                </span>
                            </div>
                        </div>
                        <input type="hidden" name="id_publicacao" value="<?php print $id_p_; ?>">
                        <input type="hidden" name="fk_utilizador" value="<?php print $usuario_final; ?>">
                        <input type="hidden" name="origem" value="1">
                    </form>
                    <?php if($ComentarioDAO->TotalDeComentarios($id_p_)>0){?> <div class="dialogs"> <?php $LinhaTempo->ComentariosPrincipal($id_p_,0); ?> </div> <?php }?>
	                
	            </div>
            </div>
        </div>
    </div>
</div>