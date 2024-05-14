<?php

include('head.php');
require('../../Backend/Sistema/connect.php');

$codigo = $_GET['Fornecedor_id'];

$busca = mysqli_query($con, "SELECT * FROM `fornecedor` WHERE `Fornecedor_id` = '$codigo'");

$fornecedor = mysqli_fetch_array($busca);

?>

<div class="container">
            <form action="../../Backend/Sistema/alterarFornecedor.act.php" method="post" enctype="multipart/form-data">

                <input type="hidden" name="codigo" value="<?php echo $fornecedor['Fornecedor_id']; ?>">

                <label>Nome:</label>
                <input type="text" name="nome" value=" <?php echo $fornecedor['Nome']; ?>">

                <label>E-mail</label>
                <input type="text" name="email" value=" <?php echo $fornecedor['Email']; ?>">

                <label>Telefone</label>
                <input type="number"  placeholder="(xx) xxxxx-xxxx" pattern="[0-9]+$" name="telefone" value="<?php echo $fornecedor['Telefone']; ?>">  

                <label>CNPJ</label>
                <input type="text" name="cnpj" value="<?php echo $fornecedor['CNPJ_Fornecedor']; ?>">  


                <input type="submit" value="Cadastrar">
                
                
            </form>
        </div>