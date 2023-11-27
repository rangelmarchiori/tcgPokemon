<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/topnav.css">
    <link rel="stylesheet" href="../../css/admin.css">

    <title>ADMIN</title>
</head>

<body>
    <nav class="navbar">
        <a href="#" class="logo">POKEDEX</a>
        <div class="nav-links">
            <ul>
                <li class="active"><a href="../../html/index.html">HOME</a></li>
                <li class="active"><a href="../../html/Cartas.html">Cartas</a></li>
                <li class="active"><a href="../../html/QuemSomos.html">Quem Somos?</a></li>
                <li class="active"><a href="../../html/forms/formRealizarLogin.html">Login</a></li>
            </ul>
        </div>
        <img src="../../imagens/icons8-cardápio-32.png" alt="menu hamburger" class="menu-hamburger">
    </nav>
    <main>
        <div class="flexVertical">

            <h1>Bem vindo <?php echo $_SESSION['username']; ?>!</h1>

            <br>
            <br>

            <div class="flexHorizontal">

                <div class="flexVertical">
                    <a class="btnCadastro" href="../../html/forms/formCadastrarColecao.html"> CADASTRAR COLEÇÃO</a>
                    <a class="btnCadastro" href="../../html/forms/formCadastrarCarta.html"> CADASTRAR CARTA</a>
                </div>

                <div class="flexVertical">
                    <a class="btnCadastro" href="../../html/forms/formCadastrarDeck.html"> CADASTRAR DECK</a>
                    <a class="btnCadastro" href="../../html/forms/formCadastrarBooster.html"> CADASTRAR BOOSTER</a>
                </div>

            </div>
        </div>
    </main>
</body>
<script src="../../js/forms/formCadastrarCarta.js"></script>
</html>