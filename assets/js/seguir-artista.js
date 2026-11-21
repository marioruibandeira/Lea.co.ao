(function () {
    // ── Seguir / deixar de seguir ──
    document.addEventListener('click', async (e) => {
        const btn = e.target.closest('.js-seguir');
        if (!btn || btn.disabled) return;

        const artistaId = btn.dataset.artistaId;
        btn.disabled = true;

        try {
            const res = await fetch('/artista/seguir', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'artista_id=' + encodeURIComponent(artistaId),
            });
            const data = await res.json();

            if (!data.logado) {
                document.getElementById('loginNecessarioOverlay')?.classList.add('active');
                return;
            }

            // todos os botões deste artista
            document.querySelectorAll('.js-seguir[data-artista-id="' + artistaId + '"] .js-seguir-texto')
                .forEach(el => { el.textContent = data.aSeguir ? 'A seguir' : 'Seguir'; });

            // todos os contadores de seguidores deste artista
            document.querySelectorAll('[data-fans-artista="' + artistaId + '"]')
                .forEach(el => { el.textContent = Number(data.fans).toLocaleString('pt-BR'); });
        } catch (err) {
            console.error(err);
        } finally {
            btn.disabled = false;
        }
    });

    // ── Modal "inicia sessão" ──
    document.addEventListener('click', (e) => {
        const overlay = document.getElementById('loginNecessarioOverlay');
        if (!overlay) return;
        if (e.target.closest('#loginNecessarioClose') || e.target === overlay) {
            overlay.classList.remove('active');
        }
    });
})();