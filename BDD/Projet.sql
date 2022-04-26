-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 26 avr. 2022 à 11:18
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
  `Ville` varchar(50) COLLATE utf8_bin NOT NULL,
  `Lieu` varchar(50) COLLATE utf8_bin NOT NULL,
  `Date` date NOT NULL,
  `HeureDebut` time(4) NOT NULL,
  `HeureFin` time(4) NOT NULL,
  `Theme` enum('musique','cinéma','sport','travail','alimentation','culture','bar','festival','autres') COLLATE utf8_bin NOT NULL,
  `theme2` enum('musique','cinema','sport','travail','alimentation','culture','bar','festival','autres') COLLATE utf8_bin DEFAULT NULL,
  `theme3` enum('autres','musique','cinema','sport','travail','alimentation','culture','bar','festival') COLLATE utf8_bin DEFAULT NULL,
  `Info_sup` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `Proprietaire` int(10) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `Annonces`
--

INSERT INTO `Annonces` (`Ville`, `Lieu`, `Date`, `HeureDebut`, `HeureFin`, `Theme`, `theme2`, `theme3`, `Info_sup`, `Proprietaire`, `id`) VALUES
('angers', 'patinoire', '2022-04-27', '09:00:00.0000', '11:00:00.0000', 'travail', 'sport', 'alimentation', 'Informations supplémentaires ? ', 1234567891, 1),
('le mans', 'bu', '2022-04-26', '09:00:00.0000', '12:00:00.0000', 'travail', NULL, NULL, NULL, 1234567891, 2),
('sdfg', 'dfbg', '2022-04-26', '09:00:00.0000', '20:00:00.0000', 'sport', NULL, NULL, NULL, 1234567891, 3),
('sdfg', 'sggrhehtet', '2022-04-26', '09:00:00.0000', '10:00:00.0000', 'sport', 'alimentation', 'cinema', NULL, 1234567891, 5),
('test', 'letest', '2022-04-27', '09:00:00.0000', '15:00:00.0000', 'sport', 'alimentation', 'musique', NULL, 1234567891, 7);

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
-- Déchargement des données de la table `Utilisateurs`
--

INSERT INTO `Utilisateurs` (`Prenom`, `Nom`, `Pseudo`, `Age`, `Num_Tel`, `Ville`, `Mdp`) VALUES
('bertille', 'trotin', 'btrotin', 20, 102030405, 'angers', 'santana'),
('paul', 'trotro', '', 20, 1234567891, '', 'mdp'),
('gfgjgg', 'ghhjhhjv', '', 18, 1234567897, '', '0000000');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Annonces`
--
ALTER TABLE `Annonces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Proprietaire` (`Proprietaire`);

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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Annonces`
--
ALTER TABLE `Annonces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `Participation_ibfk_1` FOREIGN KEY (`Participant`) REFERENCES `Utilisateurs` (`Num_Tel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
