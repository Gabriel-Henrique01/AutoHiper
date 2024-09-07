
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir veiculos</title>
</head>
<body>
    <form action="Inserir.php" method="post" enctype="multipart/form-data" id="">

        <!-- Marca -->
        <label for="">Marca:</label>
        <input type="text" name="Marca" id="Marca">
        <p id="MarcaError" class="error"></p>

        <!-- nome -->
        <label for="">Nome do veiculo</label>
        <input type="text" name="Nome" id="Nome">
        <p id="NomeError" class="error"></p>

        <!-- Historia 1 -->
        <label for="">Historia 1</label>
        <input type="text" name="Historia1" id="Historia1">
        <p id="Historia1Error" class="error"></p>

        <!-- Historia 2 -->
        <label for="">Historia 2</label>
        <input type="text" name="Historia2" id="Historia 2">
        <p id="Historia2Error" class="error"></p>

     
        <div class="InfoTecnicas">
            <!-- Motor -->
            <label for="">Motor</label>
            <input type="text" name="Motor" id="Motor">
            <p id="MotorError" class="error"></p>

            <!-- Potencia -->
            <label for="">Potencia</label>
            <input type="text" name="Potencia" id="Potencia">
            <p id="PotenciaError" class="error"></p>

            <!-- Velocidade maxima -->
            <label for="">Velocidade maxima</label>
            <input type="text" name="Velocidade_maxima" id="Velocidade_maxima">
            <p id="VelocidadeError" class="error"></p>

            <!-- Aceleração -->
            <label for="">Aceleração</label>
            <input type="text" name="Aceleracao" id="0-100">
            <p id="AceleracaoError" class="error"></p>

            <!-- Transmissão -->
            <label for="">Transmissão</label>
            <input type="text" name="Transmissao" id="Transmissão">
            <p id="TransmissaoError" class="error"></p>
        </div>
            
        <!-- Historia 3 -->
        <label for="">Historia 3</label>
        <input type="text" name="Historia3" id="Historia3">
        <p id="Historia3Error" class="error"></p>

        <!-- Imagem -->
        <label for="">Imagem</label>
        <input type="file" name="Imagem" id="Imagem" accept="image/*">
        <p id="ImagemError" class="error"></p>

        <label for="">Imagem 2</label>
        <input type="file" name="Imagem2" id="Imagem2" accept="image/*">
        <p id="ImagemError" class="error"></p>

        <button type="submit" class="botao" name="enviar">
            Enviar formulario
        </button>
    </form>
    <?php 
        session_start();
        
        include '../conexao.php';

/*       if(isset($_FILES['Imagem']) && !empty($_FILES['Imagem'])) {

            move_uploaded_file($_FILES['Imagem']['tmp_name'],'img/'.$_FILES['Imagem']['name']);
            echo 'foi';
        }
*/
    if(isset($_POST['enviar'])){
        $Marca = $_POST['Marca'];
        $Nome = $_POST['Nome'];
        $Historia1 = $_POST['Historia1'];
        $Historia2 = $_POST['Historia2'];
        $Motor = $_POST['Motor'];
        $Potencia = $_POST['Potencia'];
        $Aceleracao = $_POST['Aceleracao'];
        $Velocidade_maxima = $_POST['Velocidade_maxima'];
        $Transmissao = $_POST['Transmissao'];
        $Historia3 = $_POST['Historia3'];

        if(isset($_FILES['Imagem']) && !empty($_FILES['Imagem'])) {
 
            $imagem = "img/".$_FILES['Imagem']['name'];
            move_uploaded_file($_FILES['Imagem']['tmp_name'], $imagem );
        }

        if(isset($_FILES['Imagem2']) && !empty($_FILES['Imagem2']['name'])) {
            $imagem2 = "img/" . basename($_FILES['Imagem2']['name']);
            move_uploaded_file($_FILES['Imagem2']['tmp_name'], $imagem2);
        }


        $sql = "INSERT INTO `carros` (`Marca`,`Nome`,`Historia1`,`Historia2`,`Motor`,`Potencia`,`Maxima`,`Aceleracao`,`Transmissao`,`Historia3`,`Imagem`, `Imagem2`) VALUES ('$Marca','$Nome','$Historia1','$Historia2','$Motor','$Potencia','$Velocidade_maxima','$Aceleracao','$Transmissao','$Historia3','$imagem', '$imagem2')";

        if ($conn->query($sql) === TRUE) {
                    
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        };

        mysqli_close($conn);
    }
        
?>
</body>
</html>