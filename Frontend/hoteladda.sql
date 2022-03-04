-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2022 at 04:39 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hoteladda`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(233) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `address`, `email`, `phone`) VALUES
(1, 'abhishek', '1234', 'birtamode', 'kingothapa123@gmail.com', '9808636175'),
(3, 'nishant', '1234', 'chitwan', 'nishantghimire11@gmail.com', '7085250748');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bid` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `total_number` int(255) DEFAULT NULL,
  `total_amount` int(255) DEFAULT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `rate_flag` int(11) DEFAULT 0,
  `request_flag` int(11) NOT NULL DEFAULT 0,
  `remainder_flag` int(11) NOT NULL DEFAULT 0,
  `hid` int(255) DEFAULT NULL,
  `rid` int(255) DEFAULT NULL,
  `uid` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bid`, `name`, `phone`, `email`, `total_number`, `total_amount`, `check_in`, `check_out`, `rate_flag`, `request_flag`, `remainder_flag`, `hid`, `rid`, `uid`) VALUES
(37, 'Abhishek thapa', '9817008446', 'kingothapa123@gmail.com', 1, 2000, '2022-03-02', '2022-03-03', 1, 1, 0, 20, 26, 2),
(40, 'Abhishek Thapa', '9808636175', 'kingothapa123@gmail.com', 1, 1200, '2022-03-04', '2022-03-04', 1, 0, 1, 23, 30, 2),
(41, 'Abhishek Thapa', '9808636175', 'kingothapa123@gmail.com', 1, 8400, '2022-03-04', '2022-03-11', 0, 0, 0, 23, 30, 2),
(42, 'Nishant Ghimire', '9808636175', 'kingothapa123@gmail.com', 1, 1200, '2022-03-04', '2022-03-04', 0, 0, 0, 23, 30, 2),
(43, 'nishant ', '9808636175', 'kingothapa123@gmail.com', 1, 1200, '2022-03-04', '2022-03-04', 0, 0, 0, 23, 30, 2),
(44, 'Abhishek Thapa', '9808636175', 'kingothapa123@gmail.com', 1, 1200, '2022-03-04', '2022-03-04', 1, 0, 0, 23, 30, 2),
(45, 'Abhishek Thapa', '9808636175', 'kingothapa123@gmail.com', 1, 1200, '2022-03-04', '2022-03-04', 0, 1, 0, 23, 30, 2);

-- --------------------------------------------------------

--
-- Table structure for table `graph`
--

CREATE TABLE `graph` (
  `graph_id` int(255) NOT NULL,
  `Single_Bed` int(200) NOT NULL DEFAULT 0,
  `Double_Bed` int(200) NOT NULL DEFAULT 0,
  `hid` int(233) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `graph`
--

INSERT INTO `graph` (`graph_id`, `Single_Bed`, `Double_Bed`, `hid`) VALUES
(5, 0, 1, 20),
(7, 0, 1, 23);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` int(255) NOT NULL,
  `hotelname` varchar(255) NOT NULL,
  `pan_number` int(255) NOT NULL,
  `location` varchar(200) NOT NULL,
  `ownername` varchar(255) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `hotel_email` varchar(200) NOT NULL,
  `services` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rating` int(255) DEFAULT 0,
  `rating1` float NOT NULL DEFAULT 0,
  `Total_rating` int(255) NOT NULL DEFAULT 0,
  `hotel_total_rooms` int(255) NOT NULL DEFAULT 0,
  `admin_id` int(255) NOT NULL,
  `flag` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotelname`, `pan_number`, `location`, `ownername`, `phone`, `hotel_email`, `services`, `lat`, `lng`, `image`, `rating`, `rating1`, `Total_rating`, `hotel_total_rooms`, `admin_id`, `flag`) VALUES
