-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Lis 06, 2024 at 12:57 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kino`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bilety`
--

CREATE TABLE `bilety` (
  `ID` bigint(20) NOT NULL,
  `Seans_ID` bigint(20) NOT NULL,
  `Sprzedawca_ID` bigint(20) NOT NULL,
  `Klient_ID` bigint(20) NOT NULL,
  `Cena` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bilety`
--

INSERT INTO `bilety` (`ID`, `Seans_ID`, `Sprzedawca_ID`, `Klient_ID`, `Cena`) VALUES
(1, 1, 1, 1, 35),
(2, 1, 2, 2, 35),
(3, 2, 3, 3, 45),
(4, 3, 1, 4, 25),
(5, 4, 2, 5, 30),
(6, 5, 3, 6, 40),
(7, 1, 2, 3, 33);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `filmy`
--

CREATE TABLE `filmy` (
  `ID` bigint(20) NOT NULL,
  `Tytul` varchar(255) NOT NULL,
  `Rezyser` varchar(255) NOT NULL,
  `Czas_trwania` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `filmy`
--

INSERT INTO `filmy` (`ID`, `Tytul`, `Rezyser`, `Czas_trwania`) VALUES
(1, 'Ojciec Chrzestny', 'Francis Ford Coppola', '3:03:51'),
(2, 'Ojciec Chrzestny 2', 'Francis Ford Coppola', '3:08:22'),
(3, 'Ojciec Chrzestny 3', 'Francis Ford Coppola', '3:22:01'),
(4, 'Oppenheimer', 'Christopher Nolan', '2:53:37'),
(5, 'Auta', 'Adam Klekot', '1:41:22'),
(6, 'Szczeki', 'Adam', '3:20:21');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `filmy_rodzaj`
--

CREATE TABLE `filmy_rodzaj` (
  `ID` bigint(20) NOT NULL,
  `Filmy_ID` bigint(20) NOT NULL,
  `Rodzaj_ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `filmy_rodzaj`
--

INSERT INTO `filmy_rodzaj` (`ID`, `Filmy_ID`, `Rodzaj_ID`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 3, 2),
(4, 3, 4),
(5, 5, 3),
(6, 5, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `ID` bigint(20) NOT NULL,
  `Imie` varchar(255) NOT NULL,
  `Nazwisko` varchar(255) NOT NULL,
  `Mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klienci`
--

INSERT INTO `klienci` (`ID`, `Imie`, `Nazwisko`, `Mail`) VALUES
(1, 'Nikodem', 'Czerwiński', 'nikodemczerwinski@mail.com'),
(2, 'Bartek', 'Bielawa', 'bartekbielawa@mail.com'),
(3, 'Darek', 'Jacek', 'darekjacek@mail.com'),
(4, 'Błażej', 'Kartuz', 'blazejkartuz@mail.com'),
(5, 'Jan', 'Paweł', 'janpawel@mail.com'),
(6, 'Dominik', 'Mazurkiewicz', 'dominikmazurkiewicz@mail.com'),
(7, 'Adam', 'Kowalski', 'adamkowalski@mail.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rodzaj_filmu`
--

CREATE TABLE `rodzaj_filmu` (
  `ID` bigint(20) NOT NULL,
  `Nazwa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rodzaj_filmu`
--

INSERT INTO `rodzaj_filmu` (`ID`, `Nazwa`) VALUES
(1, 'Horror'),
(2, 'Dramat'),
(3, 'Komedia'),
(4, 'Dokument');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sale`
--

CREATE TABLE `sale` (
  `ID` bigint(20) NOT NULL,
  `Ilosc_miejsc` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`ID`, `Ilosc_miejsc`) VALUES
(1, 95),
(2, 130),
(3, 88),
(4, 120),
(5, 160),
(6, 55);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `seanse`
--

CREATE TABLE `seanse` (
  `ID` bigint(20) NOT NULL,
  `Termin` datetime NOT NULL,
  `Sala_ID` bigint(20) NOT NULL,
  `Film_ID` bigint(20) NOT NULL,
  `Liczba_wolnych_miejsc` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seanse`
--

INSERT INTO `seanse` (`ID`, `Termin`, `Sala_ID`, `Film_ID`, `Liczba_wolnych_miejsc`) VALUES
(1, '2024-11-08 12:20:00', 1, 1, 20),
(2, '2024-11-09 15:20:00', 2, 1, 33),
(3, '2024-11-11 14:20:00', 3, 2, 5),
(4, '2024-11-10 11:30:00', 4, 3, 11),
(5, '2024-11-09 18:00:00', 5, 4, 10),
(6, '2024-12-11 00:00:00', 2, 2, 33),
(7, '2024-12-11 00:00:00', 2, 2, 33);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sprzedawcy`
--

CREATE TABLE `sprzedawcy` (
  `ID` bigint(20) NOT NULL,
  `Imie` varchar(255) NOT NULL,
  `Nazwisko` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sprzedawcy`
--

INSERT INTO `sprzedawcy` (`ID`, `Imie`, `Nazwisko`) VALUES
(1, 'Tomasz', 'Niedzielny'),
(2, 'Mirosław', 'Adamowicz'),
(3, 'Jurek', 'Kowalski'),
(4, 'Jan', 'Marek');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `bilety`
--
ALTER TABLE `bilety`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Seans_FK1` (`Seans_ID`),
  ADD KEY `Sprzedawca_FK1` (`Sprzedawca_ID`),
  ADD KEY `Klient_FK1` (`Klient_ID`);

--
-- Indeksy dla tabeli `filmy`
--
ALTER TABLE `filmy`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `filmy_rodzaj`
--
ALTER TABLE `filmy_rodzaj`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Filmy_FK1` (`Filmy_ID`),
  ADD KEY `Rodzaj_FK2` (`Rodzaj_ID`);

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `rodzaj_filmu`
--
ALTER TABLE `rodzaj_filmu`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `seanse`
--
ALTER TABLE `seanse`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Film_FK1` (`Film_ID`),
  ADD KEY `Sala_FK1` (`Sala_ID`);

--
-- Indeksy dla tabeli `sprzedawcy`
--
ALTER TABLE `sprzedawcy`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bilety`
--
ALTER TABLE `bilety`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `filmy`
--
ALTER TABLE `filmy`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `filmy_rodzaj`
--
ALTER TABLE `filmy_rodzaj`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `klienci`
--
ALTER TABLE `klienci`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rodzaj_filmu`
--
ALTER TABLE `rodzaj_filmu`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `seanse`
--
ALTER TABLE `seanse`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sprzedawcy`
--
ALTER TABLE `sprzedawcy`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bilety`
--
ALTER TABLE `bilety`
  ADD CONSTRAINT `Klient_FK1` FOREIGN KEY (`Klient_ID`) REFERENCES `klienci` (`ID`),
  ADD CONSTRAINT `Seans_FK1` FOREIGN KEY (`Seans_ID`) REFERENCES `seanse` (`ID`),
  ADD CONSTRAINT `Sprzedawca_FK1` FOREIGN KEY (`Sprzedawca_ID`) REFERENCES `sprzedawcy` (`ID`);

--
-- Constraints for table `filmy_rodzaj`
--
ALTER TABLE `filmy_rodzaj`
  ADD CONSTRAINT `Filmy_FK` FOREIGN KEY (`Filmy_ID`) REFERENCES `filmy` (`ID`),
  ADD CONSTRAINT `Filmy_FK1` FOREIGN KEY (`Filmy_ID`) REFERENCES `filmy` (`ID`),
  ADD CONSTRAINT `Rodzaj_FK` FOREIGN KEY (`Rodzaj_ID`) REFERENCES `rodzaj_filmu` (`ID`),
  ADD CONSTRAINT `Rodzaj_FK1` FOREIGN KEY (`Rodzaj_ID`) REFERENCES `rodzaj_filmu` (`ID`),
  ADD CONSTRAINT `Rodzaj_FK2` FOREIGN KEY (`Rodzaj_ID`) REFERENCES `rodzaj_filmu` (`ID`);

--
-- Constraints for table `seanse`
--
ALTER TABLE `seanse`
  ADD CONSTRAINT `Film_FK1` FOREIGN KEY (`Film_ID`) REFERENCES `filmy` (`ID`),
  ADD CONSTRAINT `Sala_FK1` FOREIGN KEY (`Sala_ID`) REFERENCES `sale` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
