<!-- ============================================================
     INÍCIO PÁGINA DE CATEGORIA DE NOTÍCIAS
     ============================================================ -->
<?php
	$coresCat = [
		'Politica'       => ['cor' => '#DC2626', 'icon' => 'ti-building-bank',    'css' => 'cat-politica'],
		'Tecnologia'     => ['cor' => '#7C3AED', 'icon' => 'ti-cpu',              'css' => 'cat-tecnologia'],
		'Desporto'       => ['cor' => '#059669', 'icon' => 'ti-ball-football',    'css' => 'cat-desporto'],
		'Crónicas'       => ['cor' => '#C07A1A', 'icon' => 'ti-pencil',           'css' => 'cat-cronicas'],
		'Arte & Cultura' => ['cor' => '#2563B0', 'icon' => 'ti-palette',          'css' => 'cat-arte'],
		'Economia'       => ['cor' => '#0D6B4E', 'icon' => 'ti-chart-bar',        'css' => 'cat-economia'],
		'Entrevistas'    => ['cor' => '#9D174D', 'icon' => 'ti-microphone',       'css' => 'cat-entrevistas'],
		'Autodidata'     => ['cor' => '#534AB7', 'icon' => 'ti-book',             'css' => 'cat-autodidata'],
	];
	$info = $coresCat[$categoria['categoria_noticias']] ?? ['cor' => '#2563B0', 'icon' => 'ti-news', 'css' => 'cat-arte'];
?>
<!-- Breadcrumb -->
<div class="lea-breadcrumb">
  <div class="container">
    <a href="/">Início</a>
    <i class="ti ti-chevron-right"></i>
    <a href="/noticias">Notícias</a>
    <i class="ti ti-chevron-right"></i>
    <span><?= htmlspecialchars($categoria['categoria_noticias']) ?></span>
  </div>
</div>

<!-- Hero da categoria -->
<div class="cat-hero" style="--cat-cor: <?= $info['cor'] ?>;">
  <div class="container">
    <div class="cat-hero-inner">
      <div class="cat-hero-icon" style="background: linear-gradient(135deg, <?= $info['cor'] ?>, #3B7DD8);">
        <i class="ti <?= $info['icon'] ?>"></i>
      </div>
      <div>
        <h1 class="cat-hero-title"><?= htmlspecialchars($categoria['categoria_noticias']) ?></h1>
        <div class="cat-hero-meta">
          Actualizado hoje
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Filter tabs — subsecções -->
<!-- ============================================================
     TAGS POPULARES + CATEGORIAS — substitui o filter bar
     ============================================================ -->
<div class="cat-topics-bar" style="--cat-cor: <?= $info['cor'] ?>;">
  <div class="container">
    <div class="cat-topics-inner">
      <span class="cat-topics-label">
        <i class="ti ti-flame"></i>
        <span class="cat-topics-label-text">Mais procurados:</span>
      </span>
      <div class="cat-topics-scroll">
        <?php foreach ($tagsPopulares as $tag => $count): ?>
          <a class="topic-tag" href="/noticias/tag/<?= str_replace(' ', '-', strtolower($tag)) ?>">
            <?= htmlspecialchars($tag) ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<!-- Conteúdo principal -->
