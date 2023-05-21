<?php
    // czyszczenie formularza po zalogowaniu
    session_start();

    if((!isset($_POST['login'])) || (!isset($_POST['password'])))
    {

        header('Location:../index.html');
        exit();

    }

    require_once "db_login.php"; 

    $connect = @mysqli_connect($host, $db_user, $db_password, $db_name);

    if(!$connect)
    {
        echo "Error:";
    }
    else
    {
        $login=$_POST['login'];
        $haslo=$_POST['password'];

        $login=htmlentities($login, ENT_QUOTES, "UTF-8");

        //zabezpieczenie
        if($rezultat = mysqli_query($connect, sprintf("SELECT*FROM users WHERE name='%s'", mysqli_real_escape_string($connect,$login))))
        {
            $ilu_userow = mysqli_num_rows($rezultat);
            if($ilu_userow>0)
            {   

                $wiersz = mysqli_fetch_array($rezultat);

                if(password_verify($haslo, $wiersz['password_user']))
                {
                    $_SESSION['zalogowany'] = true;
                    
                    $_SESSION['user_id'] = $wiersz['id_users'];

                    unset($_SESSION['blad']);

                    mysqli_free_result($rezultat);

                    header('Location:../podstrony/wydatki.php');
                }
                else{
                    $_SESSION['blad']='<span style="color: #cc1b1b;">Nieprawidłowy login lub hasło!</span>';
                    header('Location:../index.php');
                }

            }else{
                $_SESSION['blad']='<span style="color: #cc1b1b;">Nieprawidłowy login lub hasło!</span>';
                header('Location:../index.php');
            }
        }

        mysqli_close($connect);
    }

   
?>