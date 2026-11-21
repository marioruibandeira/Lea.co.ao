<div class="widget-box transparent">
    <?php
        if($pblcc === 0)
        {
            ?>
            <div class="widget-header widget-header-small">
                <h4 class="widget-title smaller"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                        <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    </svg> Sobre Me 
                </h4>
            </div>
            <div class="widget-body">
                <div class="widget-main" style="border:dashed 1px #ccc; margin-top: 10px; margin-bottom: 10px; border-radius: 10px; padding:10px 10px 0px 10px;"> <p> <?php $u_l->sobreUsuario($ce_amigo); ?> </p> </div>
            </div>
            <div class="widget-header widget-header-small">
                <h4 class="widget-title smaller"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stars" viewBox="0 0 16 16">
                        <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"/>
                    </svg> Seguindo <?php //$u_l->nomeUsuarioAmigo($ce_amigo); ?>
                </h4>
            </div>
            <div class="widget-body">
                <div class="widget-main" style="border:dashed 1px #ccc; margin-top: 10px; margin-bottom: 10px; border-radius: 10px;"> 
                    <div class="row" style="padding:0px 15px 0px 15px;"> 
                        <?php $BibiliotecaDAO->ListaArtistasDoAmigo($ce_amigo); ?> 
                    </div> 
                </div>
            </div>
            <div class="widget-header widget-header-small">
                <h4 class="widget-title smaller"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-boombox-fill" viewBox="0 0 16 16">
                        <path d="M14.5.5a.5.5 0 0 0-1 0V2H1a1 1 0 0 0-1 1v2h16V3a1 1 0 0 0-1-1h-.5V.5ZM2.5 4a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1Zm2 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1Zm7.5-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Zm1.5.5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1Zm-7-1h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1Zm-2 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Zm.5-1.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Zm6.5 1.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Zm0-1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Z"/>
                        <path d="M16 6H0v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V6ZM4.5 13a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5Zm7 0a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5Z"/>
                    </svg> Ouvindo  <?php //$u_l->nomeUsuarioAmigo($ce_amigo); ?>
                </h4>
            </div>
            <div class="widget-body">
                <div class="widget-main" style="border:dashed 1px #ccc; margin-top: 10px; margin-bottom: 10px; border-radius: 10px;"> 
                    <div class="row" style="padding:0px 15px 0px 15px;"><?php $MinhasMusicas->ListaMusicaDoAmigo($ce_amigo); ?></div>
                </div>
            </div>
            <div class="widget-header widget-header-small">
                <h4 class="widget-title smaller"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-vinyl-fill" viewBox="0 0 16 16">
                        <path d="M8 6a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm0 3a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4 8a4 4 0 1 0 8 0 4 4 0 0 0-8 0z"/>
                    </svg>
                    Amigos <?php //$u_l->nomeUsuarioAmigo($ce_amigo); ?>
                </h4>
            </div>
            <div class="widget-body" style="border:dashed 1px #ccc; margin-top: 10px; margin-bottom: 10px; border-radius: 10px;">
                <div class="widget-main"> <div class="row" style="padding:0px 15px 0px 15px;"><p>Você não precisa ser um lobo solitário, há muitas pessoas no Nasocial para se conectar com você, <a href="https://www.lea.co.ao/nasocial/meus-amigos/">clica aqui para fazeres amizades.</a></p></div> </div>
            </div>
            <?php
        }
    ?>
                                                					    
    <div class="widget-header widget-header-small">
        <h4 class="widget-title smaller"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-vinyl-fill" viewBox="0 0 16 16">
                <path d="M8 6a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm0 3a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4 8a4 4 0 1 0 8 0 4 4 0 0 0-8 0z"/>
            </svg>
            Publicações
        </h4>
    </div>
    <div class="widget-body">
        <div class="widget-main" style="padding:15px 0px 0px 0px;"> <?php $mural->DadosDoMural($inicio,$ce_amigo,$origem); ?></div> 
    </div>
</div>
