<?php 
    session_start();
    require_once('../BD_connect.php');
    if($_SESSION['user']==""){
        header('Location: ../index.php');
    }
?>

<html>
    <head>
        <!-- title -->
        <title>Polygon</title>
        <link rel="icon" href="../img/Polygon_mini_logo_2_1.png"></link>
        <!-- Стили -->
        <link rel="stylesheet" href="../styles/style.css"></link>
        <link rel="stylesheet" href="../styles/additional_catalog_style.css"></link>
        <link rel="stylesheet" href="../styles/additional_search_style.css"></link>
        <!--Подключение шрифтов-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@300&display=swap" rel="stylesheet">
        <!--подключение JQuery-->
        <!-- <script src = "https://code.jquery.com/jquery-1.11.2.js"></script> -->
        <script src="../JS_scripts/JQuery.js"></script>
        <script src="../JS_scripts/transition.js"></script>
        <script src="../JS_scripts/sliderScripts.js"></script>
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
                    <!-- <div class="wrap">
                        <div class="search">
                            <input type="text" class="searchTerm" placeholder="Что вы хотите найти?">
                            <button type="submit" class="searchButton">
                                <i class="fa fa-search">Поиск</i>
                            </button>
                        </div>
                    </div> -->
                    <div id="searchButton" onclick="goToSearch()" ></div>
                    <br>
                <div class='lots-window'>
                <?
                $sql = mysqli_query($con,"SELECT * FROM `models_list`");
		        while ($result = mysqli_fetch_array($sql)):
		        echo "  <div class='lot'>
                            <img id='lot-img' src='../{$result['img_adress']}'></img>
                            <br>
                            <div class='lot-info'>
                            <span class='author'>автор: <span class='author-name'>{$result['login']}</span><br>
                            <span class='lot-name'>{$result['name']}</span><br>
                            <button class='lot-btn'><a href='LotPage.php?id={$result['model_id']}'>{$result['price']}$</a></button>
                            </div>
                        </div>";
                endwhile;
                    ?>
                    <!-- lot demo -->

                    <!-- <div class='lot'>
                        <img id='lot-img' src='../lots/revolver/revolver_1920x1080_2.jpg'></img>
                        <br>
                        <div class='lot-info'>
                            <span class='author'>автор <span class='author-name'>Admin</span><br>
                            <span class='lot-name'>Revolver</span><br>
                            <button class='lot-btn'>10$</button>
                        </div>
                    </div> -->

                    <!-- end lot demo -->                    
                        
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