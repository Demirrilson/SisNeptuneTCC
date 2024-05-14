
<?php
@session_start();


extract($_POST);
var_dump($_POST);

require('connect.php');


$sql = "SELECT Peixe_id FROM qualificacao_peixe";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['quantidadePeixe']) && !empty($_POST['pesoUnitario'])) {

        $quantidadePeixe = $_POST['quantidadePeixe'];

        
        $idPeixe = $_POST['idPeixe']; 
        $pesoUnitario = $_POST['pesoUnitario']; 
        $pesoLote = $_POST['pesoLote']; 
        $dataEntradaLote = $_POST['dataEntrada']; 
        $dataSaidaLote = $_POST['dataSaida']; 


        mysqli_query($con, "INSERT INTO `qualificacao_peixe` 
        (`Peixe_id`, `Quantidade_peixe`, `Peso_unitario`, 
        `Peso_lote`, `Data_entrada_lote`, `Data_saida_lote`) 
        VALUES ('$idPeixe', '$quantidadePeixe', '$pesoUnitario', 
        '$pesoLote', '$dataEntradaLote','$dataSaidaLote');");

        header("Location: qualificacaoPeixe.php");

    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>
