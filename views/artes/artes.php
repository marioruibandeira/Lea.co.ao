<?php

	$heroes = [
		[
			'eyebrow' => 'Plataforma Angolana de Artes',
			'title'   => 'As Artes em Angola',
			'text'    => 'Explora as 11 categorias artísticas praticadas em Angola. Da Música ao Teatro, da Pintura à Arte Digital, descobre um acervo completo que celebra a criatividade, a diversidade e o património artístico angolano.'
		],
		[
			'eyebrow' => 'O Maior Acervo de Artistas Angolanos',
			'title'   => 'O Diretório Nacional dos Artistas de Angola',
			'text'    => 'Catalogamos artistas angolanos de todas as gerações e expressões artísticas. Dos nomes mais consagrados aos novos talentos, dos pioneiros que marcaram a nossa história aos que estão a construir o futuro. De Cabinda ao Cunene, do mar ao leste, reunimos a riqueza da arte angolana num único lugar.'
		],
		[
			'eyebrow' => 'A História da Arte Angolana Num Só Lugar',
			'title'   => 'Descobre Quem Faz a Cultura de Angola',
			'text'    => 'A LEA preserva, organiza e divulga o património artístico de Angola. Encontra artistas, obras, biografias, músicas, livros, filmes, fotografias e muito mais, contribuindo para que a cultura angolana permaneça acessível às gerações de hoje e de amanhã.'
		]
	];

	$hero = $heroes[array_rand($heroes)];
?>

<div class="page-hero">
    <div class="container-fluid px-4" style="position:relative;z-index:1;">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <div class="page-hero-eyebrow"><?= $hero['eyebrow'] ?></div>
				<h1><?= $hero['title'] ?></h1>
				<p><?= $hero['text'] ?></p>
            </div>
            <div class="col-lg-5">
                <div class="row g-2">
                    <div class="col-6">
                        <div class="hero-stat">
                            <div class="hero-stat-num"><?= number_format($totalArtistaRegistado, 0, ',', '.') ?></div>
                            <div class="hero-stat-lbl">Artistas registados</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="hero-stat">
                            <div class="hero-stat-num">11</div>
                            <div class="hero-stat-lbl">Categorias artísticas</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="hero-stat">
                            <div class="hero-stat-num">21</div>
                            <div class="hero-stat-lbl">Províncias cobertas</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="hero-stat">
                            <div class="hero-stat-num">2017</div>
                            <div class="hero-stat-lbl">Ano de fundação</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FILTROS -->
<div class="filter-bar">
    <div class="container-fluid px-4">
        <div class="d-flex gap-2 overflow-auto pb-1" style="-ms-overflow-style:none;scrollbar-width:none;">
            <!--<button class="filter-btn active" data-arte-id="0">Todas</button>-->
			<button class="filter-btn" data-arte-id="1" data-cor="color-musica" data-icone="ti ti-music">Música</button>
			<button class="filter-btn" data-arte-id="2" data-cor="color-danca" data-icone="ti ti-play-volleyball">Dança</button>
			<button class="filter-btn" data-arte-id="3" data-cor="color-pintura" data-icone="ti ti-palette">Pintura</button>
			<button class="filter-btn" data-arte-id="4" data-cor="color-escultura" data-icone="ti ti-building-monument">Escultura</button>
			<button class="filter-btn" data-arte-id="5" data-cor="color-teatro" data-icone="ti ti-masks-theater">Teatro</button>
			<button class="filter-btn" data-arte-id="6" data-cor="color-literatura" data-icone="ti ti-book">Literatura</button>
			<button class="filter-btn" data-arte-id="7" data-cor="color-cinema" data-icone="ti ti-movie">Cinema</button>
			<button class="filter-btn" data-arte-id="8" data-cor="color-fotografia" data-icone="ti ti-camera">Fotografia</button>
			<button class="filter-btn" data-arte-id="9" data-cor="color-bd" data-icone="ti ti-pencil">Banda Desenhada</button>
			<button class="filter-btn" data-arte-id="10" data-cor="color-games" data-icone="ti ti-device-gamepad-2">Vídeo Games</button>
			<button class="filter-btn" data-arte-id="11" data-cor="color-digital" data-icone="ti ti-device-desktop">Arte Digital</button>
        </div>
    </div>
</div>

