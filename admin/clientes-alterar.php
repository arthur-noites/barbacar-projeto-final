
<?php

    require_once "config.inc.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST["cliente"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $id = $_POST['id'];


        $sql = "UPDATE clientes SET
             cliente = '$nome',
             cidade = '$cidade',
             estado = '$estado',
             WHERE id = '$id'";
             
             
             
        if(mysqli_query($conexao, $sql)){
            echo "<h3>Cliente alterado com sucesso!</h3>";
            echo "<a href='?pg=clientes-admin'>Voltar</a>";
        }else{
            echo "<h3>Erro ao alterar cadastro do cliente!</h3>";
        }
    }else{
        echo "<h2>Acesso negado!</h2>";
        echo "<a href='?pg=clientes-admin'>Voltar</a>";

    }

    mysqli_close($conexao);