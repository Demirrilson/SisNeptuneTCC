<?php
$pageTitle = "Adicionar Qualificação Peixes";
include('head.php');
include('menuBar.php');
include('../../Backend/Sistema/connect.php');
?>

<html>

<body>

    <div class="caixa-add">

        <div class="add-content">

            <div class="btn-back"><a href="./main-qualificacaoPeixe.php"><i class="fa-solid fa-arrow-left"></i></a></div>


            <form action="../../Backend/Sistema/qualificacaoPeixe.act.php" method="post" enctype="multipart/form-data" class="form-add grid-add-qualificacaoPeixe">

                <p>
                    <label>Quantidade peixe:</label>
                    <input type="number" name="quantidadePeixe" required>
                </p>

                <p>
                    <label>Peso unitário:</label>
                    <input type="number" name="pesoUnitario" required>
                </p>


                <p>
                    <label>Peso lote:</label>
                    <input type="number" name="pesoLote" required>
                </p>

                <p>
                    <label>Data entrada lote:</label>
                    <input type="date" name="dataEntrada" required>
                </p>

                <p>
                    <label>Data saída lote:</label>
                    <input type="date" name="dataSaida">
                </p>

                <p>
                    <label>Peixe:</label>
                    <select name="idPeixe">
                        <?php
                        $sql = "SELECT Peixe_id, Especie FROM tipo_peixe";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['Peixe_id']}'>{$row['Especie']}</option>";
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