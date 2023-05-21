<?php
require_once "engine.php";

echo getUserName();

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
        <input type="text" name="hasloBefor">
        <input type="text" name="hasloAfter1">
        <input type="text" name="hasloAfter2">
        <button>Zmien</button>
    </form>
</body>
</html>