<!-- CARDS DE CATEGORIAS -->
<div class="cat-section">
    <div class="container-fluid px-4">
        <div class="row g-3">
		
			<?php
				$configCategorias = [
					1  => ['icon' => 'ti-music',            'bg' => 'color-musica',     'badge_bg' => '#E8F0FB', 'badge_cor' => '#2563B0', 'num' => '1ª'],
					2  => ['icon' => 'ti-jump-rope',         'bg' => 'color-danca',      'badge_bg' => '#E1F5EE', 'badge_cor' => '#1D9E75', 'num' => '2ª'],
					3  => ['icon' => 'ti-palette',           'bg' => 'color-pintura',    'badge_bg' => '#FFF3E0', 'badge_cor' => '#C07A1A', 'num' => '3ª'],
					4  => ['icon' => 'ti-building',          'bg' => 'color-escultura',  'badge_bg' => '#EDE9FF', 'badge_cor' => '#534AB7', 'num' => '4ª'],
					5  => ['icon' => 'ti-masks-theater',     'bg' => 'color-teatro',     'badge_bg' => '#E8F0FB', 'badge_cor' => '#1A4A8A', 'num' => '5ª'],
					6  => ['icon' => 'ti-book',              'bg' => 'color-literatura', 'badge_bg' => '#E1F5EE', 'badge_cor' => '#0F766E', 'num' => '6ª'],
					7  => ['icon' => 'ti-movie',             'bg' => 'color-cinema',     'badge_bg' => '#EDE9FF', 'badge_cor' => '#534AB7', 'num' => '7ª'],
					8  => ['icon' => 'ti-camera',            'bg' => 'color-fotografia', 'badge_bg' => '#FFF3E0', 'badge_cor' => '#B45309', 'num' => '8ª'],
					9  => ['icon' => 'ti-pencil',            'bg' => 'color-quadrinhos', 'badge_bg' => '#FCE7F3', 'badge_cor' => '#BE185D', 'num' => '9ª'],
					10 => ['icon' => 'ti-device-gamepad-2',  'bg' => 'color-jogos',      'badge_bg' => '#E0F2FE', 'badge_cor' => '#0369A1', 'num' => '10ª'],
					11 => ['icon' => 'ti-brush',             'bg' => 'color-digital',    'badge_bg' => '#D1FAE5', 'badge_cor' => '#065F46', 'num' => '11ª'],
				];
				?>

				<div class="row g-3">
					<?php foreach ($categorias as $cat):
						$id     = $cat['id_categoria_artista'];
						$config = $configCategorias[$id] ?? ['icon' => 'ti-palette', 'bg' => 'color-musica', 'badge_bg' => '#E8F0FB', 'badge_cor' => '#2563B0', 'num' => ''];
						$artistas = $artistasPorCategoria[$id] ?? [];
						$total  = $cat['total_artista'];
						$restantes = max(0, $total - count($artistas));
					?>
						<div class="col-lg-4 col-md-6">
							<div class="cat-card">
								<div class="cat-card-header <?= $config['bg'] ?>">
									<div class="cat-card-header-overlay"></div>
									<div class="cat-card-number"><?= $id ?></div>
									<div class="cat-card-icon"><i class="ti <?= $config['icon'] ?>"></i></div>
									<div class="cat-card-title">
										<h3><?= htmlspecialchars($cat['categoria_artista']) ?></h3>
										<span><?= number_format($total, 0, ',', '.') ?> artistas</span>
									</div>
								</div>
								<div class="cat-card-body">
									<p class="cat-card-desc" 
									   style="cursor:pointer;" 
									   data-arte-id="<?= $id ?>"
									   data-cor="<?= $config['bg'] ?>"
									   data-icone="ti <?= $config['icon'] ?>"
									   onclick="carregarArte(this.dataset.arteId, this.dataset.cor, this.dataset.icone)">
									   <?= $cat['descricao'] ?? '' ?>
									</p>
									<div class="cat-artists-preview">
										<?php foreach ($artistas as $artista):
											$foto = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $artista['art_img_url'] ?? ''));
											$iniciais = strtoupper(substr($artista['nomeA'], 0, 2));
										?>
											<?php if ($foto): ?>
												<img class="cat-artist-thumb" 
													 src="<?= htmlspecialchars($foto) ?>" 
													 alt="<?= htmlspecialchars($artista['nomeA']) ?>"
													 title="<?= htmlspecialchars($artista['nomeA']) ?>"
													 onerror="this.style.display='none'">
											<?php else: ?>
												<div class="cat-artist-thumb" 
													 title="<?= htmlspecialchars($artista['nomeA']) ?>"
													 style="background:<?= $config['badge_cor'] ?>;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:700;color:#fff;">
													<?= $iniciais ?>
												</div>
											<?php endif; ?>
										<?php endforeach; ?>
										<?php if ($restantes > 0): ?>
											<span class="cat-artist-count">+<?= number_format($restantes, 0, ',', '.') ?> artistas</span>
										<?php endif; ?>
									</div>
									<div class="cat-card-footer">
										<span class="cat-badge" style="background:<?= $config['badge_bg'] ?>;color:<?= $config['badge_cor'] ?>;"><?= $config['num'] ?> Arte</span>
										<a href="https://lea.co.ao/artistas/todos_artistas.php?strt=0&cat=<?= $id ?>" class="btn-cat">Ver artistas <i class="ti ti-arrow-right" style="font-size:14px;"></i></a>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

        </div>
    </div>
