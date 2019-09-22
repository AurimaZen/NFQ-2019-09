-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2019 at 09:58 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eilute`
--

-- --------------------------------------------------------

--
-- Table structure for table `registracija`
--

CREATE TABLE `registracija` (
  `id` int(11) NOT NULL,
  `vardas` varchar(150) NOT NULL,
  `specialistas` text NOT NULL,
  `laikas` time NOT NULL,
  `galinislaikas` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registracija`
--

INSERT INTO `registracija` (`id`, `vardas`, `specialistas`, `laikas`, `galinislaikas`) VALUES
(20, 'Pavel', 'Petraitis', '12:19:46', '17:53:48'),
(21, 'Juozas', 'Petraitis', '13:02:08', '17:54:01'),
(22, 'Zenius', 'Petraitis', '13:15:23', '13:31:22'),
(23, 'Genute', 'Petraitis', '13:32:00', '13:36:02'),
(24, 'Gelyte', 'Petraitis', '13:36:22', '13:47:34'),
(25, 'Janina', 'Petraitis', '13:43:10', '21:49:06'),
(26, 'Gitanas', 'Petraitis', '13:51:39', '14:29:02'),
(27, 'Gintare', 'Petraitis', '14:27:38', '14:31:22'),
(28, 'Petraitiene', 'Petraitis', '18:39:08', '00:00:00'),
(29, 'Onuta', 'Jonaitis', '18:49:06', '21:03:49'),
(31, 'Liepa', 'Antanaitis', '21:12:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specialistai`
--

CREATE TABLE `specialistai` (
  `specialisto_vardas` varchar(50) NOT NULL,
  `pastas` varchar(200) NOT NULL,
  `slaptazodis` varchar(150) NOT NULL,
  `id` int(11) NOT NULL,
  `laikotarpas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialistai`
--

INSERT INTO `specialistai` (`specialisto_vardas`, `pastas`, `slaptazodis`, `id`, `laikotarpas`) VALUES
('Jonaitis', 'pastas@gmail.com', 'asdf', 7, 29156),
('Petraitis', 'naujas pastas@gmail.com', 'gyvenimas', 8, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registracija`
--
ALTER TABLE `registracija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialistai`
--
ALTER TABLE `specialistai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registracija`
--
ALTER TABLE `registracija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `specialistai`
--
ALTER TABLE `specialistai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
