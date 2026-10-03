Neste painel você poderá carregar até 3 músicas.
<div class="input-group">
    <span class="input-group-addon" style="padding-left:31px;" id="basic-addon1">Titulo</span>
    <input type="text" id="titulo" class="form-control" placeholder="Titulo da música" value="">
</div>

<div class="input-group" style="margin-top:8px;">
    <span class="input-group-addon" style="padding-left:20px;" id="basic-addon1">Gênero</span>
    <select class="form-control" id="genero_id">
        <?php $CarregarMusica->GeneroMusical(); ?>
    </select>
</div>

<div class="input-group" style="margin-top:8px;">
    <span class="input-group-addon" style="padding-left:42px;" id="basic-addon1">Ano</span>
    <select class="form-control" id="ano">
        <option value="2025">2025</option>
        <option value="2024">2024</option>
        <option value="2023">2023</option>
        <option value="2022">2022</option>
        <option value="2021">2021</option>
        <option value="2020">2020</option>
    </select>
</div>

<div class="input-group" style="margin-top:8px;">
    <span class="input-group-addon" style="padding:0px;" id="basic-addon1">
        <div class="custom-file-upload">
            <i class="glyphicon glyphicon-open"></i> Música 
            <input type="file" id="musica" class="file-input" accept=".mp3,audio/*">
        </div>
    </span>
    <input type="text" id="carregarMusica" style="height: 34px;" class="form-control" placeholder="Ficheiro da música" value="" readonly/>
</div>

<div class="input-group" style="margin-top:8px;">
    <span class="input-group-addon" style="padding:0px;" id="basic-addon1">
        <div class="custom-file-upload">
            <span style="padding:0px 0px 0px 12px">    
                <i class="glyphicon glyphicon-open"></i> Capa 
            </span> 
            <input type="file" id="capa" class="file-input" accept="image/*">
        </div>
    </span>
    <input type="text" id="carregarCapa" style="height: 34px;" class="form-control" placeholder="Capa da música" value="" readonly>
</div>


<div class="row" style="margin-top:8px;">
    <div class="col-sm-12">
        <button id="actualizar" class="btn btn-sm btn-success" onclick="CarregarMusica()" style="width:100%">
            <i class="ace-icon fa fa-floppy-o bigger-125"></i> Guardar
        </button>
    </div>
</div>

<hr/>
<div class="panel-heading btn-primary" style="color:#fff; padding:5px;"><b>Músicas Disponíveis</b></div>

<div class="panel panel-default" style="margin:0px 0px 0px 0px;">
    <table class="table">
        <tr>
            <th>Titulo</th>
            <th>Genero</th>
            <th>Ano</th>
            <th><i class="glyphicon glyphicon-pencil"></i> || <i class="glyphicon glyphicon-trash"></i></th>
        </tr>
        <?php //$LivrosDAO->listarLivrosPorUsuario($utilizador,$inicio,$u_e); ?>
    </table>
</div>