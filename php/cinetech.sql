-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 10 mai 2023 à 23:02
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cinetech`
--

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE IF NOT EXISTS `favoris` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int NOT NULL,
  `id_media` int NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`id`, `id_utilisateur`, `id_media`, `type`) VALUES
(52, 1, 677179, 'movie'),
(74, 1, 640146, 'movie'),
(59, 1, 63174, 'tv'),
(60, 1, 36361, 'tv'),
(61, 1, 202250, 'tv'),
(62, 1, 204370, 'tv'),
(63, 1, 216390, 'tv'),
(64, 1, 215315, 'tv'),
(65, 1, 218145, 'tv'),
(66, 1, 217510, 'tv'),
(67, 1, 221249, 'tv'),
(68, 1, 101463, 'tv'),
(69, 1, 114294, 'tv'),
(70, 1, 130542, 'tv'),
(71, 2, 948713, 'movie'),
(75, 3, 640146, 'movie');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'a', '$2y$10$CU6B7dXxbSWBjQKL8d6JS.T.9Poe7SOQzisDCRoBrIeEV0iUCzlmW'),
(2, 'b', '$2y$10$ta/v4PANYvpyBTZ56UNeKefnw/hDvIyvqciWbmq0fqq7ZIkC9mIdu'),
(3, 'c', '$2y$10$y9ewkGRrCDtC1lHBt10LVO4o74FzRX.X/btk/GrHJ4yXKbzrrD6i2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
