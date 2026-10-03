<?php
//Controlador que responsabiliza em gravar, eliminar e por aí
//Autor : Mário Bandeira
//Data : 10/03/2023
//Ultima actualização : 10/03/2023
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.AgendaEvento.php');
$AGENDA_EVENTO = new AgendaEvento();
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/utilidades/class.Provincias.php');
$prvncia = new Provincias();
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Telefone.php');
$tlfn = new Telefone();
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.AgendaEventoDAO.php');
$inserirDados = new AgendaEventoDAO();
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.SiteUserInfo.php');
$usuario = new SiteUserInfo();
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.Usuario.php');
$UTILIZADORES_ = new Usuario();
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/login/Login.php');
$id_u = new Login();
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/lojaonline/NovoProduto.php');
$novo_p = new NovoProduto();
// ($agnd)
//$AGENDA_EVENTO->setTitulo_evento($inserirDados->TituloDoEvento((trim($_POST['agnd'])))) ;
$AGENDA_EVENTO->setTitulo_evento(is_string($_POST['ttulo']) ? trim($_POST['ttulo']) : '');
$AGENDA_EVENTO->setId(trim($_POST['id']));
$AGENDA_EVENTO->setData_evento(is_string($_POST['data_agenda']) ? trim($_POST['data_agenda']) : '');
$AGENDA_EVENTO->setQuantidade(is_string($_POST['qnt']) ? trim($_POST['qnt']) : '');
$AGENDA_EVENTO->setPreco_agenda(isset($_POST['preco']) ? trim($_POST['preco']) : '');
$usuario_f = is_int(intval($_POST['ut'])) ? trim($_POST['ut']) : '';

$UTILIZADORES_->setUser_id($usuario_f);

if($inserirDados->existEventos($UTILIZADORES_->getUser_id(),$AGENDA_EVENTO->getId()) > 0){
    print "Este evento já existe!<br/>"; 
    echo '<script type="text/javascript"> window.location = "https://www.lea.co.ao/nasocial/loja/agendar.php?u_e='.$usuario_f.'&acao=3" </script>';
}else{
    if($inserirDados->insertEvento($AGENDA_EVENTO,$UTILIZADORES_))
    {
        print "Agendamento Inserido com sucesso!<br/>"; 
        //
        $chave_usuario = $UTILIZADORES_->getUser_id();
        $cat_post = 2;
        $btn = '<br/><a style="width:100%; margin-top:10px;" href="https://www.lea.co.ao/nasocial/loja/carrinho.php?pro='.base64_encode($AGENDA_EVENTO->getId()).'&cat=4&us='.$UTILIZADORES_->getUser_id().'" class="btn btn-success btn-sm"> <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Comprar Ingresso</a>';
        $post = "Tenho alguns ingressos para <b>" . $AGENDA_EVENTO->getTitulo_evento() . "</b> <a href=\"https://www.lea.co.ao/nasocial/loja/ingresso.php?pro=".$AGENDA_EVENTO->getId()."&us=". $usuario_f ."\">Clica aqui para saber mais</a>$btn";
        $produto_i = base64_encode($AGENDA_EVENTO->getId());
        $img_publicacao =     $inserirDados->ImagemDoEvento($AGENDA_EVENTO->getId());
        $formato = 2;
            
        if($novo_p->inserirNaLinhaDoTempo($chave_usuario,$cat_post,$post,$produto_i,$img_publicacao,$formato))
        {
            print "Evento Listado com sucesso na linha do tempo!<br/>";
        }
        echo '<script type="text/javascript"> window.location = "https://www.lea.co.ao/nasocial/loja/agendar.php?u_e='.$usuario_f.'&acao=3" </script>';
    }
}

?>

