<?php 
require_once "engine.php";
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
    <title>test</title>
</head>
<body>
    <form action="test.php" method="post">
        <input type="number" name="add_cost">
        <input type="submit">
    </form>
    <form action="test.php" method="post">
        <select name="getListahtml" id="getListahtml">
            <option value="1">1</option>
            <option value="5" selected>5</option>
            <option value="10">10</option>
            <option value="15">15</option>
        </select>
        <input type="submit">
    </form>
    <?php
        getList($_POST['getListahtml']);
    ?>
</body>
</html>