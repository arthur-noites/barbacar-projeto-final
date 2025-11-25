<?php

require_once 'config.inc.php';

$id = $_get['id'];
$sql = "SELECT * FROM produtos WHERE id = 'id' ";
$resultado = msqli_query($conexao, $sql);

if(mysqli_num_rows($resultado) > 0){
    while($dados = mysqli_fetch_array($resultado)){
        $nome = $dados['produto'];
        $quantidade = $dados['quantidade'];
        $valor = $dados['valor'];
        $id = $dados['id'];
        
    }



?>

<h2>Cadastro de Produtos</h2>
<form action="?pg=produtos-alterar" method="post">
    <input type="hidden" name="id" value="<?=$id?>">

    <label>Nome:</label>
    <input type="text" name="produto" value="<?=$nome?>><br>
    <label>Quantidade:</label>
    <input type="text" name="quantidade" value="<?php echo $dados['quantidade'];?>><br>
    <label>Valor:</label>
    <input type="text" name="valor" value="<?=$valor?>><br>
    <input type="submit" value="Cadastrar Produto">

</form>

<?php
}else{
    echo"<h2>nenhum produto cadastrado</h2>";
}
?>

mysqli_close($conexao);