-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 04, 2015 at 12:00 AM
-- Server version: 5.5.43-37.2
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cloe_quaidesvaps`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `avis`
--

INSERT INTO `avis` (`id_avis`, `id_membre`, `commentaire`, `note`, `date`, `id_produit`) VALUES
(7, 13, 'Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. ', 5, '2014-12-22 11:00:00', 100),
(8, 15, 'Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. ', 4, '2015-02-13 11:00:00', 100),
(10, 4, 'Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit ', 5, '2015-03-05 11:00:00', 105),
(11, 10, 'pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. ', 4, '2015-04-10 11:00:00', 105),
(12, 19, 'Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. ', 4, '2015-04-13 11:00:00', 61),
(13, 2, 'Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. ', 2, '2015-05-18 11:00:00', 106),
(16, 4, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. ', 3, '2015-05-14 11:00:00', 109);

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(6) NOT NULL AUTO_INCREMENT,
  `montant` float NOT NULL,
  `id_membre` int(5) DEFAULT NULL,
  `date_commande` datetime NOT NULL,
  `date_estimation` datetime NOT NULL,
  `date_livraison` datetime NOT NULL,
  `adresse` text NOT NULL,
  `cp` int(5) NOT NULL,
  `ville` varchar(60) NOT NULL,
  `statut` enum('En cours de traitement','En cours de livraison','Livré') NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `id_membre` (`id_membre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id_commande`, `montant`, `id_membre`, `date_commande`, `date_estimation`, `date_livraison`, `adresse`, `cp`, `ville`, `statut`) VALUES
(6, 60, NULL, '2015-05-24 22:51:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'rue Saint Sébastien', 75013, 'Paris ', 'En cours de traitement'),
(7, 125, 9, '2015-05-31 11:47:02', '2015-05-31 11:47:07', '0000-00-00 00:00:00', '253 rue de la Paix', 75013, 'Paris', 'En cours de traitement'),
(8, 75, 11, '2015-05-31 12:21:47', '2015-05-31 12:21:52', '0000-00-00 00:00:00', 'rue de l&#039;espoir', 33210, 'Bordeaux', 'En cours de traitement'),
(9, 39.5, 12, '2015-05-31 16:08:21', '2015-05-31 16:08:26', '0000-00-00 00:00:00', '85 rue de la mer', 44510, 'Le Pouliguen', 'En cours de traitement'),
(14, 39.5, 12, '2015-05-31 16:23:40', '2015-05-31 16:23:45', '0000-00-00 00:00:00', '85 rue de la mer', 44510, 'Le Pouliguen', 'En cours de traitement'),
(18, 39.5, 14, '2015-05-31 16:33:11', '2015-05-31 16:33:16', '0000-00-00 00:00:00', '56 rue des mouettes', 44238, 'Saint Brevin', 'En cours de traitement'),
(19, 94.8, 16, '2015-05-31 16:40:39', '2015-05-31 16:40:44', '0000-00-00 00:00:00', '85 rue des souppirs', 43526, 'Baumont', 'En cours de traitement'),
(22, 65, 13, '2015-05-31 17:15:05', '2015-05-31 17:15:10', '0000-00-00 00:00:00', 'Rue de la cannebi&egrave;re', 13000, 'Marseille', 'En cours de traitement'),
(23, 73, 19, '2015-05-31 19:44:51', '2015-05-31 19:44:56', '0000-00-00 00:00:00', '3 rue de la riviere', 50600, 'Rennes', 'En cours de traitement'),
(24, 139, 18, '2015-06-03 22:37:15', '2015-06-03 22:37:20', '0000-00-00 00:00:00', 'jojo123', 52600, 'Quimper', 'En cours de traitement');

-- --------------------------------------------------------

--
-- Table structure for table `details_commande`
--

CREATE TABLE IF NOT EXISTS `details_commande` (
  `id_details_commande` int(6) NOT NULL AUTO_INCREMENT,
  `id_commande` int(6) NOT NULL,
  `id_produit` int(5) NOT NULL,
  `quantite` int(5) NOT NULL,
  `prix_promo` float NOT NULL,
  `code_promo` varchar(20) NOT NULL,
  `reduction` varchar(20) NOT NULL,
  PRIMARY KEY (`id_details_commande`),
  KEY `id_commande` (`id_commande`),
  KEY `id_commande_2` (`id_commande`),
  KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `details_commande`
--

INSERT INTO `details_commande` (`id_details_commande`, `id_commande`, `id_produit`, `quantite`, `prix_promo`, `code_promo`, `reduction`) VALUES
(12, 7, 61, 1, 0, '', ''),
(14, 8, 99, 1, 4, '', ''),
(15, 8, 103, 1, 0, 'PM20', '20'),
(16, 8, 105, 1, 0, '', ''),
(24, 18, 109, 1, 0, '0', '0'),
(25, 18, 102, 1, 0, 'PM10', '50'),
(26, 18, 106, 1, 0, '0', '0'),
(27, 19, 61, 1, 0, 'PM20', '20'),
(29, 19, 106, 1, 0, '0', '0'),
(35, 22, 107, 1, 0, '0', '0'),
(36, 22, 113, 1, 0, '0', '0'),
(38, 23, 104, 1, 0, '0', '0'),
(40, 24, 115, 1, 0, '0', '0'),
(41, 24, 116, 1, 0, '0', '0'),
(42, 24, 114, 1, 0, '0', '0');

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
  `club` enum('non','oui') NOT NULL,
  `carte` enum('oui','non') NOT NULL,
  `points` int(4) NOT NULL,
  PRIMARY KEY (`id_membre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10001 ;

