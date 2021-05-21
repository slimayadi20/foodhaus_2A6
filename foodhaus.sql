-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2021 at 02:50 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodhaus`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id_categ` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_categ`, `name`) VALUES
(2, 'COOKING RECIPE'),
(3, 'Events Design'),
(4, 'Restaurant Place');

-- --------------------------------------------------------

--
-- Table structure for table `chefs`
--

CREATE TABLE `chefs` (
  `img_chef` varchar(256) NOT NULL,
  `nom` varchar(256) NOT NULL,
  `descriptions` text NOT NULL,
  `lien_video_chef` varchar(256) NOT NULL,
  `img_video_chef` varchar(256) NOT NULL,
  `nom_plat1_chef` varchar(256) NOT NULL,
  `nom_plat2_chef` varchar(256) NOT NULL,
  `citation_chef` varchar(256) NOT NULL,
  `img_plat1_chef` varchar(256) NOT NULL,
  `img_plat2_chef` varchar(256) NOT NULL,
  `id_chef` int(11) NOT NULL,
  `id_recette` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chefs`
--

INSERT INTO `chefs` (`img_chef`, `nom`, `descriptions`, `lien_video_chef`, `img_video_chef`, `nom_plat1_chef`, `nom_plat2_chef`, `citation_chef`, `img_plat1_chef`, `img_plat2_chef`, `id_chef`, `id_recette`) VALUES
('avatar-02.jpg', 'Paul Boukes', 'Trois étoiles au Guide Michelin pendant 53 ans, de 1965 à sa mort en 2018, il est considéré comme un des plus grands chefs cuisiniers du xxe siècle. Formé par la mère Brazier à la cuisine lyonnaise puis par Fernand Point qu\'il considère comme son mentor, c\'est lui qui fait sortir les chefs de leur cuisine et contribue à leu', 'ipYCvBkdWNI', 'heading-page-04.jpg', 'Pizza', 'Burger', '« Je n’ai jamais fait de nouvelle cuisine, à part une salade de haricots verts qui a laissé tout le monde sur le derrière. La nouvelle cuisine, c‘était rien dans l’assiette, tout dans l’addition ! ».', 'blog-15.jpg', 'burger.jpg', 1, 13),
('avatar-04.jpg', 'Joel Robluchon', 'Joël Robuchon, né le 7 avril 1945 à Poitiers (France) et mort le 6 août 2018 à Genève (Suisse), est un chef cuisinier français.  Influent pionnier médiatique de la nouvelle cuisine, auteur d\'ouvrages culinaires de référence et dirigeant fondateur d\'un imp', 'JtAF2S5iO2A', 'heading-page-01.jpg', 'burger', 'pizza', '“On ne peut pas faire de cuisine si l\'on n\'aime pas les gens!”', 'burger.jpg', 'blog-06.jpg', 2, 14),
('avatar-05.jpg', 'Gaston Lenôtre', ' Gaston Lenôtre, né le 28 mai 1920 à Saint-Nicolas-du-Bosc (Eure) et mort le 8 janvier 2009 à Sennely1 (Loiret) , est un pâtissier français, chef d\'entreprise et auteur de plusieurs livres de cuisine. Professionnels et médias ont salué en lui l\'un des grands innovateurs dans l\'art de la pâtisserie. Son École Lenôtre, à Plaisir (Yvelines), près de Paris, a formé à la pâtisserie et à la confiserie plusieurs générations de pâtissiers et de cuisiniers. Son neveu, Patrick Lenôtre, est également un pât Faire le poids face aux autres traiteurs, voilà qui stimule son audace, quitte à le mettre financièrement en danger', '6K-Y09mZB0c', 'bg-title-page-02.jpg', 'crevette', 'pizza', '“On ne peut pas faire de cuisine si l\'on n\'aime pas les gens!”', 'blog-14.jpg', 'blog-06.jpg', 3, 13),
('heading-page-04.jpg', 'Alain Ducasse', ' Alain Ducasse a eu trois étoiles au Guide Michelin avec trois établissements : Le Louis XV à l’hôtel de Paris Monte-Carlo (en 1990), le Alain Ducasse au Plaza Athénée à Paris (en 1997) et le Alain Ducasse at The Dorchester à Londres (en 2010). Il est président de Châteaux et Hôtels Collection depuis 1999 (près de 700 établissements) et dirigeant homme d\'affaires consu', 'sTkJtZPi-SY', 'bg-title-page-03.jpg', 'burger', 'brika', '« En cuisine, s\' il y avait des secrets dans le passé, il n\' y a plus de secrets aujourd\' hui, parce que je pense que dans la notion de transmettre et de partager, les cuisiniers ont su le faire mieux que d\' autres métiers. » ', 'burger.jpg', 'brika.png', 4, 14),
('avatar-01.jpg', 'PIERRE GAGNAIRE', 'PIERRE GAGNAIRE Fils d\'un restaurateur réputé dirigeant le Clos Fleuri à Saint-Priest-en-Jarez, commune limitrophe de Saint-Étienne, Pierre Gagnaire commence à travailler comme pâtissier avant de passer un été dans le restaurant de Paul Bocuse1. Il reprend pendant six ans le restaurant de son père avant d\'ouvrir en 1981 son premier restaurant à Saint-Étienne, rue Georges Teyssier, puis rue de la Richelandière1.', 'Gj9jDXjFzEQ', 'bg-title-page-03.jpg', 'Pizza', 'Burger', '\"La cuisine est multi-sensorielle. Elle s\'adresse à l\'oeil, à la bouche, au nez, à l\'oreille et à l\'esprit. Aucun art ne possède cette complexité\"', 'blog-06.jpg', 'burger.jpg', 5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `idCommande` int(100) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `codePostal` int(30) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `nomCarte` varchar(30) NOT NULL,
  `numCarte` int(30) NOT NULL,
  `moisExp` varchar(30) NOT NULL,
  `anneeExp` int(30) NOT NULL,
  `cvv` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`idCommande`, `nom`, `email`, `adresse`, `codePostal`, `pays`, `ville`, `nomCarte`, `numCarte`, `moisExp`, `anneeExp`, `cvv`) VALUES
