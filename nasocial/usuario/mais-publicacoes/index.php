<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/header.php'); 
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/usuario/class.AmigoDAO.php');
    $amigo = new AmigoDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.ComentariosDAO.php');
    $ComentarioDAO = new ComentariosDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/usuario/LinhaTempo.php');
    $LinhaTempo = new LinhaTempo();
?>
            <div class="page-header"> <h1>Publicação </h1> </div>
                <?php 
                    if(is_mobile())
                    {
                        ?>
                            <div class="row">
                                <div  class="col-xs-12 col-md-12">
                                    <div style="padding:0px 0px 10px 0px;">
                                        <a href="/nasocial/usuario/timeline.php" class="btn btn-success btn-lg btn-block" style="color:#fff;"> 
                                            <svg style="fill:#fff" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M6.78 1.97a.75.75 0 010 1.06L3.81 6h6.44A4.75 4.75 0 0115 10.75v2.5a.75.75 0 01-1.5 0v-2.5a3.25 3.25 0 00-3.25-3.25H3.81l2.97 2.97a.75.75 0 11-1.06 1.06L1.47 7.28a.75.75 0 010-1.06l4.25-4.25a.75.75 0 011.06 0z"></path></svg> Voltar Ao Mural
                                        </a>
                                    </div>
                                    <?php $lt->PosteDeUmaSemanaAtrasSelecionado(); ?>
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
                                    <div style="padding:0px 0px 10px 0px;">
                                        <a href="/nasocial/usuario/timeline.php" class="btn btn-success btn-lg btn-block" style="color:#fff;"> 
                                            <svg style="fill:#fff" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M6.78 1.97a.75.75 0 010 1.06L3.81 6h6.44A4.75 4.75 0 0115 10.75v2.5a.75.75 0 01-1.5 0v-2.5a3.25 3.25 0 00-3.25-3.25H3.81l2.97 2.97a.75.75 0 11-1.06 1.06L1.47 7.28a.75.75 0 010-1.06l4.25-4.25a.75.75 0 011.06 0z"></path></svg> Voltar Ao Mural
                                        </a>
                                    </div>
                                    
                                    <?php $lt->PosteDeUmaSemanaAtrasSelecionado(); ?> 
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
