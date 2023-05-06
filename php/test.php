<?php 

session_start();
	
if (!isset($_SESSION['zalogowany']))
{
    header('Location:../index.html');
    exit();
}

function add_cost_fun() {
    
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
    <?php
        echo '<div class="daneuserphp">'.$_SESSION['user'].'</div>';
    ?>
</body>
</html>