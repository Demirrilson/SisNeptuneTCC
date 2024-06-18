<?php
$pageTitle = "Painel de Controle";
include('head.php');
include('menuBar.php');
?>

<body>

    <div class="container-painel">

        <div class="painel-icons">
            <div><i class="fa-solid fa-users-rectangle"></i> <a href="../../Frontend/Paginas/main-funcionario.php">Funcionários</a> <p>9</p><?php //ISABELLA puxar o número de funcionários ativos // 
                                                                            ?></div>
            <div><i class="fa-solid fa-kaaba"></i> <a href="../../Frontend/Paginas/main-tanque.php">Tanque</a> <p>4</p><?php  // ISABELLA puxar a quantidade de tanques ativos// 
                                                            ?></div>
            <div><i class="fa-regular fa-message"></i> <a href="../../Frontend/Paginas/main-avisos.php">Mensagens</a> <p>2</p><?php //ISABELLA puxar a quantiadde de mensagens novas //  
                                                                    ?></div>
        </div>

        <div class="painel-parametros">
            <div><i class="fa-solid fa-temperature-low"></i>Temperatura <h1><img src="../../Frontend/css/images/grafico.png" alt=""></h1></div>
            <div><i class="fa-solid fa-water"></i>Turbidez<h1></h1><img src="../../Frontend/css/images/grafico.png" alt=""></div>
            <div><i class="fa-solid fa-wind"></i>Evaporação<h1></h1><img src="../../Frontend/css/images/grafico.png" alt=""></div>
        </div>






    </div>





</body>

</html>