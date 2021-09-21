-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2020 at 05:45 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_password` varchar(15) NOT NULL,
  `admin_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(10) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `seat_type` varchar(30) NOT NULL,
  `show_id` int(10) NOT NULL,
  `mov_id` int(10) NOT NULL,
  `show_date` date NOT NULL,
  `total_no_ticket` int(10) NOT NULL,
  `screen_id` int(10) NOT NULL,
  `booking_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `cust_id`, `seat_type`, `show_id`, `mov_id`, `show_date`, `total_no_ticket`, `screen_id`, `booking_date`) VALUES
(5, 1, 'Premiun', 1, 1, '2020-12-19', 1, 1, '2020-12-18 19:10:07');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `user_name` varchar(15) NOT NULL,
  `user_mobno` bigint(10) NOT NULL,
  `user_email` varchar(15) NOT NULL,
  `user_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(10) NOT NULL,
  `cust_fname` varchar(10) NOT NULL,
  `cust_city` varchar(10) NOT NULL,
  `cust_pincode` bigint(6) NOT NULL,
  `cust_email` varchar(30) NOT NULL,
  `cust_mobno` bigint(10) NOT NULL,
  `cust_password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_fname`, `cust_city`, `cust_pincode`, `cust_email`, `cust_mobno`, `cust_password`) VALUES
(1, 'netra', 'pune', 411043, 'abc@gmail.com', 98765432, '123');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `mov_id` int(10) NOT NULL,
  `mov_name` varchar(30) NOT NULL,
  `mov_lang` varchar(15) NOT NULL,
  `mov_cast` varchar(50) NOT NULL,
  `mov_director` varchar(30) NOT NULL,
  `mov_musician` varchar(50) NOT NULL,
  `mov_release_date` date NOT NULL,
  `mov_trailer` varchar(255) NOT NULL,
  `mov_desc` varchar(255) NOT NULL,
  `mov_img` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`mov_id`, `mov_name`, `mov_lang`, `mov_cast`, `mov_director`, `mov_musician`, `mov_release_date`, `mov_trailer`, `mov_desc`, `mov_img`) VALUES
