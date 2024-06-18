<?php
$pageTitle = "Adicionar Lembrete";
include('head.php');
include('menuBar.php');
include('../../Backend/Sistema/connect.php');
?>

<html>

<body>

    <div class="caixa-add">

        <div class="add-content">

            <div class="btn-back"><a href="../../Frontend/Paginas/main-lembrete.php"><i class="fa-solid fa-arrow-left"></i></a></div>


            <form action="../../Backend/Sistema/lembrete.act.php" method="post" enctype="multipart/form-data" class="form-add grid-add-lembrete">

                <p>
                    <?php
                    echo "<label>Tanques:</label>";
                    echo "<select name='idTanque'>";

                    $sql = "SELECT Tanque_id, Nome FROM tanque";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['Nome']}'>{$row['Nome']}</option>";
                    }
                    echo "</select>"
                    ?>
                </p>

                <p>
                    <label>Data Lembrete:</label>
                    <input type="date" name="data" required>
                </p>
                <p>
                    <label>Hora Lembrete:</label>
                    <input type="time" name="hora" required>
                </p>
                <p>
                    <label>Tipo Lembrete:</label>
                    <input type="text" name="tipo" required>
                </p>
                <p>
                    <label>Quantidade:</label>
                    <input type="text" name="quantidade">
                </p>


                <p>
                    <label>Produtos:</label>
                    <select name="idProduto">
                        <?php
                        $sql = "SELECT Produto_id, Nome FROM produtos";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['Nome']}'>{$row['Nome']}</option>";
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