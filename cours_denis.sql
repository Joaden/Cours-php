-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 18 nov. 2020 à 19:09
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cours_denis`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `date`) VALUES
(1, 'article 1', '\r\nUn nouveau monde d\'applications\r\n\r\nTrouvez et téléchargez facilement des applications sur AppGallery. Avec un classement par catégories, les retrouver sera un jeu d\'enfant.\r\n', '0000-00-00 00:00:00'),
(2, 'article 2', '\r\nUn nouveau monde d\'applications\r\n\r\nTrouvez et téléchargez facilement des applications sur AppGallery. Avec un classement par catégories, les retrouver sera un jeu d\'enfant.\r\n', '0000-00-00 00:00:00'),
(3, 'article 3', '\r\nUn nouveau monde d\'applications\r\n\r\nTrouvez et téléchargez facilement des applications sur AppGallery. Avec un classement par catégories, les retrouver sera un jeu d\'enfant.\r\n', '0000-00-00 00:00:00'),
(4, 'article 4', '\r\nUn nouveau monde d\'applications\r\n\r\nTrouvez et téléchargez facilement des applications sur AppGallery. Avec un classement par catégories, les retrouver sera un jeu d\'enfant.\r\n', '2020-11-15 18:41:00'),
(5, 'article 5', '\r\nUn nouveau monde d\'applications\r\n\r\nTrouvez et téléchargez facilement des applications sur AppGallery. Avec un classement par catégories, les retrouver sera un jeu d\'enfant.\r\n', '0000-00-00 00:00:00'),
(6, 'article 6', '\r\nUn nouveau monde d\'applications\r\n\r\nTrouvez et téléchargez facilement des applications sur AppGallery. Avec un classement par catégories, les retrouver sera un jeu d\'enfant.\r\n', '2020-11-10 12:00:00'),
(7, 'article 7', '\r\nUn nouveau monde d\'applications\r\n\r\nTrouvez et téléchargez facilement des applications sur AppGallery. Avec un classement par catégories, les retrouver sera un jeu d\'enfant.\r\n', '2020-11-12 15:00:00'),
(8, 'article 8', '\r\nUn nouveau monde d\'applications\r\n\r\nTrouvez et téléchargez facilement des applications sur AppGallery. Avec un classement par catégories, les retrouver sera un jeu d\'enfant.\r\n', '2020-11-15 18:41:00');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `articleId` int(11) NOT NULL,
  `author` varchar(100) CHARACTER SET utf8 NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL,
  `approved` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `articleId`, `author`, `comment`, `date`, `approved`) VALUES
(1, 8, 'qdscdsrg', 'erregrgsrg', '2020-11-15 19:44:22', 0),
(2, 8, 'fezfefee', 'efqefqcdvsfr', '2020-11-15 22:12:12', 0),
(3, 8, 'qdscdsrg', 'erregrgsrg', '2020-11-15 22:50:57', 0),
(4, 8, 'Denis', 'Mon commentaire au top du top bébé !!!!\r\n', '2020-11-15 23:08:50', 0),
(5, 8, 'Denis', 'Mon commentaire au top du top bébé !!!!\r\n', '2020-11-15 23:12:55', 0),
(6, 4, 'rzgrzgf', 'fzerfzerf', '2020-11-16 00:09:42', 0),
(7, 8, 'sdv', 'ds', '2020-11-16 00:12:04', 0),
(8, 8, 'sdv', 'ds', '2020-11-16 00:13:56', 0),
(9, 8, 'sdv', 'ds', '2020-11-16 00:14:27', 0),
(10, 7, 'rfrf', 'zgz', '2020-11-16 02:30:21', 0),
(11, 6, 'ss', 'rgrf', '2020-11-16 16:41:54', 0),
(12, 8, '99999999999999', '999999999999', '2020-11-16 16:45:32', 0),
(13, 8, 'vds', 'dsvdvs', '2020-11-18 19:08:07', 0);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `age` int(11) DEFAULT NULL,
  `users_infos_id` int(11) DEFAULT NULL,
  `pseudo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_verified`, `age`, `users_infos_id`, `pseudo`) VALUES
(1, 'Denis', 'denis@gmail.fr', '', 0, NULL, NULL, NULL),
(2, 'John', 'john@gmail.fr', '', 0, NULL, NULL, NULL),
(3, 'Laurie', 'laurie@gmail.fr', '', 0, NULL, NULL, NULL),
(4, 'toto', 'toto@gmail.fr', '', 0, NULL, NULL, NULL),
(5, 'Denisrebrbre', 'denisrere@gmail.fr', '', 0, NULL, NULL, NULL),
(6, 'Johnrebre', 'johnerbreb@gmail.fr', '', 1, NULL, NULL, NULL),
(7, 'Lauriegergreg', 'laurieregreg@gmail.fr', '', 1, NULL, NULL, NULL),
(8, 'totoregregre', 'totoergreg@gmail.fr', '', 1, NULL, NULL, NULL),
(9, 'Denis45354', 'denis43453@gmail.fr', '', 1, NULL, NULL, NULL),
(10, 'John43543', 'john43543@gmail.fr', '', 1, NULL, NULL, NULL),
(11, 'Laurie4545', 'laurie345345@gmail.fr', '', 1, NULL, NULL, NULL),
(12, 'toto453543', 'toto453543@gmail.fr', '', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users_infos`
--

CREATE TABLE `users_infos` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `is_valid` tinyint(1) NOT NULL,
  `birth` datetime DEFAULT NULL,
  `date_inscription` datetime DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articleId` (`articleId`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `users_infos_id` (`users_infos_id`);

--
-- Index pour la table `users_infos`
--
ALTER TABLE `users_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `users_infos`
--
ALTER TABLE `users_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`articleId`) REFERENCES `articles` (`id`);

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `images_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users_infos`
--
ALTER TABLE `users_infos`
  ADD CONSTRAINT `users_infos_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_infos_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
