<?php
    session_start();

    echo "jakiś tekst prosze działaj";

    echo $_POST['login_1'];

    if (isset($_POST['login_1']))
	{
		//Udana walidacja? Załóżmy, że tak!
		$wszystko_OK=true;
		
		//Sprawdź poprawność nickname'a
		$nick = $_POST['login_1'];
        $haslo1=$_POST['password_1'];

        echo $nick;
        echo $haslo1;

        // szyfrowanie hasla
        $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);

        // zapamiętaj wprowadzone dane
        $_SESSION['fr_nick']= $nick;
        $_SESSION['fr_haslo1']= $haslo1;


        require_once "db_login.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try
        {
            $connect = new mysqli($host, $db_user, $db_password, $db_name);
            if ($connect->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            else
            {

                //Czy nic jest juz zarezerwowany
                $rezultat = $connect->query("SELECT id_users FROM users WHERE name='$nick'");
                    
                if (!$rezultat) throw new Exception($connect->error);
                
                $ile_takich_nickow = $rezultat->num_rows;
                if($ile_takich_nickow>0)
                {
                    $wszystko_OK=false;
                }

                if($wszystko_OK==true)
                {
                    // wszystko jses OK
                    if ($connect->query("INSERT INTO users VALUES (NULL, '$nick', '$haslo_hash')"))
					{
                        echo "jakoś sie udoło";
						$_SESSION['udanarejestracja']=true;
						header('Location:../podstrony/dodawanie.php');
					}
					else
					{
						throw new Exception($connect->error);
                    }
                    
                }

                $connect->close();
            }
        }
        catch(Exception $e)
        {
            echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
        }
    }
?>