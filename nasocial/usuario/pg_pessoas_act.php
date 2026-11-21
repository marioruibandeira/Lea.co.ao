<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UsuarioDAO.php'); 
    $u_l = new UsuarioDAO(); 
    $n = 10;
    //
    //include($_SERVER['DOCUMENT_ROOT'].'/nasocial/usuario/pg_publicacao_ad.php');
?>
<div class="widget-header widget-header-small" style="border:#ccc 1px solid; border-radius: 5px 5px 0px 0px !important;">
    <h4 class="widget-title smaller"> <i class="fa-solid fa-signal-bars bigger-110"></i>Utilizadores Online</h4>
</div>
<div id="profile-feed-1" class="profile-feed">
    <div style="border:#ccc 1px solid; border-radius: 0px 0px 5px 5px !important;"> <?php $u_l->listarUtilizadoresActivos($u_fnal,$ses,$n); ?></div>
    <div class="space-12"></div>
    <?php 
        if($u_l->UtilizadoresActivosVerificacao($u_fnal,$ses,$n) > 10 )
        {
            ?>
                <div class="center">
                    <button type="button" class="btn btn-sm btn-primary btn-white btn-round">
                        <i class="blue ace-icon fa fa-users bigger-120"></i>
                        <span class="bigger-110">Ver Mais Pessoas</span>
                        <i class="icon-on-right ace-icon fa fa-arrow-right"></i>
                    </button>
                </div>
            <?php
        }
    ?>
</div>