<?php
$pageTitle = "Login Neptune";
include('head.php');
?>

<html>

<body>
    <?php require('../../Backend/Sistema/connect.php'); ?>


    <div class="caixa">
        <div class="containerLogin">

            <form action="../../Backend/Sistema/login.act.php" method="post" enctype="multipart/form-data" class="formLogin">


                <div class="titleLogin">
                    <h1>LOGIN</h1>
                </div>

                <div class="contentLogin">
                    <div>
                        <label>Funcionário</label>

                        <select name="idFuncionario">
                            <?php
                            $sql = "SELECT Cadastro_id, Nome FROM cadastro";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='{$row['Cadastro_id']}'>{$row['Nome']}</option>";
                            }

                            ?></select>
                    </div>

                    <div>
                        <label>Password</label>
                        <input type="password" name="password" required placeholder="Digite sua senha">
                    </div>

                </div>

                <div class="buttonSubmit">
                    <input type="submit" value="Entrar">
                </div>

            </form>




            <div class="logoNeptune">

            <img src="../../Frontend/css/images/logoNeptune1.png" alt="">

                <h1>BEM-VINDO AO NEPTUNE</h1>
                <h2>O SISTEMA NÚMERO 1 NA GESTÃO DA SUA PISCICULTURA</h2>

            </div>


        </div>
    </div>
</body>

</html>