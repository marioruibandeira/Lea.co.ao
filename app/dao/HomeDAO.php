<?php


class HomeDAO
{
    private PDO $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function getHeroTexto(): array {
        $textos = [
            [
                'titulo'   => 'A casa da <em>cultura</em> angolana',
                'subtitulo' => 'Descobre artistas, músicas, literatura, cinema e muito mais. Tudo num só lugar, feito para valorizar a criatividade angolana.'
            ],
            [
                'titulo'   => 'O maior <em>acervo</em> de artistas angolanos',
                'subtitulo' => 'Mais de 2.000 artistas registados de todas as províncias. Música, cinema, literatura, fotografia e muito mais.'
            ],
            [
                'titulo'   => 'A <em>arte</em> angolana num só lugar',
                'subtitulo' => 'Da Música ao Teatro, da Pintura à Literatura. Explora o melhor da criatividade angolana em todas as suas formas.'
            ],
            [
                'titulo'   => 'Descobre o talento de <em>Angola</em>',
                'subtitulo' => 'Artistas de todas as províncias, categorias e géneros. A plataforma que valoriza e promove a cultura angolana.'
            ],
        ];

        return $textos[array_rand($textos)];
    }

    public function getCategoriasHero(): array
    {
        $sql = "SELECT id_categoria_artista, categoria FROM categoriaartista ORDER BY id_categoria_artista";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $categorias = $stmt->fetchAll();

        // Dividir em grupos de 4
        $grupos = array_chunk($categorias, 4);

        // Escolher grupo aleatório
        $grupo = $grupos[array_rand($grupos)];

        // Buscar imagem de artista para cada categoria
        foreach ($grupo as &$cat) {
            $sqlImg = "SELECT art_img_url, artID FROM artistas 
               WHERE ce_categoria_artista = :id
               AND art_img_url IS NOT NULL 
               AND art_img_url != '/artistas/imgs/temporario.jpg'
               LIMIT 1";

            $stmtImg = $this->conn->prepare($sqlImg);
            $stmtImg->bindValue(':id', $cat['id_categoria_artista'], PDO::PARAM_INT);
            $stmtImg->execute();
            $artista = $stmtImg->fetch();

            $cat['imagem'] = $artista ? $artista['art_img_url'] : null;
            $cat['artID']  = $artista ? $artista['artID'] : null;
        }

        return $grupo;
    }

