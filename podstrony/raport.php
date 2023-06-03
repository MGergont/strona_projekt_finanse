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

    <form action="raport.php" method="post" class="wyswietlRaport">
        <select name="getRaporthtml" id="getRaporthtml">
            <option value="1">Żywność</option>
            <option value="2">Mieszkanie</option>
            <option value="3">Transport</option>
            <option value="4">Odzież i obuwie</option>
            <option value="5">Prezenty</option>
            <option value="6">Rozwój osobisty</option>
            <option value="7">Zdrowie i uroda</option>
            <option value="8">Rozrywka i hobby</option>
            <option value="9">Technologia</option>
            <option value="10">Inne</option>

        </select>
        <input type="submit">
    </form>

    <section class="">
        <?php
            if(isset($_POST['getRaporthtml'])){
                if (!empty($_POST['getRaporthtml'])) {
                    $wynik3 = getRaport($_POST['getRaporthtml']);
                        while($row2 = mysqli_fetch_array($wynik3)){
                        echo $row2['kwota']." ".$row2['data_time']." ".$row2['notatka']."<br>";
                        }
                    }
                    else{
                        echo "pusty";
                    }
                }
            ?>
    </section>

    <script src="../js/script.js"></script>
</body>

</html>