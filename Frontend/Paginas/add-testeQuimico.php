<?php
$pageTitle = "Adicionar Teste Químico";
include('head.php');
include('menuBar.php');
include('../../Backend/Sistema/connect.php');
?>

<html>

<body>

    <div class="caixa-add">

        <div class="add-content">

            <div class="btn-back"><a href="./main-testeQuimico.php"><i class="fa-solid fa-arrow-left"></i></a></div>


            <form action="../../Backend/Sistema/testeQuimico.act.php" method="post" enctype="multipart/form-data" class="form-add grid-add-testeQuimico">

                <p>
                    <label>Tipo do teste:</label>
                    <select name="tipoDados">
                        <option value="PH">PH</option>
                        <option value="Amônia">Amônia</option>
                    </select>
                </p>

                <p>
                    <label>Horário</label>
                    <input type="text" name="horario" required>
                </p>

                <p>
                    <label>Data leitura:</label>
                    <input type="date" name="dataLeitura" required>
                </p>
                
                <p>
                    <label>Resultado:</label>
                    <input type="text" name="resultado" required>
                </p>

                <p>
                    <label>Tanque:</label>
                    <select name="idTanque">

                        <?php
                        $sql = "SELECT Tanque_id FROM tanque";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['Tanque_id']}'>{$row['Tanque_id']}</option>";
                        }
                        ?>
                    </select>
                </p>

                <p>
                    <input type="submit" value="Cadastrar">
                </p>

            </form>
        </div>
    </div>

</body>

</html>