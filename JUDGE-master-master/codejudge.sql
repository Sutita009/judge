-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2017 at 03:42 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codejudge`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(11) NOT NULL,
  `subject_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_name`, `subject_id`) VALUES
(1, 'Quiz_OOP', '977-001'),
(2, 'Mid', '977-001'),
(3, 'Quiz_CPT', '977-002');

-- --------------------------------------------------------

--
-- Table structure for table `prefs`
--

CREATE TABLE `prefs` (
  `name` varchar(30) NOT NULL,
  `accept` int(11) NOT NULL,
  `c` int(11) NOT NULL,
  `cpp` int(11) NOT NULL,
  `java` int(11) NOT NULL,
  `python` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prefs`
--

INSERT INTO `prefs` (`name`, `accept`, `c`, `cpp`, `java`, `python`) VALUES
('Codejudge', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `sl` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `input` text NOT NULL,
  `output` text NOT NULL,
  `time` int(11) NOT NULL DEFAULT '3000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`sl`, `name`, `text`, `input`, `output`, `time`) VALUES
(1, 'n+2', 'INPUT \r\nN\r\nOUTPUT N+2', '2', '4', 1000),
(2, 'jQuery tabSlideOut Demo', '1000', '', '', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `regis`
--

CREATE TABLE `regis` (
  `student_id` varchar(50) NOT NULL,
  `subject_id` varchar(50) NOT NULL,
  `subject_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regis`
--

INSERT INTO `regis` (`student_id`, `subject_id`, `subject_name`) VALUES
('5', '977-002', 'CPT'),
('5', '977-001', 'OOP'),
('5', '977-003', 'database');

-- --------------------------------------------------------

--
-- Table structure for table `solve`
--

CREATE TABLE `solve` (
  `sl` int(11) NOT NULL,
  `problem_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `attempts` int(11) NOT NULL DEFAULT '1',
  `soln` text NOT NULL,
  `filename` varchar(25) NOT NULL,
  `lang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solve`
--

INSERT INTO `solve` (`sl`, `problem_id`, `username`, `status`, `attempts`, `soln`, `filename`, `lang`) VALUES
(1, 1, 'arm', 1, 2, 'asdsad', 'test.c', 'c'),
(2, 1, 'arm', 1, 2, 'asdsad', 'test.c', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(50) NOT NULL,
  `student_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` varchar(15) NOT NULL,
  `subject_name` varchar(15) NOT NULL,
  `Teacher_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `Teacher_id`) VALUES
('8786-88', 'sa', '3'),
('977-000', 'test', '3'),
('977-001', 'OOP', '1'),
('977-002', 'CPT', '2'),
('977-003', 'database', '3'),
('977-123', 'client', '3'),
('977-669', 'IT', '5'),
('977-888', 'Os', '3'),
('978', 'PPOO', '5'),
('980-779', 'DDE', '3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sl` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `salt` varchar(6) NOT NULL,
  `hash` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sl`, `username`, `salt`, `hash`, `email`, `status`, `type`) VALUES
(1, 'admin', 'bmu2w', 'bmkVMsQ70yhfc', 'keymasterviriya1150@gmail.com', 1, 1),
(2, 'arm', '5i5i2', '5itZ3xhef4QLI', 'keymasterviriya1150@gmail.com', 1, 0),
(3, 'aziz', '56vu4', '56706V.vDo81k', '', 1, 0),
(5, 'mark', 'cnenz', 'cn8pK1Cu6sf3s', 'mamochiro11@gmail.com', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `subject_id_2` (`subject_id`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `solve`
--
ALTER TABLE `solve`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `solve`
--
ALTER TABLE `solve`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
