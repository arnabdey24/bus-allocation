-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2023 at 03:22 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus-allocation`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocations`
--

CREATE TABLE `allocations` (
  `allocation_id` int(11) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `slot_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allocations`
--

INSERT INTO `allocations` (`allocation_id`, `date`, `user_id`, `slot_id`) VALUES
(4, '25-12-2022 (Sun)', 5, 1),
(5, '25-12-2022 (Sun)', 5, 2),
(20, '15-01-2023 (Sun)', 5, 24),
(21, '15-01-2023 (Sun)', 5, 2),
(22, '15-01-2023 (Sun)', 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `slot_id` int(11) NOT NULL,
  `day` varchar(255) DEFAULT NULL,
  `slot` varchar(255) DEFAULT NULL,
  `start_from` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`slot_id`, `day`, `slot`, `start_from`) VALUES
(1, 'Sun', '8.00am', 'Hospital Road'),
(2, 'Sun', '9.00am', 'Hospital Road'),
(3, 'Sun', '9.30am', 'Hospital Road'),
(4, 'Sun', '10.00am', 'Hospital Road'),
(7, 'Mon', '9.31am', 'Hospital Road'),
(8, 'Mon', '10.00am', 'Hospital Road'),
(9, 'Tue', '8.00am', 'Hospital Road'),
(10, 'Tue', '9.00am', 'Hospital Road'),
(11, 'Tue', '9.30am', 'Hospital Road'),
(12, 'Tue', '10.00am', 'Hospital Road'),
(13, 'Wed', '8.00am', 'Hospital Road'),
(14, 'Wed', '9.00am', 'Hospital Road'),
(15, 'Wed', '9.30am', 'Hospital Road'),
(16, 'Wed', '10.00am', 'Hospital Road'),
(17, 'Thur', '8.00am', 'Hospital Road'),
(18, 'Thur', '9.00am', 'Hospital Road'),
(19, 'Thur', '9.30am', 'Hospital Road'),
(20, 'Thur', '10.00am', 'Hospital Road'),
(21, 'Mon', '8.00am', 'Hospital Road'),
(22, 'Mon', '8.30am', 'Hospital Road'),
(23, 'Sat', '12.00pm', 'Hospital Road'),
(24, 'Sun', '12.00pm', 'Hospital Road');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `pass_hash` varchar(255) DEFAULT NULL,
  `edu_mail` varchar(255) DEFAULT NULL,
  `isverified` tinyint(1) DEFAULT NULL,
  `isadmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `pass_hash`, `edu_mail`, `isverified`, `isadmin`) VALUES
(5, 'Arnab', 'Dey', '$2y$10$J6N65JEb37omcOJ914D2ce3v8KhKgkCw1conrqRg20lpFxTpRx85W', 'arnab2514@student.nstu.edu.bd', 1, 0),
(6, 'admin', 'admin', '$2y$10$.Oy2tj3sM1NqDbBXhQztE.xOIXb7eqSTkByQWtil0dGleWd5Mkl5C', 'busadmin@admin.nstu.edu.bd', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `verify_keys`
--

CREATE TABLE `verify_keys` (
  `user_id` int(11) NOT NULL,
  `v_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verify_keys`
--

INSERT INTO `verify_keys` (`user_id`, `v_key`) VALUES
(5, '356754ff5dfbc860fcea720f4794485248'),
(6, '3650d51ac2432f7cc57a92f164dccd5475');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocations`
--
ALTER TABLE `allocations`
  ADD PRIMARY KEY (`allocation_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `slot_id` (`slot_id`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`slot_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `verify_keys`
--
ALTER TABLE `verify_keys`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allocations`
--
ALTER TABLE `allocations`
  MODIFY `allocation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allocations`
--
ALTER TABLE `allocations`
  ADD CONSTRAINT `allocations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `allocations_ibfk_2` FOREIGN KEY (`slot_id`) REFERENCES `slots` (`slot_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `verify_keys`
--
ALTER TABLE `verify_keys`
  ADD CONSTRAINT `verify_keys_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
