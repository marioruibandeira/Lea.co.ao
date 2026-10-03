<!-- =============================================
       HERO DA PÁGINA
       ============================================= -->
  <div class="page-hero">
    <div class="container pb-4">
      <div class="row align-items-center g-4">

        <?php
			$heroTextos = [
				[
					'eyebrow' => 'Plataforma Angolana de Artes',
					'titulo'  => 'Descobre os <em>talentos</em><br>de Angola',
					'subtitulo' => 'Mais de 2.200 artistas registados de todas as províncias — músicos, realizadores, escritores, fotógrafos e muito mais.',
				],
				[
					'eyebrow' => 'A maior plataforma cultural angolana',
					'titulo'  => 'A <em>arte</em> angolana<br>num só lugar',
					'subtitulo' => 'Da Música ao Teatro, da Pintura à Literatura. Explora o melhor da criatividade angolana em todas as suas formas.',
				],
				[
					'eyebrow' => '2.200+ artistas registados',
					'titulo'  => 'Conhece os <em>artistas</em><br>que fazem Angola',
					'subtitulo' => 'Artistas de todas as 21 províncias angolanas. Descobre talentos da música, cinema, literatura, fotografia e muito mais.',
				],
			];
			$hero = $heroTextos[array_rand($heroTextos)];
		?>

		<div class="col-lg-7">
			<div class="page-hero-eyebrow"><?= $hero['eyebrow'] ?></div>
			<h1><?= $hero['titulo'] ?></h1>
			<p><?= $hero['subtitulo'] ?></p>
				<form method="GET" action="/pesquisa">
					<div class="hero-search">
						<button type="submit" style="background:none;border:none;padding:0;display:flex;line-height:0;">
							<i class="ti ti-search"></i>
						</button>
						<input type="text" name="q" 
							   placeholder="Pesquisar artista por nome, género ou província…"
							   value="<?= htmlspecialchars($termo ?? '') ?>">
					</div>
				</form>
		</div>

        <div class="col-lg-5 ">
			<div style="background:rgba(255,255,255,0.1);border:1px solid rgba(255,255,255,0.15);border-radius:14px;padding:16px;">
				<div style="font-size:11px;font-weight:600;letter-spacing:.6px;text-transform:uppercase;color:rgba(255,255,255,0.6);margin-bottom:12px;">
				</div>
					<div style="font-size:11px;font-weight:600;letter-spacing:.6px;text-transform:uppercase;color:rgba(255,255,255,0.6);margin-bottom:12px;">
					  <i class="ti ti-trending-up" style="color:rgba(255,255,255,0.8);"></i> Mais visitados 
					</div>
				<?php
					$medalhas = ['#F59E0B', 'rgba(255,255,255,0.4)', '#C07A1A', 'rgba(255,255,255,0.4)'];
					$cores = ['#1D9E75','#534AB7','#3B7DD8','#C07A1A'];
					foreach ($maisVisitados as $i => $artista):
						$foto = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $artista['art_img_url'] ?? ''));
						$iniciais = strtoupper(substr($artista['nomeA'], 0, 2));
						$cor = $cores[$i % count($cores)];
						$medalha = $medalhas[$i] ?? 'rgba(255,255,255,0.4)';
						$visua = number_format($artista['visua'], 0, ',', '.');
						$isLast = $i === count($maisVisitados) - 1;
						$urlArtista = Helper::artistaUrl($artista);
				?>
					<a href="<?= htmlspecialchars($urlArtista) ?>" style="display:flex;align-items:center;gap:10px;padding:8px 0;text-decoration:none;<?= !$isLast ? 'border-bottom:1px solid rgba(255,255,255,0.08);' : '' ?>">
						<div style="font-size:16px;font-weight:700;color:<?= $medalha ?>;width:20px;"><?= $i + 1 ?></div>
						<div style="width:34px;height:34px;border-radius:50%;overflow:hidden;flex-shrink:0;background:<?= $cor ?>;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;color:#fff;">
							<?php if ($foto): ?>
								<img src="<?= htmlspecialchars($foto) ?>" alt="" style="width:100%;height:100%;object-fit:cover;object-position:top;" onerror="this.style.display='none'">
							<?php else: ?>
								<?= $iniciais ?>
							<?php endif; ?>
						</div>
						<div style="flex:1;min-width:0;">
							<div style="font-size:12px;font-weight:500;color:#fff;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?= htmlspecialchars($artista['nomeA']) ?></div>
							<div style="font-size:10px;color:rgba(255,255,255,0.5);"><?= htmlspecialchars($artista['prof'] ?? '') ?> · <?= htmlspecialchars($artista['provincia'] ?? '') ?></div>
						</div>
						<div style="font-size:11px;color:rgba(255,255,255,0.5);"><?= $visua ?> 👁️</div>
					</a>
				<?php endforeach; ?>
			</div>
		</div>

      </div>
    </div>

    <!-- Stats bar -->
    <div class="hero-stats-bar">
      <div class="container">
        <div class="row g-0">
          <div class="col-3 col-md-3">
            <div class="hstat">
              <div class="hstat-num">2.2k+</div>
              <div class="hstat-lbl">Artistas</div>
            </div>
          </div>
          <div class="col-3 col-md-3">
            <div class="hstat">
              <div class="hstat-num">21</div>
              <div class="hstat-lbl">Províncias</div>
            </div>
          </div>
          <div class="col-3 col-md-3">
            <div class="hstat">
              <div class="hstat-num">11</div>
              <div class="hstat-lbl">Categorias</div>
            </div>
          </div>
          <div class="col-3 col-md-3">
            <div class="hstat">
              <div class="hstat-num">2017</div>
              <div class="hstat-lbl">Desde</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- =============================================
       FILTER TABS
       ============================================= -->
  <div class="filter-bar">
    <a class="filter-tab active" href="/artistas">Todos</a>
    <a class="filter-tab" href="/artistas/musica">Música</a>
    <a class="filter-tab" href="/artistas/danca">Dança</a>
    <a class="filter-tab" href="/artistas/pintura">Pintura</a>
    <a class="filter-tab" href="/artistas/escultura">Escultura</a>
    <a class="filter-tab" href="/artistas/teatro">Teatro</a>
    <a class="filter-tab" href="/artistas/literatura">Literatura</a>
    <a class="filter-tab" href="/artistas/cinema">Cinema</a>
    <a class="filter-tab" href="/artistas/fotografia">Fotografia</a>
    <a class="filter-tab" href="/artistas/quadrinhos">Histórias em Quadrinhos</a>
    <a class="filter-tab" href="/artistas/videojogos">Vídeo Jogos</a>
    <a class="filter-tab" href="/artistas/arte-digital">Arte Digitais</a>
    <a class="filter-tab" href="/artistas/aniversarios">Aniversários</a>
    <a class="filter-tab" href="/artistas/obituario">Obituário</a>
    <div class="filter-right">
        <select class="filter-select" id="ordenarSelect">
			<option value="visitas" <?= $ordenar === 'visitas' ? 'selected' : '' ?>>Mais visitados</option>
			<option value="recentes" <?= $ordenar === 'recentes' ? 'selected' : '' ?>>Mais recentes</option>
			<option value="az" <?= $ordenar === 'az' ? 'selected' : '' ?>>A-Z</option>
		</select>

		<script>
		document.getElementById('ordenarSelect').addEventListener('change', function() {
			const url = new URL(window.location);
			url.searchParams.set('ordenar', this.value);
			window.location = url;
		});
		</script>
    </div>
