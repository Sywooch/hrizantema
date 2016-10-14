-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Окт 14 2016 г., 08:39
-- Версия сервера: 5.7.15
-- Версия PHP: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hrizantema`
--

-- --------------------------------------------------------

--
-- Структура таблицы `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `createTime` datetime NOT NULL,
  `verificationHash` text,
  `active` tinyint(1) NOT NULL,
  `authKey` varchar(255) DEFAULT NULL,
  `accessToken` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `User`
--

INSERT INTO `User` (`id`, `name`, `password`, `email`, `createTime`, `verificationHash`, `active`, `authKey`, `accessToken`) VALUES
(1, 'fess_zorro', '439748b36d3da3ec077e29b69efde14b', 'vorobyev2.it@gmail.com', '2016-10-26 08:00:00', '', 1, '', ''),
(2, 'qwerty', '439748b36d3da3ec077e29b69efde14b', 'voroby3v.it@gmail.com', '2016-10-10 11:06:03', 'o%2BMOYpeYRzw1uEwHkzGNRJZbUSshL3qQ9Chvdc1tzX4%3D', 0, NULL, NULL),
(4, 'Михаил Воробьев', NULL, NULL, '2016-10-12 14:01:58', NULL, 1, 'google_oauth-113445715136324886195', NULL),
(5, 'qwerty2', '439748b36d3da3ec077e29b69efde14b', 'vorobye3v.it@gmail.com', '2016-10-13 14:47:08', '4FTu67RKF0AjBmKOVxc1jnLkkjfLOsb2IV5c%2FNOjDx4%3D', 1, NULL, NULL),
(6, 'qwerty3', '439748b36d3da3ec077e29b69efde14b', 'vorobyev.it@gmail.com', '2016-10-13 14:57:22', '0aBXEol9oDGDswij6GTC%2FC6LSbkly3HlfkH19YdxeGM%3D', 1, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
