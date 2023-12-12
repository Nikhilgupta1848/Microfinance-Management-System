-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 02:45 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mims`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_number` int(10) NOT NULL,
  `customer` int(10) NOT NULL,
  `account_type` int(10) NOT NULL,
  `open_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `account_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Account for customera';

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_number`, `customer`, `account_type`, `open_date`, `account_status`) VALUES
(6668767, 214837647, 190079428, '2021-06-02 17:38:37', 970285287),
(9794382, 652294777, 190079428, '2021-06-03 11:28:00', 970285287),
(14748647, 214837647, 473389497, '2021-06-03 11:26:00', 122231081),
(21474647, 2103801962, 473389497, '2021-06-03 12:14:53', 122231081),
(21483647, 2114781796, 995277203, '2021-06-03 12:04:28', 122231081),
(21743647, 652294777, 122223886, '2021-06-03 12:04:11', 970285287),
(24748364, 719816620, 190079428, '2021-06-03 11:26:20', 122231081),
(178646591, 719816620, 190079428, '2021-06-03 12:15:10', 122231081),
(317123656, 503532354, 125882874, '2021-06-03 12:08:15', 970285287),
(447945741, 214837647, 125882874, '2021-06-03 11:22:12', 122231081),
(558563656, 1953700997, 61623305, '2021-06-03 12:07:53', 970285287),
(697684656, 719816620, 61623305, '2021-06-03 12:10:03', 122231081),
(791721518, 1227157149, 190079428, '2021-06-03 12:15:32', 122231081),
(906646656, 652294777, 190079428, '2021-06-03 12:11:09', 970285287),
(2147483647, 1227157149, 47190642, '2021-06-03 12:14:58', 970285287);

-- --------------------------------------------------------

--
-- Table structure for table `account_status`
--

CREATE TABLE `account_status` (
  `account_status_number` int(10) NOT NULL,
  `account_status_name` varchar(50) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_status`
--

INSERT INTO `account_status` (`account_status_number`, `account_status_name`, `registration_date`) VALUES
(122231081, 'Active', '2021-06-02 17:31:48'),
(970285287, 'Not active', '2021-06-02 17:38:14');

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `account_type_number` int(10) NOT NULL,
  `account_type_name` varchar(50) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`account_type_number`, `account_type_name`, `registration_date`) VALUES
(33127935, 'Trustees account', '2021-06-02 11:53:31'),
(47190642, 'Clubs account', '2021-06-02 11:57:05'),
(61623305, 'Wezesha account', '2021-06-02 11:57:46'),
(122223886, 'Personal account', '2021-06-02 11:52:49'),
(125882874, 'Business account', '2021-06-02 13:02:03'),
(190079428, 'Association account', '2021-06-02 11:52:49'),
(326509998, 'Nalea account', '2021-06-02 11:57:19'),
(473389497, 'Joint account ', '2021-06-02 11:52:49'),
(504877897, 'Fixed account', '2021-06-02 13:04:42'),
(821568250, 'Malengo account', '2021-06-02 13:29:18'),
(863314351, 'Wekeza account', '2021-06-02 11:57:29'),
(893485728, 'Company account', '2021-06-02 11:52:49'),
(925138552, 'Partnership account', '2021-06-02 11:52:49'),
(995277203, 'Checkbook account', '2021-06-02 11:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_number` int(10) NOT NULL,
  `customer_type` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) NOT NULL,
  `gender` char(1) NOT NULL,
  `date_of_birth` date NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_number`, `customer_type`, `first_name`, `middle_name`, `surname`, `gender`, `date_of_birth`, `nationality`, `registration_date`) VALUES
(214837647, 14465108, 'Adam', 'Bathromeo', 'Chengula', 'M', '2021-06-10', 'Tanzanian', '2021-06-01 18:18:04'),
(271369643, 14465108, 'Adam', 'Bathromeo', 'Chengula', 'M', '2021-06-26', 'Kenyan', '2021-06-02 13:06:40'),
(503532354, 14465108, 'Amani', 'Geofrey', 'Nyagawa', 'M', '2021-06-30', 'Ugandan', '2021-06-01 18:03:32'),
(652294777, 14465108, 'Hakunaga', 'Mikwajuni', 'Mbuyuni', 'M', '1995-06-17', 'Kenyan', '2021-06-02 09:02:49'),
(719816620, 143714470, 'Wito', 'Andombwisye', 'Mwaijande', 'M', '2021-06-17', 'Tanzanian', '2021-06-02 10:18:27'),
(754954598, 14465108, 'Adam', 'Bathromeo', 'Chengula', 'M', '2021-06-29', 'Tanzanian', '2021-06-01 18:18:52'),
(772984837, 14465108, 'Zainabu', 'James', 'Billo', 'F', '2021-06-18', 'Tanzanian', '2021-06-02 08:59:55'),
(1227157149, 149288525, 'Dickson', 'Mizengo ', 'Emanuel', 'M', '2021-06-26', 'Ugandan', '2021-06-01 17:57:55'),
(1953700997, 149288525, 'Jennifer', 'Makame', 'Msigwa', 'F', '2021-06-26', 'Ugandan', '2021-06-02 09:57:32'),
(2016271357, 913954736, 'Adam', 'Bathromeo', 'Chengula', 'M', '2020-10-02', 'Kenyan', '2021-06-01 17:39:39'),
(2103801962, 14465108, 'Lumuli', 'Akanaz', 'Mwakalindile', 'F', '1999-06-10', 'Tanzanian', '2021-06-02 09:03:32'),
(2114781796, 143714470, 'Beatrice', 'jailos', 'Ngulo', 'F', '2021-06-10', 'Tanzanian', '2021-06-01 18:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `customers_type`
--

CREATE TABLE `customers_type` (
  `customer_type_number` int(10) NOT NULL,
  `customer_type_name` varchar(50) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers_type`
