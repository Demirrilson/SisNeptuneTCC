<?php
$pageTitle = "Adicionar Funcionário";
include('head.php');
include('menuBar.php');
include('../../Backend/Sistema/connect.php');
?>
<html>

<body>


    <div class="caixa-add">

        <div class="add-content">

            <div class="btn-back"><a href="./main-funcionario.php"><i class="fa-solid fa-arrow-left"></i></a></div>

            <form action="../../Backend/Sistema/cadFuncionario.act.php" method="post" enctype="multipart/form-data" class="form-add grid-add-funcionario">

                <p>
                    <label>Nome:</label>
                    <input type="text" name="nome" required>
                </p>

                <p>
                    <label>E-mail</label>
                    <input type="text" name="email" required>
                </p>

                <p>
                    <label>Senha</label>
                    <input type="password" placeholder="" name="senha" required>
                </p>

                <p>
                    <label>Telefone</label>
                    <input type="number" required placeholder="(xx) xxxxx-xxxx" required="required" pattern="[0-9]+$" name="telefone">
                </p>

                <p>
                    <label>Cargo</label>
                    <input type="text" placeholder="" name="cargo" required>
                </p>

                <p>
                    <label>Salário</label>
                    <input type="number" placeholder="" name="salario" required>
                </p>

                <p>
                    <label>CEP</label>
                    <input type="text" placeholder="" name="cep" required>
                </p>

                <p>
                    <label>Rua</label>
                    <input type="text" placeholder="" name="rua" required>
                </p>

                <p>
                    <label>Bairro</label>
                    <input type="text" placeholder="" name="bairro" required>
                </p>

                <p>
                    <label>Numero</label>
                    <input type="text" placeholder="" name="numero" required>
                </p>

                <p>
                    <label>Complemento</label>
                    <input type="text" placeholder="" name="complemento">
                </p>

                <p>
                    <label>Data Contratação</label>
                    <input type="date" placeholder="" name="dataContratacao" required>
                </p>

                <p>
                    <label>Expediente</label>
                    <select name="expediente" required>
                        <option value="manha">Manhã</option>
                        <option value="tarde">Tarde</option>
                        <option value="noite">Noite</option>
                    </select>
                </p>

                <p>
                    <input type="submit" value="Cadastrar" class="cadastrar">
                </p>

            </form>
        </div>
    </div>

</body>

</html>