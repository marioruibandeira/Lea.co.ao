<!DOCTYPE html>
<html lang="pt" prefix="og: https://ogp.me/ns#">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- ============================================================
         SEO BÁSICO
         ============================================================ -->
    <title><?= htmlspecialchars($seoTitulo ?? 'LEA — Plataforma Angolana de Artes') ?></title>
    <meta name="description" content="<?= htmlspecialchars($seoDescricao ?? 'Descobre artistas, músicas, literatura, cinema e muito mais. A maior plataforma de cultura angolana — música, literatura, cinema, fotografia e artes visuais.') ?>">
    <meta name="keywords" content="<?= htmlspecialchars($seoKeywords ?? 'artistas angolanos, música angola, cultura angola, literatura angolana, cinema angola, kuduro, semba, kizomba, lea angola') ?>">
    <meta name="author" content="LEA — Plataforma Angolana de Artes">
    <meta name="robots" content="<?= $seoRobots ?? 'index, follow' ?>">
    <link rel="canonical" href="<?= $seoCanonical ?? 'https://lea.co.ao' . ($_SERVER['REQUEST_URI'] ?? '/') ?>">

    <!-- ============================================================
         GEO — Posicionamento geográfico Angola
         ============================================================ -->
    <meta name="geo.region" content="AO">
    <meta name="geo.placename" content="Angola">
    <meta name="geo.position" content="-11.2027;17.8739">
    <meta name="ICBM" content="-11.2027, 17.8739">
    <meta name="language" content="Portuguese">
    <meta name="country" content="Angola">

    <!-- ============================================================
         OPEN GRAPH — Facebook, WhatsApp, LinkedIn
         ============================================================ -->
    <meta property="og:type" content="<?= $ogType ?? 'website' ?>">
    <meta property="og:site_name" content="LEA — Plataforma Angolana de Artes">
    <meta property="og:locale" content="pt_AO">
    <meta property="og:title" content="<?= htmlspecialchars($seoTitulo ?? 'LEA — Plataforma Angolana de Artes') ?>">
    <meta property="og:description" content="<?= htmlspecialchars($seoDescricao ?? 'A maior plataforma de cultura angolana — música, literatura, cinema, fotografia e artes visuais.') ?>">
    <meta property="og:url" content="<?= $seoCanonical ?? 'https://lea.co.ao' . ($_SERVER['REQUEST_URI'] ?? '/') ?>">
    <meta property="og:image" content="<?= htmlspecialchars($seoImagem ?? 'https://lea.co.ao/assets/img/og-default.jpg') ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="<?= htmlspecialchars($seoTitulo ?? 'LEA — Plataforma Angolana de Artes') ?>">

    <!-- ============================================================
         TWITTER / X CARD
         ============================================================ -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@leacoao">
    <meta name="twitter:title" content="<?= htmlspecialchars($seoTitulo ?? 'LEA — Plataforma Angolana de Artes') ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($seoDescricao ?? 'A maior plataforma de cultura angolana.') ?>">
    <meta name="twitter:image" content="<?= htmlspecialchars($seoImagem ?? 'https://lea.co.ao/assets/img/og-default.jpg') ?>">

    <!-- ============================================================
         JSON-LD — Schema.org (dados estruturados)
         ============================================================ -->
    <?php if (isset($jsonLd)): ?>
        <script type="application/ld+json"><?= $jsonLd ?></script>
    <?php else: ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "LEA — Plataforma Angolana de Artes",
        "url": "https://lea.co.ao",
        "description": "A maior plataforma de cultura angolana — música, literatura, cinema, fotografia e artes visuais.",
        "inLanguage": "pt-AO",
        "potentialAction": {
            "@type": "SearchAction",
            "target": "https://lea.co.ao/pesquisa?q={search_term_string}",
            "query-input": "required name=search_term_string"
        },
        "publisher": {
            "@type": "Organization",
            "name": "LEA — Plataforma Angolana de Artes",
            "url": "https://lea.co.ao",
            "logo": {
                "@type": "ImageObject",
                "url": "https://lea.co.ao/assets/img/logo.png"
            },
            "sameAs": [
                "https://www.facebook.com/profile.php?id=61585709784761",
                "https://www.instagram.com/lea.co.ao/",
                "https://www.youtube.com/channel/UC08rYMm8gs4KVmS0qpUI-Aw"
            ]
        }
    }
    </script>
    <?php endif; ?>
	
	<link rel="icon" type="image/png" href="/assets/img/logo.png">
	<link rel="apple-touch-icon" href="/assets/img/logo.png">

    <!-- ============================================================
         CSS
         ============================================================ -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/menu.footer.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <?php if (isset($cssExtra)): ?>
		<?php foreach ((array)$cssExtra as $css): ?>
			<link rel="stylesheet" href="<?= htmlspecialchars($css) ?>">
		<?php endforeach; ?>
	<?php endif; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.19.0/dist/tabler-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=DM+Sans:wght@400;500&family=Playfair+Display:ital,wght@0,700;1,600&display=swap" rel="stylesheet">

