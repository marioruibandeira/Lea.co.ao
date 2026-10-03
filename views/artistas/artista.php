<!-- =============================================
	CAPA DO ARTISTA
	============================================= -->
<?php
	$foto = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $artista['art_img_url'] ?? ''));
	$foto = str_replace(' ', '%20', $foto);
	$iniciais = strtoupper(substr($artista['nomeA'], 0, 2));
	$anoreg = !empty($artista['anoreg']) ? date('Y', strtotime($artista['anoreg'])) : '';
?>

<div class="artist-cover">
	<img class="artist-cover-bg" src="<?= htmlspecialchars($foto) ?>" alt="<?= htmlspecialchars($artista['nomeA']) ?>" onerror="this.style.display='none'">
	<div class="artist-cover-gradient"></div>
	<div class="artist-cover-body">
		<div class="artist-avatar-cover">
			<?php if ($foto): ?>
				<img src="<?= htmlspecialchars($foto) ?>" alt="<?= $iniciais ?>" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
				<span style="display:none;"><?= $iniciais ?></span>
			<?php else: ?>
				<span><?= $iniciais ?></span>
			<?php endif; ?>
		</div>
		<div class="artist-cover-info">
			<div class="artist-cover-badges">
				<span class="badge-cat">
					<i class="ti ti-music" style="font-size:10px;"></i>
					<?= htmlspecialchars($artista['categoria_artista'] ?? '') ?>
				</span>
				<?php if (!empty($artista['statu']) && $artista['statu'] === 'verificado'): ?>
					<span class="badge-verified">
						<i class="ti ti-rosette-discount-check" style="font-size:10px;"></i> Verificado
					</span>
				<?php endif; ?>
			</div>
			<div class="artist-name-cover"><?= htmlspecialchars($artista['nomeA']) ?></div>
			<div class="artist-meta-cover">
				<?php if (!empty($artista['provincia'])): ?>
					<span><i class="ti ti-map-pin"></i> <?= htmlspecialchars($artista['provincia']) ?>, Angola</span>
				<?php endif; ?>
				<?php if (!empty($artista['actua'])): ?>
					<span><i class="ti ti-music"></i> <?= htmlspecialchars($artista['actua']) ?></span>
				<?php endif; ?>
				<?php if (!empty($anoreg)): ?>
					<span><i class="ti ti-calendar"></i> Desde <?= $anoreg ?></span>
				<?php endif; ?>
			</div>
		</div>
		<div class="artist-cover-actions">
			<button class="btn-seguir-toggle <?= $jaSegueDestaque ? 'btn-aom-primary' : 'btn-primary' ?>" id="btnSeguir" data-artista-id="<?= $artista['artID'] ?>">
				<i class="ti ti-user-plus"></i> <span class="btn-seguir-texto"><?= $jaSegueDestaque ? 'A seguir' : 'Seguir' ?></span>
			</button>
			<button class="btn-curtir-toggle btn-secondary" data-artista-id="<?= $artista['artID'] ?>">
				<i class="ti ti-heart<?= $jaCurtiuDestaque ? '-filled' : '' ?>" style="<?= $jaCurtiuDestaque ? 'color:#e11d48;' : '' ?>"></i> No Limão
			</button>
			<div class="share-menu-wrapper" style="position:relative;display:inline-block;">
				<button class="btn-secondary btn-share-toggle" data-url="<?= htmlspecialchars($seoCanonical) ?>" data-nome="<?= htmlspecialchars($artista['nomeA'], ENT_QUOTES) ?>">
					<i class="ti ti-share"></i> Partilhar
				</button>
				<div class="share-menu" style="display:none;position:absolute;top:110%;left:0;background:#fff;border:1px solid var(--border);border-radius:10px;box-shadow:0 8px 24px rgba(0,0,0,0.12);padding:6px;z-index:50;min-width:180px;">
					<a href="#" class="share-opt" data-rede="facebook" style="display:flex;align-items:center;gap:8px;padding:8px 10px;font-size:13px;color:var(--text);text-decoration:none;border-radius:6px;">
						<i class="ti ti-brand-facebook" style="color:#1877F2;"></i> Facebook
					</a>
					<a href="#" class="share-opt" data-rede="whatsapp" style="display:flex;align-items:center;gap:8px;padding:8px 10px;font-size:13px;color:var(--text);text-decoration:none;border-radius:6px;">
						<i class="ti ti-brand-whatsapp" style="color:#25D366;"></i> WhatsApp
					</a>
					<a href="#" class="share-opt" data-rede="x" style="display:flex;align-items:center;gap:8px;padding:8px 10px;font-size:13px;color:var(--text);text-decoration:none;border-radius:6px;">
						<i class="ti ti-brand-x" style="color:#000;"></i> X (Twitter)
					</a>
					<a href="#" class="share-opt" data-rede="copiar" style="display:flex;align-items:center;gap:8px;padding:8px 10px;font-size:13px;color:var(--text);text-decoration:none;border-radius:6px;">
						<i class="ti ti-copy"></i> Copiar link
					</a>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- =============================================
	STATS BAR
	============================================= -->
