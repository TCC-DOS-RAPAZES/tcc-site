<?php
include('connection.php');

  // Realize a consulta no banco de dados para obter os usuários registrados
$sql = "SELECT id, nick FROM usuarios";
$result = $conn->query($sql);

  // Verifique se há registros retornados
if ($result->num_rows > 0) {
// Loop pelos registros e exiba os nomes dos usuários na combobox
while ($row = $result->fetch_assoc()) {
 $userId = $row['id'];
 $_SESSION['id'] = $userId;
 $userName = $row['nick'];
 echo "<option value='$userId'>$userName</option>";
 }
}
?>
