<?php
@session_start();

extract($_POST);
var_dump($_POST);

require('connect.php');


$sql = "SELECT Relatorio_id FROM relatorio";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['dataRelatorio']) && !empty($_POST['conteudo'])) {

        $dataRelatorio = $_POST['dataRelatorio'];

        
        $conteudo = $_POST['conteudo'];

        $idTeste = $_POST['idTeste']; 
       


        mysqli_query($con, "INSERT INTO `relatorio` 
        (`Relatorio_id`, `Data_relatorio`, `Conteudo`, 
        `Teste_id`) VALUES (NULL, '$dataRelatorio', 
        '$conteudo', '$idTeste');");

        header("Location: relatorio.php");

    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>