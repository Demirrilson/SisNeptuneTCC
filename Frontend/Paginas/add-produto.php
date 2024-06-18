<?php
$pageTitle = "Adicionar Produtos";
include('head.php');
include('menuBar.php');
require('../../Backend/Sistema/connect.php');
?>

<html>

<body>


    <div class="caixa-add">

        <div class="add-content">

        <div class="btn-back"><a href="../../Frontend/Paginas/main-estoque.php"><i class="fa-solid fa-arrow-left"></i></a></div>

            <form action="../../Backend/Sistema/produto.act.php" method="post" enctype="multipart/form-data" class="form-add grid-add-produto">


                <p>
                    <label>Nome:</label>
                    <input type="text" placeholder="Digite o nome do produto..." name="nome" required>
                </p>

                <p>
                    <label>Preço</label>
                    <input type="number" placeholder="Digite o valor..." name="preco" required>
                </p>

                <p>
                    <label>Data validade</label>
                    <input type="date" placeholder="Digite a validade..." name="dataValidade" required>
                </p>

                <p>
                    <label>Tipo:</label>
                    <input type="text" placeholder="Digite o tipo do produto" name="tipo" required>
                </p>
                
                <p>
                    <?php
                    echo "<label>Fornecedores</label>";
                    echo "<select name='Fornecedor_id'>";

                    $sql = "SELECT Nome, Fornecedor_id FROM fornecedor";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['Fornecedor_id']}'>{$row['Nome']}</option>";    
                    }
                    echo "</select>";
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