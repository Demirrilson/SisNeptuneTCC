<?php 
include('head.php');

?>

<html>
    <body>
        <?php include ('connect.php');?>

        <div class="container">
            <form action="leituraManual.act.php" method="post" enctype="multipart/form-data">
                <label>Valor:</label>
                <input type="number" placeholder="Digite o valor..." name="valor" required>

                <label>Data da leitura</label>
                <input type="date"  name="dataLeitura" required>


                <label>PH</label>
                <input type="number" placeholder="Digite o PH..." name="ph" required>

                <label>Nível oxigênio</label>
                <input type="number" placeholder="Digite o oxigênio..." name="oxigenio" required>

                <input type="submit" value="Cadastrar">
                
            </form>
        </div>

    </body>
</html>