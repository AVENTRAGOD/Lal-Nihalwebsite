-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2025 at 12:19 PM
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
-- Database: `contact`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(21) NOT NULL,
  `cus_id` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `cus_id`, `date`) VALUES
(1, '1', '0000-00-00 00:00:00'),
(2, '3', '2025-03-02 01:21:00'),
(3, '4', '2025-03-05 22:06:00'),
(4, '1', '2025-03-05 22:07:00'),
(5, '1', '2025-03-05 22:07:00'),
(6, '1', '2025-03-05 22:07:00'),
(7, '1', '2025-03-06 22:07:00'),
(8, '1', '2025-03-06 15:47:00'),
(9, '5', '2025-03-06 15:49:00'),
(10, '6', '2025-03-06 15:50:00'),
(11, '7', '2025-03-10 15:59:00'),
(12, '8', '2025-03-10 15:59:00'),
(13, '9', '2025-03-10 15:59:00'),
(14, '10', '0000-00-00 00:00:00'),
(15, '11', '2025-03-10 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reachout`
--

CREATE TABLE `reachout` (
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(100) NOT NULL,
  `response` varchar(100) NOT NULL,
  `id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reachout`
--

INSERT INTO `reachout` (`name`, `address`, `email`, `message`, `response`, `id`) VALUES
('testddd', '226/3, Samagi mawatha, kotikawaththa, Angoda.d', 'semira.dilum@gmail.comd', 'dddcc', 'ddddcc', 136),
('dddd', 'asdasdsad', 'cangocabservice@gmail.com', 'asdsds', 'ssds', 137),
('Semira Dilum Rajapak', '226/3, Samagi mawatha, kotikawaththa, Angoda.', 'cangocabservice@gmail.com', 'dd', 'ww', 138),
('hashi 123434 dd', '226/3, Samagi mawatha, kotikawaththa, Angoda.', 'cangocabservice@gmail.com', 'asdsadsa', '', 143),
('test', 'sdfsd', 'semira.dilum@live.com', 'sdfdsdsf', '', 144),
('test', 'asdsd', 'capitalsoft+chatgpt03@proton.me', 'asdsad', '', 145),
('test', 'sasd', 'semira.dilum@live.com', 'asdas', '', 146);

-- --------------------------------------------------------

--
-- Table structure for table `registered_customers`
--

CREATE TABLE `registered_customers` (
  `id` int(21) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `idnumber` text NOT NULL,
  `phone` text NOT NULL,
  `manufacture` text NOT NULL,
  `model` text NOT NULL,
  `vehicle_number` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_customers`
--

INSERT INTO `registered_customers` (`id`, `fname`, `lname`, `idnumber`, `phone`, `manufacture`, `model`, `vehicle_number`) VALUES
(1, 'werw', 'werwer', '12324324', '213213213', 'TOYOTA', 'sdfsdfsdf', 'CAO-2989'),
(3, 'asd', 'asd', 'asd', 'ads', 'KIA', 'asd', ''),
(4, 'asd', 'qwe', 'qwe', '23332', 'SUZUKI', 'qweqw', ''),
(5, 'asd', 'asd', 'asd', 'asd', 'KIA', 'asd', ''),
(6, 'sdfd', '', 'sdfdsf', 'sdfds', 'NIZZAN', 'sdfdsf', ''),
(7, 'asds', 'asds', 'asds', 'asds', 'KIA', 'asds', ''),
(8, 'asds', 'asds', 'asds', 'asds', 'MITSUBISHI', 'asds', ''),
(9, 'asds', 'asds', 'asds', 'asds', 'HONDA', 'asds', ''),
(10, 'asds', 'asds', 'asds', 'asds', 'HONDA', 'asds', ''),
(11, 'asd', 'asds', 'asds', 'asds', 'KIA', 'asds', '');

-- --------------------------------------------------------

--
-- Table structure for table `requested_services`
--

CREATE TABLE `requested_services` (
  `id` int(21) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `service` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requested_services`
--

INSERT INTO `requested_services` (`id`, `booking_id`, `service`) VALUES
(1, 5, 'General Check'),
(2, 5, 'Engine Check'),
(3, 6, 'General Check'),
(4, 6, 'Engine Check'),
(5, 7, 'Fixing Oil Leaks'),
(6, 7, 'Engine Oil Changes'),
(7, 8, 'Engine Check');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reachout`
--
ALTER TABLE `reachout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_customers`
--
ALTER TABLE `registered_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requested_services`
--
ALTER TABLE `requested_services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reachout`
--
ALTER TABLE `reachout`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `registered_customers`
--
ALTER TABLE `registered_customers`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `requested_services`
--
ALTER TABLE `requested_services`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
