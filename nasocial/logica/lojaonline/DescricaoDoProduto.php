<?php
/**
 * Description of descricaoDoProduto
 *
 * @author hash
 */
include_once($_SERVER['DOCUMENT_ROOT'].'/conexao/cnx.php');
class DescricaoDoProduto {
    function perfilDaAgenda($ce_usuario, $id_agenda_evento){
        $connection = new cnx();
        $connection->connect();
        $query = "SELECT * FROM vwagenda_na_lea WHERE ce_usuario = '".Base64_decode($ce_usuario)."' AND id_agenda_evento = '".Base64_decode($id_agenda_evento)."'";
        $result = mysqli_query($connection->myconn,$query);
            
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                ?>
                    <div>
                        <span class="label label-lg label-yellow arrowed-in arrowed-in-right"><b style="font-size: 18px;"><?php print $row->titulo_evento; ?></b></span>
                        <div class="space-6"></div>
                        <div class="space-4"></div>
                        <span class="profile-picture">
                            <img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="assets/images/avatars/profile-pic.jpg" />
                        </span>				
                    </div>
                    <div class="hr hr12 dotted"></div>
                    <div class="clearfix">
                        <button class="btn btn-xs btn-danger" style="width: 100%">
                            <i class="ace-icon fa fa-shopping-cart bigger-110"></i> Comprar Ingresso
                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                        </button>
                    </div>
                <?php
            }
	}
    }
    
    function DescricaoPerfilDaAgenda($ce_usuario, $id_agenda_evento){
        $connection = new cnx();
        $connection->connect();
        $query = "SELECT * FROM vwagenda_na_lea WHERE ce_usuario = '".Base64_decode($ce_usuario)."' AND id_agenda_evento = '".Base64_decode($id_agenda_evento)."'";
        $result = mysqli_query($connection->myconn,$query);
            
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                ?>
                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Data </div>
                            <div class="profile-info-value">
                                <i class="fa fa-calendar light-orange bigger-110"></i>
                                <span class="editable" id="username"><?php print $row->data_evento; ?></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Hora </div>
                            <div class="profile-info-value">
                                <i class="fa fa-hourglass-start light-orange bigger-110"></i>
                                <span class="editable" id="country">Netherlands</span>
                                <span class="editable" id="city">Amsterdam</span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Preço </div>
                            <div class="profile-info-value">
                                <span class="editable" id="age">Kz <?php print $row->preco_agenda; ?></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Local </div>
                            <div class="profile-info-value">
                                <i class="fa fa-map-marker light-orange bigger-110"></i>
                                <span class="editable" id="signup"><?php print $row->local_evento . ", " .  $row->provincia; ?></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Telefone </div>
                            <div class="profile-info-value">
                                <i class="fa fa-phone light-orange bigger-110"></i>
                                <span class="editable" id="login"><?php print $row->telefone_agenda; ?></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Observação </div>
                            <div class="profile-info-value">
                                <span class="editable" id="about"><?php print $row->descricao_agenda; ?></span>
                            </div>
                        </div>
                    </div>
                <?php
            }
	}
    }
    
    function perfilDoDisco($id_produto_em_estoque){
        $connection = new cnx();
        $connection->connect();
        $query = "SELECT * FROM vwproduto_em_estoque WHERE id_produto_em_estoque ='". Base64_decode($id_produto_em_estoque)."'";
        $result = mysqli_query($connection->myconn,$query);
            
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                ?>
                    <div>
                        <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                            <div class="inline position-relative">
                                <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                                    <b><span class="white"><?php print $row->d_nome; ?></span></b>
                                </a>
                            </div>
                        </div>
                        <div class="space-6"></div>
                        <div class="space-4"></div>
                        <span class="profile-picture">
                            <img id="avatar" class="editable img-responsive" alt="<?php print $row->d_nome; ?>" src="<?php print $row->d_capa; ?>" />
                        </span>				
                    </div>
                    <div class="hr hr12 dotted"></div>
                    <div class="clearfix">
                        <div class="grid2">
                            <span class="bigger-175 blue"><?php print $row->gosto; ?></span>
                            <br />Curtidas
                        </div>
                        <div class="grid2">
                            <span class="bigger-175 blue"><?php print $row->recom; ?></span>
                            <br />Recomendo
                        </div>
                    </div>
                    <div class="hr hr12 dotted"></div>
                    <div class="clearfix">
                        <button class="btn btn-xs btn-danger" style="width: 100%">
                            <i class="ace-icon fa fa-shopping-cart bigger-110"></i> Comprar CD
                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                        </button>
                    </div>
                <?php
            }
	}
    }
    
    
    function DescricaoPerfilDoDisco($id_produto_em_estoque){
        $connection = new cnx();
        $connection->connect();
        $query = "SELECT * FROM vwproduto_em_estoque WHERE id_produto_em_estoque = '". Base64_decode($id_produto_em_estoque)."'";
        $result = mysqli_query($connection->myconn,$query);
            
        //if records present
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                ?>
                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Artista </div>
                            <div class="profile-info-value">
                                <span class="editable" id="username"><?php print $row->nomeA; ?></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Formato </div>
                            <div class="profile-info-value">
                                <span class="editable" id="country"><?php print $row->formato_produto; ?></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Preço </div>
                            <div class="profile-info-value">
                                <span class="editable" id="age">Kz <?php print $row->preco_emestoque; ?></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Ano </div>
                            <div class="profile-info-value">
                                <span class="editable" id="signup"><?php print $row->d_ano; ?></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Quantidade </div>
                            <div class="profile-info-value">
                                <span class="editable" id="login"><?php print $row->qtd_p_emestoque; ?></span>
                            </div>
                        </div>
                    </div>
                <?php
            }
	}
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
}
