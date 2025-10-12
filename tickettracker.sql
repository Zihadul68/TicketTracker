-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2025 at 03:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tickettracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `availablebus`
--

CREATE TABLE `availablebus` (
  `id` int(11) NOT NULL,
  `time` datetime(6) NOT NULL,
  `bustype` varchar(50) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `availablebus`
--

INSERT INTO `availablebus` (`id`, `time`, `bustype`, `price`) VALUES
(1, '2025-09-08 08:00:00.000000', 'AC', 800),
(2, '2025-09-10 09:00:00.000000', 'NonAC', 500),
(3, '2025-01-15 08:00:00.541000', 'ac', 800),
(4, '2025-01-15 09:00:00.541000', 'nonac', 550),
(5, '2025-01-15 10:00:00.541000', 'ac', 800);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `busId` varchar(50) NOT NULL,
  `passengerName` varchar(100) NOT NULL,
  `bookingDate` date NOT NULL,
  `contactNumber` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `busId`, `passengerName`, `bookingDate`, `contactNumber`, `username`) VALUES
(1, '101', 'zihad', '2025-01-01', '0147852', 'bb'),
(2, '101', 'ahammed', '2025-01-02', '0112336', 'bb'),
(3, '102', 'bp', '2025-01-01', '015963', 'bishal'),
(1, '101', 'bishal', '2025-01-01', '0147852', 'bb'),
(2, '101', 'pal', '2025-01-02', '0112336', 'bb'),
(3, '102', 'bp', '2025-01-01', '015963', 'bishal');

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `busId` int(11) NOT NULL,
  `busType` varchar(100) NOT NULL,
  `startLocation` varchar(100) NOT NULL,
  `endLocation` varchar(100) NOT NULL,
  `totalSeats` int(11) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `pricePerSeat` int(11) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`busId`, `busType`, `startLocation`, `endLocation`, `totalSeats`, `startTime`, `endTime`, `pricePerSeat`, `username`) VALUES
(101, 'ac', 'dhaka', 'ctg', 30, '07:40:00', '12:00:00', 1000, 'bb'),
(102, 'nonAc', 'abc', 'asd', 30, '20:05:00', '08:05:00', 300, 'bishal'),
(103, 'nonAc', 'mirpur', 'mym', 50, '00:17:00', '13:18:00', 300, 'bishal'),
(104, 'Seater', 'khulna', 'dhaka', 50, '16:10:00', '22:16:00', 500, 'bishal'),
(105, 'Sleeper', 'Dhaka', 'Cox Bazar', 30, '21:18:00', '07:16:00', 2200, 'bishal'),
(101, 'ac', 'dhaka', 'ctg', 30, '07:40:00', '12:00:00', 1000, 'bb'),
(102, 'nonAc', 'abc', 'asd', 30, '20:05:00', '08:05:00', 300, 'bishal'),
(103, 'nonAc', 'mirpur', 'mym', 50, '00:17:00', '13:18:00', 300, 'bishal'),
(104, 'Seater', 'khulna', 'dhaka', 50, '16:10:00', '22:16:00', 500, 'bishal'),
(105, 'Sleeper', 'Dhaka', 'Cox Bazar', 30, '21:18:00', '07:16:00', 2200, 'bishal'),
(106, 'ac', 'dhaka', 'ctg', 30, '18:18:00', '22:19:00', 600, 'ahammed2'),
(107, 'ac', 'dhaka', 'ctg', 40, '14:30:00', '20:30:00', 1200, 'crseven');

-- --------------------------------------------------------

--
-- Table structure for table `bustable`
--

