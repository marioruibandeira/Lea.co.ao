<div id="tab-galeria" class="m-top" style="display:none;">
	<div class="sec-hdr">
		<h2>Galeria de fotos</h2>
	</div>
	<div class="gallery-grid">
		<?php foreach ($fotoAlbum as $f): ?>
		<div class="gallery-item">
            <img src="<?= htmlspecialchars($f['img_foto_album']) ?>" alt="" onerror="this.style.display='none'">
            <div class="gi-placeholder" style="background:linear-gradient(135deg,#2563B0,#1D9E75);"><i class="ti ti-photo"></i></div>
            <div class="gi-overlay"><i class="ti ti-zoom-in"></i></div>
		</div>
		<?php endforeach; ?>
	</div>
</div>