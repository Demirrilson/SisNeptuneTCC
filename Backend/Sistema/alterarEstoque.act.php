<?php
    require('../../Backend/Sistema/connect.php');
    extract($_POST);
    var_dump($_POST);

    $query = "UPDATE `estoque` SET `Produto_id` = '$idProduto' ,`Fornecedor_id` = '$idFornecedor', 
    `Localizacao_produto` = null, `Data_validade` = '$dataValidade', 
`Quantidade` = '$quantidade', `Data_entrada` = '$dataEntrada', `Data_saida` = '$dataSaida' WHERE `estoque`.`Estoque_id` = $codigo";

if(mysqli_query($con, $query)) {
    $msg = "<p class=\"alerta green\">Registro atualizado com sucesso!</p>";
    } else {
    $msg = "<p class=\"alerta red\">Erro ao gravar registro: " . $con->error . "</p>";
    }

    @session_start();
$_SESSION['msg'] = $msg;
header("location:../../Frontend/Paginas/main-estoque.php");
?>