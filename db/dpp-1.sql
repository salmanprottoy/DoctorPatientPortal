-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2020 at 08:59 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(15) NOT NULL,
  `a_name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_pass` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_pass`) VALUES
(9, 'abc', '$2y$10$3TMplmb/OZIqeBd.uJwxgOp4uJ1D0htvH8gsURZ.y0Q4aarGFl9hu');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `app_id` int(15) NOT NULL,
  `d_id` int(15) NOT NULL,
  `app_time` date NOT NULL,
  `app_hospital` varchar(25) COLLATE ascii_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `d_id` int(15) NOT NULL,
  `d_name` varchar(25) COLLATE ascii_bin NOT NULL,
  `d_pass` varchar(100) COLLATE ascii_bin NOT NULL,
  `d_fname` varchar(25) COLLATE ascii_bin NOT NULL,
  `d_lname` varchar(25) COLLATE ascii_bin NOT NULL,
  `d_dob` date NOT NULL,
  `d_bgroup` varchar(10) COLLATE ascii_bin NOT NULL,
  `d_email` varchar(25) COLLATE ascii_bin NOT NULL,
  `d_phone` varchar(15) COLLATE ascii_bin NOT NULL,
  `d_department` varchar(25) COLLATE ascii_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`d_id`, `d_name`, `d_pass`, `d_fname`, `d_lname`, `d_dob`, `d_bgroup`, `d_email`, `d_phone`, `d_department`) VALUES
(1, 'admin', '12345', 'abc', 'xyz', '2020-09-01', 'a+', 'abc@gmail.com', '+8801521522442', ''),
(2, 'salman', '$2y$10$yKDJe7at2nvXBAdBoVgrWuUyOOS5.FvHzM2m/y6SvOpGqQIz58lge', 'salman', 'prottoy', '1998-10-11', 'a+', 'salman.prottoy@gmail.com', '+8801521532752', ''),
(3, 'prottoy', '$2y$10$MPtCDCag60Vmv0wyb9F47uUl2/d3RrqWmHlVFogNk.KzJuiknSsKu', 'salman', 'prottoy', '1998-10-11', 'a+', 'prottoy#@gmail.com', '+8801865683585', '');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `h_id` int(15) NOT NULL,
  `h_name` varchar(25) COLLATE ascii_bin NOT NULL,
  `h_address` text COLLATE ascii_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

-- --------------------------------------------------------

--
-- Table structure for table `organ`
--

CREATE TABLE `organ` (
  `o_id` int(15) NOT NULL,
  `p_uname` varchar(15) COLLATE ascii_bin NOT NULL,
  `o_name` varchar(25) COLLATE ascii_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `p_id` int(15) NOT NULL,
  `p_pass` varchar(100) COLLATE ascii_bin NOT NULL,
  `p_name` varchar(25) COLLATE ascii_bin NOT NULL,
  `p_fname` varchar(25) COLLATE ascii_bin NOT NULL,
  `p_lname` varchar(25) COLLATE ascii_bin NOT NULL,
  `p_dob` date NOT NULL,
  `p_bgroup` varchar(10) COLLATE ascii_bin NOT NULL,
  `p_email` varchar(25) COLLATE ascii_bin NOT NULL,
  `p_phone` varchar(15) COLLATE ascii_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`p_id`, `p_pass`, `p_name`, `p_fname`, `p_lname`, `p_dob`, `p_bgroup`, `p_email`, `p_phone`) VALUES
(1, '$2y$10$FWOC42p.3aIDyBpUT2q72OcZ88tIRrSJclV9N.cPxW7ju3KCYCNAi', 'salman', 'Md Salman', 'Prottoy', '1998-10-11', 'a+', 'salman.prottoy@gmail.com', '+8801521532752');

-- --------------------------------------------------------

--
-- Table structure for table `su_admin`
--

CREATE TABLE `su_admin` (
  `sa_id` int(15) NOT NULL,
  `sa_name` varchar(25) COLLATE ascii_bin NOT NULL,
  `sa_pass` varchar(25) COLLATE ascii_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `su_admin`
--

INSERT INTO `su_admin` (`sa_id`, `sa_name`, `sa_pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(15) NOT NULL,
  `u_name` varchar(25) COLLATE ascii_bin NOT NULL,
  `u_pass` varchar(100) COLLATE ascii_bin NOT NULL,
  `u_fname` varchar(25) COLLATE ascii_bin NOT NULL,
  `u_lname` varchar(25) COLLATE ascii_bin NOT NULL,
  `u_dob` date NOT NULL,
  `u_bg` varchar(10) COLLATE ascii_bin NOT NULL,
  `u_email` varchar(50) COLLATE ascii_bin NOT NULL,
  `u_phone` varchar(20) COLLATE ascii_bin NOT NULL,
  `u_type` varchar(15) COLLATE ascii_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_pass`, `u_fname`, `u_lname`, `u_dob`, `u_bg`, `u_email`, `u_phone`, `u_type`) VALUES
(1, 'admin', '12345', 'abc', 'xyz', '2020-09-01', 'a+', 'abc@gmail.com', '+8801521522442', 'doctor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `a_name` (`a_name`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`d_id`),
  ADD UNIQUE KEY `d_name` (`d_name`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `organ`
--
ALTER TABLE `organ`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `p_name` (`p_name`);

--
-- Indexes for table `su_admin`
--
ALTER TABLE `su_admin`
  ADD PRIMARY KEY (`sa_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `app_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `d_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `h_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organ`
--
ALTER TABLE `organ`
  MODIFY `o_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `p_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `su_admin`
--
ALTER TABLE `su_admin`
  MODIFY `sa_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
