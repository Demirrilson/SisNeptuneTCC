<?php 
@session_start();


extract($_POST);
var_dump($_POST);

require('connect.php');

$senha = md5($senha);

if (!empty($nome)) {
mysqli_query($con, "INSERT INTO `cadastro` (`Cadastro_id`, `Nome`, `Email`, `Telefone`, 
`Cargo`, `Salario`, `CEP`, `Rua`, `Bairro`, `Numero`, 
`Complemento`, `Data_contratacao`, `Data_demissao`,
 `Expediente`, `Senha`) VALUES (NULL, '$nome', '$email', 
 '$telefone', '$cargo', '$salario', '$cep', '$rua', '$bairro', '$numero', '$complemento', 
 '$dataContratacao', NULL, '$expediente', '$senha');");

$_SESSION['resposta'] = "Cadastro realizado com sucesso!";
    header("location:funcionario.php"); 
} else {
    $_SESSION['resposta'] = "Erro: Todos os campos são obrigatórios.";
    header("location:funcionario.php");
}

