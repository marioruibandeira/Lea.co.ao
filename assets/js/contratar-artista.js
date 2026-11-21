/* =============================================
   COMPONENTE: Contratar artista — comportamento
   Incluir UMA vez por página (de preferência no layout, com defer).
   Funciona com qualquer número de botões .js-contratar-abrir.
   ============================================= */
(function () {
    const overlay = document.getElementById('contratarOverlay');
    if (!overlay) return;

    const form      = document.getElementById('contratarForm');
    const formView  = document.getElementById('contratarFormView');
    const okView    = document.getElementById('contratarOkView');
    const nomeEl    = document.getElementById('contratarNome');
    const idInput   = document.getElementById('contratarArtistaId');
    const dataInput = document.getElementById('cData');
    const submitBtn = document.getElementById('contratarSubmit');
    const erroEl    = document.getElementById('contratarErro');
    let ultimoFoco  = null;

    function abrir(btn) {
        ultimoFoco = btn;
        idInput.value = btn.dataset.artistaId || '';
        nomeEl.textContent = btn.dataset.artistaNome || 'este artista';

        // não permite datas no passado
        dataInput.min = new Date().toISOString().split('T')[0];

        overlay.classList.add('active');
        overlay.setAttribute('aria-hidden', 'false');
        document.body.classList.add('contratar-aberto');
        document.getElementById('cNome').focus();
    }

    function fechar() {
        overlay.classList.remove('active');
        overlay.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('contratar-aberto');

        // repõe o estado inicial
        form.reset();
        formView.hidden = false;
        okView.hidden = true;
        erroEl.hidden = true;
        submitBtn.disabled = false;

        if (ultimoFoco) ultimoFoco.focus();
    }

    document.addEventListener('click', function (e) {
        const abrirBtn = e.target.closest('.js-contratar-abrir');
        if (abrirBtn) {
            abrir(abrirBtn);
            return;
        }
        if (e.target.closest('#contratarClose, .js-contratar-fechar') || e.target === overlay) {
            fechar();
        }
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && overlay.classList.contains('active')) fechar();
    });

    form.addEventListener('submit', async function (e) {
        e.preventDefault();
        if (!form.reportValidity()) return;

        erroEl.hidden = true;
        submitBtn.disabled = true;

        try {
            const dados = new URLSearchParams(new FormData(form));

            /* TODO (backend): quando existir o endpoint, descomentar este bloco
               e apagar a simulação a seguir.

            const res  = await fetch('/artista/contratar', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: dados,
            });
            const json = await res.json();
            if (!json.ok) throw new Error(json.erro || 'Não foi possível enviar o pedido.');
            */

            // SIMULAÇÃO (template): ainda não envia nada para o servidor
            console.log('Pedido de contratação (template):', Object.fromEntries(dados));
            await new Promise(function (r) { setTimeout(r, 600); });

            formView.hidden = true;
            okView.hidden = false;
        } catch (err) {
            erroEl.textContent = err.message || 'Ocorreu um erro. Tenta novamente.';
            erroEl.hidden = false;
        } finally {
            submitBtn.disabled = false;
        }
    });
})();