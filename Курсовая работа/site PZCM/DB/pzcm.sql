-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 23 2018 г., 21:58
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
-- База данных: `pzcm`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tovar`
--

CREATE TABLE `tovar` (
  `id` int(12) NOT NULL,
  `title` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `ves` varchar(24) NOT NULL,
  `proba` varchar(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `image` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tovar`
--

INSERT INTO `tovar` (`id`, `title`, `type`, `ves`, `proba`, `price`, `description`, `image`) VALUES
(33, 'Золото в слитках', 'Золото', '1100', '99.99', 1850000, 'Мерные слитки\r\nПри резких колебаниях рубля и иностранных валют золотые слитки для многих россиян становятся надежным вкладом. Однако есть трудности —', 'images/catalog/0'),
(34, 'Порошок золотой', 'Золото', '1000', '99.90', 100000, '', 'images/catalog/34'),
(35, 'Золото аффинированное в гранулах', 'Золото', '1000', '99.90', 300000, '', 'images/catalog/0'),
(36, 'Заготовки ювелирных изделий', 'Золото', '1000', '99.90', 450000, '', 'images/catalog/0'),
(37, 'Платина аффинированная (слитки, порошок)', 'Платина', '1300', '99.99', 2350000, 'По своей сути, маркировка платиновых слитков точно такая же, как золотых и серебряных, но существует ряд особенностей, которые отличают платиновые мер', 'images/catalog/0'),
(38, 'Слитки платины мерные', 'Платина', '5500', '99.99', 8500000, '', 'images/catalog/0'),
(39, 'Раствор платинохлористоводородной кислоты', 'Платина', '910', '60.00', 10000, '', 'images/catalog/0'),
(40, 'Серебро в слитках', 'Серебро', '28000', '99.90', 500000, 'Серебро в слитках', 'images/catalog/0'),
(41, 'Родий аффинированный в порошке', 'Родий', '1000', '80.00', 100000, 'ГОСТ 12342-2015', 'images/catalog/0'),
(42, 'Раствор нитрата родия', 'Родий', '990', '66.00', 1234124, 'СТП 17-05/09', 'images/catalog/0'),
(43, 'Иридий в порошке', 'Иридий', '1000', '81.90', 100000, 'ГОСТ 12338-81', 'images/catalog/0');

-- --------------------------------------------------------

--
-- Структура таблицы `usercatalog`
--

CREATE TABLE `usercatalog` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_tovar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `usercatalog`
--

INSERT INTO `usercatalog` (`id`, `id_user`, `id_tovar`) VALUES
(30, 17, 33),
(31, 17, 34),
(32, 17, 35),
(33, 17, 38),
(34, 17, 41),
(35, 17, 42),
(36, 24, 35),
(37, 24, 36),
(38, 18, 33),
(39, 18, 34),
(40, 18, 35),
(41, 18, 36),
(42, 18, 39),
(43, 25, 33),
(44, 25, 34),
(45, 25, 42);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `login` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `surname` varchar(70) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `surname`, `name`, `email`, `phone`) VALUES
(17, 'Antonov', '5cec46b6c029634ba718389b655ac443', 'Антонов', 'Александр', 'antonov478@mail.com', '+79060900212'),
(18, 'Vesna', '5cec46b6c029634ba718389b655ac443', 'Весна', 'Дарья', 'daria.vesna@mail.ru', '+79009818212'),
(19, 'Petrov', '5cec46b6c029634ba718389b655ac443', 'Петров', 'Иван', 'petrov_ivan@yandex.ru', '+79000002134'),
(20, 'Alpatov', '5cec46b6c029634ba718389b655ac443', 'Алпатов', 'Сергей', 'alpatov@gmail.com', '+79965421234'),
(21, 'andreev', '5cec46b6c029634ba718389b655ac443', 'Андреев', 'Юрий', 'andreev_urgens@mail.ru', '+79106778871'),
(22, 'malchikov', '5cec46b6c029634ba718389b655ac443', 'Мальчиков', 'Максим', 'malchikov@gmail.com', '+79108934888'),
(23, 'Pavlenko', '5cec46b6c029634ba718389b655ac443', 'Павленко', 'Петр', 'pavlenko', '+79066743211'),
(24, 'kirilin', '5cec46b6c029634ba718389b655ac443', 'Кирилин', 'Кирилл', 'kirilin@yandex.ru', '+79022184191'),
(25, 'gromov', '5cec46b6c029634ba718389b655ac443', 'Громов', 'Сергей', 'gromov@gmail.com', '+79119999999');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tovar`
--
ALTER TABLE `tovar`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `usercatalog`
--
ALTER TABLE `usercatalog`
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
-- AUTO_INCREMENT для таблицы `tovar`
--
ALTER TABLE `tovar`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `usercatalog`
--
ALTER TABLE `usercatalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