<div class="stats-bar">
    <?php
		$visitas = $artista['visua'] ?? 0;
		$fans = $artista['fans'] ?? 0;
		$gostei = $artista['gostei'] ?? 0;
		$totalPesquisas = $totalPesquisas ?? 0;

		function formatarNumero(int $num): array {
			if ($num >= 1000000) {
				$inteiro  = floor($num / 1000000);
				$decimal  = '.' . (int)(($num % 1000000) / 100000) . 'M';
			} elseif ($num >= 1000) {
				$inteiro  = floor($num / 1000);
				$decimal  = '.' . (int)(($num % 1000) / 100) . 'k';
			} else {
				$inteiro  = $num;
				$decimal  = '';
			}
			// Remove ".0k" ou ".0M" — fica só "k" ou "M"
			$decimal = str_replace(['.0k','.0M'], ['k','M'], $decimal);
			return ['inteiro' => $inteiro, 'decimal' => $decimal];
		}

		$v = formatarNumero($visitas);
		$f = formatarNumero($fans);
		$g = formatarNumero($gostei);
		$p = formatarNumero($totalPesquisas);
	?>
	<div class="stat-bar-item">
		<div class="stat-bar-num"><?= $v['inteiro'] ?><span><?= $v['decimal'] ?></span></div>
		<div class="stat-bar-lbl">Visitas</div>
	</div>
	<!--Seguidores-->
    <div class="stat-bar-item">
		<div class="stat-bar-num"><?= $f['inteiro'] ?><span><?= $f['decimal'] ?></span></div>
		<div class="stat-bar-lbl">Seguidores</div>
    </div>
	<div class="stat-bar-item">
		<div class="stat-bar-num" id="statNoLimao"><?= $g['inteiro'] ?><span><?= $g['decimal'] ?></span></div>
		<div class="stat-bar-lbl">No Limão</div>
	</div>
    <div class="stat-bar-item">
		<div class="stat-bar-num"><?= $p['inteiro'] ?><span><?= $p['decimal'] ?></span></div>
		<div class="stat-bar-lbl">Pesquisas</div>
    </div>
    <?php if (!empty($statExtra)): ?>
		<div class="stat-bar-item">
			<div class="stat-bar-num"><?= $statExtra['total'] ?></div>
			<div class="stat-bar-lbl"><?= $statExtra['label'] ?></div>
		</div>
	<?php endif; ?>
    <div class="stat-bar-item">
		<div class="stat-bar-num">#<span><?= $ranking ?></span></div>
		<div class="stat-bar-lbl">Ranking</div>
    </div>
</div>

<!-- =============================================
	BOTÕES MOBILE (abaixo da capa)
	============================================= -->
<div class="mobile-follow-bar">
    <button class="btn-seguir-toggle btn-primary" data-artista-id="<?= $artista['artID'] ?>" style="flex:1;justify-content:center;">
		<i class="ti ti-user-plus"></i> <span class="btn-seguir-texto"><?= $jaSegueDestaque ? 'A seguir' : 'Seguir' ?></span>
	</button>
    <button class="btn-icon-round btn-share-toggle" data-url="<?= htmlspecialchars($seoCanonical) ?>" data-nome="<?= htmlspecialchars($artista['nomeA'], ENT_QUOTES) ?>" style="background:var(--surface);border:1px solid var(--border);position:relative;">
		<i class="ti ti-share" style="font-size:16px;color:var(--muted);"></i>
	</button>
    <button class="btn-curtir-toggle btn-icon-round" data-artista-id="<?= $artista['artID'] ?>" style="background:var(--surface);border:1px solid var(--border);">
		<i class="ti ti-heart<?= $jaCurtiuDestaque ? '-filled' : '' ?>" style="font-size:16px;<?= $jaCurtiuDestaque ? 'color:#e11d48;' : 'color:var(--muted);' ?>"></i>
	</button>
