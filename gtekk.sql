-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 03, 2022 at 05:43 PM
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
-- Database: `gtekk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `mdp`) VALUES
(1, 'ahmedkanoun@gmail.com', '12345');

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
  `etat` enum('en cours de traitement','envoyé','livré','annulé') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_client`, `montant`, `date_enregistrement`, `etat`) VALUES
(18, 4, '699', '2022-05-02 14:58:15', 'livré'),
(19, 4, '7396', '2022-05-03 17:40:27', 'livré');

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
(19, 18, 3, 1, '699', '699'),
(20, 19, 2, 2, '2999', '5998'),
(21, 19, 3, 2, '699', '1398');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_produit` int(11) NOT NULL,
  `reference` varchar(50) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `lib` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `prix` double NOT NULL,
  `promoprix` double NOT NULL DEFAULT 0,
  `stock` int(11) NOT NULL,
  `id_marque` int(11) NOT NULL,
  `home` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_produit`, `reference`, `id_categorie`, `lib`, `description`, `photo`, `prix`, `promoprix`, `stock`, `id_marque`, `home`) VALUES
(1, '654', 7, 'PC PORTABLE GAMER ASUS TUF506IHR-HN045W ', 'Processeur AMD Ryzen R5-4600H Hexa-Core(3.00GHz up to 4.00GHz,11MB Cache),Mémoire RAM 8Go DDR4,Disque dur 512GO M.2 NVMe™ PCIe® SSD,Carte graphique NVIDIA® GeForce®  GTX1650 4Go GDDR6,1x prise audio combinée 3,5 mm, 1x HDMI,3x USB 3.2 Gen 1 Type-A, 1x USB 3.2 Gen 2 Type-C, Clavier RGB ILLUMINATED CHICLET,Ecran 15.6\" FULL HD 144hz', 'https://www.scoopgaming.com.tn/14759-thickbox_default/pc-portable-gamer-asus-tuf506ihr-hn045w-ryzen-5-4600hgtx1650-ecran-156-144hz-24g.jpg', 2629, 2500, 10, 1, 1),
(2, '789258', 7, 'Pc sur Mesure ALPHA-OSCAR I', 'rocesseur intel I3-10100F Quad-core(3.60GHz up to 4.30GHz, 6MB total cache), carte mère MSI H510M A-PRO, mémoire GOODRAM 8GB 3200MHZ, Carte graphique  GeForce MSI GTX1050TI 4GT OC GDDR5,Disque GOODRAM PX500 256GB SSD PCIe , Alimentation NJOY TITAN+ 500W 80+ BRONZE, Boitier SOG DEATHMATCH3 RGB', 'https://www.scoopgaming.com.tn/15113-thickbox_default/pc-sur-mesure-alpha-oscar-i-i3-10eme-8go-gtx-1050-ti.jpg', 2300, 2999, 0, 2, 1),
(3, '789', 7, 'Ecran Gamer MSI Optix', 'Ecran msi <b>Gaming</b> <i>Optix</i> G24C4 24', 'https://www.scoopgaming.com.tn/12133-thickbox_default/ecran-gamer-msi-optix-g24c4-24-fhd-1ms-144hz.jpg', 800, 699, 333, 2, 1),
(4, '6542', 7, 'Ecran Gaming ASUS TUF VG2', 'Moniteur de 27 pouces avec résolution Full HD (1920 x 1080),Dalle IPS : couleurs de qualité supérieure et larges angles de vision,Technologie AMD FreeSync Premium,Taux de rafraîchissement maximal de 144 Hz,Technologie ELMB,Temps de réponse de 1 ms (MPRT),Connecteurs : HDMI x 2, DisplayPort x 1', 'https://www.scoopgaming.com.tn/14681-thickbox_default/ecran-gaming-asus-tuf-vg279q1r-27-full-hd-144hz.jpg', 900, 799, 20, 9, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_produit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `details_commande`
--
ALTER TABLE `details_commande`
  MODIFY `id_dc` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `marque`
--
ALTER TABLE `marque`
  MODIFY `id_marque` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  ADD CONSTRAINT `details_commande_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `products` (`id_produit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
