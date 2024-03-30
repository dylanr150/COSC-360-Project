-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2024 at 11:17 AM
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
-- Database: `db_92331107`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `user` varchar(20) DEFAULT NULL,
  `postID` int(255) NOT NULL,
  `title` varchar(60) DEFAULT NULL,
  `content` varchar(10000) DEFAULT NULL,
  `creation_date` date DEFAULT current_timestamp(),
  `tag` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`user`, `postID`, `title`, `content`, `creation_date`, `tag`) VALUES
('Dylan', 1, 'Test', 'This is the first test with tags.', '2024-03-30', 'sports'),
('Dylan', 2, 'testing music', 'testing music', '2024-03-30', 'music'),
('Dylan', 3, 'news test', 'news', '2024-03-30', 'news'),
('Dylan', 4, 'test124124124', 'test2341231', '2024-03-30', 'none'),
('Dylan', 5, 'test124124124', 'test2341231', '2024-03-30', 'none'),
('Dylan', 6, 'test124124124', 'test2341231', '2024-03-30', 'none'),
('Dylan', 7, 'test124124124', 'test2341231', '2024-03-30', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `username` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `creation_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`username`, `email`, `password`, `admin`, `firstname`, `lastname`, `creation_date`) VALUES
('Dylan', 'dylan', '4f97319b308ed6bd3f0c195c176bbd77', 1, 'dylan', 'dylan', '2024-03-30'),
('test', 'test', '098f6bcd4621d373cade4e832627b4f6', 0, 'test', 'test', '2024-03-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user_info` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
