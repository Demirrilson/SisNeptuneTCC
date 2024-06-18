<?php
$pageTitle = "Detalhe testes Químicos";
include('head.php');
include('menuBar.php');
require('../../Backend/Sistema/connect.php');
?>
<script src="../../Backend/jQuery/code.jquery.com_jquery-3.7.0.min.js"></script>

<?php

$teste_id = mysqli_real_escape_string($con, $_GET['Teste_id']);

$query = "SELECT * FROM `teste_quimico` WHERE Teste_id = $teste_id";



$result = mysqli_query($con, $query);
?>
<div class="caixa-detalhe">

    <div class="content-detalhe">

        <div class="btn-back"><a href="./main-testeQuimico.php"><i class="fa-solid fa-arrow-left"></i></a></div>

        <?php
        if (mysqli_num_rows($result) > 0) {

            while ($teste = mysqli_fetch_array($result)) {
        ?>

                <div class="info-detalhe grid-detalhe-testeQuimico">

                    <p>
                        <?php echo $teste['Tipo_teste']; ?>
                    </p>

                    <p>
                        <?php echo $teste['Tanque_id']; ?>
                    </p>

                    <p>
                        <?php echo $teste['Horario']; ?>
                    </p>

                    <p>
                        <?php echo $teste['Data_leitura']; ?>
                    </p>

                    <p>
                        <?php echo $teste['Resultado']; ?>
                    </p>

                    <div class="bts-card-info-detalhe">
                        <a href="alterar-testeQuimico.php?Teste_id=<?php echo $teste['Teste_id']; ?>">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>

                        <a href="javascript:excluirTesteQuimico(<?php echo $teste['Teste_id']; ?>)">
                            <i class="fa-solid fa-trash"></i>
                        </a>

                    </div>
        <?php
            }
        } ?>
        </div>
    </div>
</div>

<script>
    function excluirTesteQuimico(Teste_id) {
        var opcao = confirm("Deseja excluir o registro " + Teste_id + "?");

        if (opcao) {
            $.ajax({
                type: "GET",
                url: "excluir-testeQuimico.php",
                data: {
                    Teste_id: Teste_id
                },
                success: function(response) {
                    alert(response);
                    window.location.href = 'main-testeQuimico';
                },
                error: function(xhr, status, error) {
                    alert("Erro ao excluir. Consulte o console para mais detalhes.");
                }
            });
        }
    }
</script>