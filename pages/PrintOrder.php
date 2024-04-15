<?php
session_start();
require('../BD_connect.php');
$OrdLotName=$_POST['lotName'];
$Username=$_POST['username'];
$sql1=mysqli_query($con,"SELECT `us_id` FROM `users` WHERE `login`='$Username'");
while ($res=mysqli_fetch_array($sql1)):
$idUser=$res['us_id'];
endwhile;
$sql2=mysqli_query($con,"SELECT `price_print` FROM `model_for_print` WHERE `name_print_lot`='$OrdLotName'");
while ($res2=mysqli_fetch_array($sql2)):

$PricePrint=$res2['price_print'];
endwhile;
$zapOrd="INSERT INTO `orders`
VALUES (null,'$idUser','$OrdLotName','$PricePrint')";
$sql3=mysqli_query($con,$zapOrd);
header('Location: thanks.php');
?>