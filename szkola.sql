-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Sty 2022, 17:24
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `szkola`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nauczyciele`
--

CREATE TABLE `nauczyciele` (
  `id` int(11) NOT NULL,
  `imie` text NOT NULL,
  `nazwisko` text NOT NULL,
  `stanowisko` text NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `hash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `nauczyciele`
--

INSERT INTO `nauczyciele` (`id`, `imie`, `nazwisko`, `stanowisko`, `login`, `pass`, `hash`) VALUES
(1, 'Mieczysław', 'Młotek', 'dyrektor', 'mietek', 'władza', '$2y$10$4o4iG17B55xUNGvujpdQeOwiWOexdVfpTdDHh8nbtoRXY6tK/pbTa '),
(2, 'Edward', 'Trąba', 'matematyk', 'edek', 'qwerty123', '$2y$10$Dn8t60cuSmIMsty3uc7S9OolkKnWzR2QGpBruXtNKwlZY8d1OA/C. '),
(3, 'Jacek', 'Gurgul', 'polonista', 'jaco', 'qwerty123', 'jaco'),
(4, 'Wiesław', 'Trytka', 'nauczyciel techniki', 'wiesiek', 'qwerty123', 'wiesiek'),
(5, 'Zofia', 'Pendzel', 'nauczyciel plastyki', 'zocha', 'qwerty123', 'zocha');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oceny`
--

CREATE TABLE `oceny` (
  `id` int(11) NOT NULL,
  `id_ucznia` int(11) NOT NULL,
  `ocena` int(11) NOT NULL,
  `przedmiot` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `oceny`
--

INSERT INTO `oceny` (`id`, `id_ucznia`, `ocena`, `przedmiot`) VALUES
(1, 3, 5, 'matematyka'),
(2, 3, 6, 'matematyka'),
(3, 3, 4, 'matematyka'),
(4, 4, 5, 'matematyka'),
(5, 1, 3, 'matematyka'),
(6, 3, 4, 'matematyka'),
(7, 4, 5, 'język polski'),
(8, 3, 4, 'technika');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uczniowie`
--

CREATE TABLE `uczniowie` (
  `id` int(11) NOT NULL,
  `imie` text NOT NULL,
  `nazwisko` text NOT NULL,
  `klasa` int(11) NOT NULL,
  `pass` text NOT NULL,
  `login` text NOT NULL,
  `hash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uczniowie`
--

INSERT INTO `uczniowie` (`id`, `imie`, `nazwisko`, `klasa`, `pass`, `login`, `hash`) VALUES
(1, 'Adam', 'Nowak', 5, 'qwerty123', 'adam', '$2y$10$Dn8t60cuSmIMsty3uc7S9OolkKnWzR2QGpBruXtNKwlZY8d1OA/C. '),
(2, 'Jan', 'Kowalski', 4, 'qwerty123', 'jan', '$2y$10$Dn8t60cuSmIMsty3uc7S9OolkKnWzR2QGpBruXtNKwlZY8d1OA/C. '),
(3, 'Jakub', 'Siudut', 4, 'dom123', 'kuba', 'kuba'),
(4, 'Martyna', 'Mercik', 1, 'kubuno', 'marti', 'marti'),
(5, 'Józef', 'Noga', 6, 'qwerty123', 'jozek', 'jozek'),
(6, 'Alicja', 'Nowak', 1, 'qwerty123', 'ala', 'ala'),
(7, 'Mateusz', 'Wajcha', 4, 'qwerty123', 'mati', 'mati'),
(8, 'Jacek', 'Górski', 5, 'qwerty123', 'jacek', 'jacek'),
(9, 'Jacek', 'G', 0, '', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uwagi`
--

CREATE TABLE `uwagi` (
  `id` int(11) NOT NULL,
  `id_ucznia` int(11) NOT NULL,
  `id_nauczyciela` int(11) NOT NULL,
  `content` text NOT NULL,
  `typ` text NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uwagi`
--

INSERT INTO `uwagi` (`id`, `id_ucznia`, `id_nauczyciela`, `content`, `typ`, `data`) VALUES
(1, 3, 2, ' Umył tablicę', 'pozytywna', '2022-01-18 17:04:20'),
(2, 4, 2, ' Rozmawiała w czasie lekcji', 'negatywna', '2022-01-18 17:04:20'),
(3, 3, 2, ' Pobił kolegę', 'negatywna', '2022-01-18 17:15:21'),
(4, 3, 2, ' pomagał w nauce koledze asdfghjkwertyuiodfghjk pomagał w nauce koledze asdfghjkwertyuiodfghjk pomagał w nauce koledze asdfghjkwertyuiodfghjk pomagał w nauce koledze asdfghjkwertyuiodfghjk pomagał w nauce koledze asdfghjkwertyuiodfghjk pomagał w nauce koledze asdfghjkwertyuiodfghjk pomagał w nauce koledze asdfghjkwertyuiodfghjk pomagał w nauce koledze asdfghjkwertyuiodfghjk pomagał w nauce koledze asdfghjkwertyuiodfghjk', 'pozytywna', '2022-01-18 17:53:12');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `nauczyciele`
--
ALTER TABLE `nauczyciele`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `oceny`
--
ALTER TABLE `oceny`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uczniowie`
--
ALTER TABLE `uczniowie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uwagi`
--
ALTER TABLE `uwagi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `nauczyciele`
--
ALTER TABLE `nauczyciele`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `oceny`
--
ALTER TABLE `oceny`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `uczniowie`
--
ALTER TABLE `uczniowie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `uwagi`
--
ALTER TABLE `uwagi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
