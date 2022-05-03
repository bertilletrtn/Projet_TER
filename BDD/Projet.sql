-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 03 mai 2022 à 09:58
-- Version du serveur : 5.7.36
-- Version de PHP : 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

DROP TABLE IF EXISTS `annonces`;
CREATE TABLE IF NOT EXISTS `annonces` (
  `Ville` varchar(50) COLLATE utf8_bin NOT NULL,
  `Lieu` varchar(50) COLLATE utf8_bin NOT NULL,
  `Date` date NOT NULL,
  `HeureDebut` time(2) NOT NULL,
  `HeureFin` time(2) NOT NULL,
  `theme` enum('musique','cinéma','sport','travail','alimentation','culture','bar','festival','loisir','autres') COLLATE utf8_bin NOT NULL,
  `theme2` enum('musique','cinema','sport','travail','alimentation','culture','bar','festival','loisir','autres') COLLATE utf8_bin DEFAULT NULL,
  `theme3` enum('autres','musique','cinema','sport','travail','alimentation','culture','bar','festival') COLLATE utf8_bin DEFAULT NULL,
  `Info_sup` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `Proprietaire` int(10) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Titre` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Proprietaire` (`Proprietaire`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`Ville`, `Lieu`, `Date`, `HeureDebut`, `HeureFin`, `theme`, `theme2`, `theme3`, `Info_sup`, `Proprietaire`, `id`, `Titre`) VALUES
('angers', 'patinoire', '2022-04-27', '09:00:00.00', '11:00:00.00', 'sport', 'sport', 'alimentation', 'Informations supplémentaires ? ', 1234567891, 1, 'Patinoire entre pote'),
('le mans', 'bu', '2022-04-26', '09:00:00.00', '12:00:00.00', 'travail', NULL, NULL, NULL, 1234567891, 2, 'travail '),
('Nantes', 'Cinema', '2022-05-11', '14:00:00.00', '17:30:00.00', 'cinéma', NULL, NULL, 'Voir \"Le seigneur des anneaux\" - mon film pas préféré', 1234567891, 8, 'Seigneur des anneaux'),
('Montpellier', 'Starbucks', '2022-04-27', '10:02:00.00', '12:00:00.00', 'bar', NULL, NULL, 'Boire un chocolat chaud', 687526594, 9, 'Matin tranquillou'),
('Madrid', 'Bowling', '2022-08-09', '14:00:00.00', '20:00:00.00', 'loisir', NULL, NULL, 'Je propose de faire trois parties de Bowling (réservé pour les étudiants)', 785423652, 10, 'Bowling '),
('lll', 'kk', '2022-05-05', '09:00:00.00', '20:00:00.00', 'autres', NULL, NULL, '', 689573440, 13, 'mmm'),
('angers', 'ags', '2022-05-02', '15:00:00.00', '20:00:00.00', 'alimentation', NULL, NULL, '', 689573440, 14, 'cafe'),
('Angers', 'ags', '2023-02-02', '09:00:00.00', '20:00:00.00', 'culture', 'cinema', NULL, '', 689573440, 15, 'Tennis'),
('kgkj', 'egkj', '2022-05-05', '09:00:00.00', '20:00:00.00', 'loisir', NULL, NULL, '', 689573440, 16, 'fksjg'),
('efzlk', 'ezflk', '9999-09-09', '09:00:00.00', '20:00:00.00', 'festival', NULL, NULL, 'LOEOFK', 689573440, 17, 'FESTIIIIIIIIIIIIIIVAL');

-- --------------------------------------------------------

--
-- Structure de la table `participation`
--

DROP TABLE IF EXISTS `participation`;
CREATE TABLE IF NOT EXISTS `participation` (
  `Participant` int(10) NOT NULL,
  `Annonce` int(10) NOT NULL,
  KEY `Participant` (`Participant`),
  KEY `Annonce` (`Annonce`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `Prenom` varchar(50) COLLATE utf8_bin NOT NULL,
  `Nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `Pseudo` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `Age` int(3) NOT NULL,
  `Num_Tel` int(10) NOT NULL,
  `Ville` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `Mdp` varchar(10) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`Num_Tel`),
  KEY `Num_Tel` (`Num_Tel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`Prenom`, `Nom`, `Pseudo`, `Age`, `Num_Tel`, `Ville`, `Mdp`) VALUES
('coucou emma...', 'en vrai grave chiant de refaire', 'oui oui l\'idee est cool ^^', 23, 0, 'en vrai j\'espere que tu passera une bonne journÃ©e', 'm'),
('bertille', 'trotin', 'btrotin', 20, 102030405, 'angers', 'santana'),
('Eliott', 'Barbet', 'eliott', 21, 637474866, 'Montpellier', 'test'),
('Emma', 'Faucheux', 'Emmatest2', 21, 687526594, 'Angers', 'testeur'),
('Fcx', 'Emma', 'EmmaPseudo', 21, 689573440, 'Angers', 'testeur'),
('Granier', 'Lea', 'Racoon', 22, 785423652, 'Nimes', 'racoon'),
('paul', 'trotro', '', 20, 1234567891, '', 'mdp');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `Annonces_ibfk_1` FOREIGN KEY (`Proprietaire`) REFERENCES `utilisateurs` (`Num_Tel`);

--
-- Contraintes pour la table `participation`
--
ALTER TABLE `participation`
  ADD CONSTRAINT `Participation_ibfk_1` FOREIGN KEY (`Participant`) REFERENCES `utilisateurs` (`Num_Tel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
