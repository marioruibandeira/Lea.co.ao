<?php
/**
 * COMPONENTE: Barra "Perfil em PDF" (serviço premium) — TEMPLATE
 * CSS: /assets/css/componentes/perfil-pdf-btn.css
 *
 * Uso (na página do artista, acima da linha dos botões):
 *
 *   require_once __DIR__ . '/perfil-pdf-btn.php';
 *   $pdfAtivo = true;   // TODO: mais tarde = é o dono do perfil E tem plano premium
 *   renderPerfilPdfBtn($artista, $pdfAtivo);
 *
 * Com $ativo = false não desenha nada (é assim que o serviço fica escondido
 * de quem não pagou). O destino do clique ainda não existe: por defeito aponta
 * para /artista/pdf/{id}, e pode ser mudado no terceiro parâmetro.
 */

if (!function_exists('renderPerfilPdfBtn')) {

    function renderPerfilPdfBtn(array $artista, bool $ativo = true, ?string $url = null): void
    {
        if (!$ativo) {
            return;
        }

        $url = $url ?: '/artista/pdf/' . (int) $artista['artID'];
        ?>
        <div class="pdf-barra">
            <div class="pdf-barra-info">
                <i class="ti ti-file-type-pdf"></i>
                <div>
                    <strong>Perfil em PDF</strong>
                    <span>O teu currículo artístico, pronto para enviar a quem te quer contratar</span>
                </div>
            </div>
            <a class="btn-pdf" href="<?= htmlspecialchars($url) ?>" target="_blank" rel="noopener"
               data-artista-id="<?= (int) $artista['artID'] ?>">
                <i class="ti ti-crown"></i> Gerar PDF <span class="btn-pdf-pro">PRO</span>
            </a>
        </div>
        <?php
    }
}