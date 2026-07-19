<?php

class ArtesController extends Controller {
	
	private ArtesDAO $artesDAO;

    public function __construct() {
        $this->artesDAO = new ArtesDAO();
    }

    public function artes(): void
	{
		$totalArtistaRegistado = $this->artesDAO->getTotalArtistasRegistados();
		$categorias = $this->artesDAO->getAllCategorias();

		// Buscar artistas destaque para cada categoria
		$artistasPorCategoria = [];
		foreach ($categorias as $cat) {
			$artistasPorCategoria[$cat['id_categoria_artista']] = $this->artesDAO->getArtistasDestaquePorCategoria($cat['id_categoria_artista'], 4);
		}

		$this->render('artes/artes', [
			'totalArtistaRegistado'  => $totalArtistaRegistado,
			'categorias'             => $categorias,
			'artistasPorCategoria'   => $artistasPorCategoria,
			'seoTitulo'              => 'Artes em Angola — LEA Plataforma Angolana de Artes',
			'seoDescricao'           => 'Descobre as categorias artísticas e os artistas registados na LEA, a maior plataforma dedicada às artes em Angola.',
			'seoKeywords'            => 'artes angola, artistas angolanos, música, teatro, literatura, pintura, lea',
			'seoImagem'              => 'https://lea.co.ao/assets/img/og-default.jpg',
			'seoCanonical'           => 'https://lea.co.ao/artes',
			'ogType'                 => 'website',
			'cssExtra'               => ['/assets/css/paginas/artes.css'],
		]);
	}
	
	public function categoria(): void
	{
		$idCategoria = (int)($_GET['idCategoria'] ?? 0);

		if ($idCategoria <= 0) {
			http_response_code(400);
			header('Content-Type: application/json');
			echo json_encode(['erro' => 'Categoria inválida']);
			return;
		}

		$categoria = $this->artesDAO->getCategoriaArtisticaById($idCategoria);

		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($categoria);
	}
}