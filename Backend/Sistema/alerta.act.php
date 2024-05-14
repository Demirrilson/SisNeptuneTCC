<?php 
@session_start();


extract($_POST);
var_dump($_POST);


require('connect.php');

if(!empty($mensagem)){
    mysqli_query($con,"INSERT INTO `alerta` (`Alerta_id`, `Tipo`, `Mensagem`, `Data_alerta`) VALUES (NULL, '$tipo', '$mensagem', '$dataAlerta');");

    $_SESSION['resposta'] = "Cadastro realizado com sucesso!";
    header("location:../../Frontend/Paginas/alerta.php"); 
} else {
    $_SESSION['resposta'] = "Erro: Todos os campos são obrigatórios.";
    header("location:../../Frontend/Paginas/alerta.php");
}