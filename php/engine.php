<?php 

function polonczenie_mysql()
{
    include "db_login.php";
    $conn = mysqli_connect($host, $db_user, $db_password, $db_name);
    if(!$conn){
        exit("Błąd połączenia z serwerem");
    }
    else{
        mysqli_set_charset($conn, "utf8");
        echo mysqli_affected_rows($conn);
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
    $data = date('Y-m-d H:i:s');
    mysqli_query(polonczenie_mysql(), 'INSERT INTO dane VALUES (NULL, '.$koszt.', "'.$data.'", "jakaś wpłata 2", 4);') or die("Problemy z odczytem danych!");
    mysqli_close(polonczenie_mysql());
}

function getList($zakres)
{
    //poprawić zakresy

    $data = date("Y-m-d H:i:s", strtotime("-".$zakres." days"));

    $wynik1 = mysqli_query(polonczenie_mysql(), 'SELECT kwota, data_time, notatka FROM dane WHERE data_time > "'.$data.'";') or die("Problemy z odczytem danych!");

    while($row = mysqli_fetch_array($wynik1)){
        echo $row['kwota']." ".$row['data_time']." ".$row['notatka']."<br>";
    }

    mysqli_close(polonczenie_mysql());
}


?>