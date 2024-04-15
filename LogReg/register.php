<?php
require_once("../BD_connect.php");

session_start();
session_unset();


$email = $_POST['email'];
$login = $_POST['login'];
$password = $_POST['password'];



$error=false; 

$exist1 = false;
$exist2 = false;  


$loginerror = false;
$passworderror = false;
$emailerror = false;

$namezap= mysqli_query($con,"SELECT `login`,`email`  FROM `users` WHERE `email`='$email'");
/*
if($email=$namezap){
	$error = true;
	$emailerror = true;
}
*/

if(!preg_match('/^\S*(?=\S{8,})\S*$/', $password))
{
    $error = true;
    $passworderror =true;
}

if(!preg_match('/^[A-Za-z][A-Za-z]|[0-9]/', $login))
{
    $error = true;
    $loginerror =true;
}


$rows = $namezap->num_rows;

    for ($i=0;$i<$rows;++$i)
    {
        $namezap->data_seek($i);
        $data = $namezap->fetch_array(MYSQLI_NUM);

      
        if($email==$data[1])
        {
        $error = true;
		$exist2 = true;
        }
    }

    
	
	$rows2 = $namezap->num_rows;

    for ($i=0;$i<$rows;++$i)
    {
        $namezap->data_seek($i);
        $data = $namezap->fetch_array(MYSQLI_NUM);

      
        if($login==$data[0])
        {
        $error = true;
		$exist1 = true;
        }
    }
	
	




if($error==false)
{
    require("../BD_connect.php");
    $connect = mysqli_connect('127.0.0.1', 'root', '', 'Polygon_BD');
	mysqli_set_charset($con, 'utf8');
    
	$zap="INSERT INTO users 
    VALUES(null,'$login','$email','$password')";
    $result = mysqli_query($connect,$zap);
    
    

    session_start(['cookie_lifetime' => 86400]);
    $_SESSION['users']=$login;
    header('Location: ../index.php');
}
else
{
    session_start(['cookie_lifetime' => 86400]);

    if($emailerror == true)
    {
        $_SESSION['email_error'] = true;
    }
    if($loginerror == true)
    {
        $_SESSION['login_error'] = true;
    }
    if($passworderror == true)
    {
        $_SESSION['password_error'] = true;
    }
    if($exist1 == true)
    {
        $_SESSION['login_ex_error'] = true;
    }
    if($exist2 == true)
    {
        $_SESSION['email_error'] = true;
    }
	
    header('Location: reg.php');
}
?>
