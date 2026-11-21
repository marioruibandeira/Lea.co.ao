<div style="padding:1px 0px 0px 10px;margin:0px 0px 0px 0px;">
    <H3 style="padding:1px 0px 10px 0px;margin:0px 0px 0px 0px;">Discografia <?php  if($elmnar==0){ ?> <span class="label label-sm label-success" style="font-size: 14px;">Disco inserido com sucesso!</span> <?php } if($elmnar==1){ ?> <span class="label label-sm label-danger" style="font-size: 14px;">Obra Discografica eliminada com sucesso!</span> <?php } if($elmnar==2){ ?> <span class="label label-sm label-success" style="font-size: 14px;">Novo Disco!</span> <?php } if($elmnar==3){ ?> <span class="label label-sm label-warning" style="font-size: 14px;">Discos disponíveis!</span> <?php } ?></H3>
</div>
<div class="row">
    <div class="col-xs-12">
        <?php
            
            if($novo==1)
            {
                $disco = is_string($_GET['disco']) ? trim($_GET['disco']) : '';
                
                ?>
                    <form class="form-horizontal" role="form" action="/nasocial/logica/controller/lojaController/novo-produto-controller.php" method="post" >
                        <input type="hidden" name="chave_disco" value="<?php print $disco; ?>">
                        <input type="hidden" name="usuario" value="<?php print $usuario_final; ?>">
                        <input type="hidden" name="validador" value="500">
                        <?php
                            if($disco === '0' && $d_ === '1')
                            {
                                ?>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Obra: </label>
                                        <div class="col-sm-4">
                                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Escolher uma obra..."  name="chave_disco">
                                                <option value="">  </option> <?php $novo_p->ListaArtistasNovoProduto(); ?> 
                                            </select>
                                            <input type="hidden" name="album" class="col-xs-10 col-sm-5" value="<?php print $novo_p->produtoPegado($dsc); ?>"/>
                                        </div>
                                    </div>
                                <?php
                            }
                            else
                            {
                                ?>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Titulo </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="ttulo" id="form-field-1" class="col-xs-<?php if(is_mobile()){ print "12"; }else{ print "0"; } ?> col-sm-12" required="required" readOnly value="<?php print $DiscografiaDAO->ProdutoPegado($disco); ?>"/>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Formato </label>
                            <div class="col-sm-9">
                                <select class="col-xs-<?php if(is_mobile()){ print "12"; }else{ print "0"; } ?> col-sm-12" id="form-field-select-1" name="chave_formato"><?php $DiscografiaDAO->FormatosDDiscos($disco); ?></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Preço </label>
                            <div class="col-sm-9"><input type="number" id="form-field-1-1" placeholder="0,00" name="preco_produto" required="required" class="col-xs-<?php if(is_mobile()){ print "12"; }else{ print "0"; } ?> col-sm-12" placeholder="0.00" required min="0" step="0.01" pattern="\d+(\.\d{2})?"/></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Quantidade </label>
                            <div class="col-sm-9">
                                <input type="number" name="qtd_produto" id="form-field-1" class="col-xs-<?php if(is_mobile()){ print "12"; }else{ print "0"; } ?> col-sm-12" required="required" value="<?php // if($InsertAgenda->getTitulo_evento() != null){ echo $InsertAgenda->getTitulo_evento(); } ?>"/>
                            </div>
                        </div>
                        <?php
                            if(is_mobile())
                            {
                                ?>
                    			    <div style="margin-top:10px; margin-bottom:30px;">
                                	    <button type="submit" name="s_p" value="1" class="btn btn-success btn-sm btn-block">Guardar</button>
                                	    <br/><br/>
                                        <a href="https://www.lea.co.ao/nasocial/loja/agendar.php?acao=3" class="btn btn-inverse" style="width:100%" id="gritter-remove">Ver Discos</a>
										<input type="hidden" name="ut" value="<?php print $utilizador; ?>">
                                    </div>
                    		    <?php
                    		}else{
                    		    ?>
                    		        <div class="clearfix form-actions">
								        <div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit" name="s_p" value="1"> <i class="ace-icon fa fa-check bigger-110"></i> Guardar </button> &nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset"><i class="ace-icon fa fa-undo bigger-110"></i>Reset</button>
											<a href="https://www.lea.co.ao/nasocial/loja/agendar.php?acao=3" class="btn btn-inverse" id="gritter-remove">Cancelar</a>
											<input type="hidden" name="ut" value="<?php print $utilizador; ?>">
									    </div>
								    </div>
                                <?php
                            }
                        ?>
                        <input type="hidden" name="id" value="<?php print $DiscografiaDAO->DiscoPorVenderId($agnd); ?>">
                    </form> 
                <?php
            }
            else
            {
                if(is_mobile())
                {
                    if($novo!=1) { }
                }
                    
                ?>
                    <div class="panel panel-default" style="margin:0px 0px 0px 0px;">
                        <div class="panel-heading btn-success" style="color:#fff;"><b>Obras Discográficas</b></div>
                            <table class="table">
                                <tr>
                                    <th>Discografia</th>
                                    <th>Qtd</th>
                                    <th>Preço</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                                <?php $DiscografiaDAO->listarDiscosPorVender($utilizador,$inicio,$u_e); ?>
                            </table>
                        </div>
                        <div style="float:right;margin:10px 10px 10px 10px;">
                            Valor Total : <span class="label label-success" style="border-radius:25px;padding:3px 10px 0px 10px;"><?php print $DiscografiaDAO->TotalObrasDiscografiaPorVender($utilizador); ?></span>
                            <a href="https://www.lea.co.ao/nasocial/loja/catalogo.php?cat=1&us=Mjc="><span class="label label-primary" style="border-radius:25px;padding:3px 10px 0px 10px;">Catalogo</span></a>
                            <a href="https://lea.co.ao/discografia/discografia_.php?strt=0&pro=1"><span class="label label-primary" style="border-radius:25px;padding:3px 10px 0px 10px;">Novo</span></a>
                        </div>
                    </div>
                <?php
            }
        ?>	
    </div>
</div>