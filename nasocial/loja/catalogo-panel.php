<H3 style="margin:3px 0px 10px 0px"><b>Catalogo</b></H3>

<div class="row" style="margin:0px 1px 0px 1px;">
    <div class="search-area well col-xs-12" style="padding:5px 5px 4px 5px">
        <div class="pull-left">
            <div id="toggle-result-format" class="btn-group btn-overlap" data-toggle="buttons">
                <label title="Thumbnail view" class="btn btn-lg btn-white btn-success active" data-class="btn-success" aria-pressed="true" style="padding:2px 8px 2px 8px">
                    <input type="radio" value="2" autocomplete="off" />
                    <i class="icon-only ace-icon fa fa-th"></i>
                </label>
                <label title="List view" class="btn btn-lg btn-white btn-grey" data-class="btn-primary" style="padding:2px 8px 2px 8px">
                    <input type="radio" value="1" checked="" autocomplete="off" />
                    <i class="icon-only ace-icon fa fa-list"></i>
                </label>																
            </div>
        </div>
        <div class="pull-right">
            <select id="categoria" onchange="selectCategoriaFunction(this);" name="categoria">
                <?php if($todos==false) {  $CatalogoDAO->CategoriaCatalogo($categoria,$todos); print "<option>Todos</option>"; }else { print "<option>Todos</option>"; $CatalogoDAO->CategoriaCatalogo($categoria,$todos); } ?>
            </select>
        </div>
    </div>
    
    <?php $CatalogoDAO->CatalogoPorUsuario($start,$usuario,is_mobile(),$catalogo,$categoria,$todos,$ami); ?>
    <input type="hidden" id="us" value="<?php print $usuario; ?>">
</div>

<script>
    function selectCategoriaFunction() 
    {
        var x = document.getElementById("categoria").value;
        var us = document.getElementById("us").value;
        if(x != '')
        {
            window.open("https://www.lea.co.ao/nasocial/loja/catalogo.php?us="+us+"&start=0&cat=" + x, "_self" );
        }
    }
</script>
            