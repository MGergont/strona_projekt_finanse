<?php
session_start();
	
if (!isset($_SESSION['zalogowany']))
{
    header('Location:../index.html');
    exit();
}
?>


<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HF - Wydatki</title>

    <link rel="icon" type="image/x-icon" href="img/icon.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/main.css">

    <script src="https://kit.fontawesome.com/f6685ad685.js" crossorigin="anonymous"></script>
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
                <li><a href="wydatki.php">Wydatek</a></li>
                <li><a href="przychod.php">Przychód</a></li>
                <li><a href="raport.php">Raport</a></li>
            </ul>
        </nav>

        <section class="settings">

            <div class="weatherApp">
            </div>

            <div class="theme">
                <i class="fa-solid fa-sun"></i>
                <i class="fa-solid fa-moon"></i>
                <a href="../php/logout.php">Wyloguj</a>
            </div>

        </section>
    </section>

    <div class="modal">
        <i class="fa-solid fa-xmark"></i>
        <p></p>
        <i class="modal_icon"></i>
        <form>
            <input type="text" placeholder="KWOTA">
            <button>Dodaj</button>
        </form>
    </div>

    <header class="title">
        <h2>wydatki</h2>
    </header>

    <section class="wydatki">
        <div class="category">
            <i class="fa-solid fa-utensils"></i>
            <p>Żywność</p>
        </div>
        <div class="category">
            <i class="fa-solid fa-house-chimney"></i>
            <p>Mieszkanie</p>
        </div>
        <div class="category">
            <i class="fa-solid fa-car-side"></i>
            <p>Transport</p>
        </div>
        <div class="category">
            <i class="fa-solid fa-shirt"></i>
            <p>Odzież i obuwie</p>
        </div>
        <div class="category">
            <i class="fa-solid fa-gift"></i>
            <p>Prezenty</p>
        </div>
        <div class="kwota">
            <p>3333 <span>PLN</span> </p>
        </div>
        <div class="category">
            <i class="fa-solid fa-book-open"></i>
            <p>Rozwój osobisty</p>
        </div>
        <div class="category">
            <i class="fa-solid fa-hand-holding-heart"></i>
            <p>Zdrowie i uroda</p>
        </div>
        <div class="category">
            <i class="fa-solid fa-puzzle-piece"></i>
            <p>Rozrywka i hobby</p>
        </div>
        <div class="category">
            <i class="fa-solid fa-microchip"></i>
            <p>Technologia</p>
        </div>
        <div class="category">
            <i class="fa-solid fa-ellipsis"></i>
            <p>Inne</p>
        </div>
    </section>

    <script src="../js/script.js"></script>
</body>

</html>