--
-- Dumping data for table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `naissance`, `email`, `telephone`, `sexe`, `ville`, `cp`, `adresse`, `statut`, `club`, `carte`, `points`) VALUES
(1, 'admin', 'admin', 'Administrateur', 'Jury', '1996-03-10', 'contact@quaidesvaps.fr', 0566247586, 'f', 'Paris ', 75013, 'rue Saint Sébastien', 1, '', '', 0),
(2, 'test', 'test', 'Le testeur', 'Monsieur', '1951-08-16', 'test@test.fr', 0612458590, 'f', 'Paris  ', 75010, '30 rue Saint Sébastien', 0, 'oui', 'oui', 0),
(3, 'Loulou', 'loulou123', 'Louisa', 'Corrioux', '1972-03-12', 'louisa@gmail.com', 0632856412, 'm', 'Nice', 56222, 'Adresse de Louisa', 0, 'oui', 'oui', 0),
(4, 'cloe1804', '', 'LEG', 'cloe', '1994-01-30', 'cloe.legoube@gmail.com', 0171529648, 'f', 'Meaux ', 77100, 'rue Cornillon', 0, 'oui', 'oui', 0),
(6, 'Tamy', 'tania123', 'Lamy', 'Tania', '1988-02-03', 'tania@gmail.com', 0652849661, 'f', 'Parçay', 37210, '3 rue de la Loire', 0, 'oui', 'oui', 0),
(9, 'sylvia', 'sylvia123', 'Masseron', 'Sylvia', '1960-04-19', 'masseron@hotmail.fr', 0237559426, 'f', 'Paris', 75013, '253 rue de la Paix', 0, 'oui', 'oui', 0),
(10, 'Carla', 'carla123', 'Bruni', 'Carla', '1950-07-25', 'carla@gmail.fr', 0625894562, 'f', 'Paris', 75013, '33 rue de la bastille', 0, 'oui', 'oui', 0),
(11, 'Louis', 'louis123', 'Joubert', 'Louis', '1985-04-23', 'louis@gmail.co', 0566247586, 'm', 'Bordeaux', 33210, 'rue de l&#039;espoir', 0, 'oui', 'oui', 0),
(12, 'Alfred', 'alfa123', 'Manouir', 'Alfred', '1975-03-12', 'manouir@hotmail.fr', 0645128495, 'm', 'Le Pouliguen', 44510, '85 rue de la mer', 0, 'oui', 'oui', 0),
(13, 'Mery', 'mery123', 'Grey', 'Meredith', '1978-05-02', 'grey@yahoo.fr', 0257489613, 'f', 'Marseille', 13000, 'Rue de la cannebi&egrave;re', 0, 'oui', 'oui', 0),
(14, 'Marine', 'marine123', 'Donnard', 'Marine', '1995-06-05', 'marine.donnard@hotmail.fr', 0345896245, 'f', 'Saint Brevin', 44238, '56 rue des mouettes', 0, 'oui', 'oui', 0),
(15, 'Abdel', 'abda123', 'Malik', 'Abdel', '1981-12-12', 'abdel@yahoo.fr', 0654589542, 'm', 'La plaine', 75013, '56 rue des minimes', 0, 'oui', 'oui', 0),
(16, 'Mimi25', 'mimi123', 'Lefol', 'Emilie', '1986-06-18', 'emilie.lefol@gmail.com', 0247559988, 'f', 'Baumont', 43526, '85 rue des souppirs', 0, 'oui', 'oui', 0),
(17, 'Emilien', 'milien123', 'Rocard', 'Emilien', '1986-06-01', 'milien@hotmail.fr', 0652345978, 'm', 'Lille', 15012, '417 rue du Nord', 0, 'oui', 'oui', 0),
(18, 'JOJO', 'jojo123', 'lamalice', 'Jojo', '1994-05-24', 'jojo@yahoo.fr', 0065248956, 'm', 'Quimper', 52600, 'jojo123', 0, 'oui', 'oui', 0),
(19, 'Marcel', 'marcel123', 'Pagnol', 'Marcel', '1985-05-24', 'pagnol@yahoo.fr', 0250859632, 'm', 'Rennes', 50600, '3 rue de la riviere', 0, 'oui', 'oui', 0),
(10000, 'newsletter', 'newsletter', 'newsletter', 'newsletter', '0000-00-00', 'newsletter', 0000000000, 'm', 'newsletter', 0, 'newsletter', 1, 'non', 'non', 0);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id_newsletter` int(5) NOT NULL AUTO_INCREMENT,
  `id_membre` int(5) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  PRIMARY KEY (`id_newsletter`),
  KEY `id_membre` (`id_membre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id_newsletter`, `id_membre`, `email`) VALUES
(12, 4, ''),
(28, 10000, 'email'),
(43, 10000, 'email@site.fr'),
(44, 10000, 'email@site2.fr'),
(45, 10000, 'null'),
(46, 10000, 'null'),
(47, 10000, 'null'),
(48, 10000, 'null'),
(49, 1, 'null'),
(50, 3, 'null'),
(51, 10000, 'null'),
(52, 10000, 'test@site.fr');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(5) NOT NULL AUTO_INCREMENT,
  `titre` varchar(60) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `prix` float(8,0) NOT NULL,
  `prix_promo` float(8,0) NOT NULL,
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

INSERT INTO `produit` (`id_produit`, `titre`, `photo`, `prix`, `prix_promo`, `categorie`, `stock`, `ref`, `fidelite`, `descriptif`, `diametre`, `matiere`, `hauteur`, `poids`, `contenance`, `caracteristique5`, `caracteristique6`, `caracteristique7`, `caracteristique8`, `caracteristique9`, `caracteristique10`, `caracteristique11`, `caracteristique12`, `complement`, `id_promo`) VALUES
(44, 'EGO Premium Rouge', 'images/44-2458-EGO-Premium-Rouge.png', 35, 31, 'E-cigarettes', 25, 2458, 7, 'Le Kit e-smart Kanger est destiné aux petits et moyens vapoteurs E-cigarette raffinée, très simple à utiliser et entretenir Kit décliné en noir, blanc et rouge', 22, 'Acier inoxydable', 59, 79, 5, 'Connecteur 510 réglable', 'Contrôle du tirage (airflow) avec bagues de couleur optionnelles', 'Plateau de construction modèle S ', 'Chambre d''atomisation: Aluminium anodisé Ematal - isolante (voir ci-dessous)', 'Tank: Verre borosilicate dépoli, interchangeable', 'Drip tip custom ', 'Joints de rechange, vis de rechange, clef Allen inclus', '', 'complements d''infos', 5),
(61, 'EGO Premium Bleue', 'images/61-2849-ego_premium_bleu_boutique.jpg', 36, 31, 'E-cigarettes', 30, 2849, 7, 'Le Kit e-smart Kanger est destiné aux petits et moyens vapoteurs E-cigarette raffinée, très simple à utiliser et entretenir Kit décliné en noir, blanc et rouge', 22, 'Acier inoxydable', 59, 79, 5, 'Connecteur 510 réglable', 'Contrôle du tirage (airflow) avec bagues de couleur optionnelles', 'Plateau de construction modèle S ', 'Chambre d''atomisation: Aluminium anodisé Ematal - isolante (voir ci-dessous)', 'Tank: Verre borosilicate dépoli, interchangeable', 'Drip tip custom ', 'Joints de rechange, vis de rechange, clef Allen inclus', '', '', 2),
(62, 'EGO Premium Argenté', 'images/62-2459-EGO-Premium-argente.png', 32, 0, 'E-cigarettes', 10, 2459, 6, 'Le Kit e-smart Kanger est destiné aux petis et moyens vapoteurs E-cigarette raffinée, très simple à utiliser et entretenir Kit décliné en noir, blanc et rouge', 22, 'Acier inoxydable', 59, 79, 5, 'Connecteur 510 réglable', 'Contrôle du tirage (airflow) avec bagues de couleur optionnelles', 'Plateau de construction modèle S ', 'Chambre d''atomisation: Aluminium anodisé Ematal - isolante (voir ci-dessous)', 'Tank: Verre borosilicate dépoli, interchangeable', 'Drip tip custom ', 'Joints de rechange, vis de rechange, clef Allen inclus', '', 'complements d''infos', 5),
(99, 'E-liquide - Goût Banane', 'images/-2487-Banane.jpg', 5, 4, 'E-liquides', 29, 2487, 1, 'Ce produit a été fabriqué par notre partenaire Dekang.\r\n\r\nQui est Dekang ?\r\nDekang est tout simplement le leader mondial de la fabrication de l''e-liquide. Étant un des plus anciens acteurs du marché, il dispose d''un savoir-faire unique et d''un panel de saveur extraordinairement vaste.\r\n\r\nDekang est réputé pour son sérieux et la qualité de ces e-liquides.\r\nDisposant d''infrastructures certainement unique au monde sur ce secteur, Dekang garantit une qualité constante de fabrication et une application drastique des normes les plus exigeantes en terme de qualité et de sûreté.\r\n\r\nDekang dispose notamment de la norme GMP, normes américaines allemandes (normes produits alimentaires pharmaceutiques).\r\n\r\nLes avantages Dekang ?\r\n\r\nSi nous avons choisi Dekang c''est avant tout pour la qualité et la sûreté des e-liquides.\r\nDe très (trop) nombreux produits vendus sur le marché actuellement proviennent d''assembleurs dont les conditions de préparation sont totalement opaque.\r\nOn ne peut pas plaisanter avec un produit inhalés par nos clients.\r\nCombien de liquide dis "Français" sont assemblés en "salle propre" respectant la norme GMP ?...', 0, '', 0, 0, 0, 'Tous nos e-liquides existent en 6 ml, 11ml,18 ml et 30ml', '', '', '', '', '', '', '', '', NULL),
(100, 'E-liquide - Goût Cola', 'images/-3100-Cola.jpg', 5, 0, 'E-liquides', 30, 3100, 1, 'Ce produit a été fabriqué par notre partenaire Dekang.\r\n\r\nQui est Dekang ?\r\nDekang est tout simplement le leader mondial de la fabrication de l''e-liquide. Étant un des plus anciens acteurs du marché, il dispose d''un savoir-faire unique et d''un panel de saveur extraordinairement vaste.\r\n\r\nDekang est réputé pour son sérieux et la qualité de ces e-liquides.\r\nDisposant d''infrastructures certainement unique au monde sur ce secteur, Dekang garantit une qualité constante de fabrication et une application drastique des normes les plus exigeantes en terme de qualité et de sûreté.\r\n\r\nDekang dispose notamment de la norme GMP, normes américaines allemandes (normes produits alimentaires pharmaceutiques).\r\n\r\nLes avantages Dekang ?\r\n\r\nSi nous avons choisi Dekang c''est avant tout pour la qualité et la sûreté des e-liquides.\r\nDe très (trop) nombreux produits vendus sur le marché actuellement proviennent d''assembleurs dont les conditions de préparation sont totalement opaque.\r\nOn ne peut pas plaisanter avec un produit inhalés par nos clients.\r\nCombien de liquide dis "Français" sont assemblés en "salle propre" respectant la norme GMP ?...', 0, '', 0, 0, 6, 'Tous nos e-liquides existent en 6 ml, 11ml,18 ml et 30ml', '', '', '', '', '', '', '', '', NULL),
(101, 'E-liquide - Goût Fraise', 'images/-3101-Fraise.jpg', 5, 4, 'E-liquides', 30, 3101, 1, 'Ce produit a été fabriqué par notre partenaire Dekang.\r\n\r\nQui est Dekang ?\r\nDekang est tout simplement le leader mondial de la fabrication de l''e-liquide. Étant un des plus anciens acteurs du marché, il dispose d''un savoir-faire unique et d''un panel de saveur extraordinairement vaste.\r\n\r\nDekang est réputé pour son sérieux et la qualité de ces e-liquides.\r\nDisposant d''infrastructures certainement unique au monde sur ce secteur, Dekang garantit une qualité constante de fabrication et une application drastique des normes les plus exigeantes en terme de qualité et de sûreté.\r\n\r\nDekang dispose notamment de la norme GMP, normes américaines allemandes (normes produits alimentaires pharmaceutiques).\r\n\r\nLes avantages Dekang ?\r\n\r\nSi nous avons choisi Dekang c''est avant tout pour la qualité et la sûreté des e-liquides.\r\nDe très (trop) nombreux produits vendus sur le marché actuellement proviennent d''assembleurs dont les conditions de préparation sont totalement opaque.\r\nOn ne peut pas plaisanter avec un produit inhalés par nos clients.\r\nCombien de liquide dis "Français" sont assemblés en "salle propre" respectant la norme GMP ?...', 0, '', 0, 0, 6, 'Tous nos e-liquides existent en 6 ml, 11ml,18 ml et 30ml', '', '', '', '', '', '', '', '', NULL),
(102, 'E-liquide - Goût Cappucino', 'images/-3102-Cappuccino.jpg', 5, 0, 'E-liquides', 29, 3102, 1, 'Ce produit a été fabriqué par notre partenaire Dekang.\r\n\r\nQui est Dekang ?\r\nDekang est tout simplement le leader mondial de la fabrication de l''e-liquide. Étant un des plus anciens acteurs du marché, il dispose d''un savoir-faire unique et d''un panel de saveur extraordinairement vaste.\r\n\r\nDekang est réputé pour son sérieux et la qualité de ces e-liquides.\r\nDisposant d''infrastructures certainement unique au monde sur ce secteur, Dekang garantit une qualité constante de fabrication et une application drastique des normes les plus exigeantes en terme de qualité et de sûreté.\r\n\r\nDekang dispose notamment de la norme GMP, normes américaines allemandes (normes produits alimentaires pharmaceutiques).\r\n\r\nLes avantages Dekang ?\r\n\r\nSi nous avons choisi Dekang c''est avant tout pour la qualité et la sûreté des e-liquides.\r\nDe très (trop) nombreux produits vendus sur le marché actuellement proviennent d''assembleurs dont les conditions de préparation sont totalement opaque.\r\nOn ne peut pas plaisanter avec un produit inhalés par nos clients.\r\nCombien de liquide dis "Français" sont assemblés en "salle propre" respectant la norme GMP ?...', 0, '', 0, 0, 6, 'Tous nos e-liquides existent en 6 ml, 11ml,18 ml et 30ml', '', '', '', '', '', '', '', '', 5),
(103, 'E-liquide - Goût Kiwi', 'images/-3103-Kiwi.jpg', 5, 0, 'E-liquides', 27, 3103, 1, 'Ce produit a été fabriqué par notre partenaire Dekang.\r\n\r\nQui est Dekang ?\r\nDekang est tout simplement le leader mondial de la fabrication de l''e-liquide. Étant un des plus anciens acteurs du marché, il dispose d''un savoir-faire unique et d''un panel de saveur extraordinairement vaste.\r\n\r\nDekang est réputé pour son sérieux et la qualité de ces e-liquides.\r\nDisposant d''infrastructures certainement unique au monde sur ce secteur, Dekang garantit une qualité constante de fabrication et une application drastique des normes les plus exigeantes en terme de qualité et de sûreté.\r\n\r\nDekang dispose notamment de la norme GMP, normes américaines allemandes (normes produits alimentaires pharmaceutiques).\r\n\r\nLes avantages Dekang ?\r\n\r\nSi nous avons choisi Dekang c''est avant tout pour la qualité et la sûreté des e-liquides.\r\nDe très (trop) nombreux produits vendus sur le marché actuellement proviennent d''assembleurs dont les conditions de préparation sont totalement opaque.\r\nOn ne peut pas plaisanter avec un produit inhalés par nos clients.\r\nCombien de liquide dis "Français" sont assemblés en "salle propre" respectant la norme GMP ?...', 0, '', 0, 0, 6, 'Tous nos e-liquides existent en 6 ml, 11ml,18 ml et 30ml', '', '', '', '', '', '', '', '', 2),
(104, 'E-liquide - Goût Pina Colada', 'images/-3104-Pina Colada.jpg', 5, 0, 'E-liquides', 29, 3104, 1, 'Ce produit a été fabriqué par notre partenaire Dekang.\r\n\r\nQui est Dekang ?\r\nDekang est tout simplement le leader mondial de la fabrication de l''e-liquide. Étant un des plus anciens acteurs du marché, il dispose d''un savoir-faire unique et d''un panel de saveur extraordinairement vaste.\r\n\r\nDekang est réputé pour son sérieux et la qualité de ces e-liquides.\r\nDisposant d''infrastructures certainement unique au monde sur ce secteur, Dekang garantit une qualité constante de fabrication et une application drastique des normes les plus exigeantes en terme de qualité et de sûreté.\r\n\r\nDekang dispose notamment de la norme GMP, normes américaines allemandes (normes produits alimentaires pharmaceutiques).\r\n\r\nLes avantages Dekang ?\r\n\r\nSi nous avons choisi Dekang c''est avant tout pour la qualité et la sûreté des e-liquides.\r\nDe très (trop) nombreux produits vendus sur le marché actuellement proviennent d''assembleurs dont les conditions de préparation sont totalement opaque.\r\nOn ne peut pas plaisanter avec un produit inhalés par nos clients.\r\nCombien de liquide dis "Français" sont assemblés en "salle propre" respectant la norme GMP ?...', 0, '', 0, 0, 6, 'Tous nos e-liquides existent en 6 ml, 11ml,18 ml et 30ml', '', '', '', '', '', '', '', '', NULL),
(105, 'E-liquide - Goût Pina Citron', 'images/-3105-Citron.jpg', 5, 4, 'E-liquides', 29, 3105, 1, 'Ce produit a été fabriqué par notre partenaire Dekang.\r\n\r\nQui est Dekang ?\r\nDekang est tout simplement le leader mondial de la fabrication de l''e-liquide. Étant un des plus anciens acteurs du marché, il dispose d''un savoir-faire unique et d''un panel de saveur extraordinairement vaste.\r\n\r\nDekang est réputé pour son sérieux et la qualité de ces e-liquides.\r\nDisposant d''infrastructures certainement unique au monde sur ce secteur, Dekang garantit une qualité constante de fabrication et une application drastique des normes les plus exigeantes en terme de qualité et de sûreté.\r\n\r\nDekang dispose notamment de la norme GMP, normes américaines allemandes (normes produits alimentaires pharmaceutiques).\r\n\r\nLes avantages Dekang ?\r\n\r\nSi nous avons choisi Dekang c''est avant tout pour la qualité et la sûreté des e-liquides.\r\nDe très (trop) nombreux produits vendus sur le marché actuellement proviennent d''assembleurs dont les conditions de préparation sont totalement opaque.\r\nOn ne peut pas plaisanter avec un produit inhalés par nos clients.\r\nCombien de liquide dis "Français" sont assemblés en "salle propre" respectant la norme GMP ?...', 0, '', 0, 0, 6, 'Tous nos e-liquides existent en 6 ml, 11ml,18 ml et 30ml', '', '', '', '', '', '', '', '', NULL),
(106, 'E-liquide - Goût Pomme', 'images/-3106-Pomme.jpg', 5, 2, 'E-liquides', 28, 3106, 1, 'Ce produit a été fabriqué par notre partenaire Dekang.\r\n\r\nQui est Dekang ?\r\nDekang est tout simplement le leader mondial de la fabrication de l''e-liquide. Étant un des plus anciens acteurs du marché, il dispose d''un savoir-faire unique et d''un panel de saveur extraordinairement vaste.\r\n\r\nDekang est réputé pour son sérieux et la qualité de ces e-liquides.\r\nDisposant d''infrastructures certainement unique au monde sur ce secteur, Dekang garantit une qualité constante de fabrication et une application drastique des normes les plus exigeantes en terme de qualité et de sûreté.\r\n\r\nDekang dispose notamment de la norme GMP, normes américaines allemandes (normes produits alimentaires pharmaceutiques).\r\n\r\nLes avantages Dekang ?\r\n\r\nSi nous avons choisi Dekang c''est avant tout pour la qualité et la sûreté des e-liquides.\r\nDe très (trop) nombreux produits vendus sur le marché actuellement proviennent d''assembleurs dont les conditions de préparation sont totalement opaque.\r\nOn ne peut pas plaisanter avec un produit inhalés par nos clients.\r\nCombien de liquide dis "Français" sont assemblés en "salle propre" respectant la norme GMP ?...', 0, '', 0, 0, 6, 'Tous nos e-liquides existent en 6 ml, 11ml,18 ml et 30ml', '', '', '', '', '', '', '', '', NULL),
(107, 'E-liquide - Goût Noix de coco', 'images/-3107-Noix de coco.jpg', 5, 0, 'E-liquides', 29, 3107, 1, 'Ce produit a été fabriqué par notre partenaire Dekang.\r\n\r\nQui est Dekang ?\r\nDekang est tout simplement le leader mondial de la fabrication de l''e-liquide. Étant un des plus anciens acteurs du marché, il dispose d''un savoir-faire unique et d''un panel de saveur extraordinairement vaste.\r\n\r\nDekang est réputé pour son sérieux et la qualité de ces e-liquides.\r\nDisposant d''infrastructures certainement unique au monde sur ce secteur, Dekang garantit une qualité constante de fabrication et une application drastique des normes les plus exigeantes en terme de qualité et de sûreté.\r\n\r\nDekang dispose notamment de la norme GMP, normes américaines allemandes (normes produits alimentaires pharmaceutiques).\r\n\r\nLes avantages Dekang ?\r\n\r\nSi nous avons choisi Dekang c''est avant tout pour la qualité et la sûreté des e-liquides.\r\nDe très (trop) nombreux produits vendus sur le marché actuellement proviennent d''assembleurs dont les conditions de préparation sont totalement opaque.\r\nOn ne peut pas plaisanter avec un produit inhalés par nos clients.\r\nCombien de liquide dis "Français" sont assemblés en "salle propre" respectant la norme GMP ?...', 0, '', 0, 0, 6, 'Tous nos e-liquides existent en 6 ml, 11ml,18 ml et 30ml', '', '', '', '', '', '', '', '', NULL),
(108, 'Batterie Fantaisie Couleur', 'images/-3200-batterie-fantaisie-couleur.jpg', 15, 0, 'Accessoires', 19, 3200, 2, 'Recharger votre e-cigarette grâce à cette batterie fantaisie. \r\nElle s''adapte à tous nos modèles Premium.', 0, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', NULL),
(109, 'Batterie Fantaisie Rouge à pois blancs', 'images/-3201-batterie-fantaisie-rouge-pois-blanc.png', 15, 0, 'Accessoires', 17, 3201, 2, 'Recharger votre e-cigarette grâce à cette batterie fantaisie. \r\nElle s''adapte à tous nos modèles Premium.', 0, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', NULL),
(110, 'Tour de cou', 'images/110-3202-Tour-de-Cou.jpg', 15, 14, 'Accessoires', 19, 3202, 2, 'Ne perdez plus votre e-cigarette et ayez là toujours à porter de main grâce à ce tour de cou.\r\nCe tour de cou s''adapte à tous nos modèles.', 0, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', NULL),
(111, 'Housse de rangement noir', 'images/111-3203-Housse-de-rangement-noir-Patrick-King-Crazy-Vapors.jpg', 20, 0, 'Accessoires', 19, 3203, 2, 'Cette housse remplacera votre ancien paquet de cigarette. Vous pouvez y ranger votre e-cigarette, une batterie de rechange, le chargeur ainsi qu''un atomisateur de rechange.', 0, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 5),
(112, 'EGO case Rose', 'images/112-3204-EGO-Case-Rose.jpg', 22, 0, 'Accessoires', 19, 3204, 2, 'Cette housse remplacera votre ancien paquet de cigarette. Vous pouvez y ranger votre e-cigarette, une batterie de rechange, le chargeur ainsi qu''un atomisateur de rechange.\r\n\r\nCette housse est adaptée à nos modèles EGO.', 0, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 5),
(113, 'E-liquide - Goût Vanille', 'images/-3108-Vanille.jpg', 5, 0, 'E-liquides', 12, 3108, 1, 'Ce produit a été fabriqué par notre partenaire Dekang. \r\n\r\nQui est Dekang ? \r\n\r\nDekang est tout simplement le leader mondial de la fabrication de l''e-liquide. Étant un des plus anciens acteurs du marché, il dispose d''un savoir-faire unique et d''un panel de saveur extraordinairement vaste. Dekang est réputé pour son sérieux et la qualité de ces e-liquides. Disposant d''infrastructures certainement unique au monde sur ce secteur, Dekang garantit une qualité constante de fabrication et une application drastique des normes les plus exigeantes en terme de qualité et de sûreté. Dekang dispose notamment de la norme GMP, normes américaines allemandes (normes produits alimentaires pharmaceutiques). \r\n\r\nLes avantages Dekang ? \r\n\r\nSi nous avons choisi Dekang c''est avant tout pour la qualité et la sûreté des e-liquides. De très (trop) nombreux produits vendus sur le marché actuellement proviennent d''assembleurs dont les conditions de préparation sont totalement opaque. On ne peut pas plaisanter avec un produit inhalés par nos clients. Combien de liquide dis "Français" sont assemblés en "salle propre" respectant la norme GMP ?...', 0, '', 0, 0, 0, 'Tous nos e-liquides existent en 6 ml, 11ml,18 ml et 30ml', '', '', '', '', '', '', '', '', NULL),
(114, 'Coffret Divine Blanc', 'images/114-1520-Coffret-Divine-Blanc.jpg', 60, 42, 'E-cigarettes', 32, 1520, 12, 'Coffret comprenant 2 e-cigarettes Divine couleur blanc avec leurs batteries et atomisateurs ainsi qu''un chargeur USB ou sur secteur. Vous ne risquez plus de tomber en panne !', 0, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', NULL),
(115, 'Coffret Divine Violet', 'images/115-1521-Coffret-Divine-Violet.jpg', 60, 42, 'E-cigarettes', 25, 1521, 12, 'Coffret comprenant 2 e-cigarettes Divine couleur blanc avec leurs batteries et atomisateurs ainsi qu''un chargeur USB ou sur secteur. Vous ne risquez plus de tomber en panne !', 0, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', NULL),
(116, 'Coffret EGO bleue', 'images/116-1522-EGO-bleue-Coffret.jpg', 55, 0, 'E-cigarettes', 25, 1522, 11, 'Coffret comprenant 2 e-cigarettes Divine couleur blanc avec leurs batteries et atomisateurs ainsi qu''un chargeur USB ou sur secteur. Vous ne risquez plus de tomber en panne !', 0, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 5),
(117, 'EGO premium Silver', 'images/117-1523-EGO-Premium-Silver.jpg', 36, 0, 'E-cigarettes', 45, 1523, 6, 'Le Kit e-smart Kanger est destiné aux petits et moyens vapoteurs E-cigarette raffinée, très simple à utiliser et entretenir', 22, 'Acier inoxydable', 59, 79, 5, 'Connecteur 510 réglable', 'Contrôle du tirage (airflow) avec bagues de couleur optionnelles', 'Plateau de construction modèle S ', 'Chambre d''atomisation: Aluminium anodisé Ematal - isolante (voir ci-dessous)', 'Tank: Verre borosilicate dépoli, interchangeable', 'Drip tip custom ', 'Joints de rechange, vis de rechange, clef Allen inclus', '', '', 5);

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
(2, 'PM20', 20),
(5, 'PM10', 50);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE CASCADE,
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `details_commande`
--
ALTER TABLE `details_commande`
  ADD CONSTRAINT `details_commande_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`) ON DELETE CASCADE,
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
