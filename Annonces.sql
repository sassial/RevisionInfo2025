-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 05, 2025 at 06:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Annonces`
--

-- --------------------------------------------------------

--
-- Table structure for table `annonce`
--

CREATE TABLE `annonce` (
  `id` int(11) NOT NULL,
  `titre` text NOT NULL,
  `texte` text NOT NULL,
  `date` date NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `annonce`
--

INSERT INTO `annonce` (`id`, `titre`, `texte`, `date`, `idUtilisateur`) VALUES
(1, 'Winter is Coming', 'Cherche vêtement chaud en poils de loups pour hiver long froid à venir', '1996-08-01', 5),
(2, 'Camping car', 'A vendre : camping car pouvant faire office de maison, très bon état, quelques traces liées à des expériences de chimie.', '2008-01-20', 6),
(3, 'Deux Roues', 'Recherche désespérément moto volée à proximité d\'Alexandria', '2016-10-23', 7),
(4, 'Guillaume Tell', 'Recherche arbalète perdue aux abords d\'Alexandria.', '2016-12-11', 7),
(5, 'Lucille', 'A vendre : batte de baseball très usée mais toujours utilisable.', '2016-10-23', 8);

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `description`) VALUES
(1, 'Immobilier', 'Maisons et appartements à louer ou acheter'),
(2, 'Véhicules', 'Voitures, camions, vélos, ...'),
(3, 'Animaux', 'Des chats, des chiens, voire plus exotiques'),
(4, 'Sport', 'Tous les sports, pour tous les âges'),
(5, 'Mode', 'Il en faut pour tous les goûts');

-- --------------------------------------------------------

--
-- Table structure for table `classement`
--

CREATE TABLE `classement` (
  `id` int(11) NOT NULL,
  `idAnnonce` int(11) NOT NULL,
  `idCategorie` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classement`
--

INSERT INTO `classement` (`id`, `idAnnonce`, `idCategorie`) VALUES
(1, 1, 3),
(2, 1, 5),
(3, 2, 1),
(4, 2, 2),
(5, 3, 2),
(6, 4, 4),
(7, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) DEFAULT NULL,
  `prenom` varchar(80) DEFAULT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `login`, `password`) VALUES
(6, 'Dupond', 'Richard', 'WalterWhite', 'dd1a432d5aff5b1c4a8d45207d49e9fcfccff8c5'),
(5, 'White', 'John', 'JohnSnow', 'a24836c226a625a4f2f7bbfeaeb283e4f227095e'),
(7, 'Smith', 'Georges', 'DarylDixon', '4207665616570d86a8e50eb374dec4086747cc98'),
(8, 'Martin', 'Lilas', 'Negan', '21ee35473f990e54c12651ff06eedb6906ed6ae5'),

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classement`
--
ALTER TABLE `classement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `classement`
--
ALTER TABLE `classement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*
Question 1
SELECT annonce.*, utilisateur.nom FROM annonce
INNER JOIN utilisateur ON utilisateur.id = annonce.idUtilisateur
WHERE utilisateur.nom = 'Dupond';

Question 2
SELECT annonce.*, categorie.nom FROM annonce
INNER JOIN classement ON classement.idAnnonce = annonce.id
INNER JOIN categorie ON categorie.id = classement.idCategorie
WHERE categorie.nom = 'Vehicules'
ORDER BY annonce.date DESC;

Question 3
SELECT COUNT(*) FROM annonce
INNER JOIN classement ON classement.idAnnonce = annonce.id
INNER JOIN categorie ON categorie.id = classement.idCategorie
WHERE categorie.nom = 'Sport';

Question 4
SELECT annonce.*, categorie.nom FROM annonce
INNER JOIN classement ON classement.idAnnonce = annonce.id
INNER JOIN categorie ON categorie.id = classement.idCategorie
WHERE categorie.nom = 'Mode' OR categorie.nom = 'Animaux';
*/