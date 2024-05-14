<?php 
include('head.php');

?>

<html>
    <body>
        <?php include ('connect.php');?>

        <div class="container">
            <form action="tanque.act.php" method="post" enctype="multipart/form-data">
                <label>Capacidade volume</label>
                <input type="number" placeholder="Digite o volume do Tanque..." name="capacidadeVolume" required>


                <label>Piscicultura</label>
            <select name="idPiscicultura">
                <?php
                $sql = "SELECT Piscicultura_id, Nome FROM piscicultura";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['Piscicultura_id']}'>{$row['Nome']}</option>";
                }
                ?>
    	    </select>

                <input type="submit" value="Cadastrar">
                
            </form>
        </div>

    </body>
</html>