<?php  
 include('head.php');
 require('connect.php');
?>

<script src="jQuery/code.jquery.com_jquery-3.7.0.min.js"></script>

<?php
 $fornecedor_id = mysqli_real_escape_string($con, $_GET['Fornecedor_id']);

 $query = "SELECT * FROM `fornecedor` WHERE Fornecedor_id = $fornecedor_id";

 $result = mysqli_query($con, $query);

 if(mysqli_num_rows($result) > 0){

    while ($fornecedor = mysqli_fetch_array($result)) {
        ?>

        <div class="info">
        <p>
            <?php echo $fornecedor['Nome']; ?>
        </p>
        
        <p>
            <?php echo $fornecedor['Email']; ?>
        </p>

        <p>
            <?php echo $fornecedor['Telefone']; ?>
        </p>

        <div class="bts-card">
    <a href="alterarFornecedor.php?Fornecedor_id=<?php echo $fornecedor['Fornecedor_id']; ?>"> 
        <i class="fa-regular fa-pen-to-square" style="color: black;"></i>
    </a>

    <a href="javascript:excluirFornecedor(<?php echo $fornecedor['Fornecedor_id']; ?>)">
        <i class="fa-solid fa-trash" style="color: black;"></i>
    </a>

    </div>


    <?php }
    } ?>

