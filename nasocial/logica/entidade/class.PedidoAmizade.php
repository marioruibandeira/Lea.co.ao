<?php
/**
 * Description of PedidoAmizade
 *
 * @author hash
 */
class PedidoAmizade {
    private $id_pedido_amizade;
    private $ce_amigo;
    private $data_pedido;
    
    //
    public function getId_pedido_amizade() {
        return $this->id_pedido_amizade;
    }
    public function setId_pedido_amizade($id_pedido_amizade) {
        $this->id_pedido_amizade = $id_pedido_amizade;
    }
    //
    public function getCe_amigo() {
        return $this->ce_amigo;
    }
    public function setCe_amigo($ce_amigo) {
        $this->ce_amigo = $ce_amigo;
    }
    //
    public function getData_pedido() {
        return $this->data_pedido;
    }
    public function setData_pedido($data_pedido) {
        $this->data_pedido = $data_pedido;
    }
    //    
}
