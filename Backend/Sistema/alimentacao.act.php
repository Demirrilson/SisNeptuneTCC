<?php
@session_start();


extract($_POST);
var_dump($_POST);

require('connect.php');


$sql = "SELECT Alimentacao_id, Nome FROM alimentacao";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['dataAlimentacao']) && !empty($_POST['horaAlimentacao'])) {
        $dataAlimentacao = $_POST['dataAlimentacao'];

        $horaAlimentacao = $_POST['horaAlimentacao'];

        $tipoAlimentacao = $_POST['tipoAlimentacao'];

        $quantidadeAlimento = $_POST['quantidadeAlimento'];
        
        $idProduto = $_POST['idProduto'];

        
        $idTanque = $_POST['idTanque'];


        mysqli_query($con, "INSERT INTO `alimentacao` 
        (`Alimentacao_id`, `Tanque_id`, `Produto_id`, 
        `Data_alimentacao`, `Hora_alimentacao`, 
        `Tipo_alimento`, `Quantidade_alimento`) 
        VALUES (NULL, '$idTanque', '$idProduto', '$dataAlimentacao', 
        '$horaAlimentacao', '$tipoAlimentacao', '$quantidadeAlimento');");

        header("Location: alimentacao.php");

    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>