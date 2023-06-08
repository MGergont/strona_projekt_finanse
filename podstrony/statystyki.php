<?php
session_start();

require_once "../php/engine.php";

if (!isset($_SESSION['zalogowany']))
{
    header('Location:../index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HF - Statystyki</title>

    <link rel="icon" type="image/x-icon" href="img/icon.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/f6685ad685.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/statystyki.css">

</head>

<body>

    <div class="burger">
        <i class="fa-solid fa-bars"></i>
    </div>

    <section class="fixed">
        <div class="logo">
            <img src="../img/logo_2.png" alt="logo - Home Finances">
        </div>

        <nav>
            <ul>
                <li><a href="wydatki.php"> <i class="fa-solid fa-scale-unbalanced-flip"></i> Wydatki</a></li>
                <li><a href="przychod.php"> <i class="fa-solid fa-piggy-bank"></i>Przychody</a></li>
                <li><a href="raport.php"> <i class="fa-solid fa-wallet"></i>Raport</a></li>
                <li><a href="statystyki.php"> <i class="fa-solid fa-chart-simple"></i>Statystyki</a></li>
                <li><a href="konto.php"> <i class="fa-solid fa-user"></i>Konto</a></li>
            </ul>
        </nav>

        <section class="settings">

            <div class="userImg">
                <img src="../img/user.png" alt="">
                <p class="userName">Marek Stanisławczyk</p>
            </div>

            <div class="logOut">
                <a href="../php/logout.php"><i class="fa-solid fa-right-from-bracket"></i>Wyloguj</a>
            </div>

        </section>
    </section>

    <header class="title">
        <h2>statystyki</h2>
    </header>
    <?php
        statystyki(2);
    ?>

    <script src="../js/script.js"></script>
</body>

</html>