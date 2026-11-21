<div id="tab-bio">
				<?php if ($temBio): ?>
					<div class="card card-pad">
						<div class="sec-hdr">
							<h2>Sobre <?= htmlspecialchars($artista['nomeA']) ?></h2>
						</div>
						<?php
							$bioCompleta = trim($artista['bio']);
							$limiteCaracteres = 620;
							$precisaTruncar = mb_strlen($bioCompleta) > $limiteCaracteres;
							$bioResumo = $precisaTruncar
								? mb_substr($bioCompleta, 0, $limiteCaracteres) . '…'
								: $bioCompleta;
						?>
						<p class="bio-text"><?= $bioResumo ?></p>
						<?php if ($precisaTruncar): ?>
							<button class="bio-ler-mais" id="btnLerBioCompleta">
								Ler biografia completa <i class="ti ti-arrow-right"></i>
							</button>
						<?php endif; ?>
					</div>

					<?php if ($precisaTruncar): ?>
					<!-- Modal biografia completa -->
					<div class="bio-modal-overlay" id="bioModalOverlay">
						<div class="bio-modal">
							<button class="bio-modal-close" id="bioModalClose"><i class="ti ti-x"></i></button>
							<div class="bio-modal-header">
								<div class="bio-modal-avatar">
									<?php if ($foto): ?>
										<img src="<?= htmlspecialchars($foto) ?>" alt="">
									<?php else: ?>
										<span><?= $iniciais ?></span>
									<?php endif; ?>
								</div>
								<div>
									<div class="bio-modal-name"><?= htmlspecialchars($artista['nomeA']) ?></div>
									<div class="bio-modal-prof"><?= htmlspecialchars($artista['prof'] ?? '') ?></div>
								</div>
							</div>
							<div class="bio-modal-body">
								<p class="bio-text"><?= $bioCompleta ?></p>
							</div>
						</div>
					</div>
					<?php endif; ?>

					<!-- AD -->
					<div>
						<div class="ann"><i class="ti ti-ad"></i> In-content</div>
						<div class="ad-strip">
							<span class="ad-pill">Pub</span>
							<div class="ad-strip-thumb" style="background:var(--lea-blue);">UN</div>
							<div class="ad-strip-copy">
								<strong>Unitel — Plano Ilimitado por Kz 3.500/mês</strong>
								<small>Ligação rápida em todo o país · unitel.ao</small>
							</div>
							<button class="btn-sm">Ver oferta</button>
						</div>
					</div>
				<?php endif; ?>
				
				
				
			<!-- Músicas populares preview -->
			<?php if ($categoriaPreview): ?>
				<?php include __DIR__ . '/preview-conteudo.php'; ?>
			<?php endif; ?>

      </div>