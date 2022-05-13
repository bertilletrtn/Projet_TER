-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 11 mai 2022 à 16:23
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
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
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
  `id` int(11) NOT NULL,
  `Titre` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`Ville`, `Lieu`, `Date`, `HeureDebut`, `HeureFin`, `theme`, `theme2`, `theme3`, `Info_sup`, `Proprietaire`, `id`, `Titre`) VALUES
('angers', 'patinoire', '2022-04-27', '09:00:00.00', '11:00:00.00', 'sport', 'sport', 'alimentation', 'Informations supplémentaires ? ', 1234567891, 1, 'Patinoire entre pote'),
('le mans', 'bu', '2022-04-26', '09:00:00.00', '12:00:00.00', 'travail', NULL, NULL, NULL, 1234567891, 2, 'travail mécanique du point '),
('Nantes', 'Cinema', '2022-05-11', '14:00:00.00', '17:30:00.00', 'cinéma', NULL, NULL, 'Voir \"Le seigneur des anneaux\" - mon film pas préféré', 1234567891, 8, 'Seigneur des anneaux'),
('Montpellier', 'Starbucks', '2022-04-27', '10:02:00.00', '12:00:00.00', 'bar', NULL, NULL, 'Boire un chocolat chaud', 687526594, 9, 'Matin tranquillou'),
('Madrid', 'Bowling', '2022-08-09', '14:00:00.00', '20:00:00.00', 'loisir', NULL, NULL, 'Je propose de faire trois parties de Bowling (réservé pour les étudiants)', 785423652, 10, 'Bowling '),
('angers', 'la cour', '2022-05-02', '15:00:00.00', '20:00:00.00', 'alimentation', NULL, NULL, '', 689573440, 14, 'cafe à \"la cour\"'),
('Angers', 'ags', '2023-02-02', '09:00:00.00', '20:00:00.00', 'culture', 'cinema', NULL, '', 689573440, 15, 'Tennis'),
('efzlk', 'ezflk', '9999-09-09', '09:00:00.00', '20:00:00.00', 'festival', NULL, NULL, 'LOEOFK', 689573440, 17, 'FESTIIIIIIIIIIIIIIVAL'),
('RU', 'RU angers', '2022-06-18', '09:00:00.00', '20:00:00.00', 'alimentation', 'bar', NULL, '', 689573440, 18, 'Manger le midi'),
('lyon', 'lyon', '2022-07-05', '09:00:00.00', '20:00:00.00', 'travail', 'musique', NULL, 'Travailler Php car j\'ai du mal avec les variables', 689573440, 19, 'On apprends php'),
('angers', 'bureau', '2022-05-17', '12:00:00.00', '15:00:00.00', 'travail', NULL, NULL, '', 689573440, 20, 'Reunion entre copain'),
('Angé', 'la fac', '2022-05-05', '23:00:00.00', '22:01:00.00', 'bar', 'cinema', 'musique', 'ouaiiiis', 632730869, 21, 'Minizinc in love'),
('Mozé', 'Chez moi', '1789-02-21', '17:00:00.00', '23:59:00.00', 'bar', 'loisir', NULL, 'Il faut boire un maximum ! je peux écrire autant de caractère que je veux, j\'espère vraiment que se serait cool de faire ça !\r\nFranchement go faire une grosse soirée ça fait giga longtemps! Bon maintenant je vais retourner bosser ais c\'est remis de tous ça', 632730869, 22, 'Grosse race'),
('Angers', 'Chez Bryan', '2022-05-15', '09:00:00.00', '20:00:00.00', 'musique', NULL, NULL, '', 689573440, 23, 'Session guitare'),
('Angers', 'Bibliothèque', '2022-07-18', '09:00:00.00', '10:00:00.00', 'culture', NULL, NULL, 'Lecture en groupe à voix haute :)', 689573440, 24, 'Lecture à la bibliothèque'),
('Lyon', 'Bibliothèque du centre ville', '2022-05-10', '10:16:00.00', '19:23:00.00', 'travail', NULL, NULL, 'Faire des recherches pousser et intéressantes concernant la nouvelle science de Newton ', 637474866, 25, 'Faire des recherches sur la nouvelle science de Newton'),
('ttt', 'llll', '2016-02-16', '09:00:00.00', '20:00:00.00', 'culture', NULL, NULL, '', 689573440, 26, 'Test');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `num_annonce` int(11) NOT NULL,
  `id_utilisateur` int(10) NOT NULL,
  `commentaire` varchar(500) COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL,
  `id-commentaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `participation`
--

CREATE TABLE `participation` (
  `Participant` int(10) NOT NULL,
  `Annonce` int(11) NOT NULL,
  `id_participant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `participation`
