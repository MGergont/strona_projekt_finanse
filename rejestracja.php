<?php

    session_start();

	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location:podstrony/wydatki.php');
		exit();
	}

?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HF - Rejestracja</title>

    <link rel="icon" type="image/x-icon" href="img/icon.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/f6685ad685.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="wrap">

        <img src="img/logo_1.png" alt="logo">

        <form action="php/signin.php" method="post">

            <input type="text" name="login_1" placeholder="Username">
            <input type="password" name="password_1" placeholder="Password">

            <button>Rejestracja</button>

        </form>
        <?php
			if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
            unset($_SESSION['blad']);
		?>
        <a href="index.php" class="back"><i class="fa-solid fa-arrow-left"></i></a>

    </div>

</body>

</html>