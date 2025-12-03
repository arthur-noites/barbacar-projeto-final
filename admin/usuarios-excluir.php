<?php


require_once "config.inc.php";

$id = $_GET["id"];
$sql = "DELETE FROM usuarios WHERE id = '$id'";

$resultado = mysqli_query($conexao, $sql);

if($resultado){
    echo "registro excluido com sucesso";
    echo "<a href='?pg=clientes-form-alterar&id=$id'>voltar</a>";

} else{
    echo "Erro ao excluir registro";   
}

mysqli_close($conexao);