-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Час створення: Гру 05 2016 р., 11:15
-- Версія сервера: 10.1.10-MariaDB
-- Версія PHP: 7.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `yii2eshop`
--

-- --------------------------------------------------------

--
-- Структура таблиці `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `keywords`, `description`) VALUES
(1, 0, 'Sportswear', NULL, NULL),
(2, 0, 'Mens', NULL, NULL),
(3, 0, 'Womens', NULL, NULL),
(4, 1, 'Nike', '', ''),
(5, 1, 'Under Armour', NULL, NULL),
(6, 1, 'Adidas', NULL, NULL),
(7, 1, 'Puma', NULL, NULL),
(8, 1, 'ASICS', NULL, NULL),
(9, 2, 'Fendi', NULL, NULL),
(10, 2, 'Guess', NULL, NULL),
(11, 2, 'Valentino', NULL, NULL),
(12, 2, 'Dior', NULL, NULL),
(13, 2, 'Versace', NULL, NULL),
(14, 2, 'Armani', NULL, NULL),
(15, 2, 'Prada', NULL, NULL),
(16, 2, 'Dolce and Gabbana', NULL, NULL),
(17, 2, 'Chanel', NULL, NULL),
(18, 2, 'Gucci', NULL, NULL),
(19, 3, 'Fendi', NULL, NULL),
(20, 3, 'Guess', NULL, NULL),
(21, 3, 'Valentino', NULL, NULL),
(22, 3, 'Dior', NULL, NULL),
(23, 3, 'Versace', NULL, NULL),
(24, 0, 'Kids', NULL, NULL),
(25, 0, 'Fashion', NULL, NULL),
(26, 0, 'Households', NULL, NULL),
(27, 0, 'Interiors', NULL, NULL),
(28, 0, 'Clothing', NULL, NULL),
(29, 0, 'Bags', 'сумки ключевики...', 'сумки опис...'),
(30, 0, 'Shoes', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `filePath` varchar(400) NOT NULL,
  `itemId` int(11) DEFAULT NULL,
  `isMain` tinyint(1) DEFAULT NULL,
  `modelName` varchar(150) NOT NULL,
  `urlAlias` varchar(400) NOT NULL,
  `name` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `image`
--

INSERT INTO `image` (`id`, `filePath`, `itemId`, `isMain`, `modelName`, `urlAlias`, `name`) VALUES
(1, 'Products/Product8/cdbaf6.jpg', 8, 1, 'Product', '4af80e8b55-1', ''),
(2, 'Products/Product1/e2a639.jpg', 1, 1, 'Product', 'f250a7fd49-1', ''),
(3, 'Products/Product1/564ffb.jpg', 1, NULL, 'Product', '1d25569a59-2', ''),
(4, 'Products/Product1/5dbddf.jpg', 1, NULL, 'Product', '3993ad4bed-3', ''),
(5, 'Products/Product1/15e64d.jpg', 1, NULL, 'Product', '4b4d10deba-4', ''),
(6, 'Products/Product1/2ffc0d.jpg', 1, NULL, 'Product', 'fa5194235a-5', ''),
(7, 'Products/Product1/497c9d.jpg', 1, NULL, 'Product', 'a9673443e4-6', ''),
(8, 'Products/Product2/facece.jpg', 2, 1, 'Product', '4208518089-1', ''),
(9, 'Products/Product2/e5b404.jpg', 2, NULL, 'Product', '4d998b6f7d-2', ''),
(10, 'Products/Product2/ed6f15.jpg', 2, NULL, 'Product', '4abae0d766-3', ''),
(11, 'Products/Product2/bd3730.jpg', 2, NULL, 'Product', 'd3f7faed3d-4', ''),
(12, 'Products/Product2/433f48.jpg', 2, NULL, 'Product', 'af5653d2aa-5', ''),
(13, 'Products/Product3/8b8bb8.jpg', 3, 1, 'Product', '9bd6d0a75f-1', ''),
(14, 'Products/Product4/c5c0cb.jpg', 4, 1, 'Product', 'b4f4fe6daa-1', ''),
(15, 'Products/Product5/106d31.jpg', 5, 1, 'Product', '039f4f8f0f-1', ''),
(16, 'Products/Product6/b9cb74.jpg', 6, 0, 'Product', '9854ab0539-2', ''),
(17, 'Products/Product7/46c2c1.jpg', 7, 1, 'Product', '97f7b155c6-1', ''),
(18, 'Products/Product6/7a41f0.jpg', 6, 1, 'Product', 'fa6a5c98ad-1', ''),
(19, 'Products/Product9/9cd75c.jpg', 9, 1, 'Product', 'fbb513c71b-1', ''),
(20, 'Products/Product10/083548.jpg', 10, 1, 'Product', '1bb7147aaf-1', ''),
(21, 'Products/Product11/4b3472.jpg', 11, 1, 'Product', 'a53f07ca01-1', ''),
(22, 'Products/Product12/01f843.jpg', 12, 1, 'Product', '746232d7f1-1', ''),
(23, 'Products/Product13/09036d.jpg', 13, 1, 'Product', 'afe9283257-1', '');

-- --------------------------------------------------------

--
-- Структура таблиці `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1480775082),
('m140622_111540_create_image_table', 1480775125),
('m140622_111545_add_name_to_image_table', 1480775126);

