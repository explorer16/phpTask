-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 16 2023 г., 12:06
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `phptask`
--
CREATE DATABASE IF NOT EXISTS `phptask` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `phptask`;

-- --------------------------------------------------------

--
-- Структура таблицы `rooms`
--

CREATE TABLE `rooms` (
  `id_room` int(11) NOT NULL,
  `id_floor` tinyint(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `reserved_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `reserved_for` timestamp NULL DEFAULT NULL,
  `is_reserved` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `rooms`
--

INSERT INTO `rooms` (`id_room`, `id_floor`, `username`, `reserved_at`, `reserved_for`, `is_reserved`) VALUES
(1, 1, 'Дониёр', '2023-06-16 09:17:18', '2023-06-16 10:17:18', 1),
(1, 2, 'Дониёр', '2023-06-16 09:13:26', '2023-06-16 10:13:26', 1),
(2, 1, 'Дониёр', '2023-06-16 08:53:15', '2023-06-16 09:53:15', 1),
(2, 2, 'Дониёр', '2023-06-16 09:21:26', '2023-06-16 10:21:26', 1),
(3, 1, 'Дониёр', '2023-06-16 09:23:14', '2023-06-16 10:23:14', 1),
(3, 2, '', NULL, NULL, 0),
(4, 1, 'Дониёр', '2023-06-16 09:37:13', '2023-06-16 10:37:13', 1),
(4, 2, 'Дониёр', '2023-06-16 08:46:22', '2023-06-16 09:46:22', 1),
(5, 1, '', NULL, NULL, 0),
(5, 2, 'Дониёр', '2023-06-16 09:18:36', '2023-06-16 10:18:36', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id_room`,`id_floor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
