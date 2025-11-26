
<?php

    require_once "config.inc.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $modelo = $_POST["modelo"];
      $marca = $_POST["marca"];
      $ano = $_POST["ano"];
      $preco = $_POST["preco"];
      $id = $_POST["id"];

        $sql = "UPDATE veiculos SET
            modelo = '$modelo', 
            marca = '$marca', 
            ano = '$ano',
            preco = '$preco' 
            WHERE id = '$id'";
             
             
             
        if(mysqli_query($conexao, $sql)){
            echo "<h3>Produto alterado com sucesso!</h3>";
            echo "<a href='?pg=veiculos-admin'>Voltar</a>";
        }else{
            echo "<h3>Erro ao alterar cadastro do veiculo!</h3>";
        }
    }else{
        echo "<h2>Acesso negado!</h2>";
        echo "<a href='?pg=veiculos-admin'>Voltar</a>";

    }

    mysqli_close($conexao);