-- --------------------------------------------------------

--
-- Структура таблиці `orderr`
--

CREATE TABLE `orderr` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `qty` int(10) NOT NULL,
  `sum` float NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `orderr`
--

INSERT INTO `orderr` (`id`, `created_at`, `updated_at`, `qty`, `sum`, `status`, `name`, `email`, `phone`, `address`) VALUES
(1, '2016-11-28 19:45:13', '2016-11-28 19:45:13', 6, 430, '1', '22', '22@33.44', '22334455', '222222'),
(2, '2016-11-28 19:48:20', '2016-11-28 19:48:20', 8, 650, '0', '33', '33@33.44', '33334455', '333333'),
(3, '2016-11-28 20:22:40', '2016-11-28 20:22:40', 8, 620, '0', '44', '44@33.44', '44334455', '44444'),
(4, '2016-11-29 13:08:33', '2016-12-01 13:08:33', 5, 350, '1', '22-22', '22@33.44', '22334455', '222A222'),
(5, '2016-11-29 13:19:38', '2016-11-29 13:19:38', 3, 168, '0', '22', '22@33.44', '22334455', '222222'),
(6, '2016-11-29 13:25:20', '2016-11-29 13:25:20', 1, 70, '0', '33', '33@33.44', '33334455', '333333'),
(7, '2016-11-29 13:33:07', '2016-11-29 13:33:07', 1, 80, '0', '44', '44@33.44', '44334455', '44444'),
(8, '2016-11-29 13:43:13', '2016-11-29 13:43:13', 3, 240, '0', '22', 'oylitaorel@gmail.com', '22334455', '222222'),
(9, '2016-11-29 13:48:27', '2016-11-29 13:48:27', 3, 255, '0', 'oylita', 'oylitaorel@gmail.com', '33334455', '333333'),
(10, '2016-11-29 13:51:06', '2016-11-29 13:51:06', 5, 400, '0', 'oylita', 'oylitaorel@gmail.com', '22334455', '222222'),
(11, '2016-11-29 13:52:58', '2016-11-29 13:52:58', 1, 70, '0', 'oylita', 'oylitaorel@gmail.com', '44334455', '44444'),
(12, '2016-11-29 13:58:06', '2016-11-29 13:58:06', 1, 100, '0', 'oylita', 'oylitaorel@gmail.com', '22334455', '222222'),
(13, '2016-11-29 14:05:35', '2016-11-29 14:05:35', 1, 100, '0', 'oylita', 'oylitaorel@gmail.com', '33334455', '333333'),
(14, '2016-11-29 14:10:10', '2016-11-29 14:10:10', 1, 100, '0', 'oylita', 'oylitaorel@gmail.com', '33334455', '44444'),
(15, '2016-11-29 14:13:13', '2016-11-29 14:13:13', 1, 20, '0', 'oylita', 'oylitaorel@gmail.com', '22334455', '222222'),
(16, '2016-11-29 14:18:12', '2016-11-29 14:18:12', 1, 20, '0', 'oylita', 'oylitaorel@gmail.com', '22334455', '222222'),
(17, '2016-11-29 14:23:09', '2016-11-29 14:23:09', 1, 20, '0', 'oylita', 'oylitaorel@gmail.com', '22334455', '222222'),
(18, '2016-11-29 14:29:38', '2016-11-29 14:29:38', 1, 80, '0', 'dubl', 'oylitaorel@gmail.com', '33334455', '222222'),
(19, '2016-11-29 14:36:07', '2016-11-29 14:36:07', 1, 70, '0', 'oylita', 'oylitaorel@gmail.com', '22334455', '222222'),
(20, '2016-11-29 14:38:08', '2016-11-29 14:38:08', 1, 70, '0', 'oylita', 'oylitaorel@gmail.com', '33334455', '333333'),
(21, '2016-11-29 14:40:35', '2016-11-29 14:40:35', 2, 160, '0', 'dubl', 'oylitaorel@gmail.com', '22334455', '44444'),
(22, '2016-11-29 14:43:46', '2016-11-29 14:43:46', 1, 100, '0', 'oylita', 'oylitaorel@gmail.com', '22334455', '222222'),
(23, '2016-11-29 14:45:42', '2016-11-29 14:45:42', 1, 56, '0', 'oylita', 'oylitaorel@gmail.com', '22334455', '333333'),
(24, '2016-11-29 14:50:51', '2016-11-29 14:50:51', 1, 56, '0', 'dubl', 'oylitaorel@gmail.com', '22334455', '222222'),
(25, '2016-11-29 14:52:03', '2016-11-29 14:52:03', 1, 80, '0', 'dubl', 'oylitaorel@gmail.com', '22334455', '222222'),
(26, '2016-11-29 14:55:33', '2016-11-29 14:55:33', 1, 80, '0', '2222', 'goolyamaxym@ukr.net', '22334455', '222222'),
(27, '2016-11-29 14:58:15', '2016-11-29 14:58:15', 2, 180, '0', 'oylita', 'oylitaorel@gmail.com', '22334455', '222222'),
(28, '2016-11-29 15:46:56', '2016-11-29 15:46:56', 1, 85, '0', 'dubl', 'oylitaorel@gmail.com', '22334455', '222222'),
(29, '2016-11-29 15:51:35', '2016-11-29 15:51:35', 1, 85, '0', 'dubl', 'oylitaorel@gmail.com', '22334455', '222222');

