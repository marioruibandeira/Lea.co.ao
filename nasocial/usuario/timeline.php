<?php
    //
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/header.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/usuario/LinhaTempo.php');
    $lt = new LinhaTempo();
    //
?>
<script type="text/javascript" src="jquery.1.8.3.min.js"></script>
<script type="text/javascript" src="MaxLength.min.js"></script>
<script type="text/javascript">
    $(function () {
        //Normal Configuration
        $("#TextBox1").MaxLength({ MaxLength: 100 });

        //Specifying the Character Count control explicitly
        $("#TextBox2").MaxLength(
        {
            MaxLength: 15,
            CharacterCountControl: $('#counter')
        });

        //Disable Character Count
        $("#TextBox3").MaxLength(
        {
            MaxLength: 20,
            DisplayCharacterCount: false
        });
    });
</script>
<!--
<div class="page-header">
    <h1> Mural <small> <i class="ace-icon fa fa-angle-double-right"></i> Suas Publicações e Mais </small> </h1> 
</div>
-->
<div class="row">
    <div class="col-xs-12">
        <!-- TIMELINE FORMULARIO -->
        <div class="page-header">
            <div class="row">
                <?php
                    if(is_mobile())
                    {
                        ?>
                            <div class="col-xs-12 col-md-12">
                                
                                <a href="/nasocial/usuario/timeline.php" style="width:100%; padding-top:0px; margin-top:0px;" class="btn btn-sm btn-warning no-radius"> <i class="fa fa-refresh" aria-hidden="true"></i> Refrescar </a> 
                                
                                <div class="widget-box">
                                    <div class="widget-header" style="padding:  0px;">
                                        <h4 class="widget-title lighter smaller">
                                            <i class="ace-icon fa fa-comment blue" style="padding-left: 25px;"></i> Qual é a ideia? 
                                        </h4>
                                        <form action="/nasocial/logica/controller/usuario/timelineInlineFormularioController.php" enctype="multipart/form-data" method="post">
                                            <div class="form-actions" style="margin:  0px; padding:  10px 0px 0px 0px;">
                                                <div class="input-group">
                                                    <div class="form-row">
                                                        <div class="col-md-12 mb-12" style="margin:0px 0px 8px 0px; width: 100%;">
                                                            <textarea class="form-control" name="pblicacao" placeholder="Qua é a ideia?..." id="TextBox1" style="height: 100%; width: 100%" onblur="this.value=removedorSpaco(this.value);"></textarea>
                                                        </div>
                                                        <div class="col-md-6 mb-6" style="margin:0px 0px 8px 0px;">
                                                            <input name="img_pblicacao" type="file" style="width:100%;"/>
                                                        </div>
                                                        <div class="col-md-6 mb-6" style="margin:0px 0px 8px 0px;">
                                                            <button style="width:100%;" class="btn btn-sm btn-info no-radius" type="submit"> <i class="ace-icon fa fa-share"></i> Publicar </button> 
                                                        </div>
                                                    </div>                 
                                                </div>
                                                <input type="hidden" name="usuario" value="<?php print $u_fnal; ?>">
                                            </div>
                                        </form>
                                         </div>
                                        </div>
                                        
                                        <div class="widget-box" style="border:#fff 0px; padding:0px 14px 0px 14px;">
                                            <div id="timeline-1">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <?php
                                                            if($lt->postesHojeConfirmacao() > 0 )
                                                            { 
                                                                ?>
                                                                    <div class="timeline-container">
                                                                        <div class="timeline-label"> <span class="label label-primary arrowed-in-right label-lg"><b>Hoje</b></span> </div>
                                                                        <?php $lt->posteDeHoje($usuario); ?> 
                                                                    </div>
                                                                <?php 
                                                            }
                                                            
                                                            if($lt->postesOntemConfirmacao() > 0 )
                                                            {  
                                                                ?>
                                                                    <div class="timeline-container">
                                                                        <div class="timeline-label"> <span class="label label-success arrowed-in-right label-lg"> <b>Ontem</b> </span> </div>
                                                                        <?php $lt->posteDeOntem(); ?> 
                                                                    </div>
                                                                <?php 
                                                            }else{ 
                                                                if($lt->postesDeUmaSemanaAtrasConfirmacao() > 0)
                                                                { 
                                                                    ?>
                                                                        <div class="timeline-container">
                                                                            <div class="timeline-label"><span class="label label-grey arrowed-in-right label-lg"> <b>Semana Passada</b> </span></div>
                                                                            <?php $lt->posteDeUmaSemanaAtras(); ?> 
                                                                        </div>
                                                                    <?php 
                                                                }
                                                            }
                                                            /*
                                                            if($lt->posteDeUmaSemanaAtras() > 0 ){ ?>
                                                                <div class="timeline-container">
                                                                    <div class="timeline-label"><span class="label label-grey arrowed-in-right label-lg"> <b>Semana Passada</b> </span></div>
                                                                        <?php $lt->posteDeUmaSemanaAtras(); ?> <!-- /.timeline-items -->
                                                                    </div><!-- /.timeline-container -->
                                                                <?php 
                                                            }
                                                            */
                                                        ?>
                                    	            </div>
                                                </div>
                                    	    </div>
                                        </div>
                                    
                                    <br/>
                                    <div class="hr dotted"></div>
                                    <br/>
                                </div>
                            <div  class="col-xs-12 col-md-12"> <?php include($_SERVER['DOCUMENT_ROOT'].'/nasocial/usuario/pg_pessoas_act.php'); ?> </div>
                            <div class="col-xs-12 col-md-12"><?php include($_SERVER['DOCUMENT_ROOT'].'/nasocial/usuario/pg_pessoas_n.php'); ?></div>
                        <?php
                    }
                    else
                    {
                        ?>
                            <div class="col-xs-6 col-md-3"><?php include($_SERVER['DOCUMENT_ROOT'].'/nasocial/usuario/pg_pessoas_n.php'); ?></div>
                                <div class="col-xs-12 col-md-6">
                                    <a href="/nasocial/usuario/timeline.php" style="width:100%; padding-top:0px; margin-top:0px;" class="btn btn-sm btn-warning no-radius"> <i class="fa fa-refresh" aria-hidden="true"></i> Refrescar </a>
                                    <div style="margin-top:10px;"></div>
                                    <?php include($_SERVER['DOCUMENT_ROOT'].'/nasocial/usuario/formulario-publicacao.php'); ?>
                                    
                                    <div class="widget-box" style="border:#fff 0px; padding-right:14px;">
                                        <div id="timeline-1">
                                            <div class="row">
                                                <div class="col-12">
                                                    <?php
                                                        if($lt->postesHojeConfirmacao() > 0 ){ $lt->posteDeHoje($usuario); }
                                                        //
                                                        if($lt->postesOntemConfirmacao() > 0 ) {  
                                                            ?> <div class="timeline-container"> <div class="timeline-label"> <span class="label label-success arrowed-in-right label-lg"> <b>Ontem</b> </span> </div> <?php $lt->posteDeOntem(); ?> </div> <?php 
                                                        }else{ 
                                                            if($lt->postesDeUmaSemanaAtrasConfirmacao() > 0) { 
                                                                ?> <div class="timeline-container"> <div class="timeline-label"><span class="label label-grey arrowed-in-right label-lg"> <b>Semana Passada</b> </span></div> <?php $lt->posteDeUmaSemanaAtras(); ?>  </div> <?php 
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-3"><?php include($_SERVER['DOCUMENT_ROOT'].'/nasocial/usuario/pg_pessoas_act.php'); ?></div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div> <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div> <!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
<!-- basic scripts -->
<!--[if !IE]> -->
<script src="lea.co.ao/nasocial/assets/js/jquery-2.1.4.min.js"></script>
<!-- <![endif]-->
<!--[if IE]>
<script src="http://lea.co.ao/nasocial/assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
    jQuery(function($) {
	$('[data-toggle="buttons"] .btn').on('click', function(e){
            var target = $(this).find('input[type=radio]');
            var which = parseInt(target.val());
            $('[id*="timeline-"]').addClass('hide');
            $('#timeline-'+which).removeClass('hide');
        });
    });
</script>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/footer.php'); ?>
<script language="javascript" type="text/javascript">
    function pageRedirect_oops() {  //window.location.replace("http://lea.co.ao/nasocial/login/login.php?pes=0");  } setTimeout("pageRedirect_oops()", 10000);
    //
    function removedorSpaco(string) { var str = string; var st = str.trim(); return st;  }
</script>
<script type="text/javascript">
    function FormularioComentarios() {
        var x = this.closest('.widget-main').querySelector("#myDIV");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
    }
</script>

<script>
    function curtirPublicacao() 
    {
        var id_publicacao = document.getElementById("id_publicacao").value;
        var fk_utilizador = document.getElementById("fk_utilizador").value;
        var origem = document.getElementById("origem").value;
        var origem_ = document.getElementById("origem_").value;
        
        
        
        $.ajax({
            type : "POST",  //type of method
            url  : "https://lea.co.ao/nasocial/logica/controller/comentariosController.php",  //your page
            alert("Enviamos Com Sucesso" + fk_utilizador );
            data : { id_publicacao : id_publicacao, fk_utilizador : fk_utilizador, origem : origem , origem_ : origem_},// passing the values
            success: function(res){  
                
                }
            });
    }
</script>
        

