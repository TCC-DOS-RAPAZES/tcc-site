<?php
session_start();
include('connection.php');

if (isset($_GET['destinatario'])) {
    $destinatarioId = intval($_GET['destinatario']); // converte o id do destinatario para um valor inteiro

    $nick = $_SESSION['nick'];                                             //-----------------------
    $sql_code = "SELECT id FROM usuarios WHERE nick = '$nick'";            // --GAMBIARRA MONTRUOSA--
    $result = $conn->query($sql_code);                                     // ------FAVOR NAO--------
    if ($result && $result->num_rows > 0) {                                // ---------MEXE----------
        $row = $result->fetch_assoc();                                     // --!!!!!!!!!!!!!!!!!!!--
        $remetenteId = $row['id'];                                         // --!!!!!!!!!!!!!!!!!!!--
    }                                                                      // -----------------------        
    // Confere se existe alguma sala com os mesmos usuarios
    $sql = "SELECT idSala FROM salaprivada WHERE (idUsuario1 = ? AND idUsuario2 = ?) OR (idUsuario2 = ? AND idUsuario1 = ?)";
    $stmt = $conn->prepare($sql);

    // Vincula os parametros
    $stmt->bind_param("iiii", $remetenteId, $destinatarioId, $destinatarioId, $remetenteId);

    // Executa a consulta
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {//Confere se a sala exista, se sim redireciona para ela
        $row = $result->fetch_assoc();
        $salaId = $row['idSala'];
        header("Location: privateroom.php?idsala=$salaId");
        exit;
    } else {
        //Verifica se existe uma sala na ordem inversa
        $sql = "SELECT idSala FROM salaprivada WHERE idUsuario1 = ? AND idUsuario2 = ?";
        $stmt = $conn->prepare($sql);

        // Vincula os parametros
        $stmt->bind_param("ii", $destinatarioId, $remetenteId);

        // Executamos a consulta
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Se a sala já existe com a ordem inversa, redirecionar o usuário para a sala de conversa privada existente
            $row = $result->fetch_assoc();
            $salaId = $row['idSala'];
            header("Location: privateroom.php?idsala=$salaId");
            exit;
        } else {
            // Se a sala não existe, criar a nova sala privada no banco de dados
            $sql = "INSERT INTO salaprivada (idUsuario1, idUsuario2) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);

            // Vinculamos os parâmetros novamente para a nova consulta
            $stmt->bind_param("ii", $remetenteId, $destinatarioId);

            // Executa a nova consulta
            $stmt->execute();
            $novaSalaId = $stmt->insert_id; // Recupera o id da nova sala criada
            header("Location: privateroom.php?idsala=$novaSalaId");
            exit;
        }
    }
}
?>



