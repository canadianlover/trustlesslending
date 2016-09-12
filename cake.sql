-- phpMyAdmin SQL Dump
-- version 4.0.10.12
-- http://www.phpmyadmin.net
--
-- Host: 127.11.224.2:3306
-- Generation Time: May 08, 2016 at 03:28 PM
-- Server version: 5.5.45
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cake`
--

-- --------------------------------------------------------

--
-- Table structure for table `collaterial`
--

CREATE TABLE IF NOT EXISTS `collaterial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loan_id` int(11) DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `collaterial` varchar(255) NOT NULL,
  `type` varchar(1) NOT NULL,
  `escrow` int(11) NOT NULL,
  `details` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `collaterial`
--

INSERT INTO `collaterial` (`id`, `loan_id`, `user_id`, `collaterial`, `type`, `escrow`, `details`) VALUES
(4, 3, 1, 'My bitcointalk.org account', 'D', 1, 'The user account tommorisonwebdesign on Bitcointalk, was originally created to launch myself in the computer programming world and has since been used in signature campaigns. ');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE IF NOT EXISTS `deposits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `date` datetime NOT NULL,
  `repay_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lendees`
--

CREATE TABLE IF NOT EXISTS `lendees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lendee_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `loan` (`loan_id`,`user_id`),
  KEY `lendee` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE IF NOT EXISTS `loans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lender_id` int(11) DEFAULT NULL,
  `lendee_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `reason` varchar(255) NOT NULL,
  `collaterial_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lender_id` (`lender_id`,`lendee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `lender_id`, `lendee_id`, `amount`, `reason`, `collaterial_id`) VALUES
(3, NULL, 1, 0.11, '0', 4);

-- --------------------------------------------------------

--
-- Table structure for table `loans_collaterial`
--

CREATE TABLE IF NOT EXISTS `loans_collaterial` (
  `loan_id` int(11) NOT NULL,
  `collaterial_id` int(11) NOT NULL,
  KEY `loan_id` (`loan_id`),
  KEY `collaterial_id` (`collaterial_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `country` varchar(11) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `role` varchar(20) NOT NULL,
  `identification` varchar(11) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `location`, `country`, `phone`, `password`, `created`, `modified`, `role`, `identification`, `type`) VALUES
(1, 'cdntok', 'thomasmorison1@gmail.com', 'Vancouver, Canada', NULL, NULL, '$2y$10$rLcwe78TJ1o4lJ0HpaHOAejdsCBI5f7n.OA5P7PWVGqYYYpKc5U8m', '2015-09-26 20:10:20', '2015-11-11 16:10:03', 'admin', NULL, NULL),
(2, 'testuser', 'tom@tommorisonwebdesign.com', NULL, NULL, NULL, '$2y$10$gM9B4on/eneeTO2It1hzJ.eZJWv7hoY6SsXxz6ONs9QvLTBI7aqv6', '2015-10-31 19:47:47', '2015-10-31 19:47:47', 'User', NULL, NULL),
(3, '', 'test@kkko.com', NULL, NULL, NULL, '$2y$10$U.wSYefezPQthPuEapkole5QuRy06mhNeHMAQMVtIjh7Y73Dk/piu', '2015-12-29 16:54:14', '2015-12-29 16:54:14', 'User', NULL, NULL),
(4, '', 'pierre.barnard1@gmail.com', NULL, NULL, NULL, '$2y$10$s3dASVJBCLqM4SzHLv6NNuHXj9/sMwbI3PuXVTrNK/wlWCjJY8sD6', '2016-03-03 18:55:28', '2016-03-03 18:55:28', 'User', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_collaterial`
--

CREATE TABLE IF NOT EXISTS `users_collaterial` (
  `user_id` int(11) NOT NULL,
  `collaterial_id` int(11) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `collaterial_id` (`collaterial_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_deposits`
--

CREATE TABLE IF NOT EXISTS `users_deposits` (
  `user_id` int(11) NOT NULL,
  `deposit_id` int(11) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `deposit_id` (`deposit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `deposits`
--
ALTER TABLE `deposits`
  ADD CONSTRAINT `deposits_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `lendees`
--
ALTER TABLE `lendees`
  ADD CONSTRAINT `lendee` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `loan` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`);

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_ibfk_1` FOREIGN KEY (`lender_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `loans_collaterial`
--
ALTER TABLE `loans_collaterial`
  ADD CONSTRAINT `loans_collaterial_ibfk_1` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`),
  ADD CONSTRAINT `loans_collaterial_ibfk_2` FOREIGN KEY (`collaterial_id`) REFERENCES `collaterial` (`id`);

--
-- Constraints for table `users_collaterial`
--
ALTER TABLE `users_collaterial`
  ADD CONSTRAINT `users_collaterial_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_collaterial_ibfk_2` FOREIGN KEY (`collaterial_id`) REFERENCES `collaterial` (`id`);

--
-- Constraints for table `users_deposits`
--
ALTER TABLE `users_deposits`
  ADD CONSTRAINT `cakePHP conventipon` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_deposits_ibfk_1` FOREIGN KEY (`deposit_id`) REFERENCES `deposits` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
