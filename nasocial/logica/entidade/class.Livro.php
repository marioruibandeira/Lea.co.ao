<?php
//
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Artista.php');
//
class Livro extends Artista {
    private $id_livro;
    private $titulo;
    private $ce_editora_livro;
    private $data_lea;
    private $data_publicacao;
    private $capa_livro;
    private $capa_livro_tras;
    private $ce_genero;
    private $genero;
    private $ano_livro;
    //
    function getId_livro() {
        return $this->id_livro;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getCe_editora_livro() {
        return $this->ce_editora_livro;
    }

    function getData_lea() {
        return $this->data_lea;
    }

    function getData_publicacao() {
        return $this->data_publicacao;
    }

    function getCapa_livro() {
        return $this->capa_livro;
    }

    function getCapa_livro_tras() {
        return $this->capa_livro_tras;
    }

    function getCe_genero() {
        return $this->ce_genero;
    }

    function getGenero() {
        return $this->genero;
    }

    function getAno_livro() {
        return $this->ano_livro;
    }

    function setId_livro($id_livro) {
        $this->id_livro = $id_livro;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setCe_editora_livro($ce_editora_livro) {
        $this->ce_editora_livro = $ce_editora_livro;
    }

    function setData_lea($data_lea) {
        $this->data_lea = $data_lea;
    }

    function setData_publicacao($data_publicacao) {
        $this->data_publicacao = $data_publicacao;
    }

    function setCapa_livro($capa_livro) {
        $this->capa_livro = $capa_livro;
    }

    function setCapa_livro_tras($capa_livro_tras) {
        $this->capa_livro_tras = $capa_livro_tras;
    }

    function setCe_genero($ce_genero) {
        $this->ce_genero = $ce_genero;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setAno_livro($ano_livro) {
        $this->ano_livro = $ano_livro;
    }
    //
}
?>
