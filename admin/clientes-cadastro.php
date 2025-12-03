<?php

    require_once "config.inc.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST["id"];
        $nome = $_POST["cliente"];
        $email = $_POST["email"];
        $numero = $_POST["numero"];
        $cpf = $_POST["cpf"];
        $senha = $_POST["senha"];

        $sql = "INSERT INTO clientes (cliente, email, numero, cpf, senha, id)
                VALUES ('$nome', '$email', '$numero', '$cpf', '$senha', '$id')";
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
