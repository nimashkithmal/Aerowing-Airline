-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 06, 2024 at 09:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airline`
--

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` int(11) NOT NULL,
  `diet_plan_rating` enum('very_satisfied','satisfied','neutral','dissatisfied','very_dissatisfied') DEFAULT NULL,
  `health_checkup_rating` enum('yes','no','unsure') DEFAULT NULL,
  `feedback_text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `diet_plan_rating`, `health_checkup_rating`, `feedback_text`, `created_at`) VALUES
(1, 'satisfied', 'no', 'good', '2024-05-06 18:25:08'),
(3, 'dissatisfied', 'no', 'good', '2024-05-06 18:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `SupportRequests`
--

CREATE TABLE `SupportRequests` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `SupportRequests`
--

INSERT INTO `SupportRequests` (`id`, `name`, `email`, `category`, `message`, `submitted_at`) VALUES
(2, 'Theekshana', 'theekshanacr777@gmail.Com', 'Support', 'logout', '2024-05-06 17:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `RegistrationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserID`, `Username`, `Password`, `Email`, `FirstName`, `LastName`, `Phone`, `Address`, `RegistrationDate`) VALUES
(1, 'Theekshana', '$2y$10$IS4vgivD43x/nKHkIdVWQ.UyMXayFwDIuJxusPTeybm.MA.HvhZzO', 'theekshanacr777@gmail.Com', 'theekshanaaaaa', 'chamoooooo', '0779596500', 'agunukola', '2024-05-06 12:09:05'),
(2, 'madhura', '$2y$10$Ytz2pW6EmlCdJeeHj49WxeqVnpIVipbT4Yr34OQ6rEhITiKBUDOhC', 'madhura@gmail.com', 'madhura', 'sithumina', '0779596500', 'mathara', '2024-05-06 12:17:04'),
(4, 'Suchintha', '$2y$10$I/t3xL5jspqdm4HvYVdyyejyJ4p50IzrcL.9yFcgMRcNXq8P44Bw2', 'suchintha@gmail.com', 'suchintha', 'akalanka', '0765615061', 'galle', '2024-05-06 12:49:20'),
(6, 'amila', '$2y$10$FjKQ2m/v4stANO1znFNGG.mh934sdbJjt/E6tZigumbchrmhQ8zUu', 'amila@gmail.com', 'amila', 'janith', '0765615061', 'colombo', '2024-05-06 13:10:22'),
(7, 'kamal', '$2y$10$c/W1tAUq91mcN1BfmigHy.BT2cO6ktftUbZVwrrSTmGaSMK9z6ZJ6', 'jhhgj@gmail.com', 'hjj', 'jhffhjfgh', '56377899', 'cgjhhjjhf', '2024-05-06 13:21:38'),
(8, 'chankana', '$2y$10$BG5NwY7kyDOyAFYSWfeVku/TmXmbkq9My3ZJ2Ay2thK3zwxZujXX2', 'chankana@gmail.com', 'chankana', 'lankesh', '0765615061', 'mathara', '2024-05-06 16:48:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `SupportRequests`
--
ALTER TABLE `SupportRequests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `SupportRequests`
--
ALTER TABLE `SupportRequests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
