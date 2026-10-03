<?php

class ArtistasController extends Controller {
	
	private ArtistasDAO $artistasDAO;

    public function __construct() {
        $this->artistasDAO = new ArtistasDAO();
    }

    public function artistas(): void
	{
		$termo     = trim($_GET['q'] ?? '');
		$provincia = trim($_GET['provincia'] ?? '');
		$letra     = trim($_GET['letra'] ?? '');
		$ordenar   = $_GET['ordenar'] ?? 'visitas';

		$pagina    = max(1, (int)($_GET['pagina'] ?? 1));
		$porPagina = 24;
		$offset    = ($pagina - 1) * $porPagina;

		$maisVisitados = $this->artistasDAO->getMaisVisitados();
		$osMaisVisitados = $this->artistasDAO->getMaisVisitados(6);
		$maisPesquisados = $this->artistasDAO->getMaisPesquisados();
		$maisSeguidos = $this->artistasDAO->getMaisSeguidos();
		$maisCurtidos = $this->artistasDAO->getMaisCurtidos();

		$resultadosPesquisa = [];
		if (!empty($termo)) {
			$resultadosPesquisa = $this->artistasDAO->pesquisar($termo);
		}

		$total        = $this->artistasDAO->contarTodos($provincia);
		$provincias   = $this->artistasDAO->getProvinciasComContagem();
		$artistas     = $this->artistasDAO->getTodos($porPagina, $offset, $provincia, $letra);
		$totalPaginas = (int) ceil($total / $porPagina);
		$totalGeral   = $total;
		
		$artistaDestaque = $this->artistasDAO->getArtistaAleatorio();
		
		$jaSegueDestaque = false;
		if ($artistaDestaque) {
			include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/login/Login.php');
			$login = new Login();
			$logado = $_COOKIE['user_logged'] ?? null;

			if ($logado && $login->VerificarSessionID($logado) === 1) {
				$utilizadorId = (int) $login->VerificarUserAccount_($logado);
				include_once __DIR__ . '/../dao/ArtistaDAO.php'; // ajusta o caminho conforme a tua estrutura
				$artistaDAO = new ArtistaDAO();
				$jaSegueDestaque = $artistaDAO->jaSegue((int) $artistaDestaque['artID'], $utilizadorId);
			}
		}

		$categorias = [
			'musica'        => ['nome' => 'Música',            'icon' => 'ti-music',              'cor' => '#1D9E75'],
			'danca'         => ['nome' => 'Dança',              'icon' => 'ti-wave-sine',          'cor' => '#534AB7'],
			'pintura'       => ['nome' => 'Pintura',            'icon' => 'ti-palette',            'cor' => '#C07A1A'],
			'escultura'     => ['nome' => 'Escultura',          'icon' => 'ti-camera',             'cor' => '#3B7DD8'],
			'teatro'        => ['nome' => 'Teatro',             'icon' => 'ti-masks-theater',      'cor' => '#9D174D'],
			'literatura'    => ['nome' => 'Literatura',         'icon' => 'ti-book',               'cor' => '#2563B0'],
			'cinema'        => ['nome' => 'Cinema',             'icon' => 'ti-movie',              'cor' => '#1A4A8A'],
			'fotografia'    => ['nome' => 'Fotografia',         'icon' => 'ti-camera',             'cor' => '#374151'],
			'quadrinhos'    => ['nome' => 'Banda Desenhada',    'icon' => 'ti-book-2',             'cor' => '#534AB7'],
			'videojogos'    => ['nome' => 'Vídeo Games',        'icon' => 'ti-device-gamepad-2',   'cor' => '#1D9E75'],
			'arte-digital'  => ['nome' => 'Arte digital',       'icon' => 'ti-palette',            'cor' => '#3B7DD8'],
		];

		$contagemPorNome = $this->artistasDAO->getContagemPorCategoria();

		$categoriasSidebar = [];
		foreach ($categorias as $slug => $info) {
			$categoriasSidebar[] = [
				'slug'  => $slug,
				'nome'  => $info['nome'],
				'icon'  => $info['icon'],
				'total' => $contagemPorNome[$info['nome']] ?? 0,
			];
		}
		
		$getArtistasRecemAdicionados = $this->artistasDAO->getArtistasRecemAdicionados();

		$this->render('artistas/artistas', [
			'maisVisitados'      => $maisVisitados,
			'osMaisVisitados'    => $osMaisVisitados,
			'maisPesquisados'    => $maisPesquisados,
			'maisSeguidos'       => $maisSeguidos,
			'maisCurtidos'       => $maisCurtidos,
			'termo'              => $termo,
			'resultadosPesquisa' => $resultadosPesquisa,
			'provincia'          => $provincia,
			'total'              => $total,
			'totalGeral'         => $totalGeral,
			'provincias'         => $provincias,
			'letra'              => $letra,
			'pagina'             => $pagina,
			'totalPaginas'       => $totalPaginas,
			'artistas'           => $artistas,
			'categoriasSidebar'  => $categoriasSidebar,
			'ordenar'            => $ordenar,
			'artistaDestaque' => $artistaDestaque,
			'jaSegueDestaque' => $jaSegueDestaque,
			'artistasRecemAdicionados' => $getArtistasRecemAdicionados,
			'seoTitulo'          => 'Artes em Angola — LEA Plataforma Angolana de Artes',
			'seoDescricao'       => 'Descobre as categorias artísticas e os artistas registados na LEA, a maior plataforma dedicada às artes em Angola.',
			'seoKeywords'        => 'artes angola, artistas angolanos, música, teatro, literatura, pintura, lea',
			'seoImagem'          => 'https://lea.co.ao/assets/img/og-default.jpg',
			'seoCanonical'       => 'https://lea.co.ao/artes',
			'ogType'             => 'website',
			'cssExtra'           => ['/assets/css/paginas/artistas.css'],
		]);
	}
	