-- --------------------------------------------------------

--
-- Структура таблиці `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `qty_item` int(11) NOT NULL,
  `sum_item` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `name`, `price`, `qty_item`, `sum_item`) VALUES
(1, 1, 4, 'Блуза Tom', 70, 2, 140),
(2, 1, 3, 'Блуза Mango. Маруга.', 20, 1, 20),
(3, 1, 7, 'Кардиган OnlyOn', 85, 2, 170),
(4, 1, 6, 'Кардиган Levi''s', 100, 1, 100),
(5, 2, 4, 'Блуза Tom', 70, 2, 140),
(6, 2, 7, 'Кардиган OnlyOn', 85, 2, 170),
(7, 2, 6, 'Кардиган Levi''s', 100, 1, 100),
(8, 2, 5, 'Блуза Kira Plastinina', 80, 3, 240),
(9, 3, 4, 'Блуза Tom', 70, 3, 210),
(10, 3, 7, 'Кардиган OnlyOn', 85, 2, 170),
(11, 3, 5, 'Блуза Kira Plastinina', 80, 3, 240),
(12, 4, 3, 'Блуза Mango. Маруга.', 20, 1, 20),
(13, 4, 4, 'Блуза Tom', 70, 1, 70),
(14, 4, 6, 'Кардиган Levi''s', 100, 1, 100),
(15, 4, 5, 'Блуза Kira Plastinina', 80, 2, 160),
(16, 5, 2, 'Джинси MR520 MR, амбіційний східноєвропейський бренд ', 56, 3, 168),
(17, 6, 4, 'Блуза Tom', 70, 1, 70),
(18, 7, 5, 'Блуза Kira Plastinina', 80, 1, 80),
(19, 8, 4, 'Блуза Tom', 70, 1, 70),
(20, 8, 7, 'Кардиган OnlyOn', 85, 2, 170),
(21, 9, 7, 'Кардиган OnlyOn', 85, 3, 255),
(22, 10, 5, 'Блуза Kira Plastinina', 80, 5, 400),
(23, 11, 4, 'Блуза Tom', 70, 1, 70),
(24, 12, 6, 'Кардиган Levi''s', 100, 1, 100),
(25, 13, 6, 'Кардиган Levi''s', 100, 1, 100),
(26, 14, 6, 'Кардиган Levi''s', 100, 1, 100),
(27, 15, 3, 'Блуза Mango. Маруга.', 20, 1, 20),
(28, 16, 3, 'Блуза Mango. Маруга.', 20, 1, 20),
(29, 17, 3, 'Блуза Mango. Маруга.', 20, 1, 20),
(30, 18, 5, 'Блуза Kira Plastinina', 80, 1, 80),
(31, 19, 4, 'Блуза Tom', 70, 1, 70),
(32, 20, 4, 'Блуза Tom', 70, 1, 70),
(33, 21, 5, 'Блуза Kira Plastinina', 80, 2, 160),
(34, 22, 6, 'Кардиган Levi''s', 100, 1, 100),
(35, 23, 2, 'Джинси MR520 MR, амбіційний східноєвропейський бренд ', 56, 1, 56),
(36, 24, 2, 'Джинси MR520 MR, амбіційний східноєвропейський бренд ', 56, 1, 56),
(37, 25, 5, 'Блуза Kira Plastinina', 80, 1, 80),
(38, 26, 5, 'Блуза Kira Plastinina', 80, 1, 80),
(39, 27, 5, 'Блуза Kira Plastinina', 80, 1, 80),
(40, 27, 6, 'Кардиган Levi''s', 100, 1, 100),
(41, 28, 7, 'Кардиган OnlyOn', 85, 1, 85),
(42, 29, 7, 'Кардиган OnlyOn', 85, 1, 85);

-- --------------------------------------------------------

--
-- Структура таблиці `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` text,
  `price` float NOT NULL DEFAULT '0',
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'no-image.png',
  `hit` enum('0','1') NOT NULL DEFAULT '0',
  `new` enum('0','1') NOT NULL DEFAULT '0',
  `sale` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `content`, `price`, `keywords`, `description`, `img`, `hit`, `new`, `sale`) VALUES
(1, 4, 'Джинси Garcia', '<p>Чудові джинси вінтажно-блакитного кольору.</p>\r\n', 10, '', '', 'product1.jpg', '1', '0', '0'),
(2, 4, 'Джинси MR520 MR, амбіційний східноєвропейський бренд ', '<p>MR520 - амбіційний східноєвропейський бренд.</p>\r\n', 56, '', '', 'product2.jpg', '1', '0', '0'),
(3, 9, 'Блуза Mango. Синя.', '<p>Іспанський бренд модного одягу &quot;Mango&quot;.</p>\r\n', 20, '', '', 'product3.jpg', '1', '1', '0'),
(4, 21, 'Блуза Tom', '<p>Блуза Tom</p>\r\n', 70, '', '', 'product4.jpg', '1', '0', '1'),
(5, 25, 'Блуза Kira Plastinina', '<p>Блуза Kira Plastinina</p>\r\n', 80, '', '', 'product5.jpg', '1', '0', '0'),
(6, 28, 'Кардиган Levi''s', '<p>Кардиган Levi&#39;s</p>\r\n', 100, '', '', 'product6.jpg', '1', '0', '0'),
(7, 28, 'Кардиган OnlyOn', '<p>Кардиган OnlyOn</p>\r\n', 85, '', '', 'product7.jpg', '1', '1', '0'),
(8, 26, 'Брюки SK. Чорні.', '<h2><strong>Брюки SK</strong></h2>\r\n\r\n<p>Брюки SK. Супер.</p>\r\n\r\n<p><img alt="" src="/web/upload/global/nig.jpg" style="height:270px; width:246px" /></p>\r\n', 97, '', '', 'product8.jpg', '1', '1', '0'),
(9, 26, 'Брюки Kira', '<p>Брюки Kira</p>\r\n', 0, '', '', 'product9.jpg', '0', '1', '1'),
(10, 29, 'Сумка GUSSACI', '<p>Сумка GUSSACI</p>\r\n', 200, '', '', 'product10.jpg', '1', '1', '1'),
(11, 29, 'Сумка Michael Kors', '<p>Сумка Michael Kors</p>\r\n', 110, '', '', 'product11.jpg', '0', '1', '1'),
(12, 29, 'Сумка Michael Kors 2', '<p>Сумка Michael Kors 2</p>\r\n', 0, '', '', 'product12.jpg', '0', '0', '1'),
(13, 29, 'Сумка Michael Kors 3', '<p>Сумка Michael Kors 3</p>\r\n', 0, '', '', 'no-image.png', '0', '0', '0');

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `auth_key`) VALUES
(1, 'admin', '$2y$13$VKpc2fB6lleKDXLGZyYE9OiPbGDxUTKtYco.c1EdIYmR7SnlSRTyy', 'z_aqnH8muZ39uQzCBloK6-cRx7pW2wVC');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Індекси таблиці `orderr`
--
ALTER TABLE `orderr`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT для таблиці `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT для таблиці `orderr`
--
ALTER TABLE `orderr`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT для таблиці `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT для таблиці `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