</div>

<!-- SECÇÃO O QUE É A ARTE -->
<div class="arte-section">
    <div class="container-fluid px-4">
        <div class="row g-4">
            <div class="col-lg-8">
                <h2>O que é a Arte?</h2>
                <p>Arte (do termo latino ars, significando técnica e/ou habilidade) pode ser entendida como a atividade humana ligada às manifestações de ordem estética ou comunicativa, realizada por meio de uma grande variedade de linguagens, tais como: arquitectura, desenho, escultura, pintura, escrita, música, dança, teatro e cinema.</p>
                <p>Na história da filosofia tentou se definir a arte como intuição, expressão, projeção, sublimação, evasão, etc. Aristóteles definiu a arte como uma imitação da realidade. Kant considera que a arte é uma manifestação que produz uma "satisfação desinteressada".</p>
                <p>Para os angolanos, a arte é também um acto de resistência e identidade. Da música tradicional dos Ovimbundu ao teatro político do pós-independência, a arte angolana tem sido um espelho da sociedade e um motor de mudança cultural.</p>
            </div>
            <div class="col-lg-4">
                <div style="background:var(--lea-blue-light);border-radius:14px;padding:24px;">
                    <div style="font-size:11px;font-weight:600;letter-spacing:.5px;text-transform:uppercase;color:var(--lea-blue);margin-bottom:12px;">Total na LEA.co.ao</div>
                    <div style="font-family:'Sora',sans-serif;font-size:48px;font-weight:700;color:var(--lea-blue);line-height:1;"><?= number_format($totalArtistaRegistado, 0, ',', '.') ?></div>
                    <div style="font-size:13px;color:var(--lea-muted);margin-bottom:20px;">artistas registados</div>
                    <a href="/artistas/" style="display:block;background:var(--lea-blue);color:#fff;text-align:center;padding:10px;border-radius:8px;font-size:13px;font-weight:600;text-decoration:none;" target="_blank">Ver todos os artistas →</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="arteModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">

            <div id="modalHeader" class="cat-card-header">

                <div class="cat-card-header-overlay"></div>
                <div id="modalNumero" class="cat-card-number"></div>
                <div id="modalIcone" class="cat-card-icon"></div>

                <div class="cat-card-title">
                    <h3 id="modalTitulo"></h3>
                    <span id="modalArtistas"></span>
                </div>

            </div>

            <div class="modal-body">

                <p id="modalDescricao"></p>

                <div id="modalConteudo">
                    <div class="cat-card-footer">
                        <span class="cat-badge" style="background:#E8F0FB;color:#2563B0;"><span id="numeroArte"></span>ª Arte</span>
                        <a id="modalLinkArtistas" href="#" class="btn-cat" target="_blank">Ver artistas <i class="ti ti-arrow-right" style="font-size:14px;"></i></a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
	// Novo Filtros
	const modal = new bootstrap.Modal(document.getElementById('arteModal'));

	document.querySelectorAll('.filter-btn').forEach(btn => {

		btn.addEventListener('click', function () {

			document.querySelectorAll('.filter-btn')
				.forEach(b => b.classList.remove('active'));

			this.classList.add('active');

			const idCategoria = this.dataset.arteId;
			const cor = this.dataset.cor;
			const icone = this.dataset.icone;

			// O botão "Todas" não abre o modal
			if (idCategoria === '0')
				return;

			carregarArte(idCategoria, cor, icone);

		});

	});

	async function carregarArte(idCategoria, cor, icone) {

		try {

			const response = await fetch('/artes/categoria?idCategoria=' + idCategoria);

			console.log(response.status);
			console.log(response.url);

			if (!response.ok) {
				throw new Error('Erro ao carregar a categoria.');
			}

			const dados = await response.json();

			// Aplica a cor do cabeçalho
			document.getElementById('modalHeader').className = `cat-card-header ${cor}`;

			// Número e ícone
			document.getElementById('modalNumero').textContent = idCategoria;
			document.getElementById('modalIcone').innerHTML = `<i class="${icone}"></i>`;
			document.getElementById('numeroArte').textContent = idCategoria;			

			// Preenche os dados
			document.getElementById('modalTitulo').textContent = dados.categoria_artista;
			document.getElementById('modalDescricao').innerHTML = dados.descricao;
			document.getElementById('modalArtistas').textContent = `${dados.total_artista} artistas`;
			document.getElementById('modalLinkArtistas').href = 'https://lea.co.ao/artistas/todos_artistas.php?strt=0&cat=' + idCategoria;

			modal.show();

		} catch (error) {
			console.error(error);
		}

	}
</script>