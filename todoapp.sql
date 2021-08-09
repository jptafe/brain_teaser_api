-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: tododb
-- Generation Time: Aug 03, 2021 at 02:59 AM
-- Server version: 10.6.3-MariaDB-1:10.6.3+maria~focal
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todoapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `todolist`
--

CREATE TABLE `todolist` (
  `id` int(11) NOT NULL,
  `topicid` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `description` varchar(512) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `todolist`
--

INSERT INTO `todolist` (`id`, `topicid`, `title`, `description`, `status`) VALUES
(1, 1, 'eat', 'a lot', '');

-- --------------------------------------------------------

--
-- Table structure for table `todotopic`
--

CREATE TABLE `todotopic` (
  `id` int(11) NOT NULL,
  `topic` varchar(128) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `todotopic`
--

INSERT INTO `todotopic` (`id`, `topic`, `userid`) VALUES
(1, 'food', 1);

-- --------------------------------------------------------

--
-- Table structure for table `todouser`
--

CREATE TABLE `todouser` (
  `id` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_surname` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_picture` varchar(255) NOT NULL DEFAULT 'defaultPicture.jpeg',
  `user_role` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `todouser`
--

INSERT INTO `todouser` (`id`, `user_name`, `user_surname`, `user_email`, `user_password`, `user_picture`, `user_role`) VALUES
(1, 'bobby', 'brown', 'bobby.brown@bobbybrown.com', 'brown', 'defaultPicture.jpeg', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todolist`
--
ALTER TABLE `todolist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topicid` (`topicid`);

--
-- Indexes for table `todotopic`
--
ALTER TABLE `todotopic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `todouser`
--
ALTER TABLE `todouser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todolist`
--
ALTER TABLE `todolist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `todotopic`
--
ALTER TABLE `todotopic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `todouser`
--
ALTER TABLE `todouser`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `todolist`
--
ALTER TABLE `todolist`
  ADD CONSTRAINT `todolist_ibfk_1` FOREIGN KEY (`topicid`) REFERENCES `todotopic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `todotopic`
--
ALTER TABLE `todotopic`
  ADD CONSTRAINT `todotopic_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `todouser` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
