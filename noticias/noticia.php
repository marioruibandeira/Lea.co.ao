<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Festival Infantil RNA–Chitotolo celebra 30 anos — LEA Notícias</title>
 
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/menu.footer.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.19.0/dist/tabler-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=DM+Sans:wght@400;500&family=Playfair+Display:ital,wght@0,700;1,600&display=swap" rel="stylesheet">
 
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
      --cat-politica:    #DC2626;
      --cat-tecnologia:  #7C3AED;
      --cat-desporto:    #059669;
      --cat-cronicas:    #C07A1A;
      --cat-arte:        #2563B0;
      --cat-economia:    #0D6B4E;
      --cat-entrevistas: #9D174D;
    }
 
    *, *::before, *::after { box-sizing: border-box; }
    body { font-family: 'DM Sans', sans-serif; background: var(--lea-surface); color: var(--lea-text); margin: 0; }
    h1,h2,h3,h4,h5 { font-family: 'Sora', sans-serif; }
 
    /* ── Navbar ── */
    .navbar { border-bottom: 1px solid var(--lea-border); }
    .navbar-brand { font-size: 20px; font-weight: 700; letter-spacing: -0.5px; color: var(--lea-text) !important; }
    .navbar-brand span { color: var(--lea-blue); }
    .nav-link { font-size: 13px; color: var(--lea-muted) !important; padding: 4px 10px !important; border-radius: 6px; }
    .nav-link:hover { color: var(--lea-blue) !important; background-color: var(--lea-blue-light); }
    .nav-link.active { color: var(--lea-blue) !important; background-color: var(--lea-blue-light) !important; }
    .lea-search { font-size: 12px; color: var(--lea-muted); background: var(--lea-surface); border: 1px solid rgba(37,99,176,0.2); border-radius: 8px; padding: 6px 12px; min-width: 160px; cursor: pointer; }
    .btn-lea { background-color: var(--lea-blue); color: #fff; border: none; border-radius: 8px; font-size: 13px; font-weight: 500; padding: 8px 18px; transition: background .15s; cursor: pointer; }
    .btn-lea:hover { background-color: var(--lea-blue-dark); color: #fff; }
    .btn-lea-sm { background-color: var(--lea-blue); color: #fff; border: none; border-radius: 6px; font-size: 12px; font-weight: 500; padding: 6px 14px; transition: background .15s; white-space: nowrap; cursor: pointer; }
    .btn-lea-sm:hover { background-color: var(--lea-blue-dark); }
 
    /* ── Category badge ── */
    .cat-badge { display: inline-block; font-size: 10px; font-weight: 700; letter-spacing: .3px; text-transform: uppercase; padding: 3px 9px; border-radius: 4px; color: #fff; }
    .cat-politica    { background: var(--cat-politica); }
    .cat-tecnologia  { background: var(--cat-tecnologia); }
    .cat-desporto    { background: var(--cat-desporto); }
    .cat-cronicas    { background: var(--cat-cronicas); }
    .cat-arte        { background: var(--cat-arte); }
    .cat-economia    { background: var(--cat-economia); }
    .cat-entrevistas { background: var(--cat-entrevistas); }
 
    /* ── Ad ── */
    .ad-pill { font-size: 9px; letter-spacing: .5px; text-transform: uppercase; color: #bbb; border: 1px solid #ddd; border-radius: 4px; padding: 2px 6px; flex-shrink: 0; }
    .ann { font-size: 10px; color: var(--lea-blue); display: flex; align-items: center; gap: 4px; margin-bottom: 5px; }
    .ad-strip { background: var(--lea-white); border: 1px dashed #ccd9ef; border-radius: 12px; padding: 12px 16px; display: flex; align-items: center; gap: 14px; }
    .ad-strip-thumb { width: 52px; height: 38px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 700; color: #fff; flex-shrink: 0; }
    .ad-strip-copy { flex: 1; }
    .ad-strip-copy strong { font-size: 13px; font-weight: 500; color: var(--lea-text); }
    .ad-strip-copy span { font-size: 11px; color: var(--lea-muted); }
 
    /* ── Breadcrumb ── */
    .lea-breadcrumb { background: var(--lea-white); border-bottom: 1px solid var(--lea-border); padding: 10px 0; }
    .breadcrumb-list { display: flex; align-items: center; gap: 6px; list-style: none; margin: 0; padding: 0; flex-wrap: wrap; }
    .breadcrumb-list li { display: flex; align-items: center; gap: 6px; }
    .breadcrumb-list a { font-size: 12px; color: var(--lea-muted); text-decoration: none; transition: color .12s; }
    .breadcrumb-list a:hover { color: var(--lea-blue); }
    .breadcrumb-list .sep { font-size: 10px; color: #d0d9ec; }
    .breadcrumb-list .current { font-size: 12px; color: var(--lea-text); font-weight: 500; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 280px; }
 
    /* ── Layout ── */
    .article-layout { display: grid; grid-template-columns: 1fr 300px; gap: 24px; padding: 24px 0 40px; }
 
    /* ── Article header ── */
    .article-header { background: var(--lea-white); border: 1px solid var(--lea-border); border-radius: 14px; overflow: hidden; margin-bottom: 20px; }
    .article-cover { width: 100%; aspect-ratio: 16/9; overflow: hidden; position: relative; background: linear-gradient(135deg, #2563B0, #534AB7); }
    .article-cover img { width: 100%; height: 100%; object-fit: cover; display: block; }
    .article-cover-caption { position: absolute; bottom: 0; left: 0; right: 0; padding: 8px 14px; background: linear-gradient(to top, rgba(0,0,0,0.55), transparent); font-size: 10px; color: rgba(255,255,255,0.75); font-style: italic; }
    .article-header-body { padding: 20px 24px 22px; }
    .article-kicker { display: flex; align-items: center; gap: 10px; margin-bottom: 12px; flex-wrap: wrap; }
    .article-title { font-family: 'Playfair Display', serif; font-size: clamp(22px, 3.2vw, 34px); font-weight: 700; line-height: 1.2; color: var(--lea-text); margin: 0 0 12px; }
    .article-lead { font-size: 16px; color: #374151; line-height: 1.75; border-left: 3px solid var(--lea-blue); padding-left: 14px; margin-bottom: 16px; font-weight: 500; }
 
    .article-meta-bar { display: flex; align-items: center; gap: 16px; padding: 14px 0 0; border-top: 1px solid var(--lea-border); flex-wrap: wrap; }
    .meta-author { display: flex; align-items: center; gap: 8px; }
    .meta-author-avatar { width: 36px; height: 36px; border-radius: 50%; background: var(--lea-blue); display: flex; align-items: center; justify-content: center; font-size: 13px; font-weight: 700; color: #fff; flex-shrink: 0; }
    .meta-author-name { font-size: 13px; font-weight: 600; color: var(--lea-text); }
    .meta-author-role { font-size: 11px; color: var(--lea-muted); }
    .meta-divider { width: 1px; height: 28px; background: var(--lea-border); flex-shrink: 0; }
    .meta-item { display: flex; align-items: center; gap: 5px; font-size: 12px; color: var(--lea-muted); }
    .meta-item i { font-size: 14px; color: var(--lea-blue); }
 
    .article-actions { display: flex; align-items: center; gap: 8px; margin-left: auto; flex-wrap: wrap; }
    .action-btn { display: flex; align-items: center; gap: 5px; font-size: 12px; font-weight: 500; color: var(--lea-muted); background: var(--lea-surface); border: 1px solid var(--lea-border); border-radius: 8px; padding: 6px 12px; cursor: pointer; transition: all .15s; text-decoration: none; font-family: inherit; }
    .action-btn i { font-size: 14px; }
    .action-btn:hover { background: var(--lea-blue-light); color: var(--lea-blue); border-color: var(--lea-blue); }
    .action-btn.liked { background: #FEF2F2; color: #DC2626; border-color: #FCA5A5; }
    .action-btn.saved { background: var(--lea-blue-light); color: var(--lea-blue); border-color: var(--lea-blue); }
 
    /* ── Article body ── */
    .article-body { background: var(--lea-white); border: 1px solid var(--lea-border); border-radius: 14px; padding: 28px 32px; margin-bottom: 20px; }
    .article-body p { font-size: 15.5px; line-height: 1.85; color: #1F2937; margin-bottom: 20px; }
    .article-body h2 { font-family: 'Playfair Display', serif; font-size: 22px; font-weight: 700; color: var(--lea-text); margin: 32px 0 14px; line-height: 1.3; }
    .article-body h3 { font-size: 16px; font-weight: 700; color: var(--lea-text); margin: 24px 0 10px; }
    .article-body blockquote { margin: 28px 0; padding: 20px 24px; background: var(--lea-blue-light); border-left: 4px solid var(--lea-blue); border-radius: 0 10px 10px 0; }
    .article-body blockquote p { font-family: 'Playfair Display', serif; font-size: 17px; font-style: italic; color: var(--lea-text); margin: 0 0 8px; line-height: 1.6; }
    .article-body blockquote cite { font-size: 12px; color: var(--lea-blue); font-style: normal; font-weight: 600; }
    .article-body .inline-img { margin: 28px 0; border-radius: 10px; overflow: hidden; }
    .article-body .inline-img img { width: 100%; display: block; border-radius: 10px; }
    .article-body .inline-img figcaption { font-size: 11px; color: var(--lea-muted); padding: 8px 4px; font-style: italic; text-align: center; }
 
    /* ── Tags ── */
    .article-tags { background: var(--lea-white); border: 1px solid var(--lea-border); border-radius: 12px; padding: 16px 20px; margin-bottom: 20px; }
    .article-tags h4 { font-size: 12px; font-weight: 700; color: var(--lea-muted); text-transform: uppercase; letter-spacing: .5px; margin: 0 0 10px; }
    .tags-list { display: flex; flex-wrap: wrap; gap: 6px; }
    .tag-item { font-size: 12px; color: var(--lea-blue); background: var(--lea-blue-light); border: 1px solid rgba(37,99,176,0.2); border-radius: 6px; padding: 4px 10px; text-decoration: none; transition: all .12s; }
    .tag-item:hover { background: var(--lea-blue); color: #fff; }
 
    /* ── Related / section header ── */
    .related-section { margin-bottom: 20px; }
    .sec-hdr { display: flex; align-items: baseline; justify-content: space-between; margin-bottom: 16px; }
    .sec-hdr h2 { font-size: 15px; font-weight: 700; margin: 0; }
    .sec-hdr h2 span { color: var(--lea-blue); }
    .sec-link { font-size: 12px; color: var(--lea-blue); text-decoration: none; }
    .sec-link:hover { text-decoration: underline; }
 
    /* ── Card horizontal ── */
    .news-card-h { background: var(--lea-white); border: 1px solid var(--lea-border); border-radius: 12px; overflow: hidden; transition: border-color .15s, box-shadow .15s; text-decoration: none; display: flex; align-items: stretch; }
    .news-card-h + .news-card-h { margin-top: 10px; }
    .news-card-h:hover { border-color: var(--lea-blue); box-shadow: 0 2px 12px rgba(37,99,176,0.08); }
    .nch-img { width: 120px; min-height: 90px; flex-shrink: 0; overflow: hidden; position: relative; background: var(--lea-surface); }
    .nch-img img { width: 100%; height: 100%; object-fit: cover; transition: transform .3s; display: block; }
    .news-card-h:hover .nch-img img { transform: scale(1.05); }
    .nch-body { padding: 12px 14px; flex: 1; display: flex; flex-direction: column; justify-content: space-between; min-width: 0; }
    .nch-title { font-size: 13px; font-weight: 600; color: var(--lea-text); line-height: 1.4; margin-bottom: 6px; }
    .news-card-h:hover .nch-title { color: var(--lea-blue); }
    .nch-meta { font-size: 10px; color: var(--lea-muted); display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
 
    /* ── Comments ── */
    .comments-section { background: var(--lea-white); border: 1px solid var(--lea-border); border-radius: 14px; overflow: hidden; margin-bottom: 20px; }
    .comments-header { padding: 14px 20px; border-bottom: 1px solid var(--lea-border); display: flex; align-items: center; justify-content: space-between; }
    .comments-header h3 { font-size: 14px; font-weight: 700; margin: 0; display: flex; align-items: center; gap: 8px; }
    .comments-header h3 i { font-size: 16px; color: var(--lea-blue); }
    .comments-count { font-size: 11px; color: var(--lea-muted); background: var(--lea-surface); padding: 2px 8px; border-radius: 99px; }
    .comment-compose { padding: 16px 20px; border-bottom: 1px solid var(--lea-border); }
    .comment-compose textarea { width: 100%; background: var(--lea-surface); border: 1px solid var(--lea-border); border-radius: 10px; padding: 10px 14px; font-size: 13px; color: var(--lea-text); font-family: 'DM Sans', sans-serif; resize: none; outline: none; transition: border-color .12s; line-height: 1.6; }
    .comment-compose textarea:focus { border-color: var(--lea-blue); }
    .comment-compose-footer { display: flex; justify-content: flex-end; margin-top: 8px; }
    .comment-item { padding: 14px 20px; border-bottom: 1px solid var(--lea-border); }
    .comment-item:last-child { border-bottom: none; }
    .comment-user { display: flex; align-items: center; gap: 8px; margin-bottom: 8px; }
    .comment-avatar { width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 700; color: #fff; flex-shrink: 0; }
    .comment-name { font-size: 13px; font-weight: 600; color: var(--lea-text); }
    .comment-date { font-size: 11px; color: var(--lea-muted); }
    .comment-text { font-size: 13px; color: #374151; line-height: 1.65; margin-bottom: 8px; }
    .comment-actions { display: flex; align-items: center; gap: 12px; }
    .comment-action { font-size: 11px; color: var(--lea-muted); display: flex; align-items: center; gap: 4px; cursor: pointer; transition: color .12s; background: none; border: none; padding: 0; font-family: inherit; }
    .comment-action:hover { color: var(--lea-blue); }
    .comment-action i { font-size: 13px; }
 
    /* ── Sidebar ── */
    .news-sidebar { display: flex; flex-direction: column; gap: 20px; }
    .sidebar-card { background: var(--lea-white); border: 1px solid var(--lea-border); border-radius: 12px; overflow: hidden; }
    .sidebar-card-header { padding: 12px 14px; border-bottom: 1px solid var(--lea-border); display: flex; align-items: center; gap: 8px; }
    .sidebar-card-header h3 { font-size: 13px; font-weight: 700; margin: 0; color: var(--lea-text); }
    .sidebar-card-header i { font-size: 16px; color: var(--lea-blue); }
    .popular-item { display: flex; align-items: flex-start; gap: 10px; padding: 10px 14px; border-bottom: 1px solid var(--lea-border); text-decoration: none; transition: background .12s; }
    .popular-item:last-child { border-bottom: none; }
    .popular-item:hover { background: var(--lea-surface); }
    .popular-num { font-family: 'Sora', sans-serif; font-size: 22px; font-weight: 700; color: var(--lea-border); line-height: 1; flex-shrink: 0; width: 28px; }
    .popular-num.p1 { color: var(--lea-blue); }
    .popular-num.p2 { color: var(--lea-blue-mid); opacity: .7; }
    .popular-num.p3 { color: var(--lea-blue-mid); opacity: .5; }
    .popular-title { font-size: 12px; font-weight: 500; color: var(--lea-text); line-height: 1.4; margin-bottom: 3px; }
    .popular-item:hover .popular-title { color: var(--lea-blue); }
    .popular-meta { font-size: 10px; color: var(--lea-muted); }
    .cat-sidebar-item { display: flex; align-items: center; justify-content: space-between; padding: 9px 14px; border-bottom: 1px solid var(--lea-border); text-decoration: none; transition: background .12s; }
    .cat-sidebar-item:last-child { border-bottom: none; }
    .cat-sidebar-item:hover { background: var(--lea-surface); }
    .cat-sidebar-label { display: flex; align-items: center; gap: 8px; font-size: 13px; color: var(--lea-text); }
    .cat-sidebar-dot { width: 8px; height: 8px; border-radius: 50%; flex-shrink: 0; }
    .cat-sidebar-count { font-size: 11px; color: var(--lea-muted); background: var(--lea-surface); padding: 2px 7px; border-radius: 99px; }
    .newsletter-card { background: linear-gradient(135deg, var(--lea-blue-dark) 0%, var(--lea-blue) 100%); border-radius: 12px; padding: 20px; }
    .newsletter-card h3 { font-size: 15px; font-weight: 700; color: #fff; margin-bottom: 6px; }
    .newsletter-card p { font-size: 12px; color: rgba(255,255,255,0.7); line-height: 1.6; margin-bottom: 14px; }
    .newsletter-input { width: 100%; background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.2); border-radius: 8px; padding: 9px 12px; font-size: 12px; color: #fff; font-family: 'DM Sans', sans-serif; outline: none; margin-bottom: 8px; }
    .newsletter-input::placeholder { color: rgba(255,255,255,0.45); }
    .btn-newsletter { width: 100%; background: #fff; color: var(--lea-blue); border: none; border-radius: 8px; font-size: 13px; font-weight: 700; padding: 9px; cursor: pointer; transition: opacity .15s; font-family: inherit; }
    .btn-newsletter:hover { opacity: .88; }
 
    /* ── Reading pill ── */
    .reading-pill { display: inline-flex; align-items: center; gap: 5px; background: var(--lea-blue-light); color: var(--lea-blue); font-size: 11px; font-weight: 600; padding: 4px 10px; border-radius: 99px; }
 
    /* ── Footer ── */
    .lea-footer { background: var(--lea-white); border-top: 1px solid var(--lea-border); }
    .footer-link { font-size: 12px; color: var(--lea-muted); text-decoration: none; }
    .footer-link:hover { color: var(--lea-blue); }
    .footer-social { color: var(--lea-blue); font-size: 20px; text-decoration: none; transition: opacity .15s; }
    .footer-social:hover { opacity: .7; }
 
    /* ── Mobile / Responsive ── */
    .desktop-only { display: block; }
    .mobile-only  { display: none; }
    .bottom-nav { background: var(--lea-white); border-top: 1px solid var(--lea-border); position: fixed; bottom: 0; left: 0; right: 0; height: 62px; display: none; align-items: center; justify-content: space-around; z-index: 200; padding-bottom: env(safe-area-inset-bottom, 0); }
    .bnav-item { display: flex; flex-direction: column; align-items: center; gap: 3px; font-size: 22px; color: var(--lea-muted); cursor: pointer; text-decoration: none; flex: 1; justify-content: center; transition: color .12s; }
    .bnav-item.active, .bnav-item:hover { color: var(--lea-blue); }
    .bnav-lbl { font-size: 9px; font-weight: 500; font-family: 'DM Sans', sans-serif; }
 
    @media (max-width: 991px) {
      .desktop-only   { display: none !important; }
      .mobile-only    { display: block; }
      .bottom-nav     { display: flex; }
      body            { padding-bottom: 62px; }
      .article-layout { grid-template-columns: 1fr; }
      .article-body   { padding: 20px 18px; }
      .article-header-body { padding: 16px 18px 18px; }
    }
    @media (max-width: 576px) {
      .article-actions { margin-left: 0; width: 100%; }
      .meta-divider   { display: none; }
      .nch-img        { width: 90px; }
    }
  </style>
</head>
<body>
 
  <div class="read-progress-bar" id="readProgress"></div>
 
	<!-- NAVBAR DESKTOP -->
	<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top desktop-only">
		<div class="container-fluid px-4">
			<div class="logo-link">
				<a href="../index.html" class="lea-navbar-brand">
					<img src="../assets/img/logo.png" alt="LEA" class="logo-shodow">		  
				</a>
				<a href="../index.html" class="txt-logo-link" style="margin-left:8px;">
					<span class="logo-lea">LEA</span>
				</a>
			</div>
			<button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navMenu">
				<ul class="navbar-nav me-auto mb-0">
				  <li class="nav-item"><a class="nav-link" href="index.html">Início</a></li>
				  <li class="nav-item"><a class="nav-link" href="artistas.html">Artistas</a></li>
				  <li class="nav-item"><a class="nav-link" href="musica.html">Músicas</a></li>
				  <li class="nav-item"><a class="nav-link" href="videos.html">Vídeos</a></li>
				  <li class="nav-item"><a class="nav-link" href="literatura.html">Literatura</a></li>
				  <li class="nav-item"><a class="nav-link active" href="noticias.html">Notícias</a></li>
				  <li class="nav-item"><a class="nav-link" href="eventos.html">Eventos</a></li>
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
 
	<!-- TOPBAR MOBILE -->
	<header class="mobile-topbar">
		<div class="logo-link-mbl">
			<a href="../index.html">
				<img src="../assets/img/logo.png" alt="LEA" class="logo-shodow">			
			</a>
			<a href="../index.html" class="txt-logo-link">
				<span class="logo-lea txt-logo-link-mbl">LEA</span>
			</a>
		</div>
		<div class="d-flex gap-3" style="font-size:20px;color:var(--lea-muted);">
			<i class="ti ti-search"></i>
			<i class="ti ti-bell"></i>
			<i class="ti ti-user-circle"></i>
		</div>
	</header>
 
 
  <!-- BREADCRUMB -->
  <div class="lea-breadcrumb">
    <div class="container">
      <ul class="breadcrumb-list">
        <li><a href="index.html"><i class="ti ti-home" style="font-size:12px;"></i> Início</a></li>
        <li><span class="sep"><i class="ti ti-chevron-right"></i></span></li>
        <li><a href="noticias.html">Notícias</a></li>
        <li><span class="sep"><i class="ti ti-chevron-right"></i></span></li>
        <li><a href="#">Arte &amp; Cultura</a></li>
        <li><span class="sep"><i class="ti ti-chevron-right"></i></span></li>
        <li><span class="current">Festival Infantil RNA–Chitotolo celebra 30 anos</span></li>
      </ul>
    </div>
  </div>
 
 
  <!-- CONTEÚDO PRINCIPAL -->
  <div class="container">
    <div class="article-layout">
 
      <!-- ARTIGO -->
      <main id="articleMain">
 
        <!-- Cabeçalho -->
        <div class="article-header">
          <div class="article-cover">
            <img src="https://lea.co.ao/images/noticias/festival_infantil_rna_chitotolo.jpg"
                 alt="Festival Infantil RNA–Chitotolo"
                 onerror="this.style.display='none'">
            <div class="article-cover-caption">Festival Infantil RNA–Chitotolo · Foto: RNA / Arquivo LEA</div>
          </div>
 
          <div class="article-header-body">
            <div class="article-kicker">
              <span class="cat-badge cat-arte">Arte &amp; Cultura</span>
              <span class="reading-pill"><i class="ti ti-clock" style="font-size:12px;"></i> 4 min leitura</span>
            </div>
 
            <h1 class="article-title">Festival Infantil RNA–Chitotolo celebra 30 anos com edição especial dedicada às crianças</h1>
 
            <p class="article-lead">
              Evento acontece a 1 de Junho, com transmissão em directo, programação cultural e forte acção social. Uma das maiores celebrações da cultura infantil angolana completa três décadas de história.
            </p>
 
            <div class="article-meta-bar">
              <div class="meta-author">
                <div class="meta-author-avatar">R</div>
                <div>
                  <div class="meta-author-name">Redacção LEA</div>
                  <div class="meta-author-role">Equipa editorial</div>
                </div>
              </div>
              <div class="meta-divider"></div>
              <div class="meta-item"><i class="ti ti-calendar"></i> 15 Mai 2026</div>
              <div class="meta-item"><i class="ti ti-eye"></i> 8.4k visualizações</div>
              <div class="meta-item"><i class="ti ti-message-circle"></i> 12 comentários</div>
              <div class="article-actions">
                <button class="action-btn" id="btnLike" onclick="toggleLike(this)">
                  <i class="ti ti-heart"></i> <span id="likeCount">342</span>
                </button>
                <button class="action-btn" id="btnSave" onclick="toggleSave(this)">
                  <i class="ti ti-bookmark"></i> Guardar
                </button>
                <button class="action-btn" onclick="shareArticle()">
                  <i class="ti ti-share"></i> Partilhar
                </button>
              </div>
            </div>
          </div>
        </div>
 
 
        <!-- CORPO DO ARTIGO -->
        <div class="article-body" id="articleBody">
 
          <p>O <strong>Festival Infantil RNA–Chitotolo</strong> chega à sua trigésima edição com uma programação especial que promete reunir milhares de crianças e famílias em torno da cultura angolana. O evento, marcado para o <strong>1 de Junho</strong> — Dia Internacional da Criança — será transmitido em directo pela Rádio Nacional de Angola e por diversas plataformas digitais.</p>
 
          <p>Criado em 1996 por iniciativa conjunta da RNA e da personagem Chitotolo, o festival tornou-se um dos eventos infantis mais aguardados de Angola, combinando entretenimento, educação e acção social numa jornada que já impactou centenas de milhares de crianças ao longo de três décadas.</p>
 
          <h2>Uma história de três décadas</h2>
 
          <p>Desde a sua primeira edição, o festival cresceu de um simples programa radiofónico para um evento de dimensão nacional. A Chitotolo — personagem criada para aproximar as crianças dos valores angolanos — tornou-se um símbolo da infância para várias gerações, e o festival acompanhou essa evolução, adaptando a sua programação às realidades de cada época.</p>
 
          <figure class="inline-img">
            <img src="https://lea.co.ao/images/noticias/festival_infantil_rna_chitotolo.jpg"
                 alt="Crianças participando no Festival Chitotolo"
                 onerror="this.style.display='none'">
            <figcaption>Edições anteriores do festival reuniram milhares de crianças em todo o país · Foto: RNA</figcaption>
          </figure>
 
          <p>Ao longo dos anos, o evento expandiu-se para as províncias, com celebrações simultâneas em Benguela, Huambo, Lubango, Cabinda e Malanje, levando a magia do festival a crianças de todas as regiões do país.</p>
 
          <blockquote>
            <p>Trinta anos de alegria, educação e cultura angolana. O Chitotolo é mais do que um festival — é a memória afectiva de várias gerações de angolanos.</p>
            <cite>— Direcção da RNA, em comunicado oficial</cite>
          </blockquote>
 
          <h2>O que esperar da edição de 2026</h2>
 
          <p>A edição comemorativa contará com um palco principal em Luanda, com actuações ao vivo de artistas angolanos dedicados ao público infantil, concursos de dança, teatro, pintura e contos tradicionais. A forte componente social inclui a distribuição de kits escolares e acções de saúde preventiva para crianças carenciadas.</p>
 
          <h3>Destaques da programação</h3>
 
          <p>Entre os destaques, o festival contará com a apresentação de uma peça de teatro dedicada à história da Chitotolo ao longo de 30 anos, uma exposição fotográfica das edições passadas e um espaço interactivo com actividades de tecnologia e criatividade voltadas para a nova geração.</p>
 
          <p>A transmissão em directo estará disponível no site da RNA e no canal do LEA no YouTube, permitindo que crianças de todo o país acompanhem o evento em tempo real.</p>
 
          <h2>Inscrições abertas</h2>
 
          <p>As inscrições para participação no festival estão abertas para escolas e grupos infantis de todo o país. As instituições interessadas devem contactar a RNA através dos canais oficiais até ao dia 25 de Maio. O acesso ao evento principal em Luanda é gratuito, sujeito a inscrição prévia.</p>
 
          <p>O LEA acompanhará o evento ao vivo e trará reportagens exclusivas sobre os bastidores desta edição histórica. Fique atento às nossas redes sociais para actualizações em tempo real no dia 1 de Junho.</p>
 
        </div>
 
 
        <!-- TAGS -->
        <div class="article-tags">
          <h4>Tópicos relacionados</h4>
          <div class="tags-list">
            <a class="tag-item" href="#">#FestivalChitotolo</a>
            <a class="tag-item" href="#">#RNA</a>
            <a class="tag-item" href="#">#CulturaAngolana</a>
            <a class="tag-item" href="#">#DiaInternacionalCriança</a>
            <a class="tag-item" href="#">#Angola</a>
            <a class="tag-item" href="#">#ArteECultura</a>
            <a class="tag-item" href="#">#Luanda</a>
          </div>
        </div>
 
 
        <!-- AD -->
        <div class="mb-4">
          <div class="ann"><i class="ti ti-ad"></i> Publicidade</div>
          <div class="ad-strip">
            <span class="ad-pill">Pub</span>
            <div class="ad-strip-thumb" style="background:var(--lea-teal);">AF</div>
            <div class="ad-strip-copy">
              <strong>Africell Angola — Internet ilimitada a partir de Kz 2.000</strong><br>
              <span>Cobertura em todo o país · africell.ao</span>
            </div>
            <button class="btn-lea-sm">Ver oferta</button>
          </div>
        </div>
 
 
        <!-- NOTÍCIAS RELACIONADAS -->
        <div class="related-section">
          <div class="sec-hdr">
            <h2>📰 Notícias <span>relacionadas</span></h2>
            <a class="sec-link" href="noticias.html">Ver todas →</a>
          </div>
 
          <a class="news-card-h" href="#">
            <div class="nch-img" style="background:linear-gradient(135deg,#534AB7,#2563B0);">
              <img src="https://lea.co.ao/images/noticias/Escritor-Poeta-Falso-disponibiliza-obra-literaria.jpg" alt="" onerror="this.style.display='none'">
            </div>
            <div class="nch-body">
              <div>
                <div style="margin-bottom:6px;"><span class="cat-badge cat-arte">Arte &amp; Cultura</span></div>
                <div class="nch-title">Escritor Poeta Falso disponibiliza obra literária no mercado brasileiro</div>
              </div>
              <div class="nch-meta">
                <span><i class="ti ti-calendar" style="font-size:11px;"></i> 13 Mai 2026</span>
                <span>Jornal de Angola</span>
              </div>
            </div>
          </a>
 
          <a class="news-card-h" href="#">
            <div class="nch-img" style="background:linear-gradient(135deg,#C07A1A,#534AB7);">
              <img src="https://lea.co.ao/images/noticias/fofando-verdadeira-rainha.jpg" alt="" onerror="this.style.display='none'">
            </div>
            <div class="nch-body">
              <div>
                <div style="margin-bottom:6px;"><span class="cat-badge cat-arte">Arte &amp; Cultura</span></div>
                <div class="nch-title">Noite &amp; Dia assume erro do passado e reconhece Fofandó como a primeira kudurista</div>
              </div>
              <div class="nch-meta">
                <span><i class="ti ti-calendar" style="font-size:11px;"></i> 02 Abr 2026</span>
                <span>Lea.co.ao</span>
              </div>
            </div>
          </a>
 
          <a class="news-card-h" href="#">
            <div class="nch-img" style="background:linear-gradient(135deg,#2563B0,#1D9E75);">
              <img src="https://lea.co.ao/images/noticias/Quem-e-Gerilson-Insrael.jpg" alt="" onerror="this.style.display='none'">
            </div>
            <div class="nch-body">
              <div>
                <div style="margin-bottom:6px;"><span class="cat-badge cat-arte">Arte &amp; Cultura</span></div>
                <div class="nch-title">Quem é Gerilson Israel? A história do cantor que conquistou uma geração</div>
              </div>
              <div class="nch-meta">
                <span><i class="ti ti-calendar" style="font-size:11px;"></i> 21 Abr 2026</span>
                <span>Lea.co.ao</span>
              </div>
            </div>
          </a>
 
        </div>
 
 
        <!-- COMENTÁRIOS -->
        <div class="comments-section">
          <div class="comments-header">
            <h3><i class="ti ti-message-circle"></i> Comentários <span class="comments-count">12</span></h3>
            <button class="action-btn" style="font-size:11px;">
              <i class="ti ti-arrow-up-down"></i> Mais recentes
            </button>
          </div>
 
          <div class="comment-compose">
            <textarea rows="3" placeholder="Deixa o teu comentário sobre esta notícia…"></textarea>
            <div class="comment-compose-footer">
              <button class="btn-lea" style="font-size:12px;padding:7px 16px;">Comentar</button>
            </div>
          </div>
 
          <div class="comment-item">
            <div class="comment-user">
              <div class="comment-avatar" style="background:#2563B0;">KM</div>
              <div>
                <div class="comment-name">Kizua Malonda</div>
                <div class="comment-date">há 2 horas</div>
              </div>
            </div>
            <p class="comment-text">Que orgulho! Cresci a ouvir o Chitotolo na rádio, é incrível ver 30 anos de história. As crianças de hoje têm muita sorte em poder viver esses momentos. Força à RNA! 🇦🇴</p>
            <div class="comment-actions">
              <button class="comment-action"><i class="ti ti-thumb-up"></i> 24</button>
              <button class="comment-action"><i class="ti ti-message-reply"></i> Responder</button>
            </div>
          </div>
 
          <div class="comment-item">
            <div class="comment-user">
              <div class="comment-avatar" style="background:#059669;">SN</div>
              <div>
                <div class="comment-name">Sofia Nzinga</div>
                <div class="comment-date">há 5 horas</div>
              </div>
            </div>
            <p class="comment-text">Vou levar os meus filhos este ano. É importante que as novas gerações conheçam a nossa cultura. Parabéns pelo trabalho que têm feito ao longo dos anos!</p>
            <div class="comment-actions">
              <button class="comment-action"><i class="ti ti-thumb-up"></i> 17</button>
              <button class="comment-action"><i class="ti ti-message-reply"></i> Responder</button>
            </div>
          </div>
 
          <div class="comment-item">
            <div class="comment-user">
              <div class="comment-avatar" style="background:#C07A1A;">AB</div>
              <div>
                <div class="comment-name">André Bango</div>
                <div class="comment-date">há 1 dia</div>
              </div>
            </div>
            <p class="comment-text">Bom demais! A transmissão online vai ajudar muito quem está nas províncias. Esperamos que cheguem também a Huambo com o festival presencialmente.</p>
            <div class="comment-actions">
              <button class="comment-action"><i class="ti ti-thumb-up"></i> 11</button>
              <button class="comment-action"><i class="ti ti-message-reply"></i> Responder</button>
            </div>
          </div>
 
        </div>
 
      </main>
 
 
      <!-- SIDEBAR -->
      <aside class="news-sidebar desktop-only">
 
        <div class="sidebar-card">
          <div class="sidebar-card-header">
            <i class="ti ti-trending-up"></i>
            <h3>Mais lidas</h3>
          </div>
          <a class="popular-item" href="#">
            <span class="popular-num p1">1</span>
            <div>
              <div class="popular-title">Quem é Gerilson Israel? A história do cantor que conquistou uma geração</div>
              <div class="popular-meta">14.2k visualizações</div>
            </div>
          </a>
          <a class="popular-item" href="#">
            <span class="popular-num p2">2</span>
            <div>
              <div class="popular-title">Pentágono admite dificuldades em travar armas hipersónicas</div>
              <div class="popular-meta">9.8k visualizações</div>
            </div>
          </a>
          <a class="popular-item" href="#">
            <span class="popular-num p3">3</span>
            <div>
              <div class="popular-title">Amad Diallo apoia Carrick como treinador definitivo do Manchester United</div>
              <div class="popular-meta">7.3k visualizações</div>
            </div>
          </a>
          <a class="popular-item" href="#">
            <span class="popular-num">4</span>
            <div>
              <div class="popular-title">Noite &amp; Dia reconhece Fofandó como a primeira kudurista</div>
              <div class="popular-meta">6.1k visualizações</div>
            </div>
          </a>
          <a class="popular-item" href="#">
            <span class="popular-num">5</span>
            <div>
              <div class="popular-title">Poetisa Ginga Preta em recuperação após acidente de viação</div>
              <div class="popular-meta">4.9k visualizações</div>
            </div>
          </a>
        </div>
 
        <div class="newsletter-card">
          <h3>📬 Newsletter LEA</h3>
          <p>Recebe as notícias mais importantes directamente no teu e-mail, todos os dias.</p>
          <input class="newsletter-input" type="email" placeholder="O teu e-mail">
          <button class="btn-newsletter">Subscrever grátis</button>
        </div>
 
        <div class="sidebar-card">
          <div class="sidebar-card-header">
            <i class="ti ti-layout-grid"></i>
            <h3>Categorias</h3>
          </div>
          <a class="cat-sidebar-item" href="#">
            <span class="cat-sidebar-label"><span class="cat-sidebar-dot" style="background:var(--cat-arte);"></span>Arte &amp; Cultura</span>
            <span class="cat-sidebar-count">312</span>
          </a>
          <a class="cat-sidebar-item" href="#">
            <span class="cat-sidebar-label"><span class="cat-sidebar-dot" style="background:var(--cat-desporto);"></span>Desporto</span>
            <span class="cat-sidebar-count">287</span>
          </a>
          <a class="cat-sidebar-item" href="#">
            <span class="cat-sidebar-label"><span class="cat-sidebar-dot" style="background:var(--cat-politica);"></span>Política</span>
            <span class="cat-sidebar-count">204</span>
          </a>
          <a class="cat-sidebar-item" href="#">
            <span class="cat-sidebar-label"><span class="cat-sidebar-dot" style="background:var(--cat-tecnologia);"></span>Tecnologia</span>
            <span class="cat-sidebar-count">178</span>
          </a>
          <a class="cat-sidebar-item" href="#">
            <span class="cat-sidebar-label"><span class="cat-sidebar-dot" style="background:var(--cat-economia);"></span>Economia</span>
            <span class="cat-sidebar-count">143</span>
          </a>
          <a class="cat-sidebar-item" href="#">
            <span class="cat-sidebar-label"><span class="cat-sidebar-dot" style="background:var(--cat-cronicas);"></span>Crónicas</span>
            <span class="cat-sidebar-count">96</span>
          </a>
          <a class="cat-sidebar-item" href="#">
            <span class="cat-sidebar-label"><span class="cat-sidebar-dot" style="background:var(--cat-entrevistas);"></span>Entrevistas</span>
            <span class="cat-sidebar-count">74</span>
          </a>
        </div>
 
        <div style="background:var(--lea-surface);border:1px dashed #ccd9ef;border-radius:10px;min-height:250px;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;padding:16px;gap:4px;">
          <span style="font-size:13px;font-weight:600;color:#c0cfe8;">300 × 250</span>
          <span style="font-size:10px;color:#c0cfe8;">Espaço publicitário</span>
        </div>
 
      </aside>
 
    </div>
  </div>
 
 
  <!-- FOOTER -->
  <footer class="lea-footer py-3 px-4 mt-2">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
      <div class="d-flex align-items-center gap-2">
        <img src="../assets/img/logo.png" alt="LEA" height="24">
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
    <a class="bnav-item" href="../index.html"><i class="ti ti-home"></i><span class="bnav-lbl">Início</span></a>
	<a class="bnav-item" href="../artistas.html"><i class="ti ti-users"></i><span class="bnav-lbl">Artistas</span></a>
    <a class="bnav-item active" href="../noticias.html"><i class="ti ti-news"></i><span class="bnav-lbl">Notícias</span></a>
    <a class="bnav-item" href="../loja.html"><i class="ti ti-shopping-bag"></i><span class="bnav-lbl">Loja</span></a>
    <button class="bnav-item" id="btnOpenMenu" style="background:none;border:none;">
      <i class="ti ti-menu-2"></i>
      <span class="bnav-lbl">Menu</span>
    </button>
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
 
 
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/menu.footer.js"></script>
  <script>
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
 
    // Like
    function toggleLike(btn) {
      const countEl = document.getElementById('likeCount');
      const liked = btn.classList.toggle('liked');
      countEl.textContent = liked ? parseInt(countEl.textContent) + 1 : parseInt(countEl.textContent) - 1;
      btn.querySelector('i').className = liked ? 'ti ti-heart-filled' : 'ti ti-heart';
    }
 
    // Guardar
    function toggleSave(btn) {
      const saved = btn.classList.toggle('saved');
      btn.innerHTML = saved
        ? '<i class="ti ti-bookmark-filled"></i> Guardado'
        : '<i class="ti ti-bookmark"></i> Guardar';
    }
 
    // Partilhar
    function shareArticle() {
      if (navigator.share) {
        navigator.share({ title: document.title, url: window.location.href });
      } else {
        navigator.clipboard.writeText(window.location.href).then(() => {
          const btn = event.currentTarget;
          btn.innerHTML = '<i class="ti ti-check"></i> Link copiado!';
          setTimeout(() => { btn.innerHTML = '<i class="ti ti-share"></i> Partilhar'; }, 2500);
        });
      }
    }
 
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
 
</body>
</html>