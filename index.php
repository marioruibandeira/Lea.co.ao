<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LEA — Plataforma Angolana de Artes</title>

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/menu.footer.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.19.0/dist/tabler-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">

  <style>
    :root {
      --lea-blue:        #2563B0;
      --lea-blue-dark:   #1A4A8A;
      --lea-blue-light:  #E8F0FB;
      --lea-blue-mid:    #3B7DD8;
      --lea-teal:        #1D9E75;
      --lea-purple:      #534AB7;
      --lea-amber:       #C07A1A;
      --lea-surface:     #f5f7fb;
      --lea-white:       #ffffff;
      --lea-border:      rgba(37,99,176,0.12);
      --lea-text:        #111827;
      --lea-muted:       #6B7280;
    }

    *, *::before, *::after { box-sizing: border-box; }
    body { font-family: 'DM Sans', sans-serif; background-color: var(--lea-surface); color: var(--lea-text); margin: 0; }
    h1, h2, h3, h4, h5, .navbar-brand { font-family: 'Sora', sans-serif; }

    /* =============================================
       NAVBAR DESKTOP
       ============================================= */
    .navbar { border-bottom: 1px solid var(--lea-border); }
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

  <?php include("main.header.php"); ?>


  <!-- =============================================
       TOPBAR MOBILE — só aparece em mobile
       ============================================= -->
  <header class="mobile-topbar">
    <a href="#"><img src="assets/img/logo.png" alt="LEA" height="30"></a>
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


  <!-- =============================================
       LAYOUT DESKTOP — 3 COLUNAS
       ============================================= -->
  <div class="container-fluid px-0 desktop-only">
    <div class="row g-0" style="min-height:calc(100vh - 120px);">

      <!-- Sidebar esquerda -->
      <aside class="col-lg-2 sidebar-left p-3 d-flex flex-column gap-3">
        <p class="sidebar-title mb-0">Categorias</p>
        <div class="d-flex flex-column">
          <a class="cat-link" href="musica.html"><i class="ti ti-music"></i>Música</a>
          <a class="cat-link" href="videos.html"><i class="ti ti-movie"></i>Cinema</a>
          <a class="cat-link" href="literatura.html"><i class="ti ti-book"></i>Literatura</a>
          <a class="cat-link" href="#"><i class="ti ti-camera"></i>Fotografia</a>
          <a class="cat-link" href="#"><i class="ti ti-palette"></i>Pintura</a>
          <a class="cat-link" href="#"><i class="ti ti-masks-theater"></i>Teatro</a>
          <a class="cat-link" href="#"><i class="ti ti-device-gamepad-2"></i>Jogos</a>
          <a class="cat-link" href="#"><i class="ti ti-building"></i>Arquitetura</a>
        </div>
        <div class="mt-2">
          <div class="ann mb-1"><i class="ti ti-ad"></i> 160 × 600 · Skyscraper</div>
          <div class="ad-block" style="min-height:200px;">
            <i class="ti ti-ad" style="font-size:28px;color:#c0cfe8;"></i>
            <div class="ad-size">160 × 600</div>
            <div class="ad-type">Skyscraper Sidebar</div>
          </div>
        </div>
      </aside>

      <!-- Coluna principal -->
      <main class="col-lg-8 p-3 d-flex flex-column gap-3" style="background:var(--lea-surface);">

        <!-- Hero -->
        <div class="hero-card p-4">
          <div class="row g-3 align-items-center">
            <div class="col-md-7">
              <div class="hero-tag mb-2">🇦🇴 Plataforma angolana de artes</div>
              <h1>A casa da <em>cultura</em><br>angolana</h1>
              <p class="mt-2 mb-3">Descobre artistas, músicas, literatura, cinema e muito mais. Tudo num só lugar, feito para valorizar a criatividade angolana.</p>
              <div class="d-flex gap-2">
                <button class="btn-lea" onlClick="linkArtista()">Explorar artistas</button>
                <button class="btn-lea-outline">Ver loja</button>
              </div>
            </div>
            <div class="col-md-5">
              <div class="row g-2">
                <div class="col-6"><div class="hero-tile" style="background:#2563B0;"><span>Música</span></div></div>
                <div class="col-6"><div class="hero-tile" style="background:#1D9E75;"><span>Cinema</span></div></div>
                <div class="col-6"><div class="hero-tile" style="background:#534AB7;"><span>Literatura</span></div></div>
                <div class="col-6"><div class="hero-tile" style="background:#3B7DD8;"><span>Fotografia</span></div></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Stats -->
        <div class="row g-2">
          <div class="col-3"><div class="stat-card p-3"><div class="stat-num">2<span>k+</span></div><div class="stat-lbl">Artistas registados</div></div></div>
          <div class="col-3"><div class="stat-card p-3"><div class="stat-num">11</div><div class="stat-lbl">Categorias artísticas</div></div></div>
          <div class="col-3"><div class="stat-card p-3"><div class="stat-num">18</div><div class="stat-lbl">Províncias cobertas</div></div></div>
          <div class="col-3"><div class="stat-card p-3"><div class="stat-num">2017</div><div class="stat-lbl">Ano de fundação</div></div></div>
        </div>

        <!-- Artistas -->
        <div>
          <div class="d-flex align-items-baseline justify-content-between mb-2">
            <h2 class="sec-title">Artistas em destaque</h2>
            <a class="sec-link" href="artistas.html">Ver todos →</a>
          </div>
          <div class="row g-2">
            <div class="col-3"><div class="artist-card"><div class="artist-avatar" style="background:#2563B0;">MK</div><div class="p-2"><div class="artist-name">Mamborró</div><div class="artist-type">Cantor · Kwanza-Sul</div><div class="badge-art mt-1">Música</div></div></div></div>
            <div class="col-3"><div class="artist-card"><div class="artist-avatar" style="background:#1D9E75;">TP</div><div class="p-2"><div class="artist-name">TP Films</div><div class="artist-type">Realizador · Huambo</div><div class="badge-art mt-1">Cinema</div></div></div></div>
            <div class="col-3"><div class="artist-card"><div class="artist-avatar" style="background:#534AB7;">FB</div><div class="p-2"><div class="artist-name">Feeling Black</div><div class="artist-type">Cantor · Reggae</div><div class="badge-art mt-1">Música</div></div></div></div>
            <div class="col-3"><div class="artist-card"><div class="artist-avatar" style="background:#3B7DD8;">NC</div><div class="p-2"><div class="artist-name">Nilda Catumbela</div><div class="artist-type">Cantora · Huíla</div><div class="badge-art mt-1">Música</div></div></div></div>
          </div>
        </div>

        <!-- AD rectangle -->
        <div>
          <div class="ann mb-1"><i class="ti ti-ad"></i> In-content · Rectangle 468×60</div>
          <div class="ad-rectangle d-flex align-items-center justify-content-between p-2 gap-3">
            <div class="d-flex align-items-center gap-2">
              <span class="ad-pill">Pub</span>
              <div class="ad-rect-thumb" style="background:#1D9E75;">BAI</div>
              <div>
                <div style="font-size:13px;font-weight:500;">BAI — Conta jovem sem comissões</div>
                <div class="text-muted" style="font-size:11px;">Abre a tua conta online em minutos · bai.ao</div>
              </div>
            </div>
            <button class="btn-lea-sm" style="background:#1D9E75;">Saber mais</button>
          </div>
        </div>

        <!-- Destaques + notícias -->
        <div>
          <div class="d-flex align-items-baseline justify-content-between mb-2">
            <h2 class="sec-title">Destaques e notícias</h2>
            <a class="sec-link" href="noticias.html">Ver mais →</a>
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="featured-card h-100">
                <div class="featured-img" style="background:#2563B0;"><span>Entrevista</span></div>
                <div class="p-3">
                  <span class="featured-tag">Em destaque</span>
                  <div class="featured-title mt-2">Yuri da Cunha reafirma compromisso com a cultura angolana</div>
                  <div class="featured-date mt-1">Mar 2025</div>
                </div>
              </div>
            </div>
            <div class="col-md-6 d-flex flex-column gap-2">
              <div class="news-item d-flex align-items-start gap-2 p-2">
                <div class="news-dot" style="background:#E8F0FB;color:#2563B0;"><i class="ti ti-microphone"></i></div>
                <div><div class="news-title">Phil Collins fala sobre saúde e regresso à música</div><div class="news-date">Jan 2026</div></div>
              </div>
              <div class="news-item is-ad d-flex align-items-start gap-2 p-2">
                <div class="news-dot" style="background:#F1EFE8;color:#888;"><i class="ti ti-ad"></i></div>
                <div><span class="ad-pill d-inline-block mb-1">Pub</span><div class="news-title">Multicaixa Express — transfere em segundos</div><div class="news-date">Patrocinado · EMIS</div></div>
              </div>
              <div class="news-item d-flex align-items-start gap-2 p-2">
                <div class="news-dot" style="background:#E1F5EE;color:#1D9E75;"><i class="ti ti-music"></i></div>
                <div><div class="news-title">Bruxa MC lança single produzido em Angola</div><div class="news-date">Set 2020</div></div>
              </div>
              <div class="news-item d-flex align-items-start gap-2 p-2">
                <div class="news-dot" style="background:#E8F0FB;color:#2563B0;"><i class="ti ti-calendar-event"></i></div>
                <div><div class="news-title">Novos artistas adicionados esta semana</div><div class="news-date">Mai 2026</div></div>
              </div>
            </div>
          </div>
        </div>

      </main>

      <!-- Sidebar direita -->
      <aside class="col-lg-2 sidebar-right p-3 d-flex flex-column gap-3">
        <div>
          <div class="ann mb-1"><i class="ti ti-ad"></i> 300 × 250 · maior RPM</div>
          <div class="ad-block" style="min-height:140px;">
            <i class="ti ti-ad" style="font-size:28px;color:#c0cfe8;"></i>
            <div class="ad-size">300 × 250</div>
            <div class="ad-type">Medium Rectangle<br>AdSense Premium</div>
          </div>
        </div>
        <div>
          <p class="sidebar-title mb-2">Recém adicionados</p>
          <div class="d-flex flex-column">
            <div class="recent-artist d-flex align-items-center gap-2 py-2"><div class="ra-avatar" style="background:#2563B0;">AK</div><div><div class="ra-name">Al Kapone</div><div class="ra-type">Cantor & Poeta</div></div></div>
            <div class="recent-artist d-flex align-items-center gap-2 py-2"><div class="ra-avatar" style="background:#1D9E75;">FR</div><div><div class="ra-name">Faculdade de Rimas</div><div class="ra-type">Cantor</div></div></div>
            <div class="recent-artist d-flex align-items-center gap-2 py-2"><div class="ra-avatar" style="background:#534AB7;">AZ</div><div><div class="ra-name">Adão Zina</div><div class="ra-type">Escritor & Poeta</div></div></div>
            <div class="recent-artist d-flex align-items-center gap-2 py-2"><div class="ra-avatar" style="background:#3B7DD8;">LF</div><div><div class="ra-name">Lwinizia Fernandes</div><div class="ra-type">Escritora</div></div></div>
          </div>
        </div>
        <div>
          <div class="ann mb-1"><i class="ti ti-ad"></i> Nativo sidebar</div>
          <div class="ad-native">
            <div class="ad-native-img" style="background:#2563B0;">Zap Imóveis</div>
            <div class="p-2">
              <span class="ad-pill d-inline-block mb-1">Pub</span>
              <div style="font-size:12px;font-weight:500;">Encontra o teu imóvel em Angola</div>
              <a class="ad-native-cta d-block mt-1" href="#">Ver anúncios →</a>
            </div>
          </div>
        </div>
      </aside>

    </div>
  </div>


  <!-- =============================================
       LAYOUT MOBILE
       ============================================= -->
  <div class="mobile-only">

    <!-- Hero mobile -->
    <section class="hero-section-mobile">
      <div class="hero-tag mb-2">🇦🇴 Plataforma angolana de artes</div>
      <h1>A casa da <em>cultura</em> angolana</h1>
      <p class="mt-2 mb-3">Descobre artistas, músicas, literatura, cinema e muito mais.</p>
      <div class="d-flex gap-2 mb-3">
        <button class="btn-lea" onclick="linkArtista()">Explorar</button>
        <button class="btn-lea-outline">Ver loja</button>
      </div>
      <div class="row g-2">
        <div class="col-6"><div class="hero-tile" style="background:#2563B0;"><span>Música</span></div></div>
        <div class="col-6"><div class="hero-tile" style="background:#1D9E75;"><span>Cinema</span></div></div>
        <div class="col-6"><div class="hero-tile" style="background:#534AB7;"><span>Literatura</span></div></div>
        <div class="col-6"><div class="hero-tile" style="background:#3B7DD8;"><span>Fotografia</span></div></div>
      </div>
    </section>

    <!-- Stats mobile -->
    <div class="stats-mobile">
      <div class="stat-mobile-cell"><div class="stat-mobile-num">2<span>k+</span></div><div class="stat-mobile-lbl">Artistas</div></div>
      <div class="stat-mobile-cell"><div class="stat-mobile-num">11</div><div class="stat-mobile-lbl">Categorias</div></div>
      <div class="stat-mobile-cell"><div class="stat-mobile-num">18</div><div class="stat-mobile-lbl">Províncias</div></div>
      <div class="stat-mobile-cell"><div class="stat-mobile-num">2017</div><div class="stat-mobile-lbl">Fundação</div></div>
    </div>

    <!-- AD nativo mobile -->
    <div class="ad-native-hero">
      <div class="ann mb-1"><i class="ti ti-ad"></i> Anúncio nativo</div>
      <div class="ad-native-card">
        <div class="ad-native-card-img" style="background:var(--lea-blue-dark);">BAI — Banco de poupança</div>
        <div class="ad-native-card-body">
          <div>
            <span class="ad-pill d-inline-block mb-1">Pub</span>
            <div style="font-size:12px;font-weight:500;color:var(--lea-text);">Conta jovem BAI</div>
            <div style="font-size:11px;color:var(--lea-muted);">Abre já, sem comissões</div>
          </div>
          <button class="ad-native-card-cta">Saber mais</button>
        </div>
      </div>
    </div>

    <div class="mobile-divider"></div>

    <!-- Categorias mobile -->
    <section class="p-3 bg-white" style="border-bottom:1px solid var(--lea-border);">
      <div class="d-flex align-items-baseline justify-content-between mb-2">
        <h2 class="sec-title">Categorias</h2>
        <a class="sec-link" href="#">Ver todas →</a>
      </div>
      <div class="cats-mobile">
        <a class="cat-mobile" href="musica.html"><i class="ti ti-music"></i><div class="cat-mobile-name">Música</div></a>
        <a class="cat-mobile" href="videos.html"><i class="ti ti-movie"></i><div class="cat-mobile-name">Cinema</div></a>
        <a class="cat-mobile" href="literatura.html"><i class="ti ti-book"></i><div class="cat-mobile-name">Literatura</div></a>
        <a class="cat-mobile" href="#"><i class="ti ti-camera"></i><div class="cat-mobile-name">Fotografia</div></a>
        <a class="cat-mobile" href="#"><i class="ti ti-palette"></i><div class="cat-mobile-name">Pintura</div></a>
        <a class="cat-mobile" href="#"><i class="ti ti-masks-theater"></i><div class="cat-mobile-name">Teatro</div></a>
      </div>
    </section>

    <div class="mobile-divider"></div>

    <!-- Artistas mobile -->
    <section class="p-3 bg-white" style="border-bottom:1px solid var(--lea-border);">
      <div class="d-flex align-items-baseline justify-content-between mb-2">
        <h2 class="sec-title">Artistas em destaque</h2>
        <a class="sec-link" href="artistas.html">Ver todos →</a>
      </div>
      <div class="artists-mobile">
        <div class="artist-card-mobile"><div class="artist-avatar-mobile" style="background:#2563B0;">MK</div><div class="p-2"><div class="artist-name">Mamborró</div><div class="artist-type">Cantor · Kwanza-Sul</div><div class="badge-art mt-1">Música</div></div></div>
        <div class="artist-card-mobile"><div class="artist-avatar-mobile" style="background:#1D9E75;">TP</div><div class="p-2"><div class="artist-name">TP Films</div><div class="artist-type">Realizador · Huambo</div><div class="badge-art mt-1">Cinema</div></div></div>
        <div class="artist-card-mobile"><div class="artist-avatar-mobile" style="background:#534AB7;">FB</div><div class="p-2"><div class="artist-name">Feeling Black</div><div class="artist-type">Cantor · Reggae</div><div class="badge-art mt-1">Música</div></div></div>
        <div class="artist-card-mobile"><div class="artist-avatar-mobile" style="background:#3B7DD8;">NC</div><div class="p-2"><div class="artist-name">Nilda Catumbela</div><div class="artist-type">Cantora · Huíla</div><div class="badge-art mt-1">Música</div></div></div>
      </div>
    </section>

    <!-- AD rectangle mobile -->
    <div style="background:var(--lea-white);padding:10px 16px 12px;border-bottom:1px solid var(--lea-border);">
      <div class="ann mb-1"><i class="ti ti-ad"></i> Rectangle 300×250 · maior RPM AdSense</div>
      <div class="ad-block" style="min-height:100px;">
        <i class="ti ti-ad" style="font-size:26px;color:#c0cfe8;"></i>
        <div class="ad-size">300 × 250</div>
        <div class="ad-type">Google AdSense · Display / Responsivo</div>
      </div>
    </div>

    <div class="mobile-divider"></div>

    <!-- Notícias mobile -->
    <section class="p-3 bg-white" style="border-bottom:1px solid var(--lea-border);">
      <div class="d-flex align-items-baseline justify-content-between mb-2">
        <h2 class="sec-title">Notícias</h2>
        <a class="sec-link" href="noticias.html">Ver mais →</a>
      </div>
      <div class="d-flex flex-column gap-2">
        <div class="news-item-mobile">
          <div class="news-dot" style="background:#E8F0FB;color:#2563B0;"><i class="ti ti-microphone"></i></div>
          <div><div class="news-title">Yuri da Cunha reafirma compromisso com a cultura angolana</div><div class="news-date">Mar 2025</div></div>
        </div>
        <div class="news-item-mobile is-ad">
          <div class="news-dot" style="background:#F1EFE8;color:#888;"><i class="ti ti-ad"></i></div>
          <div><span class="ad-pill d-inline-block mb-1">Pub</span><div class="news-title">Multicaixa Express — transfere em segundos</div><div class="news-date">Patrocinado · EMIS</div></div>
        </div>
        <div class="news-item-mobile">
          <div class="news-dot" style="background:#E1F5EE;color:#1D9E75;"><i class="ti ti-music"></i></div>
          <div><div class="news-title">Phil Collins fala sobre saúde e regresso à música</div><div class="news-date">Jan 2026</div></div>
        </div>
        <div class="news-item-mobile">
          <div class="news-dot" style="background:#E8F0FB;color:#2563B0;"><i class="ti ti-calendar-event"></i></div>
          <div><div class="news-title">Novos artistas adicionados esta semana</div><div class="news-date">Mai 2026</div></div>
        </div>
      </div>
    </section>

    <!-- AD banner rodapé mobile -->
    <div class="ad-banner-bottom-mobile">
      <span class="ad-pill">Pub</span>
      <div class="ad-banner-mobile-inner" style="max-width:320px;">
        <div class="ad-thumb-sm" style="background:var(--lea-blue-dark);">ZP</div>
        <div class="ad-banner-copy">
          <strong>Zap Imóveis · Encontra a tua casa</strong>
          <span>zap.co.ao</span>
        </div>
      </div>
    </div>

  </div><!-- /mobile-only -->


  <!-- =============================================
       TESTEMUNHOS — ambos os layouts
       ============================================= -->
  <section class="testimonials-section">
    <div class="container">
      <div class="text-center mb-4">
        <span class="section-eyebrow">O que dizem de nós</span>
        <h2>Vozes da nossa comunidade</h2>
        <p class="section-sub">Artistas, fãs e parceiros que fazem parte do LEA</p>
      </div>
      <div class="row g-3">
        <div class="col-md-4">
          <div class="testimonial-card d-flex flex-column gap-3 h-100">
            <div class="t-stars">★★★★★</div>
            <p class="t-quote mb-0">O LEA deu-me visibilidade que nunca tive noutro lugar. Hoje recebo mensagens de fãs de todo o país graças à minha página aqui.</p>
            <div class="d-flex align-items-center gap-2 mt-auto"><div class="t-avatar" style="background:#1D9E75;">MK</div><div><div class="t-name">Mamborró</div><div class="t-role">Cantor · Kwanza-Sul</div></div></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="testimonial-card d-flex flex-column gap-3 h-100">
            <div class="t-stars">★★★★★</div>
            <p class="t-quote mb-0">Finalmente existe uma plataforma que respeita a arte angolana. Encontrei aqui realizadores com quem colaborei em projetos incríveis.</p>
            <div class="d-flex align-items-center gap-2 mt-auto"><div class="t-avatar" style="background:#534AB7;">TP</div><div><div class="t-name">TP Films</div><div class="t-role">Realizador · Huambo</div></div></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="testimonial-card d-flex flex-column gap-3 h-100">
            <div class="t-stars">★★★★☆</div>
            <p class="t-quote mb-0">Uso o LEA para descobrir novos artistas angolanos. A diversidade de conteúdos — música, literatura, cinema — é impressionante para uma plataforma nacional.</p>
            <div class="d-flex align-items-center gap-2 mt-auto"><div class="t-avatar" style="background:#3B7DD8;">AC</div><div><div class="t-name">Ana Cardoso</div><div class="t-role">Utilizadora · Luanda</div></div></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="testimonial-card d-flex flex-column gap-3 h-100">
            <div class="t-stars">★★★★★</div>
            <p class="t-quote mb-0">Registei-me há dois anos e a minha carreira como escritora cresceu muito. O LEA conecta-nos a leitores que de outro modo nunca nos encontrariam.</p>
            <div class="d-flex align-items-center gap-2 mt-auto"><div class="t-avatar" style="background:#C07A1A;">LF</div><div><div class="t-name">Lwinizia Fernandes</div><div class="t-role">Escritora · Benguela</div></div></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="testimonial-card d-flex flex-column gap-3 h-100">
            <div class="t-stars">★★★★★</div>
            <p class="t-quote mb-0">O LEA é a referência digital da cultura angolana. Parceria natural para qualquer marca que queira estar perto das artes e da juventude do país.</p>
            <div class="d-flex align-items-center gap-2 mt-auto"><div class="t-avatar" style="background:#1A4A8A;">BF</div><div><div class="t-name">Bruno Figueiredo</div><div class="t-role">Gestor de Marketing · BAI</div></div></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="testimonial-card d-flex flex-column gap-3 h-100">
            <div class="t-stars">★★★★★</div>
            <p class="t-quote mb-0">Mostrei o meu trabalho fotográfico aqui e recebi convites para exposições em Luanda e no Lubango. A plataforma abriu-me portas que nem imaginava.</p>
            <div class="d-flex align-items-center gap-2 mt-auto"><div class="t-avatar" style="background:#1D9E75;">JS</div><div><div class="t-name">João Sebastião</div><div class="t-role">Fotógrafo · Lubango</div></div></div>
          </div>
        </div>
      </div>
      <div class="text-center mt-5">
        <p style="font-size:13px;color:var(--lea-muted);margin-bottom:12px;">Junta-te a mais de 2.000 artistas que já fazem parte do LEA</p>
        <button class="testimonials-cta">Registar o meu perfil grátis</button>
      </div>
    </div>
  </section>


  <!-- =============================================
       FOOTER — ambos os layouts
       FIX: padding-bottom em mobile para não ficar
       atrás da bottom nav
       ============================================= -->
  <footer class="lea-footer py-3 px-4">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
      <div class="footer-brand d-flex align-items-center gap-2">
        <img src="assets/img/logo.png" alt="LEA" height="24">
        <small class="text-muted fw-normal" style="font-size:11px;">© 2017–2026</small>
      </div>
      <div class="d-flex gap-3 flex-wrap">
        <a class="footer-link" href="#">Sobre nós</a>
        <a class="footer-link" href="#">Contactos</a>
        <a class="footer-link" href="#">Privacidade</a>
        <a class="footer-link" href="#">Termos</a>
        <a class="footer-link" href="#">Publicitar</a>
      </div>
      <div class="d-flex gap-3">
        <a class="footer-social" href="#"><i class="ti ti-brand-instagram"></i></a>
        <a class="footer-social" href="#"><i class="ti ti-brand-facebook"></i></a>
        <a class="footer-social" href="#"><i class="ti ti-brand-youtube"></i></a>
        <a class="footer-social" href="#"><i class="ti ti-brand-whatsapp"></i></a>
        <a class="footer-social" href="#"><i class="ti ti-brand-telegram"></i></a>
      </div>
    </div>
  </footer>


  <!-- =============================================
       BOTTOM NAV MOBILE
       ============================================= -->
  <nav class="bottom-nav" id="bottomNav">
    <a class="bnav-item active" href="index.html">
      <i class="ti ti-home"></i>
      <span class="bnav-lbl">Início</span>
    </a>
    <a class="bnav-item" href="artistas.html">
      <i class="ti ti-users"></i>
      <span class="bnav-lbl">Artistas</span>
    </a>
    <a class="bnav-item" href="musica.html">
      <i class="ti ti-music"></i>
      <span class="bnav-lbl">Músicas</span>
    </a>
    <a class="bnav-item" href="loja.html">
      <i class="ti ti-shopping-bag"></i>
      <span class="bnav-lbl">Loja</span>
    </a>
    <button class="bnav-item" id="btnOpenMenu" style="background:none;border:none;">
      <i class="ti ti-menu-2"></i>
      <span class="bnav-lbl">Menu</span>
    </button>
  </nav>


  <!-- =============================================
       MENU DRAWER MOBILE
       Abre ao clicar "Menu" na bottom nav
       ============================================= -->
  <div class="menu-drawer" id="menuDrawer">
    <div class="menu-overlay" id="menuOverlay"></div>
    <div class="menu-panel">

      <div class="menu-handle"></div>

      <div class="menu-header">
        <span class="menu-header-title">Menu</span>
        <button class="btn-close-menu" id="btnCloseMenu">
          <i class="ti ti-x"></i>
        </button>
      </div>

      <!-- Páginas principais -->
      <div class="menu-section-title">Navegar</div>
      <a class="menu-item" href="index.html">
        <i class="ti ti-home"></i>
        <div><div class="menu-item-label">Início</div><div class="menu-item-sub">Página principal do LEA</div></div>
      </a>
      <a class="menu-item" href="artistas.html">
        <i class="ti ti-users"></i>
        <div><div class="menu-item-label">Artistas</div><div class="menu-item-sub">2.200+ artistas angolanos</div></div>
      </a>
      <a class="menu-item" href="musica.html">
        <i class="ti ti-music"></i>
        <div><div class="menu-item-label">Músicas</div><div class="menu-item-sub">Ouve e descarrega</div></div>
      </a>
      <a class="menu-item" href="videos.html">
        <i class="ti ti-video"></i>
        <div><div class="menu-item-label">Vídeos</div><div class="menu-item-sub">Clipes, filmes e séries</div></div>
      </a>
      <a class="menu-item" href="literatura.html">
        <i class="ti ti-book"></i>
        <div><div class="menu-item-label">Literatura</div><div class="menu-item-sub">Livros, poesias e frases</div></div>
      </a>
      <a class="menu-item" href="noticias.html">
        <i class="ti ti-news"></i>
        <div><div class="menu-item-label">Notícias</div><div class="menu-item-sub">Angola em dia</div></div>
      </a>
      <a class="menu-item" href="eventos.html">
        <i class="ti ti-calendar-event"></i>
        <div><div class="menu-item-label">Eventos</div><div class="menu-item-sub">Agenda cultural angolana</div></div>
      </a>
      <a class="menu-item" href="loja.html">
        <i class="ti ti-shopping-bag"></i>
        <div><div class="menu-item-label">Loja</div><div class="menu-item-sub">Livros, CDs, ingressos e mais</div></div>
      </a>

      <!-- Conta -->
      <div class="menu-section-title">Conta</div>
      <a class="menu-item" href="#">
        <i class="ti ti-user-circle"></i>
        <div><div class="menu-item-label">Entrar</div><div class="menu-item-sub">Aceder à minha conta</div></div>
      </a>
      <a class="menu-item" href="#">
        <i class="ti ti-rosette-discount-check"></i>
        <div><div class="menu-item-label">Certificar artista</div><div class="menu-item-sub">Destaca-te na plataforma</div></div>
      </a>

      <!-- Redes sociais -->
      <div class="menu-section-title">Redes sociais</div>
      <div class="menu-social">
        <a href="#"><i class="ti ti-brand-instagram"></i></a>
        <a href="#"><i class="ti ti-brand-facebook"></i></a>
        <a href="#"><i class="ti ti-brand-youtube"></i></a>
        <a href="#"><i class="ti ti-brand-whatsapp"></i></a>
        <a href="#"><i class="ti ti-brand-telegram"></i></a>
      </div>

      <button class="btn-menu-entrar">Entrar na minha conta</button>

    </div>
  </div>


  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.links.js"></script>
  
  <script>
    const drawer  = document.getElementById('menuDrawer');
    const overlay = document.getElementById('menuOverlay');
    const btnOpen = document.getElementById('btnOpenMenu');
    const btnClose = document.getElementById('btnCloseMenu');

    function openMenu() {
      drawer.classList.add('open');
      document.body.style.overflow = 'hidden';
    }
    function closeMenu() {
      drawer.classList.remove('open');
      document.body.style.overflow = '';
    }

    btnOpen.addEventListener('click', openMenu);
    btnClose.addEventListener('click', closeMenu);
    overlay.addEventListener('click', closeMenu);

    // Fechar ao clicar em qualquer link do menu
    drawer.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', closeMenu);
    });
  </script>

</body>
</html>