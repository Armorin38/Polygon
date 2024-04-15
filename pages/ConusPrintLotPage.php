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
        <link rel="stylesheet" href="../styles/slider_style.css"></link>
        <link rel="stylesheet" href="../styles/additional_catalog_style.css"></link>
        <link rel="stylesheet" href="../styles/additional_search_style.css"></link>
        <link rel="stylesheet" href="../styles/additional_print_style.css"></link>
        <link rel="icon" href="../img/Polygon_mini_logo_2_1.png"></link>
        <!--Подключение шрифтов-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@300&display=swap" rel="stylesheet">

        <!-- scripts -->
        <script src="../JS_scripts/JQuery.js"></script>
        <script src="../JS_scripts/Three.js"></script>
        <script src="../JS_scripts/transition.js"></script>
        <script src="../JS_scripts/sliderScripts.js"></script>
        <script src="../JS_scripts/menuHideShowScript.js"></script>
        <script src="../JS_scripts/ThreeCube.js"></script>
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
                <div id="window-for-obj">
                    <div id="cube"></div>
                </div>
                
                <!-- end page content -->
                <script defer>
                   const geometry = new THREE.ConeBufferGeometry( 15, 30, 32 );
                    const scene = new THREE.Scene();

                    scene.background = new THREE.Color(0x282c34);
                    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 10000);

                    const renderer = new THREE.WebGLRenderer();
                    container = document.getElementById('window-for-obj');
                    renderer.setSize($(container).width(), $(container).height());
                    document.getElementById('cube').appendChild(renderer.domElement);

                    const material = new THREE.MeshPhongMaterial({
                        color: 0xdaa520,
                        emissive: 0x000000,
                        specular: 0xbcbcbc,
                        });

                    const mesh = new THREE.Mesh(geometry, material);

                    mesh.scale.x = 0.1;
                    mesh.scale.y = 0.1;
                    mesh.scale.z = 0.1;

                    scene.add(mesh);

                    camera.position.z = 5;

                    const frontSpot = new THREE.SpotLight(0xeeeece);
                    frontSpot.position.set(1000, 1000, 1000);
                    scene.add(frontSpot);

                    const frontSpot2 = new THREE.SpotLight(0xddddce);
                    frontSpot2.position.set(-500, -500, -500);
                    scene.add(frontSpot2);

                    const animate = function () {
                    requestAnimationFrame(animate);

                    mesh.rotation.x += 0.000;
                    mesh.rotation.y += 0.005;
                    mesh.rotation.z += 0.005;

                    renderer.render(scene, camera);
                    };

                    animate();

                </script>
                <div class='info-lotPrint'> <br><span class='lot-namePrint'>Название: Conus</span>
                <br><span class='autor-lotPrint'>Автор: Admin</span>   
                </div>
                <div class='sell-div'>
                    <form action='PrintOrder.php' method='post'>
                        <input type='hidden' name='lotName' value="Conus"></input>
                        <input type='hidden' name='username' value='<?echo $Username?>'></input>
                    <input class='download-link-2' type='submit' name='submit' value='Заказать печать'></input></form>
                </div>
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