<div id="tab-series" class="m-top" style="display:none;">
    <section class="series-section m-top">

        <div class="sec-hdr">
            <h2>Séries</h2>
        </div>

        <div class="series-grid">
            <?php foreach ($series as $s): ?>
                <?php
                    $capaSerie = !empty($s['imagem_video'])
                        ? 'https://lea.co.ao' . str_replace(' ', '%20', $s['imagem_video'])
                        : '';
                ?>
                <a class="series-card" href="#">
                    <div class="series-thumb" style="<?= $capaSerie ? "background-image:url('{$capaSerie}');background-size:cover;background-position:center;" : 'background:linear-gradient(135deg,#C07A1A,#2563B0);' ?>">
                        <?php if (!$capaSerie): ?><i class="ti ti-device-tv"></i><?php endif; ?>
                    </div>
                    <div class="series-body">
                        <div class="series-title"><?= htmlspecialchars($s['titulo_video']) ?></div>
                        <div class="series-meta">
                            <?php if (!empty($s['genero_nome'])): ?>
                                <span class="series-platform"><?= htmlspecialchars($s['genero_nome']) ?></span>
                            <?php endif; ?>
                            <span><?= htmlspecialchars($s['ano'] ?? '') ?></span>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
</div>