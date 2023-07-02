<?php
session_start();

require_once "../php/engine.php";

if (!isset($_SESSION['zalogowany']))
{
    header('Location:../index.php');
    exit();
}

if(isset($_POST['add_cost'])){
    if (!empty($_POST['add_cost'])) {
        przychodyDodawanie($_POST['add_cost'], $_POST['add_notka']);
        unset($_POST['add_cost']);
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
    <title>HF - Przychód</title>

    <link rel="icon" type="image/x-icon" href="../img/icon.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/f6685ad685.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/przychod.css">

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
        <h2>przychody</h2>
    </header>

    <section class="przychod">

        <div class="dodajPrzychod">
            <p>miesiąc: <span class="actualMonth"><?php echo getMiesiac();?></span></p>

            <form action="przychod.php" method="post">
                <input type="number" name="add_cost" placeholder="kwota" step="0.01">
                <input type="text" name="add_notka" placeholder="notatka">
                <input type="submit" value="Dodaj">
            </form>
            <?php
			    if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
		    ?>
        </div>

        <form action="przychod.php" method="post" class="wyswietlPrzychod">
            <select name="getListahtml" id="getListahtml">
                <option value="5" selected>5 ostatnich</option>
                <option value="10">10 ostatnich</option>
                <option value="15">15 ostatnich</option>
                <option value="20">20 ostatnich</option>
            </select>
            <input type="submit" value="Wyświetl">
        </form>
        <table>
            <th>KWOTA</th>
            <th>DATA</th>
            <th>NOTATKA</th>
            <?php
                if(isset($_POST['getListahtml'])){
                    if (!empty($_POST['getListahtml'])) {
                        $wynik = listaPrzychody($_POST['getListahtml']);
                        while($wiersz = mysqli_fetch_array($wynik)){
                        echo "<tr>";
                        echo "<td>".$wiersz['kwota']."<span> zł</span>"."</td>";
                        echo "<td>".$wiersz['test']."</td>";
                        echo "<td>".$wiersz['notatka']."</td>";
                        echo "</tr>";
                        }
                    }
                    else{
                        echo '<span class="warning2" style="color: #cc1b1b;">Formularz jest pusty!</span>';
                    }
                }
            ?>
        </table>

    </section>

    <script src="../js/script.js"></script>
</body>

</html>