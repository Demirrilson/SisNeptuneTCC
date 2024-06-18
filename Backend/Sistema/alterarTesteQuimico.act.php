<?php
require('../../Backend/Sistema/connect.php');
extract($_POST);
var_dump($_POST);

$query = "UPDATE `teste_quimico` SET `Tanque_id` = '$idTanque',`Tipo_teste` = '$tipoTeste', 
`Horario` = '$horario', `Data_leitura` = '$dataLeitura', 
`Resultado` = '$resultado' WHERE `teste_quimico`.`Teste_id` = $codigo;";

if (mysqli_query($con, $query)) {
    $msg = "<p class=\"alerta green\">Registro atualizado com sucesso!</p>";
} else {
    $msg = "<p class=\"alerta red\">Erro ao gravar registro: " . $con->error . "</p>";
}

@session_start();
$_SESSION['msg'] = $msg;
header("location:../../Frontend/Paginas/main-testeQuimico.php");
