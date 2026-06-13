<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LEA — Plataforma Angolana de Artes</title>

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/menu.footer.css">
    <link rel="stylesheet" href="/assets/css/style.css">
	<link rel="stylesheet" href="/assets/css/paginas/certificacao.css">
	<link rel="stylesheet" href="/assets/css/paginas/noticias.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.19.0/dist/tabler-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">

    <style>
        
		
        /* =============================================
           NAVBAR DESKTOP
           ============================================= */
        .navbar { border-bottom: 1px solid var(--lea-border); /*background: var(--lea-white); */}
        .navbar-brand { font-size: 22px; font-weight: 600; letter-spacing: -0.5px; color: var(--lea-text) !important; }
        .nav-link { font-size: 13px; color: var(--lea-muted) !important; padding: 4px 10px !important; border-radius: 6px; }
        .nav-link:hover { color: var(--lea-blue) !important; background-color: var(--lea-blue-light); }
        .lea-search { font-size: 12px; color: var(--lea-muted); background: var(--lea-surface); border: 1px solid rgba(37,99,176,0.2); border-radius: 8px; padding: 6px 12px; min-width: 160px; cursor: pointer; }

        /* =============================================
           BOTÕES
           ============================================= */
        .btn-lea { background-color: var(--lea-blue); color: #fff; border: none; border-radius: 8px; font-size: 13px; font-weight: 500; padding: 8px 18px; transition: background .15s; cursor: pointer; }
        .btn-lea:hover { background-color: var(--lea-blue-dark); color: #fff; }
        .btn-lea-outline { background: transparent; color: var(--lea-text); border: 1px solid rgba(37,99,176,0.25); border-radius: 8px; font-size: 13px; padding: 8px 16px; transition: border-color .15s, color .15s; cursor: pointer; }
        .btn-lea-outline:hover { border-color: var(--lea-blue); color: var(--lea-blue); }
        .btn-lea-sm { background-color: var(--lea-blue); color: #fff; border: none; border-radius: 6px; font-size: 12px; font-weight: 500; padding: 6px 14px; transition: background .15s; white-space: nowrap; cursor: pointer; }
        .btn-lea-sm:hover { background-color: var(--lea-blue-dark); color: #fff; }

	
        /* =============================================
           AD ELEMENTS
           ============================================= */
        .ad-pill { font-size: 9px; letter-spacing: .5px; text-transform: uppercase; color: #bbb; border: 1px solid #ddd; border-radius: 4px; padding: 2px 6px; }
        .ann { font-size: 10px; color: var(--lea-blue); display: flex; align-items: center; gap: 4px; }
        .ann i { font-size: 12px; }
        .ad-leaderboard { background: var(--lea-white); border-bottom: 1px solid var(--lea-border); }
        .ad-leaderboard-inner { background: var(--lea-surface); border: 1px solid var(--lea-border); border-radius: 10px; }
        .ad-lb-thumb { width: 52px; height: 40px; border-radius: 8px; background-color: var(--lea-blue); color: #fff; font-size: 12px; font-weight: 600; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .ad-block { background: var(--lea-surface); border: 1px dashed #ccd9ef; border-radius: 10px; min-height: 120px; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; padding: 16px; gap: 4px; }
        .ad-block .ad-size { font-size: 14px; font-weight: 600; color: #c0cfe8; }
        .ad-block .ad-type { font-size: 10px; color: #c0cfe8; }
        .ad-rectangle { background: var(--lea-white); border: 1px dashed #ccd9ef; border-radius: 10px; }
        .ad-rect-thumb { width: 64px; height: 44px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 600; color: #fff; flex-shrink: 0; }
        .ad-native { border: 1px solid var(--lea-border); border-radius: 10px; overflow: hidden; background: var(--lea-surface); }
        .ad-native-img { height: 68px; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 600; color: #fff; }
        .ad-native-cta { font-size: 11px; font-weight: 500; color: var(--lea-blue); text-decoration: none; }
        .ad-native-cta:hover { text-decoration: underline; }

        /* =============================================
           SIDEBARS DESKTOP
           ============================================= */
        .sidebar-left  { background: var(--lea-white); border-right: 1px solid var(--lea-border); }
        .sidebar-right { background: var(--lea-white); border-left: 1px solid var(--lea-border); }
        .sidebar-title { font-size: 10px; font-weight: 600; letter-spacing: .6px; text-transform: uppercase; color: #bbb; }
        .cat-link { display: flex; align-items: center; gap: 8px; font-size: 13px; color: var(--lea-muted); text-decoration: none; padding: 8px 4px; border-bottom: 1px solid var(--lea-border); transition: color .12s; }
        .cat-link:last-of-type { border-bottom: none; }
        .cat-link:hover { color: var(--lea-blue); }
        .cat-link i { font-size: 16px; color: var(--lea-blue); }
        .recent-artist { border-bottom: 1px solid var(--lea-border); }
        .recent-artist:last-child { border-bottom: none; }
        .ra-avatar { width: 34px; height: 34px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 600; color: #fff; flex-shrink: 0; }
        .ra-name { font-size: 12px; font-weight: 500; }
        .ra-type { font-size: 10px; color: var(--lea-muted); }

        /* =============================================
           HERO
           ============================================= */
        .hero-card { background: var(--lea-white); border: 1px solid var(--lea-border); border-radius: 14px; }
        .hero-tag { display: inline-block; font-size: 10px; font-weight: 600; letter-spacing: .4px; background: var(--lea-blue-light); color: var(--lea-blue-dark); padding: 3px 12px; border-radius: 99px; }
        .hero-card h1 { font-size: 26px; font-weight: 600; line-height: 1.2; }
        .hero-card h1 em { font-style: normal; color: var(--lea-blue); }
        .hero-card p { font-size: 13px; color: var(--lea-muted); line-height: 1.65; }
        .hero-tile { height: 72px; border-radius: 10px; display: flex; align-items: flex-end; padding: 8px 10px; }
        .hero-tile span { font-size: 10px; font-weight: 500; color: #fff; background: rgba(0,0,0,.38); padding: 2px 9px; border-radius: 99px; }

        /* =============================================
           STAT CARDS
           ============================================= */
        .stat-card { background: var(--lea-white); border: 1px solid var(--lea-border); border-radius: 10px; }
        .stat-num { font-family: 'Sora', sans-serif; font-size: 26px; font-weight: 600; }
        .stat-num span { color: var(--lea-blue); }
        .stat-lbl { font-size: 11px; color: var(--lea-muted); }

        /* =============================================
           SECTION HEADERS
           ============================================= */
        .sec-title { font-size: 15px; font-weight: 600; margin: 0; }
        .sec-link  { font-size: 12px; color: var(--lea-blue); text-decoration: none; }
        .sec-link:hover { text-decoration: underline; }

        /* =============================================
           ARTIST CARDS
           ============================================= */
        .artist-card { background: var(--lea-white); border: 1px solid var(--lea-border); border-radius: 12px; overflow: hidden; }
        .artist-avatar { height: 84px; display: flex; align-items: center; justify-content: center; font-family: 'Sora', sans-serif; font-size: 24px; font-weight: 600; color: #fff; }
        .artist-name { font-size: 12px; font-weight: 500; }
        .artist-type { font-size: 11px; color: var(--lea-muted); }
        .badge-art { display: inline-block; font-size: 9px; font-weight: 500; background: var(--lea-blue-light); color: var(--lea-blue-dark); padding: 2px 8px; border-radius: 99px; }

        /* =============================================
           FEATURED / NEWS
           ============================================= */
        .featured-card { background: var(--lea-white); border: 1px solid var(--lea-border); border-radius: 12px; overflow: hidden; }
        .featured-img  { height: 110px; display: flex; align-items: flex-end; padding: 10px 12px; }
        .featured-img span { font-size: 10px; color: #fff; background: rgba(0,0,0,.4); padding: 3px 10px; border-radius: 99px; }
        .featured-tag  { display: inline-block; font-size: 9px; font-weight: 500; background: var(--lea-blue); color: #fff; padding: 2px 8px; border-radius: 99px; }
        .featured-title { font-size: 13px; font-weight: 500; line-height: 1.4; }
        .featured-date  { font-size: 11px; color: var(--lea-muted); }
        .news-item { background: var(--lea-white); border: 1px solid var(--lea-border); border-radius: 8px; }
        .news-item.is-ad { background: var(--lea-surface); }
        .news-dot { width: 32px; height: 32px; border-radius: 8px; flex-shrink: 0; display: flex; align-items: center; justify-content: center; font-size: 15px; }
        .news-title { font-size: 12px; font-weight: 500; line-height: 1.4; }
        .news-date  { font-size: 10px; color: var(--lea-muted); }

        /* =============================================
           TESTEMUNHOS
           ============================================= */
        .testimonials-section { background: var(--lea-surface); padding: 52px 0; border-top: 1px solid var(--lea-border); }
        .section-eyebrow { display: inline-block; font-size: 11px; letter-spacing: .5px; text-transform: uppercase; background: var(--lea-blue); color: #fff; padding: 4px 14px; border-radius: 99px; margin-bottom: 12px; }
        .testimonials-section h2 { font-family: 'Sora', sans-serif; font-size: 22px; font-weight: 600; color: var(--lea-text); margin-bottom: 4px; }
        .section-sub { font-size: 13px; color: var(--lea-muted); }
        .testimonial-card { background: var(--lea-white); border: 1px solid var(--lea-border); border-radius: 14px; padding: 22px; height: 100%; transition: box-shadow .2s, transform .2s; }
        .testimonial-card:hover { box-shadow: 0 8px 24px rgba(37,99,176,0.10); transform: translateY(-2px); }
        .t-stars { color: #F59E0B; font-size: 13px; letter-spacing: 2px; }
        .t-quote { font-size: 13px; color: var(--lea-muted); line-height: 1.75; font-style: italic; }
        .t-quote::before { content: '\201C'; }
        .t-quote::after  { content: '\201D'; }
        .t-avatar { width: 40px; height: 40px; border-radius: 50%; flex-shrink: 0; display: flex; align-items: center; justify-content: center; font-family: 'Sora', sans-serif; font-size: 13px; font-weight: 600; color: #fff; }
        .t-name { font-size: 13px; font-weight: 600; color: var(--lea-text); }
        .t-role { font-size: 11px; color: var(--lea-muted); }
        .testimonials-cta { background: var(--lea-blue); color: #fff; border: none; border-radius: 8px; font-size: 13px; font-weight: 600; padding: 10px 28px; transition: background .15s; cursor: pointer; }
        .testimonials-cta:hover { background: var(--lea-blue-dark); }

        /* =============================================
           FOOTER
           ============================================= */
        .lea-footer { background: var(--lea-white); border-top: 1px solid var(--lea-border); }
        .footer-brand { font-family: 'Sora', sans-serif; font-size: 16px; font-weight: 600; }
        .footer-brand span { color: var(--lea-blue); }
        .footer-link { font-size: 12px; color: var(--lea-muted); text-decoration: none; }
        .footer-link:hover { color: var(--lea-blue); }
        .footer-social { color: var(--lea-blue); font-size: 20px; text-decoration: none; transition: opacity .15s; }
        .footer-social:hover { opacity: .7; }

        /* =============================================
           MOBILE — TOPBAR
           ============================================= */
        .mobile-topbar {
            display: none;
            background: var(--lea-white);
            border-bottom: 1px solid var(--lea-border);
            padding: 10px 16px;
            align-items: center;
            justify-content: space-between;
            position: sticky; top: 0; z-index: 100;
        }

        /* =============================================
           MOBILE — ELEMENTOS
           ============================================= */
        .ad-banner-mobile { background: var(--lea-white); border-bottom: 1px solid var(--lea-border); padding: 8px 14px; display: flex; align-items: center; gap: 10px; }
        .ad-banner-mobile-inner { flex: 1; display: flex; align-items: center; gap: 10px; background: var(--lea-surface); border-radius: 8px; padding: 6px 10px; border: 1px solid var(--lea-border); }
        .ad-thumb-sm { width: 36px; height: 36px; border-radius: 8px; flex-shrink: 0; display: flex; align-items: center; justify-content: center; font-size: 10px; font-weight: 600; color: #fff; }
        .ad-banner-copy strong { font-size: 12px; font-weight: 500; color: var(--lea-text); display: block; }
        .ad-banner-copy span { font-size: 10px; color: var(--lea-muted); }
        .ad-native-hero { background: var(--lea-white); border-bottom: 1px solid var(--lea-border); padding: 10px 16px 12px; }
        .ad-native-card { background: var(--lea-surface); border: 1px solid var(--lea-border); border-radius: 10px; overflow: hidden; }
        .ad-native-card-img { height: 72px; display: flex; align-items: center; justify-content: center; font-size: 13px; font-weight: 600; color: #fff; }
        .ad-native-card-body { padding: 10px 12px; display: flex; align-items: center; justify-content: space-between; gap: 10px; }
        .ad-native-card-cta { background: var(--lea-blue); color: #fff; border: none; border-radius: 99px; padding: 6px 14px; font-size: 11px; font-weight: 500; white-space: nowrap; flex-shrink: 0; cursor: pointer; }
        .mobile-divider { height: 6px; background: var(--lea-surface); border-top: 1px solid var(--lea-border); border-bottom: 1px solid var(--lea-border); }
        .hero-section-mobile { background: var(--lea-white); padding: 18px 16px 16px; border-bottom: 1px solid var(--lea-border); }
        .hero-section-mobile h1 { font-size: 22px; font-weight: 600; line-height: 1.2; }
        .hero-section-mobile h1 em { font-style: normal; color: var(--lea-blue); }
        .hero-section-mobile p { font-size: 13px; color: var(--lea-muted); line-height: 1.6; }
        .stats-mobile { background: var(--lea-white); display: grid; grid-template-columns: 1fr 1fr; border-bottom: 1px solid var(--lea-border); }
        .stat-mobile-cell { padding: 14px 16px; border-right: 1px solid var(--lea-border); border-bottom: 1px solid var(--lea-border); }
        .stat-mobile-cell:nth-child(2n) { border-right: none; }
        .stat-mobile-cell:nth-child(3), .stat-mobile-cell:nth-child(4) { border-bottom: none; }
        .stat-mobile-num { font-family: 'Sora', sans-serif; font-size: 22px; font-weight: 600; color: var(--lea-text); }
        .stat-mobile-num span { color: var(--lea-blue); }
        .stat-mobile-lbl { font-size: 11px; color: var(--lea-muted); }
        .cats-mobile { display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; }
        .cat-mobile { background: var(--lea-surface); border: 1px solid var(--lea-border); border-radius: 10px; padding: 12px 6px; text-align: center; cursor: pointer; transition: border-color .12s; }
        .cat-mobile:hover { border-color: var(--lea-blue); }
        .cat-mobile i { font-size: 20px; color: var(--lea-blue); display: block; margin-bottom: 5px; }
        .cat-mobile-name { font-size: 11px; color: var(--lea-muted); }
        .artists-mobile { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
        .artist-card-mobile { background: var(--lea-white); border: 1px solid var(--lea-border); border-radius: 12px; overflow: hidden; }
        .artist-avatar-mobile { height: 96px; display: flex; align-items: center; justify-content: center; font-family: 'Sora', sans-serif; font-size: 26px; font-weight: 600; color: #fff; }
        .news-item-mobile { display: flex; gap: 10px; padding: 10px 11px; background: var(--lea-white); border: 1px solid var(--lea-border); border-radius: 8px; }
        .news-item-mobile.is-ad { background: var(--lea-surface); }
        .ad-banner-bottom-mobile { background: var(--lea-white); border-top: 1px solid var(--lea-border); border-bottom: 1px solid var(--lea-border); padding: 8px 14px; display: flex; align-items: center; justify-content: center; gap: 10px; }

        /* =============================================
           BOTTOM NAV MOBILE
           ============================================= */
        .bottom-nav {
            display: none;
            background: var(--lea-white);
            border-top: 1px solid var(--lea-border);
            position: fixed; bottom: 0; left: 0; right: 0;
            height: 62px;
            align-items: center; justify-content: space-around;
            z-index: 200;
            padding-bottom: env(safe-area-inset-bottom, 0);
        }
        .bnav-item { display: flex; flex-direction: column; align-items: center; gap: 3px; font-size: 22px; color: var(--lea-muted); cursor: pointer; text-decoration: none; flex: 1; justify-content: center; transition: color .12s; }
        .bnav-item.active, .bnav-item:hover { color: var(--lea-blue); }
        .bnav-lbl { font-size: 9px; font-weight: 500; font-family: 'DM Sans', sans-serif; }

        /* =============================================
           MENU DRAWER MOBILE
           ============================================= */
        .menu-drawer {
            position: fixed; inset: 0; z-index: 500;
            visibility: hidden;
        }
        .menu-drawer.open { visibility: visible; }

        .menu-overlay {
            position: absolute; inset: 0;
            background: rgba(0,0,0,0.5);
            opacity: 0; transition: opacity .25s;
        }
        .menu-drawer.open .menu-overlay { opacity: 1; }

        .menu-panel {
            position: absolute; bottom: 0; left: 0; right: 0;
            background: var(--lea-white);
            border-radius: 20px 20px 0 0;
            padding: 0 0 env(safe-area-inset-bottom, 16px);
            transform: translateY(100%);
            transition: transform .3s cubic-bezier(.32,.72,0,1);
            max-height: 90vh; overflow-y: auto;
        }
        .menu-drawer.open .menu-panel { transform: translateY(0); }

        .menu-handle { width: 36px; height: 4px; background: #E5E7EB; border-radius: 2px; margin: 12px auto 0; }

        .menu-header { padding: 16px 20px 12px; border-bottom: 1px solid var(--lea-border); display: flex; align-items: center; justify-content: space-between; }
        .menu-header-title { font-size: 15px; font-weight: 700; color: var(--lea-text); font-family: 'Sora', sans-serif; }
        .btn-close-menu { background: var(--lea-surface); border: none; border-radius: 8px; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; font-size: 18px; color: var(--lea-muted); cursor: pointer; }

        .menu-section-title { font-size: 10px; font-weight: 700; letter-spacing: .6px; text-transform: uppercase; color: #bbb; padding: 14px 20px 6px; }

        .menu-item { display: flex; align-items: center; gap: 12px; padding: 12px 20px; text-decoration: none; border-bottom: 1px solid var(--lea-border); transition: background .12s; }
        .menu-item:last-child { border-bottom: none; }
        .menu-item:hover { background: var(--lea-surface); }
        .menu-item i { font-size: 20px; color: var(--lea-blue); width: 24px; text-align: center; flex-shrink: 0; }
        .menu-item-label { font-size: 14px; font-weight: 500; color: var(--lea-text); }
        .menu-item-sub { font-size: 11px; color: var(--lea-muted); }

        .menu-social { padding: 16px 20px; display: flex; gap: 14px; }
        .menu-social a { font-size: 22px; color: var(--lea-blue); text-decoration: none; transition: opacity .15s; }
        .menu-social a:hover { opacity: .7; }

        .btn-menu-entrar { display: block; width: calc(100% - 40px); margin: 0 20px 16px; background: var(--lea-blue); color: #fff; border: none; border-radius: 10px; font-size: 14px; font-weight: 600; padding: 12px; cursor: pointer; transition: background .15s; }
        .btn-menu-entrar:hover { background: var(--lea-blue-dark); }

        /* =============================================
           BREAKPOINTS
           ============================================= */
        /* Desktop — mostra navbar, esconde mobile */
        @media (min-width: 992px) {
            .mobile-topbar   { display: none !important; }
            .mobile-only     { display: none !important; }
            .bottom-nav      { display: none !important; }
            .desktop-only    { display: block; }
            body             { padding-bottom: 0; }
        }

        /* Mobile — esconde desktop, mostra mobile */
        @media (max-width: 991px) {
            .desktop-only    { display: none !important; }
            .mobile-only     { display: block; }
            .mobile-topbar   { display: flex; }
            .bottom-nav      { display: flex; }
            /* Padding para conteúdo não ficar atrás da bottom nav */
            body             { padding-bottom: 62px; }
            /* Footer não fica atrás da bottom nav */
            .lea-footer      { padding-bottom: calc(62px + env(safe-area-inset-bottom, 0px) + 12px) !important; }
        }
    </style>
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
                <li class="nav-item"><a class="nav-link" href="https://lea.co.ao/noticia.php">Notícias</a></li>
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
