
<?php

require_once 'config.inc.php';

$id = $_get['id'];
$sql = "SELECT * FROM clientes WHERE id = 'id' ";
$resultado = msqli_query($conexao, $sql);

if(mysqli_num_rows($resultado) > 0){
    while($dados = mysqli_fetch_array($resultado)){
        $nome = $dados['cliente'];
        $cidade = $dados['cidade'];
        $estados = $dados['estado'];
        $id = $dados['id'];
        
    }



?>

<h2>Cadastro de Cliente</h2>
<form action="?pg=clientes-alterar" method="post">
    <input type="hidden" name="id" value="<?=$id?>">

    <label>Nome:</label>
    <input type="text" name="cliente" value="<?=$nome?>><br>
    <label>Cidade:</label>
    <input type="text" name="cidade" value="<?php echo $dados['cidade'];?>><br>
    <label>Estado:</label>
    <input type="text" name="estado" value="<?=$estado?>><br>
    <input type="submit" value="Cadastrar Cliente">

</form>

<?php
}else{
    echo"<h2>nenhum cliente cadastrado</h2>";
}
?>

mysqli_close($conexao);