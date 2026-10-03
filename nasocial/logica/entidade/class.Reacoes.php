<?php
    class Reacoes
    {
        private $id_linha_tempo_emojis;
        private $id_emojis;
        private $user_id;
        private $id_linha_tempo;
        //
        function getId_linha_tempo_emojis() {
            return $this->id_linha_tempo_emojis;
        }
        function setId_linha_tempo_emojis($id_linha_tempo_emojis) {
            $this->id_linha_tempo_emojis = $id_linha_tempo_emojis;
        }
        
        function getId_emojis(){
            return $this->id_emojis;
        }
        function setId_emojis($id_emojis){
            $this->id_emojis = $id_emojis;
        }
        
        function getUser_id(){
            return $this->user_id;
        }
        function setUser_id($user_id){
            $this->user_id = $user_id;
        }
        
        function getId_linha_tempo(){
            return $this->id_linha_tempo;
        }
        function setId_linha_tempo($id_linha_tempo){
            $this->id_linha_tempo = $id_linha_tempo;
        }
    }
?>