	public function categoria(): void
	{
		$categoriaSlug = $_GET['categoria_slug'] ?? '';
		$provincia     = trim($_GET['provincia'] ?? '');
		$ordenar       = $_GET['ordenar'] ?? 'visitas';
		$letra         = trim($_GET['letra'] ?? '');

		$categorias = [
			'musica'        => ['nome' => 'Música',            'icon' => 'ti-music',              'cor' => '#1D9E75'],
			'danca'         => ['nome' => 'Dança',              'icon' => 'ti-wave-sine',          'cor' => '#534AB7'],
			'pintura'       => ['nome' => 'Pintura',            'icon' => 'ti-palette',            'cor' => '#C07A1A'],
			'escultura'     => ['nome' => 'Escultura',          'icon' => 'ti-camera',             'cor' => '#3B7DD8'],
			'teatro'        => ['nome' => 'Teatro',             'icon' => 'ti-masks-theater',      'cor' => '#9D174D'],
			'literatura'    => ['nome' => 'Literatura',         'icon' => 'ti-book',               'cor' => '#2563B0'],
			'cinema'        => ['nome' => 'Cinema',             'icon' => 'ti-movie',              'cor' => '#1A4A8A'],
			'fotografia'    => ['nome' => 'Fotografia',         'icon' => 'ti-camera',             'cor' => '#374151'],
			'quadrinhos'    => ['nome' => 'Banda Desenhada',    'icon' => 'ti-book-2',             'cor' => '#534AB7'],
			'videojogos'    => ['nome' => 'Vídeo Games',        'icon' => 'ti-device-gamepad-2',   'cor' => '#1D9E75'],
			'arte-digital'  => ['nome' => 'Arte digital',       'icon' => 'ti-palette',            'cor' => '#3B7DD8'],
		];

		if (!isset($categorias[$categoriaSlug])) {
			$this->load('ErrorController', 'notFound');
			return;
		}

		$info          = $categorias[$categoriaSlug];
		$categoriaNome = $info['nome'];

		$pagina    = max(1, (int)($_GET['pagina'] ?? 1));
		$porPagina = 20;
		$offset    = ($pagina - 1) * $porPagina;

		$artistas     = $this->artistasDAO->getPorCategoria($categoriaNome, $porPagina, $offset, $provincia, $ordenar, $letra);
		$total        = $this->artistasDAO->contarPorCategoria($categoriaNome, $provincia, $letra);
		$totalPaginas = (int) ceil($total / $porPagina);
		$provincias   = $this->artistasDAO->getProvinciasPorCategoria($categoriaNome);

		$this->render('artistas/categoria', [
			'artistas'      => $artistas,
			'categoriaSlug' => $categoriaSlug,
			'categoriaNome' => $categoriaNome,
			'info'          => $info,
			'total'         => $total,
			'pagina'        => $pagina,
			'totalPaginas'  => $totalPaginas,
			'provincia'     => $provincia,
			'ordenar'       => $ordenar,
			'letra'         => $letra,
			'provincias'    => $provincias,
			'seoTitulo'     => "Artistas de {$categoriaNome} — LEA Plataforma Angolana de Artes",
			'seoDescricao'  => "Descobre os artistas angolanos de {$categoriaNome} registados na LEA.",
			'seoKeywords'   => "artistas {$categoriaNome}, artes angola, lea",
			'seoImagem'     => 'https://lea.co.ao/assets/img/og-default.jpg',
			'seoCanonical'  => "https://lea.co.ao/artistas/{$categoriaSlug}",
			'ogType'        => 'website',
			'cssExtra'      => ['/assets/css/paginas/artistas.css'],
		]);
	}
	
