<!-- Breadcrumb -->
<div class="lea-breadcrumb">
  <div class="container">
    <a href="/">Início</a>
    <i class="ti ti-chevron-right"></i>
    <a href="/noticias">Notícias</a>
    <i class="ti ti-chevron-right"></i>
    <span>#<?= htmlspecialchars($tag) ?></span>
  </div>
</div>

<!-- Hero da tag -->
<div class="cat-hero" style="--cat-cor: var(--lea-blue);">
  <div class="container">
    <div class="cat-hero-inner">
      <div class="cat-hero-icon" style="background: linear-gradient(135deg, #2563B0, #3B7DD8);">
        <i class="ti ti-hash"></i>
      </div>
      <div>
        <h1 class="cat-hero-title">#<?= htmlspecialchars($tag) ?></h1>
        <div class="cat-hero-meta">
          <strong><?= $totalNoticias ?></strong> notícias com esta tag
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Conteúdo principal -->
<div class="container" style="--cat-cor: var(--lea-blue);">
  <div class="cat-layout">

    <!-- MAIN -->
    <main>

      <?php if (empty($noticias)): ?>
        <div style="text-align:center;padding:60px 20px;">
          <i class="ti ti-news-off" style="font-size:48px;color:#c0cfe8;"></i>
          <h2 style="font-size:18px;margin-top:16px;color:var(--lea-muted);">Nenhuma notícia encontrada</h2>
          <p style="color:var(--lea-muted);font-size:13px;">Não existem notícias com a tag <strong>#<?= htmlspecialchars($tag) ?></strong></p>
          <a href="/noticias" style="display:inline-block;margin-top:16px;background:var(--lea-blue);color:#fff;padding:10px 24px;border-radius:8px;text-decoration:none;font-size:13px;">Ver todas as notícias</a>
        </div>
      <?php else: ?>

        <div class="d-flex flex-column gap-2 mb-4">
          <?php
          $coresCat = [
            'Politica'       => ['css' => 'cat-politica', 'bg' => 'linear-gradient(135deg,#DC2626,#374151)'],
            'Tecnologia'     => ['css' => 'cat-tecnologia', 'bg' => 'linear-gradient(135deg,#7C3AED,#534AB7)'],
            'Desporto'       => ['css' => 'cat-desporto', 'bg' => 'linear-gradient(135deg,#059669,#2563B0)'],
            'Crónicas'       => ['css' => 'cat-cronicas', 'bg' => 'linear-gradient(135deg,#C07A1A,#534AB7)'],
            'Arte & Cultura' => ['css' => 'cat-arte', 'bg' => 'linear-gradient(135deg,#9D174D,#534AB7)'],
            'Economia'       => ['css' => 'cat-economia', 'bg' => 'linear-gradient(135deg,#0D6B4E,#2563B0)'],
            'Entrevistas'    => ['css' => 'cat-entrevistas', 'bg' => 'linear-gradient(135deg,#9D174D,#2563B0)'],
            'Autodidata'     => ['css' => 'cat-autodidata', 'bg' => 'linear-gradient(135deg,#534AB7,#2563B0)'],
          ];
          foreach ($noticias as $n):
            $foto = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $n['foto'] ?? ''));
            $catInfo = $coresCat[$n['categoria_noticias']] ?? ['css' => 'cat-arte', 'bg' => 'linear-gradient(135deg,#2563B0,#534AB7)'];
          ?>
            <a class="nc-h" href="<?= Helper::noticiaUrl($n) ?>">
              <div class="nc-h-img">
                <?php if ($foto): ?>
                  <img src="<?= htmlspecialchars($foto) ?>" alt="" onerror="this.style.display='none'">
                <?php endif; ?>
                <div class="nc-h-img-ph" style="background:<?= $catInfo['bg'] ?>;"><i class="ti ti-news"></i></div>
              </div>
              <div class="nc-h-body">
                <div class="mb-1"><span class="cat-badge <?= $catInfo['css'] ?>"><?= htmlspecialchars($n['categoria_noticias']) ?></span></div>
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
          <div style="font-size:13px;color:var(--lea-muted);">Página <?= $pagina ?> de <?= $totalPaginas ?></div>
          <div class="cat-pagination">
            <?php if ($pagina > 1): ?>
              <a class="page-btn" href="?pagina=<?= $pagina - 1 ?>"><i class="ti ti-chevron-left"></i></a>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
              <?php if ($i == 1 || $i == $totalPaginas || abs($i - $pagina) <= 1): ?>
                <a class="page-btn <?= $i == $pagina ? 'active' : '' ?>" href="?pagina=<?= $i ?>"><?= $i ?></a>
              <?php elseif (abs($i - $pagina) == 2): ?>
                <span style="color:var(--lea-muted);font-size:13px;padding:0 4px;">…</span>
              <?php endif; ?>
            <?php endfor; ?>
            <?php if ($pagina < $totalPaginas): ?>
              <a class="page-btn" href="?pagina=<?= $pagina + 1 ?>"><i class="ti ti-chevron-right"></i></a>
            <?php endif; ?>
          </div>
        </div>

      <?php endif; ?>

    </main>

    <!-- SIDEBAR -->
    <aside style="position:sticky;top:80px;height:fit-content;">
      <div class="cat-sidebar">

        <!-- Mais lidas -->
        <div class="sidebar-card">
          <div class="sidebar-card-header">
            <i class="ti ti-flame"></i>
            <h3>Mais lidas</h3>
          </div>
          <?php foreach ($maisLidas as $ml):
            $fotoMl = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $ml['foto'] ?? ''));
          ?>
            <a class="related-item" href="<?= Helper::noticiaUrl($ml) ?>">
              <div class="related-thumb">
                <img src="<?= htmlspecialchars($fotoMl) ?>" alt="" onerror="this.parentElement.style.background='linear-gradient(135deg,#2563B0,#534AB7)'">
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
            <h3>Recém adicionados</h3>
          </div>
          <?php foreach ($novosArtistas as $artista):
            $fotoArt = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $artista['art_img_url'] ?? ''));
          ?>
            <a class="artist-item" href="https://lea.co.ao/artista.php?a=<?= base64_encode($artista['artID']) ?>">
              <div class="artist-avatar">
                <img src="<?= htmlspecialchars($fotoArt) ?>" alt="" onerror="this.style.display='none'">
              </div>
              <div>
                <div class="artist-name"><?= htmlspecialchars($artista['nomeA']) ?></div>
                <div class="artist-prof"><?= htmlspecialchars($artista['prof'] ?? '') ?></div>
              </div>
            </a>
          <?php endforeach; ?>
        </div>

      </div>
    </aside>

  </div>
</div>