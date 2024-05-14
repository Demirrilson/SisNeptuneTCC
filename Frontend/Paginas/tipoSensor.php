<?php 
include('head.php');

?>

<html>
    <body>
        <?php include ('connect.php');?>

        <div class="container">
            <form action="tipoSensor.act.php" method="post" enctype="multipart/form-data">
                <label>Nome:</label>
                <input type="text" placeholder="Digite o nome do sensor..." name="nome" required>

                <label>Caracteristica</label>
                <input type="text" placeholder="Digite as caracteristicas do sensor..." name="caracteristica" required>


                <input type="submit" value="Cadastrar">
                
            </form>
        </div>

    </body>
</html>