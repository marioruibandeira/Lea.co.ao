<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.AgendaEventoDAO.php');
    $agenda_dao = new AgendaEventoDAO();

    $id_agen = is_int(intval($_GET['id_agen'])) ? trim($_GET['id_agen']) : '';
    $usuario_f = is_string($_GET['u_e']) ? trim($_GET['u_e']) : '';
    
   if($agenda_dao->eliminarEvento($id_agen)){
        print "Evento eliminado com sucesso!";
        echo '<script type="text/javascript"> window.location = "https://www.lea.co.ao/nasocial/loja/agendar.php?u_e='.$usuario_f.'&acao=1" </script>';
    }
    
?>