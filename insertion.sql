-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2021 at 04:24 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insertion`
--

-- --------------------------------------------------------

--
-- Table structure for table `celula`
--

CREATE TABLE `celula` (
  `ID` int(10) NOT NULL,
  `DataC` date DEFAULT NULL,
  `HoraInicio` time(6) DEFAULT NULL,
  `HoraFim` time(6) DEFAULT NULL,
  `TipoPresencaID` int(10) DEFAULT NULL,
  `EscalasID` int(10) DEFAULT NULL,
  `FuncionarioID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `escalas`
--

CREATE TABLE `escalas` (
  `ID` int(10) NOT NULL,
  `DataInicio` date DEFAULT NULL,
  `DataFim` date DEFAULT NULL,
  `TipoEscalaID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `funcionario`
--

CREATE TABLE `funcionario` (
  `ID` int(10) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `SetorID` int(10) DEFAULT NULL,
  `TipoEscalaID` int(10) DEFAULT NULL,
  `TipoFeriasID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `setor`
--

CREATE TABLE `setor` (
  `ID` int(10) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tipoescala`
--

CREATE TABLE `tipoescala` (
  `ID` int(10) NOT NULL,
  `TipoEscala` varchar(255) DEFAULT NULL,
  `Duracao` time(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tipoferias`
--

CREATE TABLE `tipoferias` (
  `ID` int(10) NOT NULL,
  `Tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tipopresenca`
--

CREATE TABLE `tipopresenca` (
  `ID` int(10) NOT NULL,
  `Tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tipousuario`
--

CREATE TABLE `tipousuario` (
  `ID` int(10) NOT NULL,
  `Tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(10) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Login` varchar(255) NOT NULL,
  `Senha` varchar(255) NOT NULL,
  `TipoUsuarioID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`ID`, `Nome`, `Login`, `Senha`, `TipoUsuarioID`) VALUES
(0, NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `celula`
--
ALTER TABLE `celula`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TipoPresencaID` (`TipoPresencaID`),
  ADD KEY `EscalasID` (`EscalasID`),
  ADD KEY `FuncionarioID` (`FuncionarioID`);

--
-- Indexes for table `escalas`
--
ALTER TABLE `escalas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TipoEscalaID` (`TipoEscalaID`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tipoescala`
--
ALTER TABLE `tipoescala`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tipoferias`
--
ALTER TABLE `tipoferias`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tipopresenca`
--
ALTER TABLE `tipopresenca`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TipoUsuarioID` (`TipoUsuarioID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `celula`
--
ALTER TABLE `celula`
  ADD CONSTRAINT `celula_ibfk_1` FOREIGN KEY (`TipoPresencaID`) REFERENCES `tipopresenca` (`ID`),
  ADD CONSTRAINT `celula_ibfk_2` FOREIGN KEY (`EscalasID`) REFERENCES `escalas` (`ID`),
  ADD CONSTRAINT `celula_ibfk_3` FOREIGN KEY (`FuncionarioID`) REFERENCES `funcionario` (`ID`);

--
-- Constraints for table `escalas`
--
ALTER TABLE `escalas`
  ADD CONSTRAINT `escalas_ibfk_1` FOREIGN KEY (`TipoEscalaID`) REFERENCES `tipoescala` (`ID`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`TipoUsuarioID`) REFERENCES `tipousuario` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
