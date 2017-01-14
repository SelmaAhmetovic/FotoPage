-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2017 at 09:51 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spirala4`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', 'admin123'),
('novi', 'novi123'),
('zeljkojuric', 'zeljko123'),
('harissupic', 'haris123'),
('amina', 'admina123');

-- --------------------------------------------------------

--
-- Table structure for table `poruka_adminu`
--

CREATE TABLE `poruka_adminu` (
  `username` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `poruka` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `poruka_adminu`
--

INSERT INTO `poruka_adminu` (`username`, `email`, `poruka`) VALUES
('admin', 'email@gmail.com', 'prva poruka od admina adminu'),
('novi', 'novi@gmail.com', 'poruka od novog za admina'),
('zeljkojuric', 'zeljko@gmail.com', 'poruka od zeljka za admina'),
('harissupic', 'haris@gmail.com', 'poruka od harisa supica za admina');

-- --------------------------------------------------------

--
-- Table structure for table `registracija`
--

CREATE TABLE `registracija` (
  `username` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `ime` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `prezime` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `datum_rodjenja` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `registracija`
--

INSERT INTO `registracija` (`username`, `ime`, `prezime`, `email`, `datum_rodjenja`, `password`) VALUES
('admin', 'Selma', 'Ahmetović', 'selmaahmetovic26@gmail.com', '26/03/1995', 'admin123'),
('amina', 'Amina', 'Mahmutovic', 'amina@gmail.com', '26/01/1995', 'amina123'),
('harissupic', 'Haris', 'Supic', 'haris@gmail.com', '1972-06-20', 'haris123'),
('novi', 'novi_ime', 'novi_prezime', 'novi@gmail.com', '01/01/2017', 'novi123'),
('zeljkojuric', 'Zeljko', 'Juric', 'zeljko_juric@gmail.com', '1972-06-20', 'zeljko');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD KEY `username` (`username`);

--
-- Indexes for table `poruka_adminu`
--
ALTER TABLE `poruka_adminu`
  ADD KEY `username` (`username`);

--
-- Indexes for table `registracija`
--
ALTER TABLE `registracija`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`username`) REFERENCES `registracija` (`username`);

--
-- Constraints for table `poruka_adminu`
--
ALTER TABLE `poruka_adminu`
  ADD CONSTRAINT `poruka_adminu_ibfk_1` FOREIGN KEY (`username`) REFERENCES `registracija` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
