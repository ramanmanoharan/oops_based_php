-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2020 at 11:06 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ogbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `profile_image` varchar(200) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gender` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `zipcode` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `email`, `password`, `profile_image`, `creation_date`, `gender`, `phone`, `dob`, `address`, `city`, `zipcode`) VALUES
(1001, 'admin', 'admin@gmail.com', '9211', 'tony.webp', '2020-04-20 15:40:04', 'male', '7878668112', '1998-12-27', 'madhubani purnea', 'purnea', '854301');

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `booking_no` int(11) NOT NULL,
  `c_name` varchar(200) NOT NULL,
  `c_phone` varchar(200) NOT NULL,
  `c_email` varchar(200) NOT NULL,
  `c_address` varchar(200) NOT NULL,
  `refill_size` varchar(200) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `booking_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(11) NOT NULL,
  `connection_id` int(11) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `assign_to` varchar(200) NOT NULL,
  `refill_cost` varchar(200) NOT NULL,
  `response_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status_1` varchar(200) NOT NULL,
  `remark_1` varchar(200) NOT NULL,
  `response_time_1` varchar(200) DEFAULT NULL,
  `status_2` varchar(200) NOT NULL,
  `remark_2` varchar(200) NOT NULL,
  `response_time_2` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booked`
--

INSERT INTO `booked` (`booking_no`, `c_name`, `c_phone`, `c_email`, `c_address`, `refill_size`, `user_id`, `booking_time`, `status`, `connection_id`, `remark`, `assign_to`, `refill_cost`, `response_time`, `status_1`, `remark_1`, `response_time_1`, `status_2`, `remark_2`, `response_time_2`) VALUES
(5034005, 'Tony Stark', '8789478987', 'tony@gmail.com', 'Xyz chowk', '14', '1', '2020-04-19 17:06:24', '0', 105007, 'confirmed', '1', '693', '2020-04-20 13:55:50', '1', 'Delivery On the way', '2020-04-19 21:33:09', '1', 'Successfully Delivered\r\n', '2020-04-20 01:03:09'),
(5034006, 'Tony Stark', '8789478987', 'tony@gmail.com', 'Xyz chowk', '30', '1', '2020-04-20 12:01:04', '1', 105007, 'Request rejected due to higher refill size.', '', '', '2020-04-20 13:31:05', '', '', NULL, '', '', NULL),
(5034007, 'akon', '9876543210', 'akon@gmail.com', 'Xyz chowk', '14', '5', '2020-04-20 16:35:06', '0', 105009, 'booking confirmed', '1', '600', '2020-04-20 16:39:02', '1', 'delivery on the way', '2020-04-20 18:36:28', '1', 'Successfull delivered', '2020-04-20 18:39:02'),
(5034008, 'bkon kumar', '9876543212', 'bkon@gmail.com', 'Xyz chowk', '14', '6', '2020-04-20 17:07:43', '0', 105010, 'booking confirmed', '1', '600', '2020-04-20 17:09:38', '1', 'Delivery is On the way', '2020-04-20 19:08:59', '1', 'Successfull Delivered', '2020-04-20 19:09:38'),
(5034009, 'ckon kumar', '9876543210', 'ckon@gmail.com', 'Xyz chowk', '14', '7', '2020-04-20 17:22:08', '0', 105011, 'booking confirmed', '1', '600', '2020-04-20 17:23:51', '1', 'Delivery on the Way', '2020-04-20 19:23:16', '1', 'Successfully Delivered', '2020-04-20 19:23:51'),
(5034010, 'ckon kumar', '9876543210', 'ckon@gmail.com', 'Xyz chowk', '30', '7', '2020-04-20 17:24:20', '1', 105011, 'refected due to higher refill size', '', '', '2020-04-20 17:25:00', '', '', NULL, '', '', NULL),
(5034011, 'ekon kumari', '876543455', 'ekon@gmail.com', 'Xyz chowk', '14', '9', '2020-04-20 17:52:38', '0', 105012, 'booking confirmed', '3', '600', '2020-04-20 17:54:21', '1', 'delivery on the way', '2020-04-20 19:53:46', '1', 'successfully delivered', '2020-04-20 19:54:21'),
(5034012, 'ekon kumari', '876543455', 'ekon@gmail.com', 'Xyz chowk', '30', '9', '2020-04-20 17:54:53', '1', 105012, 'request cancelled due to higher refill size', '', '', '2020-04-20 17:55:35', '', '', NULL, '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `connection`
--

CREATE TABLE `connection` (
  `connection_id` int(11) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `nationality` varchar(200) NOT NULL,
  `marital` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `town` varchar(200) NOT NULL,
  `zip` varchar(200) NOT NULL,
  `relation` varchar(200) NOT NULL,
  `related_name` varchar(200) NOT NULL,
  `related_phone` varchar(200) NOT NULL,
  `related_address` varchar(200) NOT NULL,
  `doc` varchar(200) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `applied_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(200) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `c_cost` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connection`
--

INSERT INTO `connection` (`connection_id`, `full_name`, `email`, `phone`, `gender`, `dob`, `nationality`, `marital`, `address`, `town`, `zip`, `relation`, `related_name`, `related_phone`, `related_address`, `doc`, `user_id`, `applied_time`, `status`, `remark`, `c_cost`) VALUES
(105001, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2', '2020-04-20 15:28:08', '2', 'incomplete form\r\n', ''),
(105007, 'Tony Stark', 'tony@gmail.com', '8789478987', 'Male', '1998-12-12', 'Indian', 'Unmarried', 'Xyz chowk', 'abc', '865323', 'father', 'Henry Allen', '98765434', 'xyz', 'face-0.jpg', '1', '2020-04-19 15:36:53', '1', 'connection approved', '2599'),
(105009, 'akon', 'akon@gmail.com', '9876543210', 'male', '1999-12-10', 'Indian', 'married', 'Xyz chowk', 'purnea', '876543', 'father', 'Mr. Bkon', '98765434', 'purnea', 'doc.jpg', '5', '2020-04-20 16:32:07', '1', 'connection approved', '2599'),
(105010, 'bkon kumar', 'bkon@gmail.com', '9876543212', 'male', '1999-12-10', 'Indian', 'married', 'Xyz chowk', 'asdf', '854302', 'father', 'Mr. akon', '987654341', 'qwerty chowk', 'doc.jpg', '6', '2020-04-20 17:07:04', '1', 'connection approved', '3000'),
(105011, 'ckon kumar', 'ckon@gmail.com', '9876543210', 'male', '1998-12-12', 'Indian', 'married', 'Xyz chowk', 'asdf', '854301', 'father', 'Mr. Bkon', '98765434', 'qwerty chowk', 'doc.jpg', '7', '2020-04-20 17:21:36', '1', 'connection approved', '3000'),
(105012, 'ekon kumari', 'ekon@gmail.com', '876543455', 'female', '1974-12-12', 'Indian', 'married', 'Xyz chowk', 'asdf', '876543', 'spouse', 'Mr. akon', '987654341', 'qwerty chowk', 'doc.jpg', '9', '2020-04-20 17:52:15', '1', 'connection approved', '3000');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `s_name` varchar(200) NOT NULL,
  `s_email` varchar(200) NOT NULL,
  `s_phone` varchar(200) NOT NULL,
  `s_address` varchar(200) NOT NULL,
  `s_aadhar` varchar(200) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `s_name`, `s_email`, `s_phone`, `s_address`, `s_aadhar`, `joining_date`) VALUES
(1, 'Ramu', 'ramu@gmail.com', '9876543234', 'Xyz chowk abc city , bihar', '252245352343', '2020-04-19 07:52:00'),
(2, 'akon', 'akon@rock.com', '98734548', 'qwerty chowk', '2435355454', '2020-04-20 17:10:38'),
(3, 'raju', 'raju@rock.com', '9876456', 'asd', '876545676', '2020-04-20 17:25:58'),
(4, 'asdf', 'asdf@gmail.com', '987654', 'werty', '543', '2020-04-20 17:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `f_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `r_address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `p_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `f_name`, `email`, `password`, `mobile`, `gender`, `dob`, `r_address`, `city`, `zipcode`, `p_image`) VALUES
(1, 'Tony Stark', 'tony@gmail.com', '12345', '9211921111', 'male', '1998-12-26', 'Xyz chowk', 'purnea', 854301, 'tony3.jpg'),
(2, 'Raj Kumar', 'raj@gmail.com', '12345', '9211921111', 'male', '2012-12-12', 'Xyz chowk', 'araria', 845381, 'face-3.jpg'),
(5, 'akon', 'akon@gmail.com', '12345', '9876543210', 'male', '1999-12-12', 'Xyz chowk', 'asdf', 876543, 'face-3.jpg'),
(6, 'bkon kumar', 'bkon@gmail.com', '123456', '9876543212', 'male', '1998-12-10', 'Xyz chowk', 'asdf', 854302, 'face-3.jpg'),
(7, 'ckon kumar', 'ckon@gmail.com', '12345', '9876543210', 'male', '1998-12-12', 'Xyz chowk', 'asdf', 854301, 'face-2.jpg'),
(8, 'Dkon', 'dkon@gmail.com', '12345', '98765432', 'female', '1998-12-12', 'Xyz chowk', 'asdf', 854321, 't4.jpg'),
(9, 'ekon kumari', 'ekon@gmail.com', '12345', '876543455', 'female', '1998-12-12', 'Xyz chowk', 'asdf', 876543, 't4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`booking_no`);

--
-- Indexes for table `connection`
--
ALTER TABLE `connection`
  ADD PRIMARY KEY (`connection_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `booked`
--
ALTER TABLE `booked`
  MODIFY `booking_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5034013;

--
-- AUTO_INCREMENT for table `connection`
--
ALTER TABLE `connection`
  MODIFY `connection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105013;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
