-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 20 fév. 2026 à 16:39
-- Version du serveur : 8.4.7
-- Version de PHP : 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `givemefive`
--

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `auto_ban_users`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `auto_ban_users` (IN `id` INT, IN `reason` VARCHAR(255))   BEGIN

DECLARE nbr INT DEFAULT 0;

	SELECT COUNT(DISTINCT hist_id) INTO nbr
    FROM history_users 
    WHERE hist_event = 'UPDATE' AND hist_field = 'user_ban_at' AND hist_elementid = id;
      CASE nbr 
        WHEN 0 THEN
            UPDATE users SET user_ban_at = CURDATE() + INTERVAL 1 DAY, user_reason_ban = reason WHERE user_id = id;
        WHEN 1 THEN
            UPDATE users SET user_ban_at = CURDATE() + INTERVAL 30 DAY, user_reason_ban = reason WHERE user_id = id;
        WHEN 2 THEN
            UPDATE users SET user_ban_at = CURDATE() + INTERVAL 60 DAY, user_reason_ban = reason WHERE user_id = id;
        WHEN 3 THEN
            UPDATE users SET user_ban_at = CURDATE() + INTERVAL 120 DAY, user_reason_ban = reason WHERE user_id = id;
        WHEN 4 THEN
            UPDATE users SET user_ban_at = CURDATE() + INTERVAL 999 YEAR, user_reason_ban = reason WHERE user_id = id;
    END CASE;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `belongs`
--

