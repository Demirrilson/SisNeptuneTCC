<?php

require('connect.php');


$sql = "SELECT Tipo_sensor_id FROM sensor";

echo"<select name='idSensor'>";
$sql1 = "SELECT Tipo_sensor_id FROM tipo_sensor";
$result = mysqli_query($con, $sql1);
while ($row = mysqli_fetch_assoc($result)) {

        mysqli_query($con, "INSERT INTO `sensor` 
        (`Sensor_id`, `Tipo_sensor_id`) VALUES (NULL, '$idSensor');");

        // header("Location: ../../Frontend/Paginas/tanque.php");

}
?>

