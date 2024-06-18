<?php
$pageTitle = "Adicionar Piscicultura";
include('head.php');
include('menuBar.php');
include('../../Backend/Sistema/connect.php');
?>

<html>

<body>

    <div class="caixa-add">

        <div class="add-content">

            <div class="btn-back"><a href="./main-piscicultura.php"><i class="fa-solid fa-arrow-left"></i></a></div>


            <form action="../../Backend/Sistema/piscicultura.act.php" method="post" enctype="multipart/form-data" class="form-add grid-add-piscicultura">

                <p>
                    <label>Nome:</label>
                    <input type="text" placeholder="Digite o nome da piscicultura..." name="nome" required>
                </p>

                <p>
                    <label>Localização</label>
                    <input type="text" placeholder="Digite a localização" name="localizacao" required>
                </p>

                <p>
                    <label>Área total</label>
                    <input type="number" placeholder="Digite a área..." name="areaTotal" required>
                </p>

                <p>
                    <input type="submit" value="Cadastrar">
                </p>

            </form>
        </div>
    </div>

</body>

</html>