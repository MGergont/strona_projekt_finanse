<?php

if (!empty($_POST['login']) && !empty($_POST['password']))
{
  var_dump($_POST);
}

require_once "db_login.php";

$connect = @new mysqli($host, $db_user, $db_password, $db_name);

if($connect->connect_errno!=0)
    {
        echo "Error:".$connect->connect_errno;
    }
else
    {
        $login=$_POST['login'];
        $haslo=$_POST['haslo'];

        if($wynik_z_bazy = @$connect->query("SELECT*FROM uzytkownicy WHERE user=")){

        }
        else{

        }

        $connect->close();
    }

?>