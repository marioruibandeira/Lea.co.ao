<?php
/**
 * Description of Utilidade
 *
 * @author hash
 */
include_once($_SERVER['DOCUMENT_ROOT'].'/conexao/cnx.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UsuarioDAO.php');
class UtilidadeDAO {
    function anoActual(){
        $connection = new cnx();
        $connection->connect();
        
        $query = 'select YEAR(CURDATE()) AS ano_actual';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                print $row->ano_actual;
                echo("<script>console.log('PHP: Telefone inserido com sucesso!". $row->ano_actual ."');</script>");	
            }
        }
    }
    //
    function getUseragent()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $hostname = gethostbyaddr($ip);
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        
        /*
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version= "";
    
        //First get the platform?
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'linux';
        }
        elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        }
        elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }
       
        // Next get the name of the useragent yes seperately and for good reason
        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Internet Explorer';
            $ub = "MSIE";
        }
        elseif(preg_match('/Firefox/i',$u_agent))
        {
            $bname = 'Mozilla Firefox';
            $ub = "Firefox";
        }
        elseif(preg_match('/Chrome/i',$u_agent))
        {
            $bname = 'Google Chrome';
            $ub = "Chrome";
        }
        elseif(preg_match('/Safari/i',$u_agent))
        {
            $bname = 'Apple Safari';
            $ub = "Safari";
        }
        elseif(preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Opera';
            $ub = "Opera";
        }
        elseif(preg_match('/Netscape/i',$u_agent))
        {
            $bname = 'Netscape';
            $ub = "Netscape";
        }
       
        // finally get the correct version number
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
            // we have no matching number just continue
        }
       
        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
                $version= $matches['version'][0];
            }
            else {
                $version= $matches['version'][1];
            }
        }
        else {
            $version= $matches['version'][0];
        }
       
        // check if we have a number
        if ($version==null || $version=="") {$version="?";}
        */
        return $hostname.$u_agent;
        //   $agente = $u_agent ." ".$bname." ".$version." ".$platform;
       
    }
    //
    function Codificar($incripcao)
    {
        $incripcao_ = Base64_encode($incripcao);
        return $incripcao_;
    }
    function Decodificar($deciripcao)
    {
        $deciripcao_ = Base64_decode($deciripcao);  
        return $deciripcao_;
    }
    //
    function AmigosQueTavesConheces($usuario,$sessao,$quantidade)
    {
        $u_l = new UsuarioDAO();
        ?>
            <div class="clever-core-ads">
             <div style="border-bottom:#ccc dotted 1px;">   <h2>Hoops, você não tem nenhum pedido de amizade agora....</h2></div>
                <div class="widget-header widget-header-small">
                    <h4 class="widget-title blue smaller"> <i class="ace-icon fa fa-users orange"></i> Pessoas que talvez conheces </h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main padding-8">
                        <div id="profile-feed-1" class="profile-feed"><?php $u_l->listarAmingosPerfil($usuario,$sessao,$quantidade); ?></div>
                    </div>
                </div>
            </div>
        <?php
    }
    //
    function RedirecionamentoPrincipal(){
        echo '<script type="text/javascript"> window.location = "/nasocial/" </script>'; 
    }
    //
    function MainSideMenu($n_usuario){
        $connection = new cnx();
        $connection->connect();
        $u_f = base64_decode($n_usuario);
        $caminho = "/nasocial/imgs/perfil/";
        
        ?>
            <ul class="list-group list-group-flush" style="margin-bottom:0px;">
                <li class="list-group-item main-li">
                    <?php
                        $query = 'SELECT * FROM  tblsite_user_info WHERE ce_usuario = "'.$u_f.'"';
                        $result = mysqli_query($connection->myconn,$query);
                        //if records present
                        if(mysqli_num_rows($result) > 0){
                            while($row =  mysqli_fetch_object($result)){
                                if($caminho != $row->fotoPerfil && $row->fotoPerfil != '' && $row->fotoPerfil != null)
                                {
                                    ?> <img class="nav-user-photo" alt="Foto do Utilizador" src="<?php print $row->fotoPerfil;   ?>" style="border-radius: 50%;width:30px;height:30px;"/><?php
                                }else if($row->ce_sexo == 1)
                                {
                                    ?> <img class="nav-user-photo" alt="Foto do Utilizador" src="/nasocial/assets/images/avatars/avatar.png"  style="border-radius: 50%;width:30px;height:30px;"/><?php
                                }else if($row->ce_sexo == 2)
                                {
                                    ?> <img class="nav-user-photo" alt="Foto do Utilizador" src="/nasocial/assets/images/avatars/avatar3.png" style="border-radius: 50%;width:30px;height:30px;"/><?php
                                }else{
                                    ?> <img class="nav-user-photo" alt="Foto do Utilizador" src="/nasocial/assets/images/avatars/avatar2.png" style="border-radius: 50%;width:30px;height:30px;"/><?php   
                                }          
                            }            
                        }
                    ?>
                    <a href="/nasocial/perfil.php?ses=MjE="><span style="font-weight:bolder;font-size:16px;padding-top:20px;">Meu Perfil</span></a>
                </li>
                <li class="list-group-item main-li">
                    <a href="/nasocial/minhas-musicas/"><span class="glyphicon glyphicon-headphones icons-tag"></span> <span class="txt-meuno">Minhas Músicas</span></a>
                </li>
                <li class="list-group-item main-li">
                    <span class="glyphicon glyphicon-user icons-tag"><a href="/nasocial/meus-amigos/"></span> <span class="txt-meuno">Meus Amigos</span></a>
                </li>
                <li class="list-group-item main-li">
                    <a href="/nasocial/usuario/chat.php?onchat=0"><span class="glyphicon glyphicon-envelope icons-tag"></span> <span class="txt-meuno">Minhas Mensagens</span></a>
                </li>
                <li class="list-group-item main-li" >
                    <a href="/nasocial/artistas-que-sigo/"><span class="glyphicon glyphicon-star icons-tag"></span> <span class="txt-meuno">Artistas Que Sigo</span></a>
                </li>
                <li class="list-group-item main-li">
                    <a href="/nasocial/meus-livros/"><span class="glyphicon glyphicon-book icons-tag"></span> <span class="txt-meuno">Meus Livros</span></a>
                </li>
                <li class="list-group-item main-li">
                    <a href="/nasocial/minha-discografia/"> <span class="glyphicon glyphicon-music icons-tag"></span> <span class="txt-meuno">Minha Discografia</span></a>
                </li>
            </ul>
        <?php
    }
    //
    function SideMenuProdutosAvendas($n_usuario){
        ?>
            <div style="border-bottom:#ccc solid 1px; border-top:#ccc solid 1px; font-weight:bolder;">
                MINHA KITANDA
            </div>
            <!--//-->
            <ul class="list-group list-group-flush" style="margin-bottom:0px;">
                <!--<li class="list-group-item main-li">
                    <a href="/nasocial/view/mmusica/minha-musica.php?start=0&ritm=0"><span class="glyphicon glyphicon-bookmark icons-tag"></span> <span class="txt-meuno">Recordações</span></a>
                    <a href="/nasocial/loja/recordacoes.php"><span class="glyphicon glyphicon-bookmark icons-tag"></span> <span class="txt-meuno">Recordações</span></a>
                </li>-->
                <li class="list-group-item main-li">
                    <a href="/nasocial/loja/discografia.php?acao=3"><span class="glyphicon glyphicon-cd icons-tag"></span> <span class="txt-meuno">Obras Discográficas</span></a>
                </li>
                <li class="list-group-item main-li" >
                    <a href="/nasocial/loja/agendar.php?acao=3"><span class="glyphicon glyphicon-list-alt icons-tag"></span> <span class="txt-meuno">Ingressos</span></a>
                </li>
                <li class="list-group-item main-li">
                    <a href="/nasocial/loja/livros.php?acao=3"><span class="glyphicon glyphicon-book icons-tag"></span> <span class="txt-meuno">Livros</span></a>
                </li>
                <!--<li class="list-group-item main-li">
                    <a href="https://www.lea.co.ao/nasocial/loja/cursos-formacoes.php"><span class="glyphicon glyphicon-certificate icons-tag"></span> <span class="txt-meuno">Cursos e Formações</span></a>
                </li>-->
                <li class="list-group-item main-li" >
                    <a href="https://www.lea.co.ao/nasocial/loja/catalogo.php?cat=1&us=<?php print $n_usuario;   ?>"><span class="glyphicon glyphicon-th icons-tag"></span> <span class="txt-meuno">Catalogo</span></a>
                </li>
                <li class="list-group-item main-li" >
                    <a href="https://www.lea.co.ao/nasocial/loja/kitanda-dos-outros.php?cat=1&us=<?php print $n_usuario;   ?>"><span class="glyphicon glyphicon-shopping-cart  icons-tag"></span> <span class="txt-meuno">Kitanda Dos Outros</span></a>
                </li>
                <li class="list-group-item main-li">
                    <a href="https://www.lea.co.ao/nasocial/loja/relatorio.php"><span class="glyphicon glyphicon-equalizer icons-tag"></span> <span class="txt-meuno">Finanças</span></a>
                </li>
                <li class="list-group-item main-li">
                    <a href="https://www.lea.co.ao/nasocial/loja/carteira-digital/"><span class="glyphicon glyphicon glyphicon-briefcase icons-tag"></span> <span class="txt-meuno">Carteira Digital</span></a>
                </li>
            </ul>
        <?php
    }
    //
    function SideMenuContaLea(){
        ?>
            <div style="border-bottom:#ccc solid 1px; border-top:#ccc solid 1px; font-weight:bolder;">
                CONTA NA LEA
            </div>
            <!--//-->                    
            <ul class="list-group list-group-flush">
                <li class="list-group-item main-li">
                    <a href="https://lea.co.ao/"><span class="glyphicon glyphicon-hand-right icons-tag"></span> <span class="txt-meuno">Lea.co.ao</span></a>
                </li>
                <li class="list-group-item main-li">
                    <a href="/nasocial/meu-perfil/"><span class="glyphicon glyphicon-edit icons-tag"></span> <span class="txt-meuno">Meu Perfil</span></a>
                </li>
                <li class="list-group-item main-li">
                    <a href="/nasocial/minhas-promocoes/musicas-em-destaque/"><span class="glyphicon glyphicon-flag icons-tag"></span> <span class="txt-meuno">Música Em Destaque</span></a>
                </li>
                <li class="list-group-item main-li" >
                    <a href="https://www.lea.co.ao/nasocial/publicidades/"><span class="glyphicon glyphicon-screenshot icons-tag"></span> <span class="txt-meuno">Publicidades</span></a>
                </li>
                <li class="list-group-item main-li" >
                    <a href="https://lea.co.ao/loja/encomendas.php"><span class="glyphicon glyphicon-gift icons-tag"></span> <span class="txt-meuno">Encomendas</span></a>
                </li>
            </ul>
        <?php
    }
    //
}
