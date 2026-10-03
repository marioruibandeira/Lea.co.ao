
<form action="/nasocial/logica/controller/comentariosController.php" method="POST" style="border:0px; padding:0px;margin-bottom: 2px;"> 
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
	        <input type="hidden" name="origem" value="4">
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