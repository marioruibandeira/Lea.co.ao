<div id="tab-filmes" class="m-top" style="display:none;">
	<section class="films-section m-top">

		<div class="sec-hdr">
			<h2>Filmes</h2>
			<a class="sec-more" href="#">Ver todos →</a>
		</div>

		<div class="film-grid">
			<?php foreach ($videosFilmes as $v): ?>
				<?php
					$capaFilme = !empty($v['imagem_video'])
						? 'https://lea.co.ao' . str_replace(' ', '%20', $v['imagem_video'])
						: '';
				?>
				<a class="film-card" href="#">
					<div class="film-poster" style="<?= $capaFilme ? "background-image:url('{$capaFilme}');background-size:cover;background-position:center;" : 'background:linear-gradient(135deg,#1F2937,#374151);' ?>">
						<?php if (!$capaFilme): ?>
							<i class="ti ti-movie"></i>
						<?php endif; ?>
						<span class="film-role-badge">Ator principal</span>
					</div>
					<div class="film-body">
						<div class="film-title"><?= htmlspecialchars($v['titulo_video']) ?></div>
						<div class="film-meta"><?= htmlspecialchars($v['ano']) ?> · <?= htmlspecialchars($v['genero_nome'] ?? '') ?> · <?= htmlspecialchars($v['duracao']) ?></div>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
	</section>
</div>