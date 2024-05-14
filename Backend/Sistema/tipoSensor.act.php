<?php 
@session_start();


extract($_POST);
var_dump($_POST);


require('connect.php');

if(!empty($nome)){
    mysqli_query($con,"INSERT INTO `tipo_sensor` 
    (`Tipo_sensor_id`, `Nome`, `Caracteristica`) 
    VALUES (NULL, '$nome', '$caracteristica');");

$_SESSION['resposta'] = "Cadastro realizado com sucesso!";
    header("location:tipoSensor.php"); 
} else {
    $_SESSION['resposta'] = "Erro: Todos os campos são obrigatórios.";
    header("location:tipoSensor.php");
}