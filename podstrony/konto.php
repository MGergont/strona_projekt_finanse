<?php

session_start();

require_once "../php/engine.php";

if (!isset($_SESSION['zalogowany']))
{
    header('Location:../index.php');
    exit();
}

if(isset($_POST['hasloAfter'])){
    if (!empty($_POST['hasloAfter'])) {
        zmianaPass($_POST['hasloAfter'], $_POST['hasloBefor1'], $_POST['hasloBefor2']);
        unset($_POST['hasloAfter']);
        unset($_POST['hasloBefor1']);
        unset($_POST['hasloBefor2']);
      }
      else{
        echo '<span id="error"">Formularz jest pusty!</span>';
      }
  }

  if(isset($_POST['username1'])){
    if (!empty($_POST['username1'])) {
        zmianaUserName($_POST['username1']);
        unset($_POST['username1']);
      }
      else{
        echo '<span id="error">Formularz jest pusty!</span>';
      }
  }

  if(isset($_POST['delete'])){
    if (!empty($_POST['delete'])) {
        usuwanieKonta();
        header('Location:../php/logout.php');
        unset($_POST['delete']);
      }
      else{
        echo '<span id="error">Formularz jest pusty!</span>';
      }
  }

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HF - Konto</title>

    <link rel="icon" type="image/x-icon" href="img/icon.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/f6685ad685.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/konto.css">

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
                <?php
                    echo '<p class="userName">'.getUserName().'</p>';
                ?>
            </div>

            <div class="logOut">
                <a href="../php/logout.php"><i class="fa-solid fa-right-from-bracket"></i>Wyloguj</a>
            </div>

        </section>
    </section>

    <header class="title">
        <h2>konto</h2>
    </header>

    <div class="wrap">

        <p class="TitleSetting">Hasło</p>

        <form action="konto.php" method="post" class="changePassword">
            <i class="fa-solid fa-unlock"></i> <input type="text" name="hasloAfter" placeholder="Aktualne hasło"> <br>
            <i class="fa-solid fa-lock"></i> <input type="text" name="hasloBefor1" placeholder="Nowe hasło"> <br>
            <i class="fa-solid fa-lock"></i> <input type="text" name="hasloBefor2" placeholder="Powtórz hasło">
            <button>Zmień</button>
            <?php
			    if(isset($_SESSION['blad'])) echo $_SESSION['blad'];

                unset($_SESSION['blad']);
                unset($_SESSION)
		    ?>
        </form>

    </div>

    <div class="wrap">

        <p class="TitleSetting">Nazwa Użytkownika</p>

        <form action="konto.php" method="post" class="changeUsername">
            <i class="fa-solid fa-user"></i><input type="text" name="username1" placeholder="Nazwa użytkowinka">
            <button>Zmień</button>
        </form>

    </div>

    <div class="wrap">

        <p class="TitleSetting">Usuwanie konta</p>

        <form action="konto.php" method="post" class="deleteAccount">
        <i class="fa-solid fa-trash"></i><input type="text" name="delete" placeholder="Hasło">
            <button>Usuń</button>
        </form>

    </div>

    <script src="../js/script.js"></script>
</body>

</html>