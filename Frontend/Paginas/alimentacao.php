<?php 
include('head.php');

?>

<html>
    <body>
        <?php include ('../../Backend/Sistema/connect.php');?>

        <div class="container">
            <form action="../../Backend/Sistema/alimentacao.act.php" method="post" enctype="multipart/form-data">

          
                <?php
                 echo "<label>Tanques:</label>";
                 echo "<select name='idTanque'>";

                $sql = "SELECT Tanque_id FROM tanque";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['Tanque_id']}'>{$row['Tanque_id']}</option>";
                } 
                ?>
                </select>

                <label>Data alimentação:</label>
                <input type="date" name="dataAlimentacao" required>

                <label>Hora alimentação:</label>
                <input type="time" name="horaAlimentacao" required>

                <label>Tipo alimentação</label>
                <input type="text" name="tipoAlimentacao" required>

                <label>Quantidade alimento:</label>
                <input type="number" name="quantidadeAlimento" required>

             


                 <label>Produtos:</label>
            <select name="idProduto">
                <?php
                $sql = "SELECT Produto_id, Nome FROM produtos";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['Produto_id']}'>{$row['Nome']}</option>";
                }
                ?>

                <input type="submit" value="Cadastrar">
                
            </form>
        </div>

    </body>
</html> 