</div>

<!-- =============================================
	ABAS
	============================================= -->
<div class="profile-tabs-wrapper">

    <button class="tabs-nav tabs-prev" type="button" aria-label="Ver tabs anteriores">
        <i class="ti ti-chevron-left"></i>
    </button>

    <div class="profile-tabs" id="profileTabs">
        <?php if ($temBio): ?>
			<a class="profile-tab active" data-tab="bio">
				<i class="ti ti-info-circle"></i> Biografia
			</a>
		<?php endif; ?>

        <?php if ($temMusicas): ?>
			<a class="profile-tab<?= !$temBio ? ' active' : '' ?>" data-tab="musicas">
				<i class="ti ti-music"></i> Músicas
			</a>
		<?php endif; ?>

        <?php if ($temLetras): ?>
			<a class="profile-tab" data-tab="letras">
				<i class="ti ti-file-music"></i> Letras
			</a>
		<?php endif; ?>
		<?php if ($temVideos): ?>
			<a class="profile-tab" data-tab="videos">
				<i class="ti ti-video"></i> Vídeos
			</a>
		<?php endif; ?>
		<?php if ($temAlbuns): ?>
			<a class="profile-tab" data-tab="albums">
				<i class="ti ti-disc"></i> Álbuns
			</a>
		<?php endif; ?>
		<?php if ($temParticipacoes): ?>
        <a class="profile-tab" data-tab="participacoes">
            <i class="ti ti-users-group"></i> Participações
        </a>
		<?php endif; ?>
        <!-- Audiovisual -->
		<?php if ($temFilmes): ?>
        <a class="profile-tab" data-tab="filmes">
            <i class="ti ti-movie"></i> Filmes
        </a>
		<?php endif; ?>
		<?php if ($temDocumentarios): ?>
        <a class="profile-tab" data-tab="documentarios">
            <i class="ti ti-camera"></i> Documentários
        </a>
		<?php endif; ?>
		<?php if ($temNovelas): ?>
        <a class="profile-tab" data-tab="novelas">
            <i class="ti ti-device-tv"></i> Novelas
        </a>
		<?php endif; ?>
		<?php if ($temSeries): ?>
        <a class="profile-tab" data-tab="series">
            <i class="ti ti-device-tv-old"></i> Séries
        </a>
		<?php endif; ?>
		<?php if ($temPublicidades): ?>
        <a class="profile-tab" data-tab="publicidades">
            <i class="ti ti-ad"></i> Publicidades
        </a>
		<?php endif; ?>
        <!-- Literatura -->
		<?php if ($temLivros): ?>
        <a class="profile-tab" data-tab="livros">
            <i class="ti ti-book-2"></i> Livros
        </a>
		<?php endif; ?>
		<?php if ($temPoemas): ?>
        <a class="profile-tab" data-tab="poemas">
            <i class="ti ti-feather"></i> Poemas
        </a>
		<?php endif; ?>
		<?php if ($temDizeres): ?>
        <a class="profile-tab" data-tab="dizeres">
            <i class="ti ti-quote"></i> Dizeres
        </a>
		<?php endif; ?>
        <!-- Artes Visuais -->
		<?php if ($temArtesPlasticas): ?>
        <a class="profile-tab" data-tab="quadros">
            <i class="ti ti-frame"></i> Quadros
        </a>
		<?php endif; ?>
		<?php if ($temOrnamentos): ?>
        <a class="profile-tab" data-tab="ornamentos">
            <i class="ti ti-diamond"></i> Ornamentos
        </a>
		<?php endif; ?>
        <!-- Vídeo Jogos -->
		<?php if ($temVideojogos): ?>
        <a class="profile-tab" data-tab="jogos">
            <i class="ti ti-device-gamepad-2"></i> Jogos
        </a>
		<?php endif; ?>
        <!-- Gerais -->
		<?php if ($temFotoAlbum): ?>
        <a class="profile-tab" data-tab="galeria">
            <i class="ti ti-photo"></i> Galeria
        </a>
		<?php endif; ?>
		<?php if ($temAgenda): ?>
        <a class="profile-tab" data-tab="eventos">
            <i class="ti ti-calendar-event"></i> Eventos
        </a>
		<?php endif; ?>
		<?php if ($temPremios): ?>
        <a class="profile-tab" data-tab="premios">
			<i class="ti ti-award"></i> Prémios e distinções
        </a>
		<?php endif; ?>
		<?php if ($temImprensa): ?>
        <a class="profile-tab" data-tab="imprensa"> 
            <i class="ti ti-news"></i> Imprensa
        </a>
		<?php endif; ?>
    </div>

    <button class="tabs-nav tabs-next" type="button" aria-label="Ver próximas tabs">
        <i class="ti ti-chevron-right"></i>
    </button>

