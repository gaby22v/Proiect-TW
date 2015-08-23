
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2014 at 06:45 PM
-- Server version: 5.1.71
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u724623912_tw`
--

-- --------------------------------------------------------

--
-- Table structure for table `angajat`
--

CREATE TABLE IF NOT EXISTS `angajat` (
  `cod_angajat` int(11) NOT NULL AUTO_INCREMENT,
  `nume_angajat` varchar(30) NOT NULL,
  `prenume_angajat` varchar(30) NOT NULL,
  `functie_angajat` varchar(30) NOT NULL,
  `salariu_angajat` float NOT NULL,
  `zile_concediu` decimal(10,0) NOT NULL,
  `telefon_angajat` decimal(10,0) NOT NULL,
  PRIMARY KEY (`cod_angajat`),
  KEY `fk_ANGAJAT_MANAGER1_idx` (`nume_angajat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=984 ;

-- --------------------------------------------------------

--
-- Table structure for table `angajat_has_producator`
--

CREATE TABLE IF NOT EXISTS `angajat_has_producator` (
  `ANGAJAT_cod_angajat` int(11) NOT NULL,
  `PRODUCATOR_cod_producator` int(11) NOT NULL,
  PRIMARY KEY (`ANGAJAT_cod_angajat`,`PRODUCATOR_cod_producator`),
  KEY `fk_ANGAJAT_has_PRODUCATOR_PRODUCATOR1_idx` (`PRODUCATOR_cod_producator`),
  KEY `fk_ANGAJAT_has_PRODUCATOR_ANGAJAT1_idx` (`ANGAJAT_cod_angajat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

--
-- Dumping data for table `angajat_has_producator`
--

INSERT INTO `angajat_has_producator` (`ANGAJAT_cod_angajat`, `PRODUCATOR_cod_producator`) VALUES
(123, 16),
(147, 17),
(183, 25),
(213, 26),
(321, 35),
(321, 95),
(383, 36),
(480, 45),
(483, 46),
(546, 49),
(560, 55),
(583, 65),
(654, 65),
(683, 75),
(783, 85),
(784, 99);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `cod_client` int(11) NOT NULL AUTO_INCREMENT,
  `nume_client` varchar(30) NOT NULL,
  `prenume_client` varchar(30) NOT NULL,
  `tip_client` varchar(45) NOT NULL,
  `adresa_client` varchar(60) NOT NULL,
  `telefon_client` decimal(10,0) NOT NULL,
  PRIMARY KEY (`cod_client`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`cod_client`, `nume_client`, `prenume_client`, `tip_client`, `adresa_client`, `telefon_client`) VALUES
(11, 'Popescu', 'Andrei', 'silver', 'Marasesti-20A, Ploiesti', '733692703'),
(12, 'Florea', 'Bianca', 'platinum', 'Mihai Bravu-44A,Buc.', '769855684'),
(13, 'Voicu', 'Ioan', 'gold', 'Principala-7, Bucov', '724252192'),
(22, 'Manea', 'Daniela', 'premium', 'Lamaita-10C, Floresti', '721589452'),
(23, 'Grigore', 'Andrei', 'silver', 'Cina-25B, Baicoi', '244586425'),
(24, 'Mihai', 'Viorica', 'silver', 'Narciselor-245, Buzau', '735658457'),
(33, 'Radu', 'Cristian', 'gold', 'Zambilelor-854, Mizil', '752484123'),
(34, 'Anghelescu', 'Madalin', 'platinum', 'Domnisori-5D, Mizil', '725842965'),
(35, 'Badea', 'Andreea', 'gold', 'Independentei-12, Urlati', '741579124'),
(44, 'Coman', 'Irina', 'platinum', 'Crisanei-85A, Bucov', '733703692'),
(45, 'Diaconescu', 'Marian', 'silver', 'Mozaicului-3414, Ploiesti', '732548796'),
(46, 'Ionescu', 'Viorel', 'gold', 'Florilor-423C, Floresti', '724157897'),
(55, 'Negru', 'Catalin', 'platinum', 'Preciziei-4579, Baicoi', '725416398'),
(56, 'Olaru', 'Otilia', 'silver', 'Crivinei-425B, Bucov', '756748254'),
(57, 'Stancescu', 'Ana', 'gold', 'Lalelelor-415B, Filipesti', '738245987'),
(66, 'Tanase', 'Gabriel', 'platinum', 'Rudului-7A, Bucuresti', '789415786'),
(67, 'Zaharia', 'Catalina', 'gold', 'Principala-775, Ploiesti', '745178294'),
(68, 'Andreescu', 'Mihaela', 'gold', 'Rudului-457A, Baicoi', '769550478'),
(77, 'Ionescu', 'Alexandru', 'silver', 'Schelei-145, Urlati', '723252192'),
(78, 'Parvan', 'Andrei', 'premium', 'Marasesti-425B, Mizil', '732548529');

-- --------------------------------------------------------

--
-- Table structure for table `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
  `cod_factura` int(11) NOT NULL AUTO_INCREMENT,
  `data_factura` date NOT NULL,
  `cod_produs` int(11) NOT NULL,
  `cod_client` int(11) NOT NULL,
  `cod_angajat` int(11) NOT NULL,
  PRIMARY KEY (`cod_factura`,`cod_client`,`cod_angajat`),
  KEY `fk_FACTURA_CLIENT1_idx` (`cod_client`),
  KEY `fk_FACTURA_ANGAJAT1_idx` (`cod_angajat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED AUTO_INCREMENT=121 ;

--
-- Dumping data for table `factura`
--

INSERT INTO `factura` (`cod_factura`, `data_factura`, `cod_produs`, `cod_client`, `cod_angajat`) VALUES
(101, '2014-05-23', 15, 77, 123),
(102, '2014-05-27', 18, 11, 147),
(103, '2014-05-01', 19, 12, 183),
(104, '2014-05-21', 20, 13, 213),
(105, '2014-04-07', 21, 22, 321),
(106, '2014-04-13', 29, 23, 383),
(107, '2014-03-10', 30, 24, 480),
(108, '2014-02-11', 31, 33, 483),
(109, '2014-04-25', 32, 34, 546),
(110, '2014-03-18', 36, 57, 560),
(111, '2014-01-20', 38, 35, 583),
(112, '2014-05-12', 39, 78, 654),
(113, '2014-04-30', 40, 44, 683),
(114, '2014-05-23', 42, 45, 783),
(115, '2014-05-20', 43, 46, 784),
(116, '2014-03-10', 47, 55, 789),
(117, '2014-01-27', 58, 54, 883),
(118, '2014-02-25', 76, 67, 897),
(119, '2014-05-24', 85, 66, 965),
(120, '2014-05-22', 93, 68, 983);

-- --------------------------------------------------------

--
-- Table structure for table `imagini`
--

CREATE TABLE IF NOT EXISTS `imagini` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descriere` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `imagini`
--

INSERT INTO `imagini` (`id`, `descriere`) VALUES
(1, 'Marca Artic Masina de spalat'),
(2, 'Bosch Frigider'),
(3, 'Masina de spalat Bosch'),
(4, 'Cuptor cu microunde Indesit'),
(5, 'Mixer Braun'),
(6, 'Telefon LG'),
(7, 'Aspirator Heinner'),
(8, 'Mouse Microsoft'),
(9, 'Mixer Panasonic'),
(10, 'Aer conditionat Rowenta'),
(11, 'Aragaz Zanussi'),
(12, 'diagrama');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `cod_manager` int(11) NOT NULL,
  `nume_angajat` varchar(30) NOT NULL,
  `prenume_angajat` varchar(30) NOT NULL,
  `indemnizatie_manger` varchar(11) NOT NULL,
  PRIMARY KEY (`cod_manager`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`cod_manager`, `nume_angajat`, `prenume_angajat`, `indemnizatie_manger`) VALUES
(147, 'Negru ', 'Catalin', '15%'),
(213, 'Iancu', 'Diana', '20%'),
(480, 'Enache', 'Adriana', '19%'),
(683, 'Niculae', 'Diana', '25%'),
(897, 'Iordache', 'Octavian', '24%');

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE IF NOT EXISTS `poll` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `question` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`id`, `question`) VALUES
(21, 'samsung'),
(22, 'other'),
(23, 'samsung'),
(24, 'samsung'),
(25, 'toshiba'),
(26, 'other'),
(27, 'samsung'),
(28, 'lg'),
(29, 'sony'),
(30, 'samsung'),
(31, 'toshiba'),
(32, 'samsung'),
(33, 'samsung'),
(34, 'samsung'),
(35, 'sony'),
(36, 'lg'),
(37, 'samsung'),
(38, 'samsung'),
(39, 'samsung'),
(40, 'other'),
(41, 'samsung'),
(42, 'sony'),
(43, 'sony'),
(44, 'other'),
(45, 'other'),
(46, 'samsung'),
(47, 'lg'),
(48, 'lg'),
(49, 'other'),
(50, 'samsung'),
(51, 'samsung'),
(52, 'toshiba'),
(53, 'lg'),
(54, 'other'),
(55, 'other'),
(56, 'samsung'),
(57, NULL),
(58, 'samsung'),
(59, 'samsung'),
(60, 'sony'),
(61, 'lg'),
(62, 'lg'),
(63, 'samsung'),
(64, 'lg'),
(65, 'other'),
(66, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `producator`
--

CREATE TABLE IF NOT EXISTS `producator` (
  `cod_producator` int(11) NOT NULL AUTO_INCREMENT,
  `nume_producator` varchar(30) NOT NULL,
  `telefon_producator` decimal(10,0) NOT NULL,
  `adresa_producator` varchar(60) NOT NULL,
  PRIMARY KEY (`cod_producator`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

-- --------------------------------------------------------

--
-- Table structure for table `producator_has_produs`
--

CREATE TABLE IF NOT EXISTS `producator_has_produs` (
  `PRODUCATOR_cod_producator` int(11) NOT NULL,
  `PRODUS_cod_produs` int(11) NOT NULL,
  PRIMARY KEY (`PRODUCATOR_cod_producator`,`PRODUS_cod_produs`),
  KEY `fk_PRODUCATOR_has_PRODUS_PRODUS1_idx` (`PRODUS_cod_produs`),
  KEY `fk_PRODUCATOR_has_PRODUS_PRODUCATOR1_idx` (`PRODUCATOR_cod_producator`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

--
-- Dumping data for table `producator_has_produs`
--

INSERT INTO `producator_has_produs` (`PRODUCATOR_cod_producator`, `PRODUS_cod_produs`) VALUES
(16, 19),
(17, 38),
(25, 20),
(26, 21),
(35, 30),
(36, 58),
(45, 36),
(46, 29),
(49, 93),
(55, 32),
(65, 40),
(75, 39),
(85, 42),
(95, 76),
(99, 31);

-- --------------------------------------------------------

--
-- Table structure for table `produs`
--

CREATE TABLE IF NOT EXISTS `produs` (
  `cod_produs` int(11) NOT NULL AUTO_INCREMENT,
  `nume_producator` varchar(30) NOT NULL,
  `denumire_produs` varchar(45) NOT NULL,
  `specificatii_produs` varchar(90) NOT NULL,
  `pret_produs` decimal(10,2) NOT NULL,
  `cod_raion` varchar(11) NOT NULL,
  `cod_client` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cod_produs`,`cod_client`),
  KEY `fk_PRODUS_CLIENT1_idx` (`cod_client`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=103 ;

-- --------------------------------------------------------

--
-- Table structure for table `raion`
--

CREATE TABLE IF NOT EXISTS `raion` (
  `cod_raion` int(11) NOT NULL AUTO_INCREMENT,
  `zi_inventar_produs` int(11) NOT NULL,
  `tip_produs` varchar(45) NOT NULL,
  PRIMARY KEY (`cod_raion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `raion`
--

INSERT INTO `raion` (`cod_raion`, `zi_inventar_produs`, `tip_produs`) VALUES
(1, 25, 'TV'),
(2, 26, 'Electrocasnice mici'),
(3, 27, 'Electrocasnice mari'),
(4, 20, 'Electrocasnice mici'),
(5, 19, 'Telefoane'),
(6, 15, 'Laptop-IT'),
(7, 10, 'Electrocasnice mari'),
(8, 15, 'Electrocasnice mici'),
(9, 20, 'Electrocasnice mici');

-- --------------------------------------------------------

--
-- Table structure for table `utilizatori`
--

CREATE TABLE IF NOT EXISTS `utilizatori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilizator` char(60) NOT NULL DEFAULT '',
  `parola` char(60) NOT NULL DEFAULT '',
  `nume` char(30) NOT NULL DEFAULT '',
  `prenume` char(30) NOT NULL DEFAULT '',
  `varsta` char(3) NOT NULL DEFAULT '',
  `localitate` char(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `utilizatori`
--

INSERT INTO `utilizatori` (`id`, `utilizator`, `parola`, `nume`, `prenume`, `varsta`, `localitate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Patrascu', 'Gabriel', '20', 'Ploiesti'),
(2, 'ema', '93bdb73b49e88b5ce23da0509da1b8ac', 'Gheorghe', 'Aida', '20', 'ploiesti'),
(3, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test', '20', 'ploiesti'),
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', '20', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
