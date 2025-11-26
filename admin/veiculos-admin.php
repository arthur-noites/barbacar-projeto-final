<?php

    require_once "config.inc.php";

    $sql = "SELECT * FROM veiculos";

    $resultado = mysqli_query($conexao, $sql);

    echo "<a href='?pg=veiculos-form'>Cadastrar um novo veiculo</a>";

    echo "<h2>Lista de veiculos</h2><hr>";

    if (mysqli_num_rows($resultado) > 0) {
        while($dados = mysqli_fetch_array($resultado)) {
            echo "Modelo: " . $dados['modelo'] . "<br>"; 
            echo "Marca: " . $dados['marca'] . "<br>";
            echo "Ano: " . $dados['ano'] . "<br>";
            echo "Preço: R$ " . $dados['preco'] . "<br>";
            echo "<a href='?pg=veiculos-form-alterar&id=$dados[id]'>Editar</a>";
        
        echo " | <a href='?pg=veiculos-excluir&id=$dados[id]'>Excluir</a>";
        }
    }else{
        echo "Nenhum veiculo cadastrado!";
    }

    mysqli_close($conexao);