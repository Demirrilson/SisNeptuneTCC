<?php 
@session_start();


extract($_POST);
var_dump($_POST);

require('connect.php');

$sql = "SELECT Teste_id, Nome FROM teste_quimico";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['ph']) && !empty($_POST['nivelOxigenio'])) {
        $ph = $_POST['ph'];

        $nivelOxigenio = $_POST['nivelOxigenio'];

        $dataLeitura = $_POST['dataLeitura'];

        
        $idTanque = $_POST['idTanque'];


        mysqli_query($con, "INSERT INTO `teste_quimico` 
        (`Teste_id`, `Tanque_id`, `PH`, `Nivel_oxigenio`, 
        `Data_leitura`) VALUES (NULL, '$idTanque', '$ph', '$nivelOxigenio', 
        '$dataLeitura');");

        header("Location: ../../Frontend/Paginas/testeQuimico.php");

    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>