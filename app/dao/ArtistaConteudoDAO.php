<?php
class ArtistaConteudoDAO {

    private array $mapa = [
        'musicas'        => ['tabela' => 'tbl_musicas',        'fk' => 'artID'],
        'videos'         => ['tabela' => 'tbl_videos',         'fk' => 'artID'],
        // ... resto do mapa, uma vez que confirmes os nomes
    ];

    public function getAbasComConteudo(int $artistaId): array
    {
        $resultado = [];
        foreach ($this->mapa as $chave => $info) {
            $resultado[$chave] = $this->existeConteudo($info['tabela'], $info['fk'], $artistaId);
        }
        return $resultado;
    }

    private function existeConteudo(string $tabela, string $fk, int $artistaId): bool
    {
        $sql = "SELECT 1 FROM {$tabela} WHERE {$fk} = :artista LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':artista', $artistaId, PDO::PARAM_INT);
        $stmt->execute();
        return (bool) $stmt->fetch();
    }
}