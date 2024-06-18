<?php
$pageTitle = "Adicionar Tanque";
include('head.php');
include('menuBar.php');
include('../../Backend/Sistema/connect.php');
?>



<html>

<body>
    <div class="caixa-add">
        <div class="add-content">
            <div class="btn-back"><a href="./main-tanque.php"><i class="fa-solid fa-arrow-left"></i></a></div>
            <?php ?>

            <form action="../../Backend/Sistema/tanque.act.php" method="post" enctype="multipart/form-data" class="form-add grid-add-tanque">

                <p>
                    <label>Nome:</label>
                    <input type="text" placeholder="Digite o nome do Tanque..." name="nome" required>
                </p>

                <p>
                    <label>Tipo:</label>
                    <input type="text" placeholder="Digite o tipo do Tanque..." name="tipo" required>
                </p>

                <p>
                    <label>Largura:</label>
                    <input type="double" placeholder="Digite a largura do Tanque..." name="largura" required>
                </p>

                <p>
                    <label>Altura:</label>
                    <input type="double" placeholder="Digite a altura do Tanque..." name="altura" required>
                </p>

                <p>
                    <label>Quantidade Peixe:</label>
                    <input type="int" placeholder="Digite a altura do Tanque..." name="quantPeixe" required>
                </p>

                <p>
                    <label>Capacidade volume</label>
                    <input type="double" placeholder="Digite o volume do Tanque..." name="capacidadeVolume" required>
                </p>

                <p>
                    <label>Piscicultura</label>
                    <select name="idPiscicultura">
                        <?php
                        $sql = "SELECT Piscicultura_id, Nome FROM piscicultura";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['Piscicultura_id']}'>{$row['Nome']}</option>";
                        }
                        ?>
                    </select>
                </p>

                <p>
                    <input type="submit" value="Cadastrar">
                </p>

            </form>
        </div>
    </div>

</body>

</html>