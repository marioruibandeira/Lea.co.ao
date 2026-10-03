<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/conexao/cnx.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.PerfilDoArtista.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/logica/dao/class.UtilidadesDAO.php');
    
    class PerfilDoArtistaDAO
    {
        function ActualizarActualizacoesPerfil(PerfilDoArtista $PerfilDoArtista)
        {
            $connection = new cnx();
            $connection->connect();
            $UtilidadesDAO = new UtilidadesDAO();
            
            $actua = $PerfilDoArtista->getActualizacoes();
            $ce_artista = $PerfilDoArtista->getCe_artista();
            
            $query = "UPDATE artistas set actua = '$actua' WHERE artID = $ce_artista";  
            mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));
            
            $connection->close($connection->myconn);
            return array("actua" => $actua, "ce_artista" => $ce_artista);
            //return $actua;
        }
        
        function ActualizacaoArtistaNasocial($ce_artista)
        {
            $connection = new cnx();
            $connection->connect();
                 
            $query = "SELECT actua,artID FROM artistas WHERE artID = $ce_artista";
            $result = mysqli_query($connection->myconn,$query);
            
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_object($result))
                {
                    $connection->close($connection->myconn);
                    return $row->actua;
                }
            }else{
                $connection->close($connection->myconn);
                return " ";
            }
        }
    }
?>