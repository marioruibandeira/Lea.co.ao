<?php
/**
 * COMPONENTE: Contratar artista (botão + modal)  — TEMPLATE
 * CSS: /assets/css/componentes/contratar-artista.css
 * JS:  /assets/js/contratar-artista.js
 *
 * Uso na página (duas partes):
 *
 *   1) O botão, onde está o "Dados pessoais":
 *        require_once __DIR__ . '/partials/contratar-artista.php';
 *        renderContratarBtn($artista);
 *
 *   2) O modal, UMA vez, perto do fim da página (por exemplo junto ao modal de login):
 *        renderContratarModal();
 *
 * O botão leva o id e o nome do artista; o modal (único) usa-os ao abrir.
 */

if (!function_exists('renderContratarBtn')) {

    function renderContratarBtn(array $artista, string $texto = 'Contrata este artista', string $classe = 'btn-contratar'): void
    {
        ?>
        <button type="button" class="<?= htmlspecialchars($classe) ?> js-contratar-abrir"
                data-artista-id="<?= (int) $artista['artID'] ?>"
                data-artista-nome="<?= htmlspecialchars($artista['nomeA']) ?>">
            <i class="ti ti-briefcase"></i> <?= htmlspecialchars($texto) ?>
        </button>
        <?php
    }
}

if (!function_exists('renderContratarModal')) {

    function renderContratarModal(): void
    {
        ?>
        <div class="contratar-overlay" id="contratarOverlay" aria-hidden="true">
            <div class="contratar-modal" role="dialog" aria-modal="true" aria-labelledby="contratarTitulo">
                <button type="button" class="contratar-close" id="contratarClose" aria-label="Fechar"><i class="ti ti-x"></i></button>

                <!-- Formulário -->
                <div id="contratarFormView">
                    <div class="contratar-header">
                        <div class="contratar-icon"><i class="ti ti-briefcase"></i></div>
                        <div>
                            <h3 id="contratarTitulo">Contratar <span id="contratarNome">este artista</span></h3>
                            <p>Conta-nos sobre o teu evento e entramos em contacto contigo.</p>
                        </div>
                    </div>

                    <form id="contratarForm">
                        <input type="hidden" name="artista_id" id="contratarArtistaId" value="">

                        <div class="contratar-field">
                            <label for="cNome">Nome completo *</label>
                            <input type="text" id="cNome" name="nome" required maxlength="100" autocomplete="name">
                        </div>

                        <div class="contratar-row">
                            <div class="contratar-field">
                                <label for="cEmail">Email *</label>
                                <input type="email" id="cEmail" name="email" required maxlength="120" autocomplete="email">
                            </div>
                            <div class="contratar-field">
                                <label for="cTelefone">Telefone / WhatsApp *</label>
                                <input type="tel" id="cTelefone" name="telefone" required maxlength="25" autocomplete="tel" placeholder="+244 ...">
                            </div>
                        </div>

                        <div class="contratar-row">
                            <div class="contratar-field">
                                <label for="cTipo">Tipo de evento *</label>
                                <select id="cTipo" name="tipo_evento" required>
                                    <option value="">Seleciona…</option>
                                    <option>Casamento</option>
                                    <option>Aniversário</option>
                                    <option>Evento corporativo</option>
                                    <option>Concerto / Festival</option>
                                    <option>Festa privada</option>
                                    <option>Gravação / Colaboração</option>
                                    <option>Outro</option>
                                </select>
                            </div>
                            <div class="contratar-field">
                                <label for="cData">Data prevista</label>
                                <input type="date" id="cData" name="data_evento">
                            </div>
                        </div>

                        <div class="contratar-row">
                            <div class="contratar-field">
                                <label for="cLocal">Local (cidade / província)</label>
                                <input type="text" id="cLocal" name="local_evento" maxlength="100">
                            </div>
                            <div class="contratar-field">
                                <label for="cOrcamento">Orçamento (Kz)</label>
                                <input type="number" id="cOrcamento" name="orcamento" min="0" step="1000" placeholder="Opcional">
                            </div>
                        </div>

                        <div class="contratar-field">
                            <label for="cMensagem">Mensagem</label>
                            <textarea id="cMensagem" name="mensagem" rows="3" maxlength="600" placeholder="Detalhes do evento, duração, número de convidados…"></textarea>
                        </div>

                        <label class="contratar-check">
                            <input type="checkbox" name="consentimento" required>
                            <span>Aceito que os meus dados sejam usados para contactar o artista e responder a este pedido.</span>
                        </label>

                        <div class="contratar-erro" id="contratarErro" hidden></div>

                        <button type="submit" class="contratar-submit" id="contratarSubmit">
                            <i class="ti ti-send"></i> Enviar pedido
                        </button>
                    </form>
                </div>

                <!-- Confirmação -->
                <div id="contratarOkView" class="contratar-ok" hidden>
                    <div class="contratar-ok-icon"><i class="ti ti-check"></i></div>
                    <h3>Pedido enviado!</h3>
                    <p>Recebemos o teu pedido e entraremos em contacto em breve.</p>
                    <button type="button" class="contratar-submit js-contratar-fechar">Fechar</button>
                </div>
            </div>
        </div>
        <?php
    }
}