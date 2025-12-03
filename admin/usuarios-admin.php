<?php

    require_once "config.inc.php";

    $sql = "SELECT * FROM usuarios";

    $resultado = mysqli_query($conexao, $sql);

    echo "<a href='?pg=usuarios-form'>Cadastrar Usuário</a>";

    echo "<h2>Lista de Usuários</h2><hr>";

    if (mysqli_num_rows($resultado) > 0) {
        while($dados = mysqli_fetch_array($resultado)) {
            echo "ID: " . $dados['id'] . "<br>";
            echo "Nome: " . $dados['usuarios'] . "<br>";
            echo "Email: " . $dados['email'] . "<br>";
            echo "Número: " . $dados['numero'] . "<br>";
            echo "CPF: " . $dados['cpf'] . "<br>";
            echo "Senha: " . $dados['senha'] . "<br>";
            echo "<a href= '?pg=usuarios-form-alterar&id=$dados[id]'>Editar</a>";

            echo "<hr>";
        }
    }else{
        echo "Nenhum usuário cadastrado!";
    }

    mysqli_close($conexao);