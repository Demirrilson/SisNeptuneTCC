<?php 
    include('head.php');
    require('../../Backend/Sistema/connect.php');

    $fornecedores = mysqli_query($con, "SELECT * FROM `fornecedor`");

    while ($fornecedor = mysqli_fetch_array($fornecedores)) {
        ?>

        <div class="info">

            <p>
                <?php $fornecedor_id = $fornecedor['Fornecedor_id']; ?>
            </p>

            <p>
                <?php echo $fornecedor['Nome']; ?> <a href="detalheFornecedor.php?Fornecedor_id=<?php echo $fornecedor['Fornecedor_id']; ?>"><i class="fa-solid fa-arrow-right" style="color: black;"></i></a>
            </p>

            <?php  
                $sql_produtos = mysqli_query($con, "SELECT nome FROM `produtos` WHERE fornecedor_id = $fornecedor_id");
                
                if (mysqli_num_rows($sql_produtos) > 0) {
                    while ($produto = mysqli_fetch_assoc($sql_produtos)) {
                        echo "<p>" . $produto['nome'] . "</p>";
                    }
                } else {
                    echo "<p>Nenhum produto encontrado para este fornecedor.</p>";
                }
            ?>

            

            </div>

            
        
        </div>

        

    <?php } ?>
