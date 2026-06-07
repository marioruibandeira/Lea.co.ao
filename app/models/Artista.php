<?php


class Artista
{
    public int $artID;
    public string $nomeA;
    public ?string $nomeV;
    public ?string $prof;
    public ?string $dataNac;
    public ?string $statu;
    public int $fans;
    public int $gostei;
    public int $visua;
    public ?string $actua;
    public ?string $bio;
    public ?string $art_img_url;
    public ?string $anoreg;
    public ?string $obito;
    public ?string $anosAt;
    public ?int $generoBiologico;
    public ?string $descricao;
    public ?string $palavras_chave;
    public ?string $json_ld;

    // Chaves estrangeiras (IDs)
    public int $ce_provincia;
    public int $ce_categoria_artista;
    public ?int $genero;

    // Campos de join (valores resolvidos)
    public ?string $provincia;
    public ?string $categoria_artista;
    public ?string $nome_genero;
}