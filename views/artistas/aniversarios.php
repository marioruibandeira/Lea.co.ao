<!-- Breadcrumb -->
<div class="lea-breadcrumb">
    <div class="container">
        <a href="/">Início</a>
        <i class="ti ti-chevron-right"></i>
        <a href="/artistas">Artistas</a>
        <i class="ti ti-chevron-right"></i>
        <span>Aniversariantes</span>
    </div>
</div>

<!-- Hero -->
<div class="cat-hero" style="--cat-cor: #C07A1A;">
    <div class="container">
        <div class="cat-hero-inner">
            <div class="cat-hero-icon" style="background: linear-gradient(135deg, #C07A1A, #F59E0B);">
                <i class="ti ti-cake"></i>
            </div>
            <div>
                <h1 class="cat-hero-title">Aniversariantes</h1>
                <div class="cat-hero-meta">Celebrando os talentos angolanos</div>
            </div>
        </div>
    </div>
</div>

<div class="container py-4">

    <?php if (empty($grupos)): ?>
        <div class="pesquisa-empty">
            <i class="ti ti-cake"></i>
            <h2>Sem aniversariantes recentes</h2>
            <p>Ainda não há artistas com data de nascimento registada nos últimos dias.</p>
        </div>

    <?php else: ?>

        <?php foreach ($grupos as $diasAtras => $lista): ?>
            <?php
                $isHoje = $diasAtras === 0;
                $dataRef = clone $hoje;
                $dataRef->modify("-{$diasAtras} days");
                $labelData = $isHoje ? 'Hoje' : ($diasAtras === 1 ? 'Ontem' : 'Há ' . $diasAtras . ' dias');
            ?>

            <div class="aniv-grupo <?= $isHoje ? 'aniv-grupo-hoje' : '' ?>">
                <div class="aniv-grupo-label">
                    <?php if ($isHoje): ?>
                        <i class="ti ti-confetti"></i>
                    <?php endif; ?>
                    <?= $labelData ?>
                    <span class="aniv-grupo-data"><?= $dataRef->format('d \d\e F') ?></span>
                </div>

                <div class="aniv-lista <?= $isHoje ? 'aniv-lista-hoje' : '' ?>">
                    <?php foreach ($lista as $artista):
                        $foto = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $artista['art_img_url'] ?? ''));
                        $iniciais = strtoupper(substr($artista['nomeA'], 0, 2));
                        $url = 'https://lea.co.ao/artista.php?a=' . base64_encode($artista['artID']);
                    ?>
                        <a class="aniv-card <?= $isHoje ? 'aniv-card-hoje' : '' ?>" 
						   href="<?= htmlspecialchars($url) ?>" 
						   data-nome="<?= htmlspecialchars($artista['nomeA']) ?>"
						   data-iniciais="<?= $iniciais ?>"
						   data-foto="<?= htmlspecialchars($foto) ?>"
						   data-hoje="<?= $isHoje ? '1' : '0' ?>"
						   onclick="return abrirFelicitar(event, this)">
   
                            <div class="aniv-card-avatar">
                                <?php if ($foto): ?>
									<img src="<?= htmlspecialchars($foto) ?>" alt="" 
										 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
								<?php endif; ?>
								<span style="<?= $foto ? '' : 'display:flex;' ?>"><?= $iniciais ?></span>
                            </div>
                            <div class="aniv-card-nome"><?= htmlspecialchars($artista['nomeA']) ?></div>
                            <div class="aniv-card-prof"><?= htmlspecialchars($artista['prof'] ?? '') ?></div>
                            <?php if (!empty($artista['idade'])): ?>
                                <div class="aniv-card-idade"><?= $artista['idade'] ?> anos</div>
                            <?php endif; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>

    <?php endif; ?>
</div>

