document.getElementById("Inserir").addEventListener("submit", function(event) {
    var Nome = document.getElementById("Nome").value;
    var Historia1 = document.getElementById("Historia1").value;
    var Historia2 = document.getElementById("Historia2").value;
    var Motor = document.getElementById("Motor").value;
    var Potencia = document.getElementById("Potencia").value;
    var Aceleracao = document.getElementById("Aceleracao").value;
    var Transmissao = document.getElementById("Transmissao").value;
    var Historia3 = document.getElementById("Historia3").value;
    var Imagem = document.getElementById("Imagem").value;
    
    var NomeError = document.getElementById("NomeError");
    var Historia1Error = document.getElementById("Historia1Error");
    var Historia2Error = document.getElementById("Historia2Error");
    var MotorError = document.getElementById("MotorError");
    var PotenciaError = document.getElementById("PotenciaError");
    var AceleracaoError = document.getElementById("AceleracaoError");
    var TransmissaoError = document.getElementById("TransmissaoError");
    var Historia3Error = document.getElementById("Historia3Error");
    var ImagemError = document.getElementById("ImagemError");
    
    var isValid = true;
    
    NomeError.textContent = "";
    Historia1Error.textContent = "";
    Historia2Error.textContent = "";
    MotorError.textContent = "";
    PotenciaError.textContent = "";
    AceleracaoError.textContent = "";
    TransmissaoError.textContent = "";
    Historia3Error.textContent = "";
    ImagemError.textContent = "";



    if (Nome === "") {
        NomeError.textContent = "Por favor, insira o Nome.";
        isValid = false;
    }

    if (Historia1 === "") {
        Historia1Error.textContent = "Por favor, insira a Historia.";
        isValid = false;
    }

    if (Historia2 === "") {
        Historia2Error.textContent = "Por favor, insira a Historia.";
        isValid = false;
    }

    if (Motor === "") {
        MotorError.textContent = "Por favor, insira o Motor.";
        isValid = false;
    }

    if (Potencia === "") {
        PotenciaError.textContent = "Por favor, insira a Potencia.";
        isValid = false;
    }

    if (Aceleracao === "") {
        AceleracaoError.textContent = "Por favor, insira a Aceleração.";
        isValid = false;
    }

    if (Transmissao === "") {
        TransmissaoError.textContent = "Por favor, insira a Transmissão.";
        isValid = false;
    }

    if (Historia3 === "") {
        Historia3Error.textContent = "Por favor, insira as Informações.";
        isValid = false;
    }

    if (Imagem === "") {
        ImagemError.textContent = "Por favor, insira a Imagem.";
        isValid = false;
    }

    // Você pode adicionar mais validações aqui conforme necessário

    if (!isValid) {
        event.preventDefault(); // Impede o envio do formulário se não for válido
    }
});