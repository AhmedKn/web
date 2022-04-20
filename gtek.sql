-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2022 at 07:35 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gtek`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(3) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `home` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `libelle`, `home`) VALUES
(6, 'Ordinateur Portable', 1),
(7, 'Ordinateur de Bureau', 1),
(8, 'Casque', 1),
(9, 'Souris', 0);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int(3) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `code_postal` int(4) UNSIGNED ZEROFILL NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `email`, `mdp`, `ville`, `code_postal`, `adresse`, `telephone`) VALUES
(3, 'Bouslimi', 'Amal', 'amalbouslimi@gmail.com', 'admin', 'ariana', 2080, 'borj baccouch', '29477365'),
(4, 'Kanoun', 'Ahmed', 'ahmedkn@yahoo.fr', '12345', 'tunis', 2044, 'bardo', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(3) NOT NULL,
  `id_client` int(3) DEFAULT NULL,
  `montant` decimal(10,0) NOT NULL,
  `date_enregistrement` datetime NOT NULL,
  `etat` enum('en cours de traitement','envoyé','livré') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_client`, `montant`, `date_enregistrement`, `etat`) VALUES
(3, 3, '2629', '2022-04-01 01:43:18', 'en cours de traitement'),
(4, 4, '25', '2022-04-03 01:43:18', 'livré');

-- --------------------------------------------------------

--
-- Table structure for table `details_commande`
--

CREATE TABLE `details_commande` (
  `id_dc` int(3) NOT NULL,
  `id_commande` int(3) DEFAULT NULL,
  `id_produit` int(3) DEFAULT NULL,
  `quantite` int(3) NOT NULL,
  `prix_unitaire` decimal(10,0) NOT NULL,
  `prix_tot` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details_commande`
--

INSERT INTO `details_commande` (`id_dc`, `id_commande`, `id_produit`, `quantite`, `prix_unitaire`, `prix_tot`) VALUES
(2, 3, 3, 1, '2629', '2629'),
(3, 4, 4, 3, '25', '75');

-- --------------------------------------------------------

--
-- Table structure for table `marque`
--

CREATE TABLE `marque` (
  `id_marque` int(3) NOT NULL,
  `brand` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marque`
--

INSERT INTO `marque` (`id_marque`, `brand`) VALUES
(1, 'asus'),
(2, 'claymore');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id_photo` int(3) NOT NULL,
  `path` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id_photo`, `path`) VALUES
(1, 'C:\\Users\\user\\Desktop\\web projet\\images\\produit3\r\n'),
(3, 'C:\\Users\\user\\Desktop\\web projet\\images\\produit2');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(3) NOT NULL,
  `reference` varchar(20) NOT NULL,
  `id_categorie` int(3) NOT NULL,
  `lib` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `couleur` varchar(20) NOT NULL,
  `id_photo` int(3) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `stock` int(3) NOT NULL,
  `homepage` tinyint(1) NOT NULL,
  `id_marque` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id_produit`, `reference`, `id_categorie`, `lib`, `description`, `couleur`, `id_photo`, `prix`, `stock`, `homepage`, `id_marque`) VALUES
(3, '90NR07G7-M002Y0', 6, 'PC PORTABLE GAMER ASUS TUF506IHR-HN045W ,RYZEN 5-4600H,8GO, GTX1650, ÉCRAN 15.6\" 144HZ', 'Processeur AMD Ryzen R5-4600H Hexa-Core(3.00GHz up to 4.00GHz,11MB Cache),Mémoire RAM 8Go DDR4,Disque dur 512GO M.2 NVMe™ PCIe® SSD,Carte graphique NVIDIA® GeForce®  GTX1650 4Go GDDR6,1x prise audio combinée 3,5 mm, 1x HDMI,3x USB 3.2 Gen 1 Type-A, 1x USB 3.2 Gen 2 Type-C, Clavier RGB ILLUMINATED CHICLET,Ecran 15.6\" FULL HD 144hz\r\n', 'GRAPHITE BLACK', 1, '2629', 10, 1, 1),
(4, '78301113146', 9, 'Souris-usg-gaming-claymore', 'SOURIS USG CLAYMORE 7 couleurs de rétroéclairage (rouge, blanc, vert, bleu, rose, bleu claire, jaune), 4 niveaux de DPI de 800 à 3200, Câble de 1,5 M, Plug & play, Compatible Windows 7/8/10/XP/Vista', 'black&orange', 3, '25', 100, 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_cl` (`id_client`);

--
-- Indexes for table `details_commande`
--
ALTER TABLE `details_commande`
  ADD PRIMARY KEY (`id_dc`),
  ADD KEY `id_commande` (`id_commande`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Indexes for table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`id_marque`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id_photo`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD UNIQUE KEY `reference` (`reference`),
  ADD KEY `id_c` (`id_categorie`),
  ADD KEY `id_marque` (`id_marque`),
  ADD KEY `id_photo` (`id_photo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `details_commande`
--
ALTER TABLE `details_commande`
  MODIFY `id_dc` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marque`
--
ALTER TABLE `marque`
  MODIFY `id_marque` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id_photo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Constraints for table `details_commande`
--
ALTER TABLE `details_commande`
  ADD CONSTRAINT `details_commande_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`),
  ADD CONSTRAINT `details_commande_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`);

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`),
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`id_marque`) REFERENCES `marque` (`id_marque`),
  ADD CONSTRAINT `produit_ibfk_3` FOREIGN KEY (`id_photo`) REFERENCES `photo` (`id_photo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