<!-- Modal de Felicitações -->
<div class="felicitar-overlay" id="felicitarOverlay">
    <div class="felicitar-modal">
        <button class="felicitar-close" id="felicitarClose"><i class="ti ti-x"></i></button>

        <div class="felicitar-header">
            <div class="felicitar-avatar" id="felicitarAvatar">
				<img id="felicitarFoto" src="" alt="" onerror="this.style.display='none'">
				<span id="felicitarIniciais">--</span>
			</div>
            <div>
                <div class="felicitar-nome" id="felicitarNome">Nome do Artista</div>
                <div class="felicitar-sub">🎂 Faz anos hoje</div>
            </div>
        </div>

        <!-- Partilha -->
        <div class="felicitar-share">
            <span class="felicitar-share-label">Partilhar:</span>
            <a href="#" class="share-btn share-whatsapp"><i class="ti ti-brand-whatsapp"></i></a>
            <a href="#" class="share-btn share-facebook"><i class="ti ti-brand-facebook"></i></a>
            <a href="#" class="share-btn share-x"><i class="ti ti-brand-x"></i></a>
            <a href="#" class="share-btn share-copy"><i class="ti ti-link"></i></a>
        </div>

        <!-- Formulário de felicitação -->
        <div class="felicitar-form">
            <textarea placeholder="Deixa a tua mensagem de felicitações…" rows="3"></textarea>
            <button class="felicitar-btn"><i class="ti ti-send"></i> Enviar felicitação</button>
        </div>

        <!-- Lista de felicitações -->
        <div class="felicitar-lista">
            <div class="felicitar-lista-titulo">12 felicitações</div>

            <div class="felicitar-item">
                <div class="felicitar-item-avatar">MJ</div>
                <div class="felicitar-item-body">
                    <div class="felicitar-item-nome">Maria João</div>
                    <div class="felicitar-item-texto">Parabéns! Continua a espalhar boa música 🎉</div>
                    <div class="felicitar-item-tempo">há 2 horas</div>
                </div>
            </div>

            <div class="felicitar-item">
                <div class="felicitar-item-avatar">CS</div>
                <div class="felicitar-item-body">
                    <div class="felicitar-item-nome">Carlos Silva</div>
                    <div class="felicitar-item-texto">Muitos anos de vida e sucesso! 🙌</div>
                    <div class="felicitar-item-tempo">há 5 horas</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
	function abrirFelicitar(e, el) {
		e.preventDefault();
		document.getElementById('felicitarNome').textContent = el.dataset.nome;
		document.getElementById('felicitarIniciais').textContent = el.dataset.iniciais;
		document.querySelector('.felicitar-sub').textContent = el.dataset.hoje === '1' ? '🎂 Faz anos hoje' : 'Aniversariante recente';
		document.getElementById('felicitarOverlay').classList.add('active');
		document.body.style.overflow = 'hidden';
		return false;
	}
	document.getElementById('felicitarClose').addEventListener('click', fecharFelicitar);
	document.getElementById('felicitarOverlay').addEventListener('click', function(e) {
		if (e.target === this) fecharFelicitar();
	});
	function fecharFelicitar() {
		document.getElementById('felicitarOverlay').classList.remove('active');
		document.body.style.overflow = '';
	}
	
	function abrirFelicitar(e, el) {
		e.preventDefault();
		document.getElementById('felicitarNome').textContent = el.dataset.nome;
		document.getElementById('felicitarIniciais').textContent = el.dataset.iniciais;

		const foto = document.getElementById('felicitarFoto');
		if (el.dataset.foto) {
			foto.src = el.dataset.foto;
			foto.style.display = 'block';
		} else {
			foto.style.display = 'none';
		}

		document.querySelector('.felicitar-sub').textContent = el.dataset.hoje === '1' ? '🎂 Faz anos hoje' : 'Aniversariante recente';
		document.getElementById('felicitarOverlay').classList.add('active');
		document.body.style.overflow = 'hidden';
		return false;
	}
</script>