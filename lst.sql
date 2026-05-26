-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 25 mai 2026 à 22:48
-- Version du serveur : 9.1.0
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lst`
--

-- --------------------------------------------------------

--
-- Structure de la table `coproprietaire`
--

DROP TABLE IF EXISTS `coproprietaire`;
CREATE TABLE IF NOT EXISTS `coproprietaire` (
  `idCoproprietaire` int NOT NULL AUTO_INCREMENT,
  `civilite` tinyint(1) DEFAULT NULL,
  `nom` varchar(35) NOT NULL,
  `prenom` varchar(35) NOT NULL,
  `rue` varchar(50) NOT NULL,
  `cp` char(5) NOT NULL,
  `ville` varchar(35) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `loginUtil` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mdp` varchar(100) NOT NULL,
  PRIMARY KEY (`idCoproprietaire`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `coproprietaire`
--

INSERT INTO `coproprietaire` (`idCoproprietaire`, `civilite`, `nom`, `prenom`, `rue`, `cp`, `ville`, `telephone`, `loginUtil`, `mdp`) VALUES
(1, 0, 'MULLER', 'Jean-Marie', '18, av des Pins', '44000', 'Nantes', '0952561926', 'muller2025', '$2y$10$cEGUrdr5bkDG6wrrSMPVJOXazsabFNPY0A5QqJR0IlsYOm9K5ZLya'),
(2, 0, 'VIVIAN', 'Christian', '18, av des Pins', '44000', 'Nantes', '0952324920', 'vivian2025', '$2y$10$FADqiawGyK1AWnFHQtLS3.F.U5ZnRq19N.v8fRnpHNrdz2/ahO.aO'),
(3, 0, 'SAIDJ', 'Simon', '49, rue des chateaux', '49000', 'Angers', '0952375642', 'saidj2025', '$2y$10$NpcWG39EW9sHweqJlDAS4eGiXUj/zmy6RpRBAAdf0kdZR0eO3GK/y'),
(4, 1, 'BEIRUT', 'Virginie', '18, av des Pins', '44000', 'Nantes', '0952528960', 'beirut2025', '$2y$10$wrZ1GXAbfPUbO1WN9RjPbu.Maqw07xSU5SLLuOAG2E/.6a5K.mUQS'),
(5, 0, 'HAFID', 'Karim', '18, av des Pins', '44000', 'Nantes', '0952554645', 'hafid2025', '$2y$10$VGiXRSvgsxTRBBWLgdOKw.LQWTlVhsGc6fbKNuSAf5LnQiow5eQu2'),
(6, 0, 'lala', 'jhj', 'a', '02222', 'b', '0323535510', 'lala', '$2y$10$ll4y2Pwy88cQhw4IUlS.Pea57iiCfuI9fhmJTnVmQF6IFw/58Guby'),
(7, 0, 'MULLER', 'Jean-Marie', '18, av des Pins', '44000', 'Nantes', '0952561926', 'muller2025', '$2y$10$QYBobJ8NrIDmh6IGMcO6a.JJXEiAdkozPY7rBCCGNRibn9upfMlSO');

-- --------------------------------------------------------

--
-- Structure de la table `copropriete`
--

DROP TABLE IF EXISTS `copropriete`;
CREATE TABLE IF NOT EXISTS `copropriete` (
  `idCopropriete` int NOT NULL AUTO_INCREMENT,
  `nomImmeuble` varchar(50) NOT NULL,
  `rue` varchar(50) NOT NULL,
  `cp` char(5) NOT NULL,
  `ville` varchar(40) NOT NULL,
  PRIMARY KEY (`idCopropriete`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `copropriete`
--

INSERT INTO `copropriete` (`idCopropriete`, `nomImmeuble`, `rue`, `cp`, `ville`) VALUES
(1, 'Résidence des Pins', '18, av de la Pins', '44000', 'Nantes'),
(2, 'Résidence des Balsamiers', '5, Pl de la résidence', '44000', 'Nantes');

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

DROP TABLE IF EXISTS `devis`;
CREATE TABLE IF NOT EXISTS `devis` (
  `idDevis` int NOT NULL AUTO_INCREMENT,
  `dateDev` date NOT NULL,
  `prestataire` varchar(50) NOT NULL,
  `MontantTTC` int NOT NULL,
  `vote` tinyint(1) DEFAULT NULL,
  `idCopropriete` int NOT NULL,
  `idTravaux` int NOT NULL,
  PRIMARY KEY (`idDevis`),
  KEY `idCopropriete` (`idCopropriete`),
  KEY `idTravaux` (`idTravaux`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `devis`
--

INSERT INTO `devis` (`idDevis`, `dateDev`, `prestataire`, `MontantTTC`, `vote`, `idCopropriete`, `idTravaux`) VALUES
(1, '2021-05-30', 'Perthuis', 14500, 1, 1, 1),
(2, '2021-05-15', 'SMBTP', 15000, 0, 1, 1),
(3, '2021-05-31', 'ARDEN BTP', 17000, 0, 1, 1),
(4, '2021-06-15', 'Heiss SARL', 246000, 1, 2, 2),
(5, '2021-06-30', 'MURANO SA', 271000, 0, 2, 2),
(6, '2021-06-10', 'ARDEN BTP', 223000, 0, 2, 2),
(7, '2021-10-12', 'Renov Façade', 25000, 1, 1, 3),
(8, '2020-10-15', 'SMBTP', 27000, 0, 1, 3),
(9, '2021-10-28', 'ARDEN BTP', 22000, 0, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `lot`
--

DROP TABLE IF EXISTS `lot`;
CREATE TABLE IF NOT EXISTS `lot` (
  `idLot` int NOT NULL AUTO_INCREMENT,
  `localisation` varchar(50) DEFAULT NULL,
  `tantieme` smallint NOT NULL,
  `idCopropriete` int NOT NULL,
  `idCoproprietaire` int NOT NULL,
  PRIMARY KEY (`idLot`),
  KEY `idCopropriete` (`idCopropriete`),
  KEY `idCoproprietaire` (`idCoproprietaire`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `lot`
--

INSERT INTO `lot` (`idLot`, `localisation`, `tantieme`, `idCopropriete`, `idCoproprietaire`) VALUES
(1, 'RDC coté AV des', 2097, 1, 1),
(2, 'REZ DE JARDIN', 1422, 1, 2),
(3, 'ETAGE AV DE LA', 1659, 1, 3),
(4, 'ETAGE JARDIN', 2222, 1, 4),
(5, 'COMBLE', 1400, 1, 2),
(6, 'ETAGE JARDIN', 1200, 2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `prestataire`
--

DROP TABLE IF EXISTS `prestataire`;
CREATE TABLE IF NOT EXISTS `prestataire` (
  `idPrestataire` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `cp` char(5) NOT NULL,
  PRIMARY KEY (`idPrestataire`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `prestataire`
--

INSERT INTO `prestataire` (`idPrestataire`, `nom`, `adresse`, `ville`, `cp`) VALUES
(1, 'Perthuis', '23 rue de la patate', 'Mulhouse', '68130'),
(2, 'SMBTP', '12 avenue Marchal', 'Obernai', '67150'),
(3, 'ARDEN BTP', '13 rue du vins', 'Colmar', '68025'),
(4, 'Heiss SARL', '18 quartier blanc', 'Paris', '75140'),
(5, 'MURANO SA', '182 avenue Marchal', 'Obernai', '67150'),
(6, 'Renov Façade', '32 rue de l\'acacia', 'Andlau', '67140');

-- --------------------------------------------------------

--
-- Structure de la table `travaux`
--

DROP TABLE IF EXISTS `travaux`;
CREATE TABLE IF NOT EXISTS `travaux` (
  `idTravaux` int NOT NULL AUTO_INCREMENT,
  `libelleTravaux` varchar(50) NOT NULL,
  `idPrestataire` int NOT NULL,
  PRIMARY KEY (`idTravaux`),
  KEY `idPrestataire` (`idPrestataire`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `travaux`
--

INSERT INTO `travaux` (`idTravaux`, `libelleTravaux`, `idPrestataire`) VALUES
(1, 'Rénovation parking', 1),
(2, 'Réfection toiture', 3),
(3, 'Ravalement façade', 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