CREATE TABLE `bustable` (
  `busid` int(11) NOT NULL,
  `username` text NOT NULL,
  `bus_type` text NOT NULL,
  `startlocation` text NOT NULL,
  `endlocation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bustable`
--

INSERT INTO `bustable` (`busid`, `username`, `bus_type`, `startlocation`, `endlocation`) VALUES
(1, 'reni', 'nonAC', 'Savar', 'Chitagong'),
(2, 'reni', 'AC', 'Pabna', 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `earnings_summary`
--

CREATE TABLE `earnings_summary` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `busId` varchar(50) NOT NULL,
  `riders` int(11) NOT NULL,
  `grossEarnings` decimal(10,2) NOT NULL,
  `commission` decimal(10,2) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `earnings_summary`
--

INSERT INTO `earnings_summary` (`id`, `date`, `busId`, `riders`, `grossEarnings`, `commission`, `username`) VALUES
(1, '2025-01-01', '101', 25, 5000.00, 1000.00, 'bb'),
(2, '2025-01-02', '101', 30, 6000.00, 1500.00, 'bb'),
(3, '2025-01-01', '102', 20, 4000.00, 500.00, 'bishal'),
(4, '2025-01-02', '101', 25, 5000.00, 500.00, 'bb'),
(5, '2025-01-02', '102', 25, 5000.00, 500.00, 'bishal'),
(6, '2025-01-05', '102', 20, 4000.00, 500.00, 'bishal'),
(7, '2025-01-04', '103', 30, 6000.00, 1000.00, 'bishal');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `type` text NOT NULL,
  `user_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `type`, `user_type`) VALUES
(1, 'How to update profile?', 'Please click on update link on the menu', 'update_profile', 'both'),
(2, 'How to Add Buses?', 'Just Click on add bus on the menu', 'management', 'operator'),
(3, 'How to book seat', 'book seat by clicking on the seats shown on the menu', 'transaction', 'traveller'),
(4, 'How to Book Ticket', 'Just press on seat no then go for transaction', 'transaction', 'traveller'),
(5, 'How to Search For Bus?', 'Just click on Search bus link on navigation bar', 'transaction', 'both'),
(6, 'How to see Previous Earnings?', 'PRess on show earnings Tab', 'transaction', 'operator'),
(7, 'dfdf', 'dfdf', 'management', 'both'),
(8, 'testing by ZIhadul', 'working!', 'management', 'both');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `type` text NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `message`, `type`, `time`) VALUES
(3, 'zihad just registered as A Traveller', 'registration', '2025-01-04 17:40:03'),
(4, 'ahammed just registered and waiting for your approval', 'registration', '2025-01-04 18:03:44'),
(5, 'yunus just registered and waiting for your approval', 'registration', '2025-01-04 18:28:58'),
(6, 'get 20% off from each seat from 7th January to 10th January', 'offer', '2025-01-05 20:49:08'),
(7, 'bishal just registered and waiting for your approval', 'registration', '2025-01-07 22:26:24'),
(8, 'jawad just registered as A Traveller', 'registration', '2025-01-10 14:42:30'),
(9, 'aaa just registered and waiting for your approval', 'registration', '2025-01-12 19:54:29'),
(10, 'amin just registered as A Traveller', 'registration', '2025-01-12 19:58:19'),
(11, 'masud just registered as A Traveller', 'registration', '2025-01-12 20:23:00'),
(54, 'zihadulgg just registered and is waiting for approval.', 'registration', '2025-10-10 06:10:11'),
(55, 'zihadulbb just registered and is waiting for approval.', 'registration', '2025-10-10 22:39:24'),
(56, 'testing just registered as a traveller', 'registration', '2025-10-11 20:55:05'),
(57, 'crseven just registered and is waiting for approval.', 'registration', '2025-10-12 00:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `notification_status`
--

CREATE TABLE `notification_status` (
  `id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `status` text NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification_status`
--

INSERT INTO `notification_status` (`id`, `notification_id`, `username`, `status`, `time`) VALUES
(8, 3, 'zihad', 'unread', '2025-01-04 17:40:03'),
(10, 3, 'ahammed', 'unread', '2025-01-04 17:40:03'),
(11, 3, 'marjia', 'unread', '2025-01-04 17:40:03'),
(12, 3, 'najmu', 'unread', '2025-01-04 17:40:03'),
(13, 4, 'shamim', 'unread', '2025-01-04 18:03:44'),
(14, 4, 'masum', 'unread', '2025-01-04 18:03:44'),
(16, 4, 'maria', 'unread', '2025-01-04 18:03:44'),
(17, 4, 'marjia', 'unread', '2025-01-04 18:03:44'),
(18, 4, 'najmu', 'unread', '2025-01-04 18:03:44'),
(19, 4, 'reesan', 'unread', '2025-01-04 18:03:44'),
(574, 56, 'zihadul', 'unread', '2025-10-11 20:55:05'),
(575, 56, 'ahammed', 'unread', '2025-10-11 20:55:05'),
(576, 56, 'raihan', 'unread', '2025-10-11 20:55:05'),
(577, 56, 'tanvir', 'unread', '2025-10-11 20:55:05'),
(578, 56, 'shuvo', 'unread', '2025-10-11 20:55:05'),
(579, 56, 'masuma', 'unread', '2025-10-11 20:55:05'),
(580, 56, 'maria', 'unread', '2025-10-11 20:55:05'),
(581, 56, 'marjia', 'unread', '2025-10-11 20:55:05'),
(582, 56, 'fahim', 'unread', '2025-10-11 20:55:05'),
(583, 56, 'sakib', 'unread', '2025-10-11 20:55:05'),
(584, 56, 'reesan', 'unread', '2025-10-11 20:55:05'),
(585, 56, 'yunus', 'unread', '2025-10-11 20:55:05'),
(586, 56, 'raquib', 'unread', '2025-10-11 20:55:05'),
(587, 56, 'azwad', 'unread', '2025-10-11 20:55:05'),
(588, 56, 'samin', 'unread', '2025-10-11 20:55:05'),
(589, 56, 'bangla', 'unread', '2025-10-11 20:55:05'),
(590, 56, 'sami', 'unread', '2025-10-11 20:55:05'),
(591, 57, 'zihadul', 'unread', '2025-10-12 00:28:32'),
(592, 57, 'ahammed', 'unread', '2025-10-12 00:28:32'),
(593, 57, 'raihan', 'unread', '2025-10-12 00:28:32'),
(594, 57, 'tanvir', 'unread', '2025-10-12 00:28:32'),
(595, 57, 'shuvo', 'unread', '2025-10-12 00:28:32'),
(596, 57, 'masuma', 'unread', '2025-10-12 00:28:32'),
(597, 57, 'maria', 'unread', '2025-10-12 00:28:32'),
(598, 57, 'marjia', 'unread', '2025-10-12 00:28:32'),
(599, 57, 'fahim', 'unread', '2025-10-12 00:28:32'),
(600, 57, 'sakib', 'unread', '2025-10-12 00:28:32'),
(601, 57, 'reesan', 'unread', '2025-10-12 00:28:32'),
(602, 57, 'yunus', 'unread', '2025-10-12 00:28:32'),
(603, 57, 'raquib', 'unread', '2025-10-12 00:28:32'),
(604, 57, 'azwad', 'unread', '2025-10-12 00:28:32'),
(605, 57, 'samin', 'unread', '2025-10-12 00:28:32'),
(606, 57, 'bangla', 'unread', '2025-10-12 00:28:32'),
(607, 57, 'sami', 'unread', '2025-10-12 00:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `refunds`
--

CREATE TABLE `refunds` (
  `refund_policy` text NOT NULL,
  `amount` float NOT NULL,
  `deduct_percentage` float NOT NULL,
  `refund_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `refunds`
--

INSERT INTO `refunds` (`refund_policy`, `amount`, `deduct_percentage`, `refund_amount`) VALUES
('Refund cannot be accepted before 1 day of bus departure!', 100, 10, 90),
('Refund cannot be accepted before 1 day of bus departure!', 111, 10, 99.9),
('Refund cannot be accepted before 1 day of bus departure!', 1000, 10, 900),
('Refund cannot be accepted before 1 day of bus departure!', 1000, 10, 900),
('Refund cannot be accepted before 1 day of bus departure!', 100, 10, 90),
('Refund cannot be accepted before 1 day of bus departure!', 100, 10, 90),
('Refund cannot be accepted before 1 day of bus departure!', 1000, 10, 900),
('Refund cannot be accepted before 1 day of bus departure!', 1000, 10, 900),
('Refund cannot be accepted before 1 day of bus departure!', 1200, 10, 1080),
('Refund cannot be accepted before 1 day of bus departure!', 400, 10, 360),
('Refund cannot be accepted before 1 day of bus departure!', 0, 10, 0),
('Refund cannot be accepted before 1 day of bus departure!', 1000, 10, 900),
('Refund cannot be accepted before 1 day of bus departure!', 10, 10, 9),
('Refund cannot be accepted before 1 day of bus departure!', 10, 10, 9),
('Refund cannot be accepted before 1 day of bus departure!', 10, 10, 9),
('Refund cannot be accepted before 1 day of bus departure!', 10, 10, 9),
('Refund cannot be accepted before 1 day of bus departure!', 10, 10, 9),
('Refund cannot be accepted before 1 day of bus departure!', 10000, 10, 9000),
('Refund cannot be accepted before 1 day of bus departure!', 500, 10, 450);

-- --------------------------------------------------------

--
-- Table structure for table `search_bus_route`
--

CREATE TABLE `search_bus_route` (
  `Pickup_Location` text NOT NULL,
  `Destination_location` text NOT NULL,
  `Bus_Class` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `search_bus_route`
--

INSERT INTO `search_bus_route` (`Pickup_Location`, `Destination_location`, `Bus_Class`) VALUES
('Dhaka', 'Dhaka', 'Ac_Business'),
('Dhaka', 'Dhaka', 'Ac_Business'),
('Dhaka', 'Dhaka', 'Ac_Business'),
('Dhaka', 'Dhaka', 'Ac_Business'),
('Coxbazar', 'Dhaka', 'Ac_Sleeper'),
('Dhaka', 'Dhaka', 'Ac_Business'),
('Chittagong', 'Coxbazar', 'Ac_Sleeper'),
('Dhaka', 'Dhaka', 'Ac_Business'),
('Dhaka', 'Dhaka', 'Ac_Business'),
('Dhaka', 'Dhaka', 'Ac_Business'),
('Dhaka', 'Dhaka', 'Ac_Business'),
('dhaka', 'Cox Bazar', 'Ac_Sleeper'),
('dhaka', 'Cox Bazar', 'Ac_Business'),
('dhaka', 'Cox Bazar', 'Ac_Business'),
('Cox Bazar', 'dhaka', 'Ac_Sleeper'),
('dhaka', 'Cox Bazar', 'Ac_Business'),
('dhaka', 'ctg', 'Ac_Business'),
('dhaka', 'Sylhet', 'Ac_Business'),
('dhaka', 'Cox Bazar', 'Ac_Seater'),
('dhaka', 'Cox Bazar', 'Ac_Sleeper'),
('dhaka', 'Cox Bazar', 'Ac_Sleeper'),
('ctg', 'mym', 'Ac_Business'),
('ctg', 'Sylhet', 'Ac_Sleeper'),
('ctg', 'Sylhet', 'Ac_Seater'),
('ctg', 'Sylhet', 'Ac_Seater'),
('Cox Bazar', 'ctg', 'Ac_Sleeper');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `ticket_quantity` text NOT NULL,
  `ticket_price` text NOT NULL,
  `seat_numbers` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`ticket_quantity`, `ticket_price`, `seat_numbers`) VALUES
('2', '1000', '1,2'),
('0', '0', ''),
('0', '0', ''),
('2', '1000', '1,6'),
('2', '1000', '1,6'),
('1', '500', '1'),
('4', '2000', '39,19,14,22'),
('4', '2000', '1,2,40,39'),
('4', '2000', '17,18,20,28'),
('2', '1000', '15,20'),
('2', '1000', '35,36'),
('2', '1000', '14,15'),
('3', '1500', '3,11,15'),
('0', '0', ''),
('0', '0', ''),
('0', '0', ''),
('3', '1500', '19,10,18'),
('1', '500', '19'),
('2', '1000', '19,20'),
('3', '1500', '19,16,24'),
('1', '500', '22'),
('3', '1500', '10,14,18'),
('3', '1500', '3,2,4'),
('0', '0', ''),
('3', '1500', '14,15,16'),
('1', '500', '7'),
('3', '1500', '16,15,14'),
('2', '1000', '4,3'),
('2', '1000', '11,12');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `fullname` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `dob` text NOT NULL,
  `password` text NOT NULL,
  `security_question` text NOT NULL,
  `security_answer` text NOT NULL,
  `user_type` text NOT NULL,
  `is_approved` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `username`, `fullname`, `email`, `phone`, `dob`, `password`, `security_question`, `security_answer`, `user_type`, `is_approved`) VALUES
(1, 'zihadul', 'Zihadul Islam', 'zihadul@gmail.com', '01710000005', '2002-05-15', 'Zihadul@123', 'first_pet', 'dog', 'admin', 1),
(2, 'ahammed', 'Ahammed Ullah', 'ahammed@gmail.com', '01710000002', '2002-08-20', 'Ahammed@123', 'favorite_color', 'blue', 'admin', 1),
(3, 'raihan', 'Raihan Hossain', 'raihan@gmail.com', '01711112222', '2000-02-10', 'Raihan@123', 'first_pet', 'cat', 'admin', 1),
(4, 'tanvir', 'Tanvir Ahmed', 'tanvir@gmail.com', '01711113333', '2001-03-12', 'Tanvir@123', 'favorite_teacher', 'mr.khan', 'admin', 1),
(5, 'shuvo', 'Shuvo Das', 'shuvo@gmail.com', '01711114444', '1999-01-25', 'Shuvo@123', 'first_pet', 'parrot', 'admin', 1),
(6, 'masuma', 'Ashqiue Masuma', 'masuma@gmail.com', '01733091241', '1992-12-23', 'Masuma@123', 'first_pet', 'cat', 'admin', 1),
(7, 'rakib', 'Rakib Islam', 'rakib@gmail.com', '01711115555', '2002-06-14', 'Rakib@123', 'favorite_food', 'biriyani', 'traveller', 1),
(8, 'nabila', 'Nabila Karim', 'nabila@gmail.com', '01711116666', '2001-09-20', 'Nabila@123', 'first_pet', 'dog', 'traveller', 1),
(9, 'maria', 'Maria Nawar', 'maria@gmail.com', '01703330193', '1995-01-04', 'Maria@123', 'sports', 'f1', 'admin', 1),
(10, 'marjia', 'Marjia Khatun', 'marjia@gmail.com', '01703330187', '2000-01-04', 'Marjia@2000', 'sports', 'f1', 'admin', 1),
(11, 'fahim', 'Fahim Hasan', 'fahim@gmail.com', '01711117777', '2003-03-22', 'Fahim@123', 'first_pet', 'cat', 'admin', 1),
(12, 'sakib', 'Sakib Chowdhury', 'sakib@gmail.com', '01711118888', '2002-07-19', 'Sakib@123', 'favorite_color', 'green', 'admin', 1),
(13, 'reesan', 'Reesan Ahmed', 'reesan@gmail.com', '01703330189', '2025-01-07', 'Reesan@123', 'first_pet', 'cat', 'admin', 1),
(14, 'yunus', 'Yunus Ali', 'yunus@gmail.com', '01712919298', '2000-01-05', 'Yunus@123', 'first_pet', 'cat', 'admin', 1),
(15, 'raquib', 'Raquib Hossain', 'raquib@gmail.com', '01711119999', '2001-11-11', 'Raquib@123', 'favorite_teacher', 'mr.haque', 'admin', 1),
(16, 'jawad', 'Jawad Karim', 'jawad@gmail.com', '01703330184', '2012-01-01', 'Jawad@123', 'sports', 'f1', 'traveller', 1),
(17, 'amin', 'Amin Chowdhury', 'amin@gmail.com', '01703330173', '2011-12-07', 'Amin@123', 'sports', 'f1', 'traveller', 1),
(18, 'azwad', 'Azwad Islam', 'azwad@gmail.com', '01824502912', '2007-01-17', 'Azwad@123', 'first_pet', 'cat', 'admin', 1),
(19, 'samin', 'Samin Ahmed', 'samin@gmail.com', '01987654234', '2008-01-09', 'Samin@123', 'sports', 'f1', 'admin', 1),
(20, 'bangla', 'Bangla Rahman', 'bangla@gmail.com', '01709876543', '2008-01-02', 'Bangla@123', 'first_pet', 'cat', 'admin', 1),
(21, 'sami', 'Sami Hassan', 'sami@gmail.com', '01987659043', '1999-01-06', 'Sami@123', 'sports', 'f1', 'admin', 1),
(24, 'ahammed2', 'Ahammed', 'ahammed@gmail.com', '01712345678', '1995-06-20', 'Ahammed@1234', 'favorite_color?', 'Blue', 'operator', 1),
(25, 'testing', 'blabla', 'labla@gmail.com', '01723456789', '2007-06-07', 'Testing@12345', 'sports', 'football', 'traveller', 1),
(26, 'crseven', 'Ronaldo', 'ron@gmail.com', '01612345678', '2004-02-11', 'Ron@1234', 'sports', 'football', 'operator', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `availablebus`
--
ALTER TABLE `availablebus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `earnings_summary`
--
ALTER TABLE `earnings_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_status`
--
ALTER TABLE `notification_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `availablebus`
--
ALTER TABLE `availablebus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `earnings_summary`
--
ALTER TABLE `earnings_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `notification_status`
--
ALTER TABLE `notification_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=608;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
