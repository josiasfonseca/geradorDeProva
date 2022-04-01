-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2022 at 09:20 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `provas`
--

-- --------------------------------------------------------

--
-- Table structure for table `aplicante`
--

CREATE TABLE `aplicante` (
                             `idaplicante` int(11) NOT NULL,
                             `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aplicante`
--

INSERT INTO `aplicante` (`idaplicante`, `nome`) VALUES
                                                    (111, 'guilherme'),
                                                    (112, 'guilherme'),
                                                    (113, 'guilherme'),
                                                    (114, 'guilherme'),
                                                    (115, 'ada'),
                                                    (116, 'ada'),
                                                    (117, 'ada'),
                                                    (118, 'ada'),
                                                    (119, 'ada'),
                                                    (120, 'ada'),
                                                    (121, 'ada'),
                                                    (122, 'ada'),
                                                    (123, 'ada'),
                                                    (124, 'ada'),
                                                    (125, 'ada'),
                                                    (126, 'ada'),
                                                    (127, 'ada');

-- --------------------------------------------------------

--
-- Table structure for table `perguntas`
--

CREATE TABLE `perguntas` (
                             `idperguntas` int(11) NOT NULL,
                             `pergunta` varchar(255) NOT NULL,
                             `dificuldade` int(11) NOT NULL,
                             `respostas` longtext DEFAULT NULL,
                             `tipo_pergunta` int(11) DEFAULT NULL,
                             `rotulo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `perguntas`
--

INSERT INTO `perguntas` (`idperguntas`, `pergunta`, `dificuldade`, `respostas`, `tipo_pergunta`, `rotulo`) VALUES
                                                                                                               (7, 'Quem descobriu o Brasil?', 1, '[{\"name\":\"colombo\",\"value\":false},{\"name\":\"pedro drumont\",\"value\":false},{\"name\":\"machado de assis\",\"value\":false},{\"name\":\"pedro alvares cabral\",\"value\":true}]', 1, 'historia'),
                                                                                                               (8, 'quem descobriu a america?', 1, '[{\"name\":\"os indios\",\"value\":false},{\"name\":\"os incas\",\"value\":false},{\"name\":\"os maias\",\"value\":false},{\"name\":\"colombo\",\"value\":true}]', 1, 'historia');

-- --------------------------------------------------------

--
-- Table structure for table `prova`
--

CREATE TABLE `prova` (
                         `idprova` int(11) NOT NULL,
                         `aplicante_idaplicante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prova`
--

INSERT INTO `prova` (`idprova`, `aplicante_idaplicante`) VALUES
                                                             (111, 111),
                                                             (112, 112),
                                                             (113, 113),
                                                             (114, 114),
                                                             (115, 115),
                                                             (116, 116),
                                                             (117, 117),
                                                             (118, 118),
                                                             (119, 119),
                                                             (120, 120),
                                                             (121, 121),
                                                             (122, 122),
                                                             (123, 123),
                                                             (124, 124),
                                                             (125, 125),
                                                             (126, 126),
                                                             (127, 127);

-- --------------------------------------------------------

--
-- Table structure for table `prova_has_perguntas`
--

CREATE TABLE `prova_has_perguntas` (
                                       `prova_idprova` int(11) NOT NULL,
                                       `perguntas_idperguntas` int(11) NOT NULL,
                                       `respostas_dada` varchar(255) NOT NULL,
                                       `acertou` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prova_has_perguntas`
--

INSERT INTO `prova_has_perguntas` (`prova_idprova`, `perguntas_idperguntas`, `respostas_dada`, `acertou`) VALUES
                                                                                                              (112, 7, '4', 0),
                                                                                                              (112, 8, '1', 0),
                                                                                                              (113, 8, '4', 1),
                                                                                                              (114, 7, '4', 1),
                                                                                                              (114, 8, '1', 1),
                                                                                                              (115, 8, '1', NULL),
                                                                                                              (116, 7, '4', NULL),
                                                                                                              (118, 7, '1', NULL),
                                                                                                              (119, 7, '4', NULL),
                                                                                                              (120, 8, '1', NULL),
                                                                                                              (121, 7, '4', NULL),
                                                                                                              (122, 8, '1', NULL),
                                                                                                              (123, 7, '1', NULL),
                                                                                                              (125, 8, '4', NULL),
                                                                                                              (126, 8, '4', NULL),
                                                                                                              (127, 7, '1', 0),
                                                                                                              (127, 8, '4', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aplicante`
--
ALTER TABLE `aplicante`
    ADD PRIMARY KEY (`idaplicante`);

--
-- Indexes for table `perguntas`
--
ALTER TABLE `perguntas`
    ADD PRIMARY KEY (`idperguntas`);

--
-- Indexes for table `prova`
--
ALTER TABLE `prova`
    ADD PRIMARY KEY (`idprova`),
  ADD KEY `fk_prova_aplicante1_idx` (`aplicante_idaplicante`);

--
-- Indexes for table `prova_has_perguntas`
--
ALTER TABLE `prova_has_perguntas`
    ADD PRIMARY KEY (`prova_idprova`,`perguntas_idperguntas`),
  ADD KEY `fk_prova_has_perguntas_perguntas1` (`perguntas_idperguntas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aplicante`
--
ALTER TABLE `aplicante`
    MODIFY `idaplicante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `perguntas`
--
ALTER TABLE `perguntas`
    MODIFY `idperguntas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prova`
--
ALTER TABLE `prova`
    MODIFY `idprova` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prova`
--
ALTER TABLE `prova`
    ADD CONSTRAINT `fk_prova_aplicante1` FOREIGN KEY (`aplicante_idaplicante`) REFERENCES `aplicante` (`idaplicante`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prova_has_perguntas`
--
ALTER TABLE `prova_has_perguntas`
    ADD CONSTRAINT `fk_prova_has_perguntas_perguntas1` FOREIGN KEY (`perguntas_idperguntas`) REFERENCES `perguntas` (`idperguntas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prova_has_perguntas_prova1` FOREIGN KEY (`prova_idprova`) REFERENCES `prova` (`idprova`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
