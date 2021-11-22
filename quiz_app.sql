-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2021 at 03:17 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `option_d` text NOT NULL,
  `answer` enum('option_a','option_b','option_c','option_d') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`) VALUES
(1, 'Question-1.....?', 'Answer-1...', 'Answer-2...', 'Answer-3...', 'Answer-4...', 'option_a'),
(2, 'Question-2.....?', 'Answer-21...', 'Answer-22...', 'Answer-23...', 'Answer-24...', 'option_b'),
(3, 'Question-3.....?', 'Answer-31...', 'Answer-32...', 'Answer-33...', 'Answer-34...', 'option_c'),
(4, 'Question-4.....?', 'Answer-41...', 'Answer-42...', 'Answer-43...', 'Answer-44...', 'option_d'),
(5, 'Question-5.....?', 'Answer-51...', 'Answer-52...', 'Answer-53...', 'Answer-54...', 'option_d'),
(6, 'Question-6.....?', 'Answer-61...', 'Answer-62...', 'Answer-63...', 'Answer-64...', 'option_d'),
(7, 'Question-7.....?', 'Answer-71...', 'Answer-72...', 'Answer-73...', 'Answer-74...', 'option_d'),
(8, 'Question-8.....?', 'Answer-81...', 'Answer-82...', 'Answer-83...', 'Answer-84...', 'option_d'),
(9, 'Question-9.....?', 'Answer-91...', 'Answer-92...', 'Answer-93...', 'Answer-94...', 'option_d'),
(10, 'Question-10.....?', 'Answer-101...', 'Answer-102...', 'Answer-103...', 'Answer-104...', 'option_d');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email_id` varchar(256) NOT NULL,
  `mobile_number` double NOT NULL,
  `created_date` datetime NOT NULL,
  `score` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