--

INSERT INTO `participation` (`Participant`, `Annonce`, `id_participant`) VALUES
(785423652, 2, 22),
(102030405, 8, 23),
(687526594, 1, 24),
(1234567891, 14, 47),
(1234567891, 16, 48),
(1234567891, 10, 49);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `Prenom` varchar(50) COLLATE utf8_bin NOT NULL,
  `Nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `Pseudo` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `Age` int(3) NOT NULL,
  `Num_Tel` int(10) NOT NULL,
  `Ville` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `Mdp` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`Prenom`, `Nom`, `Pseudo`, `Age`, `Num_Tel`, `Ville`, `Mdp`) VALUES
('bertille', 'trotin', 'btrotin', 20, 102030405, 'angers', 'santana'),
('fft', 'Test', 'testpseudo', 25, 123457899, 'angers', 'test'),
('huj', 'huj', 'hujuju', 18, 485956236, 'gyhuh', 'kol'),
('Bouvier', 'Marge', 'Espace', 38, 523468575, 'Springfields', 'marge'),
('klm', 'klm', 'klm', 25, 562586246, 'klm', 'klm'),
('klm', 'klm', 'klm', 56, 586548658, 'jkl', 'lko'),
('azerty', 'Hyddro', 'Hydro', 25, 632730869, 'Angers', 'bb'),
('Eliott', 'Barbet', 'eliott', 21, 637474866, 'Montpellier', 'test'),
('Emma', 'Faucheux', 'Emmatest2', 21, 687526594, 'Angers', 'testeur'),
('Fcx', 'Emma', 'EmmaPseudo', 21, 689573440, 'Angers', 'testeur'),
('ahufzei', 'bghj', 'haha', 56, 698545235, 'Lyon', 'lol'),
('Macron', 'Emmanuel', 'Manu', 48, 752984623, 'Paris', 'manu'),
('Fcx', 'Camille', 'Mimi', 18, 765125892, 'Nantes', 'lol'),
('Granier', 'Lea', 'Racoon', 22, 785423652, 'Nimes', 'racoon'),
('paul', 'trotro', '', 20, 1234567891, '', 'mdp');


--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Proprietaire` (`Proprietaire`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id-commentaire`),
  ADD KEY `num-annonce` (`num_annonce`),
  ADD KEY `id-utilisateur` (`id_utilisateur`),
  ADD KEY `num_annonce` (`num_annonce`);

--
-- Index pour la table `participation`
--
ALTER TABLE `participation`
  ADD PRIMARY KEY (`id_participant`),
  ADD KEY `Participant` (`Participant`),
  ADD KEY `Annonce` (`Annonce`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`Num_Tel`),
  ADD KEY `Num_Tel` (`Num_Tel`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id-commentaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `participation`
--
ALTER TABLE `participation`
  MODIFY `id_participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `Annonces_ibfk_1` FOREIGN KEY (`Proprietaire`) REFERENCES `utilisateurs` (`Num_Tel`);

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `c2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`Num_Tel`),
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`num_annonce`) REFERENCES `annonces` (`id`);

--
-- Contraintes pour la table `participation`
--
ALTER TABLE `participation`
  ADD CONSTRAINT `Participation_ibfk_1` FOREIGN KEY (`Participant`) REFERENCES `utilisateurs` (`Num_Tel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
