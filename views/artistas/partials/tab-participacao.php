<div id="tab-participacoes" class="m-top" style="display:none;">
    <section class="credits-section m-top">

        <div class="sec-hdr">
            <h2>Participações em músicas</h2>
        </div>

        <div class="credit-list">
            <?php foreach ($participacoes as $p): ?>
                <?php
                    $capaParticipacao = !empty($p['musica_capa'])
                        ? str_replace(' ', '%20', $p['musica_capa'])
                        : '';
                    $iniciaisDono = strtoupper(substr($p['dono_nome'] ?? '?', 0, 2));
                ?>
                <div class="credit-row">
                    <div class="credit-thumb" style="<?= $capaParticipacao ? "background-image:url('{$capaParticipacao}');background-size:cover;background-position:center;" : 'background:linear-gradient(135deg,#C07A1A,#2563B0);' ?>">
                        <?php if (!$capaParticipacao): ?><?= $iniciaisDono ?><?php endif; ?>
                    </div>
                    <div class="credit-info">
                        <div class="credit-title"><?= htmlspecialchars($p['musica_titulo']) ?></div>
                        <div class="credit-artist"><?= htmlspecialchars($p['dono_nome'] ?? '') ?> <span class="credit-year">· <?= htmlspecialchars($p['musica_ano'] ?? '') ?></span></div>
                    </div>
                    <div class="credit-roles">
                        <?php if (!empty($p['tecnica_nome'])): ?>
                            <span class="credit-role"><?= htmlspecialchars($p['tecnica_nome']) ?></span>
                        <?php endif; ?>
                    </div>
                    <button class="credit-play"><i class="ti ti-player-play-filled"></i></button>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>