<?php 
@session_start();


extract($_POST);
var_dump($_POST);

require('connect.php');

$idFornecedor = $_POST['Fornecedor_id'];

if (!empty($nome)) {
    mysqli_query($con, "INSERT INTO `produtos`
    (`Produto_id`, `Nome`, `Data_validade`, 
    `Fornecedor_id`, `Preco`, `Tipo`) VALUES 
    (NULL, '$nome', '$dataValidade', '$idFornecedor', '$preco', '$tipo');");

$_SESSION['resposta'] = "Cadastro realizado com sucesso!";
    header("location:../../Frontend/Paginas/produto.php"); 
} else {
    $_SESSION['resposta'] = "Erro: Todos os campos são obrigatórios.";
    header("location:../../Frontend/Paginas/produto.php");
}