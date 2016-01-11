-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 11, 2016 at 09:07 AM
-- Server version: 5.6.26
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intra42`
--

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Table structure for table `activities_barem_users`
--


-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) NOT NULL,
  `uid` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `uid`) VALUES
(1, 'aemebiku'), (2, 'rbrathie');

-- --------------------------------------------------------

--
-- Table structure for table `answer_threads`
--

CREATE TABLE IF NOT EXISTS `answer_threads` (
  `id` int(10) NOT NULL,
  `answer` text NOT NULL,
  `uid` varchar(255) NOT NULL,
  `id_threads` int(10) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `answer_tickets`
--

CREATE TABLE IF NOT EXISTS `answer_tickets` (
  `id` int(100) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `id_tickets` int(100) NOT NULL,
  `uid_users` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` int(10) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `type`, `date_created`) VALUES
(8, 'infographie', 1, '2016-01-11 18:04:27'),
(9, 'fdf', 1, '2016-01-11 18:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `comment_answer`
--

CREATE TABLE IF NOT EXISTS `comment_answer` (
  `id` int(10) NOT NULL,
  `comment` text NOT NULL,
  `uid` varchar(255) NOT NULL,
  `id_answer_threads` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------








--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(10) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `urlpage` varchar(255) NOT NULL,
  `type` int(10) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=1808 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------



--
-- Table structure for table `souscategories`
--

CREATE TABLE IF NOT EXISTS `souscategories` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_categories` int(10) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE IF NOT EXISTS `threads` (
  `id` int(10) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `uid` varchar(255) NOT NULL,
  `id_categories` int(10) NOT NULL DEFAULT '0',
  `id_souscategories` int(10) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `subject` varchar(200) DEFAULT NULL,
  `id` int(10) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `uid_users` varchar(10) NOT NULL,
  `etat` int(3) NOT NULL,
  `uid_admins` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--




--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer_threads`
--
ALTER TABLE `answer_threads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer_tickets`
--
ALTER TABLE `answer_tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tickets` (`id_tickets`) USING BTREE;

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_answer`
--
ALTER TABLE `comment_answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_answer_threads` (`id_answer_threads`);


--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);



--
-- Indexes for table `souscategories`
--
ALTER TABLE `souscategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categories` (`id_categories`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categories` (`id_categories`,`id_souscategories`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--


--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `answer_threads`
--
ALTER TABLE `answer_threads`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `answer_tickets`
--
ALTER TABLE `answer_tickets`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `comment_answer`
--
ALTER TABLE `comment_answer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;

-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1808;
--
-- AUTO_INCREMENT for table `modules`
--

ALTER TABLE `souscategories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer_tickets`
--
ALTER TABLE `answer_tickets`
  ADD CONSTRAINT `my_id_tickets` FOREIGN KEY (`id_tickets`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inscrit`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
