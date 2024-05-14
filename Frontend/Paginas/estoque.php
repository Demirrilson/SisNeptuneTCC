<?php 
include('head.php');

?>

<html>
    <body>
        <?php include ('../../Backend/Sistema/connect.php');?>

        <div class="container">
            <form action="../../Backend/Sistema/estoque.act.php" method="post" enctype="multipart/form-data">

            
            
                 <?php

                echo"<label>Procurar produtos</label>";

                echo "<select name='idProduto'>";

                $sql = "SELECT Produto_id, Nome FROM produtos";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['Produto_id']}'>{$row['Nome']}</option>";
                }
                ?>

                </select>
                 

                 <label>Data validade:</label>
                <input type="date" placeholder="Digite a data de validade..." name="dataValidade" required>

                <label>Quantidade</label>
                <input type="number" placeholder="Digite a quantidade..." name="quantidade" required>

                <label>Data entrada:</label>
                <input type="date" name="dataEntrada" required>


                <label>Data Saída:</label>
                <input type="date" name="dataSaida">


                
                
                <?php
               echo "<label>Fornecedores</label>";
                echo"<select name='idFornecedor'>";

                $sql = "SELECT Fornecedor_id, Nome FROM fornecedor";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['Fornecedor_id']}'>{$row['Nome']}</option>";
                }
                ?>

            



                <input type="submit" value="Cadastrar">
                
            </form>
        </div>

    </body>
</html>