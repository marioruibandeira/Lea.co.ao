<div id="tab-dizeres" style="display:none;">
    <section class="quotes-section">

        <div class="sec-hdr">
            <h2>Dizeres</h2>
        </div>

        <div class="quotes-grid">
            <?php foreach ($dizeres as $d): ?>
                <div class="quote-card">
                    <i class="ti ti-quote quote-mark"></i>
                    <p class="quote-text"><?= htmlspecialchars($d['dizer']) ?></p>
                    <div class="quote-footer">
                        <?php if (!empty($d['tema_nome'])): ?>
                            <span class="quote-tag"><?= htmlspecialchars($d['tema_nome']) ?></span>
                        <?php endif; ?>
                        <div class="quote-actions">
                            <button class="quote-icon-btn" title="Copiar"><i class="ti ti-copy"></i></button>
                            <button class="quote-icon-btn" title="Partilhar"><i class="ti ti-share"></i></button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>