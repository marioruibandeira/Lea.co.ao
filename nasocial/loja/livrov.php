<?php 
    
    session_start();
    $usuario = $_SESSION['logged'];
    
    if($usuario == null){
        header('Refresh: 0; URL=http://localhost/lea/sm/login/login.php?pes=0');
    }   
    
    include_once($_SERVER['DOCUMENT_ROOT'].'/lea/sm/header_.php');
    
    include_once($_SERVER['DOCUMENT_ROOT'].'/lea/sm/logica/entidade/class.Idioma.php');
    $idiom = new Idioma();
?>
<!-- /.page-header -->
<div class="page-header">
    <h1> <?php $idiom->idiomaPreferidoSelecionado(11, $idiom->idiomaPreferencia($u_fnal)); ?> <small> <i class="ace-icon fa fa-angle-double-right"></i> <?php $idiom->idiomaPreferidoSelecionado(12, $idiom->idiomaPreferencia($u_fnal)); ?> </small> </h1>
</div>
<!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form class="form-horizontal" method="post" action="http://localhost/lea/sm/logica/controller/camisolaController.php">
			<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <?php $idiom->idiomaPreferidoSelecionado(1, $idiom->idiomaPreferencia($u_fnal)); ?> </label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" placeholder="Nome do Evento / Nome do Artista" class="col-xs-10 col-sm-5" />
                            </div>
			</div>
                                                                    
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><?php $idiom->idiomaPreferidoSelecionado(2, $idiom->idiomaPreferencia($u_fnal)); ?></label>
                            <div class="col-sm-9">
                                <input type="text" name="marca" placeholder="O Lable da Camisola" class="col-xs-10 col-sm-5" />
                            </div>
			</div>
                        
                        
                        
                         <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <?php $idiom->idiomaPreferidoSelecionado(3, $idiom->idiomaPreferencia($u_fnal)); ?> </label>
                            <div class="col-sm-4">
                                <div>
									
															<select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
																<option value="">  </option>
																<option value="AL">Alabama</option>
																<option value="AK">Alaska</option>
																<option value="AZ">Arizona</option>
																<option value="AR">Arkansas</option>
																<option value="CA">California</option>
																<option value="CO">Colorado</option>
																<option value="CT">Connecticut</option>
																<option value="DE">Delaware</option>
																<option value="FL">Florida</option>
																<option value="GA">Georgia</option>
																<option value="HI">Hawaii</option>
																<option value="ID">Idaho</option>
																<option value="IL">Illinois</option>
																<option value="IN">Indiana</option>
																<option value="IA">Iowa</option>
																<option value="KS">Kansas</option>
																<option value="KY">Kentucky</option>
																<option value="LA">Louisiana</option>
																<option value="ME">Maine</option>
																<option value="MD">Maryland</option>
																<option value="MA">Massachusetts</option>
																<option value="MI">Michigan</option>
																<option value="MN">Minnesota</option>
																<option value="MS">Mississippi</option>
																<option value="MO">Missouri</option>
																<option value="MT">Montana</option>
																<option value="NE">Nebraska</option>
																<option value="NV">Nevada</option>
																<option value="NH">New Hampshire</option>
																<option value="NJ">New Jersey</option>
																<option value="NM">New Mexico</option>
																<option value="NY">New York</option>
																<option value="NC">North Carolina</option>
																<option value="ND">North Dakota</option>
																<option value="OH">Ohio</option>
																<option value="OK">Oklahoma</option>
																<option value="OR">Oregon</option>
																<option value="PA">Pennsylvania</option>
																<option value="RI">Rhode Island</option>
																<option value="SC">South Carolina</option>
																<option value="SD">South Dakota</option>
																<option value="TN">Tennessee</option>
																<option value="TX">Texas</option>
																<option value="UT">Utah</option>
																<option value="VT">Vermont</option>
																<option value="VA">Virginia</option>
																<option value="WA">Washington</option>
																<option value="WV">West Virginia</option>
																<option value="WI">Wisconsin</option>
																<option value="WY">Wyoming</option>
															</select>
			</div>
                            </div>
			</div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <?php $idiom->idiomaPreferidoSelecionado(4, $idiom->idiomaPreferencia($u_fnal)); ?> </label>
                            <div class="col-sm-4">
                                <div>
									
															<select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
																<option value="">  </option>
																<option value="AL">Alabama</option>
																<option value="AK">Alaska</option>
																<option value="AZ">Arizona</option>
																<option value="AR">Arkansas</option>
																<option value="CA">California</option>
																<option value="CO">Colorado</option>
																<option value="CT">Connecticut</option>
																<option value="DE">Delaware</option>
																<option value="FL">Florida</option>
																<option value="GA">Georgia</option>
																<option value="HI">Hawaii</option>
																<option value="ID">Idaho</option>
																<option value="IL">Illinois</option>
																<option value="IN">Indiana</option>
																<option value="IA">Iowa</option>
																<option value="KS">Kansas</option>
																<option value="KY">Kentucky</option>
																<option value="LA">Louisiana</option>
																<option value="ME">Maine</option>
																<option value="MD">Maryland</option>
																<option value="MA">Massachusetts</option>
																<option value="MI">Michigan</option>
																<option value="MN">Minnesota</option>
																<option value="MS">Mississippi</option>
																<option value="MO">Missouri</option>
																<option value="MT">Montana</option>
																<option value="NE">Nebraska</option>
																<option value="NV">Nevada</option>
																<option value="NH">New Hampshire</option>
																<option value="NJ">New Jersey</option>
																<option value="NM">New Mexico</option>
																<option value="NY">New York</option>
																<option value="NC">North Carolina</option>
																<option value="ND">North Dakota</option>
																<option value="OH">Ohio</option>
																<option value="OK">Oklahoma</option>
																<option value="OR">Oregon</option>
																<option value="PA">Pennsylvania</option>
																<option value="RI">Rhode Island</option>
																<option value="SC">South Carolina</option>
																<option value="SD">South Dakota</option>
																<option value="TN">Tennessee</option>
																<option value="TX">Texas</option>
																<option value="UT">Utah</option>
																<option value="VT">Vermont</option>
																<option value="VA">Virginia</option>
																<option value="WA">Washington</option>
																<option value="WV">West Virginia</option>
																<option value="WI">Wisconsin</option>
																<option value="WY">Wyoming</option>
															</select>
			</div>
                            </div>
			</div>
                        
                        
                        
                        
                        
                        
                        
			<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-4"><?php $idiom->idiomaPreferidoSelecionado(5, $idiom->idiomaPreferencia($u_fnal)); ?></label>
                            <div class="col-sm-9">
				<input class="input-sm" type="text" id="form-field-4" placeholder="Kz 0.00" />
                            </div>
			</div>

			<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-5"><?php $idiom->idiomaPreferidoSelecionado(6, $idiom->idiomaPreferencia($u_fnal)); ?></label>
                            <div class="col-sm-9">
				<div class="clearfix">
                                    <input class="col-xs-1" type="text" id="form-field-5" placeholder="1" />
				</div>
                            </div>
			</div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-5"><?php $idiom->idiomaPreferidoSelecionado(7, $idiom->idiomaPreferencia($u_fnal)); ?></label>
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
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <?php $idiom->idiomaPreferidoSelecionado(8, $idiom->idiomaPreferencia($u_fnal)); ?> </label>
                            <div class="col-sm-4">
                                <textarea class="form-control" id="form-field-8" placeholder="Detalhes adicionais"></textarea>
                            </div>
			</div>
                        
                        
                        
			<div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit">
                                    <i class="ace-icon fa fa-check bigger-110"></i> <?php $idiom->idiomaPreferidoSelecionado(9, $idiom->idiomaPreferencia($u_fnal)); ?>
				</button>
                                &nbsp; &nbsp; &nbsp;
				
                            </div>
			</div>
                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/lea/sm/footer.php'); ?>