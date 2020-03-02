-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2019 at 03:57 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzeria`
--

-- --------------------------------------------------------

--
-- Table structure for table `klanten`
--

CREATE TABLE `klanten` (
  `id` int(11) NOT NULL,
  `naam` varchar(30) DEFAULT NULL,
  `voornaam` varchar(40) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `straat` varchar(50) DEFAULT NULL,
  `huisnummer` int(11) DEFAULT NULL,
  `woonplaats_id` int(11) DEFAULT NULL,
  `telefoon` int(15) DEFAULT NULL,
  `wachtwoord` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klanten`
--

INSERT INTO `klanten` (`id`, `naam`, `voornaam`, `email`, `straat`, `huisnummer`, `woonplaats_id`, `telefoon`, `wachtwoord`) VALUES
(21, 'Clijsters', 'Tuur', 'tuur@mail.com', 'boekstraat', 12, 2, 34555617, '0cbab7e743096d327e14367134b9873a'),
(22, 'Clijsters', 'az', 'az@mail.com', 'az', 12, 2, 345545, '959848ca10cc8a60da818ac11523dc63'),
(23, 'az', 'az', 't@t.com', 'az', 12, 29, 2147483647, 'cc8c0a97c2dfcd73caff160b65aa39e2');

-- --------------------------------------------------------

--
-- Table structure for table `producten`
--

CREATE TABLE `producten` (
  `id` int(11) NOT NULL,
  `naam` varchar(30) DEFAULT NULL,
  `prijs` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producten`
--

INSERT INTO `producten` (`id`, `naam`, `prijs`) VALUES
(1, 'Margherita', 10),
(2, 'Napoletana', 11.99),
(3, 'Quattro formaggi', 12.5),
(4, 'Peperoni', 11),
(5, 'Funghi', 11.5);

-- --------------------------------------------------------

--
-- Table structure for table `woonplaats`
--

CREATE TABLE `woonplaats` (
  `id` int(11) NOT NULL,
  `plaats` varchar(30) DEFAULT NULL,
  `postcode` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `woonplaats`
--

INSERT INTO `woonplaats` (`id`, `plaats`, `postcode`) VALUES
(2, 'Antwerpen', 2000),
(3, 'antwerpen', 1236),
(4, NULL, NULL),
(5, NULL, NULL),
(6, 'antwerpen', 6363),
(7, 'antwerpen', 6363),
(8, 'antwerpen', 6363),
(9, 'antwerpen', 1234),
(10, 'antwerpen', 2),
(11, 'antwerpen', 123),
(12, 'antwerpen', 3),
(13, '', 0),
(14, 'antwerpen', 1233),
(15, 'az', 12),
(16, 'az', 123),
(17, 'az', 1234),
(18, 'antwerpen', 1),
(19, 'antwerpen', 12344),
(20, 'antwerpen', 123442),
(21, 'antwerpen', 12),
(22, 'antwerpen', 12235),
(23, 'antwerpen', 12345),
(24, NULL, NULL),
(25, 'antwerpen', 1223),
(26, 'antwerpen', 1212),
(27, 'az', 1236),
(28, 'antwerpen', 124),
(29, 'antwerpen', 1243);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `woonplaats_id` (`woonplaats_id`);

--
-- Indexes for table `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `woonplaats`
--
ALTER TABLE `woonplaats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klanten`
--
ALTER TABLE `klanten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `producten`
--
ALTER TABLE `producten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `woonplaats`
--
ALTER TABLE `woonplaats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `klanten`
--
ALTER TABLE `klanten`
  ADD CONSTRAINT `klanten_ibfk_1` FOREIGN KEY (`woonplaats_id`) REFERENCES `woonplaats` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
