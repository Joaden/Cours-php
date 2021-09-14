-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 14 sep. 2021 à 11:13
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
-- Structure de la table `aliment`
--

CREATE TABLE `aliment` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `marque` varchar(100) DEFAULT NULL,
  `sucre` float DEFAULT NULL,
  `calories` int(11) NOT NULL,
  `graisses` float DEFAULT NULL,
  `proteines` float DEFAULT NULL,
  `bio` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `author` varchar(50) DEFAULT NULL,
  `online` tinyint(1) NOT NULL DEFAULT '0',
  `slug` varchar(20) DEFAULT NULL,
  `edition` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `categories_id`, `title`, `content`, `date`, `author`, `online`, `slug`, `edition`) VALUES
(1, 48, 33, 'Réchauffement climatique', 'voici les conditions météo qui nous attendent dans les prochaines décennies.\r\nDepuis le début de l’ère industrielle, la Terre se réchauffe. Lentement, mais sûrement. Et elle semble aujourd’hui proche de ce que les scientifiques appellent son point de non-retour. Un seuil au-delà duquel la situation pourrait dramatiquement se dégrader.\r\nSi rien n\'est fait rapidement pour limiter les émissions de gaz à effet de serre, la France éprouvera un fort réchauffement climatique, avec son cortège de canicules, sécheresses, « nuits tropicales »..., sans parler de la disparition annoncée du gel et de la neige, selon les dernières projections de Météo-France.', '2021-03-04 10:09:03', 'Dao', 0, NULL, '0000-00-00 00:00:00'),
(2, 47, 9, 'Pourquoi la recherche de la vie sur Mars est importante', 'La présence ou non de méthane sur la planète Mars et dans son atmosphère, ainsi que ses sources d\'émission, sont encore un mystère. L\'astrophysicien Jean-Loup Bertaux, qui a participé à la génèse de la mission ExoMars, nous livre son point de vue sur la pertinence de la quête de ce méthane martien.\r\n\r\n\"Si on trouve des traces de vie actuelle ou passée sur Mars, (...) cela indiquerait que la probabilité d’apparition de la vie dans la zone habitable d’une étoile est très élevée, donc les exo-planètes avec vie se compteraient par milliards, rien que dans notre galaxie\"\r\n\r\n', '2021-03-06 20:05:00', 'Camdenou', 0, NULL, '0000-00-00 00:00:00'),
(3, 48, 15, 'WORKOUT DAO BROTHERS', 'youtu.be/aH_BXY71S0o\r\n', '0000-00-00 00:00:00', 'Dao', 0, NULL, '0000-00-00 00:00:00'),
(44, 48, 18, 'Mon titre modifié ok', 'Mon contenu modifié ok 2ieme ttest', '2021-03-29 01:47:53', 'Dao', 0, NULL, '2021-09-08 23:54:28'),
(45, 48, 13, 'article de titi et gros minet', 'article de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minet', '2021-04-07 10:01:00', 'titiX', 0, NULL, '0000-00-00 00:00:00'),
(46, 50, 8, 'La Martinique', 'LA MARTINIQUE : DES SAVEURS QUI FONT VOYAGER\r\n\r\nLa Martinique a hérité de la France son amour pour la fine gastronomie. Ses saveurs créoles alliées au savoir-faire “à la française” de ses chefs font que vous vous régalerez dans les nombreux restaurants de l’île lors de vos prochaines vacances en Martinique.\r\n\r\nQue vous préfériez le poisson ou la viande, chacun trouvera son bonheur autour d’une bonne table, avec un ti-punch en guise d’apéritif.\r\nEn Martinique, évadez-vous lors de randonnées où petits et grands peuvent profiter d’une nature tropicale préservée et s’adonner aux joies de l’exploration à travers des sentiers balisés pour tous les niveaux. Nature généreuse, plages de sable blanc ou volcanique, bassins naturels, cascades ou mangroves sont autant d’expériences envoûtantes que nous avons le plaisir de vous faire découvrir ou redécouvrir !\r\n', '2021-04-07 10:18:52', 'titiX', 0, NULL, '0000-00-00 00:00:00'),
(47, 50, 13, 'titre test post', 'contenu test post', '2021-04-08 15:50:15', 'titiX', 0, NULL, '0000-00-00 00:00:00'),
(48, 51, 18, 'Réouverture de DisneyLand Paris', 'Pas de Date communiqué pour la réouverture des parcs d\'attractions', '2021-04-10 19:26:18', 'tatsu0804', 0, NULL, '0000-00-00 00:00:00'),
(49, 51, 12, 'le rappeur DMX est mort vendredi 9 avril', 'L’annonce de la mort de DMX endeuille la scène du hip-hop américain et ses fans à travers le monde. Vendredi 9 avril, la famille du rappeur, connu notamment ses titres &quot;X Gon\' Give It To Ya&quot; ou &quot;Party Up&quot;, a confirmé son décès auprès du magazine Pitchfork. L’artiste de 50 ans, de son vrai nom Earl Simmons, était hospitalisé depuis une semaine, après un infarctus provoqué par une overdose de drogue. &quot;Earl était un guerrier qui s\'est battu jusqu\'à la toute fin. Il aimait sa famille de tout son cœur et nous chérissons les moments que nous avons passés avec lui. La musique d\'Earl a inspiré d\'innombrables fans à travers le monde et son héritage vivra pour toujours&quot;, a indiqué sa famille dans un communiqué transmis aux médias. \r\nRest in Peace DMX', '2021-04-11 00:19:13', 'tatsu0804', 0, NULL, '0000-00-00 00:00:00'),
(50, 48, 12, 'La Vipère de la mort', 'Un des serpents les plus venimeux au monde.\r\nPetit court et peu agile, il prend ses proies en embuscade.\r\nCamouflé sous des feuillages et prêt à bondir en un éclair !\r\nIl utilise l\'extrémité de sa queue comme leurre pour attirer ses proies.\r\nClassé par certains scientifiques comme le 8eme serpent le plus venimeux au monde.', '2021-04-12 00:05:55', 'Dao', 0, NULL, '0000-00-00 00:00:00'),
(51, 48, 34, 'Au revoir Belmondo et bon voyage', 'Mort de Jean-Paul Belmondo : un hommage national sera rendu jeudi 9 septembre aux Invalides, annonce l\'Elysée.\r\nLa légende du cinéma français s\'est éteinte lundi à l\'âge de 88 ans.\r\n&quot;J\'en ai assez d\'être aimé pour moi-même, j\'aimerais être aimé pour mon argent&quot;, disait Jean-Paul Belmondo dans Docteur Popaul.', '2021-09-07 10:11:14', 'Dao', 0, NULL, '0000-00-00 00:00:00'),
(53, 48, 8, 'test de suppression d\'article modifié ok', 'Contenu de test pour la supp des articles', '2021-09-07 23:08:20', 'Dao', 0, NULL, '2021-09-09 00:32:09'),
(55, 48, 13, 'Joaden le judoka', 'Première année de baby judo pour Joaden au Dojo de Brie Comte Robert.\r\nIl est impatient d\'en découdre sur le tatami.\r\nFuture champion Olympique !!', '2021-09-08 14:28:30', 'Dao', 0, NULL, '0000-00-00 00:00:00'),
(56, 48, 1, 'NETFLIX : Attention arnaque qui fait de nombreuses victimes', 'En ce moment une arnaque bien pensée sur netflix fait beaucoups de victimes.\r\nNous voulons donc vous alerter à ce sujet, phishing déjà bien répandu en France.\r\nUn mail identique à ceux de la vraie platforme Netflix est envoyé pour demander de renouveller  le mode de paiement car l\'abonnement va être suspendu.\r\nLe lien qui y figure et bien évidement un piège pour soutirer vos coordonnées bancaire.\r\nEn aucun cas il ne faut cliquer sur les liens.\r\nSoyez toujours très vigilant quand vous recevez ce genre d\'e-mail, ces méthodes d\'arnaques fleurissent de plus en plus sur toutes les platformes.\r\nPeace les amis', '2021-09-08 22:43:51', 'Dao', 0, NULL, '0000-00-00 00:00:00'),
(59, 48, 14, 'Jeux PS4 Hitman 2 a vendre', 'Vends jeux ps4 hitman 2 neuf sous vide 20€', '2021-09-09 12:14:08', 'Dao', 0, NULL, '2021-09-11 12:03:31'),
(60, 52, 14, 'Jeux PS5 Hitman ', 'Vends jeux ps5 hitman 2 neuf sous vide 40€', '2021-09-11 15:49:08', 'Bebel', 0, NULL, '2021-09-11 12:03:31'),
(61, 52, 10, 'La Guadeloupe', 'LA GUADELOUPE: DES SAVEURS QUI FONT VOYAGER\r\n\r\nLa Martinique a hérité de la France son amour pour la fine gastronomie. Ses saveurs créoles alliées au savoir-faire “à la française” de ses chefs font que vous vous régalerez dans les nombreux restaurants de l’île lors de vos prochaines vacances en Martinique.\r\n\r\nQue vous préfériez le poisson ou la viande, chacun trouvera son bonheur autour d’une bonne table, avec un ti-punch en guise d’apéritif.\r\nEn Martinique, évadez-vous lors de randonnées où petits et grands peuvent profiter d’une nature tropicale préservée et s’adonner aux joies de l’exploration à travers des sentiers balisés pour tous les niveaux. Nature généreuse, plages de sable blanc ou volcanique, bassins naturels, cascades ou mangroves sont autant d’expériences envoûtantes que nous avons le plaisir de vous faire découvrir ou redécouvrir !\r\n', '2021-09-11 15:18:52', 'Bebel', 0, NULL, '0000-00-00 00:00:00'),
(62, 52, 13, 'article de bebel et gros minet', 'article de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minetarticle de titi et gros minet', '2021-04-07 10:01:00', 'Bebel', 0, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_valid` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `is_valid`) VALUES
(1, NULL, 'Informatique', 'informatique', 1),
(2, 1, 'Ordinateur', 'ordinateur', 1),
(3, 1, 'Smartphone', 'smartphone', 1),
(4, NULL, 'Vêtements', 'vetements', 0),
(5, 4, 'Homme', 'homme', 0),
(6, 4, 'Femme', 'femme', 1),
(7, NULL, 'Services', 'services', 1),
(8, 1, 'Développement', 'développement', 1),
(9, NULL, 'Projets', 'projets', 1),
(10, 11, 'Voyages', 'voyages', 1),
(11, NULL, 'Sport', 'sport', 1),
(12, NULL, 'Divers', 'divers', 1),
(13, 4, 'Enfants', 'enfants', 0),
(14, 1, 'Logiciels', 'logiciels', 1),
(15, 11, 'Street Workout', 'street-workout', 1),
(16, NULL, 'Blog', 'blog', 1),
(17, 16, 'Article', 'article', 1),
(18, 7, 'CoursDev', 'cour-dev', 1),
(19, NULL, 'Famille', 'famille', 1),
(20, 19, 'Mariage', 'mariage', 1),
(22, NULL, 'Test1', 'reger', 1),
(24, 22, 'slug test non valide', 'slug-test-non-valide', 0),
(25, NULL, 'slug invalide', 'slug-invalide', 0),
(26, 8, 'React', 'react', 1),
(27, 8, 'PHP', 'php', 1),
(28, NULL, 'CSS', 'css', 1),
(29, 8, 'JS', 'js', 1),
(32, NULL, 'Environnement', 'environnement', 1),
(33, NULL, 'Climat', 'climat', 1),
(34, NULL, 'Hommage', 'hommage', 1);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `articleId` int(11) DEFAULT NULL,
  `author` varchar(100) CHARACTER SET utf8 NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL,
  `approved` int(11) NOT NULL DEFAULT '0',
  `report` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `articleId`, `author`, `comment`, `date`, `approved`, `report`) VALUES
(1, 8, 'qdscdsrg', 'erregrgsrg', '2020-11-15 19:44:22', 1, 0),
(2, 8, 'fezfefee', 'efqefqcdvsfr', '2020-11-15 22:12:12', 1, 0),
(3, 8, 'qdscdsrg', 'erregrgsrg', '2020-11-15 22:50:57', 1, 0),
(4, 8, 'Denis', 'Mon commentaire au top du top bébé !!!!\r\n', '2020-11-15 23:08:50', 0, 0),
(5, 8, 'Denis', 'Mon commentaire au top du top bébé !!!!\r\n', '2020-11-15 23:12:55', 1, 0),
(7, 8, 'sdv', 'ds', '2020-11-16 00:12:04', 0, 0),
(8, 8, 'sdv', 'ds', '2020-11-16 00:13:56', 1, 0),
(9, 8, 'sdv', 'ds', '2020-11-16 00:14:27', 0, 0),
(10, 7, 'rfrf', 'zgz', '2020-11-16 02:30:21', 0, 0),
(11, 6, 'ss', 'rgrf', '2020-11-16 16:41:54', 0, 0),
(12, 8, '99999999999999', '999999999999', '2020-11-16 16:45:32', 1, 0),
(13, 8, 'vds', 'dsvdvs', '2020-11-18 19:08:07', 0, 0),
(14, 8, 'toto', 'toto', '2020-11-18 22:14:07', 0, 0),
(15, 1, 'karim', 'salut mec', '2020-11-18 22:21:20', 0, 0),
(16, 8, 'dvsd', 'dsvds', '2020-11-19 00:44:33', 1, 0),
(17, 8, 'Denis', 'Commentaire du vendredi 20 Novembre 2020', '2020-11-20 09:39:22', 0, 0),
(18, 8, 'gvf', 'fdvdv', '2020-11-20 11:38:40', 0, 0),
(19, 8, 'toftof', 'dede', '2020-11-20 11:38:53', 0, 0),
(20, 8, 'xw', 'wxcw', '2020-11-20 12:52:37', 0, 0),
(21, 8, 'dede', 'e', '2020-11-20 14:22:53', 0, 0),
(22, 8, 'regre', 'regreg', '2020-11-21 17:46:32', 0, 0),
(23, 7, 'Denis', 'Commentaire test 03/12/2020 {%$sdefef/row%}', '2020-12-03 13:36:39', 0, 0),
(24, 1, 'Steph', 'hollaaaaa', '2021-04-06 22:21:20', 0, 0),
(25, 2, 'Camdenou', 'salut camden', '2021-03-22 00:16:23', 0, 0),
(26, 2, 'Camdenou', 'haha ça fonctionne enfin hihi', '2021-03-22 00:16:44', 0, 0),
(27, 1, 'Camdenou', 'tyty', '2021-03-22 00:25:07', 0, 0),
(28, 3, 'Camdenou', 'le sport cest la sante', '2021-03-22 00:50:05', 0, 0),
(29, 3, 'Camdenou', 'vsdvs', '2021-03-22 00:50:38', 0, 0),
(30, 1, 'Camdenou', 'ervrsvsrv', '2021-03-22 02:03:45', 0, 0),
(35, 1, 'Dao', 'Bonjour, je voudrais afficher lavatar de lauteur de cet article merci', '2021-03-28 18:38:27', 0, 0),
(37, 1, 'Dao', 'coucou ca va? 654656g4r6e5grgrg', '2021-03-28 21:12:21', 0, 0),
(58, 1, 'test2803', '999999999999999', '2021-03-28 21:36:38', 0, 0),
(59, 2, 'test2803', 'sqc', '2021-03-28 21:38:48', 0, 0),
(60, 1, 'test2803', 'n,', '2021-03-28 21:39:25', 0, 0),
(62, 40, 'Dao', 'QSXSC', '2021-03-29 00:39:35', 0, 0),
(63, 46, 'titiX', 'hy bro', '2021-04-08 15:26:26', 0, 0),
(65, 47, 'titiX', 'hahaha', '2021-04-08 15:50:40', 0, 3),
(67, 3, 'tatsu0804', 'ca fonctionen?\r\n', '2021-04-10 22:09:02', 0, 0),
(68, 1, 'tatsu0804', 'zrg', '2021-04-10 22:54:17', 0, 0),
(69, 1, 'tatsu0804', 'zregregerger', '2021-04-10 23:03:59', 0, 0),
(70, 46, 'tatsu0804', 'ca roule ma poule', '2021-04-10 23:36:13', 0, 0),
(71, 49, 'tatsu0804', 'Rest in peace DMX \r\nYou will always be a source of inspiration', '2021-04-11 02:36:04', 0, 0),
(72, 49, 'tatsu0804', 'tete', '2021-04-11 03:24:48', 0, 0),
(73, 51, 'Dao', 'Un grand acteur français nous a quitté ce lundi 6 septembre 2021..\r\nCela nous rappel à quel point la vie est courte et précieuse, vivre sa vie à 200%, être optimiste et en profiter au max car le temps passe trop vite !!', '2021-09-07 11:02:27', 0, 0),
(75, 46, 'Dao', 'La Martinique est en confinement COVID en ce moment...', '2021-09-07 16:09:14', 0, 0),
(77, 46, 'Dao', 'gtehsthtehssteh', '2021-09-07 16:45:43', 0, 0),
(78, 46, 'Dao', '777777777777777777777777', '2021-09-07 18:00:24', 0, 1),
(79, 47, 'Dao', 'dsvd999999999999', '2021-09-07 19:47:24', 0, 0),
(82, 47, 'Dao', 'test report', '2021-09-07 20:31:00', 0, 0),
(83, 55, 'Dao', 'Inscription faite pour l\'année 2021/2022 :) ', '2021-09-08 14:31:31', 0, 0),
(84, 2, 'Dao', 'L\'homme finira par vivre sur mars comme dans les films de sciences fictions, ce n\'est qu\'une question de temps', '2021-09-09 00:15:20', 0, 0),
(85, 2, 'Dao', 'test commentaire', '2021-09-09 00:18:12', 0, 0),
(87, 53, 'Dao', 'test', '2021-09-09 01:14:05', 0, 0),
(88, 56, 'Bebel', 'ca roule ma poule', '2021-09-09 12:05:28', 0, 0),
(89, 53, 'Bebel', 'kok', '2021-09-09 12:05:57', 0, 0),
(90, 51, 'Bebel', 'la vie est bebel', '2021-09-10 11:22:27', 0, 0),
(91, 59, 'Bebel', '10 € c bon?', '2021-09-11 11:56:17', 0, 0),
(92, 55, 'DaoCnt', 'yjdjd', '2021-09-11 12:08:17', 0, 0),
(93, 55, 'DaoCnt', 'go', '2021-09-14 09:54:40', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_num` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `departments`
--

INSERT INTO `departments` (`id`, `name`, `name_num`, `region_id`) VALUES
(1, 'Ain', '01', 22),
(2, 'Aisne', '02', 19),
(3, 'Allier', '03', 3),
(4, 'Alpes-de-Haute-Provence', '05', 21),
(5, 'Hautes-Alpes', '01', 21),
(6, 'Alpes-Maritimes', '06', 21),
(7, 'Ardèche', '07', 22),
(8, 'Ardennes', '08', 8),
(9, 'Ariège', '09', 16),
(10, 'Aube', '10', 8),
(11, 'Aude', '11', 13),
(12, 'Aveyron', '12', 16),
(13, 'Bouches-du-Rhône', '13', 21),
(14, 'Calvados', '14', 4),
(15, 'Cantal', '15', 3),
(16, 'Charente', '16', 20),
(17, 'Charente-Maritime', '17', 20),
(18, 'Cher', '18', 7),
(19, 'Corrèze', '19', 14),
(20, 'Côte-d\'Or', '21', 5),
(21, 'Côtes-d\'Armor', '22', 6),
(22, 'Creuse', '23', 14),
(23, 'Dordogne', '24', 2),
(24, 'Doubs', '25', 10),
(25, 'Drôme', '26', 22),
(26, 'Eure', '26', 22),
(27, 'Eure-et-Loir', '28', 7),
(28, 'Finistère', '29', 6),
(29, 'Corse-du-Sud', '2A', 9),
(30, 'Haute-Corsee', '2B', 9),
(31, 'Gard', '31', 13),
(32, 'Haute-Garonne', '2B', 9),
(33, 'Gers', '32', 16),
(34, 'Gironde', '33', 2),
(35, 'Hérault', '34', 13),
(36, 'Ille-et-Vilaine', '35', 6),
(37, 'Indre', '36', 7),
(38, 'Indre-et-Loire', '37', 7),
(39, 'Isère', '38', 22),
(40, 'Jura', '39', 10),
(41, 'Landes', '40', 2),
(42, 'Loir-et-Cher', '41', 7),
(43, 'Loire', '42', 10),
(44, 'Haute-Loire', '43', 3),
(45, 'Loire-Atlantique', '44', 18),
(46, 'Loiret', '45', 7),
(47, 'Lot', '46', 16),
(48, 'Lot Et Garonne', '47', 2),
(49, 'Lozère', '48', 48),
(50, 'Maine-et-Loire', '49', 18),
(51, 'Manche', '50', 4),
(52, 'Marne', '51', 8),
(53, 'Haute-Marne', '52', 8),
(54, 'Mayenne', '53', 18),
(55, 'Meurthe-et-Moselle', '54', 15),
(56, 'Meuse', '55', 15),
(57, 'Morbihan', '56', 6),
(58, 'Moselle', '57', 15),
(59, 'Nièvre', '58', 5),
(60, 'Nord', '59', 17),
(61, 'Oise', '60', 19),
(62, 'Orne', '61', 4),
(63, 'Pas-de-Calais', '62', 17),
(64, 'Puy-de-Dôme', '63', 3),
(65, 'Pyrénées-Atlantiques', '64', 2),
(66, 'Hautes Pyrenees', '65', 16),
(67, 'Pyrénées-Orientales', '66', 13),
(68, 'Bas rhin', '67', 1),
(69, 'Haut-Rhin', '68', 1),
(70, 'Rhône', '69', 22),
(71, 'Haute-Saône', '70', 10),
(72, 'Saône-et-Loire', '71', 5),
(73, 'Sarthe', '72', 18),
(74, 'Savoie', '73', 22),
(75, 'Haute-Savoie', '74', 22),
(76, 'Paris', '75', 12),
(77, 'Seine-Maritime', '76', 11),
(78, 'Seine-et-Marne', '77', 12),
(79, 'Yvelines', '78', 12),
(80, 'Deux-Sèvres', '79', 20),
(81, 'Somme', '80', 19),
(82, 'Tarn', '81', 16),
(83, 'Tarn-et-Garonne', '82', 16),
(84, 'Var', '83', 21),
(85, 'Vaucluse', '84', 21),
(86, 'Vendée', '85', 18),
(87, 'Vienne', '86', 20),
(88, 'Haute-Vienne', '87', 14),
(89, 'Vosges', '88', 15),
(90, 'Yonne', '89', 5),
(91, 'Territoire de Belfort', '90', 10),
(92, 'Essonne', '91', 12),
(93, 'Hauts-de-Seine', '92', 12),
(94, 'Seine-Saint-Denis', '93', 12),
(95, 'Val-de-Marne', '94', 12),
(96, 'Val-d\'Oise', '95', 12);

-- --------------------------------------------------------

--
-- Structure de la table `espèces`
--

CREATE TABLE `espèces` (
  `id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT 'agressif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `espèces`
--

INSERT INTO `espèces` (`id`, `users_id`, `name`, `description`, `type`) VALUES
(1, 1, 'humain', 'Espèce vivante sur terre et système solaire', 'annihilation'),
(2, 2, 'martien', 'Espèce vivante sur mars', 'discrète'),
(3, 3, 'alien', 'Espèce extraterrestre', 'agressive');

-- --------------------------------------------------------

--
-- Structure de la table `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `id_follower` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `article_id`, `name`, `user_id`) VALUES
(1, 3, 'baby-boss.png', 49),
(2, 2, 'mars.jpg', 49),
(3, 36, 'baby-boss.png', 48),
(4, 37, '48.jpg', 48),
(5, 13, '48.png', 48),
(6, 1, 'climat.jpg', 48),
(7, 40, '48.jpg', 48),
(8, 41, '48article.jpg', 48),
(10, 43, '48-article-20210329014320.png', 48),
(11, 44, '48-article-20210329014752.png', 48),
(12, 45, '50-article-20210407100100.png', 50),
(13, 46, '50-article-20210407101852.jpg', 50),
(14, 47, '50-article-20210408035015.jpg', 50),
(15, 48, '51-article-20210410072618.jpg', 51),
(16, 49, '51-article-20210411121913.jpg', 51),
(17, 50, '48-article-20210412120555.jpg', 48),
(18, 51, '48-article-20210907101114.jpg', 48),
(19, 53, '48-article-20210907110820.jpg', 48),
(21, 55, '48-article-20210908022830.jpg', 48),
(22, 56, '48-article-20210908104351.jpg', 48),
(23, 57, '48-article-20210909123823.jpg', 48),
(24, 58, '48-article-20210909103850.jpg', 48),
(25, 59, '48-article-20210909121408.jpg', 48);

-- --------------------------------------------------------

--
-- Structure de la table `images_articles`
--

CREATE TABLE `images_articles` (
  `id` int(11) NOT NULL,
  `articles_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `users_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'en cours',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `post_like`
--

CREATE TABLE `post_like` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id`, `name`) VALUES
(1, 'Alsace'),
(2, 'Aquitaine'),
(3, 'Auvergne'),
(4, 'Basse-Normandie'),
(5, 'Bourgogne'),
(6, 'Bretagne'),
(7, 'Centre'),
(8, 'Champagne'),
(9, 'Corse'),
(10, 'Franche-Comté'),
(11, 'Haute-Normandie'),
(12, 'Île-de-France'),
(13, 'Languedoc-Roussillon'),
(14, 'Limousin'),
(15, 'Lorraine'),
(16, 'Midi-Pyrénées'),
(17, 'Nord-pas-de-Calais'),
(18, 'Pays de la Loire'),
(19, 'Picardie'),
(20, 'Poitou-Charentes'),
(21, 'Provence-Alpes-Côte-d\'Azur'),
(22, 'Rhône-Alpes');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameRole` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `color`, `icon`, `nameRole`) VALUES
(1, 'ROLE_SUPER_ADMIN', '#ff0000', 'super admin', 'Super Administrateur'),
(2, 'ROLE_ADMIN', '#ff0000', 'admin', 'Administrateur'),
(3, 'ROLE_MODERATOR', 'BLUE', 'modérateur', 'Modérateur'),
(4, 'ROLE_USER', '#edd925', 'user', 'Utilisateur'),
(5, 'ROLE_DESABO', '#a1ed25', 'désabonné', 'Désabonné'),
(6, 'ROLE_DELETE', '#a1ed25', 'supprimé', 'Supprimé'),
(7, 'ROLE_ABO', '#a1ed25', 'abonné', 'Abonné');

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'Mort'),
(2, 'Rappeur');

