<?php  
 include('head.php');
 include('menuBar.php');
 require('../../Backend/Sistema/connect.php');
?>

 <script src="../../Backend/jQuery/code.jquery.com_jquery-3.7.0.min.js"></script>


 <?php
 $cadastro_id = mysqli_real_escape_string($con, $_GET['Cadastro_id']);

 $query = "SELECT * FROM `cadastro` WHERE Cadastro_id = $cadastro_id";


 $result = mysqli_query($con, $query);


 if(mysqli_num_rows($result) > 0) {
    
    while ($funcionario = mysqli_fetch_array($result)) {
        ?>

        <div class="info">

            <div class="btn-back"><a href="./funcionario.php"><i class="fa-solid fa-arrow-left"></i></a></div>

            <div class="content-info">
                <p>
                    <label>Nome:</label>
                    <?php echo $funcionario['Nome']; ?>
                </p>

                <p>
                    <label>ID</label>
                    <?php echo $funcionario['Cadastro_id']; ?>
                </p>

                <p>
                    <label>Email:</label>
                    <?php echo $funcionario['Email']; ?>
                </p>

                <p>
                    <label>Telefone:</label>
                    <?php echo $funcionario['Telefone']; ?>
                </p>

                <p>
                <label>Cargo:</label>
                    <?php echo $funcionario['Cargo']; ?>
                </p>

                <p>
                <label>Endereço:</label>
                    <?php echo $funcionario['Endereco']; ?>
                </p>

                <p>
                <label>Data Contratação:</label>
                    <?php echo $funcionario['Data_contratacao']; ?>
                </p>

                <p>
                <label>Expediente:</label>
                    <?php echo $funcionario['Expediente']; ?>
                </p>
            </div>

            <div class="bts-card">
                <a href="alterar.php?Cadastro_id=<?php echo $funcionario['Cadastro_id']; ?>"> 
                    <i class="fa-regular fa-pen-to-square"></i>
                </a>

                <a href="javascript:excluirFuncionario(<?php echo $funcionario['Cadastro_id']; ?>)">
                    <i class="fa-solid fa-trash"></i>
                </a>

            </div>
            
        </div>  

    <?php 
    }

    } else{
        echo "Funcionario não encontrado";
    } 
    ?>

<script>
function excluirFuncionario(Cadastro_id) {
    var opcao = confirm("Deseja excluir o registro " + Cadastro_id + "?");
    
    if (opcao) {
        $.ajax({
            type: "GET",
            url: "excluirFuncionario.php",
            data: { Cadastro_id: Cadastro_id }, 
            success: function(response) {
                alert(response); 
                window.location.href = 'funcionario';
            },
            error: function(xhr, status, error) {
                alert("Erro ao excluir. Consulte o console para mais detalhes."); 
            }
        });
    }
}
</script>
