<?php

include('head.php');
require('../../Backend/Sistema/connect.php');

$codigo = $_GET['Cadastro_id'];

$busca = mysqli_query($con, "SELECT * FROM `cadastro` WHERE `Cadastro_id` = '$codigo'");

$funcionario = mysqli_fetch_array($busca);

?>

<div class="container">
            <form action="../../Backend/Sistema/alterar.act.php" method="post" enctype="multipart/form-data">

                <input type="hidden" name="codigo" value="<?php echo $funcionario['Cadastro_id']; ?>">

                <label>Nome:</label>
                <input type="text" name="nome" value="<?php echo $funcionario['Nome'];?>">

                <label>E-mail</label>
                <input type="text" name="email" value="<?php echo $funcionario['Email'];?>">

                <label>Telefone</label>
                <input type="number" name="telefone" value="<?php echo $funcionario['Telefone'];?>">

                <label>Cargo</label>
                <input type="text" name="cargo" value="<?php echo $funcionario['Cargo'];?>">

                <label>Salário</label>
                <input type="number" name="salario" value="<?php echo $funcionario['Salario'];?>">

                <label>Endereço</label>
                <input type="text"  name="endereco" value="<?php echo $funcionario['Endereco'];?>">

                <label>Data Contratação</label>
                <input type="date" name="dataContratacao" value="<?php echo $funcionario['Data_contratacao'];?>">

                <label>Data demissão</label>
                <input type="date" name="dataDemissao" value="<?php echo $funcionario['Data_demissao'];?>">

                <label>Expediente</label>
                <input type="text" name="expediente" value="<?php echo $funcionario['Expediente'];?>">

                <input type="submit" value="Gravar">
                
            </form>
        </div>