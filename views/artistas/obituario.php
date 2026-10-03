<!-- Breadcrumb -->
<div class="lea-breadcrumb">
    <div class="container">
        <a href="/">Início</a>
        <i class="ti ti-chevron-right"></i>
        <a href="/artistas">Artistas</a>
        <i class="ti ti-chevron-right"></i>
        <span>Obituário</span>
    </div>
</div>

<!-- Hero -->
<div class="cat-hero" style="--cat-cor: #374151;">
    <div class="container">
        <div class="cat-hero-inner">
            <div class="cat-hero-icon" style="background: linear-gradient(135deg, #4B5563, #374151);">
                <i class="ti ti-flower"></i>
            </div>
            <div>
                <h1 class="cat-hero-title">Em Memória</h1>
                <div class="cat-hero-meta">Homenagem aos artistas que deixaram o seu legado</div>
            </div>
        </div>
    </div>
</div>

<div class="container py-4">

    <!-- DESTAQUE — falecidos num dia como hoje -->
    <?php if (!empty($obituarioHoje)): ?>
    <div class="obito-destaque">
        <div class="obito-destaque-header">
            <i class="ti ti-candle"></i>
            <div>
                <div class="obito-destaque-titulo">Em memória, neste dia</div>
                <div class="obito-destaque-sub"><?= date('d \d\e F') ?></div>
            </div>
        </div>

        <div class="obito-destaque-lista">
            <?php foreach ($obituarioHoje as $artista):
                $foto = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $artista['art_img_url'] ?? ''));
                $iniciais = strtoupper(substr($artista['nomeA'], 0, 2));
                $url = 'https://lea.co.ao/artista.php?a=' . base64_encode($artista['artID']);
                $anoNasc = (!empty($artista['dataNac']) && $artista['dataNac'] !== '0000-00-00') ? date('Y', strtotime($artista['dataNac'])) : null;
                $anoObito = date('Y', strtotime($artista['obito']));
            ?>
                <a class="obito-destaque-card" 
				   href="<?= htmlspecialchars($url) ?>" 
				   data-nome="<?= htmlspecialchars($artista['nomeA']) ?>"
				   data-iniciais="<?= $iniciais ?>"
				   data-foto="<?= htmlspecialchars($foto) ?>"
				   data-anos="<?= $anoNasc ? $anoNasc . ' — ' . $anoObito : '' ?>"
				   onclick="return abrirHomenagem(event, this)">
   
                    <div class="obito-destaque-avatar">
                        <?php if ($foto): ?>
                            <img src="<?= htmlspecialchars($foto) ?>" alt="" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <?php endif; ?>
                        <span style="<?= $foto ? '' : 'display:flex;' ?>"><?= $iniciais ?></span>
                    </div>
                    <div class="obito-destaque-nome"><?= htmlspecialchars($artista['nomeA']) ?></div>
                    <div class="obito-destaque-prof"><?= htmlspecialchars($artista['prof'] ?? '') ?></div>
                    <?php if ($anoNasc): ?>
                        <div class="obito-destaque-anos"><?= $anoNasc ?> — <?= $anoObito ?></div>
                    <?php endif; ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- Restantes -->
    <?php if (empty($artistas) && empty($obituarioHoje)): ?>
        <div class="pesquisa-empty">
            <i class="ti ti-flower"></i>
            <h2>Sem registos</h2>
        </div>
    <?php elseif (!empty($artistas)): ?>

        <div class="sec-hdr">
            <h2>Todos os registos</h2>
        </div>

        <div class="artists-grid mb-4">
            <?php foreach ($artistas as $artista):
                $foto = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $artista['art_img_url'] ?? ''));
                $iniciais = strtoupper(substr($artista['nomeA'], 0, 2));
                $url = 'https://lea.co.ao/artista.php?a=' . base64_encode($artista['artID']);
                $anoNasc = (!empty($artista['dataNac']) && $artista['dataNac'] !== '0000-00-00') ? date('Y', strtotime($artista['dataNac'])) : null;
                $anoObito = date('Y', strtotime($artista['obito']));
            ?>
                <a class="artist-card" 
				   href="<?= htmlspecialchars($url) ?>" 
				   target="_blank"
				   style="filter:grayscale(35%);"
				   data-nome="<?= htmlspecialchars($artista['nomeA']) ?>"
				   data-iniciais="<?= $iniciais ?>"
				   data-foto="<?= htmlspecialchars($foto) ?>"
				   data-anos="<?= $anoNasc ? $anoNasc . ' — ' . $anoObito : '' ?>"
				   onclick="return abrirHomenagem(event, this)">
					<div class="artist-cover" style="background:linear-gradient(135deg,#4B5563,#1f2937);">
						<?php if ($foto): ?><img src="<?= htmlspecialchars($foto) ?>" alt="" onerror="this.style.display='none'"><?php endif; ?>
						<div class="cover-overlay"></div>
						<span class="cover-initials"><?= $iniciais ?></span>
					</div>
					<div class="artist-body">
						<div class="artist-name"><?= htmlspecialchars($artista['nomeA']) ?></div>
						<div class="artist-type"><?= htmlspecialchars($artista['prof'] ?? '') ?></div>
						<div class="artist-meta">
							<?php if ($anoNasc): ?>
								<span><?= $anoNasc ?> – <?= $anoObito ?></span>
							<?php endif; ?>
						</div>
					</div>
				</a>
            <?php endforeach; ?>
        </div>

        <?php if ($totalPaginas > 1): ?>
        <div class="lea-pagination">
            <?php for ($p = 1; $p <= $totalPaginas; $p++): ?>
                <a class="page-btn <?= $p === $pagina ? 'active' : '' ?>" href="?pagina=<?= $p ?>"><?= $p ?></a>
            <?php endfor; ?>
        </div>
        <?php endif; ?>

    <?php endif; ?>
