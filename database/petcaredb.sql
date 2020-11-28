-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2020 at 07:25 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petcaredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoptionpost`
--

CREATE TABLE `adoptionpost` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(400) NOT NULL,
  `image` varchar(400) NOT NULL,
  `location_id` int(11) NOT NULL,
  `address` varchar(400) NOT NULL,
  `contact_info` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adoptionpost`
--

INSERT INTO `adoptionpost` (`id`, `title`, `description`, `image`, `location_id`, `address`, `contact_info`, `user_id`, `status`) VALUES
(5, 'New ', 'Description', '20201128054304_77397329_2538762309547797_3433006727363035136_o.jpg', 0, '', '22626262', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vet_id` int(11) NOT NULL,
  `week_day_id` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `payment_status` tinyint(1) NOT NULL,
  `transaction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `donation_amount` float(10,2) NOT NULL,
  `is_anonymouse` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `donationpost`
--

CREATE TABLE `donationpost` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(400) NOT NULL,
  `image` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location`) VALUES
(1, 'Dhanmondi'),
(2, 'Mohammodpur');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(80) NOT NULL,
  `service_details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_details`) VALUES
(1, 'Nuter', 'Nuter Details '),
(3, 'okkk', 'kkkkp');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `id` int(11) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`id`, `time`) VALUES
(1, '8 am -9 am'),
(2, '9 am - 10 am'),
(3, '10 am - 11 am'),
(4, '11 am- 12 pm');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'Tanvir', 'tanveershuvos@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(3, 'simik', 'tanvir@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3);

-- --------------------------------------------------------

--
-- Table structure for table `vetdetails`
--

CREATE TABLE `vetdetails` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bmdc_registered_number` varchar(200) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `education` varchar(200) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `visiting_charge` int(11) NOT NULL,
  `short_bio` varchar(255) NOT NULL,
  `pro_pic` varchar(200) NOT NULL,
  `location_id` int(11) NOT NULL,
  `avg_rating` float(10,2) NOT NULL,
  `is_approved` tinyint(1) DEFAULT -1,
  `is_completed` int(4) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vetdetails`
--

INSERT INTO `vetdetails` (`id`, `user_id`, `bmdc_registered_number`, `full_name`, `title`, `education`, `email_address`, `address`, `gender`, `visiting_charge`, `short_bio`, `pro_pic`, `location_id`, `avg_rating`, `is_approved`, `is_completed`) VALUES
(1, 2, '123456', 'Tanvir', '', '', 'tanveershuvos@gmail.com', '', 'male', 0, '', '20201127193257_77397329_2538762309547797_3433006727363035136_o.jpg', 1, 0.00, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vetrating`
--

CREATE TABLE `vetrating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vet_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vet_available_days`
--

CREATE TABLE `vet_available_days` (
  `id` int(11) NOT NULL,
  `vet_id` int(11) NOT NULL,
  `week_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `weekdays`
--

CREATE TABLE `weekdays` (
  `id` int(11) NOT NULL,
  `days` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weekdays`
--

INSERT INTO `weekdays` (`id`, `days`) VALUES
(1, 'Sunday'),
(2, 'Monday'),
(5, 'Tuesday'),
(6, 'Wednesday');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoptionpost`
--
ALTER TABLE `adoptionpost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vet_id` (`vet_id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `slot_id` (`slot_id`),
  ADD KEY `week_day_id` (`week_day_id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `donationpost`
--
ALTER TABLE `donationpost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vetdetails`
--
ALTER TABLE `vetdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `vetrating`
--
ALTER TABLE `vetrating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vet_id` (`vet_id`);

--
-- Indexes for table `vet_available_days`
--
ALTER TABLE `vet_available_days`
  ADD KEY `vetAvalability_ibfk_1` (`vet_id`),
  ADD KEY `vetAvalability_ibfk_3` (`week_days`);

--
-- Indexes for table `weekdays`
--
ALTER TABLE `weekdays`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoptionpost`
--
ALTER TABLE `adoptionpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donationpost`
--
ALTER TABLE `donationpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vetdetails`
--
ALTER TABLE `vetdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vetrating`
--
ALTER TABLE `vetrating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weekdays`
--
ALTER TABLE `weekdays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoptionpost`
--
ALTER TABLE `adoptionpost`
  ADD CONSTRAINT `adoptionPost_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`vet_id`) REFERENCES `vetdetails` (`id`),
  ADD CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`transaction_id`) REFERENCES `slot` (`id`),
  ADD CONSTRAINT `appointment_ibfk_4` FOREIGN KEY (`slot_id`) REFERENCES `slot` (`id`),
  ADD CONSTRAINT `appointment_ibfk_5` FOREIGN KEY (`week_day_id`) REFERENCES `weekdays` (`id`);

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `donation_ibfk_2` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`);

--
-- Constraints for table `donationpost`
--
ALTER TABLE `donationpost`
  ADD CONSTRAINT `donationPost_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `vetdetails`
--
ALTER TABLE `vetdetails`
  ADD CONSTRAINT `vetDetails_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `vetrating`
--
ALTER TABLE `vetrating`
  ADD CONSTRAINT `vetRating_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `vetRating_ibfk_2` FOREIGN KEY (`vet_id`) REFERENCES `vetdetails` (`id`);

--
-- Constraints for table `vet_available_days`
--
ALTER TABLE `vet_available_days`
  ADD CONSTRAINT `vetAvalability_ibfk_1` FOREIGN KEY (`vet_id`) REFERENCES `vetdetails` (`id`),
  ADD CONSTRAINT `vetAvalability_ibfk_3` FOREIGN KEY (`week_days`) REFERENCES `weekdays` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
