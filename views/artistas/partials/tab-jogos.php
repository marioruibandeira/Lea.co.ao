<div id="tab-jogos" style="display:none;">
	<section class="games-section">

		<div class="sec-hdr">
			<h2>Jogos eletrónicos</h2>
			<a class="sec-more" href="#">Ver todos →</a>
		</div>

		<div class="game-grid">
			<?php foreach ($videojogos as $v): ?>
			<a class="game-card" href="#">
				<div class="game-cover" style="background:linear-gradient(135deg,#1D9E75,#534AB7);">
					<i class="ti ti-device-gamepad-2"></i>
				</div>
				<div class="game-body">
					<div class="game-title"><?= htmlspecialchars($v['titulo']) ?></div>
					<div class="game-platforms">
						<span class="game-platform"><i class="ti ti-device-mobile"></i> Mobile</span>
						<span class="game-platform"><i class="ti ti-brand-windows"></i> PC</span>
					</div>
					<div class="game-roles">
						<span class="game-role">Compositor da trilha sonora</span>
					</div>
					<div class="game-year"><?= htmlspecialchars($v['ano_lancamento']) ?></div>
				</div>
			</a>
			<?php endforeach; ?>
		</div>
	</section>
</div>