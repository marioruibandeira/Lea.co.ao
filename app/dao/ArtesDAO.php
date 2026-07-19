<?php

class ArtesDAO
{
	private PDO $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }
	
	public function getTotalArtistasRegistados(): int
    {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM artistas");
        $stmt->execute();

        return (int) $stmt->fetchColumn();
    }
	
	public function getCategoriaArtisticaById(int $idCategoria): array
	{
		$sql = "SELECT
					ca.descricao,
					ca.id_categoria_artista,
					ca.categoria_artista,
					ca.categoria,
					COUNT(a.artID) AS total_artista
				FROM categoriaartista ca
				LEFT JOIN artistas a
					ON a.ce_categoria_artista = ca.id_categoria_artista
				WHERE ca.id_categoria_artista = :idCategoria
				GROUP BY
					ca.id_categoria_artista,
					ca.descricao,
					ca.categoria_artista,
					ca.categoria";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':idCategoria', $idCategoria, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public function getAllCategorias(): array {
		$sql = "SELECT
					ca.id_categoria_artista,
					ca.categoria_artista,
					ca.categoria,
					ca.descricao,
					COUNT(a.artID) AS total_artista
				FROM categoriaartista ca
				LEFT JOIN artistas a ON a.ce_categoria_artista = ca.id_categoria_artista
				GROUP BY ca.id_categoria_artista, ca.categoria_artista, ca.categoria, ca.descricao
				ORDER BY ca.id_categoria_artista ASC";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function getArtistasDestaquePorCategoria(int $catId, int $limit = 4): array {
		$sql = "SELECT artID, nomeA, art_img_url
				FROM artistas
				WHERE ce_categoria_artista = :cat
				AND art_img_url IS NOT NULL
				AND art_img_url != ''
				AND art_img_url != '/artistas/imgs/temporario.jpg'
				ORDER BY RAND()
				LIMIT :limit";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':cat', $catId, PDO::PARAM_INT);
		$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}
}