</head>
<body>

<!-- =============================================
     NAVBAR DESKTOP — só aparece em desktop
     ============================================= -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top desktop-only">
    <div class="container-fluid px-4">
        <div class="logo-link">
            <a href="/" class="lea-navbar-brand">
                <img src="/assets/img/logo.png" alt="LEA" class="logo-shodow">
            </a>
            <a href="/" class="txt-logo-link txt-logo-link-mbl">
                <span class="logo-lea">LEA</span>
            </a>
        </div>
        <button class="navbar-toggler border-0" type="button"
                data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav me-auto mb-0">
                <li class="nav-item"><a class="nav-link" href="https://lea.co.ao/arte/arte_.php">Artes</a></li>
                <li class="nav-item"><a class="nav-link" href="https://lea.co.ao/artistas/">Artistas</a></li>
                <li class="nav-item"><a class="nav-link" href="https://lea.co.ao/discografia.php?dsco=1">Músicas</a></li>
                <li class="nav-item"><a class="nav-link" href="https://lea.co.ao/videos.php?clipes=true">Vídeos</a></li>
                <li class="nav-item"><a class="nav-link" href="https://lea.co.ao/downloads/todos-livros.php?strt=0&acc=1">Literatura</a></li>
                <li class="nav-item"><a class="nav-link" href="/noticias/">Notícias</a></li>
                <li class="nav-item"><a class="nav-link" href="https://lea.co.ao/agenda/agenda.php?strt=0">Eventos</a></li>
                <li class="nav-item"><a class="nav-link" href="https://lea.co.ao/loja/">Loja</a></li>
            </ul>
            <div class="d-flex align-items-center gap-2">
                <div class="lea-search d-flex align-items-center gap-2">
                    <i class="ti ti-search" style="font-size:13px;"></i> Pesquisar…
                </div>
                <button class="btn-lea">Entrar</button>
            </div>
        </div>
    </div>
</nav>


<!-- =============================================
     TOPBAR MOBILE — só aparece em mobile
     ============================================= -->
<header class="mobile-topbar">
    <a href="/"><img src="/assets/img/logo.png" alt="LEA" height="30"></a>
    <a href="/" class="txt-logo-link logo-link-mbl">
        <span class="logo-lea">LEA</span>
    </a>
    <div class="d-flex gap-3" style="font-size:20px;color:var(--lea-muted);">
        <i class="ti ti-search"></i>
        <i class="ti ti-bell"></i>
        <i class="ti ti-user-circle"></i>
    </div>
</header>


<!-- =============================================
     AD 1 DESKTOP — LEADERBOARD 728×90
     ============================================= -->
<div class="ad-leaderboard py-2 px-4 desktop-only">
    <div class="d-flex align-items-center justify-content-center gap-3">
        <span class="ad-pill">Pub</span>
        <div class="ad-leaderboard-inner d-flex align-items-center gap-3 px-3 py-2 flex-grow-1" style="max-width:728px;">
            <div class="ad-lb-thumb">UN</div>
            <div class="flex-grow-1">
                <strong style="font-size:13px;">Unitel — Plano Ilimitado por Kz 3.500/mês</strong><br>
                <small class="text-muted">Ligação rápida em todo o país · unitel.ao</small>
            </div>
            <button class="btn-lea-sm">Ver oferta</button>
        </div>
        <span class="ad-pill">728 × 90</span>
    </div>
</div>

<!-- AD 1 MOBILE — BANNER 320×50 -->
<div class="ad-banner-mobile mobile-only">
    <span class="ad-pill">Pub</span>
    <div class="ad-banner-mobile-inner">
        <div class="ad-thumb-sm" style="background:var(--lea-blue);">UN</div>
        <div class="ad-banner-copy">
            <strong>Unitel — Sempre Ligado</strong>
            <span>Planos de dados para toda Angola</span>
        </div>
    </div>
</div>
