-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 06 jan. 2021 à 14:51
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
  `story` text,
  `slug` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isValidated` tinyint(4) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idGenre`),
  KEY `FK_User_Genre` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=1380 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `genres`
--

INSERT INTO `genres` (`idGenre`, `genreName`, `story`, `slug`, `createdAt`, `updatedAt`, `isValidated`, `idUser`) VALUES
(1377, 'Classique', 'La musique classique désigne pour le grand public l\'ensemble de la musique occidentale savante d\'origine liturgique et séculière, par opposition à la musique populaire, depuis la musique médiévale à nos jours', 'Classique', '2021-01-06 14:27:57', '2021-01-06 14:27:57', 1, 5),
(1378, 'solo blues', 'Le blues est un genre musical, vocal et instrumental dérivé des chants de travail des populations afro-américaines subissant la ségrégation raciale aux États-Unis.', 'solo-blues', '2021-01-06 14:28:32', '2021-01-06 14:28:32', 1, 5),
(1379, 'Jazz', 'Le jazz est un genre musical originaire du Sud des États-Unis, créé à la fin du xixe siècle et au début du xxe siècle au sein des communautés afro-américaines.', 'Jazz', '2021-01-06 14:28:50', '2021-01-06 14:28:50', 1, 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tracks`
--

INSERT INTO `tracks` (`idTrack`, `nameTrack`, `url`, `slug`, `createdAt`, `updatedAt`, `isValidated`, `idGenre`, `idUser`) VALUES
(21, 'Relaxing Jazz musique', 'https://youtu.be/neV3EPgvZ3g', 'Relaxing-Jazz-musique', '2021-01-06 14:33:02', '2021-01-06 14:33:02', 1, 1379, 5),
(22, 'Whiskey blues', 'https://youtu.be/1eNSWZ4x2ZU', 'Whiskey-blues', '2021-01-06 14:33:35', '2021-01-06 14:33:35', 1, 1378, 5),
(23, 'Les meilleur de Mozart', 'https://youtu.be/Rb0UmrCXxVA', 'Les-meilleur-de-Mozart', '2021-01-06 14:34:25', '2021-01-06 14:34:25', 1, 1377, 5),
(24, 'Symphony No. 9 ~ Beethoven', 'https://youtu.be/t3217H8JppI', 'Symphony-No-9-Beethoven', '2021-01-06 14:34:47', '2021-01-06 14:34:47', 1, 1377, 5),
(25, '50 Classiques du Jazz', 'https://youtu.be/oGkkusOMFj0', '50-Classiques-du-Jazz', '2021-01-06 14:38:31', '2021-01-06 14:38:31', 1, 1379, 5),
(26, 'Louisiana Blues', 'https://youtu.be/BuJTn1RQ2us', 'Louisiana-Blues', '2021-01-06 14:44:47', '2021-01-06 14:44:47', 1, 1378, 5);

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
  `roleId` int(11) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `userName`, `email`, `Password`, `roleId`) VALUES
(5, 'Admin', 'Admin@gmail.com', 'dc647eb65e6711e155375218212b3964', 1),
(6, 'Moderateur', 'moderateur@gmail.com', 'dc647eb65e6711e155375218212b3964', 2),
(7, 'TestUser', 'testuser@gmail.com', 'dc647eb65e6711e155375218212b3964', 3);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `genres`
--
ALTER TABLE `genres`
  ADD CONSTRAINT `FK_User_Genre` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE;

--
-- Contraintes pour la table `tracks`
--
ALTER TABLE `tracks`
  ADD CONSTRAINT `FK_Genre_Track` FOREIGN KEY (`idGenre`) REFERENCES `genres` (`idGenre`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_User_Track` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
