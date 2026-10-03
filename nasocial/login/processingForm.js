 function validateUsername() {
            const usernameInput = document.getElementById("n_usuario");
            const errorElement = document.getElementById("erro_usuario");
            let usernameValue = usernameInput.value.trim().toLowerCase();  // Automatically enforce lowercase
        
            const validUsernamePattern = /^[a-z0-9](?!.*[._-]{2})[a-z0-9._-]{0,18}[a-z0-9]$/;
        
            if (usernameValue === "") {
                errorElement.style.display = "none";
                usernameInput.style.borderColor = "";
            } else if (validUsernamePattern.test(usernameValue) && usernameValue.length <= 20) {
                errorElement.style.display = "none";
                usernameInput.style.borderColor = "green";
            } else {
                let errorMessage = "O nome de utilizador não é válido!";
                if (usernameValue.length > 20) errorMessage = "O nome de utilizador deve ter no máximo 20 caracteres!";
                else if (!validUsernamePattern.test(usernameValue)) errorMessage = "Use apenas letras minúsculas, números, ponto, sublinhado ou hífen!";
        
                errorElement.textContent = errorMessage;
                errorElement.style.display = "block";
                usernameInput.style.borderColor = "red";
            }
}

function validateEmail() 
{
    const emailInput = document.getElementById("email");
            const errorElement = document.getElementById("erro_email");
            let emailValue = emailInput.value.trim();
        
            const allowedExtensions = [
                "com", "net", "org", "info", "biz", "edu", "gov", "mil", "int", 
                "coop", "aero", "museum", "xyz", "online", "site", "tech", "store", "io",
                "ao", "za", "ng", "ke", "eg", "uk", "fr", "de", "es", "pt", "it",
                "cn", "in", "jp", "au", "sg", "us", "ca", "br", "ar", "mx",
                "ru", "sa", "ae", "il", "tr", "tech", "cloud", "app", "dev",
                "law", "finance", "health", "travel", "art", "design", "photography", "blog",
                "shop", "store", "market", "tv", "radio", "music", "movie"
            ];
        
            emailValue = emailValue.replace(/[^a-zA-Z0-9._%+-@]/g, '');  // Remove invalid characters
            emailInput.value = emailValue;
        
            const emailParts = emailValue.split("@");
            const domain = emailParts.length > 1 ? emailParts[1] : "";
            const extension = domain.includes(".") ? domain.split(".").slice(-2).join(".") : "";
        
            const validPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const isExtensionValid = allowedExtensions.some((ext) => extension.endsWith(ext));
        
            if (emailValue === "") {
                errorElement.style.display = "none";
                emailInput.style.borderColor = "";
            } else if (validPattern.test(emailValue) && isExtensionValid) {
                errorElement.style.display = "none";
                emailInput.style.borderColor = "green";
            } else {
                errorElement.style.display = "block";
                errorElement.textContent = isExtensionValid
                    ? "O email não é valido!"
                    : `Este email não é valido!`;
                emailInput.style.borderColor = "red";
            }
}

function validatePasswords() 
{
    const passwordInput = document.getElementById("p_pass");
            const confirmPasswordInput = document.getElementById("p_pass_2");
            const errorElement = document.getElementById("erro_senha");
        
            const passwordValue = passwordInput.value.trim();
            const confirmPasswordValue = confirmPasswordInput.value.trim();
        
            const isPasswordValid = passwordValue.length >= 5 && passwordValue.length <= 20;
            const arePasswordsEqual = passwordValue === confirmPasswordValue;
        
            if (passwordValue === "" || confirmPasswordValue === "") {
                errorElement.style.display = "none";
                passwordInput.style.borderColor = "";
                confirmPasswordInput.style.borderColor = "";
            } else if (isPasswordValid && arePasswordsEqual) {
                errorElement.style.display = "none";
                passwordInput.style.borderColor = "green";
                confirmPasswordInput.style.borderColor = "green";
            } else {
                let errorMessage = "As senhas não são iguais!";
                if (!isPasswordValid) {
                    errorMessage = "A senha deve ter entre 5 e 20 caracteres!";
                }
                errorElement.textContent = errorMessage;
                errorElement.style.display = "block";
                passwordInput.style.borderColor = "red";
                confirmPasswordInput.style.borderColor = "red";
            }
}

        function validateTerms() {
            const termsCheckbox = document.getElementById("aceita_regra");
            return termsCheckbox.checked;
        }

