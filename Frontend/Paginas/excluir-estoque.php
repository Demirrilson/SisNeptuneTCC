<?php
if(isset($_GET['Estoque_id'])) {

    include('../../Backend/Sistema/connect.php');
    
    $estoque_id = mysqli_real_escape_string($con, $_GET['Estoque_id']);
    
    $query = "DELETE FROM `estoque` WHERE `Estoque_id` = $estoque_id";
    
    // Executa a query
    if (mysqli_query($con, $query)) {
        echo "Excluído com sucesso";
    } else {
        echo "Erro ao excluir: " . mysqli_error($con); // Mostra o erro SQL, se houver
    }
} else {
    echo "ID de cadastro não fornecido";
}
?>