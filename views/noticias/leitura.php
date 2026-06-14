<!-- ============================================================
     INÍCIO PÁGINA DE LEITURA DE NOTÍCIA
     ============================================================ -->

<!-- Breadcrumb -->
<div class="lea-breadcrumb">
	<div class="container">
		<a href="/">Início</a>
		<i class="ti ti-chevron-right"></i>
		<a href="/noticias">Notícias</a>
		<i class="ti ti-chevron-right"></i>
		<a href="/noticias?cat=<?= $noticia['ce_categoria_noticia'] ?>">
		  <?= htmlspecialchars($noticia['categoria_noticias']) ?>
		</a>
		<i class="ti ti-chevron-right"></i>
		<span><?= htmlspecialchars(substr($noticia['tema'], 0, 60)) ?>...</span>
	</div>
</div>

<!-- Conteúdo principal -->
<div class="container">
  <div class="leitura-layout">

    <!-- ARTIGO PRINCIPAL -->
    <article>

      <!-- Cabeçalho -->
      <div class="artigo-header">
        <?php
			$coresCat = [
				'Politica'       => 'cat-politica',
				'Tecnologia'     => 'cat-tecnologia',
				'Desporto'       => 'cat-desporto',
				'Cronicas'       => 'cat-cronicas',
				'Arte & Cultura' => 'cat-arte',
				'Economia'       => 'cat-economia',
				'Entrevistas'    => 'cat-entrevistas',
			];
			$classCat = $coresCat[$noticia['categoria_noticias']] ?? 'cat-arte';

			// Calcular tempo de leitura
			$palavras = str_word_count(strip_tags($noticia['conteudo'] ?? ''));
			$tempoLeitura = max(1, ceil($palavras / 200));
		?>
		<div class="artigo-categoria">
			<span class="cat-badge <?= $classCat ?>"><?= htmlspecialchars($noticia['categoria_noticias']) ?></span>
			<span style="font-size:11px;color:var(--lea-muted);">· Tempo de leitura: <?= $tempoLeitura ?> min</span>
		</div>
        <h1 class="artigo-titulo"><?= htmlspecialchars($noticia['tema']) ?></h1>
		<p class="artigo-subtitulo"><?= htmlspecialchars($noticia['breadcramble']) ?></p>
		<div class="artigo-meta">
			<div class="artigo-meta-item">
				<i class="ti ti-news"></i>
				<strong><?= htmlspecialchars($noticia['fontes']) ?></strong>
			</div>
			<div class="artigo-meta-item">
				<i class="ti ti-calendar"></i>
				<?= date('d \d\e F \d\e Y', strtotime($noticia['data_hora'])) ?>
			</div>
			<div class="artigo-meta-item">
				<i class="ti ti-eye"></i>
				<?= number_format($noticia['visual'] ?? 0, 0, ',', '.') ?> visualizações
			</div>
			<div class="artigo-meta-item ms-auto">
				<div class="share-bar">
					<span class="share-lbl">Partilhar:</span>
					<a class="share-btn share-fb" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode('https://lea.co.ao' . Helper::noticiaUrl($noticia)) ?>" target="_blank" title="Facebook"><i class="ti ti-brand-facebook"></i></a>
					<a class="share-btn share-wa" href="https://wa.me/?text=<?= urlencode($noticia['tema'] . ' https://lea.co.ao' . Helper::noticiaUrl($noticia)) ?>" target="_blank" title="WhatsApp"><i class="ti ti-brand-whatsapp"></i></a>
					<a class="share-btn share-tg" href="https://t.me/share/url?url=<?= urlencode('https://lea.co.ao' . Helper::noticiaUrl($noticia)) ?>" target="_blank" title="Telegram"><i class="ti ti-brand-telegram"></i></a>
					<a class="share-btn share-tw" href="https://twitter.com/intent/tweet?text=<?= urlencode($noticia['tema']) ?>&url=<?= urlencode('https://lea.co.ao' . Helper::noticiaUrl($noticia)) ?>" target="_blank" title="X/Twitter"><i class="ti ti-brand-x"></i></a>
					<a class="share-btn share-copy" href="#" title="Copiar link" onclick="navigator.clipboard.writeText(location.href);return false;"><i class="ti ti-copy"></i></a>
				</div>
			</div>
		</div>

		<!-- Imagem principal -->
		<?php
			$foto = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $noticia['foto'] ?? ''));
		?>
		<div class="artigo-img-wrap">
			<img src="<?= htmlspecialchars($foto) ?>"
				 alt="<?= htmlspecialchars($noticia['tema']) ?>"
				 onerror="this.style.display='none'">
		</div>
      <p class="artigo-img-caption">Festival Infantil RNA–Chitotolo — 30ª edição · Foto: RNA</p>

      <!-- Corpo do artigo -->
      <div class="artigo-corpo">

        <p><?= $noticia['conteudo'] ?></p>

      </div>

      <!-- Tags -->
      <?php $tags = array_filter(array_map('trim', explode(',', $noticia['keywords'] ?? ''))); ?>
		<?php if (!empty($tags)): ?>
		<div class="artigo-tags">
			<span class="artigo-tags-lbl">Tags:</span>
			<?php foreach ($tags as $tag): ?>
				<!--<a class="tag-item" href="/noticias?tag=<?= urlencode($tag) ?>">-->
				<a class="tag-item" href="#">
					<?= htmlspecialchars($tag) ?>
				</a>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

      <!-- Fonte -->
      <div class="artigo-fonte">
        <i class="ti ti-building-newspaper"></i>
        <div class="artigo-fonte-text">
          <strong>Fonte: <?= $noticia['fontes'] ?></strong><br>
          <!--Conteúdo produzido pela equipa editorial da LEA com base em informações da RNA.-->
        </div>
      </div>

      <!-- Partilha final -->
      <div class="share-final">
    <div class="share-final-text">Gostaste desta notícia? Partilha com os teus amigos!</div>
		<div class="share-bar">
			<a class="share-btn share-fb" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode('https://lea.co.ao' . Helper::noticiaUrl($noticia)) ?>" target="_blank"><i class="ti ti-brand-facebook"></i></a>
			<a class="share-btn share-wa" href="https://wa.me/?text=<?= urlencode($noticia['tema'] . ' https://lea.co.ao' . Helper::noticiaUrl($noticia)) ?>" target="_blank"><i class="ti ti-brand-whatsapp"></i></a>
			<a class="share-btn share-tg" href="https://t.me/share/url?url=<?= urlencode('https://lea.co.ao' . Helper::noticiaUrl($noticia)) ?>" target="_blank"><i class="ti ti-brand-telegram"></i></a>
			<a class="share-btn share-tw" href="https://twitter.com/intent/tweet?text=<?= urlencode($noticia['tema']) ?>&url=<?= urlencode('https://lea.co.ao' . Helper::noticiaUrl($noticia)) ?>" target="_blank"><i class="ti ti-brand-x"></i></a>
			<a class="share-btn share-copy" href="#" onclick="navigator.clipboard.writeText(location.href);return false;"><i class="ti ti-copy"></i></a>
		</div>
	</div>

		<!-- Notícias relacionadas -->
		<div class="mb-4">
			<h2 style="font-size:16px;font-weight:700;margin-bottom:16px;">Notícias relacionadas</h2>
			<div class="relacionadas-grid">
				<?php
				$coresBg = [
					'Política'       => 'linear-gradient(135deg,#DC2626,#374151)',
					'Tecnologia'     => 'linear-gradient(135deg,#7C3AED,#534AB7)',
					'Desporto'       => 'linear-gradient(135deg,#059669,#2563B0)',
					'Crónicas'       => 'linear-gradient(135deg,#C07A1A,#534AB7)',
					'Arte & Cultura' => 'linear-gradient(135deg,#9D174D,#534AB7)',
					'Economia'       => 'linear-gradient(135deg,#0D6B4E,#2563B0)',
					'Entrevistas'    => 'linear-gradient(135deg,#9D174D,#2563B0)',
				];
				foreach ($noticiasRelacionadas as $rel):
					$fotoRel = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $rel['foto'] ?? ''));
					$bgRel = $coresBg[$rel['categoria_noticias']] ?? 'linear-gradient(135deg,#2563B0,#534AB7)';
					$classCatRel = $coresCat[$rel['categoria_noticias']] ?? 'cat-arte';
				?>
					<a class="rel-card" href="<?= Helper::noticiaUrl($rel) ?>">
						<div class="rel-card-img">
							<?php if ($fotoRel): ?>
								<img src="<?= htmlspecialchars($fotoRel) ?>" alt=""
									 onerror="this.style.display='none'">
							<?php endif; ?>
							<div class="rel-card-img-placeholder" style="background:<?= $bgRel ?>;">
								<i class="ti ti-news"></i>
							</div>
						</div>
						<div class="rel-card-body">
							<div class="mb-1"><span class="cat-badge <?= $classCatRel ?>"><?= htmlspecialchars($rel['categoria_noticias']) ?></span></div>
							<div class="rel-card-title"><?= htmlspecialchars($rel['tema']) ?></div>
							<div class="rel-card-date"><?= date('d M Y', strtotime($rel['data_hora'])) ?></div>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		</div>

    </article>

    <!-- SIDEBAR -->
    <aside style="position: sticky; top: 80px; height: fit-content;">
		<div style="display:flex;flex-direction:column;gap:20px;">

        <!-- Ad 300x250 -->
        <div>
          <div class="ann"><i class="ti ti-ad"></i> 300 × 250 · AdSense</div>
          <div class="ad-block" style="min-height:140px;">
            <i class="ti ti-ad" style="font-size:26px;color:#c0cfe8;"></i>
            <div class="ad-size">300 × 250</div>
            <div class="ad-type">Medium Rectangle</div>
          </div>
        </div>

        <!-- Mais lidas -->
        <div class="sidebar-card">
			<div class="sidebar-card-header">
				<i class="ti ti-flame"></i>
					<h3>Mais lidas</h3>
			</div>
			<?php foreach ($noticiasMaisLidas as $maisLidas): 
				$foto = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $maisLidas['foto'] ?? ''));
			?>
				<a class="related-item" href="<?= Helper::noticiaUrl($maisLidas) ?>">
					<div class="related-thumb">
						<img src="<?= $foto; ?>" alt=""
					   onerror="this.parentElement.style.background='linear-gradient(135deg,#2563B0,#534AB7)'">
						</div>
					<div>
						<div class="related-title"><?= htmlspecialchars($maisLidas['tema']) ?></div>
						<div class="related-meta"><?= htmlspecialchars($maisLidas['categoria_noticias']) ?> · 
							<?= date('d M Y', strtotime($maisLidas['data_hora'])) ?></div>
					</div>
				</a>
			<?php endforeach; ?>
        </div>

        <!-- Ad nativo -->
        <div>
          <div class="ann"><i class="ti ti-ad"></i> Nativo sidebar</div>
          <div style="background:var(--lea-surface);border:1px dashed #ccd9ef;border-radius:10px;">
            <div style="height:68px;background:linear-gradient(135deg,#1D9E75,#2563B0);display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:600;color:#fff;">BAI — Banco de poupança</div>
            <div style="padding:10px 12px;">
              <span class="ad-pill d-inline-block mb-1">Pub</span>
              <div style="font-size:12px;font-weight:500;">Conta jovem sem comissões</div>
              <a href="#" style="font-size:11px;font-weight:500;color:var(--lea-blue);text-decoration:none;">Saber mais →</a>
            </div>
          </div>
        </div>

        <!-- Artistas recém adicionados -->
        <div class="sidebar-card">
          <div class="sidebar-card-header">
            <i class="ti ti-user-plus"></i>
            <h3>Novos artistas</h3>
          </div>
		  <?php foreach ($artistasRecemAdicionados as $recemAdicionados): 
				$foto = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $recemAdicionados['art_img_url'] ?? ''));
			?>
          <a class="artist-sidebar-item" href="https://lea.co.ao/artista.php?a=<?= base64_encode($recemAdicionados['artID']) ?>">
            <div class="artist-sidebar-avatar">
              <img src="<?= $foto; ?>" alt="Cassilva"
                   onerror="this.style.display='none'">
            </div>
            <div>
              <div class="artist-sidebar-name"><?= htmlspecialchars($recemAdicionados['nomeA']) ?></div>
              <div class="artist-sidebar-prof"><?= $recemAdicionados['prof'] ?></div>
            </div>
          </a>
		  <?php endforeach; ?> 
          
        </div>

      </div>
    </aside>

  </div>
</div>

<!-- ============================================================
     FIM PÁGINA DE LEITURA DE NOTÍCIA
     ============================================================ -->