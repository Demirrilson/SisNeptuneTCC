<?php
include('connect.php');
extract($_POST);
var_dump($_POST);


$query = "UPDATE `cadastro` SET `Nome` = '$nome', `Email` = '$email', `Telefone` = '$telefone', 
`Cargo` = '$cargo', `CEP` = '$cep', `Rua` = '$rua', `Bairro` = '$bairro', `Numero` = '$numero', 
`Complemento` = '$complemento',  `Data_contratacao` = '$dataContratacao', `Data_demissao` = '$dataDemissao', 
`Expediente` = '$expediente' WHERE `cadastro`.`Cadastro_id` = $codigo";

if(mysqli_query($con, $query)) {
$msg = "<p class=\"alerta green\">Registro atualizado com sucesso!</p>";
} else {
$msg = "<p class=\"alerta red\">Erro ao gravar registro: " . $con->error . "</p>";
}

@session_start();
$_SESSION['msg'] = $msg;
header("location:../../Frontend/Paginas/main-funcionario.php");
?>