<?php
$pageTitle = "Adicionar produto ao Estoque";
include('head.php');
include('menuBar.php');
include('../../Backend/Sistema/connect.php');
?>

<html>

<body>


    <div class="caixa-add">
        
        <div class="add-content">

            <div class="btn-back"><a href="../../Frontend/Paginas/main-estoque.php"><i class="fa-solid fa-arrow-left"></i></a></div>


            <form action="../../Backend/Sistema/estoque.act.php" method="post" enctype="multipart/form-data" class="form-add grid-add-estoque">

                <p>
                    <?php

                    echo "<label>Procurar produtos</label>";

                    echo "<select name='idProduto'>";

                    $sql = "SELECT Produto_id, Nome FROM produtos";
                    $result = mysqli_query($con, $sql);


                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['Produto_id']}'>{$row['Nome']}</option>";
                    }
                    echo "</select>"
                    ?>
                </p>

                <p>
                    <label>Data validade:</label>
                    <input type="date" placeholder="Digite a data de validade..." name="dataValidade" required>
                </p>

                <p>
                    <label>Quantidade</label>
                    <input type="number" placeholder="Digite a quantidade..." name="quantidade" required>
                </p>

                <p>
                    <label>Data entrada:</label>
                    <input type="date" name="dataEntrada" required>
                </p>

                <p>
                    <label>Data Saída:</label>
                    <input type="date" name="dataSaida">
                </p>


                <p>
                    <?php
                    echo "<label>Fornecedores</label>";
                    echo "<select name='idFornecedor'>";

                    $sql = "SELECT Fornecedor_id, Nome FROM fornecedor";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['Fornecedor_id']}'>{$row['Nome']}</option>";
                    }
                    echo "</select>"
                    ?>
                </p>

                <p>
                    <input type="submit" value="Cadastrar">
                </p>

            </form>
        </div>
    </div>

</body>

</html>