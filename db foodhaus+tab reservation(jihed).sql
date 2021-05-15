-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 01:16 PM
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
  `descriptions` varchar(256) NOT NULL,
  `lien_video_chef` varchar(256) NOT NULL,
  `img_video_chef` varchar(256) NOT NULL,
  `nom_plat1_chef` varchar(256) NOT NULL,
  `nom_plat2_chef` varchar(256) NOT NULL,
  `citation_chef` varchar(256) NOT NULL,
  `img_plat1_chef` varchar(256) NOT NULL,
  `img_plat2_chef` varchar(256) NOT NULL,
  `id_chef` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chefs`
--

INSERT INTO `chefs` (`img_chef`, `nom`, `descriptions`, `lien_video_chef`, `img_video_chef`, `nom_plat1_chef`, `nom_plat2_chef`, `citation_chef`, `img_plat1_chef`, `img_plat2_chef`, `id_chef`) VALUES
('zizo', 'zizo', 'zizo', 'zizo', 'zizo', 'zizo', 'zizo', 'ziza', 'zizo', 'zizo', 2),
('avatar-01.jpg', 'ziza', 'sexy boy', 'uzieana', 'jaznke', 'zekajn', 'kjazen', 'ezajh', 'zeajkne', 'aznjk', 12),
('avatar-01', 'jnerk', 'kjnezk', 'knjezkjn', 'kjnazekn', 'kjanzekank', 'nazke', 'nkzeankn', 'kzenekank', 'anjzknakezn', 2989),
('avatar-01', 'IEZJI', 'OJOEZJAIOJI', 'OIJZOEAJO', 'JOEAZJOJ', 'OJEZOIJOZJ', 'OJEZOJOEAZJO', 'JOEAZJOAZJO', 'JOEZJOJO', 'JOAZIJOEAZJO', 88),
('avatar-04.jpg', 'slim', 'nee en 109328', 'sTkJtZPi-SY', 'avatar-04.jpg', 'pizza', 'hamburger', 'lavie est comme une bycyclette', 'blog-06.jpg', 'burger.jpg', 2990);

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
(87, 'HAHAHAHA', 'karim.trabelsi1@esprit.tn', 'home', 10001, 'Rue mahdia', 'Sfax', 'Karim Trabelsi', 2313215, 'Janvier', 2018, 321999999),
(90, 'TEST MAIL', 'karim.trabelsi1@esprit.tn', 'home', 10001, 'Rue mahdia', 'Sfax', 'Karim', 3215, 'Mars', 2020, 654),
(91, 'Pizza', 'karim.trabelsi1@esprit.tn', 'home', 10001, 'Tunisie', 'Ariana', 'Trabelsi Karim', 2147483647, 'Avril', 2021, 321);

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
(111, 'Spaghetti fait maison !', 'images\\spaghetti.jfif', 'ahmed ', 'farm ranch pizza ennasr', '2021-05-31', 50),
(12544789, 'Burger authentique ', 'images\\burger.jpg', 'Omar ', 'le zink', '2021-05-21', 200),
(38883, 'Tacos mexicain', 'images\\tacos.jpg', 'majdi', 'senor tacos ennasr', '2021-05-20', 80),
(3, 'glace fait maison', 'images\\glace.jpg', 'slim', 'parad\'ice ennasr', '2021-05-27', 200),
(226882, 'faire un sushi', 'images\\sushi.jpg', 'sokoyama', 'go sushi', '2021-05-20', 500),
(1255, 'pizza', 'images\\pizza.jpg', 'zied', 'pizza a gram sfax', '2021-05-20', 50),
(81888, 'pizza', 'images\\balti.jpg', 'sokoyama', 'Lac 2', '2021-05-21', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

CREATE TABLE `evenement` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `nbplaces` int(11) NOT NULL,
  `date` varchar(111) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `img` text NOT NULL,
  `adress` varchar(100) NOT NULL,
  `id_categ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`id`, `title`, `nbplaces`, `date`, `description`, `img`, `adress`, `id_categ`) VALUES
(1, 'ramadhan', 12, '2021-05-16', 'ramadhan moubarek', 'blog-03.jpg', 'Fruits et LÃ©gumes Said', 4),
(2132, 'excursion', 22, '2021-05-29', 'excursion natale', 'bg-intro-03.jpg', 'Fruits et LÃ©gumes Said', 2);

-- --------------------------------------------------------

--
-- Table structure for table `e_mails`
--

