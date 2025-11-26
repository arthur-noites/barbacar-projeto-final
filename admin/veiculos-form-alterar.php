<?php 
    
require_once 'config.inc.php';

$id = $_GET['id'];

$sql = "SELECT * FROM veiculos WHERE id = '$id'";
$resultado = mysqli_query($conexao, $sql);

if(mysqli_num_rows($resultado) > 0){
    
    while($dados = mysqli_fetch_array($resultado)){
        $modelo = $dados['modelo'];
        $marca = $dados['marca'];
        $ano = $dados['ano'];
        $preco = $dados['preco'];
        $id = $dados['id'];
    }
?>

<h2>Alterar Veículo</h2>

<form action="?pg=veiculos-alterar" method="post">
    
    <input type="hidden" name="id" value="<?=$id?>">
    
    <label>Modelo:</label>
    <input type="text" name="modelo" value="<?=$modelo?>"><br>
    
    <label>Marca:</label>
    <input type="text" name="marca" value="<?=$marca?>"><br>
    
    <label>Ano:</label>
    <input type="number" name="ano" value="<?=$ano?>"><br>
    
    <label>Preço (R$):</label>
    <input type="text" name="preco" value="<?=$preco?>"><br>
    
    <input type="submit" value="Salvar Alterações">

</form>

<?php 
}else{ 
    echo "<h2>Nenhum veículo encontrado!</h2>";
}
?>