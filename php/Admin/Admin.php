<?php
    include '../conexao.php';

    session_start();
    
    $sql = "SELECT ID, Nome, Telefone, Email, Cargo FROM usuarios";
    $result_query = $conn->query($sql) or die('Erro na query: ' . $sql);

    if(!isset($_SESSION['Cargo']) && !isset($_SESSION['Nome'])){
        header('Location: ../Login.php');
        exit;
    } elseif($_SESSION['Cargo'] != 'Funcionario') {
        header('Location: ../Perfil.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aa.css">
    <title>Administração</title>
</head>
<body>
    <header>
        <div class="nav-center">
            <a href="../../Index.php"><img src="../../img/Logo.png" id="logo" alt="Logo"></a>
        </div>
        <div class="nav-right">
            <a href="../Logout.php" id="iconlogin"><img src="../../img/Logout.svg" alt="" id="Login" ></a>
        </div>
    </header>

    <div class="sidebar">
        <div class="sidebar-header">
            <h3 class="brand-name">Administração</h3>
        </div>
        <div class="menu-item">
            <a href="Inserir.php" class="sidebar-link">
                <span>Inserir veiculo</span>
            </a>
        </div>
        <div class="menu-item">
            <a href="CadastroAdmin.php" class="sidebar-link">
                <span>Cadastra Funcionario</span>
            </a>
        </div>
        <div class="menu-item">
            <a href="CadastroCliente.php" class="sidebar-link">
                <span>Cadastra Cliente</span>
            </a>
        </div>
        <div class="menu-item">    
            <a href="Clientes.php" class="sidebar-link">
                <span>Clientes</span>
            </a>
        </div>
    </div>
    <main>
        <div class="Central">
            <div>
                <?php
                    if(isset($_GET['mensagem']) && !empty($_GET['mensagem'])){
                        ?>
                            <div class="alert alert-warning" style="color: #000;">
                                <?php echo $_GET['mensagem']?>
                            </div>
                        <?php
                    }
                ?>
                <h1>Clientes</h1>
            </div>

            <div class="tabela">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                    <?php 
                        while ($row = mysqli_fetch_array($result_query)){
                            $ID = $row['ID'];
                            $Nome = $row['Nome'];
                            $Email = $row['Email'];
                            $Telefone = $row['Telefone'];
                            $Status = $row['Cargo'];

                            print '<tr>';
                            print '<td>' .$ID. '</td>';
                            print '<td>' .$Nome. '</td>';
                            print '<td>' .$Email. '</td>';
                            print '<td>' .$Telefone. '</td>';
                            print '<td>' .$Status.'</td>';
                            ?>
                            <td id="icon">
                                <div class="action-buttons">
                                    <a class="ButtonEdit" href="EditarUsuario.php?ID=<?php echo $ID ?>">
                                        <img src="../../img/Edita.svg" alt="">
                                    </a>
                                    <a class="ButtonRemove" href="ExcluirUsuario.php?ID=<?php echo $ID ?>" onclick="atualizar()">
                                        <img src="../../img/RemoveUsuario.svg" alt="">
                                    </a>
                                </div>
                            </td>
                            <?php
                            print '</tr>';
                        } 
                    ?>
                </table>
            </div>
        </div>
    </main>
    <script>
        function atualizar(event, id) {
            event.preventDefault(); // Previne o comportamento padrão do link

            if (confirm("Você deseja excluir o usuário?")) {
                // Se o usuário confirmar a exclusão, redireciona imediatamente
                window.location.href = "ExcluirUsuario.php?ID=" + id; 
                
                // Exibe a mensagem que some após 5 segundos
                var mensagem = document.getElementById("mensagem");
                mensagem.style.display = "block"; // Mostra a mensagem

                setTimeout(function() {
                    mensagem.style.display = "none"; // Esconde a mensagem após 5 segundos
                }, 5000);
            }
        }   

        
    </script>
</body>
</html>
