<?php

    require_once "config.inc.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST["cliente"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];

        $sql = "INSERT INTO clientes (cliente, cidade, estado)
                VALUES ('$nome', '$cidade', '$estado')";
        if(mysqli_query($conexao, $sql)){
            echo "<h3>Cliente cadastrado com sucesso!</h3>";
            echo "<a href='?pg=clientes-admin'>Voltar</a>";
        }else{
            echo "<h3>Erro ao cadastrar cliente!</h3>";
        }
    }else{
        echo "<h2>Acesso negado!</h2>";
        echo "<a href='?pg=clientes-admin'>Voltar</a>";
    }
