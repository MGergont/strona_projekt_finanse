<?php

function polonczenie_mysql()
{
    include "db_login.php";
    $conn = @mysqli_connect($host, $db_user, $db_password, $db_name);
    if(!$conn){
        exit("Błąd połączenia z serwerem");
    }
    else{
        mysqli_set_charset($conn, "utf8");
    }
    return $conn;
}

function add_cost($koszt)
{
    if($koszt > 0){
        $user = $_SESSION['user_id'];
        $data = date('Y-m-d H:i:s');
        mysqli_query(polonczenie_mysql(), 'INSERT INTO dane VALUES (NULL, '.$koszt.', "'.$data.'", "jakaś wpłata 2", 11, '.$user.');') or die("Problemy z odczytem danych!");

        unset($_SESSION['blad']);
        mysqli_close(polonczenie_mysql());
    }
    else
    {
        echo "błąd czy nie błąd oto jest pytanie";
        $_SESSION['blad']='<span style="color: #cc1b1b;">Wartość nie morze być ujemna!</span>';
        header('Location:../podstrony/przychod.php');
    }
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
    
    if($koszt > 0){
        $koszt = $koszt * -1;
        $data = date('Y-m-d H:i:s');
        $user = $_SESSION['user_id'];
        mysqli_query(polonczenie_mysql(), 'INSERT INTO dane VALUES (NULL, '.$koszt.', "'.$data.'", "jakaś notatka 5", '.$kategoria.', '.$user.');') or die("Problemy z odczytem danych!");
        mysqli_close(polonczenie_mysql());
    }
    else
    {
        echo "błąd czy nie błąd oto jest pytanie";
        $_SESSION['blad']='<span style="color: #cc1b1b;">Wartość nie morze być ujemna!</span>';
        header('Location:../podstrony/wydatki.php');
    }
}

function getUserName(){

    $user = $_SESSION['user_id'];
    $wynik=mysqli_query(polonczenie_mysql(),'SELECT name FROM users WHERE id_users = '.$user.';') or die("Problemy z odczytem danych!");

    $userName = mysqli_fetch_array($wynik);
    mysqli_close(polonczenie_mysql());
    return $userName['name'];

}

function getMiesiac(){
    $miesiac = date('n');
    $tablica=array("brak", "styczeń","luty","marzec","kwiecień","maj","czerwiec","lipiec","sierpień","wrzesień","październik","listopad","grudzień",);

    return $tablica[$miesiac];
}

function zmianaPass($haslo1, $haslo2, $haslo3){
    
    $user = $_SESSION['user_id'];
    $wynik=mysqli_query(polonczenie_mysql(),'SELECT password_user FROM users WHERE id_users = '.$user.';') or die("Problemy z odczytem danych!");
    $wiersz = mysqli_fetch_array($wynik);
    if(password_verify($haslo1, $wiersz['password_user'])){
        if(strcasecmp($haslo2, $haslo3)){

            $haslo_hash = password_hash($haslo2, PASSWORD_DEFAULT);

            mysqli_query(polonczenie_mysql(), 'UPDATE users SET password_user='.$haslo_hash.' WHERE id_users = '.$user.';') or die("Problemy z odczytem danych!");
            mysqli_close(polonczenie_mysql());
        }
        else
        {
            $_SESSION['blad']='<span style="color: #cc1b1b;">Hasła nie są takie same!</span>';
            header('Location:../php/test.php');
        }
    }
    else
    {
        $_SESSION['blad']='<span style="color: #cc1b1b;">Nieprawidłowe hasło!</span>';
        header('Location:../php/test.php');
    }

}

?>

