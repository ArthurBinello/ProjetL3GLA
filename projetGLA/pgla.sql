-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2018 at 01:11 PM
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
-- Table structure for table `activite`
--

CREATE TABLE IF NOT EXISTS `activite` (
  `ida` int(5) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `lieuActivite` varchar(1000) NOT NULL,
  `heure_duree_estimee` int(10) NOT NULL,
  `minute_duree_estimee` int(10) NOT NULL,
  `heure_temps_transport` int(10) NOT NULL,
  `minute_temps_transport` int(10) NOT NULL,
  `heure_temps_reste` int(10) NOT NULL,
  `minute_temps_reste` int(10) NOT NULL,
  PRIMARY KEY (`ida`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  `idadr` int(5) NOT NULL,
  `adresse` varchar(1000) NOT NULL,
  PRIMARY KEY (`idadr`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invite`
--

CREATE TABLE IF NOT EXISTS `invite` (
  `idi` int(5) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `adresse` varchar(1000) NOT NULL,
  `transport` varchar(10) NOT NULL,
  `heure_tempsDepart` int(10) NOT NULL,
  `minute_tempsDepart` int(10) NOT NULL,
  `heure_tempsSurPlace` int(10) NOT NULL,
  `minute_tempsSurPlace` int(10) NOT NULL,
  `preference` varchar(1000) NOT NULL,
  PRIMARY KEY (`idi`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lieu`
--

CREATE TABLE IF NOT EXISTS `lieu` (
  `idl` int(5) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `nomLieu` varchar(100) NOT NULL,
  `heure_heureOuverture` int(10) NOT NULL,
  `minute_heureOuverture` int(10) NOT NULL,
  `heure_heureFermeture` int(10) NOT NULL,
  `minute_heureFermeture` int(10) NOT NULL,
  `platPrincipal` varchar(100) NOT NULL,
  PRIMARY KEY (`idl`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lieudeja`
--

CREATE TABLE IF NOT EXISTS `lieudeja` (
  `idldeja` int(5) NOT NULL,
  `nomLieu` varchar(1000) NOT NULL,
  `genre` varchar(10) NOT NULL,
  PRIMARY KEY (`idldeja`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `preference`
--

CREATE TABLE IF NOT EXISTS `preference` (
  `idp` int(5) NOT NULL,
  `nomPreference` varchar(100) NOT NULL,
  PRIMARY KEY (`idp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sortie`
--

CREATE TABLE IF NOT EXISTS `sortie` (
  `ids` int(5) NOT NULL,
  `activite1` varchar(20) NOT NULL,
  `activite2` varchar(20) NOT NULL,
  `activite3` varchar(20) NOT NULL,
  PRIMARY KEY (`ids`)
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

-- --------------------------------------------------------

--
-- Table structure for table `temps`
--

CREATE TABLE IF NOT EXISTS `temps` (
  `idt` int(5) NOT NULL,
  `heure` int(10) NOT NULL,
  `minute` int(10) NOT NULL,
  PRIMARY KEY (`idt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE IF NOT EXISTS `transport` (
  `idtr` int(5) NOT NULL,
  `mode_transport` varchar(20) NOT NULL,
  `heure_tempSomeMax` int(10) NOT NULL,
  `minute_tempSomeMax` int(10) NOT NULL,
  PRIMARY KEY (`idtr`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
