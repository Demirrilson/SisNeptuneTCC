<?php

// Verifica se o ID do cadastro foi fornecido na URL
if (isset($_GET['Cadastro_id'])) {
    // Conecta ao banco de dados
    include('../../Backend/Sistema/connect.php');

    // Obtém e escapa o ID do cadastro
    $Cadastro_id = mysqli_real_escape_string($con, $_GET['Cadastro_id']);

    // Query para excluir o registro
    $query = "DELETE FROM `cadastro` WHERE `Cadastro_id` = $Cadastro_id";

    // Executa a query
    if (mysqli_query($con, $query)) {
        echo "Excluído com sucesso";
    } else {
        echo "Erro ao excluir: " . mysqli_error($con); // Mostra o erro SQL, se houver
    }
} else {
    echo "ID de cadastro não fornecido";
}
