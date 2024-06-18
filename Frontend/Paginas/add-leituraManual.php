<?php
$pageTitle = " Adicionar Leitura Manual";
include('head.php');
include('menuBar.php');
include('../../Backend/Sistema/connect.php');
?>

<html>

<body>

    <div class="caixa-add">

        <div class="add-content">

        <div class="btn-back"><a href="../../Frontend/Paginas/main-leituraManual.php"><i class="fa-solid fa-arrow-left"></i></a></div>

            <form action="../../Backend/Sistema/leituraManual.act.php" method="post" enctype="multipart/form-data" class="form-add grid-add-leituraManual">

                <p>
                    <label>Valor:</label>
                    <input type="number" placeholder="Digite o valor..." name="valor" required>
                </p>

                <p>
                    <label>Data da leitura</label>
                    <input type="date" name="dataLeitura" required>
                </p>

                <p>
                    <label>PH</label>
                    <input type="number" placeholder="Digite o PH..." name="ph" required>
                </p>

                <p>
                    <label>Nível oxigênio</label>
                    <input type="number" placeholder="Digite o oxigênio..." name="oxigenio" required>
                </p>

                <p>
                    <input type="submit" value="Cadastrar">
                </p>

            </form>
        </div>
    </div>

</body>

</html>