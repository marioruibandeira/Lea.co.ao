<?php 
    //
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/header.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UsuarioDAO.php');
    $u_l = new UsuarioDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/utilidades/class.Provincias.php');
    $provi = new Provincias();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/usuario/class.AmigoDAO.php');
    $amigo = new AmigoDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/loja/class.MinhaMusicaDAO.php');
    $MinhasMusicas = new MinhaMusicaDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.BibiliotecaDAO.php');
    $BibiliotecaDAO = new BibiliotecaDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.AgendaEventoDAO.php');
    $AGENDA_EVENTO = new AgendaEventoDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.DiscografiaDAO.php');
    $DiscografiaDAO = new DiscografiaDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.LivrosDAO.php');
    $LivrosDAO = new LivrosDAO();
    //
    if ((!isset($_GET['ami']) || trim($_GET['ami']) == '')) {
        print "<script type='text/javascript'> window.location = 'https://www.lea.co.ao/nasocial/' </script>";
    }
    $ce_amigo = $_GET['ami'];
    if($ce_amigo === '' || $ce_amigo === '0' || $ce_amigo === 0){
        print "<script type='text/javascript'> window.location = 'https://www.lea.co.ao/nasocial/' </script>";
    }
    $n = 3;
    $inicio = $_GET['strt'];
    if($inicio == null || $inicio == ''){
        $inicio = 0;    
    }
    $origem = 1;
    $pblcc = $_GET['pblcc'];
    if($pblcc == null || $pblcc == ''){
        $pblcc = 0;    
    }
