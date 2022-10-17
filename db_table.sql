-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 17, 2022 at 05:19 PM
-- Server version: 10.3.36-MariaDB
-- PHP Version: 7.4.30
-- C: Betavers.ir
-- programingdepartment@betavers.com

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bets_presentation`
--

-- --------------------------------------------------------

--
-- Table structure for table `en_ex`
--

CREATE TABLE `en_ex` (
  `id` int(11) NOT NULL, --id of tabble
  `date` varchar(50) CHARACTER SET utf8mb4 NOT NULL,--Recorded date YYYY/MM/DD
  `time` varchar(50) CHARACTER SET utf8mb4 NOT NULL,--Recorded time H:i:s
  `type` int(11) NOT NULL,--type of trafic. 0 => exite , 1 => enter
  `student_id` int(20) NOT NULL,--Recorded id of student in device
  `device_id` int(20) NOT NULL--Recorded id of device
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `en_ex`
--
ALTER TABLE `en_ex`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `en_ex`
--
ALTER TABLE `en_ex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
