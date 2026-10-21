-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2026 at 05:36 PM
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
-- Database: `tutees_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tutee`
--

CREATE TABLE `tutee` (
  `tutee_id` char(6) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `major` varchar(50) NOT NULL,
  `credit_hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutee`
--

INSERT INTO `tutee` (`tutee_id`, `first_name`, `last_name`, `email`, `major`, `credit_hours`) VALUES
('TE0001', 'Lamar', 'Haskins', 'lhas@gmail.com', 'Computer Science', 68),
('TE0002', 'Bryce', 'Young', 'franchiseqb@gmail.com', 'Kinesiology', 72),
('TE0003', 'Anthony', 'Edwards', 'AE1@gmail.com', 'Criminal Justice', 46),
('TE0004', 'Jermaine', 'Cole', 'jermainecole@gmail.com', 'Music', 41),
('TE0005', 'Oprah', 'Winfrey', 'oWIN@yahoo.com', 'Mass Communications', 72),
('TE0006', 'Tianna', 'Rogers', 'frogprincess@hotmail.com', 'Biology', 58),
('TE0007', 'King', 'Simba', 'hakunamatata@outlook.com', 'Agriculture', 76),
('TE0008', 'Cat', 'Hat', 'catinthehat@gmail.com', 'Special Education', 88),
('TE0009', 'Shohei', 'Ohtani', 'baseball@yahoo.com', 'Interdisciplinary Studies', 34),
('TE0010', 'Lebron', 'James', 'GOAT@gmail.com', 'Mathematics', 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tutee`
--
ALTER TABLE `tutee`
  ADD PRIMARY KEY (`tutee_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
