<?php
session_start();
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") { //confere se foi enviado o metodo post
    $message = $_POST["message"];           //recupera a mensagem do metodo post
    $usuario = $_SESSION['nick'];           //recupera o nick da variavel de sessao
    $idsala = $_SESSION['idSala'];          //recupera o id da sala da variavel de sessao
    $idString = intval($idsala);            //converta a string idsala para um valor inteiro

    // Insere a nova mensagem no banco de dados
    $conn->query("INSERT INTO mensagens (usuario, mensagem, idsala) VALUES ('$usuario', '$message', '$idString')");
}

?>
