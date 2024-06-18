<?php
// Dados do banco de dados MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "neptune";
$data_litura = 0000;

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão com o MySQL: " . $conn->connect_error);
}

// Receber os dados do ESP32
$data_litura = $_POST["data_leitura"];
$valor = $_POST["valor"];

var_dump($_POST);

// Preparar e executar a query SQL
$stmt = $conn->prepare("INSERT INTO leitura_sensor (Data_leitura, Valor) VALUES (?, ?)");
$stmt->bind_param("ss", $data_litura, $valor);
if ($stmt->execute()) {
    echo "Dados inseridos com sucesso";
    echo " data $data_litura";
    echo "valor $valor";
} else {
    echo "Erro ao inserir dados: " . $conn->error;
}

$stmt->close();
$conn->close();
