<?php 
if (isset($_POST['enviar']) && !empty($_POST['ID'])) {
    include '../conexao.php';

    $id = $_POST['ID'];
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $Telefone = $_POST['tell'];

    $sql = "UPDATE usuarios SET Nome = '$nome', Email = '$email', Telefone = '$Telefone' WHERE ID = '$id'";
    
    if (mysqli_query($conn, $sql)) {
        header('Location: Admin.php?mensagem=Usuario editado com sucesso');
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);

} else if (isset($_GET['ID']) && !empty($_GET['ID'])) {
    include '../conexao.php';

    $query = 'SELECT * FROM usuarios WHERE ID=' . $_GET['ID'];
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $dados = mysqli_fetch_assoc($result);

        $id = $dados['ID'];
        $nome = $dados['Nome'];
        $email = $dados['Email'];
        $Telefone = $dados['Telefone'];
        $Cargo = $dados['Cargo'];
    } else {
        header('Location: Admin.php?mensagem=Usuario não encontrado');
        exit();
    }

    mysqli_close($conn);

} else {
    header('Location: Admin.php?mensagem=Selecione um usuario para editar');
    exit();
}
?>

<div class="tudo">
    <form id="Cadastro" action="EditarUsuario.php" method="post">
        <h1>Editar Usuario</h1>
        
        <label for="">ID:</label> <br>
        <input type="text" value="<?php echo $id; ?>" id="ID" name="ID" readonly />
        <p id="nameError" class="error"></p>

        <label for="">Nome:</label> <br>
        <input type="text" value="<?php echo $nome; ?>" id="name" name="name" />
        <p id="nameError" class="error"></p>

        <label for="">E-Mail:</label> <br>
        <input type="text" value="<?php echo $email; ?>" id="email" name="email" />
        <p id="emailError" class="error"></p>

        <label for="">Telefone:</label> <br>
        <input type="text" value="<?php echo $Telefone; ?>" id="tell" name="tell" />
        <p id="tellError" class="error"></p>

        <label for="">Cargo:</label> <br>
        <input type="text" value="<?php echo $Cargo; ?>" id="Cargo" name="Cargo" readonly />
        <p id="tellError" class="error"></p>

        <input type="submit" id="botao" value="Atualizar Usuario" name="enviar" />
    </form> 
</div>
