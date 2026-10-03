<?php
    //Carregar Ficheiros Necessários
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UtilidadeDAO.php');
    $util = new UtilidadeDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/login/Login.php');
    $login = new Login();
    //Variaveis Globais
    
    //Metodos, Funções e variaveis Locais
    if($util->getUseragent() === $login->VerificarAgente($util->getUseragent())){
        print "LOGADO COM O AGENTE" . $login->VerificarAgenteUserId($util->getUseragent());
    }
?>