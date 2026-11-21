<div class="card" style="width: 100%;">
    <ul class="list-group list-group-flush">
        <li class="list-group-item" style="padding:0px;"> <?php $postes->FotoDeQuemPublicou($id_p_); ?> </li>
        <li class="list-group-item"><?php $postes->NomeDeQuemPublicou($id_p_); ?></li>
        <li class="list-group-item"><?php $amigo_ = $amigo->totolAmigosAmigo($usuario_final); $amigo->totolAmigosAmigo($usuario_final);  ?> Amigo <?php if($amigo_>0){ print "(s)";} ?></li>
        <li class="list-group-item" style="padding:0px;"> <?php $postes->EstatoDeAmizadeDeQuemPublicou($id_p_,$usuario_final); ?></li>
        <li class="list-group-item" style="padding:0px;"> <?php $postes->EstatoDeBloqueioNaPublicacao($id_p_,$usuario_final); ?></li>
    </ul>
</div>