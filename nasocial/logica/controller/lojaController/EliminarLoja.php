<?php
    //
    include_once($_SERVER['DOCUMENT_ROOT'].'/lea/nasocial/logica/dao/loja/class.LivrosDAO.php');
    $dao_livro = new LivrosDAO();
    //variaveis
    $eliminar = is_string($_GET['elimi']) ? trim($_GET['elimi']) : '';
    //
    if($dao_livro->eliminarLivro(base64_decode($eliminar))){
        print_r("sucesso");
        header('Refresh: 0; URL=http://www.lea.co.ao/nasocial/loja/livro.php?resp=1');
    }    
    //
?>

