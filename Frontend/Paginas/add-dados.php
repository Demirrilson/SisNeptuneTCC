<?php
$pageTitle = "Gerar Gráficos";
include('head.php');
include('menuBar.php');
require('../../Backend/Sistema/connect.php');
?>


<html>

<body>

<div class="caixa-add">

        <div class="add-content">

        <div class="btn-back"><a href="../../Frontend/Paginas/main-dados.php"><i class="fa-solid fa-arrow-left"></i></a></div>

            <form action="../../Backend/Sistema/dados.act.php" method="post" enctype="multipart/form-data" class="form-add grid-add-dados">


                <p>
                    <label>Data início:</label>
                    <input type="date" placeholder="Digite a data inicial..." name="dataInicio" required>
                </p>

                <p>
                    <label>Data final:</label>
                    <input type="date" placeholder="Digite a data final..." name="dataFinal" required>
                </p>

                <p>
                    <label>Tipo de Dado</label>
                    <select name="tipoDados">
                        <option value="1">Temperatura</option>
                        <option value="2">Turbidez</option>
                        <option value="3">Evaporação</option>
                        <option value="4">PH</option>
                        <option value="5">Amônia</option>
                    </select>
                </p>

                <p>
                <label>Tanque</label>

                <select name="idTanque">
                    <?php
                    $sql = "SELECT Tanque_id, Nome FROM tanque";
                    $result = mysqli_query($con, $sql); 
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['Tanque_id']}'>{$row['Nome']}</option>";
                    }

                ?></select>

                </p>


                <p>
                    <input type="submit" value="Gerar">
                </p>

            </form>
        </div>
    </div>

</body>

</html>