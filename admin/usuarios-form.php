<h2>Cadastro de Cliente</h2>
<form action="?pg=usuarios-cadastro" method="post">
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
    
    <input type="submit" value="Cadastrar Cliente">
</form>
