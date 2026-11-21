<?php
/**
 * Description of class
 * @author Mário Bandeira
 * 912696969
 */
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Livro.php');
class LivroNasocial extends Livro {
    //
    private $id_livro_nasocial;
    private $data_na_social;
    private $ce_usuario;
    private $preco_livro;
    private $qtd_livro;
    private $descricao_livro;
    private $cat;
    //
    function getId_livro_nasocial() {
        return $this->id_livro_nasocial;
    }

    function getData_na_social() {
        return $this->data_na_social;
    }

    function getCe_usuario() {
        return $this->ce_usuario;
    }

    function getPreco_livro() {
        return $this->preco_livro;
    }

    function getQtd_livro() {
        return $this->qtd_livro;
    }

    function getDescricao_livro() {
        return $this->descricao_livro;
    }

    function setId_livro_nasocial($id_livro_nasocial) {
        $this->id_livro_nasocial = $id_livro_nasocial;
    }

    function setData_na_social($data_na_social) {
        $this->data_na_social = $data_na_social;
    }

    function setCe_usuario($ce_usuario) {
        $this->ce_usuario = $ce_usuario;
    }

    function setPreco_livro($preco_livro) {
        $this->preco_livro = $preco_livro;
    }

    function setQtd_livro($qtd_livro) {
        $this->qtd_livro = $qtd_livro;
    }

    function setDescricao_livro($descricao_livro) {
        $this->descricao_livro = $descricao_livro;
    }
    
    function getCat() {
        return $this->cat;
    }

    function setCat($cat) {
        $this->cat = $cat;
    }
    //
}
