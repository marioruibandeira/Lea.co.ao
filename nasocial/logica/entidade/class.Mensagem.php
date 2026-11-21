<?php

/**
 * Description of class
 *
 * @author Mario Bandeira
 */
class Mensagem {

//put your code here
    private $id_mensagens;
    private $ce_usuario;
    private $ce_amigo;
    private $mensagem_data;
    private $mensagem;
    private $emissor;
    function getId_mensagens() {
        return $this->id_mensagens;
    }

    function getCe_usuario() {
        return $this->ce_usuario;
    }

    function getCe_amigo() {
        return $this->ce_amigo;
    }

    function getMensagem_data() {
        return $this->mensagem_data;
    }

    function getMensagem() {
        return $this->mensagem;
    }

    function getEmissor() {
        return $this->emissor;
    }

    function setId_mensagens($id_mensagens) {
        $this->id_mensagens = $id_mensagens;
    }

    function setCe_usuario($ce_usuario) {
        $this->ce_usuario = $ce_usuario;
    }

    function setCe_amigo($ce_amigo) {
        $this->ce_amigo = $ce_amigo;
    }

    function setMensagem_data($mensagem_data) {
        $this->mensagem_data = $mensagem_data;
    }

    function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    }

    function setEmissor($emissor) {
        $this->emissor = $emissor;
    }

}

?>
