<?php
    
    session_start();

    include 'conexao.php';

    $ID = $_SESSION['ID'];

    $query = "SELECT Nome, Email, Telefone FROM usuarios WHERE ID = '$ID'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $nome = $row['Nome'];
    $email = $row['Email'];
    $telefone = $row['Telefone'];
    $id = $ID;

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Perfil.css">
    <title>Conta</title>
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
            <a href="EditarConta.php" class="sidebar-link">
                <span>Editar conta</span>
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
        <div class="central">
            <h1>Perfil</h1>

            <div>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                    </tr>
                    <tr>
                        <td><?php echo $id ?></td>
                        <td><?php echo $nome ?></td>
                        <td><?php echo $email ?></td>
                        <td><?php echo $telefone ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>
</html>