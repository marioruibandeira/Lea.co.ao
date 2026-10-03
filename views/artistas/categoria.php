<!-- Breadcrumb -->
<div class="lea-breadcrumb">
    <div class="container">
        <a href="/">Início</a>
        <i class="ti ti-chevron-right"></i>
        <a href="/artistas">Artistas</a>
        <i class="ti ti-chevron-right"></i>
        <span><?= htmlspecialchars($categoriaNome) ?></span>
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
        <h1 class="cat-hero-title"><?= htmlspecialchars($categoriaNome) ?></h1>
        <div class="cat-hero-meta">
          <?= $total ?> artista<?= $total !== 1 ? 's' : '' ?> encontrado<?= $total !== 1 ? 's' : '' ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Filter tabs -->
<div class="filter-bar">
    <a class="filter-tab <?= $categoriaSlug === '' ? 'active' : '' ?>" href="/artistas">Todos</a>
    <a class="filter-tab <?= $categoriaSlug === 'musica' ? 'active' : '' ?>" href="/artistas/musica">Música</a>
    <a class="filter-tab <?= $categoriaSlug === 'danca' ? 'active' : '' ?>" href="/artistas/danca">Dança</a>
    <a class="filter-tab <?= $categoriaSlug === 'pintura' ? 'active' : '' ?>" href="/artistas/pintura">Pintura</a>
    <a class="filter-tab <?= $categoriaSlug === 'escultura' ? 'active' : '' ?>" href="/artistas/escultura">Escultura</a>
    <a class="filter-tab <?= $categoriaSlug === 'teatro' ? 'active' : '' ?>" href="/artistas/teatro">Teatro</a>
    <a class="filter-tab <?= $categoriaSlug === 'literatura' ? 'active' : '' ?>" href="/artistas/literatura">Literatura</a>
    <a class="filter-tab <?= $categoriaSlug === 'cinema' ? 'active' : '' ?>" href="/artistas/cinema">Cinema</a>
    <a class="filter-tab <?= $categoriaSlug === 'fotografia' ? 'active' : '' ?>" href="/artistas/fotografia">Fotografia</a>
    <a class="filter-tab <?= $categoriaSlug === 'quadrinhos' ? 'active' : '' ?>" href="/artistas/quadrinhos">Histórias em Quadrinhos</a>
    <a class="filter-tab <?= $categoriaSlug === 'videojogos' ? 'active' : '' ?>" href="/artistas/videojogos">Vídeo Jogos</a>
    <a class="filter-tab <?= $categoriaSlug === 'arte-digital' ? 'active' : '' ?>" href="/artistas/arte-digital">Arte Digitais</a>
    <a class="filter-tab" href="/artistas/aniversarios">Aniversários</a>
    <a class="filter-tab" href="/artistas/obituario">Obituário</a>
</div>

<!-- Alphabet nav -->
<div class="alphabet-nav">
    <span style="font-size:11px;font-weight:600;color:var(--lea-muted);margin-right:4px;white-space:nowrap;">Por letra:</span>
    <a class="alpha-btn-tds <?= $letra === '' ? 'active' : '' ?>" 
       href="?<?= http_build_query(array_merge($_GET, ['letra' => '', 'pagina' => 1])) ?>">Todos</a>
    <?php foreach (range('A', 'Z') as $l): ?>
        <a class="alpha-btn <?= $letra === $l ? 'active' : '' ?>" 
           href="?<?= http_build_query(array_merge($_GET, ['letra' => $l, 'pagina' => 1])) ?>"><?= $l ?></a>
    <?php endforeach; ?>
</div>

<!-- Filtro de província — mobile only -->
<div class="mobile-only" style="padding:10px 16px;background:var(--lea-white);border-bottom:1px solid var(--lea-border);">
    <select class="filter-select" id="provinciaSelectMobile" style="width:100%;">
        <option value="" <?= $provincia === '' ? 'selected' : '' ?>>📍 Todas as províncias (<?= $total ?>)</option>
        <?php foreach ($provincias as $p): ?>
            <option value="<?= htmlspecialchars($p['provincia']) ?>" <?= $provincia === $p['provincia'] ? 'selected' : '' ?>>
                📍 <?= htmlspecialchars($p['provincia']) ?> (<?= $p['total'] ?>)
            </option>
        <?php endforeach; ?>
    </select>
</div>

<script>
document.getElementById('provinciaSelectMobile')?.addEventListener('change', function() {
    const url = new URL(window.location);
    url.searchParams.set('provincia', this.value);
    url.searchParams.set('pagina', 1);
    window.location = url;
});
</script>

