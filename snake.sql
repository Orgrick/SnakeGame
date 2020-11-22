-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 22 2020 г., 16:06
-- Версия сервера: 8.0.19
-- Версия PHP: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `snake`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ratings`
--

CREATE TABLE `ratings` (
  `user_id` int UNSIGNED NOT NULL,
  `score` int NOT NULL,
  `date` text NOT NULL,
  `time` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ratings`
--

INSERT INTO `ratings` (`user_id`, `score`, `date`, `time`) VALUES
(2, 16, '22-11-2020', 30),
(12, 15, '22-11-2020', 27),
(12, 21, '22-11-2020', 48);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `name`, `login`, `password`) VALUES
(1, 'Игорь', 'Igor', '1234'),
(2, 'John', 'John', '1234'),
(3, 'Mike', 'Mike', '1234'),
(5, 'СаняСанек', 'Orgrick', '23132321123'),
(6, 'фвыфвывфыаывавыаыв', 'аыааывавыавыаыв', 'аываываываывыав'),
(7, 'dassdadsadsadas', 'ddasdasdasdsa', 'ddaasdasddsa'),
(8, 'авыывааывавыва', 'ыавыаываыва', 'авыаываыв'),
(9, 'ввфывыфвыф', 'вфывфыфвы', 'вфывфывфы'),
(10, 'выывфвыф', 'вфывфывыф', 'выффвывфыфывфыв'),
(11, 'ыфааываавываыаыв', 'аывавыаывавыавыа', 'аывавыаываывавы'),
(12, 'Николай', 'qwert', 'qwert');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ratings`
--
ALTER TABLE `ratings`
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`) USING BTREE,
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
