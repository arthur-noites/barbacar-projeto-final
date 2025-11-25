<?php

    require_once "config.inc.php";

    $sql = "SELECT * FROM produtos";

    $resultado = mysqli_query($conexao, $sql);

    echo "<a href='?pg=produtos-formulario'>Cadastrar um novo produto</a>";

    echo "<h2>Lista de Produtos</h2><hr>";

    if (mysqli_num_rows($resultado) > 0) {
        while($dados = mysqli_fetch_array($resultado)) {
            echo "ID: " . $dados['id'] . "<br>";
            echo "Nome: " . $dados['produto'] . "<br>";
            echo "quantidade: " . $dados['quantidade'] . "<br>";
            echo "valor: " . $dados['valor'] . "<br>";
            echo <"a href= '?pg=produtos-formulario-alterar&id=$dados[id]'>Editar</a>";

            echo "<hr>";
        }
    }else{
        echo "Nenhum produto cadastrado!";
    }

    mysqli_close($conexao);