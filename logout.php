<?php

if(!isset($_SESSION)) {//verifica se existe uma sessao ativa
    session_start();//se nao estiver ativa, cria uma
}

session_destroy();//destroi a sessao ativa

header("Location: index.php");//redireciona a pagina de login
?>