</div>


  <!-- =============================================
       LAYOUT PRINCIPAL
       ============================================= -->
  <div class="page-layout">

    <!-- ── SIDEBAR ── -->
    <aside class="page-sidebar desktop-only">

      <!-- Categorias -->
		<div class="sidebar-section">
			<div class="sidebar-section-title">Categoria</div>
			<a class="sidebar-filter-item active" href="/artistas">
				<span class="sidebar-filter-label"><i class="ti ti-users"></i>Todos</span>
				<span class="sidebar-filter-count"><?= number_format($totalGeral, 0, ',', '.') ?></span>
			</a>
			<?php foreach ($categoriasSidebar as $c): ?>
				<a class="sidebar-filter-item" href="/artistas/<?= $c['slug'] ?>">
					<span class="sidebar-filter-label"><i class="ti <?= $c['icon'] ?>"></i><?= htmlspecialchars($c['nome']) ?></span>
					<span class="sidebar-filter-count"><?= number_format($c['total'], 0, ',', '.') ?></span>
				</a>
			<?php endforeach; ?>
		</div>

      <!-- Províncias -->
		<div class="sidebar-section">
			<div class="sidebar-section-title">Província</div>
			<a href="?<?= http_build_query(array_merge($_GET, ['provincia' => '', 'pagina' => 1])) ?>" 
			   class="province-item <?= $provincia === '' ? 'active' : '' ?>">
				<span>📍 Todas</span>
				<span style="font-size:10px;color:#bbb;"><?= $total ?></span>
			</a>
			<?php foreach ($provincias as $p): ?>
				<a href="?<?= http_build_query(array_merge($_GET, ['provincia' => $p['provincia'], 'pagina' => 1])) ?>" 
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


    <!-- ── CONTEÚDO PRINCIPAL ── -->
    <main class="page-main">

		<?php if ($artistaDestaque): 
			$fotoDestaque = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $artistaDestaque['art_img_url'] ?? ''));
			$iniciaisDestaque = strtoupper(substr($artistaDestaque['nomeA'], 0, 2));
			//$urlDestaque = 'https://lea.co.ao/artista.php?a=' . base64_encode($artistaDestaque['artID']);
			$urlDestaque = 'http://localhost:8080' . Helper::artistaUrl($artistaDestaque);
			//$urlDestaque = Helper::artistaUrl($artistaDestaque['artID']);
			$anoRegistoDestaque = date('Y', strtotime($artistaDestaque['anoreg']));
		?>
		<!-- ARTISTA DO MÊS — toque extra -->
		<div class="artist-of-month mb-4">
			<div class="aom-avatar" style="background:linear-gradient(135deg,#1D9E75,#2563B0);overflow:hidden;position:relative;">
				<?php if ($fotoDestaque): ?>
					<img src="<?= htmlspecialchars($fotoDestaque) ?>" alt="" 
						 style="width:100%;height:100%;object-fit:cover;object-position:top;position:absolute;top:0;left:0;" 
						 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
					<span style="position:relative;z-index:1;display:none;"><?= $iniciaisDestaque ?></span>
				<?php else: ?>
					<span style="position:relative;z-index:1;"><?= $iniciaisDestaque ?></span>
				<?php endif; ?>
			</div>
			<div style="position:relative;z-index:1;">
				<div class="aom-badge"><i class="ti ti-star-filled"></i> Artista em destaque</div>
				<div class="aom-name"><?= htmlspecialchars($artistaDestaque['nomeA']) ?></div>
				<div class="aom-type">
					<?= htmlspecialchars($artistaDestaque['prof'] ?? '') ?>
					<?= !empty($artistaDestaque['categoria']) ? ' · ' . htmlspecialchars($artistaDestaque['categoria']) : '' ?>
					<?= !empty($artistaDestaque['provincia']) ? ' · ' . htmlspecialchars($artistaDestaque['provincia']) : '' ?>
				</div>
				<div class="aom-stats">
					<div><div class="aom-stat-num"><?= number_format($artistaDestaque['visua'] ?? 0, 0, ',', '.') ?></div><div class="aom-stat-lbl">Visitas</div></div>
					<div><div class="aom-stat-num"><?= number_format($artistaDestaque['fans'] ?? 0, 0, ',', '.') ?></div><div class="aom-stat-lbl">Seguidores</div></div>
					<div><div class="aom-stat-num"><?= $anoRegistoDestaque ?></div><div class="aom-stat-lbl">Registo</div></div>
				</div>
			</div>
			<div class="aom-actions">
				<button class="btn-aom-primary" id="btnSeguir" data-artista-id="<?= $artista['artID'] ?>">
					<i class="ti ti-user-plus"></i> <span id="btnSeguirTexto"><?= $jaSegueDestaque ? 'A seguir' : 'Seguir' ?></span>
				</button>
				<a href="<?= htmlspecialchars($urlDestaque) ?>" class="btn-aom-outline" style="text-decoration:none;display:inline-flex;align-items:center;gap:6px;">
					<i class="ti ti-user"></i> Visitar perfil
				</a>
			</div>
		</div>
		<?php endif; ?>

      <!-- AD leaderboard in-content -->
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

      <!-- ARTISTAS RECÉM ADICIONADOS -->
      <div class="mb-4">
        <div class="sec-hdr">
          <h2>Recém adicionados</h2>
          <a class="sec-link" href="#">Ver todos →</a>
        </div>
        <div class="artists-grid">
			<?php
				$cores = ['linear-gradient(135deg,#1D9E75,#534AB7)','linear-gradient(135deg,#2563B0,#1D9E75)','linear-gradient(135deg,#534AB7,#C07A1A)','linear-gradient(135deg,#3B7DD8,#1A4A8A)','linear-gradient(135deg,#C07A1A,#534AB7)','linear-gradient(135deg,#1A4A8A,#1D9E75)'];
				$j = 0;
				foreach ($artistasRecemAdicionados as $artista):
					$foto = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $artista['art_img_url'] ?? ''));
					$cor = $cores[$j % count($cores)];
					$iniciais = strtoupper(substr($artista['nomeA'], 0, 2));
				?>
					<a class="artist-card" href="http://localhost:8080<?= Helper::artistaUrl($artista) ?>">
						<div class="artist-cover" style="background:<?= $cor ?>;">
							<?php if ($foto): ?>
								<img src="<?= htmlspecialchars($foto) ?>" alt="<?= htmlspecialchars($artista['nomeA']) ?>"
									 onerror="this.style.display='none'">
							<?php endif; ?>
							<div class="cover-overlay"></div>
							<span class="badge-new">Novo</span>
							<span class="cover-initials"><?= $iniciais ?></span>
						</div>
						<div class="artist-body">
							<div class="artist-name"><?= htmlspecialchars($artista['nomeA']) ?></div>
							<div class="artist-type"><?= htmlspecialchars($artista['prof'] ?? '') ?></div>
							<div class="artist-meta">
								<span class="artist-province"><i class="ti ti-map-pin"></i> <?= htmlspecialchars($artista['provincia'] ?? '—') ?></span>
								<span class="artist-views"><i class="ti ti-eye" style="color:var(--lea-muted);"></i> <?= $artista['visua'] ? number_format($artista['visua'], 0, ',', '.') : '—' ?></span>
							</div>
						</div>
					</a>
				<?php $j++; endforeach; ?>
        </div>
      </div>


      <!-- RANKING — MAIS VISITADOS -->
      <div class="row g-4 mb-4">

        <div class="col-lg-6">
			<div class="sec-hdr">
				<h2>👁️ Mais visitados</h2>
				<a class="sec-link" href="#">Ver todos →</a>
			</div>
			<div class="ranking-list">
				<?php
					$cores = ['#1D9E75','#534AB7','#C07A1A','#3B7DD8','#2563B0','#1A4A8A'];
					$classesNum = ['top1', 'top2', 'top3', 'rest', 'rest', 'rest'];
					foreach ($osMaisVisitados as $i => $artista):
						$foto = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $artista['art_img_url'] ?? ''));
						$foto = str_replace(' ', '%20', $foto);
						$iniciais = strtoupper(substr($artista['nomeA'], 0, 2));
						$cor = $cores[$i % count($cores)];
						$classeNum = $classesNum[$i] ?? 'rest';
						$visitas = $artista['visua'] ?? 0;
						$visitasFormatadas = $visitas >= 1000 ? number_format($visitas / 1000, 1, '.', '') . 'k' : $visitas;
				?>
					<a class="ranking-item" href="http://localhost:8080<?= Helper::artistaUrl($artista) ?>">
						<div class="ranking-num <?= $classeNum ?>"><?= $i + 1 ?></div>
						<div class="ranking-avatar" style="background:<?= $cor ?>;">
							<?php if ($foto): ?>
								<img src="<?= htmlspecialchars($foto) ?>" alt="" 
									 onerror="this.style.display='none'">
							<?php endif; ?>
							<span class="av-initials" <?= $foto ? 'style="display:none;"' : '' ?>><?= $iniciais ?></span>
						</div>
						<div>
							<div class="ranking-name"><?= htmlspecialchars($artista['nomeA']) ?></div>
							<div class="ranking-type"><?= htmlspecialchars($artista['prof'] ?? '') ?></div>
						</div>
						<div class="ranking-stat">
							<div class="ranking-stat-num"><?= $visitasFormatadas ?></div>
							<div class="ranking-stat-lbl">visitas</div>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		</div>

        <div class="col-lg-6">
          <div class="sec-hdr">
            <h2>🔎 Mais pesquisados</h2>
            <a class="sec-link" href="#">Ver todos →</a>
          </div>
          <div class="ranking-list">
            <?php
				$cores = ['#1D9E75','#534AB7','#C07A1A','#3B7DD8','#2563B0','#1A4A8A'];
				$classesNum = ['top1', 'top2', 'top3', 'rest', 'rest', 'rest'];
				foreach ($maisPesquisados as $i => $artista):
					$foto = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $artista['art_img_url'] ?? ''));
					$foto = str_replace(' ', '%20', $foto);
					$iniciais = strtoupper(substr($artista['nomeA'], 0, 2));
					$cor = $cores[$i % count($cores)];
					$classeNum = $classesNum[$i] ?? 'rest';
					$total_pesquisas = $artista['total_pesquisas'] ?? 0;
					$total_pesquisasFormatadas = $total_pesquisas >= 1000 ? number_format($total_pesquisas / 1000, 1, '.', '') . 'k' : $total_pesquisas;
				?>
					<a class="ranking-item" href="http://localhost:8080<?= Helper::artistaUrl($artista) ?>">
						<div class="ranking-num <?= $classeNum ?>"><?= $i + 1 ?></div>
						<div class="ranking-avatar" style="background:<?= $cor ?>;">
							<?php if ($foto): ?>
								<img src="<?= htmlspecialchars($foto) ?>" alt="" 
									 onerror="this.style.display='none'">
							<?php endif; ?>
							<span class="av-initials" <?= $foto ? 'style="display:none;"' : '' ?>><?= $iniciais ?></span>
						</div>
						<div>
							<div class="ranking-name"><?= htmlspecialchars($artista['nomeA']) ?></div>
							<div class="ranking-type"><?= htmlspecialchars($artista['prof'] ?? '') ?></div>
						</div>
						<div class="ranking-stat">
							<div class="ranking-stat-num"><?= $total_pesquisasFormatadas ?></div>
							<div class="ranking-stat-lbl">pesquisas</div>
						</div>
					</a>
				<?php endforeach; ?>
          </div>
        </div>

      </div>


      <!-- AD in-content -->
      <div class="mb-4">
        <div class="ann"><i class="ti ti-ad"></i> In-content · Rectangle 468×60</div>
        <div class="ad-strip">
          <span class="ad-pill">Pub</span>
          <div class="ad-strip-thumb" style="background:#1D9E75;">BAI</div>
          <div class="ad-strip-copy">
            <strong>BAI — Conta jovem sem comissões</strong><br>
            <span>Abre a tua conta online em minutos · bai.ao</span>
          </div>
          <button class="btn-lea-sm" style="background:#1D9E75;">Saber mais</button>
        </div>
      </div>
	  
	  
	  <div class="row g-4 mb-4">

        <div class="col-lg-6">
          <div class="sec-hdr">
            <h2>👥 Os Mais Seguidos</h2>
            <a class="sec-link" href="#">Ver todos →</a>
          </div>
          <div class="ranking-list">
            <?php
				$cores = ['#1D9E75','#534AB7','#C07A1A','#3B7DD8','#2563B0','#1A4A8A'];
				$classesNum = ['top1', 'top2', 'top3', 'rest', 'rest', 'rest'];
				foreach ($maisSeguidos as $i => $artista):
					$foto = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $artista['art_img_url'] ?? ''));
					$foto = str_replace(' ', '%20', $foto);
					$iniciais = strtoupper(substr($artista['nomeA'], 0, 2));
					$cor = $cores[$i % count($cores)];
					$classeNum = $classesNum[$i] ?? 'rest';
					$fas = $artista['fans'] ?? 0;
					$fasFormatadas = $fas >= 1000 ? number_format($fas / 1000, 1, '.', '') . 'k' : $fas;
				?>
					<a class="ranking-item" href="http://localhost:8080<?= Helper::artistaUrl($artista) ?>">
						<div class="ranking-num <?= $classeNum ?>"><?= $i + 1 ?></div>
						<div class="ranking-avatar" style="background:<?= $cor ?>;">
							<?php if ($foto): ?>
								<img src="<?= htmlspecialchars($foto) ?>" alt="" 
									 onerror="this.style.display='none'">
							<?php endif; ?>
							<span class="av-initials" <?= $foto ? 'style="display:none;"' : '' ?>><?= $iniciais ?></span>
						</div>
						<div>
							<div class="ranking-name"><?= htmlspecialchars($artista['nomeA']) ?></div>
							<div class="ranking-type"><?= htmlspecialchars($artista['prof'] ?? '') ?></div>
						</div>
						<div class="ranking-stat">
							<div class="ranking-stat-num"><?= $fasFormatadas ?></div>
							<div class="ranking-stat-lbl">fãs</div>
						</div>
					</a>
				<?php endforeach; ?>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="sec-hdr">
            <h2>🏆 Os No Limão</h2>
            <a class="sec-link" href="#">Ver todos →</a>
          </div>
          <div class="ranking-list">
            <?php
				$cores = ['#1D9E75','#534AB7','#C07A1A','#3B7DD8','#2563B0','#1A4A8A'];
				$classesNum = ['top1', 'top2', 'top3', 'rest', 'rest', 'rest'];
				foreach ($maisCurtidos as $i => $artista):
					$foto = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $artista['art_img_url'] ?? ''));
					$foto = str_replace(' ', '%20', $foto);
					$iniciais = strtoupper(substr($artista['nomeA'], 0, 2));
					$cor = $cores[$i % count($cores)];
					$classeNum = $classesNum[$i] ?? 'rest';
					$gostei = $artista['gostei'] ?? 0;
					$gosteiFormatadas = $gostei >= 1000 ? number_format($gostei / 1000, 1, '.', '') . 'k' : $gostei;
				?>
					<a class="ranking-item" href="http://localhost:8080<?= Helper::artistaUrl($artista) ?>">
						<div class="ranking-num <?= $classeNum ?>"><?= $i + 1 ?></div>
						<div class="ranking-avatar" style="background:<?= $cor ?>;">
							<?php if ($foto): ?>
								<img src="<?= htmlspecialchars($foto) ?>" alt="" 
									 onerror="this.style.display='none'">
							<?php endif; ?>
							<span class="av-initials" <?= $foto ? 'style="display:none;"' : '' ?>><?= $iniciais ?></span>
						</div>
						<div>
							<div class="ranking-name"><?= htmlspecialchars($artista['nomeA']) ?></div>
							<div class="ranking-type"><?= htmlspecialchars($artista['prof'] ?? '') ?></div>
						</div>
						<div class="ranking-stat">
							<div class="ranking-stat-num"><?= $gosteiFormatadas ?></div>
							<div class="ranking-stat-lbl">limões</div>
						</div>
					</a>
				<?php endforeach; ?>
          </div>
        </div>

      </div>


      <!-- TODOS OS ARTISTAS — navegação alfabética -->
      <div class="sec-hdr">
        <h2>Todos os artistas</h2>
      </div>
	  
	  <!-- Filtro de província — mobile only -->
	<div class="mobile-only" style="    margin-bottom: 20px; padding:10px 16px;background:var(--lea-white);border-bottom:1px solid var(--lea-border);">
		<select class="filter-select" id="provinciaSelectMobile" style="width:100%;">
			<option value="" <?= $provincia === '' ? 'selected' : '' ?>>📍 Todas as províncias (<?= $total ?>)</option>
			<?php foreach ($provincias as $p): ?>
				<option value="<?= htmlspecialchars($p['provincia']) ?>" <?= $provincia === $p['provincia'] ? 'selected' : '' ?>>
					📍 <?= htmlspecialchars($p['provincia']) ?> (<?= $p['total'] ?>)
				</option>
			<?php endforeach; ?>
		</select>
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

      <!-- Grelha geral -->
      <div class="artists-grid mb-4" id="resultados-artistas">
		<?php
		$cores = ['#1D9E75','#534AB7','#3B7DD8','#C07A1A','#2563B0','#1A4A8A'];
		foreach ($artistas as $i => $artista):
			$foto     = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $artista['art_img_url'] ?? ''));
			$iniciais = strtoupper(substr($artista['nomeA'], 0, 2));
			$cor      = $cores[$i % count($cores)];
			$url      = 'http://localhost:8080' . Helper::artistaUrl($artista);
			$visitas  = !empty($artista['visua']) ? number_format($artista['visua'], 0, ',', '.') : '—';
		?>
			<a class="artist-card" href="<?= htmlspecialchars($url) ?>">
				<div class="artist-cover" style="background:linear-gradient(135deg,<?= $cor ?>,#2563B0);">
					<?php if ($foto): ?>
						<img src="<?= htmlspecialchars($foto) ?>" alt="<?= htmlspecialchars($artista['nomeA']) ?>" onerror="this.style.display='none'">
					<?php endif; ?>
					<div class="cover-overlay"></div>
					<span class="cover-initials"><?= $iniciais ?></span>
				</div>
				<div class="artist-body">
					<div class="artist-name"><?= htmlspecialchars($artista['nomeA']) ?></div>
					<div class="artist-type"><?= htmlspecialchars($artista['prof'] ?? $artista['categoria'] ?? '') ?></div>
					<div class="artist-meta">
						<span class="artist-province"><i class="ti ti-map-pin"></i> <?= htmlspecialchars($artista['provincia'] ?? '—') ?></span>
						<span class="artist-views"><i class="ti ti-eye" style="color:var(--lea-muted);"></i> <?= $visitas ?></span>
					</div>
				</div>
			</a>
		<?php endforeach; ?>
		<?php if (empty($artistas)): ?>
			<div class="pesquisa-empty" style="grid-column:1/-1;">
				<i class="ti ti-users"></i>
				<h2>Nenhum artista encontrado</h2>
			</div>
		<?php endif; ?>
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

    </main>
  </div>
  
