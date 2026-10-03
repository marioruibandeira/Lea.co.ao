<?php
    //include_once($_SERVER['DOCUMENT_ROOT'].'/conexao/cnx.php');
    class PublicidadesDAO 
    {
        function ValidarEstadoPublicitario($fk_utilizado)
        {
            $connection = new cnx();
            $connection->connect();  
            $fk_utilizado_ = base64_decode($fk_utilizado);
            
            $query = "SELECT * FROM `publicitarios` WHERE `ce_usuario` = $fk_utilizado_ AND estado > 0";
            $result = mysqli_query($connection->myconn,$query);
            //
            if(mysqli_num_rows($result) > 0){
                while($row =  mysqli_fetch_object($result)){
                    return 1;
                }
            }else{
                return 0;
            }
            $connection->close($connection->myconn);
        }  
        
        function DetalhesDoPublicitarioServico($fk_utilizado)
        {
            $connection = new cnx();
            $connection->connect();  
            $fk_utilizado_ = base64_decode($fk_utilizado);
            
            $query = "SELECT pb.`id_publicitario`, pb.`nomes`, pb.`apelido`, pb.`telefone`, pb.`endereco`, pb.`email`, pb.`whatsapp`, pb.`data`, pb.`token`, pb.`estado`, pb.`ce_usuario`, p.data_inicio, p.data_fim, p.publicidade FROM `publicitarios` pb JOIN publicidades p ON p.ce_publicitario = pb.ce_usuario WHERE pb.ce_usuario = $fk_utilizado_";
            $result = mysqli_query($connection->myconn,$query);
            //
            if(mysqli_num_rows($result) > 0){
                while($row =  mysqli_fetch_object($result)){
                    ?>
                        <div class="form-group col-md-3 <?php if(is_mobile()){ print "b-campos"; } ?>"> <label for="inputEmail4">Responsável</label> <input type="text" class="form-control" Disabled value="<?php print $row->nomes ." ". $row->apelido; ?>"> </div>
                        <div class="form-group col-md-3 <?php if(is_mobile()){ print "b-campos"; } ?>"> <label for="inputEmail4">Tipo de Serviço</label> <input type="text" class="form-control" Disabled value="<?php print "Publicidade"; ?>"> </div>
                        <div class="form-group col-md-3 <?php if(is_mobile()){ print "b-campos"; } ?>"> <label for="inputPassword4">Serviço</label> <input type="text" class="form-control" Disabled value="Publicidade Nas Noticias<?php //print $row->promocoes_servicos; ?>"> </div>
                        <div class="form-group col-md-3 <?php if(is_mobile()){ print "b-campos"; } ?>"> <label for="inputEmail4">Investimento</label> <input type="text" class="form-control" Disabled value="AO 10,000.00<?php //print $row->preco; ?>"> </div>
                        <div class="form-group col-md-2 <?php if(is_mobile()){ print "b-campos"; } ?>"> <label for="inputEmail4">Data Início</label> <input type="text" class="form-control" Disabled value="<?php print $row->data_inicio; ?>"> </div>
                        <div class="form-group col-md-2 <?php if(is_mobile()){ print "b-campos"; } ?>"> <label for="inputPassword4">Data Fim</label> <input type="text" class="form-control" Disabled value="<?php print $row->data_fim; ?>"> </div>
                        <div class="form-group col-md-2 <?php if(is_mobile()){ print "b-campos"; } ?>"> <label for="inputPassword4">Dias Em Falta</label> <input type="text" class="form-control" Disabled value="<?php print "30"; ?>"> </div>
                        <div class="form-group col-md-2 <?php if(is_mobile()){ print "b-campos"; } ?>"> <label for="inputPassword4">Token</label> <input type="text" class="form-control" Disabled value="<?php print $row->token; ?>"> </div>
                        <div class="form-group col-md-4 <?php if(is_mobile()){ print "b-campos"; } ?>"> 
                            <label for="inputPassword4">WhatsApp</label> 
                            <div class="input-group">
                                <input type="text" class="form-control" value="<?php print $row->whatsapp; ?>" Disabled>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" style="padding: 2px;">Trocar</button>
                                </span>
                            </div> 
                        </div>
                    <?php
                }
            }
            $connection->close($connection->myconn);
        }
        
        function PublicidadeImpressoes($fk_utilizado)
        {
            $connection = new cnx();
            $connection->connect();  
            $fk_utilizado_ = base64_decode($fk_utilizado);
            
            $query = "SELECT p.id_publicidade AS id_publicidade, COUNT(pi.ce_publicidade) AS impressoes, p.ce_publicitario AS ce_publicitario FROM publicidade_impressoes pi JOIN publicidades p ON p.id_publicidade = pi.ce_publicidade WHERE ce_publicitario = $fk_utilizado_ GROUP BY p.id_publicidade";
            $result = mysqli_query($connection->myconn,$query);
            //
            if(mysqli_num_rows($result) > 0){
                while($row =  mysqli_fetch_object($result)){
                    return $row->impressoes; 
                }
            }else{
                return 0;
            }
            $connection->close($connection->myconn);
        }
        
        function PublicidadeMediaImpressoes($fk_utilizado)
        {
            $connection = new cnx();
            $connection->connect();  
            $fk_utilizado_ = base64_decode($fk_utilizado);
            
            $query = "SELECT datediff(data_fim, data_inicio) AS total_dias FROM publicidades WHERE ce_publicitario = $fk_utilizado_ ";
            $result = mysqli_query($connection->myconn,$query);
            //
            if(mysqli_num_rows($result) > 0){
                while($row =  mysqli_fetch_object($result)){
                    return $row->total_dias; 
                }
            }else{
                return 0;
            }
            $connection->close($connection->myconn);
        }
        
        function BeneficiosPublicidade($fk_servico)
        {
            $connection = new cnx();
            $connection->connect();  
            
            $query = "SELECT * FROM `publicidade_beneficios` WHERE `ce_serv_publicitarios` = $fk_servico";
            $result = mysqli_query($connection->myconn,$query);
            //
            if(mysqli_num_rows($result) > 0){
                while($row =  mysqli_fetch_object($result)){
                    ?>
                        <tr>
                            <td style="text-align:center;"><?php print $row->id_publi_beneficios; ?></td>
						    <td><?php print $row->beneficios; ?></td>
						    <?php
						        if(!is_mobile())
						        {
						            ?> <td><?php print $row->descricao; ?></td> <?php
						        }else{
						            ?> 
						                <td style="width:15px;text-align:center;">
						                    <a href="#">
						                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/></svg>
						                    </a>
						                </td> 
						            <?php
						        }
						    ?>
						</tr>
                    <?php
                }
            }
            $connection->close($connection->myconn);
        }
        
        function ChaveServicoPublicitario($fk_utilizado)
        {
            $connection = new cnx();
            $connection->connect();  
            $fk_utilizado_ = base64_decode($fk_utilizado);
            
            $query = "SELECT `id_serv_publicitarios`,`ce_publicitario` FROM `publicidades` WHERE ce_publicitario = $fk_utilizado_";
            $result = mysqli_query($connection->myconn,$query);
            //
            if(mysqli_num_rows($result) > 0){
                while($row =  mysqli_fetch_object($result)){
                    return $row->id_serv_publicitarios;
                }
            }
            $connection->close($connection->myconn);
        }
        
    }
?>