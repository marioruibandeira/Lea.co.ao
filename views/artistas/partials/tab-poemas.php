<div id="tab-poemas" class="m-top" style="display:none;">
    <section class="poems-section m-top">

        <div class="sec-hdr">
            <h2>Poemas</h2>
        </div>

        <div class="poems-list">
            <?php foreach ($poemas as $p): ?>
                <div class="poem-item">
                    <button class="poem-head" aria-expanded="false">
                        <div class="poem-icon"><i class="ti ti-feather"></i></div>
                        <div class="poem-headinfo">
                            <div class="poem-name"><?= htmlspecialchars($p['titulo']) ?></div>
                            <div class="poem-sub">
                                <?= !empty($p['livro_titulo']) ? 'Coletânea "' . htmlspecialchars($p['livro_titulo']) . '"' : 'Inédito' ?>
                                <?php if (!empty($p['ano_poesia'])): ?> · <?= htmlspecialchars($p['ano_poesia']) ?><?php endif; ?>
                            </div>
                        </div>
                        <?php if (!empty($p['tema_nome'])): ?>
                            <span class="poem-readtime"><?= htmlspecialchars($p['tema_nome']) ?></span>
                        <?php endif; ?>
                        <i class="ti ti-chevron-down poem-chevron"></i>
                    </button>
                    <div class="poem-body">
                        <p class="poem-text"><?= $p['poesia'] ?></p>
                        <div class="poem-actions">
                            <button class="poem-btn"><i class="ti ti-copy"></i> Copiar</button>
                            <button class="poem-btn"><i class="ti ti-share"></i> Partilhar</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>
<script>
	document.querySelectorAll('.poem-head').forEach(head => {
		head.addEventListener('click', () => {
		  const item = head.closest('.poem-item');
		  const isOpen = item.classList.contains('open');

		  document.querySelectorAll('.poem-item.open').forEach(open => {
			if (open !== item) {
			  open.classList.remove('open');
			  open.querySelector('.poem-head').setAttribute('aria-expanded', 'false');
			}
		  });

		  item.classList.toggle('open', !isOpen);
		  head.setAttribute('aria-expanded', String(!isOpen));
		});
	});
</script>