<?php
/**
 * COMPONENTE: Card de conteúdo patrocinado (estilo notícia)
 * CSS: /assets/css/componentes/patrocinado-card.css
 *
 * Uso:
 *   require_once __DIR__ . '/partials/patrocinado-card.php';
 *   renderPatrocinado([
 *       'titulo'       => 'Plano Ilimitado por Kz 3.500/mês',
 *       'texto'        => 'Ligação rápida em todo o país.',
 *       'imagem'       => '/images/patrocinados/unitel.jpg',
 *       'url'          => 'https://unitel.ao',
 *       'patrocinador' => 'Unitel',
 *       'cta'          => 'Ver oferta',          // opcional
 *       'extras'       => [                      // opcional, até 2 itens menores
 *           ['titulo' => 'Conta jovem sem comissões', 'imagem' => '...', 'url' => '...', 'patrocinador' => 'BAI'],
 *           ['titulo' => 'Entrega grátis em Luanda',  'imagem' => '...', 'url' => '...', 'patrocinador' => 'Kero'],
 *       ],
 *   ]);
 *
 * Layouts: 'h' = horizontal (conteúdo principal, por defeito)
 *          'v' = vertical (sidebar)
 */
if (!function_exists('renderPatrocinado')) {

    function renderPatrocinado(array $p, string $layout = 'h'): void
    {
        $titulo = trim($p['titulo'] ?? '');
        if ($titulo === '') {
            return;
        }

        $layout       = ($layout === 'v') ? 'v' : 'h';
        $texto        = trim($p['texto'] ?? '');
        $url          = trim($p['url'] ?? '') ?: '#';
        $patrocinador = trim($p['patrocinador'] ?? '');
        $cta          = trim($p['cta'] ?? '') ?: 'Saber mais';

        $limparImg = fn($i) => str_replace(' ', '%20', trim(str_replace(['https://www.lea.co.ao', 'http://www.lea.co.ao'], '', $i ?? '')));

        $imagem   = $limparImg($p['imagem'] ?? '');
        $iniciais = strtoupper(mb_substr($patrocinador !== '' ? $patrocinador : $titulo, 0, 2));

        // Itens menores (máximo 2, só os que tiverem título)
        $extras = array_slice(
            array_values(array_filter($p['extras'] ?? [], fn($e) => trim($e['titulo'] ?? '') !== '')),
            0,
            2
        );

        // Gradientes do fundo (fixos por patrocinador, nunca vêm de dados externos)
        $gradientes = [
            'linear-gradient(135deg,#F59E0B,#DC2626)',
            'linear-gradient(135deg,#2563B0,#7C3AED)',
            'linear-gradient(135deg,#059669,#2563B0)',
            'linear-gradient(135deg,#9D174D,#C07A1A)',
        ];
        $fundo = $gradientes[abs(crc32($patrocinador . $titulo)) % count($gradientes)];
        ?>
        <div class="spons-card spons-<?= $layout ?>">

            <a class="spons-main" href="<?= htmlspecialchars($url) ?>" target="_blank" rel="sponsored noopener">
                <div class="spons-img" style="background:<?= $fundo ?>;">
                    <span class="spons-initials"><?= htmlspecialchars($iniciais) ?></span>
                    <?php if ($imagem !== ''): ?>
                        <img src="<?= htmlspecialchars($imagem) ?>" alt="" onerror="this.style.display='none'">
                    <?php endif; ?>
                    <span class="spons-tag"><i class="ti ti-speakerphone"></i> Patrocinado</span>
                </div>
                <div class="spons-body">
                    <?php if ($patrocinador !== ''): ?>
                        <div class="spons-brand">Oferecido por <strong><?= htmlspecialchars($patrocinador) ?></strong></div>
                    <?php endif; ?>
                    <div class="spons-title"><?= htmlspecialchars($titulo) ?></div>
                    <?php if ($texto !== ''): ?>
                        <div class="spons-text"><?= htmlspecialchars($texto) ?></div>
                    <?php endif; ?>
                    <span class="spons-cta"><?= htmlspecialchars($cta) ?> <i class="ti ti-arrow-right"></i></span>
                </div>
            </a>

            <?php if ($extras): ?>
                <div class="spons-extras">
                    <?php foreach ($extras as $e):
                        $eTitulo = trim($e['titulo']);
                        $eUrl    = trim($e['url'] ?? '') ?: '#';
                        $eMarca  = trim($e['patrocinador'] ?? '');
                        $eImg    = $limparImg($e['imagem'] ?? '');
                        $eIni    = strtoupper(mb_substr($eMarca !== '' ? $eMarca : $eTitulo, 0, 2));
                        $eFundo  = $gradientes[abs(crc32($eMarca . $eTitulo)) % count($gradientes)];
                    ?>
                        <a class="spons-mini" href="<?= htmlspecialchars($eUrl) ?>" target="_blank" rel="sponsored noopener">
                            <div class="spons-mini-img" style="background:<?= $eFundo ?>;">
                                <span class="spons-mini-initials"><?= htmlspecialchars($eIni) ?></span>
                                <?php if ($eImg !== ''): ?>
                                    <img src="<?= htmlspecialchars($eImg) ?>" alt="" onerror="this.style.display='none'">
                                <?php endif; ?>
                            </div>
                            <div class="spons-mini-info">
                                <?php if ($eMarca !== ''): ?>
                                    <div class="spons-mini-brand"><?= htmlspecialchars($eMarca) ?></div>
                                <?php endif; ?>
                                <div class="spons-mini-title"><?= htmlspecialchars($eTitulo) ?></div>
                            </div>
                            <i class="ti ti-chevron-right"></i>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>
        <?php
    }
}