-- --------------------------------------------------------

--
-- Structure de la table `tag_items`
--

CREATE TABLE `tag_items` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tag_items`
--

INSERT INTO `tag_items` (`id`, `article_id`, `tag_id`) VALUES
(1, 49, 1),
(2, 49, 2);

-- --------------------------------------------------------

--
-- Structure de la table `talk`
--

CREATE TABLE `talk` (
  `id` int(11) NOT NULL,
  `id_expediteur` int(11) NOT NULL,
  `id_destinataire` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `unsubscribe`
--

CREATE TABLE `unsubscribe` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `unsubscribe`
--

INSERT INTO `unsubscribe` (`id`, `user_id`, `date`, `comment`) VALUES
(1, 35, '2021-04-14', 'désinscrit par Dao motif test'),
(2, 39, '2021-04-14', 'Delete Test by DAO');

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
  `user_address_id` int(11) NOT NULL,
  `roles_id` int(11) NOT NULL DEFAULT '4',
  `pseudo` varchar(255) DEFAULT NULL,
  `phrase` varchar(50) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `notes_id` int(11) DEFAULT NULL,
  `espece_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_verified`, `age`, `users_infos_id`, `user_address_id`, `roles_id`, `pseudo`, `phrase`, `avatar`, `notes_id`, `espece_id`) VALUES
(1, 'Denis', 'denis@gmail.fr', '', 1, NULL, 1, 0, 0, NULL, NULL, NULL, NULL, 1),
(2, 'John', 'john@gmail.fr', '', 1, NULL, 2, 0, 0, NULL, NULL, NULL, NULL, 2),
(24, 'Shamallow', 'shamallow@gmail.fr', '$2y$10$uJYoLXztyjUQRkYk4NMS2u7jMPCu1oAg1tVyC0ZvraDz.7mfUHmSG', 0, NULL, NULL, 0, 0, 'Shamallow', 'miam miam', NULL, NULL, NULL),
(25, 'steph', 'steph@gmail.fr', '$2y$10$wSzeIst2WJW7nPH8KTr7b.ylWIDQSJySTTFFrqrXJnrJ48MzrF1ZO', 0, NULL, NULL, 0, 0, 'Steph', 'coucou', NULL, NULL, NULL),
(27, 'HelloWork', 'HelloWork@gmail.fr', '$2y$10$rfPlRjoDVItmC0asFOrFRu6Pt3HRN8zg.c8Ecu7LlYAE2C/eVhPMe', 1, NULL, NULL, 0, 0, 'HelloWork', 'Cabinet recrutement expert &amp; manager', NULL, NULL, NULL),
(28, 'papa', 'papa@gmail.fr', '$2y$10$.3ylWqgOxTl8BbRBuBsTke6hLcFna1HDDoSHUBCo2FKSE504kcLWO', 0, NULL, NULL, 0, 0, 'papa', 'Je suis ton père', NULL, NULL, NULL),
(35, 'Spider7', 'Joaden1@gmail.fr', '$2y$10$EQ8zmr6In916RY6z10jVz.AAbiUzOI5OapDka5KDx6xQObnxD0b9a', 0, NULL, NULL, 0, 6, 'jojo1', 'haha', '35.jpg', NULL, NULL),
(36, 'tyty', 'steph1@gmail.fr', '$2y$10$D0F4ZAoR3ojMJ4lMy6wcCOkG9a9V5sHl.EgYBnnY9kVZF/Y8tpqhq', 0, NULL, NULL, 0, 0, 'tyty', 'hihhi', '36.jpg', NULL, NULL),
(37, 'totof', 'totof@gmail.fr', '$2y$10$faLOJu6Be2r8/wV9VaQoMOL4p/iVHdniAS8ftzm.AXXmeHadUCl02', 1, NULL, NULL, 0, 0, 'totof', 'l\'as des as', NULL, NULL, NULL),
(38, 'totof1', 'totof1@gmail.fr', '$2y$10$Z3XjRWg1xyLC3yaFvVA58utwQU/8ltvZ.LJD9NebH1hSQ8Tp.LURG', 0, NULL, NULL, 0, 0, 'totof1', 'l\'as des as', NULL, NULL, NULL),
(39, 'popo', 'popo@gmail.fr', '$2y$10$VAr61XE7Y8XGJaYaZESq8.8TZhEsAtdpVY3mmHvx/0hS8NWm1tNE2', 0, NULL, NULL, 0, 0, 'popo', 'efezfzr', '39.png', NULL, NULL),
(40, 'ezze', 'step1h@gmail.fr', '$2y$10$fI6Zeu2mv.YaQCqcwfQJZe50XhHykOvP2TZN9mqxk/QPuN3ghid/2', 1, NULL, NULL, 0, 0, 'fefge', 'feazfef', '40.png', NULL, NULL),
(41, 'lolo', 'lolo@gmail.fr', '$2y$10$12izQuYZRV8b6W/HLQV/3eO6WKmSRATXP2gbw2ZAFzg1KFNlznn1O', 0, NULL, NULL, 0, 0, 'lolo', 'gzgrgrg', NULL, NULL, NULL),
(44, 'chowchow', 'chowchow@gmail.fr', '$2y$10$eJbi5ov5L6.meXEO3gNV6ujPnjCyXoRSpXF9rqgtbjbBB2Xnxzmw2', 0, NULL, NULL, 0, 0, 'chowchow', 'wouaf wouaf', '.png', NULL, NULL),
(45, 'chowchow', 'chowchow@gmail.fr', '$2y$10$P7JWU0TezOPv4OQfQAiWSu5z/fYIRto/v/48ydD6IWp/5zU3teuLq', 0, NULL, NULL, 0, 0, 'Chowchow', 'wouaf wouaf', '.png', NULL, NULL),
(46, 'chowchow1', 'chowchow1@gmail.fr', '$2y$10$o1KdtCPVW2Xlgcba3ScMwuOZgOMB4fooWphPVz80ayNp2n.Be4UxK', 0, NULL, NULL, 0, 0, 'chowchow1', 'wouaf wouaf', '46.png', NULL, NULL),
(47, 'camdenou', 'camdenou@gmail.com', '$2y$10$CkBf2yYAatDB/ZQbRQXZ7ufRqttBwbSzyD8antP0miLMWyl6dGj.G', 0, NULL, NULL, 0, 0, 'Camdenou', 'balou', '.png', NULL, NULL),
(48, 'Dao', 'dao@gmail.fr', '$2y$10$va9CXkdh2EW9YZ0kldRQz.0DneqN.czAInnQGBeeXMm604q04XETW', 0, NULL, NULL, 0, 1, 'DaoCnt', 'dao', 'tatsumaru.jpg', NULL, NULL),
(49, 'test', 'test2803@gmail.fr', '$2y$10$vpm.lYQwt8.EhKsbSDJRv.B7jh8pL3ERLnECYJEQ1x4dnZUEUuRYK', 0, NULL, NULL, 0, 4, 'test2803', 'test2803 ma phrase fétish', '49.png', NULL, NULL),
(50, 'titi', 'chowchowX@gmail.fr', '$2y$10$hNW4q/tzupCtJCjwbrd3MevAHmp0O6mNsfkkQTlQmID5X7mo3nABK', 0, NULL, NULL, 0, 4, 'titiX', 'oupssssss', '50.png', NULL, NULL),
(51, 'test0804', 'test0804@gmail.fr', '$2y$10$DVdnIDOIIegmScRe8j195.m59MG7Hj6N35sQhAVSCtjIUUK91knNe', 1, NULL, NULL, 0, 4, 'tatsu0804', 'test', '51.png', NULL, NULL),
(52, 'Belmondo', 'jpbdo@gmail.fr', '$2y$10$qqMLQk3I6v861CS43MCsneCbBHuMrMJuPh87Shalas8BX6kT.B67K', 1, NULL, NULL, 0, 1, 'Bebel', '&quot;J\'en ai assez d\'être aimé pour moi-même, j\'a', '.jpg', NULL, NULL),
(53, 'toto', 'toto10@gmail.fr', '$2y$10$/niVVcoCPsC8KZfffPXG5.3e5Iw67aYqDnNxVVqOwJJ2zmRvHq30m', 1, NULL, NULL, 0, 4, 'toto10', 'toto est bo', '.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users_address`
--

