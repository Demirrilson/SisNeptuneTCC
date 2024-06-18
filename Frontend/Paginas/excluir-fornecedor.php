<?php
if(isset($_GET['Fornecedor_id'])) {

    include('../../Backend/Sistema/connect.php');
    
    $Fornecedor_id = mysqli_real_escape_string($con, $_GET['Fornecedor_id']);
    
    $query = "DELETE FROM `fornecedor` WHERE `Fornecedor_id` = $Fornecedor_id";
    
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
