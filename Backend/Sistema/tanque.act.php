
<?php
@session_start();


extract($_POST);
var_dump($_POST);

require('connect.php');


$sql = "SELECT Piscicultura_id, Nome FROM piscicultura";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['capacidadeVolume']) && !empty($_POST['capacidadeVolume'])) {
        $capacidadeVolume = $_POST['capacidadeVolume'];

        
        $idPiscicultura = $_POST['idPiscicultura'];


        mysqli_query($con, "INSERT INTO `tanque` (`Tanque_id`, `Capacidade_volume`, `Piscicultura_id`) VALUES (NULL, '$capacidadeVolume', '$idPiscicultura')");

        header("Location: tanque.php");

    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>