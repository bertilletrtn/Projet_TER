-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 06 avr. 2022 à 10:18
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `Annonces`
--

CREATE TABLE `Annonces` (
  `Lieu` varchar(50) COLLATE utf8_bin NOT NULL,
  `Heure` time(6) NOT NULL,
  `Theme` enum('musique','cinéma','sport','travail','alimentation','culture','bar','festival','autres') COLLATE utf8_bin NOT NULL,
  `Info_sup` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `Proprietaire` int(10) NOT NULL,
  `Num-id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `Participation`
--

CREATE TABLE `Participation` (
  `Participant` int(10) NOT NULL,
  `Annonce` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateurs`
--

CREATE TABLE `Utilisateurs` (
  `Prenom` varchar(50) COLLATE utf8_bin NOT NULL,
  `Nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `Pseudo` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `Age` int(3) NOT NULL,
  `Num_Tel` int(10) NOT NULL,
  `Ville` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `Mdp` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Annonces`
--
ALTER TABLE `Annonces`
  ADD KEY `Proprietaire` (`Proprietaire`),
  ADD KEY `Num-id` (`Num-id`);

--
-- Index pour la table `Participation`
--
ALTER TABLE `Participation`
  ADD KEY `Participant` (`Participant`),
  ADD KEY `Annonce` (`Annonce`);

--
-- Index pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  ADD PRIMARY KEY (`Num_Tel`),
  ADD KEY `Num_Tel` (`Num_Tel`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Annonces`
--
ALTER TABLE `Annonces`
  ADD CONSTRAINT `Annonces_ibfk_1` FOREIGN KEY (`Proprietaire`) REFERENCES `Utilisateurs` (`Num_Tel`);

--
-- Contraintes pour la table `Participation`
--
ALTER TABLE `Participation`
  ADD CONSTRAINT `Participation_ibfk_1` FOREIGN KEY (`Participant`) REFERENCES `Utilisateurs` (`Num_Tel`),
  ADD CONSTRAINT `Participation_ibfk_2` FOREIGN KEY (`Annonce`) REFERENCES `Annonces` (`Num-id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;