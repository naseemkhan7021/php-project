-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2021 at 07:51 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `thread_id` int(10) NOT NULL,
  `thread_title` varchar(244) NOT NULL,
  `thread_dsc` text NOT NULL,
  `thread_cat_id` int(10) NOT NULL,
  `thread_user_id` int(10) NOT NULL,
  `timestape` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`thread_id`, `thread_title`, `thread_dsc`, `thread_cat_id`, `thread_user_id`, `timestape`) VALUES
(1, 'this is test', 'new test comment', 2, 13, '2021-03-01 12:15:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `thread` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_dsc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `thread_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
