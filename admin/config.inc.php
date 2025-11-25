<?php

    $conexao = mysqli_connect("localhost","root","");

    $db = mysqli_select_db($conexao,"projeto1");

    if(!$conexao){
       echo "<h2>Erro ao conectar o banco de dados</h2>";
    }

