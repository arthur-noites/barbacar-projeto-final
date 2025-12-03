
<?php

    require_once "config.inc.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST['id'];
        $nome = $_POST["cliente"];
        $email = $_POST["email"];
        $numero = $_POST["numero"];
        $cpf = $_POST["cpf"];
        $senha = $_POST["senha"];
        


        $sql = "UPDATE usuarios SET
             usuario = '$nome',
             email = '$email',
             numero = '$numero',
             cpf = '$cpf',
             senha = '$senha',
             WHERE id = '$id'";
             
             
             
        if(mysqli_query($conexao, $sql)){
            echo "<h3>Cliente alterado com sucesso!</h3>";
            echo "<a href='?pg=usuarios-admin'>Voltar</a>";
        }else{
            echo "<h3>Erro ao alterar cadastro do usuário!</h3>";
        }
    }else{
        echo "<h2>Acesso negado!</h2>";
        echo "<a href='?pg=usuarios-admin'>Voltar</a>";

    }

    mysqli_close($conexao);