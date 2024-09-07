<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/Cadastro.css">
        <link rel="stylesheet" href="../../css/Footer.css">
        <link rel="website icon" type="png" href="../../img/Logo.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Finlandica:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
        <title>Inserir veiculo</title>
    </head>
    <body>
        
        <section class="conteudo">
            <a href="../../Index.php"><img src="../../img/Home.svg" alt="Home" class="HomeIcon"></a>
            <div class="videoPlayer">
               <img src="../../img/Cadastro.webp" alt="McLaren P1" class="background">
            </div>
            
            <div class="tudo">
                

                <form id="Cadastro" action="CadastroAdmin.php" method="post">

                        <h1>Realizar Cadastro do funcionario</h1>
                            
                            <label for="">Nome:</label> <br>
                            <input type="text" id="name" name="name"/>
                            <p id="nameError" class="error"></p>
                
                            <label for="">E-Mail:</label> <br>
                            <input type="text" id="email" name="email"/>
                            <p id="emailError" class="error"></p>
                
                            <label for="">Telefone:</label> <br>
                            <input type="text" id="tell" name="tell"/>
                            <p id="tellError" class="error"></p>

                            <label for="">Senha:</label> <br>
                            <input type="password" id="password" name="password"/>
                            <p id="passwordError" class="error"></p>
                
                            <label for="">Confirma Senha:</label> <br>
                            <input type="password" id="cPassword" name="cPassword"/>
                            <p id="cPasswordError" class="error"></p>

                            <h2 class="login">Já possui uma conta? Então <a href="Login.php">Conecte-se</a></h2>                            

                            <input type="submit" id="botao" value="Enviar" name="enviar"/>

                </form> 
            </div>
    
        </section>
        
        <script src="../js/Validacao/Validacao.js"></script>

        <?php

            include '../conexao.php';

            if(isset($_POST['enviar'])) {
                
                $name = $_POST['name'];
                $email = $_POST['email'];
                $tell = $_POST['tell'];
                $password = $_POST['password'];
                $cargo = 'Funcionario';

                $insert = "INSERT INTO `usuarios` (`Nome`,`Email`,`Telefone`,`Senha`,`Cargo`) VALUES ('$name','$email','$tell','$password','$cargo') ";
                
                if ($conn->query($insert) === TRUE) {
                    
                } else {
                    $emailErrorCadastro = 'Esse E-Mail já foi cadastrado!';
                    echo $emailErrorCadastro;
                };

                mysqli_close($conn);
            } 

        ?>

        
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
                                    <img src="../img/Insta_Logo.png" alt="Instagram Logo" height="30px" width="30px" class="Logos">
                                </div>
                                @AutoHiper
                            </li>
                            <li>
                                <div class="Social-container">
                                    <h3>Facebook</h3>
                                    <img src="../img/Face_Logo.png" alt="Facebook Logo" height="30px" width="30px" class="Logos">
                                </div>
                                AutoHiper
                            </li>
                        </ul>
                        <img src="../img/Logo.png" class="logo" alt="Logo">
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