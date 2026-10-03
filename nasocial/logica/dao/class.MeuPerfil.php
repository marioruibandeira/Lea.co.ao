<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/conexao/cnx.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UtilidadeDAO.php');
    //
    class MeuPerfil
    {
        function ValidacaoDeExistenciaMeuPerfil($fk_utilizado)
        {
            $connection = new cnx();
            $Utilidade = new UtilidadeDAO();
            $connection->connect();  
            $fk_utilizado_ = $Utilidade->Decodificar($fk_utilizado);
                
            $query = "SELECT user_id FROM tblutilizador_artista WHERE user_id = $fk_utilizado_";
            $result = mysqli_query($connection->myconn,$query);
            //
            if(mysqli_num_rows($result) > 0){
                while($row =  mysqli_fetch_object($result)){
                    return true;
                }
            }else{
                return false;
            }
            $connection->close($connection->myconn);
        }    
    }
?>