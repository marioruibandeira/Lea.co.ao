<?php
class ArtistaDAO
{
    private PDO $conn;
    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function jaSegue(int $artistaId, int $utilizadorId): bool {
        $sql = "SELECT Id FROM tblusuario_artista_soufa WHERE FK_Artista = :artista AND FK_Utilizador = :utilizador LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);
        $stmt->bindValue(':utilizador', $utilizadorId, PDO::PARAM_INT);
        $stmt->execute();
        return (bool) $stmt->fetch();
    }

    public function seguir(int $artistaId, int $utilizadorId): int {
        $this->conn->beginTransaction();
        try {
            $sql = "INSERT INTO tblusuario_artista_soufa (FK_Artista, FK_Utilizador) VALUES (:artista, :utilizador)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);
            $stmt->bindValue(':utilizador', $utilizadorId, PDO::PARAM_INT);
            $stmt->execute();

            $this->conn->prepare("UPDATE artistas SET fans = fans + 1 WHERE artID = :artista")
                        ->execute([':artista' => $artistaId]);

            $this->conn->commit();
        } catch (\Exception $e) {
            $this->conn->rollBack();
            throw $e;
        }
        return $this->getFans($artistaId);
    }

    public function deixarDeSeguir(int $artistaId, int $utilizadorId): int {
        $this->conn->beginTransaction();
        try {
            $sql = "DELETE FROM tblusuario_artista_soufa WHERE FK_Artista = :artista AND FK_Utilizador = :utilizador";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);
            $stmt->bindValue(':utilizador', $utilizadorId, PDO::PARAM_INT);
            $stmt->execute();

            $this->conn->prepare("UPDATE artistas SET fans = GREATEST(fans - 1, 0) WHERE artID = :artista")
                        ->execute([':artista' => $artistaId]);

            $this->conn->commit();
        } catch (\Exception $e) {
            $this->conn->rollBack();
            throw $e;
        }
        return $this->getFans($artistaId);
    }

    private function getFans(int $artistaId): int {
        $stmt = $this->conn->prepare("SELECT fans FROM artistas WHERE artID = :artista");
        $stmt->execute([':artista' => $artistaId]);
        return (int) $stmt->fetchColumn();
    }
	
	public function getById(int $id): ?array {
		$sql = "SELECT a.*, p.provincia, c.categoria_artista
				FROM artistas a
				LEFT JOIN provincia p ON p.id_provincia = a.ce_provincia
				LEFT JOIN categoriaartista c ON c.id_categoria_artista = a.ce_categoria_artista
				WHERE a.artID = :id
				LIMIT 1";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch() ?: null;
	}
	
	public function getTotalPesquisas(int $artistaId): int {
		$sql = "SELECT COUNT(*) FROM pesquisa_encontrada WHERE ce_artista = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':id', $artistaId, PDO::PARAM_INT);
		$stmt->execute();
		return (int) $stmt->fetchColumn();
	}
	
	/*Total dos feitos do artista*/
	public function getTotalMusicas(int $artistaId): int {
		$sql = "SELECT COUNT(*) FROM musicapromocional WHERE fk_artid = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':id', $artistaId, PDO::PARAM_INT);
		$stmt->execute();
		return (int) $stmt->fetchColumn();
	}

	public function getTotalVideos(int $artistaId): int {
		$sql = "SELECT COUNT(*) FROM videos WHERE FK_artista = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':id', $artistaId, PDO::PARAM_INT);
		$stmt->execute();
		return (int) $stmt->fetchColumn();
	}
	
	/*Ranking*/
	public function getRankingVisitas(int $visua): int {
		$sql = "SELECT COUNT(*) + 1 FROM artistas WHERE visua > :visua";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':visua', $visua, PDO::PARAM_INT);
		$stmt->execute();
		return (int) $stmt->fetchColumn();
	}
	
	//Curtir ou No Limão
	public function jaCurtiu(int $artistaId, int $utilizadorId): bool {
		$sql = "SELECT Id FROM tblusuario_artista_nolimao WHERE FK_Artista = :artista AND FK_Utilizador = :utilizador LIMIT 1";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);
		$stmt->bindValue(':utilizador', $utilizadorId, PDO::PARAM_INT);
		$stmt->execute();
		return (bool) $stmt->fetch();
	}

	public function curtir(int $artistaId, int $utilizadorId): int {
		$sql = "INSERT INTO tblusuario_artista_nolimao (FK_Artista, FK_Utilizador) VALUES (:artista, :utilizador)";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);
		$stmt->bindValue(':utilizador', $utilizadorId, PDO::PARAM_INT);
		$stmt->execute();

		return $this->contarCurtidas($artistaId);
	}

	public function descurtir(int $artistaId, int $utilizadorId): int {
		$sql = "DELETE FROM tblusuario_artista_nolimao WHERE FK_Artista = :artista AND FK_Utilizador = :utilizador";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);
		$stmt->bindValue(':utilizador', $utilizadorId, PDO::PARAM_INT);
		$stmt->execute();

		return $this->contarCurtidas($artistaId);
	}

	public function contarCurtidas(int $artistaId): int {
		$sql = "SELECT COUNT(*) FROM tblusuario_artista_nolimao WHERE FK_Artista = :artista";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);
		$stmt->execute();
		return (int) $stmt->fetchColumn();
	}
	
	// Em ArtistaDAO.php
	public function temConteudo(string $tabela, string $colunaFk, int $artistaId): bool
	{
		$sql = "SELECT 1 FROM {$tabela} WHERE {$colunaFk} = :artista LIMIT 1";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);
		$stmt->execute();
		return (bool) $stmt->fetch();
	}
	
	public function getMusicasPreview(int $artistaId, int $limite = 3): array
	{
		$sql = "SELECT m.idmusicapromo, m.titulo, m.ano, m.capa, g.genero AS genero_nome
				FROM musicapromocional m
				LEFT JOIN generos g ON m.genero = g.gnr_id
				WHERE m.fk_artid = :artista
				ORDER BY m.data_na_lea DESC
				LIMIT :limite";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);
		$stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getMusicas(int $artistaId): array
	{
		$sql = "SELECT m.idmusicapromo, m.titulo, m.ano, m.capa, m.caminho, m.nome_ficheiro,
					   g.genero AS genero_nome
				FROM musicapromocional m
				LEFT JOIN generos g ON m.genero = g.gnr_id
				WHERE m.fk_artid = :artista
				ORDER BY m.data_na_lea DESC";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getLetras(int $artistaId): array
	{
		$sql = "SELECT l.ID_LETRA, l.litulo_principal, l.LETRA, l.letra_data,
					   g.genero AS genero_nome,
					   m.capa AS musica_capa
				FROM letras l
				LEFT JOIN generos g ON l.ce_genero = g.gnr_id
				LEFT JOIN musicapromocional m ON l.ec_m_promocional = m.idmusicapromo
				WHERE l.ec_artista = :artista
				  AND l.letraExiste = 1
				ORDER BY l.letra_data DESC";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getVideosPorCategoria(int $artistaId, int $categoriaId, ?int $limite = null): array
	{
		$sql = "SELECT v.id_videos, v.titulo_video, v.imagem_video, v.videos_link,
					   v.ano, v.duracao, v.sinopse, g.genero AS genero_nome
				FROM videos v
				LEFT JOIN generos g ON v.FK_genero = g.gnr_id
				WHERE v.FK_artista = :artista
				  AND v.id_categoria_videos = :categoria
				ORDER BY v.data_regvideo DESC";

		if ($limite !== null) {
			$sql .= " LIMIT :limite";
		}

		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);
		$stmt->bindValue(':categoria', $categoriaId, PDO::PARAM_INT);
		if ($limite !== null) {
			$stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
		}
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	// Vídeos Musicais (categoria 1) → aba "Vídeos"
	public function getVideosMusicais(int $artistaId): array
	{
		return $this->getVideosPorCategoria($artistaId, 1);
	}
	
	public function getVideosCategoria(int $artistaId, int $categoriaId, ?int $limite = null): array
	{
		$sql = "SELECT v.id_videos, v.titulo_video, v.imagem_video, v.videos_link,
				v.ano, v.duracao, v.sinopse, g.genero AS genero_nome
				FROM videos v
                JOIN elenco_filmes_outros efo ON efo.video_id = v.id_videos
				LEFT JOIN generos g ON v.FK_genero = g.gnr_id
				WHERE efo.ce_artista = :artista
				AND v.id_categoria_videos = :categoria
				ORDER BY v.data_regvideo DESC";

		if ($limite !== null) {
			$sql .= " LIMIT :limite";
		}

		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);
		$stmt->bindValue(':categoria', $categoriaId, PDO::PARAM_INT);
		if ($limite !== null) {
			$stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
		}
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	// Filmes (categoria 2)
	public function getFilmes(int $artistaId): array
	{
		return $this->getVideosCategoria($artistaId, 2);
	}

	// Séries (categoria 3)
	public function getSeries(int $artistaId): array
	{
		return $this->getVideosCategoria($artistaId, 3);
	}

	// Documentários (categoria 4)
	public function getDocumentarios(int $artistaId): array
	{
		return $this->getVideosCategoria($artistaId, 4);
	}

	// Novelas (categoria 5)
	public function getNovelas(int $artistaId): array
	{
		return $this->getVideosCategoria($artistaId, 5);
	}

	// Publicidades (categoria 6)
	public function getPublicidades(int $artistaId): array
	{
		return $this->getVideosCategoria($artistaId, 6);
	}
	
	public function getAlbuns(int $artistaId, ?int $limite = null): array
	{
		$sql = "SELECT d.d_ID, d.d_nome, d.d_capa, d.d_ano, d.d_data, d.d_categ,
					   d.preco, d.estado_napage,
					   g.genero AS genero_nome,
					   c.discos_cat_discografica AS formato,
					   (SELECT COUNT(*) FROM n_musicas m WHERE m.FK_d_id = d.d_ID) AS total_faixas
				FROM discos d
				LEFT JOIN generos g ON d.genero = g.gnr_id
				LEFT JOIN discos_cat_discografica c ON d.ce_disco_cat_discografica = c.id_discos_cat_discografica
				WHERE d.fk_artID = :artista
				ORDER BY d.d_data DESC";

		if ($limite !== null) {
			$sql .= " LIMIT :limite";
		}

		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);
		if ($limite !== null) {
			$stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
		}
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getFaixasAlbum(int $discoId): array
	{
		$sql = "SELECT track_id, titulo, numero, tempo, download, venda, preco_musica
				FROM n_musicas
				WHERE FK_d_id = :disco
				ORDER BY numero ASC";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':disco', $discoId, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getDiscoInfo(int $discoId): ?array
	{
		$sql = "SELECT d_ID, d_nome, d_capa, fk_artID
				FROM discos
				WHERE d_ID = :disco
				LIMIT 1";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':disco', $discoId, PDO::PARAM_INT);
		$stmt->execute();
		$resultado = $stmt->fetch(PDO::FETCH_ASSOC);
		return $resultado ?: null;
	}
	
	public function getParticipacoes(int $artistaId, ?int $limite = null): array
	{
		$sql = "SELECT tmd.id_tem_meu_dedo, tmd.idmusicapromo,
					   m.titulo AS musica_titulo, m.capa AS musica_capa, m.ano AS musica_ano,
					   a.artID AS dono_id, a.nomeA AS dono_nome,
					   te.tecnicas_estudio AS tecnica_nome
				FROM temMeuDedo tmd
				JOIN musicapromocional m ON tmd.idmusicapromo = m.idmusicapromo
				LEFT JOIN artistas a ON m.fk_artid = a.artID
				LEFT JOIN tecnicasDeEstudio te ON tmd.id_tecnicas_estudio = te.id_tecnicas_estudio
				WHERE tmd.id_artista = :artista
				ORDER BY m.ano DESC";

		if ($limite !== null) {
			$sql .= " LIMIT :limite";
		}

		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);
		if ($limite !== null) {
			$stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
		}
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getLivros(int $artistaId, ?int $limite = null): array
	{
		$sql = "SELECT l.id_livro, l.titulo, l.capa_livro, l.ano_pub_livro,
					   l.preco, l.n_paginas, l.resumo,
					   g.genero AS genero_nome
				FROM LivroEscritore le
				JOIN livro l ON le.ce_livro = l.id_livro
				LEFT JOIN generos g ON l.ce_genero = g.gnr_id
				WHERE le.ce_autor = :artista
				ORDER BY l.data_publicacao DESC";

		if ($limite !== null) {
			$sql .= " LIMIT :limite";
		}

		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);
		if ($limite !== null) {
			$stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
		}
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getPoemas(int $artistaId, ?int $limite = null): array
	{
		$sql = "SELECT p.id, p.titulo, p.poesia, p.ano_poesia, p.ce_livro,
					   dc.categoria AS tema_nome,
					   l.titulo AS livro_titulo
				FROM poesia p
				LEFT JOIN dizeres_categoria dc ON p.ce_categoria = dc.id
				LEFT JOIN livro l ON p.ce_livro = l.id_livro
				WHERE p.ce_autor = :artista
				ORDER BY p.data_lea DESC";

		if ($limite !== null) {
			$sql .= " LIMIT :limite";
		}

		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);
		if ($limite !== null) {
			$stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
		}
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getDizeres(int $artistaId, ?int $limite = null): array
	{
		$sql = "SELECT d.id, d.dizer, d.data_lea,
					   dc.categoria AS tema_nome
				FROM dizeres d
				LEFT JOIN dizeres_categoria dc ON d.ce_categoria = dc.id
				WHERE d.ce_autor = :artista
				ORDER BY d.data_lea DESC";

		if ($limite !== null) {
			$sql .= " LIMIT :limite";
		}

		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);
		if ($limite !== null) {
			$stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
		}
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getPremios(int $artistaId, ?int $limite = null): array
	{
		$sql = "SELECT id_premiacoes, ano, premiacao, organicao
				FROM premiacoes
				WHERE ce_artista = :artista
				ORDER BY ano DESC";

		if ($limite !== null) {
			$sql .= " LIMIT :limite";
		}

		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);
		if ($limite !== null) {
			$stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
		}
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getNoticiasDoArtista(int $artistaId, ?int $limite = null): array
	{
		$sql = "SELECT n.id_noticias, n.tema, n.conteudo, n.foto, DATE_FORMAT(n.data_hora, '%d/%m/%Y %H:%i') AS data_hora,
					   a.nomeA AS artista,
					   c.categoria_noticias,
					   f.fontes
				FROM noticias n
				LEFT JOIN artistas a ON n.ce_artista = a.artID
				LEFT JOIN categorianoticias c ON n.ce_categoria_noticia = c.id_categ_noticias
				LEFT JOIN fontes f ON n.ce_fonte = f.id_fonte
				WHERE n.ce_artista = :artista
				ORDER BY n.data_hora DESC";

		if ($limite !== null) {
			$sql .= " LIMIT :limite";
		}

		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);

		if ($limite !== null) {
			$stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
		}

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getAgendaDoArtista(int $artistaId, ?int $limite = null): array
	{
		$sql = "SELECT a.id, a.evento,
					   DATE_FORMAT(a.data_evento, '%d/%m/%Y') AS data_evento,
					   DATE_FORMAT(a.hora_evento, '%H:%i') AS hora_evento,
					   a.local_evento, a.caminho, a.preco,
					   ar.nomeA AS artista,
					   p.provincia
				FROM agenda a
				LEFT JOIN artistas ar ON a.ce_artista = ar.artID
				LEFT JOIN provincia p ON a.ce_provincia = p.id_provincia
				WHERE a.ce_artista = :artista
				ORDER BY a.data_evento DESC, a.hora_evento DESC";

		if ($limite !== null) {
			$sql .= " LIMIT :limite";
		}

		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);

		if ($limite !== null) {
			$stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
		}

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getFotoAlbumDoArtista(int $artistaId, ?int $limite = null): array
	{
		$sql = "SELECT f.foto_album_id, f.titulo,
					   DATE_FORMAT(f.data_foto_album, '%d/%m/%Y %H:%i') AS data_foto_album,
					   f.img_foto_album,
					   a.nomeA AS artista
				FROM fotoalbum f
				LEFT JOIN artistas a ON f.artista_id = a.artID
				WHERE f.artista_id = :artista
				ORDER BY f.data_foto_album DESC";

		if ($limite !== null) {
			$sql .= ' LIMIT :limite';
		}

		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);

		if ($limite !== null) {
			$stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
		}

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getVideojogosDoArtista(int $artistaId, ?int $limite = null): array
	{
		$sql = "SELECT va.id,
					   va.funcao,
					   va.personagem,
					   va.descricao,
					   DATE_FORMAT(va.data_registo, '%d/%m/%Y %H:%i') AS data_registo,
					   v.titulo,
					   v.titulo_original,
					   v.genero,
					   v.plataforma,
					   v.desenvolvedora,
					   v.publicadora,
					   v.pais_origem,
					   v.ano_lancamento,
					   v.capa_url,
					   v.trailer_url,
					   v.site_oficial,
					   v.estado
				FROM videojogos_artista va
				LEFT JOIN videojogos v ON va.ce_videojogo = v.id
				WHERE va.ce_artista = :artista
				ORDER BY va.data_registo DESC";

		if ($limite !== null) {
			$sql .= " LIMIT :limite";
		}

		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);

		if ($limite !== null) {
			$stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
		}

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getArtesPlasticasDoArtista(int $artistaId, ?int $limite = null): array
	{
		$sql = "SELECT ap.id, ap.titulo, ap.caminho, ap.dimensao,
					   ap.tecnica, ap.ano, ap.preco, ap.gostei,
					   ap.detalhes, ap.descricao, ap.palavras_chave, ap.json_ld,
					   a.nomeA AS artista
				FROM artes_plasticas ap
				LEFT JOIN artistas a ON ap.ce_artista = a.artID
				WHERE ap.ce_artista = :artista
				ORDER BY ap.ano DESC";

		if ($limite !== null) {
			$sql .= ' LIMIT :limite';
		}

		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);

		if ($limite !== null) {
			$stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
		}

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getOrnamentos(int $artistaId, ?int $limite = null): array
	{
		$sql = "SELECT o.id, o.titulo, o.tipo, o.material, o.tecnica,
					   o.altura, o.largura, o.profundidade, o.unidade_medida,
					   o.ano_criacao, o.imagem_principal, o.estado,
					   o.disponivel_venda, o.preco, o.moeda,
					   oa.funcao
				FROM ornamentos_artista oa
				JOIN ornamentos o ON oa.ce_ornamento = o.id
				WHERE oa.ce_artista = :artista
				  AND oa.activo = 1
				  AND o.activo = 1
				ORDER BY o.data_registo DESC";

		if ($limite !== null) {
			$sql .= " LIMIT :limite";
		}

		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);
		if ($limite !== null) {
			$stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
		}
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getReferencias(int $artistaId): array
	{
		$sql = "SELECT referencia_id, referencia, descricao, ano, link
				FROM referencias
				WHERE ce_artista = :artista
				ORDER BY ano DESC";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
}