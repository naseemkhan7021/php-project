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
-- Table structure for table `replay`
--

CREATE TABLE `replay` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `parant_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replay`
--

INSERT INTO `replay` (`id`, `content`, `user_id`, `parant_id`, `date`) VALUES
(2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, dicta. Laboriosam dolore, repellendus, itaque eum impedit fugiat et fugit dignissimos alias tempora, labore ipsum ut ipsa autem quaerat ab. Vero pariatur delectus impedit enim consequatur quaerat consequuntur aspernatur? Dolores sapiente velit accusantium consequuntur illum, culpa perspiciatis praesentium nemo officia provident aliquam obcaecati ut eveniet ipsam eaque neque consequatur. Aspernatur recusandae reprehenderit molestiae reiciendis deleniti, nesciunt architecto et iure nihil numquam.', 13, 1, '2021-03-01 12:18:59'),
(3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, dicta. Laboriosam dolore, repellendus, itaque eum impedit fugiat et fugit dignissimos alias tempora, labore ipsum ut ipsa autem quaerat ab. Vero pariatur delectus impedit enim consequatur quaerat consequuntur aspernatur? Dolores sapiente velit accusantium consequuntur illum, culpa perspiciatis praesentium nemo officia provident aliquam obcaecati ut eveniet ipsam eaque neque consequatur. Aspernatur recusandae reprehenderit molestiae reiciendis deleniti, nesciunt architecto et iure nihil numquam.', 13, 2, '2021-03-01 12:19:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `replay`
--
ALTER TABLE `replay`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replay_user_id` (`user_id`),
  ADD KEY `replay_comment_id` (`parant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `replay`
--
ALTER TABLE `replay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
