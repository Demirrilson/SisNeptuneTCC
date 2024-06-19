<?php
// Dados do banco de dados MySQL
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
$tipo_sensor_id = $_POST["tipo_sensor_id"];
$data_leitura = $_POST["data_leitura"];
$valor = $_POST["valor"];
$tanque_id = $_POST["tanque_id"];

echo "teste: $tipo_sensor_id";
// Verifica se o tipo_sensor_id existe na tabela tipo_sensor
$stmt = $conn->prepare("SELECT COUNT(*) FROM tipo_sensor WHERE Tipo_sensor_id = ?");
$stmt->bind_param("i", $tipo_sensor_id);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if ($count == 0) {
    die("Erro: Tipo_sensor_id não encontrado na tabela tipo_sensor");
}

// Preparar e executar a query SQL
$stmt = $conn->prepare("INSERT INTO leitura_sensor (Tipo_sensor_id, Data_leitura, Valor, Tanque_id) VALUES (?, ?, ?, ?)");
$stmt->bind_param("issi", $tipo_sensor_id, $data_leitura, $valor, $tanque_id);
if ($stmt->execute()) {
    echo "Dados inseridos com sucesso";
    echo " tipo_sensor_id $tipo_sensor_id";
    echo " data $data_leitura";
    echo " valor $valor";
    echo " tanque_id $tanque_id";
} else {
    echo "Erro ao inserir dados: " . $conn->error;
}

$stmt->close();
$conn->close();
