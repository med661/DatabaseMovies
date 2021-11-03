-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 11:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ec`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `cid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `author_name` varchar(128) NOT NULL,
  `author_tripcode` varchar(42) DEFAULT NULL,
  `posted_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `author_ip` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments_moderator`
--

CREATE TABLE `blog_comments_moderator` (
  `bid` int(11) NOT NULL,
  `moderator` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(27, 'Adventure'),
(28, 'Animation'),
(29, 'biography'),
(30, 'documentary'),
(31, 'fantasy'),
(33, 'Action');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`) VALUES
(371, 'med ', 's,fdlngksd'),
(372, 'fraj', 'hkf'),
(373, 'fraj', 'ygdyhsduyrtu'),
(374, 'fraj', 'fdhsd'),
(375, 'med', 'JIFOSIPDQJG'),
(376, 'fraj', 'fdhydf'),
(377, 'fraj', 'sfqdgsd'),
(378, 'fraj', 'fsqfqfs');

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(13) NOT NULL,
  `matricule` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `cvweb` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id`, `matricule`, `nom`, `prenom`, `adresse`, `date_naissance`, `email`, `password`, `photo`, `cvweb`, `cv`) VALUES
(9, 'brhevllkjkhjvxl', 'kerglrteuk', 'legkzùm', 'lvgkevlry', '2020-06-10', 'admingdf@admgin.com', 'passwor', 'kk', 'dd', 's'),
(12, 'ezsdfys', 'dhf', 'sdyh', 'dfsyhy', '2020-06-19', 'ahmed@misfs.com', '123456', '', '', ''),
(19, 'bb', 'med ', 'sfar', 'Mahdia', '2020-06-17', 'ahmed@miss.com', '123', '', '', ''),
(20, 'hllhjk', 'fraj', 'fraj', 'SOUSSE', '2020-06-03', 'fraj@jkk.com', '123', '4.png', '', ''),
(21, 'dts', 'sdgg', 'dgsgfd', 'fdgfd', '2020-06-09', 'ahmed@mffgiss.com', '1213', '', '', ''),
(22, '15', 'fdsgqt', 'dsqgtsdf', 'SOUSSE', '2020-06-10', 'fraj@jkk.com', '123fguuuuuuu', 'j', 'hh', 'kjh'),
(27, '45546', 'med', 'SALAH', 'Mahdia', '2020-06-10', 'medDD@sfar.com', '12344', 'j', 'hh', 'kjh');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `shipping` int(11) NOT NULL,
  `tva` int(11) NOT NULL,
  `final_price` float NOT NULL,
  `stock` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `category`, `weight`, `shipping`, `tva`, `final_price`, `stock`) VALUES
