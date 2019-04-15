-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2019 at 08:58 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finderdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `house_number` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `username`, `password`, `firstname`, `middlename`, `lastname`, `email`, `contact_number`, `house_number`, `street`, `city`, `created_at`) VALUES
(3, 'admin', 'eb11ee2bbfb6ccfe7cde6cb835a03381', 'iHanap', '', 'Admin', 'admin@mail.com', '+639279279421', '124', 'Twin Pioneer', 'Pasay', '2019-04-08 04:03:55.265368');

-- --------------------------------------------------------

--
-- Table structure for table `missingpersons`
--

CREATE TABLE `missingpersons` (
  `missing_person_id` int(11) NOT NULL,
  `mp_firstname` varchar(255) NOT NULL,
  `mp_middlename` varchar(255) NOT NULL,
  `mp_lastname` varchar(255) NOT NULL,
  `mp_relative` varchar(255) NOT NULL,
  `mp_contact_number` varchar(255) NOT NULL,
  `mp_house_number` varchar(255) NOT NULL,
  `mp_street` varchar(255) NOT NULL,
  `mp_city` varchar(255) NOT NULL,
  `mp_nativity` varchar(255) NOT NULL,
  `mp_age` varchar(255) NOT NULL,
  `mp_remarks` varchar(255) NOT NULL,
  `mp_last_seen` varchar(255) NOT NULL,
  `mp_missing_duration_hrs` varchar(255) NOT NULL,
  `mp_top_clothing` varchar(255) NOT NULL,
  `mp_bottom_clothing` varchar(255) NOT NULL,
  `mp_gender` varchar(255) NOT NULL,
  `mp_height` varchar(255) NOT NULL,
  `mp_weight` varchar(255) NOT NULL,
  `mp_created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `mp_status` varchar(255) NOT NULL DEFAULT 'Open',
  `mp_tag` varchar(255) NOT NULL DEFAULT 'Missing',
  `mp_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `missingpersons`
--

INSERT INTO `missingpersons` (`missing_person_id`, `mp_firstname`, `mp_middlename`, `mp_lastname`, `mp_relative`, `mp_contact_number`, `mp_house_number`, `mp_street`, `mp_city`, `mp_nativity`, `mp_age`, `mp_remarks`, `mp_last_seen`, `mp_missing_duration_hrs`, `mp_top_clothing`, `mp_bottom_clothing`, `mp_gender`, `mp_height`, `mp_weight`, `mp_created_at`, `mp_status`, `mp_tag`, `mp_photo`) VALUES
(16, 'Arbie', '', 'Tecson', 'iHanap  Admin', '', '124', 'Twin Pioneer', 'Pasay', 'Filipino', '23', '', '04/01/2016', '', 'White T-Shirt', 'Maong', 'Male', '164', '164', '2019-04-08 05:20:05.096332', 'Close', 'Missing', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `missingpersons`
--
ALTER TABLE `missingpersons`
  ADD PRIMARY KEY (`missing_person_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `missingpersons`
--
ALTER TABLE `missingpersons`
  MODIFY `missing_person_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
