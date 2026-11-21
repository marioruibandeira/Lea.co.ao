<?php
/**
 * Description of class
 *
 * @author Mário Bandeira
 */
class Artista {
    private $id_artista;
    private $artista;
    private $nome_artistico;
    
    function getId_artista() {
        return $this->id_artista;
    }

    function getArtista() {
        return $this->artista;
    }

    function getNome_artistico() {
        return $this->nome_artistico;
    }

    function setId_artista($id_artista) {
        $this->id_artista = $id_artista;
    }

    function setArtista($artista) {
        $this->artista = $artista;
    }

    function setNome_artistico($nome_artistico) {
        $this->nome_artistico = $nome_artistico;
    }

}

