-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2023 at 09:05 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etsbiapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `ucenici`
--

CREATE TABLE `ucenici` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `parentsName` varchar(20) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `placeOfBirth` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `razred` int(1) NOT NULL,
  `odjeljenje` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ucenici`
--

INSERT INTO `ucenici` (`id`, `name`, `surname`, `parentsName`, `dateOfBirth`, `placeOfBirth`, `city`, `razred`, `odjeljenje`) VALUES
(1, 'Dominik', 'Tomic', 'Mario', '2006-06-29', 'Bihać', 'Bihać', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`, `username`, `password`) VALUES
(1, 'Dominik', 'Tomic', 'domishq', '$2y$10$.DA.p0zhLVgBaTd82XMmAu3jqX4QxfAlSvyW4mkXQezqaXyM4a9MK'),
(2, 'Doma', 'Toma', 'domi', '$2y$10$6fDJBAM4wPifBwNHv8FO5eIXp7A3uKg7p/C2UfJLs/oaBthhGnDCa');

-- --------------------------------------------------------

--
-- Table structure for table `uvjerenja`
--

CREATE TABLE `uvjerenja` (
  `uvjerenje_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uvjerenja`
--

INSERT INTO `uvjerenja` (`uvjerenje_id`, `user_id`, `timestamp`) VALUES
(1, 1, '2023-12-22 08:05:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ucenici`
--
ALTER TABLE `ucenici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `uvjerenja`
--
ALTER TABLE `uvjerenja`
  ADD PRIMARY KEY (`uvjerenje_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ucenici`
--
ALTER TABLE `ucenici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `uvjerenja`
--
ALTER TABLE `uvjerenja`
  MODIFY `uvjerenje_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