?>
<style> 
    .parent-div{height:auto;}
    .main-child{height:auto;background-color:#ccc;border: 2px solid #ccc;border-radius: 25px; text-align:center;margin-bottom:10px; height: 100px;}
    .img-div 
    {
        position: relative;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .sibling{height:auto;background-color:#ccc;border: 2px solid #ccc;border-radius: 25px; text-align:center;padding-top:100px;margin-bottom:10px;}
    .paragra{padding:0px 15px 0px 15px }
    .btn-prof{border: 2px solid #A5D6A7;border-radius: 25px; margin-bottom:10px;background-color:#ccc;padding:10px 15px 10px 15px; text-align:center;}
    .btn-alt-1{border: 2px solid #E0E0E0;background-color:#ccc;}
    /**/
    .main-li{background-color:#fff;border:#fff 1px solid;border-radius:50px;}
    .icons-tag{font-weight:bolder;font-size:16px;color:#222843;padding-right: 10px;}
    .main-li:hover {background-color: #ccc; border:#fff 1px solid;border-radius:50px;cursor: pointer;}
    .txt-meuno{color:#222843;font-weight:bolder;font-size:16px;padding-top:20px;}
</style> 

<!-- /.page-header -->
<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
            <?php 
                if(is_mobile())
                {
                    ?> 
                        <div class="page-header"> <h1> Perfil do Usuário</h1> </div>
                        
                         <div class="parent-div">
                        	<div class="main-child"> 
                        	    <div class="img-div"> <?php $amigo->FotoPerfilPaginaAmigos_($ce_amigo); ?> </div> 
                        	</div>
                        	<div class="sibling">
                        		<h2><b><?php $u_l->nomeUsuarioAmigo($ce_amigo); ?></b></h2>
                        		<h4>Utilizador Normal</h4>
                        		<p class="paragra">Muito Obrigado por ter visitado o meu perfil, volte sempre. Saudações.</p>
                        	</div>
                        </div>
                        
                        <?php
                        	if($amigo->verificarAmizade($ce_amigo,$utilizador) != null)
                            {
                        		?> <a href="/nasocial/logica/controller/usuario/AceitarRejeitarAmizadeController.php?ce_amig=<?php print $ce_amigo; ?>&ce_us=<?php print $usuario; ?>&orgn=dlt" class="btn-prof btn btn-sm btn-block btn-danger"> <i class="ace-icon fa fa-trash-o bigger-120"></i><span class="bigger-110">Remover Amizade</span> </a> <?php
                        	}
                        	else
                        	{
                        		if($amigo->amigoPedidoAmizadeUsuario($ce_amigo,$utilizador) === null)
                        		{
                        			?> 
                        				<form action="/nasocial/logica/controller/usuario/pedidoAmizadeController.php" method="post">
                        					<button name="salvar" type="submit" class="btn-prof btn btn-sm btn-block btn-success"><i class="ace-icon fa fa-plus-circle bigger-120"></i><span class="bigger-110">Adicionar Amigo</span></button>
                        					<input type="hidden" name="ce_amigo" value="<?php  print $ce_amigo; ?>"/>
                        					<input type="hidden" name="ce_usuario" value="<?php print $utilizador; ?>"/>
                        					<input type="hidden" name="orgen" value="ami"/>
                        				</form>
                                    <?php
                        		}
                        		
                        		if($amigo->amigoPedidoAmizadeUsuario($ce_amigo,$utilizador) > 0 ) 
                        		{
                                    if($amigo->amigoPedidoAmizadeQuemPedio($ce_amigo,$utilizador) != 0)
                        			{ 
                        				?> <a href="/nasocial/logica/controller/usuario/AceitarRejeitarAmizadeController.php?ce_amig=<?php print $ce_amigo; ?>&ce_us=<?php print $usuario; ?>&orgn=ins" class="btn-prof btn btn-sm btn-success "> <i class="ace-icon glyphicon glyphicon-ok bigger-120"></i><span class="bigger-110">Aceitar Pedido de Amizade</span> </a> <?php
                        			} 
                        			else 
                        			{
                        				?> 
                        					<form action="/nasocial/logica/controller/usuario/pedidoAmizadeController.php" method="post">
                        						<button name="eliminar" type="submit" class="btn-prof btn btn-sm btn-block btn-danger" style=" border-color:#D81F24 solid 1px;"><i class="ace-icon fa fa-trash-o bigger-120"></i><span class="bigger-110">Pedido de Amizade Enviado</span></button>
                        						<input type="hidden" name="ce_amigo" value="<?php  print $ce_amigo; ?>"/>
                        						<input type="hidden" name="ce_usuario" value="<?php print $utilizador; ?>"/>
                        						<input type="hidden" name="orgen" value="desc"/>
                        					</form>
                        				<?php 
                        			}   
                        		}
                        	}
                        ?>
                        
                        <div class="btn-prof btn-alt-1"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Envia-me uma mensagem</div>
                        <div class="btn-prof btn-alt-1"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Bloquear</div>
                        
                        <?php 
                        	include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/usuario/painel-disponiveis.php');
                        	if(is_mobile())
                        	{
                        		?>
                                    <hr style="padding:5px 0px 0px 0px; margin:10px 0px 0px 0px;" />
                        			<div class="btn-group btn-group-justified btn-group-xs">
                        				<a href="https://www.lea.co.ao/nasocial/loja/catalogo.php?cat=1&us=<?php print $ce_amigo;  ?>" class="btn btn-default"><span class="glyphicon glyphicon-tags"></span> Catalogo Completo </a>
                        			</div>
                                    <hr style="padding:0px 0px 0px 0px; margin:5px 0px 0px 0px;" />
                        		<?php
                        	}
                        ?>
                        <br/>
                        <?php include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/usuario/per-ami-pub-painel.php'); ?>
                    <?php
                                            
                }
                else 
                {
                    ?>
                        <div class="row">
                            <div class="col-xs-3 col-md-3">
                                <div class="card" style="width: 100%;">
                                    <?php $utilidade->MainSideMenu($usuario_final); ?>
                                    <?php $utilidade->SideMenuProdutosAvendas($usuario_final); ?>
                                    <?php $utilidade->SideMenuContaLea(); ?>
                                </div>
                            </div>
                            <div class="col-xs-9 col-md-9">
                                 <div class="page-header"> <h1> Perfil do Usuário</h1> </div>
                                 
                                 <div class="row">
                                     <?php
                                        if($pblcc === 0)
                                        {
                                            ?>
                                                <div class="col-xs-12 col-sm-3 center">
                                                    <?php $amigo->FotoPerfilPaginaAmigos($ce_amigo); ?>
                                                    <div class="space space-4"></div>
                                                        <?php 
                                                            if($amigo->verificarAmizade($ce_amigo,$utilizador) != null)
                                                            {
                                                                ?> <a href="/nasocial/logica/controller/usuario/AceitarRejeitarAmizadeController.php?ce_amig=<?php print $ce_amigo; ?>&ce_us=<?php print $usuario; ?>&orgn=dlt" class="btn btn-sm btn-block btn-danger"> <i class="ace-icon fa fa-trash-o bigger-120"></i><span class="bigger-110">Remover Amizade</span> </a> <?php
                                                            } 
                                                            else 
                                                            {
                                                            if($amigo->amigoPedidoAmizadeUsuario($ce_amigo,$utilizador) == null)
                                                            {
                                                                ?> 
                                                                    <form action="/nasocial/logica/controller/usuario/pedidoAmizadeController.php" method="post">
                                                                        <button name="salvar" type="submit" class="btn btn-sm btn-block btn-success"><i class="ace-icon fa fa-plus-circle bigger-120"></i><span class="bigger-110">Adicionar Amigo</span></button>
                                                                        <input type="hidden" name="ce_amigo" value="<?php  print $ce_amigo; ?>"/>
                                                                        <input type="hidden" name="ce_usuario" value="<?php print $utilizador; ?>"/>
                                                                        <input type="hidden" name="orgen" value="ami"/>
                                                                    </form>
                                                               <?php 
                                                            }
                                                            elseif($amigo->amigoPedidoAmizadeUsuario($ce_amigo,$utilizador)>0) 
                                                            {
                                                                if($amigo->amigoPedidoAmizadeQuemPedio($ce_amigo,$utilizador) != 0)
                                                                { 
                                                                    ?> <a href="/nasocial/logica/controller/usuario/AceitarRejeitarAmizadeController.php?ce_amig=<?php print $ce_amigo; ?>&ce_us=<?php print $usuario; ?>&orgn=ins" class="btn btn-sm btn-success "> <i class="ace-icon glyphicon glyphicon-ok bigger-120"></i><span class="bigger-110">Aceitar Pedido de Amizade</span> </a> <?php
                                                                } else {
                                                                    ?> 
                                                                        <form action="/nasocial/logica/controller/usuario/pedidoAmizadeController.php" method="post">
                                                                            <button name="eliminar" type="submit" class="btn btn-sm btn-block btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i><span class="bigger-110">Pedido de Amizade Enviado</span></button>
                                                                            <input type="hidden" name="ce_amigo" value="<?php  print $ce_amigo; ?>"/>
                                                                            <input type="hidden" name="ce_usuario" value="<?php print $utilizador; ?>"/>
                                                                            <input type="hidden" name="orgen" value="desc"/>
                                                                        </form>
                                                                    <?php
                                                                }   
                                                            }
                                                        }
                                                    ?>
            				                    </div>
            				                    <div class="col-xs-12 col-sm-9">
                                                    <h4 class="blue">
                                                        <span class="middle"><?php $u_l->firstName($ce_amigo); ?> <?php $u_l->lastNome($ce_amigo); ?></span>
                                                        <?php 
                                                            if($amigo->amigoLogadoUsuario($ce_amigo) == 1){ ?>
                                                                <span class="label label-success arrowed-in arrowed-in-right"> <i class="ace-icon fa fa-circle smaller-80 align-middle"></i> online </span>
                                                            <?php }else{ ?> <span class="label red arrowed-in-right"> <i class="ace-icon fa fa-circle smaller-80 align-middle"></i> offline </span> <?php
                                                            }
                                                        ?>                                        
                                                    </h4>
                                                <div class="profile-user-info">
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Nome usuário </div>
                                                            <div class="profile-info-value"> <span><?php $u_l->nomeUsuarioAmigo($ce_amigo); ?></span> </div>
                                                        </div>
                                                        <?php if($amigo->localWebUsuarioAmigo($ce_amigo) > 0) ?>
                                                        <?php if($amigo->amigoSexoUsuario($ce_amigo) > 0)  ?>
                                                        <?php if($amigo->amigoIdadeUsuario($ce_amigo) > 0)  ?>   
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Data de Registo </div>
                                                            <div class="profile-info-value"> <span><?php $u_l->dataRegistoUsuarioAmigo($ce_amigo); ?></span> </div>
                                                        </div>
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Último Log </div>
                                                            <div class="profile-info-value"><span><?php $amigo->amigoLogUsuario($ce_amigo);  ?></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="hr hr-8 dotted"></div>
                                                    <div class="profile-user-info">
                                                        <?php if($amigo->paginaWebUsuarioAmigo($ce_amigo) > 0)  ?>
                                                        <?php if($amigo->facebookUsuarioAmigo($ce_amigo) > 0)  ?>
                                                        <?php if($amigo->twitterUsuarioAmigo($ce_amigo) > 0)  ?>
                                                        <?php if($amigo->googleUsuarioAmigo($ce_amigo) > 0)  ?>
                                                    </div>
                                                    
                                                    <hr style="padding:5px 0px 0px 0px; margin:10px 0px 0px 0px;" />
                                                        <div class="btn-group btn-group-justified btn-group-xs">
                                                            <a href="https://www.lea.co.ao/nasocial/loja/catalogo.php?cat=1&us=<?php print $ce_amigo;  ?>" class="btn btn-default"><span class="glyphicon glyphicon-tags"></span> Catalogo Completo </a>
                                                        </div>
                                                    <hr style="padding:0px 0px 0px 0px; margin:5px 0px 0px 0px;" />
                                                    <br/>
                                                </div>
                                            <?php
                                            include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/usuario/painel-disponiveis.php');
                                        }
                                    ?>
                                    
                                    <div style="margin:0px 10px 0px 10px;">
                                        <?php if($pblcc === 0) { ?> <div class="page-header"></div> <?php } ?>
                                        <div class="row">
                                        <div class="col-xs-12 col-sm-3"> <?php include($_SERVER['DOCUMENT_ROOT'].'/nasocial/usuario/pg_pessoas_act.php'); ?> </div>
                                        <div class="col-xs-12 col-sm-6"> <?php include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/usuario/per-ami-pub-painel.php'); ?> </div>
                                        <div class="col-xs-12 col-sm-3">
                                            <div style="color:#ccc; padding-left:10px;"> Pub </div>
                                            <div class="media">
                                                <a href="/discografia/musicas.php?strt=0&cat=MA==&check=0&opm=1">
                                                    <img style="border: 2px solid #ccc; border-radius: 20px;" class=" " width="100%" src="/images/publicidades/baixar_musica_angolana_gratis336x280.jpg" alt="Lea.co.ao">
                                                </a>
                                            </div>
                                            <div class="media">
                                                <a href="https://lea.co.ao/loja/certificacao.php">
                                                    <img style="border: 2px solid #ccc; border-radius: 20px;" class=" " width="100%" src="/images/publicidades/OkiOki_336x228.jpg" alt="...">
                                                </a>
                                            </div>
                                        </div>
                                     </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        
                       
                    <?php
                }
            ?>
        <!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/footer.php'); ?>
<?php $amigo->contarVisualizacoesAmigo($ce_amigo); ?>