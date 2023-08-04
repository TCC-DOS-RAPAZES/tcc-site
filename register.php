<?php
include('connection.php');

//confere se foi inserido todos os dados
if(isset($_POST['nick']) || isset($_POST['senha']) || isset($_POST['email']) || isset($_POST['telefone'])) {

    //confere se o campo nao esta vazio
    if(strlen($_POST['nick']) == 0) {
        echo "Preencha seu nome";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    }else if(strlen($_POST['email']) == 0) {
        echo "Preencha seu email";
    }else if(strlen($_POST['telefone']) == 0) {
        echo "Preencha seu telefone";
    }   
    else {

        //verificacao do banco
        $nick = $conn->real_escape_string($_POST['nick']);
        $senha = $conn->real_escape_string($_POST['senha']);
        $email = $conn->real_escape_string($_POST['email']);
        $telefone = $conn->real_escape_string($_POST['telefone']);

        $sql_code = "INSERT INTO usuarios (nick, senha) VALUES ('$nick', '$senha')";//insere os dados do novo usuario no banco
        $sql_query = $conn->query($sql_code);//executa a query
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
    <title>REGISTRO</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1 class="letreiro">ChatConnect</h1>
    <div class="login">
        <h1>REGISTRE-SE:</h1>
        <form action="" method="POST" >
            <p>
                <label>Nome:</label>
                <input type="text" name="nick">
            </p>
            <p>
                <label>Senha:</label>
                <input type="password" name="senha">
            </p>
            <p>
                <label>Email:</label>
                <input type="text" name="email">
            </p>
            <p>
                <label>Telefone:</label>
                <input type="text" name="telefone">
            </p>
            <p class="linkRegistro">
                <a href="index.php">Faca Login!</a>
            </p>
            <p class="botao">
                <input type="submit" class="botao" value="Registre-se">
            </p>
        </form>
    </div>
</body>
</html>