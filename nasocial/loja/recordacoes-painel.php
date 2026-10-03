<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.AgendaEvento.php');
    $InsertAgenda = new AgendaEvento();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.AgendaEventoDAO.php');
    $AGENDA_EVENTO = new AgendaEventoDAO();
    $elmnar = 12;
?>
<div style="padding:1px 0px 0px 10px;margin:0px 0px 0px 0px;">
    <H3 style="padding:1px 0px 10px 0px;margin:0px 0px 0px 0px;">Recordações <?php  if($elmnar==0){ ?> <span class="label label-sm label-success" style="font-size: 14px;">Recordação inserido com sucesso!</span> <?php } if($elmnar==1){ ?> <span class="label label-sm label-danger" style="font-size: 14px;">Recordação eliminado com sucesso!</span> <?php } if($elmnar==2){ ?> <span class="label label-sm label-success" style="font-size: 14px;">Nova Recordação!</span> <?php } if($elmnar==3){ ?> <span class="label label-sm label-warning" style="font-size: 14px;">Recordações disponíveis!</span> <?php } ?></H3>
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
                        
                        <div class="input-group">
                            <span class="input-group-addon" style="padding-left:77px;" id="basic-addon1">Descrição</span>
                            <input type="text" id="titulo" class="form-control" placeholder="Titulo" value="">
                        </div>
                        <div class="input-group" style="margin-top:8px;">
                            <span class="input-group-addon" style="padding-left:12px;" id="basic-addon1">Tipo de Recordação</span>
                            <select class="form-control" id="estilo">
                                <option value="volvo">Camisola</option>
                                <option value="saab">Copos</option>
                                <option value="mercedes">Calçados</option>
                                <option value="audi">Aceçorios</option>
                                <option value="audi">Quadro</option>
                                <option value="audi">Pintura</option>
                                <option value="audi">Escultura</option>
                            </select>
                        </div>
                        
                        <div class="input-group" style="margin-top:8px;">
                            <span class="input-group-addon" style="padding-left:62px;" id="basic-addon1">Quantidade</span>
                            <input type="text" id="titulo" class="form-control" placeholder="Titulo" value="">
                        </div>
                        
                        <div class="input-group" style="margin-top:8px;">
                            <span class="input-group-addon" style="padding-left:102px;" id="basic-addon1">Preço</span>
                            <input type="text" id="titulo" class="form-control" placeholder="Titulo" value="">
                        </div>
                        
                        <?php
                            if(is_mobile())
                            {
                                ?>
                    			    <div style="margin-top:10px; margin-bottom:30px;">
                                	    <button type="submit" name=" " value="1" class="btn btn-success btn-sm btn-block">Guardar</button>
                                	    <br/><br/>
                                        <a href="https://www.lea.co.ao/nasocial/loja/recordacoes.php" class="btn btn-inverse" style="width:100%" id="gritter-remove">Recordações</a>
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
                        <input type="hidden" name="id" value="<?php print $AGENDA_EVENTO->IngressoPorVenderId($agnd); ?>">
                    </form> 
                <?php
            }else{
                if(is_mobile()) { }
                ?>
                <div class="panel panel-default" style="margin:0px 0px 0px 0px;">
                        <div class="panel-heading btn-success" style="color:#fff;"><b>Recordações Por Vender</b></div>
                            <table class="table">
                                <tr>
                                    <th>Recordação</th>
                                    <th>Qtd</th>
                                    <th>Preço</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                                <?php $AGENDA_EVENTO->listarEventosPorUsuario($utilizador,$inicio,$u_e); ?>
                            </table>
                        </div>
                        <div style="float:right;margin:10px 10px 10px 10px;">
                            Valor Total : <span class="label label-success" style="border-radius:25px;padding:3px 10px 0px 10px;"><?php print $AGENDA_EVENTO->TotalIngressoPorVender($utilizador); ?></span>
                            <a href="https://www.lea.co.ao/nasocial/loja/recordacoes.php?novo=1"><span class="label label-primary" style="border-radius:25px;padding:3px 10px 0px 10px;">Novo</span></a>
                        </div>
                    </div>   
                    
                <?php
            }
        ?>	
    </div>
</div>











































