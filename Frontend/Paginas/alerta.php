<?php 
include('head.php');

?>

<html>
    <body>
        <?php include ('../../Backend/Sistema/connect.php');?>

        <div class="container">
            <form action="alerta.act.php" method="post" enctype="multipart/form-data">
                <label>tipo:</label>
                <input type="text" placeholder="Digite o tipo da mensagem..." name="tipo" required>

                <label>Mensagem</label>
                <input type="text" placeholder="Digite a mensagem..." name="mensagem" required>

                <label>Data alerta</label>
                <input type="date" placeholder="Digite a data do alerta..." name="dataAlerta" required>


                <input type="submit" value="Cadastrar">
                
            </form>
        </div>

    </body>
</html>