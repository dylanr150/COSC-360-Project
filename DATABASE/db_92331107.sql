-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 06:36 AM
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
('test2User2', 1, 'This is a news test', 'NEWS NEWS NEWS', '2024-03-31', 'news'),
('test2User2', 2, 'SPORTS SPORTS', 'SPORTS SPORTS IO LOVE SPORTS', '2024-03-31', 'sports'),
('test2User2', 3, 'WHO DOESNT LOVE MUSIC', 'MUSUIC MUSIC MUSIC', '2024-03-31', 'music'),
('test2User2', 4, 'test', 'this is a test', '2024-03-31', 'none'),
('testUser', 5, 'hello im test user', 'hi', '2024-03-31', 'none'),
('testUser', 6, 'testing on sports', 'complete', '2024-03-31', 'sports'),
('testUser', 7, 'music!', 'music music', '2024-03-31', 'music'),
('adminUser', 8, 'IM ADMIN', 'IM ADMIN', '2024-03-31', 'none'),
('adminUser', 9, 'admin test on sports', 'admin test on sports', '2024-03-31', 'sports');

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
('adminUser', 'adminUser@gmail.com', 'ad173b6d7864f0dbcfcef93fb926cf66', 0, 'admin', 'user', '2024-03-31'),
('test2User2', 'test2User2@gmail.com', '19d7b3ef0e28820c3959d6918a0e9a96', 0, 'test2User2', 'User', '2024-03-31'),
('testUser', 'testUser@gmail.com', '33ef37db24f3a27fb520847dcd549e9f', 0, 'test', 'user', '2024-03-31');

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
