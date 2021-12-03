-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 02, 2021 at 10:56 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `LMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `name`) VALUES
(1, 'admin@admin.com', 'admin@12', 'My Admin');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `isbn`, `book_name`, `author_name`, `description`, `status`) VALUES
(4, 'ChangedISBN', 'dsfdsf', 'dsfsd', '   dsfsdf      ', 'Issued'),
(7, 'newisbn', 'NEWbOOK', 'ME', 'ANY COMMENTS', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`user_id`, `book_id`, `issue_date`, `return_date`, `description`) VALUES
(12, 7, '2021-12-03', '2021-12-03', 'ANY COMMENTS'),
(11, 7, '2021-12-03', '2021-12-03', 'sada');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `user_type`) VALUES
(11, 'wqr', 'changed', 'abdullah@gmail.com', 'Abdullah123@', 2),
(12, 'New', 'Student', 'student@gmail.com', 'sTUDENT@123', 2),
(13, 'library', 'person', 'librarian@gmail.com', 'AXuknfXw', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD KEY `book_id` (`book_id`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
