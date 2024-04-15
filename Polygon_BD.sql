-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 19 2021 г., 22:33
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Polygon_BD`
--

-- --------------------------------------------------------

--
-- Структура таблицы `models_list`
--

CREATE TABLE `models_list` (
  `model_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tags` text NOT NULL,
  `price` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `img_adress` text NOT NULL,
  `img_adress2` text NOT NULL,
  `img_adress3` text NOT NULL,
  `file_adress` text NOT NULL,
  `file_size` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `models_list`
--

INSERT INTO `models_list` (`model_id`, `name`, `tags`, `price`, `login`, `img_adress`, `img_adress2`, `img_adress3`, `file_adress`, `file_size`) VALUES
(1, 'Revolver', '#revolver #револьвер #weapon#оружие #пушка#ствол#model #3d #3ds #3ds Max#3dsmax#.max#модель#Admin#огнестрел#огнестрельное#патрон', 10, 'Admin', 'lots/revolver/revolver_1920x1080_2.jpg', 'lots/revolver/revolver_1920x1080_1.jpg', 'lots/revolver/revolvers_1920x1080_Arnold_1.jpg', 'lots/revolver/revolver.max', '2,92Mb'),
(2, 'Future tank', '#3d#3ds#3d max#max#tank#weapon#machine#танк#оружие#будующее#future#model#модель', 40, 'Admin', 'lots/future_tank/future_tank_image_4.jpg', 'lots/future_tank/future_tank_image_4.jpg', 'lots/future_tank/future_tank_image_4.jpg', 'lots/future_tank/future_tank_render.max', '45Mb'),
(3, 'Clock', '#3d#3ds#3d max#max#clock#model#часы#модель#3д#часики#быт#время#стрелки#стекло#металл', 20, 'Admin', 'lots/Clock/Clock1.jpg', 'lots/Clock/Clock3.jpg', 'lots/Clock/Clock5.jpg', 'lots/Clock/Clock.max', '7,63Mb'),
(4, 'Green Tank', '#3d#3ds#3d max#max#model#tank#green#metall#weapon#3д#такн#модель#металл#зеленый#гусеницы#ствол', 50, 'Admin', 'lots/Green_tank/tank_2_render_image_2.jpg', 'lots/Green_tank/tank_2_render_image_1.jpg', 'lots/Green_tank/tank_2_render_image_3.jpg', 'lots/Green_tank/Green_tank.max', '209Mb'),
(5, 'Дом', '#3д#дом#модель#model#house#3D#строение', 10, 'Admin', 'lots/house/House1.jpg', 'lots/house/House2.jpg', 'lots/house/House1.jpg', 'lots/house/House.max', '1,03Mb'),
(6, 'Скорпион', '3д модель model 3D scorpion скорпион оружие робот зверь животное robot animal weapon 3d', 300, 'Admin', 'lots/Скорпион/1.jpg', 'lots/Скорпион/2.jpg', 'lots/Скорпион/1.jpg', 'lots/Скорпион/Scorpion.max', '6,08Mb'),
(7, 'Cube', '#3d#cube#model#3ds#max#кубик#3д#модель', 5, 'Admin', 'lots/Cube/Куб_1024x819.jpg', 'lots/Cube/Куб_1539x1229.jpg', 'lots/Cube/Куб_4096x3277.jpg', 'lots/Cube/Cube.max', '2,32MB'),
(8, 'Bronze Sword', '#3d #weapon #3ds #sword bronze#max#оружие#меч#3д#холодное', 200, 'Admin', 'lots/Bronze_Sword/Sword6image2-1366.jpg', 'lots/Bronze_Sword/Sword6image3.jpg', 'lots/Bronze_Sword/Sword6image1.jpg', 'lots/Bronze_Sword/Bronze-Sword.max', '3,29'),
(9, 'Green Robot', '3d_weapon_robot_green_max#3д#робот#оружие#max', 113, 'Admin', 'lots/Green_Robot/Robot8.jpg', 'lots/Green_Robot/Robot4.jpg', 'lots/Green_Robot/Robot5.jpg', 'lots/Green_Robot/Green_Robot.max', '18'),
(10, 'Катана', '3d_weapon_models_katana#оружие#3д#катана#меч#япония#азия#азиат#холодное', 214, 'Admin', 'lots/Katana/Katana3.jpg', 'lots/Katana/Katana5.jpg', 'lots/Katana/Katana4.jpg', 'lots/Katana/Katana.max', '1,07');

-- --------------------------------------------------------

--
-- Структура таблицы `model_for_print`
--

CREATE TABLE `model_for_print` (
  `id_print_lot` int(11) NOT NULL,
  `name_print_lot` varchar(50) NOT NULL,
  `tags_print_lot` text NOT NULL,
  `price_print` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `img_print_adress` text NOT NULL,
  `page_adress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `model_for_print`
