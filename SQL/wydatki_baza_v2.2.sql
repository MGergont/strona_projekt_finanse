-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 16 Maj 2023, 21:00
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `wydatki_v.1.0`
--
CREATE DATABASE IF NOT EXISTS `wydatki_v.1.0` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `wydatki_v.1.0`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dane`
--

CREATE TABLE `dane` (
  `id_dane` int(11) NOT NULL,
  `kwota` float DEFAULT NULL,
  `data_time` datetime DEFAULT NULL,
  `notatka` text DEFAULT NULL,
  `id_kategoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `dane`
--

INSERT INTO `dane` (`id_dane`, `kwota`, `data_time`, `notatka`, `id_kategoria`) VALUES
(1, 1000, '2023-05-07 15:13:14', 'jakaś wpłata 1', 1),
(2, 1111, '2023-05-06 16:00:26', 'jakaś wpłata 2', 4),
(3, 1234, '2023-05-05 16:00:26', 'jakaś wpłata 3', 4),
(4, 1500, '2023-05-03 16:01:17', 'jakaś wpłata 4', 4),
(5, 1000, '2023-05-02 16:01:17', 'jakaś wpłata 5', 4),
(6, 1500, '2023-05-02 13:13:13', 'jakaś wpłata 6', 4),
(7, 5463, '2023-05-11 00:30:06', 'jakaś wpłata 2', 4),
(8, 5463, '2023-05-11 00:30:06', 'jakaś wpłata 2', 4),
(9, 19999, '2023-05-11 00:34:09', 'jakaś wpłata 2', 4),
(10, 3, '2023-05-11 00:36:04', 'jakaś wpłata 2', 4),
(11, 1234, '2023-05-11 00:37:49', 'jakaś wpłata 2', 4),
(12, 1234, '2023-05-11 00:37:50', 'jakaś wpłata 2', 4),
(13, 1234, '2023-05-11 00:37:50', 'jakaś wpłata 2', 4),
(14, 1234, '2023-05-11 00:37:51', 'jakaś wpłata 2', 4),
(15, 1234, '2023-05-11 00:37:51', 'jakaś wpłata 2', 4),
(16, 1234, '2023-05-11 00:38:24', 'jakaś wpłata 2', 4),
(17, 1234, '2023-05-11 00:38:25', 'jakaś wpłata 2', 4),
(18, 8, '2023-05-11 00:38:28', 'jakaś wpłata 2', 4),
(19, 8, '2023-05-11 00:38:30', 'jakaś wpłata 2', 4),
(20, 8, '2023-05-11 00:38:31', 'jakaś wpłata 2', 4),
(21, 8, '2023-05-11 00:38:31', 'jakaś wpłata 2', 4),
(22, 8, '2023-05-11 00:38:55', 'jakaś wpłata 2', 4),
(23, 778, '2023-05-11 00:39:00', 'jakaś wpłata 2', 4),
(24, 778, '2023-05-11 00:39:01', 'jakaś wpłata 2', 4),
(25, 778, '2023-05-11 00:39:01', 'jakaś wpłata 2', 4),
(26, 778, '2023-05-11 00:39:02', 'jakaś wpłata 2', 4),
(27, 778, '2023-05-11 00:39:02', 'jakaś wpłata 2', 4),
(28, 778, '2023-05-11 00:39:02', 'jakaś wpłata 2', 4),
(29, 778, '2023-05-11 00:39:02', 'jakaś wpłata 2', 4),
(30, 778, '2023-05-11 00:39:03', 'jakaś wpłata 2', 4),
(31, 778, '2023-05-11 00:41:25', 'jakaś wpłata 2', 4),
(32, 778, '2023-05-11 00:41:26', 'jakaś wpłata 2', 4),
(33, 778, '2023-05-11 00:41:26', 'jakaś wpłata 2', 4),
(34, 778, '2023-05-11 00:42:02', 'jakaś wpłata 2', 4),
(35, 778, '2023-05-11 00:42:03', 'jakaś wpłata 2', 4),
(36, 123, '2023-05-11 00:42:06', 'jakaś wpłata 2', 4),
(37, 123, '2023-05-11 00:42:08', 'jakaś wpłata 2', 4),
(38, 123, '2023-05-11 00:42:08', 'jakaś wpłata 2', 4),
(39, 12341200, '2023-05-11 00:42:58', 'jakaś wpłata 2', 4),
(40, 321, '2023-05-15 19:51:38', 'jakaś wpłata 2', 4),
(41, 54321, '2023-05-15 19:51:42', 'jakaś wpłata 2', 4),
(42, 54321, '2023-05-15 19:52:15', 'jakaś wpłata 2', 4),
(43, 6666, '2023-05-15 20:05:37', 'jakaś wpłata 2', 4),
(44, 1234, '2023-05-15 20:08:20', 'jakaś wpłata 2', 4),
(45, 0, '2023-05-15 21:22:37', 'jakaś wpłata 2', 4),
(46, 0, '2023-05-15 21:22:37', 'jakaś wpłata 2', 4),
(47, 0, '2023-05-15 21:22:37', 'jakaś wpłata 2', 4),
(48, 0, '2023-05-15 21:22:45', 'jakaś wpłata 2', 4),
(49, 0, '2023-05-15 21:23:31', 'jakaś wpłata 2', 4),
(50, 1, '2023-05-15 21:26:35', 'jakaś wpłata 2', 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria`
--

CREATE TABLE `kategoria` (
  `id_kategoria` int(11) NOT NULL,
  `nazwa_kat` varchar(30) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kategoria`
--

INSERT INTO `kategoria` (`id_kategoria`, `nazwa_kat`, `id_users`) VALUES
(1, 'dom', 5),
(2, 'auto', 5),
(3, 'inne', 5),
(4, 'uncategorised', 8),
(5, 'auto', 8),
(6, 'inne', 8),
(7, 'dom', 8);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `password_user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id_users`, `name`, `password_user`) VALUES
(1, 'mateusz', 'test1'),
(2, 'mateusz3', '$2y$10$39K73osU6CNx4'),
(3, 'mateusz1', '$2y$10$HkoBqfG8Onz3tuqrrQr2gucvkHI8SevGH'),
(4, 'mateusz4', '$2y$10$/V75kPzOt8sjKFAMcxPMA.8Vup3rs/5SMYntVFs3S2JbdxCHaGH.S'),
(5, 'administrator', '$2y$10$AXquZ8u9I7m6P8NW3q79h.Wss2Yp6QAAFw5WAfDJfaY7.EnBEkZsG'),
(6, 'mateusz12', 'aesrtlkjadfikghjuiasfrfhg'),
(7, 'qwerty', '$2y$10$.F88N5gSN2ILC1RTpCB1geSbWlQghE.QyXuUFtLl/HtoALWsCHEE.'),
(8, 'qwert', '$2y$10$M2sP9NssFH7GwKovDCznruUw1TviFwojOahq91AGlG31714dwnm42');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dane`
--
ALTER TABLE `dane`
  ADD PRIMARY KEY (`id_dane`),
  ADD KEY `id_kategoria` (`id_kategoria`);

--
-- Indeksy dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`id_kategoria`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `dane`
--
ALTER TABLE `dane`
  MODIFY `id_dane` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id_kategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `dane`
--
ALTER TABLE `dane`
  ADD CONSTRAINT `dane_ibfk_1` FOREIGN KEY (`id_kategoria`) REFERENCES `kategoria` (`id_kategoria`);

--
-- Ograniczenia dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  ADD CONSTRAINT `kategoria_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
