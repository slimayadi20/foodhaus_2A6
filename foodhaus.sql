-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2021 at 08:15 PM
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
('avatar-05.jpg', 'testtest', 'test', 'test', 'avatar-05.jpg', 'test', 'test', 'test', 'avatar-05.jpg', 'avatar-05.jpg', 35, 12),
('avatar-01.jpg', 'test', 'test', 'test', 'avatar-01.jpg', 'test', 'test', 'test', 'avatar-01.jpg', 'avatar-01.jpg', 36, 12),
('blog-02.jpg', 'a', 'a', 'a', 'bg-intro-02.jpg', 'a', 'a', 'a', 'bg-intro-02.jpg', 'bg-intro-02.jpg', 37, 12);

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
(97, '', 'admin@gmail.com', '', 0, '', '', 'slim', 0, '', 0, 12);

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
(5, 'testtest', 'avatar-05.jpg', 'testtest', 'test', '1199-10-10', 10);

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
(9, 'testtest', 100, '1999-10-10', 'test', 'avatar-05.jpg', 'testtest', 2),
(10, 'test', 10, '1010-10-10', 'From food to drinks and even music, we covered all...', 'blog-03.jpg', 'fun', 2),
(244, 'Beach Party', 3222, '2021-05-29', 'profitez d\'une journÃ©e estivale avec nos plats ', 'photo-gallery-06.jpg', 'yuka ', 3);

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
(5, 'test', 'May 5, 2021 at 03:07 PM');

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
('testtest', 'test', 5, 'test', 'avatar-05.jpg');

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
(5, 97, 'test', '1111-11-11', 'Arrivée');

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
  `prix` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idMenu`, `id`, `nom`, `entrees`, `platsPrincipal`, `dessert`, `Boisson`, `prix`, `image`) VALUES
(1, 5, 'aaaaaaaaaaa', 'anzjek', 'eazjnk', 'njkaz', 'zkjane', 1, 'avatar-02.jpg'),
(2, 6, 'salamao', 'adqs', 'sgd', 'dsf', 'dsgf', 15, 'avatar-02.jpg');

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
(4, 'admin', 'admin@gmail.com', 'test', 'Wed, May, 2021 at 02:05 PM', 'Processed', 1, 'receievdd');

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
(5, 'test', 'test@gmail.com', 9);

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
('testtest', 12, 'avatar-05.jpg', 'test', '9', 'test', 'test');

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
(15, 'salami', '19/05/2021', '10 am', '5', 'wajih', 963, 'admin@gmail.com');

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
(6, 'salami', 9696, 'salamo@gmail.com', 'esprit', 'fastfood', 'delicious', 'avatar-02.jpg'),
(5, 'testtest', 5, 'test@gmail.com', 'test', 'test', 'test', 'avatar-05.jpg'),
(3, 'jambon', 5, 'fq@galik.com', 'Ecole 1er juin tozeur', 'fastfood', 'test', 'avatar-05.jpg');

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
(1, 5);

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
(11, 4);

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
(5, 'admin', 'admin', 'admin@gmail.com', '$2y$10$SZuwL2ONAAGH3vsY/2JKXeg9E6NuDKUGZVNyekMpavp3XlF3M20Wu', 'default-logo.png', 'Tue, May, 2021 at 02:34 PM', 'admin', 0),
(11, 'testtest', 'test', 'wajih.tlili@esprit.tn', '$2y$10$n.d9TcBjkR1Xwk4la6.7zuKOo1/YutxTgnZP/7Bm7MXIZttNV7cKO', 'avatar-01.jpg', 'May 5, 2021 at 03:03 PM', 'admin', 0);

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
  MODIFY `id_chef` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `idcom` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `e_mails`
--
ALTER TABLE `e_mails`
  MODIFY `id_mail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `globe`
--
ALTER TABLE `globe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `livraisons`
--
ALTER TABLE `livraisons`
  MODIFY `idLivraison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `idMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `id_participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1111111114;

--
-- AUTO_INCREMENT for table `recette`
--
ALTER TABLE `recette`
  MODIFY `id_recette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idReservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130000;

--
-- AUTO_INCREMENT for table `stars`
--
ALTER TABLE `stars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `starz`
--
ALTER TABLE `starz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