(133, 'Fantasy Island', 'A horror adaptation of the popular 70s TV show about a magical island resort.\r\n\r\nRuntime: 109 min\r\nGenre: Adventure, Fantasy, Horror, Mystery, Thriller\r\nActors: Michael Peña, Maggie Q, Lucy Hale, Austin Stowell\r\nRating: \r\nReleased: 2020\r\nLanguage: English', 1, 'fantasy', '300', 123, 1, 125.24, 'https://forja.tn/movie/tt0983946/Fantasy-Island-2020'),
(145, 'The Fault in Our Stars', 'Two teenage cancer patients begin a life-affirming journey to visit a reclusive author in Amsterdam.', 0, 'Action', '300', 123, 1, 0, 'https://forja.tn/movie/tt2582846/The-Fault-in-Our-Stars-2014'),
(150, 'SpiderManInto the SpiderVerse', 'Spider-Man: Into the Spider-Verse\r\nTeen Miles Morales becomes Spider-Man of his reality, crossing his path with five counterparts from other dimensions to stop a threat for all realities.\r\n\r\nRuntime: 117 min\r\nGenre: Animation, Action, Adventure, Comedy, Family, Sci-Fi\r\nActors: Shameik Moore, Jake Johnson, Hailee Steinfeld, Mahershala Ali\r\nRating: \r\nReleased: 2018\r\nLanguage: English, Spanish', 0, 'Action', '300', 123, 1, 0, 'https://forja.tn/movie/tt4633694/Spider-Man-Into-the-Spider-Verse-2018'),
(151, 'Onward', 'Set in a suburban fantasy world, two teenage elf brothers embark on a quest to discover if there is still magic out there.\r\nRuntime: 102 min\r\nGenre: Animation, Adventure, Comedy, Family, Fantasy\r\nActors: Tom Holland, Chris Pratt, Julia Louis-Dreyfus, Octavia Spencer\r\nRating: \r\nReleased: 2020\r\nLanguage: English', 0, 'fantasy', '300', 123, 1, 0, 'https://forja.tn/movie/tt7146812/Onward-2020'),
(153, 'Scoob!', 'Scooby and the gang face their most challenging mystery ever: a plot to unleash the ghost dog Cerberus upon the world. As they race to stop this dogpocalypse, the gang discovers that Scooby has an epic destiny greater than anyone imagined.', 0, 'Adventure', '300', 123, 0, 0, 'https://forja.tn/movie/tt3152592/Scoob-2020'),
(154, 'jgfg', 'tityityo', 645, 'Adventure', '300', 123, 0, 0, 'http://projetweb1.000webhostapp.com/'),
(155, 'fdh', 'fdhs', 86, 'Adventure', '300', 123, 5, 400, 'https://forja.tn/movie/tt7923220/Inheritance-2020'),
(156, 'u(etu', 'sdgsfgd', 87, 'Adventure', '300', 123, 5, 400, 'https://getbootstrap.com/docs/4.4/content/tables/'),
(157, 'sqfjkfjm', 'slkjfqkdlfjdqfjq', 544, 'Adventure', '300', 123, 5, 400, 'http://localhost/cp/index2.php'),
(158, 'gfd', 'dfsh', 77867, 'Adventure', '300', 123, 5, 400, 'https://www.google.com/search?safe=active&rlz=1C1CHBD_frTN898TN898&sxsrf=ALeKk00WOz9vxCFnUHuHvfoAPtTn2qgVLQ%3A1592509186491&ei=AsPrXpzFHY2D1fAP3fqiyAM&q=cr%C3%A9ation+compte+in+english&oq=creer+compte+in+engl&gs_lcp=CgZwc3ktYWIQARgAMgYIABAWEB4yBggAEBYQHjI'),
(159, 'mk', 'ghfklkj', 679, 'Action', '300', 123, 5, 400, 'https://www.google.com/search?q=upload+successful&rlz=1C1CHBD_frTN898TN898&oq=upload+suc&aqs=chrome.1.69i57j0l7.10311j0j9&sourceid=chrome&ie=UTF-8'),
(160, 'ftdufyi', 'dfswhdsgh', 0, 'biography', '', 0, 5, 400, 'https://getbootstrap.com/docs/4.4/content/tables/'),
(161, 'gqfd', 'fsdhgd', 0, 'Adventure', '', 0, 5, 400, 'https://fr.coursera.org'),
(162, 'hgfk', 'fdhs', 55, 'biography', '300', 123, 5, 400, 'https://fr.coursera.org'),
(163, 'LG', 'oihouiyhiuhimhp', 4, 'Adventure', '300', 123, 5, 400, 'https://getbootstrap.com/docs/4.4/content/tables/'),
(166, 'Force of Nature', 'A gang of thieves plan a heist during a hurricane and encounter trouble when a cop tries to force everyone in the building to evacuate.', 0, 'Action', '300', 123, 5, 400, 'https://forja.tn/movie/tt10308928/Force-of-Nature-2020');

-- --------------------------------------------------------

--
-- Table structure for table `weights`
--

CREATE TABLE `weights` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weights`
--

INSERT INTO `weights` (`id`, `name`, `price`) VALUES
(1, '300', 123),
(2, '300', 123),
(4, '300', 123);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `blog_comments_moderator`
--
ALTER TABLE `blog_comments_moderator`
  ADD KEY `blog_comments_moderator` (`bid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weights`
--
ALTER TABLE `weights`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=379;

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `weights`
--
ALTER TABLE `weights`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
