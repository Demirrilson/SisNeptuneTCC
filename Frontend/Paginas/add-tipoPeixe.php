<?php
$pageTitle = "Adicionar Tipo de Peixes";
include('head.php');
include('menuBar.php');
include('../../Backend/Sistema/connect.php');
?>

<html>

<body>
    <div class="caixa-add">

        <div class="add-content">

            <div class="btn-back"><a href="./main-tipoPeixe.php"><i class="fa-solid fa-arrow-left"></i></a></div>


            <form action="../../Backend/Sistema/tipoPeixe.act.php" method="post" enctype="multipart/form-data" class="form-add grid-add-tipoPeixe">

                <p>
                    <label>Espécie:</label>
                    <input type="text" placeholder="Digite a espécie do peixe..." name="nome" required>
                </p>

                <p>
                    <input type="submit" value="Cadastrar">
                </p>
            </form>
        </div>
    </div>

</body>

</html>