</div>

<!-- =============================================
	CONTEÚDO PRINCIPAL
	============================================= -->
<div class="profile-wrap">
	<!-- MAIN -->
    <main class="profile-main">
		
		<!-- =============================================
					 CARTÃO DE DADOS PESSOAIS (toggle)					 
			============================================= -->
		<?php require __DIR__ . '/partials/tab-dados-pessoais.php'; ?>
				
		<!-- CORPO DO ARTIGO -->
		<div class="article-body" id="articleBody">

			<!-- ── TAB: BIOGRAFIA ── -->
			<?php if ($temBio): require __DIR__ . '/partials/tab-bio.php'; endif; ?>
			<!-- /tab-bio --> 

			<!-- ── TAB: LETRAS ── -->
			<?php if ($temLetras): require __DIR__ . '/partials/tab-letras.php'; endif; ?>
			<!-- /tab-letras -->

			<!-- ── TAB: MÚSICAS ── -->
			<?php if ($temMusicas): require __DIR__ . '/partials/tab-musicas.php'; endif; ?>
			<!-- /tab-musicas -->

			<!-- ── TAB: ÁLBUNS ── -->
			<?php if ($temLetras): require __DIR__ . '/partials/tab-discografia.php'; endif; ?>
			<!-- /tab-albums -->

			<!-- ── TAB: PARTICIPAÇÕES ── -->
			<?php if ($temParticipacoes): require __DIR__ . '/partials/tab-participacao.php'; endif; ?>
			<!-- /tab-participacoes -->

			<!-- ── TAB: VÍDEOS ── -->
			<?php if ($temVideos): require __DIR__ . '/partials/tab-videos.php'; endif; ?>
			<!-- /tab-videos -->

			<!-- ── TAB: FILMES ── -->
			<?php if ($temFilmes): require __DIR__ . '/partials/tab-filmes.php'; endif; ?>
			<!-- /tab-filmes -->

			<!-- ── TAB: NOVELAS ── -->
			<?php if ($temNovelas): require __DIR__ . '/partials/tab-novelas.php'; endif; ?>
			<!-- /tab-novelas -->

			<!-- ── TAB: SÉRIES ── -->
			<?php if ($temSeries): require __DIR__ . '/partials/tab-series.php'; endif; ?>
			<!-- /tab-series -->

			<!-- ── TAB: DOCUMENTÁRIOS ── -->
			<?php if ($temDocumentarios): require __DIR__ . '/partials/tab-documentarios.php'; endif; ?>
			<!-- /tab-documentarios -->

			<!-- ── TAB: PUBLICIDADES ── -->
			<?php if ($temPublicidades): require __DIR__ . '/partials/tab-publicidades.php'; endif; ?>
			<!-- /tab-publicidades -->

			<!-- ── TAB: GALERIA ── -->
			<?php if ($temFotoAlbum): require __DIR__ . '/partials/tab-galeria.php'; endif; ?>
			<!-- /tab-galeria -->

			<!-- ── TAB: EVENTOS ── -->
			<?php if ($temAgenda): require __DIR__ . '/partials/tab-agenda.php'; endif; ?>
			<!-- /tab-eventos -->

			<!-- ── TAB: LIVROS ── -->	
			<?php if ($temLivros): require __DIR__ . '/partials/tab-livros.php'; endif; ?>
			<!-- /tab-livros -->

			<!-- ── TAB: POEMAS ── -->
			<?php if ($temPoemas): require __DIR__ . '/partials/tab-poemas.php'; endif; ?>
			<!-- /tab-poemas -->
		
			<!-- ── TAB: DIZERES ── --> 
			<?php if ($temDizeres): require __DIR__ . '/partials/tab-dizeres.php'; endif; ?>
			<!-- /tab-dizeres -->

			<!-- ── TAB: IMPRENSA (Artigos) ── -->
			<?php if ($temImprensa): require __DIR__ . '/partials/tab-noticia.php'; endif; ?>
			<!-- /tab-imprensa -->

			<!-- ── TAB: JOGOS ── -->
			<?php if ($temVideojogos): require __DIR__ . '/partials/tab-jogos.php'; endif; ?>
			<!-- /tab-jogos -->

			<!-- ── TAB: QUADROS ── -->
			<?php if ($temArtesPlasticas): require __DIR__ . '/partials/tab-quadros.php'; endif; ?>
			<!-- /tab-quadros -->

			<!-- ── TAB: ORNAMENTOS ── -->
			<?php if ($temOrnamentos): require __DIR__ . '/partials/tab-ornamentos.php'; endif; ?>
			<!-- /tab-ornamentos -->

			<!-- ── TAB: PRÉMIOS ── -->
			<?php if ($temPremios): require __DIR__ . '/partials/tab-premios.php'; endif; ?>
			<!-- /tab-premios -->

    </main>


    <!-- SIDEBAR -->
    <aside class="profile-sidebar">

		<!-- AD 300×250 -->
		<div>
			<div class="ann"><i class="ti ti-ad"></i> 300 × 250 · AdSense</div>
			<div class="ad-placeholder" style="min-height:140px;">
				<i class="ti ti-ad" style="font-size:26px;color:#c0cfe8;"></i>
				<div class="ad-size">300 × 250</div>
				<div class="ad-type">Medium Rectangle</div>
			</div>
		</div>

		<!-- Próximo evento -->
		<div class="sidebar-card">
			<div class="sidebar-card-header">
			  <i class="ti ti-calendar-event"></i>
			  <h3>Próximo evento</h3>
			</div>
			<div class="sidebar-event">
				<div class="sidebar-event-label">19 Jul 2026 · 21:00</div>
				<div class="sidebar-event-title">Noite de Kizomba</div>
				<div class="sidebar-event-loc"><i class="ti ti-map-pin" style="font-size:12px;color:var(--lea-blue);"></i> Hotel Presidente · Luanda</div>
				<a href="loja.html#ingressos" class="sidebar-buy-btn">Comprar ingresso · Kz 7.500</a>
			</div>
		</div>

		<!-- Artistas relacionados -->
		<div class="sidebar-card">
			<div class="sidebar-card-header">
				<i class="ti ti-users"></i>
				<h3>Artistas relacionados</h3>
			</div>
			<div class="related-item">
				<div class="rel-avatar" style="background:#534AB7;">
					<img src="https://lea.co.ao/artistas/imgs/Nair Nany.jpg" alt="" onerror="this.style.display='none'">NN
				</div>
				<div class="rel-info"><div class="rel-name">Nair Nany</div><div class="rel-type">Cantora · Semba</div></div>
				<button class="rel-follow-btn">Seguir</button>
			</div>
        <div class="related-item">
          <div class="rel-avatar" style="background:#1D9E75;">
            <img src="https://lea.co.ao/artistas/imgs/Anderson-Mario.jpg" alt="" onerror="this.style.display='none'">AM
          </div>
          <div class="rel-info"><div class="rel-name">Anderson Mário</div><div class="rel-type">Cantor · Afrohouse</div></div>
          <button class="rel-follow-btn">Seguir</button>
        </div>
        <div class="related-item">
          <div class="rel-avatar" style="background:#C07A1A;">
            <img src="https://lea.co.ao/artistas/imgs/Prodigio_na_lea.jpg" alt="" onerror="this.style.display='none'">PR
          </div>
          <div class="rel-info"><div class="rel-name">Prodígio</div><div class="rel-type">Cantor · Rap</div></div>
          <button class="rel-follow-btn">Seguir</button>
        </div>
        <div class="related-item">
          <div class="rel-avatar" style="background:#9D174D;">
            <img src="https://lea.co.ao/artistas/imgs/Titica_na_lea.jpg" alt="" onerror="this.style.display='none'">TT
          </div>
          <div class="rel-info"><div class="rel-name">Titica</div><div class="rel-type">Cantora · Kuduro</div></div>
          <button class="rel-follow-btn">Seguir</button>
        </div>
        <div class="related-item">
          <div class="rel-avatar" style="background:#3B7DD8;">
            <img src="https://lea.co.ao/artistas/imgs/Deezy-na-lea.jpg" alt="" onerror="this.style.display='none'">DZ
          </div>
          <div class="rel-info"><div class="rel-name">Deezy</div><div class="rel-type">Cantor · Rap</div></div>
          <button class="rel-follow-btn">Seguir</button>
        </div>
      </div>

      <!-- AD nativo sidebar -->
      <div>
        <div class="ann"><i class="ti ti-ad"></i> Nativo sidebar</div>
        <div class="sidebar-ad">
          <div class="sidebar-ad-img" style="background:#1D9E75;">BAI — Conta jovem</div>
          <div class="sidebar-ad-body">
            <span class="ad-pill" style="display:inline-block;margin-bottom:6px;">Pub</span>
            <div class="sidebar-ad-title">Abre a tua conta sem comissões · bai.ao</div>
            <a href="#" class="sidebar-ad-link">Saber mais →</a>
          </div>
        </div>
      </div>

    </aside>
	
	<!-- =============================================
     SECÇÃO: FONTES
     Depende de: fontes.css
     Nota: lista de REFERÊNCIAS — os materiais concretos
     usados para compor este perfil (entrevistas com o
     próprio artista, artigos, comunicados de editora,
     etc.), ao estilo de bibliografia/notas de rodapé.
     Cada fonte indica o TIPO de origem (o próprio artista
     vs. terceiros), o nome do material e, quando aplicável,
     data e link. Fica discreta, junto ao rodapé.
     ============================================= -->
