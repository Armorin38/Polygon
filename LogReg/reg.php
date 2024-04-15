<?php
    session_start();
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="../styles/style_for_reg.css"></link>
        <link rel="icon" href="../img/Polygon_mini_logo_2_1.png"></link>
        <!--Подключение шрифтов-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@300&display=swap" rel="stylesheet">
</head>
<body class='reg-body'>
    <div class="reg-form">
    <span class="registration">Регистрация</span>
        <form action='register.php' method='post'>
        
        <div class="pr_registr">
            
            
            <span class="email">E-mail:</span>
            <input class="text-zone" type="email" required name='email'>
            <?php
            if(isset($_SESSION['email_error'])):
        ?>
           <span class="vspWIN">Пользователь с такой почтой уже сущестует!</span>
            <?php endif;?>
            <span class="login">Логин:</span>
            <input class="text-zone" type="login" required name='login'>
            <?php
            if(isset($_SESSION['login_error'])):
        ?>
           <span class="vspWIN">Неккоректный логин!</span>
            <?php 
            elseif(isset($_SESSION['login_ex_error'])):?>
            <span class="vspWIN">Пользователь с таким логином уже существует!</span>
            <?php
            endif;?>
            <span class="password">Пароль:</span>
            <input class="text-zone" type="password" required name='password'>
            <?php
            if(isset($_SESSION['password_error'])):
        ?>
           <span class="vspWIN">Пароль должен состоять не менее, чем из 8 символов</span>
            <?php endif;?>
        </div>
		
        <input class='enter-button' type='submit' value='Зарегестрироваться' OnClick="gotohome.php">
        </form>
        <a href="log.php" style="text-decoration: none"><div class="buttonvhod">Авторизация</div></a>
        <a href="../index.php" style="text-decoration: none"><div class="buttonback">Назад</div></a>
    </div>

    <?php
    session_unset();
    ?>
</body>
</html>
