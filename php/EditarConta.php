<?php 
    include 'conexao.php';

    session_start();

    $ID = $_SESSION['ID'];

    $query = "SELECT Nome, Email, Telefone, Senha FROM usuarios WHERE ID = '$ID'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $nome = $row['Nome'];
    $email = $row['Email'];
    $telefone = $row['Telefone'];
    $senha = $row['Senha'];

    if(isset($_POST['enviar']) && !empty($_POST['enviar'])){
        $Nome = $_POST['name'];
        $Email = $_POST['email'];
        $Telefone = $_POST['tell'];
        $Senha = $_POST['password'];

        $update = "UPDATE usuarios SET `Nome`='$Nome',`Email`='$Email',`Telefone`='$Telefone',`Senha`='$Senha' ";
        if ($conn->query($update) === TRUE) {
            header('Location: Perfil.php');
            exit;
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Perfil.css">
    <title>Editar Conta</title>
</head>
<body>
    <header>
        <div class="nav-center">
            <a href="../Index.php"><img src="../img/Logo.png" id="logo" alt="Logo"></a>
        </div>
        <div class="nav-right">
        </div>
    </header>

    <div class="sidebar">
        <div class="sidebar-header">
            <h3 class="brand-name">Conta</h3>
        </div>
        <div class="menu-item">
            <a href="" class="sidebar-link">
                <span>Perfil</span>
            </a>
        </div>
        <div class="menu-item">
            <a href="" class="sidebar-link">
                <span>Eventos</span>
            </a>
        </div>
        <div class="menu-item">    
            <a href="Logout.php" class="sidebar-link">
                <span>Logout</span>
            </a>
        </div>
    </div>
    <main>
        <div class="container">
            <form id="EditarConta" action="EditarConta.php" method="post">
                <h1>Editar Conta</h1>

                <label for="">Nome:</label> <br>
                <input type="text" value="<?php echo $nome; ?>" id="name" name="name" />
                <p id="nameError" class="error"></p>

                <label for="">E-Mail:</label> <br>
                <input type="text" value="<?php echo $email; ?>" id="email" name="email" />
                <p id="emailError" class="error"></p>

                <label for="">Telefone:</label> <br>
                <input type="text" value="<?php echo $telefone; ?>" id="tell" name="tell" />
                <p id="tellError" class="error"></p>

                <label for="">Senha:</label> <br>
                <input type="password" value="<?php echo $senha; ?>" id="password" name="password" />
                <p id="passwordError" class="error"></p>

                <input type="submit" id="botao" value="Atualizar Usuario" name="enviar" />
            </form> 
        </div>
    </main>
</body>
</html>