(114, 'a edzq', 'wajih.tlili@esprit.tn', 'Ecole 1er juin tozeur', 2200, 'wvx', 'Tozeur', 'wajih', 57, 'eaz', 1, 83);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `idcom` int(11) NOT NULL,
  `message` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `nomc` varchar(50) NOT NULL,
  `imgpath` varchar(100) NOT NULL,
  `nomf` varchar(50) NOT NULL,
  `lieu` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`id`, `nomc`, `imgpath`, `nomf`, `lieu`, `date`, `prix`) VALUES
(1, 'Pizza Home Made', 'blog-06.jpg', 'ALEX', 'Farm ranch Ghazala', '2021-10-10', 50),
(2, 'Burger authentique ', 'burger.jpg', 'Giada ', 'le Zink', '2023-05-10', 75),
(3, 'Cuisine Tunisienne', 'brika.png', 'ALEX', 'Dar Zarouk', '2021-04-15', 60),
(4, 'Tacos Mexicain', 'tacos.jpg', 'Giada ', 'Tacos Chanebe ennaser', '2021-10-10', 80);

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

CREATE TABLE `evenement` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `nbplaces` int(11) NOT NULL,
  `date` varchar(111) NOT NULL,
  `description` longtext NOT NULL,
  `img` text NOT NULL,
  `adress` varchar(100) NOT NULL,
  `id_categ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`id`, `title`, `nbplaces`, `date`, `description`, `img`, `adress`, `id_categ`) VALUES
(1, 'Tabass', 197, '2021-07-01', 'FOURCHETTE DE PRIX 41 TND - 68 TND CUISINES Fruits de mer & Poisson, Européenne, Tunisienne, Arabe RÉGIMES SPÉCIAUX Végétariens bienvenus, Choix végétaliens, Halal', 'booking-03.jpg', 'Dar Zarouk', 2),
(2, 'Beach Party', 147, '2021-06-02', 'A beach party theme can be as sophisticated and glamorous as you want it to be in order to give ample space for relaxed discussion, mingling, and entertainment. It\'s also a versatile theme and can easily be made to cater to a wide variety of events and audiences.', 'photo-gallery-thumb-15.jpg', 'Hammamet', 3),
(3, 'soirée ramadanesque', 174, '2021-06-03', 'venez et degustez nos delicieuses gateaux dans un lieux charmant', 'event-05.jpg', 'Tunis', 2);

-- --------------------------------------------------------

--
-- Table structure for table `e_mails`
--

CREATE TABLE `e_mails` (
  `id_mail` int(11) NOT NULL,
  `msg_mail` varchar(255) NOT NULL,
  `time_mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `formateur`
--

