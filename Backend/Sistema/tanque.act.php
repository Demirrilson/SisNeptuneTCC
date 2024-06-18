
<?php
@session_start();

extract($_POST);
var_dump($_POST);

require('connect.php');


// $sql = "SELECT Piscicultura_id, Nome FROM piscicultura";

$query = "INSERT INTO `tanque` (`Tanque_id`, `Piscicultura_id`, `Nome`, `Tipo`, `Largura`, `Altura`, `Quantidade_peixe`, `Capacidade_volume`) VALUES (NULL, $idPiscicultura, '$nome', '$tipo', '$largura', '$altura', '$quantPeixe', '$capacidadeVolume')";


       if(mysqli_query($con, $query)){
            echo "deu certo";
            header("Location: ../../Frontend/Paginas/main-tanque.php");
       }
       else{
         echo "erro";
       }

      
?>