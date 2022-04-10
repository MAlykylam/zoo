-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 10 avr. 2022 à 21:26
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `z00`
--
CREATE DATABASE IF NOT EXISTS `z00` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `z00`;

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

DROP TABLE IF EXISTS `animal`;
CREATE TABLE IF NOT EXISTS `animal` (
  `idAnimal` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `dateN` date DEFAULT NULL,
  `dateE` date DEFAULT NULL,
  `sexe` varchar(50) DEFAULT NULL,
  `parentM` varchar(50) DEFAULT NULL,
  `parentF` varchar(50) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `traitement` varchar(50) DEFAULT NULL,
  `dateD` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `idZoo` varchar(50) DEFAULT NULL,
  `idEspece` varchar(50) DEFAULT NULL,
  `idEnclos` varchar(50) DEFAULT NULL,
  `idRegimeAlimentaire` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idAnimal`),
  KEY `idZoo` (`idZoo`),
  KEY `idEspece` (`idEspece`),
  KEY `idEnclos` (`idEnclos`),
  KEY `idRegimeAlimentaire` (`idRegimeAlimentaire`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `animal`
--

INSERT INTO `animal` (`idAnimal`, `name`, `dateN`, `dateE`, `sexe`, `parentM`, `parentF`, `photo`, `traitement`, `dateD`, `description`, `idZoo`, `idEspece`, `idEnclos`, `idRegimeAlimentaire`) VALUES
(1, 'fifi', '2000-03-01', '2022-04-12', 'male', 'fifo', 'fafa', '', 'aucun', NULL, NULL, '1', '1', '1', '2'),
(3, 'malek', '2021-01-11', '2022-04-14', 'male', 'malik', 'malika', '', 'aucun', NULL, NULL, '1', '1', '1', '2'),
(4, 'Soso', '2020-05-05', '2019-12-10', 'Femelle', 'Lolo', 'lala', '', 'Soins des yeux', NULL, NULL, '1', '2', '3', '2'),
(35, 'Tigro jr', '2021-11-01', '2021-08-03', 'male', 'Trigro', 'tigresse', '', 'Soins de  la machoir', NULL, '', NULL, '3', '2', '1');

-- --------------------------------------------------------

--
-- Structure de la table `assinger`
--

DROP TABLE IF EXISTS `assinger`;
CREATE TABLE IF NOT EXISTS `assinger` (
  `idAnimal` varchar(50) NOT NULL,
  `idSoigneur` varchar(50) NOT NULL,
  PRIMARY KEY (`idAnimal`,`idSoigneur`),
  KEY `idSoigneur` (`idSoigneur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `assinger`
--

INSERT INTO `assinger` (`idAnimal`, `idSoigneur`) VALUES
('1', '1'),
('1', '2'),
('3', '2'),
('35', '1'),
('36', ''),
('4', '1');

-- --------------------------------------------------------

--
-- Structure de la table `enclos`
--

DROP TABLE IF EXISTS `enclos`;
CREATE TABLE IF NOT EXISTS `enclos` (
  `idEnclos` int(50) NOT NULL AUTO_INCREMENT,
  `nameEnclos` varchar(11) NOT NULL,
  `taille` int(11) NOT NULL,
  `vide` bit(1) NOT NULL,
  `capaciteMax` int(11) NOT NULL,
  `idZoo` varchar(50) NOT NULL,
  `IdEnvironnement` varchar(50) NOT NULL,
  PRIMARY KEY (`idEnclos`),
  KEY `idZoo` (`idZoo`),
  KEY `IdEnvironnement` (`IdEnvironnement`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enclos`
--

INSERT INTO `enclos` (`idEnclos`, `nameEnclos`, `taille`, `vide`, `capaciteMax`, `idZoo`, `IdEnvironnement`) VALUES
(1, 'A 255', 55, b'1', 5, '1', '1'),
(2, 'B 344', 66, b'1', 4, '1', '3'),
(3, 'A 166', 100, b'1', 2, '1', '2');

-- --------------------------------------------------------

--
-- Structure de la table `environnement`
--

DROP TABLE IF EXISTS `environnement`;
CREATE TABLE IF NOT EXISTS `environnement` (
  `IdEnvironnement` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`IdEnvironnement`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `environnement`
--

INSERT INTO `environnement` (`IdEnvironnement`, `name`) VALUES
(1, 'desert'),
(2, 'Savane'),
(3, 'jungle');

-- --------------------------------------------------------

--
-- Structure de la table `espece`
--

DROP TABLE IF EXISTS `espece`;
CREATE TABLE IF NOT EXISTS `espece` (
  `idEspece` int(50) NOT NULL AUTO_INCREMENT,
  `nameEspece` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `IdEnvironnement` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idEspece`),
  KEY `IdEnvironnement` (`IdEnvironnement`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `espece`
--

INSERT INTO `espece` (`idEspece`, `nameEspece`, `description`, `IdEnvironnement`) VALUES
(1, 'Chameau', 'Le chameau mesure en moyenne un peu plus de 2 m en haut des bosses, pour un poids compris entre 600 kg à 1 t. Les chameaux sauvages sont plus minces que leurs cousins domestiques. Leurs bosses et leurs pieds sont plus petits, et leur pelage hivernal moins long.', '1'),
(2, 'Girafe', 'La Girafe (Giraffa camelopardalis) est une espèce de mammifères ongulés artiodactyles, du groupe des ruminants, vivant dans les savanes africaines et répandue du Tchad jusqu\'en Afrique du Sud. Son nom  mais l\'animal fut anciennement appelé camélopard, du latin camelopardus1, contraction de camelus (chameau) en raison du long cou et de pardus (léopard) en raison des taches recouvrant son corps. Après des millions d\'années d\'évolution, la girafe a acquis une anatomie unique avec un cou particulièrement allongé qui lui permet notamment de brouter haut dans les arbres.\r\n\r\nNeuf populations, se différenciant par leurs robes et formes, ont été décrites par les naturalistes depuis le xixe siècle parfois comme espèces à part entière, mais généralement considérées comme simples sous-espèces jusqu\'au xxie siècle. Cependant la taxonomie des girafes est actuellement débattue parmi les scientifiques.\r\n\r\nL’espèce est considérée comme vulnérable par l\'UICN2 : il y avait 155 000 individus en 1985 et il n\'y en a plus que 97 000 en 20153, soit une diminution approchant 40 % en 30 ans4.', '2'),
(3, 'Tigre', 'Le Tigre (Panthera tigris) est une espèce de mammifère carnivore de la famille des félidés (Felidae) du genre Panthera. Aisément reconnaissable à sa fourrure rousse rayée de noir, il est le plus grand félin sauvage et l\'un des plus grands carnivores terrestres. L\'espèce est divisée en neuf sous-espèces présentant des différences mineures de taille ou de comportement. Superprédateur, il chasse principalement les cerfs et les sangliers, bien qu\'il puisse s\'attaquer à des proies de taille plus importante comme les buffles. Jusqu\'au xixe siècle, le tigre était réputé mangeur d\'hommes. La structure sociale des tigres en fait un animal solitaire ; le mâle possède un territoire qui englobe les domaines de plusieurs femelles et ne participe pas à l\'éducation des petits.', '3');

-- --------------------------------------------------------

--
-- Structure de la table `regimealimentaire`
--

DROP TABLE IF EXISTS `regimealimentaire`;
CREATE TABLE IF NOT EXISTS `regimealimentaire` (
  `idRegimeAlimentaire` int(50) NOT NULL AUTO_INCREMENT,
  `nameRA` varchar(50) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idRegimeAlimentaire`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `regimealimentaire`
--

INSERT INTO `regimealimentaire` (`idRegimeAlimentaire`, `nameRA`, `description`) VALUES
(1, 'carnivor', NULL),
(2, 'vege', 'ksdbvhf hv');

-- --------------------------------------------------------

--
-- Structure de la table `soingeur`
--

DROP TABLE IF EXISTS `soingeur`;
CREATE TABLE IF NOT EXISTS `soingeur` (
  `idSoigneur` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `dateE` date NOT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `photo` varchar(50) NOT NULL,
  `sexe` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `specialite` varchar(50) NOT NULL,
  `nbrMaxEnclos` int(11) NOT NULL,
  `superieur` varchar(50) DEFAULT NULL,
  `dateS` date DEFAULT NULL,
  `informations` text DEFAULT NULL,
  PRIMARY KEY (`idSoigneur`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `soingeur`
--

INSERT INTO `soingeur` (`idSoigneur`, `name`, `firstname`, `dateE`, `tel`, `photo`, `sexe`, `mail`, `specialite`, `nbrMaxEnclos`, `superieur`, `dateS`, `informations`) VALUES
(1, 'kriss', 'tristoun', '1996-06-01', '07097097090', '', 'male', 'jesaispazs@hotmail', 'faire chier le monde', 3, 'malik', '2022-04-20', NULL),
(2, 'Isa', 'belle', '2022-04-12', '07690595885', '', 'Femelle', 'QSDFNH?J../§@AK?FOISDNG', 'FMHGREFDNB', 2, 'kriss', NULL, 'eflkvbcvbdfxbvijbdxmvbjfvdvddcb');

-- --------------------------------------------------------

--
-- Structure de la table `zoo`
--

DROP TABLE IF EXISTS `zoo`;
CREATE TABLE IF NOT EXISTS `zoo` (
  `idZoo` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idZoo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `zoo`
--

INSERT INTO `zoo` (`idZoo`, `name`) VALUES
(1, 'ZOO DE LYON');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
