
<?php

    require_once "config.inc.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $produto = $_POST["produto"];
        $quantidade = $_POST["quantidade"];
        $valor = $_POST["valor"];
        $id = $_POST['id'];


        $sql = "UPDATE produtos SET
             produto = '$nome',
             quantidade = '$quantidade',
             valor = '$valor',
             WHERE id = '$id'";
             
             
             
        if(mysqli_query($conexao, $sql)){
            echo "<h3>Produto alterado com sucesso!</h3>";
            echo "<a href='?pg=produtos-admin'>Voltar</a>";
        }else{
            echo "<h3>Erro ao alterar cadastro do produto!</h3>";
        }
    }else{
        echo "<h2>Acesso negado!</h2>";
        echo "<a href='?pg=produtos-admin'>Voltar</a>";

    }

    mysqli_close($conexao);