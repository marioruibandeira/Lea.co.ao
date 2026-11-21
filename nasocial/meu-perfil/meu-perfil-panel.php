<style>
   .custom-file-upload 
    {
        margin:0px;
        position: relative;
        padding: 8px;
        cursor: pointer;
        background-color: #ff4402;
        color: #fff;
        border-radius: 0px;
    }
 
    .file-input 
    {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }
</style>

<?php
    if($ContactosTrabalhoDAO_->VerificarExistenciaUtilizador($ContactosTrabalho_) > 0 )
    {
        ?>
            <div class="input-group" style="margin-bottom:8px;">
                <input type="text" id="txt_cp" class="form-control" value="https://lea.co.ao/artista.php?a=<?php print $UtilidadesDAO->fecharBase($ContactosTrabalhoDAO_->VerificarExistenciaUtilizador($ContactosTrabalho_)); ?>">
                <span class="input-group-addon" style="padding-left:23px; cursor: pointer;" onclick="incopy()">Copiar Link</span>
            </div>
                                            
            <div id="accordion" class="accordion-style1 panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
					    <h4 class="panel-title">
						    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
							    <i class="ace-icon fa fa-angle-down bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
							    &nbsp;Foto de Perfil
						    </a>
				        </h4>
                    </div>

				    <div class="panel-collapse collapse in" id="collapseOne">
					    <div class="panel-body">
						    <div class="row">
						        <div class="col-xs-12">
						            <!-- PAGE CONTENT BEGINS -->
						            <label class="pull-right inline">
                    			        <small class="muted">Publicado:</small>
                    				    <input id="gritter-light" checked="" type="checkbox" class="ace ace-switch ace-switch-5" />
                    				    <span class="lbl middle"></span>
                    		        </label>
                    												
							        <p>Como artista, você tem direito a uma foto de perfil no site lea.co.ao, aqui você pode alterar sua foto de perfil seguindo a regra 370 X 410 pixels por imagem.</p>
                                							    
                                    <div class="fallback"> 
                                	    <div class="custom-file-upload">
                                            <i class="glyphicon glyphicon-open"></i> Carregar foto de perfil <input type="file" id="carregarFotoPerfil" class="file-input" accept="image/*">
                                            (<span id="carregarFotoPerfil_"></span>)
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="btn-group pull-right">
        							    <button class="btn btn-sm btn-default btn-white btn-round">
        								    <i class="ace-icon fa fa-floppy-o bigger-125"></i> Guardar
        							    </button>
        					        </div><!-- PAGE CONTENT ENDS -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->
				        </div>
			        </div>
			        
		        </div>
		        <div class="panel panel-default">
			        <div class="panel-heading">
					    <h4 class="panel-title">
						    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
						        <i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
						        &nbsp;Actualizações
						    </a>
				        </h4>
				    </div>
				    <div class="panel-collapse collapse" id="collapseTwo">
				        <div class="panel-body">
				            Este painel permite que você atualize seus seguidores na lea.co.ao com informações básicas sobre você ou sua carreira artística. Ele só permite 200 caracteres, então seja criativo.
						    <textarea style="width:100%;text-align:left;" id="actual_input" rows="4" cols="50" value=""><?php print $PerfilDoArtistaDAO_->ActualizacaoArtistaNasocial($ContactosTrabalhoDAO_->VerificarExistenciaUtilizador($ContactosTrabalho_)); ?></textarea>
                            <div class="btn-group pull-right">
                                <button id="eliminar" class="btn btn-sm btn-danger" onclick="EliminarContactosTrabalho()">
                    		        <i class="ace-icon fa fa-floppy-o bigger-125"></i> Eliminar
                    		    </button>
                                <button class="btn btn-sm btn-success" onclick="ActualizarActualizacoesPerfil()">
                        		    <i class="ace-icon fa fa-floppy-o bigger-125"></i> Actualizar
                        	    </button>
                            </div>  
				        </div>
			        </div>
                </div>
	            <div class="panel panel-default">
    			    <div class="panel-heading">
    				    <h4 class="panel-title">
    					    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
    						    <i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
    						    &nbsp;Agenda
    					    </a>
    				    </h4>
    			    </div>
    			    <div class="panel-collapse collapse" id="collapseFour">
    				    <div class="panel-body">
    					    Neste painel você pode criar um evento ou agenda para seu próximo evento/show e isso será refletido no seu perfil na lea.co.ao como agenda. <a href="https://lea.co.ao/loja/listar-evento.php?artista=<?php print $ContactosTrabalhoDAO_->VerificarExistenciaUtilizador($ContactosTrabalho_);?>">Clica aqui para agendar</a>
    				    </div>
    			    </div>
			    </div>
			    <div class="panel panel-default">
    		        <div class="panel-heading">
    				    <h4 class="panel-title">
    					    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
    						    <i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
    						    &nbsp;Contactos
    					    </a>
    				    </h4>
    		        </div>
    		        <div class="panel-collapse collapse" id="collapseThree">
    		            <div class="panel-body">
    		                Os números ou os links de redes sociais guardados aqui aparecerão no seu perfil na Lea.co.ao
    		            <div id="phoneValidationMsg">
    		        </div>
    		        <!--Fone onclick="levarCertificacao()-->
    		        <div class="input-group">
                    	<span class="input-group-addon" style="padding-left:23px;" id="basic-addon1">Telefone</span> 
                    	<input type="text" id="telefone" class="form-control" maxlength="11" oninput="formatPhoneNumber(this)" value="<?php print $ContactosTrabalhoDAO_->ContactosTelefone($usuario_final, $ContactosTrabalhoDAO_->VerificarExistenciaUtilizador($ContactosTrabalho_)); ?>" required>
                    </div>
                    <div class="btn-group pull-right" style="margin-top:8px;margin-bottom:8px;width:100%;">
                        <button id="guardar_telefone" class="btn btn-sm btn-success" onclick="InserirContactosTrabalho()" style="display: none;width:100%;">
                            <i class="glyphicon glyphicon-floppy-disk"></i> Guardar
                        </button>
                        <button id="actualizar_telefone" class="btn btn-sm btn-success" onclick="ActualizarContacto()" style="width:100%;">
                            <i class="glyphicon glyphicon-pencil"></i> Actualizar
                        </button>
                        <button id="guardar_actualizar_telefone" class="btn btn-sm btn-success" onclick="ActualizarContacto()" style="width:100%;display: none;">
                            <i class="glyphicon glyphicon-floppy-disk"></i> Guardar
                        </button>
                    </div>
                    <!--Whatsapp-->
                    <div class="input-group" style="margin-top:8px;width:100%;">
                        <span class="input-group-addon" id="basic-addon1">WhatsApp</span>
                        <input type="text" id="whatsApp" class="form-control" maxlength="11" oninput="formatNumeroWhatsapp(this)" value="<?php print $ContactosTrabalhoDAO_->ContactosWhatsapp($usuario_final, $ContactosTrabalhoDAO_->VerificarExistenciaUtilizador($ContactosTrabalho_)); ?>">
                    </div>
                    <div class="btn-group pull-right" style="margin-top:8px;width:100%;">
                        <button id="guardar_whatsapp" class="btn btn-sm btn-success" onclick="InserirContactosWhatsapp()" style="display: none;width:100%;">
                            <i class="glyphicon glyphicon-floppy-disk"></i> Guardar
                        </button>
                        <button id="actualizar_whatsapp" class="btn btn-sm btn-success" onclick="ActualizarContacto()" style="width:100%;">
                            <i class="glyphicon glyphicon-pencil"></i> Actualizar
                        </button>
                        <button id="guardar_actualizar_whatsapp" class="btn btn-sm btn-success" onclick="ActualizarContacto()" style="width:100%;display: none;">
                            <i class="glyphicon glyphicon-floppy-disk"></i> Guardar
                        </button>
                    </div>
                    
                    <div id="btn_eliminar" class="btn-group pull-right" style="margin-top:8px;width:100%;padding-bottom:30px;">
			            <button id="eliminar_whatsapp" class="btn btn-sm btn-danger" onclick="EliminarContactosTrabalho()" style="width:100%;">
                            <i class="glyphicon glyphicon-trash"></i> Eliminar
                        </button>
                    </div>
                    <!--Redes Sociais
                    <div class="page-header" style="padding-top:30px;">
                        <h1> Redes Sociais</h1>
                    </div>
                    Spotify
                    <div class="input-group">
                      <span class="input-group-addon">Spotify</span>
                      <input type="text" class="form-control">
                      <span id="Spotify_guardar" class="input-group-addon btn-success"><a href="" class="link_"> <i class="glyphicon glyphicon-floppy-disk"></i> Guardar</a></span>
                      <!--<span id="fb_guardar_actualizar" class="input-group-addon btn-success"><a href="" class="link_"> <i class="glyphicon glyphicon-floppy-disk"></i> Guardar</a></span>
                      <span id="Spotify_actualizar" class="input-group-addon btn-success"><a href="" class="link_"> <i class="glyphicon glyphicon-pencil"></i> Actualizar</a></span>
                      <span id="Spotify_eliminar" class="input-group-addon btn-danger"><a href="" class="link_"> <i class="glyphicon glyphicon-trash"></i> Eliminar</a></span>
                    </div>-->
                    
                </div>
            </div>
        </div>
        
        <div class="panel panel-default">
    	    <div class="panel-heading">
    		    <h4 class="panel-title">
    			    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
    			        <i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
    			        &nbsp;Carregar Músicas
    			    </a>
    		    </h4>
            </div>
            <div class="panel-collapse collapse" id="collapseFive">
    	        <div class="panel-body">
    		        <?php include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/meu-perfil/carregar-musica-painel.php'); ?>
                </div>
            </div>
        </div>
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
    														<i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
    														&nbsp;Vender Beats
    													</a>
                    </h4>
    			    </div>
    			    <div class="panel-collapse collapse" id="collapseSix">
    				    <div class="panel-body">
    					    Neste painel voce poderá carregar até 5 beats que estarão disponível no seu perfil na Lea.co.ao.
    					    <div class="input-group">
                                                            <span class="input-group-addon" style="padding-left:30px;" id="basic-addon1">Descrição</span>
                                                            <input type="text" id="titulo" class="form-control" placeholder="Descrição do Beat à Venda" value="">
                                                        </div>
                            <div class="input-group" style="margin-top:8px;">
                                                            <span class="input-group-addon" style="padding-left:58px;" id="basic-addon1">Estilo</span>
                                                            <select class="form-control" id="estilo">
                                                                <option value="volvo">Kuduro</option>
                                                                <option value="saab">Naija</option>
                                                                <option value="mercedes">House</option>
                                                                <option value="audi">Kizomba</option>
                                                            </select>
                                                        </div>
                            <div class="input-group" style="margin-top:8px;">
                                                            <span class="input-group-addon" style="padding-left:55px;" id="basic-addon1">Preço</span>
                                                            <input type="text" id="titulo" class="form-control" placeholder="Preço" value="">
                                                        </div>
                                <div class="input-group" style="margin-top:8px;">
                                    <span class="input-group-addon" style="padding:0px;" id="basic-addon1">
                                        <div class="custom-file-upload">
                                            <span style="padding:0px 0px 0px 38px"><i class="glyphicon glyphicon-open"></i> </span> Capa <input type="file" id="carregarCapa" class="file-input" accept="image/*">
                                        </div>
                                    </span>
                                    <input type="text" id="carregarFoto" style="height: 34px;" class="form-control" placeholder=" " value="">
                                </div>
                                <div class="row" style="margin-top:8px;">
                                    <div class="col-sm-6">
                                        <button id="eliminar" class="btn btn-sm btn-danger" onclick=" " style="width:100%">
                        				    <i class="ace-icon fa fa-floppy-o bigger-125"></i> Eliminar
                        			    </button>
                                    </div>
                                    <div class="col-sm-6" style="margin-top:<?php if(is_mobile()){ ?> 5px; <?php }else{ ?> 0px;<?php } ?> ">
                                        <button id="actualizar" class="btn btn-sm btn-success" onclick=" " style="width:100%">
                        				    <i class="ace-icon fa fa-floppy-o bigger-125"></i> Guardar
                        			    </button>
                                    </div>
                                </div>
                                <hr/>
                                <div class="panel-heading btn-primary" style="color:#fff; padding:5px;"><b>Beats Disponíveis</b></div>
                                <div class="panel panel-default" style="margin:0px 0px 0px 0px;">
                                    <table class="table">
                                        <tr>
                                            <th>Descrição</th>
                                            <th>Estilo</th>
                                            <th>Preço</th>
                                            <th><i class="glyphicon glyphicon-pencil"></i> || <i class="glyphicon glyphicon-trash"></i></th>
                                        </tr>
                                        <?php //$LivrosDAO->listarLivrosPorUsuario($utilizador,$inicio,$u_e); ?>
                                    </table>
                                </div>
                            </div>
    				    </div>
    		        </div>
    		    <div class="panel panel-default">
    			    <div class="panel-heading">
    				    <h4 class="panel-title">
    					    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
    						    <i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
    						    &nbsp;Dizeres ou frases
    					    </a>
    				    </h4>
    			    </div>
    			    <div class="panel-collapse collapse" id="collapseSeven">
    				    <div class="panel-body">
    					    Neste painel voce poderá Adicionar dizeres ou frases que refletirão no seu perfil na Lea.co.ao
    					    <textarea style="width:100%;text-align:left;" id="actual_input" rows="4" cols="100" value=""></textarea>
    					    <div class="btn-group pull-right">
                                <button id="eliminar" class="btn btn-sm btn-danger" onclick="EliminarContactosTrabalho()">
                    		        <i class="ace-icon fa fa-floppy-o bigger-125"></i> Eliminar
                    		    </button>
                                <button class="btn btn-sm btn-success" onclick="ActualizarActualizacoesPerfil()">
                        		    <i class="ace-icon fa fa-floppy-o bigger-125"></i> Actualizar
                        	    </button>
                            </div>
    				    </div>
    		        </div>
    		    </div>
		    </div>
								                   
        <?php 
    }
    else
    {
        ?> 
            <h4 class="widget-title lighter"> 
                <i class="ace-icon fa fa-star orange"></i> Você ainda não foi certificado como artista real na LEA.co.ao <a href="https://lea.co.ao/loja/certificacao.php">Clique aqui para fazer sua certificação.</a> 
            </h4>
        <?php
    }
?>