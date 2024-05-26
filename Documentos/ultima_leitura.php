<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "neptune";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consulta SQL para obter a última leitura do sensor
$sql = "SELECT valor, data_leitura FROM leitura_sensor ORDER BY data_leitura DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Saída dos dados da última leitura
    $row = $result->fetch_assoc();
    echo $row["valor"] . " °C em " . $row["data_leitura"];
} else {
    echo "Nenhuma leitura encontrada.";
}

$conn->close();
?>
