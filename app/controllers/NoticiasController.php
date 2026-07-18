<?php 

class NoticiasController extends Controller
{
	private NoticiasDAO $noticiasDAO;
	private HomeDAO $homeDAO;
	
	public function __construct() {
        $this->noticiasDAO = new NoticiasDAO();
		$this->homeDAO = new HomeDAO();
    }

    public function noticias(): void 
	{
		$ultimaNoticia = $this->noticiasDAO->getUltimaNoticia();
		$ultimasNoticias = $this->noticiasDAO->getUltimasNoticias($ultimaNoticia['id_noticias']);
		$noticiaDestaque = $this->noticiasDAO->getNoticiaEmDestaque();
		$uNArteCultura = $this->noticiasDAO->getUltimasNoticiasArteCultura($ultimaNoticia['id_noticias']);
		
		$idsExcluir = [
			$ultimaNoticia['id_noticias'],
			$uNArteCultura[0]['id_noticias'],
			$uNArteCultura[1]['id_noticias']
		];
		$uNArteCulturaContinuacao = $this->noticiasDAO->getUltimasNoticiasArteCulturaContinuacao($idsExcluir);
		$ultimasNoticiasPolitica = $this->noticiasDAO->getUltimasNoticiasPolitica($ultimaNoticia['id_noticias']);
		$ultimasNoticiasTecnologia = $this->noticiasDAO->getUltimasNoticiasTecnologia($ultimaNoticia['id_noticias']);
		$ultimasNoticiasEconomia = $this->noticiasDAO->getUltimasNoticiasEconomia($ultimaNoticia['id_noticias']);
		$ultimasNoticiasDesporto = $this->noticiasDAO->getUltimasNoticiasDesporto($ultimaNoticia['id_noticias']);
		$getEntrevistas = $this->noticiasDAO->getEntrevistas($ultimaNoticia['id_noticias']);
		$getNoticiasMaisLidas = $this->noticiasDAO->getNoticiasMaisLidas();
		
		$getArtistasRecemAdicionados = $this->homeDAO->getArtistasRecemAdicionados();
		
		$totalCategoria = $this->noticiasDAO->getTotalCategoria();
		
		//$paginaEntrevistas = isset($_GET['pag_e']) ? (int)$_GET['pag_e'] : 1;
		//$porPagina = 3;
		//$totalEntrevistas = $this->noticiasDAO->getTotalEntrevistas();
		//$totalPaginasEntrevistas = ceil($totalEntrevistas / $porPagina);
		//$getEntrevistas = $this->noticiasDAO->getEntrevistas($ultimaNoticia['id_noticias'], $paginaEntrevistas, $porPagina);
		
        $this->render('noticias/noticias', [
			'ultimaNoticia' => $ultimaNoticia,
			'ultimasNoticias' => $ultimasNoticias,
			'noticiaDestaque' => $noticiaDestaque,
			'uNArteCultura' => $uNArteCultura,
			'uNArteCulturaContinuacao' => $uNArteCulturaContinuacao,
			'ultimasNoticiasPolitica' => $ultimasNoticiasPolitica,			
			'ultimasNoticiasTecnologia' => $ultimasNoticiasTecnologia,
			'ultimasNoticiasEconomia' => $ultimasNoticiasEconomia,
			'ultimasNoticiasDesporto' => $ultimasNoticiasDesporto,
			'getEntrevistas' => $getEntrevistas,
			'noticiasMaisLidas' => $getNoticiasMaisLidas,
			
			'artistasRecemAdicionados' => $getArtistasRecemAdicionados,
			
			'totalCategoria' => $totalCategoria,
			
			//'getEntrevistas'           => $getEntrevistas,
			//'paginaEntrevistas'        => $paginaEntrevistas,
			//'totalPaginasEntrevistas'  => $totalPaginasEntrevistas,
			
			'seoTitulo'    => 'Notícias — LEA Angola',
			'seoDescricao' => 'As últimas notícias sobre cultura, arte, música, desporto, política e economia de Angola. Fique sempre informado com a LEA.',
			'seoKeywords'  => 'notícias angola, cultura angola, arte angola, música angola, desporto angola, política angola, economia angola',
			'seoImagem'    => 'https://lea.co.ao/assets/img/og-default.jpg',
			'seoCanonical' => 'https://lea.co.ao/noticias',
			'ogType'       => 'website',
			'cssExtra'     => ['/assets/css/paginas/noticias.css'],
		]);
    }
	
