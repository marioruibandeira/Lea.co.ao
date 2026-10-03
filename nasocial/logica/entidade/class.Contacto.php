<?php
/**
 * Description of class
 *
 * @author hash
 */
class Contacto 
{
    private $email;
    private $pagina_web;
    private $telefone;
    private $whatsapp;
    //
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    //
    public function getPagina_web() {
        return $this->pagina_web;
    }
    public function setPagina_web($pagina_web){
        $this->pagina_web = $pagina_web;
    }
    //
    public function getTelefone(){
        return $this->telefone;
    }
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
    //
    public function getWhatsapp(){
        return $this->whatsapp;
    }
    public function setWhatsapp($whatsapp){
        $this->whatsapp = $whatsapp;
    }
}
