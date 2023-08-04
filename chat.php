<!DOCTYPE html>
<html>
<head>
    <?php
    include('connection.php');              //conexao com banco
    include('protect.php');                 //protecao
    $sql = "SELECT id FROM usuarios WHERE nick='$usuario'";
    ?>
    <title>Chat em Tempo Real</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="menu-header">
        <nav>
            <ul>
                <li><a href="#">
                <?php
                $usuario = $_SESSION['nick'];
                echo $usuario;
                ?>
                </a></li>
                <li><a href="users.php">Amigos</a></li>
                <li><a href="#">Opções</a></li>
            </ul>
        </nav>
    </header>
    <div class="chat-container">
        <h1 class="chat-text">O que as pessoas estao falando:</h1>
        <div id="chat-area" class="chat-area">
            <iframe src="chatbox.php" frameborder="0" class="frame-chat"></iframe>
        </div>
            <form id="message-form" action="send_message.php">
                <input type="hidden" name="idsala" value="<?php $_GET['idsala']; ?>">
                <input type="text" id="message-input" name="message" placeholder="Digite sua mensagem">
                <input type="submit" value="Enviar">
             </form>
        <p class="linkRegistro">
                    <a href="logout.php">logout</a>
        </p>
    </div>
</body>
</html>