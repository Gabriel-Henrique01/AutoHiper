<?php
    if(isset($_GET['ID']) && !empty($_GET['ID'])){
        include '../conexao.php';

        $query = 'DELETE FROM usuarios WHERE ID=' . $_GET['ID'];
        $result = mysqli_query($conn, $query);

        if($result){
            header('Location: Admin.php?mensagem=Usuario deletado com sucesso!');
            exit;
        } else {
            header('Location: Admin.php?mensagem=Erro ao excluir usuario!');
            exit();
        }
    } else {
        header('Location: Admin.php?mensagem=Selecione um usuario para excluir');
        exit();
    }
?>