	public function aniversarios(): void
	{
		$artistas = $this->artistasDAO->getAniversariantes(15);

		// Agrupar por "offset de dias" em relação a hoje
		$hoje = new DateTime('today');
		$grupos = []; // [0 => [...hoje...], 1 => [...ontem...], ...]

		foreach ($artistas as $a) {
			$nasc = DateTime::createFromFormat('Y-m-d', $a['dataNac']);
			$esteAno = new DateTime($hoje->format('Y') . '-' . $nasc->format('m-d'));
			if ($esteAno > $hoje) {
				$esteAno->modify('-1 year'); // caso o mês/dia já tenha passado no calendário deste ano vs ano passado (wrap)
			}
			$diff = (int) $hoje->diff($esteAno)->format('%a');
			$a['idade'] = $hoje->format('Y') - $nasc->format('Y');
			$grupos[$diff][] = $a;
		}
		ksort($grupos);

		$this->render('artistas/aniversarios', [
			'grupos'       => $grupos,
			'hoje'         => $hoje,
			'seoTitulo'    => 'Aniversariantes — LEA Plataforma Angolana de Artes',
			'seoDescricao' => 'Artistas angolanos que fazem anos hoje e nos últimos dias.',
			'seoCanonical' => 'https://lea.co.ao/artistas/aniversarios',
			'cssExtra'     => ['/assets/css/paginas/artistas.css'],
		]);
	}

	public function obituario(): void
	{
		$pagina    = max(1, (int)($_GET['pagina'] ?? 1));
		$porPagina = 20;
		$offset    = ($pagina - 1) * $porPagina;

		$obituarioHoje = $this->artistasDAO->getObituarioHoje();
		$artistas      = $this->artistasDAO->getObituario($porPagina, $offset);
		$total         = $this->artistasDAO->contarObituario();
		$totalPaginas  = (int) ceil($total / $porPagina);

		$this->render('artistas/obituario', [
			'obituarioHoje' => $obituarioHoje,
			'artistas'      => $artistas,
			'total'         => $total,
			'pagina'        => $pagina,
			'totalPaginas'  => $totalPaginas,
			'seoTitulo'     => 'Em Memória — LEA Plataforma Angolana de Artes',
			'seoDescricao'  => 'Homenagem aos artistas angolanos que já partiram.',
			'seoCanonical'  => 'https://lea.co.ao/artistas/obituario',
			'cssExtra'      => ['/assets/css/paginas/artistas.css'],
		]);
	}
}