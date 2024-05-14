<?php 
@session_start();


extract($_POST);
var_dump($_POST);

require('connect.php');

$sql = "SELECT Estoque_id, Nome FROM estoque";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['dataValidade']) && !empty($_POST['quantidade'])) {
        $dataValidade = $_POST['dataValidade'];

        $quantidade = $_POST['quantidade'];

        $dataEntrada = $_POST['dataEntrada'];

        $dataSaida = $_POST['dataSaida'];


        mysqli_query($con, "INSERT INTO `estoque` 
        (`Estoque_id`, `Produto_id`, `Fornecedor_id`, 
        `Localizacao_produto`, `Data_validade`, 
        `Quantidade`, `Data_entrada`, `Data_saida`) 
        VALUES (NULL, $idProduto, $idFornecedor, NULL, 
        '$dataEntrada', '$quantidade', '$dataEntrada', '$dataSaida');");

        // header("Location: login.php");

    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>