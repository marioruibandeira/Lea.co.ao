<?php

class NoticiasDAO
{
    private PDO $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }
	
	public function getUltimaNoticia(): ?array 
	{
		$sql = "SELECT 
					n.id_noticias, 
					n.tema, 
					n.breadcramble, 
					n.foto, 
					n.data_hora, 
					n.link_externo, 
					n.ce_categoria_noticia, 
					cn.categoria_noticias, 
					f.fontes, 
					n.conteudo
				FROM noticias n 
				JOIN categorianoticias cn ON cn.id_categ_noticias = n.ce_categoria_noticia 
				JOIN fontes f ON f.id_fonte = n.ce_fonte
				WHERE n.foto IS NOT NULL
				ORDER BY n.data_hora DESC
				LIMIT 1";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if (!$row) {
			return null;
		}

		// Calcula o tempo de leitura
		$row['tempo_leitura'] = $this->calcularTempoLeitura($row['conteudo']);

		return $row;
	}

	function calcularTempoLeitura(string $texto): int
	{
		$textoLimpo = strip_tags($texto);
		$totalPalavras = str_word_count($textoLimpo);
		return ceil($totalPalavras / 200); // 200 palavras/min
	}
	
	public function getUltimasNoticias(int $ultimaNoticia): array {
        $sql = "SELECT 
					n.id_noticias, 
					n.tema, 
					n.breadcramble, 
					n.foto, 
					n.data_hora, 
					n.link_externo, 
					n.ce_categoria_noticia, 
					cn.categoria_noticias, 
					f.fontes, 
					n.conteudo
				FROM noticias n 
				JOIN categorianoticias cn ON cn.id_categ_noticias = n.ce_categoria_noticia 
				JOIN fontes f ON f.id_fonte = n.ce_fonte
				WHERE n.foto IS NOT NULL AND n.id_noticias != :ultima 
				ORDER BY n.data_hora DESC
				LIMIT 6";

        $stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':ultima', $ultimaNoticia, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
	
	public function getNoticiaEmDestaque(): ?array 
	{
		$sql = "SELECT 
				n.id_noticias, 
				n.tema, 
				n.breadcramble, 
				n.foto, 
				n.data_hora, 
				n.link_externo, 
				n.ce_categoria_noticia, 
				cn.categoria_noticias, 
				f.fontes, 
				n.conteudo,
				n.visual
			FROM noticias n 
			JOIN categorianoticias cn ON cn.id_categ_noticias = n.ce_categoria_noticia 
			JOIN fontes f ON f.id_fonte = n.ce_fonte
			WHERE n.foto IS NOT NULL 
			  AND n.ce_categoria_noticia = 5
			ORDER BY RAND()
			LIMIT 1";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if (!$row) {
			return null;
		}

		// Calcula o tempo de leitura
		$row['tempo_leitura'] = $this->calcularTempoLeitura($row['conteudo']);

		return $row;
	}
	
	public function getUltimasNoticiasArteCultura(int $ultimaNoticia): array {
        $sql = "SELECT 
					n.id_noticias, 
					n.tema, 
					n.breadcramble, 
					n.foto, 
					n.data_hora, 
					n.link_externo, 
					n.ce_categoria_noticia, 
					cn.categoria_noticias, 
					f.fontes, 
					n.conteudo
				FROM noticias n 
				JOIN categorianoticias cn ON cn.id_categ_noticias = n.ce_categoria_noticia 
				JOIN fontes f ON f.id_fonte = n.ce_fonte
				WHERE n.foto IS NOT NULL AND n.ce_categoria_noticia = 5 AND n.id_noticias != :ultima
				ORDER BY n.data_hora DESC
				LIMIT 2";

        $stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':ultima', $ultimaNoticia, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
	
	public function getUltimasNoticiasArteCulturaContinuacao(array $idsExcluir): array 
	{
		// cria ?,?,? dinamicamente
		$placeholders = implode(',', array_fill(0, count($idsExcluir), '?'));

		$sql = "SELECT 
					n.id_noticias, 
					n.tema, 
					n.breadcramble, 
					n.foto, 
					n.data_hora, 
					n.link_externo, 
					n.ce_categoria_noticia, 
					cn.categoria_noticias, 
					f.fontes, 
					n.conteudo
				FROM noticias n 
				JOIN categorianoticias cn ON cn.id_categ_noticias = n.ce_categoria_noticia 
				JOIN fontes f ON f.id_fonte = n.ce_fonte
				WHERE n.foto IS NOT NULL
				  AND n.ce_categoria_noticia = 5
				  AND n.id_noticias NOT IN ($placeholders)
				ORDER BY n.data_hora DESC
				LIMIT 2";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute($idsExcluir);

		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

		foreach ($rows as &$row) {
			$row['tempo_leitura'] = $this->calcularTempoLeitura($row['conteudo']);
		}

		return $rows;
	}

	public function getUltimasNoticiasPolitica(int $ultimaNoticia): array {
        $sql = "SELECT 
					n.id_noticias, 
					n.tema, 
					n.breadcramble, 
					n.foto, 
					n.data_hora, 
					n.link_externo, 
					n.ce_categoria_noticia, 
					cn.categoria_noticias, 
					f.fontes, 
					n.conteudo
				FROM noticias n 
				JOIN categorianoticias cn ON cn.id_categ_noticias = n.ce_categoria_noticia 
				JOIN fontes f ON f.id_fonte = n.ce_fonte
				WHERE n.foto IS NOT NULL AND n.ce_categoria_noticia = 1 AND n.id_noticias != :ultima
				ORDER BY n.data_hora DESC
				LIMIT 2";

        $stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':ultima', $ultimaNoticia, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
	
	public function getUltimasNoticiasTecnologia(int $ultimaNoticia): array {
        $sql = "SELECT 
					n.id_noticias, 
					n.tema, 
					n.breadcramble, 
					n.foto, 
					n.data_hora, 
					n.link_externo, 
					n.ce_categoria_noticia, 
					cn.categoria_noticias, 
					f.fontes, 
					n.conteudo
				FROM noticias n 
				JOIN categorianoticias cn ON cn.id_categ_noticias = n.ce_categoria_noticia 
				JOIN fontes f ON f.id_fonte = n.ce_fonte
				WHERE n.foto IS NOT NULL AND n.ce_categoria_noticia = 2 AND n.id_noticias != :ultima
				ORDER BY n.data_hora DESC
				LIMIT 2";

        $stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':ultima', $ultimaNoticia, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
	
	public function getUltimasNoticiasEconomia(int $ultimaNoticia): array {
        $sql = "SELECT 
					n.id_noticias, 
					n.tema, 
					n.breadcramble, 
					n.foto, 
					n.data_hora, 
					n.link_externo, 
					n.ce_categoria_noticia, 
					cn.categoria_noticias, 
					f.fontes, 
					n.conteudo
				FROM noticias n 
				JOIN categorianoticias cn ON cn.id_categ_noticias = n.ce_categoria_noticia 
				JOIN fontes f ON f.id_fonte = n.ce_fonte
				WHERE n.foto IS NOT NULL AND n.ce_categoria_noticia = 6 AND n.id_noticias != :ultima
				ORDER BY n.data_hora DESC
				LIMIT 2";

        $stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':ultima', $ultimaNoticia, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
	
	public function getUltimasNoticiasDesporto(int $ultimaNoticia): array {
        $sql = "SELECT 
					n.id_noticias, 
					n.tema, 
					n.breadcramble, 
					n.foto, 
					n.data_hora, 
					n.link_externo, 
					n.ce_categoria_noticia, 
					cn.categoria_noticias, 
					f.fontes, 
					n.conteudo
				FROM noticias n 
				JOIN categorianoticias cn ON cn.id_categ_noticias = n.ce_categoria_noticia 
				JOIN fontes f ON f.id_fonte = n.ce_fonte
				WHERE n.foto IS NOT NULL AND n.ce_categoria_noticia = 3 AND n.id_noticias != :ultima
				ORDER BY n.data_hora DESC
				LIMIT 2";

        $stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':ultima', $ultimaNoticia, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
	
	public function getTotalEntrevistas(): int {
		$sql = "SELECT COUNT(*) FROM noticias WHERE ce_categoria_noticia = 7 AND foto IS NOT NULL";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return (int) $stmt->fetchColumn();
	}
	
	public function getEntrevistas(int $ultimaNoticia, int $pagina = 1, int $porPagina = 3): array {
		$offset = ($pagina - 1) * $porPagina;
		$sql = "SELECT n.id_noticias, n.tema, n.breadcramble, n.foto, n.data_hora, 
					   n.link_externo, n.ce_categoria_noticia, cn.categoria_noticias, 
					   f.fontes, n.conteudo
				FROM noticias n 
				JOIN categorianoticias cn ON cn.id_categ_noticias = n.ce_categoria_noticia 
				JOIN fontes f ON f.id_fonte = n.ce_fonte
				WHERE n.foto IS NOT NULL AND n.ce_categoria_noticia = 7 
				AND n.id_noticias != :ultima
				ORDER BY n.data_hora DESC
				LIMIT :limit OFFSET :offset";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':ultima', $ultimaNoticia, PDO::PARAM_INT);
		$stmt->bindValue(':limit', $porPagina, PDO::PARAM_INT);
		$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}
	
	public function getNoticiasMaisLidas(): array {
        $sql = "SELECT 
					n.id_noticias, 
					n.tema, 
					n.breadcramble, 
					n.foto, 
					n.data_hora, 
					n.link_externo, 
					n.ce_categoria_noticia, 
					cn.categoria_noticias, 
					f.fontes, 
					n.conteudo
				FROM noticias n 
				JOIN categorianoticias cn ON cn.id_categ_noticias = n.ce_categoria_noticia 
				JOIN fontes f ON f.id_fonte = n.ce_fonte
				WHERE n.foto IS NOT NULL  
				ORDER BY n.visual DESC
				LIMIT 5";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
	
	public function getTotalCategoria(): array {
        $sql = "SELECT n.ce_categoria_noticia, cn.categoria_noticias, COUNT(n.ce_categoria_noticia) total 
			FROM `noticias` n 
			JOIN categorianoticias cn ON cn.id_categ_noticias = n.ce_categoria_noticia 
			GROUP by ce_categoria_noticia";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}