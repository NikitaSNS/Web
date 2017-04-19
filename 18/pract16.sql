-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 19 2017 г., 12:34
-- Версия сервера: 5.7.16
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pract16`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `gender` text NOT NULL,
  `age` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone` text NOT NULL,
  `password_sms` text NOT NULL,
  `news` tinyint(1) NOT NULL,
  `shares` tinyint(1) NOT NULL,
  `groups` tinyint(1) NOT NULL,
  `img_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `first_name`, `last_name`, `gender`, `age`, `date_of_birth`, `phone`, `password_sms`, `news`, `shares`, `groups`, `img_path`) VALUES
(1, 'admin', 'W!!qqr', 'LOLOee', 'Qfhfjre', 'female', 16, '2007-04-11', '89185132496', '21345', 1, 1, 1, 'adminScreenshot_1.png'),
(2, 'admin12', '!!QQwer', 'Qqweqwe', 'wqeqweqwe', 'male', 12, '1998-08-10', '89185132496', '123d5', 0, 1, 0, 'admin12Screenshot_8.png'),
(3, 'asdm', '!!qwerDF', 'adsd', 'eqweqw', 'male', 99, '1998-08-10', '89185132456', 'a24fd', 1, 0, 1, 'asdmScreenshot_22.png'),
(4, '2ewqem', 'Sdfk!!QW', 'saDasda', 'fasfsadfas', 'male', 28, '1998-08-10', '89185132456', 'asdmf', 0, 1, 1, '2ewqemScreenshot_1.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
