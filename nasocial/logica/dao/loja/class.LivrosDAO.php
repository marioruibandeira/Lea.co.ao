<?php
/**
 * Description of class
 *
 * @author key
 */
include_once($_SERVER['DOCUMENT_ROOT'].'/conexao/cnx.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.SiteUserInfo.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.LivroNasocial.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/login/Login.php');
//
class LivrosDAO {
    //
    function livroExiste($id_livro,$ce_usuario){
        $connection = new cnx();
        $connection->connect();
        $id_livro_ = base64_decode($id_livro);
        $ce_usuario_ = base64_decode($ce_usuario);
        $ce_livro = 0;
        //
        $query = 'SELECT * FROM tblnasocial_livros WHERE ce_livro = "'.$id_livro_.'" AND ce_usuario = "'.$ce_usuario_.'"';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                $ce_livro = $row->ce_livro;
                return $ce_livro;
            }    
        }else{
            return 0;
        }
    }
    //
    public function inserirLivros(LivroNasocial $livroNasocial, SiteUserInfo $usuario)  
    {  
        $connection = new cnx();
        $connection->connect();
        $lo_in = new Login();
        //        
        $ce_titulo = $livroNasocial->getId_livro();
        $ce_titulo_ = base64_decode($ce_titulo);
        $preco_livro = $livroNasocial->getPreco_livro();
        $qtd_livro = $livroNasocial->getQtd_livro();
        $descri_livro = $livroNasocial->getDescricao_livro();
        $ce_usuario = $usuario->getUser_id();
        $ce_usuario_ = base64_decode($ce_usuario);
        $categoria =  $livroNasocial->getCat();
        //echo("<script>console.log('PHP: Agenda inserido com sucesso! $ce_usuario ');</script>");
        //        
        $string = "INSERT INTO tblnasocial_livros (ce_livro,ce_usuario,preco_livro,qtd_livro,categoria) VALUES (?,?,?,?,?)"; 
        $stmt = mysqli_prepare($connection->myconn, $string);
        $stmt->bind_param("iidii", $ce_titulo_,$ce_usuario_,$preco_livro,$qtd_livro,$categoria);
        $sucesso = $stmt->execute();
        echo("<script>console.log('PHP: Agenda inserido com sucesso! $ce_usuario_');</script>");
        return $sucesso;
    }
    //
    function listarLivroNasocial($usuario){
        $connection = new cnx(); 
        $connection->connect();
        $lo_in = new Login();
        //
        $ce_usuario = $lo_in->chaveUsuario($usuario); 
        //create and execute query to get batch of records
        $query = "SELECT * FROM vwlivro_nasocial WHERE ce_usuario =  $ce_usuario   ";
        $result = mysqli_query($connection->myconn,$query);
        //
        if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_object($result)){ ?>
            <tr>
                <td class="center">1</td> <td> <a href="#"><?php print $row->titulo; ?></a> </td> <td class="hidden-xs"><?php print $row->nomeA; ?></td>
                <td><?php print $row->editora_livro; ?></td> <td><?php print $row->ano_pub_livro; ?></td><td><?php print $row->qtd_livro; ?></td> <td>AOA <b><?php print $row->preco_livro; ?></b></td>
                <td>
                    <a class="blue" href="#"> <i class="ace-icon fa fa-search-plus bigger-130"></i> </a>
                    <a class="green" href="http://localhost/lea/nasocial/loja/livro.php?lvr=<?php print $row->id_livro_nasocial; ?>">
                        <i class="ace-icon fa fa-pencil bigger-130"></i> </a>
                        <a class="red" href="http://localhost/lea/nasocial/logica/controller/lojaController/EliminarLoja.php?elimi=<?php print base64_encode($row->id_livro_nasocial); ?>">
                        <i class="ace-icon fa fa-trash-o bigger-130"></i> 
                    </a>
                </td>
            </tr>
        <?php }
        echo('<script>console.log(\'PHP: Livros listados com sucesso"\');</script>');
        } else {
            print "Ainda não tem produtos no sistema, aproveite e cria uma agora.";
        }
    }
    //
    function eliminarLivro($param) {
        $connection = new cnx();
        $connection->connect();
        
        $sqlQuery  =  "DELETE FROM tblnasocial_livros WHERE id_livro_nasocial = ? ";
        
        $statement =  $connection->myconn->prepare($sqlQuery);
        $statement->bind_param("i", $param);
        $statement->execute();
        $statement->close();
        echo("<script>console.log('PHP: Eliminado com sucesso');</script>");
        return $statement;        	
    }
    //
    public function tituloLivro() {
        $connection = new cnx();
        $connection->connect();
        //$livro_ = new LivroNasocial();
            	
        $query = 'SELECT id_livro,titulo FROM tbllivro WHERE id_livro not in (SELECT ce_livro FROM tblnasocial_livros) ORDER BY titulo ASC';
        $result = mysqli_query($connection->myconn,$query);
			
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){                
                //$livro_->setId_livro($row->id_livro);
                //$livro_->setTitulo($row->titulo);
                ?> <option value="<?php print $row->id_livro;?>"><?php print $row->titulo;?></option> <?php
            }
        }else{
            print "Esta provincia nao existe!";				
        }
    }
    //
    public function tituloLivroString($livro) {
        $connection = new cnx();
        $connection->connect();
        $livro_ = base64_decode($livro);
            	
        $query = "SELECT titulo FROM vwlivros where id_livro = $livro_";
        $result = mysqli_query($connection->myconn,$query);
			
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){                
               return $row->titulo;
            }
        }else{
            print "Esta provincia nao existe!";				
        }
    }
    //
    public function CapaFrenteLivro($livro) {
        $connection = new cnx();
        $connection->connect();
        $livro_ = base64_decode($livro);
            	
        $query = "SELECT capa_livro FROM vwlivros where id_livro = $livro_";
        $result = mysqli_query($connection->myconn,$query);
			
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){                
               return $row->capa_livro;
            }
        }else{
            print "Esta provincia nao existe!";				
        }
    }
    //
    public function AutorLivroString($livro) {
        $connection = new cnx();
        $connection->connect();
        $livro_ = base64_decode($livro);
            	
        $query = "SELECT nomeA FROM vwlivros where id_livro = $livro_";
        $result = mysqli_query($connection->myconn,$query);
			
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){                
               return $row->nomeA;
            }
        }else{
            print "Autor não existe!";				
        }
    }
    //
    public function EditoraLivroString($livro) {
        $connection = new cnx();
        $connection->connect();
        $livro_ = base64_decode($livro);
            	
        $query = "SELECT editora FROM vwlivros where id_livro = $livro_";
        $result = mysqli_query($connection->myconn,$query);
			
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){                
               return $row->editora;
            }
        }else{
            print "Editora não existe!";				
        }
    }
    //
    public function editoraLivro() {
        $connection = new cnx();
        $connection->connect();
            	
        $query = 'SELECT id_editora_livro,editora_livro FROM tbleditora_livro ORDER BY editora_livro ASC';
        $result = mysqli_query($connection->myconn,$query);
			
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){   
                ?> <option value="<?php print $row->id_editora_livro;?>"><?php print $row->editora_livro;?></option> <?php
            }
        }else{
            print "Esta provincia nao existe!";				
        }
    }
    //
    public function generoLivro() {
        $connection = new cnx();
        $connection->connect();
            	
        $query = 'SELECT gnr_id,genero FROM generos ORDER BY genero ASC';
        $result = mysqli_query($connection->myconn,$query);
			
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){  
                ?> <option value="<?php print $row->gnr_id;?>"><?php print $row->genero;?></option> <?php
            }
        }else{
            print "Esta provincia nao existe!";				
        }
    }
    
}
?>
