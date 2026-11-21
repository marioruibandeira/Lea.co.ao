<?php 
    //
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/header.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.AgendaEvento.php');
    $InsertAgenda = new AgendaEvento();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.DiscografiaDAO.php');
    $DiscografiaDAO = new DiscografiaDAO();
    //
    /*
    if ((!isset($_GET['u_e']) || trim($_GET['u_e']) == '')) {
        die('Missing record ID!');
    }*/
    $u_e = $_GET['u_e'];
    $u_fnal = $lo_in->chaveUsuario($u_e);
    $inicio = $_GET['strt'];
    if($inicio === null){
        $inicio=0;
    }
    $elmnar = $_GET['acao'];
    $novo = $_GET['novo'];
    $disco = $_GET['disco'];
?>

<style>
    .main-li{background-color:#fff;border:#fff 1px solid;border-radius:50px;}
    .icons-tag{font-weight:bolder;font-size:16px;color:#222843;padding-right: 10px;}
    .main-li:hover {background-color: #ccc; border:#fff 1px solid;border-radius:50px;cursor: pointer;}
    .txt-meuno{color:#222843;font-weight:bolder;font-size:16px;padding-top:20px;}
</style>

            <?php 
                if(is_mobile()) 
                {
                    include_once ($_SERVER['DOCUMENT_ROOT'].'/nasocial/loja/formulario-interno-discos.php');
                }else {
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
                                <?php if($novo !=1) { } ?>
                                <div style="border-left:#ccc 1px solid; border-right:#ccc 1px solid; box-shadow: 0px 5px 5px 2px #888; padding: 0px 0px 0px 0px;"> <?php include_once ($_SERVER['DOCUMENT_ROOT'].'/nasocial/loja/formulario-interno-discos.php'); ?> </div>
                            </div>
                        </div>    
                    <?php
                }
            ?>
        </div>
    </div>
</div>

<?php include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/footer.php'); ?>

<script type="text/javascript">
    
</script>