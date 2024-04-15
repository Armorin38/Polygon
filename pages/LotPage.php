<?php 
    session_start();
    require('../BD_connect.php');
    if($_SESSION['user']==""){
        header('Location: ../index.php');
    }
?>

<html>
    <head>
        <title>Polygon</title>
        <link rel="stylesheet" href="../styles/style.css"></link>
        <link rel="stylesheet" href="../styles/slider_style.css"></link>
        <link rel="icon" href="../img/Polygon_mini_logo_2_1.png"></link>
        <!--Подключение шрифтов-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@300&display=swap" rel="stylesheet">

        <!-- scripts -->
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
                    <li id='menu-list-element' id='active'><a href='index.php'>Главная</a></li>
                    <li id='menu-list-element'><a href='pages/about_us.php'>О нас</a></li>
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
                <?php 
                $id=$_GET['id'];
                if($_SESSION['user']=="Admin"){
                if($id!="" || $id>0){
                    $sql = mysqli_query($con,"SELECT * FROM `models_list` WHERE model_id='$id'");
                    while ($result = mysqli_fetch_array($sql)):
                echo"
                <div class='slider-div'>
                
                        <div id='slider'>
                        <a href='#' class='control_next'>></a>
                        <a href='#' class='control_prev'><</a>
                        <ul>
                            <li><img id='lot-img' src='../{$result['img_adress']}'></img></li>
                            <li><img id='lot-img' src='../{$result['img_adress2']}'></img></li>
                            <li><img id='lot-img' src='../{$result['img_adress3']}'></img></li>
                            
                        </ul>  
                        </div>
                        <div class='Instead-slider'>
                            <img id='Instead-lot-img' src='../{$result['img_adress']}'>
                            <img id='Instead-lot-img' src='../{$result['img_adress2']}'>
                            <img id='Instead-lot-img' src='../{$result['img_adress3']}'>
                        </div>
                </div>      <div class='info-lot'> <br><span class='lot-name'>Название: {$result['name']}</span>
                <br><span class='autor-lot'>Автор: {$result['login']}</span><br>
                <span class='lot-size'>Размер:{$result['file_size']}</span>    
                </div>
                <div class='sell-div'><a class='download-link' href='../{$result['file_adress']}' download='{$result['name']}.max'>Скачать</a></div>  "; 
            endwhile;
        }
        else{
            echo"<div class='id-error-div'><span class='id-error'>Oops!<br>This id not found</span></div>";
        }
    }
    else{
        if($id!="" || $id>0){
            $sql = mysqli_query($con,"SELECT * FROM `models_list` WHERE model_id='$id'");
            while ($result = mysqli_fetch_array($sql)):
        echo"
        <div class='slider-div'>
        
                <div id='slider'>
                <a href='#' class='control_next'>></a>
                <a href='#' class='control_prev'><</a>
                <ul>
                    <li><img id='lot-img' src='../{$result['img_adress']}'></img></li>
                    <li><img id='lot-img' src='../{$result['img_adress2']}'></img></li>
                    <li><img id='lot-img' src='../{$result['img_adress3']}'></img></li>
                    
                </ul>  
                </div>
        </div>      <div class='info-lot' <br><span class='lot-name'>Название: {$result['name']}</span>
        <br><span class='autor-lot'>Автор: {$result['login']}</span><br>
        <span class='lot-size'>Размер:{$result['file_size']}</span>    
        </div>
        <div class='sell-div'><a class='download-link' href='https://online.sberbank.ru/CSAFront/index.do#/'>Купить за {$result['price']}$</a></div>  "; 
    endwhile;
}
else{
    echo"<div class='id-error-div'><span class='id-error'>Oops!<br>This id not found</span></div>";
}
    }
                ?>
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
                    <li><a id='footer-menu-list-element' href='index.php'>Главная</a></li>
                    <li><a id='footer-menu-list-element' href='pages/catalog.php'>Каталог</a></li>
                    <li><a id='footer-menu-list-element'href='pages/print.php'>Печать</a></li>
                    <li><a id='footer-menu-list-element' href='pages/about_us.php'>О нас</a></li>
                    <li></li>
                </ul>";}
                else{
                    echo"
                    <ul class='footer-menu-list'>
                    <li><a id='footer-menu-list-element' href='index.php'>Главная</a></li>
                    <li><a id='footer-menu-list-element' href='pages/about_us.php'>О нас</a></li>
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