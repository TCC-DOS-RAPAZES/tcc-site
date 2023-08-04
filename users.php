<!DOCTYPE html>
<html>
<head>
    <?php
    session_start();
    include('connection.php');//conexao com banco
    include('protect.php');//protecao
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
                <li><a href="#">Amigos</a></li>
                <li><a href="#">Opções</a></li>
            </ul>
        </nav>
    </header>

    <div class="users">
        <ul class="list-users">
            <?php
                //realiza a consulta no banco, e retorna os registros
                $sql = "SELECT id, nick FROM usuarios";
                $result = $conn->query($sql);

                //verifica se ha algum registro
                if ($result->num_rows > 0) {
                    // Loop pelos registros de usuários
                    while ($row = $result->fetch_assoc()) {
                        $userId = $row['id'];
                        $userName = $row['nick'];
                        // Passa id de usuário como parâmetro na URL
                        echo "<li><a href='createroom.php?destinatario=$userId'>$userName</a></li>";
                    }
                }
            ?>
        </ul>
    </div>
</body>
</html>
