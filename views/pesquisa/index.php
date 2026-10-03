<!-- Breadcrumb -->
<div class="lea-breadcrumb">
    <div class="container">
        <a href="/">Início</a>
        <i class="ti ti-chevron-right"></i>
        <span>Pesquisa<?= !empty($termo) ? ': ' . htmlspecialchars($termo) : '' ?></span>
    </div>
</div>

<!-- Hero -->
<div class="pesquisa-hero">
    <div class="container">
        <form method="GET" action="/pesquisa">
            <div class="pesquisa-input-wrap">
                <i class="ti ti-search"></i>
                <input type="text" name="q" 
                       value="<?= htmlspecialchars($termo ?? '') ?>"
                       placeholder="Pesquisar artistas, notícias, músicas, vídeos…"
                       autofocus>
                <?php if (!empty($termo)): ?>
                    <a href="/pesquisa" class="pesquisa-clear"><i class="ti ti-x"></i></a>
                <?php endif; ?>
                <button type="submit" class="pesquisa-btn">Pesquisar</button>
            </div>
        </form>

        <?php if (!empty($termo)): ?>
            <div class="pesquisa-meta">
                <?= $totais['total'] ?> resultado(s) para <strong>"<?= htmlspecialchars($termo) ?>"</strong>
                <div class="pesquisa-filtros">
                    <span class="pesquisa-filtro active">Todos (<?= $totais['total'] ?>)</span>
                    <?php if ($totais['artistas'] > 0): ?>
                        <span class="pesquisa-filtro">Artistas (<?= $totais['artistas'] ?>)</span>
                    <?php endif; ?>
                    <?php if ($totais['noticias'] > 0): ?>
                        <span class="pesquisa-filtro">Notícias (<?= $totais['noticias'] ?>)</span>
                    <?php endif; ?>
                    <?php if ($totais['musicas'] > 0): ?>
                        <span class="pesquisa-filtro">Músicas (<?= $totais['musicas'] ?>)</span>
                    <?php endif; ?>
                    <?php if ($totais['videos'] > 0): ?>
                        <span class="pesquisa-filtro">Vídeos (<?= $totais['videos'] ?>)</span>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Resultados -->
