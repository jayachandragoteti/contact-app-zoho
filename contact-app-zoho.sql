-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 03, 2022 at 06:54 AM
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
(1, 1, 'Goteti Jayachandra Mohana L N Murthy', 'gotetijayachandra@outlook.com', 'gotetijayachandra@outlook.com', '2022-03-02 08:04:14'),
(2, 3, 'Goteti Jayachandra Mohana L N Murthy', 'nikithacarrentalagency@gmail.com', '94949494111', '2022-03-02 19:21:28'),
(3, 3, 'Goteti Jayachandra Mohana L N Murthy', 'nikithacarrentalagency@gmail.com', '94949494111', '2022-03-02 19:25:06'),
(4, 3, 'Goteti Jayachandra Mohana L N Murthy', 'nikithacarrentalagency@gmail.com', '94949494111', '2022-03-02 19:25:10'),
(5, 3, 'Goteti Jayachandra Mohana L N Murthy', 'nikithacarrentalagency@gmail.com', '94949494', '2022-03-03 02:54:15'),
(6, 3, 'Goteti Jayachandra Mohana L N Murthy', 'jayachandragoteti@gmail.com', '94949494', '2022-03-03 03:11:15'),
(7, 3, 'zenedict-solution', 'nikithacarrentalagency@gmail.com', '94949494', '2022-03-03 03:34:25');

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
(3, 'Goteti Jayachandra Mohana L N Murthy', 'jayachandragoteti@gmail.com', '9491694195 ', '$2y$10$EJxZAPS20NIlI7TiTQDTQ.E77gsmMFrzxaIjV.T7zsFh/6qtrmq5a', '$2y$10$TQy5nzuj4auJWsga2utpLuVDkXCSlP7UnJXUQFlx4Zwk78yvV8HV6', '2022-03-02 18:42:32');

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
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
