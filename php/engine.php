<?php

function connectMysql()
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
        @mysqli_query(connectMysql(), 'INSERT INTO dane VALUES (NULL, '.$koszt.', "'.$data.'", "jakaś wpłata 2", 11, '.$user.');') or die("Problemy z odczytem danych!");

        unset($_SESSION['blad']);
        mysqli_close(connectMysql());
    }
    else
    {
        $_SESSION['blad']='<span class="warning2" style="color: #cc1b1b;">Wartość nie morze być ujemna!</span>';
        header('Location:../podstrony/przychod.php');
    }
}

function getList($zakres)
{
    $user = $_SESSION['user_id'];
    
    $wynik1 = mysqli_query(connectMysql(), 'SELECT kwota, DATE_FORMAT(data_time, "%m-%d-%Y") as test, notatka FROM dane WHERE id_users = '.$user.' AND id_kategoria = 11 ORDER BY data_time DESC LIMIT '.$zakres.';') or die("Problemy z odczytem danych!");
    
    return $wynik1;
}

function getRaport($kategoria)
{
    $user = $_SESSION['user_id'];
    $wynik1 = mysqli_query(connectMysql(), 'SELECT kwota, notatka, data_time FROM dane WHERE id_users = '.$user.' AND id_kategoria = '.$kategoria.';') or die("Problemy z odczytem danych!");

    return $wynik1;
}

function generowanieRaport($kategoria){
    $user = $_SESSION['user_id'];
    $wynik1 = mysqli_query(connectMysql(), 'SELECT kwota, notatka, data_time FROM dane WHERE id_users = '.$user.' AND id_kategoria = '.$kategoria.';') or die("Problemy z odczytem danych!");

    unlink('raport.txt');
    $plik = fopen('raport.txt','a');
    fputs($plik, getUserName()."\n");
    fputs($plik, date('Y-m-d H:i:s')."\n");
    fputs($plik, "Koszt;   Czas;   Notatka;\n");
    while($row = mysqli_fetch_array($wynik1)){
        fputs($plik, $row['kwota']." ".$row['data_time']." ".$row['notatka']."\n");
        }

    fclose($plik);
}

function getSaldo(){
    $user = $_SESSION['user_id'];

    $suma=mysqli_query(connectMysql(),'SELECT SUM(kwota) FROM dane where id_users = '.$user.';') or die("Problemy z odczytem danych!");

    $w=mysqli_fetch_array($suma);

    mysqli_close(connectMysql());
    return $w['SUM(kwota)'];
}


function setCoste($koszt, $kategoria, $notka){
    $user = $_SESSION['user_id'];
        if($koszt > 0){
            $koszt = $koszt * -1;
            $data = date('Y-m-d H:i:s');
            mysqli_query(connectMysql(), 'INSERT INTO dane VALUES (NULL, '.$koszt.', "'.$data.'", "'.$notka.'", '.$kategoria.', '.$user.');') or die("Problemy z odczytem danych!");
            mysqli_close(connectMysql());
        }
        else
        {
            $_SESSION['blad']='<span class="warning1">Wartość nie może być ujemna!</span>';
            header('Location:../podstrony/wydatki.php');
        }
}

function getUserName(){

    $user = $_SESSION['user_id'];
    $wynik=mysqli_query(connectMysql(),'SELECT name FROM users WHERE id_users = '.$user.';') or die("Problemy z odczytem danych!");

    $userName = mysqli_fetch_array($wynik);
    mysqli_close(connectMysql());

    return $userName['name'];

}

function getMiesiac(){
    $miesiac = date('n');
    $tablica=array("brak", "styczeń","luty","marzec","kwiecień","maj","czerwiec","lipiec","sierpień","wrzesień","październik","listopad","grudzień",);

    return $tablica[$miesiac];
}

function zmianaUserName($username2){
    $user = $_SESSION['user_id'];
    mysqli_query(connectMysql(), 'UPDATE users SET name="'.$username2.'" WHERE id_users = '.$user.';') or die("Problemy z odczytem danych!");
    mysqli_close(connectMysql());
}

function usuwanieKonta(){
    $user = $_SESSION['user_id'];
    mysqli_query(connectMysql(), 'DELETE FROM dane WHERE id_users = '.$user.';') or die("Problemy z odczytem danych!");
    mysqli_query(connectMysql(), 'DELETE FROM users WHERE id_users = '.$user.';') or die("Problemy z odczytem danych!");
    mysqli_close(connectMysql());
}

function zmianaPass($haslo1, $haslo2, $haslo3){
    $user = $_SESSION['user_id'];
    $wynik=mysqli_query(connectMysql(),'SELECT password_user FROM users WHERE id_users = '.$user.';') or die("Problemy z odczytem danych!");
    $wiersz = mysqli_fetch_array($wynik);

    if(password_verify($haslo1, $wiersz['password_user'])){
        if($haslo2==$haslo3){

            $haslo_hash = password_hash($haslo2, PASSWORD_DEFAULT);

            mysqli_query(connectMysql(), 'UPDATE users SET password_user = "'.$haslo_hash.'" WHERE id_users = '.$user.';') or die("Problemy z odczytem danych!");
            mysqli_close(connectMysql());
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

function statystyki($zakres){
    $user = $_SESSION['user_id'];
    $data3 = date("Y-m");
    $data = date("Y-m", strtotime("-".$zakres." month"));
    $data1 = $data3."-01 00:00:00";
    $data2 = $data."-01 00:00:00";

    $wynik=mysqli_query(connectMysql(),'SELECT SUM(kwota) AS suma_kwota, round((-SUM(kwota)*100)/(SELECT SUM(kwota)*(-1) as suma_koszt FROM dane WHERE id_kategoria != 11 AND id_users = '.$user.' AND data_time > "'.$data2.'" AND data_time < "'.$data1.'"), 2) as procent, nazwa_kat FROM (SELECT kwota, kategoria.nazwa_kat FROM dane INNER JOIN kategoria ON dane.id_kategoria=kategoria.id_kategoria WHERE dane.id_kategoria!=11 AND dane.id_users = '.$user.' AND data_time > "'.$data2.'" AND data_time < "'.$data1.'") AS test GROUP BY nazwa_kat;') or die("Problemy z odczytem danych!");

    return $wynik;
}
?>

