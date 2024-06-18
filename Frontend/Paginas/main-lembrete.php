<?php
$pageTitle = "Lembretes";
include('head.php');
include('menuBar.php');
require('../../Backend/Sistema/connect.php');
?>

<body>


    <?php
    $query = "SELECT * FROM `alerta`";

    $result = mysqli_query($con, $query);

    $dataAtual = date("d-m-Y");
    ?>

    <div class="caixaInfo-lembrete">

        <div class="bts-lembrete">

            <!-- <div class="data-hoje">
            <?php echo $dataAtual ?> <i class="fa-regular fa-calendar"></i>
        </div> -->

            <!-- <div class="btn-cadastrar">
                <a href="add-lembrete.php"><i class="fa-solid fa-plus"></i></a>
            </div> -->

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                <input type="date" id="dataConsulta" name="dataConsulta" value="<?php echo date('Y-m-d'); ?>">
                <button type="submit">Consultar</button>
            </form>

        </div>

        <?php
        if (isset($_GET['dataConsulta'])) {
            $dataConsulta = mysqli_real_escape_string($con, $_GET['dataConsulta']);

            $dataConsultaFormatada = date('Y-m-d', strtotime($dataConsulta));

            $query = "SELECT * FROM `alerta` WHERE Data_alerta = '$dataConsultaFormatada'";
        } else {
            $dataAtual = date('Y-m-d');
            $query = "SELECT * FROM `alerta` WHERE Data_alerta = '$dataAtual' ";
        }

        $result = mysqli_query($con, $query);
        ?>



        <div class="lista-labels">
            <label></label>
            <label>Tarefa</label>
            <label>Data</label>
            <label>Produto</label>
            <label>Quantidade</label>
            <label>Tanque</label>
        </div>
        <?php



        if (mysqli_num_rows($result) > 0) {

            while ($alertas = mysqli_fetch_array($result)) {

        ?>

                <div class="info-lembrete">
                    <div class="content-info-lembrete">

                        <p class="checkbox-wrapper-13">
                            <input id="c1-13" type="checkbox">
                        </p>


                        <p>
                            <?php echo $alertas['Tipo']; ?>
                        </p>

                        <p>
                            <?php echo $alertas['Quantidade']; ?>
                        </p>

                        <p>
                            <?php echo date('d/m/Y', strtotime($alertas['Data_alerta'])); ?>
                        </p>

                        <p>
                            <?php echo $alertas['Tanque']; ?>
                        </p>

                        <p>
                            <?php echo $alertas['Produto']; ?>
                        </p>

                    </div>
                </div>
        <?php
            }
        }

        ?>
    </div>

</body>