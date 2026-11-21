<?php
    class CarregarMusica
    {
        private $ce_usuario;
        private $ce_artista;
        private $titulo;
        private $genero_id;
        private $ano;
        private $musica;
        private $capa;
        
        public function getCe_usuario() {
            return $this->ce_usuario;
        }
        public function setCe_usuario($ce_usuario) {
            $this->ce_usuario = $ce_usuario;
        }
        
        public function getCe_artista() {
            return $this->ce_artista;
        }
        public function setCe_artista($ce_artista) {
            $this->ce_artista = $ce_artista;
        }
        
        public function getTitulo() {
            return $this->titulo;
        }
        public function setTitulo($titulo) {
            $this->titulo = $titulo;
        }
        
        public function getGenero_id() {
            return $this->genero_id;
        }
        public function setGenero_id($genero_id) {
            $this->genero_id = $genero_id;
        }
        
        public function getAno() {
            return $this->ano;
        }
        public function setAno($ano) {
            $this->ano = $ano;
        }
        
        public function getMusica() {
            return $this->musica;
        }
        public function setMusica($musica) {
            $this->musica = $musica;
        }
        
        public function getCapa() {
            return $this->capa;
        }
        public function setCapa($capa) {
            $this->capa = $capa;
        }
    }
?>