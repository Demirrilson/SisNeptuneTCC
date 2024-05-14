<?php
    require('connect.php');
    extract($_POST);
    var_dump($_POST);

    $query = "UPDATE `fornecedor` SET `Nome` = '$nome', 
    `Email` = '$email', `Telefone` = '$telefone' WHERE 
    `fornecedor`.`Fornecedor_id` = $codigo;";

if(mysqli_query($con, $query)) {
    $msg = "<p class=\"alerta green\">Registro atualizado com sucesso!</p>";
    } else {
    $msg = "<p class=\"alerta red\">Erro ao gravar registro: " . $con->error . "</p>";
    }

    @session_start();
$_SESSION['msg'] = $msg;
header("location:../../Frontend/Paginas/detalheFornecedor.php");
?>