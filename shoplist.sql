-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Окт 24 2018 г., 21:24
-- Версия сервера: 5.7.23-0ubuntu0.18.04.1
-- Версия PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shoplist`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `category_order`
--

CREATE TABLE `category_order` (
  `id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `serial_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `owners`
--

CREATE TABLE `owners` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `apikey` text NOT NULL,
  `enabled` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `shop`
--

INSERT INTO `shop` (`id`, `name`) VALUES
(1, 'Линия'),
(6, 'Лента'),
(12, 'Ашан');

-- --------------------------------------------------------

--
-- Структура таблицы `shopping`
--

CREATE TABLE `shopping` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `sum` int(11) DEFAULT NULL,
  `shop_id` int(11) NOT NULL,
  `complete` int(11) DEFAULT '0',
  `list_id` int(11) NOT NULL,
  `time` time NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `shopping`
--

INSERT INTO `shopping` (`id`, `date`, `sum`, `shop_id`, `complete`, `list_id`, `time`, `owner_id`) VALUES
(1, '2018-10-08', NULL, 1, 0, 2, '06:11:17', 2),
(4, '2018-09-30', NULL, 6, 0, 7, '17:11:00', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_list`
--

CREATE TABLE `shop_list` (
  `id` int(11) NOT NULL,
  `product_name` text CHARACTER SET utf8 NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `category_id` int(11) DEFAULT NULL,
  `complete` int(11) DEFAULT NULL,
  `list_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `shop_list`
--

INSERT INTO `shop_list` (`id`, `product_name`, `quantity`, `category_id`, `complete`, `list_id`) VALUES
(1, 'Хлеб', 2, 2, NULL, 2),
(3, 'Макароны', 1, NULL, NULL, 2),
(4, 'Макароны', 1, NULL, NULL, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category_order`
--
ALTER TABLE `category_order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `shopping`
--
ALTER TABLE `shopping`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `shop_list`
--
ALTER TABLE `shop_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `shopping`
--
ALTER TABLE `shopping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `shop_list`
--
ALTER TABLE `shop_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
