<?php
/**
 * Description of class
 *
 * @author Mario Bandeira
 */
include_once($_SERVER['DOCUMENT_ROOT'].'/conexao/cnx.php');

class Idioma {
    private $id_idioma;
    public function setId_idioma($id_idioma) {
        $this->id_idioma = $id_idioma;
    }
    public function getId_idioma() {
        return $this->id_idioma;
    }
    //
    private $idioma;
    public function setIdioma($idioma){
        $this->idioma = $idioma;
    }
    public function getIdioma(){
        return $this->idioma;
    }
    //
    function idIdiomaSelecionado($ce_usuario){
        $connection = new cnx();
        $connection->connect();
        
        $query = 'SELECT * FROM tblpreferencia WHERE ce_usuario = "'.$ce_usuario.'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                $id_idioma = $row->ce_idioma;
                return $id_idioma;                
            }
        }        
    }
    //
    public function listarIdioma($ce_usuario) {
        $connection = new cnx();
        $connection->connect();
            	
        $query = 'SELECT * FROM tblidioma';
        $result = mysqli_query($connection->myconn,$query);
			
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                $this->setId_idioma($row->id_idioma);
                $this->setIdioma($row->idioma);
                ?> 
                    <option <?php if ($this->idIdiomaSelecionado($ce_usuario) == $row->id_idioma ) echo 'selected' ;?> value="<?php print $this->getId_idioma();?>">
                        <?php print $this->getIdioma();?>
                    </option> 
                <?php
            }
        }else{
            print "Esta provincia nao existe!";				
        }
    }
    //
//    function idiomaPreferido($ce_usuario){
//        $connection = new cnx();
//        $connection->connect();
//            	
//        $query = 'SELECT * FROM tblpreferencia WHERE ce_usuario = "' . $ce_usuario . '"';
//        $result = mysqli_query($connection->myconn,$query);
//			
//        if(mysqli_num_rows($result) > 0){
//            while($row =  mysqli_fetch_object($result)){
//                $idioma_preferido =  $row->idioma;
//                return $idioma_preferido;
//            }
//        }
//    }
    //
    function idiomaPreferencia($c_usuario){
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($c_usuario);	
        $query = 'SELECT * FROM tblpreferencia WHERE ce_usuario = "' . $ce_usuario . '"';
        $result = mysqli_query($connection->myconn,$query);
			
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                $idioma_preferido =  $row->ce_idioma;
                return $idioma_preferido;
            }
        }
    }
    //
    function idiomaSelecionadoLables($lable,$idioma){
        $connection = new cnx();
        $connection->connect();
            	
        $query = 'SELECT lable FROM tblidioma_lable WHERE ce_lable = "' . $lable . '" AND ce_idioma = "' . $idioma . '"';
        $result = mysqli_query($connection->myconn,$query);
			
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                print $row->lable;
            }
        }
    }
    //
}
