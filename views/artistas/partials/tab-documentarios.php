<div id="tab-documentarios" class="m-top" style="display:none;">
    <section class="docs-section m-top">

        <div class="sec-hdr">
            <h2>Documentários</h2>
        </div>

        <div class="doc-grid">
            <?php foreach ($documentarios as $d): ?>
                <?php
                    $capaDoc = !empty($d['imagem_video'])
                        ? 'https://lea.co.ao' . str_replace(' ', '%20', $d['imagem_video'])
                        : '';
                ?>
                <a class="doc-card" href="#">
                    <div class="doc-poster" style="<?= $capaDoc ? "background-image:url('{$capaDoc}');background-size:cover;background-position:center;" : 'background:linear-gradient(135deg,#1D9E75,#2563B0);' ?>">
                        <?php if (!$capaDoc): ?><i class="ti ti-camera"></i><?php endif; ?>
                    </div>
                    <div class="doc-body">
                        <div class="doc-title"><?= htmlspecialchars($d['titulo_video']) ?></div>
                        <?php if (!empty($d['genero_nome'])): ?>
                            <span class="doc-theme"><?= htmlspecialchars($d['genero_nome']) ?></span>
                        <?php endif; ?>
                        <div class="doc-meta">
                            <span><i class="ti ti-calendar"></i> <?= htmlspecialchars($d['ano'] ?? '') ?></span>
                            <?php if (!empty($d['duracao'])): ?><span><i class="ti ti-clock"></i> <?= htmlspecialchars($d['duracao']) ?></span><?php endif; ?>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
</div>