(20, 'Everest Hotel ', 234232, 'Birtamode ,Jhapa', 'Abhishek Thapa', '9817008446', 'kingothapa123@gmail.com', 'Parking,Security Guard,Hotel Taxi', '27.7022677', '85.3230384', 'images/imone.jpg', 0, 5, 1, 19, 1, 1),
(22, 'ShreePaach', 212121, 'Chitwan', 'Nishant Ghimire', '9817008446', 'kingothapa123@gmail.com', 'Parking,Security Guard,Hotel Taxi', '27.7039689', '85.3233981', 'images/carolina.jpg', 0, 0, 0, 0, 1, 2),
(23, 'ShreePaach Tara Hotel', 2324332, 'Kathmandu', 'Abhishek Thapa', '9808636175', 'kingothapa123@gmail.com', 'Parking,Security Guard', '83.02', '75.09', 'images/abc.jpg', 0, 4.05, 2, 19, 1, 1),
(24, 'Kingsbury', 112, 'Kathmandu', 'Nishant Ghimire ', '9808636175', 'kingothapa123@gmail.com', 'Parking,Security Guard,Hotel Taxi', '83.02', '75.09', 'images/carolina.jpg', 0, 0, 0, 24, 1, 1),
(25, 'MOUNT HOTEL', 3232, 'Kathmandu', 'Abhishek Thapa', '9808636175', 'kingothapa123@gmail.com', 'Security Guard,Hotel Taxi', '83.02', '75.09', 'images/abc.jpg', 0, 0, 0, 0, 1, 2),
(27, 'Soltee Hotel', 12131, 'Kathmandu', 'Abhishek Thapa', '9808636175', 'kingothapa123@gmail.com', 'Parking,Security Guard,Hotel Taxi', '83.02', '75.09', 'images/imone.jpg', 0, 0, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(255) NOT NULL,
  `Amount` bigint(200) NOT NULL,
  `datee` varchar(255) NOT NULL,
  `hid` int(233) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `Amount`, `datee`, `hid`) VALUES
(16, 2000, '03/01/2022 ', 20),
(18, 1200, '03/04/2022 ', 23);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `roomname` varchar(255) DEFAULT NULL,
  `price` int(255) DEFAULT NULL,
  `total_numbers` int(200) DEFAULT 0,
  `current_number` int(200) DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `facilites` varchar(255) DEFAULT NULL,
  `hid` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `roomname`, `price`, `total_numbers`, `current_number`, `image`, `facilites`, `hid`) VALUES
(25, 'Single Bed', 200, 10, 10, 'images/doublebed.jpg', 'WIFI', 20),
(26, 'Double Bed', 1000, 10, 9, 'images/doublebed.jpg', 'AC,WIFI,Attached Bathroom', 20),
(29, 'Single Bed', 1200, 12, 12, 'images/Singlebed.jpg', 'AC,WIFI,Attached Bathroom,TV', 23),
(30, 'Double Bed', 1200, 12, 7, 'images/doublebed.jpg', 'WIFI,Attached Bathroom', 23),
(31, 'Single Bed', 1233, 12, 12, 'images/Singlebed.jpg', 'WIFI,Attached Bathroom', 24),
(32, 'Double Bed', 223, 12, 12, 'images/doublebed.jpg', 'AC,WIFI,Attached Bathroom', 24);

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(2, 'kingothapa123@gmail.com', '1234'),
(3, 'nishant123@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `test12` (`uid`),
  ADD KEY `test10` (`hid`),
  ADD KEY `test11` (`rid`);

--
-- Indexes for table `graph`
--
ALTER TABLE `graph`
  ADD PRIMARY KEY (`graph_id`),
  ADD KEY `test20` (`hid`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`),
  ADD KEY `test2` (`admin_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test30` (`hid`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test6` (`hid`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `graph`
--
ALTER TABLE `graph`
  MODIFY `graph_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotel_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `test10` FOREIGN KEY (`hid`) REFERENCES `hotel` (`hotel_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test11` FOREIGN KEY (`rid`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test12` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `graph`
--
ALTER TABLE `graph`
  ADD CONSTRAINT `test20` FOREIGN KEY (`hid`) REFERENCES `hotel` (`hotel_id`) ON DELETE CASCADE;

--
-- Constraints for table `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `test2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `income`
--
ALTER TABLE `income`
  ADD CONSTRAINT `test30` FOREIGN KEY (`hid`) REFERENCES `hotel` (`hotel_id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `test6` FOREIGN KEY (`hid`) REFERENCES `hotel` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
