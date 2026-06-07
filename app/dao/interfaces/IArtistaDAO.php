<?php


interface IArtistaDAO
{
    public function getAll(): array;
    public function getById(int $id): ?Artista;
    public function getDestaque(int $limit): array;
    public function getRecentes(int $limit): array;
    public function getByCategoria(int $categoriaId, int $limit): array;
    public function getPorProvincia(int $provinciaId): array;
    public function getTotalArtistas(): int;
}