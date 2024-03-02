-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2023 at 08:20 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `white_pearl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$4yCOEuBOXpWycMDoxGi4J.rEizYRW/SA1xtRgAYFQC/rsFl.6zPqO');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `blog_date` varchar(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `blog_date`, `image`, `message`) VALUES
(1, 'Blog 1', '2023-02-05', '10720211451687261553.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker includingLorem Ipsum is simply dummy text of the printing and typesetting industry. '),
(2, 'Blog 2', '2023-02-20', '12768167501687261581.jpeg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker includingLorem Ipsum is simply dummy text of the printing and typesetting industry. '),
(3, 'Blog 3', '2023-05-24', '66623771687261591.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker includingLorem Ipsum is simply dummy text of the printing and typesetting industry.');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `message` longtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dining`
--

CREATE TABLE `dining` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `feature` mediumtext NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `image`, `feature`, `description`) VALUES
(2, 'WEDDING', '1225392221689921330.jpg', 'AC,Parking,Stage,Room', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(3, 'Birthday', '8657197581689921528.jpg', 'AC,Stage,Room,Wifi', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `image`) VALUES
(1, 'Image 1', '20419632351687257816.jpeg'),
(2, 'Image 2', '5419929321687257838.jpeg'),
(3, 'Image 3', '19812356321687257858.jpeg'),
(5, 'Image 4', '21165706281687258039.jpeg'),
(6, 'Image 5', '6740920401687258132.jpeg'),
(7, 'Image 6', '19253354731687258114.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `rate` varchar(100) NOT NULL,
  `no_of_room` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `ac` tinyint(4) NOT NULL DEFAULT 0,
  `wifi` tinyint(4) NOT NULL DEFAULT 0,
  `hair_dryer` tinyint(4) NOT NULL DEFAULT 0,
  `breakfast` tinyint(4) NOT NULL DEFAULT 0,
  `laundry` tinyint(4) NOT NULL DEFAULT 0,
  `ro_water` tinyint(4) NOT NULL DEFAULT 0,
  `feature` mediumtext NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `title`, `rate`, `no_of_room`, `image`, `ac`, `wifi`, `hair_dryer`, `breakfast`, `laundry`, `ro_water`, `feature`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Deluxe Room (Single Bedroom)', '2100', '3', '18852232491687771576.jpeg', 0, 0, 0, 1, 0, 0, 'AC,Wifi,Hair Dryer', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-06-26 06:52:39', '2023-06-27 11:39:35'),
(2, 'Deluxe Room (Double Bedroom)', '3200', '0', '11480425991687762522.jpeg', 0, 0, 0, 0, 0, 0, 'AC,Wifi,Hair Dryer,Laundry,RO Water', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-06-26 06:55:22', '2023-07-12 05:04:37'),
(3, 'Regular Room (Single Bedroom)', '1700', '5', '8768065801687762704.jpeg', 0, 0, 0, 1, 1, 0, 'AC,Wifi,Hair Dryer,RO Water', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-06-26 06:58:24', '2023-06-26 07:05:09'),
(4, 'Regular Room (Double Bedroom)', '2500', '5', '2210005951687771627.jpeg', 0, 0, 0, 1, 1, 0, 'AC,Wifi,Hair Dryer,RO Water', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-06-26 07:00:06', '2023-06-26 09:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `room_booked`
--

CREATE TABLE `room_booked` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `check_in` varchar(50) NOT NULL,
  `check_out` varchar(50) NOT NULL,
  `adult` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `no_of_room` int(11) NOT NULL,
  `price` varchar(1000) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `booked_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_booked`
--

INSERT INTO `room_booked` (`id`, `room_id`, `name`, `contact_no`, `email`, `check_in`, `check_out`, `adult`, `child`, `no_of_room`, `price`, `status`, `booked_on`, `update_at`) VALUES
(1, 2, 'Deepak', '9876542130', 'deepak@gmail.com', '2023-06-27', '2023-06-30', 1, 2, 3, '9600', 0, '2023-06-27 11:30:04', NULL),
(2, 1, 'Ajay', '98754645321', 'ajay@gmail.com', '2023-06-28', '2023-06-30', 2, 1, 2, '4200', 0, '2023-06-27 11:39:35', NULL),
(3, 2, 'Rahul', '7986543212', 'rahul@gmail.com', '2023-07-12', '2023-07-20', 1, 1, 2, '3200', 0, '2023-07-12 05:04:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room_gallery`
--

CREATE TABLE `room_gallery` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_gallery`
--

INSERT INTO `room_gallery` (`id`, `room_id`, `title`, `image`) VALUES
(1, 1, 'Image 1', 'Img-11918937381687771245.jpeg'),
(2, 1, 'Image 2', 'Img-14441805371687771263.jpeg'),
(3, 1, 'Image 3', 'Img-11278759791687771278.jpeg'),
(4, 2, 'Image 1', 'Img-11949545591687771292.jpeg'),
(5, 2, 'Image 2', 'Img-3013189031687771308.jpeg'),
(6, 2, 'Image 3', 'Img-2176940501687771315.jpeg'),
(7, 3, 'Image 1', 'Img-3200022681687771364.jpeg'),
(8, 3, 'Image 2', 'Img-16296278401687771378.jpeg'),
(9, 3, 'Image 3', 'Img-4947511391687771390.jpeg'),
(10, 4, 'Image 1', 'Img-17117939091687771403.jpeg'),
(11, 4, 'Image 1', 'Img-19161436531687771446.jpeg'),
(12, 4, 'Image 2', 'Img-13758843461687771455.jpeg'),
(13, 4, 'Image 3', 'Img-7447202551687771465.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `title`, `image`) VALUES
(1, 'Luxury Room', '19534036001685184180.png'),
(2, 'Best Accommodation', '12056271671685184211.png'),
(3, 'Wellness & Spa', '3887603281685184226.png'),
(4, 'Restaurants & Bars', '358425111685184240.png'),
(5, 'Meeting Space', '13609792591685184620.png'),
(6, 'Conference Room', '9404981721685184658.png'),
(7, '24/7 Security', '13280176331685184987.png'),
(8, 'Parking', '7658080001685185010.png'),
(9, '24/7 Front Office', '18365886511685185038.png'),
(10, 'Free WI-FI', '16570846721685185140.png'),
(11, 'Hair Dryer', '14997885831685185370.png'),
(12, '24/7 Hot & Cold Water', '7886824741685185428.png'),
(13, 'Breakfast', '7796894931685187024.png'),
(14, 'RO water Purifier', '2780996681685187075.png'),
(15, 'Laundry', '17371280181685187110.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dining`
--
ALTER TABLE `dining`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_booked`
--
ALTER TABLE `room_booked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_gallery`
--
ALTER TABLE `room_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dining`
--
ALTER TABLE `dining`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_booked`
--
ALTER TABLE `room_booked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room_gallery`
--
ALTER TABLE `room_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
