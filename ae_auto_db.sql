-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2021 at 06:25 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ae_auto_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `passenger_login_id` int(11) NOT NULL,
  `request_type` varchar(20) NOT NULL,
  `from_location` text NOT NULL,
  `to_location` text NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  `driver_reply` varchar(200) DEFAULT NULL,
  `driver_login_id` int(11) DEFAULT NULL,
  `driver_rating` int(11) DEFAULT NULL,
  `booking_status` int(11) DEFAULT NULL,
  `trip_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `trip_completed_time` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaints`
--

CREATE TABLE `tbl_complaints` (
  `complaint_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `complaint_description` text NOT NULL,
  `vehicle_number` varchar(100) NOT NULL,
  `complaint_reply` text DEFAULT NULL,
  `complaint_sent_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `complaint_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaints`
--

INSERT INTO `tbl_complaints` (`complaint_id`, `login_id`, `subject`, `complaint_description`, `vehicle_number`, `complaint_reply`, `complaint_sent_on`, `complaint_status`) VALUES
(1, 1, 'tedt', 'tesgg', 'ghhkl', NULL, '2021-02-05 11:51:41', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_driver_location`
--

CREATE TABLE `tbl_driver_location` (
  `driver_location_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `location_latitude` text NOT NULL,
  `location_longitude` text NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_driver_registration`
--

CREATE TABLE `tbl_driver_registration` (
  `driver_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `vehicle_number` varchar(50) NOT NULL,
  `licence_number` varchar(50) DEFAULT NULL,
  `vehicle_details` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_driver_registration`
--

INSERT INTO `tbl_driver_registration` (`driver_id`, `login_id`, `name`, `email_id`, `phone_no`, `address`, `vehicle_number`, `licence_number`, `vehicle_details`) VALUES
(1, 6, 'Test Driver', 'driver@mail.com', '9086331122', 'ttttshab ajjan', 'KL 56 G 3913', 'KPz244', 'bzzb jaiaka'),
(2, 8, 'Sreek', 'sree@gmail.com', '9087986666', 'test address', 'KL56P6688', NULL, 'test xnzjz');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `login_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`login_id`, `username`, `password`, `role`, `status`) VALUES
(6, 'driver@mail.com', 'test1', 2, 1),
(7, 'admin', 'autoadmin', 0, 1),
(8, 'sree@gmail.com', 'auto', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `notification_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `scanned_file` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_passenger_registration`
--

CREATE TABLE `tbl_passenger_registration` (
  `passenger_id` int(11) NOT NULL,
  `passenger_name` varchar(100) NOT NULL,
  `passenger_email` varchar(100) NOT NULL,
  `passenger_mobile` varchar(20) NOT NULL,
  `passenger_address` text NOT NULL,
  `login_id` int(11) NOT NULL,
  `registered_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_complaints`
--
ALTER TABLE `tbl_complaints`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_driver_location`
--
ALTER TABLE `tbl_driver_location`
  ADD PRIMARY KEY (`driver_location_id`);

--
-- Indexes for table `tbl_driver_registration`
--
ALTER TABLE `tbl_driver_registration`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `tbl_passenger_registration`
--
ALTER TABLE `tbl_passenger_registration`
  ADD PRIMARY KEY (`passenger_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_complaints`
--
ALTER TABLE `tbl_complaints`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_driver_location`
--
ALTER TABLE `tbl_driver_location`
  MODIFY `driver_location_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_driver_registration`
--
ALTER TABLE `tbl_driver_registration`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_passenger_registration`
--
ALTER TABLE `tbl_passenger_registration`
  MODIFY `passenger_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
