-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 16 jan. 2026 à 14:58
-- Version du serveur : 8.0.44
-- Version de PHP : 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `GiveMeFive`
--

-- --------------------------------------------------------

--
-- Structure de la table `belongs`
--

CREATE TABLE `belongs` (
  `belong_cat_id` int UNSIGNED NOT NULL,
  `belong_mov_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `belongs`
--

INSERT INTO `belongs` (`belong_cat_id`, `belong_mov_id`) VALUES
(1, 11),
(2, 12),
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

CREATE TABLE `categories` (
  `cat_id` int UNSIGNED NOT NULL COMMENT 'Categories ID',
  `cat_name` varchar(50) NOT NULL COMMENT 'Categories name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

CREATE TABLE `comments` (
  `com_id` int UNSIGNED NOT NULL COMMENT 'Comment ID',
  `com_comment` text NOT NULL COMMENT 'Comment content',
  `com_score` enum('1','2','3','4','5') NOT NULL COMMENT 'Score out of 5',
  `com_datetime` datetime NOT NULL COMMENT 'Comment date time',
  `com_photo` varchar(255) NOT NULL COMMENT 'Comment photo',
  `com_user_id` int UNSIGNED DEFAULT NULL,
  `com_movie_id` int UNSIGNED DEFAULT NULL,
  `com_mod_id` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`com_id`, `com_comment`, `com_score`, `com_datetime`, `com_photo`, `com_user_id`, `com_movie_id`, `com_mod_id`) VALUES
(1, 'Un chef-d\'œuvre absolu. La fin reste un mystère total.', '5', '2024-01-15 14:30:00', 'space_fan.jpg', 1, 11, NULL),
(2, 'Visuellement époustouflant, mais le rythme est lent.', '3', '2024-02-02 20:15:00', 'slow_movie.png', 6, 11, 1),
(3, 'HAL 9000 est le meilleur personnage du film.', '5', '2024-12-01 10:00:00', 'hal_eye.jpg', 3, 11, NULL),
(4, 'Jack Nicholson est terrifiant dans ce rôle !', '5', '2024-03-10 22:00:00', 'jack_fan.jpg', 8, 12, NULL),
(5, 'Je préfère le livre de Stephen King, désolé.', '4', '2024-01-20 18:45:00', 'book_lover.jpg', 2, 12, NULL),
(6, 'La scène de la salle de bain me hante encore.', '5', '2024-11-20 23:00:00', 'scared.png', 7, 12, NULL),
(7, 'Un film qui questionne la morale avec violence.', '5', '2024-04-05 16:20:00', 'alex_droog.jpg', 3, 13, NULL),
(8, 'Difficile à regarder, trop de violence gratuite.', '2', '2024-05-12 11:10:00', 'sensitive.png', 7, 13, NULL),
(9, 'La musique de Beethoven n\'a jamais été aussi effrayante.', '4', '2024-10-15 14:00:00', 'ludwig_van.jpg', 2, 13, NULL),
(10, 'La première partie est un chef-d\'œuvre de tension.', '5', '2024-06-25 19:30:00', 'sgt_hartman.jpg', 9, 14, NULL),
(11, 'Moins fan de la partie au Vietnam.', '4', '2024-07-04 15:00:00', 'war_movie.jpg', 4, 14, NULL),
(12, 'Ce film est nul, je déteste tout !', '1', '2024-09-01 10:30:00', 'hater.png', 5, 14, 2),
(13, 'Une atmosphère onirique et envoûtante.', '5', '2024-08-14 23:45:00', 'dream_mask.jpg', 10, 15, NULL),
(14, 'Je n\'ai pas tout compris, c\'est bizarre.', '2', '2024-09-01 10:30:00', 'confused.png', 5, 15, 3),
(15, 'Le dernier film de Kubrick est son plus mystérieux.', '4', '2024-08-05 18:45:00', 'mystery.png', 1, 15, NULL),
(16, 'Le puzzle cinématographique ultime. Lynch est un génie.', '5', '2024-10-12 21:00:00', 'silencio.jpg', 1, 16, NULL),
(17, 'Je suis complètement perdu. Qui est qui ?', '3', '2024-11-05 14:20:00', 'lost_viewer.jpg', 6, 16, NULL),
(18, 'Naomi Watts est incroyable dans ce film.', '5', '2024-07-30 21:15:00', 'naomi_fan.jpg', 9, 16, NULL),
(19, 'Dennis Hopper est absolument effrayant.', '5', '2024-02-28 20:10:00', 'frank_booth.png', 2, 17, NULL),
(20, 'L\'ambiance est malsaine au possible.', '4', '2024-03-15 09:55:00', 'blue_rose.jpg', 8, 17, NULL),
(21, 'Une vision cauchemardesque de l\'Amérique.', '4', '2024-06-12 11:20:00', 'suburbia.jpg', 5, 17, NULL),
(22, 'L\'expérience la plus sonore et visuelle de ma vie.', '5', '2024-04-01 02:00:00', 'factory.jpg', 3, 18, NULL),
(23, 'Trop bizarre pour moi, j\'ai arrêté.', '1', '2024-04-10 16:40:00', 'mainstream.jpg', 9, 18, NULL),
(24, 'Ce bébé mutant va me donner des cauchemars.', '2', '2024-05-01 03:00:00', 'baby_monster.png', 8, 18, NULL),
(25, 'Le film le plus humain et touchant de Lynch.', '5', '2024-12-20 20:30:00', 'tears.jpg', 7, 19, NULL),
(26, 'Photographie en noir et blanc sublime.', '5', '2024-01-05 17:15:00', 'bw_photo.png', 4, 19, NULL),
(27, 'Je ne suis pas un animal, je suis un être humain !', '5', '2024-04-14 20:00:00', 'john_merrick.jpg', 10, 19, NULL),
(28, 'La BO avec Rammstein et Bowie est folle.', '4', '2024-06-18 22:15:00', 'rock_sound.jpg', 5, 20, NULL),
(29, 'L\'homme mystérieux me donne des frissons.', '5', '2024-07-22 13:50:00', 'mystery_man.jpg', 10, 20, NULL),
(30, 'Une boucle temporelle fascinante à analyser.', '4', '2024-03-22 16:50:00', 'road_movie.jpg', 4, 20, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `follows`
--

CREATE TABLE `follows` (
  `follo_user_id` int UNSIGNED NOT NULL,
  `follo_mov_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `follows`
--

INSERT INTO `follows` (`follo_user_id`, `follo_mov_id`) VALUES
(1, 11),
(6, 11),
(2, 12),
(6, 12),
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
(10, 20);

-- --------------------------------------------------------

--
-- Structure de la table `functions`
--

CREATE TABLE `functions` (
  `funct_id` int UNSIGNED NOT NULL COMMENT 'Function ID',
  `funct_name` enum('User','Moderator','Administrator') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `functions`
--

INSERT INTO `functions` (`funct_id`, `funct_name`) VALUES
(1, 'User'),
(2, 'Moderator'),
(3, 'Administrator');

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int UNSIGNED NOT NULL COMMENT 'Jobs ID',
  `job_name` enum('Realisator','Productor','Actor') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

CREATE TABLE `liked` (
  `lik_user_id` int UNSIGNED NOT NULL,
  `lik_com_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `liked`
--

INSERT INTO `liked` (`lik_user_id`, `lik_com_id`) VALUES
(3, 1),
(6, 2),
(5, 3),
(1, 4),
(7, 5),
(5, 6),
(2, 7),
(9, 8),
(5, 9),
(3, 10),
(6, 11),
(7, 12),
(4, 13),
(7, 14),
(9, 15),
(1, 16),
(8, 17),
(10, 18),
(2, 19),
(8, 20),
(9, 21),
(3, 22),
(8, 23),
(10, 24),
(1, 25),
(4, 26),
(10, 27),
(2, 28),
(4, 29),
(6, 30);

-- --------------------------------------------------------

--
-- Structure de la table `moderations`
--

CREATE TABLE `moderations` (
  `mod_id` int UNSIGNED NOT NULL COMMENT 'Moderation ID',
  `mod_answer` tinyint(1) NOT NULL COMMENT 'Moderation answer',
  `mod_msg_refusal` text NOT NULL COMMENT 'Argument for refusal',
  `mod_datetime` datetime NOT NULL COMMENT 'Person birth date',
  `mod_user_id` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

CREATE TABLE `movies` (
  `mov_id` int UNSIGNED NOT NULL COMMENT 'Movie Id',
  `mov_title` varchar(100) DEFAULT NULL COMMENT 'Title of the movie',
  `mov_original_title` varchar(100) NOT NULL COMMENT 'Original title of the movie',
  `mov_length` time NOT NULL COMMENT 'Movie length',
  `mov_description` text NOT NULL COMMENT 'Description',
  `mov_release_date` date NOT NULL COMMENT 'Release date',
  `mov_mod_id` int UNSIGNED DEFAULT NULL,
  `mov_nat_id` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `movies`
--

INSERT INTO `movies` (`mov_id`, `mov_title`, `mov_original_title`, `mov_length`, `mov_description`, `mov_release_date`, `mov_mod_id`, `mov_nat_id`) VALUES
(11, '2001 : L\'Odyssée de l\'espace', '2001: A Space Odyssey', '02:29:00', 'Une mystérieuse structure noire connecte le passé et le futur de l\'humanité.', '1968-04-03', NULL, 3),
(12, 'Shining', 'The Shining', '02:26:00', 'Un écrivain sombre dans la folie alors qu\'il garde un hôtel isolé en hiver avec sa famille.', '1980-05-23', NULL, 2),
(13, 'Orange Mécanique', 'A Clockwork Orange', '02:16:00', 'Dans un futur dystopique, un chef de gang sadique est soumis à une expérience de réhabilitation.', '1971-12-19', NULL, 3),
(14, 'Full Metal Jacket', 'Full Metal Jacket', '01:56:00', 'Le parcours de jeunes marines américains, de l\'entraînement brutal à la guerre du Vietnam.', '1987-06-26', NULL, 2),
(15, 'Eyes Wide Shut', 'Eyes Wide Shut', '02:39:00', 'Un médecin new-yorkais s\'aventure dans une odyssée nocturne étrange et érotique.', '1999-07-16', NULL, 2),
(16, 'Mulholland Drive', 'Mulholland Dr.', '02:27:00', 'Une femme amnésique et une aspirante actrice enquêtent dans un Los Angeles onirique.', '2001-10-12', NULL, 2),
(17, 'Blue Velvet', 'Blue Velvet', '02:00:00', 'La découverte d\'une oreille humaine coupée mène un jeune homme dans un monde souterrain sombre.', '1986-09-19', NULL, 2),
(18, 'Eraserhead', 'Eraserhead', '01:29:00', 'Henry Spencer tente de survivre dans son environnement industriel avec sa petite amie et leur enfant mutant.', '1977-03-19', NULL, 2),
(19, 'Elephant Man', 'The Elephant Man', '02:04:00', 'Un chirurgien victorien sauve un homme gravement défiguré, exploité comme un monstre de foire.', '1980-10-03', NULL, 2),
(20, 'Lost Highway', 'Lost Highway', '02:14:00', 'Après une rencontre bizarroïde lors d\'une fête, un saxophoniste est accusé du meurtre de sa femme.', '1997-02-21', NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `nationalities`
--

CREATE TABLE `nationalities` (
  `nat_id` int UNSIGNED NOT NULL COMMENT 'Nationalities ID',
  `nat_country` varchar(50) NOT NULL COMMENT 'Country name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

CREATE TABLE `participates` (
  `part_pers_id` int UNSIGNED NOT NULL,
  `part_job_id` int UNSIGNED NOT NULL,
  `part_mov_id` int UNSIGNED NOT NULL,
  `part_character_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `participates`
--

INSERT INTO `participates` (`part_pers_id`, `part_job_id`, `part_mov_id`, `part_character_name`) VALUES
(1, 1, 11, NULL),
(1, 2, 12, NULL),
(2, 1, 16, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `persons`
--

CREATE TABLE `persons` (
  `pers_id` int UNSIGNED NOT NULL COMMENT 'Person ID',
  `pers_name` varchar(50) NOT NULL COMMENT 'Person name',
  `pers_firstname` varchar(50) NOT NULL COMMENT 'Person firstname',
  `pers_birthdate` date NOT NULL COMMENT 'Person birth date',
  `pers_deathdate` date DEFAULT NULL COMMENT 'person death date',
  `pers_nat_id` int UNSIGNED DEFAULT NULL,
  `pers_bio` varchar(255) DEFAULT NULL COMMENT 'Person biography',
  `pers_photo` varchar(255) DEFAULT NULL COMMENT 'Person photo URL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `persons`
--

INSERT INTO `persons` (`pers_id`, `pers_name`, `pers_firstname`, `pers_birthdate`, `pers_deathdate`, `pers_nat_id`, `pers_bio`, `pers_photo`) VALUES
(1, 'Kubrick', 'Stanley', '1928-07-26', '1999-03-07', NULL, NULL, NULL),
(2, 'Lynch', 'David', '1946-01-20', NULL, NULL, NULL, NULL),
(3, 'Clarke', 'Arthur C.', '1917-12-16', '2008-03-19', NULL, NULL, NULL),
(4, 'Nicholson', 'Jack', '1937-04-22', NULL, NULL, NULL, NULL),
(5, 'McDowell', 'Malcolm', '1943-06-13', NULL, NULL, NULL, NULL),
(6, 'Ermey', 'R. Lee', '1944-03-24', '2018-04-15', NULL, NULL, NULL),
(7, 'Kidman', 'Nicole', '1967-06-20', NULL, NULL, NULL, NULL),
(8, 'Nance', 'Jack', '1943-12-21', '1996-12-30', NULL, NULL, NULL),
(9, 'Hurt', 'John', '1940-01-22', '2017-01-25', NULL, NULL, NULL),
(10, 'MacLachlan', 'Kyle', '1959-02-22', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `pho_id` int UNSIGNED NOT NULL COMMENT 'Photo ID',
  `pho_url` varchar(255) NOT NULL COMMENT 'Photo URL',
  `pho_type` varchar(150) NOT NULL COMMENT 'Type of file',
  `pho_mov_id` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `photos`
--

INSERT INTO `photos` (`pho_id`, `pho_url`, `pho_type`, `pho_mov_id`) VALUES
(1, 'https://upload.wikimedia.org/wikipedia/en/a/a7/2001_A_Space_Odyssey_%281968%29_theatrical_poster_variant.jpg', 'Affiche', 11),
(2, 'https://upload.wikimedia.org/wikipedia/en/1/18/The_Shining_1980.jpg', 'Affiche', 12),
(3, 'https://upload.wikimedia.org/wikipedia/en/4/48/Clockwork_orange.jpg', 'Affiche', 13),
(4, 'https://upload.wikimedia.org/wikipedia/en/9/99/Full_Metal_Jacket_poster.jpg', 'Affiche', 14),
(5, 'https://upload.wikimedia.org/wikipedia/en/8/87/Eyes_Wide_Shut_poster.jpg', 'Affiche', 15),
(6, 'https://upload.wikimedia.org/wikipedia/en/0/0f/Mulholland_Drive_%28movie_poster%29.jpg', 'Affiche', 16),
(7, 'https://upload.wikimedia.org/wikipedia/en/3/37/Blue_velvet_ver1.jpg', 'Affiche', 17),
(8, 'https://upload.wikimedia.org/wikipedia/en/9/90/Eraserhead_poster.jpg', 'Affiche', 18),
(9, 'https://upload.wikimedia.org/wikipedia/en/e/ec/The_Elephant_Man_poster.jpg', 'Affiche', 19),
(10, 'https://upload.wikimedia.org/wikipedia/en/4/41/Lost_Highway_poster.jpg', 'Affiche', 20);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int UNSIGNED NOT NULL COMMENT 'User ID',
  `user_name` varchar(50) NOT NULL COMMENT 'User name',
  `user_firstname` varchar(50) NOT NULL COMMENT 'User first name',
  `user_pseudo` varchar(50) NOT NULL COMMENT 'User pseudo',
  `user_email` varchar(255) NOT NULL COMMENT 'User email',
  `user_birthdate` date NOT NULL COMMENT 'User Birthdate',
  `user_creadate` datetime NOT NULL COMMENT 'User accounts creation date',
  `user_com_id` int UNSIGNED DEFAULT NULL,
  `user_nat_id` int UNSIGNED DEFAULT NULL,
  `user_funct_id` int UNSIGNED DEFAULT NULL,
  `user_bio` varchar(255) DEFAULT NULL COMMENT 'User biography',
  `user_photo` varchar(255) DEFAULT NULL COMMENT 'User profile photo URL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_firstname`, `user_pseudo`, `user_email`, `user_birthdate`, `user_creadate`, `user_com_id`, `user_nat_id`, `user_funct_id`, `user_bio`, `user_photo`) VALUES
(1, 'Dubois', 'Thomas', 'tom_dubois', 'thomas.dubois@exemple.com', '1990-05-15', '2024-01-10 09:00:00', NULL, NULL, 3, NULL, NULL),
(2, 'Leroy', 'Marie', 'mary_l', 'marie.leroy@exemple.com', '1985-11-20', '2024-01-12 10:30:00', NULL, NULL, 2, NULL, NULL),
(3, 'Martin', 'Lucas', 'luke_sky', 'lucas.martin@exemple.com', '1998-03-08', '2024-01-15 14:15:00', NULL, NULL, 2, NULL, NULL),
(4, 'Bernard', 'Sophie', 'sophie_b', 'sophie.bernard@exemple.com', '1992-07-22', '2024-02-01 11:00:00', NULL, NULL, 2, NULL, NULL),
(5, 'Petit', 'Kevin', 'keke_99', 'kevin.petit@exemple.com', '1999-12-01', '2024-02-10 16:45:00', NULL, NULL, 2, NULL, NULL),
(6, 'Robert', 'Camille', 'cam_rob', 'camille.robert@exemple.com', '1995-09-14', '2024-02-20 08:20:00', NULL, NULL, 1, NULL, NULL),
(7, 'Richard', 'Antoine', 'tony_ric', 'antoine.richard@exemple.com', '1988-02-28', '2024-03-05 13:10:00', NULL, NULL, 1, NULL, NULL),
(8, 'Durand', 'Léa', 'lele_d', 'lea.durand@exemple.com', '2001-06-30', '2024-03-12 18:00:00', NULL, NULL, 1, NULL, NULL),
(9, 'Moreau', 'Nathan', 'nate_m', 'nathan.moreau@exemple.com', '1993-04-10', '2024-03-25 09:45:00', NULL, NULL, 1, NULL, NULL),
(10, 'Simon', 'Sarah', 's_simon', 'sarah.simon@exemple.com', '1982-08-05', '2024-04-01 12:00:00', NULL, NULL, 1, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `belongs`
--
ALTER TABLE `belongs`
  ADD PRIMARY KEY (`belong_cat_id`,`belong_mov_id`),
  ADD KEY `fk_belong_mov_id` (`belong_mov_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `fk_com_user_id` (`com_user_id`),
  ADD KEY `fk_com_movie_id` (`com_movie_id`),
  ADD KEY `fk_com_mod_id` (`com_mod_id`);

--
-- Index pour la table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`follo_user_id`,`follo_mov_id`),
  ADD KEY `fk_follo_mov_id` (`follo_mov_id`);

--
-- Index pour la table `functions`
--
ALTER TABLE `functions`
  ADD PRIMARY KEY (`funct_id`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Index pour la table `liked`
--
ALTER TABLE `liked`
  ADD PRIMARY KEY (`lik_user_id`,`lik_com_id`),
  ADD KEY `fk_lik_com_id` (`lik_com_id`);

--
-- Index pour la table `moderations`
--
ALTER TABLE `moderations`
  ADD PRIMARY KEY (`mod_id`),
  ADD KEY `fk_mod_user_id` (`mod_user_id`);

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`mov_id`),
  ADD KEY `mov_mod_id` (`mov_mod_id`),
  ADD KEY `fk_movies_nationality` (`mov_nat_id`);

--
-- Index pour la table `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`nat_id`);

--
-- Index pour la table `participates`
--
ALTER TABLE `participates`
  ADD PRIMARY KEY (`part_pers_id`,`part_job_id`,`part_mov_id`),
  ADD KEY `fk_part_job_id` (`part_job_id`),
  ADD KEY `fk_part_mov_id` (`part_mov_id`);

--
-- Index pour la table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`pers_id`),
  ADD KEY `fk_pers_nat_id` (`pers_nat_id`);

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`pho_id`),
  ADD KEY `fk_pho_mov_id` (`pho_mov_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_user_funct_id` (`user_funct_id`),
  ADD KEY `fk_users_nationalities` (`user_nat_id`),
  ADD KEY `fk_users_roles` (`user_com_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Categories ID', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Comment ID', AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `functions`
--
ALTER TABLE `functions`
  MODIFY `funct_id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Function ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Jobs ID', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `moderations`
--
ALTER TABLE `moderations`
  MODIFY `mod_id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Moderation ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `mov_id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Movie Id', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `nat_id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Nationalities ID', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `persons`
--
ALTER TABLE `persons`
  MODIFY `pers_id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Person ID', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `photos`
--
ALTER TABLE `photos`
  MODIFY `pho_id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Photo ID', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'User ID', AUTO_INCREMENT=11;

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
-- Contraintes pour la table `liked`
--
ALTER TABLE `liked`
  ADD CONSTRAINT `fk_lik_com_id` FOREIGN KEY (`lik_com_id`) REFERENCES `comments` (`com_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_lik_user_id` FOREIGN KEY (`lik_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

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
