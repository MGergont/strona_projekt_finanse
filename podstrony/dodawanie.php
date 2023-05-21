<?php

session_start();
	
if (!isset($_SESSION['udanarejestracja']))
{
	header('Location:../podstrony/zaloguj.php');
	exit();
}
else
{
	unset($_SESSION['udanarejestracja']);
}


if (isset($_SESSION['fr_nick'])) unset($_SESSION['fr_nick']);
if (isset($_SESSION['fr_haslo1'])) unset($_SESSION['fr_haslo1']);

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Udało się
    <a href="wydatki.php">tu kliknij</a>
    <!--  -->
</body>
</html>