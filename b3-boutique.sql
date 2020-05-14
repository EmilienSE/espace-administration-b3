-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 13 mai 2020 à 13:46
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `b3-boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin_account`
--

DROP TABLE IF EXISTS `admin_account`;
CREATE TABLE IF NOT EXISTS `admin_account` (
  `idAdminAccount` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `enabled` tinyint(4) NOT NULL,
  PRIMARY KEY (`idAdminAccount`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin_account`
--

INSERT INTO `admin_account` (`idAdminAccount`, `name`, `password`, `mail`, `enabled`) VALUES
(1, 'romainAdmin', '123456', 'romainflix@outlook.fr', 0),
(2, 'romainAdmin', '123456', 'romainflix@outlook.fr', 0);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `idCategory` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `description` mediumtext NOT NULL,
  `idParentCategory` int(11) DEFAULT NULL,
  `enabled` tinyint(4) NOT NULL,
  PRIMARY KEY (`idCategory`),
  KEY `idParentCategory_idx` (`idParentCategory`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`idCategory`, `name`, `slug`, `description`, `idParentCategory`, `enabled`) VALUES
(1, 'Chaussette', 'www.boutique.com/chaussettes', 'Lorem Ipsum', 1, 0),
(2, 'nom', 'slug', 'description', 1, 0),
(3, 'Chaussette', 'www.boutique.com/chaussettes', 'Lorem Ipsum bloublu', 1, 0),
(4, 'Lol', 'www.boutique.com/chaussettes', 'Lorem Ipsum', 1, 1),
(5, 'rorolefilou', 'slug2', 'dedede', 4, 0),
(9, 'Romain', 'slug', 'test', 1, 0),
(10, 'Chaussette', 'www.boutique.com/chaussettes', 'Lorem Ipsum', 1, 0),
(11, 'Romain', 'www.boutique.com/chaussettes/Chaussettes-rouges-domyos', 'Malboro', 10, 1),
(12, 'Accueil', 'https://accueil', 'Voici la catÃ©gorie par dÃ©faut', 12, 1),
(13, 'Accueil', 'https://accueil', 'Voici la catÃ©gorie par dÃ©faut', 12, 1),
(14, 'Accueil', 'https://accueil', 'Voici la catÃ©gorie par dÃ©faut', 12, 1),
(15, 'Accueil', 'https://accueil', 'Voici la catÃ©gorie par dÃ©faut', 12, 1),
(16, 'Accueil', 'https://accueil', 'Voici la catÃ©gorie par dÃ©faut', 12, 1),
(17, 'Accueil', 'https://accueil', 'Voici la catÃ©gorie par dÃ©faut', 12, 1),
(18, 'Accueil', 'https://accueil', 'Voici la catÃ©gorie par dÃ©faut', 12, 1),
(19, 'Accueil', 'https://accueil', 'Voici la catÃ©gorie par dÃ©faut', 12, 1);

-- --------------------------------------------------------

--
-- Structure de la table `link_product_category`
--

DROP TABLE IF EXISTS `link_product_category`;
CREATE TABLE IF NOT EXISTS `link_product_category` (
  `idLinkProductCategory` int(11) NOT NULL AUTO_INCREMENT,
  `idCategory` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  PRIMARY KEY (`idLinkProductCategory`,`idCategory`),
  KEY `idCategory_idx` (`idCategory`),
  KEY `idProduct_idx` (`idProduct`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `idProduct` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `description` mediumtext NOT NULL,
  `price` double NOT NULL,
  `weight` double NOT NULL,
  `height` double NOT NULL,
  `width` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `enabled` tinyint(4) NOT NULL,
  PRIMARY KEY (`idProduct`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `idParentCategory` FOREIGN KEY (`idParentCategory`) REFERENCES `category` (`idCategory`);

--
-- Contraintes pour la table `link_product_category`
--
ALTER TABLE `link_product_category`
  ADD CONSTRAINT `idCategory` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`) ON DELETE CASCADE,
  ADD CONSTRAINT `idProduct` FOREIGN KEY (`idProduct`) REFERENCES `product` (`idProduct`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
