<?php 
    session_start();
    if($_SESSION['user']==""){
        header('Location: ../index.php');
    }
?>

<html>
    <head>
        <title>Polygon</title>
        <link rel="stylesheet" href="../styles/aditional_style_thanks.css"></link>
        <link rel="icon" href="../img/Polygon_mini_logo_2_1.png"></link>
        <!--Подключение шрифтов-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@300&display=swap" rel="stylesheet">
        <!-- scripts -->
        <script src="../JS_scripts/JQuery.js"></script>
        <script src="../JS_scripts/transition.js"></script>
        
    </head>
    <body>
        <div id="decor-1-up"></div>
        <div id="text-div">
            <h2 id="thanks-text"><span>Благодарим за заказ!</span><br>Ваш заказ очень важен для нас,
                 в ближайшее время с вами свяжется наш сотрудник.</h2>
        </div>
        <a id="back-link" href="print.php">Назад</a>
        <div id="decor-2-down"></div>
    </body>
</html>