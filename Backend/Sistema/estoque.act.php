<?php 
@session_start();


extract($_POST);

require('connect.php');

$sql = "SELECT Estoque_id, Nome FROM estoque";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['dataValidade']) && !empty($_POST['quantidade'])) {
        $dataValidade = $_POST['idProduto'];

        $dataValidade = $_POST['dataValidade'];

        $quantidade = $_POST['quantidade'];

        $dataEntrada = $_POST['dataEntrada'];

        $dataSaida = $_POST['dataSaida'];

        $dataSaida = $_POST['idFornecedor'];


        mysqli_query($con, "INSERT INTO `estoque` 
        (`Estoque_id`, `Produto_id`, `Fornecedor_id`, 
        `Localizacao_produto`, `Data_validade`, 
        `Quantidade`, `Data_entrada`, `Data_saida`) 
        VALUES (NULL, $idProduto, $idFornecedor, NULL, 
        '$dataEntrada', '$quantidade', '$dataEntrada', '$dataSaida');");



    header("Location: ../../Frontend/Paginas/main-estoque.php");

    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>