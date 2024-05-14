<?php 
include('head.php');

?>

<html>
    <body>
        <?php include ('../../Backend/Sistema/connect.php');?>

        <div class="container">
            <form action="../../Backend/Sistema/cadFornecedor.act.php" method="post" enctype="multipart/form-data">
                <label>Nome:</label>
                <input type="text" placeholder="Digite o nome do Fornecedor..." name="nome" required>

                <label>E-mail</label>
                <input type="text" placeholder="Digite o E-mail..." name="email" required>

                <label>Telefone</label>
                <input type="number" required placeholder="(xx) xxxxx-xxxx" required="required" pattern="[0-9]+$" name="telefone">

                <label>CNPJ</label>
                <input type="text" placeholder="Digite o CNPJ..." name="cnpj" required>


                <input type="submit" value="Cadastrar">
                
            </form>
        </div>

    </body>
</html>