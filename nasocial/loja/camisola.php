<?php 
    
      
    
    include_once($_SERVER['DOCUMENT_ROOT'].'/lea/nasocial/header_.php');
//    include_once($_SERVER['DOCUMENT_ROOT'].'/lea/sm/logica/lojaonline/NovoProduto.php');
//    $novo_p = new NovoProduto();
//    include_once($_SERVER['DOCUMENT_ROOT'].'/lea/sm/logica/entidade/class.AgendaEvento.php');
//    $InsertAgenda = new AgendaEvento();
//    include_once($_SERVER['DOCUMENT_ROOT'].'/lea/sm/logica/utilidades/class.Provincias.php');
//    $provi = new Provincias();
//    include_once ($_SERVER['DOCUMENT_ROOT'].'/lea/sm/logica/dao/class.AgendaEventoDAO.php');
//    $list_agenda = new AgendaEventoDAO();
//    include_once ($_SERVER['DOCUMENT_ROOT'].'/lea/sm/logica/login/Login.php');
//    $lo_in = new Login();
//    if ((!isset($_GET['u_e']) || trim($_GET['u_e']) == '')) {
//        die('Missing record ID!');
//    }
//    $u_e = $_GET['u_e'];
//    $u_fnal = $lo_in->chaveUsuario($u_e);
//    $inicio = $_GET['strt'];
//    if($inicio === null){
//        $inicio=0;
//    }
//    $elmnar = $_GET['acao'];
?>
<!-- /.page-header -->
<div class="page-header">
    <h1> Camisolas <small> <i class="ace-icon fa fa-angle-double-right"></i> Common form elements and layouts </small> </h1>
</div>
<!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form class="form-horizontal" method="post" action="http://localhost/lea/sm/logica/controller/camisolaController.php">
			<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Artista / Evento </label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" placeholder="Nome do Evento / Nome do Artista" class="col-xs-10 col-sm-5" />
                            </div>
			</div>
                                                                    
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Marca / Modelo </label>
                            <div class="col-sm-9">
                                <input type="text" name="marca" placeholder="O Lable da Camisola" class="col-xs-10 col-sm-5" />
                            </div>
			</div>

			<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tamanho </label>
                            <div class="col-sm-9">
                                <label class="middle">
                                    <input class="ace" type="checkbox" id="id-disable-check" />
                                    <span class="lbl"> Pequeno</span> 
				</label>
                                <label class="middle">
                                    
                                    <input class="ace" type="checkbox" id="id-disable-check" />
                                    <span class="lbl"> Medio</span>
				</label>
                                <label class="middle">
                                    
                                    <input class="ace" type="checkbox" id="id-disable-check" />
                                    <span class="lbl"> Largo</span>
                                    
				</label>
                                <label class="middle">
                                    
                                    <input class="ace" type="checkbox" id="id-disable-check" />
                                    <span class="lbl"> Extra Largo</span>
				</label>
                                <label class="middle">
                                    
                                    <input class="ace" type="checkbox" id="id-disable-check" />
                                    <span class="lbl"> Extra Extra Largo</span>
				</label>
                            </div>
			</div>
                                                                    
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Cores </label>
                            <div class="col-sm-9">
                                <label class="middle">
                                    <input class="ace" type="checkbox"  />
                                    <span class="lbl"> Disable it !</span>
                                </label>
                                <label class="middle">
                                    <input class="ace" type="checkbox"  />
                                    <span class="lbl"> Disable it !</span>
                                </label>
                                <label class="middle">
                                    <input class="ace" type="checkbox"  />
                                    <span class="lbl"> Disable it !</span>
                                </label>
                                <label class="middle">
                                    <input class="ace" type="checkbox"  />
                                    <span class="lbl"> Disable it !</span>
                                </label>
                            </div>
                        </div>
                                                                    
			<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-4">Preço</label>
                            <div class="col-sm-9">
				<input class="input-sm" type="text" id="form-field-4" placeholder="Kz 0.00" />
                            </div>
			</div>

			<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-5">Quantidade</label>
                            <div class="col-sm-9">
				<div class="clearfix">
                                    <input class="col-xs-1" type="text" id="form-field-5" placeholder="1" />
				</div>
                            </div>
			</div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-5">Imagem</label>
                            <div class="col-sm-9">
				<div class="clearfix">
                                    <div class="form-group">
					<div class="col-xs-12">
                                            <input type="file" id="id-input-file-2" />
					</div>
                                    </div>
				</div>
                            </div>
			</div>            
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Descrição </label>
                            <div class="col-sm-4">
                                <textarea class="form-control" id="form-field-8" placeholder="Detalhes adicionais"></textarea>
                            </div>
			</div>
                        
			<div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit">
                                    <i class="ace-icon fa fa-check bigger-110"></i> Submit
				</button>
                                &nbsp; &nbsp; &nbsp;
				<button class="btn" type="reset">
                                    <i class="ace-icon fa fa-undo bigger-110"></i> Reset
				</button>
                            </div>
			</div>
                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/lea/nasocial/footer.php'); ?>