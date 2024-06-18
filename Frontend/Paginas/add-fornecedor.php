<?php
$pageTitle = "Adicionar Fornecedores";
include('head.php');
include('menuBar.php');
include('../../Backend/Sistema/connect.php');
?>

<html>

<body>

    <div class="caixa-add">

        <div class="add-content">

            <div class="btn-back"><a href="../../Frontend/Paginas/main-fornecedor.php"><i class="fa-solid fa-arrow-left"></i></a></div>


            <form action="../../Backend/Sistema/cadFornecedor.act.php" method="post" enctype="multipart/form-data" class="form-add grid-add-fornecedor">


                <p>
                    <label>Nome:</label>
                    <input type="text" placeholder="Digite o nome do Fornecedor..." name="nome" required>
                </p>

                <p>
                    <label>E-mail</label>
                    <input type="text" placeholder="Digite o E-mail..." name="email" required>
                </p>

                <p>
                    <label>Telefone</label>
                    <input type="number" required placeholder="(xx) xxxxx-xxxx" required="required" pattern="[0-9]+$" name="telefone">
                </p>

                <p>
                    <label>CNPJ</label>
                    <input type="text" placeholder="Digite o CNPJ..." name="cnpj" required>
                </p>

                <p>
                    <input type="submit" value="Cadastrar">
                </p>

            </form>
        </div>
    </div>

</body>

</html>