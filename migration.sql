-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 15, 2023 alle 17:39
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
  `places_available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `courses`
--

INSERT INTO `courses` (`id`, `name`, `places_available`) VALUES
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
(34, 'corsod die lingue', 3),
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
(88, 'corsod die lingue', 3),
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
(134, 'corsod die lingue', 3),
(137, 'tedesco', 0),
(138, 'tedesco', 0),
(139, 'tedesco', 0),
(140, 'tedesco', 0),
(141, 'tedesco', 0),
(142, 'tedesco', 0),
(143, 'tedesco', 3),
(145, 'corso di lingue', 3),
(146, 'corso die lingue', 3),
(147, 'corso die lingue', 3),
(148, 'corsod die lingue', 3),
(149, 'corsod die lingue', 3),
(150, 'corsod die lingue', 3),
(151, 'corsod die lingue', 3),
(152, 'corsod die lingue', 3),
(153, 'corsod die lingue', 3),
(154, 'corsod die lingue', 3),
(155, 'corsod die lingue', 3),
(156, 'corsod die lingue', 3),
(157, 'corsod die lingue', 3),
(158, 'corsod die lingue', 3),
(159, 'corsod die lingue', 3),
(160, 'corsod die lingue', 3),
(161, 'corsod die lingue', 3),
(162, 'corsod die lingue', 3),
(163, 'corsod die lingue', 3),
(164, 'corsod die lingue', 3),
(165, 'corsod die lingue', 3),
(166, 'corsod die lingue', 3),
(167, 'corsod die lingue', 3),
(168, 'corsod die lingue', 3),
(169, 'corsod die lingue', 3),
(170, 'corsod die lingue', 3),
(171, 'corsod die lingue', 3),
(172, 'corsod die lingue', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `courses_subjects`
--

CREATE TABLE `courses_subjects` (
  `id_course` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `courses_subjects`
--

INSERT INTO `courses_subjects` (`id_course`, `id_subject`) VALUES
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(128, 1),
(129, 1),
(130, 1),
(131, 1),
(132, 1),
(133, 1),
(77, 5),
(66, 5),
(76, 4),
(145, 4),
(145, 5),
(145, 6),
(146, 4),
(146, 5),
(146, 6),
(147, 4),
(147, 5),
(147, 6),
(169, 4),
(170, 4),
(171, 4),
(172, 4),
(172, 5),
(172, 6),
(134, 4),
(134, 5),
(134, 6);

-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `courses_with_subjects`
-- (Vedi sotto per la vista effettiva)
--
CREATE TABLE `courses_with_subjects` (
`id` int(11)
,`name` varchar(50)
,`places_available` int(11)
,`subjects_name` mediumtext
,`subjects_id` mediumtext
);

-- --------------------------------------------------------

--
-- Struttura della tabella `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name_subject` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `subjects`
--

INSERT INTO `subjects` (`id`, `name_subject`) VALUES
(1, 'italiano'),
(4, 'spagnolo'),
(5, 'spagnolo'),
(6, 'rumeno'),
(11, 'corso di inglese'),
(12, 'corso di inglese'),
(13, 'corso di inglese');

-- --------------------------------------------------------

--
-- Struttura per vista `courses_with_subjects`
--
DROP TABLE IF EXISTS `courses_with_subjects`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `courses_with_subjects`  AS SELECT `courses`.`id` AS `id`, `courses`.`name` AS `name`, `courses`.`places_available` AS `places_available`, group_concat(distinct `subjects`.`name_subject` separator ',') AS `subjects_name`, group_concat(distinct `courses_subjects`.`id_subject` separator ',') AS `subjects_id` FROM ((`courses` left join `courses_subjects` on(`courses`.`id` = `courses_subjects`.`id_course`)) left join `subjects` on(`courses_subjects`.`id_subject` = `subjects`.`id`)) GROUP BY `courses`.`id``id`  ;

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
  ADD KEY `id_corso` (`id_course`),
  ADD KEY `id_corso_2` (`id_course`),
  ADD KEY `id_materia` (`id_subject`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT per la tabella `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `courses_subjects`
--
ALTER TABLE `courses_subjects`
  ADD CONSTRAINT `courses_subjects_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `courses_subjects_ibfk_2` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
