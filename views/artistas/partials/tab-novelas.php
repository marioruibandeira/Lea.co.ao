<div id="tab-novelas" class="m-top" style="display:none;">
    <section class="novelas-section m-top">

        <div class="sec-hdr">
            <h2>Novelas</h2>
        </div>

        <div class="novela-list">
            <?php foreach ($novelas as $n): ?>
                <?php
                    $capaNovela = !empty($n['imagem_video'])
                        ? 'https://lea.co.ao' . str_replace(' ', '%20', $n['imagem_video'])
                        : '';
                ?>
                <a class="novela-card" href="#">
                    <div class="novela-thumb" style="<?= $capaNovela ? "background-image:url('{$capaNovela}');background-size:cover;background-position:center;" : 'background:linear-gradient(135deg,#534AB7,#9D174D);' ?>">
                        <?php if (!$capaNovela): ?><i class="ti ti-device-tv"></i><?php endif; ?>
                    </div>
                    <div class="novela-body">
                        <div class="novela-title"><?= htmlspecialchars($n['titulo_video']) ?></div>
                        <div class="novela-meta">
                            <?php if (!empty($n['genero_nome'])): ?>
                                <span><?= htmlspecialchars($n['genero_nome']) ?></span>
                            <?php endif; ?>
                            <span><i class="ti ti-calendar"></i> <?= htmlspecialchars($n['ano'] ?? '') ?></span>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
</div>