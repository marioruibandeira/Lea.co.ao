<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of class
 *
 * @author Mário Bandeira
 */
include_once($_SERVER['DOCUMENT_ROOT'].'/conexao/cnx.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Camisola.php');
//
class CamisolaDAO {
    function listarEventosPorUsuario($ce_usuario,$inicio,$u_e) {
        $connection = new cnx(); 
        $connection->connect();
					
	$query = "SELECT * FROM vwagenda_na_lea WHERE ce_usuario = $ce_usuario GROUP BY id_agenda_evento ORDER BY id_agenda_evento DESC limit $start, $records_per_page";
        $result = mysqli_query($connection->myconn,$query);
            
        while($row = mysqli_fetch_object($result)){
                
        }		
    }
}
