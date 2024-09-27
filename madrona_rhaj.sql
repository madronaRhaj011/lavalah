-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2024 at 11:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `madrona_rhaj`
--

-- --------------------------------------------------------

--
-- Table structure for table `rsm_users`
--

CREATE TABLE `rsm_users` (
  `id` int(11) NOT NULL,
  `rsm_last_name` varchar(255) NOT NULL,
  `rsm_first_name` varchar(255) NOT NULL,
  `rsm_email` varchar(255) NOT NULL,
  `rsm_gender` varchar(255) NOT NULL,
  `rsm_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rsm_users`
--

INSERT INTO `rsm_users` (`id`, `rsm_last_name`, `rsm_first_name`, `rsm_email`, `rsm_gender`, `rsm_address`) VALUES
(1, 'test', 'testt', 'testtt', 'testttt', 'testtttt'),
(7, 'kdjfs', 'kjdkfs', 'kjds@gmail.com', 'jdfkssdf', 'dfsdf'),
(8, 'skdskj', 'kjsdfj', 'kjdf@gmail.com', 'djsk', 'jdfks');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rsm_users`
--
ALTER TABLE `rsm_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rsm_users`
--
ALTER TABLE `rsm_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
