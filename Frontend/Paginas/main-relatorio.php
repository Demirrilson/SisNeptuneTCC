<?php
$pageTitle = "Relatórios";
include('head.php');
include('menuBar.php');
require('../../Backend/Sistema/connect.php');

?>

<body>

    <div class="caixaInfo">

        <div class="btn-cadastrar">
            <a href="add-relatorio.php"><i class="fa-solid fa-plus"></i></a>
        </div>

        <?php
        if ($result !== false) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <div class="info">
                    <div class="content-info">
                        <p>
                            <label>?</label>

                        </p>

                        <p>
                            <label>?</label>

                        </p>

                        <p>
                            <label>?<label>

                        </p>

                        <p>
                            <a href="detalhe-qualificacaoPeixe.php?Tanque_id=<?php echo $row['Tanque_id']; ?>"><i class="fa-solid fa-arrow-right"></i></a>
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