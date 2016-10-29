-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Окт 29 2016 г., 18:59
-- Версия сервера: 5.7.16
-- Версия PHP: 5.6.27

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
-- Структура таблицы `News`
--

CREATE TABLE `News` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `img` text,
  `short_text` text,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `date_news` date NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `accessToken` varchar(32) DEFAULT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `User`
--

INSERT INTO `User` (`id`, `name`, `password`, `email`, `createTime`, `verificationHash`, `active`, `authKey`, `accessToken`, `admin`) VALUES
(1, 'fess_zorro', '439748b36d3da3ec077e29b69efde14b', 'vorobyev2.it@gmail.com', '2016-10-26 08:00:00', '', 1, '', '', 1),
(2, 'qwerty', '439748b36d3da3ec077e29b69efde14b', 'voroby3v.it@gmail.com', '2016-10-10 11:06:03', 'o%2BMOYpeYRzw1uEwHkzGNRJZbUSshL3qQ9Chvdc1tzX4%3D', 0, NULL, NULL, 0),
(4, 'Михаил Воробьев', NULL, NULL, '2016-10-12 14:01:58', NULL, 1, 'google_oauth-113445715136324886195', NULL, 0),
(5, 'qwerty2', '439748b36d3da3ec077e29b69efde14b', 'vorobye3v.it@gmail.com', '2016-10-13 14:47:08', '4FTu67RKF0AjBmKOVxc1jnLkkjfLOsb2IV5c%2FNOjDx4%3D', 1, NULL, NULL, 0),
(6, 'qwerty3', '439748b36d3da3ec077e29b69efde14b', 'vorobyeeev.it@gmail.com', '2016-10-13 14:57:22', '0aBXEol9oDGDswij6GTC%2FC6LSbkly3HlfkH19YdxeGM%3D', 1, NULL, NULL, 0),
(7, 'zorrozorrozorrozorro', '439748b36d3da3ec077e29b69efde14b', 'vorobyegv.it@gmail.com', '2016-10-21 11:27:27', 'b524oovzwlre5EdJx4FFeNVjPRUvOUEUZQMvVKEZke4%3D', 1, NULL, NULL, 0),
(8, 'administrator', '21232f297a57a5a743894a0e4a801fc3', 'vorobyev.it@gmail.com', '2016-10-28 16:23:33', 'srABx10LTHfdMcJOAIEYmortPZSqxLC33Y1iD8dLLeM%3D', 1, NULL, NULL, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `News`
--
ALTER TABLE `News`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT для таблицы `News`
--
ALTER TABLE `News`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