	public function leitura(): void {
		$id = (int)($_GET['id'] ?? 0);

		if ($id === 0) {
			$this->redirect('/noticias');
			return;
		}

		$noticia = $this->noticiasDAO->getNoticiaById($id);

		if (!$noticia) {
			$this->redirect('/noticias');
			return;
		}

		// Incrementar visualizações
		$this->noticiasDAO->incrementarVisualizacoes($id);

		$getNoticiasMaisLidas        = $this->noticiasDAO->getNoticiasMaisLidas();
		$getArtistasRecemAdicionados = $this->homeDAO->getArtistasRecemAdicionados();
		$noticiasRelacionadas        = $this->noticiasDAO->getNoticiasRelacionadas($noticia['tema'], $id);

		$this->render('noticias/leitura', [
			'noticia'                  => $noticia,
			'noticiasMaisLidas'        => $getNoticiasMaisLidas,
			'artistasRecemAdicionados' => $getArtistasRecemAdicionados,
			'noticiasRelacionadas'     => $noticiasRelacionadas,
			'seoTitulo'                => htmlspecialchars($noticia['tema']) . ' — LEA',
			'seoDescricao'             => htmlspecialchars($noticia['descricao'] ?? $noticia['breadcramble'] ?? ''),
			'seoKeywords'              => htmlspecialchars($noticia['keywords'] ?? ''),
			'seoImagem'                => 'https://lea.co.ao' . trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $noticia['foto'] ?? '')),
			'seoCanonical'             => 'https://lea.co.ao' . Helper::noticiaUrl($noticia),
			'ogType'                   => 'article',
			'jsonLd'                   => json_encode([
				'@context'         => 'https://schema.org',
				'@type'            => 'NewsArticle',
				'headline'         => $noticia['tema'],
				'description'      => $noticia['descricao'] ?? $noticia['breadcramble'] ?? '',
				'image'            => 'https://lea.co.ao' . trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $noticia['foto'] ?? '')),
				'datePublished'    => $noticia['data_hora'],
				'dateModified'     => $noticia['data_hora'],
				'author'           => ['@type' => 'Organization', 'name' => $noticia['fontes'] ?? 'LEA'],
				'publisher'        => [
					'@type' => 'Organization',
					'name'  => 'LEA — Plataforma Angolana de Artes',
					'logo'  => ['@type' => 'ImageObject', 'url' => 'https://lea.co.ao/assets/img/logo.png']
				],
				'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => 'https://lea.co.ao' . Helper::noticiaUrl($noticia)],
			], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
			
