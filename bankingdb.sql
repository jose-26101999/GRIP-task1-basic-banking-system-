-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2021 at 05:25 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bankingdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers_tb`
--

CREATE TABLE `customers_tb` (
  `customers_id` int(11) NOT NULL,
  `customers_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `customers_email` varchar(100) COLLATE utf8_bin NOT NULL,
  `customers_current_balance` bigint(60) NOT NULL,
  `customers_account_no` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `customers_tb`
--

INSERT INTO `customers_tb` (`customers_id`, `customers_name`, `customers_email`, `customers_current_balance`, `customers_account_no`) VALUES
(1, 'JONES', 'jones@gmail.com', 97000, 100012345801),
(2, 'Sanjay', 'sanjay@gmail.com', 80000, 100012345802),
(3, 'GURU', 'guru@gmail.com', 74900, 100012345803),
(4, 'BOJE', 'bp@gmail.com', 100100, 100012345804),
(5, 'LOYOLA', 'LOYOLA@gmail.com', 150000, 100012345805),
(6, 'JOSE', 'jose@gmail.com', 160000, 100012345806),
(7, 'ROZARIO', 'rozario@gmail.com', 150090, 100012345807),
(8, 'AJAY', 'ajay@gmail.com', 150000, 100012345808),
(9, 'SACHIN', 'sachin@gmail.com', 150000, 100012345809),
(10, 'SATHISH', 'SP@gmail.com', 80000, 100012345810);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_tb`
--

CREATE TABLE `transaction_tb` (
  `transaction_id` int(11) NOT NULL,
  `sender` varchar(60) COLLATE utf8_bin NOT NULL,
  `receiver` varchar(60) COLLATE utf8_bin NOT NULL,
  `balance` bigint(100) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `transaction_tb`
--

INSERT INTO `transaction_tb` (`transaction_id`, `sender`, `receiver`, `balance`, `date_time`) VALUES
(2, 'JONES', 'GURU', 50, '2021-05-07 09:30:40'),
(3, 'GURU', 'JONES', 50, '2021-05-07 09:31:38'),
(4, 'GURU', 'BOJE', 100, '2021-05-07 09:31:58'),
(5, 'JONES', 'GURU', 74901, '2021-05-07 10:08:18'),
(6, 'GURU', 'JONES', 74901, '2021-05-07 10:09:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers_tb`
--
ALTER TABLE `customers_tb`
  ADD PRIMARY KEY (`customers_id`);

--
-- Indexes for table `transaction_tb`
--
ALTER TABLE `transaction_tb`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers_tb`
--
ALTER TABLE `customers_tb`
  MODIFY `customers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transaction_tb`
--
ALTER TABLE `transaction_tb`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
