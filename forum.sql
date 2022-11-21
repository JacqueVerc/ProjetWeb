-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 21 nov. 2022 à 12:23
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id_an` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id_an`, `contenu`, `type`, `id_user`) VALUES
(6, 'Voila une annonce.', 'Annonce', 1),
(12, 'Voici une seconde annonce ', 'Annonce', 1),
(13, 'Premier évènement !!', 'Evênement', 1);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id_com` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id_com`, `contenu`, `date`, `heure`, `id_user`) VALUES
(1, '', '2022-11-14', '15:35:00', 1),
(10, 'Voici un poste', '2022-11-21', '09:25:00', 1),
(13, 'C’est un poste modifié [Modifié]', '2022-11-21', '10:05:00', 1),
(16, 'blabla 1 [Modifié]', '2022-11-21', '12:13:00', 8);

-- --------------------------------------------------------

--
-- Structure de la table `rep`
--

CREATE TABLE `rep` (
  `id_rep` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_com` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rep`
--

INSERT INTO `rep` (`id_rep`, `contenu`, `date`, `heure`, `id_user`, `id_com`) VALUES
(8, 'petit message en réponse a ce poste', '2022-11-21', '09:25:00', 1, 10),
(13, 'Voici une réponse', '2022-11-21', '10:30:00', 1, 13);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `Age` int(3) NOT NULL,
  `addresse_mail` varchar(50) NOT NULL,
  `Mdp` varchar(40) NOT NULL,
  `Salle` varchar(40) DEFAULT NULL,
  `Niveau` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `Nom`, `Prenom`, `Age`, `addresse_mail`, `Mdp`, `Salle`, `Niveau`) VALUES
(1, 'Verc', 'Jacques', 19, 'jacques1@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Climb up Epinay', 'S’améliore'),
(8, 'Toto', 'Titi', 12, 'toto@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Climb up Paris', 'Débutant');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id_an`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `rep`
--
ALTER TABLE `rep`
  ADD PRIMARY KEY (`id_rep`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_com` (`id_com`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id_an` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `rep`
--
ALTER TABLE `rep`
  MODIFY `id_rep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `annonces_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `rep`
--
ALTER TABLE `rep`
  ADD CONSTRAINT `rep_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `rep_ibfk_2` FOREIGN KEY (`id_com`) REFERENCES `comments` (`id_com`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
