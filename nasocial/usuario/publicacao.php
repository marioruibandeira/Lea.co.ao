<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/header.php'); 
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/usuario/class.AmigoDAO.php');
    $amigo = new AmigoDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.ComentariosDAO.php');
    $ComentarioDAO = new ComentariosDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/usuario/LinhaTempo.php');
    $LinhaTempo = new LinhaTempo();
?>
            
                <?php 
                    if(is_mobile())
                    {
                        ?>
                        <a href="/nasocial/usuario/timeline.php" style="width:100%; padding-top:0px; margin-top:0px;" class="btn btn-sm btn-warning no-radius"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar </a> 
                            <div style="margin-top:10px;"></div>
                            <div class="row" >
                                <div  class="col-xs-12 col-md-12">
                                    <?php include($_SERVER['DOCUMENT_ROOT'].'/nasocial/usuario/pg_publicacao.php'); ?>
                                    <br/>
                                </div> 
                                <div  class="col-xs-12 col-md-12">
                                    <?php include($_SERVER['DOCUMENT_ROOT'].'/nasocial/usuario/pg_publicacao_ad.php'); ?>
                                </div>
                                <div  class="col-xs-12 col-md-12">
                                    <?php include($_SERVER['DOCUMENT_ROOT'].'/nasocial/usuario/pg_pessoas_n.php'); ?>
                                </div>
                            </div>
                        <?php
                    }
                    else
                    {
                        ?>
                            <div class="row">
                                <div  class="col-xs-3 col-md-3"> <?php include($_SERVER['DOCUMENT_ROOT'].'/nasocial/usuario/pg_pessoas_n.php'); ?> </div> 
                                <div  class="col-xs-6 col-md-6"> 
                                    <a href="/nasocial/usuario/timeline.php" style="width:100%; padding-top:0px; margin-top:0px;" class="btn btn-sm btn-warning no-radius"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar </a> 
                                    <div style="margin-top:10px;"></div>
                                    <?php include($_SERVER['DOCUMENT_ROOT'].'/nasocial/usuario/pg_publicacao.php'); ?> 
                                </div>
                                <div  class="col-xs-3 col-md-3"> <?php include($_SERVER['DOCUMENT_ROOT'].'/nasocial/usuario/pg_publicacao_ad.php'); ?> </div>
                            </div>
                        <?php
                    }
                ?>
        </div><!-- /.page-content -->
    </div>
</div>
<!-- page specific plugin scripts -->
<script src="https://lea.co.ao/nasocial/assets/js/holder.min.js"></script>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/footer.php'); ?>
