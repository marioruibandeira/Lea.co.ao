<?php
    class PerfilDoArtista
    {
        private $actualizacoes;
        private $ce_usuario;
        private $ce_artista;
        //
        public function getActualizacoes() {
            return $this->actualizacoes;
        }
        public function setActualizacoes($actualizacoes) {
            $this->actualizacoes = $actualizacoes;
        }
        
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
    }
?>