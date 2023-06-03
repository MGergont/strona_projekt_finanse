<?php
session_start();
	
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
                <li><a href="wydatki.php">Wydatki</a></li>
                <li><a href="przychod.php">Przychody</a></li>
                <li><a href="raport.php">Raport</a></li>
            </ul>
        </nav>

        <section class="settings">

            <div class="userImg">
                <img src="" alt="">
            </div>

            <a href="../php/logout.php">wyloguj</a>

        </section>
    </section>

    <header class="title">
        <h2>raport</h2>
    </header>

    <section class="">
    </section>

    <script src="../js/script.js"></script>
</body>

</html>