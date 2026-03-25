-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 25 mars 2026 à 21:14
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
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Sujet` varchar(255) NOT NULL,
  `Message` text NOT NULL,
  `Statut` varchar(20) NOT NULL DEFAULT 'non traité',
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`Id`, `Nom`, `Email`, `Sujet`, `Message`, `Statut`, `Date`) VALUES
(1, 'alane', 'alane@gmail.com', 'modifier mon mot de passe', 'bonjour,\r\n\r\npouvez vous me modifier mon mot de passe ?\r\nalane abdou', 'non traité', '2026-03-25');

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
(2, 'Technicien support', 'Assistance utilisateur, résolution d\'incidents et maintenance.', 'aucun pour l\'instant', 'aucun pour l\'instant', 2, 2, 2, '2025-12-01', '2026-04-29', 2),
(3, 'Admin systèmes junior', 'Administration Linux/Windows, sauvegardes et supervision.', 'aucun pour l\'instant', 'aucun pour l\'instant', 2, 3, 3, '2025-12-01', '2026-02-26', 1),
(9, 'Administrateur systèmes junior', 'Gestion et maintenance des serveurs', 'Assurer le bon fonctionnement de l’infrastructure', 'Bac+2 en informatique, notions Linux', 2, 2, 2, '2026-02-01', '2026-12-31', 1),
(10, 'Développeur web', 'Développement d’applications web', 'Créer et maintenir des sites web', 'Maîtrise HTML, CSS, JavaScript', 1, 1, 1, '2026-03-01', '2026-11-30', 1),
(11, 'Technicien support', 'Support informatique aux utilisateurs', 'Résoudre les incidents techniques', 'Bon relationnel, bases réseaux', 2, 3, 2, '2026-01-15', '2026-10-15', 1),
(12, 'Data analyst junior', 'Analyse de données métier', 'Créer des tableaux de bord', 'Connaissances SQL, Excel, Python', 1, 2, 3, '2026-04-01', '2026-12-01', 1),
(13, 'Chef de projet IT', 'Pilotage de projets informatiques', 'Coordonner les équipes techniques', 'Expérience en gestion de projet', 3, 1, 1, '2026-02-15', '2027-02-14', 1),
(14, 'Chef de projet IT', 'Pilotage de projets informatiques', 'Coordonner les équipes techniques', 'Expérience en gestion de projet', 2, 3, 3, '2026-03-01', '2027-02-14', 1),
(25, 'Développeur Web', 'Création de sites web dynamiques', 'Développer et maintenir des applications web', 'Maîtrise HTML, CSS, JS, PHP', 1, 2, 1, '2026-04-01', '2027-03-31', 1),
(26, 'Administrateur Système', 'Gestion des serveurs et réseaux', 'Assurer la maintenance des systèmes', 'Connaissances Linux et réseaux', 2, 1, 2, '2026-05-10', '2027-05-09', 1),
(27, 'Technicien Support IT', 'Support utilisateur niveau 1', 'Résoudre les incidents techniques', 'Bon relationnel et bases informatiques', 3, 4, 1, '2026-06-01', '2026-12-31', 1),
(28, 'Développeur Mobile', 'Applications Android et iOS', 'Créer des apps mobiles performantes', 'Expérience Flutter ou React Native', 1, 3, 3, '2026-07-01', '2027-06-30', 1),
(29, 'Data Analyst', 'Analyse de données', 'Créer des rapports et dashboards', 'Maîtrise SQL et Power BI', 2, 2, 2, '2026-04-15', '2027-04-14', 1),
(30, 'Chef de projet digital', 'Gestion de projets web', 'Planifier et suivre les projets', 'Organisation et communication', 2, 5, 3, '2026-03-20', '2027-03-19', 1),
(31, 'Développeur Backend', 'API et bases de données', 'Créer des services backend', 'Node.js / PHP / SQL', 1, 1, 2, '2026-08-01', '2027-07-31', 1),
(32, 'UX/UI Designer', 'Design d’interfaces', 'Concevoir des maquettes', 'Maîtrise Figma/Adobe XD', 3, 3, 3, '2026-05-01', '2026-11-30', 1),
(33, 'Ingénieur Réseau', 'Infrastructure réseau', 'Installer et sécuriser les réseaux', 'Certifications Cisco appréciées', 2, 4, 1, '2026-09-01', '2027-08-31', 1),
(34, 'Développeur Full Stack', 'Front et backend', 'Développer des applications complètes', 'React + Node.js', 1, 2, 3, '2026-04-01', '2027-03-31', 1);

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
(1, 'utilisateur'),
(2, 'administrateur');

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

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`Id`, `Nom`, `Prenom`, `Email`, `Mot_de_passe`, `Id_role`) VALUES
(17, 'abdou', 'askalane', 'admin@gmail.com', '$2y$10$C2sx6RyfCnm524BrMzMbnekdwV2e.Tk4e3SZar9pM93BraL54L3BS', 2),
(18, 'Fila', 'Djamel', 'defli@fi.com', '$2y$10$06b.NWTJgvbI5G/YrswqXuY.PFmlg8KqUxxUd9aQkh5qikDBFkhuO', 1);

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
(3, 'Koungou'),
(4, 'Majicavo'),
(5, 'Mamoudzou'),
(6, 'Dzaoudzi'),
(7, 'Pamandzi'),
(8, 'Koungou'),
(9, 'Dembeni'),
(10, 'Bandrélé'),
(11, 'Sada'),
(12, 'Ouangani'),
(13, 'Chirongui'),
(14, 'Bouéni'),
(15, 'Kani-Kéli'),
(16, 'Tsingoni'),
(17, 'Mtsamboro'),
(18, 'Acoua'),
(19, 'Bandraboua'),
(20, 'Cavani'),
(21, 'Mtsapéré'),
(22, 'Passamainty'),
(23, 'Vahibé'),
(24, 'Kawéni'),
(25, 'Longoni'),
(26, 'Dzoumogné'),
(27, 'Combani'),
(28, 'Iloni'),
(29, 'Hajangoua'),
(30, 'Ouangani village'),
(31, 'Barakani'),
(32, 'Chiconi'),
(33, 'Sada village'),
(34, 'Mangajou'),
(35, 'Mronabéja'),
(36, 'Bambo Est'),
(37, 'Bambo Ouest'),
(38, 'Bandrélé village'),
(39, 'Nyambadao'),
(40, 'Mtsamoudou'),
(41, 'Chirongui village'),
(42, 'Poroani'),
(43, 'Miréréni'),
(44, 'Bouéni village'),
(45, 'Kani-Kéli village'),
(46, 'Mbouini'),
(47, 'Mtsangamouji'),
(48, 'Tsingoni village'),
(49, 'Mroalé'),
(50, 'Mtsahara'),
(51, 'Hamjago'),
(52, 'Mtsamboro village'),
(53, 'Mtsangadoua'),
(54, 'Acoua village'),
(55, 'Bandraboua village'),
(56, 'Handrema'),
(57, 'Bouyouni');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`Id`);

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
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `modes_de_travail`
--
ALTER TABLE `modes_de_travail`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `offres`
--
ALTER TABLE `offres`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

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