    public function getCategorias(): array {
        $sql = "SELECT id_categoria_artista, categoria FROM categoriaartista ORDER BY id_categoria_artista";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getCategoriasMobile(int $limit = 6): array {
        $sql = "SELECT id_categoria_artista, categoria FROM categoriaartista ORDER BY RAND() LIMIT :limit";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getArtistasDestaque(int $limit = 4): array {
        $sql = "SELECT a.artID, a.nomeA, a.prof, a.art_img_url,
                   p.provincia, c.categoria_artista
            FROM artistas a
            LEFT JOIN provincia p ON a.ce_provincia = p.id_provincia
            LEFT JOIN categoriaartista c ON a.ce_categoria_artista = c.id_categoria_artista
            WHERE a.art_img_url IS NOT NULL
            AND a.art_img_url != '/artistas/imgs/temporario.jpg'
            ORDER BY RAND()
            LIMIT :limit";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getNoticiaDestaque(): ?array {
        $sql = "SELECT n.id_noticias, n.tema, n.foto, n.data_hora, n.breadcramble
            FROM noticias n
            WHERE n.foto IS NOT NULL
            ORDER BY n.data_hora DESC
            LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch() ?: null;
    }

    public function getNoticiasLista(int $excludeId = 0, int $limit = 4): array {
        $sql = "SELECT n.id_noticias, n.tema, n.data_hora, c.categoria_noticias
            FROM noticias n
            LEFT JOIN categorianoticias c ON n.ce_categoria_noticia = c.id_categ_noticias
            WHERE n.id_noticias != :id
            ORDER BY n.data_hora DESC
            LIMIT :limit";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $excludeId, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getArtistasRecemAdicionados(): array
    {
        $sql = "SELECT a.nomeA, a.prof, a.art_img_url, a.artID, a.anoreg FROM artistas a ORDER BY a.artID DESC LIMIT :limite";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':limite', 5, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getTestemunhos(int $limit = 6): array {
        $testemunhos = [
            ['id' => 141,  'img' => '/artistas/imgs/Street_da_Chagas_na_lea.jpg', 'nome' => 'Chaggas',           'texto' => 'Boa plataforma de divulgação, a ganhar espaço. Creio que tende a crescer mais e mais pela positiva, respect!'],
            ['id' => 119,  'img' => '/artistas/imgs/Lunna.jpg',                   'nome' => 'Lunna',              'texto' => 'É um site interessante que trabalha na divulgação de vários artistas o que é muito bom para artistas no geral.'],
            ['id' => 2272, 'img' => '/artistas/imgs/Cafe Negro.jpg',              'nome' => 'Edy British',        'texto' => 'Achei um site muito maravilhoso e acolhedor. Não é fácil ver alguém comprometido com a cultura do país assim.'],
            ['id' => 1580, 'img' => '/artistas/imgs/nebilina.jpg',                'nome' => 'Mauro Neb',          'texto' => 'Acho interessante por ser um canal alternativo de informação relacionada a promoção da cultura angolana.'],
            ['id' => 106,  'img' => '/artistas/imgs/Henda_Slash_Lenine.jpg',      'nome' => 'Henda Slash Lenine', 'texto' => 'Lea é um motor de informação musical, tem apoiado os artistas angolanos e o mercado precisa desta componente.'],
            ['id' => 1259, 'img' => '/artistas/imgs/Dj Mil Toques.jpg',           'nome' => 'DJ Mil Toques',      'texto' => 'A Lea tem mostrado um trabalho positivo em ajudar na divulgação de certos artistas.'],
            ['id' => 1126, 'img' => '/artistas/imgs/Dino Weed.jpg',               'nome' => 'Dino Weed',          'texto' => 'É uma plataforma bastante diversificada, oferecendo inúmeras opções de busca. Muitos sucessos a LEA!'],
            ['id' => 1414, 'img' => '/artistas/imgs/Ceicy Tchavala.jpg',          'nome' => 'Ceicy',              'texto' => 'Falar da Lea é uma responsabilidade muito grande. Desde que conheci me sinto em casa, ganhei uma família.'],
            ['id' => 1592, 'img' => '/artistas/imgs/Lucky Mayanda.jpg',           'nome' => 'Lucky Mayanda',      'texto' => 'A Lea leva o seu serviço para frente. Do passado, do presente e do futuro é dar ao seu servir toda a nação.'],
            ['id' => 1548, 'img' => '/artistas/imgs/Beni Dya Mbaxi.jpg',          'nome' => 'Beni Dya Mbaxi',     'texto' => 'A Lea tem feito um trabalho que merece mais valorização. Não é fácil catalogar artistas nacionais.'],
            ['id' => 1834, 'img' => '/artistas/imgs/Cadeado Poeta.jpg',           'nome' => 'Cadeado Poeta',      'texto' => 'Acho uma plataforma muito boa. Tenho a certeza que será uma das plataformas mais usadas pelos artistas.'],
            ['id' => 632,  'img' => '/artistas/imgs/Luiz Fernandes.jpg',          'nome' => 'Luís Fernandes',     'texto' => 'Gosto bastante da LEA.co.ao. É um projeto valioso e ambicioso para Angola.'],
        ];

        shuffle($testemunhos);

        $testemunhos = array_slice($testemunhos, 0, $limit);

        // Junta profissão + provincia vindas da BD
        foreach ($testemunhos as &$t) {
            $info = $this->getProfissaoENaturalidade($t['id']);
            if ($info) {
                $t = array_merge($t, $info);
            }
        }

        return $testemunhos;
    }

    public function getProfissaoENaturalidade(int $id): ?array {
        $sql = "SELECT 
                a.prof,
                p.provincia
            FROM artistas a
            JOIN provincia p ON p.id_provincia = a.ce_provincia
            WHERE a.artID = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

}