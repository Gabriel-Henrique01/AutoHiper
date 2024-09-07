document.getElementById("Cadastro").addEventListener("submit", function(event) {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var tell = document.getElementById("tell").value;
    var password = document.getElementById("password").value;
    var cPassword = document.getElementById("cPassword").value;
    
    var nameError = document.getElementById("nameError");
    var emailError = document.getElementById("emailError");
    var tellError = document.getElementById("tellError");
    var passwordError = document.getElementById("passwordError");
    var cPasswordError = document.getElementById("cPasswordError");
    var isValid = true;
    
    nameError.textContent = "";
    emailError.textContent = "";
    tellError.textContent = "";
    passwordError.textContent = "";
    cPasswordError.textContent = "";

    if (name === "") {
        nameError.textContent = "Por favor, insira o Nome.";
        isValid = false;
    }

    if (email === "") {
        emailError.textContent = "Por favor, insira o E-Mail.";
        isValid = false;
    }

    if (tell === "") {
        tellError.textContent = "Por favor, insira o Telefone.";
        isValid = false;
    }

    if (password === "") {
        passwordError.textContent = "Por favor, insira a Senha.";
        isValid = false;
    }

    if (cPassword === "") {
        cPasswordError.textContent = "Por favor, confirme a senha.";
        isValid = false;
    }

    if (cPassword != password) {
        cPasswordError.textContent = 'As senhas são diferentes.';
        isValid = false;
    }

    // Você pode adicionar mais validações aqui conforme necessário

    if (!isValid) {
        event.preventDefault(); // Impede o envio do formulário se não for válido
    }
});