<section class="sources-section">
	<div class="sources-inner">

		<div class="sources-hdr">
		  <i class="ti ti-notebook"></i>
		  <h3>Referência deste perfil</h3>
		</div>
		<p class="sources-intro">
		  As informações apresentadas neste perfil foram reunidas a partir dos seguintes materiais:
		</p>

		<ol class="sources-list">
			<?php foreach ($referencias as $r): ?>
				<li class="source-item">
					<span class="source-type source-type-artist"><?= htmlspecialchars($r['referencia']) ?></span>
					<div class="source-info">
						<a href="<?= htmlspecialchars($r['link']) ?>">
							<span class="source-name"><?= htmlspecialchars($r['descricao']) ?></span>
						</a>
						<span class="source-date"><?= htmlspecialchars($r['ano']) ?></span>
					</div>
				</li>
			<?php endforeach; ?>
		</ol>

		<div class="sources-note">
			<i class="ti ti-alert-circle"></i>
			Encontraste uma informação desatualizada ou incorreta? <a href="#">Reporta aqui</a>.
		</div>
	</div>
</section>

</div><!-- /profile-wrap -->
  
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
  
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/menu.footer.js"></script>
  
  <script>
    // ── Tabs ──
    const TABS = [
        'bio','musicas','letras','videos','albums','participacoes',
        'filmes','documentarios','novelas','series','publicidades',
        'livros','poemas','dizeres','jogos','quadros','ornamentos',
        'galeria','eventos','premios','imprensa'
    ];
    function switchTab(name) {
        TABS.forEach(id => {
            const el = document.getElementById('tab-' + id);
            if (el) el.style.display = id === name ? 'block' : 'none';
        });
        document.querySelectorAll('.profile-tab').forEach(t => {
            t.classList.toggle('active', t.dataset.tab === name);
        });
        const tabsTop = document.getElementById('profileTabs').getBoundingClientRect().top + window.scrollY - 60;
        window.scrollTo({ top: tabsTop, behavior: 'smooth' });
    }
    document.querySelectorAll('.profile-tab').forEach(tab => {
        tab.addEventListener('click', e => { e.preventDefault(); switchTab(tab.dataset.tab); });
    });
	
	//barra em cima que cresce com o scroll
	// Barra de progresso de leitura
    window.addEventListener('scroll', () => {
      const article = document.getElementById('articleBody');
      if (!article) return;
      const articleTop = article.offsetTop;
      const articleHeight = article.offsetHeight;
      const scrolled = window.scrollY - articleTop + window.innerHeight;
      const pct = Math.min(100, Math.max(0, (scrolled / articleHeight) * 100));
      document.getElementById('readProgress').style.width = pct + '%';
    });

  </script>
  
