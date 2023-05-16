<?php 
require_once "../php/engine.php";
session_start();
	
if (!isset($_SESSION['zalogowany']))
{
    header('Location:../index.html');
    exit();
}

if(isset($_POST['add_cost'])){
    if (!empty($_POST['add_cost'])) { 
          add_cost($_POST['add_cost']);
          unset($_POST['add_cost']);
      }
      else{
          echo "pusty";
      }  
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

    <header class="title">
        <h2>przychody</h2>
    </header>

    <form action="test.php" method="post">
        <input type="number" name="add_cost">
        <input type="submit">
    </form>
    <form action="przychod.php" method="post">
        <select name="getListahtml" id="getListahtml">
            <option value="1">1</option>
            <option value="5" selected>5</option>
            <option value="10">10</option>
            <option value="15">15</option>
        </select>
        <input type="submit">
    </form>
    <?php

    if(isset($_POST['getListahtml'])){
        if (!empty($_POST['getListahtml'])) {
             
            $wynik3 = getList($_POST['getListahtml']);

            while($row2 = mysqli_fetch_array($wynik3)){
            echo $row2['kwota']." ".$row2['data_time']." ".$row2['notatka']."<br>";
            }
        }
        else{
            echo "pusty";
        }  
    }
    ?>


    <section class="">

    </section>

    <script src="../js/script.js"></script>
</body>

</html>