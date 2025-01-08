-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08.01.2025 klo 14:07
-- Palvelimen versio: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lennotwpdp`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `haku`
--

CREATE TABLE `haku` (
  `hakuID` int(11) NOT NULL,
  `LentoID` int(11) NOT NULL,
  `Wherefrom` varchar(255) NOT NULL,
  `Whereto` varchar(255) NOT NULL,
  `passengers` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Vedos taulusta `haku`
--

INSERT INTO `haku` (`hakuID`, `LentoID`, `Wherefrom`, `Whereto`, `passengers`, `date`, `time`) VALUES
(15, 5, 'Tikkakoski', 'Oslo', 2, '2025-01-16', '14:30:00.000000'),
(16, 1, 'Tikkakoski', 'Oulu', 3, '2025-01-12', '06:12:00.000000'),
(17, 28, 'Tikkakoski', 'Kööpenhamina', 4, '2025-01-14', '06:15:00.000000'),
(18, 14, 'Tikkakoski', 'Helsinki', 1, '2025-01-19', '06:16:00.000000');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vedos taulusta `lennot`
--

INSERT INTO `lennot` (`LentoID`, `Kohdemaa`, `Kaupunki`, `Aika`, `Kone`, `LipunHinta`, `VapaatPaikat`) VALUES
(1, 'Suomi', 'Oulu', 'Aamu', 'Q400', 65.50, 6),
(2, 'Suomi', 'Oulu', 'Ilta', 'Q400', 65.75, 15),
(3, 'Suomi', 'Helsinki', 'Päivä', 'A220-300', 74.55, 50),
(4, 'Suomi', 'Rovaniemi', 'Päivä', 'Q400', 78.94, 3),
(5, 'Norja', 'Oslo', 'Aamu', 'Q400', 125.45, 40),
(6, 'Norja', 'Oslo', 'Aamu', 'A220-300', 132.53, 14),
(7, 'Norja', 'Bergen', 'Päivä', 'Q400', 86.45, 23),
(8, 'Norja', 'Bergen', 'Aamu', 'Q400', 75.88, 3),
(9, 'Ruotsi', 'Arlanda', 'Päivä', 'Q400', 98.12, 200),
(10, 'Ruotsi', 'Arlanda', 'Aamu', 'Q400', 99.49, 12),
(11, 'Ruotsi', 'Arlanda', 'Päivä', 'A220-300', 102.24, 50),
(12, 'Suomi', 'Helsinki', 'Päivä', 'Q400', 78.50, 60),
(13, 'Suomi', 'Rovaniemi', 'Päivä', 'Q400', 88.34, 16),
(14, 'Suomi', 'Helsinki', 'Päivä', 'A220-300', 87.32, 5),
(15, 'Norja', 'Bergen', 'Päivä', 'A220-100', 199.93, 7),
(16, 'Norja', 'Bergen', 'Ilta', 'A220-300', 213.05, 8),
(17, 'Suomi', 'Helsinki', 'Aamu', 'Q400', 81.20, 16),
(18, 'Suomi', 'Helsinki', 'Aamu', 'A220-100', 99.00, 20),
(19, 'Suomi', 'Oulu', 'Päivä', 'A220-100', 234.40, 7),
(20, 'Norja', 'Bergen', 'Ilta', 'A220-100', 134.90, 30),
(21, 'Norja', 'Bergen', 'Päivä', 'A220-300', 144.10, 8),
(22, 'Ruotsi', 'Göteborg', 'Ilta', 'A220-300', 55.00, 34),
(23, 'Ruotsi', 'Göteborg', 'Aamu', 'A220-300', 61.00, 12),
(24, 'Islanti', 'Keflaki', 'Ilta', 'A220-300', 63.00, 15),
(25, 'Ruotsi', 'Malmö', 'Ilta', 'Q400', 75.00, 32),
(26, 'Ruotsi', 'Malmö', 'Aamu', 'A220-300', 82.00, 12),
(27, 'Norja', 'Trondheim', 'Ilta', 'A220-300', 81.00, 16),
(28, 'Tanska ', 'Kööpenhamina', 'Ilta', 'A220-300', 91.00, 3),
(29, 'Ruotsi', 'Göteborg', 'Ilta', 'A220-300', 55.00, 34),
(30, 'Tanska', 'Billund', 'Ilta', 'A220-300', 61.00, 12),
(31, 'Islanti', 'Keflaki', 'Ilta', 'A220-300', 63.00, 11),
(32, 'Tanska', 'Billund', 'Aamu', 'Q400', 75.00, 32),
(33, 'Tanska', 'Kööpenhamina', 'Ilta', 'A220-300', 82.00, 12),
(34, 'Norja', 'Trondheim', 'Ilta', 'A220-300', 81.00, 16),
(35, 'Tanska ', 'Kööpenhamina', 'Ilta', 'A220-300', 91.00, 33);

-- --------------------------------------------------------

--
-- Rakenne taululle `tilaus`
--

CREATE TABLE `tilaus` (
  `tilausID` int(11) NOT NULL,
  `pvm` date NOT NULL,
  `Lennonajankohta` time(6) NOT NULL,
  `kohdekaupunki` varchar(255) NOT NULL,
  `lippujenmaara` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Vedos taulusta `tilaus`
--

INSERT INTO `tilaus` (`tilausID`, `pvm`, `Lennonajankohta`, `kohdekaupunki`, `lippujenmaara`) VALUES
(1, '2025-01-19', '06:16:00.000000', 'Helsinki', 1);

-- --------------------------------------------------------

--
-- Rakenne taululle `tilaus_passengers`
--

CREATE TABLE `tilaus_passengers` (
  `passengerID` int(11) NOT NULL,
  `tilausID` int(11) NOT NULL,
  `tilaajanNimi` varchar(255) NOT NULL,
  `tilaajanOsoite` varchar(255) NOT NULL,
  `tilaajanEmail` varchar(255) NOT NULL,
  `tilaajanPuhelin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Vedos taulusta `tilaus_passengers`
--

INSERT INTO `tilaus_passengers` (`passengerID`, `tilausID`, `tilaajanNimi`, `tilaajanOsoite`, `tilaajanEmail`, `tilaajanPuhelin`) VALUES
(1, 1, 'Aada Rauhala', 'Yhteiskouluntie 32', 'rauhala.aada@gmail.com', '04578737379');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `haku`
--
ALTER TABLE `haku`
  ADD PRIMARY KEY (`hakuID`);

--
-- Indexes for table `lennot`
--
ALTER TABLE `lennot`
  ADD PRIMARY KEY (`LentoID`);

--
-- Indexes for table `tilaus`
--
ALTER TABLE `tilaus`
  ADD PRIMARY KEY (`tilausID`);

--
-- Indexes for table `tilaus_passengers`
--
ALTER TABLE `tilaus_passengers`
  ADD PRIMARY KEY (`passengerID`),
  ADD KEY `tilausID` (`tilausID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `haku`
--
ALTER TABLE `haku`
  MODIFY `hakuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `lennot`
--
ALTER TABLE `lennot`
  MODIFY `LentoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tilaus`
--
ALTER TABLE `tilaus`
  MODIFY `tilausID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tilaus_passengers`
--
ALTER TABLE `tilaus_passengers`
  MODIFY `passengerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Rajoitteet vedostauluille
--

--
-- Rajoitteet taululle `tilaus_passengers`
--
ALTER TABLE `tilaus_passengers`
  ADD CONSTRAINT `tilaus_passengers_ibfk_1` FOREIGN KEY (`tilausID`) REFERENCES `tilaus` (`tilausID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
