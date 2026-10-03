<div id="tab-livros" class="m-top" style="display:none;">
    <section class="books-section m-top">

        <div class="sec-hdr">
            <h2>Livros</h2>
        </div>

        <div class="book-grid">
            <?php foreach ($livros as $l): ?>
			<!-- DEBUG: <?= htmlspecialchars(var_export($l['capa_livro'], true)) ?> -->
                <?php
                    $capaLivro = !empty($l['capa_livro'])
                        ? str_replace(' ', '%20', $l['capa_livro'])
                        : '';
                ?>
                <a class="book-card" href="#">
                    <div class="book-cover" style="<?= $capaLivro ? "background-image:url('{$capaLivro}');background-size:cover;background-position:center;" : 'background:linear-gradient(135deg,#1A4A8A,#3B7DD8);' ?>">
                        <?php if (!$capaLivro): ?><i class="ti ti-book-2"></i><?php endif; ?>
                    </div>
                    <div class="book-body">
                        <div class="book-title"><?= htmlspecialchars($l['titulo']) ?></div>
                        <div class="book-meta">
                            <span><?= htmlspecialchars($l['ano_pub_livro'] ?? '') ?></span>
                            
                        </div>
                        <?php if (!empty($l['preco']) && $l['preco'] > 0): ?>
							<div class="book-price">Kz <?= number_format($l['preco'], 0, ',', '.') ?></div>
							<span class="book-buy-btn"><i class="ti ti-shopping-cart"></i> Comprar</span>
						<?php else: ?>
							<span class="book-buy-btn book-buy-btn-secondary"><i class="ti ti-info-circle"></i> Saber mais</span>
						<?php endif; ?>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
</div>