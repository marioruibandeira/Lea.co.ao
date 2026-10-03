<?php if ($temMusicas): ?>
			<div id="tab-musicas" class="m-top" style="display:none;">
				<div class="sec-hdr">
					<h2>Todas as músicas</h2>
				</div>
				<div class="track-list">
					<div class="track-list-header">
						<div style="text-align:center;">#</div>
						<div>Título</div>
						<div class="th-genre">Género</div>
						<div class="th-dur"></div>
						<div style="text-align:right;">Ações</div>
					</div>
					<?php foreach ($musicas as $i => $m): ?>
						<div class="track-row">
							<div style="position:relative;display:flex;align-items:center;justify-content:center;">
								<span class="tr-num"><?= $i + 1 ?></span>
								<button class="tr-play"><i class="ti ti-player-play-filled"></i></button>
							</div>
							<div class="tr-info">
								<div class="tr-thumb" style="background:linear-gradient(135deg,#2563B0,#1D9E75);">
									<?php if (!empty($m['capa'])): ?>
										<img src="<?= htmlspecialchars($m['capa']) ?>" alt="" onerror="this.style.display='none'">
									<?php else: ?>
										<?= strtoupper(substr($artista['nomeA'], 0, 2)) ?>
									<?php endif; ?>
								</div>
								<div>
									<div class="tr-name"><?= htmlspecialchars($m['titulo']) ?></div>
									<div class="tr-sub">Single · <?= htmlspecialchars($m['ano'] ?? '') ?></div>
								</div>
							</div>
							<span class="tr-genre th-genre"><?= htmlspecialchars($m['genero_nome'] ?? '') ?></span>
							<span class="tr-dur th-dur"></span>
							<div class="tr-actions">
								<button class="tr-btn"><i class="ti ti-heart"></i></button>
								<button class="tr-btn"><i class="ti ti-download"></i></button>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>