CREATE TABLE `e_mails` (
  `id_mail` int(11) NOT NULL,
  `msg_mail` varchar(255) NOT NULL,
  `time_mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `e_mails`
--

INSERT INTO `e_mails` (`id_mail`, `msg_mail`, `time_mail`) VALUES
(1, 'test', '10/10/2010'),
(2, 'test2 ', 'May 5, 2021 at 02:05 PM');

-- --------------------------------------------------------

--
-- Table structure for table `formateur`
--

CREATE TABLE `formateur` (
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `specialite` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `formateur`
--

INSERT INTO `formateur` (`nom`, `prenom`, `id`, `specialite`) VALUES
('ahmed ', 'masmoudi', 1457889, 'cuisine syrienne'),
('majdi', 'triki', 14587, 'cuisine japonaise'),
('Omar ', 'nouri', 38883, 'cuisine italienne'),
('slim', 'ayadi', 54258, 'patisserie'),
('sokoyama', 'bayaki', 8675681, 'cuisine japonaise'),
('zied', 'harzallah', 11140006, 'ravioli');

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
  `dir` varchar(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `dir`, `name`, `price`) VALUES
(26, 'images\\photo-gallery-thumb-18.jpg', 'Consectetur', 22),
(27, 'sli', 'sli', 1),
(28, 'sli', 'sli', 1),
(29, 'sli', 'sli', 1),
(30, 'sli', 'sli', 1),
(31, 'sli', 'sli', 1),
(32, 'sli', 'sli', 1),
(33, 'sli', 'sli', 1);

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
(1, 84, 'nezaoi', '2021-05-29', 'En cours');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `idMenu` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `entrees` varchar(100) NOT NULL,
  `platsPrincipal` varchar(100) NOT NULL,
  `dessert` varchar(100) NOT NULL,
  `Boisson` varchar(100) NOT NULL,
  `prix` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idMenu`, `id`, `nom`, `entrees`, `platsPrincipal`, `dessert`, `Boisson`, `prix`, `image`) VALUES
(111, 1234, 'aaaaaaaaaaa', 'anzjek', 'eazjnk', 'njkaz', 'zkjane', 1, ''),
(12, 123, 'sli', 'kanzj', 'kzenja', 'kjnza', 'kjnza', 1, ''),
(123339, 129999, 'nzekj', 'kjnazkenk', 'jneakznkn', 'kneakn', 'knkazne', 7, '');

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
(1, 'username', 'mail', 'detail', 'date', 'stau=tus', 0, 'replt');

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

-- --------------------------------------------------------

--
-- Table structure for table `recette`
--

CREATE TABLE `recette` (
  `nom_recette` varchar(256) NOT NULL,
  `id_recette` int(11) NOT NULL,
  `img_recette` varchar(256) NOT NULL,
  `descprition_recette` varchar(256) NOT NULL,
  `temp_recette` varchar(256) NOT NULL,
  `type_recette` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recette`
--

INSERT INTO `recette` (`nom_recette`, `id_recette`, `img_recette`, `descprition_recette`, `temp_recette`, `type_recette`) VALUES
('zizo', 2, 'zizo naked', 'zizo sexy boy', '30', 'stripties');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `idReservation` int(11) NOT NULL,
  `resto` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `heure` varchar(100) NOT NULL,
  `person` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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
(123, 'sli', 11, 'aznek', 'saintgeorge', 'anjzek', 'rentree scolaire', 'Array'),
(129999, 'sli', 11, 'slimayadi59@yahoo.fr', 'villeneuve saint george', 'anjzek', 'eknjk', 'Array'),
(88, 'nza', 99, 'slim.ayadi@esprit.tn', 'zeakn', 'keazjn', 'enaz', 'Array');

-- --------------------------------------------------------

--
-- Table structure for table `stars`
--

CREATE TABLE `stars` (
  `id` int(11) NOT NULL,
  `rateIndex` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stars`
--

INSERT INTO `stars` (`id`, `rateIndex`) VALUES
(4, 3),
(5, 4),
(6, 2),
(7, 5),
(8, 1),
(9, 1),
(10, 5),
(11, 5),
(12, 5),
(13, 5),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 2),
(19, 1),
(20, 2),
(21, 4),
(22, 5),
(23, 3),
(24, 4),
(25, 5);

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
(2, 'Karim Trabelsi', 'Karim', 'admin@esprit.tn', '$2y$10$chzsoB5DzLiPL4RYOC3YBu6WOjPP8CZiXnVm0rtDf9t/gO7ulOAiy', 'default-logo.png', 'Tue, May, 2021 at 04:55 PM', 'admin', 0),
(3, 'Karim Trabelsi', 'Karim', 'karim.trabelsi1@esprit.tn', '$2y$10$tb.2AU.3ZdFVYMmNxQiooeGudbc8pcrGgyzDGhjKfDgIVNrx0VQ6K', 'default-logo.png', 'Wed, May, 2021 at 01:03 AM', 'admin', 0);

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
  ADD PRIMARY KEY (`id_chef`);

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
  MODIFY `id_categ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chefs`
--
ALTER TABLE `chefs`
  MODIFY `id_chef` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2991;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `idcom` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `e_mails`
--
ALTER TABLE `e_mails`
  MODIFY `id_mail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `globe`
--
ALTER TABLE `globe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `livraisons`
--
ALTER TABLE `livraisons`
  MODIFY `idLivraison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `id_participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1111111114;

--
-- AUTO_INCREMENT for table `recette`
--
ALTER TABLE `recette`
  MODIFY `id_recette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idReservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130000;

--
-- AUTO_INCREMENT for table `stars`
--
ALTER TABLE `stars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`nomf`) REFERENCES `formateur` (`nom`);

--
-- Constraints for table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `participant_ibfk_1` FOREIGN KEY (`id`) REFERENCES `evenement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
