<?php 
include('head.php');

?>

<html>
    <body>
        <?php include ('../../Backend/Sistema/connect.php');?>

        <div class="container">
            <form action="../../Backend/Sistema/notificacao.act.php" method="post" enctype="multipart/form-data">
                <label>Mensagem:</label>
                <input type="text" placeholder="Digite o nome do produto..." name="mensagem" required>

                <label>Data enviou</label>
                <input type="date" name="dataEnviou" required>

                <input type="submit" value="Cadastrar">
                
            </form>
        </div>

    </body>
</html>