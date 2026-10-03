<div id="tab-videos" class="m-top" style="display:none;">
    <div class="sec-hdr">
        <h2>Videoclipes</h2>
    </div>
    <div class="videos-grid">

        <?php foreach ($videosMusicais as $v): ?>
            <a class="video-card" href="https://lea.co.ao/videos/video.php?v=<?= (int) $v['id_videos'] ?>" target="_blank">
                <div class="vc-thumb">
					<?php if (!empty($v['imagem_video'])): ?>
						<img src="https://lea.co.ao<?= $v['imagem_video'] ?>" alt="<?= htmlspecialchars($v['titulo_video']) ?>">
					<?php endif; ?>
					<div class="vc-placeholder"><i class="ti ti-music"></i></div>
					<div class="vc-play-overlay"><i class="ti ti-player-play-filled"></i></div>
					<span class="vc-cat-badge">Clipe</span>
					<?php if (!empty($v['duracao'])): ?><span class="vc-duration"><?= htmlspecialchars($v['duracao']) ?></span><?php endif; ?>
				</div>
                <div class="vc-body">
                    <div class="vc-title"><?= htmlspecialchars($v['titulo_video']) ?></div>
                    <div class="vc-date"><?= htmlspecialchars($v['ano'] ?? '') ?></div>
                </div>
            </a>
        <?php endforeach; ?>

    </div>
</div>