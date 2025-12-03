<?php

require_once 'config.inc.php';

$id = isset($_GET['id']) ? mysqli_real_escape_string($conexao, $_GET['id']) : 0; 

$sql = "SELECT * FROM usuarios WHERE id = $id";
$resultado = mysqli_query($conexao, $sql); 
if(mysqli_num_rows($resultado) === 1){
    $dados = mysqli_fetch_array($resultado);
    
    $nome = $dados["cliente"];
    $email = $dados["email"];
    $numero = $dados["numero"];
    $cpf = $dados["cpf"];
    $senha = $dados["senha"];

    
?>

<h2>Editar Cliente ID: <?= $id ?></h2>
<form action="?pg=usuarios-alterar" method="post">
    <input type="hidden" name="id" value="<?= $id ?>">
    
    <label>Nome:</label>
    <input type="text" name="nome" value="<?= $nome ?>"><br>
    
    <label>Email:</label>
    <input type="email" name="email" value="<?= $email ?>"><br> 
    
    <label>Número:</label>
    <input type="text" name="numero" value="<?= $numero ?>"><br>
    
    <label>CPF:</label>
    <input type="text" name="cpf" value="<?= $cpf ?>"><br>
    
    <label>Senha:</label>
    <input type="password" name="senha" placeholder="Preencha apenas para alterar a senha"><br> 
    
    <input type="submit" value="Salvar Alterações">
</form>

<?php
} else {
    echo "<h2>Erro: Cliente não encontrado ou ID inválido.</h2>";
}

mysqli_close($conexao);
?>