-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2022 at 04:54 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mis1`
--

-- --------------------------------------------------------

--
-- Table structure for table `monthly_plan`
--

CREATE TABLE `monthly_plan` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL,
  `month` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `plan` varchar(50) DEFAULT NULL,
  `datetime` text NOT NULL DEFAULT current_timestamp(),
  `updated_datetime` text NOT NULL DEFAULT current_timestamp(),
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monthly_plan`
--

INSERT INTO `monthly_plan` (`id`, `type`, `customer`, `date`, `month`, `year`, `plan`, `datetime`, `updated_datetime`, `count`) VALUES
(7, 'ESSAR - RED', 'Fueltec Zimbabwe', '2022-01-06', 'JAN', '2022', '160', '2022-01-06 21:05:56', '2022-01-06 21:11:51', 1),
(6, 'HPCL', 'HPCL - Dubai', '2021-12-29', 'DEC', '2021', '150', '2021-12-30 18:30:00', '', 0),
(5, 'HPCL', 'HPCL - Dubai', '2021-12-30', 'DEC', '2021', '200', '2021-12-30 18:29:25', '', 0),
(4, 'HPCL', 'HPCL - INDIA', '2021-12-29', 'DEC', '2021', '200', '2021-12-30 18:22:13', '', 0),
(3, 'HPCL', 'HPCL - INDIA', '2021-12-30', 'DEC', '2021', '100', '2021-12-30 18:09:16', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `monthly_plan`
--
ALTER TABLE `monthly_plan`
  ADD PRIMARY KEY (`type`,`customer`,`date`,`month`,`year`),
  ADD KEY `id` (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `monthly_plan`
--
ALTER TABLE `monthly_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
