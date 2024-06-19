<?php
$pageTitle = "Painel de Controle";
include('head.php');
include('menuBar.php');
?>

<body>
    <div class="container-painel">
        <div class="painel-icons">
            <div>
                <i class="fa-solid fa-users-rectangle"></i>
                <a href="../../Frontend/Paginas/main-funcionario.php">Funcionários</a>
                <p>9</p>
                <?php //ISABELLA puxar o número de funcionários ativos ?>
            </div>
            <div>
                <i class="fa-solid fa-kaaba"></i>
                <a href="../../Frontend/Paginas/main-tanque.php">Tanque</a>
                <p>4</p>
                <?php // ISABELLA puxar a quantidade de tanques ativos ?>
            </div>
            <div>
                <i class="fa-regular fa-message"></i>
                <a href="../../Frontend/Paginas/main-avisos.php">Mensagens</a>
                <p>2</p>
                <?php //ISABELLA puxar a quantiadde de mensagens novas ?>
            </div>
        </div>

        <div class="painel-parametros">
            <div class="parametros-temperatura">
                <i class="fa-solid fa-temperature-low"></i>Temperatura
                <h1>
                    <div style="width:100%;">
                        <canvas id="chart1"></canvas>
                    </div>
                    <div id="ultimaLeitura1"></div>
                </h1>
            </div>
            <div class="parametros-turbidez">
                <i class="fa-solid fa-water"></i>Turbidez
                <h1>
                    <div style="width:100%;">
                        <canvas id="chart2"></canvas>
                    </div>
                    <div id="ultimaLeitura2"></div>
                </h1>
            </div>
            <div class="parametros-evaporacao">
                <i class="fa-solid fa-wind"></i>Evaporação
                <h1>
                    <div style="width:100%;">
                        <canvas id="chart3"></canvas>
                    </div>
                    <div id="ultimaLeitura3"></div>
                </h1>
            </div>
        </div>
    </div>

    <!-- Script JavaScript para criar os gráficos e exibir as últimas leituras dos sensores -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
            function fetchAndRenderChart(chartId, leituraId, tipo_sensor_id) {
                var ctx = document.getElementById(chartId).getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [],
                        datasets: [
                            {
                                label: 'Tanque 16',
                                data: [],
                                backgroundColor: 'rgba(255, 99, 132, 0.8)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            },
                            {
                                label: 'Tanque 17',
                                data: [],
                                backgroundColor: 'rgba(54, 162, 235, 0.8)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            },
                            {
                                label: 'Tanque 23',
                                data: [],
                                backgroundColor: 'rgba(75, 192, 192, 0.8)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        scales: {
                            x: {
                                stacked: true
                            },
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                $.get('../../Documentos/ultima_leitura.php', { tipo_sensor_id: tipo_sensor_id }, function(response) {
                    var ultimaLeituraHtml = '';
                    var dates = {};
                    response.forEach(function(reading) {
                        if (reading.error) {
                            ultimaLeituraHtml += '<p>' + reading.error + '</p>';
                        } else {
                            var date = reading.Data_leitura;
                            if (!dates[date]) {
                                dates[date] = {};
                            }
                            dates[date][reading.Tanque_id] = reading.Valor;
                            ultimaLeituraHtml += '<p>' + '</p>';
                        }
                    });

                    for (var date in dates) {
                        chart.data.labels.push(date);
                        chart.data.datasets.forEach(function(dataset) {
                            var tanqueId = parseInt(dataset.label.split(' ')[1]);
                            dataset.data.push(dates[date][tanqueId] || 0);
                        });
                    }
                    $('#' + leituraId).html(ultimaLeituraHtml);
                    chart.update();
                });
            }

            fetchAndRenderChart('chart1', 'ultimaLeitura1', 1); // Gráfico para tipo_sensor_id = 1 (Temperatura)
            fetchAndRenderChart('chart2', 'ultimaLeitura2', 2); // Gráfico para tipo_sensor_id = 2 (Turbidez)
            fetchAndRenderChart('chart3', 'ultimaLeitura3', 3); // Gráfico para tipo_sensor_id = 3 (Evaporação)
        });
    </script>
</body>

</html>
