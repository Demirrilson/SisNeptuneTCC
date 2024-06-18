<?php
$pageTitle = "Detalhe Funcionário";
include('head.php');
include('menuBar.php');
require('../../Backend/Sistema/connect.php');
?>

<script src="../../Backend/jQuery/code.jquery.com_jquery-3.7.0.min.js"></script>


<?php
$cadastro_id = mysqli_real_escape_string($con, $_GET['Cadastro_id']);

$query = "SELECT * FROM `cadastro` WHERE Cadastro_id = $cadastro_id";

$result = mysqli_query($con, $query);
?>

<div class="caixa-detalhe">

    <div class="content-detalhe">

        <div class="btn-back"><a href="./main-funcionario.php"><i class="fa-solid fa-arrow-left"></i></a></div>

        <?php
        if (mysqli_num_rows($result) > 0) {

            while ($funcionario = mysqli_fetch_array($result)) {
        ?>

                <div class="info-detalhe grid-detalhe-funcionario">


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
                        <label>CEP:</label>
                        <?php echo $funcionario['CEP']; ?>
                    </p>

                    <p>
                        <label>Rua:</label>
                        <?php echo $funcionario['Rua']; ?>
                    </p>

                    <p>
                        <label>Bairro:</label>
                        <?php echo $funcionario['Bairro']; ?>
                    </p>

                    <p>
                        <label>Número:</label>
                        <?php echo $funcionario['Numero']; ?>
                    </p>

                    <p>
                        <label>Complemento:</label>
                        <?php echo $funcionario['Complemento']; ?>
                    </p>

                    <p>
                        <label>Data contratação:</label>
                        <?php echo $funcionario['Data_contratacao']; ?>
                    </p>

                    <p>
                        <label>Expediente:</label>
                        <?php echo $funcionario['Expediente']; ?>
                    </p>


                    <div class="bts-card-info-detalhe">
                        <a href="alterar-funcionario.php?Cadastro_id=<?php echo $funcionario['Cadastro_id']; ?>">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>

                        <a href="javascript:excluirFuncionario(<?php echo $funcionario['Cadastro_id']; ?>)">
                            <i class="fa-solid fa-trash"></i>
                        </a>

                    </div>

                </div>
    </div>
</div>

<?php
            }
        } else {
            echo "Funcionario não encontrado";
        }
?>

</body>

</html>





<script>
    function excluirFuncionario(Cadastro_id) {
        var opcao = confirm("Deseja excluir o registro " + Cadastro_id + "?");

        if (opcao) {
            $.ajax({
                type: "GET",
                url: "excluir-funcionario.php",
                data: {
                    Cadastro_id: Cadastro_id
                },
                success: function(response) {
                    alert(response);
                    window.location.href = 'main-funcionario';
                },
                error: function(xhr, status, error) {
                    alert("Erro ao excluir. Consulte o console para mais detalhes.");
                }
            });
        }
    }
</script>