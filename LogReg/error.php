<?php
    require_once('../BD_connect.php');
	session_start();
?>	


<html lang="ru">
<head>
<title>Авторизация</title>
        <link rel="stylesheet" href="../styles/style_for_log.css"></link>
        <link rel="icon" href="../img/Polygon_mini_logo_2_1.png"></link>
        <!--Подключение шрифтов-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@300&display=swap" rel="stylesheet">
	
</head>
<body class='login-body'>
    <div class="login-form">
        <span class="autorize">Авторизация</span>	
<!-- form start -->
       <p id="error-text">Введен неверный пароль или логин. Попробуйте еще раз.</p>
<!-- form end -->
		<a href="reg.php"><div class="button-registr">Регистрация</div></a>
		
        <a href="../index.php"><div class="buttonback_1">Назад</div></a>
    </div>
    <?php session_unset();?>
</body>
</html>

