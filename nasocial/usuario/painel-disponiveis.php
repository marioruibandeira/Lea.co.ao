<div class="center">
    <span class="btn btn-app btn-sm btn-light no-hover">
        <span class="line-height-1 bigger-170 blue"><?php $amigo->totalVisitasUsuario($ce_amigo);  ?></span> <br /> 
        <span class="line-height-1 smaller-90"> Visitas </span>
    </span>

    <a href="https://www.lea.co.ao/nasocial/meus-amigos/amigos.php?ami=<?php print $ce_amigo; ?>">
        <span class="btn btn-app btn-sm btn-yellow no-hover">
            <span class="line-height-1 bigger-170"> <?php print $amigo->totolAmigosAmigo($ce_amigo);  ?> </span> <br />
            <span class="line-height-1 smaller-90"> Amigos </span>
        </span>
    </a>
    
    <a href="https://www.lea.co.ao/nasocial/loja/catalogo.php?us=<?php print $ce_amigo;  ?>&cat=4">
        <span class="btn btn-app btn-sm btn-pink no-hover">
            <span class="line-height-1 bigger-170"> <?php print $AGENDA_EVENTO->ContarEventosPorUsuario($ce_amigo); ?> </span> <br />
            <span class="line-height-1 smaller-90"> Ingressos </span>
        </span>
    </a>
                    
    <a href="https://www.lea.co.ao/nasocial/loja/catalogo.php?us=<?php print $ce_amigo;  ?>&cat=3">
        <span class="btn btn-app btn-sm btn-grey no-hover">
            <span class="line-height-1 bigger-170"><?php print $DiscografiaDAO->ContarDiscosPorVender($ce_amigo); ?></span> <br />
            <span class="line-height-1 smaller-90"> CD </span>
        </span>
    </a>
                    
    <a href="https://www.lea.co.ao/nasocial/loja/catalogo.php?us=<?php print $ce_amigo;  ?>&cat=2">
        <span class="btn btn-app btn-sm btn-success no-hover">
            <span class="line-height-1 bigger-170"> <?php print $LivrosDAO->ContarLivrosPorUsuario($ce_amigo); ?> </span> <br />
            <span class="line-height-1 smaller-90"> Livros </span>
        </span>
    </a>
                    
    <a href="https://www.lea.co.ao/nasocial/loja/catalogo.php?us=<?php print $ce_amigo;  ?>&cat=5">
        <span class="btn btn-app btn-sm btn-primary no-hover" >
            <span class="line-height-1 bigger-170">0<?php //print $amigo->totolCamisolasAmigo($ce_amigo);  ?></span> <br />
            <span class="line-height-1 smaller-90"> Lembr... </span>
        </span>
    </a>
</div>