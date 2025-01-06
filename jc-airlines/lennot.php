-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07.04.2021 klo 10:07
-- Palvelimen versio: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lennot`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `lennot`
--

CREATE TABLE `lennot` (
  `LentoID` int(11) NOT NULL,
  `Kohdemaa` varchar(255) NOT NULL,
  `Kaupunki` varchar(255) NOT NULL,
  `Aika` varchar(255) NOT NULL,
  `Kone` varchar(20) NOT NULL,
  `LipunHinta` decimal(10,2) NOT NULL,
  `VapaatPaikat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `lennot`
--

INSERT INTO `lennot` (`LentoID`, `Kohdemaa`, `Kaupunki`, `Aika`, `Kone`, `LipunHinta`, `VapaatPaikat`) VALUES
(1, 'Suomi', 'Oulu', 'Aamu', 'Q400', '65.50', 6),
(2, 'Suomi', 'Oulu', 'Ilta', 'Q400', '65.75', 15),
(3, 'Suomi', 'Helsinki', 'Päivä', 'A220-300', '74.55', 50),
(4, 'Suomi', 'Rovaniemi', 'Päivä', 'Q400', '78.94', 3),
(5, 'Norja', 'Oslo', 'Aamu', 'Q400', '125.45', 40),
(6, 'Norja', 'Oslo', 'Aamu', 'A220-300', '132.53', 14),
(7, 'Norja', 'Bergen', 'Päivä', 'Q400', '86.45', 23),
(8, 'Norja', 'Bergen', 'Aamu', 'Q400', '75.88', 3),
(9, 'Ruotsi', 'Arlanda', 'Päivä', 'Q400', '98.12', 200),
(10, 'Ruotsi', 'Arlanda', 'Aamu', 'Q400', '99.49', 12),
(11, 'Ruotsi', 'Arlanda', 'Päivä', 'A220-300', '102.24', 50),
(12, 'Suomi', 'Helsinki', 'Päivä', 'Q400', '78.50', 60),
(13, 'Suomi', 'Rovaniemi', 'Päivä', 'Q400', '88.34', 16),
(14, 'Suomi', 'Helsinki', 'Päivä', 'A220-300', '87.32', 5),
(15, 'Norja', 'Bergen', 'Päivä', 'A220-100', '199.93', 7),
(16, 'Norja', 'Bergen', 'Ilta', 'A220-300', '213.05', 8),
(17, 'Suomi', 'Helsinki', 'Aamu', 'Q400', '81.20', 16),
(18, 'Suomi', 'Helsinki', 'Aamu', 'A220-100', '99.00', 20),
(19, 'Suomi', 'Oulu', 'Päivä', 'A220-100', '234.40', 7),
(20, 'Norja', 'Bergen', 'Ilta', 'A220-100', '134.90', 30),
(21, 'Norja', 'Bergen', 'Päivä', 'A220-300', '144.10', 8),
(22, 'Ruotsi', 'Göteborg', 'Ilta', 'A220-300', '55.00', 34),
(23, 'Ruotsi', 'Göteborg', 'Aamu', 'A220-300', '61.00', 12),
(24, 'Islanti', 'Keflaki', 'Ilta', 'A220-300', '63.00', 15),
(25, 'Ruotsi', 'Malmö', 'Ilta', 'Q400', '75.00', 32),
(26, 'Ruotsi', 'Malmö', 'Aamu', 'A220-300', '82.00', 12),
(27, 'Norja', 'Trondheim', 'Ilta', 'A220-300', '81.00', 16),
(28, 'Tanska ', 'Kööpenhamina', 'Ilta', 'A220-300', '91.00', 3),
(29, 'Ruotsi', 'Göteborg', 'Ilta', 'A220-300', '55.00', 34),
(30, 'Tanska', 'Billund', 'Ilta', 'A220-300', '61.00', 12),
(31, 'Islanti', 'Keflaki', 'Ilta', 'A220-300', '63.00', 11),
(32, 'Tanska', 'Billund', 'Aamu', 'Q400', '75.00', 32),
(33, 'Tanska', 'Kööpenhamina', 'Ilta', 'A220-300', '82.00', 12),
(34, 'Norja', 'Trondheim', 'Ilta', 'A220-300', '81.00', 16),
(35, 'Tanska ', 'Kööpenhamina', 'Ilta', 'A220-300', '91.00', 33);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lennot`
--
ALTER TABLE `lennot`
  ADD PRIMARY KEY (`LentoID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lennot`
--
ALTER TABLE `lennot`
  MODIFY `LentoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;