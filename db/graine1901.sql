-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 03 nov. 2023 à 10:33
-- Version du serveur : 8.0.35-0ubuntu0.22.04.1
-- Version de PHP : 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `graine1901`
--

-- --------------------------------------------------------

--
-- Structure de la table `dataSite`
--

CREATE TABLE `dataSite` (
  `idDataSite` int NOT NULL,
  `titre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sousTitre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `titreHTML` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `dataSite`
--

INSERT INTO `dataSite` (`idDataSite`, `titre`, `sousTitre`, `description`, `titreHTML`) VALUES
(1, 'Graines public  V2 - LOCAL', 'Graines public  V2- LOCAL', 'Je, suis, un, joli, oiseau, de, nuit, qui, se, fait, beau, pour, l&#039;aurore, d&#039;un début d&#039;après midi.', 'Graines public  V2- LOCAL');

-- --------------------------------------------------------

--
-- Structure de la table `journaux`
--

CREATE TABLE `journaux` (
  `idConnexion` int NOT NULL,
  `ipUser` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idUser` int NOT NULL DEFAULT '0',
  `login` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `mdpHacker` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `dateHeure` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `okConnexion` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `journaux`
--

INSERT INTO `journaux` (`idConnexion`, `ipUser`, `idUser`, `login`, `mdpHacker`, `dateHeure`, `okConnexion`) VALUES
(1, '127.0.0.1', 7, 'Admin', '0', '2023-07-12 13:45:12', 1),
(2, '127.0.0.1', 5, 'Aresh', '0', '2023-07-13 10:08:34', 1),
(3, '127.0.0.1', 7, 'Admin', '0', '2023-07-13 10:19:15', 1),
(4, '127.0.0.1', 5, 'Aresh', '0', '2023-07-17 09:38:09', 1),
(5, '127.0.0.1', 5, 'Aresh', '0', '2023-07-17 09:59:39', 1),
(6, '127.0.0.1', 5, 'Aresh', '0', '2023-07-17 10:00:16', 1),
(7, '127.0.0.1', 8, 'gandalf', '0', '2023-07-17 10:13:15', 1),
(8, '127.0.0.1', 0, 'gandalf', 'dusud', '2023-07-17 10:14:10', 0),
(9, '127.0.0.1', 8, 'gandalf', '0', '2023-07-17 10:14:22', 1),
(10, '127.0.0.1', 8, 'gandalf', '0', '2023-07-17 10:15:42', 1),
(11, '127.0.0.1', 8, 'gandalf', '0', '2023-07-17 10:16:56', 1),
(12, '127.0.0.1', 5, 'Aresh', '0', '2023-07-17 10:18:34', 1),
(13, '127.0.0.1', 7, 'Admin', '0', '2023-07-17 10:18:42', 1),
(14, '127.0.0.1', 0, 'gandalf', 'dusud', '2023-07-17 10:18:56', 0),
(15, '127.0.0.1', 8, 'gandalf', '0', '2023-07-17 10:19:09', 1),
(16, '127.0.0.1', 0, 'gandalf', 'christophe', '2023-07-17 10:19:50', 0),
(17, '127.0.0.1', 7, 'Admin', '0', '2023-07-17 10:20:28', 1),
(18, '127.0.0.1', 8, 'gandalf', '0', '2023-07-17 10:20:54', 1),
(19, '127.0.0.1', 7, 'Admin', '0', '2023-07-17 10:33:12', 1),
(20, '::1', 7, 'Admin', '0', '2023-07-17 10:35:00', 1),
(21, '127.0.0.1', 5, 'Aresh', '0', '2023-07-26 11:03:38', 1),
(22, '127.0.0.1', 7, 'Admin', '0', '2023-07-31 10:15:58', 1),
(23, '127.0.0.1', 7, 'Admin', '0', '2023-07-31 13:14:39', 1),
(24, '127.0.0.1', 7, 'Admin', '0', '2023-08-01 08:50:25', 1),
(25, '127.0.0.1', 5, 'Aresh', '0', '2023-10-06 18:17:20', 1),
(26, '127.0.0.1', 7, 'Admin', '0', '2023-10-06 18:17:33', 1),
(27, '127.0.0.1', 7, 'Admin', '0', '2023-10-06 21:44:49', 1),
(28, '127.0.0.1', 7, 'Admin', '0', '2023-10-07 12:40:01', 1),
(29, '127.0.0.1', 5, 'Aresh', '0', '2023-10-07 13:02:35', 1),
(30, '127.0.0.1', 7, 'Admin', '0', '2023-10-07 13:04:17', 1),
(31, '127.0.0.1', 7, 'Admin', '0', '2023-10-09 13:38:25', 1),
(32, '127.0.0.1', 5, 'Aresh', '0', '2023-10-09 13:40:06', 1),
(33, '127.0.0.1', 7, 'Admin', '0', '2023-10-09 13:55:25', 1),
(34, '127.0.0.1', 7, 'Admin', '0', '2023-10-09 14:00:32', 1),
(35, '127.0.0.1', 7, 'Admin', '0', '2023-10-09 15:35:08', 1),
(36, '127.0.0.1', 7, 'Admin', '0', '2023-10-09 15:39:26', 1),
(37, '127.0.0.1', 5, 'Aresh', '0', '2023-10-20 13:20:28', 1),
(38, '127.0.0.1', 7, 'Admin', '0', '2023-10-20 13:20:43', 1),
(39, '127.0.0.1', 7, 'Admin', '0', '2023-10-27 04:23:48', 1),
(40, '127.0.0.1', 7, 'Admin', '0', '2023-10-27 13:27:44', 1),
(41, '127.0.0.1', 7, 'Admin', '0', '2023-10-29 15:49:19', 1),
(42, '127.0.0.1', 7, 'Admin', '0', '2023-10-30 00:29:03', 1),
(43, '127.0.0.1', 7, 'Admin', '0', '2023-10-30 12:18:58', 1),
(44, '127.0.0.1', 7, 'Admin', '0', '2023-10-30 13:50:28', 1),
(45, '127.0.0.1', 7, 'Admin', '0', '2023-10-31 06:53:09', 1),
(46, '127.0.0.1', 7, 'Admin', '0', '2023-10-31 07:37:05', 1),
(47, '127.0.0.1', 7, 'Admin', '0', '2023-10-31 07:39:31', 1),
(48, '127.0.0.1', 7, 'Admin', '0', '2023-10-31 07:42:29', 1),
(49, '127.0.0.1', 5, 'Aresh', '0', '2023-10-31 07:43:02', 1),
(50, '127.0.0.1', 7, 'Admin', '0', '2023-10-31 07:43:10', 1),
(51, '127.0.0.1', 7, 'Admin', '0', '2023-10-31 13:04:19', 1),
(52, '127.0.0.1', 7, 'Admin', '0', '2023-10-31 14:29:47', 1),
(53, '::1', 0, 'Aresh', 'Christophe', '2023-10-31 15:24:54', 0),
(54, '::1', 5, 'Aresh', '0', '2023-10-31 15:25:03', 1),
(55, '127.0.0.1', 7, 'Admin', '0', '2023-11-02 12:33:52', 1),
(56, '127.0.0.1', 7, 'Admin', '0', '2023-11-03 08:56:18', 1),
(57, '127.0.0.1', 0, 'Beta', 'christophe', '2023-11-03 09:51:38', 0),
(58, '127.0.0.1', 9, 'Beta', '0', '2023-11-03 09:52:06', 1),
(59, '127.0.0.1', 9, 'Beta', '0', '2023-11-03 09:52:46', 1),
(60, '127.0.0.1', 7, 'Admin', '0', '2023-11-03 10:31:19', 1);

-- --------------------------------------------------------

--
-- Structure de la table `menuNav`
--

CREATE TABLE `menuNav` (
  `idMenuDeroulant` int NOT NULL,
  `titreMenu` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `menuNav`
--

INSERT INTO `menuNav` (`idMenuDeroulant`, `titreMenu`) VALUES
(1, 'Administration du site'),
(6, 'Administration User');

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE `modules` (
  `id` int NOT NULL,
  `module` varchar(30) NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `modules`
--

INSERT INTO `modules` (`id`, `module`, `valide`) VALUES
(1, 'Graines', 1);

-- --------------------------------------------------------

--
-- Structure de la table `navigation`
--

CREATE TABLE `navigation` (
  `idNav` int NOT NULL,
  `nomNav` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cheminNav` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `menuVisible` tinyint(1) NOT NULL,
  `zoneMenu` int NOT NULL,
  `ordre` tinyint NOT NULL,
  `niveau` tinyint(1) NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '1',
  `deroulant` tinyint NOT NULL DEFAULT '0',
  `targetRoute` varchar(22) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `idModule` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `navigation`
--

INSERT INTO `navigation` (`idNav`, `nomNav`, `cheminNav`, `menuVisible`, `zoneMenu`, `ordre`, `niveau`, `valide`, `deroulant`, `targetRoute`, `idModule`) VALUES
(72, 'connexion', 'modules/connexion/connexion.php', 1, 0, 10, 0, 1, 0, '90861906441', 1),
(73, 'inscription', 'modules/users/inscription.php', 0, 0, 0, 0, 1, 0, '4669482480', 1),
(74, 'Deco', 'modules/securiter/deconnexion.php', 1, 0, 20, 1, 1, 0, '330644946234462', 1),
(75, 'Deco', 'modules/securiter/deconnexion.php', 1, 0, 20, 2, 1, 0, '53454117454', 1),
(76, 'Administration du site', 'modules/navigation/erreurNav.php', 1, 0, 1, 2, 1, 1, '361940210100336', 1),
(77, 'Ajout lien de nav', 'modules/navigation/menuAdmin/creationNouveuMenu.php', 1, 1, 1, 2, 1, 0, '3172833040410459', 1),
(78, 'Titres et SEO', 'modules/dataSite/titreInfo.php', 1, 1, 2, 2, 1, 0, '6990213557', 1),
(81, 'Brassage des liens', 'modules/navigation/menuAdmin/dynamique.php', 1, 1, 2, 2, 1, 0, '38936562745264', 1),
(82, 'Ajout menu déroulant', 'modules/navigation/menuAdmin/ajoutMenuDeroulant.php', 1, 1, 2, 2, 1, 0, '358418574193', 1),
(85, 'Administration User', 'modules/navigation/erreurNav.php', 1, 0, 0, 2, 1, 6, '5714866099872', 1),
(86, 'Users Actif', 'modules/users/administration/droitUser.php', 1, 6, 1, 2, 1, 6, '15833056675045', 1),
(87, 'Route Form', 'modules/navigation/menuAdmin/ajoutRouteForm.php', 1, 1, 2, 2, 1, 0, '41193078448746', 1),
(88, 'Users Anciens ', 'modules/users/administration/droitUserNonValide.php', 1, 6, 2, 2, 1, 0, '7145854419846485', 1),
(89, 'Profil', 'modules/users/administration/profilUser.php', 1, 0, 19, 1, 1, 0, '87404357460669', 1),
(90, 'Profil', 'modules/users/administration/profilUser.php', 1, 0, 1, 2, 1, 0, '818591155046', 1),
(91, 'Journeaux de log', 'modules/journaux/journaux.php', 1, 0, 1, 2, 1, 0, '4591164954532689', 1),
(92, 'Admin nav', 'modules/navigation/menuAdmin/adminMenu.php', 1, 1, 2, 2, 1, 0, '078504514285', 1),
(93, 'modification lien nav', 'modules/navigation/menuAdmin/modificationNav.php', 0, 0, 0, 2, 1, 0, '443664438528', 1),
(95, 'Admin modules', 'modules/navigation/menuAdmin/administrationModules.php', 1, 1, 7, 2, 1, 0, '5456720461649881', 1);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `idRole` int NOT NULL,
  `typeRole` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`idRole`, `typeRole`) VALUES
(1, 'Visiteur'),
(4, 'Membre'),
(6, 'Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `routageForm`
--

CREATE TABLE `routageForm` (
  `idForm` int NOT NULL,
  `chemin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `securiter` tinyint(1) NOT NULL DEFAULT '0',
  `valide` tinyint(1) NOT NULL DEFAULT '1',
  `route` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idModule` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `routageForm`
--

INSERT INTO `routageForm` (`idForm`, `chemin`, `securiter`, `valide`, `route`, `idModule`) VALUES
(1, 'modules/users/CUD/Create/inscriptionUser.php', 0, 1, '70582341105330762', 1),
(2, 'modules/securiter/connexionUser.php', 0, 1, '94662155503861571', 1),
(3, 'modules/users/CUD/Update/activationUser.php', 0, 1, '14593925948566015', 1),
(4, 'modules/navigation/CUD/Create/addLien.php', 2, 1, '0065676884414674406', 1),
(5, 'modules/dataSite/CUD/Update/updateDataSite.php', 2, 1, '968055784502664', 1),
(6, 'modules/navigation/CUD/Create/addMenusDeroulant.php', 2, 1, '58303143473837918383', 1),
(7, 'modules/navigation/CUD/Create/addRouteForm.php', 2, 1, '26447876714545', 1),
(14, 'modules/users/CUD/Update/modAdminUser.php', 2, 1, '2053402866864487138', 1),
(16, 'modules/users/CUD/Update/emailUser.php', 1, 1, '55854764602497786', 1),
(17, 'modules/users/CUD/Update/loginUser.php', 1, 1, '04615564422492855547', 1),
(18, 'modules/users/CUD/Update/mdpUser.php', 1, 1, '10664620365423', 1),
(19, 'modules/journaux/deleteLog.php', 2, 1, '3846140742763296', 1),
(20, 'modules/navigation/CUD/update/updateLienNav.php', 2, 1, '496396174444764', 1),
(21, 'modules/navigation/CUD/Delete/deleteLienNav.php', 2, 1, '467784921798456', 1),
(22, 'modules/users/CUD/Update/desincriptionUser.php', 1, 1, '50685036870772', 1),
(23, 'modules/navigation/CUD/update/updateModule.php', 2, 1, '789570859140548', 1),
(25, 'modules/navigation/CUD/Create/addModule.php', 2, 1, '546962826325169410', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int NOT NULL,
  `token` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `login` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mdp` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '0',
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `token`, `email`, `prenom`, `nom`, `login`, `mdp`, `valide`, `role`, `dateCreation`) VALUES
(5, 'g8DPS1DnwiWoWpWy', 'christophe.calmes22@gmail.com', 'Christophe', 'Calmes', 'Aresh', '$2y$10$AEx9/EbLyJ6YTZP4ODO1PunMyO5VcKdHW/aEtUkbKwUwgBmPchUtG', 1, 1, '2022-06-09 22:59:58'),
(7, 'tMi9CFOVsBTnQvIX', 'christophe.massage@orange.fr', 'Christophe', 'Calmes', 'Admin', '$2y$10$oADkGPsXhTD1m1.vawEEJevfSC1BwODMOuCHCntUrBQgpV5TmLy6S', 1, 2, '2022-06-12 14:26:13'),
(8, '3563780644378314', 'denis@gmail.com', 'Denis', 'Lamalice', 'gandalf', '$2y$10$gAR.NNm5ZtibroRRdQoWr.aaAkGl0j3QLjkqZvoxQhjQ86iZeGMvO', 0, 1, '2023-07-17 10:12:24'),
(9, 'BVB0yhGvqE', 'christophe.calmes2020@gmail.com', 'christophe', 'Calmes', 'Beta', '$2y$10$sX8wJ/cn0jeb8kYx8MzGDO5.4Z7LcVf/4YnhmWHJ6W1bi8pTXzufO', 1, 1, '2023-11-03 09:51:16');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `dataSite`
--
ALTER TABLE `dataSite`
  ADD PRIMARY KEY (`idDataSite`);

--
-- Index pour la table `journaux`
--
ALTER TABLE `journaux`
  ADD PRIMARY KEY (`idConnexion`);

--
-- Index pour la table `menuNav`
--
ALTER TABLE `menuNav`
  ADD PRIMARY KEY (`idMenuDeroulant`);

--
-- Index pour la table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`idNav`),
  ADD KEY `lierModule` (`idModule`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRole`);

--
-- Index pour la table `routageForm`
--
ALTER TABLE `routageForm`
  ADD PRIMARY KEY (`idForm`),
  ADD KEY `lienModule` (`idModule`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `dataSite`
--
ALTER TABLE `dataSite`
  MODIFY `idDataSite` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `journaux`
--
ALTER TABLE `journaux`
  MODIFY `idConnexion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `menuNav`
--
ALTER TABLE `menuNav`
  MODIFY `idMenuDeroulant` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `idNav` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `idRole` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `routageForm`
--
ALTER TABLE `routageForm`
  MODIFY `idForm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `navigation`
--
ALTER TABLE `navigation`
  ADD CONSTRAINT `lierModule` FOREIGN KEY (`idModule`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `routageForm`
--
ALTER TABLE `routageForm`
  ADD CONSTRAINT `lienModule` FOREIGN KEY (`idModule`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
