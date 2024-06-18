<?php
$pageTitle = "Alterar Funcionario";
include('head.php');
include('menuBar.php');
require('../../Backend/Sistema/connect.php');


$codigo = $_GET['Teste_id'];

$busca = mysqli_query($con, "SELECT * FROM `teste_quimico` WHERE `Teste_id` = '$codigo'");

$teste = mysqli_fetch_array($busca);

?>

<div class="container">
    <div class="alterarFunc">

    <!-- <div class="btn-back"><a href="./detalhe-funcionario.php?Cadastro_id=<?php echo $codigo ?>"><i class="fa-solid fa-arrow-left"></i></a></div> -->
        
    <form action="../../Backend/Sistema/alterarTesteQuimico.act.php" method="post" enctype="multipart/form-data" class="formAlt">

            <input type="hidden" name="codigo" value="<?php echo $teste['Teste_id']; ?>">

                <p>
                    <label>Tipo do teste:</label>
                    <input type="text" name="tipoTeste" value="<?php echo $teste['Tipo_teste']; ?>">
                </p>

                <p>
                    <label>Horário</label>
                    <input type="text" name="horario" value="<?php echo $teste['Horario']; ?>">
                </p>

                <p>
                    <label>Data leitura:</label>
                    <input type="date" name="dataLeitura" value="<?php echo $teste['Data_leitura']; ?>">
                </p>
                
                <p>
                    <label>Resultado:</label>
                    <input type="text" name="resultado" value="<?php echo $teste['Resultado']; ?>">
                </p>

                <p>
                    <label>Tanque:</label>
                    <select name="idTanque">

                        <?php
                        $sql = "SELECT Tanque_id FROM tanque";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['Tanque_id']}'>{$row['Tanque_id']}</option>";
                        }
                        ?>
                    </select>
                </p>
          
                <input type="submit" value="Gravar" class="gravar">
            

        </form>

    </div>
</div>