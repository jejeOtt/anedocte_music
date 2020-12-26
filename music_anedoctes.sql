-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 25, 2020 at 07:03 PM
-- Server version: 8.0.22-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music_anedoctes`
--

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `idGenre` int NOT NULL,
  `genreName` varchar(255) NOT NULL,
  `story` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isValidated` tinyint NOT NULL,
  `idUser` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`idGenre`, `genreName`, `story`, `slug`, `createdAt`, `updatedAt`, `isValidated`, `idUser`) VALUES
(8, 'Jazz', 'ytyuiyu', 'Jazz', '2020-12-20 09:41:33', '2020-12-20 09:41:33', 1, 1),
(9, 'testGenre', 'ceci est un test ', 'testGenre', '2020-12-20 20:42:51', '2020-12-20 20:42:51', 0, 3),
(10, 'Rock that rocks', 'This is a super funny story', 'Rock-that-rocks', '2020-12-20 20:44:36', '2020-12-20 20:44:36', 1, 4),
(11, 'Nouveau Genre Reggea', 'Le reggea ?a me donne envie de faire des dreds', 'Nouveau-Genre-Reggea', '2020-12-25 17:56:04', '2020-12-25 17:56:04', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `tracks` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsValidated` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE `tracks` (
  `idTrack` int NOT NULL,
  `nameTrack` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isValidated` tinyint(1) NOT NULL,
  `idGenre` int NOT NULL,
  `idUser` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`idTrack`, `nameTrack`, `url`, `slug`, `createdAt`, `updatedAt`, `isValidated`, `idGenre`, `idUser`) VALUES
(1, 'un morceau de jazz', 'urltest', 'un-morceau-de-jazz', '2020-12-24 18:45:02', '2020-12-24 18:45:02', 1, 8, 4),
(2, 'morceau de rock', 'url rock', 'morceau-de-rock', '2020-12-24 18:45:43', '2020-12-24 18:45:43', 1, 10, 4),
(3, 'Morceau un', 'urltest', 'Morceau-un', '2020-12-25 17:05:26', '2020-12-25 17:05:26', 0, 8, 3),
(4, 'un autre morceau rock', 'qwerty', 'un-autre-morceau-rock', '2020-12-25 17:05:52', '2020-12-25 17:05:52', 0, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` int NOT NULL,
  `userName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Password` text NOT NULL,
  `dateOfBirth` date NOT NULL,
  `roleId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `userName`, `email`, `Password`, `dateOfBirth`, `roleId`) VALUES
(1, 'jeje', '', 'sdffdqdfsfdgsdfsdfdfs', '2020-12-01', 1),
(2, 'Ott', 'joottjeremy3@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1998-08-18', 1),
(3, 'testname', 'test@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1990-10-12', 1),
(4, 'john', 'john@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1990-10-12', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`idGenre`),
  ADD KEY `FK_User_Genre` (`idUser`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`idTrack`),
  ADD KEY `FK_Genre_Track` (`idGenre`),
  ADD KEY `FK_User_Track` (`idUser`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `idGenre` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tracks`
--
ALTER TABLE `tracks`
  MODIFY `idTrack` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `genres`
--
ALTER TABLE `genres`
  ADD CONSTRAINT `FK_User_Genre` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Constraints for table `tracks`
--
ALTER TABLE `tracks`
  ADD CONSTRAINT `FK_Genre_Track` FOREIGN KEY (`idGenre`) REFERENCES `genres` (`idGenre`),
  ADD CONSTRAINT `FK_User_Track` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
