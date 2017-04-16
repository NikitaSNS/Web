-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 16 2017 г., 16:56
-- Версия сервера: 5.7.16
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pract6`
--

-- --------------------------------------------------------

--
-- Структура таблицы `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `content`
--

INSERT INTO `content` (`id`, `name`, `text`) VALUES
(1, 'first_phone', '+7 985 444 90 97'),
(2, 'second_phone', '+7 910 400 14 19'),
(3, 'adress', 'Москва ул мельникова д 5'),
(4, 'about', 'О КОМПАНИИ'),
(5, 'img_text', 'My Drive is the home for all your files. With Google Drive for My Drive is the home for all your files. With Google Drive for My Drive is the home for all your files. With Google Drive for'),
(6, 'li_main', 'Главная'),
(7, 'li_port', 'Портфолио'),
(8, 'li_about', 'О нас'),
(9, 'li_info', 'Информация'),
(10, 'li_link', 'Ссылка'),
(11, 'welcome', 'Добро пожаловать!'),
(12, 'lorem', 'Lorem ipsum My Drive is the home for all your files. With Google Drive for My Drive is the home for all your files. With Google Drive for My Drive is the home for all your files. With Google Drive forMy Drive is the home for all your files. With Google Drive for My Drive is the home for all your files. With Google Drive for My Drive is the home for all your files. With Google Drive forMy Drive is the home for all your files. With Google Drive for My Drive is the home for all your files. With Google Drive for My Drive is the home for all your files. With Google Drive forMy Drive is the home for all your files. With Google Drive for My Drive is the home for all your files. With Google Drive for My Drive is the home for all your files. With Google  '),
(15, 'news', 'Новости:'),
(16, 'data', '01/11/2012'),
(17, 'data_txt', 'Здесь выводится информация при взаимодействии с кнопками «о н #1'),
(20, 'footer', 'ООО \"Название сайта\" 2012'),
(22, 'contacts', 'КОНТАКТЫ:');

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
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `first_name`, `last_name`, `gender`, `age`, `date_of_birth`, `phone`, `password_sms`, `news`, `shares`, `groups`, `is_admin`) VALUES
(1, 'admin', '106', 'LOLOee', 'Qfhfjre', 'male', 12, '2007-04-11', '89185132496', '21345', 0, 0, 1, 1),
(3, 'eerwerw', 'QQ!!er', 'qwerWwe', 'rreqre', 'male', 34, '2000-04-01', '89185132456', 'eerer', 1, 1, 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