DROP TABLE IF EXISTS `belongs`;
CREATE TABLE IF NOT EXISTS `belongs` (
  `belong_cat_id` int UNSIGNED NOT NULL,
  `belong_mov_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`belong_cat_id`,`belong_mov_id`),
  KEY `fk_belong_mov_id` (`belong_mov_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `belongs`
--

INSERT INTO `belongs` (`belong_cat_id`, `belong_mov_id`) VALUES
(1, 13),
(4, 14),
(3, 15),
(6, 16),
(5, 17),
(8, 18),
(9, 19),
(10, 20);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Categories ID',
  `cat_name` varchar(50) NOT NULL COMMENT 'Categories name',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Science-fiction'),
(2, 'Horreur'),
(3, 'Drame'),
(4, 'Guerre'),
(5, 'Thriller'),
(6, 'Mystère'),
(7, 'Fantastique'),
(8, 'Expérimental'),
(9, 'Biopic'),
(10, 'Néo-noir');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `com_id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Comment ID',
  `com_comment` text NOT NULL COMMENT 'Comment content',
  `com_datetime` datetime NOT NULL COMMENT 'Comment date time',
  `com_user_id` int UNSIGNED DEFAULT NULL,
  `com_movie_id` int UNSIGNED DEFAULT NULL,
  `com_mod_id` int UNSIGNED DEFAULT NULL,
  `com_spoiler` tinyint(1) NOT NULL DEFAULT '0',
  `com_delete_at` datetime DEFAULT NULL,
  `com_update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`com_id`),
  UNIQUE KEY `id_user_movie` (`com_user_id`,`com_movie_id`),
  KEY `fk_com_user_id` (`com_user_id`),
  KEY `fk_com_movie_id` (`com_movie_id`),
  KEY `fk_com_mod_id` (`com_mod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`com_id`, `com_comment`, `com_datetime`, `com_user_id`, `com_movie_id`, `com_mod_id`, `com_spoiler`, `com_delete_at`, `com_update_at`) VALUES
(8, 'Difficile à regarder, trop de violence gratuite.', '2024-05-12 11:10:00', 7, 13, NULL, 1, NULL, NULL),
(9, 'La musique de Beethoven n\'a jamais été aussi effrayante.', '2024-10-15 14:00:00', 2, 13, NULL, 0, NULL, NULL),
(11, 'Moins fan de la partie au Vietnam.', '2024-07-04 15:00:00', 4, 14, NULL, 1, NULL, NULL),
(12, 'Ce film est nul, je déteste tout !', '2024-09-01 10:30:00', 5, 14, 2, 1, NULL, NULL),
(13, 'Une atmosphère onirique et envoûtante.', '2024-08-14 23:45:00', 10, 15, NULL, 0, NULL, NULL),
(14, 'Je n\'ai pas tout compris, c\'est bizarre.', '2024-09-01 10:30:00', 5, 15, 3, 0, NULL, NULL),
(15, 'Le dernier film de Kubrick est son plus mystérieux.', '2024-08-05 18:45:00', 1, 15, NULL, 0, NULL, NULL),
(16, 'Le puzzle cinématographique ultime. Lynch est un génie.', '2024-10-12 21:00:00', 1, 16, NULL, 0, NULL, NULL),
(18, 'Naomi Watts est incroyable dans ce film.', '2024-07-30 21:15:00', 9, 16, NULL, 0, NULL, NULL),
(19, 'Dennis Hopper est absolument effrayant.', '2024-02-28 20:10:00', 2, 17, NULL, 0, NULL, NULL),
(21, 'Une vision cauchemardesque de l\'Amérique.', '2024-06-12 11:20:00', 5, 17, NULL, 0, NULL, NULL),
(22, 'L\'expérience la plus sonore et visuelle de ma vie.', '2024-04-01 02:00:00', 3, 18, NULL, 0, NULL, NULL),
(23, 'Trop bizarre pour moi, j\'ai arrêté.', '2024-04-10 16:40:00', 9, 18, NULL, 0, NULL, NULL),
(25, 'Le film le plus humain et touchant de Lynch.', '2024-12-20 20:30:00', 7, 19, NULL, 0, NULL, NULL),
(26, 'Photographie en noir et blanc sublime.', '2024-01-05 17:15:00', 4, 19, NULL, 0, NULL, NULL),
(27, 'Je ne suis pas un animal, je suis un être humain !', '2024-04-14 20:00:00', 10, 19, NULL, 1, NULL, NULL),
(28, 'La BO avec Rammstein et Bowie est folle.', '2024-06-18 22:15:00', 5, 20, NULL, 0, NULL, NULL),
(29, 'L\'homme mystérieux me donne des frissons.', '2024-07-22 13:50:00', 10, 20, NULL, 0, NULL, NULL),
(30, 'Une boucle temporelle fascinante à analyser.', '2024-03-22 16:50:00', 4, 20, NULL, 0, NULL, NULL);

--
-- Déclencheurs `comments`
--
DROP TRIGGER IF EXISTS `after_insert_comments`;
DELIMITER $$
CREATE TRIGGER `after_insert_comments` AFTER INSERT ON `comments` FOR EACH ROW INSERT INTO history_comments (hist_table, hist_event, hist_elementid, hist_date, hist_userid)
VALUES ('comments', 'INSERT', NEW.com_id, NOW(), NEW.com_user_id)
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `after_update_comments`;
DELIMITER $$
CREATE TRIGGER `after_update_comments` AFTER UPDATE ON `comments` FOR EACH ROW BEGIN
    IF OLD.com_comment != NEW.com_comment THEN
        INSERT INTO history_comments (hist_table, hist_event, hist_elementid, hist_date, hist_field, hist_oldvalue, hist_newvalue, hist_userid)
        VALUES ('comments', 'UPDATE', NEW.com_id, NOW(), 'com_comment', OLD.com_comment, NEW.com_comment, NEW.com_user_id);
    END IF;

    IF OLD.com_user_id != NEW.com_user_id THEN
        INSERT INTO history_comments (hist_table, hist_event, hist_elementid, hist_date, hist_field, hist_oldvalue, hist_newvalue, hist_userid)
        VALUES ('comments', 'UPDATE', NEW.com_id, NOW(), 'com_user_id', OLD.com_user_id, NEW.com_user_id, NEW.com_user_id);
    END IF;
    
    IF OLD.com_spoiler != NEW.com_spoiler THEN
        INSERT INTO history_comments (hist_table, hist_event, hist_elementid, hist_date, hist_field, hist_oldvalue, hist_newvalue, hist_userid)
        VALUES ('comments', 'UPDATE', NEW.com_id, NOW(), 'com_spoiler', OLD.com_spoiler, NEW.com_spoiler, NEW.com_user_id);
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `before_delete_comments`;
DELIMITER $$
CREATE TRIGGER `before_delete_comments` BEFORE DELETE ON `comments` FOR EACH ROW INSERT INTO history_comments (hist_table, hist_event, hist_elementid, hist_date, hist_field, hist_oldvalue, hist_newvalue, hist_userid)
VALUES ('comments', 'DELETE', OLD.com_id, NOW(), 'com_comment', OLD.com_comment, NULL, OLD.com_user_id)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `follows`
--

DROP TABLE IF EXISTS `follows`;
CREATE TABLE IF NOT EXISTS `follows` (
  `follo_user_id` int UNSIGNED NOT NULL,
  `follo_mov_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`follo_user_id`,`follo_mov_id`),
  KEY `fk_follo_mov_id` (`follo_mov_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `follows`
--

INSERT INTO `follows` (`follo_user_id`, `follo_mov_id`) VALUES
(3, 13),
(7, 13),
(4, 14),
(7, 14),
(5, 15),
(10, 15),
(1, 16),
(8, 16),
(2, 17),
(8, 17),
(3, 18),
(9, 18),
(4, 19),
(9, 19),
(5, 20),
(10, 20),
(8, 21),
(8, 22),
(2, 24),
(4, 25);

-- --------------------------------------------------------

--
-- Structure de la table `functions`
--

DROP TABLE IF EXISTS `functions`;
CREATE TABLE IF NOT EXISTS `functions` (
  `funct_id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Function ID',
  `funct_name` enum('User','Moderator','Administrator') DEFAULT NULL,
  PRIMARY KEY (`funct_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `functions`
--

INSERT INTO `functions` (`funct_id`, `funct_name`) VALUES
(1, 'User'),
(2, 'Moderator'),
(3, 'Administrator');

-- --------------------------------------------------------

--
-- Structure de la table `history_comments`
--

DROP TABLE IF EXISTS `history_comments`;
CREATE TABLE IF NOT EXISTS `history_comments` (
  `hist_id` int NOT NULL AUTO_INCREMENT,
  `hist_table` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hist_event` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hist_elementid` int NOT NULL,
  `hist_date` datetime DEFAULT NULL,
  `hist_field` text COLLATE utf8mb4_unicode_ci,
  `hist_oldvalue` text COLLATE utf8mb4_unicode_ci,
  `hist_newvalue` text COLLATE utf8mb4_unicode_ci,
  `hist_userid` int NOT NULL,
  PRIMARY KEY (`hist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `history_comments`
--

INSERT INTO `history_comments` (`hist_id`, `hist_table`, `hist_event`, `hist_elementid`, `hist_date`, `hist_field`, `hist_oldvalue`, `hist_newvalue`, `hist_userid`) VALUES
(1, 'comments', 'INSERT', 89, '2026-02-20 10:34:32', NULL, NULL, NULL, 17),
(2, 'comments', 'UPDATE', 89, '2026-02-20 10:41:45', 'com_comment', 'C nulllllldqzdqzdqzdzqzddqzdzzdq', 'dzqdqzdqzdqzdzq', 17),
(3, 'comments', 'DELETE', 89, '2026-02-20 10:42:28', 'com_comment', 'dzqdqzdqzdqzdzq', NULL, 17);

-- --------------------------------------------------------

--
-- Structure de la table `history_contents`
--

DROP TABLE IF EXISTS `history_contents`;
CREATE TABLE IF NOT EXISTS `history_contents` (
  `hist_id` int NOT NULL AUTO_INCREMENT,
  `hist_table` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hist_event` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hist_elementid` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hist_date` datetime NOT NULL,
  `hist_field` text COLLATE utf8mb4_unicode_ci,
  `hist_oldvalue` text COLLATE utf8mb4_unicode_ci,
  `hist_newvalue` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`hist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `history_users`
--

DROP TABLE IF EXISTS `history_users`;
CREATE TABLE IF NOT EXISTS `history_users` (
  `hist_id` int NOT NULL AUTO_INCREMENT,
  `hist_table` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hist_event` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hist_elementid` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hist_date` datetime NOT NULL,
  `hist_field` text COLLATE utf8mb4_unicode_ci,
  `hist_oldvalue` text COLLATE utf8mb4_unicode_ci,
  `hist_newvalue` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`hist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `history_users`
--

INSERT INTO `history_users` (`hist_id`, `hist_table`, `hist_event`, `hist_elementid`, `hist_date`, `hist_field`, `hist_oldvalue`, `hist_newvalue`) VALUES
(1, 'users', 'UPDATE', '17', '2026-02-19 20:33:56', 'user_ban_at', NULL, '0000-00-00 00:00:00'),
(2, 'users', 'UPDATE', '17', '2026-02-19 21:42:01', 'user_ban_at', '0000-00-00 00:00:00', '2026-03-06 21:42:01'),
(3, 'users', 'UPDATE', '17', '2026-02-19 21:57:37', 'user_ban_at', '2026-03-06 21:42:01', '2026-03-21 00:00:00'),
(4, 'users', 'UPDATE', '17', '2026-02-19 21:58:35', 'user_ban_at', '2026-03-21 00:00:00', '2026-04-20 00:00:00'),
(5, 'users', 'UPDATE', '17', '2026-02-19 21:59:44', 'user_ban_at', '2026-04-20 00:00:00', '2026-06-19 00:00:00'),
(6, 'users', 'UPDATE', '17', '2026-02-19 22:00:32', 'user_ban_at', '2026-06-19 00:00:00', '3025-02-19 00:00:00'),
(7, 'users', 'UPDATE', '4', '2026-02-19 22:25:21', 'user_ban_at', NULL, '2026-02-20 00:00:00'),
(8, 'users', 'UPDATE', '7', '2026-02-19 22:34:00', 'user_funct_id', '1', '3'),
(9, 'users', 'UPDATE', '7', '2026-02-19 22:34:05', 'user_firstname', 'Antoine', 'Antoinedzqdqz'),
(10, 'users', 'INSERT', '26', '2026-02-20 08:33:57', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Jobs ID',
  `job_name` enum('Realisator','Productor','Actor') DEFAULT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_name`) VALUES
(1, 'Realisator'),
(2, 'Productor'),
(3, 'Actor');

-- --------------------------------------------------------

--
-- Structure de la table `liked`
--

DROP TABLE IF EXISTS `liked`;
CREATE TABLE IF NOT EXISTS `liked` (
  `lik_user_id` int NOT NULL,
  `lik_mov_id` int DEFAULT NULL,
  `lik_com_id` int DEFAULT NULL,
  `lik_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `uk_like_movie` (`lik_user_id`,`lik_mov_id`),
  UNIQUE KEY `uk_like_comment` (`lik_user_id`,`lik_com_id`),
  KEY `lik_mov_id` (`lik_mov_id`),
  KEY `lik_com_id` (`lik_com_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `liked`
--

INSERT INTO `liked` (`lik_user_id`, `lik_mov_id`, `lik_com_id`, `lik_created_at`) VALUES
(1, 13, NULL, '2026-02-15 19:50:38'),
(2, 13, NULL, '2026-02-15 19:50:38'),
(3, 13, NULL, '2026-02-15 19:50:38'),
(4, 13, NULL, '2026-02-15 19:50:38'),
(5, 13, NULL, '2026-02-15 19:50:38'),
(6, 14, NULL, '2026-02-15 19:50:38'),
(7, 14, NULL, '2026-02-15 19:50:38'),
(8, 14, NULL, '2026-02-15 19:50:38'),
(9, 14, NULL, '2026-02-15 19:50:38'),
(10, 14, NULL, '2026-02-15 19:50:38'),
(1, 15, NULL, '2026-02-15 19:50:38'),
(3, 15, NULL, '2026-02-15 19:50:38'),
(5, 15, NULL, '2026-02-15 19:50:38'),
(7, 15, NULL, '2026-02-15 19:50:38'),
(9, 15, NULL, '2026-02-15 19:50:38'),
(2, 16, NULL, '2026-02-15 19:50:38'),
(4, 16, NULL, '2026-02-15 19:50:38'),
(6, 16, NULL, '2026-02-15 19:50:38'),
(8, 16, NULL, '2026-02-15 19:50:38'),
(10, 16, NULL, '2026-02-15 19:50:38'),
(1, 17, NULL, '2026-02-15 19:50:38'),
(2, 17, NULL, '2026-02-15 19:50:38'),
(5, 17, NULL, '2026-02-15 19:50:38'),
(8, 17, NULL, '2026-02-15 19:50:38'),
(17, 17, NULL, '2026-02-15 19:50:38'),
(3, 18, NULL, '2026-02-15 19:50:38'),
(4, 18, NULL, '2026-02-15 19:50:38'),
(9, 18, NULL, '2026-02-15 19:50:38'),
(10, 18, NULL, '2026-02-15 19:50:38'),
(23, 18, NULL, '2026-02-15 19:50:38'),
(6, 19, NULL, '2026-02-15 19:50:38'),
(7, 19, NULL, '2026-02-15 19:50:38'),
(1, 19, NULL, '2026-02-15 19:50:38'),
(2, 19, NULL, '2026-02-15 19:50:38'),
(5, 19, NULL, '2026-02-15 19:50:38'),
(2, NULL, 8, '2026-02-15 19:50:38'),
(3, NULL, 8, '2026-02-15 19:50:38'),
(4, NULL, 8, '2026-02-15 19:50:38'),
(1, NULL, 13, '2026-02-15 19:50:38'),
(5, NULL, 13, '2026-02-15 19:50:38'),
(6, NULL, 13, '2026-02-15 19:50:38'),
(7, NULL, 16, '2026-02-15 19:50:38'),
(8, NULL, 16, '2026-02-15 19:50:38'),
(9, NULL, 16, '2026-02-15 19:50:38'),
(10, NULL, 22, '2026-02-15 19:50:38'),
(1, NULL, 22, '2026-02-15 19:50:38'),
(2, NULL, 22, '2026-02-15 19:50:38'),
(4, NULL, 28, '2026-02-15 19:50:38'),
(5, NULL, 28, '2026-02-15 19:50:38'),
(6, NULL, 28, '2026-02-15 19:50:38'),
(17, 25, NULL, '2026-02-20 07:39:15');

-- --------------------------------------------------------

--
-- Structure de la table `moderations`
--

DROP TABLE IF EXISTS `moderations`;
CREATE TABLE IF NOT EXISTS `moderations` (
  `mod_id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Moderation ID',
  `mod_answer` tinyint(1) NOT NULL COMMENT 'Moderation answer',
  `mod_msg_refusal` text NOT NULL COMMENT 'Argument for refusal',
  `mod_datetime` datetime NOT NULL COMMENT 'Person birth date',
  `mod_user_id` int UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`mod_id`),
  KEY `fk_mod_user_id` (`mod_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `moderations`
--

INSERT INTO `moderations` (`mod_id`, `mod_answer`, `mod_msg_refusal`, `mod_datetime`, `mod_user_id`) VALUES
(1, 1, '', '2024-02-15 10:00:00', 2),
(2, 0, 'Propos injurieux envers le réalisateur.', '2024-09-02 11:30:00', 3),
(3, 1, '', '2024-05-20 16:45:00', 4);

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `mov_id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Movie Id',
  `mov_title` varchar(100) DEFAULT NULL COMMENT 'Title of the movie',
  `mov_original_title` varchar(100) NOT NULL COMMENT 'Original title of the movie',
  `mov_length` time NOT NULL COMMENT 'Movie length',
  `mov_description` text NOT NULL COMMENT 'Description',
  `mov_release_date` date NOT NULL COMMENT 'Release date',
  `mov_mod_id` int UNSIGNED DEFAULT NULL,
  `mov_nat_id` int UNSIGNED DEFAULT NULL,
  `mov_trailer_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`mov_id`),
  KEY `mov_mod_id` (`mov_mod_id`),
  KEY `fk_movies_nationality` (`mov_nat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `movies`
--

INSERT INTO `movies` (`mov_id`, `mov_title`, `mov_original_title`, `mov_length`, `mov_description`, `mov_release_date`, `mov_mod_id`, `mov_nat_id`, `mov_trailer_url`) VALUES
(13, 'Orange Mécanique', 'A Clockwork Orange', '02:16:00', 'Dans un futur dystopique, un chef de gang sadique est soumis à une expérience de réhabilitation.', '1971-12-19', NULL, 3, 'https://www.youtube.com/watch?v=T54uZPI4Z8A'),
(14, 'Full Metal Jacket', 'Full Metal Jacket', '01:56:00', 'Le parcours de jeunes marines américains, de l\'entraînement brutal à la guerre du Vietnam.', '1987-06-26', NULL, 2, 'https://www.google.com/search?q=trailer+full+metal+jacket&rlz=1C1VDKB_frFR1102FR1102&oq=trailer+full+metal+jacket&gs_lcrp=EgZjaHJvbWUyBggAEEUYOTIICAEQABgWGB4yCAgCEAAYFhgeMggIAxAAGBYYHjIICAQQABgWGB4yCAgFEAAYFhgeMggIBhAAGBYYHjIICAcQABgWGB4yCAgIEAAYFhgeMggIC'),
(15, 'Eyes Wide Shut', 'Eyes Wide Shut', '02:39:00', 'Un médecin new-yorkais s\'aventure dans une odyssée nocturne étrange et érotique.', '1999-07-16', NULL, 2, 'https://www.google.com/search?q=trailer+eyes+wide+shut&sca_esv=f9558c3169decf9e&rlz=1C1VDKB_frFR1102FR1102&sxsrf=ANbL-n5RN_Qb7MwyMR5AJXafxA7vtNqRZA%3A1768731365994&ei=5bJsadC6PPWpkdUPk8Xh4QY&oq=trailer+eyes&gs_lp=Egxnd3Mtd2l6LXNlcnAiDHRyYWlsZXIgZXllcyoCCA'),
(16, 'Mulholland Drive', 'Mulholland Dr.', '02:27:00', 'Une femme amnésique et une aspirante actrice enquêtent dans un Los Angeles onirique.', '2001-10-12', NULL, 2, 'https://www.youtube.com/watch?v=91kRgjELBek'),
(17, 'Blue Velvet', 'Blue Velvet', '02:00:00', 'La découverte d\'une oreille humaine coupée mène un jeune homme dans un monde souterrain sombre.', '1986-09-19', NULL, 2, 'https://www.youtube.com/watch?v=rAA6imfqMYQ'),
(18, 'Eraserhead', 'Eraserhead', '01:29:00', 'Henry Spencer tente de survivre dans son environnement industriel avec sa petite amie et leur enfant mutant.', '1977-03-19', NULL, 2, 'https://www.youtube.com/watch?v=oK-2_OsBe0s'),
(19, 'Elephant Man', 'The Elephant Man', '02:04:00', 'Un chirurgien victorien sauve un homme gravement défiguré, exploité comme un monstre de foire.', '1980-10-03', NULL, 2, 'https://www.youtube.com/watch?v=AF9gNKJi79g'),
(20, 'Lost Highway', 'Lost Highway', '02:14:00', 'Après une rencontre bizarroïde lors d\'une fête, un saxophoniste est accusé du meurtre de sa femme.', '1997-02-21', NULL, 2, 'https://www.youtube.com/watch?v=8-1pcMvy5qc'),
(21, 'Avatar: Fire and Ash', 'Avatar: Fire and Ash', '03:10:00', 'Jake Sully et Neytiri affrontent un nouveau clan de Na\'vi lié au feu dans une région volcanique de Pandora.', '2026-01-07', NULL, 2, 'https://www.youtube.com/watch?v=nb_fFj_0rq8'),
(22, 'M3GAN 2.0', 'M3GAN 2.0', '01:42:00', 'L\'intelligence artificielle meurtrière est de retour dans une version plus évoluée et plus dangereuse.', '2026-01-14', NULL, 2, 'https://www.youtube.com/watch?v=I0VWWnMUjFU'),
(24, 'Paddington au Pérou', 'Paddington in Peru', '01:43:00', 'Paddington retourne au Pérou pour rendre visite à sa tante Lucy, entraînant les Brown dans une aventure épique.', '2026-01-07', NULL, 3, 'https://www.youtube.com/watch?v=Fp-1L1KOIk8'),
(25, 'The Drama', 'The Drama', '02:05:00', 'Une crise inattendue survient dans la vie d\'un couple à la veille de leur mariage.', '2026-01-30', NULL, 2, 'https://www.google.com/search?q=trailer+the+drama&rlz=1C1VDKB_frFR1102FR1102&sca_esv=f9558c3169decf9e&sxsrf=ANbL-n40rc4yxeDI2p-TpaTEP3S6ZfVrTA%3A1768731399284&ei=B7Nsaf6EEeDCnsEP7fu26QI&ved=0ahUKEwi-pIf27ZSSAxVgoScCHe29LS0Q4dUDCBE&uact=5&oq=trailer+the+dr');

--
-- Déclencheurs `movies`
--
DROP TRIGGER IF EXISTS `after_insert_movies`;
DELIMITER $$
CREATE TRIGGER `after_insert_movies` AFTER INSERT ON `movies` FOR EACH ROW INSERT INTO history_contents (hist_table, hist_event, hist_elementid, hist_date)
VALUES ('movies', 'DELETE', NEW.mov_id, NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `after_update_movies`;
DELIMITER $$
CREATE TRIGGER `after_update_movies` AFTER UPDATE ON `movies` FOR EACH ROW BEGIN 
	IF OLD.mov_title != NEW.mov_title THEN
        INSERT INTO history_contents (hist_table, hist_event, hist_elementid, hist_date, hist_field, hist_oldvalue, hist_newvalue)
        VALUES ('movies', 'UPDATE', NEW.mov_id, NOW(), 'mov_title', OLD.mov_title, NEW.mov_title);
    END IF;

    
    IF OLD.mov_original_title != NEW.mov_original_title THEN
        INSERT INTO history_contents (hist_table, hist_event, hist_elementid, hist_date, hist_field, hist_oldvalue, hist_newvalue)
        VALUES ('movies', 'UPDATE', NEW.mov_id, NOW(), 'mov_original_title', OLD.mov_original_title, NEW.mov_original_title);
    END IF;

    
    IF OLD.mov_length != NEW.mov_length THEN
        INSERT INTO history_contents (hist_table, hist_event, hist_elementid, hist_date, hist_field, hist_oldvalue, hist_newvalue)
        VALUES ('movies', 'UPDATE', NEW.mov_id, NOW(), 'mov_length', OLD.mov_length, NEW.mov_length);
    END IF;

    -- Historisation de mov_description
    IF OLD.mov_description != NEW.mov_description THEN
        INSERT INTO history_contents (hist_table, hist_event, hist_elementid, hist_date, hist_field, hist_oldvalue, hist_newvalue)
        VALUES ('movies', 'UPDATE', NEW.mov_id, NOW(), 'mov_description', OLD.mov_description, NEW.mov_description);
    END IF;

   
    IF OLD.mov_release_date != NEW.mov_release_date THEN
        INSERT INTO history_contents (hist_table, hist_event, hist_elementid, hist_date, hist_field, hist_oldvalue, hist_newvalue)
        VALUES ('movies', 'UPDATE', NEW.mov_id, NOW(), 'mov_release_date', OLD.mov_release_date, NEW.mov_release_date);
    END IF;

    
    IF OLD.mov_trailer_url != NEW.mov_trailer_url THEN
        INSERT INTO history_contents (hist_table, hist_event, hist_elementid, hist_date, hist_field, hist_oldvalue, hist_newvalue)
       	VALUES ('movies', 'UPDATE', NEW.mov_id, NOW(), 'mov_trailer_url', OLD.mov_trailer_url, NEW.mov_trailer_url);
    END IF;

END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `before_delete_movies`;
DELIMITER $$
CREATE TRIGGER `before_delete_movies` BEFORE DELETE ON `movies` FOR EACH ROW INSERT INTO history_contents (hist_table, hist_event, hist_elementid, hist_date)
VALUES ('movies', 'DELETE', OLD.mov_id, NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `nationalities`
--

DROP TABLE IF EXISTS `nationalities`;
CREATE TABLE IF NOT EXISTS `nationalities` (
  `nat_id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Nationalities ID',
  `nat_country` varchar(50) NOT NULL COMMENT 'Country name',
  PRIMARY KEY (`nat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `nationalities`
--

INSERT INTO `nationalities` (`nat_id`, `nat_country`) VALUES
(1, 'France'),
(2, 'États-Unis'),
(3, 'Royaume-Uni'),
(4, 'Allemagne'),
(5, 'Italie'),
(6, 'Espagne'),
(7, 'Japon'),
(8, 'Canada'),
(9, 'Australie'),
(10, 'Brésil');

-- --------------------------------------------------------

--
-- Structure de la table `participates`
--

DROP TABLE IF EXISTS `participates`;
CREATE TABLE IF NOT EXISTS `participates` (
  `part_pers_id` int UNSIGNED NOT NULL,
  `part_job_id` int UNSIGNED NOT NULL,
  `part_mov_id` int UNSIGNED NOT NULL,
  `part_character_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`part_pers_id`,`part_job_id`,`part_mov_id`),
  KEY `fk_part_job_id` (`part_job_id`),
  KEY `fk_part_mov_id` (`part_mov_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `participates`
--

INSERT INTO `participates` (`part_pers_id`, `part_job_id`, `part_mov_id`, `part_character_name`) VALUES
(3, 2, 15, NULL),
(3, 2, 19, NULL),
(4, 1, 20, NULL),
(4, 2, 16, NULL),
(4, 2, 24, NULL),
(5, 1, 16, NULL),
(5, 1, 24, NULL),
(5, 2, 20, NULL),
(6, 1, 13, NULL),
(6, 1, 25, NULL),
(6, 3, 17, NULL),
(6, 3, 21, NULL),
(7, 1, 17, NULL),
(7, 1, 21, NULL),
(7, 2, 25, NULL),
(7, 3, 13, NULL),
(8, 2, 13, NULL),
(8, 2, 17, NULL),
(8, 2, 21, NULL),
(8, 3, 25, NULL),
(9, 1, 14, NULL),
(9, 1, 22, NULL),
(9, 2, 18, NULL),
(10, 1, 18, NULL),
(10, 2, 14, NULL),
(10, 3, 22, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `persons`
--

DROP TABLE IF EXISTS `persons`;
CREATE TABLE IF NOT EXISTS `persons` (
  `pers_id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Person ID',
  `pers_name` varchar(50) NOT NULL COMMENT 'Person name',
  `pers_firstname` varchar(50) NOT NULL COMMENT 'Person firstname',
  `pers_birthdate` date NOT NULL COMMENT 'Person birth date',
  `pers_deathdate` date DEFAULT NULL COMMENT 'person death date',
  `pers_nat_id` int UNSIGNED DEFAULT NULL,
  `pers_bio` varchar(255) DEFAULT NULL COMMENT 'Person biography',
  `pers_photo` varchar(255) DEFAULT NULL COMMENT 'Person photo URL',
  PRIMARY KEY (`pers_id`),
  KEY `fk_pers_nat_id` (`pers_nat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `persons`
--

INSERT INTO `persons` (`pers_id`, `pers_name`, `pers_firstname`, `pers_birthdate`, `pers_deathdate`, `pers_nat_id`, `pers_bio`, `pers_photo`) VALUES
(3, 'Clarke', 'Arthur C.', '1917-12-16', '2008-03-19', 3, 'Stanley Kubrick est un réalisateur, scénariste et producteur américain, connu pour ses films cultes et son perfectionnisme extrême.', 'https://encrypted-tbn0.gstatic.com/licensed-image?q=tbn:ANd9GcSkYSBpua4nWLeJZKz2RIrPgYPlYmz9vfA7K_qKvndm8KzaXivfCgxgLmxCsO8Z4DiVnbaU3bMV24mG39w'),
(4, 'Nicholson', 'Jack', '1937-04-22', NULL, 2, 'David Lynch est un réalisateur, scénariste et artiste américain, connu pour son cinéma étrange et onirique, mêlant mystère, rêve et inquiétante étrangeté.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/00/David_Lynch_Cannes_2017.jpg/250px-David_Lynch_Cannes_2017.jpg'),
(5, 'McDowell', 'Malcolm', '1943-06-13', NULL, 2, 'David Lynch est un réalisateur, scénariste et artiste américain, connu pour son cinéma étrange et onirique, mêlant mystère, rêve et inquiétante étrangeté.', 'https://encrypted-tbn0.gstatic.com/licensed-image?q=tbn:ANd9GcSkYSBpua4nWLeJZKz2RIrPgYPlYmz9vfA7K_qKvndm8KzaXivfCgxgLmxCsO8Z4DiVnbaU3bMV24mG39w'),
(6, 'Ermey', 'R. Lee', '1944-03-24', '2018-04-15', 2, 'David Lynch est un réalisateur, scénariste et artiste américain, connu pour son cinéma étrange et onirique, mêlant mystère, rêve et inquiétante étrangeté.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/00/David_Lynch_Cannes_2017.jpg/250px-David_Lynch_Cannes_2017.jpg'),
(7, 'Kidman', 'Nicole', '1967-06-20', NULL, 2, 'David Lynch est un réalisateur, scénariste et artiste américain, connu pour son cinéma étrange et onirique, mêlant mystère, rêve et inquiétante étrangeté.', 'https://encrypted-tbn0.gstatic.com/licensed-image?q=tbn:ANd9GcSkYSBpua4nWLeJZKz2RIrPgYPlYmz9vfA7K_qKvndm8KzaXivfCgxgLmxCsO8Z4DiVnbaU3bMV24mG39w'),
(8, 'Nance', 'Jack', '1943-12-21', '1996-12-30', 2, 'Stanley Kubrick est un réalisateur, scénariste et producteur américain, connu pour ses films cultes et son perfectionnisme extrême.', 'https://encrypted-tbn0.gstatic.com/licensed-image?q=tbn:ANd9GcSkYSBpua4nWLeJZKz2RIrPgYPlYmz9vfA7K_qKvndm8KzaXivfCgxgLmxCsO8Z4DiVnbaU3bMV24mG39w'),
(9, 'Hurt', 'John', '1940-01-22', '2017-01-25', 2, 'Stanley Kubrick est un réalisateur, scénariste et producteur américain, connu pour ses films cultes et son perfectionnisme extrême.', 'https://encrypted-tbn0.gstatic.com/licensed-image?q=tbn:ANd9GcSkYSBpua4nWLeJZKz2RIrPgYPlYmz9vfA7K_qKvndm8KzaXivfCgxgLmxCsO8Z4DiVnbaU3bMV24mG39w'),
(10, 'MacLachlan', 'Kyle', '1959-02-22', NULL, 2, 'Stanley Kubrick est un réalisateur, scénariste et producteur américain, connu pour ses films cultes et son perfectionnisme extrême.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/00/David_Lynch_Cannes_2017.jpg/250px-David_Lynch_Cannes_2017.jpg');

--
-- Déclencheurs `persons`
--
DROP TRIGGER IF EXISTS `after_insert_persons`;
DELIMITER $$
CREATE TRIGGER `after_insert_persons` AFTER INSERT ON `persons` FOR EACH ROW INSERT INTO history_contents (hist_table, hist_event, hist_elementid, hist_date)
VALUES ('persons', 'INSERT', NEW.pers_id, NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `after_update_persons`;
DELIMITER $$
CREATE TRIGGER `after_update_persons` AFTER UPDATE ON `persons` FOR EACH ROW BEGIN 

    IF OLD.pers_name != NEW.pers_name THEN
        INSERT INTO history_contents (hist_table, hist_event, hist_elementid, hist_date, hist_field, hist_oldvalue, hist_newvalue)
        VALUES ('persons', 'UPDATE', NEW.pers_id, NOW(), 'pers_name', OLD.pers_name, NEW.pers_name);
    END IF;

    IF OLD.pers_firstname != NEW.pers_firstname THEN
        INSERT INTO history_contents (hist_table, hist_event, hist_elementid, hist_date, hist_field, hist_oldvalue, hist_newvalue)
        VALUES ('persons', 'UPDATE', NEW.pers_id, NOW(), 'pers_firstname', OLD.pers_firstname, NEW.pers_firstname);
    END IF;

    IF OLD.pers_birthdate != NEW.pers_birthdate THEN
        INSERT INTO history_contents (hist_table, hist_event, hist_elementid, hist_date, hist_field, hist_oldvalue, hist_newvalue)
        VALUES ('persons', 'UPDATE', NEW.pers_id, NOW(), 'pers_birthdate', OLD.pers_birthdate, NEW.pers_birthdate);
    END IF;

    IF (NEW.pers_deathdate <=> OLD.pers_deathdate) THEN
        INSERT INTO history_contents (hist_table, hist_event, hist_elementid, hist_date, hist_field, hist_oldvalue, hist_newvalue)
        VALUES ('persons', 'UPDATE', NEW.pers_id, NOW(), 'pers_deathdate', OLD.pers_deathdate, NEW.pers_deathdate);
    END IF;

    IF OLD.pers_bio != NEW.pers_bio THEN
        INSERT INTO history_contents (hist_table, hist_event, hist_elementid, hist_date, hist_field, hist_oldvalue, hist_newvalue)
        VALUES ('persons', 'UPDATE', NEW.pers_id, NOW(), 'pers_bio', OLD.pers_bio, NEW.pers_bio);
    END IF;

    IF OLD.pers_photo != NEW.pers_photo THEN
        INSERT INTO history_contents (hist_table, hist_event, hist_elementid, hist_date, hist_field, hist_oldvalue, hist_newvalue)
        VALUES ('persons', 'UPDATE', NEW.pers_id, NOW(), 'pers_photo', OLD.pers_photo, NEW.pers_photo);
    END IF;

END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `before_delete_persons`;
DELIMITER $$
CREATE TRIGGER `before_delete_persons` BEFORE DELETE ON `persons` FOR EACH ROW INSERT INTO history_contents (hist_table, hist_event, hist_elementid, hist_date)
VALUES ('persons', 'DELETE', OLD.pers_id, NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `pho_id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Photo ID',
  `pho_photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Photo URL',
  `pho_type` varchar(150) NOT NULL COMMENT 'Type of file',
  `pho_mov_id` int UNSIGNED DEFAULT NULL,
  `pho_user_id` int UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`pho_id`),
  UNIQUE KEY `uk_mov_user_id` (`pho_mov_id`,`pho_user_id`),
  KEY `fk_pho_mov_id` (`pho_mov_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `photos`
--

INSERT INTO `photos` (`pho_id`, `pho_photo`, `pho_type`, `pho_mov_id`, `pho_user_id`) VALUES
(3, 'https://fr.web.img6.acsta.net/medias/nmedia/18/36/25/34/18465555.jpg', 'Affiche', 13, NULL),
(4, 'https://upload.wikimedia.org/wikipedia/en/9/99/Full_Metal_Jacket_poster.jpg', 'Affiche', 14, NULL),
(5, 'https://fr.web.img6.acsta.net/c_310_420/medias/nmedia/18/65/43/72/19106205.jpg', 'Affiche', 15, NULL),
(6, 'https://upload.wikimedia.org/wikipedia/en/0/0f/Mulholland.png', 'Affiche', 16, NULL),
(7, 'https://m.media-amazon.com/images/I/61LkggMExBL._AC_UF894,1000_QL80_.jpg', 'Affiche', 17, NULL),
(8, 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/Eraserhead.jpg/960px-Eraserhead.jpg', 'Affiche', 18, NULL),
(9, 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQcyCI04HaeBW7oH00JXR8QkcOgROgMbOQsM2uNIgCjzlpZJlNI', 'Affiche', 19, NULL),
(10, 'https://fr.web.img4.acsta.net/pictures/22/10/27/16/38/1152463.jpg', 'Affiche', 20, NULL),
(11, 'https://fr.web.img6.acsta.net/img/52/fb/52fb8f0345af2b0940557aa049ca19fd.jpg', 'Affiche', 21, NULL),
(12, 'https://i.ebayimg.com/images/g/0RoAAOSwRFpnoRMo/s-l400.jpg', 'Affiche', 22, NULL),
(14, 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcS0XU9K0CSrtM7H7Aam3yZdOoekxqJTno9u2U4LB5x76ND5qwp6', 'Affiche', 24, NULL),
(15, 'https://m.media-amazon.com/images/M/MV5BMzFjZjQ4ZmYtZmVkZC00MTU4LWI5N2MtNDA1NjI5Njg1MGY0XkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg', 'Affiche', 25, NULL),
(17, '698dda1f43162.png', 'Content', 22, 24);

-- --------------------------------------------------------

--
-- Structure de la table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `rat_user_id` int UNSIGNED NOT NULL,
  `rat_mov_id` int UNSIGNED NOT NULL,
  `rat_score` decimal(2,1) NOT NULL,
  PRIMARY KEY (`rat_user_id`,`rat_mov_id`),
  KEY `fk_ratings_movies` (`rat_mov_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ratings`
--

INSERT INTO `ratings` (`rat_user_id`, `rat_mov_id`, `rat_score`) VALUES
(1, 11, 4.3),
(1, 15, 4.3),
(1, 16, 5.0),
(1, 22, 4.5),
(1, 23, 4.0),
(2, 12, 2.5),
(2, 13, 4.0),
(2, 14, 4.3),
(2, 16, 4.3),
(2, 17, 4.3),
(2, 20, 4.3),
(2, 21, 2.0),
(2, 23, 3.0),
(3, 11, 3.5),
(3, 13, 5.0),
(3, 18, 4.0),
(4, 13, 4.3),
(4, 14, 4.0),
(4, 19, 5.0),
(4, 20, 4.0),
(4, 24, 3.0),
(5, 13, 3.0),
(5, 14, 5.0),
(5, 15, 3.5),
(5, 16, 4.5),
(5, 17, 1.5),
(5, 19, 3.0),
(5, 20, 4.5),
(5, 21, 2.0),
(5, 22, 5.0),
(5, 23, 3.5),
(5, 24, 4.0),
(5, 25, 3.0),
(6, 11, 4.0),
(6, 16, 3.0),
(6, 25, 3.0),
(7, 12, 4.5),
(7, 13, 2.0),
(7, 19, 4.3),
(7, 22, 3.0),
(8, 12, 4.3),
(8, 17, 3.5),
(8, 18, 4.3),
(8, 19, 5.0),
(9, 14, 5.0),
(9, 16, 5.0),
(9, 18, 5.0),
(10, 13, 3.0),
(10, 14, 4.0),
(10, 15, 2.0),
(10, 16, 4.5),
(10, 19, 2.5),
(10, 20, 4.0),
(10, 21, 3.0),
(10, 22, 4.5),
(10, 23, 3.5),
(10, 24, 2.0),
(10, 25, 4.5),
(15, 11, 3.0),
(15, 21, 4.5),
(15, 23, 1.0),
(15, 24, 4.0),
(15, 25, 5.0),
(16, 24, 0.5),
(17, 15, 4.0),
(17, 16, 3.0),
(17, 17, 4.5),
(17, 21, 3.0),
(17, 22, 1.0),
(17, 23, 3.0),
(17, 25, 5.0);

-- --------------------------------------------------------

--
-- Structure de la table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `rep_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `rep_reported_user_id` int UNSIGNED DEFAULT NULL,
  `rep_reported_movie_id` int UNSIGNED DEFAULT NULL,
  `rep_reported_com_id` int UNSIGNED DEFAULT NULL,
  `rep_com_content` text COLLATE utf8mb4_unicode_ci,
  `rep_pseudo_user` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rep_bio_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rep_date` datetime DEFAULT NULL,
  `rep_reporter_user_id` int UNSIGNED DEFAULT NULL,
  `rep_reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rep_delete_at` datetime DEFAULT NULL,
  PRIMARY KEY (`rep_id`),
  KEY `fk_rep_reported_user` (`rep_reported_user_id`),
  KEY `fk_rep_reported_mov` (`rep_reported_movie_id`),
  KEY `fk_rep_reported_com` (`rep_reported_com_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reports`
--

INSERT INTO `reports` (`rep_id`, `rep_reported_user_id`, `rep_reported_movie_id`, `rep_reported_com_id`, `rep_com_content`, `rep_pseudo_user`, `rep_bio_user`, `rep_date`, `rep_reporter_user_id`, `rep_reason`, `rep_delete_at`) VALUES
(36, 5, NULL, NULL, NULL, 'keke_99', '', '2026-02-14 18:09:30', 25, 'test', '2026-02-19 22:36:18'),
(37, 6, NULL, NULL, NULL, 'cam_rob', '', '2026-02-14 18:10:12', 25, 'dzadqzdzqdqzd', NULL),
(63, NULL, 18, NULL, NULL, NULL, NULL, '2026-02-14 22:24:53', 25, 'Cnul', NULL),
(70, 24, NULL, NULL, NULL, 'marcoooo', '', '2026-02-15 20:18:24', 17, 'PP buger', '2026-02-19 22:36:57');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'User ID',
  `user_name` varchar(50) NOT NULL COMMENT 'User name',
  `user_firstname` varchar(50) NOT NULL COMMENT 'User first name',
  `user_pseudo` varchar(50) NOT NULL COMMENT 'User pseudo',
  `user_email` varchar(255) NOT NULL COMMENT 'User email',
  `user_birthdate` date NOT NULL COMMENT 'User Birthdate',
  `user_creadate` datetime NOT NULL COMMENT 'User accounts creation date',
  `user_com_id` int UNSIGNED DEFAULT NULL,
  `user_nat_id` int UNSIGNED DEFAULT NULL,
  `user_funct_id` int UNSIGNED DEFAULT '1',
  `user_bio` varchar(255) DEFAULT NULL COMMENT 'User biography',
  `user_photo` varchar(255) DEFAULT NULL COMMENT 'User profile photo URL',
  `user_pwd` varchar(255) NOT NULL,
  `user_delete_at` datetime DEFAULT NULL,
  `user_update_at` datetime DEFAULT NULL,
  `user_ban_at` datetime DEFAULT NULL,
  `user_reason_ban` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `unique_email` (`user_email`),
  UNIQUE KEY `unique_pseudo` (`user_pseudo`),
  KEY `fk_user_funct_id` (`user_funct_id`),
  KEY `fk_users_nationalities` (`user_nat_id`),
  KEY `fk_users_roles` (`user_com_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_firstname`, `user_pseudo`, `user_email`, `user_birthdate`, `user_creadate`, `user_com_id`, `user_nat_id`, `user_funct_id`, `user_bio`, `user_photo`, `user_pwd`, `user_delete_at`, `user_update_at`, `user_ban_at`, `user_reason_ban`) VALUES
(1, 'Dubois', 'Thomas', 'tom_dubois', 'thomas.dubois@exemple.com', '1990-05-15', '2024-01-10 09:00:00', NULL, NULL, 3, NULL, NULL, '', '2026-02-07 16:32:25', NULL, NULL, NULL),
(2, 'Leroy', 'Marie', 'mary_l', 'marie.leroy@exemple.com', '1985-11-20', '2024-01-12 10:30:00', NULL, NULL, 2, NULL, NULL, '', '2026-02-10 17:04:20', NULL, NULL, NULL),
(3, 'Martin', 'Lucas', 'luke_sky', 'lucas.martin@exemple.com', '1998-03-08', '2024-01-15 14:15:00', NULL, NULL, 2, NULL, NULL, '', '2026-02-11 18:12:50', NULL, NULL, NULL),
(4, 'Bernard', 'Sophie', 'sophie_b', 'sophie.bernard@exemple.com', '1992-07-22', '2024-02-01 11:00:00', NULL, NULL, 2, NULL, NULL, '', NULL, NULL, '2026-02-20 00:00:00', 'dzqdzqdqzdqzdqz'),
(5, 'Petit', 'Kevin', 'keke_99', 'kevin.petit@exemple.com', '1999-12-01', '2024-02-10 16:45:00', NULL, NULL, 2, NULL, NULL, '', NULL, NULL, NULL, NULL),
(6, 'Robert', 'Camille', 'cam_rob', 'camille.robert@exemple.com', '1995-09-14', '2024-02-20 08:20:00', NULL, NULL, 1, NULL, NULL, '', NULL, NULL, NULL, NULL),
(7, 'Richard', 'Antoinedzqdqz', 'tony_ric', 'antoine.richard@exemple.com', '1988-02-28', '2024-03-05 13:10:00', NULL, NULL, 3, '', 'defaultImgUser.jpg', '', NULL, '2026-02-19 22:34:05', NULL, NULL),
(8, 'Durand', 'Léa', 'lele_d', 'lea.durand@exemple.com', '2001-06-30', '2024-03-12 18:00:00', NULL, NULL, 1, NULL, NULL, '', NULL, NULL, NULL, NULL),
(9, 'Moreau', 'Nathan', 'nate_m', 'nathan.moreau@exemple.com', '1993-04-10', '2024-03-25 09:45:00', NULL, NULL, 1, NULL, NULL, '', NULL, NULL, NULL, NULL),
(10, 'Simon', 'Sarah', 's_simon', 'sarah.simon@exemple.com', '1982-08-05', '2024-04-01 12:00:00', NULL, NULL, 1, NULL, NULL, '', NULL, NULL, NULL, NULL),
(17, 'MARCO', 'Marco', 'Test', 'slendsher48@gmail.com', '2006-03-22', '2026-02-05 15:50:29', NULL, NULL, 3, 'dzqdzqdqzdzqdqzdzqdzqdqzdqzddzqdzqdz', '6991c05b884fb.png', '$2y$12$zRjrT2Pcs1Lfn6jhd0Z6guipp3vIph5ZdgGF4dybhQp35RiTst6HO', NULL, '2026-02-15 13:47:38', '3025-02-19 00:00:00', NULL),
(23, 'SCHMITT', 'MARCO', 'Truc', 'marco06.marco06@gmail.com', '2222-02-22', '2026-02-08 15:12:38', NULL, NULL, 1, '', '698b01cf4551c.png', '$2y$10$rBwyIBmYDriRgNCVsBrqsuW2wzv1y.7az5Ps79.sGeh3oauP1SIzq', NULL, '2026-02-10 11:00:47', NULL, NULL),
(24, 'SCHMITT', 'MARCOOOOOOO', 'marcoooo', 'test@gmail.com', '2222-02-22', '2026-02-09 08:55:06', NULL, NULL, 1, '', '698b57ac34581.png', '$2y$10$QtZit0YtsMgqojOEnlsi6eQcph6yTiI.RuxXqRNI29ZlTXpMPoc6a', NULL, '2026-02-10 17:07:08', NULL, NULL),
(25, 'dqzzdq', 'dzqdzq', 'user', 'user@gmail.com', '2222-02-22', '2026-02-13 11:12:08', NULL, NULL, 1, NULL, NULL, '$2y$12$VMEuNAGgcYnmr13mM7Sy3.naxE/pgFRbal1ujYj6hsHKF.nEUAz8G', NULL, NULL, NULL, NULL),
(26, 'dzqdzq', 'dzqdqz', 'Testdzqdzq', 'zaezaedzqd@gmail.com', '2222-02-22', '2026-02-20 08:33:57', NULL, NULL, 1, NULL, NULL, '$2y$10$D0EWAzxywtwK7iv6wdBn0.Q62/fr4fUtHMhMhtZpOG30JCLPmJEU2', NULL, NULL, NULL, NULL);

--
-- Déclencheurs `users`
--
DROP TRIGGER IF EXISTS `after_insert_user`;
DELIMITER $$
CREATE TRIGGER `after_insert_user` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO history_users (hist_table, hist_event, hist_elementid, hist_date)
    VALUES('users', 'INSERT', NEW.user_id, NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `after_update_user`;
DELIMITER $$
CREATE TRIGGER `after_update_user` AFTER UPDATE ON `users` FOR EACH ROW BEGIN
	IF NEW.user_name != OLD.user_name THEN
        INSERT INTO history_users (hist_table, hist_event, hist_elementid, hist_date, hist_field, hist_oldvalue, hist_newvalue)
        VALUES('users', 'UPDATE', NEW.user_id, NOW(), 'user_name', OLD.user_name, NEW.user_name);
    END IF;
    
    IF NEW.user_firstname != OLD.user_firstname THEN
        INSERT INTO history_users (hist_table, hist_event, hist_elementid, hist_field, hist_oldvalue, hist_newvalue, hist_date)
        VALUES('users', 'UPDATE', NEW.user_id, 'user_firstname', OLD.user_firstname, NEW.user_firstname, NOW());
    END IF;

   
    IF NEW.user_pseudo != OLD.user_pseudo THEN
        INSERT INTO history_users (hist_table, hist_event, hist_elementid, hist_field, hist_oldvalue, hist_newvalue, hist_date)
        VALUES('users', 'UPDATE', NEW.user_id, 'user_pseudo', OLD.user_pseudo, NEW.user_pseudo, NOW());
    END IF;

   
    IF NEW.user_email != OLD.user_email THEN
        INSERT INTO history_users (hist_table, hist_event, hist_elementid, hist_field, hist_oldvalue, hist_newvalue, hist_date)
        VALUES('users', 'UPDATE', NEW.user_id, 'user_email', OLD.user_email, NEW.user_email, NOW());
    END IF;
    
    IF NEW.user_bio != OLD.user_bio THEN
        INSERT INTO history_users (hist_table, hist_event, hist_elementid, hist_field, hist_oldvalue, hist_newvalue, hist_date)
        VALUES('users', 'UPDATE', NEW.user_id, 'user_bio', OLD.user_bio, NEW.user_bio, NOW());
    END IF;

    IF NEW.user_pwd != OLD.user_pwd THEN
        INSERT INTO history_users (hist_table, hist_event, hist_elementid, hist_field, hist_oldvalue, hist_newvalue, hist_date)
        VALUES('users', 'UPDATE', NEW.user_id, 'user_pwd', OLD.user_pwd, NEW.user_pwd, NOW());
    END IF;
   
    IF NEW.user_funct_id != OLD.user_funct_id THEN
        INSERT INTO history_users (hist_table, hist_event, hist_elementid, hist_field, hist_oldvalue, hist_newvalue, hist_date)
        VALUES('users', 'UPDATE', NEW.user_id, 'user_funct_id', OLD.user_funct_id, NEW.user_funct_id, NOW());
    END IF;
    
    IF NEW.user_photo != OLD.user_photo THEN
        INSERT INTO history_users (hist_table, hist_event, hist_elementid, hist_field, hist_oldvalue, hist_newvalue, hist_date)
        VALUES('users', 'UPDATE', NEW.user_id, 'user_photo', OLD.user_photo, NEW.user_photo, NOW());
    END IF;

   
    IF NEW.user_birthdate != OLD.user_birthdate THEN
        INSERT INTO history_users (hist_table, hist_event, hist_elementid, hist_field, hist_oldvalue, hist_newvalue, hist_date)
        VALUES('users', 'UPDATE', NEW.user_id, 'user_birthdate', OLD.user_birthdate, NEW.user_birthdate, NOW());
    END IF;

    IF NOT (NEW.user_ban_at <=> OLD.user_ban_at) THEN
        INSERT INTO history_users (hist_table, hist_event, hist_elementid, hist_field, hist_oldvalue, hist_newvalue, hist_date)
        VALUES('users', 'UPDATE', NEW.user_id, 'user_ban_at', OLD.user_ban_at, NEW.user_ban_at, NOW());
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `before_delete_user`;
DELIMITER $$
CREATE TRIGGER `before_delete_user` BEFORE DELETE ON `users` FOR EACH ROW INSERT INTO history_users (hist_table, hist_event, hist_elementid, hist_date)
    VALUES('users', 'DELETE', OLD.user_id, NOW())
$$
DELIMITER ;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `belongs`
--
ALTER TABLE `belongs`
  ADD CONSTRAINT `fk_belong_cat_id` FOREIGN KEY (`belong_cat_id`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_belong_mov_id` FOREIGN KEY (`belong_mov_id`) REFERENCES `movies` (`mov_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_com_mod_id` FOREIGN KEY (`com_mod_id`) REFERENCES `moderations` (`mod_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_com_movie_id` FOREIGN KEY (`com_movie_id`) REFERENCES `movies` (`mov_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_com_user_id` FOREIGN KEY (`com_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `follows`
--
ALTER TABLE `follows`
  ADD CONSTRAINT `fk_follo_mov_id` FOREIGN KEY (`follo_mov_id`) REFERENCES `movies` (`mov_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_follo_user_id` FOREIGN KEY (`follo_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `moderations`
--
ALTER TABLE `moderations`
  ADD CONSTRAINT `fk_mod_user_id` FOREIGN KEY (`mod_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `fk_movies_nationality` FOREIGN KEY (`mov_nat_id`) REFERENCES `nationalities` (`nat_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `mov_mod_id` FOREIGN KEY (`mov_mod_id`) REFERENCES `moderations` (`mod_id`);

--
-- Contraintes pour la table `participates`
--
ALTER TABLE `participates`
  ADD CONSTRAINT `fk_part_job_id` FOREIGN KEY (`part_job_id`) REFERENCES `jobs` (`job_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_part_mov_id` FOREIGN KEY (`part_mov_id`) REFERENCES `movies` (`mov_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_part_pers_id` FOREIGN KEY (`part_pers_id`) REFERENCES `persons` (`pers_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `persons`
--
ALTER TABLE `persons`
  ADD CONSTRAINT `fk_pers_nat_id` FOREIGN KEY (`pers_nat_id`) REFERENCES `nationalities` (`nat_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `fk_pho_mov_id` FOREIGN KEY (`pho_mov_id`) REFERENCES `movies` (`mov_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `fk_rep_mov` FOREIGN KEY (`rep_reported_movie_id`) REFERENCES `movies` (`mov_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rep_reported_com` FOREIGN KEY (`rep_reported_com_id`) REFERENCES `comments` (`com_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rep_reported_mov` FOREIGN KEY (`rep_reported_movie_id`) REFERENCES `movies` (`mov_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rep_reported_user` FOREIGN KEY (`rep_reported_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rep_user` FOREIGN KEY (`rep_reported_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reported_mov` FOREIGN KEY (`rep_reported_movie_id`) REFERENCES `movies` (`mov_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reported_user` FOREIGN KEY (`rep_reported_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_com_id` FOREIGN KEY (`user_com_id`) REFERENCES `comments` (`com_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_funct_id` FOREIGN KEY (`user_funct_id`) REFERENCES `functions` (`funct_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_nat_id` FOREIGN KEY (`user_nat_id`) REFERENCES `nationalities` (`nat_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_users_nationalities` FOREIGN KEY (`user_nat_id`) REFERENCES `nationalities` (`nat_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_users_roles` FOREIGN KEY (`user_com_id`) REFERENCES `functions` (`funct_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
