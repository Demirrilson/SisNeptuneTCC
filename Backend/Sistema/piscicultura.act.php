<?php 
@session_start();


extract($_POST);
var_dump($_POST);

require('connect.php');

if(!empty($nome)){
    mysqli_query($con, "INSERT INTO `piscicultura` 
    (`Piscicultura_id`, `Nome`, `Localizacao`, 
    `Area_total`) VALUES (NULL, '$nome',
    '$localizacao', '$areaTotal');");

$_SESSION['resposta'] = "Cadastro realizado com sucesso!";
    header("location:../../Frontend/Paginas/piscicultura.php"); 
} else {
    $_SESSION['resposta'] = "Erro: Todos os campos são obrigatórios.";
    header("location:../../Frontend/Paginas/piscicultura.php");
}
