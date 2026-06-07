<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LEA Músicas — Ouve & Descarrega</title>

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.19.0/dist/tabler-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=DM+Sans:wght@400;500&family=Playfair+Display:ital,wght@0,700;1,600&display=swap" rel="stylesheet">

  <style>
    :root {
      --lea-blue:       #2563B0;
      --lea-blue-dark:  #1A4A8A;
      --lea-blue-light: #E8F0FB;
      --lea-teal:       #1D9E75;
      --lea-purple:     #534AB7;
      --lea-amber:      #E8A020;
      --lea-surface:    #f5f7fb;
      --lea-white:      #ffffff;
      --lea-border:     rgba(37,99,176,0.12);
      --lea-text:       #111827;
      --lea-muted:      #6B7280;

      --music-bg:       #0D1B2E;
      --music-card:     #142035;
      --music-card2:    #1C2D47;
      --music-accent:   #E8A020;
      --music-accent2:  #2563B0;
      --music-text:     #F0F4FF;
      --music-muted:    rgba(240,244,255,0.55);
      --music-border:   rgba(255,255,255,0.08);
      --music-glow:     rgba(232,160,32,0.18);
    }

    *, *::before, *::after { box-sizing: border-box; }
    body { font-family: 'DM Sans', sans-serif; background: var(--music-bg); color: var(--music-text); margin: 0; overflow-x: hidden; }
    h1,h2,h3,h4,h5 { font-family: 'Sora', sans-serif; }

    ::-webkit-scrollbar { width: 6px; }
    ::-webkit-scrollbar-track { background: var(--music-bg); }
    ::-webkit-scrollbar-thumb { background: var(--music-card2); border-radius: 99px; }

    /* ── NAVBAR DESKTOP ── */
    .navbar { background: rgba(13,27,46,0.95) !important; backdrop-filter: blur(12px); border-bottom: 1px solid var(--music-border); }
    .nav-link { font-size: 13px; color: var(--music-muted) !important; padding: 4px 10px !important; border-radius: 6px; transition: all .15s; }
    .nav-link:hover { color: var(--music-text) !important; background: rgba(255,255,255,0.07); }
    .nav-link.active { color: var(--music-accent) !important; background: rgba(255,255,255,0.07); }
    .nav-search { display: flex; align-items: center; gap: 6px; background: rgba(255,255,255,0.06); border: 1px solid var(--music-border); border-radius: 8px; padding: 6px 12px; font-size: 12px; color: var(--music-muted); min-width: 150px; cursor: pointer; transition: border .15s; }
    .nav-search:hover { border-color: var(--music-accent); }
    .btn-entrar { background: var(--lea-blue); color: #fff; border: none; border-radius: 8px; font-size: 13px; font-weight: 500; padding: 7px 16px; cursor: pointer; transition: background .15s; font-family: inherit; }
    .btn-entrar:hover { background: var(--lea-blue-dark); }

    /* ── MOBILE TOPBAR ── */
    .mobile-topbar { display: none; background: rgba(13,27,46,0.97); border-bottom: 1px solid var(--music-border); padding: 10px 16px; align-items: center; justify-content: space-between; position: sticky; top: 0; z-index: 200; }

    /* ── BOTTOM NAV ── */
    .bottom-nav { background: rgba(13,27,46,0.97); border-top: 1px solid var(--music-border); position: fixed; bottom: 0; left: 0; right: 0; height: 62px; display: none; align-items: center; justify-content: space-around; z-index: 400; padding-bottom: env(safe-area-inset-bottom, 0); }
    .bnav-item { display: flex; flex-direction: column; align-items: center; gap: 3px; font-size: 22px; color: var(--music-muted); cursor: pointer; text-decoration: none; flex: 1; justify-content: center; transition: color .12s; background: none; border: none; font-family: inherit; }
    .bnav-item.active, .bnav-item:hover { color: var(--music-accent); }
    .bnav-lbl { font-size: 9px; font-weight: 500; font-family: 'DM Sans', sans-serif; }

    /* ── MENU DRAWER ── */
    .menu-drawer { position: fixed; inset: 0; z-index: 500; pointer-events: none; }
    .menu-drawer.open { pointer-events: all; }
    .menu-overlay { position: absolute; inset: 0; background: rgba(0,0,0,0); transition: background .3s; }
    .menu-drawer.open .menu-overlay { background: rgba(0,0,0,0.6); }
    .menu-panel { position: absolute; bottom: 0; left: 0; right: 0; background: #0D1B2E; border-top: 1px solid var(--music-border); border-radius: 20px 20px 0 0; padding: 0 0 env(safe-area-inset-bottom, 16px); max-height: 88vh; overflow-y: auto; transform: translateY(100%); transition: transform .35s cubic-bezier(.32,0,.25,1); }
    .menu-drawer.open .menu-panel { transform: translateY(0); }
    .menu-handle { width: 36px; height: 4px; background: rgba(255,255,255,0.15); border-radius: 2px; margin: 12px auto 4px; }
    .menu-header { display: flex; align-items: center; justify-content: space-between; padding: 10px 20px 8px; border-bottom: 1px solid var(--music-border); }
    .menu-header-title { font-size: 15px; font-weight: 700; color: var(--music-text); }
    .btn-close-menu { background: none; border: none; font-size: 20px; color: var(--music-muted); cursor: pointer; padding: 4px; }
    .menu-section-title { font-size: 10px; font-weight: 700; letter-spacing: .8px; text-transform: uppercase; color: var(--music-muted); padding: 14px 20px 6px; }
    .menu-item { display: flex; align-items: center; gap: 14px; padding: 11px 20px; text-decoration: none; transition: background .12s; }
    .menu-item:hover { background: rgba(255,255,255,0.04); }
    .menu-item > i { font-size: 20px; color: var(--music-accent); width: 24px; flex-shrink: 0; }
    .menu-item-label { font-size: 14px; font-weight: 500; color: var(--music-text); }
    .menu-item-sub { font-size: 11px; color: var(--music-muted); margin-top: 1px; }
    .menu-social { display: flex; gap: 16px; padding: 12px 20px; }
    .menu-social a { font-size: 22px; color: var(--music-muted); text-decoration: none; transition: color .12s; }
    .menu-social a:hover { color: var(--music-accent); }
    .btn-menu-entrar { display: block; width: calc(100% - 40px); margin: 14px 20px; background: var(--lea-blue); color: #fff; border: none; border-radius: 10px; font-size: 14px; font-weight: 600; padding: 13px; cursor: pointer; font-family: inherit; transition: background .15s; }
    .btn-menu-entrar:hover { background: var(--lea-blue-dark); }

    /* ── HERO ──
       FIX 2: sem padding-bottom no hero — o espaço antes da filter bar era causado por aqui */
    .hero-music { position: relative; padding: 56px 0 0; overflow: hidden; }
    .hero-music::before { content: ''; position: absolute; inset: 0; background: radial-gradient(ellipse 80% 60% at 70% 40%, rgba(232,160,32,0.12) 0%, transparent 60%), radial-gradient(ellipse 50% 80% at 20% 80%, rgba(37,99,176,0.2) 0%, transparent 60%); }
    .hero-music .container { position: relative; z-index: 2; }
    .hero-eyebrow { display: inline-flex; align-items: center; gap: 8px; font-size: 11px; font-weight: 600; letter-spacing: 1.5px; text-transform: uppercase; color: var(--music-accent); margin-bottom: 14px; }
    .hero-eyebrow::before { content: ''; width: 24px; height: 2px; background: var(--music-accent); border-radius: 1px; }
    .hero-title { font-family: 'Playfair Display', serif; font-size: clamp(32px, 5vw, 52px); font-weight: 700; line-height: 1.1; color: var(--music-text); margin-bottom: 14px; }
    .hero-title em { font-style: italic; color: var(--music-accent); }
    .hero-subtitle { font-size: 15px; color: var(--music-muted); line-height: 1.65; max-width: 440px; margin-bottom: 28px; }
    .hero-stats { display: flex; gap: 28px; }
    .hstat-num { font-family: 'Sora', sans-serif; font-size: 22px; font-weight: 700; color: var(--music-text); }
    .hstat-num span { color: var(--music-accent); }
    .hstat-lbl { font-size: 11px; color: var(--music-muted); margin-top: 1px; }

    /* ── Featured card ── */
    .featured-track-card { background: var(--music-card); border: 1px solid var(--music-border); border-radius: 20px; padding: 28px; position: relative; overflow: hidden; }
    .featured-track-card::before { content: ''; position: absolute; top: -40px; right: -40px; width: 200px; height: 200px; border-radius: 50%; background: radial-gradient(circle, var(--music-glow) 0%, transparent 70%); }
    .featured-label { display: inline-flex; align-items: center; gap: 6px; font-size: 10px; font-weight: 600; letter-spacing: .8px; text-transform: uppercase; color: var(--music-accent); background: rgba(232,160,32,0.12); padding: 4px 12px; border-radius: 99px; margin-bottom: 16px; }
    .featured-cover { width: 100%; aspect-ratio: 1; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-family: 'Playfair Display', serif; font-size: 36px; font-weight: 700; color: #fff; position: relative; overflow: hidden; margin-bottom: 16px; }
    .featured-cover .cover-overlay { position: absolute; inset: 0; background: linear-gradient(135deg, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.4) 100%); }
    .featured-cover .cover-text { position: relative; z-index: 1; text-align: center; padding: 12px; }
    .featured-cover .cover-text .ct { font-size: 13px; opacity: .8; font-family: 'DM Sans', sans-serif; }
    .featured-track-title { font-size: 17px; font-weight: 700; color: var(--music-text); margin-bottom: 2px; }
    .featured-track-artist { font-size: 13px; color: var(--music-muted); margin-bottom: 14px; }

    /* ── Waveform ── */
    .waveform { display: flex; align-items: center; gap: 2px; height: 28px; margin-bottom: 14px; }
    .waveform .bar { width: 3px; border-radius: 2px; background: var(--music-accent); opacity: 0.6; animation: wave 1.4s ease-in-out infinite; }
    .waveform .bar:nth-child(odd) { opacity: 0.35; }
    @keyframes wave { 0%, 100% { transform: scaleY(1); } 50% { transform: scaleY(0.3); } }
    .bar:nth-child(1){height:8px;animation-delay:0s} .bar:nth-child(2){height:18px;animation-delay:.1s} .bar:nth-child(3){height:12px;animation-delay:.2s} .bar:nth-child(4){height:24px;animation-delay:.05s} .bar:nth-child(5){height:16px;animation-delay:.15s} .bar:nth-child(6){height:20px;animation-delay:.25s} .bar:nth-child(7){height:10px;animation-delay:.08s} .bar:nth-child(8){height:22px;animation-delay:.18s} .bar:nth-child(9){height:14px;animation-delay:.3s} .bar:nth-child(10){height:26px;animation-delay:.12s} .bar:nth-child(11){height:8px;animation-delay:.22s} .bar:nth-child(12){height:20px;animation-delay:.06s} .bar:nth-child(13){height:16px;animation-delay:.28s} .bar:nth-child(14){height:12px;animation-delay:.14s} .bar:nth-child(15){height:24px;animation-delay:.04s} .bar:nth-child(16){height:18px;animation-delay:.2s} .bar:nth-child(17){height:10px;animation-delay:.1s} .bar:nth-child(18){height:22px;animation-delay:.16s} .bar:nth-child(19){height:14px;animation-delay:.26s} .bar:nth-child(20){height:20px;animation-delay:.08s}

    .btn-play-big { width: 48px; height: 48px; border-radius: 50%; background: var(--music-accent); color: #0D1B2E; border: none; display: flex; align-items: center; justify-content: center; font-size: 20px; cursor: pointer; flex-shrink: 0; transition: transform .15s, box-shadow .15s; box-shadow: 0 4px 20px rgba(232,160,32,0.4); }
    .btn-play-big:hover { transform: scale(1.08); box-shadow: 0 6px 28px rgba(232,160,32,0.55); }
    .btn-download-sm { display: inline-flex; align-items: center; gap: 6px; background: rgba(255,255,255,0.08); color: var(--music-text); border: 1px solid var(--music-border); border-radius: 8px; font-size: 12px; font-weight: 500; padding: 8px 14px; cursor: pointer; transition: background .15s, border-color .15s; text-decoration: none; }
    .btn-download-sm:hover { background: rgba(255,255,255,0.14); border-color: rgba(255,255,255,0.2); color: var(--music-text); }

    /* ── Filter bar ── */
    .filter-bar { background: var(--music-card); border-bottom: 1px solid var(--music-border); padding: 0 24px; display: flex; align-items: center; overflow-x: auto; }
    .filter-bar::-webkit-scrollbar { height: 0; }
    .filter-tab { font-size: 13px; font-weight: 500; color: var(--music-muted); padding: 14px 18px; border-bottom: 2px solid transparent; cursor: pointer; white-space: nowrap; transition: all .15s; text-decoration: none; display: block; }
    .filter-tab:hover { color: var(--music-text); }
    .filter-tab.active { color: var(--music-accent); border-bottom-color: var(--music-accent); }
    .filter-right { margin-left: auto; display: flex; align-items: center; gap: 8px; padding: 8px 0; }
    .filter-select { background: rgba(255,255,255,0.07); border: 1px solid var(--music-border); border-radius: 8px; color: var(--music-muted); font-size: 12px; padding: 6px 10px; cursor: pointer; outline: none; }
    .filter-select option { background: var(--music-card); }

    /* ── Music section ── */
    .music-section { padding: 32px 0 90px; }
    .sec-hdr { display: flex; align-items: baseline; justify-content: space-between; margin-bottom: 18px; }
    .sec-hdr h2 { font-size: 16px; font-weight: 700; color: var(--music-text); margin: 0; }
    .sec-link { font-size: 12px; color: var(--music-accent); text-decoration: none; }
    .sec-link:hover { text-decoration: underline; }

    /* ── Genre cards ── */
    .genre-card { border-radius: 14px; padding: 20px; display: flex; flex-direction: column; justify-content: flex-end; min-height: 110px; position: relative; overflow: hidden; cursor: pointer; transition: transform .2s; }
    .genre-card:hover { transform: translateY(-3px); }
    .genre-card::before { content: ''; position: absolute; inset: 0; background: linear-gradient(to bottom, transparent 30%, rgba(0,0,0,0.55) 100%); }
    .genre-card-content { position: relative; z-index: 1; }
    .genre-card-icon { font-size: 28px; margin-bottom: 6px; }
    .genre-card-name { font-size: 14px; font-weight: 700; color: #fff; }
    .genre-card-count { font-size: 11px; color: rgba(255,255,255,0.65); }

    /* ── Album cards ── */
    .album-card { background: var(--music-card); border: 1px solid var(--music-border); border-radius: 14px; overflow: hidden; transition: transform .2s, border-color .2s; cursor: pointer; }
    .album-card:hover { transform: translateY(-4px); border-color: rgba(232,160,32,0.3); }
    .album-cover { width: 100%; aspect-ratio: 1; display: flex; align-items: center; justify-content: center; font-family: 'Playfair Display', serif; font-size: 28px; font-weight: 700; color: #fff; position: relative; overflow: hidden; }
    .album-cover .cover-overlay { position: absolute; inset: 0; background: linear-gradient(to bottom, transparent 50%, rgba(0,0,0,0.6) 100%); }
    .album-cover .play-hover { position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; background: rgba(0,0,0,0.4); opacity: 0; transition: opacity .2s; }
    .album-cover .play-hover i { font-size: 36px; color: #fff; }
    .album-card:hover .play-hover { opacity: 1; }
    .album-cover .cover-initials { position: relative; z-index: 1; }
    .album-body { padding: 12px; }
    .album-title { font-size: 13px; font-weight: 600; color: var(--music-text); margin-bottom: 2px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .album-artist { font-size: 12px; color: var(--music-muted); }
    .album-meta { display: flex; align-items: center; justify-content: space-between; margin-top: 8px; }
    .album-genre { font-size: 10px; font-weight: 500; background: rgba(232,160,32,0.12); color: var(--music-accent); padding: 2px 8px; border-radius: 99px; }
    .album-year { font-size: 10px; color: var(--music-muted); }

    /* ── Track list ── */
    .track-list-card { background: var(--music-card); border: 1px solid var(--music-border); border-radius: 14px; overflow: hidden; }
    .track-list-header { padding: 14px 16px; border-bottom: 1px solid var(--music-border); display: grid; grid-template-columns: 32px 1fr 80px 60px 90px; gap: 10px; align-items: center; font-size: 10px; font-weight: 600; letter-spacing: .6px; text-transform: uppercase; color: var(--music-muted); }
    .track-row { padding: 10px 16px; display: grid; grid-template-columns: 32px 1fr 80px 60px 90px; gap: 10px; align-items: center; border-bottom: 1px solid var(--music-border); transition: background .12s; cursor: pointer; }
    .track-row:last-child { border-bottom: none; }
    .track-row:hover { background: rgba(255,255,255,0.04); }
    .track-row:hover .track-num { opacity: 0; }
    .track-row:hover .track-play-btn { opacity: 1; }
    .track-num { font-size: 13px; color: var(--music-muted); text-align: center; transition: opacity .12s; }
    .track-play-btn { width: 28px; height: 28px; border-radius: 50%; background: var(--music-accent); color: #0D1B2E; border: none; display: flex; align-items: center; justify-content: center; font-size: 13px; cursor: pointer; opacity: 0; transition: opacity .12s; position: absolute; }
    .track-info { display: flex; align-items: center; gap: 10px; min-width: 0; }
    .track-thumb { width: 36px; height: 36px; border-radius: 6px; flex-shrink: 0; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 700; color: #fff; }
    .track-name { font-size: 13px; font-weight: 500; color: var(--music-text); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .track-artist-name { font-size: 11px; color: var(--music-muted); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .track-genre-pill { font-size: 10px; font-weight: 500; background: rgba(255,255,255,0.07); color: var(--music-muted); padding: 3px 8px; border-radius: 99px; white-space: nowrap; }
    .track-duration { font-size: 12px; color: var(--music-muted); }
    .track-actions { display: flex; align-items: center; justify-content: flex-end; gap: 6px; }
    .btn-icon { width: 30px; height: 30px; border-radius: 8px; background: transparent; border: 1px solid var(--music-border); color: var(--music-muted); font-size: 15px; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all .12s; text-decoration: none; flex-shrink: 0; }
    .btn-icon:hover { background: rgba(255,255,255,0.08); color: var(--music-text); border-color: rgba(255,255,255,0.15); }
    .btn-icon.download:hover { color: var(--music-accent); border-color: rgba(232,160,32,0.3); }

    /* ── Ad strip ── */
    .ad-strip { background: var(--music-card2); border: 1px solid var(--music-border); border-radius: 12px; padding: 12px 16px; display: flex; align-items: center; gap: 14px; }
    .ad-pill { font-size: 9px; letter-spacing: .5px; text-transform: uppercase; color: rgba(255,255,255,0.25); border: 1px solid rgba(255,255,255,0.12); border-radius: 4px; padding: 2px 6px; flex-shrink: 0; }
    .ad-strip-thumb { width: 48px; height: 36px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 700; color: #fff; flex-shrink: 0; }
    .ad-strip-copy { flex: 1; }
    .ad-strip-copy strong { font-size: 13px; font-weight: 500; color: var(--music-text); }
    .ad-strip-copy span { font-size: 11px; color: var(--music-muted); }
    .ad-strip-cta { background: var(--lea-blue); color: #fff; border: none; border-radius: 8px; font-size: 12px; font-weight: 500; padding: 7px 14px; cursor: pointer; white-space: nowrap; flex-shrink: 0; font-family: inherit; }

    /* ── NOW PLAYING BAR ── */
    .now-playing-bar { position: fixed; left: 0; right: 0; bottom: 0; z-index: 300; background: rgba(12,22,38,0.97); backdrop-filter: blur(20px); border-top: 1px solid var(--music-border); padding: 10px 24px; display: grid; grid-template-columns: 1fr 2fr 1fr; gap: 16px; align-items: center; }
    .np-info { display: flex; align-items: center; gap: 12px; min-width: 0; }
    .np-thumb { width: 44px; height: 44px; border-radius: 8px; flex-shrink: 0; display: flex; align-items: center; justify-content: center; font-size: 14px; font-weight: 700; color: #fff; background: linear-gradient(135deg, var(--lea-blue), var(--music-accent)); }
    .np-name { font-size: 13px; font-weight: 600; color: var(--music-text); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .np-artist { font-size: 11px; color: var(--music-muted); }
    .btn-heart { background: none; border: none; color: var(--music-muted); font-size: 18px; cursor: pointer; padding: 4px; transition: color .12s; }
    .btn-heart:hover { color: #F43F5E; }
    .np-controls { display: flex; flex-direction: column; align-items: center; gap: 8px; }
    .np-buttons { display: flex; align-items: center; gap: 14px; }
    .btn-ctrl { background: none; border: none; color: var(--music-muted); font-size: 20px; cursor: pointer; padding: 4px; transition: color .12s; }
    .btn-ctrl:hover { color: var(--music-text); }
    .btn-ctrl-main { width: 38px; height: 38px; border-radius: 50%; background: var(--music-accent); color: #0D1B2E; border: none; display: flex; align-items: center; justify-content: center; font-size: 18px; cursor: pointer; transition: transform .15s; box-shadow: 0 0 16px rgba(232,160,32,0.35); }
    .btn-ctrl-main:hover { transform: scale(1.08); }
    .np-progress { display: flex; align-items: center; gap: 10px; width: 100%; }
    .np-time { font-size: 11px; color: var(--music-muted); white-space: nowrap; }
    .progress-track { flex: 1; height: 4px; background: rgba(255,255,255,0.1); border-radius: 2px; cursor: pointer; position: relative; }
    .progress-fill { height: 100%; border-radius: 2px; background: linear-gradient(90deg, var(--music-accent), #F59E0B); width: 35%; position: relative; }
    .progress-fill::after { content: ''; position: absolute; right: -5px; top: -4px; width: 12px; height: 12px; border-radius: 50%; background: var(--music-accent); box-shadow: 0 0 8px rgba(232,160,32,0.6); }
    .np-right { display: flex; align-items: center; justify-content: flex-end; gap: 10px; }
    .volume-track { width: 80px; height: 4px; background: rgba(255,255,255,0.1); border-radius: 2px; cursor: pointer; }
    .volume-fill { height: 100%; width: 65%; background: rgba(255,255,255,0.35); border-radius: 2px; }
    .btn-download-player { display: inline-flex; align-items: center; gap: 6px; background: rgba(232,160,32,0.12); color: var(--music-accent); border: 1px solid rgba(232,160,32,0.25); border-radius: 8px; font-size: 12px; font-weight: 500; padding: 7px 12px; cursor: pointer; transition: background .15s; text-decoration: none; }
    .btn-download-player:hover { background: rgba(232,160,32,0.2); color: var(--music-accent); }

    /* ── Pagination ── */
    .lea-pagination { display: flex; align-items: center; gap: 4px; flex-wrap: wrap; }
    .page-btn { width: 36px; height: 36px; border-radius: 8px; background: var(--music-card); border: 1px solid var(--music-border); color: var(--music-muted); font-size: 13px; display: flex !important; align-items: center; justify-content: center; cursor: pointer; transition: all .12s; text-decoration: none; }
    .page-btn:hover { background: var(--music-card2); color: var(--music-text); }
    .page-btn.active { background: var(--music-accent); color: #0D1B2E; border-color: var(--music-accent); font-weight: 700; }

    /* ── RESPONSIVE ── */
    @media (max-width: 991px) {
      .navbar        { display: none !important; }
      .mobile-topbar { display: flex; }
      .bottom-nav    { display: flex; }

      /* FIX 2: hero compacto no mobile, sem padding extra */
      .hero-music { padding-top: 16px; }
      .hero-music .container { padding-top: 8px !important; padding-bottom: 8px !important; }

      /* Player sobe acima do bottom-nav */
      .now-playing-bar { grid-template-columns: 1fr; gap: 8px; padding: 10px 16px; bottom: 62px; }
      .np-right { display: none; }

      /* music-section: padding para não ficar tapado pelo player + bottom-nav */
      .music-section { padding-bottom: 210px; }

      /* FIX 1: track list mobile — grid de 3 colunas reais
         Escondemos os filhos 3 e 4 da .track-row (género e duração)
         usando nth-child para garantir que não ocupam células da grid */
      .track-list-header,
      .track-row {
        grid-template-columns: 28px 1fr auto;
        gap: 8px;
        padding: 10px 12px;
      }
      /* Esconder header do género e duração */
      .track-list-header .col-genre,
      .track-list-header .col-dur { display: none; }
      /* Esconder célula 3 (género) e célula 4 (duração) de cada track-row */
      .track-row > div:nth-child(3),
      .track-row > div:nth-child(4) { display: none; }
      /* Acções: último filho, sempre à direita, dois botões lado a lado */
      .track-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 4px;
        flex-wrap: nowrap;
      }
      .track-actions .btn-icon {
        width: 28px;
        height: 28px;
        flex-shrink: 0;
      }

      .hero-title { font-size: 28px; }
    }

    @media (max-width: 576px) {
      .ad-strip-cta { display: none; }
      .hero-stats   { gap: 16px; }
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
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu"
        style="color:rgba(240,244,255,0.6);">
        <span class="navbar-toggler-icon" style="filter:invert(1);"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav me-auto mb-0">
          <li class="nav-item"><a class="nav-link" href="index.html">Início</a></li>
          <li class="nav-item"><a class="nav-link" href="artistas.html">Artistas</a></li>
          <li class="nav-item"><a class="nav-link active" href="musica.html">Músicas</a></li>
          <li class="nav-item"><a class="nav-link" href="videos.html">Vídeos</a></li>
          <li class="nav-item"><a class="nav-link" href="literatura.html">Literatura</a></li>
          <li class="nav-item"><a class="nav-link" href="noticias.html">Notícias</a></li>
          <li class="nav-item"><a class="nav-link" href="eventos.html">Eventos</a></li>
          <li class="nav-item"><a class="nav-link" href="loja.html">Loja</a></li>
        </ul>
        <div class="d-flex align-items-center gap-2 mt-2 mt-lg-0">
          <div class="nav-search d-none d-md-flex">
            <i class="ti ti-search" style="font-size:13px;"></i>
            Pesquisar músicas…
          </div>
          <button class="btn-entrar">Entrar</button>
        </div>
      </div>
    </div>
  </nav>

  <!-- TOPBAR MOBILE -->
	<header class="mobile-topbar">
		<div class="logo-link-mbl">
			<a href="index.html">
				<img src="assets/img/logo.png" alt="LEA" class="logo-shodow">			
			</a>
			<a href="index.html" class="txt-logo-link">
				<span class="logo-lea-b txt-logo-link-mbl">LEA</span>
			</a>
		</div>
		<div class="d-flex gap-3" style="font-size:20px;color:rgba(240,244,255,0.6);">
			<i class="ti ti-search"></i>
			<i class="ti ti-bell"></i>
			<i class="ti ti-user-circle"></i>
		</div>
	</header>


  <!-- HERO -->
  <section class="hero-music">
    <div class="container py-4">
      <div class="row g-4 align-items-center">

        <div class="col-lg-6">
          <div class="hero-eyebrow">Música Angolana</div>
          <h1 class="hero-title">O som de Angola,<br><em>ao alcance de todos</em></h1>
          <p class="hero-subtitle">Ouve, descobre e descarrega músicas de artistas angolanos de todos os géneros — Semba, Kuduro, Kizomba, Afrohouse, Rap e muito mais.</p>
          <div class="hero-stats">
            <div><div class="hstat-num">8<span>k+</span></div><div class="hstat-lbl">Músicas</div></div>
            <div><div class="hstat-num">620</div><div class="hstat-lbl">Artistas</div></div>
            <div><div class="hstat-num">12</div><div class="hstat-lbl">Géneros</div></div>
          </div>
        </div>

        <!-- Featured track card -->
        <div class="col-lg-3 col-md-5">
          <div class="featured-track-card">
            <div class="featured-label"><i class="ti ti-flame"></i> Em destaque</div>
            <div class="featured-cover" style="background:linear-gradient(135deg,#2563B0,#E8A020);">
              <div class="cover-overlay"></div>
              <div class="cover-text">
                <div>NC</div>
                <div class="ct">Nilda Catumbela</div>
              </div>
            </div>
            <div class="featured-track-title">Minha Terra</div>
            <div class="featured-track-artist">Nilda Catumbela · Semba · 2025</div>
            <div class="waveform">
              <div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div>
              <div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div>
              <div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div>
              <div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div>
            </div>
            <div class="d-flex align-items-center gap-2">
              <button class="btn-play-big"><i class="ti ti-player-play-filled"></i></button>
              <a href="#" class="btn-download-sm"><i class="ti ti-download"></i> Baixar</a>
            </div>
          </div>
        </div>

        <!-- Trending list -->
        <div class="col-lg-3 col-md-7">
          <div style="background:var(--music-card);border:1px solid var(--music-border);border-radius:14px;overflow:hidden;">
            <div style="padding:12px 14px;border-bottom:1px solid var(--music-border);">
              <div style="font-size:11px;font-weight:600;letter-spacing:.6px;text-transform:uppercase;color:var(--music-muted);">
                <i class="ti ti-trending-up" style="color:var(--music-accent);"></i> Trending agora
              </div>
            </div>
            <div style="padding:10px 14px;display:flex;align-items:center;gap:10px;border-bottom:1px solid var(--music-border);">
              <div style="font-size:18px;font-weight:700;color:var(--music-accent);width:20px;">1</div>
              <div style="width:36px;height:36px;border-radius:6px;background:linear-gradient(135deg,#2563B0,#534AB7);display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;color:#fff;flex-shrink:0;">FB</div>
              <div style="flex:1;min-width:0;"><div style="font-size:12px;font-weight:500;color:var(--music-text);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">Fogo no Palco</div><div style="font-size:11px;color:var(--music-muted);">Feeling Black</div></div>
              <button class="btn-icon"><i class="ti ti-player-play"></i></button>
            </div>
            <div style="padding:10px 14px;display:flex;align-items:center;gap:10px;border-bottom:1px solid var(--music-border);">
              <div style="font-size:18px;font-weight:700;color:var(--music-muted);width:20px;">2</div>
              <div style="width:36px;height:36px;border-radius:6px;background:linear-gradient(135deg,#1D9E75,#2563B0);display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;color:#fff;flex-shrink:0;">MK</div>
              <div style="flex:1;min-width:0;"><div style="font-size:12px;font-weight:500;color:var(--music-text);">Angola Bela</div><div style="font-size:11px;color:var(--music-muted);">Mamborró</div></div>
              <button class="btn-icon"><i class="ti ti-player-play"></i></button>
            </div>
            <div style="padding:10px 14px;display:flex;align-items:center;gap:10px;border-bottom:1px solid var(--music-border);">
              <div style="font-size:18px;font-weight:700;color:var(--music-muted);width:20px;">3</div>
              <div style="width:36px;height:36px;border-radius:6px;background:linear-gradient(135deg,#E8A020,#2563B0);display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;color:#fff;flex-shrink:0;">AK</div>
              <div style="flex:1;min-width:0;"><div style="font-size:12px;font-weight:500;color:var(--music-text);">Luanda de Noite</div><div style="font-size:11px;color:var(--music-muted);">Al Kapone</div></div>
              <button class="btn-icon"><i class="ti ti-player-play"></i></button>
            </div>
            <div style="padding:10px 14px;display:flex;align-items:center;gap:10px;border-bottom:1px solid var(--music-border);">
              <div style="font-size:18px;font-weight:700;color:var(--music-muted);width:20px;">4</div>
              <div style="width:36px;height:36px;border-radius:6px;background:linear-gradient(135deg,#534AB7,#1D9E75);display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;color:#fff;flex-shrink:0;">NC</div>
              <div style="flex:1;min-width:0;"><div style="font-size:12px;font-weight:500;color:var(--music-text);">Minha Terra</div><div style="font-size:11px;color:var(--music-muted);">Nilda Catumbela</div></div>
              <button class="btn-icon"><i class="ti ti-player-play"></i></button>
            </div>
            <div style="padding:10px 14px;display:flex;align-items:center;gap:10px;">
              <div style="font-size:18px;font-weight:700;color:var(--music-muted);width:20px;">5</div>
              <div style="width:36px;height:36px;border-radius:6px;background:linear-gradient(135deg,#C07A1A,#2563B0);display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;color:#fff;flex-shrink:0;">BR</div>
              <div style="flex:1;min-width:0;"><div style="font-size:12px;font-weight:500;color:var(--music-text);">Kinaxixi</div><div style="font-size:11px;color:var(--music-muted);">Bruxa MC</div></div>
              <button class="btn-icon"><i class="ti ti-player-play"></i></button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- FILTER BAR -->
  <div class="filter-bar">
    <a class="filter-tab active" href="#">Todos</a>
    <a class="filter-tab" href="#">Semba</a>
    <a class="filter-tab" href="#">Kuduro</a>
    <a class="filter-tab" href="#">Kizomba</a>
    <a class="filter-tab" href="#">Afrohouse</a>
    <a class="filter-tab" href="#">Rap / Hip-Hop</a>
    <a class="filter-tab" href="#">R&B</a>
    <a class="filter-tab" href="#">Gospel</a>
    <a class="filter-tab" href="#">Jazz</a>
    <div class="filter-right">
      <select class="filter-select">
        <option>Mais recentes</option>
        <option>Mais ouvidas</option>
        <option>Mais baixadas</option>
        <option>A-Z</option>
      </select>
    </div>
  </div>

  <!-- CONTEÚDO PRINCIPAL -->
  <div class="music-section">
    <div class="container">

      <!-- GÉNEROS -->
      <div class="sec-hdr mb-3"><h2>Explorar por género</h2></div>
      <div class="row g-2 mb-4">
        <div class="col-6 col-md-2"><div class="genre-card" style="background:linear-gradient(135deg,#2563B0,#1A4A8A);"><div class="genre-card-content"><div class="genre-card-icon">🎷</div><div class="genre-card-name">Semba</div><div class="genre-card-count">1.2k músicas</div></div></div></div>
        <div class="col-6 col-md-2"><div class="genre-card" style="background:linear-gradient(135deg,#E8A020,#C07A1A);"><div class="genre-card-content"><div class="genre-card-icon">⚡</div><div class="genre-card-name">Kuduro</div><div class="genre-card-count">2.1k músicas</div></div></div></div>
        <div class="col-6 col-md-2"><div class="genre-card" style="background:linear-gradient(135deg,#534AB7,#2563B0);"><div class="genre-card-content"><div class="genre-card-icon">💜</div><div class="genre-card-name">Kizomba</div><div class="genre-card-count">1.8k músicas</div></div></div></div>
        <div class="col-6 col-md-2"><div class="genre-card" style="background:linear-gradient(135deg,#1D9E75,#0D6B4E);"><div class="genre-card-content"><div class="genre-card-icon">🌍</div><div class="genre-card-name">Afrohouse</div><div class="genre-card-count">980 músicas</div></div></div></div>
        <div class="col-6 col-md-2"><div class="genre-card" style="background:linear-gradient(135deg,#374151,#1F2937);"><div class="genre-card-content"><div class="genre-card-icon">🎤</div><div class="genre-card-name">Rap</div><div class="genre-card-count">740 músicas</div></div></div></div>
        <div class="col-6 col-md-2"><div class="genre-card" style="background:linear-gradient(135deg,#9D174D,#831843);"><div class="genre-card-content"><div class="genre-card-icon">✝️</div><div class="genre-card-name">Gospel</div><div class="genre-card-count">620 músicas</div></div></div></div>
      </div>

      <!-- ÁLBUNS -->
      <div class="sec-hdr"><h2>Álbuns & EPs recentes</h2><a class="sec-link" href="#">Ver todos →</a></div>
      <div class="row g-3 mb-4">
        <div class="col-6 col-md-3 col-lg-2"><div class="album-card"><div class="album-cover" style="background:linear-gradient(135deg,#2563B0,#E8A020);"><div class="cover-overlay"></div><div class="play-hover"><i class="ti ti-player-play-filled"></i></div><span class="cover-initials">NC</span></div><div class="album-body"><div class="album-title">Raízes</div><div class="album-artist">Nilda Catumbela</div><div class="album-meta"><span class="album-genre">Semba</span><span class="album-year">2025</span></div></div></div></div>
        <div class="col-6 col-md-3 col-lg-2"><div class="album-card"><div class="album-cover" style="background:linear-gradient(135deg,#1D9E75,#2563B0);"><div class="cover-overlay"></div><div class="play-hover"><i class="ti ti-player-play-filled"></i></div><span class="cover-initials">MK</span></div><div class="album-body"><div class="album-title">Kota Maluco</div><div class="album-artist">Mamborró</div><div class="album-meta"><span class="album-genre">Kuduro</span><span class="album-year">2025</span></div></div></div></div>
        <div class="col-6 col-md-3 col-lg-2"><div class="album-card"><div class="album-cover" style="background:linear-gradient(135deg,#534AB7,#9D174D);"><div class="cover-overlay"></div><div class="play-hover"><i class="ti ti-player-play-filled"></i></div><span class="cover-initials">FB</span></div><div class="album-body"><div class="album-title">Nkosi Sessions</div><div class="album-artist">Feeling Black</div><div class="album-meta"><span class="album-genre">Reggae</span><span class="album-year">2024</span></div></div></div></div>
        <div class="col-6 col-md-3 col-lg-2"><div class="album-card"><div class="album-cover" style="background:linear-gradient(135deg,#E8A020,#C07A1A);"><div class="cover-overlay"></div><div class="play-hover"><i class="ti ti-player-play-filled"></i></div><span class="cover-initials">AK</span></div><div class="album-body"><div class="album-title">Luanda Noturna</div><div class="album-artist">Al Kapone</div><div class="album-meta"><span class="album-genre">Rap</span><span class="album-year">2024</span></div></div></div></div>
        <div class="col-6 col-md-3 col-lg-2"><div class="album-card"><div class="album-cover" style="background:linear-gradient(135deg,#374151,#2563B0);"><div class="cover-overlay"></div><div class="play-hover"><i class="ti ti-player-play-filled"></i></div><span class="cover-initials">BR</span></div><div class="album-body"><div class="album-title">Cinza & Fogo</div><div class="album-artist">Bruxa MC</div><div class="album-meta"><span class="album-genre">Hip-Hop</span><span class="album-year">2024</span></div></div></div></div>
        <div class="col-6 col-md-3 col-lg-2"><div class="album-card"><div class="album-cover" style="background:linear-gradient(135deg,#1D9E75,#E8A020);"><div class="cover-overlay"></div><div class="play-hover"><i class="ti ti-player-play-filled"></i></div><span class="cover-initials">FR</span></div><div class="album-body"><div class="album-title">Versos Livres</div><div class="album-artist">Faculdade de Rimas</div><div class="album-meta"><span class="album-genre">Rap</span><span class="album-year">2023</span></div></div></div></div>
      </div>

      <!-- AD STRIP -->
      <div class="ad-strip mb-4">
        <span class="ad-pill">Pub</span>
        <div class="ad-strip-thumb" style="background:var(--lea-blue);">UN</div>
        <div class="ad-strip-copy">
          <strong>Unitel Music+ — Ouve sem limite com dados zero-rating</strong><br>
          <span>Activa já no teu smartphone · unitel.ao</span>
        </div>
        <button class="ad-strip-cta">Saber mais</button>
      </div>

      <!-- TRACK LIST -->
      <div class="sec-hdr"><h2>Músicas populares</h2><a class="sec-link" href="#">Ver todas →</a></div>
      <div class="track-list-card mb-4">
        <div class="track-list-header">
          <div style="text-align:center;">#</div>
          <div>Título</div>
          <div class="col-genre">Género</div>
          <div class="col-dur">Duração</div>
          <div style="text-align:right;">Ações</div>
        </div>
        <div class="track-row">
          <div style="position:relative;display:flex;align-items:center;justify-content:center;"><span class="track-num">1</span><button class="track-play-btn"><i class="ti ti-player-play-filled"></i></button></div>
          <div class="track-info"><div class="track-thumb" style="background:linear-gradient(135deg,#2563B0,#E8A020);">NC</div><div><div class="track-name">Minha Terra</div><div class="track-artist-name">Nilda Catumbela</div></div></div>
          <div><span class="track-genre-pill">Semba</span></div>
          <div class="track-duration">3:42</div>
          <div class="track-actions"><button class="btn-icon"><i class="ti ti-heart"></i></button><a href="#" class="btn-icon download"><i class="ti ti-download"></i></a></div>
        </div>
        <div class="track-row">
          <div style="position:relative;display:flex;align-items:center;justify-content:center;"><span class="track-num">2</span><button class="track-play-btn"><i class="ti ti-player-play-filled"></i></button></div>
          <div class="track-info"><div class="track-thumb" style="background:linear-gradient(135deg,#E8A020,#C07A1A);">FB</div><div><div class="track-name">Fogo no Palco</div><div class="track-artist-name">Feeling Black</div></div></div>
          <div><span class="track-genre-pill">Reggae</span></div>
          <div class="track-duration">4:15</div>
          <div class="track-actions"><button class="btn-icon"><i class="ti ti-heart"></i></button><a href="#" class="btn-icon download"><i class="ti ti-download"></i></a></div>
        </div>
        <div class="track-row">
          <div style="position:relative;display:flex;align-items:center;justify-content:center;"><span class="track-num">3</span><button class="track-play-btn"><i class="ti ti-player-play-filled"></i></button></div>
          <div class="track-info"><div class="track-thumb" style="background:linear-gradient(135deg,#1D9E75,#2563B0);">MK</div><div><div class="track-name">Angola Bela</div><div class="track-artist-name">Mamborró</div></div></div>
          <div><span class="track-genre-pill">Kuduro</span></div>
          <div class="track-duration">3:58</div>
          <div class="track-actions"><button class="btn-icon"><i class="ti ti-heart"></i></button><a href="#" class="btn-icon download"><i class="ti ti-download"></i></a></div>
        </div>
        <div class="track-row">
          <div style="position:relative;display:flex;align-items:center;justify-content:center;"><span class="track-num">4</span><button class="track-play-btn"><i class="ti ti-player-play-filled"></i></button></div>
          <div class="track-info"><div class="track-thumb" style="background:linear-gradient(135deg,#534AB7,#2563B0);">AK</div><div><div class="track-name">Luanda de Noite</div><div class="track-artist-name">Al Kapone</div></div></div>
          <div><span class="track-genre-pill">Rap</span></div>
          <div class="track-duration">5:02</div>
          <div class="track-actions"><button class="btn-icon"><i class="ti ti-heart"></i></button><a href="#" class="btn-icon download"><i class="ti ti-download"></i></a></div>
        </div>
        <div class="track-row">
          <div style="position:relative;display:flex;align-items:center;justify-content:center;"><span class="track-num">5</span><button class="track-play-btn"><i class="ti ti-player-play-filled"></i></button></div>
          <div class="track-info"><div class="track-thumb" style="background:linear-gradient(135deg,#374151,#2563B0);">BR</div><div><div class="track-name">Kinaxixi</div><div class="track-artist-name">Bruxa MC</div></div></div>
          <div><span class="track-genre-pill">Hip-Hop</span></div>
          <div class="track-duration">3:30</div>
          <div class="track-actions"><button class="btn-icon"><i class="ti ti-heart"></i></button><a href="#" class="btn-icon download"><i class="ti ti-download"></i></a></div>
        </div>
        <div class="track-row">
          <div style="position:relative;display:flex;align-items:center;justify-content:center;"><span class="track-num">6</span><button class="track-play-btn"><i class="ti ti-player-play-filled"></i></button></div>
          <div class="track-info"><div class="track-thumb" style="background:linear-gradient(135deg,#1D9E75,#E8A020);">FR</div><div><div class="track-name">Rimas da Muceque</div><div class="track-artist-name">Faculdade de Rimas</div></div></div>
          <div><span class="track-genre-pill">Rap</span></div>
          <div class="track-duration">4:44</div>
          <div class="track-actions"><button class="btn-icon"><i class="ti ti-heart"></i></button><a href="#" class="btn-icon download"><i class="ti ti-download"></i></a></div>
        </div>
        <div class="track-row">
          <div style="position:relative;display:flex;align-items:center;justify-content:center;"><span class="track-num">7</span><button class="track-play-btn"><i class="ti ti-player-play-filled"></i></button></div>
          <div class="track-info"><div class="track-thumb" style="background:linear-gradient(135deg,#9D174D,#534AB7);">YC</div><div><div class="track-name">Saudade de Angola</div><div class="track-artist-name">Yuri da Cunha</div></div></div>
          <div><span class="track-genre-pill">Kizomba</span></div>
          <div class="track-duration">4:28</div>
          <div class="track-actions"><button class="btn-icon"><i class="ti ti-heart"></i></button><a href="#" class="btn-icon download"><i class="ti ti-download"></i></a></div>
        </div>
        <div class="track-row">
          <div style="position:relative;display:flex;align-items:center;justify-content:center;"><span class="track-num">8</span><button class="track-play-btn"><i class="ti ti-player-play-filled"></i></button></div>
          <div class="track-info"><div class="track-thumb" style="background:linear-gradient(135deg,#2563B0,#1D9E75);">LF</div><div><div class="track-name">Mulemba Xangola</div><div class="track-artist-name">Lwinizia Fernandes</div></div></div>
          <div><span class="track-genre-pill">Semba</span></div>
          <div class="track-duration">3:55</div>
          <div class="track-actions"><button class="btn-icon"><i class="ti ti-heart"></i></button><a href="#" class="btn-icon download"><i class="ti ti-download"></i></a></div>
        </div>
      </div>

      <!-- PAGINAÇÃO -->
      <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 pb-4">
        <div style="font-size:13px;color:var(--music-muted);">Mostrando 8 de 8.432 músicas</div>
        <div class="lea-pagination">
          <a class="page-btn" href="#"><i class="ti ti-chevron-left"></i></a>
          <a class="page-btn active" href="#">1</a>
          <a class="page-btn" href="#">2</a>
          <a class="page-btn" href="#">3</a>
          <span style="color:var(--music-muted);font-size:13px;padding:0 4px;">…</span>
          <a class="page-btn" href="#">420</a>
          <a class="page-btn" href="#"><i class="ti ti-chevron-right"></i></a>
        </div>
      </div>

    </div>
  </div>


  <!-- NOW PLAYING BAR -->
  <div class="now-playing-bar">
    <div class="np-info">
      <div class="np-thumb">NC</div>
      <div style="min-width:0;">
        <div class="np-name">Minha Terra</div>
        <div class="np-artist">Nilda Catumbela · Semba</div>
      </div>
      <button class="btn-heart"><i class="ti ti-heart"></i></button>
    </div>
    <div class="np-controls">
      <div class="np-buttons">
        <button class="btn-ctrl"><i class="ti ti-arrows-shuffle"></i></button>
        <button class="btn-ctrl"><i class="ti ti-player-skip-back-filled"></i></button>
        <button class="btn-ctrl-main"><i class="ti ti-player-play-filled"></i></button>
        <button class="btn-ctrl"><i class="ti ti-player-skip-forward-filled"></i></button>
        <button class="btn-ctrl"><i class="ti ti-repeat"></i></button>
      </div>
      <div class="np-progress">
        <span class="np-time">1:18</span>
        <div class="progress-track"><div class="progress-fill"></div></div>
        <span class="np-time">3:42</span>
      </div>
    </div>
    <div class="np-right">
      <button class="btn-ctrl" style="font-size:18px;"><i class="ti ti-volume"></i></button>
      <div class="volume-track"><div class="volume-fill"></div></div>
      <a href="#" class="btn-download-player"><i class="ti ti-download"></i> Baixar</a>
    </div>
  </div>


  <!-- BOTTOM NAV MOBILE -->
  <nav class="bottom-nav">
    <a class="bnav-item" href="index.php"><i class="ti ti-home"></i><span class="bnav-lbl">Início</span></a>
    <a class="bnav-item" href="artistas.html"><i class="ti ti-users"></i><span class="bnav-lbl">Artistas</span></a>
    <a class="bnav-item active" href="musica.html"><i class="ti ti-music"></i><span class="bnav-lbl">Músicas</span></a>
	<a class="bnav-item" href="loja.html"><i class="ti ti-shopping-bag"></i><span class="bnav-lbl">Loja</span></a>
    <button class="bnav-item" id="btnOpenMenu"><i class="ti ti-menu-2"></i><span class="bnav-lbl">Menu</span></button>
  </nav>


  <!-- MENU DRAWER MOBILE -->
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
    // Player
    const mainBtn = document.querySelector('.btn-ctrl-main');
    let playing = false;
    mainBtn.addEventListener('click', () => {
      playing = !playing;
      mainBtn.innerHTML = playing ? '<i class="ti ti-player-pause-filled"></i>' : '<i class="ti ti-player-play-filled"></i>';
    });

    document.querySelectorAll('.track-row').forEach(row => {
      row.addEventListener('click', () => {
        const name   = row.querySelector('.track-name')?.textContent;
        const artist = row.querySelector('.track-artist-name')?.textContent;
        const bg     = row.querySelector('.track-thumb')?.style.background;
        if (name)   document.querySelector('.np-name').textContent = name;
        if (artist) document.querySelector('.np-artist').textContent = artist;
        if (bg)     document.querySelector('.np-thumb').style.background = bg;
        playing = true;
        mainBtn.innerHTML = '<i class="ti ti-player-pause-filled"></i>';
      });
    });

    document.querySelector('.btn-play-big').addEventListener('click', () => {
      playing = true;
      mainBtn.innerHTML = '<i class="ti ti-player-pause-filled"></i>';
    });

    document.querySelectorAll('.filter-tab').forEach(tab => {
      tab.addEventListener('click', e => {
        e.preventDefault();
        document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
      });
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