--

INSERT INTO `customers_type` (`customer_type_number`, `customer_type_name`, `registration_date`) VALUES
(14465108, 'J:SCXNCKXJC:X', '2021-06-01 14:10:38'),
(22673397, 'Dar-es-salaam', '2021-05-31 13:41:57'),
(49235814, 'audsijalscxuhja', '2021-06-01 14:10:22'),
(143714470, 'Lumbaki ', '2021-05-31 12:57:43'),
(148793511, 'Mwanachuo', '2021-05-31 13:04:37'),
(149288525, 'Zanzibar', '2021-05-31 13:15:20'),
(183805031, 'jashcxcoakjxzckjcjc', '2021-06-01 14:10:31'),
(210871702, 'Njombe', '2021-05-31 13:14:40'),
(213053764, 'Tunaenda', '2021-05-31 18:32:26'),
(215637230, 'ggg', '2021-06-01 14:10:02'),
(289817631, 'Mkulungwa', '2021-06-01 14:16:32'),
(293494888, 'Wakuja', '2021-05-31 17:55:35'),
(331014697, 'Iringa', '2021-05-31 13:14:22'),
(334483100, 'Unguja', '2021-05-31 13:15:07'),
(336523669, 'Mbozi', '2021-05-31 13:15:26'),
(382752290, 'Njombe', '2021-05-31 13:15:31'),
(385005234, 'uewdioujaskjc', '2021-06-01 14:10:06'),
(399330910, ';lncxzNcx;LKJCX', '2021-06-01 14:10:42'),
(431165718, 'uaudijdasijcxk', '2021-06-01 14:10:14'),
(457685448, 'Mkomboch', '2021-05-31 17:02:05'),
(477521754, 'oIJCX;KJ', '2021-06-01 14:10:46'),
(483704940, 'Amazo', '2021-05-31 13:40:06'),
(518009210, 'Wekeza', '2021-05-31 18:32:33'),
(536982379, 'Children ', '2021-05-31 13:05:21'),
(537115347, 'Partnership customer', '2021-05-29 06:18:38'),
(537806718, 'uaosdkzjxc oikj', '2021-06-01 14:10:18'),
(558765514, 'Ukwanza', '2021-05-31 18:32:07'),
(581641816, 'Makambako', '2021-05-31 13:13:59'),
(634068782, 'tuko pamoja customer', '2021-05-31 18:32:17'),
(649246790, 'Idodomya', '2021-05-31 13:41:28'),
(657081396, 'Kwetu', '2021-05-31 18:02:20'),
(659763610, 'Malengo customer', '2021-06-01 04:01:10'),
(707106405, 'jakshclksajzxjkczx', '2021-06-01 14:10:35'),
(727102657, 'ushdcxnczn', '2021-06-01 14:10:26'),
(740851076, 'Vicoba', '2021-05-29 10:55:32'),
(769742586, 'ukweli wake', '2021-06-01 14:09:31'),
(792433441, 'Uluguru', '2021-05-31 13:16:10'),
(805988252, 'Kibaigwa', '2021-05-31 13:16:01'),
(811123968, 'Mbeya', '2021-05-31 13:14:50'),
(835755374, 'pemba', '2021-05-31 13:15:11'),
(858628078, 'udaiujwqposaidk;sdcx', '2021-06-01 14:10:11'),
(863546491, 'Mtwara', '2021-05-31 13:14:46'),
(898277674, 'luangwa', '2021-05-31 13:15:48'),
(913954736, 'Lindi ', '2021-05-31 13:15:42'),
(1110566161, 'Juma amosi Kabota', '2021-06-01 08:28:55'),
(1298947125, 'Company', '2021-05-31 13:43:29'),
(1373804644, 'International customer', '2021-05-29 06:17:51'),
(1480278968, 'Umoja', '2021-05-29 11:22:09'),
(1494613705, 'Investors', '2021-05-29 09:44:44'),
(1742138960, 'Ukweli customers', '2021-05-31 10:30:29'),
(1772035861, 'Mjasiriamali', '2021-05-31 11:04:16'),
(1878053378, 'Uviko', '2021-05-29 11:41:05'),
(1878923608, 'Student Customer', '2021-05-31 10:08:27'),
(1970088440, 'Individual customers', '2021-05-31 10:26:34'),
(2020751046, 'Wakuja ', '2021-05-31 11:40:41'),
(2118354108, 'Joint Stock', '2021-05-31 10:13:44'),
(2147483647, 'Dickson mizengo', '2021-05-31 17:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_number` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_number`, `username`, `password`, `email`) VALUES
(978354657, 'admin', '123456', 'admin@admin.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_number`),
  ADD KEY `customer` (`customer`),
  ADD KEY `account_type` (`account_type`),
  ADD KEY `account_status` (`account_status`);

--
-- Indexes for table `account_status`
--
ALTER TABLE `account_status`
  ADD PRIMARY KEY (`account_status_number`);

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`account_type_number`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_number`),
  ADD KEY `customer_type` (`customer_type`);

--
-- Indexes for table `customers_type`
--
ALTER TABLE `customers_type`
  ADD PRIMARY KEY (`customer_type_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_number`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`customer`) REFERENCES `customers` (`customer_number`),
  ADD CONSTRAINT `accounts_ibfk_2` FOREIGN KEY (`account_type`) REFERENCES `account_type` (`account_type_number`),
  ADD CONSTRAINT `accounts_ibfk_3` FOREIGN KEY (`account_status`) REFERENCES `account_status` (`account_status_number`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`customer_type`) REFERENCES `customers_type` (`customer_type_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
