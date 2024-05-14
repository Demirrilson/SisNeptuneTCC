<?php

if (!$con = @mysqli_connect('localhost', 'root', '', 'neptune')) {
    echo "Erro de conexão com o Banco de Dados";
}
mysqli_query($con, "SET NAMES utf8");