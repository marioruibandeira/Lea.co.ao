<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.UtilidadeDAO.php');
    //
    class LivrosDAO
    {
        function listarLivrosPorUsuario($ce_usuario,$start,$u_e) {
            $connection = new cnx(); 
            $connection->connect();
            $ce_usuario_ = base64_decode($ce_usuario);
            
            $query = "SELECT  * FROM vw_livros_nasocial where ce_usuario = $ce_usuario_";
            $result = mysqli_query($connection->myconn,$query);
            
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    ?>
                        <tr>
                            <td><a href="https://www.lea.co.ao/literatura/exemplar.php?code=<?php print base64_encode($row->ce_livro); ?>&artst=<?php print base64_encode($row->artID); ?>" target="_blank"><?php print $row->titulo; ?></a></td>
                            <td><?php print $row->qtd_livro; ?></td>
                            <td><?php print $row->preco_livro; ?></td>
                            <td><?php print ($row->qtd_livro * $row->preco_livro); ?></td>
                            <td style="text-align:right;width:52px;">
                                <a href="https://www.lea.co.ao/nasocial/loja/carrinho.php?pro=<?php print base64_encode($row->ce_livro); ?>&us=<?php print $ce_usuario; ?>&cat=2&id=<?php print $row->id_nasocial_livros; ?>" style="margin-right:5px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            </td>
                        </tr>
                    <?php
                }
            }
        }
        //
        function ContarLivrosPorUsuario($ce_usuario) {
            $connection = new cnx(); 
            $connection->connect();
            $ce_usuario_ = base64_decode($ce_usuario);
            
            $query = "SELECT  COUNT(ce_usuario) AS TotalLivros FROM vw_livros_nasocial where ce_usuario = $ce_usuario_";
            $result = mysqli_query($connection->myconn,$query);
            
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    return $row->TotalLivros;
                }
            }else{
                return 0;
            }
        }
        //
        function ListarLivrosPorPagarUsuario($ce_usuario) {
            $connection = new cnx(); 
            $connection->connect();
            $ce_usuario_ = base64_decode($ce_usuario);
            
            $query = "SELECT ee.evento_encomendado_id, a.evento, ee.qtd, ee.preco, ee.total_encomenda, ee.ce_usuario FROM tblevento_encomendado ee JOIN agenda a on a.id = ee.evento_id where ee.ce_usuario = $ce_usuario_";
            $result = mysqli_query($connection->myconn,$query);
            
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    ?>
                        <tr>
                          <td><?php print $row->evento; ?></td>
                            <td><?php print $row->qtd; ?></td>
                            <td><?php print $row->preco; ?></td>
                            <td><?php print $row->total_encomenda; ?></td>
                            <td><a href="/nasocial/logica/controller/agenda/eliminarEventoController.php?id_agen=<?php print $row->evento_encomendado_id; ?>&u_e=<?php print $row->$ce_usuario; ?>" style="color:red;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                        </tr>
                    <?php
                }
            }
        }
        //
        function TotalLivrosPorVender($usuario){
            $connection = new cnx();
            $connection->connect();
            $usuario_ = base64_decode($usuario);
            
            $query = "SELECT sum(ae.qtd_livro * ae.preco_livro) subtotal_linha FROM vw_livros_nasocial ae WHERE ae.ce_usuario = $usuario_";
            $result = mysqli_query($connection->myconn,$query);
            //if records present
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    return $row->subtotal_linha;
                }
            }else{
                return 0;
            }
        }
        
        function EliminarLivro($param) 
        {
            $connection = new cnx();
            $connection->connect();
            
            $sqlQuery  =  "DELETE FROM tblnasocial_livros WHERE id_nasocial_livros = ? ";
            
            $statement =  $connection->myconn->prepare($sqlQuery);
            $statement->bind_param("i", $param);
            $statement->execute();
            $statement->close();
            
            return $statement;        	
        }
    }
?>