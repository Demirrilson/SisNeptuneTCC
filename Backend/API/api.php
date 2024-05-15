<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "neptune";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão com o MySQL: " . $conn->connect_error);
}

// Receber os dados do ESP32
$sensor_id = $_POST["sensor_id"];
$valor = $_POST["valor"];
$data_leitura = $_POST["data_leitura"];

// Preparar e executar a query SQL
$stmt = $conn->prepare("INSERT INTO leitura_sensor (Sensor_id, Valor, Data_leitura) VALUES (?, ?, ?)");
$stmt->bind_param("ids", $sensor_id, $valor, $data_leitura);

if ($stmt->execute()) {
    echo "Dados inseridos com sucesso";
} else {
    echo "Erro ao inserir dados: " . $conn->error;
}

$stmt->close();
$conn->close();
?>