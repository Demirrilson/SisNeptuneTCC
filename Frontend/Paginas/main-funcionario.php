<?php
$pageTitle = "Funcionários";
include('head.php');
include('menuBar.php');
require('../../Backend/Sistema/connect.php');
?>

<body>


    <div class="caixaInfo">

        <div class="btn-cadastrar">
            <a href="add-funcionario.php"><i class="fa-solid fa-plus"></i></a>
        </div>


        <?php

        $funcionarios = mysqli_query($con, "SELECT * FROM `cadastro`");

        while ($funcionario = mysqli_fetch_array($funcionarios)) {
        ?>



            <div class="info">

                <div class="content-info">

                    <p>
                        <label>Nome:</label>
                        <?php echo $funcionario['Nome']; ?>
                    </p>

                    <p>
                        <label>Expediente</label>
                        <?php echo $funcionario['Expediente']; ?>
                    </p>

                    <p>
                        <label>Cargo:</label>
                        <?php echo $funcionario['Cargo']; ?>
                    </p>

                    <p>
                        <a href="detalhe-funcionario.php?Cadastro_id=<?php echo $funcionario['Cadastro_id']; ?>"><i class="fa-solid fa-arrow-right"></i></a>
                    </p>

                </div>
            </div>
        <?php } ?>
    </div>

</body>