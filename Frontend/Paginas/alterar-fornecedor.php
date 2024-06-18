<?php
$pageTitle = "Alterar Fornecedores";
include('head.php');
include('menuBar.php');
require('../../Backend/Sistema/connect.php');

$fornecedor_id = $_GET['Fornecedor_id'];


$busca = mysqli_query($con, "SELECT * FROM `fornecedor` WHERE `Fornecedor_id` = '$fornecedor_id'");

$fornecedor = mysqli_fetch_array($busca);

?>

<div class="container">
    <div class="alterarFunc">

    <div class="btn-back"><a href="./detalhe-fornecedor.php?Fornecedor_id=<?php echo $fornecedor_id ?>"><i class="fa-solid fa-arrow-left"></i></a></div>

        <form action="../../Backend/Sistema/alterarFornecedor.act.php" method="post" enctype="multipart/form-data" class="grid-alt-fornecedor">

            <input type="hidden" name="codigo" value="<?php echo $fornecedor['Fornecedor_id']; ?>">
            <p>
                <label>Nome:</label>
                <input type="text" name="nome" value=" <?php echo $fornecedor['Nome']; ?>">
            </p>

            <p>
                <label>E-mail</label>
                <input type="text" name="email" value=" <?php echo $fornecedor['Email']; ?>">
            </p>

            <p>
                <label>Telefone</label>
                <input type="number" placeholder="(xx) xxxxx-xxxx" pattern="[0-9]+$" name="telefone" value="<?php echo $fornecedor['Telefone']; ?>">
            </p>

            <p>
                <label>CNPJ</label>
                <input type="text" name="cnpj" value="<?php echo $fornecedor['CNPJ_Fornecedor']; ?>">
            </p>

            <p>
                <input type="submit" value="Cadastrar">
            </p>

        </form>
    </div>
</div>