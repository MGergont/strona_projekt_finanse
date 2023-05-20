<?php 

session_start();

function polonczenie_mysql()
{
    include "db_login.php";
    $conn = mysqli_connect($host, $db_user, $db_password, $db_name);
    if(!$conn){
        exit("Błąd połączenia z serwerem");
    }
    else{
        mysqli_set_charset($conn, "utf8");
    }
    return $conn;
}

function test1()
{
    $wynik1=mysqli_query(polonczenie_mysql(),'SELECT name FROM users WHERE id_users=5;') or die("Problemy z odczytem danych!");
    $w=mysqli_fetch_array($wynik1);
    echo "Wynikiem zapytania jest: ".$w['name'];
    mysqli_close(polonczenie_mysql());
}

function add_cost($koszt)
{

    $user = $_SESSION['user_id'];

    $data = date('Y-m-d H:i:s');
    mysqli_query(polonczenie_mysql(), 'INSERT INTO dane VALUES (NULL, '.$koszt.', "'.$data.'", "jakaś wpłata 2", 11, '.$user.');') or die("Problemy z odczytem danych!");
    mysqli_close(polonczenie_mysql());
}

function getList($zakres)
{
    //poprawić zakresy
    $user = $_SESSION['user_id'];

    $data = date("Y-m-d H:i:s", strtotime("-".$zakres." days"));

    $wynik1 = mysqli_query(polonczenie_mysql(), 'SELECT kwota, data_time, notatka FROM dane WHERE id_users = '.$user.' AND id_kategoria = 11 AND data_time > "'.$data.'";') or die("Problemy z odczytem danych!");
    
    return $wynik1;
    // mysqli_close(polonczenie_mysql());
}

function getSaldo(){

    $user = $_SESSION['user_id'];

    $suma=mysqli_query(polonczenie_mysql(),'SELECT SUM(kwota) FROM dane where id_users = '.$user.';') or die("Problemy z odczytem danych!");

    $w=mysqli_fetch_array($suma);

    mysqli_close(polonczenie_mysql());
    return $w['SUM(kwota)'];
}

function setCoste($koszt, $kategoria){
    
    $koszt = $koszt * -1;

    $data = date('Y-m-d H:i:s');

    $user = $_SESSION['user_id'];
    mysqli_query(polonczenie_mysql(), 'INSERT INTO dane VALUES (NULL, '.$koszt.', "'.$data.'", "jakaś notatka 5", '.$kategoria.', '.$user.');') or die("Problemy z odczytem danych!");
    mysqli_close(polonczenie_mysql());
}


?>