CREATE TABLE `users_address` (
  `id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `departement_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users_address`
--

INSERT INTO `users_address` (`id`, `country_id`, `region_id`, `street`, `cp`, `city`, `departement_id`) VALUES
(2, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL),
(15, NULL, NULL, NULL, NULL, NULL, NULL),
(16, NULL, NULL, NULL, NULL, NULL, NULL),
(17, NULL, NULL, NULL, NULL, NULL, NULL),
(18, NULL, NULL, NULL, NULL, NULL, NULL),
(20, NULL, NULL, NULL, NULL, NULL, NULL),
(21, NULL, NULL, NULL, NULL, NULL, NULL),
(22, NULL, NULL, NULL, NULL, NULL, NULL),
(23, NULL, NULL, NULL, NULL, NULL, NULL),
(24, NULL, NULL, NULL, NULL, NULL, NULL),
(26, NULL, NULL, NULL, NULL, NULL, NULL),
(28, NULL, NULL, NULL, NULL, NULL, NULL),
(29, NULL, NULL, NULL, NULL, NULL, NULL),
(30, NULL, NULL, NULL, NULL, NULL, NULL),
(31, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 1, NULL, 'e', '51201', 'e', NULL),
(33, NULL, NULL, NULL, NULL, NULL, NULL),
(34, NULL, NULL, NULL, NULL, NULL, NULL),
(35, NULL, NULL, NULL, NULL, NULL, NULL),
(36, NULL, NULL, NULL, NULL, NULL, NULL),
(37, NULL, NULL, NULL, NULL, NULL, NULL),
(38, NULL, NULL, NULL, NULL, NULL, NULL),
(39, NULL, NULL, NULL, NULL, NULL, NULL),
(40, NULL, NULL, NULL, NULL, NULL, NULL),
(47, NULL, NULL, NULL, NULL, NULL, NULL),
(48, NULL, NULL, NULL, NULL, NULL, NULL),
(49, NULL, NULL, NULL, NULL, NULL, NULL),
(54, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 1, NULL, 't', '60000', 't', NULL),
(98, 1, NULL, 't', '60000', 't', NULL),
(99, NULL, NULL, NULL, NULL, NULL, NULL),
(100, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 1, NULL, 'b', '51111', 'bbb', NULL),
(102, 1, NULL, 'b', '51111', 'bbb', NULL),
(103, 1, NULL, 'a', '51100', 'a', NULL),
(104, 1, NULL, 'a', '51100', 'a', NULL),
(105, NULL, NULL, NULL, NULL, NULL, NULL),
(106, NULL, NULL, NULL, NULL, NULL, NULL),
(107, NULL, NULL, NULL, NULL, NULL, NULL),
(108, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 1, NULL, 'e', '61111', 'i', NULL),
(110, NULL, NULL, NULL, NULL, NULL, NULL),
(111, NULL, NULL, NULL, NULL, NULL, NULL),
(112, NULL, NULL, NULL, NULL, NULL, NULL),
(113, NULL, NULL, NULL, NULL, NULL, NULL),
(114, NULL, NULL, NULL, NULL, NULL, NULL),
(115, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 1, NULL, 't', '51000', 't', NULL),
(117, 1, NULL, 't', '51000', 't', NULL),
(118, 1, NULL, 'rue llala', '51100', 'reims', NULL),
(119, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 1, NULL, 'd', '51100', 'd', NULL),
(121, 1, NULL, 'd', '51100', 'd', NULL),
(122, 1, NULL, 'e', '51000', 'e', NULL),
(123, 1, NULL, 'e', '51000', 'e', NULL),
(124, NULL, NULL, NULL, NULL, NULL, NULL),
(125, NULL, NULL, NULL, NULL, NULL, NULL),
(126, NULL, NULL, NULL, NULL, NULL, NULL),
(127, NULL, NULL, NULL, NULL, NULL, NULL),
(128, NULL, NULL, NULL, NULL, NULL, NULL),
(129, NULL, NULL, NULL, NULL, NULL, NULL),
(130, NULL, NULL, NULL, NULL, NULL, NULL),
(131, NULL, NULL, NULL, NULL, NULL, NULL),
(132, NULL, NULL, NULL, NULL, NULL, NULL),
(133, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 1, NULL, 'd', '51100', 'reims', NULL),
(135, NULL, NULL, NULL, NULL, NULL, NULL),
(136, NULL, NULL, NULL, NULL, NULL, NULL),
(137, NULL, NULL, NULL, NULL, NULL, NULL),
(138, 1, NULL, 'z', '55555', 'z', NULL),
(139, 1, NULL, 'z', '55555', 'z', NULL),
(140, 1, NULL, 'e', '51100', 'resim', NULL),
(141, 1, NULL, 'e', '51100', 'resim', NULL),
(142, 1, NULL, 'a', '55555', 'a', NULL),
(143, 1, NULL, 'a', '55555', 'a', NULL),
(144, 1, NULL, 'e', '61111', 'i', NULL),
(145, 1, NULL, 'e', '51201', 'e', NULL),
(146, NULL, NULL, NULL, NULL, NULL, NULL),
(147, NULL, NULL, NULL, NULL, NULL, NULL),
(148, NULL, NULL, NULL, NULL, NULL, NULL),
(149, NULL, NULL, NULL, NULL, NULL, NULL),
(150, 1, NULL, 'fsreg', '02100', 'stquentin', NULL),
(151, NULL, NULL, NULL, NULL, NULL, NULL),
(152, 1, NULL, 'rue llala', '51111', 'reims', NULL),
(153, NULL, NULL, NULL, NULL, NULL, NULL),
(154, 1, NULL, 'ruelimeil', '94450', 'limeil', NULL),
(155, 1, NULL, 'ruelimeil', '94450', 'limeil', NULL),
(156, 1, NULL, 'rue lulu', '94450', 'lulumcity', NULL),
(157, 1, NULL, 'rue lulu', '94450', 'lulumcity', NULL),
(158, 1, NULL, 'adresse05', '51100', 'ville05', NULL),
(159, 1, NULL, 'adresse05Facture', '51100', 'ville05Facture', NULL),
(160, 1, NULL, 'tyty', '61111', 'tete', NULL),
(161, 1, NULL, 'tyty', '61111', 'tete', NULL),
(162, NULL, NULL, NULL, NULL, NULL, NULL),
(163, NULL, NULL, NULL, NULL, NULL, NULL),
(164, 1, NULL, 'asend', '54444', 'asend', NULL),
(165, 1, NULL, 'asendFacture', '54444', 'asendFacture', NULL),
(166, 1, NULL, 'z', '10111', 'a', NULL),
(167, 1, NULL, 'z', '10111', 'a', NULL),
(168, NULL, NULL, NULL, NULL, NULL, NULL),
(169, NULL, NULL, NULL, NULL, NULL, NULL),
(170, NULL, NULL, NULL, NULL, NULL, NULL),
(171, NULL, NULL, NULL, NULL, NULL, NULL),
(172, NULL, NULL, NULL, NULL, NULL, NULL),
(173, NULL, NULL, NULL, NULL, NULL, NULL),
(174, NULL, NULL, NULL, NULL, NULL, NULL),
(175, 1, NULL, 'julie', '94450', 'limeil', NULL),
(176, 1, NULL, 'julie', '94450', 'limeil', NULL),
(177, NULL, NULL, NULL, NULL, NULL, NULL),
(178, NULL, NULL, NULL, NULL, NULL, NULL),
(179, NULL, NULL, NULL, NULL, NULL, NULL),
(180, NULL, NULL, NULL, NULL, NULL, NULL),
(181, NULL, NULL, NULL, NULL, NULL, NULL),
(182, NULL, NULL, NULL, NULL, NULL, NULL),
(183, 1, NULL, 't', '94450', 'tyh', NULL),
(184, 1, NULL, 't', '94450', 'tyh', NULL),
(185, 1, NULL, 'adresse', '75000', 'paris', NULL),
(186, 1, NULL, 'adresse', '75000', 'paris', NULL),
(187, 1, NULL, 'adresse', '75000', 'paris', NULL),
(188, 1, NULL, 'adresse', '75000', 'paris', NULL),
(189, NULL, NULL, NULL, NULL, NULL, NULL),
(190, NULL, NULL, NULL, NULL, NULL, NULL);

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
-- Déchargement des données de la table `users_infos`
--

INSERT INTO `users_infos` (`id`, `users_id`, `is_valid`, `birth`, `date_inscription`, `phone`) VALUES
(3, 1, 1, '2020-11-26 00:00:00', '2020-11-01 00:00:00', '0646076650'),
(4, 2, 1, '2020-11-30 00:00:00', '2018-04-02 10:43:11', '0656047821');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `aliment`
--
ALTER TABLE `aliment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `categories_id` (`categories_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3AF34668727ACA70` (`parent_id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articleId` (`articleId`);

--
-- Index pour la table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `espèces`
--
ALTER TABLE `espèces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Index pour la table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `images_articles`
--
ALTER TABLE `images_articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_id` (`articles_id`);

--
-- Index pour la table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Index pour la table `post_like`
--
ALTER TABLE `post_like`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`id`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tag_items`
--
ALTER TABLE `tag_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `articles` (`article_id`);

--
-- Index pour la table `unsubscribe`
--
ALTER TABLE `unsubscribe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `users_infos_id` (`users_infos_id`),
  ADD KEY `notes_id` (`notes_id`),
  ADD KEY `espèce_id` (`espece_id`),
  ADD KEY `roles_id` (`roles_id`),
  ADD KEY `user_address_id` (`user_address_id`);

--
-- Index pour la table `users_address`
--
ALTER TABLE `users_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FD4E1B4BF92F3E70` (`country_id`),
  ADD KEY `IDX_FD4E1B4B98260155` (`region_id`);

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
-- AUTO_INCREMENT pour la table `aliment`
--
ALTER TABLE `aliment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT pour la table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT pour la table `espèces`
--
ALTER TABLE `espèces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `images_articles`
--
ALTER TABLE `images_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `post_like`
--
ALTER TABLE `post_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tag_items`
--
ALTER TABLE `tag_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `unsubscribe`
--
ALTER TABLE `unsubscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `users_address`
--
ALTER TABLE `users_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT pour la table `users_infos`
--
ALTER TABLE `users_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `FK_3AF34668727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `images_articles`
--
ALTER TABLE `images_articles`
  ADD CONSTRAINT `images_articles_ibfk_1` FOREIGN KEY (`articles_id`) REFERENCES `articles` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`notes_id`) REFERENCES `notes` (`users_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`espece_id`) REFERENCES `espèces` (`users_id`);

--
-- Contraintes pour la table `users_infos`
--
ALTER TABLE `users_infos`
  ADD CONSTRAINT `users_infos_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_infos_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
