-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 20 2017 г., 17:56
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
(1, 'admin', '3a3bc4a8a77d9db2e79a8204c6c86105', 'LOLOeerr', 'Qfhfjree', 'male', 15, '2007-04-08', '89185132496', '21345', 1, 0, 1, 'adminScreenshot_6.png'),
(2, 'admin12', '!!QQwer', 'LOLOeerr', 'Qfhfjree', 'male', 18, '2007-04-08', '89185132496', '21345', 1, 1, 0, 'admin12Screenshot_8.png'),
(3, 'asdm', '!!qwerDF', 'adsd', 'eqweqw', 'male', 99, '1998-08-10', '89185132456', 'a24fd', 1, 0, 1, 'asdmScreenshot_22.png'),
(4, '2ewqem', 'Sdfk!!QW', 'saDasda', 'fasfsadfas', 'male', 28, '1998-08-10', '89185132456', 'asdmf', 0, 1, 1, '2ewqemScreenshot_1.png'),
(5, 'asmfd2', 'SDD!!sdas', 'sada', 'sda', 'male', 12, '1997-08-10', '12312312312', 'dsadd', 1, 1, 0, 'asmfd2Screenshot_1.png'),
(6, 'admin4', '!!QweASfdsa', 'wqeqwe', 'eqweqwe', 'male', 12, '1998-08-10', '89185132456', '12345', 1, 0, 0, 'admin4Screenshot_16.png'),
(7, 'adminNet', 'weqw!!Qweqre', 'fasdf', 'dsafasd', 'male', 10, '1998-08-10', '89185132456', '12345', 1, 1, 0, 'Screenshot_3.png'),
(8, 'admin23', 'ce0a88b4bf24226b4ebdd3569ee18212', 'wqerqweq', 'refdasa', 'female', 12, '1998-08-10', '89185132456', 'qwe35', 1, 0, 1, 'Screenshot_15.png'),
(9, 'dsfdgdf', '97a18a67ef32d890950b716357b920e9', 'rwer', 'rweqrqe', 'male', 32, '1998-08-10', '12312312312', '12345', 0, 1, 0, '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
