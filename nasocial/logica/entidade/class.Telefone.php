<?php
/**
 * Description of class
 *
 * @author Mário Bandeira
 */
class Telefone {
    private $telefone = array();
    public function getTelefone() {
        return $this->telefone;
    }
    public function setTelefone($telefone) {
        $this->telefone[] = $telefone;
    }
}
