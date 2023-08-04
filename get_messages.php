<?php
session_start();
include('connection.php');
$idsala = $_SESSION['idSala'];

// Recupera as mensagens do banco de dados
$result = $conn->query("SELECT * FROM mensagens WHERE idsala = '$idsala' ORDER BY data_hora ASC");

$html = '';//armazena o html das mensagens

// Monta as mensagens para aparecerem na tela
while ($row = $result->fetch_assoc()) {
    $usuario = $row['usuario'];
    $mensagem = $row['mensagem'];
    $data_hora = $row['data_hora'];
    
    $mensagemPronta = wordwrap($mensagem, 25, "<br>\n", true);//deixa o maximo de 25 caracteres por linha, apos isso insere uma quebra de linha.
    $html .= "<p><strong>$usuario:</strong><br> $mensagemPronta</p>";
    
    //fetch_assoc() retorna uma linha de resultado 
    //como um array associativo, onde cada chave 
    //corresponde ao nome da coluna no banco de dados.

    /*
    As mensagens montadas aqui, sao redirecionadas a uma funcao do ajax, contida no script
    onde ele as imprime na tela.
    */
}

echo $html;
?>
