<?php
$pageTitle = "Alterar Estoque";
include('head.php');
include('menuBar.php');
require('../../Backend/Sistema/connect.php');

$estoque_id = $_GET['Estoque_id'];


$busca = mysqli_query($con, "SELECT * FROM `estoque` WHERE `Estoque_id` = '$estoque_id'");

$estoque = mysqli_fetch_array($busca);

?>

<div class="container">
    <div class="alterarFunc">

        <div class="btn-back"><a href="./detalhe-estoque.php?Estoque_id=<?php echo $estoque_id ?>"><i class="fa-solid fa-arrow-left"></i></a></div>

        <form action="../../Backend/Sistema/alterarEstoque.act.php" method="post" enctype="multipart/form-data" class="grid-alt-estoque">

            <input type="hidden" name="codigo" value="<?php echo $estoque['Estoque_id']; ?>">

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
                <input type="date" name="dataValidade" value="<?php echo $estoque['Data_validade'] ?>">
            </p>

            <p>
                <label>Quantidade</label>
                <input type="number" name="quantidade" value="<?php echo $estoque['Quantidade'] ?>">
            </p>

            <p>
                <label>Data entrada:</label>
                <input type="date" name="dataEntrada" value="<?php echo $estoque['Data_entrada'] ?>">
            </p>

            <p>
                <label>Data Saída:</label>
                <input type="date" name="dataSaida" value="<?php echo $estoque['Data_saida'] ?>">
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