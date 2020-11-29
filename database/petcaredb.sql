-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2020 at 05:43 AM
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
(6, 'Tenetur iste rerum s', 'Ut adipisci sed dolo', '20201128091805_77397329_2538762309547797_3433006727363035136_o.jpg', 1, '', 'Et ullamco odio volu', 3, 0),
(7, 'new', 'Officia deserunt qui', '20201128092934_download.png', 2, '', 'Laborum Non id quis', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vet_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `transaction_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `user_id`, `vet_id`, `date`, `slot_id`, `payment_status`, `transaction_id`) VALUES
(1, 3, 2, '', 0, 'VALID', 'SSLCZ_TEST_5fc31fe544eec'),
(2, 0, 0, '', 0, 'VALID', 'SSLCZ_TEST_5fc320183e6be'),
(3, 3, 2, '01-12-2020', 1, 'VALID', 'SSLCZ_TEST_5fc3203512936'),
(4, 3, 2, '01-12-2020', 2, 'VALID', 'SSLCZ_TEST_5fc3205142151'),
(5, 3, 2, '01-12-2020', 3, 'VALID', 'SSLCZ_TEST_5fc3208523712');

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
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `amount`, `payment_method`, `payment_date`) VALUES
('SSLCZ_TEST_5fc31fe544eec', 300, 'BKASH-BKash', '2020-11-29 10:15:44'),
('SSLCZ_TEST_5fc320183e6be', 300, 'DBBLMOBILEB-Dbbl Mobile Banking', '2020-11-29 10:16:35'),
('SSLCZ_TEST_5fc3203512936', 300, 'DBBLMOBILEB-Dbbl Mobile Banking', '2020-11-29 10:17:03'),
('SSLCZ_TEST_5fc3205142151', 300, 'IBBL-Islami Bank', '2020-11-29 10:17:32'),
('SSLCZ_TEST_5fc3208523712', 300, 'CITYBANKIB-City Bank', '2020-11-29 10:18:23');

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
(2, 'Tanvir', 'tanveershuvos@gmail.com', '25d55ad283aa400af464c76d713c07ad', 2),
(3, 'simik', 'tanvir@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3),
(4, 'zutekixaro', 'vezakajy@mailinator.com', '827ccb0eea8a706c4c34a16891f84e7b', 3);

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
(1, 2, '123456', 'Tanvir', 'ddd', 'sssssssssss', 'tanveershuvos@gmail.com', 'dddff', 'male', 300, 'ssssssss', '20201127193257_77397329_2538762309547797_3433006727363035136_o.jpg', 1, 0.00, 1, 1);

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

--
-- Dumping data for table `vet_available_days`
--

INSERT INTO `vet_available_days` (`id`, `vet_id`, `week_days`) VALUES
(12, 2, 1),
(13, 2, 2),
(14, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `vet_available_service`
--

CREATE TABLE `vet_available_service` (
  `id` int(11) NOT NULL,
  `vet_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vet_available_service`
--

INSERT INTO `vet_available_service` (`id`, `vet_id`, `service_id`) VALUES
(8, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vet_available_slot`
--

CREATE TABLE `vet_available_slot` (
  `id` int(11) NOT NULL,
  `vet_id` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vet_available_slot`
--

INSERT INTO `vet_available_slot` (`id`, `vet_id`, `slot_id`) VALUES
(13, 2, 1),
(14, 2, 2),
(15, 2, 3);

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vet_available_service`
--
ALTER TABLE `vet_available_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vet_available_slot`
--
ALTER TABLE `vet_available_slot`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `vet_available_days`
--
ALTER TABLE `vet_available_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `vet_available_service`
--
ALTER TABLE `vet_available_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vet_available_slot`
--
ALTER TABLE `vet_available_slot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
