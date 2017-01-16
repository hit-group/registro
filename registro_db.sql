-- phpMyAdmin SQL Dump

-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generato il: Gen 16, 2017 alle 14:52
-- Versione del server: 5.5.53-0ubuntu0.14.04.1
-- Versione PHP: 5.5.9-1ubuntu4.20

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

  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sigla` varchar(50) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `anno` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dump dei dati per la tabella `classi`
--

INSERT INTO `classi` (`id`, `sigla`, `nome`, `anno`) VALUES
(1, '3afms', '3 AFM S', 2017),
(2, '4afms', '4 AFM S', 2017);

-- --------------------------------------------------------

--
-- Struttura della tabella `insegnamenti`
--

CREATE TABLE IF NOT EXISTS `insegnamenti` (
  `id_professore` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `materia` varchar(50) NOT NULL,
  PRIMARY KEY (`id_professore`,`id_classe`,`materia`),
  KEY `id_professore` (`id_professore`),
  KEY `id_classe` (`id_classe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `insegnamenti`
--

INSERT INTO `insegnamenti` (`id_professore`, `id_classe`, `materia`) VALUES
(4, 2, 'Italiano'),
(5, 2, 'Matematica');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE IF NOT EXISTS `utenti` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `username` varchar(50) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `cognome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `ruolo` varchar(50) DEFAULT NULL,
  `scuola` varchar(50) DEFAULT NULL,
  `classe` int(11) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,

  `temp_pwd` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `classe` (`classe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `username`, `nome`, `cognome`, `email`, `ruolo`, `scuola`, `classe`, `password`, `temp_pwd`) VALUES

(3, 'admin', 'admin', 'admin', 'admin@admin.it', 'amministratore', 'Pilati', NULL, '$2y$10$e0C2JHbKhjJgDPAftY9AW.9405e6Zhcnha9ZJ8nEowcqeVVHHeY8e', ''),
(4, 'doc1', 'Mario', 'Rossi', 'email@email.it', 'docente', NULL, NULL, NULL, '123456'),
(5, 'doc2', 'Giuseppe', 'Verdi', 'email@email.net', 'docente', NULL, NULL, NULL, '123456');

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `insegnamenti`
--
ALTER TABLE `insegnamenti`
  ADD CONSTRAINT `insegnamenti_ibfk_1` FOREIGN KEY (`id_professore`) REFERENCES `utenti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `insegnamenti_ibfk_2` FOREIGN KEY (`id_classe`) REFERENCES `classi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- Limiti per la tabella `utenti`
--
ALTER TABLE `utenti`

  ADD CONSTRAINT `utenti_ibfk_1` FOREIGN KEY (`classe`) REFERENCES `classi` (`id`);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
