<?php
if (!function_exists('renderArtistaDestaque')) {

    function renderArtistaDestaque(array $artista, bool $seguindo = false, string $badge = 'Artista em destaque', ?string $ctaUrl = '/destaque'): void
    {
		$ctasTextos = [
			['O próximo destaque podes ser tu', 'Saber como →'],
			['És artista?', 'Aparece aqui em destaque →'],
			['Queres estar em destaque na LEA?', 'Candidata-te →'],
			['Dá mais visibilidade ao teu trabalho', 'Ver como →'],
		];
		[$ctaTexto, $ctaLink] = $ctasTextos[array_rand($ctasTextos)];

        $foto = trim(str_replace(['https://www.lea.co.ao', 'http://www.lea.co.ao'], '', $artista['art_img_url'] ?? ''));
        $iniciais = strtoupper(substr($artista['nomeA'], 0, 2));
        $url = Helper::artistaUrl($artista);
        $anoRegisto = date('Y', strtotime($artista['anoreg']));
        $tipo = implode(' · ', array_filter([
            $artista['prof'] ?? '',
            $artista['categoria'] ?? '',
            $artista['provincia'] ?? '',
        ]));
        ?>
        <div class="artist-of-month mb-4">
            <div class="aom-avatar" style="background:linear-gradient(135deg,#1D9E75,#2563B0);overflow:hidden;position:relative;">
                <?php if ($foto): ?>
                    <img src="<?= htmlspecialchars($foto) ?>" alt=""
                         style="width:100%;height:100%;object-fit:cover;object-position:top;position:absolute;top:0;left:0;"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <span style="position:relative;z-index:1;display:none;"><?= $iniciais ?></span>
                <?php else: ?>
                    <span style="position:relative;z-index:1;"><?= $iniciais ?></span>
                <?php endif; ?>
            </div>

            <div style="position:relative;z-index:1;">
                <div class="aom-badge"><i class="ti ti-star-filled"></i> <?= htmlspecialchars($badge) ?></div>
                <div class="aom-name"><?= htmlspecialchars($artista['nomeA']) ?></div>
                <div class="aom-type"><?= htmlspecialchars($tipo) ?></div>
                <div class="aom-stats">
                    <div><div class="aom-stat-num"><?= number_format($artista['visua'] ?? 0, 0, ',', '.') ?></div><div class="aom-stat-lbl">Visitas</div></div>
                    <div><div class="aom-stat-num" data-fans-artista="<?= (int) $artista['artID'] ?>"><?= number_format($artista['fans'] ?? 0, 0, ',', '.') ?></div><div class="aom-stat-lbl">Seguidores</div></div>
                    <div><div class="aom-stat-num"><?= $anoRegisto ?></div><div class="aom-stat-lbl">Registo</div></div>
                </div>
            </div>

            <div class="aom-actions">
                <button type="button" class="btn-aom-primary js-seguir" data-artista-id="<?= (int) $artista['artID'] ?>">
                    <i class="ti ti-user-plus"></i> <span class="js-seguir-texto"><?= $seguindo ? 'A seguir' : 'Seguir' ?></span>
                </button>
                <a href="<?= htmlspecialchars($url) ?>" class="btn-aom-outline" style="text-decoration:none;display:inline-flex;align-items:center;gap:6px;">
                    <i class="ti ti-user"></i> Visitar perfil
                </a>
            </div>
			
			<?php if ($ctaUrl): ?>
				<a href="<?= htmlspecialchars($ctaUrl) ?>" class="aom-cta">
					<i class="ti ti-sparkles"></i> <?= htmlspecialchars($ctaTexto) ?> <span><?= htmlspecialchars($ctaLink) ?></span>
				</a>
			<?php endif; ?>
			
        </div>
        <?php
    }
}