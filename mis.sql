-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2021 at 06:51 PM
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
-- Database: `mis`
--

-- --------------------------------------------------------

--
-- Table structure for table `dispatching`
--

CREATE TABLE `dispatching` (
  `id` int(11) NOT NULL,
  `pump_sno` text DEFAULT NULL,
  `operator_name` text DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `month` varchar(100) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL,
  `invoice_no` text DEFAULT NULL,
  `vehicle_no` text DEFAULT NULL,
  `shift` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dispatching`
--



-- --------------------------------------------------------

--
-- Table structure for table `final_2`
--

CREATE TABLE `final_2` (
  `id` int(11) NOT NULL,
  `pump_sno` text NOT NULL,
  `operator_name` text NOT NULL,
  `date` text NOT NULL,
  `time` varchar(20) DEFAULT NULL,
  `month` varchar(100) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL,
  `shift` varchar(20) DEFAULT NULL,
  `tpi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `final_2`
--


-- --------------------------------------------------------

--
-- Table structure for table `hv_test`
--

CREATE TABLE `hv_test` (
  `id` int(11) NOT NULL,
  `pump_sno` text NOT NULL,
  `operator_name` text NOT NULL,
  `date` text NOT NULL,
  `time` varchar(20) DEFAULT NULL,
  `month` varchar(100) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL,
  `shift` varchar(20) DEFAULT NULL,
  `tpi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hv_test`
--


-- --------------------------------------------------------

--
-- Table structure for table `master_scheduling`
--

CREATE TABLE `master_scheduling` (
  `seq_no` varchar(255) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `customer` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `sale_order` varchar(255) DEFAULT NULL,
  `fg` text DEFAULT NULL,
  `sfg` text DEFAULT NULL,
  `fg_part_no` text DEFAULT NULL,
  `serial_no` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `dial_face_sticker` text DEFAULT NULL,
  `tpi` varchar(50) DEFAULT NULL,
  `flag` varchar(5) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL,
  `month` varchar(100) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL,
  `siron_flag` varchar(50) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_scheduling`
--

INSERT INTO `master_scheduling` (`seq_no`, `date`, `customer`, `type`, `sale_order`, `fg`, `sfg`, `fg_part_no`, `serial_no`, `description`, `dial_face_sticker`, `tpi`, `flag`, `id`, `month`, `year`, `siron_flag`) VALUES
('1', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000002', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 1, 'AUG', '2021', ''),
('2', '2021-10-02', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000003', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '3', 2, 'OCT', '2021', '0'),
('3', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000004', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '3', 3, 'AUG', '2021', ''),
('4', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000005', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 4, 'AUG', '2021', ''),
('5', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000006', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 5, 'AUG', '2021', ''),
('6', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000007', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 6, 'AUG', '2021', ''),
('7', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000008', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 7, 'AUG', '2021', ''),
('8', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000009', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 8, 'AUG', '2021', ''),
('9', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000010', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 9, 'AUG', '2021', ''),
('10', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000011', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 10, 'AUG', '2021', ''),
('11', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000012', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 11, 'AUG', '2021', ''),
('12', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000013', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 12, 'AUG', '2021', ''),
('13', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000014', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 13, 'AUG', '2021', ''),
('14', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000015', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 14, 'AUG', '2021', ''),
('15', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000016', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 15, 'AUG', '2021', ''),
('16', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000017', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 16, 'AUG', '2021', ''),
('17', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000018', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 17, 'AUG', '2021', ''),
('18', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000019', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 18, 'AUG', '2021', ''),
('19', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000020', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 19, 'AUG', '2021', ''),
('20', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000021', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 20, 'AUG', '2021', ''),
('21', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000022', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 21, 'AUG', '2021', ''),
('22', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000023', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 22, 'AUG', '2021', ''),
('23', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000024', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 23, 'AUG', '2021', ''),
('24', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000025', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 24, 'AUG', '2021', ''),
('25', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000026', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 25, 'AUG', '2021', ''),
('26', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000027', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 26, 'AUG', '2021', ''),
('27', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000028', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 27, 'AUG', '2021', ''),
('28', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000029', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 28, 'AUG', '2021', ''),
('29', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000030', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 29, 'AUG', '2021', ''),
('30', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000031', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 30, 'AUG', '2021', ''),
('31', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000032', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 31, 'AUG', '2021', ''),
('32', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000033', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 32, 'AUG', '2021', ''),
('33', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000034', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 33, 'AUG', '2021', ''),
('34', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000035', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 34, 'AUG', '2021', ''),
('35', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000036', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 35, 'AUG', '2021', ''),
('36', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000037', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 36, 'AUG', '2021', ''),
('37', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000038', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 37, 'AUG', '2021', ''),
('38', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000039', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 38, 'AUG', '2021', ''),
('39', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000040', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 39, 'AUG', '2021', ''),
('40', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000041', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 40, 'AUG', '2021', ''),
('41', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000042', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 41, 'AUG', '2021', ''),
('42', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000043', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 42, 'AUG', '2021', ''),
('43', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000044', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 43, 'AUG', '2021', ''),
('44', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000045', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 44, 'AUG', '2021', ''),
('45', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000046', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 45, 'AUG', '2021', ''),
('46', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000047', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 46, 'AUG', '2021', ''),
('47', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000048', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 47, 'AUG', '2021', ''),
('48', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000049', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 48, 'AUG', '2021', ''),
('49', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000050', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 49, 'AUG', '2021', ''),
('50', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019216', '10019217', 'LHDPMU1TN2C3E40', '202101000051', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 50, 'AUG', '2021', ''),
('51', '2021-10-02', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019219', '10019240', 'LEDSSU1TP1APM00', '202101000052', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDSD-M1', 'Avail in BOM', 'NO', '', 51, 'AUG', '2021', ''),
('52', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019219', '10019240', 'LEDSSU1TP1APM00', '202101000053', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDSD-M1', 'Avail in BOM', 'NO', '', 52, 'AUG', '2021', ''),
('53', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019219', '10019240', 'LEDSSU1TP1APM00', '202101000054', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDSD-M1', 'Avail in BOM', 'NO', '', 53, 'AUG', '2021', ''),
('54', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019219', '10019240', 'LEDSSU1TP1APM00', '202101000055', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDSD-M1', 'Avail in BOM', 'NO', '', 54, 'AUG', '2021', ''),
('55', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019219', '10019240', 'LEDSSU1TP1APM00', '202101000056', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDSD-M1', 'Avail in BOM', 'NO', '', 55, 'AUG', '2021', ''),
('56', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019241', '10019242', 'LEDSMU1TP1APM00', '202101000057', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDHD-M3', 'Avail in BOM', 'NO', '', 56, 'AUG', '2021', ''),
('57', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019241', '10019242', 'LEDSMU1TP1APM00', '202101000058', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDHD-M3', 'Avail in BOM', 'NO', '', 57, 'AUG', '2021', ''),
('58', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019241', '10019242', 'LEDSMU1TP1APM00', '202101000059', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDHD-M3', 'Avail in BOM', 'NO', '', 58, 'AUG', '2021', ''),
('59', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019241', '10019242', 'LEDSMU1TP1APM00', '202101000060', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDHD-M3', 'Avail in BOM', 'NO', '', 59, 'AUG', '2021', ''),
('60', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019241', '10019242', 'LEDSMU1TP1APM00', '202101000061', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDHD-M3', 'Avail in BOM', 'NO', '', 60, 'AUG', '2021', ''),
('61', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019243', '10019244', 'LEDSSU1TP1APM02', '202101000062', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDSD-M4', 'Avail in BOM', 'NO', '', 61, 'AUG', '2021', ''),
('62', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019243', '10019244', 'LEDSSU1TP1APM02', '202101000063', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDSD-M4', 'Avail in BOM', 'NO', '', 62, 'AUG', '2021', ''),
('63', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019243', '10019244', 'LEDSSU1TP1APM02', '202101000064', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDSD-M4', 'Avail in BOM', 'NO', '', 63, 'AUG', '2021', ''),
('64', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019243', '10019244', 'LEDSSU1TP1APM02', '202101000065', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDSD-M4', 'Avail in BOM', 'NO', '', 64, 'AUG', '2021', ''),
('65', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019243', '10019244', 'LEDSSU1TP1APM02', '202101000066', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDSD-M4', 'Avail in BOM', 'NO', '', 65, 'AUG', '2021', ''),
('66', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019243', '10019244', 'LEDSSU1TP1APM02', '202101000067', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDSD-M4', 'Avail in BOM', 'NO', '', 66, 'AUG', '2021', ''),
('67', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019243', '10019244', 'LEDSSU1TP1APM02', '202101000068', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDSD-M4', 'Avail in BOM', 'NO', '', 67, 'AUG', '2021', ''),
('68', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019243', '10019244', 'LEDSSU1TP1APM02', '202101000069', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDSD-M4', 'Avail in BOM', 'NO', '', 68, 'AUG', '2021', ''),
('69', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019243', '10019244', 'LEDSSU1TP1APM02', '202101000070', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDSD-M4', 'Avail in BOM', 'NO', '', 69, 'AUG', '2021', ''),
('70', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019243', '10019244', 'LEDSSU1TP1APM02', '202101000071', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDSD-M4', 'Avail in BOM', 'NO', '', 70, 'AUG', '2021', ''),
('71', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019243', '10019244', 'LEDSSU1TP1APM02', '202101000072', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDSD-M4', 'Avail in BOM', 'NO', '', 71, 'AUG', '2021', ''),
('72', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019243', '10019244', 'LEDSSU1TP1APM02', '202101000073', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDSD-M4', 'Avail in BOM', 'NO', '', 72, 'AUG', '2021', ''),
('73', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019243', '10019244', 'LEDSSU1TP1APM02', '202101000074', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDSD-M4', 'Avail in BOM', 'NO', '', 73, 'AUG', '2021', ''),
('74', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019243', '10019244', 'LEDSSU1TP1APM02', '202101000075', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDSD-M4', 'Avail in BOM', 'NO', '', 74, 'AUG', '2021', ''),
('75', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019243', '10019244', 'LEDSSU1TP1APM02', '202101000076', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDSD-M4', 'Avail in BOM', 'NO', '', 75, 'AUG', '2021', ''),
('76', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019243', '10019244', 'LEDSSU1TP1APM02', '202101000077', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDSD-M4', 'Avail in BOM', 'NO', '', 76, 'AUG', '2021', ''),
('77', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019243', '10019244', 'LEDSSU1TP1APM02', '202101000078', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDSD-M4', 'Avail in BOM', 'NO', '', 77, 'AUG', '2021', ''),
('78', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019243', '10019244', 'LEDSSU1TP1APM02', '202101000079', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDSD-M4', 'Avail in BOM', 'NO', '', 78, 'AUG', '2021', ''),
('79', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019243', '10019244', 'LEDSSU1TP1APM02', '202101000080', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDSD-M4', 'Avail in BOM', 'NO', '', 79, 'AUG', '2021', ''),
('80', '2021-08-28', 'Nayara Energy Limited', 'ESSAR - RED', '-', '10019243', '10019244', 'LEDSSU1TP1APM02', '202101000081', 'ESSAR LITE DUO SUCTION (MAG+UDK)SDSD-M4', 'Avail in BOM', 'NO', '', 80, 'AUG', '2021', ''),
('81', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019273', '10019274', 'LHDPMU1TN2C3E40', '202101010176', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 81, 'AUG', '2021', ''),
('82', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019273', '10019274', 'LHDPMU1TN2C3E40', '202101000177', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 82, 'AUG', '2021', ''),
('83', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019273', '10019274', 'LHDPMU1TN2C3E40', '202101010178', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 83, 'AUG', '2021', ''),
('84', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019273', '10019274', 'LHDPMU1TN2C3E40', '202101010179', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 84, 'AUG', '2021', ''),
('85', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019273', '10019274', 'LHDPMU1TN2C3E40', '202101010180', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 85, 'AUG', '2021', ''),
('86', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019273', '10019274', 'LHDPMU1TN2C3E40', '202101010181', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 86, 'AUG', '2021', ''),
('87', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019273', '10019274', 'LHDPMU1TN2C3E40', '202101010182', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 87, 'AUG', '2021', ''),
('88', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019273', '10019274', 'LHDPMU1TN2C3E40', '202101010183', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 88, 'AUG', '2021', ''),
('89', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019273', '10019274', 'LHDPMU1TN2C3E40', '202101010184', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 89, 'AUG', '2021', ''),
('90', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019273', '10019274', 'LHDPMU1TN2C3E40', '202101010185', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 90, 'AUG', '2021', ''),
('91', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019273', '10019274', 'LHDPMU1TN2C3E40', '202101010186', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 91, 'AUG', '2021', ''),
('92', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019273', '10019274', 'LHDPMU1TN2C3E40', '202101010187', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 92, 'AUG', '2021', ''),
('93', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019273', '10019274', 'LHDPMU1TN2C3E40', '202101010188', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 93, 'AUG', '2021', ''),
('94', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019273', '10019274', 'LHDPMU1TN2C3E40', '202101010189', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 94, 'AUG', '2021', ''),
('95', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019273', '10019274', 'LHDPMU1TN2C3E40', '202101010190', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 95, 'AUG', '2021', ''),
('96', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019273', '10019274', 'LHDPMU1TN2C3E40', '202101010191', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 96, 'AUG', '2021', ''),
('97', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019273', '10019274', 'LHDPMU1TN2C3E40', '202101010192', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 97, 'AUG', '2021', ''),
('98', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019273', '10019274', 'LHDPMU1TN2C3E40', '202101010193', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 98, 'AUG', '2021', ''),
('99', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019273', '10019274', 'LHDPMU1TN2C3E40', '202101010194', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 99, 'AUG', '2021', ''),
('100', '2021-08-28', 'HPCL - INDIA', 'HPCL', '-', '10019273', '10019274', 'LHDPMU1TN2C3E40', '202101010195', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '', 100, 'AUG', '2021', ''),
('101', '2021-07-18', 'HPCL - INDIA', 'HPCL', '-', '1001921', '10019217', 'LHDPMU1TN2C3E40', '202101000001', 'HPCL DUO Pressure - SDHD', 'Avail in BOM', 'YES', '5', 101, 'JUL', '2021', '0');

-- --------------------------------------------------------

--
-- Table structure for table `master_scheduling_record`
--

CREATE TABLE `master_scheduling_record` (
  `id` int(11) NOT NULL,
  `filename` text DEFAULT NULL,
  `date_time` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_scheduling_record`
--



-- --------------------------------------------------------

--
-- Table structure for table `monthly_plan`
--

CREATE TABLE `monthly_plan` (
  `id` int(11) NOT NULL,
  `customer` varchar(100) DEFAULT NULL,
  `month` varchar(50) DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  `plan` varchar(50) DEFAULT NULL,
  `datetime` text NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monthly_plan`
--


-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `register_id` varchar(20) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `shift` varchar(20) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `access` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id`, `name`, `register_id`, `date`, `shift`, `password`, `access`) VALUES
(1, 'Hari', '1', '2021-05-30', NULL, '$2y$10$Hh/qzBP4xEUh0lLkiyVMM.0nReYLZGKGBnu/Pnxe4OREMJENMjrBu', 'Pigeon Hole HV Test '),
(2, 'Bala', '2', '2021-06-05', NULL, '$2y$10$Hh/qzBP4xEUh0lLkiyVMM.0nReYLZGKGBnu/Pnxe4OREMJENMjrBu', 'Pigeon Hole '),
(3, 'Admin', '121', '2021-07-29', NULL, '$2y$10$HEYH1f3OMshlTxPOpWT4WeMTMIhEj/4cdBdCUlup4V9Igu0EZPyq6', 'HV Test ');

-- --------------------------------------------------------

--
-- Table structure for table `packing`
--

CREATE TABLE `packing` (
  `id` int(11) NOT NULL,
  `pump_sno` text NOT NULL,
  `operator_name` text NOT NULL,
  `date` text NOT NULL,
  `time` varchar(20) DEFAULT NULL,
  `month` varchar(100) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL,
  `shift` varchar(20) DEFAULT NULL,
  `tpi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packing`
--


-- --------------------------------------------------------

--
-- Table structure for table `pigeon_hole`
--

CREATE TABLE `pigeon_hole` (
  `id` int(11) NOT NULL,
  `fg_no` text NOT NULL,
  `pump_sno` text NOT NULL,
  `sequence_no` text NOT NULL,
  `production_order_no` text NOT NULL,
  `customer` text NOT NULL,
  `pump_type` text NOT NULL,
  `operator_name` text NOT NULL,
  `date` text NOT NULL,
  `time` varchar(20) DEFAULT NULL,
  `tpi` varchar(20) DEFAULT NULL,
  `month` varchar(100) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL,
  `shift` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pigeon_hole`
--


-- --------------------------------------------------------

--
-- Table structure for table `shift_management`
--

CREATE TABLE `shift_management` (
  `date` varchar(50) NOT NULL,
  `register_id` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `access` varchar(255) DEFAULT NULL,
  `shift` varchar(50) DEFAULT NULL,
  `supervisor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siron`
--

CREATE TABLE `siron` (
  `id` int(11) NOT NULL,
  `pump_sno` varchar(50) DEFAULT NULL,
  `operator_name` varchar(50) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `tpi` varchar(50) DEFAULT NULL,
  `shift` varchar(50) DEFAULT NULL,
  `from_station` varchar(50) DEFAULT NULL,
  `station` varchar(50) DEFAULT NULL,
  `comments` varchar(50) DEFAULT NULL,
  `flag` varchar(50) NOT NULL DEFAULT '0',
  `approved_date` varchar(50) DEFAULT NULL,
  `approved_time` varchar(50) DEFAULT NULL,
  `approved_comments` text DEFAULT NULL,
  `reject_comments` text DEFAULT NULL,
  `reject_date` varchar(50) DEFAULT NULL,
  `reject_time` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siron`
--


-- --------------------------------------------------------

--
-- Table structure for table `tpi`
--

CREATE TABLE `tpi` (
  `id` int(11) NOT NULL,
  `pump_sno` text NOT NULL,
  `operator_name` text NOT NULL,
  `date` text NOT NULL,
  `time` varchar(20) DEFAULT NULL,
  `month` varchar(100) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL,
  `shift` varchar(20) DEFAULT NULL,
  `tpi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tpi`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `login_count` int(11) DEFAULT NULL,
  `last_login` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `role`, `login_count`, `last_login`, `login`) VALUES
(1, 'hari29harran@gmail.com', '$2y$10$XxjgIt9cqH9ae0IYmvPBtO24hBXePy3o9y.nlnfH.DDpkhzn4AIO6', 'Hari', 'SA', 58, 'Sat Oct 23 2021 21:09:14 GMT+0530 (India Standard Time)', 'Sat Oct 23 2021 21:30:47 GMT+0530 (India Standard Time)'),
(2, 'klalitha.it@kongu.edu', '$2y$10$NZA.mrYxy2QTd9tP4MBg5uYzCeFje7zrvy/UUW1nOj9oaMkeN1wSK', 'Lalitha', 'SA', 4, 'Fri Jul 23 2021 11:41:49 GMT+0530 (India Standard Time)', 'Sat Aug 28 2021 11:04:10 GMT+0530 (India Standard Time)'),
(4, 'admin@gmail.com', '$2y$10$gCdV0uXQDQVauOvITa//UeXNd6.4yp6Ziq9/g0TtTZ7Smu42nuiqu', 'Admin', 'Q', 6, 'Sat Oct 23 2021 21:06:29 GMT+0530 (India Standard Time)', 'Sat Oct 23 2021 21:09:30 GMT+0530 (India Standard Time)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dispatching`
--
ALTER TABLE `dispatching`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pump_sno` (`pump_sno`) USING HASH;

--
-- Indexes for table `final_2`
--
ALTER TABLE `final_2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pump_sno` (`pump_sno`) USING HASH;

--
-- Indexes for table `hv_test`
--
ALTER TABLE `hv_test`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pump_sno` (`pump_sno`) USING HASH;

--
-- Indexes for table `master_scheduling`
--
ALTER TABLE `master_scheduling`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seq_no` (`seq_no`),
  ADD UNIQUE KEY `serial_no` (`serial_no`);

--
-- Indexes for table `master_scheduling_record`
--
ALTER TABLE `master_scheduling_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_plan`
--
ALTER TABLE `monthly_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `register_id` (`register_id`);

--
-- Indexes for table `packing`
--
ALTER TABLE `packing`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pump_sno` (`pump_sno`) USING HASH;

--
-- Indexes for table `pigeon_hole`
--
ALTER TABLE `pigeon_hole`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pump_sno` (`pump_sno`) USING HASH;

--
-- Indexes for table `shift_management`
--
ALTER TABLE `shift_management`
  ADD PRIMARY KEY (`date`,`register_id`);

--
-- Indexes for table `siron`
--
ALTER TABLE `siron`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tpi`
--
ALTER TABLE `tpi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pump_sno` (`pump_sno`) USING HASH;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dispatching`
--
ALTER TABLE `dispatching`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `final_2`
--
ALTER TABLE `final_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hv_test`
--
ALTER TABLE `hv_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_scheduling`
--
ALTER TABLE `master_scheduling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `master_scheduling_record`
--
ALTER TABLE `master_scheduling_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `monthly_plan`
--
ALTER TABLE `monthly_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `packing`
--
ALTER TABLE `packing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pigeon_hole`
--
ALTER TABLE `pigeon_hole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siron`
--
ALTER TABLE `siron`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tpi`
--
ALTER TABLE `tpi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