</div>

<!-- Modal de Homenagem -->
<div class="homenagem-overlay" id="homenagemOverlay">
    <div class="homenagem-modal">
        <button class="homenagem-close" id="homenagemClose"><i class="ti ti-x"></i></button>

        <div class="homenagem-header">
            <div class="homenagem-avatar" id="homenagemAvatar">
                <img id="homenagemFoto" src="" alt="" onerror="this.style.display='none'; document.getElementById('homenagemIniciais').style.display='block';">
                <span id="homenagemIniciais">--</span>
            </div>
            <div>
                <div class="homenagem-nome" id="homenagemNome">Nome do Artista</div>
                <div class="homenagem-sub" id="homenagemAnos">-- — --</div>
            </div>
        </div>

        <!-- Partilha -->
        <div class="homenagem-share">
            <span class="homenagem-share-label">Partilhar:</span>
            <a href="#" class="share-btn share-whatsapp"><i class="ti ti-brand-whatsapp"></i></a>
            <a href="#" class="share-btn share-facebook"><i class="ti ti-brand-facebook"></i></a>
            <a href="#" class="share-btn share-x"><i class="ti ti-brand-x"></i></a>
            <a href="#" class="share-btn share-copy"><i class="ti ti-link"></i></a>
        </div>

        <!-- Formulário de homenagem -->
        <div class="homenagem-form">
            <textarea placeholder="Deixa uma mensagem em memória…" rows="3"></textarea>
            <button class="homenagem-btn"><i class="ti ti-flower"></i> Deixar homenagem</button>
        </div>

        <!-- Lista de homenagens -->
        <div class="homenagem-lista">
            <div class="homenagem-lista-titulo">8 homenagens</div>

            <div class="homenagem-item">
                <div class="homenagem-item-avatar">MJ</div>
                <div class="homenagem-item-body">
                    <div class="homenagem-item-nome">Maria João</div>
                    <div class="homenagem-item-texto">O teu legado vive na música que deixaste. Descansa em paz 🕊️</div>
                    <div class="homenagem-item-tempo">há 2 dias</div>
                </div>
            </div>

            <div class="homenagem-item">
                <div class="homenagem-item-avatar">CS</div>
                <div class="homenagem-item-body">
                    <div class="homenagem-item-nome">Carlos Silva</div>
                    <div class="homenagem-item-texto">Sempre lembrado por todos nós. Obrigado por tudo.</div>
                    <div class="homenagem-item-tempo">há 5 dias</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
	function abrirHomenagem(e, el) {
		e.preventDefault();
		document.getElementById('homenagemNome').textContent = el.dataset.nome;
		document.getElementById('homenagemIniciais').textContent = el.dataset.iniciais;
		document.getElementById('homenagemAnos').textContent = el.dataset.anos || '';
		const foto = document.getElementById('homenagemFoto');
		const iniciais = document.getElementById('homenagemIniciais');
		if (el.dataset.foto) {
			foto.src = el.dataset.foto;
			foto.style.display = 'block';
			iniciais.style.display = 'none';
		} else {
			foto.style.display = 'none';
			iniciais.style.display = 'block';
		}
		document.getElementById('homenagemOverlay').classList.add('active');
		document.body.style.overflow = 'hidden';
		return false;
	}
	
	function fecharHomenagem() {
		document.getElementById('homenagemOverlay').classList.remove('active');
		document.body.style.overflow = '';
	}

	document.getElementById('homenagemClose').addEventListener('click', fecharHomenagem);
	document.getElementById('homenagemOverlay').addEventListener('click', function(e) {
		if (e.target === this) fecharHomenagem();
	});
</script>