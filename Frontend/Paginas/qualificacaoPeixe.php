<?php 
include('head.php');

?>

<html>
    <body>
        <?php include ('../../Backend/Sistema/connect.php');?>

        <div class="container">
            <form action="../../Backend/Sistema/qualificacaoPeixe.act.php" method="post" enctype="multipart/form-data">
                <label>Quantidade peixe:</label>
                <input type="number" name="quantidadePeixe" required>

                <label>Peso unitário:</label>
                <input type="number"  name="pesoUnitario" required>


                <label>Peso lote:</label>
                <input type="number" name="pesoLote" required>

                <label>Data entrada lote:</label>
                <input type="date" name="dataEntrada" required>

                <label>Data saída lote:</label>
                <input type="date" name="dataSaida">

                <label>Peixe:</label>
            <select name="idPeixe">
                <?php
                $sql = "SELECT Peixe_id, Especie FROM tipo_peixe";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['Peixe_id']}'>{$row['Especie']}</option>";
                }
                ?>

                <input type="submit" value="Cadastrar">
                
            </form>
        </div>

    </body>
</html>