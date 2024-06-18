<?php
$pageTitle = "FAQ";
include('head.php');
include('menuBar.php');
require('../../Backend/Sistema/connect.php');
?>


<div class="container-faq">

    <div class="menu-faq">
        <ul>
            <li #opcao>Principal</li>
            <li #opcao>Cadastro</li>
            <li #opcao>Alterações</li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>

    <div class="titulo-faq">

        <ul>
            <li>Principal</li>
            <li>Cadastro</li>
            <li>Alterações</li>
        </ul>
        
    </div>

    <div class="content-faq">
        <ul>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis cupiditate pariatur, eveniet fugiat repudiandae blanditiis explicabo itaque tenetur rem. Quisquam molestiae eligendi libero placeat consectetur id maxime est quibusdam accusantium.</li>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis cupiditate pariatur, eveniet fugiat repudiandae blanditiis explicabo itaque tenetur rem. Quisquam molestiae eligendi libero placeat consectetur id maxime est quibusdam accusantium.</li>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis cupiditate pariatur, eveniet fugiat repudiandae blanditiis explicabo itaque tenetur rem. Quisquam molestiae eligendi libero placeat consectetur id maxime est quibusdam accusantium.</li>
        </ul>
    </div>



</div>


<script>
    const cliquei = document.getElementById('.opcaoMenu')
    cliquei.onclick = function(){
        cliquei.classList.add("clicado")
    }



</script>