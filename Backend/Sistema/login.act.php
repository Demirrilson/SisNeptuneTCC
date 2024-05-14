<?php
@session_start();

require('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['idFuncionario']) && isset($_POST['password'])) {
        $idFuncionario = $_POST['idFuncionario'];
        $inputPassword = md5($_POST['password']);

        $query = "SELECT * FROM cadastro WHERE Cadastro_id = '$idFuncionario' AND Senha = '$inputPassword'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) == 1) {    
            $_SESSION['idFuncionario'] = $idFuncionario;
            header("Location: ../../Frontend/Paginas/painelControle.php");
        } else {
            // Senha incorreta ou funcionário não encontrado
            echo "Senha incorreta ou funcionário não encontrado.";
        }

    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>
