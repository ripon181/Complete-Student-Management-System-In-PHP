-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 07:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uni`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'falguni', '03d5626ef3150d4e06e117a5ffd8ee22');

-- --------------------------------------------------------

--
-- Table structure for table `attn`
--

CREATE TABLE `attn` (
  `id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `atten` varchar(50) NOT NULL,
  `at_date` date NOT NULL,
  `dept` varchar(254) NOT NULL,
  `subt` varchar(254) NOT NULL,
  `at_time` varchar(254) CHARACTER SET utf8 NOT NULL,
  `semester` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attn`
--

INSERT INTO `attn` (`id`, `st_id`, `atten`, `at_date`, `dept`, `subt`, `at_time`, `semester`) VALUES
(325, 123456789, 'present', '2023-08-19', 'Electrical & Electronic Engineering (EEE)', 'English', '01:02 AM', '2nd Semester'),
(326, 1811510619, 'present', '2023-08-19', 'Electrical & Electronic Engineering (EEE)', 'English', '01:02 AM', '2nd Semester'),
(327, 987654321, 'absent', '2023-08-19', 'Electrical & Electronic Engineering (EEE)', 'English', '01:02 AM', '2nd Semester'),
(328, 123456789, 'present', '2023-08-13', 'Computer Science & Engineering (CSE)', 'English', '02:05 AM', '3rd Semester'),
(329, 1811510619, 'present', '2023-08-13', 'Computer Science & Engineering (CSE)', 'English', '02:05 AM', '3rd Semester'),
(330, 987654321, 'present', '2023-08-13', 'Computer Science & Engineering (CSE)', 'English', '02:05 AM', '3rd Semester');

-- --------------------------------------------------------

--
-- Table structure for table `att_dept`
--

CREATE TABLE `att_dept` (
  `id` int(11) NOT NULL,
  `dept` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `att_dept`
--

INSERT INTO `att_dept` (`id`, `dept`) VALUES
(1, 'Computer Science & Engineering (CSE)'),
(2, 'Electrical & Electronic Engineering (EEE)'),
(3, 'Business Administration'),
(4, 'English'),
(5, 'Sociology'),
(6, 'Law'),
(7, 'Mathematics'),
(8, 'Pharmacy'),
(9, 'Architecture'),
(10, 'Economics');

-- --------------------------------------------------------

--
-- Table structure for table `att_semester`
--

CREATE TABLE `att_semester` (
  `id` int(11) NOT NULL,
  `semester` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `att_semester`
--

INSERT INTO `att_semester` (`id`, `semester`) VALUES
(1, '1st Semester'),
(2, '2nd Semester'),
(3, '3rd Semester'),
(4, '4th Semester'),
(5, '5th Semester'),
(6, '6th Semester'),
(7, '7th Semester'),
(8, '8th Semester');

-- --------------------------------------------------------

--
-- Table structure for table `att_subject`
--

CREATE TABLE `att_subject` (
  `id` int(11) NOT NULL,
  `subject` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `att_subject`
--

INSERT INTO `att_subject` (`id`, `subject`) VALUES
(1, 'Computer Fundamental'),
(2, 'English'),
(3, 'Java'),
(4, 'Web Engineering'),
(5, 'Physics'),
(6, 'Algorithm'),
(7, 'Robotics'),
(8, 'Robotics');

-- --------------------------------------------------------

--
-- Table structure for table `at_student`
--

CREATE TABLE `at_student` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `st_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `at_student`
--

INSERT INTO `at_student` (`id`, `name`, `st_id`) VALUES
(41, 'Mobashira Papia', 123456789),
(42, 'Rownok Ripon', 1811510619),
(43, 'Ebadul Islam', 987654321);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `education` varchar(100) DEFAULT NULL,
  `contact` int(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `img` varchar(254) NOT NULL,
  `dept` varchar(254) NOT NULL,
  `subt` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `username`, `password`, `name`, `email`, `birthday`, `gender`, `education`, `contact`, `address`, `img`, `dept`, `subt`) VALUES
(27, 'saiful12', '568f4e2c9e49c59af9e345b8884b30bb', 'Saiful Islam', 'saiful12@gmail.com', '1980-01-10', 'Male', 'MSc in CSE from California', 1710101010, 'Dhaka', '3CB1B73E-D1D7-507D-2F79-A8816491522C.png', 'CSE', 'dbms'),
(28, 'ahmedfaysal0176', '38e91a163bcbbf9cde02a473b6a4d66f', 'ahmed faysal', 'ahmedfaysal0176@gmail.com', '2020-02-01', 'Male', 'BSc in cse from diu', 2147483647, 'Gauringor school, sodor lakshmipur ,', '', 'CSE', 'Fundamental'),
(29, 'rahim', '9733b92d7d60ecac9ad32ff7a5c87a3c', 'Rahim Mia', 'rahim@gmail.com', '2021-03-01', 'Male', 'MSc in cse from diu', 1502102012, 'dhaka', '', 'CSE', 'English'),
(30, 'rahima', '66b0067c96a7fe7465061ed0e77f78b0', 'Rahima Akter', 'rahima@gmail.com', '1998-01-02', 'Male', 'BSc in cse from Dhaka University', 1420123220, 'Dhaka', '', 'CSE', 'Fundamental'),
(31, 'rasel', 'd515518a1715bae5fbfc59d2458de532', 'Ahmed Rasel', 'rasel@gmail.com', '1890-05-03', 'Male', 'Phd in cse from Dhaka University', 1420123220, 'dhaka', '', 'CSE', 'Fundamental');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `marks` int(5) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `semester` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `st_id`, `marks`, `sub`, `semester`) VALUES
(81, 123456789, 100, 'Programming Lab', '1st');

-- --------------------------------------------------------

--
-- Table structure for table `st_info`
--

CREATE TABLE `st_info` (
  `st_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bday` date NOT NULL,
  `program` varchar(10) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_info`
--

INSERT INTO `st_info` (`st_id`, `name`, `password`, `email`, `bday`, `program`, `contact`, `gender`, `address`, `img`) VALUES
(123456789, 'Mobashira Papia', '25f9e794323b453885f5181f1b624d0b', 'papia@gmail.com', '2010-01-10', 'BSC', '01745121020', 'Female', 'Dhaka', '9B9AE743-6478-EAB4-6E39-C37E6D9C837C.jpg'),
(987654321, 'Ebadul Islam', '6ebe76c9fb411be97b3b0d48b791a7c9', 'ebadul@gmail.com', '1990-01-02', 'BSC', '01745201547', 'Male', 'Mirpur, Dhaka ', NULL),
(1811510619, 'Rownok', '54ccf9a22ad8ec14f7ffc124d0b0609b', 'rownok@gmail.com', '1998-01-13', 'BSC', '01745121021', 'Male', '111/2 Bashiruddin Road, Kolabagan', '4548C8BD-4C74-96CB-38E1-189DE55A7F3C.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attn`
--
ALTER TABLE `attn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `att_dept`
--
ALTER TABLE `att_dept`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `att_semester`
--
ALTER TABLE `att_semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `att_subject`
--
ALTER TABLE `att_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `at_student`
--
ALTER TABLE `at_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `st_info`
--
ALTER TABLE `st_info`
  ADD PRIMARY KEY (`st_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attn`
--
ALTER TABLE `attn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT for table `att_dept`
--
ALTER TABLE `att_dept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `att_semester`
--
ALTER TABLE `att_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `att_subject`
--
ALTER TABLE `att_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `at_student`
--
ALTER TABLE `at_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
