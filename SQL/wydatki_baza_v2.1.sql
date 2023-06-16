-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 20 Maj 2023, 21:22
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
CREATE DATABASE IF NOT EXISTS `wydatki_v.2.0` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `wydatki_v.2.0`;

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
(1, 1000, '2023-05-07 15:13:14', 'jakiś tekst 1', 1, 1),
(2, 1111, '2023-05-06 16:00:26', 'jakiś tekst 2 user', 2, 2),
(3, -111, '2023-05-20 19:56:49', 'jakaś notatka 5', 1, 2),
(4, -1, '2023-05-20 20:02:00', 'jakaś notatka 5', 2, 2),
(5, 123, '2023-05-20 20:17:44', 'jakaś wpłata 2', 11, 2),
(6, 123, '2023-05-20 20:19:39', 'jakaś wpłata 2', 11, 2),
(7, 322, '2023-05-20 20:20:14', 'jakaś wpłata 2', 11, 2);

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
(1, 'qwert', '$2y$10$M2sP9NssFH7GwKovDCznruUw1TviFwojOahq91AGlG31714dwnm42'),
(2, 'qwert2', '$2y$10$KeVGpCkFGofXEcJ7I4HCpOdbTPite1lTtNkRzXbY3nG.hVVhSoTs6'),
(3, 'qwert3', '$2y$10$wyeTyaM3JRBKYtArlfkIKuv6g3vfef7yeD.RSEDimf7WtZtOVFZ0m');

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
  MODIFY `id_dane` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id_kategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