function toggleRegisterButton() 
{
    const isUsernameValid = document.getElementById("n_usuario").style.borderColor === "green";
            const isEmailValid = document.getElementById("email").style.borderColor === "green";
            const isPasswordValid = document.getElementById("p_pass").style.borderColor === "green" &&
                                    document.getElementById("p_pass_2").style.borderColor === "green";
            const isTermsAccepted = validateTerms();
        
            const registerButton = document.getElementById("registro");
        
            if (isUsernameValid && isEmailValid && isPasswordValid && isTermsAccepted) {
                registerButton.style.display = "inline-block";  
            } else {
                registerButton.style.display = "none";  
            }
}

        document.getElementById("n_usuario").addEventListener("input", function() {
            validateUsername();  
            setTimeout(toggleRegisterButton, 0);  
        });

        document.getElementById("email").addEventListener("input", function() {
            validateEmail();  
            setTimeout(toggleRegisterButton, 0);  
        });

        document.getElementById("p_pass").addEventListener("input", function() {
            validatePasswords();  
            setTimeout(toggleRegisterButton, 0);  
        });

        document.getElementById("p_pass_2").addEventListener("input", function() {
            validatePasswords();  
            setTimeout(toggleRegisterButton, 0);  
        });

        document.getElementById("aceita_regra").addEventListener("change", function() {
            setTimeout(toggleRegisterButton, 0);  
        });

        const registerForm = document.getElementById("registro");
        registerForm.addEventListener("submit", function(event) {
        
            const isUsernameValid = document.getElementById("n_usuario").style.borderColor === "green";
            const isEmailValid = document.getElementById("email").style.borderColor === "green";
            const isPasswordValid = document.getElementById("p_pass").style.borderColor === "green" &&
                                    document.getElementById("p_pass_2").style.borderColor === "green";
            const isTermsAccepted = validateTerms();
        
            if (!(isUsernameValid && isEmailValid && isPasswordValid && isTermsAccepted)) {
                event.preventDefault();  
                alert("Por favor, preencha corretamente todos os campos!");
            }
        });
        //
        function removeSpaces(string) {
            return string.split(' ').join('').trim();
        }
        //
        function removedorSpaco(string) {
            var str = string;
            var st = str.trim();
            return st; 
        }
        
//
// Funcao de registro
$("#registro").click(function(e)
{
    e.preventDefault(); 
    
    var origem = parseInt($("#origem").val(), 10);
    var music_download = $("#referencia").val();
    
    var n_usuario = $("#n_usuario").val();
    var email = $("#email").val();
    var p_pass = $("#p_pass").val();
    var p_pass_2 = $("#p_pass_2").val();
    var aceita_regra = $("#aceita_regra").prop("checked");
    
    var erro_usuario = $("#erro_usuario");
    var erro_senha = $("#erro_senha");
    
    $.post('/nasocial/login/proc_reg.php', {
        n_usuario: n_usuario,
        email: email,
        p_pass: p_pass,
        p_pass_2: p_pass_2,
        aceita_regra: aceita_regra,
        iuiui: 43
    }, 
    function(response) 
    {
        response = response.replace(/[\n\r\t]/g, '');
                
        if (response == "0") {
            erro_senha.show();
            erro_usuario.hide();
        } else if (response == "1") {
            erro_usuario.show();
            erro_senha.hide();
        } else if (response == "2") {
            erro_usuario.hide();
            erro_senha.hide();
                    
            switch (origem) {
                case 0:
                    return document.location.href = music_download;
                    break;
                case 1:
                    return document.location.href = "https://www.lea.co.ao/nasocial/";
                    break;
                default:
                    return document.location.href = "https://www.lea.co.ao/nasocial/";
            }
        }
    });
});