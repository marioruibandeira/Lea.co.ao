<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/conexao/cnx.php');
//
class NovoProduto {
    
    //
    function ListaArtistasNovoProduto(){
        $connection = new cnx();
        $connection->connect();
        $dsc_f = base64_decode($dsc);
        
        $query = 'SELECT d_nome,d_ID FROM discos';
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                $album = base64_encode($row->d_ID);
                print "<option value='".$album."'>". strtoupper($row->d_nome) . "</option>";
            }
        }
    }
    //
    function CapaNovoProduto($dsc){
        $connection = new cnx();
        $connection->connect();
        $D_ID = base64_decode($dsc);
        
        $query = "SELECT d_capa,d_ID FROM discos where d_ID = $D_ID";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                return $row->d_capa;
            }
        }
    }
    //
    function NomeArtisticoNovoProduto($dsc){
        $connection = new cnx();
        $connection->connect();
        $D_ID = base64_decode($dsc);
        
        $query = "SELECT nomeA,d_ID FROM vwdiscografia where d_ID = $D_ID";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                return $row->nomeA;
            }
        }
    }
    //
        function produtoPegado($dsc){
        $connection = new cnx();
        $connection->connect();
        $D_ID = base64_decode($dsc);
        
        $query = "SELECT d_nome,d_ID FROM vwdiscografia where d_ID = $D_ID";
        $result = mysqli_query($connection->myconn,$query);
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                return $row->d_nome;
            }
        }
    }
    //
    
    function chaveProduto($produto,$chave_usuario){
        $connection = new cnx();
        $connection->connect();       
        //d
        $produto_ = base64_decode($produto);
        $chave_usuario_ = base64_decode($chave_usuario);
        $query = 'SELECT * FROM tblproduto_em_estoque WHERE ce_disco = "' . mysqli_real_escape_string($connection->myconn,$produto_) . '" AND ce_usuario = "' . mysqli_real_escape_string($connection->myconn,$chave_usuario_) . '"';
        //$query = "SELECT * FROM tblproduto_em_estoque WHERE ce_disco = $produto_ AND ce_usuario = $chave_usuario_ ";
        $result = mysqli_query($connection->myconn,$query);
		
    	if (mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    $c_produto = $row->ce_disco;
                    return $c_produto;
                }
    	}else{
    	    return 0;
    	}
    }
    
    function inserirProduto($produto_i,$formato,$qtd_pro,$preco,$chave_usuario){
        $connection = new cnx();
        $connection->connect();
        $produto = base64_decode($produto_i);
        $chave_usuario_ = base64_decode($chave_usuario);
        //echo("<script>console.log('PHP: Agora é minha vez".$produto_i."->2<".$formato."->3<".$qtd_pro."->4<".$preco."->5<".$chave_usuario_."');</script>");
        mysqli_query($connection->myconn,"INSERT INTO tblproduto_em_estoque (ce_disco,ce_formato,qtd_p_emestoque,preco_emestoque,ce_usuario) 
        VALUES('".$produto."','".$formato."','".$qtd_pro."','".$preco."','".$chave_usuario_."')");
    }
    
    function inserirNaLinhaDoTempo($chave_usuario,$cat_post,$post,$produto_i,$img_publicacao,$formato){
        $connection = new cnx();
        $connection->connect();
        $produto = base64_decode($produto_i);
        $chave_usuario_ = base64_decode($chave_usuario);
        //echo("<script>console.log('PHP: Agora é minha vez -> 1º".$chave_usuario_."2º->".$cat_post."3º->".$post."4º->".$produto ."5º->". $img_publicacao ."6º(".$formato .")');</script>");
        return mysqli_query($connection->myconn,"INSERT INTO tbllinha_tempo(ce_usuario,ce_categoria_post,post,ce_produto_estoque,img_publicacao,ce_formato_produto) 
        VALUES('".$chave_usuario_."','".$cat_post."','".$post."','".$produto."','".$img_publicacao."','".$formato."')");
    }
    
    function produtoCompleto($usuario){
        $connection = new cnx();
        $connection->connect();
        $usuario_ = base64_decode($usuario);
        $query = "SELECT * FROM vwproduto_em_estoque WHERE ce_usuario = $usuario_";
        $result = mysqli_query($connection->myconn,$query);
            ?>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="center">#</th>
                        <th>Capa</th>
                        <th>Produto</th>
                        <th class="hidden-xs">Formato</th>
                        <th class="hidden-480">Qtd</th>
                        <th>Preço</th>
                        <th>Sub-Total</th>
                    </tr>
                </thead>
            <?php

        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                ?>
                    <tbody>
                        <tr>
                            <td class="center"><?php $n = $n+1; print $n; ?></td>
                            <td style="width:5%; padding: 1px;"><img src="<?php print $row->d_capa; ?>" width="100%"></td>
                            <td><a href="http://www.lea.co.ao/nasocial/loja/produto.php?ce_p=<?php print Base64_encode($row->id_produto_em_estoque); ?>&c_inv=1"><?php print $row->d_nome; ?></a></td>
                            <td class="hidden-xs"><?php print $row->formato_produto; ?></td>
                            <td class="hidden-480"><?php print $row->qtd_p_emestoque; ?></td>
                            <td><?php print $row->preco_emestoque; ?></td>
                            <td><?php print $row->sub_total; ?></td>
                        </tr>
                    </tbody>
                <?php
            }
	}
        ?>
            </table>
        <?php
    }
    
    function totalEmEstoque($usu){
	    $connection = new cnx();
        $connection->connect();
        $usuario_ = base64_decode($usu);   	
        $query = "SELECT SUM(sub_total) as total_em_estoque, ce_usuario FROM vwproduto_em_estoque WHERE ce_usuario = $usuario_";
        $result = mysqli_query($connection->myconn,$query);
			
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                print strtoupper($row->total_em_estoque);
            }
        }
    }
    //
    function totalDeItens($usu){
	    $connection = new cnx();
        $connection->connect();
        $usuario_ = base64_decode($usu);   	
        $query = "SELECT SUM(qtd_p_emestoque) as total_em_estoque, ce_usuario FROM vwproduto_em_estoque WHERE ce_usuario = $usuario_";
        $result = mysqli_query($connection->myconn,$query);
			
        if(mysqli_num_rows($result) > 0){
            while($row =  mysqli_fetch_object($result)){
                print strtoupper($row->total_em_estoque);
            }
        }
    }
}

?>
