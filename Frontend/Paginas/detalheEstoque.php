<?php
    include('head.php');
    require('connect.php');

    $estoques = mysqli_query($con, "SELECT * FROM `estoque`");

    $sql = "SELECT estoque.*, produtos.Nome AS Nome
        FROM estoque
        INNER JOIN produtos ON estoque.Produto_id = produtos.Produto_id";

$result = $con->query($sql);



while ($estoque = mysqli_fetch_array($estoques)) {


if ($result !== false) {
    while($row = $result->fetch_assoc()) {
        ?>
        <p>
            <?php echo "Nome do Produto: " . $row["Nome"]; ?> <a href="consultFornecedor.php?Estoque_id=<?php echo $estoque['Estoque_id']; ?>"><i class="fa-solid fa-arrow-right" style="color: black;"></i></a>
        </p>
    
    <?php
    }
} else {
    echo "Erro na consulta SQL: " . $con->error;
}
 ?> 
    <p>
        <?php echo "Data validade: " . $estoque['Data_validade']; ?> 
    </p>
<?php
}
?>

<?php
    $sql = "SELECT estoque.*, fornecedor.Nome AS Nome
    FROM estoque
    INNER JOIN fornecedor ON estoque.Fornecedor_id = fornecedor.Fornecedor_id";

$result = $con->query($sql);

if ($result !== false) {
   while($row = $result->fetch_assoc()) {
       echo "Nome do Fornecedor: " . $row["Nome"]. "<br>" ; 
   }
} else {
   echo "Erro na consulta SQL: " . $con->error;
}


?>

<button><a href="produto.php">Cadastrar</a></button>