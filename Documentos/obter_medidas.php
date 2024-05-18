<?php
if (isset($_GET['dataInicio']) && isset($_GET['dataFim'])) {
    $dataInicio = $_GET['dataInicio'];
    $dataFim = $_GET['dataFim'];

    // Redirecionar para a página que exibirá as medidas de temperatura
    header("Location: exibir_medidas.php?dataInicio=$dataInicio&dataFim=$dataFim");
    exit();
} else {
    echo "Por favor, forneça a data de início e a data de fim.";
}
?>
