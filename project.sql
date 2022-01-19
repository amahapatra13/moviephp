-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2022 at 04:28 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

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
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `create_dt` datetime NOT NULL DEFAULT current_timestamp(),
  `active` varchar(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `create_dt`, `active`) VALUES
(1, 'Delhi', '2021-01-09 10:24:21', 'Y'),
(3, 'Mumbai', '2021-01-09 10:38:23', 'Y'),
(4, 'Bangalore', '2021-01-09 10:53:13', 'Y'),
(5, 'Chennai', '2021-01-09 10:53:13', 'Y'),
(6, 'Kolkata', '2021-01-09 10:53:13', 'Y'),
(7, 'Ahmedabad', '2021-01-09 10:53:13', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `image` varchar(25) DEFAULT NULL,
  `create_dt` datetime NOT NULL DEFAULT current_timestamp(),
  `active` varchar(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `image`, `create_dt`, `active`) VALUES
(1, 'Avengers Infinity War', 'Avengers', '2021-01-09 13:11:13', 'Y'),
(2, 'Wonder Woman', 'WonderWoman', '2021-01-09 13:11:13', 'Y'),
(3, 'Tenet', 'Tenet', '2021-01-09 13:11:13', 'Y'),
(4, 'Star Trek', 'Starrek', '2021-01-14 14:03:25', 'Y'),
(5, 'War', 'War', '2021-01-14 14:03:25', 'Y'),
(6, 'Lord of the Rings', 'Lord', '2021-01-14 14:03:25', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `create_dt` datetime NOT NULL DEFAULT current_timestamp(),
  `active` varchar(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`id`, `price`, `ticket_id`, `create_dt`, `active`) VALUES
(1, 700, 1, '2021-01-13 23:32:29', 'Y'),
(2, 300, 2, '2021-01-14 19:38:47', 'Y'),
(3, 300, 3, '2021-01-14 19:38:47', 'Y'),
(4, 300, 4, '2021-01-14 19:38:47', 'Y'),
(5, 300, 5, '2021-01-14 19:38:47', 'Y'),
(6, 300, 6, '2021-01-14 19:38:47', 'Y'),
(7, 300, 7, '2021-01-14 19:38:47', 'Y'),
(8, 300, 8, '2021-01-14 19:38:47', 'Y'),
(9, 300, 9, '2021-01-14 19:38:47', 'Y'),
(10, 300, 10, '2021-01-14 19:38:47', 'Y'),
(11, 300, 11, '2021-01-14 19:38:47', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `theatre_name`
--

CREATE TABLE `theatre_name` (
  `id` int(11) NOT NULL,
  `value` varchar(20) NOT NULL,
  `create_dt` datetime NOT NULL DEFAULT current_timestamp(),
  `active` varchar(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theatre_name`
--

INSERT INTO `theatre_name` (`id`, `value`, `create_dt`, `active`) VALUES
(1, 'PVR', '2021-01-13 20:50:35', 'Y'),
(2, 'carnival', '2021-01-13 20:50:35', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `movie` int(11) NOT NULL,
  `timing` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `theatre_name` int(11) NOT NULL,
  `create_dt` datetime NOT NULL DEFAULT current_timestamp(),
  `active` varchar(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `value`, `movie`, `timing`, `location`, `theatre_name`, `create_dt`, `active`) VALUES
(1, 51, 1, 1, 1, 2, '2021-01-13 23:14:24', 'Y'),
(2, 58, 3, 2, 1, 1, '2021-01-14 19:15:59', 'Y'),
(3, 58, 3, 4, 1, 1, '2021-01-14 19:15:59', 'Y'),
(4, 58, 3, 6, 1, 1, '2021-01-14 19:15:59', 'Y'),
(5, 59, 2, 1, 4, 2, '2021-01-14 19:15:59', 'Y'),
(6, 59, 2, 4, 4, 2, '2021-01-14 19:15:59', 'Y'),
(7, 59, 2, 7, 4, 1, '2021-01-14 19:15:59', 'Y'),
(8, 59, 4, 3, 7, 1, '2021-01-14 19:15:59', 'Y'),
(9, 59, 4, 5, 7, 1, '2021-01-14 19:15:59', 'Y'),
(10, 58, 6, 4, 5, 1, '2021-01-14 19:15:59', 'Y'),
(11, 59, 6, 6, 5, 1, '2021-01-14 19:15:59', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `timing`
--

CREATE TABLE `timing` (
  `id` int(11) NOT NULL,
  `timing` varchar(10) NOT NULL,
  `create_dt` datetime NOT NULL DEFAULT current_timestamp(),
  `active` varchar(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timing`
--

INSERT INTO `timing` (`id`, `timing`, `create_dt`, `active`) VALUES
(1, '9:30 am', '2021-01-13 20:49:53', 'Y'),
(2, '10:00 am', '2021-01-13 20:49:53', 'Y'),
(3, '7:00 am', '2021-01-14 16:42:02', 'Y'),
(4, '12:00 pm', '2021-01-14 16:42:02', 'Y'),
(5, '2:00 pm', '2021-01-14 16:42:02', 'Y'),
(6, '5:00 pm', '2021-01-14 16:42:02', 'Y'),
(7, '7:00 pm', '2021-01-14 16:42:02', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `movie_name` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `timing` int(11) NOT NULL,
  `theatre_name` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tickets_id` int(11) NOT NULL,
  `create_dt` datetime NOT NULL DEFAULT current_timestamp(),
  `active` varchar(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `movie_name`, `location`, `timing`, `theatre_name`, `user_id`, `tickets_id`, `create_dt`, `active`) VALUES
(1, 1, 3, 1, 1, 1, 0, '2021-01-13 20:55:47', 'Y'),
(2, 2, 4, 2, 2, 1, 0, '2021-01-13 21:09:06', 'Y'),
(3, 1, 3, 2, 2, 1, 0, '2021-01-13 23:25:04', 'Y'),
(4, 3, 4, 1, 1, 1, 0, '2021-01-13 23:27:11', 'Y'),
(5, 1, 1, 2, 1, 1, 1, '2021-01-13 23:58:13', 'Y'),
(6, 1, 1, 2, 1, 1, 1, '2021-01-14 09:56:14', 'Y'),
(7, 1, 1, 2, 1, 1, 1, '2021-01-14 09:58:47', 'Y'),
(8, 1, 1, 2, 1, 1, 1, '2021-01-14 10:00:10', 'Y'),
(9, 1, 1, 2, 1, 1, 1, '2021-01-14 10:46:41', 'Y'),
(10, 1, 1, 1, 2, 1, 1, '2021-01-14 16:40:25', 'Y'),
(11, 1, 1, 1, 2, 1, 1, '2021-01-14 18:38:29', 'Y'),
(18, 2, 4, 7, 1, 1, 7, '2021-01-14 21:45:41', 'Y'),
(19, 6, 5, 4, 1, 1, 10, '2021-01-14 22:06:11', 'Y'),
(20, 3, 1, 2, 1, 1, 2, '2021-01-15 09:01:13', 'Y'),
(21, 3, 1, 4, 1, 1, 3, '2021-01-15 12:04:55', 'Y'),
(22, 3, 1, 6, 1, 1, 4, '2021-02-05 23:24:44', 'Y');

--
-- Triggers `transaction`
--
DELIMITER $$
CREATE TRIGGER `increase_price` AFTER INSERT ON `transaction` FOR EACH ROW update pricing, tickets set price = price + 50 where NEW.tickets_id = pricing.ticket_id and pricing.ticket_id = tickets.id and (SELECT value from tickets where id = NEW.tickets_id) = 57
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `no_of_tickets` AFTER INSERT ON `transaction` FOR EACH ROW update tickets set value = value -1 where id = NEW.tickets_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `create_dt` datetime NOT NULL DEFAULT current_timestamp(),
  `active` varchar(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `create_dt`, `active`) VALUES
(1, 'Ashutosh ', 'kepler', '123456', '2021-01-14 15:30:06', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theatre_name`
--
ALTER TABLE `theatre_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timing`
--
ALTER TABLE `timing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
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
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `theatre_name`
--
ALTER TABLE `theatre_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `timing`
--
ALTER TABLE `timing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
