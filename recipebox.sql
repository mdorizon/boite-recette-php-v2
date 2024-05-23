-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : jeu. 23 mai 2024 à 11:17
-- Version du serveur : 8.0.37
-- Version de PHP : 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `recipebox`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `comment` varchar(255) NOT NULL,
  `recette_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

CREATE TABLE `recettes` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `ingredients` varchar(255) NOT NULL,
  `steps` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `is_public` tinyint(1) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`id`, `name`, `ingredients`, `steps`, `img`, `is_public`, `user_id`) VALUES
(1, 'recette 1 thomas', '1 ingrédient;\r\n2 ingrédient', 'étape 1;\r\nétape 2;\r\nétape 3', 'https://img.freepik.com/free-photo/top-view-pie-apples-arrangement_23-2149707952.jpg?t=st=1715007684~exp=1715011284~hmac=9b084afc1b7ed7dc9e2070aae1dd968278606318dbf251186f3c9032c9f70e33&w=1060', 1, 1),
(2, 'une recette', 'ingre', 'step\r\n', 'https://img.freepik.com/premium-photo/plate-food-with-mushrooms-mushrooms-onions_605423-31790.jpg?w=1060', 1, 1),
(3, 'recette 1 thomas', '1 ingrédient;\r\n2 ingrédient', 'étape 1;\r\nétape 2;\r\nétape 3', 'https://img.freepik.com/free-photo/acai-smoothie-coconut-shell_53876-124340.jpg?t=st=1715007542~exp=1715011142~hmac=50d559364cbac4e28248008fae8ae37efaf2b57230d6462a2dcc3e1382218124&w=1800', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`) VALUES
(1, 'thomas'),
(2, 'admin'),
(3, 'a');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recette_id` (`recette_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_recettes` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `recettes`
--
ALTER TABLE `recettes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `recette_id` FOREIGN KEY (`recette_id`) REFERENCES `recettes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD CONSTRAINT `user_recettes` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
