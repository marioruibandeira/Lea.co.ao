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
}