<div id="tab-ornamentos" style="display:none;">
    <section class="ornaments-section">

        <div class="sec-hdr">
            <h2>Ornamentos</h2>
        </div>

        <div class="ornament-grid">
            <?php foreach ($ornamentos as $o): ?>
                <?php
                    $capaOrnamento = !empty($o['imagem_principal'])
                        ? str_replace(' ', '%20', $o['imagem_principal'])
                        : '';
                    $dimensoes = [];
                    if (!empty($o['altura']))       $dimensoes[] = $o['altura'];
                    if (!empty($o['largura']))      $dimensoes[] = $o['largura'];
                    if (!empty($o['profundidade'])) $dimensoes[] = $o['profundidade'];
                    $dimensaoTexto = !empty($dimensoes) ? implode('×', $dimensoes) . ' ' . ($o['unidade_medida'] ?? 'cm') : '';
                ?>
                <a class="ornament-card" href="#">
                    <div class="ornament-img" style="<?= $capaOrnamento ? "background-image:url('{$capaOrnamento}');background-size:cover;background-position:center;" : 'background:linear-gradient(135deg,#C07A1A,#1A4A8A);' ?>">
                        <?php if (!$capaOrnamento): ?><i class="ti ti-diamond"></i><?php endif; ?>
                    </div>
                    <div class="ornament-body">
                        <?php if (!empty($o['tipo'])): ?>
                            <span class="ornament-category"><?= htmlspecialchars($o['tipo']) ?></span>
                        <?php endif; ?>
                        <div class="ornament-title"><?= htmlspecialchars($o['titulo']) ?></div>
                        <div class="ornament-meta">
                            <?= htmlspecialchars($o['material'] ?? '') ?>
                            <?= $dimensaoTexto ? ' · ' . htmlspecialchars($dimensaoTexto) : '' ?>
                        </div>
                        <?php if (!empty($o['disponivel_venda']) && !empty($o['preco'])): ?>
                            <div class="ornament-price"><?= htmlspecialchars($o['moeda'] ?? 'Kz') ?> <?= number_format($o['preco'], 0, ',', '.') ?></div>
                        <?php endif; ?>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
</div>