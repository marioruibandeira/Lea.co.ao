<div id="tab-imprensa" style="display:none;">
	<section class="press-section">

		<div class="sec-hdr">
			<h2>Artigos</h2>
			<a class="sec-more" href="#">Ver todos →</a>
		</div>

		<div class="press-list">
			<?php foreach ($noticias as $n): ?>
				<!-- Artigo 1 -->
				<a class="press-row" href="#" target="_blank" rel="noopener">
					<span class="press-type press-type-noticia"><?= htmlspecialchars($n['categoria_noticias']) ?></span>
					<div class="press-info">
						<div class="press-source"><?= htmlspecialchars($n['fontes']) ?></div>
						<div class="press-title"><?= htmlspecialchars($n['tema']) ?></div>
						<div class="press-date"><?= htmlspecialchars($n['data_hora']) ?></div>
					</div>
					<i class="ti ti-external-link press-ext"></i>
				</a>
			<?php endforeach; ?>
		</div>
	</section>
</div>