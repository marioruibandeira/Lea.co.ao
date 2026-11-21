<?php
/**
 * Description of SiteUserInfo
 *
 * @author hash
 */
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Usuario.php');
//
class SiteUserInfo extends Usuario {
    //
    private $id_user_info;
    private $profile_pic;
    private $first_name;
    private $last_name;
    private $data_nascimento;
    private $email;
    private $passatempo;
    private $agente;
    private $session;
    //
    private $dependencia;
    private $conta;
    private $iban;
    //
    private $bi;
    private $contribuente;
    //
    function getProfile_pic() {
        return $this->profile_pic;
    }

    function SetProfile_pic($profile_pic) {
        $this->profile_pic = $profile_pic;
    }
    
    function getId_user_info() {
        return $this->id_user_info;
    }

    function getFirst_name() {
        return $this->first_name;
    }

    function getLast_name() {
        return $this->last_name;
    }

    function getData_nascimento() {
        return $this->data_nascimento;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassatempo() {
        return $this->passatempo;
    }

    function setId_user_info($id_user_info) {
        $this->id_user_info = $id_user_info;
    }

    function setFirst_name($first_name) {
        $this->first_name = $first_name;
    }

    function setLast_name($last_name) {
        $this->last_name = $last_name;
    }

    function setData_nascimento($data_nascimento) {
        $this->data_nascimento = $data_nascimento;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassatempo($passatempo) {
        $this->passatempo = $passatempo;
    }
    //
    function setAgente($agente) {
        $this->agente = $agente;
    }
    function getAgente() {
        return $this->agente;
    }
    //
     function getSession() {
        return $this->session;
    }
    function setSession($session) {
        $this->session = $session;
    }
    //
    function getDependencia() {
        return $this->dependencia;
    }
    function setDependencia($dependencia) {
        $this->dependencia = $dependencia;
    }
    //
    function getConta() {
        return $this->conta;
    }
    function setConta($conta) {
        $this->conta = $conta;
    }
    //
    function getIban() {
        return $this->iban;
    }
    function setIban($iban) {
        $this->iban = $iban;
    }
    //
    function getBi() {
        return $this->bi;
    }
    function setBi($bi) {
        $this->bi = $bi;
    }
    //
    function getContribuente() {
        return $this->contribuente;
    }
    function setContribuente($contribuente) {
        $this->contribuente = $contribuente;
    }
}
