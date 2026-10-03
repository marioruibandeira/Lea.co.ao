<?php

class ArtistaController extends Controller {
	
	private ArtistaDAO $artistaDAO;
	private artistasDAO $artistasDAO;

    public function __construct() {
        $this->artistaDAO = new ArtistaDAO();
		$this->artistasDAO = new ArtistasDAO();
    }

    public function artista(): void
	{
		$this->render('artistas/artista', [

			'seoTitulo'          => 'Artes em Angola — LEA Plataforma Angolana de Artes',
			'seoDescricao'       => 'Descobre as categorias artísticas e os artistas registados na LEA, a maior plataforma dedicada às artes em Angola.',
			'seoKeywords'        => 'artes angola, artistas angolanos, música, teatro, literatura, pintura, lea',
			'seoImagem'          => 'https://lea.co.ao/assets/img/og-default.jpg',
			'seoCanonical'       => 'https://lea.co.ao/artes',
			'ogType'             => 'website',
			'cssExtra'           => ['/assets/css/paginas/artista.css'],
		]);
	}
	
	public function seguir(): void
	{
		header('Content-Type: application/json');

		include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/login/Login.php');
		$login = new Login();

		$logado = $_COOKIE['user_logged'] ?? null;

		if (!$logado || $login->VerificarSessionID($logado) !== 1) {
			echo json_encode(['logado' => false]);
			return;
		}

		$utilizadorId = (int) $login->VerificarUserAccount_($logado);
		$artistaId    = (int) ($_POST['artista_id'] ?? 0);

		if ($artistaId <= 0) {
			http_response_code(400);
			echo json_encode(['erro' => 'artista_id inválido']);
			return;
		}

		if ($this->artistaDAO->jaSegue($artistaId, $utilizadorId)) {
			$fans = $this->artistaDAO->deixarDeSeguir($artistaId, $utilizadorId);
			echo json_encode(['logado' => true, 'aSeguir' => false, 'fans' => $fans]);
		} else {
			$fans = $this->artistaDAO->seguir($artistaId, $utilizadorId);
			echo json_encode(['logado' => true, 'aSeguir' => true, 'fans' => $fans]);
		}
	}
	
	public function curtir(): void
	{
		header('Content-Type: application/json');

		include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/login/Login.php');
		$login = new Login();

		$logado = $_COOKIE['user_logged'] ?? null;

		if (!$logado || $login->VerificarSessionID($logado) !== 1) {
			echo json_encode(['logado' => false]);
			return;
		}

		$utilizadorId = (int) $login->VerificarUserAccount_($logado);
		$artistaId    = (int) ($_POST['artista_id'] ?? 0);

		if ($artistaId <= 0) {
			http_response_code(400);
			echo json_encode(['erro' => 'artista_id inválido']);
			return;
		}

		if ($this->artistaDAO->jaCurtiu($artistaId, $utilizadorId)) {
			$gostei = $this->artistaDAO->descurtir($artistaId, $utilizadorId);
			echo json_encode(['logado' => true, 'aCurtir' => false, 'gostei' => $gostei]);
		} else {
			$gostei = $this->artistaDAO->curtir($artistaId, $utilizadorId);
			echo json_encode(['logado' => true, 'aCurtir' => true, 'gostei' => $gostei]);
		}
	}
	
	public function faixasAlbum(): void
	{
		header('Content-Type: application/json');

		$discoId = (int) ($_GET['disco_id'] ?? 0);

		if ($discoId <= 0) {
			http_response_code(400);
			echo json_encode(['erro' => 'disco_id inválido']);
			return;
		}

		$disco = $this->artistaDAO->getDiscoInfo($discoId);

		if (!$disco) {
			http_response_code(404);
			echo json_encode(['erro' => 'álbum não encontrado']);
			return;
		}

		$artista = $this->artistaDAO->getById((int) $disco['fk_artID']);
		$faixas  = $this->artistaDAO->getFaixasAlbum($discoId);

		echo json_encode([
			'disco' => [
				'nome' => $disco['d_nome'],
				'capa' => $disco['d_capa'],
			],
			'artista' => [
				'nome' => $artista['nomeA'] ?? '',
			],
			'faixas' => $faixas,
		]);
	}
	
