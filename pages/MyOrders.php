<?php 
    session_start();
    require('../BD_connect.php');
    $Username=$_SESSION['user'];
    if($_SESSION['user']==""){
        header('Location: ../index.php');
    }
?>

<html>
    <head>
        <title>Polygon</title>
        <link rel="stylesheet" href="../styles/style.css"></link>
        <link rel="stylesheet" href="../styles/additional_style_for_MyOrders.css"></link>
        <link rel="icon" href="../img/Polygon_mini_logo_2_1.png"></link>
        <!--Подключение шрифтов-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@300&display=swap" rel="stylesheet">
        <!-- scripts -->
        <script src="../JS_scripts/JQuery.js"></script>
        <script src="../JS_scripts/transition.js"></script>
        <script src="../JS_scripts/menuHideShowScript.js"></script>
    </head>
    <body>
        <header>
            <div class="header-div">
                <img id="logo" src="../img/Polygon_logo_2_1.png" onclick="goToHome()"></img>
                <h2>Воплощаем идеи в реальность</h2>
                <span class="info-header">email: polygonplace@gmail.com<br>телефон: 8(985)132-15-91</span>
            </div>
        </header>
        <main>
            <div id="menu-hide-button" onclick="hide()"></div>
            <div id="menu-show-button" onclick="show()"></div>
            <div class="Sidebar" id="Sidebar">
                <div class="autorize-window">
                <?php
                    if($_SESSION['user']!=""){
                        echo"
                    <span id='autorize-info'>Вы зашли как <span>{$_SESSION['user']}</span></span>
                    <a class='autor-reg' href='../out.php'>Выйти</a>
                    ";
                    }
                    else{
                        echo"
                    <span id='autorize-info'>Вы зашли как <span>гость!</span></span>
                    <a class='autor-reg' href='../LogReg/log.php'>Войти</a>
                    <a class='autor-reg' href='../LogReg/reg.php'>Регистрация</a>";
                    }
                ?>
                </div>
                <?php
                if($_SESSION['user']!=""){
                    echo"
                <ul class='menu-list'>
                    <li id='menu-list-element' id='active'><a href='../index.php'>Главная</a></li>
                    <li id='menu-list-element'><a href='catalog.php'>Каталог</a></li>
                    <li id='menu-list-element'><a href='print.php'>Печать</a></li>
                    <li id='menu-list-element'><a href='MyOrders.php'>Мои заказы</a></li>
                    <li id='menu-list-element'><a href='about_us.php'>О нас</a></li>
                    <li></li>
                </ul>";
                }
                else{
                    echo"
                <ul class='menu-list'>
                    <li id='menu-list-element' id='active'><a href='../index.php'>Главная</a></li>
                    <li id='menu-list-element'><a href='about_us.php'>О нас</a></li>
                    <li></li>
                </ul>
                <br>
                <span class='warning'>Для просмотра каталога или офрмления заказа на печать
                 необходимо авторизироваться на сайте</span>";
                }
                ?>
            </div>
            <div class="content-div" id="content-div">
                <!-- page content -->
                    <div id="myorders-list">
                        <?
                            $GetUserId=mysqli_query($con,"SELECT `us_id` FROM `users` WHERE `login`='$Username'");
                            while($UsIdRes=mysqli_fetch_array($GetUserId)):
                                $UserId=$UsIdRes['us_id'];
                            endwhile;
                            $getOrdRequest="SELECT `name_print_lot`,`price_print` FROM `orders` WHERE `us_id`='$UserId'";
                            $MyOrderQuery=mysqli_query($con,$getOrdRequest);
                            while($result=mysqli_fetch_array($MyOrderQuery)):
                                $lotname=$result['name_print_lot'];
                                $getImage="SELECT `img_print_adress`,`page_adress` FROM `model_for_print` WHERE `name_print_lot`='$lotname'";
                                $getImageQuery=mysqli_query($con,$getImage);
                                while ($imageRes=mysqli_fetch_array($getImageQuery)):
                                    $ImageAdress=$imageRes['img_print_adress'];
                                    $LotPageAdress=$imageRes['page_adress'];
                                endwhile;
                                echo"<a href='{$LotPageAdress}'><div class='ord-div'>
                                    <img class='lot-img' src='../{$ImageAdress}'></img>
                                    <span class='lot-name'>{$result['name_print_lot']}</span>
                                    <span class='lot-price'>{$result['price_print']}$</span>
                                </div></a>";
                            endwhile;
                        ?>
                    </div>
                <!-- end page content -->
            </div>
        </main>
        <footer>
            <div class="footer-div">
                <div class="foot-1">
                <?php
                if($_SESSION['user']!=""){
                    echo"
                <ul class='footer-menu-list'>
                    <li><a id='footer-menu-list-element' href='../index.php'>Главная</a></li>
                    <li><a id='footer-menu-list-element' href='catalog.php'>Каталог</a></li>
                    <li><a id='footer-menu-list-element'href='print.php'>Печать</a></li>
                    <li><a id='footer-menu-list-element' href='about_us.php'>О нас</a></li>
                    <li></li>
                </ul>";}
                else{
                    echo"
                    <ul class='footer-menu-list'>
                    <li><a id='footer-menu-list-element' href='../index.php'>Главная</a></li>
                    <li><a id='footer-menu-list-element' href='about_us.php'>О нас</a></li>
                    <li></li>
                </ul>";
                }
                ?>
                </div>
                <div class="foot-2">
                    
                </div>
                <div class="foot-3">
                    <a class="vk-link" href="https://vk.com"></a>
                    <a class="twit-link" href="https://twitter.com"></a>
                    <a class="inst-link" href="https://instagram.com"></a>
                </div>
            </div>
        </footer>
    </body>
</html>