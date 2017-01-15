-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Gen 15, 2017 alle 13:25
-- Versione del server: 5.5.53-0+deb8u1
-- PHP Version: 5.6.29-0+deb8u1

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
-- Struttura della tabella `classi`
--

CREATE TABLE IF NOT EXISTS `classi` (
`id` int(11) NOT NULL,
  `sigla` varchar(50) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `username`, `nome`, `cognome`, `email`, `ruolo`, `scuola`, `classe`, `password`, `temp_pwd`) VALUES
(3, 'admin', 'admin', 'admin', 'admin@admin.it', 'amministratore', 'Pilati', NULL, NULL, '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classi`
--
ALTER TABLE `classi`
 ADD PRIMARY KEY (`id`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `utenti`
--
ALTER TABLE `utenti`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `utenti`
--
ALTER TABLE `utenti`
ADD CONSTRAINT `utenti_ibfk_1` FOREIGN KEY (`classe`) REFERENCES `classi` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
