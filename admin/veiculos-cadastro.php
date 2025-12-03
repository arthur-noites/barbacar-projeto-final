<?php 
    
require_once "config.inc.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    
    $modelo = $_POST["modelo"];
    $marca = $_POST["marca"];
    $ano = $_POST["ano"];
    $preco = $_POST["preco"];
    

    
    $foto_caminho_db = NULL; 

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
        
        $nome_arquivo = $_FILES['foto']['name'];
        $caminho_temporario = $_FILES['foto']['tmp_name'];
        $diretorio_destino = "../assets/images/"; 
        
        $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);
        $novo_nome_arquivo = uniqid() . "." . strtolower($extensao); 
        $caminho_final = $diretorio_destino . $novo_nome_arquivo;
        
        if (move_uploaded_file($caminho_temporario, $caminho_final)) {
            $foto_caminho_db = "assets/images/" . $novo_nome_arquivo; 
        } else {
            die("Erro no upload da imagem. Verifique permissões da pasta 'assets/images'.");
        }
    }
    
    $sql = "INSERT INTO veiculos (modelo, marca, ano, preco, foto) 
            VALUES ('$modelo', '$marca', '$ano', '$preco', '$foto_caminho_db')";
            
    if(mysqli_query($conexao, $sql)){
        echo "<h3>Veículo cadastrado com sucesso!</h3>";
        echo "<a href='?pg=veiculos-admin'>Voltar para a lista</a>";
    }else{
        echo "<h3>Erro ao cadastrar veículo: " . mysqli_error($conexao) . "</h3>";
    }
}else{
    echo "<h2>Acesso negado!</h2>";
    echo "<a href='?pg=veiculos-admin'>Voltar</a>";
}

mysqli_close($conexao);
?>