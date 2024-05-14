<?php 
include('head.php');

?>

<html>
    <body>
        <?php include ('connect.php');?>

        <div class="container">
            <form action="cadFuncionario.act.php" method="post" enctype="multipart/form-data">
                <label>Nome:</label>
                <input type="text" name="nome" required>

                <label>E-mail</label>
                <input type="text" name="email" required>

                <label>Senha</label>
                <input type="password" placeholder="" name="senha" required>

                <label>Telefone</label>
                <input type="number" required placeholder="(xx) xxxxx-xxxx" required="required" pattern="[0-9]+$" name="telefone">

                <label>Cargo</label>
                <input type="text" placeholder="" name="cargo" required>

                <label>Salário</label>
                <input type="number" placeholder="" name="salario" required>

                <label>CEP</label>
                <input type="text" placeholder="" name="cep" required>

                <label>Rua</label>
                <input type="text" placeholder="" name="rua" required>

                <label>Bairro</label>
                <input type="text" placeholder="" name="bairro" required>

                <label>Numero</label>
                <input type="text" placeholder="" name="numero" required>

                <label>Complemento</label>
                <input type="text" placeholder="" name="complemento">

                <label>Data Contratação</label>
                <input type="date" placeholder="" name="dataContratacao" required>

                <label>Expediente</label>
                <select name="expediente" required>
                    <option value="manha">Manhã</option>
                    <option value="tarde">Tarde</option>
                    <option value="noite">Noite</option>
                </select>

                <input type="submit" value="Cadastrar">
                
            </form>
        </div>
    </body>
</html>
