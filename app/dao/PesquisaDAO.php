<?php

class PesquisaDAO {
    private PDO $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function pesquisar(string $termo, int $pagina = 1, int $porPagina = 15): array {
		$offset = ($pagina - 1) * $porPagina;
		$limitePorTipo = (int) ceil($porPagina / 4);
		$resultados = [];

		// Artistas
		$sql = "SELECT 
					a.artID AS id,
					a.nomeA AS titulo,
					a.nomeV AS subtitulo,
					a.prof AS meta,
					a.art_img_url AS imagem,
					a.visua AS visualizacoes,
					p.provincia,
					c.categoria_artista AS categoria,
					'artista' AS tipo
				FROM artistas a
				LEFT JOIN provincia p ON p.id_provincia = a.ce_provincia
				LEFT JOIN categoriaartista c ON c.id_categoria_artista = a.ce_categoria_artista
				WHERE a.nomeA LIKE :termo
				OR a.nomeV LIKE :termo
				OR a.prof LIKE :termo
				OR p.provincia LIKE :termo
				LIMIT :limit OFFSET :offset";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':termo', '%' . $termo . '%');
		$stmt->bindValue(':limit', $limitePorTipo, PDO::PARAM_INT);
		$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
		$stmt->execute();
		$resultados = array_merge($resultados, $stmt->fetchAll());
		
		foreach ($stmt->fetchAll() as $artista) {
			$resultados[] = $artista;
			$this->registarPesquisaEncontrada($termo, $artista['id']);
		}

		// Notícias
		$sql = "SELECT 
					n.id_noticias AS id,
					n.tema AS titulo,
					n.breadcramble AS subtitulo,
					cn.categoria_noticias AS meta,
					n.foto AS imagem,
					n.visual AS visualizacoes,
					NULL AS provincia,
					cn.categoria_noticias AS categoria,
					'noticia' AS tipo
				FROM noticias n
				LEFT JOIN categorianoticias cn ON cn.id_categ_noticias = n.ce_categoria_noticia
				WHERE n.tema LIKE :termo
				OR n.breadcramble LIKE :termo
				OR n.keywords LIKE :termo
				LIMIT :limit OFFSET :offset";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':termo', '%' . $termo . '%');
		$stmt->bindValue(':limit', $limitePorTipo, PDO::PARAM_INT);
		$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
		$stmt->execute();
		$resultados = array_merge($resultados, $stmt->fetchAll());

		// Músicas
		$sql = "SELECT 
					m.idmusicapromo AS id,
					m.titulo AS titulo,
					a.nomeA AS subtitulo,
					m.ano AS meta,
					m.capa AS imagem,
					m.visualizacoes AS visualizacoes,
					NULL AS provincia,
					NULL AS categoria,
					'musica' AS tipo
				FROM musicapromocional m
				LEFT JOIN artistas a ON a.artID = m.fk_artid
				WHERE m.titulo LIKE :termo
				OR a.nomeA LIKE :termo
				OR m.keywords LIKE :termo
				LIMIT :limit OFFSET :offset";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':termo', '%' . $termo . '%');
		$stmt->bindValue(':limit', $limitePorTipo, PDO::PARAM_INT);
		$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
		$stmt->execute();
		$resultados = array_merge($resultados, $stmt->fetchAll());

		// Vídeos
		$sql = "SELECT 
					v.id_videos AS id,
					v.titulo_video AS titulo,
					a.nomeA AS subtitulo,
					cv.categoria_video AS meta,
					v.imagem_video AS imagem,
					v.video_vizualizacao AS visualizacoes,
					NULL AS provincia,
					cv.categoria_video AS categoria,
					'video' AS tipo, v.FK_artista AS artista
				FROM videos v
				LEFT JOIN artistas a ON a.artID = v.FK_artista
				LEFT JOIN categoriavideo cv ON cv.id_categoria_video = v.id_categoria_videos
				WHERE v.titulo_video LIKE :termo
				OR a.nomeA LIKE :termo
				OR v.keywords LIKE :termo
				LIMIT :limit OFFSET :offset";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':termo', '%' . $termo . '%');
		$stmt->bindValue(':limit', $limitePorTipo, PDO::PARAM_INT);
		$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
		$stmt->execute();
		$resultados = array_merge($resultados, $stmt->fetchAll());

		// Ordenar por visualizações
		usort($resultados, fn($a, $b) => ($b['visualizacoes'] ?? 0) <=> ($a['visualizacoes'] ?? 0));

		return $resultados;
	}

