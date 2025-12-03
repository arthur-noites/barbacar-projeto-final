<?php 
    
require_once "admin/config.inc.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $modelo = $_POST["modelo"];
    $marca = $_POST["marca"];
    $ano = $_POST["ano"];
    $preco = $_POST["preco"];
    
    $sql = "INSERT INTO veiculos (modelo, marca, ano, preco) 
            VALUES ('$modelo', '$marca', '$ano', '$preco')";
            
    if(mysqli_query($conexao, $sql)){
        echo "<h3>Veículo cadastrado com sucesso!</h3>";
        echo "<a href='?pg=veiculos-admin'>Voltar para a lista</a>";
    }else{
        echo "<h3>Erro ao cadastrar veículo!</h3>";
    }
}else{
    echo "<h2>Acesso negado!</h2>";
    echo "<a href='?pg=veiculos-admin'>Voltar</a>";
}

mysqli_close($conexao);
?>