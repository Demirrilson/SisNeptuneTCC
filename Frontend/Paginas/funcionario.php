<?php
include('menuBar.php');
?>

<div class="caixaInfo">

<?php 
    include('head.php');

    require('../../Backend/Sistema/connect.php');

    $funcionarios = mysqli_query($con, "SELECT * FROM `cadastro`");

    
    while ($funcionario = mysqli_fetch_array($funcionarios)) {
        ?>

        <div class="infoFunc">

        <div class="contentFunc">
            <p>
                <?php echo $funcionario['Nome']; ?>  
            </p>

            <p>
                <?php echo $funcionario['Expediente']; ?>
            </p>

            <p>
                <?php echo $funcionario['Cargo']; ?>
            </p>

        
    </div>  

    <p>
        <a href="detalheFuncionario.php?Cadastro_id=<?php echo $funcionario['Cadastro_id']; ?>"><i class="fa-solid fa-arrow-right"></i></a>
    </p>
    </div> 
            
    <?php } ?>

    <div class="btn-cadastrar">
        <a href="cadFuncionario.php"><button>Cadastrar</button></a>
    </div>