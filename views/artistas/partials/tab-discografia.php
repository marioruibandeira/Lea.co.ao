<div id="tab-albums" class="m-top" style="display:none;">

	<div class="sec-hdr">
		<h2>Álbuns & EPs</h2>
	</div>
	
	<div class="albums-grid">
		<?php foreach ($albuns as $a): ?>
			<?php
				$capaAlbum = !empty($a['d_capa'])
						? str_replace(' ', '%20', $a['d_capa'])
						: '';
			?>
			<div class="album-card">
				<div class="album-cover btn-ver-faixas" data-disco-id="<?= (int) $a['d_ID'] ?>" style="<?= $capaAlbum ? "background-image:url('{$capaAlbum}');background-size:cover;background-position:center;cursor:pointer;" : 'background:linear-gradient(135deg,#2563B0,#1D9E75);cursor:pointer;' ?>">
					<div class="album-play-overlay"><i class="ti ti-player-play-filled"></i></div>
				</div>
				<div class="album-body">
					<div class="album-title"><?= htmlspecialchars($a['d_nome']) ?></div>
					<div class="album-meta"><?= htmlspecialchars($a['d_categ']) ?> · <?= htmlspecialchars($a['d_ano']) ?> · <?= htmlspecialchars($a['total_faixas']) ?> </div> 
					<?php if (!empty($a['preco']) && $a['preco'] > 0): ?>
						<button class="album-buy-btn">Comprar · Kz <?= number_format($a['preco'], 0, ',', '.') ?></button>
					<?php else: ?>
						<button class="album-buy-btn album-buy-btn-secondary btn-ver-faixas" data-disco-id="<?= (int) $a['d_ID'] ?>">
							<i class="ti ti-playlist"></i> Ver músicas
						</button>
					<?php endif; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	
</div>

<div class="album-faixas-overlay" id="albumFaixasOverlay">
    <div class="album-faixas-modal">
        <button class="album-faixas-close" id="albumFaixasClose"><i class="ti ti-x"></i></button>
        <div class="album-faixas-header">
            <div class="album-faixas-capa" id="albumFaixasCapa"></div>
            <div>
                <div class="album-faixas-titulo" id="albumFaixasTitulo"></div>
                <div class="album-faixas-artista" id="albumFaixasArtista"></div>
            </div>
        </div>
        <div class="album-faixas-lista" id="albumFaixasLista">
            <!-- preenchido via JS -->
        </div>
    </div>
</div>

<script>
document.querySelectorAll('.btn-ver-faixas').forEach(el => {
    el.addEventListener('click', function() {
        const discoId = this.dataset.discoId;
        const listaEl = document.getElementById('albumFaixasLista');
        listaEl.innerHTML = '<p style="padding:16px;color:var(--lea-muted);">A carregar…</p>';
        document.getElementById('albumFaixasOverlay').classList.add('active');

        fetch('/artista/faixas?disco_id=' + encodeURIComponent(discoId))
            .then(res => res.json())
            .then(data => {
                if (data.erro) {
                    listaEl.innerHTML = '<p style="padding:16px;color:var(--lea-muted);">' + data.erro + '</p>';
                    return;
                }

                document.getElementById('albumFaixasTitulo').textContent = data.disco.nome;
                document.getElementById('albumFaixasArtista').textContent = data.artista.nome;
                document.getElementById('albumFaixasCapa').style.backgroundImage = data.disco.capa
                    ? "url('" + data.disco.capa.replace(/ /g, '%20') + "')"
                    : '';

                if (!data.faixas || data.faixas.length === 0) {
                    listaEl.innerHTML = '<p style="padding:16px;color:var(--lea-muted);">Sem faixas disponíveis.</p>';
                    return;
                }

                listaEl.innerHTML = data.faixas.map(f => {
                    const tempoFmt = f.tempo ? Math.floor(f.tempo/60) + ':' + String(f.tempo%60).padStart(2,'0') : '';
                    const playBtn = f.ce_m_promocional
                        ? '<button class="album-faixa-play"><i class="ti ti-player-play-filled"></i></button>'
                        : '<span style="width:16px;"></span>';
                    return `
                        <div class="album-faixa-row">
                            ${playBtn}
                            <span class="album-faixa-num">${f.numero ?? ''}</span>
                            <span class="album-faixa-nome">${f.titulo}</span>
                            <span class="album-faixa-tempo">${tempoFmt}</span>
                        </div>
                    `;
                }).join('');
            })
            .catch(() => {
                listaEl.innerHTML = '<p style="padding:16px;color:var(--lea-muted);">Erro ao carregar faixas.</p>';
            });
    });
});

document.getElementById('albumFaixasClose')?.addEventListener('click', function() {
    document.getElementById('albumFaixasOverlay').classList.remove('active');
});
document.getElementById('albumFaixasOverlay')?.addEventListener('click', function(e) {
    if (e.target === this) this.classList.remove('active');
});
</script>