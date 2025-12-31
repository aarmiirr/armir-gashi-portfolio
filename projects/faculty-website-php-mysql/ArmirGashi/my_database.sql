-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2025 at 04:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `lendet`
--

CREATE TABLE `lendet` (
  `id_lenda` int(11) NOT NULL,
  `emri_lendes` varchar(255) NOT NULL,
  `profesori` varchar(255) NOT NULL,
  `semestri` enum('1','2','3','4','5','6') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perdoruesit`
--

CREATE TABLE `perdoruesit` (
  `ID` int(6) UNSIGNED NOT NULL,
  `emri` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fjalkalimi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perdoruesit`
--

INSERT INTO `perdoruesit` (`ID`, `emri`, `email`, `fjalkalimi`) VALUES
(0, 'Armir', 'armirgashi649@gmail.com', '$2y$10$4UmXZeGVdKN2sePNxUy6WOFelEsvQrvD3RD5ykVpclmVZBQYaA1Xi');

-- --------------------------------------------------------

--
-- Table structure for table `regjistrimi_semestrit`
--

CREATE TABLE `regjistrimi_semestrit` (
  `emri_studentit` varchar(100) NOT NULL,
  `numri_id` varchar(50) NOT NULL,
  `semestri` int(11) NOT NULL,
  `data_regjistrimit` date NOT NULL,
  `lendet` text NOT NULL,
  `pershkrimi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regjistrimi_semestrit`
--

INSERT INTO `regjistrimi_semestrit` (`emri_studentit`, `numri_id`, `semestri`, `data_regjistrimit`, `lendet`, `pershkrimi`) VALUES
('Armir Gashi', '222364890', 1, '2132-02-13', 'Etike,Didaktike,Fizike', ''),
('asfasf', 'asfasasf', 1, '0031-12-12', 'asfafsa', 'asdas'),
('Armir Gashi', 'asfasasf', 1, '2025-03-02', 'Etike,Didaktike,Fizike', 'asdas'),
('Armir Gashi', 'asfasasf', 2, '2422-12-12', 'Didaktika,fasf', 'asfafaa'),
('Armir Gashi', '222364890', 1, '0012-04-12', 'Etike,Didaktike,Fizike', 'asfassf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lendet`
--
ALTER TABLE `lendet`
  ADD PRIMARY KEY (`id_lenda`) USING BTREE;

--
-- Indexes for table `perdoruesit`
--
ALTER TABLE `perdoruesit`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