<div class="container py-4">
    <?php if (empty($termo)): ?>
        <div class="pesquisa-empty">
            <i class="ti ti-search"></i>
            <h2>O que procuras?</h2>
            <p>Pesquisa artistas, notícias, músicas ou vídeos angolanos.</p>
        </div>

    <?php elseif (empty($resultados)): ?>
        <div class="pesquisa-empty">
            <i class="ti ti-search-off"></i>
            <h2>Nenhum resultado encontrado</h2>
            <p>Não encontrámos nada para <strong>"<?= htmlspecialchars($termo) ?>"</strong>. Tenta outro termo.</p>
        </div>

    <?php else: ?>
        <div class="pesquisa-layout pesquisa-layout-panel">

            <!-- Lista de resultados -->
            <div class="pesquisa-resultados">
                <?php
                $iconesTipo = [
                    'artista' => ['icon' => 'ti-user',  'label' => 'Artista',  'cor' => '#2563B0', 'bg' => '#E8F0FB'],
                    'noticia' => ['icon' => 'ti-news',  'label' => 'Notícia',  'cor' => '#9D174D', 'bg' => '#FCE7F3'],
                    'musica'  => ['icon' => 'ti-music', 'label' => 'Música',   'cor' => '#059669', 'bg' => '#E1F5EE'],
                    'video'   => ['icon' => 'ti-video', 'label' => 'Vídeo',    'cor' => '#534AB7', 'bg' => '#EDE9FF'],
                ];
                $cores = ['#2563B0','#1D9E75','#534AB7','#3B7DD8','#C07A1A','#1A4A8A'];

                foreach ($resultados as $i => $r):
                    $tipo     = $r['tipo'];
                    $tipoInfo = $iconesTipo[$tipo] ?? $iconesTipo['artista'];
                    $imagem   = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $r['imagem'] ?? ''));
                    $imagem   = str_replace(' ', '%20', $imagem);
                    $iniciais = strtoupper(substr($r['titulo'], 0, 2));
                    $cor      = $cores[$i % count($cores)];

                    if ($tipo === 'artista') {
                        $url = 'https://lea.co.ao/artista.php?a=' . base64_encode($r['id']);
                    } elseif ($tipo === 'noticia') {
                        $url = Helper::noticiaUrl([
                            'id_noticias'        => $r['id'],
                            'tema'               => $r['titulo'],
                            'categoria_noticias' => $r['categoria'] ?? 'noticias',
                        ]);
                    } elseif ($tipo === 'musica') {
                        $url = 'https://lea.co.ao/discografia/musica-detail.php?som=' . base64_encode($r['id']);
                    } else {
                        $urlPanel = 'https://lea.co.ao/videos/video.php?v=' . $r['id'] . '&v2=' . base64_encode($r['artista']);
                    }
                ?>
                    <a class="pesquisa-item" href="<?= htmlspecialchars($url) ?>">
                        <div class="pesquisa-item-img" style="background:<?= $cor ?>;">
                            <?php if ($imagem): ?>
                                <img src="<?= htmlspecialchars($imagem) ?>" alt="" onerror="this.style.display='none'">
                            <?php else: ?>
                                <span><?= $iniciais ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="pesquisa-item-body">
                            <div class="pesquisa-item-tipo" style="color:<?= $tipoInfo['cor'] ?>;background:<?= $tipoInfo['bg'] ?>;">
                                <i class="ti <?= $tipoInfo['icon'] ?>"></i>
                                <?= $tipoInfo['label'] ?>
                            </div>
                            <div class="pesquisa-item-titulo"><?= htmlspecialchars($r['titulo']) ?></div>
                            <?php if (!empty($r['subtitulo'])): ?>
                                <div class="pesquisa-item-sub"><?= htmlspecialchars($r['subtitulo']) ?></div>
                            <?php endif; ?>
                            <div class="pesquisa-item-meta">
                                <?php if (!empty($r['meta'])): ?>
                                    <span><i class="ti ti-tag"></i> <?= htmlspecialchars($r['meta']) ?></span>
                                <?php endif; ?>
                                <?php if (!empty($r['provincia'])): ?>
                                    <span><i class="ti ti-map-pin"></i> <?= htmlspecialchars($r['provincia']) ?></span>
                                <?php endif; ?>
                                <?php if (!empty($r['visualizacoes'])): ?>
                                    <span><i class="ti ti-eye"></i> <?= number_format($r['visualizacoes'], 0, ',', '.') ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <i class="ti ti-chevron-right pesquisa-item-arrow"></i>
                    </a>

                    <?php if ($i === 2): ?>
                    <div class="pesquisa-ad">
                        <span class="ad-pill">Pub</span>
                        <div class="pesquisa-ad-inner">
                            <div class="pesquisa-ad-thumb" style="background:var(--lea-blue);">UN</div>
                            <div class="pesquisa-ad-copy">
                                <strong>Unitel — Plano Ilimitado por Kz 3.500/mês</strong>
                                <span>Ligação rápida em todo o país · unitel.ao</span>
                            </div>
                            <button class="btn-lea-sm">Ver oferta</button>
                        </div>
                    </div>
                    <?php endif; ?>

                <?php endforeach; ?>

                <?php if ($temMais): ?>
                    <div id="scroll-sentinel" style="height:40px;display:flex;align-items:center;justify-content:center;">
                        <span id="loading-more" style="font-size:13px;color:var(--lea-muted);display:none;">
                            <i class="ti ti-loader" style="animation:spin 1s linear infinite;"></i> A carregar mais…
                        </span>
                    </div>
                <?php endif; ?>
            </div>
			
			<div class="kp-coluna">
				<!-- Painel lateral — Knowledge Panel -->
				<?php if ($matchExacto): ?>
				<?php
					$fotoPanel = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $matchExacto['imagem'] ?? ''));
					$fotoPanel = str_replace(' ', '%20', $fotoPanel);
					$iniciaisPanel = strtoupper(substr($matchExacto['titulo'], 0, 2));

					if ($matchExacto['tipo'] === 'artista') {
						$urlPanel = 'https://lea.co.ao/artista.php?a=' . base64_encode($matchExacto['id']);
					} elseif ($matchExacto['tipo'] === 'musica') {
						$urlPanel = 'https://lea.co.ao/discografia/musica-detail.php?som=' . $matchExacto['id'];
					} else {
						$urlPanel = 'https://lea.co.ao/videos/video.php?v=' . $r['id'] . '&v2=' . base64_encode($r['artista']);
					}

					$iconesTipoPanel = [
						'artista' => ['icon' => 'ti-user',  'label' => 'Artista',  'cor' => '#2563B0', 'bg' => '#E8F0FB'],
						'musica'  => ['icon' => 'ti-music', 'label' => 'Música',   'cor' => '#059669', 'bg' => '#E1F5EE'],
						'video'   => ['icon' => 'ti-video', 'label' => 'Vídeo',    'cor' => '#534AB7', 'bg' => '#EDE9FF'],
					];
					$tipoPanel = $iconesTipoPanel[$matchExacto['tipo']] ?? $iconesTipoPanel['artista'];
				?>
				
				<aside class="knowledge-panel">
					<!-- Foto -->
					<div class="kp-img-wrap">
						<?php if ($fotoPanel): ?>
							<img src="<?= htmlspecialchars($fotoPanel) ?>" alt="<?= htmlspecialchars($matchExacto['titulo']) ?>"
								 onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
							<div class="kp-img-ph" style="display:none;background:var(--lea-blue);"><?= $iniciaisPanel ?></div>
						<?php else: ?>
							<div class="kp-img-ph" style="background:var(--lea-blue);"><?= $iniciaisPanel ?></div>
						<?php endif; ?>
					</div>

					<!-- Info -->
					<div class="kp-body">
						<div class="kp-tipo" style="color:<?= $tipoPanel['cor'] ?>;background:<?= $tipoPanel['bg'] ?>;">
							<i class="ti <?= $tipoPanel['icon'] ?>"></i>
							<?= $tipoPanel['label'] ?>
						</div>
						<h2 class="kp-titulo"><?= htmlspecialchars($matchExacto['titulo']) ?></h2>
						<?php if (!empty($matchExacto['subtitulo'])): ?>
							<div class="kp-sub"><?= htmlspecialchars($matchExacto['subtitulo']) ?></div>
						<?php endif; ?>

						<!-- Detalhes -->
						<div class="kp-detalhes">
							<?php if (!empty($matchExacto['meta'])): ?>
								<div class="kp-detalhe">
									<span class="kp-detalhe-label">Tipo</span>
									<span class="kp-detalhe-value"><?= htmlspecialchars($matchExacto['meta']) ?></span>
								</div>
							<?php endif; ?>
							<?php if (!empty($matchExacto['provincia'])): ?>
								<div class="kp-detalhe">
									<span class="kp-detalhe-label">Província</span>
									<span class="kp-detalhe-value"><?= htmlspecialchars($matchExacto['provincia']) ?></span>
								</div>
							<?php endif; ?>
							<?php if (!empty($matchExacto['categoria'])): ?>
								<div class="kp-detalhe">
									<span class="kp-detalhe-label">Categoria</span>
									<span class="kp-detalhe-value"><?= htmlspecialchars($matchExacto['categoria']) ?></span>
								</div>
							<?php endif; ?>
							<?php if (!empty($matchExacto['fans'])): ?>
								<div class="kp-detalhe">
									<span class="kp-detalhe-label">Fãs</span>
									<span class="kp-detalhe-value"><?= number_format($matchExacto['fans'], 0, ',', '.') ?></span>
								</div>
							<?php endif; ?>
							<?php if (!empty($matchExacto['visualizacoes'])): ?>
								<div class="kp-detalhe">
									<span class="kp-detalhe-label">Visualizações</span>
									<span class="kp-detalhe-value"><?= number_format($matchExacto['visualizacoes'], 0, ',', '.') ?></span>
								</div>
							<?php endif; ?>
						</div>

						<!-- Descrição -->
						<?php if (!empty($matchExacto['descricao'])): ?>
							<p class="kp-desc"><?= htmlspecialchars(substr(strip_tags($matchExacto['descricao']), 0, 200)) ?>...</p>
						<?php endif; ?>

						<!-- Botão -->
						<a href="<?= htmlspecialchars($urlPanel) ?>" class="kp-btn">
							Ver perfil completo <i class="ti ti-arrow-right"></i>
						</a>
					</div>
					
				</aside>
				
			<?php endif; ?>
			
			<!-- AD abaixo do panel -->
			<div class="mt-3 desktop-only">
				<div class="ann"><i class="ti ti-ad"></i> 300 × 250 · AdSense</div>
				<div style="background:var(--lea-surface);border:1px dashed #ccd9ef;border-radius:10px;min-height:250px;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;padding:16px;gap:4px;">
					<i class="ti ti-ad" style="font-size:26px;color:#c0cfe8;"></i>
					<div style="font-size:13px;font-weight:600;color:#c0cfe8;">300 × 250</div>
					<div style="font-size:10px;color:#c0cfe8;">Medium Rectangle</div>
				</div>
			</div>
			
			<!-- Artistas recém adicionados — só quando NÃO há match, e só desktop -->
			<?php if (!$matchExacto): ?>
			<div class="sidebar-card mt-3 desktop-only">
				<div class="sidebar-card-header">
					<i class="ti ti-user-plus"></i>
					<h3>Artistas Recém adicionados</h3>
				</div>
				<?php foreach ($artistasRecemAdicionados as $recemAdicionados):
					$foto = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $recemAdicionados['art_img_url'] ?? ''));
				?>
					<a class="artist-sidebar-item" href="https://lea.co.ao/artista.php?a=<?= base64_encode($recemAdicionados['artID']) ?>" target="_blank">
						<div class="artist-sidebar-avatar">
							<img src="<?= htmlspecialchars($foto) ?>" alt="<?= htmlspecialchars($recemAdicionados['nomeA']) ?>" onerror="this.style.display='none'">
							<div class="av-fallback" style="background:#2563B0;"><?= strtoupper(substr($recemAdicionados['nomeA'], 0, 2)) ?></div>
						</div>
						<div>
							<div class="artist-sidebar-name"><?= htmlspecialchars($recemAdicionados['nomeA']) ?></div>
							<div class="artist-sidebar-date"><?= date('d M Y', strtotime($recemAdicionados['anoreg'])) ?></div>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
			
		</div>
		
        </div>
    <?php endif; ?>