<script>
	document.querySelectorAll('.btn-seguir-toggle').forEach(btn => {
		btn.addEventListener('click', function() {
			const artistaId = this.dataset.artistaId;

			fetch('/artista/seguir', {
				method: 'POST',
				headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
				body: 'artista_id=' + encodeURIComponent(artistaId)
			})
			.then(res => res.json())
			.then(data => {
				if (!data.logado) {
					document.getElementById('loginNecessarioOverlay').classList.add('active');
					return;
				}

				// Atualiza TODOS os botões de seguir desta página (desktop + mobile)
				document.querySelectorAll('.btn-seguir-toggle').forEach(b => {
					b.querySelector('.btn-seguir-texto').textContent = data.aSeguir ? 'A seguir' : 'Seguir';
					b.classList.toggle('btn-aom-primary', data.aSeguir);
					b.classList.toggle('btn-primary', !data.aSeguir);
				});

				// Atualizar contador de Seguidores na stats-bar
				const statNum = document.querySelectorAll('.stat-bar-item .stat-bar-num')[1];
				if (statNum) statNum.textContent = data.fans.toLocaleString('pt-PT');
			})
			.catch(err => console.error(err));
		});
	});

	document.getElementById('loginNecessarioClose')?.addEventListener('click', function() {
		document.getElementById('loginNecessarioOverlay').classList.remove('active');
	});

	document.getElementById('loginNecessarioOverlay')?.addEventListener('click', function(e) {
		if (e.target === this) this.classList.remove('active');
	});
