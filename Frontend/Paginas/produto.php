<?php 
    include('head.php');
    require('../../Backend/Sistema/connect.php');

?>

<html>
    <body>


        <div class="container">
            <form action="../../Backend/Sistema/produto.act.php" method="post" enctype="multipart/form-data">
                <label>Nome:</label>
                <input type="text" placeholder="Digite o nome do produto..." name="nome" required>

                <label>Preço</label>
                <input type="number" placeholder="Digite o valor..." name="preco" required>

                <label>Data validade</label>
                <input type="date" placeholder="Digite a validade..." name="dataValidade" required>

                <label>Tipo:</label>
                <input type="text" placeholder="Digite o tipo do produto" name="tipo" required>


                <?php
               echo "<label>Fornecedores</label>";
                echo"<select name='Fornecedor_id'>";

                $sql = "SELECT Nome, Fornecedor_id FROM fornecedor";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['Fornecedor_id']}'>{$row['Nome']}</option>";
                }
                ?>


                <input type="submit" value="Cadastrar">
  
            </form>
        </div>

    </body>
</html>