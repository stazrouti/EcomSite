-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 24 juin 2022 à 23:11
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecom`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(20) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`idCategorie`, `categorie`, `description`) VALUES
(1, 'Informatique', 'cette categorie a une relation avec tout ce qui a une relation avec l\'informatique'),
(2, 't-shirt', 'cette categorie a tout les t-shirt '),
(3, 'Accessoires', ''),
(4, 'Electromenager', '');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `passWord` varchar(10) NOT NULL,
  `dateNaissance` date NOT NULL,
  `pays` varchar(15) NOT NULL,
  `adresseLivraison` text NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`idClient`, `nom`, `prenom`, `email`, `passWord`, `dateNaissance`, `pays`, `adresseLivraison`) VALUES
(1, 'tazrouti', 'salah', 'salah@gmail.com', '1234', '2022-06-10', 'maroc', 'errachidia'),
(3, 'KARIMI', 'Karim', 'karimikarim@gmail.com', 'karimi', '2001-01-27', 'Maroc', 'Errachidia'),
(4, 'NABILI', 'Nabil', 'nabili@gmail.com', 'nabili', '2022-06-11', 'Maroc', 'Casa');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `dateCommande` date NOT NULL,
  `poidsComande` float NOT NULL,
  `etat` int(1) NOT NULL,
  `idClient` int(3) NOT NULL,
  PRIMARY KEY (`idCommande`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`idCommande`, `dateCommande`, `poidsComande`, `etat`, `idClient`) VALUES
(22, '2022-06-09', 5, 0, 1),
(21, '2022-06-08', 5, 0, 1),
(20, '2022-06-08', 5, 0, 1),
(19, '2022-06-08', 5, 0, 1),
(18, '2022-06-08', 5, 0, 1),
(17, '2022-06-08', 5, 0, 1),
(16, '2022-06-08', 5, 0, 1),
(15, '2022-06-08', 5, 0, 1),
(14, '2022-06-08', 5, 0, 1),
(13, '2022-06-08', 5, 0, 1),
(23, '2022-06-09', 5, 0, 1),
(24, '2022-06-09', 5, 0, 1),
(25, '2022-06-10', 5, 1, 1),
(26, '2022-06-10', 5, 3, 1),
(27, '2022-06-10', 5, 0, 1),
(28, '2022-06-11', 5, 0, 1),
(29, '2022-06-11', 5, 2, 1),
(30, '2022-06-11', 5, 0, 1),
(31, '2022-06-11', 5, 3, 1),
(32, '2022-06-16', 5, 0, 3),
(33, '2022-06-16', 5, 0, 3);

-- --------------------------------------------------------

--
-- Structure de la table `lignescommandes`
--

DROP TABLE IF EXISTS `lignescommandes`;
CREATE TABLE IF NOT EXISTS `lignescommandes` (
  `idLignes` int(11) NOT NULL AUTO_INCREMENT,
  `quantite` float NOT NULL,
  `prix` float NOT NULL,
  `idproduit` int(3) NOT NULL,
  `idCommande` int(3) NOT NULL,
  PRIMARY KEY (`idLignes`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lignescommandes`
--

