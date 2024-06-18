<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../Frontend/css/menu.css">

    <script src="https://kit.fontawesome.com/d1e2240f89.js" crossorigin="anonymous"></script>

</head>

<body>

</body>

</html>

<div class="nav">

    <ul class="content-nav">

        <li class="burguer">
            
            <p><i class="fa-solid fa-bars"></i></p>

            <ul class="content-burguer">
                <a href="main-painelControle.php"><li>Painel de Controle</li></a>
                <a href="main-funcionario.php"><li>Funcionários</li></a>
                <a href="main-estoque.php"><li>Estoque</li></a>
                <a href="main-fornecedor.php"><li>Fornecedores</li></a>
                <a href="main-lembrete.php"><li>Lembrete</li></a>
                <a href="main-testeQuimico.php"><li>Testes</li></a>
                <a href="main-tanque.php"><li>Tanques</li></a>
                <a href="main-dados.php"><li>Dados</li></a>
                <a href="main-avisos.php"><li>Avisos</li></a>
                <a href="main-faq.php"><li>FAQ</li></a>
            </ul>

        </li>

        <li class="titulo">
            <p id="titulo"><?php echo $pageTitle; ?></p>
        </li>

        <li class="profile" onclick="showPerfil(event)">
            <p>Isabella<img src="../../Frontend/css/images/isaCadrasto.jpg"></p>

            <ul class="content-profile">
                <a href="#">
                    <li>Editar Informações</li>
                </a>
                <a href="#">
                    <li>Log in</li>
                </a>
            </ul>

        </li>

    </ul>

</div>

<script src="../../Frontend/js/menu.js"></script>