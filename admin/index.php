<?php 
    
echo "<h1>Painel Administrativo - BarbaCar</h1>";

echo "<a href='../index.php'>Voltar para o Site</a>";
echo "<br><hr>";

echo "<h3>Gestão de Veículos</h3>";
echo "<a href='?pg=veiculos-admin'>Listar Veículos</a>";
echo " | ";
echo "<a href='?pg=veiculos-form'>Cadastrar Novo Veículo</a>";


echo "<hr>"; 

if(empty($_SERVER['QUERY_STRING'])){
    echo "<h3>Bem-vindo, administrador!</h3>";
    echo "<p>Selecione uma opção acima.</p>";
}else{
    $pg = $_GET["pg"];
    if(file_exists("$pg.php")){
        include_once "$pg.php";
    } else {
        echo "Página não encontrada!";
    }
}
?>