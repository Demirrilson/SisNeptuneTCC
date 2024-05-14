<?php 
include('head.php');

?>

<html>
    <body>
        <?php include ('connect.php');?>

        <div class="container">
            <form action="testeQuimico.act.php" method="post" enctype="multipart/form-data">
                <label>PH:</label>
                <input type="number" name="ph" required>

                <label>Nível oxigênio::</label>
                <input type="number"  name="nivelOxigenio" required>


                <label>Data leitura:</label>
                <input type="date" name="dataLeitura" required>


                <label>Tanque:</label>
            <select name="idTanque">

                <?php
                $sql = "SELECT Tanque_id FROM tanque";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['Tanque_id']}'>{$row['Tanque_id']}</option>";
                }
                ?>

                <input type="submit" value="Cadastrar">
                
            </form>
        </div>

    </body>
</html>