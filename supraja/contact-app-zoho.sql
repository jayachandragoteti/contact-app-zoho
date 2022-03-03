-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2022 at 04:51 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contact-app-zoho`
--

-- --------------------------------------------------------

--
-- Table structure for table `userContacts`
--

CREATE TABLE `userContacts` (
  `sno` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(225) NOT NULL,
  `contactNo` varchar(100) NOT NULL,
  `datm` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userContacts`
--

INSERT INTO `userContacts` (`sno`, `userId`, `name`, `email`, `contactNo`, `datm`) VALUES
(1, 1, 'Goteti Jayachandra Mohana L N Murthy', 'gotetijayachandra@outlook.com', 'gotetijayachandra@outlook.com', '2022-03-02 08:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `contactNo` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `Secret` varchar(200) NOT NULL,
  `datm` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `name`, `email`, `contactNo`, `password`, `Secret`, `datm`) VALUES
(1, 'Goteti Jayachandra Mohana L N Murthy', 'gotetijayachandra@outlook.com', '94949494', 'ZE11**ct', 'helloajay', '2022-03-02 06:23:43'),
(4, 'Goteti Jayachandra Mohana L N Murthy', 'gotetijayachandra@gmail.com', '94949494', 'ZE11**ct', 'helloajay', '2022-03-02 06:31:30'),
(5, 'Goteti Jayachandra Mohana L N Murthy', 'gotetijayachandnra@gmail.com', '94949494', 'ZE11**ct', 'helloajay', '2022-03-02 06:35:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userContacts`
--
ALTER TABLE `userContacts`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userContacts`
--
ALTER TABLE `userContacts`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
