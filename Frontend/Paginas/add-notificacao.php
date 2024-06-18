<?php
$pageTitle = "Adicionar Notificações";
include('head.php');
include('menuBar.php');
include('../../Backend/Sistema/connect.php');
?>

<html>

<body>

    <div class="caixa-add">

        <div class="add-content">

            <div class="btn-back"><a href="./main-notificacao.php"><i class="fa-solid fa-arrow-left"></i></a></div>

            <form action="../../Backend/Sistema/notificacao.act.php" method="post" enctype="multipart/form-data" class="form-add grid-add-notificacao">

                <p>
                    <label>Mensagem:</label>
                    <input type="text" placeholder="Digite o nome do produto..." name="mensagem" required>
                </p>

                <p>
                    <label>Data enviou</label>
                    <input type="date" name="dataEnviou" required>
                </p>

                <p>
                    <input type="submit" value="Cadastrar">
                </p>
                
            </form>
        </div>
    </div>

</body>

</html>