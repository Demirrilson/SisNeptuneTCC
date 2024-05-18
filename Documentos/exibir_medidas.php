<?php
if (isset($_GET['dataInicio']) && isset($_GET['dataFim'])) {
    $dataInicio = $_GET['dataInicio'];
    $dataFim = $_GET['dataFim'];

    // Aqui você pode incluir o código PHP que obtém as medidas de temperatura
    // e exibe os resultados formatados
    // Certifique-se de usar o mesmo código que mencionei anteriormente para obter as medidas de temperatura do banco de dados

    echo "<h2>Medidas de Temperatura para o Intervalo de Tempo:</h2>";
    echo "<p>Data de Início: $dataInicio</p>";
    echo "<p>Data de Fim: $dataFim</p>";

    // Exemplo de uso da função obterMedidasTemperatura
    // include 'obter_medidas.php'; // Inclua o arquivo com a função obterMedidasTemperatura
    // $medidas = obterMedidasTemperatura($dataInicio, $dataFim);

    // Exibir as medidas de temperatura
    // echo "Média: " . $medidas['media'] . "<br>";
    // echo "Máxima: " . $medidas['maxima'] . "<br>";
    // echo "Mínima: " . $medidas['minima'] . "<br>";
} else {
    echo "Por favor, forneça a data de início e a data de fim.";
}
// Função para conectar ao banco de dados
function conectarBancoDados() {
    $servername = "localhost"; // Seu servidor MySQL
    $username = "root"; // Seu usuário MySQL
    $password = ""; // Sua senha MySQL (deixe em branco se não houver senha)
    $dbname = "neptune"; // Seu banco de dados

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    return $conn;
}

// Função para obter a média, máxima e mínima temperatura no intervalo de tempo definido pelo usuário
function obterMedidasTemperatura($dataInicio, $dataFim) {
    $conn = conectarBancoDados();

    // Consulta SQL para obter as medidas de temperatura no intervalo de tempo
    $sql = "SELECT AVG(valor) as media, MAX(valor) as maxima, MIN(valor) as minima FROM leitura_sensor WHERE sensor_id = 1 and data_leitura BETWEEN '$dataInicio' AND '$dataFim'";

    // Executar a consulta
    $result = $conn->query($sql);

    // Verificar se há resultados
    if ($result->num_rows > 0) {
        // Retornar o resultado como um array associativo
        return $result->fetch_assoc();
    } else {
        // Se não houver resultados, retornar um array vazio
        return array();
    }

    $conn->close();
}

// Verificar se foram fornecidos parâmetros de data de início e data de fim na URL
if (isset($_GET['dataInicio']) && isset($_GET['dataFim'])) {
    $dataInicio = $_GET['dataInicio'];
    $dataFim = $_GET['dataFim'];

    // Obter as medidas de temperatura para o intervalo de tempo especificado
    $medidas = obterMedidasTemperatura($dataInicio, $dataFim);

    if (!empty($medidas)) {
        echo "Média: " . $medidas['media'] . "<br>";
        echo "Máxima: " . $medidas['maxima'] . "<br>";
        echo "Mínima: " . $medidas['minima'] . "<br>";
    } else {
        echo "Nenhuma medida encontrada para o intervalo de tempo especificado.";
    }
} else {
    echo "Por favor, forneça a data de início e a data de fim na URL, por exemplo: ?dataInicio=2024-05-20%2000:00:00&dataFim=2024-05-20%2023:59:59";
}
?>
