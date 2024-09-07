<?php 
session_start();
include 'conexao.php';

if (isset($_POST['enviar'])) {
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE Email='$email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($row) {
        if ($row['Senha'] == $senha) {
            $_SESSION['Nome'] = $row['Nome'];
            $_SESSION['ID'] = $row['ID'];
            $_SESSION['Cargo'] = $row['Cargo'];
            header("Location: ../Index.php");
            exit();
        } else {
            $errorsenha = 'A senha está incorreta';
        }
    } else {
        $erroremail = 'O E-Mail está incorreto';
    }
}
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Login.css">
    <link rel="stylesheet" href="../css/Footer.css">
    <link rel="website icon" type="png" href="../img/Logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Finlandica:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <section class="conteudo">
        <a href="../Index.php"><img src="../img/Home.svg" alt="Home" class="HomeIcon"></a>
        <div class="videoPlayer">
            <img src="../img/Login.webp" alt="McLaren P1" class="background">
        </div>
        
        <div class="tudo">
            <form id="Login" action="Login.php" method="post">
                <h1>Seja bem-vindo</h1>

                <label for="email">Email:</label><br>
                <input type="text" id="email" name="email"/>
                <p id="emailError" class="error"><?php if(isset($erroremail)) echo $erroremail; ?></p>

                <label for="password">Senha:</label><br>
                <input type="password" id="password" name="password"/>
                <p id="passwordError" class="error"><?php if(isset($errorsenha)) echo $errorsenha; ?></p>

                <h2 class="login">Não possui uma conta? Então <a href="Cadastro.php">Cadastre-se</a></h2>

                <input type="submit" id="botao" value="Enviar" name="enviar"/>
            </form> 
        </div>
    </section>

    <script src="../js/Validacao/Login.js"></script>

    <!----------------------------------FOOTER----------------------------->
    <main>
                <section class="module content2">
                    <div class="container3">
                        <div class="quadrante2">
                            <h2>Contato</h2>
                            <ul>
                                <li>
                                    <h3>Endereço</h3>
                                    Av. das Hortênsias, 4635- Bairro carniel, Gramado, RS, 95670760
                                </li>
                                <li>
                                    <h3>Telefone</h3>
                                    (15)99102-6694
                                </li>
                                <li>
                                    <h3>E-mail</h3>
                                    Autohiper@hipercar.com.br
                                </li>
                                <li>
                                    <div class="Social-container">
                                        <h3>Instagram</h3>
                                        <img src="img/Insta_Logo.png" alt="Instagram Logo" height="30px" width="30px" class="Logos">
                                    </div>
                                    @AutoHiper
                                </li>
                                <li>
                                    <div class="Social-container">
                                        <h3>Facebook</h3>
                                        <img src="img/Face_Logo.png" alt="Facebook Logo" height="30px" width="30px" class="Logos">
                                    </div>
                                    AutoHiper
                                </li>
                            </ul>
                            <img src="img/Logo.png" class="logo" alt="Logo">
                        </div>
                    
                        <div class="quadrante2">
                            <h2>Informações relevantes</h2>
                            <ul>
                                <li>
                                    Política de privacidade
                                </li>
                                <li>
                                    Termos de uso
                                </li>
                                <li>
                                    FAQs
                                </li>
                                <li>
                                    <button class="Button_Footer">Suporte</button> 
                                </li>
                            </ul>
                        </div>

                    </div>            
                </section>
            </main>
</body>
</html>