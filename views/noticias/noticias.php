<!-- =============================================
       HERO — manchete principal + ticker
       ============================================= -->
	<div class="news-hero">
		<div class="container">
			<div class="headline-section">
				<div class="row g-4 align-items-stretch">

				<!-- Manchete principal -->
				<div class="col-lg-7">
				<div class="breaking-tag"><i class="ti ti-radio"></i> Última hora </div>
					<a class="main-headline" href="<?= Helper::noticiaUrl($ultimaNoticia) ?>">
						<?= htmlspecialchars($ultimaNoticia['tema']) ?>
					</a>
					<div class="headline-img mb-3">
						<img src="<?= htmlspecialchars(trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $ultimaNoticia['foto'] ?? ''))) ?>"
							alt="<?= htmlspecialchars($ultimaNoticia['tema']) ?>"
							onerror="this.parentElement.style.background='linear-gradient(135deg,#2563B0,#534AB7)'">
						<div class="img-overlay"></div>
					</div>
					<p class="headline-excerpt"> <?= htmlspecialchars($ultimaNoticia['breadcramble']) ?> </p>
					<div class="headline-meta">
						<?php
							$coresCat = [
								'Política'       => 'cat-politica',
								'Tecnologia'     => 'cat-tecnologia',
								'Desporto'       => 'cat-desporto',
								'Crónicas'       => 'cat-cronicas',
								'Arte & Cultura' => 'cat-arte',
								'Economia'       => 'cat-economia',
								'Entrevistas'    => 'cat-entrevistas',
							];
							$classCat = $coresCat[$ultimaNoticia['categoria_noticias']] ?? 'cat-arte';
						?>
						<span class="cat-badge <?= $classCat ?>"><?= htmlspecialchars($ultimaNoticia['categoria_noticias']) ?></span>
						<div class="headline-meta-item"><i class="ti ti-calendar"></i> <?= date('d M Y', strtotime($ultimaNoticia['data_hora'])) ?> </div>
						<div class="headline-meta-item"><i class="ti ti-news"></i> <?= htmlspecialchars($ultimaNoticia['fontes']) ?></div>
					<div class="headline-meta-item"><i class="ti ti-clock"></i> <?= htmlspecialchars($ultimaNoticia['tempo_leitura']) ?> min leitura</div>
				</div>	
			</div>

			<!-- Manchetes secundárias -->
			<div class="col-lg-5">
				<div class="secondary-news">
					<?php 
					$coresCat = [
						'Politica'       => 'cat-politica',
						'Tecnologia'     => 'cat-tecnologia',
						'Desporto'       => 'cat-desporto',
						'Crónicas'       => 'cat-cronicas',
						'Arte & Cultura' => 'cat-arte',
						'Economia'       => 'cat-economia',
						'Entrevistas'    => 'cat-entrevistas',
					];
					foreach ($ultimasNoticias as $uNoticias): 
						$foto = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $uNoticias['foto'] ?? ''));
						$classCat = $coresCat[$uNoticias['categoria_noticias']] ?? 'cat-arte';
					?>
						<a class="sec-news-item" href="<?= Helper::noticiaUrl($uNoticias) ?>" >
							<div class="sec-news-thumb">
								<img src="<?= htmlspecialchars($foto) ?>" alt="<?= htmlspecialchars($uNoticias['tema']) ?>" onerror="this.parentElement.style.background='linear-gradient(135deg,#534AB7,#2563B0)'">
							</div>
							<div>
								<div style="margin-bottom:4px;">
									<span class="cat-badge <?= $classCat ?>">
										<?= htmlspecialchars($uNoticias['categoria_noticias']) ?>
									</span>
								</div>
								<div class="sec-news-title"><?= htmlspecialchars($uNoticias['tema']) ?></div>
								<div class="sec-news-meta"><?= date('d M Y', strtotime($uNoticias['data_hora'])) ?></div>
							</div>
						</a>
				<?php endforeach; ?>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Ticker -->
    <div class="news-ticker">
      <div class="container">
        <div class="d-flex align-items-center gap-3 overflow-hidden">
          <span class="ticker-label">Agora</span>
          <div style="overflow:hidden;flex:1;">
            <div class="ticker-track">
				<?php foreach ($ultimasNoticias as $uNoticias): ?>
					<span class="ticker-item"><span class="ticker-dot"></span><?= htmlspecialchars($uNoticias['tema']) ?></span>
				<?php endforeach; ?>
				<!-- duplicar para loop contínuo -->
				<?php foreach ($ultimasNoticias as $uNoticias): ?>
					<span class="ticker-item"><span class="ticker-dot"></span><?= htmlspecialchars($uNoticias['tema']) ?></span>
				<?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- FILTER TABS -->
  <div class="filter-bar">
    <a class="filter-tab active" href="#">Todas</a>
	<a class="filter-tab" href="https://lea.co.ao/noticias/categorias_.php?cat=5">Arte & Cultura</a>
	<a class="filter-tab" href="https://lea.co.ao/noticias/categorias_.php?cat=7">Entrevistas</a>
    <a class="filter-tab" href="https://lea.co.ao/noticias/categorias_.php?cat=1">Política</a>
    <a class="filter-tab" href="https://lea.co.ao/noticias/categorias_.php?cat=2">Tecnologia</a>
    <a class="filter-tab" href="https://lea.co.ao/noticias/categorias_.php?cat=3">Desporto</a>
    <!--<a class="filter-tab" href="https://lea.co.ao/noticias/categorias_.php?cat=4">Crónicas</a>-->
    <a class="filter-tab" href="https://lea.co.ao/noticias/categorias_.php?cat=6">Economia</a>
    
    <div class="filter-right">
      <select class="filter-select">
        <option>Mais recentes</option>
        <option>Mais lidas</option>
        <option>Este mês</option>
      </select>
    </div>
  </div>


  <!-- =============================================
       CONTEÚDO PRINCIPAL
       ============================================= -->
  <div class="container">
    <div class="page-layout">

      <!-- MAIN -->
      <main>

        <!-- NOTÍCIA EM DESTAQUE WIDE -->
        <div class="sec-hdr mt-0">
          <h2>⭐ Em <span>destaque</span></h2>
        </div>

        <a class="news-featured-wide" href="https://lea.co.ao/noticias/noticia-detalhes.php?n=1874" target="_blank">
          <div class="nfw-img">
            <img src="<?= htmlspecialchars(trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $noticiaDestaque['foto'] ?? ''))) ?>" alt="Gerilson Israel"
                 onerror="this.style.display='none'">
            <div class="nfw-placeholder"><i class="ti ti-news"></i></div>
            <div class="nfw-img-overlay"></div>
          </div>
          <div class="nfw-body">
            <div>
              <div class="mb-2"><span class="cat-badge cat-arte">Arte & Cultura</span></div>
              <div class="nfw-title"><?= htmlspecialchars($noticiaDestaque['tema']) ?></div>
              <p class="nfw-excerpt"><?= htmlspecialchars($noticiaDestaque['breadcramble']) ?></p>
            </div>
            <div class="nfw-meta">
              <div class="nfw-meta-item"><i class="ti ti-calendar"></i><?= date('d M Y', strtotime($noticiaDestaque['data_hora'])) ?></div>
              <div class="nfw-meta-item"><i class="ti ti-news"></i><?= htmlspecialchars($noticiaDestaque['fontes']) ?></div>
              <div class="nfw-meta-item"><i class="ti ti-clock"></i><?= htmlspecialchars($noticiaDestaque['tempo_leitura']) ?> min leitura</div>
              <div class="nfw-meta-item"><i class="ti ti-eye"></i><?= htmlspecialchars($noticiaDestaque['visual']) ?> visualizações</div>
            </div>
          </div>
        </a>


        <!-- AD 1 — LEADERBOARD -->
        <div class="mb-4">
          <div class="ann"><i class="ti ti-ad"></i> Leaderboard 728×90</div>
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


        <!-- ARTE & CULTURA -->
        <div class="mb-4">
			<div class="sec-hdr">
				<h2>🎨 Arte & <span>Cultura</span></h2>
				<a class="sec-link" href="https://lea.co.ao/noticias/categorias_.php?cat=5" target="_blank">Ver todas →</a>
			</div>
			<div class="row g-3">
				<?php foreach ($uNArteCultura as $arteCultura): ?>
					<div class="col-md-6">
						<a class="news-card h-100" href="https://lea.co.ao/noticias/noticia-detalhes.php?n=1876" target="_blank">
							<div class="nc-img nc-img-h160">
								<img src="<?= htmlspecialchars(trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $arteCultura['foto'] ?? ''))) ?>" alt="" onerror="this.style.display='none'">
								<div class="nc-placeholder" style="background:linear-gradient(135deg,#9D174D,#534AB7);"></div>
							</div>
							<div class="nc-body">
								<div class="mb-2"><span class="cat-badge cat-arte">Arte & Cultura</span></div>
								<div class="nc-title"><?= htmlspecialchars($arteCultura['tema']) ?></div>
								<p class="nc-excerpt"><?= htmlspecialchars($arteCultura['breadcramble']) ?></p>
								<div class="nc-footer">
									<div class="nc-source"><i class="ti ti-building-newspaper"></i><?= htmlspecialchars($arteCultura['fontes']) ?></div>
									<span class="nc-date"><?= date('d M Y', strtotime($arteCultura['data_hora'])) ?></span>
								</div>
							</div>
						</a>
					</div>
				<?php endforeach; ?>
			
				<?php foreach ($uNArteCulturaContinuacao as $arteCulturaContinuacao): ?>
					<div class="col-12">
						<a class="news-card-h" href="https://lea.co.ao/noticias/noticia-detalhes.php?n=1872" target="_blank">
							<div class="nch-img">
								<img src="<?= htmlspecialchars(trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $arteCulturaContinuacao['foto'] ?? ''))) ?>" alt="" onerror="this.style.display='none'">
								<div class="nch-placeholder" style="background:linear-gradient(135deg,#374151,#534AB7);"></div>
							</div>
							<div class="nch-body">
								<div class="mb-1"><span class="cat-badge cat-arte">Arte & Cultura</span></div>
								<div class="nch-title"><?= htmlspecialchars($arteCulturaContinuacao['tema']) ?></div>
								<div class="nch-meta">
									<span><i class="ti ti-building-newspaper"></i> <?= htmlspecialchars($arteCulturaContinuacao['fontes']) ?></span>
									<span><i class="ti ti-calendar"></i><?= date('d M Y', strtotime($arteCulturaContinuacao['data_hora'])) ?></span>
									<span><i class="ti ti-clock"></i> <?= htmlspecialchars($arteCulturaContinuacao['tempo_leitura']) ?> min leitura</span>
								</div>
							</div>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
        </div>


        <!-- AD 2 — IN-CONTENT -->
        <div class="mb-4">
          <div class="ann"><i class="ti ti-ad"></i> In-content nativo</div>
          <div class="ad-strip">
            <span class="ad-pill">Pub</span>
            <div class="ad-strip-thumb" style="background:#1D9E75;">BAI</div>
            <div class="ad-strip-copy">
              <strong>BAI — Conta jovem sem comissões</strong><br>
              <span>Abre já online · bai.ao</span>
            </div>
            <button class="btn-lea-sm" style="background:#1D9E75;">Saber mais</button>
          </div>
        </div>


        <!-- POLÍTICA + DESPORTO — lado a lado -->
        <div class="row g-4 mb-4">

          <div class="col-lg-6">
            <div class="sec-hdr">
              <h2>🏛️ <span>Política</span></h2>
              <a class="sec-link" href="https://lea.co.ao/noticias/categorias_.php?cat=1" target="_blank">Ver →</a>
            </div>
            <div class="d-flex flex-column gap-2">
				<?php foreach ($ultimasNoticiasPolitica as $noticiasPolitica): ?>
					<a class="news-card-h" href="https://lea.co.ao/noticias/noticia-detalhes.php?n=1877" target="_blank">
						<div class="nch-img">
							<img src="<?= htmlspecialchars(trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $noticiasPolitica['foto'] ?? ''))) ?>" alt="" onerror="this.style.display='none'">
							<div class="nch-placeholder" style="background:linear-gradient(135deg,#DC2626,#374151);"></div>
						</div>
						<div class="nch-body">
							<div class="mb-1"><span class="cat-badge cat-politica">Política</span></div>
							<div class="nch-title"><?= htmlspecialchars($noticiasPolitica['tema']) ?></div>
							<div class="nch-meta"><span><?= date('d M Y', strtotime($noticiasPolitica['data_hora'])) ?></span></div>
						</div>
					</a>
				<?php endforeach; ?>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="sec-hdr">
              <h2>💻 <span>Tecnologia</span></h2>
              <a class="sec-link" href="https://lea.co.ao/noticias/categorias_.php?cat=3" target="_blank">Ver →</a>
            </div>
            <div class="d-flex flex-column gap-2">
				<?php foreach ($ultimasNoticiasTecnologia as $noticiasTecnologia): ?>
					<a class="news-card-h" href="https://lea.co.ao/noticias/noticia-detalhes.php?n=1873" target="_blank">
						<div class="nch-img">
							<img src="<?= htmlspecialchars(trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $noticiasTecnologia['foto'] ?? ''))) ?>" alt="" onerror="this.style.display='none'">
							<div class="nch-placeholder" style="background:linear-gradient(135deg,#059669,#2563B0);"></div>
						</div>
						<div class="nch-body">
							<div class="mb-1"><span class="cat-badge cat-tecnologia">Tecnologia</span></div>
							<div class="nch-title"><?= htmlspecialchars($noticiasTecnologia['tema']) ?></div>
							<div class="nch-meta"><span><?= date('d M Y', strtotime($noticiasTecnologia['data_hora'])) ?></span></div>
						</div>
					</a>
				<?php endforeach; ?>
            </div>
          </div>
		  
		  <div class="col-lg-6">
            <div class="sec-hdr">
              <h2>💰 <span>Economia</span></h2>
              <a class="sec-link" href="https://lea.co.ao/noticias/categorias_.php?cat=1" target="_blank">Ver →</a>
            </div>
            <div class="d-flex flex-column gap-2">
				<?php foreach ($ultimasNoticiasEconomia as $noticiasEconomia): ?>
					<a class="news-card-h" href="https://lea.co.ao/noticias/noticia-detalhes.php?n=1877" target="_blank">
						<div class="nch-img">
							<img src="<?= htmlspecialchars(trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $noticiasEconomia['foto'] ?? ''))) ?>" alt="" onerror="this.style.display='none'">
							<div class="nch-placeholder" style="background:linear-gradient(135deg,#DC2626,#374151);"></div>
						</div>
						<div class="nch-body">
							<div class="mb-1"><span class="cat-badge cat-economia">Economia</span></div>
							<div class="nch-title"><?= htmlspecialchars($noticiasEconomia['tema']) ?></div>
							<div class="nch-meta"><span><?= date('d M Y', strtotime($noticiasEconomia['data_hora'])) ?></span></div>
						</div>
					</a>
				<?php endforeach; ?>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="sec-hdr">
              <h2>⚽ <span>Desporto</span></h2>
              <a class="sec-link" href="https://lea.co.ao/noticias/categorias_.php?cat=3" target="_blank">Ver →</a>
            </div>
            <div class="d-flex flex-column gap-2">
				<?php foreach ($ultimasNoticiasDesporto as $noticiasDesporto): ?>
					<a class="news-card-h" href="https://lea.co.ao/noticias/noticia-detalhes.php?n=1873" target="_blank">
						<div class="nch-img">
							<img src="<?= htmlspecialchars(trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $noticiasDesporto['foto'] ?? ''))) ?>" alt="" onerror="this.style.display='none'">
							<div class="nch-placeholder" style="background:linear-gradient(135deg,#059669,#2563B0);"></div>
						</div>
						<div class="nch-body">
							<div class="mb-1"><span class="cat-badge cat-desporto">Desporto</span></div>
							<div class="nch-title"><?= htmlspecialchars($noticiasDesporto['tema']) ?></div>
							<div class="nch-meta"><span><?= date('d M Y', strtotime($noticiasDesporto['data_hora'])) ?></span></div>
						</div>
					</a>
				<?php endforeach; ?>
            </div>
          </div>

        </div>


        <!-- CRÓNICAS 
        <div class="mb-4">
          <div class="sec-hdr">
            <h2>✍️ <span>Crónicas</span></h2>
            <a class="sec-link" href="https://lea.co.ao/noticias/categorias_.php?cat=4" target="_blank">Ver todas →</a>
          </div>
          <div class="cronicas-grid">

            <a class="cronica-card" href="https://lea.co.ao/noticias/categorias_.php?cat=4" target="_blank">
              <div class="cronica-quote">
                A arte angolana não precisa de aprovação externa para ser grande. Já é grande. Só precisa de espaço para respirar.
              </div>
              <div class="cronica-author">
                <div class="cronica-avatar">MF</div>
                <div>
                  <div class="cronica-name">Manuel Ferreira</div>
                  <div class="cronica-date">Crónica · Abr 2026</div>
                </div>
              </div>
            </a>

            <a class="cronica-card" href="https://lea.co.ao/noticias/categorias_.php?cat=4" target="_blank">
              <div class="cronica-quote">
                Luanda muda todos os dias. Quem não olha para os seus artistas perde a melhor crónica da cidade — a que é cantada, pintada e dançada nas ruas.
              </div>
              <div class="cronica-author">
                <div class="cronica-avatar" style="background:#2563B0;">AL</div>
                <div>
                  <div class="cronica-name">Ana Luísa Pinto</div>
                  <div class="cronica-date">Crónica · Mar 2026</div>
                </div>
              </div>
            </a>

          </div>
        </div>
		-->

        <!-- ENTREVISTAS -->
        <div class="mb-4">
			<div class="row g-3">
				<div class="mb-4">
					<div class="sec-hdr">
						<h2>🎙️ <span>Entrevistas</span></h2>
						<a class="sec-link" href="https://lea.co.ao/noticias/entrevistas.php?strt=0" target="_blank">Ver todas →</a>
					</div>
					<div class="row g-3">
						<?php foreach ($getEntrevistas as $entrevista): 
							$foto = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $entrevista['foto'] ?? ''));
						?>
						<div class="col-md-4">
							<a class="news-card h-100" href="/noticias/<?= $entrevista['id_noticias'] ?>" target="_blank">
							  <div class="nc-img nc-img-h160">
								<?php if ($foto): ?>
								  <img src="<?= htmlspecialchars($foto) ?>" alt=""
									   onerror="this.style.display='none'">
								<?php endif; ?>
								<div class="nc-placeholder" style="background:linear-gradient(135deg,#9D174D,#2563B0);">
								  <i class="ti ti-microphone-2"></i>
								</div>
							  </div>
							  <div class="nc-body">
								<div class="mb-2"><span class="cat-badge cat-entrevistas">Entrevista</span></div>
								<div class="nc-title"><?= htmlspecialchars($entrevista['tema']) ?></div>
								<p class="nc-excerpt"><?= htmlspecialchars(substr($entrevista['conteudo'] ?? '', 0, 120)) ?>...</p>
								<div class="nc-footer">
								  <div class="nc-source"><i class="ti ti-building-newspaper"></i> <?= htmlspecialchars($entrevista['fontes'] ?? 'Lea.co.ao') ?></div>
								  <span class="nc-date"><?= date('M Y', strtotime($entrevista['data_hora'])) ?></span>
								</div>
							  </div>
							</a>
						</div>				
						<?php endforeach; ?>
					</div>
				</div>
			</div>
        </div>


        <!-- PAGINAÇÃO 
        <div class="d-flex align-items-center justify-content-between mt-2 mb-4 pagination-wrapper">
			<div class="pagination-info" style="font-size:13px;color:var(--lea-muted);">
				A mostrar página <? //=$paginaEntrevistas ?> de <? //=$totalPaginasEntrevistas ?>
			</div>

			<div class="lea-pagination">
				<?php //if ($paginaEntrevistas > 1): ?>
			  <a class="page-btn" href="?pag_e=<? //=$paginaEntrevistas - 1 ?>">
				<i class="ti ti-chevron-left"></i>
			  </a>
			<?php //endif; ?>

			<?php //for ($i = 1; $i <= $totalPaginasEntrevistas; $i++): ?>
			  <?php //if ($i == 1 || $i == $totalPaginasEntrevistas || abs($i - $paginaEntrevistas) <= 1): ?>
				<a class="page-btn <? //=$i == $paginaEntrevistas ? 'active' : '' ?>" href="?pag_e=<? //=$i ?>">
				  <? //=$i ?>
				</a>
			  <?php //elseif (abs($i - $paginaEntrevistas) == 2): ?>
				<span style="color:var(--lea-muted);font-size:13px;padding:0 4px;">…</span>
			  <?php //endif; ?>
			<?php //endfor; ?>

			<?php //if ($paginaEntrevistas < $totalPaginasEntrevistas): ?>
			  <a class="page-btn" href="?pag_e=<? //=$paginaEntrevistas + 1 ?>">
				<i class="ti ti-chevron-right"></i>
			  </a>
			<?php //endif; ?>
			</div>
		</div>-->


      </main>


      <!-- =============================================
           SIDEBAR desktop-only
           ============================================= -->
		<aside class="news-sidebar ">
		
			<!-- AD 300×250 -->
			<div class="espaco-embaixo">
				<div class="ann"><i class="ti ti-ad"></i> 300 × 250 · AdSense</div>
				<div class="ad-block-sidebar" style="min-height:140px;">
					<i class="ti ti-ad" style="font-size:26px;color:#c0cfe8;"></i>
					<div class="ad-size">300 × 250</div>
					<div class="ad-type">Medium Rectangle</div>
				</div>
			</div>
			
        <!-- Newsletter 
        <div class="newsletter-card">-->
			
			<!--<h3>📬 Recebe as notícias</h3>
			<p>Subscreve a newsletter do LEA e recebe as melhores notícias culturais direto no teu email.</p>
			<input class="newsletter-input" type="email" placeholder="O teu email…">
			<button class="btn-newsletter">Subscrever grátis</button>
        </div>-->

        <!-- Mais lidas -->
        <div class="sidebar-card">
			<div class="sidebar-card-header">
				<i class="ti ti-flame"></i>
				<h3>Mais lidas</h3>
			</div>

			<?php 
			$count = 1; 
			$popularColors = [
				1 => 'p1',
				2 => 'p2',
				3 => 'p3',
				4 => 'opacity-20',
				5 => 'opacity-15'
			];
			?>

			<?php foreach ($noticiasMaisLidas as $maisLidas): ?>
				<?php 
					$colorClass = $popularColors[$count] ?? 'opacity-10';
				?>

				<a class="popular-item" 
				   href="https://lea.co.ao/noticias/noticia-detalhes.php?n=<?= $maisLidas['id_noticias'] ?>" 
				   target="_blank">

					<?php if (str_starts_with($colorClass, 'p')): ?>
						<span class="popular-num <?= $colorClass ?>"><?= $count ?></span>
					<?php else: ?>
						<span class="popular-num" style="color:rgba(37,99,176,0.<?= str_replace('opacity-', '', $colorClass) ?>);">
							<?= $count ?>
						</span>
					<?php endif; ?>

					<div>
						<div class="popular-title"><?= htmlspecialchars($maisLidas['tema']) ?></div>
						<div class="popular-meta">
							<?= htmlspecialchars($maisLidas['categoria_noticias']) ?> · 
							<?= date('d M Y', strtotime($maisLidas['data_hora'])) ?>
						</div>
					</div>

				</a>

				<?php $count++; ?>
			<?php endforeach; ?>
		</div>

		<!-- NASOCIAL -->
		<a href="https://www.lea.co.ao/nasocial/" style="text-decoration:none;display:block;background:linear-gradient(135deg,#1A4A8A,#534AB7);border-radius:10px;padding:12px;" class="espaco-embaixo">
            <div style="font-size:9px;font-weight:700;color:rgba(255,255,255,0.6);letter-spacing:1px;text-transform:uppercase;margin-bottom:2px;">Mercado Livre</div>
            <div style="font-size:13px;font-weight:700;color:#fff;font-family:'Sora',sans-serif;display:flex;align-items:center;gap:5px;">
                <i class="ti ti-social" style="font-size:16px;"></i> NASOCIAL
            </div>
            <div style="font-size:10px;color:rgba(255,255,255,0.7);margin-top:2px;">A rede social da cultura angolana</div>
            <div style="margin-top:8px;background:rgba(255,255,255,0.15);border-radius:6px;padding:6px 10px;font-size:11px;font-weight:600;color:#fff;text-align:center;">
                Entrar →
            </div>
        </a>        

        <!-- Categorias -->
        <div class="sidebar-card">
			<div class="sidebar-card-header">
				<i class="ti ti-layout-list"></i>
				<h3>Categorias</h3>
			</div>

			<?php
			$catColors = [
				'Política'       => 'var(--cat-politica)',
				'Tecnologia'     => 'var(--cat-tecnologia)',
				'Desporto'       => 'var(--cat-desporto)',
				'Crónicas'       => 'var(--cat-cronicas)',
				'Arte & Cultura' => 'var(--cat-arte)',
				'Economia'       => 'var(--cat-economia)',
				'Entrevistas'    => 'var(--cat-entrevistas)',
			];
			?>

			<?php foreach ($totalCategoria as $totalDCategoria): ?>
				<?php 
					$categoria = $totalDCategoria['categoria_noticias'];
					$cor = $catColors[$categoria] ?? 'var(--cat-arte)';
					$idCat = $totalDCategoria['ce_categoria_noticia'];
				?>

				<a class="cat-sidebar-item" 
				   href="https://lea.co.ao/noticias/categorias_.php?cat=<?= $idCat ?>" 
				   target="_blank">

					<div class="cat-sidebar-label">
						<span class="cat-sidebar-dot" style="background:<?= $cor ?>;"></span>
						<?= htmlspecialchars($categoria) ?>
					</div>

					<span class="cat-sidebar-count">
						<?= htmlspecialchars($totalDCategoria['total']) ?>
					</span>
				</a>
			<?php endforeach; ?>
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
				<a class="artist-sidebar-item" href="https://lea.co.ao/artista.php?a=MjI2Ng==" target="_blank">
					<div class="artist-sidebar-avatar">
						<img src="<?= $foto; ?>" alt="Cassilva" onerror="this.style.display='none'">
						<div class="av-fallback" style="background:#2563B0;">CS</div>
					</div>
					<div><div class="artist-sidebar-name"><?= htmlspecialchars($recemAdicionados['nomeA']) ?></div><div class="artist-sidebar-date"><?= date('d M Y', strtotime($recemAdicionados['anoreg'])) ?></div></div>
				</a>
			<?php endforeach; ?> 
        </div>

      </aside>

    </div>
  </div>
  
  <script>
    // Filter tabs
    document.querySelectorAll('.filter-tab').forEach(tab => {
      tab.addEventListener('click', () => {
        document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
      });
    });

    // Newsletter
    document.querySelector('.btn-newsletter')?.addEventListener('click', () => {
      const input = document.querySelector('.newsletter-input');
      if (input.value && input.value.includes('@')) {
        const btn = document.querySelector('.btn-newsletter');
        btn.textContent = '✓ Subscrito com sucesso!';
        btn.style.background = '#E8F0FB';
        btn.style.color = 'var(--lea-blue)';
        input.value = '';
        setTimeout(() => { btn.textContent = 'Subscrever grátis'; btn.style.background = ''; btn.style.color = ''; }, 3000);
      }
    });
  </script>