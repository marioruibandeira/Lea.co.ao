<?php if ($categoriaPreview): ?>
<div>
    <div class="sec-hdr">
        <h2><?= htmlspecialchars($titulosPreview[$categoriaPreview]) ?></h2>
        <a class="sec-more" href="#" onclick="switchTab('<?= $categoriaPreview ?>');return false;">Ver todas →</a>
    </div>

    <?php switch ($categoriaPreview):

        // ─────────────────────────────
        case 'musicas':
        ?>
        <div class="track-list">
            <?php foreach ($previewItems as $i => $item): ?>
                <div class="track-row">
					<div style="position:relative;display:flex;align-items:center;justify-content:center;">
						<span class="tr-num"><?= $i + 1 ?></span>
						<button class="tr-play"><i class="ti ti-player-play-filled"></i></button>
					</div>
					<div class="tr-info">
						<div class="tr-thumb" style="background:linear-gradient(135deg,#2563B0,#1D9E75);">
							<?php if (!empty($item['capa'])): ?>
								<img src="<?= htmlspecialchars($item['capa']) ?>" alt="" onerror="this.style.display='none'">
							<?php else: ?>
								<?= strtoupper(substr($artista['nomeA'], 0, 2)) ?>
							<?php endif; ?>
						</div>
						<div>
							<div class="tr-name"><?= htmlspecialchars($item['titulo']) ?></div>
							<div class="tr-sub">Single · <?= htmlspecialchars($item['ano'] ?? '') ?></div>
						</div>
					</div>
					<span class="tr-genre th-genre"><?= htmlspecialchars($item['genero_nome'] ?? '') ?></span>
					<span class="tr-dur th-dur"></span>
					<div class="tr-actions">
						<button class="tr-btn"><i class="ti ti-heart"></i></button>
						<button class="tr-btn"><i class="ti ti-download"></i></button>
					</div>
				</div>
            <?php endforeach; ?>
        </div>
        <?php break;

        // ─────────────────────────────
        case 'videos':
        ?>
        <div class="videos-grid">
            <?php foreach ($previewItems as $item): ?>
                <a class="video-card" href="<?= htmlspecialchars($item['url'] ?? '#') ?>" target="_blank">
                    <div class="vc-thumb">
                        <?php if (!empty($item['capa'])): ?>
                            <img src="<?= htmlspecialchars($item['capa']) ?>" alt="" onerror="this.style.display='none'">
                        <?php endif; ?>
                        <div class="vc-placeholder" style="background:linear-gradient(135deg,#2563B0,#1D9E75);"><i class="ti ti-music"></i></div>
                        <div class="vc-play-overlay"><i class="ti ti-player-play-filled"></i></div>
                        <span class="vc-cat-badge"><?= htmlspecialchars($item['categoria'] ?? 'Clipe') ?></span>
                        <?php if (!empty($item['duracao'])): ?><span class="vc-duration"><?= htmlspecialchars($item['duracao']) ?></span><?php endif; ?>
                    </div>
                    <div class="vc-body">
                        <div class="vc-title"><?= htmlspecialchars($item['titulo']) ?></div>
                        <div class="vc-date"><?= htmlspecialchars($item['ano'] ?? '') ?></div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
        <?php break;

        // ─────────────────────────────
        case 'albums':
        ?>
        <div class="albums-grid">
            <?php foreach ($previewItems as $item): ?>
                <div class="album-card">
                    <div class="album-cover" style="background:linear-gradient(135deg,#2563B0,#1D9E75);">
                        <div class="album-play-overlay"><i class="ti ti-player-play-filled"></i></div>
                        <?= strtoupper(substr($artista['nomeA'], 0, 2)) ?>
                    </div>
                    <div class="album-body">
                        <div class="album-title"><?= htmlspecialchars($item['titulo']) ?></div>
                        <div class="album-meta"><?= htmlspecialchars($item['tipo'] ?? 'Álbum') ?> · <?= htmlspecialchars($item['ano'] ?? '') ?> · <?= (int)($item['faixas'] ?? 0) ?> faixas</div>
                        <?php if (!empty($item['preco'])): ?>
                            <button class="album-buy-btn">Comprar · Kz <?= number_format($item['preco'], 0, ',', '.') ?></button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php break;

        // ─────────────────────────────
        case 'filmes':
        ?>
        <div class="film-grid">
			<?php foreach ($previewItems as $item): ?>
				<?php
					$capaFilme = !empty($item['imagem_video'])
						? 'https://lea.co.ao' . str_replace(' ', '%20', $item['imagem_video'])
						: '';
				?>
				<a class="film-card" href="<?= htmlspecialchars($item['url'] ?? '#') ?>">
					<div class="film-poster" style="<?= $capaFilme ? "background-image:url('{$capaFilme}');background-size:cover;background-position:center;" : 'background:linear-gradient(135deg,#1F2937,#374151);' ?>">
						<?php if (!$capaFilme): ?>
							<i class="ti ti-movie"></i>
						<?php endif; ?>
					</div>
					<div class="film-body">
						<div class="film-title"><?= htmlspecialchars($item['titulo_video']) ?></div>
						<div class="film-meta"><?= htmlspecialchars($item['ano'] ?? '') ?> · <?= htmlspecialchars($item['genero_nome'] ?? '') ?> · <?= htmlspecialchars($item['duracao'] ?? '') ?></div>
					</div>
				</a>
			<?php endforeach; ?>
        </div>
        <?php break;

        // ─────────────────────────────
        case 'documentarios':
        ?>
        <div class="doc-grid">
            <?php foreach ($previewItems as $item): ?>
                <a class="doc-card" href="<?= htmlspecialchars($item['url'] ?? '#') ?>">
                    <div class="doc-poster" style="background:linear-gradient(135deg,#1D9E75,#2563B0);">
                        <i class="ti ti-camera"></i>
                        <?php if (!empty($item['papel'])): ?><span class="doc-role-badge"><?= htmlspecialchars($item['papel']) ?></span><?php endif; ?>
                    </div>
                    <div class="doc-body">
                        <div class="doc-title"><?= htmlspecialchars($item['titulo']) ?></div>
                        <span class="doc-theme"><?= htmlspecialchars($item['tema'] ?? '') ?></span>
                        <div class="doc-meta">
                            <span><i class="ti ti-calendar"></i> <?= htmlspecialchars($item['ano'] ?? '') ?></span>
                            <?php if (!empty($item['duracao'])): ?><span><i class="ti ti-clock"></i> <?= htmlspecialchars($item['duracao']) ?></span><?php endif; ?>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
        <?php break;

        // ─────────────────────────────
        case 'novelas':
        ?>
        <div class="novela-list">
            <?php foreach ($previewItems as $item): ?>
                <a class="novela-card" href="<?= htmlspecialchars($item['url'] ?? '#') ?>">
                    <div class="novela-thumb" style="background:linear-gradient(135deg,#534AB7,#9D174D);">
                        <i class="ti ti-device-tv"></i>
                    </div>
                    <div class="novela-body">
                        <div class="novela-title"><?= htmlspecialchars($item['titulo']) ?></div>
                        <?php if (!empty($item['papel'])): ?><span class="novela-role"><?= htmlspecialchars($item['papel']) ?></span><?php endif; ?>
                        <div class="novela-meta">
                            <?php if (!empty($item['canal'])): ?><span><i class="ti ti-broadcast"></i> <?= htmlspecialchars($item['canal']) ?></span><?php endif; ?>
                            <span><i class="ti ti-calendar"></i> <?= htmlspecialchars($item['ano'] ?? '') ?></span>
                            <?php if (!empty($item['episodios'])): ?><span><i class="ti ti-player-play"></i> <?= (int)$item['episodios'] ?> episódios</span><?php endif; ?>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
        <?php break;

        // ─────────────────────────────
        case 'series':
        ?>
        <div class="series-grid">
            <?php foreach ($previewItems as $item): ?>
                <a class="series-card" href="<?= htmlspecialchars($item['url'] ?? '#') ?>">
                    <div class="series-thumb" style="background:linear-gradient(135deg,#C07A1A,#2563B0);">
                        <i class="ti ti-device-tv"></i>
                        <?php if (!empty($item['temporadas'])): ?><span class="series-season-badge"><?= (int)$item['temporadas'] ?> temporada<?= $item['temporadas'] > 1 ? 's' : '' ?></span><?php endif; ?>
                    </div>
                    <div class="series-body">
                        <div class="series-title"><?= htmlspecialchars($item['titulo']) ?></div>
                        <?php if (!empty($item['papel'])): ?><span class="series-role"><?= htmlspecialchars($item['papel']) ?></span><?php endif; ?>
                        <div class="series-meta">
                            <?php if (!empty($item['plataforma'])): ?><span class="series-platform"><i class="ti ti-broadcast"></i> <?= htmlspecialchars($item['plataforma']) ?></span><?php endif; ?>
                            <span><?= htmlspecialchars($item['ano'] ?? '') ?></span>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
        <?php break;

        // ─────────────────────────────
        case 'publicidades':
        ?>
        <div class="ad-work-list">
            <?php foreach ($previewItems as $item): ?>
                <a class="ad-work-card" href="<?= htmlspecialchars($item['url'] ?? '#') ?>">
                    <div class="ad-work-brand" style="background:#1A4A8A;"><?= strtoupper(substr($item['marca'] ?? '?', 0, 2)) ?></div>
                    <div class="ad-work-info">
                        <div class="ad-work-title"><?= htmlspecialchars($item['marca'] ?? '') ?> — "<?= htmlspecialchars($item['campanha_nome'] ?? '') ?>"</div>
                        <div class="ad-work-campaign"><?= htmlspecialchars($item['descricao'] ?? '') ?></div>
                        <div class="ad-work-meta">
                            <?php if (!empty($item['papel'])): ?><span class="ad-work-role"><?= htmlspecialchars($item['papel']) ?></span><?php endif; ?>
                            <?php if (!empty($item['meio'])): ?><span><i class="ti ti-device-tv"></i> <?= htmlspecialchars($item['meio']) ?></span><?php endif; ?>
                            <span><i class="ti ti-calendar"></i> <?= htmlspecialchars($item['ano'] ?? '') ?></span>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
        <?php break;

        // ─────────────────────────────
        case 'livros':
        ?>
			<div class="book-grid">
				<?php foreach ($previewItems as $item): ?>
					<?php
						$capaLivro = !empty($item['capa_livro'])
							? str_replace(' ', '%20', $item['capa_livro'])
							: '';
					?>
					<a class="book-card" href="#">
						<div class="book-cover" style="<?= $capaLivro ? "background-image:url('{$capaLivro}');background-size:cover;background-position:center;" : 'background:linear-gradient(135deg,#1A4A8A,#3B7DD8);' ?>">
							<?php if (!$capaLivro): ?><i class="ti ti-book-2"></i><?php endif; ?>
						</div>
						<div class="book-body">
							<div class="book-title"><?= htmlspecialchars($item['titulo']) ?></div>
							<div class="book-meta">
								<span><?= htmlspecialchars($item['ano_pub_livro'] ?? '') ?></span>
								<?php if (!empty($item['genero_nome'])): ?>
									<span>·</span>
									<span><?= htmlspecialchars($item['genero_nome']) ?></span>
								<?php endif; ?>
								<?php if (!empty($item['n_paginas'])): ?>
									<span>·</span>
									<span><?= (int) $item['n_paginas'] ?> págs.</span>
								<?php endif; ?>
							</div>
							<?php if (!empty($item['preco']) && $item['preco'] > 0): ?>
								<div class="book-price">Kz <?= number_format($item['preco'], 0, ',', '.') ?></div>
								<span class="book-buy-btn"><i class="ti ti-shopping-cart"></i> Comprar</span>
							<?php else: ?>
								<span class="book-buy-btn book-buy-btn-secondary"><i class="ti ti-info-circle"></i> Saber mais</span>
							<?php endif; ?>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
			<?php break;

        // ─────────────────────────────
        case 'poemas':
        ?>
        <div class="poems-list">
            <?php foreach ($previewItems as $i => $item): ?>
                <div class="poem-item">
                    <button class="poem-head" aria-expanded="false">
                        <div class="poem-icon"><i class="ti ti-feather"></i></div>
                        <div class="poem-headinfo">
                            <div class="poem-name"><?= htmlspecialchars($item['titulo']) ?></div>
                            <div class="poem-sub"><?= htmlspecialchars($item['coletanea'] ?? 'Inédito') ?> · <?= htmlspecialchars($item['ano'] ?? '') ?></div>
                        </div>
                        <?php if (!empty($item['tempo_leitura'])): ?><span class="poem-readtime"><?= htmlspecialchars($item['tempo_leitura']) ?></span><?php endif; ?>
                        <i class="ti ti-chevron-down poem-chevron"></i>
                    </button>
                    <div class="poem-body">
                        <p class="poem-text"><?= nl2br(htmlspecialchars($item['texto'] ?? '')) ?></p>
                        <div class="poem-actions">
                            <button class="poem-btn"><i class="ti ti-copy"></i> Copiar</button>
                            <button class="poem-btn"><i class="ti ti-share"></i> Partilhar</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php break;

        // ─────────────────────────────
        case 'dizeres':
        ?>
        <div class="quotes-grid">
            <?php foreach ($previewItems as $item): ?>
                <div class="quote-card">
                    <i class="ti ti-quote quote-mark"></i>
                    <p class="quote-text"><?= htmlspecialchars($item['texto']) ?></p>
                    <div class="quote-footer">
                        <?php if (!empty($item['tema'])): ?><span class="quote-tag"><?= htmlspecialchars($item['tema']) ?></span><?php endif; ?>
                        <div class="quote-actions">
                            <button class="quote-icon-btn" title="Copiar"><i class="ti ti-copy"></i></button>
                            <button class="quote-icon-btn" title="Partilhar"><i class="ti ti-share"></i></button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php break;

        // ─────────────────────────────
        case 'quadros':
        ?>
        <div class="painting-grid">
            <?php foreach ($previewItems as $item): ?>
                <a class="painting-card" href="<?= htmlspecialchars($item['url'] ?? '#') ?>">
                    <div class="painting-img" style="background:linear-gradient(135deg,#C07A1A,#9D174D);">
                        <i class="ti ti-palette"></i>
                        <?php if (!empty($item['status'])): ?>
                            <span class="painting-status painting-status-<?= htmlspecialchars($item['status_classe'] ?? 'available') ?>"><?= htmlspecialchars($item['status']) ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="painting-body">
                        <div class="painting-title"><?= htmlspecialchars($item['titulo']) ?></div>
                        <div class="painting-meta"><?= htmlspecialchars($item['tecnica'] ?? '') ?> · <?= htmlspecialchars($item['dimensoes'] ?? '') ?> · <?= htmlspecialchars($item['ano'] ?? '') ?></div>
                        <?php if (!empty($item['preco'])): ?>
                            <div class="painting-price">Kz <?= number_format($item['preco'], 0, ',', '.') ?></div>
                        <?php else: ?>
                            <div class="painting-price painting-price-muted">—</div>
                        <?php endif; ?>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
        <?php break;

        // ─────────────────────────────
        case 'ornamentos':
        ?>
			<div class="ornament-grid">
				<?php foreach ($previewItems as $item): ?>
					<?php
						$capaOrnamento = !empty($item['imagem_principal'])
							? str_replace(' ', '%20', $item['imagem_principal'])
							: '';
						$dimensoes = [];
						if (!empty($item['altura']))       $dimensoes[] = $item['altura'];
						if (!empty($item['largura']))      $dimensoes[] = $item['largura'];
						if (!empty($item['profundidade'])) $dimensoes[] = $item['profundidade'];
						$dimensaoTexto = !empty($dimensoes) ? implode('×', $dimensoes) . ' ' . ($item['unidade_medida'] ?? 'cm') : '';
					?>
					<a class="ornament-card" href="#">
						<div class="ornament-img" style="<?= $capaOrnamento ? "background-image:url('{$capaOrnamento}');background-size:cover;background-position:center;" : 'background:linear-gradient(135deg,#C07A1A,#1A4A8A);' ?>">
							<?php if (!$capaOrnamento): ?><i class="ti ti-diamond"></i><?php endif; ?>
						</div>
						<div class="ornament-body">
							<?php if (!empty($item['tipo'])): ?>
								<span class="ornament-category"><?= htmlspecialchars($item['tipo']) ?></span>
							<?php endif; ?>
							<div class="ornament-title"><?= htmlspecialchars($item['titulo']) ?></div>
							<div class="ornament-meta">
								<?= htmlspecialchars($item['material'] ?? '') ?>
								<?= $dimensaoTexto ? ' · ' . htmlspecialchars($dimensaoTexto) : '' ?>
							</div>
							<?php if (!empty($item['disponivel_venda']) && !empty($item['preco'])): ?>
								<div class="ornament-price"><?= htmlspecialchars($item['moeda'] ?? 'Kz') ?> <?= number_format($item['preco'], 0, ',', '.') ?></div>
							<?php endif; ?>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		<?php break;

        // ─────────────────────────────
        case 'jogos':
        ?>
        <div class="game-grid">
            <?php foreach ($previewItems as $item): ?>
                <a class="game-card" href="<?= htmlspecialchars($item['url'] ?? '#') ?>">
                    <div class="game-cover" style="background:linear-gradient(135deg,#1D9E75,#534AB7);">
                        <i class="ti ti-device-gamepad-2"></i>
                    </div>
                    <div class="game-body">
                        <div class="game-title"><?= htmlspecialchars($item['titulo']) ?></div>
                        <?php if (!empty($item['plataformas']) && is_array($item['plataformas'])): ?>
                            <div class="game-platforms">
                                <?php foreach ($item['plataformas'] as $plat): ?>
                                    <span class="game-platform"><?= htmlspecialchars($plat) ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($item['papel'])): ?>
                            <div class="game-roles"><span class="game-role"><?= htmlspecialchars($item['papel']) ?></span></div>
                        <?php endif; ?>
                        <div class="game-year"><?= htmlspecialchars($item['ano'] ?? '') ?></div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
        <?php break;

    endswitch; ?>
</div>
<?php endif; ?>