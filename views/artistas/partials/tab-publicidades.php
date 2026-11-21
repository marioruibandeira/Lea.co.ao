<div id="tab-publicidades" class="m-top" style="display:none;">
    <section class="ads-section m-top">

        <div class="sec-hdr">
            <h2>Publicidades</h2>
        </div>

        <div class="ad-work-list">
            <?php foreach ($publicidades as $p): ?>
                <?php
                    $capaPub = !empty($p['imagem_video'])
                        ? 'https://lea.co.ao' . str_replace(' ', '%20', $p['imagem_video'])
                        : '';
                    $iniciaisPub = strtoupper(substr($p['titulo_video'], 0, 2));
                ?>
                <a class="ad-work-card" href="#">
                    <div class="ad-work-brand" style="<?= $capaPub ? "background-image:url('{$capaPub}');background-size:cover;background-position:center;" : 'background:#1A4A8A;' ?>">
                        <?php if (!$capaPub): ?><?= $iniciaisPub ?><?php endif; ?>
                    </div>
                    <div class="ad-work-info">
                        <div class="ad-work-title"><?= htmlspecialchars($p['titulo_video']) ?></div>
                        <?php if (!empty($p['sinopse'])): ?>
                            <div class="ad-work-campaign"><?= htmlspecialchars($p['sinopse']) ?></div>
                        <?php endif; ?>
                        <div class="ad-work-meta">
                            <span><i class="ti ti-calendar"></i> <?= htmlspecialchars($p['ano'] ?? '') ?></span>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
</div>