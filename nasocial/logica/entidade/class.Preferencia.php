<?php
/**
 * Description of class
 *
 * @author Mário Bandeira
 */
class Preferencia {
    private $id_preferencia;
    public function setId_preferencia($id_preferencia) {
        $this->id_preferencia = $id_preferencia;
    }
    public function getId_preferencia() {
        return $this->id_preferencia;
    }
    //
    private $ce_usuario;
    public function setCe_usuario($ce_usuario){
        $this->ce_usuario = $ce_usuario; 
    }
    public function getCe_usuario(){
        return $this->ce_usuario;
    }
    //
    private $perfil_estato;
    public function setPerfil_estato($perfil_estato){
        $this->perfil_estato = $perfil_estato;
    }
    public function getPerfil_estato(){
        return $this->perfil_estato;
    }
    //
    private $quero_email;
    public function setQuero_email($quero_email){
        $this->quero_email = $quero_email;
    }
    public function getQuero_email(){
        return $this->quero_email;
    }
    //
    private $ce_idioma;
    public function setCe_idioma($ce_idioma){
        $this->ce_idioma = $ce_idioma;
    }
    public function getCe_idioma(){
        return $this->ce_idioma;
    }
    //
    private $manter_historia;
    public function setManter_historia($manter_historia){
        $this->manter_historia = $manter_historia;
    }
    public function getManter_historia(){
        return $this->manter_historia;
    }
    //
    private $dias_historia;
    public function setDias_historia($dias_historia){
        $this->dias_historia = $dias_historia;
    }
    public function getDias_historia(){
        return $this->dias_historia;
    }
}
