<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/header.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.ContactosTrabalhoDAO.php');
    $ContactosTrabalhoDAO_ = new ContactosTrabalhoDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.PerfilDoArtistaDAO.php');
    $PerfilDoArtistaDAO_ = new PerfilDoArtistaDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/entidade/class.ContactosTrabalho.php');
    $ContactosTrabalho_ = new ContactosTrabalho();
    $ContactosTrabalho_->setCe_usuario($usuario_final);
    include_once($_SERVER['DOCUMENT_ROOT'].'/logica/dao/class.UtilidadesDAO.php');
    $UtilidadesDAO = new UtilidadesDAO();
    include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/logica/dao/class.CarregarMusicaDAO.php');
    $CarregarMusica = new CarregarMusicaDAO(); 
    
    $contactoExiste = $ContactosTrabalhoDAO_->VerificarExistenciaContacto($usuario_final,$ContactosTrabalhoDAO_->VerificarExistenciaUtilizador($ContactosTrabalho_));
?>
<style>
    .main-li{background-color:#fff;border:#fff 1px solid;border-radius:50px;}
    .icons-tag{font-weight:bolder;font-size:16px;color:#222843;padding-right: 10px;}
    .main-li:hover {background-color: #ccc; border:#fff 1px solid;border-radius:50px;cursor: pointer;}
    .txt-meuno{color:#222843;font-weight:bolder;font-size:16px;padding-top:20px;}
    .espaco{padding:5px 5px 5px 5px;}
    .fix-image { position: relative; height: <?php if(is_mobile()){ print "109px"; }else{ print "218px"; } ?>;  background-size: cover; background-repeat: no-repeat; background-position: 100%;}
    .link_{color:#fff;}
</style>

<input type="hidden" id="ce_artista" value="<?php print $ContactosTrabalhoDAO_->VerificarExistenciaUtilizador($ContactosTrabalho_); ?>">
<input type="hidden" id="ce_usuario" value="<?php print $usuario_final; ?>">
<script>
    
    var contactoTelefone = "<?php print $ContactosTrabalhoDAO_->ContactosTelefone($usuario_final, $ContactosTrabalhoDAO_->VerificarExistenciaUtilizador($ContactosTrabalho_)); ?>";
    var contractoWhatsapp = "<?php print $ContactosTrabalhoDAO_->ContactosWhatsapp($usuario_final, $ContactosTrabalhoDAO_->VerificarExistenciaUtilizador($ContactosTrabalho_)); ?>";
    var contactoExiste = <?php echo $contactoExiste; ?>;

    // Check if contactoTelefone is null or empty, set to 0 if true
    function checkContactoTelefone() {
        // Convert contactoTelefone to a string and check if it's empty or null
        if (contactoTelefone === null || String(contactoTelefone).trim() === "") {
            console.log("contactoTelefone is empty or null.");
            contactoTelefone = 0;
        }
    }
    // Call the function to check contactoTelefone
    checkContactoTelefone();
    
    function checkContactoWhatsapp() {
        // Convert contractoWhatsapp to a string and check if it's empty or null
        if (contractoWhatsapp === null || String(contractoWhatsapp).trim() === "") {
            console.log("contractoWhatsapp is empty or null.");
            contractoWhatsapp = 0;
        }
    }
    // Call the function to check contractoWhatsapp
    checkContactoWhatsapp();
  
    function InserirContactosTrabalho()
    {
        var telefone = $("#telefone").val().replace(/\s+/g, ''); 
        var ce_artista = $("#ce_artista").val();
        var ce_usuario = $("#ce_usuario").val();
                
        if(!ce_artista){
            ce_artista = 0;
        }
        if(!ce_usuario){
            ce_usuario = 0;
        }
        var accao = 0;
        var main = 0;
                
        $.post('/nasocial/logica/controller/ContactosTrabalhoController.php', 
        {
            telefone:telefone,
            ce_artista:ce_artista,
            ce_usuario:ce_usuario,
            accao:accao,
            main :main
        }, 
        function(response)
        {
            json = JSON.parse(response);
                    
            if(json.telefone_ == 0 )
            {
                document.getElementById('guardar_telefone').value = " "; 
                console.log("Telefone não foi inserido com sucesso");
            }else{
                document.getElementById('guardar_telefone').value = json.telefone_;
                if(json.telefone_ > 0){
                    guardar_telefone.setAttribute('style', 'display: none;');
                    actualizar_telefone.setAttribute('style', 'display: block;');
                    actualizar_telefone.setAttribute('style', 'width :  100%;');
                    contactoTelefone == json.telefone_;
                    document.getElementById('btn_eliminar').style.display = 'block';
                    console.log("Telefone inserido com sucesso - main.");
                }
            }
        });
    }
    //
    function InserirContactosWhatsapp()
    {
        var whatsApp = $("#whatsApp").val().replace(/\s+/g, ''); 
        var ce_artista = $("#ce_artista").val();
        var ce_usuario = $("#ce_usuario").val();
                
        if(!ce_artista){
            ce_artista = 0;
        }
        if(!ce_usuario){
            ce_usuario = 0;
        }
        var accao = 0;
        var main = 1;
                
        $.post('/nasocial/logica/controller/ContactosTrabalhoController.php', 
        {
            whatsApp:whatsApp,
            ce_artista:ce_artista,
            ce_usuario:ce_usuario,
            accao:accao,
            main :main
        }, 
        function(response)
        {
            json = JSON.parse(response);
                    
            if(json.whatsapp_ == 0 )
            {
                document.getElementById('guardar_whatsapp').value = " "; 
                console.log("whatsApp não foi inserido com sucesso");
            }else{
                document.getElementById('guardar_whatsapp').value = json.whatsapp_;
                if(json.whatsapp_ > 0){
                    guardar_whatsapp.setAttribute('style', 'display: none;');
                    actualizar_whatsapp.setAttribute('style', 'display: block;');
                    actualizar_whatsapp.setAttribute('style', 'width : 100%;');
                    document.getElementById('btn_eliminar').style.display = 'block';
                    contractoWhatsapp == json.whatsapp_;
                    console.log("whatsApp inserido com sucesso - main.");
                }
            }
        });
    }
    //
    function ActualizarContacto() 
    {
        var telefone = $("#telefone").val().replace(/\s+/g, '');
        var whatsApp = $("#whatsApp").val().replace(/\s+/g, '');
        var ce_artista = $("#ce_artista").val() || 0; // Use default value of 0 if empty
        var ce_usuario = $("#ce_usuario").val() || 0; // Use default value of 0 if empty
    
        var accao = 1;
        var main = 0;
    
        // Validate required fields
        var isValid = true;
    
        if (!telefone.trim()) {
            $("#telefone").css("border-color", "red");
            isValid = false;
        } else {
            $("#telefone").css("border-color", "");
            $.post('/nasocial/logica/controller/ContactosTrabalhoController.php', 
            {
                telefone: telefone,
                whatsApp: whatsApp,
                ce_artista: ce_artista,
                ce_usuario: ce_usuario,
                accao: accao,
                main: main
            }, 
            function(response) {
                try {
                    var json = JSON.parse(response);
                    console.log(json); // Use json variable as needed
                    document.getElementById('btn_eliminar').style.display = 'block';
                    document.getElementById('guardar_actualizar_telefone').style.display = 'none';
                    document.getElementById('guardar_actualizar_whatsapp').style.display = 'none';
                    document.getElementById('actualizar_telefone').style.display = 'block';
                    document.getElementById('actualizar_whatsapp').style.display = 'block';
                } catch (e) {
                    console.error("Error parsing JSON response:", e);
                    console.log("Raw response:", response);
                }
            });
        }
    }

    function EliminarContactosTrabalho() {
        var telefone = $("#telefone").val();
        var whatsApp = $("#whatsApp").val();
        var ce_artista = $("#ce_artista").val();
        var ce_usuario = $("#ce_usuario").val();
                    
        if(!ce_artista){
            ce_artista = 0;
        }
        if(!ce_usuario){
            ce_usuario = 0;
        }
        var accao = 2;
        var main = 0;
                    
        $.post('/nasocial/logica/controller/ContactosTrabalhoController.php', 
        {
            telefone:telefone,
            whatsApp:whatsApp,
            ce_artista:ce_artista,
            ce_usuario:ce_usuario,
            accao:accao,
            main:main
        }, 
        function(response) {
            console.log(response);
            try {
                var json = JSON.parse(response);
                if(json.whatsapp_ == "" && json.telefone_ == "") {
                    document.getElementById('telefone').value = ""; 
                    document.getElementById('whatsApp').value = "";
                    
                    document.getElementById('guardar_telefone').style.display = 'none';
                    document.getElementById('actualizar_telefone').style.display = 'none';
                    document.getElementById('guardar_whatsapp').style.display = 'none';
                    document.getElementById('actualizar_whatsapp').style.display = 'none';
                    document.getElementById('telefone').style.borderColor = '';
                    document.getElementById('whatsApp').style.borderColor = '';
                    document.getElementById('btn_eliminar').style.display = 'none';
                }
                console.log("Eliminado Com Sucesso");
                contactoTelefone = 0;
            } catch (e) {
                console.error("Error parsing JSON response:", e);
                console.log("Raw response:", response);
            }
        });    
    }
    
    //
    function ActualizarActualizacoesPerfil()
    {
        var actual_input = $("#actual_input").val();
        var ce_artista = $("#ce_artista").val();
        var ce_usuario = $("#ce_usuario").val();
                
        if(!ce_artista){
            ce_artista = 0;
        }
        if(!ce_usuario){
            ce_usuario = 0;
        }
            
        var accao = "0";
        
        $.post('/nasocial/logica/controller/PerfilDoArtista.php', 
        {
            actual_input:actual_input,
            ce_artista:ce_artista,
            ce_usuario:ce_usuario,
            accao:accao
        }, 
        function(response)
        {
            console.log(response);
            /*
            json = JSON.parse(response);
            console.log(json.telefone_);
            document.getElementById('telefone').value = json.telefone_;
            document.getElementById('whatsApp').value = json.whatsapp_;
            */
        });    
    }

</script>

<div class="row">
    <div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
	<?php
	    if(is_mobile())
	    {
	        ?>
	        <div class="page-header">
                <h1> Meu Perfil Na Lea.co.ao <small> <!--<i class="ace-icon fa fa-angle-double-right"></i> Actulizações &amp; Outros </small></h1>-->
            </div>
            <?php
	        include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/meu-perfil/meu-perfil-panel.php'); 
        }
        else 
        {
            ?>
                <div class="row">
                    <div class="col-xs-3 col-md-3">
                        <div class="card" style="width: 100%;">
                            <?php $utilidade->MainSideMenu($usuario_final); ?>
                            <?php $utilidade->SideMenuProdutosAvendas($usuario_final); ?>
                            <?php $utilidade->SideMenuContaLea(); ?>
                        </div>
                    </div>
                    <div class="col-xs-9 col-md-9"> 
                        <div class="page-header">
                            <h1> Meu Perfil Na Lea.co.ao <small> <!--<i class="ace-icon fa fa-angle-double-right"></i> Actulizações &amp; Outros </small></h1>-->
                        </div>
                        <?php include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/meu-perfil/meu-perfil-panel.php'); ?>
                    </div>
                </div>
            <?php
        }
    ?>
	<!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/nasocial/footer.php'); ?>
<script>
    document.getElementById('carregarCapa').addEventListener('change', function(e) {
        if (e.target.files[0]) {
            document.getElementById('carregarFoto').value = e.target.files[0].name;
            console.log(e.target.files[0].name);
        }
    });
    
    document.getElementById('carregarFotoPerfil').addEventListener('change', function(e) {
        
        if (e.target.files[0]) {
            document.getElementById('carregarFotoPerfil_').innerHTML = e.target.files[0].name;
            console.log(e.target.files[0].name);
        }
    });
    
    // Initial check on page load to hide buttons if contactoTelefone is 0
    if (contactoTelefone == 0) {
        //document.getElementById('eliminar_telefone').style.display = 'none';
        document.getElementById('actualizar_telefone').style.display = 'none';
    } else {
        //document.getElementById('eliminar_telefone').style.display = 'block';
        document.getElementById('actualizar_telefone').style.display = 'block';
    }
    
    // Initial check on page load to hide buttons if contactoTelefone is 0
    if (contractoWhatsapp == 0) {
        //document.getElementById('eliminar_whatsapp').style.display = 'none';
        document.getElementById('actualizar_whatsapp').style.display = 'none';
    } else {
        //document.getElementById('eliminar_whatsapp').style.display = 'block';
        document.getElementById('actualizar_whatsapp').style.display = 'block';
    }
    
    function formatPhoneNumber(input) 
    {
        var value = input.value.replace(/\D/g, ''); // Remove all non-digit characters
    
        // Format the number as XXX XXX XXX only if the length is more than 3
        var formattedValue = "";
        for (var i = 0; i < value.length; i++) {
            if (i > 0 && i % 3 == 0) {
                formattedValue += ' ';
            }
            formattedValue += value[i];
            checkContactoTelefone();
        }
    
        // Update the input value
        input.value = formattedValue;
    
        // Validate the length of the input without spaces
        var cleanedValue = value; // Already without spaces from initial replace
        if (cleanedValue.length === 9 && contactoTelefone == 0) 
        {
            if(contactoExiste === 1  && contactoTelefone === 0)
            {
                document.getElementById('guardar_actualizar_telefone').style.display = 'block';
                document.getElementById('guardar_actualizar_telefone').style.width = '100%';
            }else if(contactoExiste === 1  && contactoTelefone > 0)
            {
                document.getElementById('actualizar_telefone').style.display = 'block';
            }else{
                document.getElementById('guardar_telefone').style.display = 'block';
                document.getElementById('guardar_telefone').style.width = '100%';
            }
            input.style.borderColor = 'green'; 
        } 
        else if(cleanedValue.length === 9 && contactoTelefone > 0)
        {
            document.getElementById('actualizar_telefone').style.display = 'block';
            input.style.borderColor = 'green'; 
        } else {
            document.getElementById('guardar_telefone').style.display = 'none';
            document.getElementById('actualizar_telefone').style.display = 'none';
            input.style.borderColor = 'red'; 
        }
    }
    
    function formatNumeroWhatsapp(input) {
        var value = input.value.replace(/\D/g, ''); // Remove all non-digit characters
    
        // Format the number as XXX XXX XXX
        var formattedValue = "";
        for (var i = 0; i < value.length; i++) {
            if (i > 0 && i % 3 == 0) {
                formattedValue += ' ';
            }
            formattedValue += value[i];
            checkContactoWhatsapp();
        }
    
        input.value = formattedValue;
    
        var cleanedValue = value; 
        
        if (cleanedValue.length === 9 && contractoWhatsapp == 0) 
        {
            if(contactoExiste === 1  && contractoWhatsapp === 0)
            {
                document.getElementById('guardar_actualizar_whatsapp').style.display = 'block';
            }else if(contactoExiste === 1 && contractoWhatsapp > 0){
                document.getElementById('actualizar_whatsapp').style.display = 'block';        
            }else{
                document.getElementById('guardar_whatsapp').style.display = 'block';
            }
            input.style.borderColor = 'green'; 
        } else if (cleanedValue.length === 9 && contractoWhatsapp > 0) {
            input.style.borderColor = 'green'; 
            document.getElementById('actualizar_whatsapp').style.display = 'block';
        } else {
            document.getElementById('guardar_whatsapp').style.display = 'none';
            document.getElementById('actualizar_whatsapp').style.display = 'none';
            input.style.borderColor = 'red'; 
        }
    }
    
    //
    function incopy() {
        const copyInput = document.querySelector('#txt_cp');
        copyInput.select();
        document.execCommand('copy');
    }
    
    window.onload = function() 
    {
        if (contactoExiste === 1) {
            document.getElementById('btn_eliminar').style.display = 'block'; // Show the div if contactoExiste is true and the element exists
        } else{
            document.getElementById('btn_eliminar').style.display = 'none'; // Hide the div if contactoExiste is false and the element exists
        }
    };
    //
    //Fazer upload de musicas
    document.getElementById('musica').addEventListener('change', function(event) {
        var file = event.target.files[0]; 
        if (file) {
            var fileName = file.name; 
            var carregarMusica = document.getElementById('carregarMusica');
            carregarMusica.value = fileName; 
            carregarMusica.setAttribute('readonly', true); 
        }
    });
    
    document.getElementById('capa').addEventListener('change', function(event) {
        var file = event.target.files[0]; 
        if (file) {
            var fileName = file.name; 
            var carregarCapa = document.getElementById('carregarCapa');
            carregarCapa.value = fileName; 
            carregarCapa.setAttribute('readonly', true); 
        }
    });

    function CarregarMusica()
    {
        var ce_usuario = $("#ce_usuario").val();
        var ce_artista = $("#ce_artista").val();
        
        var titulo = $("#titulo").val();
        var genero_id = $("#genero_id").val();
        var ano = $("#ano").val();
        var musica = $("#musica").val();
        var capa = $("#capa").val();
        
        //alert(ce_usuario + ", " + ce_artista + ", " + titulo + ", " + genero_id + ", " + ano + ", " + musica + ", " + capa);
        
        $.post('/nasocial/logica/controller/CarregarMusicaController.php', 
        {
            ce_usuario:ce_usuario,
            ce_artista:ce_artista,
            titulo:titulo,
            genero_id:genero_id,
            ano:ano,
            musica:musica,
            capa:capa,
        }, 
        function(response)
        {
            console.log(response);
            alert(
            "ce_usuario: " + data.ce_usuario + "\n" +
            "ce_artista: " + data.ce_artista + "\n" +
            "titulo: " + data.titulo + "\n" +
            "genero_id: " + data.genero_id + "\n" +
            "ano: " + data.ano + "\n" +
            "capa: " + data.capa
        );
            
        });
    }
</script>
