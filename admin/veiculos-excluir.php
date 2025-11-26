<?php

require_once "config.inc.php";

$id = $_GET["id"];

$sql = "DELETE FROM veiculos WHERE id = '$id'";

$resultado = mysqli_query($conexao, $sql);

if($resultado){
    echo "<h3>Veículo excluído com sucesso!</h3>";
    echo "<a href='?pg=veiculos-admin'>Voltar para a lista</a>";
} else {
    echo "<h3>Erro ao excluir veículo!</h3>";
}

mysqli_close($conexao);
?>