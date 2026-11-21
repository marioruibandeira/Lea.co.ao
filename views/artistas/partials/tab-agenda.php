<div id="tab-eventos" class="m-top" style="display:none;">
    <div class="sec-hdr">
        <h2>Próximos eventos</h2>
    </div>
    <div class="events-list">
        <?php foreach ($agenda as $e): ?>
            <?php
                $diaEvento = !empty($e['data_evento']) ? explode('/', $e['data_evento'])[0] : '';
                $mesNum    = !empty($e['data_evento']) ? (int) explode('/', $e['data_evento'])[1] : 0;
                $mesesAbrev = ['', 'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
                $mesEvento = $mesesAbrev[$mesNum] ?? '';

                // Verifica se o evento já passou (compara data no formato dd/mm/aaaa com hoje)
                $jaPassou = false;
                if (!empty($e['data_evento'])) {
                    $partes = explode('/', $e['data_evento']);
                    if (count($partes) === 3) {
                        $dataEventoObj = DateTime::createFromFormat('d/m/Y', $e['data_evento']);
                        $hoje = new DateTime('today');
                        $jaPassou = $dataEventoObj && $dataEventoObj < $hoje;
                    }
                }
            ?>
            <div class="event-item">
                <div class="event-date-col" style="background:linear-gradient(135deg,#1F2937,#374151);">
                    <div class="event-day"><?= htmlspecialchars($diaEvento) ?></div>
                    <div class="event-month"><?= htmlspecialchars($mesEvento) ?></div>
                </div>
                <div class="event-body">
                    <div class="event-title"><?= htmlspecialchars($e['evento']) ?></div>
                    <div class="event-meta">
                        <?php if (!empty($e['hora_evento'])): ?>
                            <span><i class="ti ti-clock"></i> <?= htmlspecialchars($e['hora_evento']) ?></span>
                        <?php endif; ?>
                        <?php if (!empty($e['local_evento']) || !empty($e['provincia'])): ?>
                            <span><i class="ti ti-map-pin" style="<?= $jaPassou ? 'color:#dc2626;' : '' ?>"></i> <?= htmlspecialchars($e['local_evento'] ?? '') ?><?= !empty($e['provincia']) ? ' · ' . htmlspecialchars($e['provincia']) : '' ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="event-action">
                    <?php if ($jaPassou): ?>
                        <span class="btn-sm" style="background:#dc2626;color:#fff;cursor:default;">Já realizado</span>
                    <?php elseif (!empty($e['preco']) && $e['preco'] > 0): ?>
                        <div class="event-price"><small>Kz </small><?= number_format($e['preco'], 0, ',', '.') ?></div>
                        <?php if (!empty($e['caminho'])): ?>
                            <a href="<?= htmlspecialchars($e['caminho']) ?>" class="btn-sm">Comprar</a>
                        <?php endif; ?>
                    <?php elseif (!empty($e['caminho'])): ?>
                        <a href="<?= htmlspecialchars($e['caminho']) ?>" class="btn-sm">Saber mais</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>