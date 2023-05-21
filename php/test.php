<?php

session_start();
require_once "engine.php";

if(isset($_POST['hasloBefor'])){
    if (!empty($_POST['hasloBefor'])) {
        zmianaPass($_POST['hasloAfter'], $_POST['hasloBefor1'], $_POST['hasloBefor2']);
        unset($_POST['hasloAfter']);
        unset($_POST['hasloBefor1']);
        unset($_POST['hasloBefor2']);
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
    <title>Tstowy</title>
</head>
<body>
    <form action="test.php" method="post">
        <input type="text" name="hasloAfter">
        <input type="text" name="hasloBefor1">
        <input type="text" name="hasloBefor2">
        <button>Zmien</button>
        <?php
			if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
		?>
    </form>
</body>
</html>