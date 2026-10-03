<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/conexao/cnx.php');
    
    class CarregarMusicaDAO
    {
        function GeneroMusical()
        {
            $connection = new cnx();
            $connection->connect();

            $query = 'SELECT * FROM generos WHERE ce_cat_genero = 1';
            $result = mysqli_query($connection->myconn,$query);
            if(mysqli_num_rows($result) > 0){
                while($row =  mysqli_fetch_object($result))
                {
                    ?> <option value="<?php print $row->gnr_id; ?>"><?php print $row->genero; ?></option> <?php
                }
            }
        }
    }
?>