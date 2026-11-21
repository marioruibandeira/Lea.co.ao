<?php
/**
 * Description of cpbd
 * 
 * Conectar a base de dados
 *
 * @author Mário Bandeira
 * 
 * V 0.1
 */
class Conexao {
    private $hospede = "localhost";
    private $usuario = "leacoypv_hash";
    private $chave = "contraband01";
    private $baseDeDado = "leacoypv_lea";
    
    private $link = null;
    
    function DatabaseConnector(){}
    
    private function connect(){
        $this->link = mysql_connect($this->hospede, $this->usuario, $this->chave);
        mysql_set_charset('utf8', $this->link);

        mysql_select_db($this->baseDeDado, $this->link);
    }
    
    /**
     *Coneccao para a Basededados
     * @access private
     * @return a basededados link, para ser usar e outras chamadas ao sql 
     */

    public function gc(){
        if($this->link == null){
            $this->connect();
        } 
        return $this->link;
    }
}