</div>

<script>
(function() {
    let pagina = 2;
    let carregando = false;
    let temMais = <?= $temMais ? 'true' : 'false' ?>;
    const termo = <?= json_encode($termo) ?>;
    const sentinel = document.getElementById('scroll-sentinel');
    const loading  = document.getElementById('loading-more');
    const lista    = document.querySelector('.pesquisa-resultados');

    if (!sentinel || !lista) return;

    const iconesTipo = {
        artista: { icon: 'ti-user',  label: 'Artista',  cor: '#2563B0', bg: '#E8F0FB' },
        noticia: { icon: 'ti-news',  label: 'Notícia',  cor: '#9D174D', bg: '#FCE7F3' },
        musica:  { icon: 'ti-music', label: 'Música',   cor: '#059669', bg: '#E1F5EE' },
        video:   { icon: 'ti-video', label: 'Vídeo',    cor: '#534AB7', bg: '#EDE9FF' },
    };
    const cores = ['#2563B0','#1D9E75','#534AB7','#3B7DD8','#C07A1A','#1A4A8A'];

    function gerarUrl(r) {
        if (r.tipo === 'artista') return 'https://lea.co.ao/artista.php?a=' + btoa(r.id);
        if (r.tipo === 'noticia') return '/noticias/' + r.categoria_slug + '/' + r.titulo_slug + '-' + r.id;
        if (r.tipo === 'musica')  return 'https://lea.co.ao/musica.php?m=' + r.id;
        return 'https://lea.co.ao/video.php?v=' + r.id;
    }

    function renderItem(r, i) {
        const tipoInfo = iconesTipo[r.tipo] || iconesTipo.artista;
        const cor = cores[i % cores.length];
        const imagem = (r.imagem || '').replace('https://www.lea.co.ao','').replace('http://www.lea.co.ao','').trim();
        const iniciais = r.titulo.substring(0,2).toUpperCase();
        const url = gerarUrl(r);

        return `
        <a class="pesquisa-item" href="${url}">
            <div class="pesquisa-item-img" style="background:${cor};">
                ${imagem ? `<img src="${imagem.replace(/ /g,'%20')}" alt="" onerror="this.style.display='none'">` : ''}
                <span>${iniciais}</span>
            </div>
            <div class="pesquisa-item-body">
                <div class="pesquisa-item-tipo" style="color:${tipoInfo.cor};background:${tipoInfo.bg};">
                    <i class="ti ${tipoInfo.icon}"></i> ${tipoInfo.label}
                </div>
                <div class="pesquisa-item-titulo">${r.titulo}</div>
                ${r.subtitulo ? `<div class="pesquisa-item-sub">${r.subtitulo}</div>` : ''}
                <div class="pesquisa-item-meta">
                    ${r.meta ? `<span><i class="ti ti-tag"></i> ${r.meta}</span>` : ''}
                    ${r.provincia ? `<span><i class="ti ti-map-pin"></i> ${r.provincia}</span>` : ''}
                    ${r.visualizacoes ? `<span><i class="ti ti-eye"></i> ${parseInt(r.visualizacoes).toLocaleString()}</span>` : ''}
                </div>
            </div>
            <i class="ti ti-chevron-right pesquisa-item-arrow"></i>
        </a>`;
    }

    async function carregarMais() {
        if (carregando || !temMais) return;
        carregando = true;
        loading.style.display = 'flex';

        try {
            const res = await fetch(`/pesquisa/mais?q=${encodeURIComponent(termo)}&pagina=${pagina}`);
            const dados = await res.json();

            if (dados.length === 0) {
                temMais = false;
                sentinel.style.display = 'none';
                return;
            }

            const offset = (pagina - 1) * 15;
            dados.forEach((r, i) => {
                lista.insertAdjacentHTML('beforeend', renderItem(r, offset + i));
            });

            pagina++;
            if (dados.length < 15) {
                temMais = false;
                sentinel.style.display = 'none';
            }
        } catch (e) {
            console.error(e);
        } finally {
            carregando = false;
            loading.style.display = 'none';
        }
    }

    const observer = new IntersectionObserver(entries => {
        if (entries[0].isIntersecting) carregarMais();
    }, { threshold: 0.1 });

    observer.observe(sentinel);
})();
</script>


