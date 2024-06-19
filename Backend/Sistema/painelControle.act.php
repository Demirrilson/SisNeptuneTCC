<?php
session_start();

require('connect.php');

// Consulta SQL para pegar a última leitura
$query = "SELECT Valor, Tanque_id FROM leitura_sensor WHERE tipo_sensor_id = 1 AND Tanque_id = 17 ORDER BY Data_leitura DESC LIMIT 1";

// Executar a consulta
$result = mysqli_query($con, $query);

// Verificar se a consulta foi bem-sucedida
if ($result) {
    // Verificar se há uma linha retornada
    if (mysqli_num_rows($result) > 0) {
        // Obter a última leitura
        $row = mysqli_fetch_assoc($result);
        
        $valor = $row['Valor'];
        $tanque = $row['Tanque_id'];
        
        echo "Última Leitura:<br>";
        echo "Valor: $valor <br>";
        echo "Tanque: $tanque <br>";
    } else {
        echo "Nenhuma linha encontrada.";
    }
} else {
    // Exibir erro caso a consulta tenha falhado
    echo "Erro na consulta: " . mysqli_error($con);
}

// Liberar o resultado
mysqli_free_result($result);

// Fechar conexão
mysqli_close($con);
?>
