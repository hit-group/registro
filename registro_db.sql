-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generato il: Gen 23, 2017 alle 16:41
-- Versione del server: 5.5.54-0ubuntu0.14.04.1
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
(5, 2, 'Matematica');

-- --------------------------------------------------------

--
-- Struttura della tabella `presenze`
--

CREATE TABLE IF NOT EXISTS `presenze` (
  `studente` int(11) NOT NULL,
  `classe` int(11) NOT NULL,
  `giorno` date NOT NULL,
  `ora_entrata` int(2) NOT NULL,
  `ora_uscita` int(2) NOT NULL,
  PRIMARY KEY (`studente`,`classe`,`giorno`),
  KEY `classe` (`classe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `username`, `nome`, `cognome`, `email`, `ruolo`, `scuola`, `classe`, `password`, `temp_pwd`) VALUES
(3, 'admin', 'admin', 'admin', 'admin@admin.it', 'amministratore', 'Pilati', NULL, '$2y$10$e0C2JHbKhjJgDPAftY9AW.9405e6Zhcnha9ZJ8nEowcqeVVHHeY8e', ''),
(5, 'doc2', 'Giuseppe', 'Verdi', 'email@email.net', 'docente', NULL, NULL, NULL, '123456'),
(8, NULL, 'Pippo', 'Baudo', '4afms-r.re@istitutopilati.it', 'studente', 'ITET C.A. Pilati', 2, NULL, '947455'),
(9, NULL, 'Carlo', 'Conti', '3afms-r.re@istitutopilati.it', 'studente', 'ITET C.A. Pilati', 1, NULL, '947455'),
(10, NULL, 'Giorgio', 'Rossi', '3afms-r.re@istitutopilati.it', 'studente', 'ITET C.A. Pilati', 1, NULL, '139440'),
(11, NULL, 'Giorgio', 'Arancione', '3afms-r.re@istitutopilati.it', 'studente', 'ITET C.A. Pilati', 1, NULL, '139440'),
(12, 'rre12', 'Pavel', 'Rossi', '3afms-r.re@istitutopilati.it', 'studente', 'ITET C.A. Pilati', 1, NULL, '103783'),
(13, 'csac-fwaffwe-13', 'Giorgio', 'Rossi', '3afms-csacfwaf.fwefew@istitutopilati.it', 'studente', 'ITET C.A. Pilati', 1, NULL, '562613'),
(14, 'abc-defghi-14', 'Pavel', 'Quadrato', '3afms-abcdef.ghijkl@istitutopilati.it', 'studente', 'ITET C.A. Pilati', 1, NULL, '934607'),
(15, '', 'Pinco', 'Pallino', '3afms-abcdef.ghijkl@istitutopilati.it', 'studente', 'ITET C.A. Pilati', 1, NULL, '849238'),
(16, 'abcdefghi16', 'Fabio', 'Frizzi', '3afms-abcdef.ghijkl@istitutopilati.it', 'studente', 'ITET C.A. Pilati', 1, NULL, '448731'),
(17, 'ghi17', 'Matteo', 'Renzi', '3afms-abcdef.ghijkl@istitutopilati.it', 'studente', 'ITET C.A. Pilati', 1, NULL, '262541'),
(18, 'aghi18', 'Giovanni Andrea', 'Gironimi', '3afms-abcdef.ghijkl@istitutopilati.it', 'studente', 'ITET C.A. Pilati', 1, NULL, '463114');

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
-- Limiti per la tabella `presenze`
--
ALTER TABLE `presenze`
  ADD CONSTRAINT `presenze_ibfk_2` FOREIGN KEY (`classe`) REFERENCES `classi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `presenze_ibfk_1` FOREIGN KEY (`studente`) REFERENCES `utenti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `utenti`
--
ALTER TABLE `utenti`
  ADD CONSTRAINT `utenti_ibfk_1` FOREIGN KEY (`classe`) REFERENCES `classi` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
