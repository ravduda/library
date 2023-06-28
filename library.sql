-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql_library
-- Generation Time: Cze 28, 2023 at 01:23 PM
-- Wersja serwera: 8.0.33
-- Wersja PHP: 8.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `author`
--

CREATE TABLE `author` (
  `id` int NOT NULL,
  `firstname` varchar(40) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `lastname` varchar(40) COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `firstname`, `lastname`) VALUES
(1, 'autorimie', 'autornazwisko'),
(2, 'Rafał', 'Duda');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `book`
--

CREATE TABLE `book` (
  `id` int NOT NULL,
  `titleId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `titleId`) VALUES
(1, 2),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `borrow`
--

CREATE TABLE `borrow` (
  `id` int NOT NULL,
  `userId` int DEFAULT NULL,
  `bookId` int DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `returned` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Epika'),
(2, 'inna nazwa'),
(3, 'test test');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `title`
--

CREATE TABLE `title` (
  `id` int NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `authorId` int DEFAULT NULL,
  `categoryId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`id`, `name`, `description`, `authorId`, `categoryId`) VALUES
(2, 'to se jednak zmienie, albo i jeszcze raz', 'opis', 1, 1),
(3, 'test2', 'opis 2', 1, 1),
(4, 'test', 'opis', 2, NULL),
(5, 'test', 'testowy', 1, 1),
(6, 'znowu testy', 'tests', 2, 2),
(7, 'saf', 'testsfadsfa', 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_polish_ci NOT NULL,
  `pass` varchar(60) COLLATE utf8mb4_polish_ci NOT NULL,
  `firstname` varchar(40) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `lastname` varchar(40) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `role` varchar(20) COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `pass`, `firstname`, `lastname`, `role`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin'),
(2, 'user', 'user', 'user', 'user', 'user'),
(3, 'test@test.tes', 'haslo', 'test', 'test', NULL),
(4, 'tak@nie.pl', 'haslo', 'tak', 'nie', 'user'),
(5, '0', '0', '0', '0', '0'),
(6, 'admin@admin.adm', 'faafaf', 'fasdfa', 'fads', 'user'),
(7, 'test@test.tes', 'haslo', 'test aaaaaaaa', 'test', 'admin'),
(8, 'test@test.tes', 'haslo', 'test', 'test', 'admin'),
(9, 'testjquer@fads.js', 'haslo', 'imie', 'nazz', 'admin'),
(10, 'testjquer@fads.js', 'haslo', 'imie', 'nazz', 'admin'),
(11, 'admin@admin.adm', 'fasdasd', 'fasdf', 'fafa', 'user'),
(12, 'ravduda@gmail.com', 'fasdfasd', 'fas', 'fsa', 'user');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `titleId` (`titleId`);

--
-- Indeksy dla tabeli `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookId` (`bookId`),
  ADD KEY `userId` (`userId`);

--
-- Indeksy dla tabeli `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `authorId` (`authorId`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`titleId`) REFERENCES `title` (`id`);

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`bookId`) REFERENCES `book` (`id`),
  ADD CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Constraints for table `title`
--
ALTER TABLE `title`
  ADD CONSTRAINT `title_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `title_ibfk_2` FOREIGN KEY (`authorId`) REFERENCES `author` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
