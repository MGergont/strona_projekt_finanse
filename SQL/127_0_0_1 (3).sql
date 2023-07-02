-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Cze 2023, 23:29
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
-- Baza danych: `wydatki_v.2.0`
--
CREATE DATABASE IF NOT EXISTS `webpage_wydatki` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `webpage_wydatki`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dane`
--

CREATE TABLE `dane` (
  `id_dane` int(11) NOT NULL,
  `kwota` float DEFAULT NULL,
  `data_time` datetime DEFAULT NULL,
  `notatka` text DEFAULT NULL,
  `id_kategoria` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `dane`
--

INSERT INTO `dane` (`id_dane`, `kwota`, `data_time`, `notatka`, `id_kategoria`, `id_users`) VALUES
(1, 1000, '2023-05-07 15:13:14', 'jakiś tekst 1', 11, 1),
(2, -500, '2023-05-25 10:30:00', 'Some note 1', 3, 1),
(3, -250.5, '2023-05-26 14:45:00', 'Some note 2', 4, 1),
(4, -100, '2023-05-27 18:00:00', 'Some note 3', 1, 1),
(5, 750, '2023-05-28 09:15:00', 'Some note 4', 11, 1),
(6, -50.5, '2023-05-29 12:30:00', 'Some note 5', 2, 1),
(7, 1000, '2023-05-30 16:45:00', 'Some note 6', 11, 1),
(8, -300, '2023-05-31 11:00:00', 'Some note 7', 3, 1),
(9, 1200.75, '2023-06-01 15:15:00', 'Some note 8', 11, 1),
(10, -75.25, '2023-06-02 08:30:00', 'Some note 9', 4, 1),
(11, -800, '2023-06-03 12:45:00', 'Some note 10', 5, 1),
(12, -200.5, '2023-06-04 17:00:00', 'Some note 11', 2, 1),
(13, 1500, '2023-06-05 10:15:00', 'Some note 12', 11, 1),
(14, -150, '2023-06-06 14:30:00', 'Some note 13', 6, 1),
(15, 900.25, '2023-06-07 18:45:00', 'Some note 14', 11, 1),
(16, -100.75, '2023-06-08 09:00:00', 'Some note 15', 8, 1),
(17, -600, '2023-06-09 13:15:00', 'Some note 16', 4, 1),
(18, -250.5, '2023-06-10 17:30:00', 'Some note 17', 1, 1),
(19, 1800.75, '2023-06-11 10:45:00', 'Some note 18', 11, 1),
(20, -50.25, '2023-06-12 15:00:00', 'Some note 19', 10, 1),
(21, 1000, '2023-06-13 19:15:00', 'Some note 20', 11, 1),
(22, -300.5, '2023-06-14 08:30:00', 'Some note 21', 1, 1),
(23, 2000.25, '2023-06-15 12:45:00', 'Some note 22', 11, 1),
(24, -75.75, '2023-06-16 17:00:00', 'Some note 23', 7, 1),
(25, 1200, '2023-06-17 10:15:00', 'Some note 24', 11, 1),
(26, -200, '2023-06-18 14:30:00', 'Some note 25', 4, 1),
(27, 1500.5, '2023-06-19 18:45:00', 'Some note 26', 11, 1),
(28, -125.25, '2023-06-20 09:00:00', 'Some note 27', 2, 1),
(29, -800, '2023-06-21 13:15:00', 'Some note 28', 5, 1),
(30, -350.5, '2023-06-22 17:30:00', 'Some note 29', 9, 1),
(31, 2200.75, '2023-06-23 10:45:00', 'Some note 30', 11, 1);


-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria`
--

CREATE TABLE `kategoria` (
  `id_kategoria` int(11) NOT NULL,
  `nazwa_kat` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kategoria`
--

INSERT INTO `kategoria` (`id_kategoria`, `nazwa_kat`) VALUES
(1, 'zywnosc'),
(2, 'mieszkanie'),
(3, 'transport'),
(4, 'odziez'),
(5, 'prezenty'),
(6, 'rozwoj'),
(7, 'zdrowie'),
(8, 'rozrywka'),
(9, 'technologia'),
(10, 'inne'),
(11, 'uncat');

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
(1, 'user', '$2y$10$KeVGpCkFGofXEcJ7I4HCpOdbTPite1lTtNkRzXbY3nG.hVVhSoTs6');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dane`
--
ALTER TABLE `dane`
  ADD PRIMARY KEY (`id_dane`),
  ADD KEY `dane_ibfk_1` (`id_kategoria`),
  ADD KEY `kategoria_ibfk_1` (`id_users`);

--
-- Indeksy dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`id_kategoria`);

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
  MODIFY `id_dane` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id_kategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `dane`
--
ALTER TABLE `dane`
  ADD CONSTRAINT `dane_ibfk_1` FOREIGN KEY (`id_kategoria`) REFERENCES `kategoria` (`id_kategoria`),
  ADD CONSTRAINT `kategoria_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
