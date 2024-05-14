<?php 
@session_start();

extract($_POST);
var_dump($_POST);

require('connect.php');

if(!empty($nome)){
    mysqli_query($con, "INSERT INTO 
    `fornecedor` (`Fornecedor_id`, 
    `CNPJ_Fornecedor`, `Nome`, 
    `Email`, `Telefone`) VALUES (NULL, '$cnpj', 
    '$nome', '$email', '$telefone');");


$_SESSION['resposta'] = "Cadastro realizado com sucesso!";
    header("location:cadFornecedor.php"); 
} else {
    $_SESSION['resposta'] = "Erro: Todos os campos são obrigatórios.";
    header("location:cadFornecedor.php");
}
