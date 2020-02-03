-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 03 2020 г., 23:23
-- Версия сервера: 5.6.41
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `marlindev`
--

-- --------------------------------------------------------

--
-- Структура таблицы `quests`
--

CREATE TABLE `quests` (
  `id` int(10) NOT NULL,
  `title` varchar(20) NOT NULL,
  `content` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `quests`
--

INSERT INTO `quests` (`id`, `title`, `content`) VALUES
(2, 'jhgfjhgfkhgvkj', 'a2'),
(3, '12312', '12312312321');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT '0',
  `pass` varchar(255) NOT NULL DEFAULT '0',
  `imgpath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `email`, `pass`, `imgpath`) VALUES
(21, 'user2@example.com', 'a8f5f167f44f4964e6c998dee827110c', 'img/avatar.jpg'),
(29, 'user2@example.com', 'a8f5f167f44f4964e6c998dee827110c', 'img/autohall.png'),
(30, 'user22@example.com', 'a8f5f167f44f4964e6c998dee827110c', 'img/webdev.png'),
(31, 'polevaja.an@yandex.ru', 'd8ac4dd28003d2e0febb23d58a2c83a8', 'img/avatar.jpg'),
(32, 'asdad@afsdf.ru', 'a8f5f167f44f4964e6c998dee827110c', 'img/shopping.png'),
(33, 'user2222@example.com', 'e0d9d3862dfb270de65719d43749df5e', 'img/'),
(34, 'user122@example.com', '93279e3308bdbbeed946fc965017f67a', 'img/');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `quests`
--
ALTER TABLE `quests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `quests`
--
ALTER TABLE `quests`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