    public function getTotalResultados(string $termo): array {
        $totais = [];

        $queries = [
            'artistas' => "SELECT COUNT(*) FROM artistas a LEFT JOIN provincia p ON p.id_provincia = a.ce_provincia WHERE a.nomeA LIKE :termo OR a.nomeV LIKE :termo OR a.prof LIKE :termo OR p.provincia LIKE :termo",
            'noticias' => "SELECT COUNT(*) FROM noticias WHERE tema LIKE :termo OR breadcramble LIKE :termo OR keywords LIKE :termo",
            'musicas'  => "SELECT COUNT(*) FROM musicapromocional m LEFT JOIN artistas a ON a.artID = m.fk_artid WHERE m.titulo LIKE :termo OR a.nomeA LIKE :termo OR m.keywords LIKE :termo",
            'videos'   => "SELECT COUNT(*) FROM videos v LEFT JOIN artistas a ON a.artID = v.FK_artista WHERE v.titulo_video LIKE :termo OR a.nomeA LIKE :termo OR v.keywords LIKE :termo",
        ];

        foreach ($queries as $tipo => $sql) {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':termo', '%' . $termo . '%');
            $stmt->execute();
            $totais[$tipo] = (int) $stmt->fetchColumn();
        }

        $totais['total'] = array_sum($totais);
        return $totais;
    }
	
	public function getMatchExacto(string $termo): ?array {

		// Artista
		$sql = "SELECT a.artID AS id, a.nomeA AS titulo, a.nomeV AS subtitulo,
					   a.prof AS meta, a.art_img_url AS imagem, a.visua AS visualizacoes,
					   a.bio AS descricao, a.fans, a.gostei,
					   p.provincia, c.categoria_artista AS categoria,
					   'artista' AS tipo
				FROM artistas a
				LEFT JOIN provincia p ON p.id_provincia = a.ce_provincia
				LEFT JOIN categoriaartista c ON c.id_categoria_artista = a.ce_categoria_artista
				WHERE LOWER(a.nomeA) = LOWER(:termo)
				OR LOWER(a.nomeV) = LOWER(:termo)
				LIMIT 1";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':termo', $termo);
		$stmt->execute();
		$resultado = $stmt->fetch();
		if ($resultado) return $resultado;

		// Música
		$sql = "SELECT m.idmusicapromo AS id, m.titulo AS titulo, a.nomeA AS subtitulo,
					   m.ano AS meta, m.capa AS imagem, m.visualizacoes AS visualizacoes,
					   m.descricao AS descricao, NULL AS fans, NULL AS gostei,
					   NULL AS provincia, NULL AS categoria,
					   'musica' AS tipo
				FROM musicapromocional m
				LEFT JOIN artistas a ON a.artID = m.fk_artid
				WHERE LOWER(m.titulo) = LOWER(:termo)
				LIMIT 1";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':termo', $termo);
		$stmt->execute();
		$resultado = $stmt->fetch();
		if ($resultado) return $resultado;

		// Vídeo
		$sql = "SELECT v.id_videos AS id, v.titulo_video AS titulo, a.nomeA AS subtitulo,
					   cv.categoria_video AS meta, v.imagem_video AS imagem, 
					   v.video_vizualizacao AS visualizacoes, v.sinopse AS descricao,
					   NULL AS fans, NULL AS gostei,
					   NULL AS provincia, cv.categoria_video AS categoria,
					   'video' AS tipo, v.FK_artista AS artista
				FROM videos v
				LEFT JOIN artistas a ON a.artID = v.FK_artista
				LEFT JOIN categoriavideo cv ON cv.id_categoria_video = v.id_categoria_videos
				WHERE LOWER(v.titulo_video) = LOWER(:termo)
				LIMIT 1";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':termo', $termo);
		$stmt->execute();
		$resultado = $stmt->fetch();
		if ($resultado) return $resultado;

		return null;
	}
	
	public function registarPesquisaEncontrada(string $termo, int $artistaId): void {
		$sql = "INSERT INTO pesquisa_encontrada (pesquisa_encontrada, ce_artista, data_) 
				VALUES (:termo, :artista, NOW())";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':termo', $termo);
		$stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);
		$stmt->execute();
	}
}