-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Nov 17, 2016 alle 10:38
-- Versione del server: 10.0.17-MariaDB
-- Versione PHP: 5.6.14
CREATE DATABASE IF NOT EXISTS registro;
USE registro;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registro`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `alunno`
--

CREATE TABLE `alunno` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) COLLATE utf8_bin NOT NULL,
  `cognome` varchar(32) COLLATE utf8_bin NOT NULL,
  `id_classe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `alunno`
--

INSERT INTO `alunno` (`id`, `nome`, `cognome`, `id_classe`) VALUES
(1, 'Davide', 'Tessari', 3),
(2, 'Gino', 'Luigino', 6),
(3, 'Giuli', 'Sleep', 5),
(4, 'bocchi', 'nando', 2),
(5, 'Gianni', 'Morandi', 4),
(6, 'Tessari', 'figo', 3),
(7, 'russo', 'felice', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `assenti`
--

CREATE TABLE `assenti` (
  `id` int(11) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `id_alunno` int(11) NOT NULL,
  `orario` time DEFAULT NULL,
  `entra_esce` varchar(1) COLLATE utf8_bin DEFAULT NULL,
  `assente` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `assenti`
--

INSERT INTO `assenti` (`id`, `id_registro`, `id_alunno`, `orario`, `entra_esce`, `assente`) VALUES
(1, 1, 1, '17:00:00', 'e', 0),
(2, 1, 3, NULL, NULL, 1),
(3, 1, 5, '11:00:00', 'u', 1),
(4, 1, 1, NULL, NULL, 1),
(5, 1, 7, '17:00:00', 'e', 0),
(6, 4, 2, NULL, NULL, 1),
(7, 3, 2, NULL, NULL, 1),
(9, 3, 6, '08:00:00', 'u', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `calendario`
--

CREATE TABLE `calendario` (
  `id` int(11) NOT NULL,
  `id_insegnante` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `data` date NOT NULL,
  `id_settimana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `calendario`
--

INSERT INTO `calendario` (`id`, `id_insegnante`, `id_classe`, `id_materia`, `data`, `id_settimana`) VALUES
(1, 2, 2, 1, '2016-11-15', 1),
(2, 1, 3, 2, '2016-11-14', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `classe`
--

CREATE TABLE `classe` (
  `id` int(11) NOT NULL,
  `nome` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `classe`
--

INSERT INTO `classe` (`id`, `nome`) VALUES
(1, '1a Reti'),
(2, '2a Reti'),
(3, '3a Reti'),
(4, '1b Reti'),
(5, '2b Reti'),
(6, '3b Reti');

-- --------------------------------------------------------

--
-- Struttura della tabella `festivi`
--

CREATE TABLE `festivi` (
  `id` int(11) NOT NULL,
  `giorno` date NOT NULL,
  `giorno_fine` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struttura della tabella `insegnante`
--

CREATE TABLE `insegnante` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) COLLATE utf8_bin NOT NULL,
  `cognome` varchar(32) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `insegnante`
--

INSERT INTO `insegnante` (`id`, `nome`, `cognome`) VALUES
(1, 'mori', 'remo'),
(2, 'perla', 'madonna'),
(3, 'Bigo', 'Dino');

-- --------------------------------------------------------

--
-- Struttura della tabella `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user` varchar(32) COLLATE utf8_bin NOT NULL,
  `password` varchar(40) COLLATE utf8_bin NOT NULL,
  `diritti` varchar(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `login`
--

INSERT INTO `login` (`id`, `user`, `password`, `diritti`) VALUES
(8, 'davide', '1cd424918902c1dbc16c61ea09f30b31f6c2f0e9', 's');

-- --------------------------------------------------------

--
-- Struttura della tabella `materia`
--

CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) COLLATE utf8_bin NOT NULL,
  `codice` varchar(16) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `materia`
--

INSERT INTO `materia` (`id`, `nome`, `codice`) VALUES
(1, 'Programmazione', 'PPOA'),
(2, 'Sistemi Operativi', 'PPOE');

-- --------------------------------------------------------

--
-- Struttura della tabella `ore_classe`
--

CREATE TABLE `ore_classe` (
  `id` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `ore` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `ore_classe`
--

INSERT INTO `ore_classe` (`id`, `id_classe`, `id_materia`, `ore`) VALUES
(1, 1, 2, 64),
(2, 1, 1, 32);

-- --------------------------------------------------------

--
-- Struttura della tabella `preferenze_giorni`
--

CREATE TABLE `preferenze_giorni` (
  `id` int(11) NOT NULL,
  `giorno` date NOT NULL,
  `giorno_fine` date DEFAULT NULL,
  `id_insegnante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struttura della tabella `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `id_insegnante` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `data` date NOT NULL,
  `ora` time NOT NULL,
  `argomenti` varchar(300) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `registro`
--

INSERT INTO `registro` (`id`, `id_insegnante`, `id_materia`, `id_classe`, `data`, `ora`, `argomenti`) VALUES
(1, 1, 1, 2, '2016-11-09', '08:20:18', 'Programmazione web'),
(2, 2, 1, 4, '2016-11-10', '19:20:18', 'Informatica'),
(3, 2, 2, 5, '2016-11-11', '07:00:00', 'niente'),
(4, 3, 2, 6, '2016-11-05', '11:00:00', 'niente'),
(5, 1, 2, 2, '2016-11-11', '14:00:00', 'cucina'),
(6, 1, 1, 6, '2016-11-12', '14:55:00', 'nessuno');

-- --------------------------------------------------------

--
-- Struttura della tabella `settimana`
--

CREATE TABLE `settimana` (
  `id` int(11) NOT NULL,
  `giorno` varchar(10) COLLATE utf8_bin NOT NULL,
  `ora` time NOT NULL,
  `ora_fine` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `settimana`
--

INSERT INTO `settimana` (`id`, `giorno`, `ora`, `ora_fine`) VALUES
(1, 'lunedì', '08:15:00', '09:15:00'),
(2, 'lunedì', '09:15:00', '10:15:00'),
(3, 'lunedì', '10:15:00', '11:15:00'),
(4, 'lunedì', '11:25:00', '12:25:00'),
(5, 'lunedì', '12:25:00', '13:25:00'),
(6, 'lunedì', '14:15:00', '15:15:00'),
(7, 'lunedì', '15:15:00', '16:15:00'),
(8, 'lunedì', '16:15:00', '17:15:00'),
(9, 'martedì', '08:15:00', '09:15:00'),
(10, 'martedì', '09:15:00', '10:15:00'),
(11, 'martedì', '10:15:00', '11:15:00'),
(12, 'martedì', '11:25:00', '12:25:00'),
(13, 'martedì', '12:25:00', '13:25:00'),
(14, 'mercoledì', '08:15:00', '09:15:00'),
(15, 'mercoledì', '09:15:00', '10:15:00'),
(16, 'mercoledì', '10:15:00', '11:15:00'),
(17, 'mercoledì', '11:25:00', '12:25:00'),
(18, 'mercoledì', '12:25:00', '13:25:00'),
(19, 'mercoledì', '14:15:00', '15:15:00'),
(20, 'mercoledì', '15:15:00', '16:15:00'),
(21, 'mercoledì', '16:15:00', '17:15:00'),
(22, 'giovedì', '08:15:00', '09:15:00'),
(23, 'giovedì', '09:15:00', '10:15:00'),
(24, 'giovedì', '10:15:00', '11:15:00'),
(25, 'giovedì', '11:25:00', '12:25:00'),
(26, 'giovedì', '12:25:00', '13:25:00'),
(27, 'venerdì', '08:15:00', '09:15:00'),
(28, 'venerdì', '09:15:00', '10:15:00'),
(29, 'venerdì', '10:15:00', '11:15:00'),
(30, 'venerdì', '11:25:00', '12:25:00'),
(31, 'venerdì', '12:25:00', '13:25:00');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `alunno`
--
ALTER TABLE `alunno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_classe` (`id_classe`);

--
-- Indici per le tabelle `assenti`
--
ALTER TABLE `assenti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_registro` (`id_registro`),
  ADD KEY `id_alunno` (`id_alunno`);

--
-- Indici per le tabelle `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_insegnante` (`id_insegnante`),
  ADD KEY `id_classe` (`id_classe`,`id_materia`),
  ADD KEY `id_materia` (`id_materia`),
  ADD KEY `id_settimana` (`id_settimana`);

--
-- Indici per le tabelle `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `festivi`
--
ALTER TABLE `festivi`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `insegnante`
--
ALTER TABLE `insegnante`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`) USING BTREE;

--
-- Indici per le tabelle `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `ore_classe`
--
ALTER TABLE `ore_classe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_classe` (`id_classe`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indici per le tabelle `preferenze_giorni`
--
ALTER TABLE `preferenze_giorni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_insegnante` (`id_insegnante`);

--
-- Indici per le tabelle `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_insegnante` (`id_insegnante`,`id_materia`,`id_classe`),
  ADD KEY `id_materia` (`id_materia`),
  ADD KEY `id_classe` (`id_classe`);

--
-- Indici per le tabelle `settimana`
--
ALTER TABLE `settimana`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `alunno`
--
ALTER TABLE `alunno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT per la tabella `assenti`
--
ALTER TABLE `assenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT per la tabella `calendario`
--
ALTER TABLE `calendario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `classe`
--
ALTER TABLE `classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT per la tabella `festivi`
--
ALTER TABLE `festivi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `insegnante`
--
ALTER TABLE `insegnante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT per la tabella `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT per la tabella `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `ore_classe`
--
ALTER TABLE `ore_classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `preferenze_giorni`
--
ALTER TABLE `preferenze_giorni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT per la tabella `settimana`
--
ALTER TABLE `settimana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `alunno`
--
ALTER TABLE `alunno`
  ADD CONSTRAINT `alunno_ibfk_1` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id`);

--
-- Limiti per la tabella `assenti`
--
ALTER TABLE `assenti`
  ADD CONSTRAINT `assenti_ibfk_1` FOREIGN KEY (`id_registro`) REFERENCES `registro` (`id`),
  ADD CONSTRAINT `assenti_ibfk_2` FOREIGN KEY (`id_alunno`) REFERENCES `alunno` (`id`);

--
-- Limiti per la tabella `calendario`
--
ALTER TABLE `calendario`
  ADD CONSTRAINT `calendario_ibfk_1` FOREIGN KEY (`id_insegnante`) REFERENCES `insegnante` (`id`),
  ADD CONSTRAINT `calendario_ibfk_2` FOREIGN KEY (`id_classe`) REFERENCES `insegnante` (`id`),
  ADD CONSTRAINT `calendario_ibfk_3` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id`),
  ADD CONSTRAINT `calendario_ibfk_4` FOREIGN KEY (`id_settimana`) REFERENCES `settimana` (`id`);

--
-- Limiti per la tabella `ore_classe`
--
ALTER TABLE `ore_classe`
  ADD CONSTRAINT `classe` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id`),
  ADD CONSTRAINT `materia` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id`);

--
-- Limiti per la tabella `preferenze_giorni`
--
ALTER TABLE `preferenze_giorni`
  ADD CONSTRAINT `preferenze_giorni_ibfk_1` FOREIGN KEY (`id_insegnante`) REFERENCES `insegnante` (`id`);

--
-- Limiti per la tabella `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `registro_ibfk_1` FOREIGN KEY (`id_insegnante`) REFERENCES `insegnante` (`id`),
  ADD CONSTRAINT `registro_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id`),
  ADD CONSTRAINT `registro_ibfk_3` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
