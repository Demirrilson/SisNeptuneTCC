<?php
$pageTitle = "Fornecedores";
include('head.php');
include('menuBar.php');
require('../../Backend/Sistema/connect.php');
?>

<body>


    <div class="caixaInfo">

        <div class="btn-cadastrar">
            <a href="add-fornecedor.php"><i class="fa-solid fa-plus"></i></a>
        </div>

        <?php

        $fornecedores = mysqli_query($con, "SELECT * FROM `fornecedor`");

        while ($fornecedor = mysqli_fetch_array($fornecedores)) {
        ?>

            <div class="info">

                <div class="content-info">

                    <p>
                        <?php $fornecedor_id = $fornecedor['Fornecedor_id']; ?>
                    </p>

                    <p>
                        <?php echo $fornecedor['Nome']; ?>
                    </p>

                    <?php
                    $sql_produtos = mysqli_query($con, "SELECT nome FROM `produtos` WHERE fornecedor_id = $fornecedor_id");

                    if (mysqli_num_rows($sql_produtos) > 0) {
                        while ($produto = mysqli_fetch_assoc($sql_produtos)) {
                            echo "<p>" . $produto['nome'] . "</p>";
                        }
                    } else {
                        echo "<p>Nenhum produto encontrado para este fornecedor.</p>";
                    }
                    ?>

                    <p><a href="detalhe-fornecedor.php?Fornecedor_id=<?php echo $fornecedor['Fornecedor_id']; ?>">
                        <i class="fa-solid fa-arrow-right"></i></a></p>
                </div>

            </div>
        <?php } ?>
    </div>


</body>