<?php
/**
 * Description of class
 *
 * @Mário Bandeira
 */
class Publicar {    
    private $publicar;
    private $publicacao;
    private $img_publicacao;
    private $ce_categoria_post;
    //
    function getPublicar() {
        return $this->publicar;
    }
    function getPublicacao() {
        return $this->publicacao;
    }
    function getImg_publicacao() {
        return $this->img_publicacao;
    }
    function getCe_categoria_post() {
        return $this->ce_categoria_post;
    }
    function setPublicar($publicar) {
        $this->publicar = $publicar;
    }
    function setPublicacao($publicacao) {
        $this->publicacao = $publicacao;
    }
    function setImg_publicacao($img_publicacao) {
        $this->img_publicacao = $img_publicacao;
    }
    function setCe_categoria_post($ce_categoria_post) {
        $this->ce_categoria_post = $ce_categoria_post;
    }
    //
}
//
?>