			'cssExtra' => [
				'/assets/css/paginas/noticias.css',
				'/assets/css/paginas/noticia-leitura.css'
			],
		]);
	}
	
	public function categoria(): void {
		$slug = $_GET['categoria_slug'] ?? '';

		$categoria = $this->noticiasDAO->getCategoriaIdBySlug($slug);

		if (!$categoria) {
			$this->redirect('/noticias');
			return;
		}

		$pagina    = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
		$porPagina = 10;

		$totalNoticias   = $this->noticiasDAO->getTotalNoticiasPorCategoria($categoria['id_categ_noticias']);
		$totalPaginas    = max(1, ceil($totalNoticias / $porPagina));
		$noticiaDestaque = $this->noticiasDAO->getNoticiaDestaquePorCategoria($categoria['id_categ_noticias']);
		$excludeId       = $noticiaDestaque['id_noticias'] ?? 0;
		$noticias        = $this->noticiasDAO->getNoticiasPorCategoria($categoria['id_categ_noticias'], $excludeId, $pagina, $porPagina);
		$tagsPopulares   = $this->noticiasDAO->getTagsPopulares($categoria['id_categ_noticias']);
		$maisLidas       = $this->noticiasDAO->getNoticiasMaisLidas();
		$novosArtistas   = $this->homeDAO->getArtistasRecemAdicionados();
		$outrasCategorias = $this->noticiasDAO->getTotalCategoria();

		$this->render('noticias/categoria', [
			'categoria'        => $categoria,
			'noticiaDestaque'  => $noticiaDestaque,
			'noticias'         => $noticias,
			'pagina'           => $pagina,
			'totalPaginas'     => $totalPaginas,
			'totalNoticias'    => $totalNoticias,
			'tagsPopulares'    => $tagsPopulares,
			'maisLidas'        => $maisLidas,
			'novosArtistas'    => $novosArtistas,
			'outrasCategorias' => $outrasCategorias,
			'seoTitulo'        => htmlspecialchars($categoria['categoria_noticias']) . ' — Notícias LEA Angola',
			'seoDescricao'     => 'As últimas notícias sobre ' . htmlspecialchars($categoria['categoria_noticias']) . ' em Angola.',
			'seoCanonical'     => 'https://lea.co.ao/noticias/categoria/' . $slug,
			'ogType'           => 'website',
			'cssExtra'         => [
				'/assets/css/paginas/noticias.css',
				'/assets/css/paginas/noticias-categoria.css'
			],
			'seoKeywords'  => htmlspecialchars($categoria['categoria_noticias']) . ', notícias angola, cultura angola, lea angola',
			'seoImagem'    => 'https://lea.co.ao/assets/img/og-default.jpg',
			'jsonLd'       => json_encode([
				'@context'    => 'https://schema.org',
				'@type'       => 'CollectionPage',
				'name'        => $categoria['categoria_noticias'] . ' — LEA Angola',
				'description' => 'As últimas notícias sobre ' . $categoria['categoria_noticias'] . ' em Angola.',
				'url'         => 'https://lea.co.ao/noticias/categoria/' . $slug,
				'publisher'   => [
					'@type' => 'Organization',
					'name'  => 'LEA — Plataforma Angolana de Artes',
					'logo'  => ['@type' => 'ImageObject', 'url' => 'https://lea.co.ao/assets/img/logo.png']
				],
			], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
		]);
	}
	
	public function tag(): void 
	{
		$tag = str_replace('-', ' ', $_GET['tag'] ?? '');

		if (empty($tag)) {
			$this->redirect('/noticias');
			return;
		}

		$pagina    = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
		$porPagina = 10;

		$totalNoticias = $this->noticiasDAO->getTotalNoticiasPorTag($tag);
		$totalPaginas  = max(1, ceil($totalNoticias / $porPagina));
		$noticias      = $this->noticiasDAO->getNoticiasPorTag($tag, $pagina, $porPagina);
		$maisLidas     = $this->noticiasDAO->getNoticiasMaisLidas();
		$novosArtistas = $this->homeDAO->getArtistasRecemAdicionados();
		$totalNoticias = $this->noticiasDAO->getTotalNoticiasPorTag($tag);		

		$this->render('noticias/tag', [
			'tag'           => $tag,
			'noticias'      => $noticias,
			'pagina'        => $pagina,
			'totalPaginas'  => $totalPaginas,
			'totalNoticias' => $totalNoticias,
			'maisLidas'     => $maisLidas,
			'novosArtistas' => $novosArtistas,
			'seoTitulo'     => '#' . $tag . ' — Notícias LEA Angola',
			'seoDescricao'  => 'Todas as notícias sobre ' . $tag . ' na LEA Angola.',
			'seoCanonical'  => 'https://lea.co.ao/noticias/tag/' . urlencode($tag),
			'ogType'        => 'website',
			'cssExtra'      => [
				'/assets/css/paginas/noticias.css',
				'/assets/css/paginas/noticias-categoria.css'
			],
			'seoKeywords'  => $tag . ', notícias angola, lea angola',
			'seoImagem'    => 'https://lea.co.ao/assets/img/og-default.jpg',
			'jsonLd'       => json_encode([
				'@context'    => 'https://schema.org',
				'@type'       => 'CollectionPage',
				'name'        => '#' . $tag . ' — LEA Angola',
				'description' => 'Todas as notícias sobre ' . $tag . ' na LEA Angola.',
				'url'         => 'https://lea.co.ao/noticias/tag/' . urlencode($tag),
				'publisher'   => [
					'@type' => 'Organization',
					'name'  => 'LEA — Plataforma Angolana de Artes',
					'logo'  => ['@type' => 'ImageObject', 'url' => 'https://lea.co.ao/assets/img/logo.png']
				],
			], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
		]);
	}
}