<!-- Conteúdo -->
<div class="page-layout">

    <!-- SIDEBAR -->
    <aside class="page-sidebar desktop-only">
        <div class="sidebar-section">
            <div class="sidebar-section-title">Província</div>
            <a href="?<?= http_build_query(array_merge($_GET, ['provincia' => ''])) ?>" 
               class="province-item <?= $provincia === '' ? 'active' : '' ?>">
                <span>📍 Todas</span>
                <span style="font-size:10px;color:#bbb;"><?= $total ?></span>
            </a>
            <?php foreach ($provincias as $p): ?>
                <a href="?<?= http_build_query(array_merge($_GET, ['provincia' => $p['provincia']])) ?>" 
                   class="province-item <?= $provincia === $p['provincia'] ? 'active' : '' ?>">
                    <span>📍 <?= htmlspecialchars($p['provincia']) ?></span>
                    <span style="font-size:10px;color:#bbb;"><?= $p['total'] ?></span>
                </a>
            <?php endforeach; ?>
        </div>

        <!-- AD sidebar -->
        <div class="sidebar-section">
            <div class="ann"><i class="ti ti-ad"></i> 160 × 600</div>
            <div class="ad-block-sidebar" style="min-height:160px;">
                <i class="ti ti-ad" style="font-size:26px;color:#c0cfe8;"></i>
                <div class="ad-size">160 × 600</div>
                <div class="ad-type">Skyscraper Sidebar</div>
            </div>
        </div>
    </aside>

    <!-- CONTEÚDO PRINCIPAL -->
    <main class="page-main" id="resultados-artistas">

        <?php if (empty($artistas)): ?>
            <div class="pesquisa-empty">
                <i class="ti ti-users"></i>
                <h2>Nenhum artista encontrado</h2>
                <p>Ainda não há artistas registados nesta categoria.</p>
            </div>

        <?php else: ?>

            <!-- AD leaderboard -->
            <div class="mb-4">
                <div class="ann"><i class="ti ti-ad"></i> Leaderboard 728×60</div>
                <div class="ad-strip">
                    <span class="ad-pill">Pub</span>
                    <div class="ad-strip-thumb" style="background:var(--lea-blue);">UN</div>
                    <div class="ad-strip-copy">
                        <strong>Unitel — Plano Ilimitado por Kz 3.500/mês</strong><br>
                        <span>Ligação rápida em todo o país · unitel.ao</span>
                    </div>
                    <button class="btn-lea-sm">Ver oferta</button>
                </div>
            </div>

            <!-- Grelha de artistas -->
            <div class="artists-grid mb-4">
                <?php
                $cores = ['#1D9E75','#534AB7','#3B7DD8','#C07A1A','#2563B0','#1A4A8A'];
                foreach ($artistas as $i => $artista):
                    $foto     = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $artista['art_img_url'] ?? ''));
                    $iniciais = strtoupper(substr($artista['nomeA'], 0, 2));
                    $cor      = $cores[$i % count($cores)];
                    $url      = 'https://lea.co.ao/artista.php?a=' . base64_encode($artista['artID']);
                    $visitas  = !empty($artista['visua']) ? number_format($artista['visua'], 0, ',', '.') : '—';
                ?>
                    <a class="artist-card" href="<?= htmlspecialchars($url) ?>" target="_blank">
                        <div class="artist-cover" style="background:linear-gradient(135deg,<?= $cor ?>,#2563B0);">
                            <?php if ($foto): ?>
                                <img src="<?= htmlspecialchars($foto) ?>" alt="<?= htmlspecialchars($artista['nomeA']) ?>" onerror="this.style.display='none'">
                            <?php endif; ?>
                            <div class="cover-overlay"></div>
                            <span class="cover-initials"><?= $iniciais ?></span>
                        </div>
                        <div class="artist-body">
                            <div class="artist-name"><?= htmlspecialchars($artista['nomeA']) ?></div>
                            <div class="artist-type"><?= htmlspecialchars($artista['prof'] ?? $categoriaNome) ?></div>
                            <div class="artist-meta">
                                <span class="artist-province"><i class="ti ti-map-pin"></i> <?= htmlspecialchars($artista['provincia'] ?? '—') ?></span>
                                <span class="artist-views"><i class="ti ti-eye" style="color:var(--lea-muted);"></i> <?= $visitas ?></span>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Paginação -->
            <?php if ($totalPaginas > 1): ?>
            <div class="d-flex align-items-center justify-content-between">
                <div style="font-size:13px;color:var(--lea-muted);">
                    Mostrando <?= count($artistas) ?> de <?= $total ?> artistas
                </div>
                <div class="lea-pagination">
                    <?php if ($pagina > 1): ?>
                        <a class="page-btn" href="?<?= http_build_query(array_merge($_GET, ['pagina' => $pagina - 1])) ?>"><i class="ti ti-chevron-left"></i></a>
                    <?php endif; ?>

                    <?php for ($p = max(1, $pagina - 2); $p <= min($totalPaginas, $pagina + 2); $p++): ?>
                        <a class="page-btn <?= $p === $pagina ? 'active' : '' ?>" href="?<?= http_build_query(array_merge($_GET, ['pagina' => $p])) ?>"><?= $p ?></a>
                    <?php endfor; ?>

                    <?php if ($pagina < $totalPaginas): ?>
                        <a class="page-btn" href="?<?= http_build_query(array_merge($_GET, ['pagina' => $pagina + 1])) ?>"><i class="ti ti-chevron-right"></i></a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>

        <?php endif; ?>
    </main>

</div>

<script>
(function() {
    const resultados = document.getElementById('resultados-artistas');
    if (!resultados) return;

    // Se veio de um clique/seleção anterior, faz scroll até aos resultados
    if (sessionStorage.getItem('scrollParaResultados') === '1') {
        sessionStorage.removeItem('scrollParaResultados');
        setTimeout(() => {
            resultados.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }, 100);
    }

    if (window.innerWidth > 991) return; // o resto só interessa em mobile

    // Letra e província (sidebar) — marca antes de navegar
    document.querySelectorAll('.alpha-btn, .alpha-btn-tds, .province-item').forEach(link => {
        link.addEventListener('click', function() {
            sessionStorage.setItem('scrollParaResultados', '1');
        });
    });

    // Select de província mobile
    document.getElementById('provinciaSelectMobile')?.addEventListener('change', function() {
        sessionStorage.setItem('scrollParaResultados', '1');
        const url = new URL(window.location);
        url.searchParams.set('provincia', this.value);
        url.searchParams.set('pagina', 1);
        window.location = url;
    });
})();
</script>

