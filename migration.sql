-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 13, 2023 alle 16:51
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `education`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `posti_disponibili` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `courses`
--

INSERT INTO `courses` (`id`, `name`, `posti_disponibili`) VALUES
(1, 'dlfg', 2),
(2, 'dlfg', 2),
(11, 'dlfg', 2),
(13, 'dlfg', 2),
(17, 'dlfg', 2),
(18, 'dlfg', 2),
(19, 'dlfg', 2),
(20, 'dlfg', 2),
(21, 'dlfg', 2),
(22, 'dlfg', 2),
(23, 'dlfg', 2),
(24, 'dlfg', 2),
(25, 'dlfg', 2),
(26, 'dlfg', 2),
(27, 'dlfg', 2),
(28, 'dlfg', 2),
(29, 'dlfg', 2),
(30, 'dlfg', 2),
(31, 'dlfg', 2),
(32, 'dlfg', 2),
(33, 'dlfg', 2),
(34, 'dlfg', 2),
(35, 'dlfg', 2),
(36, 'dlfg', 2),
(37, 'dlfg', 2),
(38, 'dlfg', 2),
(39, 'dlfg', 2),
(40, 'dlfg', 2),
(41, 'dlfg', 2),
(42, 'dlfg', 2),
(43, 'dlfg', 2),
(44, 'dlfg', 2),
(45, 'dlfg', 2),
(46, 'dlfg', 2),
(47, 'dlfg', 2),
(48, 'dlfg', 2),
(49, 'dlfg', 2),
(51, 'dlfg', 2),
(52, 'dlfg', 2),
(53, 'dlfg', 2),
(54, 'dlfg', 2),
(56, 'dlfg', 2),
(57, 'dlfg', 2),
(58, 'dlfg', 2),
(59, 'dlfg', 2),
(60, 'dlfg', 2),
(61, 'dlfg', 2),
(62, 'dlfg', 2),
(63, 'dlfg', 2),
(64, 'dlfg', 2),
(65, 'dlfg', 2),
(66, 'rffgf', 25),
(67, 'dlfg', 2),
(68, 'dlfg', 2),
(69, 'dlfg', 2),
(71, 'dlfg', 2),
(72, 'dlfg', 2),
(73, 'dlfg', 2),
(74, 'dlfg', 2),
(75, 'dlfg', 2),
(76, '3t33y', 2566),
(77, '3t33', 25),
(78, 'dlfg', 2),
(79, 'dlfg', 2),
(80, 'dlfg', 2),
(81, 'dlfg', 2),
(82, 'dlfg', 2),
(83, 'dlfg', 2),
(84, 'dlfg', 2),
(85, 'dlfg', 2),
(86, 'dlfg', 2),
(87, 'dlfg', 2),
(88, 'dlfg', 2),
(89, 'dlfg', 2),
(90, 'dlfg', 2),
(91, 'dlfg', 2),
(92, 'dlfg', 2),
(93, 'dlfg', 2),
(94, 'dlfg', 2),
(95, 'dlfg', 2),
(96, 'dlfg', 2),
(97, 'dlfg', 2),
(98, 'dlfg', 2),
(99, 'dlfg', 2),
(100, 'dlfg', 2),
(101, 'dlfg', 2),
(102, 'dlfg', 2),
(103, 'dlfg', 2),
(104, 'dlfg', 2),
(105, 'dlfg', 2),
(106, 'dlfg', 2),
(107, 'dlfg', 2),
(108, 'dlfg', 2),
(109, 'dlfg', 2),
(110, 'dlfg', 2),
(111, 'dlfg', 2),
(112, 'dlfg', 2),
(113, 'dlfg', 2),
(114, 'dlfg', 2),
(115, 'dlfg', 2),
(116, 'dlfg', 2),
(117, 'dlfg', 2),
(118, 'dlfg', 2),
(119, 'dlfg', 2),
(120, 'dlfg', 2),
(121, 'dlfg', 2),
(122, 'dlfg', 2),
(123, 'dlfg', 2),
(124, 'dlfg', 2),
(125, 'dlfg', 2),
(126, 'dlfg', 2),
(127, 'dlfg', 2),
(128, 'dlfg', 2),
(129, 'dlfg', 2),
(130, 'dlfg', 2),
(131, 'dlfg', 2),
(132, 'dlfg', 2),
(133, 'dlfg', 2),
(134, 'dlfg', 2),
(135, 'dlfg', 2),
(136, 'rumeno', 6),
(137, 'tedesco', 0),
(138, 'tedesco', 0),
(139, 'tedesco', 0),
(140, 'tedesco', 0),
(141, 'tedesco', 0),
(142, 'tedesco', 0),
(143, 'tedesco', 3),
(145, 'corso di lingue', 3),
(146, 'corso die lingue', 3),
(147, 'corso die lingue', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `courses_subjects`
--

CREATE TABLE `courses_subjects` (
  `id_corso` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `courses_subjects`
--

INSERT INTO `courses_subjects` (`id_corso`, `id_materia`) VALUES
(1, 1),
(2, 2),
(2, 2),
(71, 1),
(71, 2),
(72, 1),
(72, 2),
(73, 1),
(73, 2),
(74, 1),
(74, 2),
(75, 1),
(75, 2),
(78, 1),
(78, 2),
(79, 1),
(79, 2),
(80, 1),
(80, 2),
(81, 1),
(81, 2),
(82, 1),
(82, 2),
(83, 1),
(83, 2),
(84, 1),
(84, 2),
(90, 1),
(90, 2),
(91, 1),
(91, 2),
(92, 1),
(92, 2),
(93, 1),
(93, 2),
(94, 1),
(94, 2),
(95, 1),
(95, 2),
(96, 1),
(96, 2),
(97, 1),
(97, 2),
(98, 1),
(98, 2),
(99, 1),
(99, 2),
(100, 1),
(100, 2),
(101, 1),
(101, 2),
(102, 1),
(102, 2),
(103, 1),
(103, 2),
(104, 1),
(104, 2),
(105, 1),
(105, 2),
(106, 1),
(106, 2),
(107, 1),
(107, 2),
(108, 1),
(108, 2),
(109, 1),
(109, 2),
(110, 1),
(110, 2),
(111, 1),
(111, 2),
(112, 1),
(112, 2),
(113, 1),
(113, 2),
(114, 1),
(114, 2),
(115, 1),
(115, 2),
(116, 1),
(116, 2),
(117, 1),
(117, 2),
(118, 1),
(118, 2),
(119, 1),
(119, 2),
(120, 1),
(120, 2),
(121, 1),
(121, 2),
(122, 1),
(122, 2),
(123, 1),
(123, 2),
(124, 1),
(124, 2),
(125, 1),
(125, 2),
(126, 1),
(126, 2),
(127, 1),
(127, 2),
(128, 1),
(128, 2),
(129, 1),
(129, 2),
(130, 1),
(130, 2),
(131, 1),
(131, 2),
(132, 1),
(132, 2),
(133, 1),
(133, 2),
(134, 1),
(134, 2),
(135, 1),
(135, 2),
(77, 5),
(66, 5),
(76, 4),
(136, 5),
(145, 4),
(145, 5),
(145, 6),
(146, 4),
(146, 5),
(146, 6),
(147, 4),
(147, 5),
(147, 6);

-- --------------------------------------------------------

--
-- Struttura della tabella `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name_materia` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `subjects`
--

INSERT INTO `subjects` (`id`, `name_materia`) VALUES
(1, 'italiano'),
(2, 'inglese'),
(4, 'spagnolo'),
(5, 'spagnolo'),
(6, 'rumeno'),
(10, 'tedesco');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `courses_subjects`
--
ALTER TABLE `courses_subjects`
  ADD KEY `id_corso` (`id_corso`),
  ADD KEY `id_corso_2` (`id_corso`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indici per le tabelle `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT per la tabella `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `courses_subjects`
--
ALTER TABLE `courses_subjects`
  ADD CONSTRAINT `courses_subjects_ibfk_1` FOREIGN KEY (`id_corso`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `courses_subjects_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
