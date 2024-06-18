<?php
if(isset($_GET['Teste_id'])) {

    include('../../Backend/Sistema/connect.php');
    
    $Teste_id = mysqli_real_escape_string($con, $_GET['Teste_id']);
    
    $query = "DELETE FROM `teste_quimico` WHERE `Teste_id` = $Teste_id";
    
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
