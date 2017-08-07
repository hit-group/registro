-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 07, 2017 at 06:42 PM
-- Server version: 5.5.54-0+deb8u1
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `registro_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `classi`
--

CREATE TABLE IF NOT EXISTS `classi` (
`id` int(11) NOT NULL,
  `sigla` varchar(50) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `anno` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `insegnamenti`
--

CREATE TABLE IF NOT EXISTS `insegnamenti` (
  `id_professore` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `materia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `presenze`
--

CREATE TABLE IF NOT EXISTS `presenze` (
  `studente` int(11) NOT NULL,
  `classe` int(11) NOT NULL,
  `giorno` date NOT NULL,
  `ora_entrata` int(2) NOT NULL,
  `ora_uscita` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utenti`
--

CREATE TABLE IF NOT EXISTS `utenti` (
`id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `cognome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `ruolo` varchar(50) DEFAULT NULL,
  `scuola` varchar(50) DEFAULT NULL,
  `classe` int(11) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `temp_pwd` varchar(6) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utenti`
--

INSERT INTO `utenti` (`id`, `username`, `nome`, `cognome`, `email`, `ruolo`, `scuola`, `classe`, `password`, `temp_pwd`) VALUES
(1, 'admin', NULL, NULL, NULL, 'amministratore', 'Pilati', NULL, NULL, '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classi`
--
ALTER TABLE `classi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insegnamenti`
--
ALTER TABLE `insegnamenti`
 ADD PRIMARY KEY (`id_professore`,`id_classe`,`materia`), ADD KEY `id_professore` (`id_professore`), ADD KEY `id_classe` (`id_classe`);

--
-- Indexes for table `presenze`
--
ALTER TABLE `presenze`
 ADD PRIMARY KEY (`studente`,`classe`,`giorno`), ADD KEY `classe` (`classe`);

--
-- Indexes for table `utenti`
--
ALTER TABLE `utenti`
 ADD PRIMARY KEY (`id`), ADD KEY `classe` (`classe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classi`
--
ALTER TABLE `classi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `utenti`
--
ALTER TABLE `utenti`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `insegnamenti`
--
ALTER TABLE `insegnamenti`
ADD CONSTRAINT `insegnamenti_ibfk_1` FOREIGN KEY (`id_professore`) REFERENCES `utenti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `insegnamenti_ibfk_2` FOREIGN KEY (`id_classe`) REFERENCES `classi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `presenze`
--
ALTER TABLE `presenze`
ADD CONSTRAINT `presenze_ibfk_2` FOREIGN KEY (`classe`) REFERENCES `classi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `presenze_ibfk_1` FOREIGN KEY (`studente`) REFERENCES `utenti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `utenti`
--
ALTER TABLE `utenti`
ADD CONSTRAINT `utenti_ibfk_1` FOREIGN KEY (`classe`) REFERENCES `classi` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