--

INSERT INTO `model_for_print` (`id_print_lot`, `name_print_lot`, `tags_print_lot`, `price_print`, `login`, `img_print_adress`, `page_adress`) VALUES
(1, 'Cube', '#cube#for print#for_print#3d#model', 20, 'Admin', 'lots/Cube_print/Cube_for_print1.png', 'CubePrintLotPage.php'),
(2, 'Sphere', '#sphere#3d#model#print', 20, 'Admin', 'lots/sphere_print/Sphere1.png', 'SpherePrintLotPage.php'),
(3, 'Conus', '#conus', 20, 'Admin', 'lots/conus_print/Conus1.png', 'ConusPrintLotPage.php');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_ord` int(11) NOT NULL,
  `us_id` int(11) NOT NULL,
  `name_print_lot` varchar(50) NOT NULL,
  `price_print` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_ord`, `us_id`, `name_print_lot`, `price_print`) VALUES
(3, 2, 'Cube', 20),
(4, 2, 'Sphere', 20),
(5, 2, 'Conus', 20),
(8, 4, 'Cube', 20);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `us_id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`us_id`, `login`, `email`, `password`) VALUES
(1, 'Creator', 'admin@gmail.com', '12345'),
(2, 'Admin', 'admin@gmail.com', '123456'),
(3, 'sdfsdfsdf', 'pat@gmail.com', '12u3f32174237d'),
(4, 'Nikita', 'nidmipat@gmail.com', 'Patrikeev');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `models_list`
--
ALTER TABLE `models_list`
  ADD PRIMARY KEY (`model_id`),
  ADD KEY `price` (`price`),
  ADD KEY `login` (`login`);

--
-- Индексы таблицы `model_for_print`
--
ALTER TABLE `model_for_print`
  ADD PRIMARY KEY (`id_print_lot`),
  ADD KEY `login` (`login`),
  ADD KEY `name_print_lot` (`name_print_lot`),
  ADD KEY `price_print` (`price_print`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_ord`),
  ADD KEY `us_id` (`us_id`),
  ADD KEY `name_print_lot` (`name_print_lot`),
  ADD KEY `price_print` (`price_print`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`us_id`),
  ADD KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `models_list`
--
ALTER TABLE `models_list`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `model_for_print`
--
ALTER TABLE `model_for_print`
  MODIFY `id_print_lot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_ord` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `models_list`
--
ALTER TABLE `models_list`
  ADD CONSTRAINT `models_list_ibfk_1` FOREIGN KEY (`login`) REFERENCES `users` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `model_for_print`
--
ALTER TABLE `model_for_print`
  ADD CONSTRAINT `model_for_print_ibfk_1` FOREIGN KEY (`login`) REFERENCES `users` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`us_id`) REFERENCES `users` (`us_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`name_print_lot`) REFERENCES `model_for_print` (`name_print_lot`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`price_print`) REFERENCES `model_for_print` (`price_print`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
