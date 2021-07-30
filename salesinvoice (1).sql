-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 30, 2021 at 01:39 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salesinvoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(55) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `description`, `amount`) VALUES
(2, 'sadq', '200'),
(3, 'num1', '2'),
(4, 'Web hosting', '4000/-'),
(23, 'asas', '9999'),
(23, 'etyd', '999'),
(6, 'rff', 'dff'),
(12, '5ty54', '54y6y'),
(4568, 'uifgiu', 'ljgoui'),
(548, 'jfuyj', 'kgbkugvb'),
(749, 'bnjklbk', 'hmkvjh'),
(23, 'ooo', '25'),
(123, '123', '123'),
(1123, 'hhh', 'hjkj'),
(46, 'hfc', 'ghfch'),
(6469, 'HJVJHCG', 'GFKYYKDKYDFKYYKCJ'),
(9999, 'ooo', '888'),
(88, 'ooo', '888'),
(2552, 'ooo', '888'),
(6566, 'ppp', '852'),
(6566, 'rty', '6456'),
(6566, 'sa', '985'),
(13, 'ppp', '852'),
(13, 'ppp', '6456'),
(4545, 'rty', '999'),
(4545, 'rty', '852'),
(4545, 'ppp', '999'),
(4545, 'sa', '985'),
(4545, 'ooo', '888'),
(4545, 'ooo', '999'),
(666, 'sasd', '855'),
(666, 'rty', '999');

-- --------------------------------------------------------

--
-- Table structure for table `sadiq`
--

CREATE TABLE `sadiq` (
  `id` int(55) NOT NULL,
  `iname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `addresss` varchar(255) NOT NULL,
  `dat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sadiq`
--

INSERT INTO `sadiq` (`id`, `iname`, `phone`, `contact`, `addresss`, `dat`) VALUES
(666, 'sadiq', '3542342', 'fedrtdf', 'erterer', '2021-07-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sadiq`
--
ALTER TABLE `sadiq`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sadiq`
--
ALTER TABLE `sadiq`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=867877;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
