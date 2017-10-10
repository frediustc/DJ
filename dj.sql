-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2017 at 06:46 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dj`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipimg`
--

CREATE TABLE IF NOT EXISTS `equipimg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eqid` int(11) NOT NULL,
  `imgname` varchar(100) NOT NULL,
  `creation` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE IF NOT EXISTS `equipments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `dj` int(11) NOT NULL,
  `creation` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`id`, `name`, `description`, `price`, `dj`, `creation`) VALUES
(8, 'Projectors', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis', 20, 3, '2017-10-07'),
(9, 'Speakers And Microphone', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis', 55, 4, '2017-10-07'),
(10, 'Mixer Table with CD', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis', 50, 2, '2017-10-07'),
(11, 'Platine With Screen', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis', 150, 4, '2017-10-07'),
(12, 'Master Mix Set', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis', 250, 3, '2017-10-07');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `sd` date NOT NULL,
  `ed` date NOT NULL,
  `status` enum('active','pending','denied') NOT NULL,
  `duration` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `pid`, `uid`, `sd`, `ed`, `status`, `duration`) VALUES
(2, 8, 5, '2017-10-09', '2017-10-09', 'active', 1),
(5, 9, 5, '2017-02-13', '2017-02-16', 'active', 4),
(11, 10, 5, '2017-11-01', '2017-11-03', 'pending', 3),
(16, 12, 5, '2017-10-02', '2017-10-03', 'denied', 2),
(20, 12, 5, '2017-10-09', '2017-10-18', 'pending', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `usertype` int(11) NOT NULL,
  `creation` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `gender`, `usertype`, `creation`) VALUES
(1, 'Admin', 'admin@admin.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Male', 3, '2017-10-05 14:26:26'),
(2, 'Fredius Tout Court', 'frediustc@gmail.com', '9dfde458b237e79c1ca78f48d3f1e2eab7db37f9', 'Male', 2, '2017-10-06 11:22:59'),
(4, 'Andreas Tout Court Jr', 'andytc@gmail.com', '9dfde458b237e79c1ca78f48d3f1e2eab7db37f9', 'Female', 2, '2017-10-06 11:24:01'),
(5, 'Fredius Dro', 'ddfj@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Male', 1, '2017-10-07 22:41:01');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE IF NOT EXISTS `usertype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `type`) VALUES
(1, 'Client'),
(2, 'DJ'),
(3, 'Admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
