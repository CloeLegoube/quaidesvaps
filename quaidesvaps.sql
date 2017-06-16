-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2015 at 10:00 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quaidesvaps`
--

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

CREATE TABLE IF NOT EXISTS `avis` (
  `id_avis` int(5) NOT NULL AUTO_INCREMENT,
  `id_membre` int(5) DEFAULT NULL,
  `commentaire` text NOT NULL,
  `note` int(2) NOT NULL,
  `date` datetime NOT NULL,
  `id_produit` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_avis`),
  KEY `id_membre` (`id_membre`),
  KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `avis`
--

INSERT INTO `avis` (`id_avis`, `id_membre`, `commentaire`, `note`, `date`, `id_produit`) VALUES
(4, NULL, 'Cette e-cigarette est très pratique, on a vraiment la même sensation qu''avec une cigarette classique. J''ai arreté de fumer depuis 3mois!', 4, '2014-12-18 11:00:00', 44),
(32, NULL, 'Idéal pour ceux qui veulent réduire leur consommation de tabac! Merci pour ce produit', 5, '2014-12-20 20:04:25', 61);

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(6) NOT NULL AUTO_INCREMENT,
  `montant` int(5) NOT NULL,
  `id_membre` int(5) DEFAULT NULL,
  `date_commande` datetime NOT NULL,
  `date_estimation` datetime NOT NULL,
  `date_livraison` datetime NOT NULL,
  `statut` enum('En cours de traitement','En cours de livraison','Livré') NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `id_membre` (`id_membre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id_commande`, `montant`, `id_membre`, `date_commande`, `date_estimation`, `date_livraison`, `statut`) VALUES
(1, 106, 1, '2015-05-05 00:00:00', '2015-05-08 00:00:00', '2015-05-11 00:00:00', 'Livré'),
(2, 740, 1, '2015-05-01 00:00:00', '2015-05-05 00:00:00', '0000-00-00 00:00:00', 'En cours de traitement'),
(3, 82, 1, '2015-05-18 22:52:17', '2015-05-18 22:52:22', '0000-00-00 00:00:00', 'En cours de traitement'),
(4, 102, 1, '2015-05-18 22:54:26', '2015-05-18 22:54:31', '0000-00-00 00:00:00', 'En cours de traitement'),
(5, 102, 1, '2015-05-18 23:26:01', '2015-05-18 23:26:06', '0000-00-00 00:00:00', 'En cours de traitement');

-- --------------------------------------------------------

--
-- Table structure for table `details_commande`
--