INSERT INTO `lignescommandes` (`idLignes`, `quantite`, `prix`, `idproduit`, `idCommande`) VALUES
(20, 1, 650.403, 5, 30),
(19, 1, 296.01, 3, 29),
(18, 2, 1300.81, 5, 29),
(17, 1, 650.403, 5, 28),
(16, 1, 650.403, 5, 27),
(15, 1, 650.403, 5, 26),
(14, 1, 650.403, 5, 25),
(13, 7, 38220, 1, 14),
(12, 2, 5460, 1, 13),
(21, 1, 650.403, 5, 31),
(22, 1, 2625, 120, 32),
(23, 1, 194.025, 118, 32),
(24, 6, 1616.76, 121, 32),
(25, 1, 2625, 120, 33),
(26, 1, 194.025, 118, 33),
(27, 6, 1616.76, 121, 33);

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `idPhoto` int(11) NOT NULL AUTO_INCREMENT,
  `photo1` blob NOT NULL,
  `photo2` blob NOT NULL,
  `photo3` blob NOT NULL,
  `photo4` blob NOT NULL,
  `idProduit` int(3) NOT NULL,
  PRIMARY KEY (`idPhoto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  `prixProduit` varchar(7) NOT NULL,
  `photoProduit` blob NOT NULL,
  `descriptions` text NOT NULL,
  `dateMiseEnVente` date NOT NULL,
  `quantiteStock` int(10) NOT NULL,
  `promo` varchar(4) NOT NULL,
  `idCategorie` int(3) NOT NULL,
  PRIMARY KEY (`idProduit`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`idProduit`, `libelle`, `prixProduit`, `photoProduit`, `descriptions`, `dateMiseEnVente`, `quantiteStock`, `promo`, `idCategorie`) VALUES
(115, 'T-shirt', '149', 0x742d73686972742e6a7067, '', '2022-06-09', 10, '0', 2),
(116, 'Lunettes ', '299', 0x4c756e657474652e6a7067, 'Lunettes Polarized de soleil pour hommes noir haut qualité + pochette', '2022-06-09', 13, '1', 3),
(117, 'casquettes', '126.50', 0x63617371756574742e6a7067, 'Adidas Casquette Baseball Street', '2022-06-08', 5, '0', 3),
(123, 'lacost t-shirt', '199', 0x6c61636f73742e6a7067, 'BIG LOGO UNISEX - T-shirt imprimé', '2022-06-17', 13, '1.9', 2),
(124, 'T-shirt Homme ', '99', 0x742d7368697274322e6a7067, '', '2022-06-21', 13, '50', 2),
(125, 'Pc gamer', '5000', 0x706f73742e6a7067, 'Hp PC GAMER i5 4éme Génération 16GB RAM NVIDIA GT 710 2GB -3 Jeux Installé FORTNE, GTA 5, Call of Duty WINDOWS 10 remis à neuf', '2022-06-21', 3, '30', 1),
(126, 'Robot cuisine', '988', 0x726f626f742063756973696e652e6a7067, 'Homy Pétrin Semi-professionnel Happy Chef 6,5L - 1200W', '2022-06-21', 2, '5', 4),
(130, 'panini sandwich', '580', 0x70616e696e692e6a7067, 'Homy Grand panini sandwich maker Puissance Maximale Pris Pas Cher Special Maroc', '2022-06-21', 3, '50', 4),
(128, 'Robot Eco', '599', 0x726f626f742065636f2e6a7067, 'Robot Eco Mixeur Avec 33 Pieces. Bol incassable .Hacher Et Couper Rapidement', '2022-06-21', 10, '19', 4),
(113, 'Ecouteurs Sans Fil  ', '90.99', 0x616972706f64732e6a7067, 'Edifier TWS1 Pro Véritables écouteurs Sans Fil, Casque Bluetooth V5.2, Suppression Du Bruit CVC8.0, IP65 Anti-poussière Et étanche, Couplage En Une étape           ', '2022-06-15', 10, '1.9', 3),
(114, 'Ecran', '5600', 0x312e6a7067, 'Hp Compaq LE1711 - Ecran LCD 17\" - 1280 x 1024 à 60 Hz - 5ms - Remis à Neuf', '2022-06-01', 11, '2.5', 1),
(118, 'Tshirt Noir', '199', 0x322e6a7067, 't-shirt ultras ACAB Tshirt Noir', '2022-06-16', 8, '2.5', 2),
(119, 'Ecran pc', '2999', 0x332e6a7067, 'Asus 23.6 LED - VG24VQE - 1 ms - 16/9 - VA incurvée - 165 Hz - FreeSync Premium', '2022-06-16', 15, '11', 1),
(120, 'pc portable', '7500', 0x342e6a7067, 'PARTAGEZ CE PRODUIT   Hp PC Portable HP EliteBook 840 G1 Core i5 8 RAM 500GB 14\"', '2022-06-16', 88, '65', 1),
(121, 'souri', '499', 0x736f7572692e6a7067, 'Logitech G102 LIGHTSYNC Souris Gaming avec Éclairage RVB, 8 000 PPP, Ultra-Léger - Noir', '2022-06-16', 77, '46', 3),
(122, 'Seche-Cheveux', '399', 0x63657368652e6a7067, 'Taurus Sèche-Cheveux FASHION Ionique Grille Céramique, Puissant 2400w , 3 Températures, Cheveux Lisses Sans Frisottis-2ans de garantie', '2022-06-16', 9, '29', 3),
(131, 'Ciseaux de cuisine', '29', 0x436973656175782064652063756973696e652e6a7067, 'Ciseaux de cuisine polyvalents en acier inoxydable', '2022-06-21', 15, '10', 4),
(132, 'Hachoir', '349', 0x486163686f69722e6a7067, 'edyson Hachoir PRO \"Blue Diamond XL\" 500w / 6 lames / 1.5L verre épais', '2022-06-21', 3, '33', 4);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `idPrommotion` int(11) NOT NULL AUTO_INCREMENT,
  `taux` float NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `idProduit` int(3) NOT NULL,
  PRIMARY KEY (`idPrommotion`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`idPrommotion`, `taux`, `dateDebut`, `dateFin`, `idProduit`) VALUES
(1, 3, '2022-06-01', '2022-06-02', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
