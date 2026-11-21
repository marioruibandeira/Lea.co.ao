<?php

class ArtistasDAO
{
	private PDO $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }
	
	public function getMaisVisitados(int $limit = 4): array {
		$sql = "SELECT a.artID, a.nomeA, a.prof, a.art_img_url, a.visua,
					   p.provincia
				FROM artistas a
				LEFT JOIN provincia p ON p.id_provincia = a.ce_provincia
				WHERE a.visua > 0
				ORDER BY a.visua DESC
				LIMIT :limit";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}
	
	public function pesquisar(string $termo, int $limit = 20): array {
		$sql = "SELECT a.artID, a.nomeA, a.nomeV, a.prof, a.art_img_url, a.visua,
					   p.provincia, c.categoria_artista
				FROM artistas a
				LEFT JOIN provincia p ON p.id_provincia = a.ce_provincia
				LEFT JOIN categoriaartista c ON c.id_categoria_artista = a.ce_categoria_artista
				WHERE a.nomeA LIKE :termo
				OR a.nomeV LIKE :termo
				OR p.provincia LIKE :termo
				OR c.categoria_artista LIKE :termo
				OR a.prof LIKE :termo
				ORDER BY a.visua DESC
				LIMIT :limit";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':termo', '%' . $termo . '%');
		$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}
	
	// Aniversariantes: hoje + últimos 15 dias, excluindo dataNac placeholder (= data de registo)
	public function getAniversariantes(int $diasAtras = 15): array {
		$dias = [];
		for ($i = 0; $i <= $diasAtras; $i++) {
			$dias[] = date('m-d', strtotime("-$i days"));
		}
		$placeholders = implode(',', array_fill(0, count($dias), '?'));

		$sql = "SELECT a.artID, a.nomeA, a.prof, a.art_img_url, a.dataNac, a.visua, p.provincia
				FROM artistas a
				LEFT JOIN provincia p ON p.id_provincia = a.ce_provincia
				WHERE a.dataNac IS NOT NULL
				  AND a.dataNac <> '0000-00-00'
				  AND a.dataNac <> DATE(a.anoreg)
				  AND DATE_FORMAT(a.dataNac, '%m-%d') IN ($placeholders)
				ORDER BY a.visua DESC";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute($dias);
		return $stmt->fetchAll();
	}
	
	public function getObituarioHoje(): array {
		$sql = "SELECT a.artID, a.nomeA, a.prof, a.art_img_url, a.dataNac, a.obito, p.provincia
				FROM artistas a
				LEFT JOIN provincia p ON p.id_provincia = a.ce_provincia
				WHERE a.obito IS NOT NULL AND a.obito <> '0000-00-00'
				  AND DATE_FORMAT(a.obito, '%m-%d') = DATE_FORMAT(CURDATE(), '%m-%d')
				ORDER BY a.visua DESC";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	// Restantes (excluindo os já mostrados no destaque de hoje), paginados
	public function getObituario(int $limit = 20, int $offset = 0): array {
		$sql = "SELECT a.artID, a.nomeA, a.prof, a.art_img_url, a.dataNac, a.obito, p.provincia
				FROM artistas a
				LEFT JOIN provincia p ON p.id_provincia = a.ce_provincia
				WHERE a.obito IS NOT NULL AND a.obito <> '0000-00-00'
				  AND DATE_FORMAT(a.obito, '%m-%d') <> DATE_FORMAT(CURDATE(), '%m-%d')
				ORDER BY a.obito DESC
				LIMIT :limit OFFSET :offset";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
		$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function contarObituario(): int {
		$sql = "SELECT COUNT(*) FROM artistas 
				WHERE obito IS NOT NULL AND obito <> '0000-00-00'
				  AND DATE_FORMAT(obito, '%m-%d') <> DATE_FORMAT(CURDATE(), '%m-%d')";
		return (int) $this->conn->query($sql)->fetchColumn();
	}
	
	public function getProvinciasPorCategoria(string $categoriaNome): array {
		$sql = "SELECT p.id_provincia, p.provincia, COUNT(a.artID) AS total
				FROM provincia p
				INNER JOIN artistas a ON a.ce_provincia = p.id_provincia
				INNER JOIN categoriaartista c ON c.id_categoria_artista = a.ce_categoria_artista
				WHERE c.categoria = :categoria
				GROUP BY p.id_provincia, p.provincia
				HAVING total > 0
				ORDER BY total DESC";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':categoria', $categoriaNome);
		$stmt->execute();
		return $stmt->fetchAll();
	}
	
	public function getPorCategoria(string $categoriaNome, int $limit = 24, int $offset = 0, ?string $provincia = null, string $ordenar = 'visitas', ?string $letra = null): array {
		$where = "WHERE c.categoria = :categoria";
		$params = [':categoria' => $categoriaNome];

		if (!empty($provincia)) {
			$where .= " AND p.provincia = :provincia";
			$params[':provincia'] = $provincia;
		}
		if (!empty($letra)) {
			$where .= " AND a.nomeA LIKE :letra";
			$params[':letra'] = $letra . '%';
		}

		$orderBy = match ($ordenar) {
			'az'       => 'a.nomeA ASC',
			'recentes' => 'a.anoreg DESC',
			default    => 'a.visua DESC',
		};

		$sql = "SELECT a.artID, a.nomeA, a.nomeV, a.prof, a.art_img_url, a.visua,
					   p.provincia, c.categoria
				FROM artistas a
				LEFT JOIN provincia p ON p.id_provincia = a.ce_provincia
				LEFT JOIN categoriaartista c ON c.id_categoria_artista = a.ce_categoria_artista
				$where
				ORDER BY $orderBy
				LIMIT :limit OFFSET :offset";
		$stmt = $this->conn->prepare($sql);
		foreach ($params as $k => $v) $stmt->bindValue($k, $v);
		$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
		$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function contarPorCategoria(string $categoriaNome, ?string $provincia = null, ?string $letra = null): int {
		$where = "WHERE c.categoria = :categoria";
		$params = [':categoria' => $categoriaNome];

		if (!empty($provincia)) {
			$where .= " AND p.provincia = :provincia";
			$params[':provincia'] = $provincia;
		}
		if (!empty($letra)) {
			$where .= " AND a.nomeA LIKE :letra";
			$params[':letra'] = $letra . '%';
		}

		$sql = "SELECT COUNT(*) FROM artistas a
				LEFT JOIN provincia p ON p.id_provincia = a.ce_provincia
				LEFT JOIN categoriaartista c ON c.id_categoria_artista = a.ce_categoria_artista
				$where";
		$stmt = $this->conn->prepare($sql);
		foreach ($params as $k => $v) $stmt->bindValue($k, $v);
		$stmt->execute();
		return (int) $stmt->fetchColumn();
	}
	
	public function contarTodos(?string $provincia = null): int {
		$where = "WHERE 1=1";
		$params = [];
		if (!empty($provincia)) {
			$where .= " AND p.provincia = :provincia";
			$params[':provincia'] = $provincia;
		}
		$sql = "SELECT COUNT(*) FROM artistas a
				LEFT JOIN provincia p ON p.id_provincia = a.ce_provincia
				$where";
		$stmt = $this->conn->prepare($sql);
		foreach ($params as $k => $v) $stmt->bindValue($k, $v);
		$stmt->execute();
		return (int) $stmt->fetchColumn();
	}

	public function getProvinciasComContagem(): array {
		$sql = "SELECT p.id_provincia, p.provincia, COUNT(a.artID) AS total
				FROM provincia p
				INNER JOIN artistas a ON a.ce_provincia = p.id_provincia
				GROUP BY p.id_provincia, p.provincia
				HAVING total > 0
				ORDER BY total DESC";
		$stmt = $this->conn->query($sql);
		return $stmt->fetchAll();
	}
	
	public function getTodos(int $limit = 24, int $offset = 0, ?string $provincia = null, ?string $letra = null): array {
		$where = "WHERE 1=1";
		$params = [];

		if (!empty($provincia)) {
			$where .= " AND p.provincia = :provincia";
			$params[':provincia'] = $provincia;
		}
		if (!empty($letra)) {
			$where .= " AND a.nomeA LIKE :letra";
			$params[':letra'] = $letra . '%';
		}

		$sql = "SELECT a.artID, a.nomeA, a.prof, a.art_img_url, a.visua,
					   p.provincia, c.categoria
				FROM artistas a
				LEFT JOIN provincia p ON p.id_provincia = a.ce_provincia
				LEFT JOIN categoriaartista c ON c.id_categoria_artista = a.ce_categoria_artista
				$where
				ORDER BY a.visua DESC
				LIMIT :limit OFFSET :offset";
		$stmt = $this->conn->prepare($sql);
		foreach ($params as $k => $v) $stmt->bindValue($k, $v);
		$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
		$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}
	
	public function getContagemPorCategoria(): array {
		$sql = "SELECT c.categoria, COUNT(a.artID) AS total
				FROM categoriaartista c
				LEFT JOIN artistas a ON a.ce_categoria_artista = c.id_categoria_artista
				GROUP BY c.categoria";
		$stmt = $this->conn->query($sql);
		// Resultado: ['Música' => 320, 'Dança' => 45, ...]
		$out = [];
		foreach ($stmt->fetchAll() as $row) {
			$out[$row['categoria']] = (int) $row['total'];
		}
		return $out;
	}
	
	public function getArtistaAleatorio(): ?array {
		$sql = "SELECT a.artID, a.nomeA, a.prof, a.art_img_url, a.visua, a.fans, a.anoreg,
					   p.provincia, c.categoria
				FROM artistas a
				LEFT JOIN provincia p ON p.id_provincia = a.ce_provincia
				LEFT JOIN categoriaartista c ON c.id_categoria_artista = a.ce_categoria_artista
				ORDER BY RAND()
				LIMIT 1";
		$stmt = $this->conn->query($sql);
		$res = $stmt->fetch();
		return $res ?: null;
	}
	
	public function getArtistasRecemAdicionados(): array {
		$sql = "SELECT a.nomeA, a.prof, a.art_img_url, a.artID, a.anoreg, a.visua,
					   p.provincia
				FROM artistas a
				LEFT JOIN provincia p ON p.id_provincia = a.ce_provincia
				ORDER BY a.artID DESC 
				LIMIT :limite";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':limite', 12, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}
	
	public function getMaisPesquisados(int $limit = 6): array {
		$sql = "SELECT a.artID, a.nomeA, a.prof, a.art_img_url, a.visua,
					   p.provincia, COUNT(pe.id_pesquisa_encontrada) AS total_pesquisas
				FROM pesquisa_encontrada pe
				JOIN artistas a ON a.artID = pe.ce_artista
				LEFT JOIN provincia p ON p.id_provincia = a.ce_provincia
				GROUP BY pe.ce_artista, a.artID, a.nomeA, a.prof, a.art_img_url, a.visua, p.provincia
				ORDER BY total_pesquisas DESC
				LIMIT :limit";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}
	
	public function getMaisSeguidos(int $limit = 6): array {
		$sql = "SELECT a.artID, a.nomeA, a.prof, a.art_img_url, a.fans,
					   p.provincia
				FROM artistas a
				LEFT JOIN provincia p ON p.id_provincia = a.ce_provincia
				WHERE a.fans > 0
				ORDER BY a.fans DESC
				LIMIT :limit";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}
	
	public function getMaisCurtidos(int $limit = 6): array {
		$sql = "SELECT a.artID, a.nomeA, a.prof, a.art_img_url, a.gostei,
					   p.provincia
				FROM artistas a
				LEFT JOIN provincia p ON p.id_provincia = a.ce_provincia
				WHERE a.gostei > 0
				ORDER BY a.gostei DESC
				LIMIT :limit";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}
}