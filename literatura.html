<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LEA Livros — Livraria Angolana Online</title>

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.19.0/dist/tabler-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=DM+Sans:wght@400;500&family=Playfair+Display:ital,wght@0,600;0,700;1,500;1,600&display=swap" rel="stylesheet">

  <style>
    :root {
      --lea-blue:       #2563B0;
      --lea-blue-dark:  #1A4A8A;
      --lea-blue-light: #E8F0FB;
      --lea-teal:       #1D9E75;
      --lea-border:     rgba(37,99,176,0.12);

      --lit-ink:        #1C1410;
      --lit-paper:      #FAF7F2;
      --lit-paper2:     #F3EFE8;
      --lit-gold:       #8B6914;
      --lit-gold-light: #FDF6E3;
      --lit-border:     rgba(139,105,20,0.15);
      --lit-muted:      #8B7355;
    }

    *, *::before, *::after { box-sizing: border-box; }
    body { font-family: 'DM Sans', sans-serif; background: var(--lit-paper); color: var(--lit-ink); margin: 0; overflow-x: hidden; }
    h1,h2,h3,h4,h5 { font-family: 'Sora', sans-serif; }
    ::-webkit-scrollbar { width: 5px; }
    ::-webkit-scrollbar-track { background: var(--lit-paper); }
    ::-webkit-scrollbar-thumb { background: var(--lit-border); border-radius: 99px; }

    /* ── NAVBAR ── */
    .navbar { background: var(--lit-ink) !important; border-bottom: 1px solid rgba(255,255,255,0.08); }
    .nav-link { font-size: 13px; color: rgba(255,255,255,0.6) !important; padding: 4px 10px !important; border-radius: 6px; }
    .nav-link:hover { color: #fff !important; background: rgba(255,255,255,0.08); }
    .nav-link.active { color: var(--lea-blue) !important; background: rgba(37,99,176,0.2) !important; }
    .navbar-toggler-icon { filter: invert(1); }
    .navbar-toggler { border-color: rgba(255,255,255,0.2) !important; }
    .navbar-collapse { background: var(--lit-ink); padding: 8px 0; }
    .nav-search { display: flex; align-items: center; gap: 6px; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.12); border-radius: 8px; padding: 6px 12px; font-size: 12px; color: rgba(255,255,255,0.5); min-width: 150px; cursor: pointer; }
    .btn-entrar { background: var(--lea-blue); color: #fff; border: none; border-radius: 8px; font-size: 13px; font-weight: 500; padding: 7px 16px; cursor: pointer; font-family: inherit; }
    .btn-entrar:hover { background: var(--lea-blue-dark); }

    /* ── MOBILE TOPBAR ── */
    .mobile-topbar { display: none; background: var(--lit-ink); border-bottom: 1px solid rgba(255,255,255,0.08); padding: 10px 16px; align-items: center; justify-content: space-between; position: sticky; top: 0; z-index: 200; }

    /* ── BOTTOM NAV ── */
    .bottom-nav { background: var(--lit-ink); border-top: 1px solid rgba(255,255,255,0.08); position: fixed; bottom: 0; left: 0; right: 0; height: 62px; display: none; align-items: center; justify-content: space-around; z-index: 400; padding-bottom: env(safe-area-inset-bottom, 0); }
    .bnav-item { display: flex; flex-direction: column; align-items: center; gap: 3px; font-size: 22px; color: rgba(255,255,255,0.35); cursor: pointer; text-decoration: none; flex: 1; justify-content: center; transition: color .12s; background: none; border: none; font-family: inherit; }
    .bnav-item.active, .bnav-item:hover { color: var(--lit-gold); }
    .bnav-lbl { font-size: 9px; font-weight: 500; }

    /* ── MENU DRAWER ── */
    .menu-drawer { position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 500; pointer-events: none; }
    .menu-drawer.open { pointer-events: all; }
    .menu-overlay { position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0); transition: background .3s; }
    .menu-drawer.open .menu-overlay { background: rgba(0,0,0,0.6); }
    .menu-panel { position: fixed; bottom: 0; left: 0; right: 0; width: 100%; background: var(--lit-ink); border-top: 1px solid rgba(255,255,255,0.08); border-radius: 20px 20px 0 0; padding: 0 0 env(safe-area-inset-bottom, 16px); max-height: 88vh; overflow-y: auto; transform: translateY(100%); transition: transform .35s cubic-bezier(.32,0,.25,1); z-index: 501; }
    .menu-drawer.open .menu-panel { transform: translateY(0); }
    .menu-handle { width: 36px; height: 4px; background: rgba(255,255,255,0.15); border-radius: 2px; margin: 12px auto 4px; }
    .menu-header { display: flex; align-items: center; justify-content: space-between; padding: 10px 20px 8px; border-bottom: 1px solid rgba(255,255,255,0.08); }
    .menu-header-title { font-size: 15px; font-weight: 700; color: #fff; }
    .btn-close-menu { background: none; border: none; font-size: 20px; color: rgba(255,255,255,0.4); cursor: pointer; padding: 4px; }
    .menu-section-title { font-size: 10px; font-weight: 700; letter-spacing: .8px; text-transform: uppercase; color: rgba(255,255,255,0.3); padding: 14px 20px 6px; }
    .menu-item { display: flex; align-items: center; gap: 14px; padding: 11px 20px; text-decoration: none; transition: background .12s; }
    .menu-item:hover { background: rgba(255,255,255,0.04); }
    .menu-item > i { font-size: 20px; color: var(--lit-gold); width: 24px; flex-shrink: 0; }
    .menu-item-label { font-size: 14px; font-weight: 500; color: #fff; }
    .menu-item-sub { font-size: 11px; color: rgba(255,255,255,0.4); margin-top: 1px; }
    .menu-social { display: flex; gap: 16px; padding: 12px 20px; }
    .menu-social a { font-size: 22px; color: rgba(255,255,255,0.35); text-decoration: none; transition: color .12s; }
    .menu-social a:hover { color: var(--lit-gold); }
    .btn-menu-entrar { display: block; width: calc(100% - 40px); margin: 14px 20px; background: var(--lea-blue); color: #fff; border: none; border-radius: 10px; font-size: 14px; font-weight: 600; padding: 13px; cursor: pointer; font-family: inherit; transition: background .15s; }
    .btn-menu-entrar:hover { background: var(--lea-blue-dark); }

    /* ── BREADCRUMB ── */
    .breadcrumb-bar { background: var(--lit-paper2); border-bottom: 1px solid var(--lit-border); padding: 10px 0; }
    .breadcrumb-bar .container { display: flex; align-items: center; gap: 6px; font-size: 12px; color: var(--lit-muted); }
    .breadcrumb-bar a { color: var(--lit-muted); text-decoration: none; }
    .breadcrumb-bar a:hover { color: var(--lit-gold); }
    .breadcrumb-bar i { font-size: 10px; }
    .breadcrumb-bar span { color: var(--lit-ink); font-weight: 500; }

    /* ── HERO ── */
    .lit-hero { background: var(--lit-ink); padding: 48px 0 0; position: relative; overflow: hidden; }
    .lit-hero::before { content: ''; position: absolute; inset: 0; background: radial-gradient(ellipse 60% 70% at 80% 20%, rgba(139,105,20,0.15) 0%, transparent 60%), radial-gradient(ellipse 40% 60% at 10% 90%, rgba(37,99,176,0.12) 0%, transparent 60%); pointer-events: none; }
    .lit-hero .container { position: relative; z-index: 2; }
    .hero-eyebrow { display: inline-flex; align-items: center; gap: 8px; font-size: 11px; font-weight: 600; letter-spacing: 1.5px; text-transform: uppercase; color: rgba(255,255,255,0.45); margin-bottom: 10px; }
    .hero-eyebrow::before { content: ''; width: 20px; height: 1px; background: var(--lit-gold); }
    .lit-hero h1 { font-family: 'Playfair Display', serif; font-size: clamp(26px, 4vw, 46px); font-weight: 700; line-height: 1.1; color: #fff; margin-bottom: 10px; }
    .lit-hero h1 em { font-style: italic; color: var(--lit-gold); }
    .lit-hero p { font-size: 14px; color: rgba(255,255,255,0.5); line-height: 1.65; max-width: 440px; margin-bottom: 20px; }
    .lit-search { display: flex; align-items: center; background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.12); border-radius: 10px; padding: 10px 16px; gap: 10px; max-width: 440px; }
    .lit-search:focus-within { border-color: rgba(139,105,20,0.4); }
    .lit-search input { background: none; border: none; outline: none; font-size: 14px; color: #fff; flex: 1; font-family: 'DM Sans', sans-serif; }
    .lit-search input::placeholder { color: rgba(255,255,255,0.3); }
    .lit-search i { font-size: 18px; color: rgba(255,255,255,0.35); }
    .hero-stats { display: flex; gap: 24px; margin-top: 20px; flex-wrap: wrap; }
    .hstat-num { font-family: 'Sora', sans-serif; font-size: 20px; font-weight: 700; color: #fff; }
    .hstat-num span { color: var(--lit-gold); }
    .hstat-lbl { font-size: 11px; color: rgba(255,255,255,0.4); }
    .hero-gold-bar { height: 3px; background: linear-gradient(90deg, var(--lit-gold) 0%, transparent 100%); margin-top: 28px; }

    /* ── FILTER BAR ── */
    .filter-bar { background: var(--lit-paper2); border-bottom: 1px solid var(--lit-border); display: flex; align-items: center; overflow-x: auto; position: sticky; top: 56px; z-index: 90; max-width: 100vw; }
    .filter-bar::-webkit-scrollbar { height: 0; }
    .filter-tab { font-size: 13px; font-weight: 500; color: var(--lit-muted); padding: 13px 18px; border-bottom: 2px solid transparent; cursor: pointer; white-space: nowrap; transition: all .15s; text-decoration: none; display: block; flex-shrink: 0; }
    .filter-tab:hover { color: var(--lit-ink); }
    .filter-tab.active { color: var(--lit-gold); border-bottom-color: var(--lit-gold); }

    /* ── PAGE LAYOUT ── */
    .page-layout { display: grid; grid-template-columns: 1fr 290px; gap: 32px; padding: 32px 0 60px; }

    /* ── SEC HEADER ── */
    .sec-hdr { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 2px solid var(--lit-border); }
    .sec-hdr-left { display: flex; align-items: center; gap: 10px; }
    .sec-icon { width: 36px; height: 36px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 17px; flex-shrink: 0; }
    .sec-icon.gold  { background: var(--lit-gold-light); color: var(--lit-gold); }
    .sec-icon.blue  { background: var(--lea-blue-light); color: var(--lea-blue); }
    .sec-icon.green { background: #D1FAE5; color: #059669; }
    .sec-hdr h2 { font-family: 'Playfair Display', serif; font-size: 20px; font-weight: 700; margin: 0; color: var(--lit-ink); }
    .sec-hdr h2 em { font-style: italic; color: var(--lit-gold); }
    .sec-hdr small { font-family: 'DM Sans', sans-serif; font-size: 11px; font-weight: 400; color: var(--lit-muted); display: block; }
    .btn-ver { display: inline-flex; align-items: center; gap: 5px; font-size: 12px; font-weight: 600; color: var(--lit-gold); text-decoration: none; font-style: italic; transition: opacity .15s; white-space: nowrap; }
    .btn-ver:hover { opacity: .7; color: var(--lit-gold); }

    /* ── LIVRO EM DESTAQUE ── */
    .featured-book { background: var(--lit-paper); border: 1px solid var(--lit-border); border-radius: 16px; overflow: hidden; display: grid; grid-template-columns: 200px 1fr; margin-bottom: 32px; }
    .fb-cover { position: relative; background: var(--lit-ink); overflow: hidden; }
    .fb-cover img { width: 100%; height: 100%; object-fit: cover; display: block; }
    .fb-cover-ph { position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; font-size: 48px; color: rgba(139,105,20,0.2); }
    .fb-badge { position: absolute; top: 12px; left: 12px; background: var(--lit-gold); color: #fff; font-size: 9px; font-weight: 700; letter-spacing: .5px; text-transform: uppercase; padding: 4px 10px; border-radius: 99px; }
    .fb-body { padding: 24px 28px; display: flex; flex-direction: column; justify-content: space-between; }
    .fb-eyebrow { font-size: 10px; font-weight: 700; letter-spacing: .8px; text-transform: uppercase; color: var(--lit-gold); margin-bottom: 8px; display: flex; align-items: center; gap: 6px; }
    .fb-title { font-family: 'Playfair Display', serif; font-size: 26px; font-weight: 700; color: var(--lit-ink); line-height: 1.2; margin-bottom: 4px; }
    .fb-author { font-size: 14px; color: var(--lit-muted); font-style: italic; margin-bottom: 14px; }
    .fb-desc { font-size: 13px; color: var(--lit-muted); line-height: 1.7; margin-bottom: 18px; }
    .fb-meta { display: flex; gap: 16px; margin-bottom: 20px; flex-wrap: wrap; }
    .fb-meta-item { display: flex; align-items: center; gap: 6px; font-size: 12px; color: var(--lit-muted); }
    .fb-meta-item i { font-size: 14px; color: var(--lit-gold); }
    .fb-actions { display: flex; gap: 10px; }
    .btn-comprar { background: var(--lit-gold); color: #fff; border: none; border-radius: 8px; font-size: 13px; font-weight: 600; padding: 10px 20px; cursor: pointer; font-family: inherit; transition: background .15s; display: flex; align-items: center; gap: 6px; text-decoration: none; }
    .btn-comprar:hover { background: #6B4F10; color: #fff; }
    .btn-detalhes { background: var(--lit-paper2); color: var(--lit-muted); border: 1px solid var(--lit-border); border-radius: 8px; font-size: 13px; font-weight: 500; padding: 10px 16px; cursor: pointer; font-family: inherit; transition: background .15s; text-decoration: none; display: flex; align-items: center; gap: 6px; }
    .btn-detalhes:hover { background: var(--lit-border); color: var(--lit-ink); }

    /* ── BOOKS GRID ── */
    .books-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(140px, 1fr)); gap: 20px; margin-bottom: 8px; }
    .book-card { display: flex; flex-direction: column; gap: 9px; cursor: pointer; text-decoration: none; transition: transform .2s; min-width: 0; }
    .book-card:hover { transform: translateY(-5px); }
    .book-cover { width: 100%; aspect-ratio: 2/3; border-radius: 6px; overflow: hidden; box-shadow: 4px 6px 20px rgba(28,20,16,0.22); position: relative; background: var(--lit-paper2); }
    .book-cover img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform .3s; }
    .book-card:hover .book-cover img { transform: scale(1.04); }
    .book-cover .cover-ph { position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; font-size: 32px; color: rgba(139,105,20,0.18); }
    .book-badge { position: absolute; top: 8px; left: 8px; font-size: 9px; font-weight: 700; letter-spacing: .3px; text-transform: uppercase; padding: 3px 8px; border-radius: 99px; color: #fff; }
    .b-novo   { background: var(--lea-teal); }
    .b-dest   { background: var(--lit-gold); }
    .b-gratis { background: var(--lea-blue); }
    .book-rank { position: absolute; top: 8px; right: 8px; width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 700; }
    .rank-1 { background: #F59E0B; color: #fff; }
    .rank-2 { background: rgba(255,255,255,0.6); color: var(--lit-ink); }
    .rank-3 { background: #C07A1A; color: #fff; }
    .book-title  { font-size: 12px; font-weight: 600; color: var(--lit-ink); line-height: 1.4; }
    .book-card:hover .book-title { color: var(--lit-gold); }
    .book-author { font-size: 11px; color: var(--lit-muted); font-style: italic; }
    .book-actions { display: flex; gap: 6px; }
    .btn-buy  { flex: 1; background: var(--lit-gold); color: #fff; border: none; border-radius: 6px; font-size: 11px; font-weight: 600; padding: 7px; cursor: pointer; text-align: center; text-decoration: none; display: block; transition: background .15s; font-family: inherit; }
    .btn-buy:hover { background: #6B4F10; color: #fff; }
    .btn-more { background: var(--lit-paper2); color: var(--lit-muted); border: 1px solid var(--lit-border); border-radius: 6px; font-size: 11px; padding: 7px 10px; cursor: pointer; text-decoration: none; display: inline-block; transition: background .12s; }
    .btn-more:hover { background: var(--lit-border); }

    /* CTA "ver mais" após grid */
    .cta-ver-mais { text-align: center; margin: 18px 0 32px; }
    .btn-cta { display: inline-flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 600; color: var(--lit-gold); text-decoration: none; border: 1px solid var(--lit-border); padding: 10px 22px; border-radius: 99px; background: var(--lit-paper); transition: background .15s; }
    .btn-cta:hover { background: var(--lit-gold-light); color: var(--lit-gold); }
    .btn-cta.blue { color: var(--lea-blue); }
    .btn-cta.blue:hover { background: var(--lea-blue-light); color: var(--lea-blue); }

    /* ── DIVIDER ── */
    .sec-divider { height: 1px; background: var(--lit-border); margin: 8px 0 32px; }

    /* ── CATEGORIAS — linha horizontal ── */
    .cat-row { display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; margin-bottom: 32px; }
    .cat-pill { background: var(--lit-paper); border: 1px solid var(--lit-border); border-radius: 12px; padding: 14px 16px; text-decoration: none; display: flex; align-items: center; gap: 10px; transition: background .15s, border-color .15s; }
    .cat-pill:hover { background: var(--lit-gold-light); border-color: rgba(139,105,20,0.3); }
    .cat-pill-icon { width: 36px; height: 36px; border-radius: 8px; background: var(--lit-gold-light); color: var(--lit-gold); display: flex; align-items: center; justify-content: center; font-size: 17px; flex-shrink: 0; }
    .cat-pill-name { font-size: 13px; font-weight: 600; color: var(--lit-ink); }
    .cat-pill-count { font-size: 11px; color: var(--lit-muted); }

    /* ── AD STRIP ── */
    .ad-strip { background: var(--lit-paper); border: 1px dashed rgba(139,105,20,0.2); border-radius: 12px; padding: 12px 16px; display: flex; align-items: center; gap: 14px; margin-bottom: 28px; }
    .ad-pill-lbl { font-size: 9px; letter-spacing: .5px; text-transform: uppercase; color: #bbb; border: 1px solid #ddd; border-radius: 4px; padding: 2px 6px; flex-shrink: 0; }
    .ad-thumb { width: 52px; height: 38px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 700; color: #fff; flex-shrink: 0; }
    .ad-copy { flex: 1; min-width: 0; }
    .ad-copy strong { font-size: 13px; font-weight: 500; color: var(--lit-ink); }
    .ad-copy span { font-size: 11px; color: var(--lit-muted); }
    .btn-ad { background: var(--lea-blue); color: #fff; border: none; border-radius: 6px; font-size: 12px; font-weight: 500; padding: 6px 14px; cursor: pointer; white-space: nowrap; font-family: inherit; }

    /* ── SIDEBAR ── */
    .lit-sidebar { display: flex; flex-direction: column; gap: 20px; }
    .sb-card { background: var(--lit-paper); border: 1px solid var(--lit-border); border-radius: 12px; overflow: hidden; }
    .sb-card-hdr { padding: 12px 14px; border-bottom: 1px solid var(--lit-border); display: flex; align-items: center; gap: 8px; background: var(--lit-paper2); }
    .sb-card-hdr h3 { font-family: 'Playfair Display', serif; font-size: 14px; font-weight: 700; margin: 0; color: var(--lit-ink); }
    .sb-card-hdr i { font-size: 16px; color: var(--lit-gold); }

    .pop-item { display: flex; align-items: flex-start; gap: 10px; padding: 10px 14px; border-bottom: 1px solid var(--lit-border); text-decoration: none; transition: background .12s; }
    .pop-item:last-child { border-bottom: none; }
    .pop-item:hover { background: var(--lit-paper2); }
    .pop-num { font-family: 'Playfair Display', serif; font-size: 18px; font-weight: 700; line-height: 1; flex-shrink: 0; width: 22px; }
    .pop-num.n1 { color: #F59E0B; }
    .pop-num.n2 { color: rgba(139,105,20,0.45); }
    .pop-num.n3 { color: #C07A1A; }
    .pop-num.nx { color: rgba(139,105,20,0.2); }
    .pop-cover { width: 36px; height: 50px; border-radius: 3px; overflow: hidden; flex-shrink: 0; box-shadow: 2px 3px 8px rgba(0,0,0,0.15); }
    .pop-cover img { width: 100%; height: 100%; object-fit: cover; }
    .pop-cover .pcv-fb { width: 100%; height: 100%; background: linear-gradient(135deg, var(--lit-gold), #6B4F10); display: flex; align-items: center; justify-content: center; font-size: 12px; color: rgba(255,255,255,0.25); }
    .pop-title { font-size: 12px; font-weight: 500; color: var(--lit-ink); line-height: 1.4; margin-bottom: 2px; }
    .pop-item:hover .pop-title { color: var(--lit-gold); }
    .pop-meta { font-size: 10px; color: var(--lit-muted); font-style: italic; }

    /* Teaser poemas/frases na sidebar */
    .sb-teaser { border-radius: 12px; overflow: hidden; text-decoration: none; display: block; transition: transform .2s; }
    .sb-teaser:hover { transform: translateY(-2px); }
    .sb-teaser-inner { padding: 16px; display: flex; flex-direction: column; gap: 10px; }
    .sb-teaser.poemas .sb-teaser-inner { background: linear-gradient(135deg, #1A3A6A 0%, #0D2244 100%); }
    .sb-teaser.frases .sb-teaser-inner { background: linear-gradient(135deg, #064E3B 0%, #022C22 100%); }
    .sb-teaser-lbl { font-size: 9px; font-weight: 700; letter-spacing: .8px; text-transform: uppercase; }
    .sb-teaser.poemas .sb-teaser-lbl { color: rgba(147,180,232,0.8); }
    .sb-teaser.frases .sb-teaser-lbl { color: rgba(94,201,164,0.8); }
    .sb-teaser-quote { font-family: 'Playfair Display', serif; font-size: 13px; font-style: italic; line-height: 1.7; color: rgba(255,255,255,0.8); }
    .sb-teaser-quote::before { content: '\201C'; font-size: 16px; }
    .sb-teaser-quote::after  { content: '\201D'; font-size: 16px; }
    .sb-teaser-footer { display: flex; align-items: center; justify-content: space-between; }
    .sb-teaser-author { font-size: 11px; color: rgba(255,255,255,0.5); }
    .sb-teaser-cta { font-size: 11px; font-weight: 600; display: flex; align-items: center; gap: 4px; }
    .sb-teaser.poemas .sb-teaser-cta { color: #93B4E8; }
    .sb-teaser.frases .sb-teaser-cta { color: #5EC9A4; }

    /* Newsletter */
    .sb-newsletter { background: linear-gradient(135deg, var(--lea-blue-dark), var(--lea-blue)); border-radius: 12px; padding: 18px; }
    .sb-newsletter h4 { font-size: 14px; font-weight: 700; color: #fff; margin: 0 0 6px; }
    .sb-newsletter p { font-size: 12px; color: rgba(255,255,255,0.65); line-height: 1.55; margin-bottom: 12px; }
    .sb-newsletter input { width: 100%; background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.2); border-radius: 8px; padding: 8px 12px; font-size: 12px; color: #fff; font-family: 'DM Sans', sans-serif; outline: none; margin-bottom: 8px; }
    .sb-newsletter input::placeholder { color: rgba(255,255,255,0.35); }
    .btn-newsletter { width: 100%; background: #fff; color: var(--lea-blue); border: none; border-radius: 8px; font-size: 13px; font-weight: 700; padding: 9px; cursor: pointer; font-family: inherit; }

    /* ── FOOTER ── */
    .lea-footer { background: var(--lit-ink); border-top: 1px solid rgba(255,255,255,0.06); }
    .footer-link { font-size: 12px; color: rgba(255,255,255,0.45); text-decoration: none; }
    .footer-link:hover { color: rgba(255,255,255,0.8); }
    .footer-social { color: var(--lea-blue); font-size: 20px; text-decoration: none; transition: opacity .15s; }
    .footer-social:hover { opacity: .7; }

    /* ── DESKTOP ONLY ── */
    .desktop-only { display: block; }

    /* ── RESPONSIVE ── */
    @media (max-width: 991px) {
      .navbar         { display: none !important; }
      .mobile-topbar  { display: flex; }
      .bottom-nav     { display: flex; }
      .desktop-only   { display: none !important; }
      body            { padding-bottom: 62px; }
      .filter-bar     { top: 51px; }
      .page-layout    { grid-template-columns: 1fr; gap: 0; padding: 16px 0 48px; }
      .featured-book  { grid-template-columns: 150px 1fr; }
      .fb-body        { padding: 16px; }
      .fb-title       { font-size: 18px; }
      .fb-desc        { display: none; }
      .books-grid     { grid-template-columns: repeat(2, 1fr); gap: 14px; }
      .cat-row        { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 480px) {
      .books-grid     { grid-template-columns: repeat(2, 1fr); gap: 10px; }
      .featured-book  { grid-template-columns: 1fr; }
      .fb-cover       { height: 200px; }
      .cat-row        { grid-template-columns: repeat(2, 1fr); gap: 8px; }
    }
  </style>
</head>
<body>

  <!-- NAVBAR DESKTOP -->
  <nav class="navbar navbar-expand-lg sticky-top">
    <div class="container-fluid px-4">
      <a class="navbar-brand d-flex align-items-center gap-2" href="index.html">
        <img src="assets/img/logo.png" alt="LEA" height="32">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" style="color:rgba(255,255,255,0.6);">
        <span class="navbar-toggler-icon" style="filter:invert(1);"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav me-auto mb-0">
          <li class="nav-item"><a class="nav-link" href="index.html">Início</a></li>
          <li class="nav-item"><a class="nav-link" href="artistas.html">Artistas</a></li>
          <li class="nav-item"><a class="nav-link" href="musica.html">Músicas</a></li>
          <li class="nav-item"><a class="nav-link" href="videos.html">Vídeos</a></li>
          <li class="nav-item"><a class="nav-link active" href="literatura.html">Literatura</a></li>
          <li class="nav-item"><a class="nav-link" href="noticias.html">Notícias</a></li>
          <li class="nav-item"><a class="nav-link" href="eventos.html">Eventos</a></li>
          <li class="nav-item"><a class="nav-link" href="loja.html">Loja</a></li>
        </ul>
        <div class="d-flex align-items-center gap-2 mt-2 mt-lg-0">
          <div class="nav-search d-none d-md-flex align-items-center gap-2">
            <i class="ti ti-search" style="font-size:13px;"></i> Pesquisar…
          </div>
          <button class="btn-entrar">Entrar</button>
        </div>
      </div>
    </div>
  </nav>

  <!-- TOPBAR MOBILE -->
  <header class="mobile-topbar">
    <a href="index.html" style="display:flex;align-items:center;gap:8px;text-decoration:none;">
      <img src="assets/img/logo.png" alt="LEA" height="30">
    </a>
    <div class="d-flex gap-3" style="font-size:20px;color:rgba(255,255,255,0.6);">
      <i class="ti ti-search"></i>
      <i class="ti ti-bell"></i>
      <i class="ti ti-user-circle"></i>
    </div>
  </header>


  <!-- HERO -->
  <div class="lit-hero">
    <div class="container pb-4">
      <div class="row g-4 align-items-center">
        <div class="col-lg-6">
          <div class="hero-eyebrow">Livraria Angolana Online</div>
          <h1>Livros angolanos<br><em>para ler e guardar</em></h1>
          <p>Compra livros de escritores angolanos directamente aqui. Poesia, ficção, auto-ajuda, literatura infantil e muito mais.</p>
          <div class="lit-search">
            <i class="ti ti-search"></i>
            <input type="text" placeholder="Pesquisar por título, autor ou categoria…">
          </div>
          <div class="hero-stats">
            <div><div class="hstat-num">112<span>+</span></div><div class="hstat-lbl">Livros</div></div>
            <div><div class="hstat-num">60<span>+</span></div><div class="hstat-lbl">Autores</div></div>
            <div><div class="hstat-num">6</div><div class="hstat-lbl">Categorias</div></div>
          </div>
        </div>
        <!-- Capas desktop -->
        <div class="col-lg-6 desktop-only">
          <div class="d-flex gap-3 align-items-end justify-content-end">
            <a href="https://lea.co.ao/literatura/exemplar.php?code=ODk=&artst=MjA1MA==" target="_blank" style="text-decoration:none;display:flex;flex-direction:column;align-items:center;gap:8px;transition:transform .2s" onmouseover="this.style.transform='translateY(-8px)'" onmouseout="this.style.transform='none'">
              <div style="width:72px;border-radius:5px;overflow:hidden;box-shadow:4px 8px 22px rgba(0,0,0,0.55);"><img src="https://lea.co.ao/images/livros/Poder Ancestral.jpg" style="width:100%;display:block;" alt="" onerror="this.parentNode.style.background='#2C1F0E';this.style.display='none'"></div>
              <span style="font-size:9px;color:rgba(255,255,255,0.4);text-align:center;max-width:72px;">Poder Ancestral</span>
            </a>
            <a href="https://lea.co.ao/literatura/exemplar.php?code=MzU=&artst=MjE3" target="_blank" style="text-decoration:none;display:flex;flex-direction:column;align-items:center;gap:8px;transition:transform .2s" onmouseover="this.style.transform='translateY(-8px)'" onmouseout="this.style.transform='none'">
              <div style="width:72px;border-radius:5px;overflow:hidden;box-shadow:4px 8px 22px rgba(0,0,0,0.55);"><img src="https://lea.co.ao/images/livros/Voce e maior que o seu sonho.jpg" style="width:100%;display:block;" alt="" onerror="this.parentNode.style.background='#2C1F0E';this.style.display='none'"></div>
              <span style="font-size:9px;color:rgba(255,255,255,0.4);text-align:center;max-width:72px;">Você é Maior Que Seus Sonhos</span>
            </a>
            <a href="https://lea.co.ao/literatura/exemplar.php?code=MTAx&artst=MjIyMw==" target="_blank" style="text-decoration:none;display:flex;flex-direction:column;align-items:center;gap:8px;transition:transform .2s" onmouseover="this.style.transform='translateY(-8px)'" onmouseout="this.style.transform='none'">
              <div style="width:96px;border-radius:5px;overflow:hidden;box-shadow:6px 10px 28px rgba(0,0,0,0.6);position:relative;">
                <img src="https://lea.co.ao/images/livros/Hematoma-Social.jpg" style="width:100%;display:block;" alt="" onerror="this.parentNode.style.background='#2C1F0E';this.style.display='none'">
                <div style="position:absolute;bottom:0;left:0;right:0;background:rgba(139,105,20,0.88);padding:4px 6px;text-align:center;font-size:9px;font-weight:700;color:#fff;">⭐ Destaque</div>
              </div>
              <span style="font-size:9px;color:rgba(255,255,255,0.4);text-align:center;max-width:96px;">Hematoma Social</span>
            </a>
            <a href="https://lea.co.ao/literatura/exemplar.php?code=MTY=&artst=Nzgz" target="_blank" style="text-decoration:none;display:flex;flex-direction:column;align-items:center;gap:8px;transition:transform .2s" onmouseover="this.style.transform='translateY(-8px)'" onmouseout="this.style.transform='none'">
              <div style="width:72px;border-radius:5px;overflow:hidden;box-shadow:4px 8px 22px rgba(0,0,0,0.55);"><img src="https://lea.co.ao/images/livros/Muana puo.jpg" style="width:100%;display:block;" alt="" onerror="this.parentNode.style.background='#2C1F0E';this.style.display='none'"></div>
              <span style="font-size:9px;color:rgba(255,255,255,0.4);text-align:center;max-width:72px;">Muana Puó</span>
            </a>
            <a href="https://lea.co.ao/literatura/exemplar.php?code=MzM=&artst=Nzgw" target="_blank" style="text-decoration:none;display:flex;flex-direction:column;align-items:center;gap:8px;transition:transform .2s" onmouseover="this.style.transform='translateY(-8px)'" onmouseout="this.style.transform='none'">
              <div style="width:72px;border-radius:5px;overflow:hidden;box-shadow:4px 8px 22px rgba(0,0,0,0.55);"><img src="https://lea.co.ao/images/livros/a professora de filosofia.jpg" style="width:100%;display:block;" alt="" onerror="this.parentNode.style.background='#2C1F0E';this.style.display='none'"></div>
              <span style="font-size:9px;color:rgba(255,255,255,0.4);text-align:center;max-width:72px;">A Professora de Filosofia</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="hero-gold-bar"></div>
  </div>


  <!-- FILTER BAR -->
  <div class="filter-bar" id="filterBar">
    <a class="filter-tab active" href="#" data-cat="todos">Todos</a>
    <a class="filter-tab" href="#" data-cat="poesia">Poesia</a>
    <a class="filter-tab" href="#" data-cat="ficcao">Ficção</a>
    <a class="filter-tab" href="#" data-cat="autoajuda">Auto-ajuda</a>
    <a class="filter-tab" href="#" data-cat="infantil">Infantil</a>
    <a class="filter-tab" href="#" data-cat="historia">História</a>
    <a class="filter-tab" href="#" data-cat="cronica">Crónica</a>
  </div>


  <!-- LAYOUT PRINCIPAL -->
  <div class="container">
    <div class="page-layout">

      <main>

        <!-- ══ LIVRO EM DESTAQUE ══ -->
        <div class="sec-hdr">
          <div class="sec-hdr-left">
            <div class="sec-icon gold"><i class="ti ti-star"></i></div>
            <div><h2>Livro <em>em destaque</em></h2><small>Escolha editorial da semana</small></div>
          </div>
        </div>

        <div class="featured-book">
          <div class="fb-cover">
            <img src="https://lea.co.ao/images/livros/Hematoma-Social.jpg" alt="Hematoma Social" onerror="this.style.display='none'">
            <div class="fb-cover-ph"><i class="ti ti-book"></i></div>
            <span class="fb-badge">✨ Destaque da semana</span>
          </div>
          <div class="fb-body">
            <div>
              <div class="fb-eyebrow"><i class="ti ti-feather" style="font-size:12px;"></i> Poesia · Angola</div>
              <div class="fb-title">Hematoma Social</div>
              <div class="fb-author">Poeta Falso</div>
              <div class="fb-desc">Uma obra que desnuda as feridas da sociedade angolana com uma linguagem crua, poética e profundamente humana. Hematoma Social é um grito que ecoa para além das palavras.</div>
              <div class="fb-meta">
                <div class="fb-meta-item"><i class="ti ti-category"></i> Poesia</div>
                <div class="fb-meta-item"><i class="ti ti-calendar"></i> 2023</div>
                <div class="fb-meta-item"><i class="ti ti-map-pin"></i> Angola</div>
              </div>
            </div>
            <div class="fb-actions">
              <a class="btn-comprar" href="https://lea.co.ao/literatura/exemplar.php?code=MTAx&artst=MjIyMw==" target="_blank"><i class="ti ti-shopping-cart"></i> Comprar agora</a>
              <a class="btn-detalhes" href="https://lea.co.ao/literatura/exemplar.php?code=MTAx&artst=MjIyMw==" target="_blank"><i class="ti ti-info-circle"></i> Detalhes</a>
            </div>
          </div>
        </div>


        <!-- ══ CATEGORIAS ══ -->
        <div class="sec-hdr">
          <div class="sec-hdr-left">
            <div class="sec-icon gold"><i class="ti ti-layout-grid"></i></div>
            <div><h2>Por <em>categoria</em></h2></div>
          </div>
        </div>

        <div class="cat-row">
          <a class="cat-pill" href="#">
            <div class="cat-pill-icon"><i class="ti ti-feather"></i></div>
            <div><div class="cat-pill-name">Poesia</div><div class="cat-pill-count">38 livros</div></div>
          </a>
          <a class="cat-pill" href="#">
            <div class="cat-pill-icon"><i class="ti ti-book"></i></div>
            <div><div class="cat-pill-name">Ficção</div><div class="cat-pill-count">24 livros</div></div>
          </a>
          <a class="cat-pill" href="#">
            <div class="cat-pill-icon"><i class="ti ti-bulb"></i></div>
            <div><div class="cat-pill-name">Auto-ajuda</div><div class="cat-pill-count">18 livros</div></div>
          </a>
          <a class="cat-pill" href="#">
            <div class="cat-pill-icon"><i class="ti ti-star"></i></div>
            <div><div class="cat-pill-name">Infantil</div><div class="cat-pill-count">14 livros</div></div>
          </a>
          <a class="cat-pill" href="#">
            <div class="cat-pill-icon"><i class="ti ti-flag"></i></div>
            <div><div class="cat-pill-name">História</div><div class="cat-pill-count">10 livros</div></div>
          </a>
          <a class="cat-pill" href="#">
            <div class="cat-pill-icon"><i class="ti ti-pencil"></i></div>
            <div><div class="cat-pill-name">Crónica</div><div class="cat-pill-count">8 livros</div></div>
          </a>
        </div>


        <!-- ══ MAIS PROCURADOS ══ -->
        <div class="sec-hdr">
          <div class="sec-hdr-left">
            <div class="sec-icon gold"><i class="ti ti-trending-up"></i></div>
            <div><h2>Mais <em>procurados</em></h2><small>Os mais vendidos na plataforma</small></div>
          </div>
          <a class="btn-ver" href="https://lea.co.ao/downloads/todos-livros.php?strt=0&acc=1" target="_blank">Ver todos →</a>
        </div>

        <div class="books-grid">
          <div class="book-card">
            <div class="book-cover"><img src="https://lea.co.ao/images/livros/Hematoma-Social.jpg" alt="" onerror="this.style.display='none'"><div class="cover-ph"><i class="ti ti-book"></i></div><div class="book-rank rank-1">1</div></div>
            <div class="book-title">Hematoma Social</div><div class="book-author">Poeta Falso</div>
            <div class="book-actions"><a class="btn-buy" href="https://lea.co.ao/literatura/exemplar.php?code=MTAx&artst=MjIyMw==" target="_blank">Comprar</a><a class="btn-more" href="https://lea.co.ao/literatura/exemplar.php?code=MTAx&artst=MjIyMw==" target="_blank">+</a></div>
          </div>
          <div class="book-card">
            <div class="book-cover"><img src="https://lea.co.ao/images/livros/Voce e maior que o seu sonho.jpg" alt="" onerror="this.style.display='none'"><div class="cover-ph"><i class="ti ti-book"></i></div><div class="book-rank rank-2">2</div></div>
            <div class="book-title">Você é Maior Que Seus Sonhos</div><div class="book-author">—</div>
            <div class="book-actions"><a class="btn-buy" href="https://lea.co.ao/literatura/exemplar.php?code=MzU=&artst=MjE3" target="_blank">Comprar</a><a class="btn-more" href="https://lea.co.ao/literatura/exemplar.php?code=MzU=&artst=MjE3" target="_blank">+</a></div>
          </div>
          <div class="book-card">
            <div class="book-cover"><img src="https://lea.co.ao/images/livros/Muana puo.jpg" alt="" onerror="this.style.display='none'"><div class="cover-ph"><i class="ti ti-book"></i></div><div class="book-rank rank-3">3</div></div>
            <div class="book-title">Muana Puó</div><div class="book-author">—</div>
            <div class="book-actions"><a class="btn-buy" href="https://lea.co.ao/literatura/exemplar.php?code=MTY=&artst=Nzgz" target="_blank">Comprar</a><a class="btn-more" href="https://lea.co.ao/literatura/exemplar.php?code=MTY=&artst=Nzgz" target="_blank">+</a></div>
          </div>
          <div class="book-card">
            <div class="book-cover"><img src="https://lea.co.ao/images/livros/Poder Ancestral.jpg" alt="" onerror="this.style.display='none'"><div class="cover-ph"><i class="ti ti-book"></i></div></div>
            <div class="book-title">Poder Ancestral</div><div class="book-author">—</div>
            <div class="book-actions"><a class="btn-buy" href="https://lea.co.ao/literatura/exemplar.php?code=ODk=&artst=MjA1MA==" target="_blank">Comprar</a><a class="btn-more" href="https://lea.co.ao/literatura/exemplar.php?code=ODk=&artst=MjA1MA==" target="_blank">+</a></div>
          </div>
          <div class="book-card">
            <div class="book-cover"><img src="https://lea.co.ao/images/livros/a professora de filosofia.jpg" alt="" onerror="this.style.display='none'"><div class="cover-ph"><i class="ti ti-book"></i></div></div>
            <div class="book-title">A Professora de Filosofia</div><div class="book-author">—</div>
            <div class="book-actions"><a class="btn-buy" href="https://lea.co.ao/literatura/exemplar.php?code=MzM=&artst=Nzgw" target="_blank">Comprar</a><a class="btn-more" href="https://lea.co.ao/literatura/exemplar.php?code=MzM=&artst=Nzgw" target="_blank">+</a></div>
          </div>
          <div class="book-card">
            <div class="book-cover"><img src="https://lea.co.ao/images/livros/Jonas Savimbi do lado errado da historia.jpg" alt="" onerror="this.style.display='none'"><div class="cover-ph"><i class="ti ti-book"></i></div></div>
            <div class="book-title">Jonas Savimbi</div><div class="book-author">—</div>
            <div class="book-actions"><a class="btn-buy" href="https://lea.co.ao/literatura/exemplar.php?code=Mzk=&artst=MTA4NQ==" target="_blank">Comprar</a><a class="btn-more" href="https://lea.co.ao/literatura/exemplar.php?code=Mzk=&artst=MTA4NQ==" target="_blank">+</a></div>
          </div>
        </div>

        <div class="sec-divider"></div>

        <!-- AD -->
        <div class="ad-strip mb-4">
          <span class="ad-pill-lbl">Pub</span>
          <div class="ad-thumb" style="background:var(--lea-blue);">UN</div>
          <div class="ad-copy"><strong>Unitel — Plano Ilimitado por Kz 3.500/mês</strong><br><span>Ligação rápida em todo o país · unitel.ao</span></div>
          <button class="btn-ad">Ver oferta</button>
        </div>


        <!-- ══ RECENTES ══ -->
        <div class="sec-hdr">
          <div class="sec-hdr-left">
            <div class="sec-icon gold"><i class="ti ti-clock"></i></div>
            <div><h2>Lançamentos <em>recentes</em></h2><small>Os últimos a entrar na plataforma</small></div>
          </div>
          <a class="btn-ver" href="https://lea.co.ao/downloads/todos-livros.php?strt=0&acc=1" target="_blank">Ver todos →</a>
        </div>

        <div class="books-grid">
          <div class="book-card">
            <div class="book-cover"><img src="https://lea.co.ao/images/livros/O-SENTIMENTO-NA-ESCRITA.jpg" alt="" onerror="this.style.display='none'"><div class="cover-ph"><i class="ti ti-book"></i></div><span class="book-badge b-novo">Novo</span></div>
            <div class="book-title">O Sentimento Na Escrita</div><div class="book-author">Adão Zina</div>
            <div class="book-actions"><a class="btn-buy" href="https://lea.co.ao/literatura/exemplar.php?code=MTEy&artst=MjI2Mw==" target="_blank">Comprar</a><a class="btn-more" href="https://lea.co.ao/literatura/exemplar.php?code=MTEy&artst=MjI2Mw==" target="_blank">+</a></div>
          </div>
          <div class="book-card">
            <div class="book-cover"><img src="https://lea.co.ao/images/livros/Gravador-de-Sentimentos.jpg" alt="" onerror="this.style.display='none'"><div class="cover-ph"><i class="ti ti-book"></i></div><span class="book-badge b-novo">Novo</span></div>
            <div class="book-title">Gravador de Sentimentos</div><div class="book-author">Adão Zina</div>
            <div class="book-actions"><a class="btn-buy" href="https://lea.co.ao/literatura/exemplar.php?code=MTEx&artst=MjI2Mw==" target="_blank">Comprar</a><a class="btn-more" href="https://lea.co.ao/literatura/exemplar.php?code=MTEx&artst=MjI2Mw==" target="_blank">+</a></div>
          </div>
          <div class="book-card">
            <div class="book-cover"><img src="https://lea.co.ao/images/livros/Sagrado-Prazer.jpg" alt="" onerror="this.style.display='none'"><div class="cover-ph"><i class="ti ti-book"></i></div><span class="book-badge b-dest">Destaque</span></div>
            <div class="book-title">Sagrado Prazer</div><div class="book-author">Lwinizia Fernandes</div>
            <div class="book-actions"><a class="btn-buy" href="https://lea.co.ao/literatura/exemplar.php?code=MTA5&artst=MjI2MA==" target="_blank">Comprar</a><a class="btn-more" href="https://lea.co.ao/literatura/exemplar.php?code=MTA5&artst=MjI2MA==" target="_blank">+</a></div>
          </div>
          <div class="book-card">
            <div class="book-cover"><img src="https://lea.co.ao/images/livros/Testemunho-de-um-Coracao.jpg" alt="" onerror="this.style.display='none'"><div class="cover-ph"><i class="ti ti-book"></i></div></div>
            <div class="book-title">Testemunho de um Coração</div><div class="book-author">Adão Zina</div>
            <div class="book-actions"><a class="btn-buy" href="https://lea.co.ao/literatura/exemplar.php?code=MTEw&artst=MjI2Mw==" target="_blank">Comprar</a><a class="btn-more" href="https://lea.co.ao/literatura/exemplar.php?code=MTEw&artst=MjI2Mw==" target="_blank">+</a></div>
          </div>
          <div class="book-card">
            <div class="book-cover"><img src="https://lea.co.ao/images/livros/Quinhao-diz-Nao.jpeg" alt="" onerror="this.style.display='none'"><div class="cover-ph"><i class="ti ti-book"></i></div><span class="book-badge b-novo">Novo</span></div>
            <div class="book-title">Quinhão diz Não</div><div class="book-author">Suzana Diogo</div>
            <div class="book-actions"><a class="btn-buy" href="https://lea.co.ao/literatura/exemplar.php?code=MTA4&artst=MjI1Mw==" target="_blank">Comprar</a><a class="btn-more" href="https://lea.co.ao/literatura/exemplar.php?code=MTA4&artst=MjI1Mw==" target="_blank">+</a></div>
          </div>
          <div class="book-card">
            <div class="book-cover"><img src="https://lea.co.ao/images/livros/Adelina-Rosa-Migalhas.jpg" alt="" onerror="this.style.display='none'"><div class="cover-ph"><i class="ti ti-book"></i></div></div>
            <div class="book-title">Migalhas</div><div class="book-author">Poetisa dos Pés Descalços</div>
            <div class="book-actions"><a class="btn-buy" href="https://lea.co.ao/literatura/exemplar.php?code=MTA2&artst=MjIzNg==" target="_blank">Comprar</a><a class="btn-more" href="https://lea.co.ao/literatura/exemplar.php?code=MTA2&artst=MjIzNg==" target="_blank">+</a></div>
          </div>
        </div>

        <div class="cta-ver-mais">
          <a class="btn-cta" href="https://lea.co.ao/downloads/todos-livros.php?strt=0&acc=1" target="_blank">
            <i class="ti ti-books"></i> Ver todos os 112 livros disponíveis <i class="ti ti-arrow-right"></i>
          </a>
        </div>

        <div class="sec-divider"></div>


        <!-- ══ RECOMENDADOS ══ -->
        <div class="sec-hdr">
          <div class="sec-hdr-left">
            <div class="sec-icon gold"><i class="ti ti-thumb-up"></i></div>
            <div><h2>Recomendados <em>pela LEA</em></h2><small>Selecção editorial para descobrir</small></div>
          </div>
        </div>

        <div class="books-grid">
          <div class="book-card">
            <div class="book-cover"><img src="https://lea.co.ao/images/livros/O-Futuro-Nao-Muda-com-as-Palavras.jpg" alt="" onerror="this.style.display='none'"><div class="cover-ph"><i class="ti ti-book"></i></div></div>
            <div class="book-title">O Futuro Não Muda com as Palavras</div><div class="book-author">Poeta Falso</div>
            <div class="book-actions"><a class="btn-buy" href="https://lea.co.ao/literatura/exemplar.php?code=OTk=&artst=MjIyMw==" target="_blank">Comprar</a><a class="btn-more" href="https://lea.co.ao/literatura/exemplar.php?code=OTk=&artst=MjIyMw==" target="_blank">+</a></div>
          </div>
          <div class="book-card">
            <div class="book-cover"><img src="https://lea.co.ao/images/livros/Sorriso-Nao-e-Felicidade.jpg" alt="" onerror="this.style.display='none'"><div class="cover-ph"><i class="ti ti-book"></i></div></div>
            <div class="book-title">Sorriso Não é Felicidade</div><div class="book-author">Poeta Falso</div>
            <div class="book-actions"><a class="btn-buy" href="https://lea.co.ao/literatura/exemplar.php?code=MTAw&artst=MjIyMw==" target="_blank">Comprar</a><a class="btn-more" href="https://lea.co.ao/literatura/exemplar.php?code=MTAw&artst=MjIyMw==" target="_blank">+</a></div>
          </div>
          <div class="book-card">
            <div class="book-cover"><img src="https://lea.co.ao/images/livros/Censurado-no-Pais-das-Maravilhas.jpg" alt="" onerror="this.style.display='none'"><div class="cover-ph"><i class="ti ti-book"></i></div></div>
            <div class="book-title">Censurado no País das Maravilhas</div><div class="book-author">Poeta Falso</div>
            <div class="book-actions"><a class="btn-buy" href="https://lea.co.ao/literatura/exemplar.php?code=OTg=&artst=MjIyMw==" target="_blank">Comprar</a><a class="btn-more" href="https://lea.co.ao/literatura/exemplar.php?code=OTg=&artst=MjIyMw==" target="_blank">+</a></div>
          </div>
          <div class="book-card">
            <div class="book-cover"><img src="https://lea.co.ao/images/livros/O-Pequeno-Mona-e-a-Arvore-dos-Direitos.jpg" alt="" onerror="this.style.display='none'"><div class="cover-ph"><i class="ti ti-book"></i></div></div>
            <div class="book-title">O Pequeno Mona e a Árvore dos Direitos</div><div class="book-author">Bel Neto</div>
            <div class="book-actions"><a class="btn-buy" href="https://lea.co.ao/literatura/exemplar.php?code=OTQ=&artst=MTQ2Ng==" target="_blank">Comprar</a><a class="btn-more" href="https://lea.co.ao/literatura/exemplar.php?code=OTQ=&artst=MTQ2Ng==" target="_blank">+</a></div>
          </div>
          <div class="book-card">
            <div class="book-cover"><img src="https://lea.co.ao/images/livros/Cabo-Delgado-em-Gritos.jpg" alt="" onerror="this.style.display='none'"><div class="cover-ph"><i class="ti ti-book"></i></div></div>
            <div class="book-title">Cabo Delgado em Gritos</div><div class="book-author">Poeta Falso</div>
            <div class="book-actions"><a class="btn-buy" href="https://lea.co.ao/literatura/exemplar.php?code=OTY=&artst=MjIyMw==" target="_blank">Comprar</a><a class="btn-more" href="https://lea.co.ao/literatura/exemplar.php?code=OTY=&artst=MjIyMw==" target="_blank">+</a></div>
          </div>
          <div class="book-card">
            <div class="book-cover"><img src="https://lea.co.ao/images/livros/Adelina-Rosa-Migalhas.jpg" alt="" onerror="this.style.display='none'"><div class="cover-ph"><i class="ti ti-book"></i></div></div>
            <div class="book-title">Migalhas</div><div class="book-author">Poetisa dos Pés Descalços</div>
            <div class="book-actions"><a class="btn-buy" href="https://lea.co.ao/literatura/exemplar.php?code=MTA2&artst=MjIzNg==" target="_blank">Comprar</a><a class="btn-more" href="https://lea.co.ao/literatura/exemplar.php?code=MTA2&artst=MjIzNg==" target="_blank">+</a></div>
          </div>
        </div>

        <div class="cta-ver-mais">
          <a class="btn-cta" href="https://lea.co.ao/downloads/todos-livros.php?strt=0&acc=1" target="_blank">
            <i class="ti ti-books"></i> Explorar todo o catálogo <i class="ti ti-arrow-right"></i>
          </a>
        </div>

      </main>


      <!-- ══════════════ SIDEBAR ══════════════ -->
      <aside class="lit-sidebar desktop-only">

        <!-- Mais procurados (lista compacta) -->
        <div class="sb-card">
          <div class="sb-card-hdr"><i class="ti ti-trending-up"></i><h3>Mais procurados</h3></div>
          <a class="pop-item" href="https://lea.co.ao/literatura/exemplar.php?code=MTAx&artst=MjIyMw==" target="_blank">
            <span class="pop-num n1">1</span>
            <div class="pop-cover"><img src="https://lea.co.ao/images/livros/Hematoma-Social.jpg" alt="" onerror="this.style.display='none'"><div class="pcv-fb"><i class="ti ti-book"></i></div></div>
            <div><div class="pop-title">Hematoma Social</div><div class="pop-meta">Poeta Falso · Poesia</div></div>
          </a>
          <a class="pop-item" href="https://lea.co.ao/literatura/exemplar.php?code=MzU=&artst=MjE3" target="_blank">
            <span class="pop-num n2">2</span>
            <div class="pop-cover"><img src="https://lea.co.ao/images/livros/Voce e maior que o seu sonho.jpg" alt="" onerror="this.style.display='none'"><div class="pcv-fb"><i class="ti ti-book"></i></div></div>
            <div><div class="pop-title">Você é Maior Que Seus Sonhos</div><div class="pop-meta">Auto-ajuda</div></div>
          </a>
          <a class="pop-item" href="https://lea.co.ao/literatura/exemplar.php?code=MTY=&artst=Nzgz" target="_blank">
            <span class="pop-num n3">3</span>
            <div class="pop-cover"><img src="https://lea.co.ao/images/livros/Muana puo.jpg" alt="" onerror="this.style.display='none'"><div class="pcv-fb"><i class="ti ti-book"></i></div></div>
            <div><div class="pop-title">Muana Puó</div><div class="pop-meta">Ficção · Clássico</div></div>
          </a>
          <a class="pop-item" href="https://lea.co.ao/literatura/exemplar.php?code=ODk=&artst=MjA1MA==" target="_blank">
            <span class="pop-num nx">4</span>
            <div class="pop-cover"><img src="https://lea.co.ao/images/livros/Poder Ancestral.jpg" alt="" onerror="this.style.display='none'"><div class="pcv-fb"><i class="ti ti-book"></i></div></div>
            <div><div class="pop-title">Poder Ancestral</div><div class="pop-meta">—</div></div>
          </a>
          <a class="pop-item" href="https://lea.co.ao/literatura/exemplar.php?code=MzM=&artst=Nzgw" target="_blank">
            <span class="pop-num nx">5</span>
            <div class="pop-cover"><img src="https://lea.co.ao/images/livros/a professora de filosofia.jpg" alt="" onerror="this.style.display='none'"><div class="pcv-fb"><i class="ti ti-book"></i></div></div>
            <div><div class="pop-title">A Professora de Filosofia</div><div class="pop-meta">Ficção</div></div>
          </a>
        </div>

        <!-- Teaser Poemas -->
        <a class="sb-teaser poemas" href="poemas.html">
          <div class="sb-teaser-inner">
            <div class="sb-teaser-lbl">✍️ Poesias Angolanas</div>
            <div class="sb-teaser-quote">As belas meninas pardas que passam na rua, de vestidos coloridos e sandálias de lacetes…</div>
            <div class="sb-teaser-footer">
              <span class="sb-teaser-author">Alda Lara · 37 poemas</span>
              <span class="sb-teaser-cta">Ver poesias <i class="ti ti-arrow-right" style="font-size:11px;"></i></span>
            </div>
          </div>
        </a>

        <!-- Teaser Frases -->
        <a class="sb-teaser frases" href="frases.html">
          <div class="sb-teaser-inner">
            <div class="sb-teaser-lbl">💬 Frases & Dizeres</div>
            <div class="sb-teaser-quote">De onde eu vim nem nos era permitido sonhar. E eu sonhei. E cheguei até aqui.</div>
            <div class="sb-teaser-footer">
              <span class="sb-teaser-author">Francisco Destino · 58 frases</span>
              <span class="sb-teaser-cta">Ver frases <i class="ti ti-arrow-right" style="font-size:11px;"></i></span>
            </div>
          </div>
        </a>

        <!-- Newsletter -->
        <div class="sb-newsletter">
          <h4>📬 Newsletter LEA</h4>
          <p>Recebe novos livros e lançamentos directamente no teu e-mail.</p>
          <input type="email" placeholder="O teu e-mail" id="nlEmail">
          <button class="btn-newsletter" id="btnNewsletter">Subscrever grátis</button>
        </div>

      </aside>

    </div>
  </div>


  <!-- FOOTER -->
  <footer class="lea-footer py-3 px-4 mt-0">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
      <div class="d-flex align-items-center gap-2">
        <img src="assets/img/logo.png" alt="LEA" height="24">
        <small style="font-size:11px;color:rgba(255,255,255,0.35);">© 2017–2026</small>
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


  <!-- BOTTOM NAV -->
  <nav class="bottom-nav">
    <a class="bnav-item" href="index.html"><i class="ti ti-home"></i><span class="bnav-lbl">Início</span></a>
    <a class="bnav-item" href="artistas.html"><i class="ti ti-users"></i><span class="bnav-lbl">Artistas</span></a>
    <a class="bnav-item active" href="literatura.html"><i class="ti ti-book"></i><span class="bnav-lbl">Literatura</span></a>
    <a class="bnav-item" href="loja.html"><i class="ti ti-shopping-bag"></i><span class="bnav-lbl">Loja</span></a>
    <button class="bnav-item" id="btnOpenMenu"><i class="ti ti-menu-2"></i><span class="bnav-lbl">Menu</span></button>
  </nav>


  <!-- MENU DRAWER -->
  <div class="menu-drawer" id="menuDrawer">
    <div class="menu-overlay" id="menuOverlay"></div>
    <div class="menu-panel">
      <div class="menu-handle"></div>
      <div class="menu-header">
        <span class="menu-header-title">Menu</span>
        <button class="btn-close-menu" id="btnCloseMenu"><i class="ti ti-x"></i></button>
      </div>
      <div class="menu-section-title">Navegar</div>
      <a class="menu-item" href="index.html"><i class="ti ti-home"></i><div><div class="menu-item-label">Início</div><div class="menu-item-sub">Página principal do LEA</div></div></a>
      <a class="menu-item" href="artistas.html"><i class="ti ti-users"></i><div><div class="menu-item-label">Artistas</div><div class="menu-item-sub">2.200+ artistas angolanos</div></div></a>
      <a class="menu-item" href="musica.html"><i class="ti ti-music"></i><div><div class="menu-item-label">Músicas</div><div class="menu-item-sub">Ouve e descarrega</div></div></a>
      <a class="menu-item" href="videos.html"><i class="ti ti-video"></i><div><div class="menu-item-label">Vídeos</div><div class="menu-item-sub">Clipes, filmes e séries</div></div></a>
      <a class="menu-item" href="literatura.html"><i class="ti ti-book"></i><div><div class="menu-item-label">Literatura</div><div class="menu-item-sub">Livros, poesias e frases</div></div></a>
      <a class="menu-item" href="noticias.html"><i class="ti ti-news"></i><div><div class="menu-item-label">Notícias</div><div class="menu-item-sub">Angola em dia</div></div></a>
      <a class="menu-item" href="eventos.html"><i class="ti ti-calendar-event"></i><div><div class="menu-item-label">Eventos</div><div class="menu-item-sub">Agenda cultural angolana</div></div></a>
      <a class="menu-item" href="loja.html"><i class="ti ti-shopping-bag"></i><div><div class="menu-item-label">Loja</div><div class="menu-item-sub">Livros, CDs, ingressos e mais</div></div></a>
      <div class="menu-section-title">Literatura</div>
      <a class="menu-item" href="livros.html"><i class="ti ti-books"></i><div><div class="menu-item-label">Livros</div><div class="menu-item-sub">112 livros à venda</div></div></a>
      <a class="menu-item" href="poemas.html"><i class="ti ti-feather"></i><div><div class="menu-item-label">Poesias</div><div class="menu-item-sub">37 poemas angolanos</div></div></a>
      <a class="menu-item" href="frases.html"><i class="ti ti-quote"></i><div><div class="menu-item-label">Frases & Dizeres</div><div class="menu-item-sub">58 frases de artistas</div></div></a>
      <div class="menu-section-title">Conta</div>
      <a class="menu-item" href="#"><i class="ti ti-user-circle"></i><div><div class="menu-item-label">Entrar</div><div class="menu-item-sub">Aceder à minha conta</div></div></a>
      <a class="menu-item" href="#"><i class="ti ti-rosette-discount-check"></i><div><div class="menu-item-label">Certificar artista</div><div class="menu-item-sub">Destaca-te na plataforma</div></div></a>
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
  <script>
    // Filter tabs
    document.querySelectorAll('.filter-tab').forEach(tab => {
      tab.addEventListener('click', e => {
        e.preventDefault();
        document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
      });
    });

    // Newsletter
    document.getElementById('btnNewsletter')?.addEventListener('click', () => {
      const input = document.getElementById('nlEmail');
      if (input?.value?.includes('@')) {
        const btn = document.getElementById('btnNewsletter');
        btn.textContent = '✓ Subscrito!';
        btn.style.background = '#E8F0FB';
        btn.style.color = 'var(--lea-blue)';
        input.value = '';
        setTimeout(() => { btn.textContent = 'Subscrever grátis'; btn.style.cssText = ''; }, 3000);
      }
    });

    // Menu drawer
    const drawer  = document.getElementById('menuDrawer');
    const overlay = document.getElementById('menuOverlay');
    document.getElementById('btnOpenMenu').addEventListener('click', () => drawer.classList.add('open'));
    document.getElementById('btnCloseMenu').addEventListener('click', () => drawer.classList.remove('open'));
    overlay.addEventListener('click', () => drawer.classList.remove('open'));
  </script>

</body>
</html>