</script>

<script>
function formatarNumeroJS(num) {
    let inteiro, decimal;
    if (num >= 1000000) {
        inteiro = Math.floor(num / 1000000);
        decimal = '.' + Math.floor((num % 1000000) / 100000) + 'M';
    } else if (num >= 1000) {
        inteiro = Math.floor(num / 1000);
        decimal = '.' + Math.floor((num % 1000) / 100) + 'k';
    } else {
        inteiro = num;
        decimal = '';
    }
    decimal = decimal.replace('.0k', 'k').replace('.0M', 'M');
    return { inteiro, decimal };
}

document.querySelectorAll('.btn-curtir-toggle').forEach(btn => {
    btn.addEventListener('click', function() {
        const artistaId = this.dataset.artistaId;

        fetch('/artista/curtir', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'artista_id=' + encodeURIComponent(artistaId)
        })
        .then(res => res.json())
        .then(data => {
            if (!data.logado) {
                document.getElementById('loginNecessarioOverlay').classList.add('active');
                return;
            }

            document.querySelectorAll('.btn-curtir-toggle').forEach(b => {
                const i = b.querySelector('i');
                if (data.aCurtir) {
                    i.classList.remove('ti-heart');
                    i.classList.add('ti-heart-filled');
                    i.style.color = '#e11d48';
                } else {
                    i.classList.remove('ti-heart-filled');
                    i.classList.add('ti-heart');
                    i.style.color = b.classList.contains('btn-icon-round') ? 'var(--muted)' : '';
                }
            });

            const f = formatarNumeroJS(data.gostei);
            const statNoLimao = document.getElementById('statNoLimao');
            if (statNoLimao) statNoLimao.innerHTML = f.inteiro + (f.decimal ? '<span>' + f.decimal + '</span>' : '');
        })
        .catch(err => console.error(err));
    });
});

