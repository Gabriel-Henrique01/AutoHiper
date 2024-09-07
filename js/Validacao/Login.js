document.getElementById("Login").addEventListener("submit", function(event) {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    
    var emailError = document.getElementById("emailError");
    var passwordError = document.getElementById("passwordError");
    var isValid = true;
    
    emailError.textContent = "";
    passwordError.textContent = "";


    if (email === "") {
        emailError.textContent = "Por favor, insira o E-Mail.";
        isValid = false;
    }

    if (password === "") {
        passwordError.textContent = "Por favor, insira a Senha.";
        isValid = false;
    }

    // Você pode adicionar mais validações aqui conforme necessário

    if (!isValid) {
        event.preventDefault(); // Impede o envio do formulário se não for válido
    }
});