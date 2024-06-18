<?php
$pageTitle = "Detalhe Fornecedor";
include('head.php');
include('menuBar.php');
require('../../Backend/Sistema/connect.php');
?>


<script src="../../Backend/jQuery/code.jquery.com_jquery-3.7.0.min.js"></script>

<?php

$fornecedor_id = $_GET['Fornecedor_id'];


$query = "SELECT * FROM `fornecedor` WHERE Fornecedor_id = $fornecedor_id";

$result = mysqli_query($con, $query);
?>

<div class="caixa-detalhe">

    <div class="content-detalhe">

        <div class="btn-back"><a href="./main-fornecedor.php"><i class="fa-solid fa-arrow-left"></i></a></div>

        <?php
        if (mysqli_num_rows($result) > 0) {

            while ($fornecedor = mysqli_fetch_array($result)) {
        ?>

                <div class="info-detalhe grid-detalhe-fornecedor">
                    <p>
                        <?php echo $fornecedor['Nome']; ?>
                    </p>

                    <p>
                        <?php echo $fornecedor['Email']; ?>
                    </p>

                    <p>
                        <?php echo $fornecedor['Telefone']; ?>
                    </p>

                    <div class="bts-card-info-detalhe">
                        <a href="alterar-fornecedor.php?Fornecedor_id=<?php echo $fornecedor['Fornecedor_id']; ?>">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>

                        <a href="javascript:excluirFornecedor(<?php echo $fornecedor['Fornecedor_id']; ?>)">
                            <i class="fa-solid fa-trash"></i>
                        </a>

                    </div>


            <?php }
        } ?>

                </div>
    </div>
    <script>
        function excluirFornecedor(Fornecedor_id) {
            var opcao = confirm("Deseja excluir o registro " + Fornecedor_id + "?");

            if (opcao) {
                $.ajax({
                    type: "GET",
                    url: "excluir-fornecedor.php",
                    data: {
                        Fornecedor_id: Fornecedor_id
                    },
                    success: function(response) {
                        alert(response);
                        window.location.href = 'main-fornecedor';
                    },
                    error: function(xhr, status, error) {
                        alert("Erro ao excluir. Consulte o console para mais detalhes.");
                    }
                });
            }
        }
    </script>