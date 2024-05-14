<?php 
@session_start();


extract($_POST);
var_dump($_POST);

require('connect.php');

if(!empty($valor)){
    mysqli_query($con,"INSERT INTO `leitura_manual` 
    (`Leitura_id`, `Valor`, `Data_leitura`, `PH`, 
    `Nivel_oxigenio`) VALUES (NULL, '$valor', 
    '$dataLeitura', '$ph', '$oxigenio');");

$_SESSION['resposta'] = "Cadastro realizado com sucesso!";
    header("location:../../Frontend/Paginas/leituraManual.php"); 
} else {
    $_SESSION['resposta'] = "Erro: Todos os campos são obrigatórios.";
    header("location:../../Frontend/Paginas/leituraManual.php");
}