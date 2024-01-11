-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 06:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `signup`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `addhar` varchar(9) NOT NULL,
  `amt` int(9) NOT NULL,
  `paid` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`name`, `username`, `phone`, `addhar`, `amt`, `paid`) VALUES
('Arpit Rastogi', 'arav', '7982412780', '821535', 500, 200),
('Arpit Rastog', 'arya', '7982412780', '19999', 500, 200),
('dhruv', 'dkava', '9399203452', '214748364', 5000, 900),
('dhruv', 'dkavaa', '9399203452', '821536744', 5000, 900),
('Noman Khan', 'noman', '8928765390', '821536744', 5000, 900),
('karan', '_kuie', '9399203452', '821536744', 5000, 900);

-- --------------------------------------------------------

--
-- Table structure for table `signin`
--

CREATE TABLE `signin` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signin`
--

INSERT INTO `signin` (`username`, `email`, `password`) VALUES
('arpit', 'arpitrnvs@gmail.com', '$2y$10$rgMuBeIO0MXK4cT7tBmC3uopfviDEdxa7PlkG/P8Wcu7klwSIUxM6'),
('noman', 'noman@gmail.com', '$2y$10$1LkUsXy7JkaTTN15f4Ouv.nb9sTaW.Fx4uBvVfs15jYCIhYNL1mvG'),
('sanjeev', 'skt@gmail.com', '$2y$10$89Ay4xCsJIdBZT0Dep5ysOH9DPKUXFsKWCdwukzNwZBZpAERdA3Di');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `signin`
--
ALTER TABLE `signin`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
