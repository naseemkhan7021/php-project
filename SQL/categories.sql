-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2021 at 07:50 AM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(40) NOT NULL,
  `categories_name` varchar(23) NOT NULL,
  `categories_discription` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_discription`, `created_at`) VALUES
(1, 'python', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, dicta. Laboriosam dolore, repellendus, itaque eum impedit fugiat et fugit dignissimos alias tempora, labore ipsum ut ipsa autem quaerat ab. Vero pariatur delectus impedit enim consequatur quaerat consequuntur aspernatur? Dolores sapiente velit accusantium consequuntur illum, culpa perspiciatis praesentium nemo officia provident aliquam obcaecati ut eveniet ipsam eaque neque consequatur. Aspernatur recusandae reprehenderit molestiae reiciendis deleniti, nesciunt architecto et iure nihil numquam.', '2021-03-01 12:06:45'),
(2, 'JavaScript', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, dicta. Laboriosam dolore, repellendus, itaque eum impedit fugiat et fugit dignissimos alias tempora, labore ipsum ut ipsa autem quaerat ab. Vero pariatur delectus impedit enim consequatur quaerat consequuntur aspernatur? Dolores sapiente velit accusantium consequuntur illum, culpa perspiciatis praesentium nemo officia provident aliquam obcaecati ut eveniet ipsam eaque neque consequatur. Aspernatur recusandae reprehenderit molestiae reiciendis deleniti, nesciunt architecto et iure nihil numquam.', '2021-03-01 12:06:45'),
(3, 'html', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, dicta. Laboriosam dolore, repellendus, itaque eum impedit fugiat et fugit dignissimos alias tempora, labore ipsum ut ipsa autem quaerat ab. Vero pariatur delectus impedit enim consequatur quaerat consequuntur aspernatur? Dolores sapiente velit accusantium consequuntur illum, culpa perspiciatis praesentium nemo officia provident aliquam obcaecati ut eveniet ipsam eaque neque consequatur. Aspernatur recusandae reprehenderit molestiae reiciendis deleniti, nesciunt architecto et iure nihil numquam.', '2021-03-01 12:11:46'),
(4, 'Django', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, dicta. Laboriosam dolore, repellendus, itaque eum impedit fugiat et fugit dignissimos alias tempora, labore ipsum ut ipsa autem quaerat ab. Vero pariatur delectus impedit enim consequatur quaerat consequuntur aspernatur? Dolores sapiente velit accusantium consequuntur illum, culpa perspiciatis praesentium nemo officia provident aliquam obcaecati ut eveniet ipsam eaque neque consequatur. Aspernatur recusandae reprehenderit molestiae reiciendis deleniti, nesciunt architecto et iure nihil numquam.', '2021-03-01 12:11:46'),
(5, 'Ruby', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, dicta. Laboriosam dolore, repellendus, itaque eum impedit fugiat et fugit dignissimos alias tempora, labore ipsum ut ipsa autem quaerat ab. Vero pariatur delectus impedit enim consequatur quaerat consequuntur aspernatur? Dolores sapiente velit accusantium consequuntur illum, culpa perspiciatis praesentium nemo officia provident aliquam obcaecati ut eveniet ipsam eaque neque consequatur. Aspernatur recusandae reprehenderit molestiae reiciendis deleniti, nesciunt architecto et iure nihil numquam.', '2021-03-01 12:12:39'),
(6, 'java', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, dicta. Laboriosam dolore, repellendus, itaque eum impedit fugiat et fugit dignissimos alias tempora, labore ipsum ut ipsa autem quaerat ab. Vero pariatur delectus impedit enim consequatur quaerat consequuntur aspernatur? Dolores sapiente velit accusantium consequuntur illum, culpa perspiciatis praesentium nemo officia provident aliquam obcaecati ut eveniet ipsam eaque neque consequatur. Aspernatur recusandae reprehenderit molestiae reiciendis deleniti, nesciunt architecto et iure nihil numquam.', '2021-03-01 12:12:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`),
  ADD UNIQUE KEY `categories_name` (`categories_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
