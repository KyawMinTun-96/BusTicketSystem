-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2023 at 04:00 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `busticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus_brand`
--

CREATE TABLE `bus_brand` (
  `id` int(11) NOT NULL,
  `bus_type` varchar(30) NOT NULL,
  `Seats` int(11) NOT NULL DEFAULT 30
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bus_brand`
--

INSERT INTO `bus_brand` (`id`, `bus_type`, `Seats`) VALUES
(1, 'Scana Bus', 30),
(2, 'Yutong Bus', 30),
(3, 'Zhongtong Bus', 30),
(4, 'Man Bus', 30),
(5, 'Volvo Bus', 30),
(6, 'Higer Bus', 30),
(7, 'Golden Dragon Bus', 30),
(8, 'King Long Bus', 30),
(9, 'Diamler Bus', 30),
(10, 'Marcopolo Bus', 30);

-- --------------------------------------------------------

--
-- Table structure for table `bus_info`
--

CREATE TABLE `bus_info` (
  `id` int(11) NOT NULL,
  `bus_name` varchar(30) NOT NULL,
  `bus_no` varchar(30) NOT NULL,
  `bus_route` varchar(50) NOT NULL,
  `company` varchar(30) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `departure_time` varchar(30) NOT NULL,
  `bus_image` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bus_info`
--

INSERT INTO `bus_info` (`id`, `bus_name`, `bus_no`, `bus_route`, `company`, `brand_id`, `departure_time`, `bus_image`, `created_date`, `updated_date`) VALUES
(1, 'Mandalar Min', 'YGN-123', '1-2', 'Mandalar Min Company', 1, '8: 51 pm', '2813983825224675856_slider_1.jpg', '2023-02-27 16:02:56', '0000-00-00 00:00:00'),
(2, 'Mandalar Min', 'YGN-124', '2-1', 'Mandalar Min Company', 6, '10: 00 am', '2813984274792902500_slider_2.jpg', '2023-02-27 16:02:10', '0000-00-00 00:00:00'),
(3, 'Mandalar Min', 'YGN-125', '1-4', 'Mandalar Min Company', 1, '8: 00 am', '2813984744491088100_slider_3.jpg', '2023-02-27 16:02:30', '0000-00-00 00:00:00'),
(4, 'Shwe Manadalay ', 'YGN-124', '1-2', 'Shwe Mandalay Company', 1, '9: 00 am', '2813995416715426441_slider_1.jpg', '2023-02-27 17:02:31', '0000-00-00 00:00:00'),
(5, 'GI Group', 'YGN-126', '1-4', 'GI Group Company', 2, '9: 00 am', '2813995614660048900_slider_2.jpg', '2023-02-27 17:02:30', '0000-00-00 00:00:00'),
(6, 'Elite', 'YGN-125', '1-4', 'Elite Company', 7, '12: 00 pm', '2814012044087982529_slider_5.jpg', '2023-02-27 19:02:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bus_location`
--

CREATE TABLE `bus_location` (
  `id` int(11) NOT NULL,
  `township` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bus_location`
--

INSERT INTO `bus_location` (`id`, `township`) VALUES
(1, 'Yangon'),
(2, 'Mawlamyine'),
(3, 'Bago'),
(4, 'NayPyiDaw'),
(5, 'Dawei'),
(6, 'Kawthoung'),
(7, 'Myeik'),
(8, 'Taton'),
(9, 'KyaikHto');

-- --------------------------------------------------------

--
-- Table structure for table `bus_reservation`
--

CREATE TABLE `bus_reservation` (
  `id` int(11) NOT NULL,
  `vou_no` varchar(30) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `date` date NOT NULL,
  `no_seats` int(11) NOT NULL,
  `seat_no` int(11) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nrc_no` varchar(30) NOT NULL,
  `remark` varchar(30) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus_brand`
--
ALTER TABLE `bus_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_info`
--
ALTER TABLE `bus_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_location`
--
ALTER TABLE `bus_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_reservation`
--
ALTER TABLE `bus_reservation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus_brand`
--
ALTER TABLE `bus_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bus_info`
--
ALTER TABLE `bus_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bus_location`
--
ALTER TABLE `bus_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bus_reservation`
--
ALTER TABLE `bus_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
