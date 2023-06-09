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
    <title>HF - Raport</title>

    <link rel="icon" type="image/x-icon" href="../img/icon.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/f6685ad685.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/raport.css">

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
                <li><a href="wydatki.php"> <i class="fa-solid fa-coins"></i> Wydatki</a></li>
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

        <input type="submit" value="Wyświetl">
        <a href="raport.txt" download="raport.txt">Pobierz raport</a>
    </form>


    <table>
        <th>HISTORIA</th>
        <th>DATA</th>
        <th>NOTATKA</th>
        <?php
            if(isset($_POST['getRaporthtml'])){
                if (!empty($_POST['getRaporthtml'])) {
                    $wynik3 = getRaport($_POST['getRaporthtml']);
                    generowanieRaport($_POST['getRaporthtml']);
                    while($row2 = mysqli_fetch_array($wynik3)){
                        echo "<tr>";
                        echo "<td>".$row2['kwota']."<span> zł</span>"."</td>";
                        echo "<td>".$row2['data_time']."</td>";
                        echo "<td>".$row2['notatka']."</td>";
                        // echo $row2['kwota']." ".$row2['data_time']." ".$row2['notatka']."<br>";
                        echo "</tr>";
                    }
                    }
                    else{
                        echo '<span class="warning2" style="color: #cc1b1b;">Formularz jest pusty!</span>';
                    }
                }
            ?>
    </table>

    <script src="../js/script.js"></script>
</body>

</html>