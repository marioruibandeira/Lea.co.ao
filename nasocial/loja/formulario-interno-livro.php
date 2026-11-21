<H3>Listar Livro Para Vender</H3>
<hr style="margin:5px 0px 5px 0px;" />
<form action="/nasocial/logica/controller/lojaController/InserirLivroController.php" name="glivro" onsubmit="return validateForm()" method="post" class="form-horizontal" role="form">
    <div>
        <label for="form-field-8">Obra Literária</label>
        <input type="text" name="cp_livro" class="form-control" id="form-field-8" placeholder="Obra Literária" value="<?php print $LivrosDAO->tituloLivroString($livroCode); ?>" readonly>
    </div>
    													
    <div>
        <label for="form-field-8">Autor</label>
        <input type="text" name="ce_autor" class="form-control" id="form-field-8" placeholder="Autor" value="<?php print $LivrosDAO->AutorLivroString($livroCode); ?>" readonly>
    </div>
    													
    <div>
        <label for="form-field-8">Editora</label>
        <input type="text" name="ce_editora_livro" class="form-control" id="form-field-8" placeholder="Editora" value="<?php print $LivrosDAO->EditoraLivroString($livroCode); ?>" readonly>
    </div>
    													
    <div>
        <label for="form-field-8">Quantidade</label>
        <input type="number" class="form-control" name="qtd_livro" required="required" placeholder="1" type="number">
    </div>
    													
    <div>
        <label for="form-field-8">Preço</label>
        <input type="money" placeholder="0,00" name="preco_livro" required="required" class="form-control" id="form-field-8" placeholder="0.00">
    </div>
    													
    <?php
        if(is_mobile())
        {
            ?>
                <div style="margin-top:10px; margin-bottom:30px;">
                    <button type="submit" class="btn btn-success btn-sm btn-block"> <i class="ace-icon fa fa-check bigger-110"></i> Guardar</button>
                    <button type="button" class="btn btn-secondary btn-sm btn-block">Ver Livros</button>
                </div>
            <?php
        }else{
            ?>
                <div style="text-align:right; margin-top:10px;">
    			    <button type="button" class="btn btn-defaulty btn-sm">Ver Livros</button>
                    <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                </div>
            <?php
        }
    ?>
    <input type="hidden" name="us" value="<?php print $usuario_final; ?>">
    <input type="hidden" name="lvr" value="<?php print $livroCode; ?>">
    <input type="hidden" name="cat" value="<?php print $cat; ?>">
</form>

													
												
													
													
													
													
													
												