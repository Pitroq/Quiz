-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Lis 2022, 15:41
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `quiz`
--
CREATE DATABASE IF NOT EXISTS `quiz` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `quiz`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pytania`
--

CREATE TABLE `pytania` (
  `idPytania` int(11) NOT NULL,
  `pytanie` varchar(300) NOT NULL,
  `odpA` varchar(200) NOT NULL,
  `odpB` varchar(200) NOT NULL,
  `odpC` varchar(200) NOT NULL,
  `odpD` varchar(200) NOT NULL,
  `odpPoprawna` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `pytania`
--

INSERT INTO `pytania` (`idPytania`, `pytanie`, `odpA`, `odpB`, `odpC`, `odpD`, `odpPoprawna`) VALUES
(1, 'Jak zdeklarować zmienną typu int w języku C++?', 'int liczba', 'int liczba;', 'liczba int;', 'int(liczba);', 'B'),
(2, 'Każda nazwa zmiennej w PHP musi być poprzedzona znakiem: ', '$', '#', '@', '&', 'A'),
(6, 'Ile bitów zajmuje zmienna typu int?', '16', '32', '8', '64', 'A'),
(7, 'Od jakiej liczby są numerowane tablice?', '-1', '1', '0', '2', 'C'),
(8, 'Kibibit to dokładnie ... bitów', 'Każda odpowiedź jest niepoprawna', '1000', '1024', '2048', 'C'),
(9, 'Kod binarny składa się z ...', 'Trzech liter: a, o, z', 'Dwóch cyfr: 0, 1', 'Dwóch cyfr: 1, 2', 'Dwóch liter: a, b,', 'B'),
(10, 'Operatorem porównania NIE jest:', '==', '&&', '<=', '>', 'B'),
(11, 'Liczba 29 w systemie dziesiętnym, w systemie szestnastkowym będzie równa: ', '1C', '1D', 'Każda odpowiedź jest niepoprawna', '2D', 'B'),
(12, 'W języku SQL polecenie INSERT INTO:', 'Dodaje pola do tabeli', 'Dodaje tabelę', 'Aktualizuje rekordy określoną wartością', 'Wprowadza dane do tabeli', 'D'),
(13, 'W języku PHP funkcja trim:', 'Porównuje dwa napisy i wypisuje część wspólną', 'Podaje długość napisu', 'Zmniejsza napis o wskazaną w parametrze liczbę znaków', 'Usuwa białe znaki z obu końców napisu', 'D'),
(18, 'Funkcja COUNT języka SQL: ', 'Zliczanie rekordów wybranych kwerendą.', 'Obliczenie średniej wartości w wybranej kolumnie.', 'Obliczenie wartości bezwzględnej w polu liczbowym.', 'Zliczanie znaków w polu tekstowym.', 'A'),
(19, 'Proces tłumaczenia kodu źródłowego pisanego przez programistę na zrozumiały dla komputera kod maszynowy to: ', 'uruchamianie', 'debugowanie', 'kompilowanie', 'implementowanie', 'C'),
(20, 'W celu określenia wysokości elementu na stronie internetowek należy wykorzystać właściwość CSS o nazwie', 'padding', 'width', 'margin', 'height', 'D');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ranking`
--

CREATE TABLE `ranking` (
  `idWyniku` int(11) NOT NULL,
  `nazwaUzytkownika` varchar(20) NOT NULL,
  `punkty` int(11) NOT NULL,
  `punktyMax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `ranking`
--

INSERT INTO `ranking` (`idWyniku`, `nazwaUzytkownika`, `punkty`, `punktyMax`) VALUES
(4, 'Kacper12', 7, 10),
(5, 'SpoconyMaciuś2011', 10, 10),
(7, 'Marcin69', 4, 10),
(8, 'BartuśFortnite', 0, 10),
(9, 'YoungMati2137', 6, 10),
(19, 'Robocik', 7, 10),
(20, 'CJ2115', 3, 10),
(21, 'Duży Dym', 5, 10),
(22, 'aaa', 6, 10);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `pytania`
--
ALTER TABLE `pytania`
  ADD PRIMARY KEY (`idPytania`);

--
-- Indeksy dla tabeli `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`idWyniku`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `pytania`
--
ALTER TABLE `pytania`
  MODIFY `idPytania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT dla tabeli `ranking`
--
ALTER TABLE `ranking`
  MODIFY `idWyniku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
