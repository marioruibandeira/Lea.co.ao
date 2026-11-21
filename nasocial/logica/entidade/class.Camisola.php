<?php
/**
 * Description of class
 *
 * @author hash
 */
class Camisola {
    //private $id_camisola;
    private $marca_modelo;
    public function getMarca_modelo(){
        return $this->marca_modelo;
    }
    public function setMarca_modelo($marca_modelo) {         
        $this->marca_modelo = $marca_modelo;
    }
//    public function getId_camisola() {      
//        return $this->Id_camisola;    
//    }
//    public function setId_camisola($id_camisola){
//        if(!is_int($id_camisola) || is_int($id_camisola) == 0) {        
//            throw new Exception("Valor Invalido!");      
//        }          
//        $this->id_camisola = $id_camisola;
//    }
}

?>