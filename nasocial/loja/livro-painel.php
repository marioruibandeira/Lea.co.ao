<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.AgendaEvento.php');
    $InsertAgenda = new AgendaEvento();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.LivrosDAO.php');
    $LivrosDAO = new LivrosDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.EncomendaNasocialDAO.php');
    $EncomendaNasocialDAO = new EncomendaNasocialDAO();
?>
<div style="padding:1px 0px 0px 10px;margin:0px 0px 0px 0px;">
    <H3 style="padding:1px 0px 10px 0px;margin:0px 0px 0px 0px;">Livros <?php  if($elmnar==0){ ?> <span class="label label-sm label-success" style="font-size: 14px;">Livros inserido com sucesso!</span> <?php } if($elmnar==1){ ?> <span class="label label-sm label-danger" style="font-size: 14px;">Livro eliminado com sucesso!</span> <?php } if($elmnar==2){ ?> <span class="label label-sm label-success" style="font-size: 14px;">Novo Livro!</span> <?php } if($elmnar==3){ ?> <span class="label label-sm label-warning" style="font-size: 14px;">Livro disponíveis!</span> <?php } ?></H3>
</div>
<div class="row">
    <div class="col-xs-12">
        <?php
            $novo = $_GET['novo'];
            if($novo==1)
            {
                $agnd = is_string($_GET['agnd']) ? trim($_GET['agnd']) : '';
                
                ?>
                    <form class="form-horizontal" role="form" action="/nasocial/logica/controller/agenda/AgendarEventoController.php" method="post" >
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nome do Evento </label>
                            <div class="col-sm-9">
                                <input type="text" name="ttulo" id="form-field-1" class="col-xs-<?php if(is_mobile()){ print "12"; }else{ print "0"; } ?> col-sm-12" required="required" readOnly value="<?php print $LivrosDAO->IngressoPorVenderTitulo($agnd); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Data do Evento </label>
                            <div class="col-sm-9">
                                <input type="text" name="data_agenda" id="id-date-picker-1" class="col-xs-<?php if(is_mobile()){ print "12"; }else{ print "0"; } ?> col-sm-12 date-picker" required="required" readOnly value="<?php print $LivrosDAO->IngressoPorVenderData($agnd); ?>" data-date-format="dd-mm-yyyy"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Preço </label>
                            <div class="col-sm-9"><input type="number" id="form-field-1-1" placeholder="0,00" name="preco" required="required" class="col-xs-<?php if(is_mobile()){ print "12"; }else{ print "0"; } ?> col-sm-12" placeholder="0.00" required min="0" step="0.01" pattern="\d+(\.\d{2})?"/></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Quantidade </label>
                            <div class="col-sm-9">
                                <input type="number" name="qnt" id="form-field-1" class="col-xs-<?php if(is_mobile()){ print "12"; }else{ print "0"; } ?> col-sm-12" required="required" value="<?php // if($InsertAgenda->getTitulo_evento() != null){ echo $InsertAgenda->getTitulo_evento(); } ?>"/>
                            </div>
                        </div>
                        <?php
                            if(is_mobile())
                            {
                                ?>
                    			    <div style="margin-top:10px; margin-bottom:30px;">
                                	    <button type="submit" name="s_p" value="1" class="btn btn-success btn-sm btn-block">Guardar</button>
                                	    <br/><br/>
                                        <a href="https://www.lea.co.ao/nasocial/loja/agendar.php?acao=3" class="btn btn-inverse" style="width:100%" id="gritter-remove">Ver Eventos</a>
										<input type="hidden" name="ut" value="<?php print $utilizador; ?>">
                                    </div>
                    		    <?php
                    		}else{
                    		    ?>
                    		        <div class="clearfix form-actions">
								        <div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit" name="s_p" value="1"> <i class="ace-icon fa fa-check bigger-110"></i> Guardar </button> &nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset"><i class="ace-icon fa fa-undo bigger-110"></i>Reset</button>
											<a href="http://www.lea.co.ao/nasocial/loja/agendar.php?acao=3" class="btn btn-inverse" id="gritter-remove">Cancelar</a>
											<input type="hidden" name="ut" value="<?php print $utilizador; ?>">
									    </div>
								    </div>
                                <?php
                            }
                        ?>
                        <input type="hidden" name="id" value="<?php print $LivrosDAO->IngressoPorVenderId($agnd); ?>">
                    </form> 
                <?php
            }
            else
            {
                if(is_mobile()) { }
                ?>
                    <div class="panel panel-default" style="margin:0px 0px 0px 0px;">
                        <div class="panel-heading btn-success" style="color:#fff;"><b>Livros Por Vender</b></div>
                            <table class="table">
                                <tr>
                                    <th>Evento</th>
                                    <th>Qtd</th>
                                    <th>Preço</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                                <?php $LivrosDAO->listarLivrosPorUsuario($utilizador,$inicio,$u_e); ?>
                            </table>
                        </div>
                        <div style="float:right;margin:10px 10px 10px 10px;">
                            Valor Total : <span class="label label-success" style="border-radius:25px;padding:3px 10px 0px 10px;"><?php print $LivrosDAO->TotalLivrosPorVender($utilizador); ?></span>
                            <a href="https://www.lea.co.ao/nasocial/loja/catalogo.php?start=0&cat=2&us=<?php print $utilizador; ?>"><span class="label label-primary" style="border-radius:25px;padding:3px 10px 0px 10px;">Catalogo</span></a>
                            <a href="/downloads/todos-livros.php?strt=0&acc=1&pro=1"><span class="label label-primary" style="border-radius:25px;padding:3px 10px 0px 10px;">Novo</span></a>
                        </div>
                    </div>
                    
                <?php
            }
        ?>	
    </div>
</div>