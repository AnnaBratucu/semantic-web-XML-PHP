-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2019 at 05:15 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plan`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(64) NOT NULL DEFAULT '',
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(32) NOT NULL DEFAULT '',
  `user_status` enum('pending','active','new','finished') NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_email`, `user_status`) VALUES
(1, 'Ana Bratucu', '$2y$12$8XSU69I3/S.hkzZUcUzO4O9ipBO7gpp69TXhL88qPFHcAonKx1Oqm', 'ana.bratucu@yahoo.com', 'active'),
(2, 'Cristina Matei', '$2y$12$npcmKLWwidYB81f2DgT4XeOUw0luCxJGacnESTXe6mnTGcWDyIwnK', 'matei.cristina@yahoo.com', 'active'),
(3, 'Kevin Mcall', '$2y$12$RPpfOzXjKjEyDpIijJv0F.nCjoYXS58UC0DsKiOggL4pL1N9D2Eb.', 'kevin@yahoo.com', 'active'),
(4, 'Buzz Mcall', '$2y$12$YiLOb66.RWA8q7JA/IFpe.SvVMyJSysQrw4EwdHAdLtO3WC6NujeC', 'buzz@yahoo.com', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
