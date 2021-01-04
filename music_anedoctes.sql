-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Jeu 31 dec. 2020 à 18:35
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `music_anedoctes`
--

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `idGenre` int(11) NOT NULL AUTO_INCREMENT,
  `genreName` varchar(255) NOT NULL,
  `story` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isValidated` tinyint(4) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idGenre`),
  KEY `FK_User_Genre` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `genres`
--

INSERT INTO `genres` (`idGenre`, `genreName`, `story`, `slug`, `createdAt`, `updatedAt`, `isValidated`, `idUser`) VALUES
(9, 'testGenre', 'ceci est un test ', 'testGenre', '2020-12-20 20:42:51', '2020-12-20 20:42:51', 0, 3),
(10, 'Rock that rocks', 'This is a super funny story', 'Rock-that-rocks', '2020-12-20 20:44:36', '2020-12-20 20:44:36', 1, 4),
(11, 'Nouveau Genre Reggea', 'Le reggea ?a me donne envie de faire des dreds', 'Nouveau-Genre-Reggea', '2020-12-25 17:56:04', '2020-12-25 17:56:04', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tracks` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsValidated` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tracks`
--

DROP TABLE IF EXISTS `tracks`;
CREATE TABLE IF NOT EXISTS `tracks` (
  `idTrack` int(11) NOT NULL AUTO_INCREMENT,
  `nameTrack` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isValidated` tinyint(1) NOT NULL,
  `idGenre` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idTrack`),
  KEY `FK_Genre_Track` (`idGenre`),
  KEY `FK_User_Track` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tracks`
--

INSERT INTO `tracks` (`idTrack`, `nameTrack`, `url`, `slug`, `createdAt`, `updatedAt`, `isValidated`, `idGenre`, `idUser`) VALUES
(2, 'morceau de rock', 'url rock', 'morceau-de-rock', '2020-12-24 18:45:43', '2020-12-24 18:45:43', 1, 10, 4),
(4, 'un autre morceau rock', 'qwerty', 'un-autre-morceau-rock', '2020-12-25 17:05:52', '2020-12-25 17:05:52', 0, 10, 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Password` text NOT NULL,
  `dateOfBirth` date NOT NULL,
  `roleId` int(11) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `userName`, `email`, `Password`, `dateOfBirth`, `roleId`) VALUES
(1, 'jeje', '', 'sdffdqdfsfdgsdfsdfdfs', '2020-12-01', 1),
(2, 'Ott', 'joottjeremy3@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1998-08-18', 1),
(3, 'testname', 'test@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1990-10-12', 1),
(4, 'john', 'john@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1990-10-12', 3);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `genres`
--
ALTER TABLE `genres`
  ADD CONSTRAINT `FK_User_Genre` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Contraintes pour la table `tracks`
--
ALTER TABLE `tracks`
  ADD CONSTRAINT `FK_Genre_Track` FOREIGN KEY (`idGenre`) REFERENCES `genres` (`idGenre`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_User_Track` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
