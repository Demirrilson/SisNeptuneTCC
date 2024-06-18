<?php
$pageTitle = "Fornecedor do produto";
include('head.php');
include('menuBar.php');
require('../../Backend/Sistema/connect.php');
?>

<script src="../../Backend/jQuery/code.jquery.com_jquery-3.7.0.min.js"></script>

<?php
$estoque_id = mysqli_real_escape_string($con, $_GET['Estoque_id']);

$query = "SELECT p.* , e. *
          FROM `produtos` p 
          INNER JOIN `estoque` e ON p.produto_id = e.Produto_id 
          WHERE e.Estoque_id = $estoque_id";
$result = mysqli_query($con, $query);
?>

<div class="caixa-detalhe">

    <div class="content-detalhe">

        <div class="btn-back"><a href="./main-estoque.php"><i class="fa-solid fa-arrow-left"></i></a></div>

        <?php
        if ($result === false) {
            echo "Erro na consulta SQL: " . mysqli_error($con);
        } else {
            if (mysqli_num_rows($result) > 0) {
                while ($estoque = mysqli_fetch_array($result)) {
                    $estoque_id = mysqli_real_escape_string($con, $_GET['Estoque_id']);
        ?>


                    <div class="info-detalhe grid-detalhe-estoque">
                        <p>
                            <?php echo $estoque['Nome']; ?>
                        </p>

                        <!-- <p>
                            <?php echo $estoque['Fornecedor_id']; ?>
                        </p> -->

                        <p>
                            <?php echo $estoque['Data_validade']; ?>
                        </p>

                        <p>
                            <?php echo $estoque['Quantidade']; ?>
                        </p>


                        <div class="bts-card-info-detalhe">
                            <a href="alterar-estoque.php?Estoque_id=<?php echo $estoque_id; ?>">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>

                            <a href="javascript:excluirEstoque(<?php echo $estoque_id; ?>)">
                                <i class="fa-solid fa-trash"></i>
                            </a>

                        </div>

                    </div>
        
</div>

<?php
                }
            } else {
                echo "Nenhum resultado encontrado para o ID do estoque fornecido.";
            }
        }
?>

</body>

</html>


<script>
    function excluirEstoque(Estoque_id) {
        var opcao = confirm("Deseja excluir o registro " + Estoque_id + "?");

        if (opcao) {
            $.ajax({
                type: "GET",
                url: "excluir-estoque.php",
                data: {
                    Estoque_id: Estoque_id
                },
                success: function(response) {
                    alert(response);
                    window.location.href = 'main-estoque';
                },
                error: function(xhr, status, error) {
                    alert("Erro ao excluir. Consulte o console para mais detalhes.");
                }
            });
        }
    }
</script>