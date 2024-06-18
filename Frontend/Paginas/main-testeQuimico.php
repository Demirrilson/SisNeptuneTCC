<?php
$pageTitle = "Testes Químicos";
include('head.php');
include('menuBar.php');
require('../../Backend/Sistema/connect.php');

$query = "SELECT * FROM `teste_quimico`";

$result = mysqli_query($con, $query);

?>

<body>


    <div class="caixaInfo">

        <div class="btn-cadastrar">
            <a href="add-testeQuimico.php"><i class="fa-solid fa-plus"></i></a>
        </div>
        <?php
        if (mysqli_num_rows($result) > 0) {

            while ($teste = mysqli_fetch_array($result)) {
        ?>



                <div class="info">

                    <div class="content-info">

                        <p>
                            <?php echo $teste['Tipo_teste']; ?>
                        </p>

                        <p>
                            <?php echo $teste['Resultado']; ?>
                        </p>

                        <p>
                            <?php echo $teste['Data_leitura']; ?>
                        </p>

                        <p>
                            <a href="detalhe-testeQuimico.php?Teste_id=<?php echo $teste['Teste_id']; ?>"><i class="fa-solid fa-arrow-right"></i></a>
                        </p>
                        
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>

</body>