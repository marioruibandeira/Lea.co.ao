<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/conexao/cnx.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UtilidadeDAO.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Reacoes.php');
    //
    class ReacoesDAO
    {
        function ValidarExistenciaDeEmojisAmei($id_linha_tempo_,$user_id_){
            $connection = new cnx();
            $connection->connect();
            $UtilidadeDAO = new UtilidadeDAO();
            //
            $id_linha_tempo = $UtilidadeDAO->Decodificar($id_linha_tempo_);
            $user_id = $UtilidadeDAO->Decodificar($user_id_);
            //
            $query = "SELECT COUNT(id_linha_tempo) AS total_amei FROM tbllinha_tempo_reacoes WHERE id_linha_tempo = $id_linha_tempo AND id_emojis = 1 AND user_id = $user_id ";
            $result = mysqli_query($connection->myconn,$query);
            //if records present
            if (mysqli_num_rows($result) > 0){
                 while($row = mysqli_fetch_object($result))
                 {
                     return $row->total_amei;
                 }
            }
        }
        //
        function TotalReacoesAmei($id_linha_tempo_,$reacoes){
            $connection = new cnx();
            $connection->connect();
            $UtilidadeDAO = new UtilidadeDAO();
            //
            $id_linha_tempo = $UtilidadeDAO->Decodificar($id_linha_tempo_);
            //
            $query = "SELECT COUNT(id_linha_tempo) AS total_amei FROM tbllinha_tempo_reacoes WHERE id_linha_tempo = $id_linha_tempo AND id_emojis = $reacoes";
            $result = mysqli_query($connection->myconn,$query);
            //if records present
            if (mysqli_num_rows($result) > 0){
                 while($row = mysqli_fetch_object($result))
                 {
                     return $row->total_amei;
                 }
            }
        }
        //
        function TotalReacoesEngracado($id_linha_tempo_,$reacoes){
            $connection = new cnx();
            $connection->connect();
            $UtilidadeDAO = new UtilidadeDAO();
            //
            $id_linha_tempo = $UtilidadeDAO->Decodificar($id_linha_tempo_);
            //
            $query = "SELECT COUNT(id_linha_tempo) AS total_amei FROM tbllinha_tempo_reacoes WHERE id_linha_tempo = $id_linha_tempo AND id_emojis = $reacoes";
            $result = mysqli_query($connection->myconn,$query);
            //if records present
            if (mysqli_num_rows($result) > 0){
                 while($row = mysqli_fetch_object($result))
                 {
                     return $row->total_amei;
                 }
            }
        }
        //
        function TotalReacoesTriste($id_linha_tempo_,$reacoes){
            $connection = new cnx();
            $connection->connect();
            $UtilidadeDAO = new UtilidadeDAO();
            //
            $id_linha_tempo = $UtilidadeDAO->Decodificar($id_linha_tempo_);
            //
            $query = "SELECT COUNT(id_linha_tempo) AS total_amei FROM tbllinha_tempo_reacoes WHERE id_linha_tempo = $id_linha_tempo AND id_emojis = $reacoes";
            $result = mysqli_query($connection->myconn,$query);
            //if records present
            if (mysqli_num_rows($result) > 0){
                 while($row = mysqli_fetch_object($result))
                 {
                     return $row->total_amei;
                 }
            }
        }
        //
        function TotalReacoesSupreso($id_linha_tempo_,$reacoes){
            $connection = new cnx();
            $connection->connect();
            $UtilidadeDAO = new UtilidadeDAO();
            //
            $id_linha_tempo = $UtilidadeDAO->Decodificar($id_linha_tempo_);
            //
            $query = "SELECT COUNT(id_linha_tempo) AS total_amei FROM tbllinha_tempo_reacoes WHERE id_linha_tempo = $id_linha_tempo AND id_emojis = $reacoes";
            $result = mysqli_query($connection->myconn,$query);
            //if records present
            if (mysqli_num_rows($result) > 0){
                 while($row = mysqli_fetch_object($result))
                 {
                     return $row->total_amei;
                 }
            }
        }
        //
        function TotalReacoesChateado($id_linha_tempo_,$reacoes){
            $connection = new cnx();
            $connection->connect();
            $UtilidadeDAO = new UtilidadeDAO();
            //
            $id_linha_tempo = $UtilidadeDAO->Decodificar($id_linha_tempo_);
            //
            $query = "SELECT COUNT(id_linha_tempo) AS total_amei FROM tbllinha_tempo_reacoes WHERE id_linha_tempo = $id_linha_tempo AND id_emojis = $reacoes";
            $result = mysqli_query($connection->myconn,$query);
            //if records present
            if (mysqli_num_rows($result) > 0){
                 while($row = mysqli_fetch_object($result))
                 {
                     return $row->total_amei;
                 }
            }
        }
        //
        public function InserirEmojisPublicacao(Reacoes $Reacoes){
            $connection = new cnx();
            $connection->connect();
            $UtilidadeDAO = new UtilidadeDAO();
            //
            $utilizador = $UtilidadeDAO->Decodificar($Reacoes->getUser_id());
            $id_linha_tempo = $UtilidadeDAO->Decodificar($Reacoes->getId_linha_tempo());
            //
            $string = "INSERT INTO tbllinha_tempo_reacoes (id_emojis,user_id,id_linha_tempo) VALUES (?,?,?)";
            $stmt = mysqli_prepare($connection->myconn, $string);
            $stmt->bind_param("iii", $Reacoes->getId_emojis(),$utilizador,$id_linha_tempo);
            $sucesso = $stmt->execute();
            echo("<script>console.log('PHP: Reação Inserido Com Sucesso');</script>");
            return $sucesso;
            $stmt->close($connection->myconn);  
        }
        //
        function EliminarEmojis(Reacoes $Reacoes) {
            $UtilidadeDAO = new UtilidadeDAO();
            $connection = new cnx();
            $connection->connect();
            //
            $utilizador = $UtilidadeDAO->Decodificar($Reacoes->getUser_id());
            $id_linha_tempo = $UtilidadeDAO->Decodificar($Reacoes->getId_linha_tempo());
            //
            $sqlQuery  =  "DELETE FROM tbllinha_tempo_reacoes WHERE id_linha_tempo = ? AND user_id = ?";
            $statement =  $connection->myconn->prepare($sqlQuery);
            $statement->bind_param("ii", $id_linha_tempo,$utilizador);
            echo("<script>console.log('PHP: Amei eliminado com sucesso!');</script>");
            $sucesso = $statement->execute();
            return $sucesso;
            $statement->close($connection->myconn); 
        }
        //
        function ValidarExistenciaDeEmojisEngracado($id_linha_tempo_,$user_id_){
            $connection = new cnx();
            $connection->connect();
            $UtilidadeDAO = new UtilidadeDAO();
            //
            $id_linha_tempo = $UtilidadeDAO->Decodificar($id_linha_tempo_);
            $user_id = $UtilidadeDAO->Decodificar($user_id_);
            //
            $query = "SELECT COUNT(id_linha_tempo) AS total_amei FROM tbllinha_tempo_reacoes WHERE id_linha_tempo = $id_linha_tempo AND id_emojis = 2 AND user_id = $user_id ";
            $result = mysqli_query($connection->myconn,$query);
            //if records present
            if (mysqli_num_rows($result) > 0){
                 while($row = mysqli_fetch_object($result))
                 {
                     return $row->total_amei;
                 }
            }
        }
        //
        function ValidarExistenciaDeEmojisTriste($id_linha_tempo_,$user_id_){
            $connection = new cnx();
            $connection->connect();
            $UtilidadeDAO = new UtilidadeDAO();
            //
            $id_linha_tempo = $UtilidadeDAO->Decodificar($id_linha_tempo_);
            $user_id = $UtilidadeDAO->Decodificar($user_id_);
            //
            $query = "SELECT COUNT(id_linha_tempo) AS total_amei FROM tbllinha_tempo_reacoes WHERE id_linha_tempo = $id_linha_tempo AND id_emojis = 3 AND user_id = $user_id ";
            $result = mysqli_query($connection->myconn,$query);
            //if records present
            if (mysqli_num_rows($result) > 0){
                 while($row = mysqli_fetch_object($result))
                 {
                     return $row->total_amei;
                 }
            }
        }
        //
        function ValidarExistenciaDeEmojisChateado($id_linha_tempo_,$user_id_){
            $connection = new cnx();
            $connection->connect();
            $UtilidadeDAO = new UtilidadeDAO();
            //
            $id_linha_tempo = $UtilidadeDAO->Decodificar($id_linha_tempo_);
            $user_id = $UtilidadeDAO->Decodificar($user_id_);
            //
            $query = "SELECT COUNT(id_linha_tempo) AS total_amei FROM tbllinha_tempo_reacoes WHERE id_linha_tempo = $id_linha_tempo AND id_emojis = 5 AND user_id = $user_id ";
            $result = mysqli_query($connection->myconn,$query);
            //if records present
            if (mysqli_num_rows($result) > 0){
                 while($row = mysqli_fetch_object($result))
                 {
                     return $row->total_amei;
                 }
            }
        }
        //
        function ValidarExistenciaDeEmojisSupreso($id_linha_tempo_,$user_id_){
            $connection = new cnx();
            $connection->connect();
            $UtilidadeDAO = new UtilidadeDAO();
            //
            $id_linha_tempo = $UtilidadeDAO->Decodificar($id_linha_tempo_);
            $user_id = $UtilidadeDAO->Decodificar($user_id_);
            //
            $query = "SELECT COUNT(id_linha_tempo) AS total_amei FROM tbllinha_tempo_reacoes WHERE id_linha_tempo = $id_linha_tempo AND id_emojis = 6 AND user_id = $user_id ";
            $result = mysqli_query($connection->myconn,$query);
            //if records present
            if (mysqli_num_rows($result) > 0){
                 while($row = mysqli_fetch_object($result))
                 {
                     return $row->total_amei;
                 }
            }
        }
    }