<?php
/**
 * Description of class
 *
 * @author hash
 */
include_once($_SERVER['DOCUMENT_ROOT'].'/conexao/cnx.php');

class Provincias {
    //id_provincia
    private $id_provincia;  
    public function setId_provincia($id_provincia) {
//        if(!is_integer($id_provincia) || strlen($id_provincia)){
//            throw new Exception("Chave invalida!");
//        }
        $this->id_provincia = $id_provincia;
    }
    public function getId_provincia() {
        return $this->id_provincia;
    }
    //provincia
    private $provincia;
    public function setProvincia($provincia) {
        $this->provincia = $provincia;
    }
    public function getProvincia() {
        return $this->provincia;
    }
    
    public function listarProvincias() {
        $connection = new cnx();
        $connection->connect();
            	
        $query = 'SELECT * FROM provincia WHERE id_provincia != 17 ORDER BY provincia ASC';
        $result = mysqli_query($connection->myconn,$query);
			
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                $this->setId_provincia($row->id_provincia);
                $this->setProvincia($row->provincia);
                ?> <option value="<?php print $this->getId_provincia();?>"><?php print strtoupper($this->getProvincia());?></option> <?php
            }
        }else{
            print "Esta provincia nao existe!";				
        }
        $connection->close($connection->myconn);
    }
    //
    function idProvincia($ce_usuario){
        $connection = new cnx();
        $connection->connect();
        
        $query = 'SELECT * FROM tblsite_user_info WHERE ce_usuario = "'.$ce_usuario.'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                $id_pro = $row->ce_local;
                return $id_pro;
            }
        }
        $connection->close($connection->myconn);
    }
    //<?php if ($this->idProvincia($ce_usuario) == $row->id_provincia ) echo 'selected' ; 
    public function listarProvinciasUsuario($n_usuario) {
        $connection = new cnx();
        $connection->connect();
        $ce_usuario = base64_decode($n_usuario);
            	
        $query = 'SELECT * FROM provincia WHERE id_provincia != 17 ORDER BY provincia ASC';
        $result = mysqli_query($connection->myconn,$query);
			
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                $this->setId_provincia($row->id_provincia);
                $this->setProvincia($row->provincia);
                ?>
                    <option <?php if ($this->idProvincia($ce_usuario) == $row->id_provincia ) echo 'selected' ;?> value="<?php print $this->getId_provincia();?>">
                        <?php print strtoupper($this->getProvincia());?>
                    </option> 
                <?php
            }
        }else{
            print "Esta provincia nao existe!";				
        }
        $connection->close($connection->myconn);
    }
}
