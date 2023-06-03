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
    <title>HF - Wydatki</title>

    <link rel="icon" type="image/x-icon" href="img/icon.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/f6685ad685.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/main.css">

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

    <div class="modal">
        <i class="fa-solid fa-xmark"></i>
        <p></p>
        <i class="modal_icon"></i>
        <form action="../php/wydatki_rejestr.php" method="post">
            <input type="number" placeholder="Kwota">
            <input type="text" name="notka" placeholder="Notatka">
            <!-- input typu text z name 1t, 2t, 3t,... do notatki -->
            <button>Dodaj</button>
        </form>
    </div>

    <header class="title">
        <h2>wydatki</h2>
    </header>

    <section class="wydatki">
        <div class="category">
            <i class="fa-solid fa-utensils"></i>
            <p id = "1">Żywność</p>
        </div>
        <div class="category">
            <i class="fa-solid fa-house-chimney"></i>
            <p id = "2">Mieszkanie</p>
        </div>
        <div class="category">
            <i class="fa-solid fa-car-side"></i>
            <p id = "3">Transport</p>
        </div>
        <div class="category">
            <i class="fa-solid fa-shirt"></i>
            <p id = "4">Odzież i obuwie</p>
        </div>
        <div class="category">
            <i class="fa-solid fa-gift"></i>
            <p id = "5">Prezenty</p>
        </div>
        <div class="kwota">

            <p><?php echo getSaldo(); ?> <span>PLN</span></p><?php
			    if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
                unset($_SESSION['blad']);
		    ?>

        </div>
        <div class="category">
            <i class="fa-solid fa-book-open"></i>
            <p id = "6">Rozwój osobisty</p>
        </div>
        <div class="category">
            <i class="fa-solid fa-hand-holding-heart"></i>
            <p id = "7">Zdrowie i uroda</p>
        </div>
        <div class="category">
            <i class="fa-solid fa-puzzle-piece"></i>
            <p id = "8">Rozrywka i hobby</p>
        </div>
        <div class="category">
            <i class="fa-solid fa-microchip"></i>
            <p id = "9">Technologia</p>
        </div>
        <div class="category">
            <i class="fa-solid fa-ellipsis"></i>
            <p id = "10">Inne</p>
        </div>
    </section>

    <script src="../js/script.js"></script>
</body>

</html>