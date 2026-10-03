<?php
					function dataValida($valor): bool {
						return !empty($valor) 
							&& $valor !== '0000-00-00' 
							&& $valor !== '0000' 
							&& strtotime($valor) !== false;
					}

					$temNomeCivil = !empty($artista['nomeV']);
					$temDataNasc  = dataValida($artista['dataNac'] ?? null);
					$temObito     = dataValida($artista['obito'] ?? null);

					$anoNascComparar = $temDataNasc ? date('Y', strtotime($artista['dataNac'])) : null;
					$anoRegComparar  = !empty($artista['anoreg']) ? date('Y', strtotime($artista['anoreg'])) : null;
					$dataNascDesconhecida = $anoNascComparar !== null && $anoNascComparar === $anoRegComparar;

					if ($temDataNasc && $temObito) {
						$anoNasc     = date('Y', strtotime($artista['dataNac']));
						$anoObito    = date('Y', strtotime($artista['obito']));
						$idade       = (new DateTime($artista['dataNac']))->diff(new DateTime($artista['obito']))->y;
						$idadeLinha  = "$anoNasc — $anoObito ($idade)";
					} elseif ($temDataNasc && !$dataNascDesconhecida) {
						$dataNascFmt = date('d/m/Y', strtotime($artista['dataNac']));
						$idade       = (new DateTime())->diff(new DateTime($artista['dataNac']))->y;
						$idadeLinha  = "$dataNascFmt ($idade)";
					} else {
						$idadeLinha = null;
					}

					$dataLeaFmt = dataValida($artista['anoreg'] ?? null) ? date('d/m/Y', strtotime($artista['anoreg'])) : null;
				?>
				<?php
					function normalizarTexto(string $texto): string {
						$texto = mb_strtolower(trim($texto));
						$texto = strtr($texto, [
							'á'=>'a','à'=>'a','â'=>'a','ã'=>'a',
							'é'=>'e','ê'=>'e',
							'í'=>'i',
							'ó'=>'o','ô'=>'o','õ'=>'o',
							'ú'=>'u','ü'=>'u',
							'ç'=>'c',
						]);
						return $texto;
					}

					$estadosCivisValidos = ['solteiro', 'solteira', 'casado', 'casada', 'divorciado', 'divorciada', 'viuvo', 'viuva', 'desconhecido', 'desconhecida'];

					$statuValor    = trim($artista['statu'] ?? '');
					$statuNorm     = normalizarTexto($statuValor);
					$ehEstadoCivil = in_array($statuNorm, $estadosCivisValidos, true);
					$rotuloStatu   = $ehEstadoCivil ? 'Estado Civil' : 'Designação';
				?>

				<div class="pinfo-toggle-wrap">
					<button class="pinfo-toggle" id="btnTogglePInfo">
						<i class="ti ti-id-badge-2"></i>
						<span>Dados pessoais</span>
						<i class="ti ti-chevron-up pinfo-chevron"></i> 
					</button>
				</div>

				<div class="pinfo-card" id="pinfoCard">
					<div class="pinfo-header">
						<div class="pinfo-name"><?= htmlspecialchars($artista['nomeA']) ?></div>
						<div class="pinfo-prof"><?= htmlspecialchars($artista['prof'] ?? '') ?></div>
					</div>
					<div class="pinfo-body">
						<?php if ($temNomeCivil): ?>
						<div class="pinfo-row">
							<span class="pinfo-label">Nome</span>
							<span class="pinfo-value"><?= htmlspecialchars($artista['nomeV']) ?></span>
						</div>
						<?php endif; ?>
						<?php if ($idadeLinha): ?>
						<div class="pinfo-row">
							<span class="pinfo-label"><?= $temObito ? 'Vida' : 'Idade' ?></span>
							<span class="pinfo-value"><?= $idadeLinha ?></span>
						</div>
						<?php endif; ?>
						<?php if (!empty($artista['provincia'])): ?>
						<div class="pinfo-row">
							<span class="pinfo-label">Naturalidade</span>
							<span class="pinfo-value"><?= htmlspecialchars($artista['provincia']) ?></span>
						</div>
						<?php endif; ?>
						<?php if (!empty($statuValor)): ?>
						<div class="pinfo-row">
							<span class="pinfo-label"><?= $rotuloStatu ?></span>
							<span class="pinfo-value"><?= htmlspecialchars($statuValor) ?></span>
						</div>
						<?php endif; ?>
						<?php if ($dataLeaFmt): ?>
						<div class="pinfo-row">
							<span class="pinfo-label">Na LEA desde</span>
							<span class="pinfo-value"><?= $dataLeaFmt ?></span>
						</div>
						<?php endif; ?>
					</div>
				</div>