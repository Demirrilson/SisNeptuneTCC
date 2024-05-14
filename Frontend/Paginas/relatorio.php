<?php 
include('head.php');

?>

<html>
    <body>
        <?php include ('connect.php');?>

        <div class="container">
            <form action="relatorio.act.php" method="post" enctype="multipart/form-data">
                <label>Data relatório:</label>
                <input type="date" name="dataRelatorio" required>

                <label>Conteudo:</label>
                <input type="text" name="conteudo" required>

                <?php
               echo "<label>Teste:</label>";
                echo"<select name='idTeste'>";

                $sql = "SELECT Teste_id FROM teste_quimico";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['Teste_id']}'>{$row['Teste_id']}</option>";
                }
                ?>



                <input type="submit" value="Cadastrar">
                
            </form>
        </div>

    </body>
</html>