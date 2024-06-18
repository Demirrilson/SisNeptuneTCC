<?php
$pageTitle = "Tanques";
include('head.php');
include('menuBar.php');
require('../../Backend/Sistema/connect.php');

?>



<body>
        <div class="container-tanque">

                <div class="btn-cadastrar">
                        <a href="add-tanque.php"><i class="fa-solid fa-plus"></i></a>
                </div>


                <div class="container-content">
                        <?php
                        $info = mysqli_query($con, "SELECT * FROM `tanque`");

                        while ($infos = mysqli_fetch_array($info)) {
                        ?>

                                <div class="tanque">
                                        <div class="circulo1">

                                                <p>
                                                        <?php echo $infos['Nome']; ?>
                                                </p>

                                        </div>

                                        <div class="retangulo">

                                                <p>
                                                        <label>Tipo: </label>
                                                        <?php echo $infos['Tipo']; ?>
                                                </p>
                                                        <label></label>
                                                <p>
                                                        <label>Largura: </label>
                                                        <?php echo $infos['Largura']; ?>
                                                </p>
                                                <label></label>
                                                <p>
                                                        <label>Altura: </label>
                                                        <?php echo $infos['Altura']; ?>
                                                </p>
                                                <label></label>
                                                <p>
                                                        <label>Quantidade de Peixes: </label>
                                                        <?php echo $infos['Quantidade_peixe']; ?>
                                                </p>

                                        </div>

                                        <div class="circulo2">
                                                <p>
                                                        <a href="detalhe-tanque.php?Tanque_id=<?php echo $infos['Tanque_id']; ?>"><i class="fa-solid fa-circle-info"></i></a>
                                                </p>
                                        </div>
                                </div>
                        <?php
                        }
                        ?>
                </div>

        </div>




</body>