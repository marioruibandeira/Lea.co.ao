<?php
    class Comentarios
    {
        private $id_comentario_post;
        private $fk_publicacao;
        private $fk_utilizador;
        private $comentario;
        private $data_comentario;
        //
        public function getId_comentario_post() {
            return $this->id_comentario_post;
        }
        public function setId_comentario_post($id_comentario_post) {
            $this->id_comentario_post = $id_comentario_post;
        } 
        public function getFk_publicacao() {
            return $this->fk_publicacao;
        }
        public function setFk_publicacao($fk_publicacao) {
            $this->fk_publicacao = $fk_publicacao;
        } 
        public function getFk_utilizador() {
            return $this->fk_utilizador;
        }
        public function setFk_utilizador($fk_utilizador) {
            $this->fk_utilizador = $fk_utilizador;
        } 
        public function getComentario() {
            return $this->comentario;
        }
        public function setComentario($comentario) {
            $this->comentario = $comentario;
        }
        public function getData_comentario() {
            return $this->data_comentario;
        }
        public function setData_comentario($data_comentario) {
            $this->data_comentario = $data_comentario;
        } 
    }
?>