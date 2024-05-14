<?php 
include('head.php');

?>

<html>
    <body>
        <?php include ('connect.php');?>

        <div class="container">
            <form action="piscicultura.act.php" method="post" enctype="multipart/form-data">
                <label>Nome:</label>
                <input type="text" placeholder="Digite o nome do produto..." name="nome" required>

                <label>Localização</label>
                <input type="text" placeholder="Digite a localização" name="localizacao" required>


                <label>Área total</label>
                <input type="number" placeholder="Digite a área..." name="areaTotal" required>

                <input type="submit" value="Cadastrar">
                
            </form>
        </div>

    </body>
</html>