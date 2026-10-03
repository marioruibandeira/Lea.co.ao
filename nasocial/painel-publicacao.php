<style media="screen">
    #custom-button 
    {
        padding:10px;
        color:white;
        background-color: #009578;
        border:1px solid #000;
        border-radius:5px;
        cursor:pointer;
    } 
    
    #custom-button:hover{
        background-color:#00b28f;
    }
    
    #custom-text
    {
        margin-left:10px;
        font-family:sans-serif;
        color:#aaa;
    }
    
    button.oploadimgb {
        background-color: #6FB3E0!important;
        border-color: #6FB3E0;
        border-width: 4px;
        font-size: 13px;
        padding: 8px 9px;
        line-height: 1.38;
        border: none;
        color: #fff;
    }
    
    #real-file {
        opacity: 0;
        width: 0;
        height: 0;
        border: none;
    }
    .txtarea{
        width:100%; 
        border-radius: 5px !important;
        background-color:#EDF3E8;
        border-radius: 10px;
    }
    .painel-publicar { border:#ccc 1px solid;margin-bottom:12px; padding:10px; }
</style>
<script type="text/javascript">
    const realFileBtn = document.getElementById("real-file");
    const customBtn = document.getElementById("custom-button");
    const customTxt = document.getElementById("custom-text");
</script>

<script type="text/javascript" src="/nasocial/usuario/jquery.1.8.3.min.js"></script>
<script type="text/javascript" src="/nasocial/usuario/MaxLength.min.js"></script>
<script type="text/javascript">
    $(function () {
        //Normal Configuration
        $("#pblicacao").MaxLength({ MaxLength: 200 });

        //Specifying the Character Count control explicitly
        $("#TextBox2").MaxLength(
        {
            MaxLength: 15,
            CharacterCountControl: $('#counter')
        });

        //Disable Character Count
        $("#TextBox3").MaxLength(
        {
            MaxLength: 20,
            DisplayCharacterCount: false
        });
    });
</script>

<div class="painel-publicar contorno">
    <form action="/nasocial/logica/controller/usuario/timelineInlineFormularioController.php" enctype="multipart/form-data" method="post">
        <textarea rows="4" class="txtarea" id="pblicacao" name="pblicacao" placeholder="Qua é a ideia?..." onblur="this.value=removedorSpaco(this.value);"></textarea>
        <div class="row">
            <div class="col-sm-8">
                <input name="img_pblicacao" type="file" id="real-file"  accept="image/jpg, image/jpeg"/>
                <button type="button" class="oploadimgb contorno" <?php if(is_mobile()){  print 'style="width:100%; margin-bottom:5px;"'; } ?> > <i class="ace-icon glyphicon glyphicon-open"></i> Selecionar Imagem</button>
            </div>
            <div class="col-sm-4">
                <button style="width:100%;" class="btn btn-sm btn-info no-radius contorno" id="btnPublicar" type="submit" disabled> 
                    <i class="ace-icon fa fa-share"></i> Publicar 
                </button>
            </div>
        </div>
        <input type="hidden" name="usuario" value="<?php print $u_fnal; ?>">
        <div id="img"></div>
    </form>
</div>

<script>
    $(".oploadimgb").click(function(){
        $("#real-file").click();
    });
    //
   $("#real-file").change(function()
   {
        var reader = new FileReader();
    
        reader.onload = function (e) 
        {
            var img = $("<img/>", {style:'margin-top:10px;text-align:center;border:#ccc solid 1px; width:100%;'});
            img.get(0).src = e.target.result;
            $("#img").append(img);
        };
        reader.readAsDataURL(this.files[0]);
    })
    
    //Este script activa o botão da publicação
    const publicacao = document.getElementById("pblicacao");
    const btnPubl = document.getElementById("btnPublicar");
    
    publicacao.addEventListener("input", function () 
    {
        let quantidade = pblicacao.value.length;
    
        if (quantidade > 8) {
            btnPubl.disabled = false;
        } 
        else
        {
            btnPubl.disabled = true;
        }
    });
    
    //
    const inputFile = document.getElementById("real-file");
    
    inputFile.addEventListener("change", function () {

        if (inputFile.files.length > 0) {
            btnPubl.disabled = false;
        } else {
            btnPubl.disabled = true;
        }
    
    });
</script>