CREATE TABLE IF NOT EXISTS `details_commande` (
  `id_details_commande` int(6) NOT NULL AUTO_INCREMENT,
  `id_commande` int(6) NOT NULL,
  `id_produit` int(5) NOT NULL,
  `quantite` int(5) NOT NULL,
  PRIMARY KEY (`id_details_commande`),
  KEY `id_commande` (`id_commande`),
  KEY `id_commande_2` (`id_commande`),
  KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `details_commande`
--

INSERT INTO `details_commande` (`id_details_commande`, `id_commande`, `id_produit`, `quantite`) VALUES
(1, 1, 44, 2),
(2, 1, 61, 1),
(4, 3, 61, 1),
(6, 4, 44, 2),
(8, 5, 44, 2);

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
  `id_membre` int(5) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(15) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `naissance` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `telephone` int(10) unsigned zerofill NOT NULL,
  `sexe` enum('m','f') NOT NULL,
  `ville` varchar(20) NOT NULL,
  `cp` int(5) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `statut` int(1) NOT NULL,
  PRIMARY KEY (`id_membre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `naissance`, `email`, `telephone`, `sexe`, `ville`, `cp`, `adresse`, `statut`) VALUES
(1, 'admin', 'admin', 'Administrateur', 'Jury', '1996-03-09', 'contact@quaidesvaps.fr', 0566247586, 'f', 'Paris ', 75013, 'rue Saint Sébastien', 1),
(2, 'test', 'test', 'Le testeur', 'Monsieur', '1951-08-16', 'test@test.fr', 0612458590, 'f', 'Paris  ', 75010, '30 rue Saint Sébastien', 0),
(3, 'Loulou', 'loulou25', 'Louisa', 'Corrioux', '1972-03-12', 'louisa@gmail.com', 0632856412, 'm', 'Nice', 56222, 'Adresse de Louisa', 0),
(4, 'cloe1804', '', 'LEG', 'cloe', '1994-01-30', 'cloe.legoube@gmail.com', 0171529648, 'f', 'Meaux ', 77100, 'rue Cornillon', 0),
(5, 'Loulou', 'loulou25', 'Louisa', 'Corrioux', '1972-03-12', 'louisa@gmail.com', 0632856412, 'm', 'Nice', 56222, 'Adresse de Louisa', 0),
(6, 'Tamy', 'tania123', 'Lamy', 'Tania', '1988-02-03', 'tania@gmail.com', 0652849661, 'f', 'Parçay', 37210, '3 rue de la Loire', 0),
(9, 'sylvia', 'sylvia123', 'Masseron', 'Sylvia', '1960-04-19', 'masseron@hotmail.fr', 0237559426, 'f', 'Paris', 75013, '253 rue de la Paix', 0);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id_newsletter` int(5) NOT NULL AUTO_INCREMENT,
  `id_membre` int(5) NOT NULL,
  PRIMARY KEY (`id_newsletter`),
  KEY `id_membre` (`id_membre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id_newsletter`, `id_membre`) VALUES
(12, 4);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(5) NOT NULL AUTO_INCREMENT,
  `titre` varchar(60) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `prix` int(5) NOT NULL,
  `categorie` enum('E-cigarettes','E-liquides','Accessoires') NOT NULL,
  `stock` int(4) NOT NULL,
  `ref` int(4) NOT NULL,
  `fidelite` int(2) NOT NULL,
  `descriptif` text NOT NULL,
  `diametre` int(4) NOT NULL,
  `matiere` varchar(60) NOT NULL,
  `hauteur` int(4) NOT NULL,
  `poids` int(4) NOT NULL,
  `contenance` int(4) NOT NULL,
  `caracteristique5` varchar(200) NOT NULL,
  `caracteristique6` varchar(200) NOT NULL,
  `caracteristique7` varchar(200) NOT NULL,
  `caracteristique8` varchar(200) NOT NULL,
  `caracteristique9` varchar(200) NOT NULL,
  `caracteristique10` varchar(200) NOT NULL,
  `caracteristique11` varchar(200) NOT NULL,
  `caracteristique12` varchar(200) NOT NULL,
  `complement` text NOT NULL,
  `id_promo` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `id_promo` (`id_promo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=118 ;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id_produit`, `titre`, `photo`, `prix`, `categorie`, `stock`, `ref`, `fidelite`, `descriptif`, `diametre`, `matiere`, `hauteur`, `poids`, `contenance`, `caracteristique5`, `caracteristique6`, `caracteristique7`, `caracteristique8`, `caracteristique9`, `caracteristique10`, `caracteristique11`, `caracteristique12`, `complement`, `id_promo`) VALUES
(44, 'EGO Premium Rouge', 'image/EGO-Premium-Rouge.png', 35, 'E-cigarettes', 26, 2458, 7, 'Le Kit e-smart Kanger est destiné aux petis et moyens vapoteurs E-cigarette raffinée, très simple à utiliser et entretenir Kit décliné en noir, blanc et rouge', 22, 'Acier inoxydable', 59, 79, 5, 'Connecteur 510 réglable', 'Contrôle du tirage (airflow) avec bagues de couleur optionnelles', 'Plateau de construction modèle S "Small": Aluminium anodisé Ematal - isolante (voir ci-dessous) ', 'Chambre d''atomisation: Aluminium anodisé Ematal - isolante (voir ci-dessous)', 'Tank: Verre borosilicate dépoli, interchangeable', 'Drip tip custom "SQuip"', 'Joints de rechange, vis de rechange, clef Allen inclus', '', 'complements d''infos', NULL),
(61, 'EGO Premium Bleu', 'image/ego-premium.jpg', 36, 'E-cigarettes', 4, 2486, 5, 'Le Kit e-smart Kanger est destiné aux petis et moyens vapoteurs E-cigarette raffinée, très simple à utiliser et entretenir Kit décliné en noir, blanc et rouge', 22, 'Acier inoxydable', 59, 79, 5, 'Connecteur 510 réglable', 'Contrôle du tirage (airflow) avec bagues de couleur optionnelles', 'Plateau de construction modèle S "Small": Aluminium anodisé Ematal - isolante (voir ci-dessous) ', 'Chambre d''atomisation: Aluminium anodisé Ematal - isolante (voir ci-dessous)', 'Tank: Verre borosilicate dépoli, interchangeable', 'Drip tip custom "SQuip"', 'Joints de rechange, vis de rechange, clef Allen inclus', '', 'complements d''infos', NULL),
(62, 'EGO Premium Argenté', 'image/EGO-Premium.png', 32, 'E-cigarettes', 10, 2459, 6, 'Le Kit e-smart Kanger est destiné aux petis et moyens vapoteurs E-cigarette raffinée, très simple à utiliser et entretenir Kit décliné en noir, blanc et rouge', 22, 'Acier inoxydable', 59, 79, 5, 'Connecteur 510 réglable', 'Contrôle du tirage (airflow) avec bagues de couleur optionnelles', 'Plateau de construction modèle S ', 'Chambre d''atomisation: Aluminium anodisé Ematal - isolante (voir ci-dessous)', 'Tank: Verre borosilicate dépoli, interchangeable', 'Drip tip custom ', 'Joints de rechange, vis de rechange, clef Allen inclus', '', 'complements d''infos', 1),
(99, 'E-liquide - Goût Banane', 'images/-2487-Banane.jpg', 5, 'E-liquides', 30, 2487, 1, 'Ce produit a été fabriqué par notre partenaire Dekang.\r\n\r\nQui est Dekang ?\r\nDekang est tout simplement le leader mondial de la fabrication de l''e-liquide. Étant un des plus anciens acteurs du marché, il dispose d''un savoir-faire unique et d''un panel de saveur extraordinairement vaste.\r\n\r\nDekang est réputé pour son sérieux et la qualité de ces e-liquides.\r\nDisposant d''infrastructures certainement unique au monde sur ce secteur, Dekang garantit une qualité constante de fabrication et une application drastique des normes les plus exigeantes en terme de qualité et de sûreté.\r\n\r\nDekang dispose notamment de la norme GMP, normes américaines allemandes (normes produits alimentaires pharmaceutiques).\r\n\r\nLes avantages Dekang ?\r\n\r\nSi nous avons choisi Dekang c''est avant tout pour la qualité et la sûreté des e-liquides.\r\nDe très (trop) nombreux produits vendus sur le marché actuellement proviennent d''assembleurs dont les conditions de préparation sont totalement opaque.\r\nOn ne peut pas plaisanter avec un produit inhalés par nos clients.\r\nCombien de liquide dis "Français" sont assemblés en "salle propre" respectant la norme GMP ?...', 0, '', 0, 0, 0, 'Tous nos e-liquides existent en 6 ml, 11ml,18 ml et 30ml', '', '', '', '', '', '', '', '', 1),
(100, 'E-liquide - Goût Cola', 'images/-3100-Cola.jpg', 5, 'E-liquides', 30, 3100, 1, 'Ce produit a été fabriqué par notre partenaire Dekang.\r\n\r\nQui est Dekang ?\r\nDekang est tout simplement le leader mondial de la fabrication de l''e-liquide. Étant un des plus anciens acteurs du marché, il dispose d''un savoir-faire unique et d''un panel de saveur extraordinairement vaste.\r\n\r\nDekang est réputé pour son sérieux et la qualité de ces e-liquides.\r\nDisposant d''infrastructures certainement unique au monde sur ce secteur, Dekang garantit une qualité constante de fabrication et une application drastique des normes les plus exigeantes en terme de qualité et de sûreté.\r\n\r\nDekang dispose notamment de la norme GMP, normes américaines allemandes (normes produits alimentaires pharmaceutiques).\r\n\r\nLes avantages Dekang ?\r\n\r\nSi nous avons choisi Dekang c''est avant tout pour la qualité et la sûreté des e-liquides.\r\nDe très (trop) nombreux produits vendus sur le marché actuellement proviennent d''assembleurs dont les conditions de préparation sont totalement opaque.\r\nOn ne peut pas plaisanter avec un produit inhalés par nos clients.\r\nCombien de liquide dis "Français" sont assemblés en "salle propre" respectant la norme GMP ?...', 0, '', 0, 0, 6, 'Tous nos e-liquides existent en 6 ml, 11ml,18 ml et 30ml', '', '', '', '', '', '', '', '', 1),
(101, 'E-liquide - Goût Fraise', 'images/-3101-Fraise.jpg', 5, 'E-liquides', 30, 3101, 1, 'Ce produit a été fabriqué par notre partenaire Dekang.\r\n\r\nQui est Dekang ?\r\nDekang est tout simplement le leader mondial de la fabrication de l''e-liquide. Étant un des plus anciens acteurs du marché, il dispose d''un savoir-faire unique et d''un panel de saveur extraordinairement vaste.\r\n\r\nDekang est réputé pour son sérieux et la qualité de ces e-liquides.\r\nDisposant d''infrastructures certainement unique au monde sur ce secteur, Dekang garantit une qualité constante de fabrication et une application drastique des normes les plus exigeantes en terme de qualité et de sûreté.\r\n\r\nDekang dispose notamment de la norme GMP, normes américaines allemandes (normes produits alimentaires pharmaceutiques).\r\n\r\nLes avantages Dekang ?\r\n\r\nSi nous avons choisi Dekang c''est avant tout pour la qualité et la sûreté des e-liquides.\r\nDe très (trop) nombreux produits vendus sur le marché actuellement proviennent d''assembleurs dont les conditions de préparation sont totalement opaque.\r\nOn ne peut pas plaisanter avec un produit inhalés par nos clients.\r\nCombien de liquide dis "Français" sont assemblés en "salle propre" respectant la norme GMP ?...', 0, '', 0, 0, 6, 'Tous nos e-liquides existent en 6 ml, 11ml,18 ml et 30ml', '', '', '', '', '', '', '', '', 1),
(102, 'E-liquide - Goût Cappucino', 'images/-3102-Cappuccino.jpg', 5, 'E-liquides', 30, 3102, 1, 'Ce produit a été fabriqué par notre partenaire Dekang.\r\n\r\nQui est Dekang ?\r\nDekang est tout simplement le leader mondial de la fabrication de l''e-liquide. Étant un des plus anciens acteurs du marché, il dispose d''un savoir-faire unique et d''un panel de saveur extraordinairement vaste.\r\n\r\nDekang est réputé pour son sérieux et la qualité de ces e-liquides.\r\nDisposant d''infrastructures certainement unique au monde sur ce secteur, Dekang garantit une qualité constante de fabrication et une application drastique des normes les plus exigeantes en terme de qualité et de sûreté.\r\n\r\nDekang dispose notamment de la norme GMP, normes américaines allemandes (normes produits alimentaires pharmaceutiques).\r\n\r\nLes avantages Dekang ?\r\n\r\nSi nous avons choisi Dekang c''est avant tout pour la qualité et la sûreté des e-liquides.\r\nDe très (trop) nombreux produits vendus sur le marché actuellement proviennent d''assembleurs dont les conditions de préparation sont totalement opaque.\r\nOn ne peut pas plaisanter avec un produit inhalés par nos clients.\r\nCombien de liquide dis "Français" sont assemblés en "salle propre" respectant la norme GMP ?...', 0, '', 0, 0, 6, 'Tous nos e-liquides existent en 6 ml, 11ml,18 ml et 30ml', '', '', '', '', '', '', '', '', 1),
(103, 'E-liquide - Goût Kiwi', 'images/-3103-Kiwi.jpg', 5, 'E-liquides', 30, 3103, 1, 'Ce produit a été fabriqué par notre partenaire Dekang.\r\n\r\nQui est Dekang ?\r\nDekang est tout simplement le leader mondial de la fabrication de l''e-liquide. Étant un des plus anciens acteurs du marché, il dispose d''un savoir-faire unique et d''un panel de saveur extraordinairement vaste.\r\n\r\nDekang est réputé pour son sérieux et la qualité de ces e-liquides.\r\nDisposant d''infrastructures certainement unique au monde sur ce secteur, Dekang garantit une qualité constante de fabrication et une application drastique des normes les plus exigeantes en terme de qualité et de sûreté.\r\n\r\nDekang dispose notamment de la norme GMP, normes américaines allemandes (normes produits alimentaires pharmaceutiques).\r\n\r\nLes avantages Dekang ?\r\n\r\nSi nous avons choisi Dekang c''est avant tout pour la qualité et la sûreté des e-liquides.\r\nDe très (trop) nombreux produits vendus sur le marché actuellement proviennent d''assembleurs dont les conditions de préparation sont totalement opaque.\r\nOn ne peut pas plaisanter avec un produit inhalés par nos clients.\r\nCombien de liquide dis "Français" sont assemblés en "salle propre" respectant la norme GMP ?...', 0, '', 0, 0, 6, 'Tous nos e-liquides existent en 6 ml, 11ml,18 ml et 30ml', '', '', '', '', '', '', '', '', 1),
(104, 'E-liquide - Goût Pina Colada', 'images/-3104-Pina Colada.jpg', 5, 'E-liquides', 30, 3104, 1, 'Ce produit a été fabriqué par notre partenaire Dekang.\r\n\r\nQui est Dekang ?\r\nDekang est tout simplement le leader mondial de la fabrication de l''e-liquide. Étant un des plus anciens acteurs du marché, il dispose d''un savoir-faire unique et d''un panel de saveur extraordinairement vaste.\r\n\r\nDekang est réputé pour son sérieux et la qualité de ces e-liquides.\r\nDisposant d''infrastructures certainement unique au monde sur ce secteur, Dekang garantit une qualité constante de fabrication et une application drastique des normes les plus exigeantes en terme de qualité et de sûreté.\r\n\r\nDekang dispose notamment de la norme GMP, normes américaines allemandes (normes produits alimentaires pharmaceutiques).\r\n\r\nLes avantages Dekang ?\r\n\r\nSi nous avons choisi Dekang c''est avant tout pour la qualité et la sûreté des e-liquides.\r\nDe très (trop) nombreux produits vendus sur le marché actuellement proviennent d''assembleurs dont les conditions de préparation sont totalement opaque.\r\nOn ne peut pas plaisanter avec un produit inhalés par nos clients.\r\nCombien de liquide dis "Français" sont assemblés en "salle propre" respectant la norme GMP ?...', 0, '', 0, 0, 6, 'Tous nos e-liquides existent en 6 ml, 11ml,18 ml et 30ml', '', '', '', '', '', '', '', '', 1),
(105, 'E-liquide - Goût Pina Citron', 'images/-3105-Citron.jpg', 5, 'E-liquides', 30, 3105, 1, 'Ce produit a été fabriqué par notre partenaire Dekang.\r\n\r\nQui est Dekang ?\r\nDekang est tout simplement le leader mondial de la fabrication de l''e-liquide. Étant un des plus anciens acteurs du marché, il dispose d''un savoir-faire unique et d''un panel de saveur extraordinairement vaste.\r\n\r\nDekang est réputé pour son sérieux et la qualité de ces e-liquides.\r\nDisposant d''infrastructures certainement unique au monde sur ce secteur, Dekang garantit une qualité constante de fabrication et une application drastique des normes les plus exigeantes en terme de qualité et de sûreté.\r\n\r\nDekang dispose notamment de la norme GMP, normes américaines allemandes (normes produits alimentaires pharmaceutiques).\r\n\r\nLes avantages Dekang ?\r\n\r\nSi nous avons choisi Dekang c''est avant tout pour la qualité et la sûreté des e-liquides.\r\nDe très (trop) nombreux produits vendus sur le marché actuellement proviennent d''assembleurs dont les conditions de préparation sont totalement opaque.\r\nOn ne peut pas plaisanter avec un produit inhalés par nos clients.\r\nCombien de liquide dis "Français" sont assemblés en "salle propre" respectant la norme GMP ?...', 0, '', 0, 0, 6, 'Tous nos e-liquides existent en 6 ml, 11ml,18 ml et 30ml', '', '', '', '', '', '', '', '', 1),
(106, 'E-liquide - Goût Pomme', 'images/-3106-Pomme.jpg', 5, 'E-liquides', 30, 3106, 1, 'Ce produit a été fabriqué par notre partenaire Dekang.\r\n\r\nQui est Dekang ?\r\nDekang est tout simplement le leader mondial de la fabrication de l''e-liquide. Étant un des plus anciens acteurs du marché, il dispose d''un savoir-faire unique et d''un panel de saveur extraordinairement vaste.\r\n\r\nDekang est réputé pour son sérieux et la qualité de ces e-liquides.\r\nDisposant d''infrastructures certainement unique au monde sur ce secteur, Dekang garantit une qualité constante de fabrication et une application drastique des normes les plus exigeantes en terme de qualité et de sûreté.\r\n\r\nDekang dispose notamment de la norme GMP, normes américaines allemandes (normes produits alimentaires pharmaceutiques).\r\n\r\nLes avantages Dekang ?\r\n\r\nSi nous avons choisi Dekang c''est avant tout pour la qualité et la sûreté des e-liquides.\r\nDe très (trop) nombreux produits vendus sur le marché actuellement proviennent d''assembleurs dont les conditions de préparation sont totalement opaque.\r\nOn ne peut pas plaisanter avec un produit inhalés par nos clients.\r\nCombien de liquide dis "Français" sont assemblés en "salle propre" respectant la norme GMP ?...', 0, '', 0, 0, 6, 'Tous nos e-liquides existent en 6 ml, 11ml,18 ml et 30ml', '', '', '', '', '', '', '', '', 1),
(107, 'E-liquide - Goût Noix de coco', 'images/-3107-Noix de coco.jpg', 5, 'E-liquides', 30, 3107, 1, 'Ce produit a été fabriqué par notre partenaire Dekang.\r\n\r\nQui est Dekang ?\r\nDekang est tout simplement le leader mondial de la fabrication de l''e-liquide. Étant un des plus anciens acteurs du marché, il dispose d''un savoir-faire unique et d''un panel de saveur extraordinairement vaste.\r\n\r\nDekang est réputé pour son sérieux et la qualité de ces e-liquides.\r\nDisposant d''infrastructures certainement unique au monde sur ce secteur, Dekang garantit une qualité constante de fabrication et une application drastique des normes les plus exigeantes en terme de qualité et de sûreté.\r\n\r\nDekang dispose notamment de la norme GMP, normes américaines allemandes (normes produits alimentaires pharmaceutiques).\r\n\r\nLes avantages Dekang ?\r\n\r\nSi nous avons choisi Dekang c''est avant tout pour la qualité et la sûreté des e-liquides.\r\nDe très (trop) nombreux produits vendus sur le marché actuellement proviennent d''assembleurs dont les conditions de préparation sont totalement opaque.\r\nOn ne peut pas plaisanter avec un produit inhalés par nos clients.\r\nCombien de liquide dis "Français" sont assemblés en "salle propre" respectant la norme GMP ?...', 0, '', 0, 0, 6, 'Tous nos e-liquides existent en 6 ml, 11ml,18 ml et 30ml', '', '', '', '', '', '', '', '', 1),
(108, 'Batterie Fantaisie Couleur', 'images/-3200-batterie-fantaisie-couleur.jpg', 15, 'Accessoires', 20, 3200, 2, 'Recharger votre e-cigarette grâce à cette batterie fantaisie. \r\nElle s''adapte à tous nos modèles Premium.', 0, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 1),
(109, 'Batterie Fantaisie Rouge à pois blancs', 'images/-3201-batterie-fantaisie-rouge-pois-blanc.png', 15, 'Accessoires', 20, 3201, 2, 'Recharger votre e-cigarette grâce à cette batterie fantaisie. \r\nElle s''adapte à tous nos modèles Premium.', 0, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 1),
(110, 'Tour de cou', 'images/-3202-Tour de Cou.jpg', 15, 'Accessoires', 20, 3202, 2, 'Ne perdez plus votre e-cigarette et ayez là toujours à porter de main grâce à ce tour de cou.\r\nCe tour de cou s''adapte à tous nos modèles.', 0, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 1),
(111, 'Housse de rangement noir', 'images/-3203-Copyright @ Patrick King - Crazy Vapors.jpg', 20, 'Accessoires', 20, 3203, 2, 'Cette housse remplacera votre ancien paquet de cigarette. Vous pouvez y ranger votre e-cigarette, une batterie de rechange, le chargeur ainsi qu''un atomisateur de rechange.', 0, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 1),
(112, 'EGO case Rose', 'images/-3204-EGO Case Rose.jpg', 22, 'Accessoires', 20, 3204, 2, 'Cette housse remplacera votre ancien paquet de cigarette. Vous pouvez y ranger votre e-cigarette, une batterie de rechange, le chargeur ainsi qu''un atomisateur de rechange.\r\n\r\nCette housse est adaptée à nos modèles EGO.', 0, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 1),
(113, 'E-liquide - Goût Vanille', 'images/-3108-Vanille.jpg', 5, 'E-liquides', 13, 3108, 1, 'Ce produit a été fabriqué par notre partenaire Dekang. \r\n\r\nQui est Dekang ? \r\n\r\nDekang est tout simplement le leader mondial de la fabrication de l''e-liquide. Étant un des plus anciens acteurs du marché, il dispose d''un savoir-faire unique et d''un panel de saveur extraordinairement vaste. Dekang est réputé pour son sérieux et la qualité de ces e-liquides. Disposant d''infrastructures certainement unique au monde sur ce secteur, Dekang garantit une qualité constante de fabrication et une application drastique des normes les plus exigeantes en terme de qualité et de sûreté. Dekang dispose notamment de la norme GMP, normes américaines allemandes (normes produits alimentaires pharmaceutiques). \r\n\r\nLes avantages Dekang ? \r\n\r\nSi nous avons choisi Dekang c''est avant tout pour la qualité et la sûreté des e-liquides. De très (trop) nombreux produits vendus sur le marché actuellement proviennent d''assembleurs dont les conditions de préparation sont totalement opaque. On ne peut pas plaisanter avec un produit inhalés par nos clients. Combien de liquide dis "Français" sont assemblés en "salle propre" respectant la norme GMP ?...', 0, '', 0, 0, 0, 'Tous nos e-liquides existent en 6 ml, 11ml,18 ml et 30ml', '', '', '', '', '', '', '', '', 1),
(114, 'Coffret Divine Blanc', 'images/-1520-Divine - Blanc.jpg', 60, 'E-cigarettes', 35, 1520, 12, 'Coffret comprenant 2 e-cigarettes Divine couleur blanc avec leurs batteries et atomisateurs ainsi qu''un chargeur USB ou sur secteur. Vous ne risquez plus de tomber en panne !', 0, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 1),
(115, 'Coffret Divine Violet', 'images/-1521-Divine - Violet.jpg', 60, 'E-cigarettes', 32, 1521, 12, 'Coffret comprenant 2 e-cigarettes Divine couleur blanc avec leurs batteries et atomisateurs ainsi qu''un chargeur USB ou sur secteur. Vous ne risquez plus de tomber en panne !', 0, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 1),
(116, 'Coffret EGO bleue', 'images/-1522-EGO bleue - Coffret.jpg', 55, 'E-cigarettes', 28, 1522, 11, 'Coffret comprenant 2 e-cigarettes Divine couleur blanc avec leurs batteries et atomisateurs ainsi qu''un chargeur USB ou sur secteur. Vous ne risquez plus de tomber en panne !', 0, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 1),
(117, 'EGO premium Silver', 'images/-1523-EGO Premium - Silver.jpg', 36, 'E-cigarettes', 46, 1523, 6, 'Le Kit e-smart Kanger est destiné aux petits et moyens vapoteurs E-cigarette raffinée, très simple à utiliser et entretenir', 22, 'Acier inoxydable', 59, 79, 5, 'Connecteur 510 réglable', 'Contrôle du tirage (airflow) avec bagues de couleur optionnelles', 'Plateau de construction modèle S "Small": Aluminium anodisé Ematal - isolante (voir ci-dessous) ', 'Chambre d''atomisation: Aluminium anodisé Ematal - isolante (voir ci-dessous)', 'Tank: Verre borosilicate dépoli, interchangeable', 'Drip tip custom "SQuip"', 'Joints de rechange, vis de rechange, clef Allen inclus', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `id_promo` int(2) NOT NULL AUTO_INCREMENT,
  `code_promo` varchar(6) NOT NULL,
  `reduction` int(5) NOT NULL,
  PRIMARY KEY (`id_promo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id_promo`, `code_promo`, `reduction`) VALUES
(1, 'PM30', 30),
(2, 'PM20', 20),
(5, 'PM10', 10);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `details_commande`
--
ALTER TABLE `details_commande`
  ADD CONSTRAINT `details_commande_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`),
  ADD CONSTRAINT `details_commande_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD CONSTRAINT `newsletter_ibfk_1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`id_promo`) REFERENCES `promotion` (`id_promo`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
