<?php
/**
 * Description of LinhaTempo
 *
 * @author Mário Bandeira
 */
include_once($_SERVER['DOCUMENT_ROOT'].'/conexao/cnx.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.ComentariosDAO.php'); 

//
class LinhaTempo {
    //
    function postesHojeConfirmacao(){
        $connection = new cnx();
        $connection->connect();
        $query = "SELECT DATE_FORMAT(data_tempo_linha_tempo,'%Y-%m-%d') as data_tempo_linha_tempo, username, ce_usuario, CURDATE() FROM vwlinha_do_tempo HAVING data_tempo_linha_tempo = CURDATE()";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if (mysqli_num_rows($result) > 0){
            $existe_post = 1;
            return $existe_post;
        }else{
            $existe_post = 0;
            return $existe_post;
        }
    }
    //
    function posteDeHoje($usuario_final){
        $connection = new cnx();
        $connection->connect();
        $Comentario = new ComentariosDAO();
        $limite = 5;
        $u_f = base64_decode($usuario_final);
        $query = "SELECT * FROM vwlinha_do_tempo HAVING data_de_trabalho = CURDATE() ORDER BY id_linha_tempo DESC";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                ?>
                    <div class="timeline-item clearfix">
                        <div class="widget-box transparent" style="margin-left:12px;">
                            <div class="widget-header widget-header-small" >
                                <h5 class="widget-title smaller" style="margin-left:3px;">
                                    <?php
                                        if($row->fotoPerfil != '' || $row->fotoPerfil != null) {
                                            ?> <img alt="Susan't Avatar" src="<?php print $row->fotoPerfil;   ?>" style="width:24px; height:24px;border-radius: 50%;" /><?php
                                        }else if($row->ce_sexo == 1)
                                        {
                                            ?> <img alt="Susan't Avatar" src="/nasocial/assets/images/avatars/avatar.png" style="width:24px; height:24px;border-radius: 50%;" /><?php
                                        }else if($row->ce_sexo == 2) {
                                            ?> <img alt="Susan't Avatar" src="/nasocial/assets/images/avatars/avatar3.png" style="width:24px; height:24px;border-radius: 50%;" /><?php
                                        }else{
                                            ?> <img alt="Susan't Avatar" src="/nasocial/assets/images/avatars/avatar2.png" style="width:24px; height:24px;border-radius: 50%;" /><?php   
                                        }
                                    ?>
                                    <a href="/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->ce_usuario); ?>" class="blue" > <b><?php print $row->username; ?></b> </a>
                                </h5>
                                <span class="widget-toolbar no-border"><i class="ace-icon fa fa-clock-o bigger-110"></i> <?php print $row->hora; ?></span>
                                <span class="widget-toolbar"> <a href="#" data-action="collapse"> <i class="ace-icon fa fa-chevron-up"></i></a> </span>
                            </div>

                            <div class="widget-body" >
                                <div class="widget-main" style="padding-top:0px;">
                                    <?php 
                                        if($row->img_publicacao != "/nasocial/imgs/posts/")
                                        { 
                                            ?> 
                                                <div class="row justify-content-md-center">
                                                    <div class="col-md-auto" style="text-align:center;">
                                                        <a href="/nasocial/usuario/publicacao.php?id_p=<?php print base64_encode($row->id_linha_tempo); ?>">
                                                            <img alt="<?php print $row->d_nome; ?>" src="<?php print $row->img_publicacao; ?>"  style="max-width: 100%;" />
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="hr dotted" style="padding-top: 0px; margin-top:10px;"></div>
                                            <?php 
                                        }
                                        //
                                        if($row->img_publicacao == "/nasocial/imgs/posts/"){ print "<br/>";}
                                        //                                        
                                        print $row->post; 
                                    ?> 
                                    &hellip;
                                    
                                    <div class="hr dotted" style="margin-top:10px;"></div>
                                    <div class="widget-toolbox clearfix">
                                        <div class="pull-left"> </div>
                                        <div class="pull-right action-buttons" >
                                            <button onclick="FormularioComentarios.call(this)" type="button" class="btn btn-default btn-round btn-sm btn-white" title="Comentários" style="margin-bottom: 3px;">
												    <i class="ace-icon glyphicon glyphicon-comment red1"></i> <span class="badge badge-primary"><?php print $this->TotalDeComentarios(base64_encode($row->id_linha_tempo)); ?></span>
											</button>
											<form method="post" action="/nasocial/logica/controller/comentariosController.php" class="btn btn-round" style="border:0px; padding:0px;margin-bottom: 2px;">
											    <button type="submit" onclick="curtirPublicacao()" class="btn btn-default btn-round btn-sm btn-white" title="Nolimão">                                         
												    <i class="ace-icon fa fa-thumbs-up red1"></i> <span class="badge badge-primary"><?php print $Comentario->TotalDeCurtidasComentarios(base64_encode($row->id_linha_tempo));?></span> 
    											</button>
    											<input type="hidden" name="id_publicacao" value="<?php print base64_encode($row->id_linha_tempo); ?>">
                                    	        <input type="hidden" name="fk_utilizador" value="<?php print $usuario_final; ?>">
                                    	        <input type="hidden" name="origem" id="origem" value="400">
                                    	        <input type="hidden" name="origem_" id="origem_" value="41">
											</form>
											
											<a href="/nasocial/usuario/publicacao.php?id_p=<?php print base64_encode($row->id_linha_tempo); ?>" class="btn btn-default btn-round btn-sm btn-white" title="Comentar" style="margin-bottom: 3px;"> 
												    <i class="ace-icon fa fa-hand-o-right grey bigger-125"></i> <span class="badge badge-primary">Mais</span>                                                 
											</a>
											<?php
												if(false)
												{ 
												    ?> <button type="submit" class="btn btn-default btn-round btn-sm btn-white" title="Comprar" style="margin-bottom: 3px;"> 
        												<i class="ace-icon glyphicon glyphicon-shopping-cart red2"></i> 
        											</button> <?php 
												}
											?>
											
                                        </div>
                                    </div>
                                    
                                    <div id="myDIV" style="display:none;">
                                        <br/>
                                        <div class="widget-box" style="margin-left:0px;">
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
                                			            <input type="hidden" name="id_publicacao" value="<?php print base64_encode($row->id_linha_tempo); ?>">
                                			            <input type="hidden" name="fk_utilizador" value="<?php print $usuario_final; ?>">
                                			            <input type="hidden" name="origem" value="0">
                                	                </form>
                                	                <div class="dialogs"> <?php $this->ComentariosPrincipal(base64_encode($row->id_linha_tempo),$limite);?> </div>
											    </div>
										    </div>
									    </div>
								    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            }
	    } 
    }
    //
    function ComentariosPrincipal($publicacao,$limite){
        $connection = new cnx();
        $connection->connect();
        $fk_publicacao = base64_decode($publicacao);
        
        $query = "";
        
        if($limite == 0)
        {
            $query = "SELECT * FROM vw_nas_comentarios WHERE fk_publicacao = $fk_publicacao  ORDER by id_comentario_post DESC";
        }else{
            $query = "SELECT * FROM vw_nas_comentarios WHERE fk_publicacao = $fk_publicacao  ORDER by id_comentario_post DESC LIMIT $limite";   
        }
        
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            ?>
            <div class="widget-box" style="margin-left:0px;">
                <div class="widget-header">
                    <h4 class="widget-title lighter smaller"> <i class="ace-icon fa fa-comment blue"></i> Comentários </h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main no-padding">
                        <?php
                        while($row = mysqli_fetch_object($result))
                        {
                            ?>
                            <div class="dialogs">
                                <div class="itemdiv dialogdiv">
                                    <div class="user">
                                        <?php
                                            if($row->fotoPerfil != '' || $row->fotoPerfil != null)
                                            {
                                                ?> <img alt="<?php print $row->username; ?>" src="<?php print $row->fotoPerfil;   ?>" style="border-radius: 50%;" /><?php
                                            }else if($row->ce_sexo == 1)
                                            {
                                                ?> <img alt="<?php print $row->username; ?>" src="/nasocial/assets/images/avatars/avatar.png" style="width:24px; height:24px;border-radius: 50%;" /><?php
                                            }else if($row->ce_sexo == 2)
                                            {
                                                ?> <img alt="<?php print $row->username; ?>" src="/nasocial/assets/images/avatars/avatar3.png" style="width:24px; height:24px;border-radius: 50%;" /><?php
                                            }else{
                                                ?> <img alt="<?php print $row->username; ?>" src="/nasocial/assets/images/avatars/avatar2.png" style="width:24px; height:24px;border-radius: 50%;" /><?php   
                                            }
                                        ?>
                                    </div>
                                    <div class="body">
                                        <div class="time"><i class="ace-icon fa fa-clock-o"></i> <span class="green"><?php print $row->data_comentario; ?></span> </div>
                                        <div class="name"><a href="https://www.lea.co.ao/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->fk_utilizador); ?>"><?php print $row->username; ?></a></div>
                                        <div class="text"><?php print $row->comentario; ?></div>
                                        <div class="tools">
                                            <a href="#" class="btn btn-minier btn-info"> <i class="icon-only ace-icon fa fa-share"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    //
    function TotalDeComentarios($fk_publicacao){
        $connection = new cnx();
        $connection->connect();
        $fk_publicacao_ = base64_decode($fk_publicacao);
        $query = "SELECT COUNT(fk_publicacao) as total_comentarios FROM vw_nas_comentarios WHERE fk_publicacao = $fk_publicacao_";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if (mysqli_num_rows($result) > 0){
             while($row = mysqli_fetch_object($result))
             {
                 return $row->total_comentarios;
             }
        }
    }
    //
    function posteDeHojeDois(){
        $connection = new cnx();
        $connection->connect();
        $u_f = base64_decode($usuario_final);
        $query = "SELECT * FROM vwlinha_do_tempo HAVING data_de_trabalho = CURDATE()";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                ?>
                    <div class="timeline-items">
                        <div class="timeline-item clearfix">
                            <div class="timeline-info"> <span class="timeline-date"><?php print $row->hora; ?></span> <i class="timeline-indicator btn btn-info no-hover"></i> </div>
                            <div class="widget-box transparent">
                                <div class="widget-body">
                                    <div class="widget-main no-padding">
                                        <span class="bigger-110"> 
                                            <a href="#" class="purple bolder">
                                                <?php print $row->username; ?>
                                            </a> 
                                            
                                            <?php print $row->post; ?> 
                                        </span> 
                                        <br />
                                        <i class="ace-icon fa fa-hand-o-right grey bigger-125"></i> <a href="#">Mais &hellip;</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            }
            if(mysqli_num_rows($result) > 9)
    	    {
    	        ?>
    	            <div class="center">
                        <i class="ace-icon fa fa-users fa-2x green middle"></i> &nbsp;
                        <a href="#" class="btn btn-sm btn-white btn-info"> Ver Mais Publicações &nbsp; <i class="ace-icon fa fa-arrow-right"></i> </a>
                    </div>
    	        <?php
    	    }
	    }
	    
    }
    //
    function categoriaDPostagens($cp_idioma){
        $connection = new cnx();
        $connection->connect();
        $query = "SELECT * FROM tblcategoria_post WHERE id_cat_post = 5 and ce_idioma = " . $cp_idioma;
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if (mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){                
                print $row->categoria_post;
            }
        }
    }
    //
    
    function postesOntemConfirmacao(){
        $connection = new cnx();
        $connection->connect();
        //$u_f = base64_decode($usuario_final);
        //echo("<script>console.log('PHP: ".$u_f."');</script>");
        $query = "SELECT * FROM tbllinha_tempo WHERE UNIX_TIMESTAMP(data_tempo_linha_tempo) >= UNIX_TIMESTAMP(CAST(NOW() - INTERVAL 1 DAY AS DATE)) AND UNIX_TIMESTAMP(data_tempo_linha_tempo) <= UNIX_TIMESTAMP(CAST(NOW() AS DATE))";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if (mysqli_num_rows($result) > 0){
            $existe_post = 1;
            return $existe_post;
        }else{
            $existe_post = 0;
            return $existe_post;
        }
    }
    
    function posteDeOntem(){
        $connection = new cnx();
        $connection->connect();
        $query = "SELECT * FROM vwlinha_do_tempo WHERE UNIX_TIMESTAMP(data_tempo_linha_tempo) >= UNIX_TIMESTAMP(CAST(NOW() - INTERVAL 1 DAY AS DATE)) AND UNIX_TIMESTAMP(data_tempo_linha_tempo) <= UNIX_TIMESTAMP(CAST(NOW() AS DATE))";
        $result = mysqli_query($connection->myconn,$query);

        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                ?>
                    <div class="timeline-item clearfix">
                        <div class="timeline-info">
                            <?php 
                                if($row->fotoPerfil != '' || $row->fotoPerfil != null)
                                {
                                    ?> <img alt="<?php print $row->username; ?>" src="<?php print $row->fotoPerfil;   ?>" /><?php
                                }else if($row->ce_sexo == 1)
                                {
                                    ?> <img alt="<?php print $row->username; ?>" src="/nasocial/assets/images/avatars/avatar.png" /><?php
                                }else if($row->ce_sexo == 2)
                                {
                                    ?> <img alt="<?php print $row->username; ?>" src="/nasocial/assets/images/avatars/avatar3.png" /><?php
                                }else{
                                    ?> <img alt="<?php print $row->username; ?>" src="/nasocial/assets/images/avatars/avatar2.png" /><?php   
                                }
                            ?>
                            <span class="label label-info label-sm"><?php print $row->hora; ?></span>
                        </div>

                        <div class="widget-box transparent">
                            <div class="widget-header widget-header-small">
                                <h5 class="widget-title smaller">
                                    <a href="/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->ce_usuario); ?>" class="blue"><?php print $row->username; ?></a>
                                    <span class="grey"><?php print $row->categoria_post . " " . $row->formato_produto . " <b>" . $row->d_nome."</b>";?></span>
                                </h5>

                                <span class="widget-toolbar no-border"><i class="ace-icon fa fa-clock-o bigger-110"></i> <?php print $row->hora; ?></span>

                                <span class="widget-toolbar">
                                    <a href="#" data-action="reload"> <i class="ace-icon fa fa-refresh"></i> </a>
                                    <a href="#" data-action="collapse"> <i class="ace-icon fa fa-chevron-up"></i> </a>
                                </span>
                            </div>

                            <div class="widget-body">
                                <div class="widget-main">
                                    <div class="pull-right">
                                        &nbsp;
                                        <?php
                                            if($row->img_publicacao != "" && $row->img_publicacao != null && $row->img_publicacao != "/nasocial/imgs/posts/")
                                            {
                                                ?> <a href="/nasocial/usuario/publicacao.php?id_p=<?php print base64_encode($row->id_linha_tempo); ?>"><img alt="<?php print "Publicação de " . $row->username; ?>" width="36" src="<?php print $row->img_publicacao; ?>" /></a> <?php
                                            }
                                        ?>
                                    </div>
                                    <?php print $row->post; ?> &hellip;
                                    <div class="space-6"></div>
                                    <div class="widget-toolbox clearfix">
                                        <div class="pull-left">
                                            <i class="ace-icon fa fa-hand-o-right grey bigger-125"></i>
                                            <a href="/nasocial/usuario/publicacao.php?id_p=<?php print base64_encode($row->id_linha_tempo); ?>" class="bigger-110">Mais &hellip;</a>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            }
            ?>
                <div class="pagination flex-m flex-w p-r-50">
                    <?php
                        if($start >=$records_per_page){
                            print "<a href='" . $caminho . "?strt=" . ($start-$records_per_page) . "' class='item-pagination flex-c-m trans-0-4 active-pagination'>««</a>";
                        }
                        if($start+$records_per_page < $total_records && $start >= 0){
                            print "<a href='". $caminho ."?strt=".($start+$records_per_page) ."' class='item-pagination flex-c-m trans-0-4'>»»</a>";
                        }
                    ?>
                </div>
            <?php
	    }else{
            print "<h4>Hoops! Não há publicações disponíveis de momento.</h4>";
        }
    }
    //Listagem dos posts de ontem
    function posteDeOntemDois(){
        $connection = new cnx();
        $connection->connect();
        $query = "SELECT * FROM vwlinha_do_tempo WHERE data_tempo_linha_tempo >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY AND data_tempo_linha_tempo < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY";
        $result = mysqli_query($connection->myconn,$query);

        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                ?>
                    <div class="timeline-items">
                        <div class="timeline-item clearfix">
                            <div class="timeline-info"><span class="timeline-date"><?php print $row->hora; ?></span> <i class="timeline-indicator btn btn-success no-hover"></i></div>
                            <div class="widget-box transparent">
                                <div class="widget-body">
                                    <div class="widget-main no-padding">
                                        <div class="clearfix">
                                            <div class="pull-left">
                                                <span class="orange2 bolder"><?php print $row->username; ?></span> <?php print $row->post; ?>
                                            </div>
                                            <div class="pull-right">
                                                <i class="ace-icon fa fa-chevron-left blue bigger-110"></i>
                                                &nbsp;
                                                <img alt="Image 4" width="36" src="assets/images/gallery/thumb-4.jpg" />
                                                <img alt="Image 3" width="36" src="assets/images/gallery/thumb-3.jpg" />
                                                <img alt="Image 2" width="36" src="assets/images/gallery/thumb-2.jpg" />
                                                <img alt="Image 1" width="36" src="assets/images/gallery/thumb-1.jpg" />
                                                &nbsp;
                                                <i class="ace-icon fa fa-chevron-right blue bigger-110"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>								
                    </div><!-- /.timeline-items -->
                <?php
            }
	    }
	    if(mysqli_num_rows($result) > 9)
	    {
	        ?>
	            <div class="center">
                    <i class="ace-icon fa fa-users fa-2x green middle"></i> &nbsp;
                    <a href="#" class="btn btn-sm btn-white btn-info"> Ver Mais Publicações &nbsp; <i class="ace-icon fa fa-arrow-right"></i> </a>
                </div>
	        <?php
	    }
    }
    //
    function postesDeUmaSemanaAtrasConfirmacao(){
        $connection = new cnx();
        $connection->connect();
        //$u_f = base64_decode($usuario_final);
        //echo("<script>console.log('PHP: ".$u_f."');</script>");
        $query = "SELECT * FROM vwlinha_do_tempo WHERE data_tempo_linha_tempo BETWEEN SUBDATE(CURDATE(), 7) AND CURDATE() ";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if (mysqli_num_rows($result) > 0){
            $existe_post = 1;
            return $existe_post;
        }else{
            $existe_post = 0;
            return $existe_post;
        }
    }
    
    function posteDeUmaSemanaAtras(){
        $connection = new cnx();
        $connection->connect();
        $u_f = base64_decode($usuario_final);
        $query = "SELECT * FROM vwlinha_do_tempo WHERE data_tempo_linha_tempo BETWEEN SUBDATE(CURDATE(), 7) AND CURDATE() ORDER BY data_tempo_linha_tempo DESC LIMIT 10";
        $result = mysqli_query($connection->myconn,$query);

        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result))
            {
                ?>
                    <div class="timeline-item clearfix">
                        <div class="timeline-info">
                            <?php 
                                if($row->fotoPerfil != '' || $row->fotoPerfil != null)
                                {
                                    ?> <img alt="Susan't Avatar" src="<?php print $row->fotoPerfil;   ?>" /><?php
                                }else if($row->ce_sexo == 1)
                                {
                                    ?> <img alt="Susan't Avatar" src="http://www.lea.co.ao/nasocial/assets/images/avatars/avatar.png" /><?php
                                }else if($row->ce_sexo == 2)
                                {
                                    ?> <img alt="Susan't Avatar" src="http://www.lea.co.ao/nasocial/assets/images/avatars/avatar3.png" /><?php
                                }else{
                                    ?> <img alt="Susan't Avatar" src="http://www.lea.co.ao/nasocial/assets/images/avatars/avatar2.png" /><?php   
                                }
                            ?>
                            <span class="label label-info label-sm" STYLE="font-size:9px;"><?php $mysqltime = date ('d-m-Y', strtotime($row->data_tempo_linha_tempo));  print $mysqltime; ?></span>
                        </div>

                        <div class="widget-box transparent">
                            <div class="widget-header widget-header-small">
                                <h5 class="widget-title smaller">
                                    <a href="/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->ce_usuario); ?>" class="blue"><?php print $row->username; ?></a>
                                    <span class="grey"><?php print $row->categoria_post . " " . $row->formato_produto . " <b>" . $row->d_nome."</b>";?></span>
                                </h5>

                                <span class="widget-toolbar no-border"><i class="ace-icon fa fa-clock-o bigger-110"></i> <?php print $row->hora; ?></span>

                                <span class="widget-toolbar">
                                    <a href="#" data-action="reload"> <i class="ace-icon fa fa-refresh"></i> </a>
                                    <a href="#" data-action="collapse"> <i class="ace-icon fa fa-chevron-up"></i> </a>
                                </span>
                            </div>

                            <div class="widget-body">
                                <div class="widget-main">
                                    <div class="pull-right">
			                            &nbsp;
                                        <a href="#">
                                            <?php
                                                if($row->img_publicacao != "" || $row->img_publicacao != null)
                                                {
                                                    ?> <a href="https://www.lea.co.ao/nasocial/usuario/publicacao.php?id_p=<?php print base64_encode($row->id_linha_tempo); ?>"><img alt="<?php //print $row->d_nome; ?>" width="36" src="<?php print $row->img_publicacao; ?>" /> </a><?php
                                                }
                                            ?>
                                        </a>
                                    </div>
                                    
                                    <?php print $row->post; ?> &hellip;
                                    
                                    <div class="space-6"></div>
                                    
                                    <div class="widget-toolbox clearfix">
                                        <div class="pull-left">
                                            <i class="ace-icon fa fa-hand-o-right grey bigger-125"></i>
                                            <a href="https://www.lea.co.ao/nasocial/usuario/publicacao.php?id_p=<?php print base64_encode($row->id_linha_tempo); ?>" class="bigger-110">Mais &hellip;</a>
                                        </div>
                                        <!--        
                                        <div class="pull-right action-buttons">
                                            <a href="#"> <i class="ace-icon fa fa-check green bigger-130"></i> </a>

                                            <a href="#"> <i class="ace-icon fa fa-pencil blue bigger-125"></i> </a>

                                            <a href="#"> <i class="ace-icon fa fa-times red bigger-125"></i> </a>
                                        </div>
                                        -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            }
	    }
	    if(mysqli_num_rows($result) > 9)
	    {
	        ?>
	            <div class="center">
                    <i class="ace-icon fa fa-users fa-2x green middle"></i> &nbsp;
                    <a href="/nasocial/usuario/mais-publicacoes/" class="btn btn-sm btn-white btn-info"> Ver Mais Publicações &nbsp; <i class="ace-icon fa fa-arrow-right"></i> </a>
                </div>
	        <?php
	    }
    }
    //
    function PosteDeUmaSemanaAtrasSelecionado(){
        $connection = new cnx();
        $connection->connect();
        $u_f = base64_decode($usuario_final);
        $query = "SELECT * FROM vwlinha_do_tempo WHERE data_tempo_linha_tempo BETWEEN SUBDATE(CURDATE(), 7) AND CURDATE() ORDER BY data_tempo_linha_tempo DESC LIMIT 10";
        $result = mysqli_query($connection->myconn,$query);

        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result))
            {
                ?>
                    <div class="timeline-item clearfix">
                        <div class="timeline-info">
                            <?php 
                                if($row->fotoPerfil != '' || $row->fotoPerfil != null)
                                {
                                    ?> <img alt="Susan't Avatar" src="<?php print $row->fotoPerfil;   ?>" /><?php
                                }else if($row->ce_sexo == 1)
                                {
                                    ?> <img alt="Susan't Avatar" src="http://www.lea.co.ao/nasocial/assets/images/avatars/avatar.png" /><?php
                                }else if($row->ce_sexo == 2)
                                {
                                    ?> <img alt="Susan't Avatar" src="http://www.lea.co.ao/nasocial/assets/images/avatars/avatar3.png" /><?php
                                }else{
                                    ?> <img alt="Susan't Avatar" src="http://www.lea.co.ao/nasocial/assets/images/avatars/avatar2.png" /><?php   
                                }
                            ?>
                            <span class="label label-info label-sm" STYLE="font-size:9px;"><?php $mysqltime = date ('d-m-Y', strtotime($row->data_tempo_linha_tempo));  print $mysqltime; ?></span>
                        </div>

                        <div class="widget-box transparent">
                            <div class="widget-header widget-header-small">
                                <h5 class="widget-title smaller">
                                    <a href="/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->ce_usuario); ?>" class="blue"><?php print $row->username; ?></a>
                                    <span class="grey"><?php print $row->categoria_post . " " . $row->formato_produto . " <b>" . $row->d_nome."</b>";?></span>
                                </h5>

                                <span class="widget-toolbar no-border"><i class="ace-icon fa fa-clock-o bigger-110"></i> <?php print $row->hora; ?></span>

                                <span class="widget-toolbar">
                                    <a href="#" data-action="reload"> <i class="ace-icon fa fa-refresh"></i> </a>
                                    <a href="#" data-action="collapse"> <i class="ace-icon fa fa-chevron-up"></i> </a>
                                </span>
                            </div>

                            <div class="widget-body">
                                <div class="widget-main">
                                    <div class="pull-right">
			                            &nbsp;
                                        <a href="#">
                                            <?php
                                                if($row->img_publicacao != "" || $row->img_publicacao != null)
                                                {
                                                    ?> <a href="https://www.lea.co.ao/nasocial/usuario/publicacao.php?id_p=<?php print base64_encode($row->id_linha_tempo); ?>"><img alt="<?php //print $row->d_nome; ?>" width="36" src="<?php print $row->img_publicacao; ?>" /> </a><?php
                                                }
                                            ?>
                                        </a>
                                    </div>
                                    
                                    <?php print $row->post; ?> &hellip;
                                    
                                    <div class="space-6"></div>
                                    
                                    <div class="widget-toolbox clearfix">
                                        <div class="pull-left">
                                            <i class="ace-icon fa fa-hand-o-right grey bigger-125"></i>
                                            <a href="https://www.lea.co.ao/nasocial/usuario/publicacao.php?id_p=<?php print base64_encode($row->id_linha_tempo); ?>" class="bigger-110">Mais &hellip;</a>
                                        </div>
                                        <!--        
                                        <div class="pull-right action-buttons">
                                            <a href="#"> <i class="ace-icon fa fa-check green bigger-130"></i> </a>

                                            <a href="#"> <i class="ace-icon fa fa-pencil blue bigger-125"></i> </a>

                                            <a href="#"> <i class="ace-icon fa fa-times red bigger-125"></i> </a>
                                        </div>
                                        -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            }
	    }
	    if(mysqli_num_rows($result) > 9)
	    {
	        ?>
	            <br/>
	            <div class="center">
                    <i class="ace-icon fa fa-users fa-2x green middle"></i> &nbsp;
                    <a href="/nasocial/usuario/mais-publicacoes/" class="btn btn-sm btn-white btn-info"> Ver Mais Publicações &nbsp; <i class="ace-icon fa fa-arrow-right"></i> </a>
                </div>
	        <?php
	    }
    }
}
