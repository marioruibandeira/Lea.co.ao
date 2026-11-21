<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UsuarioDAO.php'); 
    $u_l = new UsuarioDAO(); 
    $n = 6;
?>
<div class="widget-header widget-header-small">
    <h4 class="widget-title smaller"> <i class="ace-icon fa fa-check-square-o bigger-110"></i>Novos Utilizadores </h4>
</div>

<div id="profile-feed-1" class="profile-feed">
    <div style="border:#ccc 1px solid; border-radio:15px;">
        <?php $u_l->listarAmingosPerfil($u_fnal,$ses,$n); ?>
    </div>
    <div class="space-12"></div>
    <div class="center">
        <button type="button" class="btn btn-sm btn-primary btn-white btn-round">
            <i class="blue ace-icon fa fa-users bigger-120"></i>
            <span class="bigger-110">Ver Mais Pessoas</span>
            <i class="icon-on-right ace-icon fa fa-arrow-right"></i>
        </button>
    </div>
</div>