// ── Partilhar ──
document.querySelectorAll('.btn-share-toggle').forEach(btn => {
    btn.addEventListener('click', function(e) {
        e.stopPropagation();
        const url = this.dataset.url;
        const nome = this.dataset.nome;

        // Mobile com suporte nativo — prioriza o menu do sistema
        if (navigator.share) {
            navigator.share({ title: nome + ' — LEA Angola', url: url }).catch(() => {});
            return;
        }

        // Desktop — mostra o dropdown
        const menu = this.nextElementSibling;
        if (!menu || !menu.classList.contains('share-menu')) return;
        document.querySelectorAll('.share-menu').forEach(m => { if (m !== menu) m.style.display = 'none'; });
        menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
    });
});

document.querySelectorAll('.share-opt').forEach(opt => {
    opt.addEventListener('click', function(e) {
        e.preventDefault();
        const wrapper = this.closest('.share-menu-wrapper');
        const url = wrapper.querySelector('.btn-share-toggle').dataset.url;
        const rede = this.dataset.rede;

        const links = {
            facebook: 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(url),
            whatsapp: 'https://wa.me/?text=' + encodeURIComponent(url),
            x: 'https://twitter.com/intent/tweet?url=' + encodeURIComponent(url),
        };

        if (rede === 'copiar') {
            navigator.clipboard.writeText(url).then(() => alert('Link copiado!'));
        } else {
            window.open(links[rede], '_blank', 'width=600,height=500');
        }

        this.closest('.share-menu').style.display = 'none';
    });
});

// Fecha o menu ao clicar fora
document.addEventListener('click', () => {
    document.querySelectorAll('.share-menu').forEach(m => m.style.display = 'none');
});














// 
// 
// 
// 
// SCROLL NAS ARTES

const tabsContainer = document.getElementById('profileTabs');
const tabsPrev = document.querySelector('.tabs-prev');
const tabsNext = document.querySelector('.tabs-next');

function atualizarNavegacaoTabs() {
    if (!tabsContainer || !tabsPrev || !tabsNext) return;

    // Mobile: scroll manual, sem botões
    if (window.innerWidth <= 768) {
        tabsPrev.style.display = 'none';
        tabsNext.style.display = 'none';
        return;
    }

    const temOverflow =
        tabsContainer.scrollWidth > tabsContainer.clientWidth + 1;

    // Se todas as tabs couberem, não mostrar os botões
    if (!temOverflow) {
        tabsPrev.style.display = 'none';
        tabsNext.style.display = 'none';
        return;
    }

    tabsPrev.style.display = 'flex';
    tabsNext.style.display = 'flex';

    const chegouInicio = tabsContainer.scrollLeft <= 1;

    const chegouFim =
        tabsContainer.scrollLeft + tabsContainer.clientWidth >=
        tabsContainer.scrollWidth - 1;

    tabsPrev.disabled = chegouInicio;
    tabsNext.disabled = chegouFim;
}

tabsPrev.addEventListener('click', () => {
    tabsContainer.scrollBy({
        left: -300,
        behavior: 'smooth'
    });
});

tabsNext.addEventListener('click', () => {
    tabsContainer.scrollBy({
        left: 300,
        behavior: 'smooth'
    });
});

tabsContainer.addEventListener('scroll', atualizarNavegacaoTabs);

window.addEventListener('resize', atualizarNavegacaoTabs);

window.addEventListener('load', atualizarNavegacaoTabs);



</script>

<script>
document.getElementById('btnTogglePInfo')?.addEventListener('click', function() {
    const card = document.getElementById('pinfoCard');
    card.classList.toggle('collapsed');
    this.classList.toggle('collapsed');
});
</script>





<script>
//SCRIPT DO MODAL DA BIOGRAFIA
document.getElementById('btnLerBioCompleta')?.addEventListener('click', function() {
    document.getElementById('bioModalOverlay').classList.add('active');
});
document.getElementById('bioModalClose')?.addEventListener('click', function() {
    document.getElementById('bioModalOverlay').classList.remove('active');
});
document.getElementById('bioModalOverlay')?.addEventListener('click', function(e) {
    if (e.target === this) this.classList.remove('active');
});
</script>

<!--
Jacco van der Putten
Corporate Recruiter
Tel.  +31 (0)20-49 39 000
Mob. +31 (0)6-38 50 96 23

923 862 937 - Chavier
-->

</body>
</html>


