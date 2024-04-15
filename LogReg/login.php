<?php
	require_once("../BD_connect.php");
    $login = $_POST["login"];
    $pasw= $_POST["password"];
    $ex = false;

    $connect = mysqli_connect('127.0.0.1', 'root', '', 'Polygon_BD');
	mysqli_set_charset($connect, 'utf8');

    $query = "SELECT login, password FROM users";
    $result = mysqli_query($connect,$query);
    

    $rows = $result->num_rows;

    for ($i=0;$i<$rows;++$i)
    {
        $result->data_seek($i);
        $data = $result->fetch_array(MYSQLI_NUM);

      
        if($login==$data[0] && $pasw==$data[1])
        {
        $ex=true;
        break;
        }
    }

    $connect->close();

    if($ex==true)
    {
        $autorise=1;
		session_start(['cookie_lifetime' => 86400*60*30*30]);
        $_SESSION['user']=$login;
        header('Location: ../index.php');   
    }
    else
    {
        $autorise=0;
		session_start(['cookie_lifetime' => 10]);
        $_SESSION['error']=true;
        header('Location: error.php');
    } 
?>
