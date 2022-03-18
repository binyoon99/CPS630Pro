-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2022 at 03:36 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `made_in` varchar(25) DEFAULT NULL,
  `img_src` varchar(100) NOT NULL,
  `item_desc` varchar(600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `price`, `made_in`, `img_src`, `item_desc`) VALUES
(1, 'Breville Toaster', '299.00', 'Australia', './images/toaster.jpg', 'This is a toaster has the ability to make you pog your pants. Yes, it\'s just that damn good'),
(2, 'KitchenAid Stand Mixer', '499.00', 'USA', './images/mixer.jpg', 'This is a Kitchen Mixer, it mixes many things proving to be a useful appliance');

-- --------------------------------------------------------

--
-- Table structure for table `orderstable`
--

CREATE TABLE `orderstable` (
  `order_id` int(11) NOT NULL,
  `date_issued` datetime NOT NULL DEFAULT current_timestamp(),
  `date_recieved` datetime NOT NULL DEFAULT current_timestamp(),
  `total_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `payment_code` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderstable`
--

INSERT INTO `orderstable` (`order_id`, `date_issued`, `date_recieved`, `total_price`, `payment_code`, `user_id`, `trip_id`) VALUES
(7, '2022-03-13 15:34:39', '2022-03-13 15:34:39', '299.00', 1, 1, 35),
(8, '2022-03-13 16:44:52', '2022-03-13 16:44:52', '299.00', 1, 1, 36),
(9, '2022-03-13 16:58:24', '2022-03-13 16:58:24', '299.00', 1, 1, 37),
(10, '2022-03-15 08:22:38', '2022-03-15 08:22:38', '15.00', 1, 1, 39),
(11, '2022-03-15 20:12:22', '2022-03-15 20:12:22', '15.00', 1, 1, 66),
(12, '2022-03-15 20:20:16', '2022-03-15 20:20:16', '798.00', 1, 1, 69);

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `trip_id` int(11) NOT NULL,
  `source` varchar(50) NOT NULL,
  `dest` varchar(50) NOT NULL,
  `truck_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`trip_id`, `source`, `dest`, `truck_id`) VALUES
(1, '', '', 1),
(2, '', '', 1),
(3, '', '', 1),
(4, '', '', 1),
(5, '', '', 1),
(6, '', '', 1),
(7, '', '', 1),
(8, '', '', 1),
(9, '', '', 1),
(10, '', '', 1),
(11, '', '', 1),
(12, '', '', 1),
(13, '', '', 1),
(14, '', '', 1),
(15, '', '', 1),
(16, '', '', 1),
(17, '', '', 1),
(18, '', '', 1),
(19, '', '', 1),
(20, '', '', 1),
(21, '', '', 1),
(22, '', '', 1),
(23, '', '', 1),
(24, '', '', 1),
(25, '', '', 1),
(26, '', '', 1),
(27, '', '', 1),
(28, '', '', 1),
(29, '', '', 1),
(30, '', '', 1),
(31, '', '', 1),
(32, '', '', 1),
(33, '', '', 1),
(34, '', '', 1),
(35, 'asdasd', 'hello', 1),
(36, '{\"lat\":\"43.096249\",\"lng\":\"-79.076973\"}', '4 Irish Rose Drive', 1),
(37, '{\"lat\":\"43.096249\",\"lng\":\"-79.076973\"}', '4 Irish Rose Drive', 1),
(38, 'default haha', 'cmon man', 1),
(39, 'default haha', 'cmon man', 1),
(40, 'default haha', 'cmon man', 1),
(41, 'default haha', 'cmon man', 1),
(42, 'default haha', 'cmon man', 1),
(43, 'default haha', 'cmon man', 1),
(44, 'default haha', 'cmon man', 1),
(45, 'default haha', 'cmon man', 1),
(46, 'default haha', 'cmon man', 1),
(47, '', '', 1),
(48, '', '', 1),
(49, '', '', 1),
(50, '', '', 1),
(51, '', '', 1),
(52, 'ff', '', 1),
(53, 'ff', '', 1),
(54, '', '', 1),
(55, '', '', 1),
(56, '', '', 1),
(57, '', '', 1),
(58, '', '', 1),
(59, '', '', 1),
(60, '', '', 1),
(61, '', '', 1),
(62, '', '', 1),
(63, '', '', 1),
(64, '', '', 1),
(65, '', '', 1),
(66, '75 wall st ', '59 wall st ', 1),
(67, '7', '', 1),
(68, '{\"lat\":\"43.740540\",\"lng\":\"-79.321830\"}', '4 Irish Rose Drive', 1),
(69, '{\"lat\":\"43.096249\",\"lng\":\"-79.076973\"}', '4 Irish Rose Drive', 1);

-- --------------------------------------------------------

--
-- Table structure for table `truck`
--

CREATE TABLE `truck` (
  `truck_id` int(11) NOT NULL,
  `truck_code` int(11) NOT NULL,
  `availability_code` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `truck`
--

INSERT INTO `truck` (`truck_id`, `truck_code`, `availability_code`) VALUES
(1, 320, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`) VALUES
(1, 'addy', 'adnan.rehman@ryerson.ca', 'pass'),
(9, 'addy2', 'adnan_reh@yahoo.ca', 'asd'),
(10, 'addy3', 'oudnanrehman@gmail.com', 'asd'),
(11, 'addy4', 'sssss@ryerson.ca', 'asd'),
(13, 'addy8', 'test@test.com', 'pass'),
(14, 'addy123', 'asd@hotmail.com', 'pass'),
(15, '', '', ''),
(16, '', '', ''),
(17, '', '', ''),
(18, '', '', ''),
(19, '', '', ''),
(20, '', '', ''),
(21, 'hello', 'hello@13.com', ''),
(22, 'hello', 'hello@13.com', ''),
(23, 'hello', 'hello@13.com', ''),
(24, 'hello', 'hello@13.com', ''),
(25, 'hello', 'hello@13.com', ''),
(26, 'hello', 'hello@13.com', ''),
(27, 'hello', 'hello@13.com', ''),
(28, 'hello', 'hello@13.com', ''),
(29, 'hello', 'hello@13.com', ''),
(30, 'hello', 'hello@13.com', ''),
(31, 'hello', 'hello@13.com', ''),
(32, 'hello', 'hello@13.com', ''),
(33, 'hello', 'hello@13.com', ''),
(34, 'hello', 'hello@13.com', ''),
(35, 'hello', 'hello@13.com', ''),
(36, 'hello', 'hello@13.com', ''),
(37, 'sdfsdoi', 'asf@jsodig.com', ''),
(38, 'sdfsdoi', 'asf@jsodig.com', ''),
(39, '', '', ''),
(40, '', '', ''),
(41, '', '', ''),
(42, '', '', ''),
(43, '', '', ''),
(44, '', '', ''),
(45, '', '', ''),
(46, '', '', ''),
(47, '', '', ''),
(48, '', '', ''),
(49, 'yfuy', 'eifue@jit.com', ''),
(50, 'qweqwe', '123@sdfsd.com', '123'),
(51, 'asd', 'asd@asd.com', '123'),
(52, '', '', ''),
(53, '', '', ''),
(54, '', '', ''),
(55, '', '', ''),
(56, '', '', ''),
(57, '', '', ''),
(58, '', '', ''),
(59, '', '', ''),
(60, '', '', ''),
(61, 'hello ', '123@gmail.com', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orderstable`
--
ALTER TABLE `orderstable`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `trip_id` (`trip_id`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`trip_id`),
  ADD KEY `truck_id` (`truck_id`);

--
-- Indexes for table `truck`
--
ALTER TABLE `truck`
  ADD PRIMARY KEY (`truck_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderstable`
--
ALTER TABLE `orderstable`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `trip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `truck`
--
ALTER TABLE `truck`
  MODIFY `truck_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderstable`
--
ALTER TABLE `orderstable`
  ADD CONSTRAINT `orderstable_ibfk_1` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`trip_id`),
  ADD CONSTRAINT `orderstable_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `trip`
--
ALTER TABLE `trip`
  ADD CONSTRAINT `trip_ibfk_1` FOREIGN KEY (`truck_id`) REFERENCES `truck` (`truck_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
