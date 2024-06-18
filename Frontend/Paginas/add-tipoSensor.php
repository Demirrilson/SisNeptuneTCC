<?php
$pageTitle = "Adicionar Tipo de Sensor";
include('head.php');
include('menuBar.php');
include('../../Backend/Sistema/connect.php');
?>

<html>

<body>
    <div class="caixa-add">

        <div class="add-content">

            <div class="btn-back"><a href="../../Frontend/Paginas/main-tipoSensor.php"><i class="fa-solid fa-arrow-left"></i></a></div>

            <form action="../../Backend/Sistema/tipoSensor.act.php" method="post" enctype="multipart/form-data" class="form-add grid-add-tipoSensor">

                <p>
                    <label>Nome:</label>
                    <input type="text" placeholder="Digite o nome do sensor..." name="nome" required>
                </p>

                <p>
                    <label>Caracteristica</label>
                    <input type="text" placeholder="Digite as caracteristicas do sensor..." name="caracteristica" required>
                </p>

                <p>
                    <input type="submit" value="Cadastrar">
                </p>

            </form>
        </div>
    </div>

</body>

</html>