<!-- Modal de login necessário -->
<div class="login-necessario-overlay" id="loginNecessarioOverlay">
    <div class="login-necessario-modal">
        <button class="login-necessario-close" id="loginNecessarioClose"><i class="ti ti-x"></i></button>
        <div class="login-necessario-icon"><i class="ti ti-lock"></i></div>
        <h3 class="login-necessario-titulo">Inicia sessão para continuar</h3>
        <p class="login-necessario-texto">Precisas de ter uma conta LEA para seguir artistas e acompanhar as novidades deles.</p>
        <a href="http://localhost:8080/nasocial/login/login.php" class="login-necessario-btn">Iniciar sessão</a>
    </div>
</div>
  
<script>
	document.getElementById('provinciaSelectMobile')?.addEventListener('change', function() {
	document.getElementById('provinciaSelectMobile')?.addEventListener('change', function() {
		sessionStorage.setItem('scrollParaResultados', '1');
		const url = new URL(window.location);
		url.searchParams.set('provincia', this.value);
		url.searchParams.set('pagina', 1);
		window.location = url;
	});
</script>
  
<script>
(function() {
    const resultados = document.getElementById('resultados-artistas');
    if (!resultados) return;

    if (sessionStorage.getItem('scrollParaResultados') === '1') {
        sessionStorage.removeItem('scrollParaResultados');
        setTimeout(() => {
            resultados.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }, 150);
    }

    document.querySelectorAll('.alpha-btn, .alpha-btn-tds, .province-item, .page-btn').forEach(link => {
        link.addEventListener('click', function() {
            sessionStorage.setItem('scrollParaResultados', '1');
        });
    });

    document.getElementById('provinciaSelectMobile')?.addEventListener('change', function() {
        sessionStorage.setItem('scrollParaResultados', '1');
        const url = new URL(window.location);
        url.searchParams.set('provincia', this.value);
        url.searchParams.set('pagina', 1);
        window.location = url;
    });
})();
</script>

<script>
	document.getElementById('btnSeguir')?.addEventListener('click', function() 
	{
		const btn = this;
		const artistaId = btn.dataset.artistaId;

		fetch('/artista/seguir', {
			method: 'POST',
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
			body: 'artista_id=' + encodeURIComponent(artistaId)
		})
		.then(res => res.json())
		.then(data => {
			if (!data.logado) {
				if (!data.logado) {
					document.getElementById('loginNecessarioOverlay').classList.add('active');
					return;
				}
				return;
			}
			document.getElementById('btnSeguirTexto').textContent = data.aSeguir ? 'A seguir' : 'Seguir';
			const statNum = document.querySelector('.aom-stats > div:nth-child(2) .aom-stat-num');
			if (statNum) statNum.textContent = data.fans.toLocaleString('pt-PT');
		})
		.catch(err => console.error(err));
	});

	document.getElementById('loginNecessarioClose')?.addEventListener('click', function() {
		document.getElementById('loginNecessarioOverlay').classList.remove('active');
	});
	
	document.getElementById('loginNecessarioOverlay')?.addEventListener('click', function(e) {
		if (e.target === this) this.classList.remove('active');
	});
</script>


