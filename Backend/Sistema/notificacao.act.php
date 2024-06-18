<?php 
@session_start();


extract($_POST);
var_dump($_POST);


require('connect.php');

if(!empty($mensagem)){
    mysqli_query($con,"INSERT INTO `notificacao` 
    (`Notificacao_id`, `Mensagem`, `Data_envio`) 
    VALUES (NULL, '$mensagem', '$dataEnviou');");

$_SESSION['resposta'] = "Cadastro realizado com sucesso!";
    header("location:../../Frontend/Paginas/main-notificacao.php"); 
} else {
    $_SESSION['resposta'] = "Erro: Todos os campos são obrigatórios.";
    header("location:../../Frontend/Paginas/add-notificacao.php");
}