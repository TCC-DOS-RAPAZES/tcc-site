<!DOCTYPE html>
<html>
<head>
       <?php
          session_start();
          include('connection.php');
          $idsala = $_GET['idsala'];        //recupera o id da sala da URL
          $_SESSION['idSala'] = $idsala;    //Armazena o id da sala em uma variavel de sessao
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
        <div id="chat-area" class="chat-area">
            <iframe src="chatbox.php" frameborder="0" class="frame-chat"></iframe>
        </div>
            <form id="message-form" action="send_message.php">
                <input type="text" id="message-input" placeholder="Digite sua mensagem">
                <input type="submit" value="Enviar">
             </form>
        <p class="linkRegistro">
                    <a href="logout.php">logout</a>
        </p>
    </div>
</body>
</html>