	public function perfil(): void {
		$id = (int)($_GET['id'] ?? 0);

		if ($id <= 0) {
			$this->redirect('/artistas');
			return;
		}

		$artista = $this->artistaDAO->getById($id);

		if (!$artista) {
			$this->redirect('/artistas');
			return;
		}
		
		$totalPesquisas = $this->artistaDAO->getTotalPesquisas($id);
		
		$totalMusicas = $this->artistaDAO->getTotalMusicas($id);
		$totalVideos  = $this->artistaDAO->getTotalVideos($id);
		
		$catId = $artista['ce_categoria_artista'] ?? 0;
		$statExtra = match((int)$catId) {
			1       => ['label' => 'Músicas', 'total' => $totalMusicas],
			2       => ['label' => 'Vídeos',  'total' => $totalVideos],
			7       => ['label' => 'Filmes',  'total' => $totalVideos],
			default => null,
		};
		
		$jaSegueDestaque = false;
		$jaCurtiuDestaque = false;
		if ($artista) {
			include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/login/Login.php');
			$login = new Login();
			$logado = $_COOKIE['user_logged'] ?? null;

			if ($logado && $login->VerificarSessionID($logado) === 1) {
				$utilizadorId = (int) $login->VerificarUserAccount_($logado);
				$jaSegueDestaque  = $this->artistaDAO->jaSegue((int) $artista['artID'], $utilizadorId);
				$jaCurtiuDestaque = $this->artistaDAO->jaCurtiu((int) $artista['artID'], $utilizadorId);
			}
		}

		// ── Controle de abas: só mostrar categorias que o artista realmente tem ──
		$temBio     = !empty(trim($artista['bio'] ?? ''));
		$temMusicas = $this->artistaDAO->temConteudo('musicapromocional', 'fk_artid', $artista['artID']);

		// Letras precisa de query própria (filtro extra: letraExiste = 1)
		$letras    = $this->artistaDAO->getLetras((int) $artista['artID']);
		$temLetras = !empty($letras);
		
		// Vídeos (categoria 1 = Vídeo Musical)
		$videosMusicais = $this->artistaDAO->getVideosMusicais((int) $artista['artID']);
		$temVideos = !empty($videosMusicais);
		
		// Vídeos Filmes (categoria 2)
		$videosFilmes = $this->artistaDAO->getFilmes((int) $artista['artID']);
		$temFilmes = !empty($videosFilmes);
		
		$series = $this->artistaDAO->getSeries((int) $artista['artID']);
		$temSeries = !empty($series);

		$documentarios = $this->artistaDAO->getDocumentarios((int) $artista['artID']);
		$temDocumentarios = !empty($documentarios);

		$novelas = $this->artistaDAO->getNovelas((int) $artista['artID']);
		$temNovelas = !empty($novelas);

		$publicidades = $this->artistaDAO->getPublicidades((int) $artista['artID']);
		$temPublicidades = !empty($publicidades);
		
		$albuns = $this->artistaDAO->getAlbuns((int) $artista['artID']);
		$temAlbuns = !empty($albuns);
		
		$participacoes = $this->artistaDAO->getParticipacoes((int) $artista['artID']);
		$temParticipacoes = !empty($participacoes);
		
		$livros = $this->artistaDAO->getLivros((int) $artista['artID']);
		$temLivros = !empty($livros);
		
		$poemas = $this->artistaDAO->getPoemas((int) $artista['artID']);
		$temPoemas = !empty($poemas);
		
		$dizeres = $this->artistaDAO->getDizeres((int) $artista['artID']);
		$temDizeres = !empty($dizeres);
		
		$premios = $this->artistaDAO->getPremios((int) $artista['artID']);
		$temPremios = !empty($premios);
		
		$noticias = $this->artistaDAO->getNoticiasDoArtista((int) $artista['artID']);
		$temImprensa = !empty($noticias);
		
		$agenda = $this->artistaDAO->getAgendaDoArtista((int) $artista['artID']);
		$temAgenda = !empty($agenda);
		
		$fotoAlbum = $this->artistaDAO->getFotoAlbumDoArtista((int) $artista['artID']);
		$temFotoAlbum = !empty($fotoAlbum);
		
		$videojogos = $this->artistaDAO->getVideojogosDoArtista((int) $artista['artID']);
		$temVideojogos = !empty($videojogos);
		
		$artesPlasticas = $this->artistaDAO->getArtesPlasticasDoArtista((int) $artista['artID']);
		$temArtesPlasticas = !empty($artesPlasticas);
		
		$ornamentos = $this->artistaDAO->getOrnamentos((int) $artista['artID']);
		$temOrnamentos = !empty($ornamentos);
		
		$referencias = $this->artistaDAO->getReferencias((int) $artista['artID']);

		// Junta os "tem conteúdo" já calculados — vai crescendo à medida que
		// confirmarmos mais tabelas (livros, quadros, filmes, poemas, ornamentos, jogos...)
		$abasComConteudo = [
			'musicas'       => $temMusicas,
			'letras'        => $temLetras,
			'videos'        => $temVideos,
			'filmes'        => $temFilmes,
			'series'        => $temSeries,
			'documentarios' => $temDocumentarios,
			'novelas'       => $temNovelas,
			'publicidades'  => $temPublicidades,
			'temAlbuns'  	=> $temAlbuns,
			'participacoes' => $temParticipacoes,
			'livros'     	=> $temLivros,    
			'poemas'     	=> $temPoemas,
			'dizeres'       => $temDizeres,
			'premios'       => $temPremios,
			'imprensa'      => $temImprensa,
			'agenda'      	=> $temAgenda,
			'quadros'    	=> $temArtesPlasticas,    
			'ornamentos' 	=> $temOrnamentos, 
			'jogos'      	=> $temVideojogos,      
		];

		// ── Categoria de preview a mostrar dentro da Biografia ──
		$ordemPrioridade = [
			'musicas', 'videos', 'livros', 'quadros', 
			'filmes', 'series', 'documentarios', 'novelas', 'publicidades',
			'poemas', 'ornamentos', 'jogos','noticia','agenda'
		];

		$categoriaPreview = null;
		foreach ($ordemPrioridade as $cat) {
			if (!empty($abasComConteudo[$cat])) {
				$categoriaPreview = $cat;
				break;
			}
		}

		$titulosPreview = [
			'musicas'       => 'Músicas populares',
			'videos'        => 'Videoclipes',
			'livros'        => 'Livros',
			'quadros'       => 'Quadros',
			'filmes'        => 'Filmes',
			'series'        => 'Séries',
			'documentarios' => 'Documentários',
			'novelas'       => 'Novelas',
			'publicidades'  => 'Publicidades',
			'poemas'        => 'Poemas',
			'ornamentos'    => 'Ornamentos',
			'jogos'         => 'Jogos eletrónicos',
			'agenda'         => 'Eventos'
		];

		$previewItems = [];
		if ($categoriaPreview === 'musicas') {
			$previewItems = $this->artistaDAO->getMusicasPreview((int) $artista['artID'], 3);
		} elseif ($categoriaPreview === 'videos') {
			$previewItems = $this->artistaDAO->getVideosPorCategoria((int) $artista['artID'], 1, 3);
		} elseif ($categoriaPreview === 'filmes') {
			$previewItems = $this->artistaDAO->getVideosCategoria((int) $artista['artID'], 2, 3);
		} elseif ($categoriaPreview === 'series') {
			$previewItems = $this->artistaDAO->getVideosCategoria((int) $artista['artID'], 3, 3);
		} elseif ($categoriaPreview === 'documentarios') {
			$previewItems = $this->artistaDAO->getVideosCategoria((int) $artista['artID'], 4, 3);
		} elseif ($categoriaPreview === 'novelas') {
			$previewItems = $this->artistaDAO->getVideosCategoria((int) $artista['artID'], 5, 3);
		} elseif ($categoriaPreview === 'publicidades') {
			$previewItems = $this->artistaDAO->getVideosPorCategoria((int) $artista['artID'], 6, 3);
		} elseif ($categoriaPreview === 'livros') {
			$previewItems = $this->artistaDAO->getLivros((int) $artista['artID'], 3);
		} elseif ($categoriaPreview === 'poemas') {
			$previewItems = $this->artistaDAO->getPoemas((int) $artista['artID'], 3);
		} elseif ($categoriaPreview === 'dizeres') {
			$previewItems = $this->artistaDAO->getDizeres((int) $artista['artID'], 3);
		}elseif ($categoriaPreview === 'noticia') {
			$previewItems = $this->artistaDAO->getNoticiasDoArtista((int) $artista['artID'], 3);
		} elseif ($categoriaPreview === 'ornamentos') {
			$previewItems = $this->artistaDAO->getOrnamentos((int) $artista['artID'], 3);
		}

		$ranking = $this->artistaDAO->getRankingVisitas((int)($artista['visua'] ?? 0));

		$musicas = $temMusicas ? $this->artistaDAO->getMusicas((int) $artista['artID']) : [];

		$this->render('artistas/artista', [
			'artista'      			=> $artista,
			'totalPesquisas'      	=> $totalPesquisas,
			'statExtra' 			=> $statExtra,
			'ranking' 				=> $ranking,
			'jaSegueDestaque'       => $jaSegueDestaque,
			'jaCurtiuDestaque'      => $jaCurtiuDestaque,
			'temBio' 				=> $temBio,
			'temMusicas' 			=> $temMusicas,
			'abasComConteudo'       => $abasComConteudo,
			'categoriaPreview'      => $categoriaPreview,
			'titulosPreview'        => $titulosPreview,
			'previewItems'          => $previewItems,
			'musicas' 				=> $musicas,
			'letras'                => $letras,
			'temLetras'             => $temLetras,
			'temVideos'      		=> $temVideos,
			'videosMusicais' 		=> $videosMusicais,
			'temFilmes'      		=> $temFilmes,
			'videosFilmes' 			=> $videosFilmes,
			'temSeries'        		=> $temSeries,
			'series'           		=> $series,
			'temDocumentarios' 		=> $temDocumentarios,
			'documentarios'    		=> $documentarios,
			'temNovelas'       		=> $temNovelas,
			'novelas'          		=> $novelas,
			'temPublicidades'  		=> $temPublicidades,
			'publicidades'     		=> $publicidades,
			'temAlbuns'  			=> $temAlbuns,
			'albuns'     			=> $albuns,
			'temParticipacoes' 		=> $temParticipacoes,
			'participacoes'    		=> $participacoes,
			'temLivros' 			=> $temLivros,
			'livros'    			=> $livros,
			'temPoemas' 			=> $temPoemas,
			'poemas'    			=> $poemas,
			'temDizeres' 			=> $temDizeres,
			'dizeres'    			=> $dizeres,
			'temPremios' 			=> $temPremios,
			'premios'    			=> $premios,
			'temImprensa' 			=> $temImprensa,
			'noticias'    			=> $noticias,
			'temAgenda' 			=> $temAgenda,
			'agenda'    			=> $agenda,
			'temFotoAlbum' 			=> $temFotoAlbum,
			'fotoAlbum'    			=> $fotoAlbum,
			'temVideojogos' 		=> $temVideojogos,
			'videojogos'    		=> $videojogos,
			'temArtesPlasticas' 	=> $temArtesPlasticas,
			'artesPlasticas'    	=> $artesPlasticas,
			'temOrnamentos' 		=> $temOrnamentos,
			'ornamentos'    		=> $ornamentos,
			'referencias' 			=> $referencias,
			'seoTitulo'    			=> htmlspecialchars($artista['nomeA']) . ' — LEA Angola',
			'seoDescricao' 			=> htmlspecialchars($artista['descricao'] ?? $artista['bio'] ?? ''),
			'seoKeywords'  			=> htmlspecialchars($artista['palavras_chave'] ?? ''),
			'seoImagem'    			=> 'https://lea.co.ao' . trim(str_replace(['https://www.lea.co.ao','http://www.lea.co.ao'], '', $artista['art_img_url'] ?? '')),
			'seoCanonical' 			=> 'https://lea.co.ao' . Helper::artistaUrl($artista),
			'ogType'       			=> 'profile',
			'cssExtra'     			=> ['/assets/css/paginas/artista.css'],
		]);
	}
}