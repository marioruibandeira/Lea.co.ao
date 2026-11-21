<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/conexao/cnx.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.ContactosTrabalho.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/logica/dao/class.UtilidadesDAO.php');
    //
    class ContactosTrabalhoDAO
    {
        function VerificarExistenciaUtilizador(ContactosTrabalho $ContactosTrabalho)
        {
            $res = "";
            $connection = new cnx();
            $connection->connect();

            $fk_utilizador_ = base64_decode($ContactosTrabalho->getCe_usuario($fk_utilizador));
            //
            $query = "SELECT * FROM `tblutilizador_artista` WHERE `user_id` = $fk_utilizador_";
            $result = mysqli_query($connection->myconn,$query);
            //
            if(empty($result)) { 
                //echo("<script>console.log('PHP: eu estou nulo.');</script>");
            }else{
                 while($row = mysqli_fetch_object($result)){
                    return $row->artID;
                }    
            }
            return $res = 0;
            $result->close($connection->myconn);   
        } 
        
        function VerificarExistenciaCetificacao(ContactosTrabalho $ContactosTrabalho)
        {
            $res = "";
            $connection = new cnx();
            $connection->connect();
            $UtilidadesDAO = new UtilidadesDAO();

            $fk_artista_ = $UtilidadesDAO->abrirBase($ContactosTrabalho->getCe_artista($fk_artista));
            //
            $query = "SELECT artID FROM `tblutilizador_artista` WHERE `artID` = $fk_artista_";
            $result = mysqli_query($connection->myconn,$query);
            //
            if(empty($result)) { 
                //echo("<script>console.log('PHP: eu estou nulo.');</script>");
            }else{
                 while($row = mysqli_fetch_object($result)){
                    return $row->artID;
                }    
            }
            return $res = 0;
            $result->close($connection->myconn);   
        } 
        
        function VerificarExistenciaContacto($ce_usuario_,$ce_artista_)
        {
            $res = "";
            $connection = new cnx();
            $connection->connect();
            $UtilidadesDAO = new UtilidadesDAO();

            $ce_usuario = $UtilidadesDAO->abrirBase($ce_usuario_);
            $ce_artista = $ce_artista_;
            //
            $query = "SELECT ce_usuario,ce_artista FROM tblcontactos_trabalhos WHERE ce_usuario = $ce_usuario AND ce_artista = $ce_artista";
            $result = mysqli_query($connection->myconn,$query);
            //
            if(empty($result)) { 
                //echo("<script>console.log('PHP: eu estou nulo.');</script>");
            }else{
                while($row = mysqli_fetch_object($result)){
                    return $res = 1;
                }    
            }
            return $res = 0;
            $result->close($connection->myconn);   
        } 
        
        public function InserirContactoTrabalho(ContactosTrabalho $ContactosTrabalho)
        {
            $connection = new cnx();
            $connection->connect();
            $UtilidadesDAO = new UtilidadesDAO();
            
            $telefone = $ContactosTrabalho->getTelefone();
            //$whatsapp = $ContactosTrabalho->getWhatsapp();
            $ce_usuario = $UtilidadesDAO->abrirBase($ContactosTrabalho->getCe_usuario());
            $ce_artista = $ContactosTrabalho->getCe_artista();
            //contactos_whatsapp
            $string = "INSERT INTO tblcontactos_trabalhos(contactos_telefone,ce_usuario,ce_artista) VALUES (?,?,?)";
            $stmt = mysqli_prepare($connection->myconn, $string);
            $stmt->bind_param("iii", $telefone,$ce_usuario,$ce_artista);
            $inserido = $stmt->execute();
            
            return array("telefone_" => $this->ContactosTelefone($ContactosTrabalho->getCe_usuario(), $ce_artista));
        }
        
        public function InserirContactoWhatsapp(ContactosTrabalho $ContactosTrabalho)
        {
            $connection = new cnx();
            $connection->connect();
            $UtilidadesDAO = new UtilidadesDAO();
            
            $whatsapp = $ContactosTrabalho->getWhatsapp();
            $ce_usuario = $UtilidadesDAO->abrirBase($ContactosTrabalho->getCe_usuario());
            $ce_artista = $ContactosTrabalho->getCe_artista();
            //contactos_whatsapp
            $string = "INSERT INTO tblcontactos_trabalhos(contactos_whatsapp,ce_usuario,ce_artista) VALUES (?,?,?)";
            $stmt = mysqli_prepare($connection->myconn, $string);
            $stmt->bind_param("iii", $whatsapp,$ce_usuario,$ce_artista);
            $inserido = $stmt->execute();
            
            return array("whatsapp_" => $this->ContactosWhatsapp($ContactosTrabalho->getCe_usuario(), $ce_artista));
        }
        
        public function ActualizarContacto(ContactosTrabalho $ContactosTrabalho)
        {
            $connection = new cnx();
            $connection->connect();
            $UtilidadesDAO = new UtilidadesDAO();
            
            $telefone = $ContactosTrabalho->getTelefone();
            $whatsapp = $ContactosTrabalho->getWhatsapp();
            $ce_usuario = $UtilidadesDAO->abrirBase($ContactosTrabalho->getCe_usuario());
            $ce_artista = $ContactosTrabalho->getCe_artista();

            $query = "UPDATE tblcontactos_trabalhos SET contactos_telefone = '$telefone', contactos_whatsapp = '$whatsapp' WHERE ce_usuario = $ce_usuario AND ce_artista = $ce_artista;";  
            mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));

            $connection->close($connection->myconn);
            return array("telefone_" => $this->ContactosTelefone($ContactosTrabalho->getCe_usuario(), $ce_artista), "whatsapp_" => $this->ContactosWhatsapp($ContactosTrabalho->getCe_usuario(), $ce_artista));
        }
        
        public function EliminarContactoTrabalho(ContactosTrabalho $ContactosTrabalho)
        {
            $connection = new cnx();
            $connection->connect();
            $UtilidadesDAO = new UtilidadesDAO();
            
            $telefone = $ContactosTrabalho->getTelefone();
            $whatsapp = $ContactosTrabalho->getWhatsapp();
            $ce_usuario = $UtilidadesDAO->abrirBase($ContactosTrabalho->getCe_usuario());
            $ce_artista = $ContactosTrabalho->getCe_artista();
            
            $query = "DELETE FROM tblcontactos_trabalhos WHERE `ce_usuario` = $ce_usuario and `ce_artista` = $ce_artista";  
            mysqli_query($connection->myconn, $query) or die(mysqli_error($connection->myconn));

            $connection->close($connection->myconn);
            return array("telefone_" => '', "whatsapp_" => '');
        }
        
        function ContactosTelefone($ce_usuario_, $ce_artista_)
        {
            $connection = new cnx();
            $connection->connect();
            $UtilidadesDAO = new UtilidadesDAO();
            
            $ce_usuario = $UtilidadesDAO->abrirBase($ce_usuario_);
            $ce_artista = $ce_artista_;
                 
            $query = "SELECT contactos_telefone FROM `tblcontactos_trabalhos` WHERE `ce_usuario` = $ce_usuario and `ce_artista` = $ce_artista";
            $result = mysqli_query($connection->myconn,$query);
            
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_object($result))
                {
                    $connection->close($connection->myconn);
                    return $row->contactos_telefone;
                }
            }else{
                $connection->close($connection->myconn);
                return " ";
            }
        }
        
        function ContactosTelefoneFrente($ce_artista_)
        {
            $connection = new cnx();
            $connection->connect();
            $UtilidadesDAO = new UtilidadesDAO();
            
            $ce_artista = $ce_artista_;
                 
            $query = "SELECT contactos_telefone FROM `tblcontactos_trabalhos` WHERE `ce_artista` = $ce_artista";
            $result = mysqli_query($connection->myconn,$query);
            
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_object($result))
                {
                    $connection->close($connection->myconn);
                    return $row->contactos_telefone;
                }
            }else{
                $connection->close($connection->myconn);
                return " ";
            }
        }
        
        function ContactosWhatsapp($ce_usuario_, $ce_artista_)
        {
            $connection = new cnx();
            $connection->connect();
            $UtilidadesDAO = new UtilidadesDAO();
            
            $ce_usuario = $UtilidadesDAO->abrirBase($ce_usuario_);
            $ce_artista = $ce_artista_;
                 
            $query = "SELECT contactos_whatsapp FROM `tblcontactos_trabalhos` WHERE `ce_usuario` = $ce_usuario and `ce_artista` = $ce_artista";
            $result = mysqli_query($connection->myconn,$query);
            
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_object($result))
                {
                    $connection->close($connection->myconn);
                    if($row->contactos_whatsapp == 0){
                        return "";
                    }else{
                        return $row->contactos_whatsapp;
                    }
                }
            }else{
                $connection->close($connection->myconn);
                return "";
            }
        }
        
        function ContactosWhatsappFrente($ce_artista_)
        {
            $connection = new cnx();
            $connection->connect();
            $UtilidadesDAO = new UtilidadesDAO();
            
            $ce_artista = $ce_artista_;
                 
            $query = "SELECT contactos_whatsapp FROM `tblcontactos_trabalhos` WHERE `ce_artista` = $ce_artista";
            $result = mysqli_query($connection->myconn,$query);
            
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_object($result))
                {
                    $connection->close($connection->myconn);
                    if($row->contactos_whatsapp == 0)
                    {
                       return ""; 
                    }else{
                        return $row->contactos_whatsapp;
                    }
                }
            }else{
                $connection->close($connection->myconn);
                return "";
            }
        }
        
        
    }
?>