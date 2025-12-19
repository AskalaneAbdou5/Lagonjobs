-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 19 déc. 2025 à 16:22
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lagonjobs`
--

-- --------------------------------------------------------

--
-- Structure de la table `modes_de_travail`
--

CREATE TABLE `modes_de_travail` (
  `Id` int(11) NOT NULL,
  `Mode_de_travail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `modes_de_travail`
--

INSERT INTO `modes_de_travail` (`Id`, `Mode_de_travail`) VALUES
(1, 'Télétravail'),
(2, 'Sur site'),
(3, 'Hybride');

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE `offres` (
  `Id` int(11) NOT NULL,
  `Titre` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `Mission` text NOT NULL,
  `Profil` text NOT NULL,
  `Id_contrat` int(11) NOT NULL,
  `Id_ville` int(11) NOT NULL,
  `Id_mode_de_travail` int(11) NOT NULL,
  `Date_debut` date NOT NULL,
  `Date_fin` date NOT NULL,
  `Id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `offres`
--

INSERT INTO `offres` (`Id`, `Titre`, `Description`, `Mission`, `Profil`, `Id_contrat`, `Id_ville`, `Id_mode_de_travail`, `Date_debut`, `Date_fin`, `Id_status`) VALUES
(1, 'Stagiaire Developpeur Web', 'Participer au développement des sites vitrines et e-commerce.', 'intégrer des maquettes, corriger les bugs, participer aux revues de code (niveau débutant).', 'motivation, bases HTML/CSS/JS, notions de PHP bienvenues.', 1, 1, 3, '2025-12-01', '2025-12-31', 1),
(2, 'Technicien support', 'Assistance utilisateur, résolution d\'incidents et maintenance.', 'aucun pour l\'instant', 'aucun pour l\'instant', 2, 2, 2, '2025-12-01', '2026-04-29', 1),
(3, 'Admin systèmes junior', 'Administration Linux/Windows, sauvegardes et supervision.', 'aucun pour l\'instant', 'aucun pour l\'instant', 2, 3, 3, '2025-12-01', '2026-02-26', 1);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `Id` int(11) NOT NULL,
  `Nom_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`Id`, `Nom_role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

CREATE TABLE `status` (
  `Id` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `status`
--

INSERT INTO `status` (`Id`, `Status`) VALUES
(1, 'Publié'),
(2, 'Brouillon');

-- --------------------------------------------------------

--
-- Structure de la table `types_de_contrat`
--

CREATE TABLE `types_de_contrat` (
  `Id` int(11) NOT NULL,
  `Contrat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `types_de_contrat`
--

INSERT INTO `types_de_contrat` (`Id`, `Contrat`) VALUES
(1, 'Stage'),
(2, 'CDD'),
(3, 'CDI');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Mot_de_passe` varchar(100) NOT NULL,
  `Id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `Id` int(11) NOT NULL,
  `Nom_ville` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `villes`
--

INSERT INTO `villes` (`Id`, `Nom_ville`) VALUES
(1, 'Mamoudzou'),
(2, 'Dzaoudzi'),
(3, 'Koungou');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `modes_de_travail`
--
ALTER TABLE `modes_de_travail`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `offres`
--
ALTER TABLE `offres`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_contrat` (`Id_contrat`),
  ADD KEY `Id_mode_de_travail` (`Id_mode_de_travail`),
  ADD KEY `Id_status` (`Id_status`),
  ADD KEY `Id_ville` (`Id_ville`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `types_de_contrat`
--
ALTER TABLE `types_de_contrat`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_role` (`Id_role`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `modes_de_travail`
--
ALTER TABLE `modes_de_travail`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `offres`
--
ALTER TABLE `offres`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `status`
--
ALTER TABLE `status`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `types_de_contrat`
--
ALTER TABLE `types_de_contrat`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `offres`
--
ALTER TABLE `offres`
  ADD CONSTRAINT `offres_ibfk_1` FOREIGN KEY (`Id_contrat`) REFERENCES `types_de_contrat` (`Id`),
  ADD CONSTRAINT `offres_ibfk_2` FOREIGN KEY (`Id_mode_de_travail`) REFERENCES `modes_de_travail` (`Id`),
  ADD CONSTRAINT `offres_ibfk_3` FOREIGN KEY (`Id_status`) REFERENCES `status` (`Id`),
  ADD CONSTRAINT `offres_ibfk_4` FOREIGN KEY (`Id_ville`) REFERENCES `villes` (`Id`);

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`Id_role`) REFERENCES `roles` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
