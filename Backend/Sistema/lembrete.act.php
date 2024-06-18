<?php 
@session_start();


extract($_POST);
var_dump($_POST);

require('connect.php');

if(!empty($hora)){
mysqli_query($con,"INSERT INTO `alerta` (`Alerta_id`, `Horario`,
 `Tipo`, `Quantidade`, `Anotacao`, `Data_alerta`, `Tanque`,
  `Produto`) VALUES (NULL, '$hora', '$tipo', '$quantidade', '$anotacao', 
 '$data', '$idTanque', '$idProduto');");

    $_SESSION['resposta'] = "Cadastro realizado com sucesso!";
    header("location:../../Frontend/Paginas/main-lembrete.php"); 
} else {
    $_SESSION['resposta'] = "Erro: Todos os campos são obrigatórios.";
    header("location:../../Frontend/Paginas/add-lembrete.php");
 }