<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/conexao/cnx.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Comentarios.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Comentarios.php');
    //
    class ComentariosDAO
    {
        public function inserirComentario(Comentarios $Comentario )  
        {  
            $connection = new cnx();
            $connection->connect();
            //
            $string = "INSERT INTO tblcomentario_post(fk_publicacao,fk_utilizador ,comentario) VALUES (?,?,?)"; 
            $stmt = mysqli_prepare($connection->myconn, $string);
            $stmt->bind_param("iis", base64_decode($Comentario->getId_comentario_post()),base64_decode($Comentario->getFk_utilizador()),$Comentario->getComentario());
            $sucesso = $stmt->execute();
            //echo("<script>console.log('PHP: Comentario Inserido Com Sucesso! " . base64_decode($Comentario->getFk_utilizador()) . " ');</script>");
            return $sucesso;
        }
        //
        function TotalDeComentarios($fk_publicacao){
            $connection = new cnx();
            $connection->connect();
            $fk_publicacao_ = base64_decode($fk_publicacao);
            $query = "SELECT COUNT(fk_publicacao) as total_comentarios FROM vw_nas_comentarios WHERE fk_publicacao = $fk_publicacao_";
            $result = mysqli_query($connection->myconn,$query);
            //if records present
            if (mysqli_num_rows($result) > 0){
                 while($row = mysqli_fetch_object($result))
                 {
                     return $row->total_comentarios;
                 }
            }
        }
        //
        function VerificarExistenGostoPublicacao($fk_linha_tempo, $fk_utilizador){
            $res = "";
            $connection = new cnx();
            $connection->connect();
            $fk_linha_tempo_ = base64_decode($fk_linha_tempo);
            $fk_utilizador_ = base64_decode($fk_utilizador);
            //
            $query = "SELECT * FROM tblcomentario_gostos WHERE fk_linha_tempo = $fk_linha_tempo_ AND fk_utilizador = $fk_utilizador_";
            $result = mysqli_query($connection->myconn,$query);
            //
            if(empty($result)) { 
                echo("<script>console.log('PHP: eu estou nulo.');</script>");
            }else{
                 while($row = mysqli_fetch_object($result)){
                    return $res = 1;
                }    
            }
            return $res = 0;
            $result->close($connection->myconn);   
        }
        //
        public function InserirGostoPublicacao(Comentarios $comentarios){
            $connection = new cnx();
            $connection->connect();
            //
            $fk_linha_tempo_ = base64_decode($comentarios->getId_comentario_post());
            $fk_utilizador_ = base64_decode($comentarios->getFk_utilizador());
            //
            $string = "INSERT INTO tblcomentario_gostos (fk_linha_tempo, fk_utilizador) VALUES (?,?)";
            $stmt = mysqli_prepare($connection->myconn, $string);
            $stmt->bind_param("ii", $fk_linha_tempo_,$fk_utilizador_);
            $sucesso = $stmt->execute();
            echo("<script>console.log('PHP: Curtição inserido com sucesso');</script>");
            return $sucesso;
            $stmt->close($connection->myconn);  
        }
        //
        function EliminarGostoPublicacao(Comentarios $comentarios) {
            $connection = new cnx();
            $connection->connect();
            $fk_linha_tempo_ = base64_decode($comentarios->getId_comentario_post());
            $fk_utilizador_ = base64_decode($comentarios->getFk_utilizador());
            //
            $sqlQuery  =  "DELETE FROM tblcomentario_gostos WHERE fk_linha_tempo = ? AND fk_utilizador = ?";
            $statement =  $connection->myconn->prepare($sqlQuery);
            $statement->bind_param("ii", $fk_linha_tempo_,$fk_utilizador_);
            echo("<script>console.log('PHP: Curtição eliminado com sucesso!');</script>");
            $sucesso = $statement->execute();
            return $sucesso;
            $statement->close($connection->myconn); 
        }
        //
        function TotalDeCurtidasComentarios($fk_publicacao){
            $connection = new cnx();
            $connection->connect();
            $fk_publicacao_ = base64_decode($fk_publicacao);
            $query = "SELECT COUNT(fk_utilizador) as total_comentarios_curtidos FROM tblcomentario_gostos WHERE fk_linha_tempo = $fk_publicacao_";
            $result = mysqli_query($connection->myconn,$query);
            //if records present
            if (mysqli_num_rows($result) > 0){
                 while($row = mysqli_fetch_object($result))
                 {
                     return $row->total_comentarios_curtidos;
                 }
            }
        }
    }
?>