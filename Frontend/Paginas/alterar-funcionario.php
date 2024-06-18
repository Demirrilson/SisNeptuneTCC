<?php
$pageTitle = "Alterar Funcionario";
include('head.php');
include('menuBar.php');
require('../../Backend/Sistema/connect.php');


$codigo = $_GET['Cadastro_id'];

$busca = mysqli_query($con, "SELECT * FROM `cadastro` WHERE `Cadastro_id` = '$codigo'");

$funcionario = mysqli_fetch_array($busca);

?>

<div class="container">
    <div class="alterarFunc">

    <div class="btn-back"><a href="./detalhe-funcionario.php?Cadastro_id=<?php echo $codigo ?>"><i class="fa-solid fa-arrow-left"></i></a></div>
        
    <form action="../../Backend/Sistema/alterarFuncionario.act.php" method="post" enctype="multipart/form-data" class="formAlt">

            <input type="hidden" name="codigo" value="<?php echo $funcionario['Cadastro_id']; ?>">

            <p>
                <label>Nome:</label>
                <input type="text" name="nome" value="<?php echo $funcionario['Nome']; ?>">
            </p>

            <p>
                <label>E-mail</label>
                <input type="text" name="email" value="<?php echo $funcionario['Email']; ?>">
            </p>

            <p>
                <label>Telefone</label>
                <input type="text" name="telefone" value="<?php echo $funcionario['Telefone']; ?>">
            </p>

            <p>
                <label>Cargo</label>
                <input type="text" name="cargo" value="<?php echo $funcionario['Cargo']; ?>">
            </p>

            <p>
                <label>Salário</label>
                <input type="text" name="salario" value="<?php echo $funcionario['Salario']; ?>">
            </p>

            <p>
                <label>CEP</label>
                <input type="text" name="cep" value="<?php echo $funcionario['CEP']; ?>">
            </p>

            <p>
                <label>Rua</label>
                <input type="text" name="rua" value="<?php echo $funcionario['Rua']; ?>">
            </p>

            <p>
                <label>Bairro</label>
                <input type="text" name="bairro" value="<?php echo $funcionario['Bairro']; ?>">
            </p>

            <p>
                <label>Número</label>
                <input type="text" name="numero" value="<?php echo $funcionario['Numero']; ?>">
            </p>

            <p>
                <label>Complemento</label>
                <input type="text" name="complemento" value="<?php echo $funcionario['Complemento']; ?>">
            </p>

            <p>
                <label>Data Contratação</label>
                <input type="date" name="dataContratacao" value="<?php echo $funcionario['Data_contratacao']; ?>">
            </p>

            <p>
                <label>Data demissão</label>
                <input type="date" name="dataDemissao" value="<?php echo $funcionario['Data_demissao']; ?>">
            </p>

            <p>
                <label>Expediente</label>
                <input type="text" name="expediente" value="<?php echo $funcionario['Expediente']; ?>">
            </p>
            
          
                <input type="submit" value="Gravar" class="gravar">
            

        </form>

    </div>
</div>