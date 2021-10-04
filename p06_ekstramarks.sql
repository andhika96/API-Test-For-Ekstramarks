-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2021 at 11:00 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p06_ekstramarks`
--

-- --------------------------------------------------------

--
-- Table structure for table `ar_keys`
--

CREATE TABLE `ar_keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `my_key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ar_keys`
--

INSERT INTO `ar_keys` (`id`, `user_id`, `my_key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'testing', 2, 0, 0, '127.0.0.1', 1627488201);

-- --------------------------------------------------------

--
-- Table structure for table `ar_limits`
--

CREATE TABLE `ar_limits` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ar_limits`
--

INSERT INTO `ar_limits` (`id`, `uri`, `count`, `hour_started`, `api_key`) VALUES
(1, 'method-name:users_post', 13, 1628430725, 'testing'),
(3, 'method-name:users_get', 12, 1628364247, 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `ml_chapters`
--

CREATE TABLE `ml_chapters` (
  `chapter_id` int(11) NOT NULL,
  `chapter_name` varchar(64) NOT NULL,
  `grade` varchar(12) NOT NULL,
  `subject_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ml_chapters`
--

INSERT INTO `ml_chapters` (`chapter_id`, `chapter_name`, `grade`, `subject_id`) VALUES
(1, 'Chapter 1 [Math]', '1', 1),
(2, 'Chapter 2 [Math]', '1', 1),
(3, 'Chapter 3 [Math]', '1', 1),
(4, 'Chapter 1 [English]', '1', 2),
(5, 'Chapter 2 [English]', '1', 2),
(6, 'Chapter 3 [English]', '1', 2),
(7, 'Chapter 1 [Indonesian]', '1', 3),
(8, 'Chapter 2 [Indonesian]', '1', 3),
(9, 'Chapter 3 [Indonesian]', '1', 3),
(10, 'Chapter 1 [Science]', '1', 4),
(11, 'Chapter 2 [Science]', '1', 4),
(12, 'Chapter 3 [Science]', '1', 4),
(13, 'Chapter 1 [Math]', '2', 5),
(14, 'Chapter 2 [Math]', '2', 5),
(15, 'Chapter 3 [Math]', '2', 5),
(16, 'Chapter 1 [English]', '2', 6),
(17, 'Chapter 2 [English]', '2', 6),
(18, 'Chapter 3 [English]', '2', 6),
(19, 'Chapter 1 [Indonesian]', '2', 7),
(20, 'Chapter 2 [Indonesian]', '2', 7),
(21, 'Chapter 3 [Indonesian]', '2', 7),
(22, 'Chapter 1 [Science]', '2', 8),
(23, 'Chapter 2 [Science]', '2', 8),
(24, 'Chapter 3 [Science]', '2', 8),
(25, 'Chapter 1 [Math]', '3', 9),
(26, 'Chapter 2 [Math]', '3', 9),
(27, 'Chapter 3 [Math]', '3', 9),
(28, 'Chapter 1 [English]', '3', 10),
(29, 'Chapter 2 [English]', '3', 10),
(30, 'Chapter 3 [English]', '3', 10),
(31, 'Chapter 1 [Indonesian]', '3', 11),
(32, 'Chapter 2 [Indonesian]', '3', 11),
(33, 'Chapter 3 [Indonesian]', '3', 11),
(34, 'Chapter 1 [Science]', '3', 12),
(35, 'Chapter 2 [Science]', '3', 12),
(36, 'Chapter 3 [Science]', '3', 12),
(37, 'Chapter 1 [Math]', '4', 13),
(38, 'Chapter 2 [Math]', '4', 13),
(39, 'Chapter 3 [Math]', '4', 13),
(40, 'Chapter 1 [English]', '4', 14),
(41, 'Chapter 2 [English]', '4', 14),
(42, 'Chapter 3 [English]', '4', 14),
(43, 'Chapter 1 [Indonesian]', '4', 15),
(44, 'Chapter 2 [Indonesian]', '4', 15),
(45, 'Chapter 3 [Indonesian]', '4', 15),
(46, 'Chapter 1 [Science]', '4', 16),
(47, 'Chapter 2 [Science]', '4', 16),
(48, 'Chapter 3 [Science]', '4', 16),
(49, 'Chapter 1 [Math]', '5', 17),
(50, 'Chapter 2 [Math]', '5', 17),
(51, 'Chapter 3 [Math]', '5', 17),
(52, 'Chapter 1 [English]', '5', 18),
(53, 'Chapter 2 [English]', '5', 18),
(54, 'Chapter 3 [English]', '5', 18),
(55, 'Chapter 1 [Indonesian]', '5', 19),
(56, 'Chapter 2 [Indonesian]', '5', 19),
(57, 'Chapter 3 [Indonesian]', '5', 19),
(58, 'Chapter 1 [Science]', '5', 20),
(59, 'Chapter 2 [Science]', '5', 20),
(60, 'Chapter 3 [Science]', '5', 20),
(61, 'Chapter 1 [Math]', '6', 21),
(62, 'Chapter 2 [Math]', '6', 21),
(63, 'Chapter 3 [Math]', '6', 21),
(64, 'Chapter 1 [English]', '6', 22),
(65, 'Chapter 2 [English]', '6', 22),
(66, 'Chapter 3 [English]', '6', 22),
(67, 'Chapter 1 [Indonesian]', '6', 23),
(68, 'Chapter 2 [Indonesian]', '6', 23),
(69, 'Chapter 3 [Indonesian]', '6', 23),
(70, 'Chapter 1 [Science]', '6', 24),
(71, 'Chapter 2 [Science]', '6', 24),
(72, 'Chapter 3 [Science]', '6', 24),
(73, 'Chapter 1 [Math]', '7', 25),
(74, 'Chapter 2 [Math]', '7', 25),
(75, 'Chapter 3 [Math]', '7', 25),
(76, 'Chapter 1 [English]', '7', 26),
(77, 'Chapter 2 [English]', '7', 26),
(78, 'Chapter 3 [English]', '7', 26),
(79, 'Chapter 1 [Indonesian]', '7', 27),
(80, 'Chapter 2 [Indonesian]', '7', 27),
(81, 'Chapter 3 [Indonesian]', '7', 27),
(82, 'Chapter 1 [Science]', '7', 28),
(83, 'Chapter 2 [Science]', '7', 28),
(84, 'Chapter 3 [Science]', '7', 28),
(85, 'Chapter 1 [Math]', '8', 29),
(86, 'Chapter 2 [Math]', '8', 29),
(87, 'Chapter 3 [Math]', '8', 29),
(88, 'Chapter 1 [English]', '8', 30),
(89, 'Chapter 2 [English]', '8', 30),
(90, 'Chapter 3 [English]', '8', 30),
(91, 'Chapter 1 [Indonesian]', '8', 31),
(92, 'Chapter 2 [Indonesian]', '8', 31),
(93, 'Chapter 3 [Indonesian]', '8', 31),
(94, 'Chapter 1 [Science]', '8', 32),
(95, 'Chapter 2 [Science]', '8', 32),
(96, 'Chapter 3 [Science]', '8', 32),
(97, 'Chapter 1 [Math]', '9', 33),
(98, 'Chapter 2 [Math]', '9', 33),
(99, 'Chapter 3 [Math]', '9', 33),
(100, 'Chapter 1 [English]', '9', 34),
(101, 'Chapter 2 [English]', '9', 34),
(102, 'Chapter 3 [English]', '9', 34),
(103, 'Chapter 1 [Indonesian]', '9', 35),
(104, 'Chapter 2 [Indonesian]', '9', 35),
(105, 'Chapter 3 [Indonesian]', '9', 35),
(106, 'Chapter 1 [Science]', '9', 36),
(107, 'Chapter 2 [Science]', '9', 36),
(108, 'Chapter 3 [Science]', '9', 36),
(109, 'Chapter 1 [Math]', '10', 37),
(110, 'Chapter 2 [Math]', '10', 37),
(111, 'Chapter 3 [Math]', '10', 37),
(112, 'Chapter 1 [English]', '10', 38),
(113, 'Chapter 2 [English]', '10', 38),
(114, 'Chapter 3 [English]', '10', 38),
(115, 'Chapter 1 [Indonesian]', '10', 39),
(116, 'Chapter 2 [Indonesian]', '10', 39),
(117, 'Chapter 3 [Indonesian]', '10', 39),
(118, 'Chapter 1 [Science]', '10', 40),
(119, 'Chapter 2 [Science]', '10', 40),
(120, 'Chapter 3 [Science]', '10', 40),
(121, 'Chapter 1 [Math]', '11', 41),
(122, 'Chapter 2 [Math]', '11', 41),
(123, 'Chapter 3 [Math]', '11', 41),
(124, 'Chapter 1 [English]', '11', 42),
(125, 'Chapter 2 [English]', '11', 42),
(126, 'Chapter 3 [English]', '11', 42),
(127, 'Chapter 1 [Indonesian]', '11', 43),
(128, 'Chapter 2 [Indonesian]', '11', 43),
(129, 'Chapter 3 [Indonesian]', '11', 43),
(130, 'Chapter 1 [Science]', '11', 44),
(131, 'Chapter 2 [Science]', '11', 44),
(132, 'Chapter 3 [Science]', '11', 44),
(133, 'Chapter 1 [Math]', '12', 45),
(134, 'Chapter 2 [Math]', '12', 45),
(135, 'Chapter 3 [Math]', '12', 45),
(136, 'Chapter 1 [English]', '12', 46),
(137, 'Chapter 2 [English]', '12', 46),
(138, 'Chapter 3 [English]', '12', 46),
(139, 'Chapter 1 [Indonesian]', '12', 47),
(140, 'Chapter 2 [Indonesian]', '12', 47),
(141, 'Chapter 3 [Indonesian]', '12', 47),
(142, 'Chapter 1 [Science]', '12', 48),
(143, 'Chapter 2 [Science]', '12', 48),
(144, 'Chapter 3 [Science]', '12', 48);

-- --------------------------------------------------------

--
-- Table structure for table `ml_report`
--

CREATE TABLE `ml_report` (
  `report_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL DEFAULT 0,
  `grade` varchar(12) NOT NULL,
  `subject_id` int(11) NOT NULL DEFAULT 0,
  `chapter_id` int(11) NOT NULL DEFAULT 0,
  `score` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ml_report`
--

INSERT INTO `ml_report` (`report_id`, `student_id`, `grade`, `subject_id`, `chapter_id`, `score`) VALUES
(1, 1, '1', 1, 1, 75),
(2, 1, '1', 1, 2, 65),
(3, 1, '1', 1, 3, 70),
(4, 1, '1', 2, 4, 75),
(5, 1, '1', 2, 5, 85),
(6, 1, '1', 2, 6, 90),
(7, 1, '1', 3, 7, 75),
(8, 1, '1', 3, 8, 65),
(9, 1, '1', 3, 9, 70),
(10, 1, '1', 4, 10, 60),
(11, 1, '1', 4, 11, 55),
(12, 1, '1', 4, 12, 90),
(13, 2, '2', 5, 13, 75),
(14, 2, '2', 5, 14, 65),
(15, 2, '2', 5, 15, 70),
(16, 2, '2', 6, 16, 75),
(17, 2, '2', 6, 17, 85),
(18, 2, '2', 6, 18, 90),
(19, 2, '2', 7, 19, 75),
(20, 2, '2', 7, 20, 90),
(21, 2, '2', 7, 21, 90),
(22, 2, '2', 8, 22, 90),
(23, 2, '2', 8, 23, 90),
(24, 2, '2', 8, 24, 90),
(25, 3, '3', 9, 25, 75),
(26, 3, '3', 9, 26, 65),
(27, 3, '3', 9, 27, 70),
(28, 3, '3', 10, 28, 75),
(29, 3, '3', 10, 29, 85),
(30, 3, '3', 10, 30, 76),
(31, 3, '3', 11, 31, 55),
(32, 3, '3', 11, 32, 100),
(33, 3, '3', 11, 33, 56),
(34, 3, '3', 12, 34, 89),
(35, 3, '3', 12, 35, 34),
(36, 3, '3', 12, 36, 84),
(37, 4, '4', 12, 36, 65),
(38, 4, '4', 12, 37, 65),
(39, 4, '4', 12, 38, 55),
(40, 4, '4', 13, 39, 100),
(41, 4, '4', 13, 40, 85),
(42, 4, '4', 13, 41, 76),
(43, 4, '4', 14, 42, 45),
(44, 4, '4', 14, 43, 90),
(45, 4, '4', 14, 44, 56),
(46, 4, '4', 15, 45, 89),
(47, 4, '4', 15, 46, 90),
(48, 4, '4', 15, 47, 75);

-- --------------------------------------------------------

--
-- Table structure for table `ml_students`
--

CREATE TABLE `ml_students` (
  `student_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `grade` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ml_students`
--

INSERT INTO `ml_students` (`student_id`, `name`, `grade`) VALUES
(1, 'Pitaloka', '1'),
(2, 'Gumara Peto Alam', '2'),
(3, 'Karina', '3'),
(4, 'Arunika', '4'),
(5, 'Aruna', '5'),
(6, 'Rajo Langit', '6'),
(7, 'Lim Bubu', '7'),
(8, 'Humbalang', '8'),
(9, 'Ratna', '9'),
(10, 'Swastamitha', '10'),
(11, 'Kirana', '11'),
(12, 'Malika', '12');

-- --------------------------------------------------------

--
-- Table structure for table `ml_subjects`
--

CREATE TABLE `ml_subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(64) NOT NULL,
  `grade` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ml_subjects`
--

INSERT INTO `ml_subjects` (`subject_id`, `subject_name`, `grade`) VALUES
(1, 'Math', '1'),
(2, 'English', '1'),
(3, 'Indonesian', '1'),
(4, 'Science', '1'),
(5, 'Math', '2'),
(6, 'English', '2'),
(7, 'Indonesian', '2'),
(8, 'Science', '2'),
(9, 'Math', '3'),
(10, 'English', '3'),
(11, 'Indonesian', '3'),
(12, 'Science', '3'),
(13, 'Math', '4'),
(14, 'English', '4'),
(15, 'Indonesian', '4'),
(16, 'Science', '4'),
(17, 'Math', '5'),
(18, 'English', '5'),
(19, 'Indonesian', '5'),
(20, 'Science', '5'),
(21, 'Math', '6'),
(22, 'English', '6'),
(23, 'Indonesian', '6'),
(24, 'Science', '6'),
(25, 'Math', '7'),
(26, 'English', '3'),
(27, 'Indonesian', '7'),
(28, 'Science', '7'),
(29, 'Math', '8'),
(30, 'English', '8'),
(31, 'Indonesian', '8'),
(32, 'Science', '8'),
(33, 'Math', '9'),
(34, 'English', '9'),
(35, 'Indonesian', '9'),
(36, 'Science', '9'),
(37, 'Math', '10'),
(38, 'English', '10'),
(39, 'Indonesian', '10'),
(40, 'Science', '10'),
(41, 'Math', '11'),
(42, 'English', '11'),
(43, 'Indonesian', '11'),
(44, 'Science', '11'),
(45, 'Math', '12'),
(46, 'English', '12'),
(47, 'Indonesian', '12'),
(48, 'Science', '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ar_keys`
--
ALTER TABLE `ar_keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ar_limits`
--
ALTER TABLE `ar_limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ml_chapters`
--
ALTER TABLE `ml_chapters`
  ADD PRIMARY KEY (`chapter_id`);

--
-- Indexes for table `ml_report`
--
ALTER TABLE `ml_report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `ml_students`
--
ALTER TABLE `ml_students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `ml_subjects`
--
ALTER TABLE `ml_subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ar_keys`
--
ALTER TABLE `ar_keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ar_limits`
--
ALTER TABLE `ar_limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ml_chapters`
--
ALTER TABLE `ml_chapters`
  MODIFY `chapter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `ml_report`
--
ALTER TABLE `ml_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `ml_students`
--
ALTER TABLE `ml_students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ml_subjects`
--
ALTER TABLE `ml_subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
