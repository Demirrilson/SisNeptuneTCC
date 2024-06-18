<?php
$pageTitle = "Detalhe Tanque";
include('head.php');
include('menuBar.php');
require('../../Backend/Sistema/connect.php');
?>


<script src="../../Backend/jQuery/code.jquery.com_jquery-3.7.0.min.js"></script>

<?php

$tanque_id = $_GET['Tanque_id'];


$query = "SELECT * FROM `tanque` WHERE Tanque_id = $tanque_id";

$result = mysqli_query($con, $query);
?>

<div class="caixa-detalhe">

    <div class="content-detalhe">

        <div class="btn-back"><a href="./main-tanque.php"><i class="fa-solid fa-arrow-left"></i></a></div>

        <?php
        if (mysqli_num_rows($result) > 0) {

            while ($tanque = mysqli_fetch_array($result)) {
        ?>

                <div class="info-detalhe grid-detalhe-tanque">
                    <p>
                        <?php echo $tanque['Nome']; ?>
                    </p>

                    <p>
                        <?php echo $tanque['Tipo']; ?>
                    </p>

                    <p>
                        <?php echo $tanque['Largura']; ?>
                    </p>

                    
                    <p>
                        <?php echo $tanque['Altura']; ?>
                    </p>

                    
                    <p>
                        <?php echo $tanque['Quantidade_peixe']; ?>
                    </p>

            <?php }
        } 


$temperatura = "SELECT * FROM `leitura_sensor` WHERE `Tipo_sensor_id` = 1 AND `Tanque_id` = $tanque_id ORDER BY `Data_leitura` DESC LIMIT 1";


$result = mysqli_query($con, $temperatura);

        if(mysqli_num_rows($result) > 0){
            while($leituraSensor = mysqli_fetch_array($result)){
                ?>
                <p>
                    Temperatura
                    <?php echo $leituraSensor['Valor']?>
                </p>


                <?php
            }
        }

?>

<?php
$turbidez = "SELECT * FROM `leitura_sensor` WHERE `Tipo_sensor_id` = 2 AND `Tanque_id` = $tanque_id ORDER BY `Data_leitura` DESC LIMIT 1";


$result = mysqli_query($con, $turbidez);

        if(mysqli_num_rows($result) > 0){
            while($leituraSensor = mysqli_fetch_array($result)){
                ?>
                <p>
                    Turbidez
                    <?php echo $leituraSensor['Valor']?>
                </p>


                <?php
            }
        }

?>

<?php
$evaporacao = "SELECT * FROM `leitura_sensor` WHERE `Tipo_sensor_id` = 3 AND `Tanque_id` = $tanque_id ORDER BY `Data_leitura` DESC LIMIT 1";


$result = mysqli_query($con, $evaporacao);

        if(mysqli_num_rows($result) > 0){
            while($leituraSensor = mysqli_fetch_array($result)){
                ?>
                <p>
                    Evaporacao
                    <?php echo $leituraSensor['Valor']?>
                </p>


                <?php
            }
        }

?>
        </div>
    </div>

    
    <!-- <script>
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
                        window.location.href = 'fornecedor';
                    },
                    error: function(xhr, status, error) {
                        alert("Erro ao excluir. Consulte o console para mais detalhes.");
                    }
                });
            }
        }
    </script> -->