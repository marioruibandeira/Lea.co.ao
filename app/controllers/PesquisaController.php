<?php

class PesquisaController extends Controller {

    private PesquisaDAO $pesquisaDAO;
	private HomeDAO $homeDAO;
	
    public function __construct() {
        $this->pesquisaDAO = new PesquisaDAO();
		$this->homeDAO = new HomeDAO();
    }

    public function index(): void {
		$termo      = trim($_GET['q'] ?? '');
		$resultados = [];
		$totais     = ['total' => 0, 'artistas' => 0, 'noticias' => 0, 'musicas' => 0, 'videos' => 0];
		$temMais    = false;
		$matchExacto = null;

		if (!empty($termo)) {
			$resultados = $this->pesquisaDAO->pesquisar($termo, 1);
			$totais     = $this->pesquisaDAO->getTotalResultados($termo);
			$temMais    = $totais['total'] > count($resultados);
			$matchExacto = $this->pesquisaDAO->getMatchExacto($termo);
			
			$getArtistasRecemAdicionados = $this->homeDAO->getArtistasRecemAdicionados();
		}

		$this->render('pesquisa/index', [
			'termo'      => $termo,
			'resultados' => $resultados,
			'totais'     => $totais,
			'temMais'    => $temMais,
			'matchExacto'  => $matchExacto,
			'seoTitulo'  => !empty($termo) ? 'Pesquisa: ' . $termo . ' — LEA' : 'Pesquisa — LEA',
			'seoRobots'  => 'noindex, follow',
			'ogType'     => 'website',
			'cssExtra'   => ['/assets/css/paginas/pesquisa.css'],
			
			'artistasRecemAdicionados' => $getArtistasRecemAdicionados,
		]);
	}
	
	public function mais(): void {
		$termo   = trim($_GET['q'] ?? '');
		$pagina  = (int)($_GET['pagina'] ?? 2);

		if (empty($termo)) {
			header('Content-Type: application/json');
			echo json_encode([]);
			return;
		}

		$resultados = $this->pesquisaDAO->pesquisar($termo, $pagina);

		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($resultados);
	}
}