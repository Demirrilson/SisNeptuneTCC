<?php
$pageTitle = "Detalhe do Estoque";
include('head.php');
include('menuBar.php');
require('../../Backend/Sistema/connect.php');

$sql = "SELECT estoque.*, produtos.Nome AS Nome, fornecedor.Nome AS FornecedorNome
        FROM estoque
        INNER JOIN produtos ON estoque.Produto_id = produtos.Produto_id
        INNER JOIN fornecedor ON estoque.Fornecedor_id = fornecedor.Fornecedor_id";

$result = $con->query($sql);
?>

<body>

    <div class="caixaInfo">

        <div class="btn-cadastrar">
            <a href="add-estoque.php"><i class="fa-solid fa-plus"></i></a>
        </div>

        <?php
        if ($result !== false) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <div class="info">
                    <div class="content-info">
                        <p>
                            <label>Nome do Produto:</label>
                            <?php echo $row["Nome"]; ?>
                        </p>

                        <p>
                            <label>Data de Validade:</label>
                            <?php echo $row['Data_validade']; ?>
                        </p>

                        <p>
                            <label>Nome do Fornecedor:</label>
                            <?php echo $row["FornecedorNome"]; ?>
                        </p>

                        <p>
                            <a href="detalhe-estoque.php?Estoque_id=<?php echo $row['Estoque_id']; ?>"><i class="fa-solid fa-arrow-right"></i></a>
                        </p>

                    </div>
                </div>
        <?php
            }
        } else {
            echo "Nenhum resultado encontrado.";
        }
        ?>
    </div>

</body>