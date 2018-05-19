-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2018 at 09:55 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pgla`
--

-- --------------------------------------------------------

--
-- Table structure for table `lieudeja`
--

CREATE TABLE IF NOT EXISTS `lieudeja` (
  `nomLieu` varchar(1000) NOT NULL,
  `genre` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sortir`
--

CREATE TABLE IF NOT EXISTS `sortir` (
  `nom` varchar(1000) DEFAULT NULL,
  `adresse` varchar(1000) DEFAULT NULL,
  `transport` varchar(100) DEFAULT NULL,
  `date` varchar(500) DEFAULT NULL,
  `heure` varchar(100) DEFAULT NULL,
  `minute` varchar(100) DEFAULT NULL,
  `duree` varchar(100) DEFAULT NULL,
  `preference` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sortir`
--

INSERT INTO `sortir` (`nom`, `adresse`, `transport`, `date`, `heure`, `minute`, `duree`, `preference`) VALUES
('nom_0', 'adresse_0', 'voiture', '', 'one', 'zz', '', 'american');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
