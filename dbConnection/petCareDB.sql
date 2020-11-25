-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 24, 2020 at 06:33 PM
-- Server version: 10.3.25-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petCareDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoptionPost`
--

CREATE TABLE `adoptionPost` (
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
-- Dumping data for table `adoptionPost`
--

INSERT INTO `adoptionPost` (`id`, `title`, `description`, `image`, `location_id`, `address`, `contact_info`, `user_id`, `status`) VALUES
(1, 'Cum id est optio niss', 'Ullamco sit sed volus', '20201124165942_PetClinic.jpeg', 1, 'Sapiente id fugit ', 'Labore eveniet culpss', 5, 1),
(2, 'Ex omnis rerum sed e', 'Perferendis suscipit', '20201124170437_PetClinic.jpeg', 1, 'Sed hic omnis nostru', 'Unde assumenda ducim', 5, 0);

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
-- Table structure for table `donationPost`
--

CREATE TABLE `donationPost` (
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

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `id` int(11) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'gacobe', 'najefuma@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 3),
(5, 'Tanvira rahman', 'tanvir@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3);

-- --------------------------------------------------------

--
-- Table structure for table `vetAvalability`
--

CREATE TABLE `vetAvalability` (
  `id` int(11) NOT NULL,
  `vet_id` int(11) NOT NULL,
  `week_days` int(11) NOT NULL,
  `slot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vetDetails`
--

CREATE TABLE `vetDetails` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bmdc_registered_number` varchar(200) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `education` varchar(200) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `visiting_charge` int(11) NOT NULL,
  `avg_rating` float(10,2) NOT NULL,
  `is_approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vetRating`
--

CREATE TABLE `vetRating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vet_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `weekdays`
--

CREATE TABLE `weekdays` (
  `id` int(11) NOT NULL,
  `days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoptionPost`
--
ALTER TABLE `adoptionPost`
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
-- Indexes for table `donationPost`
--
ALTER TABLE `donationPost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
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
-- Indexes for table `vetAvalability`
--
ALTER TABLE `vetAvalability`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vet_id` (`vet_id`),
  ADD KEY `slot` (`slot`),
  ADD KEY `week_days` (`week_days`);

--
-- Indexes for table `vetDetails`
--
ALTER TABLE `vetDetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `vetRating`
--
ALTER TABLE `vetRating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vet_id` (`vet_id`);

--
-- Indexes for table `weekdays`
--
ALTER TABLE `weekdays`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoptionPost`
--
ALTER TABLE `adoptionPost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `donationPost`
--
ALTER TABLE `donationPost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vetAvalability`
--
ALTER TABLE `vetAvalability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vetDetails`
--
ALTER TABLE `vetDetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vetRating`
--
ALTER TABLE `vetRating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weekdays`
--
ALTER TABLE `weekdays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoptionPost`
--
ALTER TABLE `adoptionPost`
  ADD CONSTRAINT `adoptionPost_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`vet_id`) REFERENCES `vetDetails` (`id`),
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
-- Constraints for table `donationPost`
--
ALTER TABLE `donationPost`
  ADD CONSTRAINT `donationPost_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `vetAvalability`
--
ALTER TABLE `vetAvalability`
  ADD CONSTRAINT `vetAvalability_ibfk_1` FOREIGN KEY (`vet_id`) REFERENCES `vetDetails` (`id`),
  ADD CONSTRAINT `vetAvalability_ibfk_2` FOREIGN KEY (`slot`) REFERENCES `slot` (`id`),
  ADD CONSTRAINT `vetAvalability_ibfk_3` FOREIGN KEY (`week_days`) REFERENCES `weekdays` (`id`);

--
-- Constraints for table `vetDetails`
--
ALTER TABLE `vetDetails`
  ADD CONSTRAINT `vetDetails_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `vetRating`
--
ALTER TABLE `vetRating`
  ADD CONSTRAINT `vetRating_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `vetRating_ibfk_2` FOREIGN KEY (`vet_id`) REFERENCES `vetDetails` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
