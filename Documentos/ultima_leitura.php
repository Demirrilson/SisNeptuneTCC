<?php
session_start();

require('../Backend/Sistema/connect.php');



// Função para buscar a última leitura de um tanque específico
function get_last_reading($con, $tanque_id) {
    $query = "SELECT Valor, Data_leitura FROM leitura_sensor WHERE tipo_sensor_id = 1 AND Tanque_id = $tanque_id ORDER BY Data_leitura DESC LIMIT 1";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}

$response = array();

$tanques = [16, 17, 23];
foreach ($tanques as $tanque_id) {
    $reading = get_last_reading($con, $tanque_id);
    if ($reading) {
        $response[] = array(
            'Tanque_id' => $tanque_id,
            'Valor' => $reading['Valor'],
            'Data_leitura' => $reading['Data_leitura']
        );
    } else {
        $response[] = array(
            'Tanque_id' => $tanque_id,
            'error' => "Nenhuma leitura encontrada para o tanque $tanque_id."
        );
    }
}

// Fechar conexão
mysqli_close($con);

// Retornar resposta em formato JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
