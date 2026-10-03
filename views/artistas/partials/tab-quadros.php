<div id="tab-quadros" style="display:none;">
    <section class="paintings-section">

        <div class="sec-hdr">
            <h2>Quadros</h2>
        </div>

        <div class="painting-grid">
            <?php foreach ($artesPlasticas as $q): ?>
                <?php
                    $capaQuadro = !empty($q['caminho'])
                        ? str_replace(' ', '%20', $q['caminho'])
                        : '';
                ?>
                <div class="painting-card btn-ver-quadro"
                     data-titulo="<?= htmlspecialchars($q['titulo'], ENT_QUOTES) ?>"
                     data-capa="<?= htmlspecialchars($capaQuadro, ENT_QUOTES) ?>"
                     style="cursor:pointer;">
                    <div class="painting-img" style="<?= $capaQuadro ? "background-image:url('{$capaQuadro}');background-size:cover;background-position:center;" : 'background:linear-gradient(135deg,#C07A1A,#9D174D);' ?>">
                        <?php if (!$capaQuadro): ?><i class="ti ti-palette"></i><?php endif; ?>
                    </div>
                    <div class="painting-body">
                        <div class="painting-title"><?= htmlspecialchars($q['titulo']) ?></div>
                        <div class="painting-meta"><?= htmlspecialchars($q['tecnica']) ?> · <?= htmlspecialchars($q['dimensao']) ?> · <?= htmlspecialchars($q['ano']) ?></div>
                        <?php if (!empty($q['preco']) && $q['preco'] > 0): ?>
                            <div class="painting-price">Kz <?= number_format($q['preco'], 0, ',', '.') ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>


<div class="quadro-overlay" id="quadroOverlay">
    <div class="quadro-modal">
        <button class="quadro-close" id="quadroClose"><i class="ti ti-x"></i></button>

        <div class="quadro-header">
            <div class="quadro-artista-avatar">
                <?php if ($foto): ?>
                    <img src="<?= htmlspecialchars($foto) ?>" alt="">
                <?php else: ?>
                    <span><?= $iniciais ?></span>
                <?php endif; ?>
            </div>
            <div class="quadro-artista-nome"><?= htmlspecialchars($artista['nomeA']) ?></div>
        </div>

        <img class="quadro-imagem" id="quadroImagem" src="" alt="">

        <div class="quadro-titulo" id="quadroTitulo"></div>

        <div class="quadro-acoes">
			<a href="#" class="quadro-btn quadro-btn-primario">Saiba mais</a>
			<button class="quadro-btn quadro-btn-secundario" id="quadroFecharBtn">Fechar</button>
		</div>
    </div>
</div>

<script>
	document.querySelectorAll('.btn-ver-quadro').forEach(card => {
		card.addEventListener('click', function() {
			document.getElementById('quadroImagem').src = this.dataset.capa || '';
			document.getElementById('quadroTitulo').textContent = this.dataset.titulo || '';
			document.getElementById('quadroOverlay').classList.add('active');
		});
	});

	document.getElementById('quadroClose')?.addEventListener('click', fecharQuadroModal);
	document.getElementById('quadroFecharBtn')?.addEventListener('click', fecharQuadroModal);
	document.getElementById('quadroOverlay')?.addEventListener('click', function(e) {
		if (e.target === this) fecharQuadroModal();
	});

	function fecharQuadroModal() {
		document.getElementById('quadroOverlay').classList.remove('active');
	}
</script>