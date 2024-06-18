<?php
$pageTitle = "Adicionar Relatórios";
include('head.php');
include('menuBar.php');
include('../../Backend/Sistema/connect.php');
?>

<html>

<body>
    <div class="caixa-add">

        <div class="add-content">

            <div class="btn-back"><a href="./main-relatorio.php"><i class="fa-solid fa-arrow-left"></i></a></div>


            <form action="../../Backend/Sistema/relatorio.act.php" method="post" enctype="multipart/form-data" class="form-add grid-add-relatorio">

                <p>
                    <label>Data relatório:</label>
                    <input type="date" name="dataRelatorio" required>
                </p>

                <p>
                    <label>Conteúdo:</label>
                    <input type="text" name="conteudo" required>
                </p>

                <p>
                    <?php
                    echo "<label>Teste:</label>";
                    echo "<select name='idTeste'>";

                    $sql = "SELECT Teste_id FROM teste_quimico";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['Teste_id']}'>{$row['Teste_id']}</option>";
                    }
                    echo "</select>"
                    ?>
                </p>

                <p>
                    <input type="submit" value="Cadastrar">
                </p>

            </form>
        </div>
    </div>

</body>

</html>