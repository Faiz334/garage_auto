-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 20 fév. 2024 à 18:58
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
-- Base de données : `garage`
--

-- --------------------------------------------------------

--
-- Structure de la table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `marque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `brand`
--

INSERT INTO `brand` (`id`, `marque`) VALUES
(1, 'Audi'),
(2, 'Fiat'),
(3, 'Renault');

-- --------------------------------------------------------

--
-- Structure de la table `commentary`
--

CREATE TABLE `commentary` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` double NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commentary`
--

INSERT INTO `commentary` (`id`, `nom`, `description`, `note`, `created_at`) VALUES
(4, 'Jean', 'Service Ultra rapide mes deux pneus on été changer en un rien de temps', 5, '2024-02-20 18:05:00'),
(6, 'Marie', 'Personnel tres reactif.', 4, '2024-02-20 12:00:00'),
(7, 'Peter', 'Des Prix tres avantageux, je recommande vivement', 5, '2024-02-19 12:15:00');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `prenom`, `email`, `telephone`, `message`) VALUES
(1, 'test', 'test', 'tes@test.fr', '0606060606', 'test'),
(2, 'test', 'test', 'tes@test.fr', '0606060606', 'test'),
(3, '<b>test<b>', 'test', 'tes@test.fr', '0606060606', 'test'),
(4, '<b>test<b>', 'test', 'tes@test.fr', '0606060606', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240116010049', '2024-01-16 02:01:37', 496),
('DoctrineMigrations\\Version20240129213948', '2024-01-29 22:41:06', 44),
('DoctrineMigrations\\Version20240211014613', '2024-02-11 02:46:40', 45),
('DoctrineMigrations\\Version20240211134802', '2024-02-11 14:48:21', 55);

-- --------------------------------------------------------

--
-- Structure de la table `engine`
--

CREATE TABLE `engine` (
  `id` int(11) NOT NULL,
  `energie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `engine`
--

INSERT INTO `engine` (`id`, `energie`) VALUES
(1, 'Essence'),
(2, 'Electrique'),
(3, 'Diesel'),
(4, 'Hybrid');

-- --------------------------------------------------------

--
-- Structure de la table `gearbox`
--

CREATE TABLE `gearbox` (
  `id` int(11) NOT NULL,
  `boite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `gearbox`
--

INSERT INTO `gearbox` (`id`, `boite`) VALUES
(1, 'Automatique'),
(2, 'Manuelle');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `opening_time`
--

CREATE TABLE `opening_time` (
  `id` int(11) NOT NULL,
  `jour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ouverture` time NOT NULL,
  `fermeture` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `opening_time`
--

INSERT INTO `opening_time` (`id`, `jour`, `ouverture`, `fermeture`) VALUES
(1, 'Lundi', '09:00:00', '20:00:00'),
(2, 'Mardi', '09:00:00', '20:00:00'),
(3, 'Mercredi', '09:00:00', '20:00:00'),
(4, 'Jeudi', '09:00:00', '20:00:00'),
(5, 'Vendredi', '09:00:00', '18:30:00'),
(6, 'Samedi', '09:00:00', '18:30:00');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `nom`, `description`) VALUES
(1, 'Pneus', 'Reparation/ changement de pneus'),
(2, 'Vidange', 'Vidange du vehicule'),
(3, 'Climatisation', 'Clim et chauffage'),
(4, 'Carrosserie', 'Carrosserie Vehicule'),
(5, 'Batterie', 'Batterie et électronique');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(1, 'admin@admin.fr', '[\"ROLE_ADMIN\"]', '$2y$13$dZR6DfY6DG5wfZLlazep8ehjH5T0fflBz5dbeJtwDKpaGTJq.HlDe'),
(2, 'test@test.fr', '[\"ROLE_STAFF\"]', 'test'),
(6, 'test1@test2.fr', '[\"ROLE_USER\",\"ROLE_STAFF\"]', '$2y$13$0yuFM1FtoiLkrL/5VZh3x.kuoFCfUyZ7GGihgCv.cHkV5NUEqcwva'),
(7, 'test2@test.fr', '[]', '$2y$13$CSqgW6kh.aWXVxXyCX5QSOEHS48xF9F25uooJvADJALceZflhyPvC');

-- --------------------------------------------------------

--
-- Structure de la table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `marque_id` int(11) DEFAULT NULL,
  `energie_id` int(11) DEFAULT NULL,
  `boite_id` int(11) DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `kilometrage` int(11) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vehicle`
--

INSERT INTO `vehicle` (`id`, `marque_id`, `energie_id`, `boite_id`, `titre`, `description`, `prix`, `kilometrage`, `date`, `image`) VALUES
(4, 3, 3, 2, 'Clio 2', '<div>Clio 2</div>', 2000, 140000, '2002-05-20', 'renault-clio-ii-front-20090329-65cbfa1d2dd61150285173.jpg'),
(8, 2, 1, 2, 'Panda', '<div>fiat panda</div>', 7500, 95000, '2013-03-01', '2018-fiat-panda-easy-1-2-65d4db7811d08612793937.jpg'),
(9, 1, 4, 1, 'A3', '<div>Audi a3</div>', 26000, 600, '2023-12-04', '417173-l-audi-a3-se-refait-toute-une-beaute-pour-2021-65d4dc06c9ccf491384868.jpg'),
(10, 3, 1, 1, 'Megane', '<div>Megane</div>', 14000, 42000, '2017-03-12', '1200px-2017-renault-megane-dynamique-s-nav-dc-1-5-front-65d4dc5e0c5eb380089011.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentary`
--
ALTER TABLE `commentary`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `engine`
--
ALTER TABLE `engine`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `gearbox`
--
ALTER TABLE `gearbox`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `opening_time`
--
ALTER TABLE `opening_time`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- Index pour la table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1B80E4864827B9B2` (`marque_id`),
  ADD KEY `IDX_1B80E486B732A364` (`energie_id`),
  ADD KEY `IDX_1B80E4863C43472D` (`boite_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commentary`
--
ALTER TABLE `commentary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `engine`
--
ALTER TABLE `engine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `gearbox`
--
ALTER TABLE `gearbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `opening_time`
--
ALTER TABLE `opening_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `FK_1B80E4863C43472D` FOREIGN KEY (`boite_id`) REFERENCES `gearbox` (`id`),
  ADD CONSTRAINT `FK_1B80E4864827B9B2` FOREIGN KEY (`marque_id`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `FK_1B80E486B732A364` FOREIGN KEY (`energie_id`) REFERENCES `engine` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
