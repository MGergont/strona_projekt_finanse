<?php

    session_start();

    if((!isset($_POST['login'])) || (!isset($_POST['password'])))
    {

        header('Location:../index.html');
        exit();

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
        $haslo=$_POST['password'];

        $login=htmlentities($login, ENT_QUOTES, "UTF-8");


        if($rezultat = @$connect->query(sprintf("SELECT*FROM users WHERE name='%s'",
        mysqli_real_escape_string($connect,$login))))
        {
            $ilu_userow=$rezultat->num_rows;
            if($ilu_userow>0)
            {   
                $wiersz=$rezultat->fetch_assoc();

                if(password_verify($haslo, $wiersz['password_user']))
                {
                    $_SESSION['zalogowany'] = true;
                    
                    $_SESSION['user_id'] = $wiersz['id_users'];

                    unset($_SESSION['blad']);
                    $rezultat->free_result();
                    // header('Location:../podstrony/dodawanie.html');
                    header('Location:../podstrony/wydatki.php');
                }
                else{

                    echo "test1";
                }

            }else{
                    echo "test3";
            }
        }

        $connect->close();
    }

   
?>