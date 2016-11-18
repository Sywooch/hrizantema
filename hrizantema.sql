-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 18 2016 г., 08:56
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
-- Структура таблицы `Category`
--

CREATE TABLE `Category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `img` text,
  `description` text,
  `color` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Category`
--

INSERT INTO `Category` (`id`, `name`, `img`, `description`, `color`) VALUES
(1, 'Направление подготовки "Парикмахерское искусство"', '', '<p>Курсы для всех! Любой может их закончить</p>\r\n', '#6fa8dc'),
(2, 'Повышение квалификации "Парикмахерское искусство"', '', '<p>Курсы для всех! Любой может их закончить</p>\r\n', '#93c47d'),
(3, 'Направление подготовки "Прикладная эстетика"', '', '<p>Курсы для всех! Любой может их закончить</p>\r\n', '#e06666'),
(4, 'Программы дополнительного профессионального образования', '', '<p>Курсы для всех! Любой может их закончить</p>\r\n', '#29cf3b'),
(5, 'Курсы "Сам себе парикмахер", "Сам себе визажист"', '', '<p>Курсы для всех! Любой может их закончить</p>\r\n', '#7c2424');

-- --------------------------------------------------------

--
-- Структура таблицы `Course`
--

CREATE TABLE `Course` (
  `id` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `name` text NOT NULL,
  `img` text,
  `description` text,
  `duration` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Course`
--

INSERT INTO `Course` (`id`, `id_cat`, `name`, `img`, `description`, `duration`, `price`) VALUES
(3, 1, 'Парикмахер 3-го разряда "на базе 11-ти классов"', '', '<p>Курсы для всех! Любой может их закончить</p>\r\n', 480, '50000'),
(4, 1, 'Парикмахер 4-го разряда "на базе специального образования"', '', '', 240, '24000'),
(5, 1, 'Парикмахер "Мужского зала"', '', '', 90, '10000'),
(6, 1, 'Парикмахер "Женского зала"', '', '', 150, '15000'),
(7, 2, 'Современная классика стрижки, окрашивание волос', '', '', 18, '4000'),
(8, 2, '"Колорист" (базовый курс)', '', '', 32, '7000'),
(9, 2, '"Колорист" "Блондинки - это просто"', '', '', 16, '3000'),
(10, 2, '"Парикмахер-модельер"', '', '', 104, '18000'),
(11, 2, '"Парикмахер 5-го разряда"', '', '', 72, '12000'),
(12, 2, '"От простых форм к сложным" "Плетение" - современный вид укладки', '', '', 12, '2000'),
(13, 2, '"Техники укладки волос волнами (горячим способом)"', '', '', 12, '2500'),
(14, 2, 'Свадебный стилист (курс состоит из 3-х блоков по 3 дня)', '', '', 72, '12000'),
(15, 3, '"Визажист" - базовые курсы, дополнительное образование к основному', '', '', 90, '15000'),
(16, 3, 'Современный "мастер маникюра" или "мастер педикюра"', '', '', 10, '8000'),
(17, 3, 'Мастер маникюра + моделирование ногтей', '', '', 14, '12000'),
(18, 3, '"Основы художественной росписи"', '', '', 10, '5000'),
(19, 3, '"Этот классический френч"', '', '', 9, '4000'),
(20, 4, '"Администратор салона красоты"', '', '', 40, '15000'),
(21, 4, 'Основы рыночной экономики и предпринимательской деятельности', '', '', 20, '5000'),
(22, 4, 'Практическая бухгалтерия на предприятии', '', '', 40, '10000'),
(23, 5, 'Домашний парикмахер', '', '<p>Как выполнить горячую и холодную укладку волос;&nbsp;уложить волосы феном, утюжками, плойкой; использовать косметику для волос и ее много секретов от профессионалов</p>\r\n', 9, '2000'),
(24, 5, 'Окрашивание волос для "домохозяек"', '', '<p>Это умени грамотно подобрать краситель для волос, качественно выполнить окрашивание волос в нужный цвет и оттенок; разбираться в уходе и лечении волос.</p>\r\n', 8, '2000'),
(25, 5, 'Курс для "Маленьких принцесс"', '', '<p>Научит плести идеально ровные, тугие косы; заплетать волосы ребенка за 5 минут, выполнять прически своими руками на праздник.</p>\r\n', 6, '2000'),
(26, 5, 'Сам себе визажист', '', '<p>Научит создавать собственный образ; практика по нанесению самых популярных видов макияжа: дневного, вечернего, праздничного.</p>\r\n', 36, '6000');

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
-- Структура таблицы `Request`
--

CREATE TABLE `Request` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `request_date` varchar(100) DEFAULT NULL,
  `course` int(11) DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Request`
--

INSERT INTO `Request` (`id`, `status`, `date`, `request_date`, `course`, `name`, `phone`) VALUES
(1, 1, '2016-11-17 21:14:48', '16.11.2016 ', 17, 'Михаил', '89192874497'),
(2, 1, '2016-11-17 21:16:54', '01.11.2016 ', 3, 'Tarja', 'Tuuren'),
(3, 1, '2016-11-17 21:17:46', '01.11.2016 ', 3, 'Tarja', 'Tuuren'),
(4, 1, '2016-11-17 21:19:35', '25.11.2016 ', 17, 'Наталья', '89040805250'),
(5, 1, '2016-11-17 21:20:04', '11.11.2016 ', 7, 'Jktu', 'Dtlbyby');

-- --------------------------------------------------------

--
-- Структура таблицы `Timing`
--

CREATE TABLE `Timing` (
  `id` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `allDay` tinyint(1) NOT NULL,
  `dateStart` varchar(255) DEFAULT NULL,
  `dateEnd` varchar(255) DEFAULT NULL,
  `timeStart` varchar(255) DEFAULT NULL,
  `timeEnd` varchar(255) DEFAULT NULL,
  `dow` varchar(255) DEFAULT NULL,
  `is_dow` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Timing`
--

INSERT INTO `Timing` (`id`, `id_course`, `allDay`, `dateStart`, `dateEnd`, `timeStart`, `timeEnd`, `dow`, `is_dow`) VALUES
(17, 3, 1, '', '', '', '', '2,6', 1),
(18, 3, 1, '2016-11-01 ', '2016-11-02 ', '', '', '', 0),
(20, 5, 0, '2016-11-23 ', '2016-11-23 ', '09:05', '16:05', '', 0),
(21, 8, 0, '', '', '09:50', '11:50', '1,2,5', 1),
(22, 14, 0, '2016-11-03 ', '2016-11-03 ', '10:00', '10:25', '', 0),
(23, 20, 0, '2016-11-18 ', '2016-11-18 ', '08:30', '12:00', '', 0);

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
-- Индексы таблицы `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Course`
--
ALTER TABLE `Course`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `News`
--
ALTER TABLE `News`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Request`
--
ALTER TABLE `Request`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Timing`
--
ALTER TABLE `Timing`
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
-- AUTO_INCREMENT для таблицы `Category`
--
ALTER TABLE `Category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `Course`
--
ALTER TABLE `Course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT для таблицы `News`
--
ALTER TABLE `News`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `Request`
--
ALTER TABLE `Request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `Timing`
--
ALTER TABLE `Timing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT для таблицы `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
