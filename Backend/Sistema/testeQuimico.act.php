<?php 
@session_start();


extract($_POST);
var_dump($_POST);

require('connect.php');

$sql = "SELECT Teste_id, Nome FROM teste_quimico";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

        mysqli_query($con, "INSERT INTO `teste_quimico` (`Teste_id`, `Tanque_id`, `Tipo_teste`, `Horario`, `Data_leitura`, `Resultado`) VALUES (NULL, '$idTanque', '$tipoTeste', '$horario', '$dataLeitura', '$resultado');");

        header("Location: ../../Frontend/Paginas/main-testeQuimico.php");

    } else {
        echo "Por favor, preencha todos os campos.";
    }

?>