<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LEA Eventos — Agenda Cultural Angolana</title>

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/menu.footer.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.19.0/dist/tabler-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">

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
    body { font-family: 'DM Sans', sans-serif; background: var(--lea-surface); color: var(--lea-text); margin: 0; }
    h1,h2,h3,h4,h5 { font-family: 'Sora', sans-serif; }

    /* ── Navbar ── */
    .navbar { border-bottom: 1px solid var(--lea-border); }
    .navbar-brand { font-size: 22px; font-weight: 600; letter-spacing: -0.5px; color: var(--lea-text) !important; }
    .nav-link { font-size: 13px; color: var(--lea-muted) !important; padding: 4px 10px !important; border-radius: 6px; }
    .nav-link:hover, .nav-link.active { color: var(--lea-blue) !important; background-color: var(--lea-blue-light); }
    .lea-search { font-size: 12px; color: var(--lea-muted); background: var(--lea-surface); border: 1px solid rgba(37,99,176,0.2); border-radius: 8px; padding: 6px 12px; min-width: 160px; cursor: pointer; }
    .btn-lea { background-color: var(--lea-blue); color: #fff; border: none; border-radius: 8px; font-size: 13px; font-weight: 500; padding: 8px 18px; transition: background .15s; cursor: pointer; }
    .btn-lea:hover { background-color: var(--lea-blue-dark); color: #fff; }
    .btn-lea-sm { background-color: var(--lea-blue); color: #fff; border: none; border-radius: 6px; font-size: 12px; font-weight: 500; padding: 6px 14px; transition: background .15s; white-space: nowrap; cursor: pointer; }
    .btn-lea-sm:hover { background-color: var(--lea-blue-dark); }
    .btn-outline-lea { background: transparent; color: var(--lea-blue); border: 1px solid var(--lea-blue); border-radius: 8px; font-size: 12px; font-weight: 500; padding: 6px 14px; transition: all .15s; cursor: pointer; white-space: nowrap; }
    .btn-outline-lea:hover { background: var(--lea-blue); color: #fff; }

    /* ── Ad pill ── */
    .ad-pill { font-size: 9px; letter-spacing: .5px; text-transform: uppercase; color: #bbb; border: 1px solid #ddd; border-radius: 4px; padding: 2px 6px; flex-shrink: 0; }
    .ann { font-size: 10px; color: var(--lea-blue); display: flex; align-items: center; gap: 4px; margin-bottom: 5px; }

    /* =============================================
       HERO
       ============================================= */
    .events-hero {
      background: linear-gradient(135deg, #0D1B2E 0%, var(--lea-blue-dark) 50%, var(--lea-blue) 100%);
      padding: 48px 0 32px;
      position: relative; overflow: hidden;
    }
    .events-hero::before {
      content: '';
      position: absolute; inset: 0;
      background:
        radial-gradient(ellipse 60% 80% at 80% 20%, rgba(83,75,183,0.2) 0%, transparent 60%),
        radial-gradient(ellipse 40% 60% at 5% 90%,  rgba(0,0,0,0.2) 0%, transparent 60%);
      pointer-events: none;
    }
    .events-hero .container { position: relative; z-index: 2; }

    .hero-eyebrow { display: inline-flex; align-items: center; gap: 8px; font-size: 11px; font-weight: 600; letter-spacing: 1.5px; text-transform: uppercase; color: rgba(255,255,255,0.6); margin-bottom: 10px; }
    .hero-eyebrow::before { content: ''; width: 20px; height: 2px; background: rgba(255,255,255,0.45); border-radius: 1px; }
    .events-hero h1 { font-size: clamp(24px, 4vw, 42px); font-weight: 700; color: #fff; line-height: 1.15; margin-bottom: 8px; }
    .events-hero h1 em { font-style: normal; color: rgba(255,255,255,0.5); }
    .events-hero p { font-size: 14px; color: rgba(255,255,255,0.65); line-height: 1.65; max-width: 480px; margin-bottom: 22px; }

    /* Search bar */
    .hero-search-wrap { display: flex; gap: 8px; max-width: 520px; }
    .hero-search { flex: 1; display: flex; align-items: center; background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.2); border-radius: 10px; padding: 10px 16px; gap: 10px; }
    .hero-search:focus-within { background: rgba(255,255,255,0.18); border-color: rgba(255,255,255,0.4); }
    .hero-search input { background: none; border: none; outline: none; font-size: 14px; color: #fff; flex: 1; font-family: 'DM Sans', sans-serif; }
    .hero-search input::placeholder { color: rgba(255,255,255,0.45); }
    .hero-search i { font-size: 18px; color: rgba(255,255,255,0.5); }
    .btn-hero-search { background: #fff; color: var(--lea-blue); border: none; border-radius: 10px; font-size: 13px; font-weight: 700; padding: 10px 20px; cursor: pointer; white-space: nowrap; transition: opacity .15s; }
    .btn-hero-search:hover { opacity: .88; }

    /* Stats bar */
    .hero-stats { display: flex; gap: 28px; margin-top: 28px; flex-wrap: wrap; }
    .hstat { }
    .hstat-num { font-family: 'Sora', sans-serif; font-size: 22px; font-weight: 700; color: #fff; }
    .hstat-lbl { font-size: 11px; color: rgba(255,255,255,0.5); }

    /* =============================================
       FILTER BAR — categorias
       ============================================= */
    .filter-bar {
      background: var(--lea-white);
      border-bottom: 1px solid var(--lea-border);
      padding: 0 20px;
      display: flex; align-items: center;
      overflow-x: auto;
      position: sticky; top: 50px; z-index: 90;
    }
    .filter-bar::-webkit-scrollbar { height: 0; }
    .filter-tab {
      font-size: 13px; font-weight: 500; color: var(--lea-muted);
      padding: 13px 14px; border-bottom: 2px solid transparent;
      cursor: pointer; white-space: nowrap; transition: all .15s;
      text-decoration: none; display: block;
    }
    .filter-tab:hover { color: var(--lea-text); }
    .filter-tab.active { color: var(--lea-blue); border-bottom-color: var(--lea-blue); }
    .filter-right { margin-left: auto; display: flex; align-items: center; gap: 8px; padding: 8px 0; flex-shrink: 0; }
    .filter-select { background: var(--lea-surface); border: 1px solid var(--lea-border); border-radius: 8px; color: var(--lea-muted); font-size: 12px; padding: 6px 10px; cursor: pointer; outline: none; font-family: 'DM Sans', sans-serif; }

    /* =============================================
       LAYOUT — sidebar + main
       ============================================= */
    .page-layout { display: grid; grid-template-columns: 200px 1fr; gap: 0; }

    /* Sidebar */
    .page-sidebar {
      background: var(--lea-white);
      border-right: 1px solid var(--lea-border);
      padding: 20px 14px;
      position: sticky; top: 105px;
      height: calc(100vh - 105px);
      overflow-y: auto;
    }
    .page-sidebar::-webkit-scrollbar { width: 3px; }
    .page-sidebar::-webkit-scrollbar-thumb { background: var(--lea-border); border-radius: 2px; }

    .sidebar-section { margin-bottom: 22px; }
    .sidebar-section-title { font-size: 10px; font-weight: 700; letter-spacing: .7px; text-transform: uppercase; color: #bbb; margin-bottom: 10px; }

    .sidebar-item {
      display: flex; align-items: center; justify-content: space-between;
      padding: 7px 8px; border-radius: 8px; cursor: pointer;
      transition: background .12s; text-decoration: none;
    }
    .sidebar-item:hover { background: var(--lea-surface); }
    .sidebar-item.active { background: var(--lea-blue-light); }
    .sidebar-item-label { font-size: 13px; color: var(--lea-muted); display: flex; align-items: center; gap: 8px; }
    .sidebar-item-label i { font-size: 15px; color: var(--lea-blue); }
    .sidebar-item.active .sidebar-item-label { color: var(--lea-blue); font-weight: 500; }
    .sidebar-item-count { font-size: 10px; color: #bbb; background: var(--lea-surface); padding: 1px 6px; border-radius: 99px; }
    .sidebar-item.active .sidebar-item-count { background: var(--lea-blue-light); color: var(--lea-blue); }

    /* Province checkboxes */
    .province-check { display: flex; align-items: center; gap: 8px; padding: 6px 8px; border-radius: 6px; cursor: pointer; transition: background .12s; }
    .province-check:hover { background: var(--lea-surface); }
    .province-check input { accent-color: var(--lea-blue); }
    .province-check label { font-size: 12px; color: var(--lea-muted); cursor: pointer; }

    /* Ad sidebar block */
    .ad-block-sidebar { background: var(--lea-surface); border: 1px dashed #ccd9ef; border-radius: 10px; min-height: 120px; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; padding: 16px; gap: 4px; }
    .ad-size { font-size: 13px; font-weight: 600; color: #c0cfe8; }
    .ad-type { font-size: 10px; color: #c0cfe8; }

    /* =============================================
       MAIN CONTENT
       ============================================= */
    .page-main { padding: 24px; background: var(--lea-surface); min-width: 0; }

    .sec-hdr { display: flex; align-items: baseline; justify-content: space-between; margin-bottom: 16px; }
    .sec-hdr h2 { font-size: 15px; font-weight: 700; margin: 0; }
    .sec-link { font-size: 12px; color: var(--lea-blue); text-decoration: none; }
    .sec-link:hover { text-decoration: underline; }

    /* =============================================
       EVENTO DESTAQUE — Computicket style
       ============================================= */
    .featured-event-card {
      border-radius: 16px; overflow: hidden;
      background: var(--lea-white);
      border: 1px solid var(--lea-border);
      margin-bottom: 28px;
      display: grid;
      grid-template-columns: 1fr 320px;
    }

    .fec-image {
      position: relative; min-height: 280px;
      display: flex; align-items: flex-end;
      padding: 20px;
    }
    .fec-image-bg {
      position: absolute; inset: 0;
      background-size: cover; background-position: center;
    }
    .fec-image-gradient {
      position: absolute; inset: 0;
      background: linear-gradient(to right, rgba(0,0,0,0.65) 0%, rgba(0,0,0,0.2) 60%, transparent 100%);
    }
    .fec-image-content { position: relative; z-index: 2; }
    .fec-cat-badge {
      display: inline-flex; align-items: center; gap: 5px;
      font-size: 10px; font-weight: 700; letter-spacing: .4px; text-transform: uppercase;
      background: rgba(255,255,255,0.2); color: #fff;
      padding: 4px 10px; border-radius: 99px; margin-bottom: 8px;
      backdrop-filter: blur(4px);
    }
    .fec-title { font-size: 24px; font-weight: 700; color: #fff; line-height: 1.2; margin-bottom: 4px; }
    .fec-artist { font-size: 14px; color: rgba(255,255,255,0.75); margin-bottom: 10px; }
    .fec-meta { display: flex; flex-wrap: wrap; gap: 10px; }
    .fec-meta-item { display: flex; align-items: center; gap: 5px; font-size: 12px; color: rgba(255,255,255,0.8); }
    .fec-meta-item i { font-size: 13px; color: rgba(255,255,255,0.6); }

    /* Painel direito do featured */
    .fec-panel {
      padding: 24px; display: flex; flex-direction: column; justify-content: space-between;
      border-left: 1px solid var(--lea-border);
    }
    .fec-panel-top { }
    .fec-price-label { font-size: 11px; font-weight: 600; color: var(--lea-muted); text-transform: uppercase; letter-spacing: .4px; margin-bottom: 4px; }
    .fec-price { font-family: 'Sora', sans-serif; font-size: 28px; font-weight: 700; color: var(--lea-text); margin-bottom: 4px; }
    .fec-price .currency { font-size: 14px; font-weight: 500; color: var(--lea-muted); }
    .fec-availability { font-size: 12px; color: var(--lea-teal); font-weight: 500; margin-bottom: 18px; }

    /* Countdown no painel */
    .fec-countdown-label { font-size: 11px; font-weight: 600; color: var(--lea-muted); text-transform: uppercase; letter-spacing: .4px; margin-bottom: 8px; }
    .fec-countdown { display: grid; grid-template-columns: repeat(4,1fr); gap: 6px; margin-bottom: 20px; }
    .fec-cdown-unit { background: var(--lea-surface); border: 1px solid var(--lea-border); border-radius: 8px; padding: 10px 6px; text-align: center; }
    .fec-cdown-num { font-family: 'Sora', sans-serif; font-size: 22px; font-weight: 700; color: var(--lea-blue); line-height: 1; }
    .fec-cdown-lbl { font-size: 9px; color: var(--lea-muted); text-transform: uppercase; letter-spacing: .4px; margin-top: 2px; }

    .btn-buy-main { display: block; width: 100%; background: var(--lea-blue); color: #fff; border: none; border-radius: 10px; font-size: 14px; font-weight: 700; padding: 13px; cursor: pointer; transition: background .15s; text-align: center; text-decoration: none; margin-bottom: 8px; }
    .btn-buy-main:hover { background: var(--lea-blue-dark); color: #fff; }
    .btn-remind { display: block; width: 100%; background: var(--lea-surface); color: var(--lea-muted); border: 1px solid var(--lea-border); border-radius: 10px; font-size: 13px; font-weight: 500; padding: 10px; cursor: pointer; transition: all .15s; text-align: center; }
    .btn-remind:hover { border-color: var(--lea-blue); color: var(--lea-blue); }

    /* Galeria miniaturas */
    .fec-gallery { display: flex; gap: 6px; margin-top: 16px; }
    .fec-thumb {
      flex: 1; height: 52px; border-radius: 8px; cursor: pointer;
      display: flex; align-items: center; justify-content: center;
      font-size: 18px; color: rgba(255,255,255,0.7);
      position: relative; overflow: hidden;
      transition: transform .15s;
    }
    .fec-thumb:hover { transform: scale(1.05); }
    .fec-thumb-more {
      flex: 1; height: 52px; border-radius: 8px; cursor: pointer;
      background: rgba(0,0,0,0.55); display: flex; align-items: center; justify-content: center;
      font-size: 12px; font-weight: 700; color: #fff;
      position: relative; overflow: hidden;
    }

    /* =============================================
       AD LEADERBOARD
       ============================================= */
    .ad-leaderboard { background: var(--lea-white); border: 1px dashed #ccd9ef; border-radius: 12px; padding: 12px 16px; display: flex; align-items: center; gap: 14px; margin-bottom: 28px; }
    .ad-lb-thumb { width: 52px; height: 38px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 700; color: #fff; flex-shrink: 0; }
    .ad-lb-copy { flex: 1; }
    .ad-lb-copy strong { font-size: 13px; font-weight: 500; color: var(--lea-text); }
    .ad-lb-copy span { font-size: 11px; color: var(--lea-muted); }

    /* =============================================
       EVENT CARDS — Computicket style
       ============================================= */
    .events-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 16px; margin-bottom: 28px; }

    .event-card {
      background: var(--lea-white); border: 1px solid var(--lea-border);
      border-radius: 14px; overflow: hidden;
      transition: transform .2s, box-shadow .2s;
      cursor: pointer; display: flex; flex-direction: column;
      text-decoration: none;
    }
    .event-card:hover { transform: translateY(-4px); box-shadow: 0 10px 28px rgba(37,99,176,0.12); }

    /* Imagem do card */
    .ec-image {
      position: relative; height: 160px;
      display: flex; align-items: flex-start;
    }
    .ec-image-bg {
      position: absolute; inset: 0;
      background-size: cover; background-position: center;
    }
    .ec-image-overlay {
      position: absolute; inset: 0;
      background: linear-gradient(to bottom, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0.55) 100%);
    }

    /* Data sobreposta — estilo Computicket */
    .ec-date-badge {
      position: absolute; top: 10px; left: 10px; z-index: 2;
      background: #fff; border-radius: 8px;
      padding: 5px 10px; text-align: center;
      box-shadow: 0 2px 8px rgba(0,0,0,0.18);
      min-width: 44px;
    }
    .ec-date-day { font-family: 'Sora', sans-serif; font-size: 18px; font-weight: 700; color: var(--lea-blue); line-height: 1; }
    .ec-date-month { font-size: 9px; font-weight: 700; text-transform: uppercase; letter-spacing: .4px; color: var(--lea-muted); }

    /* Badge categoria */
    .ec-cat-badge {
      position: absolute; top: 10px; right: 10px; z-index: 2;
      font-size: 9px; font-weight: 700; letter-spacing: .3px; text-transform: uppercase;
      padding: 3px 9px; border-radius: 99px; color: #fff;
    }

    /* Wishlist */
    .ec-wishlist {
      position: absolute; bottom: 10px; right: 10px; z-index: 2;
      width: 28px; height: 28px; border-radius: 50%;
      background: rgba(255,255,255,0.9); border: none;
      display: flex; align-items: center; justify-content: center;
      font-size: 14px; color: var(--lea-muted); cursor: pointer; transition: all .15s;
    }
    .ec-wishlist:hover { color: #EF4444; }
    .ec-wishlist.active { color: #EF4444; }

    /* Corpo do card */
    .ec-body { padding: 12px 14px; flex: 1; display: flex; flex-direction: column; }
    .ec-title { font-size: 14px; font-weight: 600; color: var(--lea-text); line-height: 1.3; margin-bottom: 3px; }
    .ec-subtitle { font-size: 12px; color: var(--lea-muted); margin-bottom: 8px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .ec-info { display: flex; flex-direction: column; gap: 4px; margin-bottom: 10px; }
    .ec-info-item { display: flex; align-items: center; gap: 6px; font-size: 11px; color: var(--lea-muted); }
    .ec-info-item i { font-size: 13px; color: var(--lea-blue); flex-shrink: 0; }

    /* Footer do card */
    .ec-footer { display: flex; align-items: center; justify-content: space-between; padding-top: 10px; border-top: 1px solid var(--lea-border); margin-top: auto; }
    .ec-price { font-family: 'Sora', sans-serif; font-size: 15px; font-weight: 700; color: var(--lea-text); }
    .ec-price .currency { font-size: 10px; font-weight: 500; color: var(--lea-muted); }
    .ec-price-free { font-size: 13px; font-weight: 700; color: var(--lea-teal); }
    .btn-ec-ticket { font-size: 11px; font-weight: 600; background: var(--lea-blue); color: #fff; border: none; border-radius: 8px; padding: 7px 14px; cursor: pointer; transition: background .15s; white-space: nowrap; }
    .btn-ec-ticket:hover { background: var(--lea-blue-dark); }
    .btn-ec-free { font-size: 11px; font-weight: 600; background: var(--lea-teal); color: #fff; border: none; border-radius: 8px; padding: 7px 14px; cursor: pointer; }

    /* Cores por categoria */
    .cat-festival  { background: #7C3AED; }
    .cat-concerto  { background: var(--lea-blue); }
    .cat-festa     { background: #DB2777; }
    .cat-show      { background: #9D174D; }
    .cat-palestra  { background: var(--lea-teal); }
    .cat-conf      { background: #0D6B4E; }
    .cat-teatro    { background: #374151; }
    .cat-humor     { background: #C07A1A; }
    .cat-workshop  { background: #3B7DD8; }
    .cat-lancamento{ background: var(--lea-purple); }
    .cat-exposicao { background: #1D9E75; }

    /* =============================================
       LISTA COMPACTA DE EVENTOS
       ============================================= */
    .events-list { display: flex; flex-direction: column; gap: 10px; margin-bottom: 28px; }

    .event-list-item {
      background: var(--lea-white); border: 1px solid var(--lea-border);
      border-radius: 12px; overflow: hidden;
      display: grid; grid-template-columns: 72px 1fr auto;
      transition: border-color .15s, box-shadow .15s;
      text-decoration: none;
    }
    .event-list-item:hover { border-color: var(--lea-blue); box-shadow: 0 2px 12px rgba(37,99,176,0.08); }

    .eli-date {
      display: flex; flex-direction: column; align-items: center; justify-content: center;
      padding: 14px 6px; gap: 1px;
    }
    .eli-day { font-family: 'Sora', sans-serif; font-size: 24px; font-weight: 700; color: #fff; line-height: 1; }
    .eli-month { font-size: 9px; font-weight: 700; text-transform: uppercase; letter-spacing: .5px; color: rgba(255,255,255,0.75); }
    .eli-weekday { font-size: 9px; color: rgba(255,255,255,0.5); margin-top: 1px; }

    .eli-body { padding: 12px 14px; border-left: 1px solid var(--lea-border); min-width: 0; }
    .eli-cat { display: inline-flex; align-items: center; gap: 4px; font-size: 9px; font-weight: 700; letter-spacing: .4px; text-transform: uppercase; padding: 2px 8px; border-radius: 99px; margin-bottom: 4px; }
    .eli-title { font-size: 13px; font-weight: 600; color: var(--lea-text); margin-bottom: 2px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .eli-sub { font-size: 11px; color: var(--lea-muted); margin-bottom: 6px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .eli-meta { display: flex; flex-wrap: wrap; gap: 8px; }
    .eli-meta-item { display: flex; align-items: center; gap: 4px; font-size: 11px; color: var(--lea-muted); }
    .eli-meta-item i { font-size: 12px; color: var(--lea-blue); }

    .eli-action { padding: 14px 14px; display: flex; flex-direction: column; align-items: flex-end; justify-content: center; gap: 6px; border-left: 1px solid var(--lea-border); min-width: 110px; }
    .eli-price { font-family: 'Sora', sans-serif; font-size: 15px; font-weight: 700; color: var(--lea-text); }
    .eli-price .currency { font-size: 10px; font-weight: 500; color: var(--lea-muted); }
    .eli-price-free { font-size: 13px; font-weight: 700; color: var(--lea-teal); }
    .btn-eli { font-size: 11px; font-weight: 600; background: var(--lea-blue); color: #fff; border: none; border-radius: 7px; padding: 6px 12px; cursor: pointer; white-space: nowrap; transition: background .15s; text-decoration: none; display: inline-block; }
    .btn-eli:hover { background: var(--lea-blue-dark); color: #fff; }
    .btn-eli-free { font-size: 11px; font-weight: 600; background: var(--lea-teal); color: #fff; border: none; border-radius: 7px; padding: 6px 12px; cursor: pointer; }

    /* Status badges */
    .status-pill { font-size: 9px; font-weight: 700; padding: 2px 7px; border-radius: 99px; }
    .status-available { background: #D1FAE5; color: #059669; }
    .status-limited   { background: #FEF3C7; color: #D97706; }
    .status-soldout   { background: #F3F4F6; color: #9CA3AF; }
    .status-free-pill { background: #D1FAE5; color: #059669; }

    /* =============================================
       PAGINATION
       ============================================= */
    .lea-pagination { display: flex; align-items: center; gap: 4px; }
    .page-btn { width: 36px; height: 36px; border-radius: 8px; background: var(--lea-white); border: 1px solid var(--lea-border); color: var(--lea-muted); font-size: 13px; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all .12s; text-decoration: none; }
    .page-btn:hover { background: var(--lea-blue-light); color: var(--lea-blue); border-color: var(--lea-blue); }
    .page-btn.active { background: var(--lea-blue); color: #fff; border-color: var(--lea-blue); font-weight: 700; }

    /* =============================================
       FOOTER — igual ao resto do site
       ============================================= */
    .lea-footer { background: var(--lea-white); border-top: 1px solid var(--lea-border); }
    .footer-brand { font-family: 'Sora', sans-serif; font-size: 16px; font-weight: 600; color: var(--lea-text); }
    .footer-brand span { color: var(--lea-blue); }
    .footer-link { font-size: 12px; color: var(--lea-muted); text-decoration: none; }
    .footer-link:hover { color: var(--lea-blue); }
    .footer-social { color: var(--lea-blue); font-size: 20px; text-decoration: none; transition: opacity .15s; }
    .footer-social:hover { opacity: .7; }

    /* =============================================
       MOBILE
       ============================================= */
    .desktop-only { display: block; }
    .mobile-only  { display: none; }
    .bottom-nav { background: var(--lea-white); border-top: 1px solid var(--lea-border); position: fixed; bottom: 0; left: 0; right: 0; height: 62px; display: none; align-items: center; justify-content: space-around; z-index: 200; padding-bottom: env(safe-area-inset-bottom, 0); }
    .bnav-item { display: flex; flex-direction: column; align-items: center; gap: 3px; font-size: 22px; color: var(--lea-muted); cursor: pointer; text-decoration: none; flex: 1; justify-content: center; transition: color .12s; }
    .bnav-item.active, .bnav-item:hover { color: var(--lea-blue); }
    .bnav-lbl { font-size: 9px; font-weight: 500; font-family: 'DM Sans', sans-serif; }

    @media (max-width: 991px) {
      .desktop-only { display: none !important; }
      .mobile-only  { display: block; }
      .bottom-nav   { display: flex; }
      body          { padding-bottom: 62px; }
      .page-layout  { grid-template-columns: 1fr; }
      .page-sidebar { display: none; }
      .featured-event-card { grid-template-columns: 1fr; }
      .fec-panel { border-left: none; border-top: 1px solid var(--lea-border); }
      .events-grid { grid-template-columns: repeat(2,1fr); gap: 10px; }
      .event-list-item { grid-template-columns: 60px 1fr; }
      .eli-action { display: none; }
    }

    @media (max-width: 480px) {
      .events-grid { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top desktop-only">
    <div class="container-fluid px-4">
      <a class="navbar-brand d-flex align-items-center gap-2" href="index.html">
        <img src="assets/img/logo.png" alt="LEA" height="32">
      </a>
      <button class="navbar-toggler border-0" type="button"
              data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav me-auto mb-0">
          <li class="nav-item"><a class="nav-link" href="index.html">Início</a></li>
          <li class="nav-item"><a class="nav-link" href="artistas.html">Artistas</a></li>
          <li class="nav-item"><a class="nav-link" href="musica.html">Músicas</a></li>
          <li class="nav-item"><a class="nav-link" href="videos.html">Vídeos</a></li>
          <li class="nav-item"><a class="nav-link" href="literatura.html">Literatura</a></li>
		  <li class="nav-item"><a class="nav-link" href="noticias.html">Notícias</a></li>
          <li class="nav-item"><a class="nav-link active" href="eventos.html">Eventos</a></li>
          <li class="nav-item"><a class="nav-link" href="loja.html">Loja</a></li>
        </ul>
        <div class="d-flex align-items-center gap-2 mt-2 mt-lg-0">
          <div class="lea-search d-none d-md-flex align-items-center gap-2">
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
    <a href="#"><img src="assets/img/logo.png" alt="LEA" height="30"></a>
    <div class="d-flex gap-3" style="font-size:20px;color:var(--lea-muted);">
      <i class="ti ti-search"></i>
      <i class="ti ti-bell"></i>
      <i class="ti ti-user-circle"></i>
    </div>
  </header>


  <!-- HERO -->
  <div class="events-hero">
    <div class="container">
      <div class="row align-items-center g-4">
        <div class="col-lg-7">
          <div class="hero-eyebrow">Agenda Cultural de Angola</div>
          <h1>Vive a cultura,<br><em>não a percas</em></h1>
          <p>Concertos, festivais, exposições, lançamentos e muito mais — tudo o que acontece em Angola numa só agenda.</p>
          <div class="hero-search-wrap">
            <div class="hero-search">
              <i class="ti ti-search"></i>
              <input type="text" placeholder="Pesquisar evento, artista ou local…">
            </div>
            <button class="btn-hero-search">Pesquisar</button>
          </div>
          <div class="hero-stats">
            <div class="hstat"><div class="hstat-num">42</div><div class="hstat-lbl">Este mês</div></div>
            <div class="hstat"><div class="hstat-num">18</div><div class="hstat-lbl">Províncias</div></div>
            <div class="hstat"><div class="hstat-num">8</div><div class="hstat-lbl">Gratuitos</div></div>
            <div class="hstat"><div class="hstat-num">11</div><div class="hstat-lbl">Categorias</div></div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- FILTER TABS -->
  <div class="filter-bar">
    <a class="filter-tab active" href="#">Todos</a>
    <a class="filter-tab" href="#">Festival</a>
    <a class="filter-tab" href="#">Concertos</a>
    <a class="filter-tab" href="#">Festas</a>
    <a class="filter-tab" href="#">Shows</a>
    <a class="filter-tab" href="#">Palestras</a>
    <a class="filter-tab" href="#">Conferência</a>
    <a class="filter-tab" href="#">Teatro</a>
    <a class="filter-tab" href="#">Humor</a>
    <a class="filter-tab" href="#">Workshop</a>
    <a class="filter-tab" href="#">Lançamentos</a>
    <a class="filter-tab" href="#">Exposições</a>
    <div class="filter-right">
      <select class="filter-select">
        <option>Mais próximos</option>
        <option>Este fim de semana</option>
        <option>Este mês</option>
        <option>Gratuitos</option>
      </select>
    </div>
  </div>


  <!-- LAYOUT -->
  <div class="page-layout">

    <!-- SIDEBAR -->
    <aside class="page-sidebar desktop-only">

      <div class="sidebar-section">
        <div class="sidebar-section-title">Categoria</div>
        <a class="sidebar-item active" href="#"><span class="sidebar-item-label"><i class="ti ti-layout-grid"></i>Todos</span><span class="sidebar-item-count">42</span></a>
        <a class="sidebar-item" href="#"><span class="sidebar-item-label"><i class="ti ti-confetti"></i>Festival</span><span class="sidebar-item-count">6</span></a>
        <a class="sidebar-item" href="#"><span class="sidebar-item-label"><i class="ti ti-microphone-2"></i>Concertos</span><span class="sidebar-item-count">10</span></a>
        <a class="sidebar-item" href="#"><span class="sidebar-item-label"><i class="ti ti-music"></i>Festas</span><span class="sidebar-item-count">5</span></a>
        <a class="sidebar-item" href="#"><span class="sidebar-item-label"><i class="ti ti-star"></i>Shows</span><span class="sidebar-item-count">4</span></a>
        <a class="sidebar-item" href="#"><span class="sidebar-item-label"><i class="ti ti-speakerphone"></i>Palestras</span><span class="sidebar-item-count">3</span></a>
        <a class="sidebar-item" href="#"><span class="sidebar-item-label"><i class="ti ti-building"></i>Conferência</span><span class="sidebar-item-count">2</span></a>
        <a class="sidebar-item" href="#"><span class="sidebar-item-label"><i class="ti ti-masks-theater"></i>Teatro</span><span class="sidebar-item-count">4</span></a>
        <a class="sidebar-item" href="#"><span class="sidebar-item-label"><i class="ti ti-mood-happy"></i>Humor</span><span class="sidebar-item-count">2</span></a>
        <a class="sidebar-item" href="#"><span class="sidebar-item-label"><i class="ti ti-school"></i>Workshop</span><span class="sidebar-item-count">3</span></a>
        <a class="sidebar-item" href="#"><span class="sidebar-item-label"><i class="ti ti-book"></i>Lançamentos</span><span class="sidebar-item-count">2</span></a>
        <a class="sidebar-item" href="#"><span class="sidebar-item-label"><i class="ti ti-photo"></i>Exposições</span><span class="sidebar-item-count">3</span></a>
      </div>

      <div class="sidebar-section">
        <div class="sidebar-section-title">Província</div>
        <div class="province-check"><input type="checkbox" id="p1" checked><label for="p1">Luanda (28)</label></div>
        <div class="province-check"><input type="checkbox" id="p2"><label for="p2">Huambo (5)</label></div>
        <div class="province-check"><input type="checkbox" id="p3"><label for="p3">Benguela (4)</label></div>
        <div class="province-check"><input type="checkbox" id="p4"><label for="p4">Huíla (3)</label></div>
        <div class="province-check"><input type="checkbox" id="p5"><label for="p5">Malanje (2)</label></div>
        <a href="#" style="font-size:12px;color:var(--lea-blue);text-decoration:none;display:block;padding:6px 8px;">Ver todas →</a>
      </div>

      <div class="sidebar-section">
        <div class="sidebar-section-title">Preço</div>
        <div class="province-check"><input type="radio" name="price" id="pr0" checked><label for="pr0">Todos</label></div>
        <div class="province-check"><input type="radio" name="price" id="pr1"><label for="pr1">Gratuitos</label></div>
        <div class="province-check"><input type="radio" name="price" id="pr2"><label for="pr2">Com ingresso</label></div>
      </div>

      <div class="sidebar-section">
        <div class="ann"><i class="ti ti-ad"></i> 160 × 600</div>
        <div class="ad-block-sidebar" style="min-height:160px;">
          <i class="ti ti-ad" style="font-size:26px;color:#c0cfe8;"></i>
          <div class="ad-size">160 × 600</div>
          <div class="ad-type">Skyscraper Sidebar</div>
        </div>
      </div>

    </aside>


    <!-- MAIN -->
    <main class="page-main">

      <!-- EVENTO EM DESTAQUE -->
      <div class="sec-hdr">
        <h2>⭐ Em destaque</h2>
      </div>

      <div class="featured-event-card">

        <!-- Imagem com info sobreposta -->
        <div class="fec-image">
          <div class="fec-image-bg" style="background:linear-gradient(135deg,#9D174D 0%,#534AB7 100%);"></div>
          <div class="fec-image-gradient"></div>
          <div class="fec-image-content">
            <div class="fec-cat-badge"><i class="ti ti-microphone-2"></i> Concerto</div>
            <div class="fec-title">Prodígio — Noite de Luanda</div>
            <div class="fec-artist">com abertura de Deezy & Al Kapone</div>
            <div class="fec-meta">
              <div class="fec-meta-item"><i class="ti ti-calendar"></i> Sáb, 14 Jun 2026</div>
              <div class="fec-meta-item"><i class="ti ti-clock"></i> 20:00 — 23:30</div>
              <div class="fec-meta-item"><i class="ti ti-map-pin"></i> Centro Cultural · Luanda</div>
              <div class="fec-meta-item"><i class="ti ti-users"></i> 800 lugares</div>
            </div>
          </div>

          <!-- Galeria miniaturas sobre a imagem -->
          <div class="fec-gallery">
            <div class="fec-thumb" style="background:linear-gradient(135deg,#7C3AED,#9D174D);"></div>
            <div class="fec-thumb" style="background:linear-gradient(135deg,#2563B0,#534AB7);"></div>
            <div class="fec-thumb" style="background:linear-gradient(135deg,#1D9E75,#2563B0);"></div>
            <div class="fec-thumb-more" style="background:linear-gradient(135deg,#374151,#1F2937);">+12</div>
          </div>
        </div>

        <!-- Painel de compra -->
        <div class="fec-panel">
          <div class="fec-panel-top">
            <div class="fec-price-label">Preço do ingresso</div>
            <div class="fec-price"><span class="currency">Kz </span>5.000</div>
            <div class="fec-availability">✓ Lugares disponíveis</div>

            <div class="fec-countdown-label">Tempo até ao evento</div>
            <div class="fec-countdown">
              <div class="fec-cdown-unit"><div class="fec-cdown-num" id="fcd-days">--</div><div class="fec-cdown-lbl">Dias</div></div>
              <div class="fec-cdown-unit"><div class="fec-cdown-num" id="fcd-hours">--</div><div class="fec-cdown-lbl">Horas</div></div>
              <div class="fec-cdown-unit"><div class="fec-cdown-num" id="fcd-mins">--</div><div class="fec-cdown-lbl">Min</div></div>
              <div class="fec-cdown-unit"><div class="fec-cdown-num" id="fcd-secs">--</div><div class="fec-cdown-lbl">Seg</div></div>
            </div>
          </div>

          <div>
            <a href="loja.html#ingressos" class="btn-buy-main">
              <i class="ti ti-ticket"></i> Comprar ingresso
            </a>
            <button class="btn-remind" id="btn-remind">
              <i class="ti ti-bell"></i> Lembrar-me deste evento
            </button>
          </div>
        </div>

      </div>


      <!-- AD 1 — LEADERBOARD -->
      <div class="mb-4">
        <div class="ann"><i class="ti ti-ad"></i> Leaderboard 728×90</div>
        <div class="ad-leaderboard">
          <span class="ad-pill">Pub</span>
          <div class="ad-lb-thumb" style="background:var(--lea-blue);">UN</div>
          <div class="ad-lb-copy">
            <strong>Unitel — Plano Ilimitado por Kz 3.500/mês</strong><br>
            <span>Ligação rápida em todo o país · unitel.ao</span>
          </div>
          <button class="btn-lea-sm">Ver oferta</button>
        </div>
      </div>


      <!-- EVENTOS EM CARDS — grelha -->
      <div class="sec-hdr">
        <h2>🔥 Próximos eventos</h2>
        <a class="sec-link" href="#">Ver todos →</a>
      </div>

      <div class="events-grid">

        <!-- Card 1 -->
        <a class="event-card" href="#">
          <div class="ec-image">
            <div class="ec-image-bg" style="background:linear-gradient(135deg,#2563B0,#1D9E75);"></div>
            <div class="ec-image-overlay"></div>
            <div class="ec-date-badge"><div class="ec-date-day">21</div><div class="ec-date-month">Jun</div></div>
            <span class="ec-cat-badge cat-festival">Festival</span>
            <button class="ec-wishlist"><i class="ti ti-heart"></i></button>
          </div>
          <div class="ec-body">
            <div class="ec-title">Festival de Semba 2026</div>
            <div class="ec-subtitle">Nilda Catumbela, Mamborró e mais</div>
            <div class="ec-info">
              <div class="ec-info-item"><i class="ti ti-clock"></i> 15:00 — 00:00</div>
              <div class="ec-info-item"><i class="ti ti-map-pin"></i> Ilha de Luanda</div>
            </div>
            <div class="ec-footer">
              <div><span class="ec-price"><span class="currency">Kz </span>3.500</span></div>
              <button class="btn-ec-ticket">Comprar</button>
            </div>
          </div>
        </a>

        <!-- Card 2 -->
        <a class="event-card" href="#">
          <div class="ec-image">
            <div class="ec-image-bg" style="background:linear-gradient(135deg,#374151,#534AB7);"></div>
            <div class="ec-image-overlay"></div>
            <div class="ec-date-badge"><div class="ec-date-day">22</div><div class="ec-date-month">Jun</div></div>
            <span class="ec-cat-badge cat-teatro">Teatro</span>
            <button class="ec-wishlist"><i class="ti ti-heart"></i></button>
          </div>
          <div class="ec-body">
            <div class="ec-title">O Auto de Compadecida</div>
            <div class="ec-subtitle">Companhia Nacional de Teatro</div>
            <div class="ec-info">
              <div class="ec-info-item"><i class="ti ti-clock"></i> 19:00</div>
              <div class="ec-info-item"><i class="ti ti-map-pin"></i> Teatro Avenida · Luanda</div>
            </div>
            <div class="ec-footer">
              <div><span class="ec-price"><span class="currency">Kz </span>2.500</span></div>
              <button class="btn-ec-ticket">Comprar</button>
            </div>
          </div>
        </a>

        <!-- Card 3 -->
        <a class="event-card" href="#">
          <div class="ec-image">
            <div class="ec-image-bg" style="background:linear-gradient(135deg,#C07A1A,#9D174D);"></div>
            <div class="ec-image-overlay"></div>
            <div class="ec-date-badge"><div class="ec-date-day">28</div><div class="ec-date-month">Jun</div></div>
            <span class="ec-cat-badge cat-humor">Humor</span>
            <button class="ec-wishlist"><i class="ti ti-heart"></i></button>
          </div>
          <div class="ec-body">
            <div class="ec-title">Stand-Up Angola — Vol. 4</div>
            <div class="ec-subtitle">Os melhores comediantes angolanos</div>
            <div class="ec-info">
              <div class="ec-info-item"><i class="ti ti-clock"></i> 20:00</div>
              <div class="ec-info-item"><i class="ti ti-map-pin"></i> Centro Cultural · Luanda</div>
            </div>
            <div class="ec-footer">
              <div><span class="ec-price"><span class="currency">Kz </span>4.000</span></div>
              <button class="btn-ec-ticket">Comprar</button>
            </div>
          </div>
        </a>

        <!-- Card 4 — gratuito -->
        <a class="event-card" href="#">
          <div class="ec-image">
            <div class="ec-image-bg" style="background:linear-gradient(135deg,#1D9E75,#2563B0);"></div>
            <div class="ec-image-overlay"></div>
            <div class="ec-date-badge"><div class="ec-date-day">05</div><div class="ec-date-month">Jul</div></div>
            <span class="ec-cat-badge cat-lancamento">Lançamento</span>
            <button class="ec-wishlist"><i class="ti ti-heart"></i></button>
          </div>
          <div class="ec-body">
            <div class="ec-title">Lançamento — Nkanga: O Filho Maldito</div>
            <div class="ec-subtitle">José Paciência · Sessão de autógrafos</div>
            <div class="ec-info">
              <div class="ec-info-item"><i class="ti ti-clock"></i> 15:00</div>
              <div class="ec-info-item"><i class="ti ti-map-pin"></i> Livraria Lello · Luanda</div>
            </div>
            <div class="ec-footer">
              <div class="ec-price-free">Grátis</div>
              <button class="btn-ec-free">Reservar</button>
            </div>
          </div>
        </a>

        <!-- Card 5 -->
        <a class="event-card" href="#">
          <div class="ec-image">
            <div class="ec-image-bg" style="background:linear-gradient(135deg,#1F2937,#374151);"></div>
            <div class="ec-image-overlay"></div>
            <div class="ec-date-badge"><div class="ec-date-day">19</div><div class="ec-date-month">Jul</div></div>
            <span class="ec-cat-badge cat-show">Show</span>
            <button class="ec-wishlist"><i class="ti ti-heart"></i></button>
          </div>
          <div class="ec-body">
            <div class="ec-title">Noite de Kizomba — Gerilson Israel</div>
            <div class="ec-subtitle">Convidados surpresa · Dress code elegante</div>
            <div class="ec-info">
              <div class="ec-info-item"><i class="ti ti-clock"></i> 21:00</div>
              <div class="ec-info-item"><i class="ti ti-map-pin"></i> Hotel Presidente · Luanda</div>
            </div>
            <div class="ec-footer">
              <div><span class="ec-price"><span class="currency">Kz </span>7.500</span></div>
              <button class="btn-ec-ticket">Comprar</button>
            </div>
          </div>
        </a>

        <!-- Card 6 -->
        <a class="event-card" href="#">
          <div class="ec-image">
            <div class="ec-image-bg" style="background:linear-gradient(135deg,#534AB7,#9D174D);"></div>
            <div class="ec-image-overlay"></div>
            <div class="ec-date-badge"><div class="ec-date-day">25</div><div class="ec-date-month">Jul</div></div>
            <span class="ec-cat-badge cat-concerto">Concerto</span>
            <button class="ec-wishlist"><i class="ti ti-heart"></i></button>
          </div>
          <div class="ec-body">
            <div class="ec-title">Pré-estreia — A Grande Kilapy 4K</div>
            <div class="ec-subtitle">Zézé Gamboa · Q&A após a sessão</div>
            <div class="ec-info">
              <div class="ec-info-item"><i class="ti ti-clock"></i> 19:30</div>
              <div class="ec-info-item"><i class="ti ti-map-pin"></i> Multicine · Luanda</div>
            </div>
            <div class="ec-footer">
              <div><span class="ec-price"><span class="currency">Kz </span>1.800</span></div>
              <button class="btn-ec-ticket">Comprar</button>
            </div>
          </div>
        </a>

      </div>


      <!-- AD 2 — IN-CONTENT NATIVO -->
      <div class="mb-4">
        <div class="ann"><i class="ti ti-ad"></i> In-content nativo</div>
        <div class="ad-leaderboard">
          <span class="ad-pill">Pub</span>
          <div class="ad-lb-thumb" style="background:#1D9E75;">BAI</div>
          <div class="ad-lb-copy">
            <strong>BAI — Paga o teu ingresso com Multicaixa Express</strong><br>
            <span>Transferências instantâneas em toda Angola · bai.ao</span>
          </div>
          <button class="btn-lea-sm" style="background:#1D9E75;">Saber mais</button>
        </div>
      </div>


      <!-- LISTA COMPACTA — mais eventos -->
      <div class="sec-hdr">
        <h2>📅 Mais eventos</h2>
        <a class="sec-link" href="https://lea.co.ao/agenda/toda-agenda.php?strt=0&prco=1" target="_blank">Ver agenda completa →</a>
      </div>

      <div class="events-list">

        <a class="event-list-item" href="#">
          <div class="eli-date" style="background:linear-gradient(135deg,#1D9E75,#0D6B4E);">
            <div class="eli-day">02</div>
            <div class="eli-month">Ago</div>
            <div class="eli-weekday">Dom</div>
          </div>
          <div class="eli-body">
            <span class="eli-cat" style="background:#D1FAE5;color:#059669;">Festival</span>
            <div class="eli-title">Festival do Planalto — Huambo 2026</div>
            <div class="eli-sub">Múltiplos artistas · Música e artes visuais</div>
            <div class="eli-meta">
              <div class="eli-meta-item"><i class="ti ti-clock"></i> 14:00 — 22:00</div>
              <div class="eli-meta-item"><i class="ti ti-map-pin"></i> Praça do Município · Huambo</div>
            </div>
          </div>
          <div class="eli-action">
            <div class="eli-price-free">Grátis</div>
            <button class="btn-eli-free">Reservar</button>
          </div>
        </a>

        <a class="event-list-item" href="#">
          <div class="eli-date" style="background:linear-gradient(135deg,#3B7DD8,#2563B0);">
            <div class="eli-day">09</div>
            <div class="eli-month">Ago</div>
            <div class="eli-weekday">Dom</div>
          </div>
          <div class="eli-body">
            <span class="eli-cat" style="background:#EDE9FE;color:#7C3AED;">Workshop</span>
            <div class="eli-title">Workshop de Fotografia — Técnicas Avançadas</div>
            <div class="eli-sub">João Sebastião · Máx. 20 participantes</div>
            <div class="eli-meta">
              <div class="eli-meta-item"><i class="ti ti-clock"></i> 09:00 — 17:00</div>
              <div class="eli-meta-item"><i class="ti ti-map-pin"></i> Escola de Artes · Luanda</div>
            </div>
          </div>
          <div class="eli-action">
            <div class="eli-price"><span class="currency">Kz </span>6.000</div>
            <a href="loja.html#ingressos" class="btn-eli">Comprar</a>
          </div>
        </a>

        <a class="event-list-item" href="#">
          <div class="eli-date" style="background:linear-gradient(135deg,#C07A1A,#E8A020);">
            <div class="eli-day">15</div>
            <div class="eli-month">Ago</div>
            <div class="eli-weekday">Sáb</div>
          </div>
          <div class="eli-body">
            <span class="eli-cat" style="background:#FEF3C7;color:#D97706;">Palestra</span>
            <div class="eli-title">Palestra — O Futuro da Cultura Digital em Angola</div>
            <div class="eli-sub">Painel com especialistas · Moderação LEA</div>
            <div class="eli-meta">
              <div class="eli-meta-item"><i class="ti ti-clock"></i> 10:00 — 13:00</div>
              <div class="eli-meta-item"><i class="ti ti-map-pin"></i> Hotel Continental · Luanda</div>
            </div>
          </div>
          <div class="eli-action">
            <div class="eli-price-free">Grátis</div>
            <button class="btn-eli-free">Reservar</button>
          </div>
        </a>

        <a class="event-list-item" href="#">
          <div class="eli-date" style="background:linear-gradient(135deg,#9D174D,#DB2777);">
            <div class="eli-day">22</div>
            <div class="eli-month">Ago</div>
            <div class="eli-weekday">Sáb</div>
          </div>
          <div class="eli-body">
            <span class="eli-cat" style="background:#FCE7F3;color:#DB2777;">Festa</span>
            <div class="eli-title">Angola Independence Night — Festa Oficial LEA</div>
            <div class="eli-sub">DJs convidados · Open bar · Dress code branco</div>
            <div class="eli-meta">
              <div class="eli-meta-item"><i class="ti ti-clock"></i> 22:00 — 04:00</div>
              <div class="eli-meta-item"><i class="ti ti-map-pin"></i> Rooftop Central · Luanda</div>
            </div>
          </div>
          <div class="eli-action">
            <div class="eli-price"><span class="currency">Kz </span>8.000</div>
            <a href="loja.html#ingressos" class="btn-eli">Comprar</a>
          </div>
        </a>

        <a class="event-list-item" href="#">
          <div class="eli-date" style="background:linear-gradient(135deg,#0D6B4E,#1D9E75);">
            <div class="eli-day">05</div>
            <div class="eli-month">Set</div>
            <div class="eli-weekday">Sáb</div>
          </div>
          <div class="eli-body">
            <span class="eli-cat" style="background:#D1FAE5;color:#059669;">Exposição</span>
            <div class="eli-title">Exposição — Rostos de Angola</div>
            <div class="eli-sub">Colectivo de Artistas Angolanos · 60 obras</div>
            <div class="eli-meta">
              <div class="eli-meta-item"><i class="ti ti-clock"></i> 10:00 — 19:00</div>
              <div class="eli-meta-item"><i class="ti ti-map-pin"></i> Galeria Nacional · Luanda</div>
            </div>
          </div>
          <div class="eli-action">
            <div class="eli-price-free">Grátis</div>
            <button class="btn-eli-free">Ver detalhes</button>
          </div>
        </a>

        <a class="event-list-item" href="#">
          <div class="eli-date" style="background:linear-gradient(135deg,#374151,#1F2937);">
            <div class="eli-day">20</div>
            <div class="eli-month">Set</div>
            <div class="eli-weekday">Dom</div>
          </div>
          <div class="eli-body">
            <span class="eli-cat" style="background:#E5E7EB;color:#374151;">Conferência</span>
            <div class="eli-title">Conferência Anual de Artes e Cultura — Angola 2026</div>
            <div class="eli-sub">Ministério da Cultura · Inscrições abertas</div>
            <div class="eli-meta">
              <div class="eli-meta-item"><i class="ti ti-clock"></i> 08:30 — 18:00</div>
              <div class="eli-meta-item"><i class="ti ti-map-pin"></i> Palácio de Congressos · Luanda</div>
            </div>
          </div>
          <div class="eli-action">
            <div class="eli-price"><span class="currency">Kz </span>2.000</div>
            <a href="loja.html#ingressos" class="btn-eli">Inscrever</a>
          </div>
        </a>

      </div>


      <!-- PAGINAÇÃO -->
      <div class="d-flex align-items-center justify-content-between">
        <div style="font-size:13px;color:var(--lea-muted);">A mostrar 13 de 42 eventos</div>
        <div class="lea-pagination">
          <a class="page-btn" href="#"><i class="ti ti-chevron-left"></i></a>
          <a class="page-btn active" href="#">1</a>
          <a class="page-btn" href="#">2</a>
          <a class="page-btn" href="#">3</a>
          <span style="color:var(--lea-muted);font-size:13px;padding:0 4px;">…</span>
          <a class="page-btn" href="#">4</a>
          <a class="page-btn" href="#"><i class="ti ti-chevron-right"></i></a>
        </div>
      </div>

    </main>
  </div>


  <!-- =============================================
       FOOTER — igual ao resto do site
       ============================================= -->
  <footer class="lea-footer py-3 px-4 mt-4">
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


  <!-- BOTTOM NAV MOBILE -->
  <nav class="bottom-nav">
    <a class="bnav-item" href="index.html"><i class="ti ti-home"></i><span class="bnav-lbl">Início</span></a>
    <a class="bnav-item" href="musica.html"><i class="ti ti-music"></i><span class="bnav-lbl">Músicas</span></a>
	<a class="bnav-item active" href="eventos.html"><i class="ti ti-calendar-event"></i><span class="bnav-lbl">Eventos</span></a>
    <a class="bnav-item" href="loja.html"><i class="ti ti-shopping-bag"></i><span class="bnav-lbl">Loja</span></a>
    
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
  <script src="assets/js/menu.footer.js"></script>
  
  <script>

    // Countdown — evento: 14 Jun 2026 às 20:00
    const eventTarget = new Date('2026-06-14T20:00:00');
    function runCountdown() {
      const diff = eventTarget - new Date();
      if (diff <= 0) return;
      const pad  = n => String(n).padStart(2,'0');
      const days  = Math.floor(diff / 86400000);
      const hours = Math.floor((diff % 86400000) / 3600000);
      const mins  = Math.floor((diff % 3600000)  / 60000);
      const secs  = Math.floor((diff % 60000)    / 1000);
      document.getElementById('fcd-days').textContent  = pad(days);
      document.getElementById('fcd-hours').textContent = pad(hours);
      document.getElementById('fcd-mins').textContent  = pad(mins);
      document.getElementById('fcd-secs').textContent  = pad(secs);
    }
    setInterval(runCountdown, 1000);
    runCountdown();

    // Filter tabs
    document.querySelectorAll('.filter-tab').forEach(tab => {
      tab.addEventListener('click', e => {
        e.preventDefault();
        document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
      });
    });

    // Sidebar items
    document.querySelectorAll('.sidebar-item').forEach(item => {
      item.addEventListener('click', e => {
        e.preventDefault();
        document.querySelectorAll('.sidebar-item').forEach(i => i.classList.remove('active'));
        item.classList.add('active');
      });
    });

    // Wishlist
    document.querySelectorAll('.ec-wishlist').forEach(btn => {
      btn.addEventListener('click', e => {
        e.preventDefault(); e.stopPropagation();
        btn.classList.toggle('active');
        btn.querySelector('i').className = btn.classList.contains('active')
          ? 'ti ti-heart-filled' : 'ti ti-heart';
      });
    });

    // Lembrar
    const remindBtn = document.getElementById('btn-remind');
    if (remindBtn) {
      remindBtn.addEventListener('click', () => {
        const active = remindBtn.classList.toggle('reminded');
        remindBtn.innerHTML = active
          ? '<i class="ti ti-bell-ringing"></i> Vais ser lembrado!'
          : '<i class="ti ti-bell"></i> Lembrar-me deste evento';
        remindBtn.style.borderColor  = active ? 'var(--lea-blue)' : '';
        remindBtn.style.color        = active ? 'var(--lea-blue)' : '';
        remindBtn.style.background   = active ? 'var(--lea-blue-light)' : '';
      });
    }

  </script>

</body>
</html>