(1, 'Kesari', 'Hindi', 'Akshay Kumar ,Parineeti Chopra', 'Anurag Singh', 'Jasleen Royal', '2021-01-15', '<iframe width=\"350\" height=\"250\" src=\"https://www.youtube.com/embed/VQrYS_hHdPc\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'KESARI is based on the true story of one of the bravest battles that India ever fought -- the Battle of Saragarhi.', '1.jpg'),
(2, 'Happy New Year', 'Hindi', 'Shah Rukh Khan,Deepika Padukone', ' Farah Khan', 'Vishal-Shekhar', '2021-01-15', '<iframe width=\"350\" height=\"250\" src=\"https://www.youtube.com/embed/u0mrzMQJMQ8\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Happy New Year is built around 5 disparate characters who are fighting a most unlikely battle.. a battle of international proportions.. but it’s a battle being fought on a dance floor.', '2.jpg'),
(3, 'Kick', 'Hindi', 'Salman Khan, Jacqueline Fernandez ', 'Sajid Nadiadwala', ' Julius Packiam', '2021-01-15', '<iframe width=\"350\" height=\"250\" src=\"https://www.youtube.com/embed/u-j1nx_HY5o\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'The hero of the story,played by Salman Khan, is an eccentric genius who likes an adrenaline rush - \"Kick\". He first finds love a \"Kick\". However, when his love demands he get a job and make money to provide only for her.', '3.jpg'),
(4, 'Dhoom 4', 'Hindi', 'Hrithik Roshan,Abhishek Bachchan,Aishwarya Rai ', 'Sanjay Gadhvi', 'Pritam', '2021-01-15', '<iframe width=\"350\" height=\"250\" src=\"https://www.youtube.com/embed/QotH4xVu0SI\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Mr A, a fearless thief, steals valuable artefacts and teams up with the girl he is attracted to but who cannot be trusted. Close on their heels are three police officers trying to apprehend them.', '4.jpg'),
(5, 'Dabangg 3', 'Hindi', 'Salman Khan,Sonakshi Sinha ', ' Prabhu Deva', 'Divya Kumar, Shabab Sabri, Sajid Khan', '2021-01-15', '<iframe width=\"350\" height=\"250\" src=\"https://www.youtube.com/embed/-AJ7cLi1Jfk\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Dabangg 3 is high-voltage tongue-in-cheek story of famous cop,Chulbul Pandey, an Uttar Pradesh cop who calls himself Robin Hood Pandey. Things take an unexpected turn when his past comes to haunt him as the face of the main antagonist of the film,Balli.', '5.jpg'),
(6, 'Stuart Little', 'English', ' Michael J. Fox, Geena Davis, Hugh Laurie ', 'Rob Minkoff', 'Lyle Lovett', '2021-01-15', '<iframe width=\"350\" height=\"250\" src=\"https://www.youtube.com/embed/Wlo-sYrADlw\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Stuart Little is an English professional golfer who played on the European Tour. ', '6.jpg'),
(7, 'Sairat', 'Marathi', ' Rinku Rajguru,Akash Thosar', 'Nagraj Manjule', ' Ajay−Atul', '2021-01-15', '<iframe width=\"350\" height=\"250\" src=\"https://www.youtube.com/embed/AQ-P5RR7r40\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Sairat is a love story, as advertised. Aarchi, a rich upper class girl falls for her classmate Parshya, a poor but smart boy from lower social strata.The magic happens, and they start seeing each other.', '7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(10) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `booking_id` int(10) NOT NULL,
  `card_no` bigint(20) NOT NULL,
  `card_name` varchar(50) NOT NULL,
  `card_expiry` year(4) NOT NULL,
  `card_cvv` int(10) NOT NULL,
  `pay_date` datetime NOT NULL DEFAULT current_timestamp(),
  `total_amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `cust_id`, `booking_id`, `card_no`, `card_name`, `card_expiry`, `card_cvv`, `pay_date`, `total_amount`) VALUES
(3, 1, 6, 123, 'netra', 0000, 123, '2020-12-18 21:03:32', 150);

-- --------------------------------------------------------

--
-- Table structure for table `screen`
--

CREATE TABLE `screen` (
  `screen_id` int(10) NOT NULL,
  `capacity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `screen`
--

INSERT INTO `screen` (`screen_id`, `capacity`) VALUES
(1, 120),
(2, 120),
(3, 120);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `seat_type` varchar(15) NOT NULL,
  `no_of_seats` int(10) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`seat_type`, `no_of_seats`, `price`) VALUES
('gold', 60, 150),
('Premium', 90, 180),
('silver', 90, 120);

-- --------------------------------------------------------

--
-- Table structure for table `showw`
--

CREATE TABLE `showw` (
  `show_id` int(10) NOT NULL,
  `show_type` varchar(15) NOT NULL,
  `mov_id` int(10) NOT NULL,
  `screen_id` int(10) NOT NULL,
  `theatre_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `showw`
--

INSERT INTO `showw` (`show_id`, `show_type`, `mov_id`, `screen_id`, `theatre_id`) VALUES
(1, 'morning', 1, 1, 1),
(2, 'evening', 2, 1, 2),
(3, 'afternoon', 3, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `theatre`
--

CREATE TABLE `theatre` (
  `theatre_id` int(10) NOT NULL,
  `theatre_name` varchar(20) NOT NULL,
  `theatre_location` varchar(30) NOT NULL,
  `no_of_screen` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theatre`
--

INSERT INTO `theatre` (`theatre_id`, `theatre_name`, `theatre_location`, `no_of_screen`) VALUES
(1, 'Inox', 'koregoan park', 4),
(2, 'city pride', 'bibvewadi', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `show_id` (`show_id`),
  ADD KEY `screen_id` (`screen_id`),
  ADD KEY `cust_id` (`cust_id`) USING BTREE;

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `cust_email` (`cust_email`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`mov_id`),
  ADD UNIQUE KEY `mov_name` (`mov_name`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `screen`
--
ALTER TABLE `screen`
  ADD PRIMARY KEY (`screen_id`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`seat_type`);

--
-- Indexes for table `showw`
--
ALTER TABLE `showw`
  ADD PRIMARY KEY (`show_id`),
  ADD KEY `mov_id` (`mov_id`),
  ADD KEY `screen_id` (`screen_id`),
  ADD KEY `theatre_id` (`theatre_id`);

--
-- Indexes for table `theatre`
--
ALTER TABLE `theatre`
  ADD PRIMARY KEY (`theatre_id`),
  ADD UNIQUE KEY `theatre_name` (`theatre_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `mov_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `screen`
--
ALTER TABLE `screen`
  MODIFY `screen_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `showw`
--
ALTER TABLE `showw`
  MODIFY `show_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `theatre`
--
ALTER TABLE `theatre`
  MODIFY `theatre_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`show_id`) REFERENCES `showw` (`show_id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`screen_id`) REFERENCES `screen` (`screen_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`);

--
-- Constraints for table `showw`
--
ALTER TABLE `showw`
  ADD CONSTRAINT `showw_ibfk_1` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`),
  ADD CONSTRAINT `showw_ibfk_2` FOREIGN KEY (`screen_id`) REFERENCES `screen` (`screen_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
