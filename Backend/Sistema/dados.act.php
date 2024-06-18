<?php
require('connect.php');
extract($_POST);

$leituraSensor = "SELECT * FROM leitura_sensor WHERE Data_leitura BETWEEN '$dataInicio' AND '$dataFinal' AND tipo_sensor_id = '$tipoDados' AND Tanque_id = $idTanque";

$result = mysqli_query($con, $leituraSensor);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $leitura_id = $row['Leitura_sensor_id'];
            
            $valor = $row['Valor'];

            $data_leitura = $row['Data_leitura'];
            
            echo "Leitura ID: $leitura_id<br>";
            echo "Valor: $valor<br>";
            echo "Data de Leitura: $data_leitura<br>";
            
            echo "<hr>";          
        }
    } else {

        if($tipoDados == 4){
            $tipoDados = "PH";
        }
        
        if($tipoDados == 5){
            $tipoDados = "Amônia";
        }


        $leituraManual = "SELECT * FROM teste_quimico WHERE Data_leitura BETWEEN '$dataInicio' AND '$dataFinal' AND tipo_teste = '$tipoDados' AND Tanque_id = $idTanque";

        $resultManual = mysqli_query($con, $leituraManual);
    
        if($resultManual){
            if(mysqli_num_rows($resultManual) > 0){
                $row = mysqli_fetch_assoc($resultManual);
                echo "Teste id: " . $row['Teste_id'] . "<br>";
                echo "Tipo de teste: " . $row['Tipo_teste'] . "<br>";
                echo "Valor: " . $row['Resultado'] . "<br>";
            }
        }
    }
}  



   

