<?php
//variaveis de conexão
$host = "localhost";
$user = "u667371984_HECK";
$password = "Heck3522@";
$dbName = "u667371984_chat";

//cria uma conexao
$conn = new mysqli($host, $user, $password, $dbName);//codigo que executa a conexão

// Verifica se ocorreu algum erro na conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}
?>