CREATE TABLE `formateur` (
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `specialite` varchar(100) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `formateur`
--

INSERT INTO `formateur` (`nom`, `prenom`, `id`, `specialite`, `image`) VALUES
('ALEX', 'Hunter', 3, 'american chef', 'avatar-05.jpg'),
('Giada ', 'De Laurentiis', 1, 'Italian-American chef', 'event-06.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `globe`
--

CREATE TABLE `globe` (
  `id` int(11) NOT NULL,
  `lang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `globe`
--

INSERT INTO `globe` (`id`, `lang`) VALUES
(1, 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dir` varchar(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `email`, `dir`, `name`, `price`) VALUES
(51, 'admin@gmail.com', 'avatar-05.jpg', 'admin', 1),
(52, 'admin@gmail.com', 'avatar-02.jpg', 'admin', 15);

-- --------------------------------------------------------

--
-- Table structure for table `livraisons`
--

CREATE TABLE `livraisons` (
  `idLivraison` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL,
  `nomLivreur` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `etat` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `livraisons`
--

INSERT INTO `livraisons` (`idLivraison`, `idCommande`, `nomLivreur`, `date`, `etat`) VALUES
(7, 114, 'test', '2020-10-10', 'Arrivée');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `idMenu` int(11) NOT NULL,
  `id` int(5) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `entrees` varchar(100) NOT NULL,
  `platsPrincipal` varchar(100) NOT NULL,
  `dessert` varchar(100) NOT NULL,
  `Boisson` varchar(100) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idMenu`, `id`, `nom`, `entrees`, `platsPrincipal`, `dessert`, `Boisson`, `prix`) VALUES
(1, 1, 'Menu', 'Salade', 'Steak', 'Legumes', 'Coca', 100),
(2, 2, 'Menu', 'Salade', 'Burger', 'Chocolat', 'Fanta', 70),
(3, 3, 'Menu', 'Salade', 'Couscous', 'Glace', 'jus d \'orange', 45);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `ms_id` int(11) NOT NULL,
  `ms_username` varchar(255) NOT NULL,
  `ms_usermail` varchar(255) NOT NULL,
  `ms_detail` text NOT NULL,
  `ms_date` varchar(255) NOT NULL,
  `ms_status` varchar(255) NOT NULL,
  `ms_state` int(11) NOT NULL,
  `reply` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`ms_id`, `ms_username`, `ms_usermail`, `ms_detail`, `ms_date`, `ms_status`, `ms_state`, `reply`) VALUES
(6, 'food haus', 'foodhaus.esprittn@gmail.com', 'test', 'Fri, May, 2021 at 01:08 AM', 'Processed', 1, 'test received'),
(7, 'food haus', 'foodhaus.esprittn@gmail.com', 'test', 'Fri, May, 2021 at 01:14 AM', '', 0, ''),
(8, 'wajih', 'wajih.tlili@esprit.tn', 'test', 'Fri, May, 2021 at 01:20 AM', 'Processed', 1, 'ok'),
(9, 'wajih', 'wajih.tlili@esprit.tn', 'rtes', 'Fri, May, 2021 at 01:23 AM', 'Processed', 1, 'dsq');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `id_participant` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`id_participant`, `name`, `mail`, `id`) VALUES
(1, 'Slim', 'slim.ayadi@esprit.tn', 1),
(2, 'Karim', 'karim.trabelsi1@esprit.tn', 2),
(3, 'omar', 'omar.nouri@gmail.com', 3),
(4, 'food haus', 'wajih.tlili@esprit.tn', 3),
(5, 'food haus', 'wajih.tlili@esprit.tn', 1),
(6, 'food haus', 'wajih.tlili@esprit.tn', 1),
(7, 'food haus', 'wajih.tlili@esprit.tn', 1),
(8, 'food haus', 'wajih.tlili@esprit.tn', 2),
(9, 'food haus', 'wajih.tlili@esprit.tn', 2),
(10, 'food haus', 'wajih.tlili@esprit.tn', 2);

-- --------------------------------------------------------

--
-- Table structure for table `recette`
--

CREATE TABLE `recette` (
  `nom_recette` varchar(256) NOT NULL,
  `id_recette` int(11) NOT NULL,
  `img_recette` varchar(256) NOT NULL,
  `descprition_recette` text NOT NULL,
  `temp_recette` varchar(256) NOT NULL,
  `type_recette` varchar(256) NOT NULL,
  `lien_video_recette` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recette`
--

INSERT INTO `recette` (`nom_recette`, `id_recette`, `img_recette`, `descprition_recette`, `temp_recette`, `type_recette`, `lien_video_recette`) VALUES
('Crevettes', 13, 'blog-14.jpg', 'ÉTAPE 1 Lavez et essuyez les crevettes. Faites chauffer 4 cuillères à soupe d\'huile dans 1 grande poêle. Ajoutez les crevettes et faites les cuire 5 mn de chaque côté puis sortez les de la poêle.  ÉTAPE 2 Passez l\'ail au mixeur, le persil et le piment doux.  ÉTAPE 3 Dans la poêle, versez le reste de d\'huile puis ajoutez l\'ail, le persil et le piment. Remuez bien, pour que l\'ail soit cuit mais non brûlé.  ÉTAPE 4 Remettez les crevettes à chauffer. Salez, poivrez et servez chaud.', '25', 'plat de consistance ', 'd4wL2UGx2xs'),
('Burger', 14, 'burger.jpg', 'Voici une mini-série en 2 épisodes (ah ah ah) intitulée « Je fais mes burgers maison ». Oui, chez vous, réalisez les pains à burger (ou buns) avec cette recette facile, et garnissez vos burgers avec ce que vous aimez. Dans cette recette, j’utilise du boeuf avec des herbes et des épices, des oignons caramélisés, du cheddar, tomates et pousses d’épinard frais. N’hésitez pas à vous faire plaisir avec cette recette de burgers maison, tant au niveau du pain (en ajoutant des graines, des épices comme ', '30', 'sandwich', 'DcqyyCtVf-U'),
('Pizza', 15, 'blog-06.jpg', 'Personnellement, mes meilleures soirées entre amis ou en famille se font en général autour de pizzas ! J’adore en faire, avec la pâte (parfois fine et croustillante, j’aime aussi la pâte à pizza façon « pain » plus épaisse). Voici ma recette personnelle (je sais qu’il en existe des centaines), et aussi ma garniture préférée : sauce tomate aux herbes maison, mozzarella, tomates fraîches, jambon cru italien et de la roquette fraîche (du basilic ça aurait été aussi canon).  La pâte est très rapide ', '20', 'Cuisine italienne', 'luth_twr4Yg');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `idReservation` int(11) NOT NULL,
  `resto` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `heure` varchar(100) NOT NULL,
  `person` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`idReservation`, `resto`, `date`, `heure`, `person`, `nom`, `telephone`, `email`) VALUES
(17, 'Le Paradiso', '29/05/2021', '10 am', '2', 'wajih', 92606145, 'wajih.tlili@esprit.tn');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `nom` varchar(199) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `nom`, `contact`, `email`, `adresse`, `type`, `description`, `image`) VALUES
(1, ' Le Paradiso', 71151310, 'leParadiso@gmail.com', '16 Avenue Des Etats Unis, Tunis 1002', 'Food', 'rated 4 of 5 on Tripadvisor and ranked #23 of 315 restaurants in Tunis.rated 4 of 5 on Tripadvisor and ranked #23 of 315 restaurants in Tunis.', 'blog-13.jpg'),
(2, 'Tito\'s Food', 21459865, 'TitosFood@gmail.com', 'Rue Berzinji, Tunis', 'fastfood', 'Tito\'s Food, #15 among Tunis fast food: 23 reviews by visitors and 20 detailed photos. Find on the map and call to book a table.', 'blog-04.jpg'),
(3, 'Chili\'s America\'s Grill', 71458796, 'chili\'sAmericasgril@gmail.com', 'Rue Azzouz Rebaï, Tunis', 'fastfood', 'Chili\'s American Grill, Tunis: See 127 unbiased reviews of Chili\'s American Grill, rated 3.5 of 5 on Tripadvisor and ranked #28 of 315 restaurants in Tunis.', 'bg-intro-04.jpg'),
(4, 'El Ali', 71321927, 'Elali@gmail.com', ' 45 bis rue Jemaâ Zitouna la Médina, Tunis 1006 Tunisie', 'caffe restau', 'FOURCHETTE DE PRIX 41 TND - 68 TND CUISINES Fruits de mer & Poisson, Européenne, Tunisienne, Arabe RÉGIMES SPÉCIAUX Végétariens bienvenus, Choix végétaliens, Halal', 'bg-01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stars`
--

CREATE TABLE `stars` (
  `id` int(11) NOT NULL,
  `rateIndex` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stars`
--

INSERT INTO `stars` (`id`, `rateIndex`) VALUES
(4, 3),
(5, 4),
(6, 1),
(7, 5),
(8, 1),
(9, 4),
(10, 5),
(11, 5);

-- --------------------------------------------------------

--
-- Table structure for table `starz`
--

CREATE TABLE `starz` (
  `id` int(11) NOT NULL,
  `rateIndex` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `starz`
--

INSERT INTO `starz` (`id`, `rateIndex`) VALUES
(4, 3),
(5, 4),
(6, 1),
(7, 2),
(8, 5),
(9, 3),
(10, 2),
(11, 4),
(12, 5),
(13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_nickname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_photo` text NOT NULL,
  `registered_on` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_nickname`, `user_email`, `user_password`, `user_photo`, `registered_on`, `user_role`, `user_status`) VALUES
(1, 'food haus', 'foodhaus', 'foodhaus.esprittn@gmail.com', '$2y$10$YwDvnwgn9uCVjTW9lhR1meaPppXmUIfh07UDhBP64Cb872J1gbwby', 'default-logo.png', 'Thu, May, 2021 at 08:54 PM', 'admin', 0),
(2, 'wajih', 'tlili', 'wajih.tlili@esprit.tn', '$2y$10$VY2hOHh8RRB23n7nL5fX5OKOA9Opr.k4ISIZPzXlcQAK74y15jOYO', 'default.png', 'May 5, 2021 at 09:57 PM', 'admin', 0),
(3, 'slim', 'ayadi', 'slim.ayadi@esprit.tn', '$2y$10$0OnIC9OAzM/T1ggbjToGvuXhHvDYFJKeW66tYvlmqw5Q2MXvLduT2', 'hello.png', 'May 5, 2021 at 09:58 PM', 'subscriber', 0),
(4, 'omar', 'Nouri', 'omar.nouri@esprit.tn', '$2y$10$YdlPLmVYiyF1SxddCb3N0u0l6okrwFMbMotl.n5MMHtN/LkZv6ShG', 'default.png', 'May 5, 2021 at 09:58 PM', 'subscriber', 0),
(5, 'karim', 'trabelsi', 'karim.trabelsi1@esprit.tn', '$2y$10$PKKRJ7N31FmjcdItovY5MOGV6Ftrr2h30NAHbu6nJR.lEibJ.Tr.i', 'default.png', 'May 5, 2021 at 09:59 PM', 'subscriber', 0),
(6, 'mohamedzied', 'harzallah', 'mohamedzied.harzallah@esprit.tn', '$2y$10$GriXsMkPypnLZzkxG6T4W.L5OL4x.xWRCe5vgqpe7SKU7R0j2fcFG', 'default.png', 'May 5, 2021 at 09:59 PM', 'subscriber', 0),
(7, 'jihed', 'Mohamed', 'jihed.mohamed@esprit.tn', '$2y$10$WAqg4rmY9ckdcIDLfUEcHui6hc2MhaKAglYfHp1wjYtN4INrO/jLK', 'default.png', 'May 5, 2021 at 09:59 PM', 'subscriber', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categ`);

--
-- Indexes for table `chefs`
--
ALTER TABLE `chefs`
  ADD PRIMARY KEY (`id_chef`),
  ADD KEY `id_recette` (`id_recette`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idcom`);

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD KEY `cours_ibfk_1` (`nomf`);

--
-- Indexes for table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categ` (`id_categ`);

--
-- Indexes for table `e_mails`
--
ALTER TABLE `e_mails`
  ADD PRIMARY KEY (`id_mail`);

--
-- Indexes for table `formateur`
--
ALTER TABLE `formateur`
  ADD PRIMARY KEY (`nom`);

--
-- Indexes for table `globe`
--
ALTER TABLE `globe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livraisons`
--
ALTER TABLE `livraisons`
  ADD PRIMARY KEY (`idLivraison`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idMenu`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ms_id`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id_participant`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`id_recette`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idReservation`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stars`
--
ALTER TABLE `stars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `starz`
--
ALTER TABLE `starz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chefs`
--
ALTER TABLE `chefs`
  MODIFY `id_chef` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `idcom` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `e_mails`
--
ALTER TABLE `e_mails`
  MODIFY `id_mail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `globe`
--
ALTER TABLE `globe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `livraisons`
--
ALTER TABLE `livraisons`
  MODIFY `idLivraison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `idMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `id_participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `recette`
--
ALTER TABLE `recette`
  MODIFY `id_recette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idReservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130000;

--
-- AUTO_INCREMENT for table `stars`
--
ALTER TABLE `stars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `starz`
--
ALTER TABLE `starz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
