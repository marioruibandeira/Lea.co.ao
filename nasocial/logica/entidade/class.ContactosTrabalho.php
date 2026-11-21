<?php
    class ContactosTrabalho
    {
        private $telefone;
        private $whatsapp;
        private $ce_usuario;
        private $ce_artista;
        //
        public function getTelefone() {
            return $this->telefone;
        }
        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }
        
        public function getWhatsapp() {
            return $this->whatsapp;
        }
        public function setWhatsapp($whatsapp) {
            $this->whatsapp = $whatsapp;
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