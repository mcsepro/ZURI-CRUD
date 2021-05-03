-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 01:30 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infotech`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `course` varchar(255) NOT NULL,
  `level` int(10) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `Username`, `name`, `Email`, `course`, `level`, `Password`) VALUES
(1, '', 'MARTINS ODIDO AREM', '', 'economics', 4, ''),
(2, '', 'SANTUS LUMEN', '', 'QUANTITATIVE', 1, ''),
(3, 'mart', 'Arem Martins', '', 'GST107', 3, '$2y$10$1.T/WyLqMHe7Sd6/anqO9.MTBzulXCoC9H2g89c.zRmtB8FVJkkaC'),
(4, 'techmart', '', '', '', 0, '$2y$10$14uElpBZQZDgSrPna2dh4.YJ.4Jtf2rYebx9sYw/6apqiHDm39TtG'),
(5, '', '', '', '', 0, ''),
(6, 'arem', '', '', '', 0, '$2y$10$FTj8sSsrixhjMjcmjT77qOkPg51u/E89uvH9zEKBXQvtb21I9AqrC'),
(7, '', 'Thomas', '', 'hq', 7, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
