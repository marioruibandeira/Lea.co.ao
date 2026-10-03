<div id="tab-letras" class="m-top" style="display:none;">
    <section class="lyrics-section m-top">
        <div class="sec-hdr">
            <h2>Letras de músicas</h2>
        </div>
        <div class="lyrics-list">
            <?php foreach ($letras as $l): ?>
                <div class="lyric-item">
                    <button class="lyric-head" aria-expanded="false">
                        <div class="lyric-thumb" style="background:linear-gradient(135deg,#2563B0,#1D9E75);position:relative;overflow:hidden;">
							<?php 
								$capaLetra = !empty($l['musica_capa']) ? str_replace(' ', '%20', $l['musica_capa']) : '';
							?>
							<?php if (!empty($capaLetra)): ?>
								<img src="<?= htmlspecialchars($capaLetra) ?>" alt="" style="position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover;" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
								<span style="display:none;position:relative;z-index:1;"><?= strtoupper(substr($artista['nomeA'], 0, 2)) ?></span>
							<?php else: ?>
								<?= strtoupper(substr($artista['nomeA'], 0, 2)) ?>
							<?php endif; ?>
						</div>
                        <div class="lyric-headinfo">
                            <div class="lyric-name"><?= htmlspecialchars($l['litulo_principal']) ?></div>
                            <div class="lyric-sub"><?= htmlspecialchars($l['genero_nome'] ?? '') ?></div>
                        </div>
                        <i class="ti ti-chevron-down lyric-chevron"></i>
                    </button>
                    <div class="lyric-body">
                        <p class="lyric-text"><?= nl2br(htmlspecialchars($l['LETRA'])) ?></p>
                        <div class="lyric-actions">
                            <button class="lyric-btn"><i class="ti ti-copy"></i> Copiar letra</button>
                            <button class="lyric-btn"><i class="ti ti-share"></i> Partilhar</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>

<script>
	document.querySelectorAll('.lyric-head').forEach(head => {
		head.addEventListener('click', () => {
		const item = head.closest('.lyric-item');
		const isOpen = item.classList.contains('open');

		// fecha os outros (comportamento acordeão)
		document.querySelectorAll('.lyric-item.open').forEach(open => {
			if (open !== item) {
				open.classList.remove('open');
				open.querySelector('.lyric-head').setAttribute('aria-expanded', 'false');
			}
		});

		item.classList.toggle('open', !isOpen);
			head.setAttribute('aria-expanded', String(!isOpen));
		});
	});
</script>

