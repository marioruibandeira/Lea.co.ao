<div id="tab-premios" style="display:none;">
    <section class="awards-section">

        <div class="sec-hdr">
            <h2>Prémios e distinções</h2>
        </div>

        <div class="award-timeline">
            <?php foreach ($premios as $p): ?>
                <div class="award-item">
                    <div class="award-marker"><i class="ti ti-award"></i></div>
                    <div class="award-content">
                        <div class="award-title"><?= htmlspecialchars($p['premiacao']) ?></div>
                        <?php if (!empty($p['organicao'])): ?>
                            <div class="award-entity"><?= htmlspecialchars($p['organicao']) ?></div>
                        <?php endif; ?>
                        <div class="award-year"><?= htmlspecialchars($p['ano']) ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>

<!--
<div id="tab-premios" style="display:none;">
		<section class="awards-section">

		  <div class="sec-hdr">
			<h2>Prémios e distinções</h2>
		  </div>

		  <div class="award-timeline">

			<!-- Prémio 1 
			<div class="award-item">
			  <div class="award-marker award-marker-won"><i class="ti ti-trophy"></i></div>
			  <div class="award-content">
				<span class="award-status award-status-won">Vencedor</span>
				<div class="award-title">Melhor Artista Kizomba</div>
				<div class="award-entity">AMAs Angola — Angola Music Awards</div>
				<div class="award-year">2023</div>
			  </div>
			</div>

			<!-- Prémio 2 
			<div class="award-item">
			  <div class="award-marker"><i class="ti ti-medal"></i></div>
			  <div class="award-content">
				<span class="award-status award-status-nominee">Nomeado</span>
				<div class="award-title">Artista do Ano</div>
				<div class="award-entity">Prémios Marca Angola</div>
				<div class="award-year">2022</div>
			  </div>
			</div>

			<!-- Prémio 3 
			<div class="award-item">
			  <div class="award-marker award-marker-won"><i class="ti ti-trophy"></i></div>
			  <div class="award-content">
				<span class="award-status award-status-won">Vencedor</span>
				<div class="award-title">Revelação do Ano</div>
				<div class="award-entity">Prémios Marca Angola</div>
				<div class="award-year">2019</div>
			  </div>
			</div>

			<!-- Prémio 4 
			<div class="award-item">
			  <div class="award-marker"><i class="ti ti-medal"></i></div>
			  <div class="award-content">
				<span class="award-status award-status-nominee">Nomeado</span>
				<div class="award-title">Melhor Videoclipe — "Eu Sou Assim"</div>
				<div class="award-entity">Trace Awards Africa</div>
				<div class="award-year">2024</div>
			  </div>
			</div>

		  </div>
		</section>
	  </div>
	  -->