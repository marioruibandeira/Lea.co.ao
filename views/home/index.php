<!-- =============================================
     LAYOUT DESKTOP — 3 COLUNAS
     ============================================= -->
<div class="container-fluid px-0 desktop-only">
    <div class="row g-0" style="min-height:calc(100vh - 120px);">

        <!-- Sidebar esquerda -->
        <aside class="col-lg-2 sidebar-left p-3 d-flex flex-column gap-3">
            <p class="sidebar-title mb-0">Categorias</p>
            <div class="d-flex flex-column">
                <?php
                $icones = [
                    'Música'              => 'ti-music',
                    'Dança'               => 'ti-jump-rope',
                    'Pintura'             => 'ti-palette',
                    'Escultura'           => 'ti-building',
                    'Teatro'              => 'ti-masks-theater',
                    'Literatura'          => 'ti-book',
                    'Cinema'              => 'ti-movie',
                    'Fotografia'          => 'ti-camera',
                    'Banda Desenhada'     => 'ti-pencil',
                    'Vídeo Games'         => 'ti-device-gamepad-2',
                    'Arte digital'        => 'ti-brush',
                ];
                foreach ($categorias as $cat):
                    $icone = $icones[$cat['categoria']] ?? 'ti-palette';
                    ?>
                    <a class="cat-link" href="https://lea.co.ao/arte/artes.php?art=<?= $cat['id_categoria_artista'] ?>">
                        <i class="ti <?= $icone ?>"></i>
                        <?= htmlspecialchars($cat['categoria']) ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <a href="https://www.lea.co.ao/nasocial/" style="text-decoration:none;display:block;background:linear-gradient(135deg,#1A4A8A,#534AB7);border-radius:10px;padding:12px;">
                <div style="font-size:9px;font-weight:700;color:rgba(255,255,255,0.6);letter-spacing:1px;text-transform:uppercase;margin-bottom:2px;">Mercado Livre</div>
                <div style="font-size:13px;font-weight:700;color:#fff;font-family:'Sora',sans-serif;display:flex;align-items:center;gap:5px;">
                    <i class="ti ti-social" style="font-size:16px;"></i> NASOCIAL
                </div>
                <div style="font-size:10px;color:rgba(255,255,255,0.7);margin-top:2px;">A rede social da cultura angolana</div>
                <div style="margin-top:8px;background:rgba(255,255,255,0.15);border-radius:6px;padding:6px 10px;font-size:11px;font-weight:600;color:#fff;text-align:center;">
                    Entrar →
                </div>
            </a>

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
                        <h1><?= $heroTexto['titulo'] ?></h1>
                        <p class="mt-2 mb-3"><?= $heroTexto['subtitulo'] ?></p>
                        <div class="d-flex gap-2">
                            <a href="https://lea.co.ao/artistas/todos_artistas.php?strt=0" class="btn-lea no-link-deco" onlClick="linkArtista()">Explorar artistas</a>
                            <a href="https://lea.co.ao/loja/" class="btn-lea-outline no-link-deco">Ver loja</a>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row g-2">
                            <?php
                                $cores = ['#2563B0','#1D9E75','#534AB7','#3B7DD8','#C07A1A','#1A4A8A'];
                                $i = 0;
                                foreach ($categoriasHero as $cat):
                                    $img = $cat['imagem'] ?? null;
                                    if ($img) {
                                        $img = str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $img);
                                        $img = trim($img);
                                        $bg = "url('{$img}') center top / cover no-repeat";
                                    } else {
                                        $bg = $cores[$i % count($cores)];
                                    }
                                    ?>
                                        <div class="col-6">
                                            <a href="https://lea.co.ao/artista.php?a=<?= base64_encode($cat['artID']) ?>">
                                                <div class="hero-tile position-relative overflow-hidden" style="height:90px;border-radius:12px;background:<?= $bg ?>;">
                                                    <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,0.65) 0%,transparent 60%);border-radius:12px;"></div>
                                                    <div style="position:absolute;bottom:8px;left:10px;right:10px;">
                                                        <span style="font-size:11px;font-weight:600;color:#fff;"><?= htmlspecialchars($cat['categoria']) ?></span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php $i++; endforeach; ?>

                                    <?php if (count($categoriasHero) < 4): ?>
                                    <div class="col-6">
                                        <a href="/artistas" style="text-decoration:none;">
                                            <div class="hero-tile position-relative overflow-hidden" style="height:90px;border-radius:12px;background:linear-gradient(135deg,#1A4A8A,#534AB7);display:flex;flex-direction:column;align-items:center;justify-content:center;padding:12px;text-align:center;">
                                                <span style="font-size:12px;font-weight:600;color:#fff;line-height:1.5;padding:10px;">Junta-te ao maior acervo de artistas angolanos</span>
                                                <span style="font-size:9px;color:rgba(255,255,255,0.7);margin-top:4px;"></span>
                                            </div>
                                        </a>
                                    </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats -->
            <div class="row g-2">
                <div class="col-3">
                    <a href="https://lea.co.ao/artistas/todos_artistas.php?strt=0" style="text-decoration:none;color:#000;">
                        <div class="stat-card p-3">
                            <div class="stat-num">2<span>k+</span></div>
                            <div class="stat-lbl">Artistas registados</div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="https://lea.co.ao/arte/arte_.php" style="text-decoration:none;color:#000;">
                        <div class="stat-card p-3">
                            <div class="stat-num">11</div>
                            <div class="stat-lbl">Categorias artísticas</div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="https://lea.co.ao/artistas/artista-provincia.php?strt=0&cat=1" style="text-decoration:none;color:#000;">
                        <div class="stat-card p-3">
                            <div class="stat-num">21</div>
                            <div class="stat-lbl">Províncias cobertas</div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="https://lea.co.ao/sobre-nos/" style="text-decoration:none;color:#000;">
                        <div class="stat-card p-3">
                            <div class="stat-num">2017</div>
                            <div class="stat-lbl">Ano de fundação</div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Artistas -->
            <div>
                <div class="d-flex align-items-baseline justify-content-between mb-2">
                    <h2 class="sec-title">Artistas em destaque</h2>
                    <a class="sec-link" href="https://lea.co.ao/artistas/todos_artistas.php?strt=0">Ver todos →</a>
                </div>
                <div class="row g-2">
                    <?php
                    $cores = ['#2563B0','#1D9E75','#534AB7','#3B7DD8','#C07A1A','#1A4A8A'];
                    $i = 0;
                    foreach ($artistasDestaque as $artista):
                        $img = $artista['art_img_url'] ?? null;
                        if ($img) {
                            $img = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $img));
                        }
                        $iniciais = strtoupper(substr($artista['nomeA'], 0, 2));
                        ?>
                        <div class="col-3">
                            <div class="artist-card">
                                <?php if ($img): ?>
                                    <img src="<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($artista['nomeA']) ?>"
                                         style="width:100%;height:150px;object-fit:cover;object-position:top;">
                                <?php else: ?>
                                    <div class="artist-avatar" style="background:<?= $cores[$i % count($cores)] ?>;">
                                        <?= $iniciais ?>
                                    </div>
                                <?php endif; ?>
                                <div class="p-2">
                                    <div class="artist-name"><?= htmlspecialchars($artista['nomeA']) ?></div>
                                    <div class="artist-type"><?= htmlspecialchars($artista['prof'] ?? '') ?> · <?= htmlspecialchars($artista['provincia'] ?? '') ?></div>
                                    <div class="badge-art mt-1"><?= htmlspecialchars($artista['categoria_artista'] ?? '') ?></div>
                                </div>
                            </div>
                        </div>
                        <?php $i++; endforeach; ?>
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
                    <a class="sec-link" href="https://lea.co.ao/noticia.php">Ver mais →</a>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <?php if ($noticiaDestaque): ?>
                            <?php $foto = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $noticiaDestaque['foto'] ?? '')); ?>
                            <div class="featured-card h-100">
                                <a href="https://lea.co.ao/noticias/noticia-detalhes.php?n=<?php echo $noticiaDestaque['id_noticias']; ?>" class="no-link-deco-news">
                                    <div class="featured-img" style="
                                            background-image:url('<?= htmlspecialchars($foto) ?>');
                                            background-size:cover;
                                            background-position:center;
                                            height:230px;
                                            position:relative;
                                            display:flex;
                                            align-items:flex-end;
                                            padding:10px 12px;
                                            ">
                                        <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,0.5) 0%,transparent 60%);"></div>
                                        <span style="position:relative;z-index:1;font-size:10px;color:#fff;background:rgba(0,0,0,.4);padding:3px 10px;border-radius:99px;">
                                          <?= htmlspecialchars($noticiaDestaque['breadcramble'] ?? 'Notícia') ?>
                                        </span>
                                    </div>
                                </a>
                                <div class="p-3">
                                    <span class="featured-tag">Em destaque</span>
                                    <div class="featured-title mt-2">
                                        <a href="https://lea.co.ao/noticias/noticia-detalhes.php?n=<?php echo $noticiaDestaque['id_noticias']; ?>" class="no-link-deco-news">
                                            <?= htmlspecialchars($noticiaDestaque['tema']) ?>
                                        </a>
                                    </div>
                                    <div class="featured-date mt-1"><?= date('M Y', strtotime($noticiaDestaque['data_hora'])) ?></div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6 d-flex flex-column gap-2">
                        <?php
                        $icones = [
                            'Política'       => ['icon' => 'ti-building-bank', 'bg' => '#E8F0FB', 'color' => '#2563B0'],
                            'Tecnologia'     => ['icon' => 'ti-cpu',           'bg' => '#E1F5EE', 'color' => '#1D9E75'],
                            'Desporto'       => ['icon' => 'ti-ball-football', 'bg' => '#FFF3E0', 'color' => '#C07A1A'],
                            'Cronicas'       => ['icon' => 'ti-pencil',        'bg' => '#F3E8FF', 'color' => '#534AB7'],
                            'Arte & Cultura' => ['icon' => 'ti-palette',       'bg' => '#E1F5EE', 'color' => '#1D9E75'],
                            'Economia'       => ['icon' => 'ti-chart-bar',     'bg' => '#FFF3E0', 'color' => '#C07A1A'],
                            'Entrevistas'    => ['icon' => 'ti-microphone',    'bg' => '#E8F0FB', 'color' => '#2563B0'],
                            'Autodidata'     => ['icon' => 'ti-book',          'bg' => '#F3E8FF', 'color' => '#534AB7'],
                        ];
                        $default = ['icon' => 'ti-news', 'bg' => '#E8F0FB', 'color' => '#2563B0'];

                        foreach ($noticiasLista as $index => $noticia):
                            if ($index === 2):
                                ?>
                                <div class="news-item is-ad d-flex align-items-start gap-2 p-2">
                                    <div class="news-dot" style="background:#F1EFE8;color:#888;"><i class="ti ti-ad"></i></div>
                                    <div>
                                        <span class="ad-pill d-inline-block mb-1">Pub</span>
                                        <div class="news-title">Multicaixa Express — transfere em segundos</div>
                                        <div class="news-date">Patrocinado · EMIS</div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php
                            $info = $icones[$noticia['categoria_noticias'] ?? ''] ?? $default;
                            ?>
                            <div class="news-item d-flex align-items-start gap-2 p-2">
                                <div class="news-dot" style="background:<?= $info['bg'] ?>;color:<?= $info['color'] ?>;">
                                    <i class="ti <?= $info['icon'] ?>"></i>
                                </div>
                                <div>
                                    <div class="news-title">
                                        <a href="https://lea.co.ao/noticias/noticia-detalhes.php?n=<?php echo $noticia['id_noticias']; ?>" class="no-link-deco-news">
                                        <?= htmlspecialchars($noticia['tema']) ?>
                                        </a>
                                    </div>
                                    <div class="news-date"><?= date('M Y', strtotime($noticia['data_hora'])) ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
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
                    <?php foreach ($artistasRecemAdicionados as $index => $recemAdicionados): ?>
                        <?php $hashID = base64_encode($recemAdicionados['artID']); ?>
                        <a href="https://lea.co.ao/artista.php?a=<?= $hashID; ?>" class="no-link-deco-news">
                            <div class="recent-artist d-flex align-items-center gap-2 py-2">
                                <div class="ra-avatar" style="background:#2563B0;" style="width:40px; height:40px; border-radius:50%; overflow:hidden; background:#2563B0;">
                                    <img src="<?= htmlspecialchars($recemAdicionados['art_img_url'] ?? 'assets/img/default-avatar.png') ?>"
                                         alt="<?= htmlspecialchars($recemAdicionados['nomeA']) ?>"
                                         style="width:100%; height:100%; object-fit:cover; border-radius:50%; overflow:hidden; background:#2563B0;">
                                </div>
                                <div>
                                    <div class="ra-name"><?= $recemAdicionados['nomeA'] ?></div>
                                    <div class="ra-type"><?= $recemAdicionados['prof'] ?></div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
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
        <h1><?= $heroTexto['titulo'] ?></h1>
        <p class="mt-2 mb-3"><?= $heroTexto['subtitulo'] ?></p>
        <div class="d-flex gap-2 mb-3">
            <a href="https://lea.co.ao/artistas/todos_artistas.php?strt=0" class="btn-lea no-link-deco" onclick="linkArtista()">Explorar</a>
            <a href="https://lea.co.ao/loja/" class="btn-lea-outline no-link-deco">Ver loja</a>
        </div>
        <div class="row g-2">
            <?php
            $cores = ['#2563B0','#1D9E75','#534AB7','#3B7DD8','#C07A1A','#1A4A8A'];
            $i = 0;
            foreach ($categoriasHero as $cat):
                $img = $cat['imagem'] ?? null;
                if ($img) {
                    $img = str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $img);
                    $img = trim($img);
                    $bg = "url('{$img}') center top / cover no-repeat";
                } else {
                    $bg = $cores[$i % count($cores)];
                }
                ?>
                <div class="col-6">
                    <div class="hero-tile position-relative overflow-hidden" style="height:90px;border-radius:12px;background:<?= $bg ?>;">
                        <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,0.65) 0%,transparent 60%);border-radius:12px;"></div>
                        <div style="position:absolute;bottom:8px;left:10px;right:10px;">
                            <span style="font-size:11px;font-weight:600;color:#fff;"><?= htmlspecialchars($cat['categoria']) ?></span>
                        </div>
                    </div>
                </div>
                <?php $i++; endforeach; ?>

            <?php if (count($categoriasHero) < 4): ?>
                <div class="col-6">
                    <a href="/artistas" style="text-decoration:none;">
                        <div class="hero-tile position-relative overflow-hidden" style="height:90px;border-radius:12px;background:linear-gradient(135deg,#1A4A8A,#534AB7);display:flex;flex-direction:column;align-items:center;justify-content:center;padding:12px;text-align:center;">
                            <span style="font-size:10px;font-weight:600;color:#fff;line-height:1.5;padding:10px;">Junta-te ao maior acervo de artistas angolanos</span>
                            <span style="font-size:9px;color:rgba(255,255,255,0.7);margin-top:4px;"></span>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Stats mobile -->
    <div class="stats-mobile">
        <a href="https://lea.co.ao/artistas/todos_artistas.php?strt=0" style="text-decoration:none;color:#000;">
            <div class="stat-mobile-cell">
                <div class="stat-mobile-num">2<span>k+</span></div>
                <div class="stat-mobile-lbl">Artistas</div>
            </div>
        </a>
        <a href="https://lea.co.ao/arte/arte_.php" style="text-decoration:none;color:#000;">
            <div class="stat-mobile-cell">
                <div class="stat-mobile-num">11</div>
                <div class="stat-mobile-lbl">Categorias</div>
            </div>
        </a>
        <a href="https://lea.co.ao/artistas/artista-provincia.php?strt=0&cat=1" style="text-decoration:none;color:#000;">
            <div class="stat-mobile-cell">
                <div class="stat-mobile-num">21</div>
                <div class="stat-mobile-lbl">Províncias</div>
            </div>
        </a>
        <a href="https://lea.co.ao/sobre-nos/" style="text-decoration:none;color:#000;">
            <div class="stat-mobile-cell">
                <div class="stat-mobile-num">2017</div>
                <div class="stat-mobile-lbl">Fundação</div>
            </div>
        </a>
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

    <!-- NASOCIAL -->
    <a href="https://www.lea.co.ao/nasocial/" style="text-decoration:none;display:block;margin:0;background:linear-gradient(135deg,#1A4A8A,#534AB7);padding:14px 16px;">
        <div style="display:flex;align-items:center;justify-content:space-between;">
            <div>
                <!--<div style="font-size:11px;font-weight:700;color:rgba(255,255,255,0.6);letter-spacing:1px;text-transform:uppercase;margin-bottom:2px;">Rede Social</div>-->
                <div style="font-size:15px;font-weight:700;color:#fff;font-family:'Sora',sans-serif;display:flex;align-items:center;gap:6px;">
                    <i class="ti ti-social" style="font-size:18px;"></i> NASOCIAL
                </div>
                <div style="font-size:11px;color:rgba(255,255,255,0.7);margin-top:2px;">A rede social da cultura angolana</div>
            </div>
            <div style="background:rgba(255,255,255,0.15);border-radius:8px;padding:8px 14px;font-size:12px;font-weight:600;color:#fff;">
                Entrar →
            </div>
        </div>
    </a>

    <!-- Categorias mobile -->
    <section class="p-3 bg-white" style="border-bottom:1px solid var(--lea-border);">
        <div class="d-flex align-items-baseline justify-content-between mb-2">
            <h2 class="sec-title">Categorias</h2>
            <a class="sec-link" href="https://lea.co.ao/arte/arte_.php">Ver todas →</a>
        </div>
        <div class="cats-mobile">
            <?php
            $icones = [
                'Música'          => ['icon' => 'ti-music',           'bg' => '#E8F0FB', 'color' => '#2563B0'],
                'Dança'           => ['icon' => 'ti-jump-rope',        'bg' => '#E1F5EE', 'color' => '#1D9E75'],
                'Pintura'         => ['icon' => 'ti-palette',          'bg' => '#FFF3E0', 'color' => '#C07A1A'],
                'Escultura'       => ['icon' => 'ti-building',         'bg' => '#EDE9FF', 'color' => '#534AB7'],
                'Teatro'          => ['icon' => 'ti-masks-theater',    'bg' => '#E8F0FB', 'color' => '#1A4A8A'],
                'Literatura'      => ['icon' => 'ti-book',             'bg' => '#E1F5EE', 'color' => '#0F766E'],
                'Cinema'          => ['icon' => 'ti-movie',            'bg' => '#EDE9FF', 'color' => '#534AB7'],
                'Fotografia'      => ['icon' => 'ti-camera',           'bg' => '#FFF3E0', 'color' => '#B45309'],
                'Banda Desenhada' => ['icon' => 'ti-pencil',           'bg' => '#FCE7F3', 'color' => '#BE185D'],
                'Vídeo Games'     => ['icon' => 'ti-device-gamepad-2', 'bg' => '#E0F2FE', 'color' => '#0369A1'],
                'Arte digital'    => ['icon' => 'ti-brush',            'bg' => '#D1FAE5', 'color' => '#065F46'],
            ];
            foreach ($categoriasMobile as $cat):
                $info = $icones[$cat['categoria']] ?? ['icon' => 'ti-palette', 'bg' => '#E8F0FB', 'color' => '#2563B0'];
                ?>
                <a class="cat-mobile" href="https://lea.co.ao/arte/artes.php?art=<?= $cat['id_categoria_artista'] ?>" style="text-decoration:none;">
                    <div style="width:44px;height:44px;border-radius:12px;background:<?= $info['bg'] ?>;display:flex;align-items:center;justify-content:center;margin:0 auto 6px;">
                        <i class="ti <?= $info['icon'] ?>" style="font-size:22px;color:<?= $info['color'] ?>;"></i>
                    </div>
                    <div class="cat-mobile-name" style="color:var(--lea-text);font-weight:500;"><?= htmlspecialchars($cat['categoria']) ?></div>
                </a>
            <?php endforeach; ?>
        </div>
    </section>

    <div class="mobile-divider"></div>

    <!-- Artistas mobile -->
    <section class="p-3 bg-white" style="border-bottom:1px solid var(--lea-border);">
        <div class="d-flex align-items-baseline justify-content-between mb-2">
            <h2 class="sec-title">Artistas em destaque</h2>
            <a class="sec-link" href="https://lea.co.ao/artistas/todos_artistas.php?strt=0">Ver todos →</a>
        </div>
        <div class="artists-mobile">
            <?php
            $cores = ['#2563B0','#1D9E75','#534AB7','#3B7DD8','#C07A1A','#1A4A8A'];
            $i = 0;
            foreach ($artistasDestaque as $artista):
                $img = $artista['art_img_url'] ?? null;
                if ($img) {
                    $img = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $img));
                }
                $iniciais = strtoupper(substr($artista['nomeA'], 0, 2));
                ?>
                <div class="artist-card-mobile">
                    <?php if ($img): ?>
                        <img src="<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($artista['nomeA']) ?>"
                             style="width:100%;height:120px;object-fit:cover;object-position:top;">
                    <?php else: ?>
                        <div class="artist-avatar-mobile" style="background:<?= $cores[$i % count($cores)] ?>;">
                            <?= $iniciais ?>
                        </div>
                    <?php endif; ?>
                    <div class="p-2">
                        <div class="artist-name"><?= htmlspecialchars($artista['nomeA']) ?></div>
                        <div class="artist-type"><?= htmlspecialchars($artista['prof'] ?? '') ?> · <?= htmlspecialchars($artista['provincia'] ?? '') ?></div>
                        <div class="badge-art mt-1"><?= htmlspecialchars($artista['categoria_artista'] ?? '') ?></div>
                    </div>
                </div>
                <?php $i++; endforeach; ?>
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
            <a class="sec-link" href="https://lea.co.ao/noticia.php">Ver mais →</a>
        </div>
        <div class="d-flex flex-column gap-2" style="margin-bottom: 10px;">
            <?php if ($noticiaDestaque): ?>
                <?php $foto = trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $noticiaDestaque['foto'] ?? '')); ?>
                <div class="featured-card h-100">
                    <a href="https://lea.co.ao/noticias/noticia-detalhes.php?n=<?php echo $noticiaDestaque['id_noticias']; ?>" class="no-link-deco-news">
                        <div class="featured-img" style="
                                background-image:url('<?= htmlspecialchars($foto) ?>');
                                background-size:cover;
                                background-position:center;
                                height:150px;
                                position:relative;
                                display:flex;
                                align-items:flex-end;
                                padding:10px 12px;
                                ">
                            <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,0.5) 0%,transparent 60%);"></div>
                            <span style="position:relative;z-index:1;font-size:10px;color:#fff;background:rgba(0,0,0,.4);padding:3px 10px;border-radius:99px; text-decoration: none;">
                                <?= htmlspecialchars($noticiaDestaque['breadcramble'] ?? 'Notícia') ?>
                            </span>
                        </div>
                    </a>
                    <div class="p-3">
                        <span class="featured-tag">Em destaque</span>
                        <div class="featured-title mt-2">
                            <a href="https://lea.co.ao/noticias/noticia-detalhes.php?n=<?php echo $noticiaDestaque['id_noticias']; ?>" class="no-link-deco-news">
                                <?= htmlspecialchars($noticiaDestaque['tema']) ?>
                            </a>
                        </div>
                        <div class="featured-date mt-1"><?= date('M Y', strtotime($noticiaDestaque['data_hora'])) ?></div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="col-md-6 d-flex flex-column gap-2">
            <?php
            $icones = [
                'Política'       => ['icon' => 'ti-building-bank', 'bg' => '#E8F0FB', 'color' => '#2563B0'],
                'Tecnologia'     => ['icon' => 'ti-cpu',           'bg' => '#E1F5EE', 'color' => '#1D9E75'],
                'Desporto'       => ['icon' => 'ti-ball-football', 'bg' => '#FFF3E0', 'color' => '#C07A1A'],
                'Cronicas'       => ['icon' => 'ti-pencil',        'bg' => '#F3E8FF', 'color' => '#534AB7'],
                'Arte & Cultura' => ['icon' => 'ti-palette',       'bg' => '#E1F5EE', 'color' => '#1D9E75'],
                'Economia'       => ['icon' => 'ti-chart-bar',     'bg' => '#FFF3E0', 'color' => '#C07A1A'],
                'Entrevistas'    => ['icon' => 'ti-microphone',    'bg' => '#E8F0FB', 'color' => '#2563B0'],
                'Autodidata'     => ['icon' => 'ti-book',          'bg' => '#F3E8FF', 'color' => '#534AB7'],
            ];
            $default = ['icon' => 'ti-news', 'bg' => '#E8F0FB', 'color' => '#2563B0'];

            foreach ($noticiasLista as $index => $noticia):
                if ($index === 2):
                    ?>
                    <div class="news-item is-ad d-flex align-items-start gap-2 p-2">
                        <div class="news-dot" style="background:#F1EFE8;color:#888;"><i class="ti ti-ad"></i></div>
                        <div>
                            <span class="ad-pill d-inline-block mb-1">Pub</span>
                            <div class="news-title">Multicaixa Express — transfere em segundos</div>
                            <div class="news-date">Patrocinado · EMIS</div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php
                $info = $icones[$noticia['categoria_noticias'] ?? ''] ?? $default;
                ?>
                <div class="news-item d-flex align-items-start gap-2 p-2">
                    <div class="news-dot" style="background:<?= $info['bg'] ?>;color:<?= $info['color'] ?>;">
                        <i class="ti <?= $info['icon'] ?>"></i>
                    </div>
                    <div>
                        <div class="news-title">
                            <a href="https://lea.co.ao/noticias/noticia-detalhes.php?n=<?php echo $noticia['id_noticias']; ?>" class="no-link-deco-news">
                                <?= htmlspecialchars($noticia['tema']) ?>
                            </a>
                        </div>
                        <div class="news-date"><?= date('M Y', strtotime($noticia['data_hora'])) ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
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
