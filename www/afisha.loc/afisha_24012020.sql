-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 24 2020 г., 23:51
-- Версия сервера: 5.5.62-log
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `afisha`
--

-- --------------------------------------------------------

--
-- Структура таблицы `artists`
--

CREATE TABLE `artists` (
  `idartist` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `linkphoto` char(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `artists`
--

INSERT INTO `artists` (`idartist`, `name`, `description`, `linkphoto`) VALUES
(1, 'Богод Светлана', 'Артистка театра.\r\n\r\nВ театре работает с 2009 года.\r\n\r\nРоли в спектаклях нашего театра:\r\n\r\nМатрёна – «Женитьба Бальзаминова» А.Н. Островского;\r\n\r\nГертруда – «Гамлет.Next» В.Шекспира;\r\n\r\nСофья – «Саня, Ваня, с ними Римас» В.Гуркина;\r\n\r\nЭлеонора – «Мамулю вызывали» С.Белова;\r\n\r\nАнтонина Васильевна – «Долгожитель» Б.Рацера и В.Константинова;\r\n\r\nСтаруха – «Шайтан-озеро» Р.Ташимова;\r\n\r\nГостья королевы – «Двенадцать месяцев» С.Маршака;\r\n\r\nМать-убийца – «Взаперти»  А.Гумеровой.', 'uploads/Bogod-Svetlana (1).jpg'),
(2, 'Александрова Людмила', 'Артистка театра\r\n\r\nВ 1994 году окончила Ташкентсий театральный институт им. Н. Островского.\r\n\r\nВ театре работает с 1994 года.\r\n\r\nРоли в спектаклях нашего театра:\r\n\r\nАктриса – «Гамлет.Next» В.Шекспира;\r\n\r\nКрасноармеец – «Сорок первый» Б.Лавренёва;\r\n\r\nДомина – «PSEVDOL или безумная KOMEDIA» по мотивам пьесы  Плавта;\r\n\r\nДороти – «Несравненная» П.Куилтера;\r\n\r\nКрасавина – «Женитьба Бальзаминова» А.Н. Островского;\r\n\r\nЛидия Николаевна – «Французские страсти» Л.Разумовской;\r\n\r\nВедущая – «Оазис.А.» Е.Сташкова;\r\n\r\nМиссис  Бейкер – «Эти свободные бабочки» Л.Герша;\r\n\r\nМачеха – «Двенадцать месяцев» С.Маршака.', 'uploads/Aleksandrova-Lyudmila.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `booking`
--

CREATE TABLE `booking` (
  `idbook` int(11) NOT NULL,
  `customername` varchar(150) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `timetable_id` int(11) DEFAULT NULL,
  `row` int(11) NOT NULL,
  `place` int(11) NOT NULL,
  `notes` varchar(45) DEFAULT NULL,
  `css_style` varchar(10) DEFAULT 'busy',
  `user` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `booking`
--

INSERT INTO `booking` (`idbook`, `customername`, `phone`, `timetable_id`, `row`, `place`, `notes`, `css_style`, `user`) VALUES
(2, 'Макаров Макар', '8395122566', 3, 8, 8, NULL, 'busy', NULL),
(3, 'Иванов Иван', '8395122485', 5, 7, 8, '', 'busy', 'admin@mail.ru'),
(4, 'Петрова Ольга', '8395127845', 5, 1, 9, NULL, 'busy', NULL),
(5, 'Мороз София', '8374369578', 4, 1, 12, NULL, 'busy', 'admin@mail.ru'),
(6, 'Васюта Кристина', '8395147890', 4, 12, 12, NULL, 'busy', NULL),
(7, 'Иван Иванов', '+7898989898', 6, 13, 10, NULL, 'busy', NULL),
(8, 'Иван Иванов', '+7898989898', 5, 6, 9, NULL, 'busy', NULL),
(9, 'Иван Иванов', '+7898989898', 4, 8, 17, NULL, 'busy', NULL),
(10, 'Иван Иванов', '+7898989898', 4, 8, 16, NULL, 'busy', 'admin@mail.ru'),
(11, 'Админ Админов', '+75889898989', 6, 9, 15, NULL, 'busy', NULL),
(12, 'Админ Админов', '+7898989898', 6, 8, 13, NULL, 'busy', NULL),
(13, 'Админ Админов', '+7898989898', 6, 6, 14, NULL, 'busy', 'admin@mail.ru'),
(14, 'Админ Админов', '+7898989898', 6, 1, 10, NULL, 'busy', 'admin@mail.ru'),
(15, 'Ivan', '+7898989898', 6, 7, 13, NULL, 'busy', 'ivanov@mail.ru'),
(16, 'Иван Иванов', '+7898989898', 3, 8, 14, NULL, 'busy', 'ivanov@mail.ru'),
(17, 'Иван', '+7898989898', 4, 6, 12, NULL, 'busy', 'ivanov@mail.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `idcomment` int(11) NOT NULL,
  `authorname` varchar(45) NOT NULL,
  `content` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`idcomment`, `authorname`, `content`) VALUES
(3, 'Мария', 'Спасибо'),
(4, 'Иван Иванов', 'Спасибо за ваши спектакли и работу! Все очень хорошо. Актеры супер!');

-- --------------------------------------------------------

--
-- Структура таблицы `cultural_institution`
--

CREATE TABLE `cultural_institution` (
  `id_cultural_institution` int(11) NOT NULL,
  `ci_name` varchar(80) NOT NULL,
  `ci_description` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cultural_institution`
--

INSERT INTO `cultural_institution` (`id_cultural_institution`, `ci_name`, `ci_description`) VALUES
(1, 'Ачинский Городской Дворец культуры', NULL),
(2, 'Ачинский Драматический театр', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `idnews` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text,
  `linkimg` char(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`idnews`, `name`, `description`, `linkimg`) VALUES
(16, 'Спектакль «Ловушка для птиц» пришёлся по сердцу Ачинскому зрителю.', '22 октября 2019\r\n\r\nПремьера на ура! \r\n\r\nСпектакль «Ловушка для птиц» пришёлся по сердцу Ачинскому зрителю.\r\n\r\nНа сцене молодёжного центра “Сибирь” артисты смогли рассказать историю поиска и разочарований.', 'uploads/news/Premera-na-ura-Lovushka-dlya-ptits-2.jpg'),
(17, 'Театр и школьники', '15 ноября на базе Ачинской центральной библиотеки им. А.С. Пушкина при поддержке отдела образования состоялся воркшоп «Театр у школьной доски».\r\nВ рамках этого проекта художественный руководитель КГБУК Ачинского драматического театра Артём Владимирович Терёхин провёл со школьниками 8-9 классов курс по режиссёрской экспликации пьесы Н. Гоголя «Ревизор».\r\nВ ходе беседы поговорили о теме, идее пьесы, о том, что, по мнению режиссёра, хотел рассказать автор, затронули актуальность произведения для нашего времени, характеры персонажей, что их трогает, что волнует, что побуждает к поступкам.\r\nЭта встреча стала первой, но далеко не единственной. Мы планируем продолжить работать в таком формате и развивать его дальше.', 'uploads/news/Teatr-u-shkolnoy-doski11.jpg'),
(18, 'Воркшоп по «Онегину»', '29 ноября продолжил свою работу воркшоп «Театр у школьной доски», который ведет художественный руководитель Ачинского драматического театра Артём Терёхин. Участниками воркшопа вновь стали стали школьники 8-9 классов. В этот раз режиссёрскому разбору подвергся роман А. С. Пушкина «Евгений Онегин». Действенный анализ, определение темы, связь романа с современностью – вот неполный список затронутых тем. \r\nПодобный формат работы очень перспективен и очевидно будет продолжаться и совершенствоваться. \r\nСпасибо Ачинской центральной библиотеке им. А.С. Пушкина! Без их поддержки это мероприятие бы не состоялось!', 'uploads/news/Vorkshop-po---Oneginu--.jpg'),
(21, 'Computer programming', 'Computer programming is the process of designing and building an executable computer program for accomplishing a specific computing result. Programming involves tasks such as; analysis, generating algorithms, profiling algorithms accuracy and resource consumption, and the implementation of algorithms in a chosen programming language (commonly referred to as coding)', 'uploads/news/News3.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `repertoire`
--

CREATE TABLE `repertoire` (
  `idrepertoire` int(11) NOT NULL,
  `name` varchar(145) NOT NULL,
  `author` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `linkimg` char(250) DEFAULT NULL,
  `agelimitation` int(11) DEFAULT NULL,
  `cultural_institution` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `repertoire`
--

INSERT INTO `repertoire` (`idrepertoire`, `name`, `author`, `description`, `linkimg`, `agelimitation`, `cultural_institution`) VALUES
(3, '«Лев Васька» Сказка', 'П.Морозов', '«Лев Васька»\r\nСказка', 'uploads/repertoire/04c9c4079662f41d91dc4501a71b6ae7.jpg', 3, 1),
(6, '«Следствие ведет снеговик»', 'Е. Шашин  Н. Кузьминых', '«Следствие ведет снеговик» Новогодний детектив', 'uploads/repertoire/dsc03952.jpg', 0, 1),
(8, 'АВАНТЮРИСТКИ ПОНЕВОЛЕ', 'По пьесе А. Коровкина “Тетки”', 'Комедия\r\nВ маленьком провинциальном городе в старинном родовом гнезде две трогательные и очаровательные пожилые дамы – «стоматолог и окулист на пенсии» – ведут свою тихую и незатейливую жизнь… Но вдруг выясняется, что их дом расположен на элитной земле и стоит баснословных денег! Это приводит к появлению множества людей, желающих завладеть им любой ценой! Но в этой истории не все так просто…\r\n\r\nАферистки поневоле – это уморительная комедия полная живого смеха, светлого юмора и лихо закрученных поворотов сюжета.\r\n\r\nРежиссёр – Андрей Пашнин, Борис Уваров\r\n\r\nХудожник-исполнитель – Елена Сидельцева\r\n\r\nВ ролях: И. Емельянов, В. Иноземцев, С. Сумин, А. Пашнин (заслуженный артист РФ), А. Телепов, С. Карасевич, А. Крупенникова, В. Чекменев, И. Ивашутин, И. Мешков, В. Иноземцев.', 'uploads/repertoire/AVANTYURISTKI-PONEVOLE-2.jpg', 16, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `repertoire_has_artist`
--

CREATE TABLE `repertoire_has_artist` (
  `repertoire_idrepertoire` int(11) NOT NULL,
  `artist_idartist` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `repertoire_has_artist`
--

INSERT INTO `repertoire_has_artist` (`repertoire_idrepertoire`, `artist_idartist`) VALUES
(6, 1),
(8, 1),
(3, 2),
(6, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `duration` int(11) NOT NULL,
  `repertoire_idrepertoire` int(11) NOT NULL,
  `cost` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `timetable`
--

INSERT INTO `timetable` (`id`, `date`, `time`, `duration`, `repertoire_idrepertoire`, `cost`) VALUES
(3, '2019-12-20', '15:55:00', 3, 3, 400),
(4, '2019-12-14', '11:09:00', 4, 3, 900),
(5, '2019-12-18', '16:00:00', 3, 6, 700),
(6, '2019-12-18', '18:29:32', 2, 8, 500);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) DEFAULT NULL,
  `roles` tinyint(4) NOT NULL DEFAULT '0',
  `email` varchar(80) DEFAULT NULL,
  `usersecondname` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`iduser`, `username`, `password`, `roles`, `email`, `usersecondname`) VALUES
(1, 'Yurij', '06d9dc109ddb9eed1ee8f07c075751e4', 0, 'moy99994@gmail.com', 'Mok88'),
(3, 'Admin', '06d9dc109ddb9eed1ee8f07c075751e4', 1, 'admin@mail.ru', 'Admin'),
(45, 'Yurij', '06d9dc109ddb9eed1ee8f07c075751e4', 0, 'yuri3j@mail.ru', 'Mo'),
(46, 'Ivan', '06d9dc109ddb9eed1ee8f07c075751e4', 0, 'ivanov@mail.ru', 'Ivanov'),
(47, 'Sidor', '06d9dc109ddb9eed1ee8f07c075751e4', 0, 'sidoro@mail.ru', 'Sidorov');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`idartist`);

--
-- Индексы таблицы `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`idbook`),
  ADD KEY `fk_booking_timetable1_idx` (`timetable_id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`idcomment`);

--
-- Индексы таблицы `cultural_institution`
--
ALTER TABLE `cultural_institution`
  ADD PRIMARY KEY (`id_cultural_institution`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`idnews`);

--
-- Индексы таблицы `repertoire`
--
ALTER TABLE `repertoire`
  ADD PRIMARY KEY (`idrepertoire`);

--
-- Индексы таблицы `repertoire_has_artist`
--
ALTER TABLE `repertoire_has_artist`
  ADD PRIMARY KEY (`repertoire_idrepertoire`,`artist_idartist`),
  ADD KEY `fk_repertoire_has_artist_artist1_idx` (`artist_idartist`),
  ADD KEY `fk_repertoire_has_artist_repertoire1_idx` (`repertoire_idrepertoire`);

--
-- Индексы таблицы `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_timetable_repertoire1_idx` (`repertoire_idrepertoire`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `artists`
--
ALTER TABLE `artists`
  MODIFY `idartist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `booking`
--
ALTER TABLE `booking`
  MODIFY `idbook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `idcomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `cultural_institution`
--
ALTER TABLE `cultural_institution`
  MODIFY `id_cultural_institution` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `idnews` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `repertoire`
--
ALTER TABLE `repertoire`
  MODIFY `idrepertoire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_booking_timetable1` FOREIGN KEY (`timetable_id`) REFERENCES `timetable` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `repertoire_has_artist`
--
ALTER TABLE `repertoire_has_artist`
  ADD CONSTRAINT `fk_repertoire_has_artist_artist1` FOREIGN KEY (`artist_idartist`) REFERENCES `artists` (`idartist`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_repertoire_has_artist_repertoire1` FOREIGN KEY (`repertoire_idrepertoire`) REFERENCES `repertoire` (`idrepertoire`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `fk_timetable_repertoire1` FOREIGN KEY (`repertoire_idrepertoire`) REFERENCES `repertoire` (`idrepertoire`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
