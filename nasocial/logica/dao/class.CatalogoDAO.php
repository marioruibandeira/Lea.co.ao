<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/logica/Utilidade.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/login/Login.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.PagarNasocial.php');
    //$PagarNasocial = new PagarNasocial();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.PagarNasocialDAO.php');
    //
    class CatalogoDAO
    {
        function limitarTexto($string,$limite)
        {
            $arr = str_split($string);
  
            for($i = 0; $i < $limite; $i++) {
                print($arr[$i]);
            }
        }

        function CategoriaCatalogo($categoria,$todos){
            $connection = new cnx();
            $connection->connect();
            
            if($todos == true)
            {
                $query = "SELECT * FROM categoria_servico WHERE id not in (1) ORDER BY id asc";   
            }
            else
            {
                $query = "SELECT * FROM categoria_servico WHERE id = $categoria and id not in (1)";
            }
            
            $result = mysqli_query($connection->myconn,$query);


            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    ?> <option value="<?php print $row->id; ?>"><?php print $row->cagegoria_servicos; ?></option> <?php 
                }
            }
            $connection->close($connection->myconn);
        }
        //
        function CatalogoPorUsuario($start,$usuario,$is_mobile,$catalogo,$categoria,$todos,$ami)
        {
            setlocale(LC_MONETARY, "de_DE");
            
            $utilidade = new Utilidade();
            
            $connection = new cnx(); 
            $connection->connect();
            $lo_in = new Login();
            $id_usuario = 0;

            $caminho = "/nasocial/view/mmusica/minha-musica.php";
            //number of page to be displayed per page
            $records_per_page = 20;

            $utilizador = base64_decode($usuario);
            $ami_ = base64_decode($ami);
            
            if($ami_ == 0){ $id_usuario = $utilizador; }else{ $id_usuario = $ami_; }

            //select and execute query to count records DATE_FORMAT(anoreg,'%d/%m/%Y') SELECT * FROM `tblagenda_evento`
            
            
            if($todos == true)
            {
                $query = "SELECT COUNT(*) FROM vw_catalogo WHERE ce_usuario = $id_usuario";   
            }else{
                $query = "SELECT COUNT(*) FROM vw_catalogo WHERE ce_usuario = $id_usuario AND categoria = $categoria";
            }   
            
            $result = mysqli_query($connection->myconn,$query);

            //get total number of records
            $row = mysqli_fetch_row($result);
            $total_records = $row[0];
            //if records exist
            if(($total_records > 0) && ($start < $total_records)) 
            {
                if($todos == true)
                {
                    $query = "SELECT * FROM vw_catalogo  WHERE ce_usuario = $id_usuario";
                }else{
                    $query = "SELECT * FROM vw_catalogo WHERE ce_usuario = $id_usuario AND categoria = $categoria";
                }
            
                $result = mysqli_query($connection->myconn,$query);
            
                while($row = mysqli_fetch_object($result))
                {
                    ?>
                        <div class="list-group col-xs-6 col-md-3">
                            <a href="#" class="list-group-item active" style="padding:0px 0px 0px 0px">
                                <div class="fix-image" style="background-image: url('<?php print $row->caminho; ?>');"></div>
                            </a>
                            <a href="#" class="list-group-item espaco">
                                <b><span class="glyphicon glyphicon-th-list"></span> <?php $limit = 0; if($is_mobile){ $limit = 10; }else{ $limit = 30; } print  $this->limitarTexto($row->evento, $limit); ?> </b>
                            </a>
                            <a href="#" class="list-group-item espaco"><b><span class="glyphicon glyphicon-tag"></span> <?php print money_format("%!n",$row->preco); ?> KZ</b></a>
                            
                            
                            <?php
                                if($usuario != $ami)
                                {
                                    ?>
                                        <a href="https://www.lea.co.ao/nasocial/usuario/per-ami.php?ami=<?php print $ami; ?>" class="list-group-item espaco">
                                            <span class="glyphicon glyphicon-user"></span> <span style="color:#774402;font-weight:bolder;"><?php $lo_in->nomeUsuarioStatuUsuario($ami); ?></span>
                                        </a>
                                    <?php
                                }
                                
                                if($usuario === $ami)
                                {
                                    ?>
                                        <a href="#" class="list-group-item espaco">
                                            <b><span class="glyphicon glyphicon-th-large"></span> <?php print  $row->qtd; ?> </b>
                                            <?php
                                            if(!$is_mobile)
                                            {
                                                ?>
                                                    <?php print  $row->descricao; if($row->qtd >1){ print "s"; } ?> <span class="badge btn-danger"><?php print  money_format("%!n",$row->qtd *  $row->preco) ; ?> Kz</span>
                                                <?php
                                            }
                                            ?>
                                        </a>
                                        <a href="https://www.lea.co.ao/nasocial/loja/carrinho.php?pro=<?php print base64_encode($row->id_servico_produto); ?>&us=<?php print $usuario; ?>&cat=<?php print $row->categoria; ?>&id=<?php print $row->id; ?>" class="list-group-item" style="padding:5px 0px 5px 0px; text-align:center; background:#007acc; color:#fff; font-size:18px;">
                                            <span class="glyphicon glyphicon-pencil"></span> Editar
                                        </a>
                                    <?php
                                }else{
                                    ?>
                                        <a href="https://www.lea.co.ao/nasocial/loja/carrinho.php?pro=<?php print base64_encode($row->id_servico_produto); ?>&cat=<?php print $row->categoria; ?>&us=<?php print $ami; ?>" class="list-group-item" style="padding:5px 0px 5px 0px; text-align:center; background:#00b33c; color:#fff; font-size:18px;">
                                            <span class="glyphicon glyphicon-shopping-cart"></span> Reservar
                                        </a>
                                    <?php
                                }
                            ?>
                        </div>
                    <?php
                }
                
                ?>
                    <div class="pagination flex-m flex-w p-r-50">
                            <?php
                                if($start >=$records_per_page){
                                    print "<a href='" . $caminho . "?strt=" . ($start-$records_per_page )."' class='item-pagination flex-c-m trans-0-4 active-pagination'>««</a>";
                                }
                                if($start+$records_per_page < $total_records && $start >= 0){
                                    print "<a href='". $caminho ."?strt=".($start+$records_per_page) ."' class='item-pagination flex-c-m trans-0-4'>»»</a>";
                                }
                            ?>
                    </div>
                <?php
            }
            else
            {
                ?>
                    <div class="alert alert-warning">
                        <p>
                            Infelizmente não tens nenhum serviço ou produto a venda, escolhe uma das opções para começar a vender... 
                            <a href="https://lea.co.ao/agenda/toda-agenda.php?strt=0&prc=1"> Ingressos </a> | 
                            <a href="https://lea.co.ao/downloads/todos-livros.php?strt=0&acc=1&prc=1"> Livros </a> | 
                            <a href="https://lea.co.ao/discografia/discografia_.php?strt=0&prc=1"> Discos </a> | 
                            <a href="#"> Recordações</a>
                        </p>
                    </div>
                <?php
            }
            $connection->close($connection->myconn);
        }
        //
        function CatalogoKitandaDosOutros($start,$usuario,$is_mobile,$catalogo,$categoria,$todos,$ami)
        {
            $utilidade = new Utilidade();
            
            $connection = new cnx(); 
            $connection->connect();
            $lo_in = new Login();
            $id_usuario = 0;

            $caminho = "/nasocial/view/mmusica/minha-musica.php";
            //number of page to be displayed per page
            $records_per_page = 20;

            $utilizador = base64_decode($usuario);
            $ami_ = base64_decode($ami);
            
            if($ami_ == 0){ $id_usuario = $utilizador; }else{ $id_usuario = $ami_; }

            //select and execute query to count records DATE_FORMAT(anoreg,'%d/%m/%Y') SELECT * FROM `tblagenda_evento`
            
            
            if($todos == true)
            {
                $query = "SELECT COUNT(*) FROM vw_catalogo WHERE ce_usuario != $id_usuario";   
            }else{
                $query = "SELECT COUNT(*) FROM vw_catalogo WHERE ce_usuario != $id_usuario AND categoria = $categoria";
            }   
            
            $result = mysqli_query($connection->myconn,$query);

            //get total number of records
            $row = mysqli_fetch_row($result);
            $total_records = $row[0];
            //if records exist
            if(($total_records > 0) && ($start < $total_records)) 
            {
                if($todos == true)
                {
                    $query = "SELECT * FROM vw_catalogo  WHERE ce_usuario != $id_usuario";
                }else{
                    $query = "SELECT * FROM vw_catalogo WHERE ce_usuario != $id_usuario AND categoria = $categoria";
                }
            
                $result = mysqli_query($connection->myconn,$query);
                
            
                while($row = mysqli_fetch_object($result))
                {
                    ?>
                        <div class="list-group col-xs-6 col-md-3">
                            <a href="#" class="list-group-item active" style="padding:0px 0px 0px 0px">
                                <div class="fix-image" style="background-image: url('<?php print $row->caminho; ?>');"></div>
                            </a>
                            <a href="#" class="list-group-item espaco">
                                <b><span class="glyphicon glyphicon-th-list"></span> <?php $limit = 0; if($is_mobile){ $limit = 10; }else{ $limit = 30; } print  $this->limitarTexto($row->evento, $limit); ?> </b>
                            </a>
                            <a href="#" class="list-group-item espaco"><b><span class="glyphicon glyphicon-tag"></span> <?php print $row->preco; ?> KZ</b></a>
                            
                            <a href="#" class="list-group-item espaco">
                                <ul class="list-group list-group-flush" style="margin-bottom:0px;">
                                    <li class="list-group-item main-li" style="padding:0px;">
                                        <?php
                                            if($caminho != $row->fotoPerfil && $row->fotoPerfil != '' && $row->fotoPerfil != null)
                                            {
                                                ?> <img class="nav-user-photo" alt="Foto do Utilizador" src="<?php print $row->fotoPerfil;   ?>" style="border-radius: 50%;width:30px;height:30px;margin-right:5px;"/> <b>Kitanda da(o) <?php print $row->username; ?></b><?php
                                            }else if($row->ce_sexo == 1)
                                            {
                                                ?> <img class="nav-user-photo" alt="Foto do Utilizador" src="/nasocial/assets/images/avatars/avatar.png"  style="border-radius: 50%;width:30px;height:30px;margin-right:5px;"/> <b>Kitanda da(o) <?php print $row->username; ?></b><?php
                                            }else if($row->ce_sexo == 2)
                                            {
                                                ?> <img class="nav-user-photo" alt="Foto do Utilizador" src="/nasocial/assets/images/avatars/avatar3.png" style="border-radius: 50%;width:30px;height:30px;margin-right:5px;"/> <b>Kitanda da(o) <?php print $row->username; ?></b><?php
                                            }else{
                                                ?> <img class="nav-user-photo" alt="Foto do Utilizador" src="/nasocial/assets/images/avatars/avatar2.png" style="border-radius: 50%;width:30px;height:30px;margin-right:5px;"/> <b>Kitanda da(o) <?php print $row->username; ?></b><?php   
                                            } 
                                        ?>
                                    </li>
                                </ul>
                            </a>
                            
                            <a href="https://www.lea.co.ao/nasocial/loja/carrinho.php?pro=<?php print base64_encode($row->id_servico_produto); ?>&cat=<?php print $row->categoria; ?>&us=<?php print base64_encode($row->ce_usuario); ?>" class="list-group-item" style="padding:5px 0px 5px 0px; text-align:center; background:#00b33c; color:#fff; font-size:18px;">
                                <span class="glyphicon glyphicon-shopping-cart"></span> Encomendar
                            </a>
                        </div>
                    <?php
                }
                
                ?>
                    <div class="pagination flex-m flex-w p-r-50">
                            <?php
                                if($start >=$records_per_page){
                                    print "<a href='" . $caminho . "?strt=" . ($start-$records_per_page )."' class='item-pagination flex-c-m trans-0-4 active-pagination'>««</a>";
                                }
                                if($start+$records_per_page < $total_records && $start >= 0){
                                    print "<a href='". $caminho ."?strt=".($start+$records_per_page) ."' class='item-pagination flex-c-m trans-0-4'>»»</a>";
                                }
                            ?>
                    </div>
                <?php
            }
            else
            {
                ?>
                    <div class="alert alert-warning">
                        <p>
                            Infelizmente não tens nenhum serviço ou produto a venda, escolhe uma das opções para começar a vender... 
                            <a href="https://lea.co.ao/agenda/toda-agenda.php?strt=0&prc=1"> Ingressos </a> | 
                            <a href="https://lea.co.ao/downloads/todos-livros.php?strt=0&acc=1&prc=1"> Livros </a> | 
                            <a href="https://lea.co.ao/discografia/discografia_.php?strt=0&prc=1"> Discos </a> | 
                            <a href="#"> Recordações</a>
                        </p>
                    </div>
                <?php
            }
            $connection->close($connection->myconn);
        }
        //
        function VerificarExistenciaOutrosVendedores($servico_produto_,$categoria){
            $connection = new cnx();
            $connection->connect();
            $servico_produto = base64_decode($servico_produto_);
            //
            $query = "SELECT * FROM vw_catalogo WHERE id_servico_produto = $servico_produto AND categoria = $categoria";
            $result = mysqli_query($connection->myconn,$query);
            $i = 1;

            if(mysqli_num_rows($result) > 0){
                return $i;
            }else{
                return 0;
            }
            $connection->close($connection->myconn);
        }
        //
        function OutrosVendedoresNassocial($servico_produto_,$categoria)
        {
            $connection = new cnx();
            $connection->connect();
            $servico_produto = base64_decode($servico_produto_);
            $query = "SELECT c.id_servico_produto, c.preco, c.qtd, c.categoria, c.ce_usuario, c.username, c.fotoPerfil FROM vw_catalogo c WHERE c.id_servico_produto = $servico_produto AND c.categoria = $categoria ";
            $result = mysqli_query($connection->myconn,$query);
            $i = 1;

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    ?>
                    <tr>
                        <th><?php //print $i++; ?> 
                            <?php
                                if($caminho != $row->fotoPerfil && $row->fotoPerfil != '' && $row->fotoPerfil != null)
                                {
                                    ?> <a href="/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->ce_usuario); ?>"><img class="nav-user-photo" alt="Foto do Utilizador" src="<?php print $row->fotoPerfil;   ?>" width="32" height="32" style="border-radius:50px; border:#ccc 1px solid;"/></a><?php
                                }else{
                                    ?> <a href="/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->ce_usuario); ?>"><img class="nav-user-photo" alt="Foto do Utilizador" src="/nasocial/assets/images/avatars/avatar2.png" width="32" height="32" style="border-radius:50px; border:#ccc 1px solid;"/></a><?php   
                                }
                            ?>
                            </th>
                        <td>
                            <a href="/nasocial/usuario/per-ami.php?ami=<?php print base64_encode($row->ce_usuario); ?>"><?php print $row->username; ?></a>
                        </td>
                        <td><?php print $row->preco; ?> Kz</td>
                        <td><?php print $row->qtd; ?> </td>
                        <td>
                            <a href="https://www.lea.co.ao/nasocial/loja/carrinho.php?pro=<?php print $servico_produto_; ?>&cat=<?php print $categoria; ?>&us=<?php print base64_encode($row->ce_usuario); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
            }
            $connection->close($connection->myconn);
        }
        //
        function ContarEncomendasPorEntregar($ce_vendedor_)
        {
            $connection = new cnx();
            $connection->connect();
            $ce_vendedor = base64_decode($ce_vendedor_);
            $query = "SELECT count(referencia) as total_encomenda FROM vw_encomendas_nassocial WHERE ce_vendedor = $ce_vendedor AND flag_pago = 0 ";
            $result = mysqli_query($connection->myconn,$query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    return $row->total_encomenda;
                }
            }else{
                return 0;
            }
            $connection->close($connection->myconn);
        }
        //
        function EncomendasPorEntregar($ce_vendedor_)
        {
            $PagarNasocial = new PagarNasocial();
            $PagarNasocialDAO = new PagarNasocialDAO();
            setlocale(LC_MONETARY, 'en_US');
            $connection = new cnx();
            $connection->connect();
            $ce_vendedor = base64_decode($ce_vendedor_);
            
            $query = "SELECT * FROM vw_encomendas_nassocial WHERE ce_vendedor = $ce_vendedor AND flag_pago = 0 ";
            $result = mysqli_query($connection->myconn,$query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    ?>
                        <div class="message-item message-unread" style="padding-top:5px;padding-bottom:5px">
                            <label class="inline"> <span class="lbl"></span> </label>
                            <?php
                                if($row->pagamento_flag > 0)
                                {
                                    ?><i class="message-star ace-icon fa fa-bell green"></i><?php
                                }else{
                                    ?><i class="message-star ace-icon fa fa-bell red"></i><?php
                                }
                            ?>
                            
                            <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $row->encomendado_header_id; ?>&dtls=true&ent=1">
                                <span class="sender" title="<?php print $row->comprador; ?>"><?php print $row->comprador; ?></span>
                                <span class="sender" title="<?php print $row->comprador; ?>"><?php print $row->referencia; ?></span>
                                <span class="time"><?php print $row->date_header; ?></span>
                                <?php
                                    $PagarNasocial->setCe_encomenda($row->encomendado_header_id);
                                    if($PagarNasocialDAO->VerificarPagamentoEncomendaComFlag($PagarNasocial) > 0) {
                                        ?> <span class="attachment"> <i class="glyphicon glyphicon-paperclip"></i> </span> <?php
                                    } else {
                                        ?> <span class="attachment"> <i class="glyphicon glyphicon-file"></i> </span> <?php
                                    }
                                ?>
                                <span class="summary"> <span class="text"> <?php print money_format('%!i', $row->total); ?> Kz </span> </span>
                            </a>
                        </div>
                        
                        <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $row->encomendado_header_id;  ?>&dtls=true&ent=1" type="button" class="btn btn-danger" style="<?php if(is_mobile()){ ?> width:14%; <?php }else{ ?> width:14%; <?php }?> height:26%; margin:0px 0px 10px 10px;padding:0px 0px 0px 0px;border-radius:5px;">
                            <i class="glyphicon glyphicon-remove-circle"></i>  
                        </a> 
                        <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $row->encomendado_header_id;  ?>&dtls=true&ent=1" type="button" class="btn btn-warning" style="<?php if(is_mobile()){ ?> width:14%; <?php }else{ ?> width:14%; <?php }?> height:26%; margin:0px 0px 10px 0px;padding:0px 0px 0px 0px;border-radius:5px;">
                            <i class="glyphicon glyphicon-print"></i>  
                        </a>
                        <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $row->encomendado_header_id;  ?>&dtls=true&ent=1" type="button" class="btn btn-warning" style="<?php if(is_mobile()){ ?> width:14%; <?php }else{ ?> width:14%; <?php }?> height:26%; margin:0px 0px 10px 0px;padding:0px 0px 0px 0px;border-radius:5px;">
                            <i class="glyphicon glyphicon-envelope"></i>
                        </a>
                        
                    <?php
                    if($row->pagamento_flag > 0) { ?>
                        <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $row->encomendado_header_id;  ?>&dtls=true&ent=1" type="button" class="btn btn-warning" style="<?php if(is_mobile()){ ?> width:48%; <?php }else{ ?> width:54%; <?php }?> height:26%; margin:0px 0px 10px 2px;padding: 0px 15px 0px 15px;border-radius:5px;">
                            <i class="glyphicon glyphicon-cog"></i> Processar  
                        </a> <?php
                    }else{ 
                        ?>
                            <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $row->encomendado_header_id;  ?>&dtls=true&ent=1" type="button" class="btn btn-success" style="<?php if(is_mobile()){ ?> width:48%; <?php }else{ ?> width:54%; <?php }?> height:26%; margin:0px 0px 10px 2px;padding: 0px 0px 0px 0px;border-radius:5px;">
                                <i class="glyphicon glyphicon-cog"></i> Processar 
                            </a>
                        <?php
                    }
                }
            }
            $connection->close($connection->myconn);
        }
        //
        function EncomendasPorPagar($ce_vendedor_)
        {
            setlocale(LC_MONETARY, 'en_US');
            $connection = new cnx();
            $connection->connect();
            $PagarNasocialDAO = new PagarNasocialDAO();
            $PagarNasocial = new PagarNasocial();
            
            $ce_vendedor = base64_decode($ce_vendedor_);
            $query = "SELECT * FROM vw_encomendas_nassocial WHERE ce_comprador = $ce_vendedor";
            $result = mysqli_query($connection->myconn,$query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    ?>
                        <div class="message-item message-unread" style="padding-top:5px;padding-bottom:5px">
                            <label class="inline"> <span class="lbl"></span> </label>
                            <!--
                                <i class="message-star ace-icon fa fa-star orange2"></i>
                            	<i class="message-star ace-icon fa fa-bell red"></i>
                            	<i class="message-star glyphicon glyphicon-folder-close green"></i>
                            -->
                            <?php
                                if($row->pagamento_flag > 0)
                                {
                                    ?><i class="message-star ace-icon fa fa-bell green"></i><?php
                                }else{
                                    ?><i class="message-star ace-icon fa fa-bell red"></i><?php
                                }
                            ?>
                                <span class="sender" title="<?php print $row->comprador; ?>"><?php print $row->referencia; ?></span>
                                <span class="sender" title="<?php print $row->comprador; ?>"><?php print $row->vendedor; ?></span>
                                <span class="time"><?php print $row->date_header; ?></span>
                                <?php
                                if($row->pagamento_flag > 0)
                                {
                                    ?><span class="attachment"> <i class="glyphicon glyphicon-credit-card"></i> </span><?php
                                }else{
                                    ?> <span class="attachment"> <i class="glyphicon glyphicon-file"></i> </span> <?php
                                }
                            ?>
                            
                            <span class="summary"> <span class="text"> <?php print money_format('%!i', $row->total) ; ?> Kz </span> </span>
                        </div>
                        
                        <button type="button" class="btn btn-danger" style="<?php if(is_mobile()){ ?> width:14%; <?php }else{ ?> width:14%; <?php }?> height:30%; margin:0px 0px 10px 10px;padding:0px 0px 0px 0px;border-radius:5px;">
                            <i class="glyphicon glyphicon-remove-circle"></i> 
                        </button>
                        <button type="button" class="btn btn-warning" style="<?php if(is_mobile()){ ?> width:14%; <?php }else{ ?> width:14%; <?php }?> height:30%; margin:0px 0px 10px 0px;padding:0px 0px 0px 0px;border-radius:5px;">
                            <i class="glyphicon glyphicon-print"></i> 
                        </button>
                        <button type="button" class="btn btn-warning" style="<?php if(is_mobile()){ ?> width:14%; <?php }else{ ?> width:14%; <?php }?> height:30%; margin:0px 0px 10px 0px;padding:0px 0px 0px 0px;border-radius:5px;">
                            <i class="glyphicon glyphicon-envelope"></i> 
                        </button>
                        <?php
                            if($row->pagamento_flag > 0)
                            {
                                ?>
                                    <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $row->encomendado_header_id; ?>&dtls=false&ent=2" class="btn btn-warning" style="<?php if(is_mobile()){ ?> width:48%; <?php }else{ ?> width:54%; <?php }?> height:30%; margin:0px 0px 10px 2px;padding: 0px 10px 0px 10px;border-radius:5px;">
                                        <i class="glyphicon glyphicon-screenshot"></i> Acompanhar 
                                    </a>
                                <?php
                            }else{
                                ?>
                                    <a href="https://www.lea.co.ao/nasocial/loja/pagamentos.php?enco=<?php print $row->encomendado_header_id; ?>&dtls=false&ent=2" class="btn btn-danger" style="<?php if(is_mobile()){ ?> width:48%; <?php }else{ ?> width:54%; <?php }?> height:30%; margin:0px 0px 10px 2px;padding: 0px 10px 0px 10px;border-radius:5px;">
                                        <i class="glyphicon glyphicon-credit-card"></i> Pagar 
                                    </a>
                                <?php
                            }
                        ?>
                        
                    <?php
                }
            }
            $connection->close($connection->myconn);
        }
        //
        function EncomendasPorPagarTotal($ce_vendedor_){
            $connection = new cnx();
            $connection->connect();
            $ce_vendedor = base64_decode($ce_vendedor_);
            $query = "SELECT count(referencia) as total_por_pagar FROM vw_encomendas_nassocial WHERE ce_comprador = $ce_vendedor";
            $result = mysqli_query($connection->myconn,$query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    print $row->total_por_pagar; 
                }
            }else{
                print 0;
            }
            $connection->close($connection->myconn);
        }
        //
        function Recebimentos($ce_vendedor_)
        {
            setlocale(LC_MONETARY, 'en_US');
            $connection = new cnx();
            $connection->connect();
            
            $ce_vendedor = base64_decode($ce_vendedor_);
            $query = "SELECT * FROM vw_n_pagamentos_recebidos WHERE ce_vendedor = $ce_vendedor";
            $result = mysqli_query($connection->myconn,$query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    ?>
                        <td class="center"> </td>
                        <td><?php print $row->data_pagamento; ?></td>
                        <td><?php print $row->comprador; ?></td>
                        <td><?php print $row->total_pago; ?></td>   
                    <?php
                }
            }
            $connection->close($connection->myconn);
        }
        
        function Pagamentos($ce_vendedor_)
        {
            setlocale(LC_MONETARY, 'en_US');
            $connection = new cnx();
            $connection->connect();
            
            $ce_cliente = base64_decode($ce_vendedor_);
            
            $query = "SELECT * FROM vw_n_pagamentos_recebidos WHERE ce_comprador = $ce_cliente";
            $result = mysqli_query($connection->myconn,$query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    ?>
                        <td class="center"> </td>
                        <td><?php print $row->data_pagamento; ?></td>
                        <td><?php print $row->vendedor; ?></td>
                        <td><?php print $row->total_pago; ?></td>   
                    <?php
                }
                //print "<span style='text-align:center;'>Sem pagamentos</span>";
            }
            $connection->close($connection->myconn);
        }
    }
?>