<div class="container" style="--cat-cor: var(--cat-arte);">
  <div class="cat-layout">

    <!-- MAIN -->
    <main>

      <!-- Notícia destaque da categoria -->
      <?php
		$coresCat = [
			'Politica'       => 'cat-politica',
			'Tecnologia'     => 'cat-tecnologia',
			'Desporto'       => 'cat-desporto',
			'Crónicas'       => 'cat-cronicas',
			'Arte & Cultura' => 'cat-arte',
			'Economia'       => 'cat-economia',
			'Entrevistas'    => 'cat-entrevistas',
			'Autodidata'     => 'cat-autodidata',
		];
		$fotoDestaque = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $noticiaDestaque['foto'] ?? ''));
		$classCatDestaque = $coresCat[$noticiaDestaque['categoria_noticias']] ?? 'cat-arte';
		$palavrasDestaque = str_word_count(strip_tags($noticiaDestaque['conteudo'] ?? ''));
		$tempoDestaque = max(1, ceil($palavrasDestaque / 200));
		?>

		<!-- Notícia destaque da categoria -->
		<a class="cat-destaque" href="<?= Helper::noticiaUrl($noticiaDestaque) ?>">
			<div class="cat-destaque-img">
				<img src="<?= htmlspecialchars($fotoDestaque) ?>" alt="<?= htmlspecialchars($noticiaDestaque['tema']) ?>"
					 onerror="this.style.display='none'">
				<div class="cat-destaque-img-overlay"></div>
			</div>
			<div class="cat-destaque-body">
				<div class="cat-destaque-label">Em destaque</div>
				<div class="cat-destaque-title"><?= htmlspecialchars($noticiaDestaque['tema']) ?></div>
				<p class="cat-destaque-excerpt"><?= htmlspecialchars($noticiaDestaque['breadcramble'] ?? '') ?></p>
				<div class="cat-destaque-meta">
					<div class="cat-destaque-meta-item"><i class="ti ti-calendar"></i> <?= date('d M Y', strtotime($noticiaDestaque['data_hora'])) ?></div>
					<div class="cat-destaque-meta-item"><i class="ti ti-building-newspaper"></i> <?= htmlspecialchars($noticiaDestaque['fontes']) ?></div>
					<div class="cat-destaque-meta-item"><i class="ti ti-clock"></i> <?= $tempoDestaque ?> min</div>
				</div>
			</div>
		</a>

      <!-- Grelha 2 colunas -->
      <?php
		$coresBg = [
			'Politica'       => 'linear-gradient(135deg,#DC2626,#374151)',
			'Tecnologia'     => 'linear-gradient(135deg,#7C3AED,#534AB7)',
			'Desporto'       => 'linear-gradient(135deg,#059669,#2563B0)',
			'Crónicas'       => 'linear-gradient(135deg,#C07A1A,#534AB7)',
			'Arte & Cultura' => 'linear-gradient(135deg,#9D174D,#534AB7)',
			'Economia'       => 'linear-gradient(135deg,#0D6B4E,#2563B0)',
			'Entrevistas'    => 'linear-gradient(135deg,#9D174D,#2563B0)',
			'Autodidata'     => 'linear-gradient(135deg,#534AB7,#2563B0)',
		];

		$noticiasPrimeiras = array_slice($noticias, 0, 4);
		$noticiasRestantes = array_slice($noticias, 4);
		?>

		<div class="sec-hdr">
			<h2>Últimas notícias</h2>
		</div>

		<div class="cat-grid mb-4">
			<?php foreach ($noticiasPrimeiras as $n):
				$fotoN = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $n['foto'] ?? ''));
				$bgN = $coresBg[$n['categoria_noticias']] ?? 'linear-gradient(135deg,#2563B0,#534AB7)';
				$classCatN = $coresCat[$n['categoria_noticias']] ?? 'cat-arte';
				$palavrasN = str_word_count(strip_tags($n['conteudo'] ?? ''));
				$tempoN = max(1, ceil($palavrasN / 200));
			?>
				<a class="nc" href="<?= Helper::noticiaUrl($n) ?>">
					<div class="nc-img">
						<img src="<?= htmlspecialchars($fotoN) ?>" alt=""
							 style="<?= $fotoN ? '' : 'display:none;' ?>"
							 onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
						<div class="nc-img-ph" style="background:<?= $bgN ?>;<?= $fotoN ? 'display:none;' : '' ?>"></div>
					</div>
					<div class="nc-body">
						<div class="mb-2"><span class="cat-badge <?= $classCatN ?>"><?= htmlspecialchars($n['categoria_noticias']) ?></span></div>
						<div class="nc-title"><?= htmlspecialchars($n['tema']) ?></div>
						<div class="nc-footer">
							<div class="nc-source"><i class="ti ti-building-newspaper"></i> <?= htmlspecialchars($n['fontes']) ?></div>
							<span class="nc-date"><?= date('d M Y', strtotime($n['data_hora'])) ?></span>
						</div>
					</div>
				</a>
			<?php endforeach; ?>
		</div>

      <!-- Ad in-content -->
      <div class="mb-4">
        <div class="ann"><i class="ti ti-ad"></i> In-content</div>
        <div class="ad-strip">
          <span class="ad-pill">Pub</span>
          <div class="ad-strip-thumb" style="background:var(--lea-blue);">UN</div>
          <div class="flex-grow-1">
            <strong style="font-size:13px;">Unitel — Plano Ilimitado por Kz 3.500/mês</strong><br>
            <span style="font-size:11px;color:var(--lea-muted);">Ligação rápida em todo o país · unitel.ao</span>
          </div>
          <button class="btn-lea-sm">Ver oferta</button>
        </div>
      </div>

      <!-- Lista horizontal -->
      <div class="sec-hdr" id="mais-noticias">
        <h2>Mais notícias</h2>
      </div>

      <div class="d-flex flex-column gap-2 mb-4">
		<?php foreach ($noticiasRestantes as $n):
			$fotoN = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $n['foto'] ?? ''));
			$bgN = $coresBg[$n['categoria_noticias']] ?? 'linear-gradient(135deg,#2563B0,#534AB7)';
			$classCatN = $coresCat[$n['categoria_noticias']] ?? 'cat-arte';
		?>
			<a class="nc-h" href="<?= Helper::noticiaUrl($n) ?>">
				<div class="nc-h-img">
					<img src="<?= htmlspecialchars($fotoN) ?>" alt=""
						 style="<?= $fotoN ? '' : 'display:none;' ?>"
						 onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
					<div class="nc-h-img-ph" style="background:<?= $bgN ?>;<?= $fotoN ? 'display:none;' : '' ?>">
						<i class="ti ti-news"></i>
					</div>
				</div>
				<div class="nc-h-body">
					<div class="mb-1"><span class="cat-badge <?= $classCatN ?>"><?= htmlspecialchars($n['categoria_noticias']) ?></span></div>
					<div class="nc-h-title"><?= htmlspecialchars($n['tema']) ?></div>
					<div class="nc-h-meta">
						<span><i class="ti ti-building-newspaper"></i> <?= htmlspecialchars($n['fontes']) ?></span>
						<span><i class="ti ti-calendar"></i> <?= date('d M Y', strtotime($n['data_hora'])) ?></span>
					</div>
				</div>
			</a>
		<?php endforeach; ?>
	</div>

	<!-- Paginação -->
	<div class="d-flex align-items-center justify-content-between mt-2 mb-4">
		<div style="font-size:13px;color:var(--lea-muted);">A mostrar <?= count($noticias) ?> de <?= $totalNoticias ?> notícias</div>
		<div class="cat-pagination">
			<?php if ($pagina > 1): ?>
				<a class="page-btn" href="?pagina=<?= $pagina - 1 ?>#mais-noticias"><i class="ti ti-chevron-left"></i></a>
			<?php endif; ?>
			<?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
				<?php if ($i == 1 || $i == $totalPaginas || abs($i - $pagina) <= 1): ?>
					<a class="page-btn <?= $i == $pagina ? 'active' : '' ?>" href="?pagina=<?= $i ?>#mais-noticias"><?= $i ?></a>
				<?php elseif (abs($i - $pagina) == 2): ?>
					<span style="color:var(--lea-muted);font-size:13px;padding:0 4px;">…</span>
				<?php endif; ?>
			<?php endfor; ?>
			<?php if ($pagina < $totalPaginas): ?>
				<a class="page-btn" href="?pagina=<?= $pagina + 1 ?>#mais-noticias"><i class="ti ti-chevron-right"></i></a>
			<?php endif; ?>
		</div>
	</div>

    </main>

    <!-- SIDEBAR -->
    <aside style="position:sticky;top:80px;height:fit-content;">
      <div class="cat-sidebar">

        <!-- Ad 300×250 -->
        <div>
          <div class="ann"><i class="ti ti-ad"></i> 300 × 250 · AdSense</div>
          <div class="ad-block-sidebar" style="min-height:140px;">
            <i class="ti ti-ad" style="font-size:26px;color:#c0cfe8;"></i>
            <div class="ad-size">300 × 250</div>
            <div class="ad-type">Medium Rectangle</div>
          </div>
        </div>

        <!-- Outras categorias -->
        <?php
			$coresCategoria = [
				'Politica'       => ['css' => '--cat-politica', 'hex' => '#DC2626'],
				'Tecnologia'     => ['css' => '--cat-tecnologia', 'hex' => '#7C3AED'],
				'Desporto'       => ['css' => '--cat-desporto', 'hex' => '#059669'],
				'Crónicas'       => ['css' => '--cat-cronicas', 'hex' => '#C07A1A'],
				'Arte & Cultura' => ['css' => '--cat-arte', 'hex' => '#2563B0'],
				'Economia'       => ['css' => '--cat-economia', 'hex' => '#0D6B4E'],
				'Entrevistas'    => ['css' => '--cat-entrevistas', 'hex' => '#9D174D'],
				'Autodidata'     => ['css' => '--cat-autodidata', 'hex' => '#534AB7'],
			];
			?>
			<div class="sidebar-card">
				<div class="sidebar-card-header">
					<i class="ti ti-layout-list"></i>
					<h3>Outras categorias</h3>
				</div>
				<?php foreach ($outrasCategorias as $cat):
					$corInfo = $coresCategoria[$cat['categoria_noticias']] ?? ['hex' => '#2563B0'];
					$slug = Helper::slug($cat['categoria_noticias']);
					$isActive = $cat['id_categ_noticias'] == $categoria['id_categ_noticias'];
				?>
					<?php if (!$isActive): ?>
					<a class="other-cat-item" href="/noticias/categoria/<?= $slug ?>">
						<div class="other-cat-left">
							<span class="other-cat-dot" style="background:<?= $corInfo['hex'] ?>;"></span>
							<span class="other-cat-name"><?= htmlspecialchars($cat['categoria_noticias']) ?></span>
						</div>
						<span class="other-cat-count"><?= $cat['total'] ?></span>
					</a>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>

        <!-- Mais lidas -->
        <div class="sidebar-card">
			<div class="sidebar-card-header">
				<i class="ti ti-flame"></i>
				<h3>Mais lidas</h3>
			</div>
			<?php foreach ($maisLidas as $ml):
				$fotoMl = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $ml['foto'] ?? ''));
				$bgMl = $coresBg[$ml['categoria_noticias']] ?? 'linear-gradient(135deg,#2563B0,#534AB7)';
			?>
				<a class="related-item" href="<?= Helper::noticiaUrl($ml) ?>">
					<div class="related-thumb">
						<img src="<?= htmlspecialchars($fotoMl) ?>" alt=""
							 onerror="this.parentElement.style.background='<?= $bgMl ?>'">
					</div>
					<div>
						<div class="related-title"><?= htmlspecialchars($ml['tema']) ?></div>
						<div class="related-meta"><?= htmlspecialchars($ml['categoria_noticias']) ?> · <?= date('d M Y', strtotime($ml['data_hora'])) ?></div>
					</div>
				</a>
			<?php endforeach; ?>
		</div>

        <!-- Novos artistas -->
        <div class="sidebar-card">
			<div class="sidebar-card-header">
				<i class="ti ti-user-plus"></i>
				<h3>Artistas Recém adicionados</h3>
			</div>
			<?php
			$cores = ['#2563B0','#1D9E75','#534AB7','#3B7DD8','#C07A1A','#1A4A8A'];
			$i = 0;
			foreach ($novosArtistas as $artista):
				$fotoArt = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $artista['art_img_url'] ?? ''));
				$cor = $cores[$i % count($cores)];
				$iniciais = strtoupper(substr($artista['nomeA'], 0, 2));
			?>
				<a class="artist-item" href="https://lea.co.ao/artista.php?a=<?= base64_encode($artista['artID']) ?>">
					<div class="artist-avatar" style="background:<?= $cor ?>;">
						<?php if ($fotoArt): ?>
							<img src="<?= htmlspecialchars($fotoArt) ?>" alt=""
								 onerror="this.style.display='none'">
						<?php else: ?>
							<span style="display:flex;align-items:center;justify-content:center;width:100%;height:100%;font-size:12px;font-weight:700;color:#fff;"><?= $iniciais ?></span>
						<?php endif; ?>
					</div>
					<div>
						<div class="artist-name"><?= htmlspecialchars($artista['nomeA']) ?></div>
						<div class="artist-prof"><?= htmlspecialchars($artista['prof'] ?? '') ?></div>
					</div>
				</a>
			<?php $i++; endforeach; ?>
		</div>

      </div>
    </aside>

  </div>
</div>

<!-- ============================================================
     FIM PÁGINA DE CATEGORIA DE NOTÍCIAS
     ============================================================ -->
<script>
  // Filter tabs
  document.querySelectorAll('.cat-filter-tab').forEach(tab => {
    tab.addEventListener('click', e => {
      e.preventDefault();
      document.querySelectorAll('.cat-filter-tab').forEach(t => t.classList.remove('active'));
      tab.classList.add('active');
    });
  });
</script>