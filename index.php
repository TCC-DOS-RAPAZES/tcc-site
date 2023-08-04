<?php
include('connection.php');

//confere se nick e senha foram inseridos
if(isset($_POST['nick']) || isset($_POST['senha'])) {

    //conferir se nick e senha nao estao vazios
    if(strlen($_POST['nick']) == 0) {
        echo "Preencha seu nome";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {
        
        //fazer a verificacao no banco
        $nick = $conn->real_escape_string($_POST['nick']);
        $senha = $conn->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE nick = '$nick' AND senha = '$senha'";
        $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $sql_code = "SELECT id FROM usuarios WHERE nick = '$nick' AND senha = '$senha'";
            $sql_query = $conn->query($sql_code);

            $_SESSION['id'] = $sql_query;
            $_SESSION['nick'] = $nick;
            header("Location: chat.php");

        } else {
            echo "Falha ao logar! Nome ou senha incorretos";
        }

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script>alert("Este é um projeto em desenvolvimento, por isso podem ocorrer falhas ou BUGS!");</script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 class="letreiro">ChatConnect</h1>
    <div class="login">
        <h1>Faça  Login:</h1>
        <form action="" method="POST">
            <p>
                <label>Nome:</label>
                <input type="text" name="nick">
            </p>
            <p>
                <label>Senha</label>
                <input type="password" name="senha">
            </p>
            <p class="linkRegistro">
                <a href="register.php">Registre-se aqui!</a>
            </p>
            <p class="botao">
                <input type="submit" class="botao">
            </p>
        </form>
    </div>
</body>
</html>