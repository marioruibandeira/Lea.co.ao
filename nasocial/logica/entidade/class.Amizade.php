<?php
/**
 * Description of class
 *
 * @author hash
 */
class Amizade  
{
    
    //put your code here
    private $id_pedido_amizade;
    private $data_amigo;
    private $ce_usuario;
    private $ce_amigo;
    private $quem_pedio;
    
    
    function getId_pedido_amizade() {
        return $this->id_pedido_amizade;
    }

    function getData_amigo() {
        return $this->data_amigo;
    }

    function getCe_usuario() {
        return $this->ce_usuario;
    }

    function getCe_amigo() {
        return $this->ce_amigo;
    }

    function setId_pedido_amizade($id_pedido_amizade) {
        $this->id_pedido_amizade = $id_pedido_amizade;
    }

    function setData_amigo($data_amigo) {
        $this->data_amigo = $data_amigo;
    }

    function setCe_usuario($ce_usuario) {
        $this->ce_usuario = $ce_usuario;
    }

    function setCe_amigo($ce_amigo) {
        $this->ce_amigo = $ce_amigo;
    }
    //
    public function getQuem_pedio(){
        return $this->quem_pedio;
    }
    public function setQuem_pedio($quem_pedio){
        $this->quem_pedio = $quem_pedio;
    }
        //https://www.cineflix4k.net/filmes/assistir-oito-mulheres-e-um-segredo-online/
}

?>
