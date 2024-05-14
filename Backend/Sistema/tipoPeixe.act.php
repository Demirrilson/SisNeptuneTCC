<?php 
@session_start();


extract($_POST);
var_dump($_POST);

require('connect.php');

if (!empty($nome)) {
    mysqli_query($con, "INSERT INTO `tipo_peixe` 
    (`Peixe_id`, `Especie`) VALUES 
    (NULL, '$nome\r\n');");

$_SESSION['resposta'] = "Cadastro realizado com sucesso!";
    header("location:tipoPeixe.php"); 
} else {
    $_SESSION['resposta'] = "Erro: Todos os campos são obrigatórios.";
    header("location:tipoPeixe.php");
}