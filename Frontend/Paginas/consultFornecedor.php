<?php  
 include('head.php');
 require('connect.php');


 $estoque_id = mysqli_real_escape_string($con, $_GET['Estoque_id']);

 $query = "SELECT p.* , e. *
          FROM `produtos` p 
          INNER JOIN `estoque` e ON p.produto_id = e.Produto_id 
          WHERE e.Estoque_id = $estoque_id";



$result = mysqli_query($con, $query);

if($result === false) {
    echo "Erro na consulta SQL: " . mysqli_error($con);
} else {
    if(mysqli_num_rows($result) > 0){
        while ($estoque = mysqli_fetch_array($result)) {
            ?>
            <div class="info">
            <p>
                <?php echo $estoque['Nome']; ?>
            </p>
            
            <p>
                <?php echo $estoque['Fornecedor_id']; ?>
            </p>
    
            <p>
                <?php echo $estoque['Data_validade']; ?>
            </p>

            <p>
                <?php echo $estoque['Quantidade']; ?>
            </p>

            <?php
        }
    } else {
        echo "Nenhum resultado encontrado para o ID do estoque fornecido.";
    }
}
?>