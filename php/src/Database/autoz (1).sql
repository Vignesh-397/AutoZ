-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Oct 09, 2023 at 07:42 PM
-- Server version: 8.1.0
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autoz`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked_bikes`
--

CREATE TABLE `booked_bikes` (
  `bid` int NOT NULL,
  `buyer_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `phone` int NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_of_meet` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booked_cars`
--

CREATE TABLE `booked_cars` (
  `cid` int NOT NULL,
  `buyer_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `phone` int NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_of_meet` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manager_info`
--

CREATE TABLE `manager_info` (
  `mgr_id` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `mgr_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager_info`
--

INSERT INTO `manager_info` (`mgr_id`, `mgr_name`, `password`) VALUES
('varun337', 'Varun Bhatkal', '$2a$04$qdjLtJxOFDPZQS8QAWY1A.FZ/vGtLjWIMcOAViBWua32XswAEHkbS'),
('vedang239', 'Vedang Jaithalya', '$2a$04$LOQ6mJo83dK2GbRHCH44Q.hNfp1tbgz2GPqUSbzgxwO.bBHOThJc2'),
('vignesh397', 'Vignesh', '$2a$04$vtmz2.cmc3gNBLJNH3AvS.bT0quB6S.sp42A2BVHbdnqZmIwxXT32');

-- --------------------------------------------------------

--
-- Table structure for table `signininfo`
--

CREATE TABLE `signininfo` (
  `sno` int NOT NULL,
  `Name` text COLLATE utf8mb4_general_ci NOT NULL,
  `City` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Phone` int NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signininfo`
--

INSERT INTO `signininfo` (`sno`, `Name`, `City`, `Email`, `Phone`, `Password`, `dt`) VALUES
(57, 'Vignesh', 'Udupi', 'vignesh@gmail.com', 97198467, '$2y$10$MX8s601UXHRJLsXb.BvgKuae.qQZ1IDMdqpfaEjgGVR6yz2BHDlJ2', '2023-07-21 23:20:53'),
(58, 'Varun', 'Kumta', 'varun@gmail.com', 782394723, '$2y$10$ghqI5ejrlUJZfo0BuiFnLe.HNwmjVdwFEt/oCeQ2kaZgW1YIi0c/y', '2023-07-21 23:29:20'),
(59, 'Vignesh', 'Kundapura', 'nkt@gmail.com', 56465445, '$2y$10$Enab392eBuTQb8DPtn5I7eUv8mz5IXVMleJk7f8VwaNNYH7r978hC', '2023-07-23 00:27:36'),
(60, 'vignesh', 'udupi', 'vignesh123@gmail.com', 73246834, '$2y$10$aK5lwJSdp1OopdpcY5xvU.2P.JrDx9lcPx6cdzPBAR0bElV5q479C', '2023-07-23 22:12:29'),
(61, 'Deepak', 'Tumkur', 'deepak@gmail.com', 6738657, '$2y$10$5HZFE02ViPILD5LjpQeEDeuwxcfmhYiCuDZef/EG7CuzndwKeOqaG', '2023-07-23 22:27:11'),
(62, 'sathwik ', 'Mangalore', 'sathwik@gmail.com', 5614455, '$2y$10$flJ7VqLQFzPI73CDL59MSOrZanzwuIiEifWeJ8FY2QYtG/4Tgsfmy', '2023-07-23 23:04:11'),
(63, 'Vignesh', 'Bang', 'nvignesh397@gmail.com', 2147483647, '$2y$10$8SlliF8/TRmFzJLFcn7VQeyOcl.pYYgWJ2XOzSXjRK81rj5g4fOKm', '2023-08-15 22:25:58'),
(64, 'Vignesh', 'Bang', '397@gmail.com', 2147483647, '$2y$10$UOIrmaA6B4AjaYUM.HC8k.dibXX1OA0BnWupcu.PbYYR90mQGtj8S', '2023-08-15 22:26:17'),
(65, 'Vig', 'sdd', '324@gmail.com', 2147483647, '$2y$10$Kzhr8KPGsgIKWRSSiXrs9u.DDeWMFnQdw39rxz3mJtnS2JPQiKor6', '2023-08-15 22:33:22'),
(66, 'Vignesh', 'Bangalore', '218@gmail.com', 2147483647, '$2y$10$yn3yc3g8MLmeG19P4U/cTejpG1QM.ShLQtOF0k4R37selb9wXtZwy', '2023-08-15 22:43:45'),
(67, 'Vignesh', 'Bandsfs', 'sdfbhsfh@gmail.com', 1231, '$2y$10$/pyQetTqN5KHXUqNgW.Wk.rp9hqqLDVRh6.TBSUkRNIFlSXBaslsy', '2023-10-09 15:59:02'),
(68, 'Varun', 'bhatkal', 'varun123@gmail.com', 1234567890, '$2y$10$WTb2MnMTdolau0V46Oci6ehScQWi8sqBRQRwxG/OREwXABVNyXkha', '2023-10-09 16:23:52');

-- --------------------------------------------------------

--
-- Table structure for table `sold_bikes`
--

CREATE TABLE `sold_bikes` (
  `bid` int NOT NULL,
  `owner_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `phone` bigint NOT NULL,
  `brand` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `model` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `reg_year` year NOT NULL,
  `RTO` text COLLATE utf8mb4_general_ci NOT NULL,
  `fuel_type` text COLLATE utf8mb4_general_ci NOT NULL,
  `kms_driven` bigint NOT NULL,
  `ownership` text COLLATE utf8mb4_general_ci NOT NULL,
  `engine` text COLLATE utf8mb4_general_ci NOT NULL,
  `transmission` text COLLATE utf8mb4_general_ci NOT NULL,
  `mileage` mediumint NOT NULL,
  `wheel_size` int NOT NULL,
  `seats` int NOT NULL,
  `price` double NOT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sold_bikes`
--

INSERT INTO `sold_bikes` (`bid`, `owner_name`, `phone`, `brand`, `model`, `reg_year`, `RTO`, `fuel_type`, `kms_driven`, `ownership`, `engine`, `transmission`, `mileage`, `wheel_size`, `seats`, `price`, `img_url`) VALUES
(8, 'Vigesh', 349756, 'TVS', 'Pulsur RS 200', '2018', 'KA19', 'Petrol', 2000, 'Single', '120cc', 'Automatic', 45, 10, 2, 125000, 'uploads/Pulsar RS 200.jpg'),
(9, 'Vignesh', 7829946725, 'TVS', 'Raider 125', '2017', 'KA20', 'Petrol', 15000, 'Single', '120cc', 'Manual', 40, 10, 2, 75000, 'uploads/TVS Raider 125.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sold_cars`
--

CREATE TABLE `sold_cars` (
  `cid` int NOT NULL,
  `owner_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `phone` int NOT NULL,
  `brand` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `model` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `reg_year` year NOT NULL,
  `RTO` text COLLATE utf8mb4_general_ci NOT NULL,
  `fuel_type` text COLLATE utf8mb4_general_ci NOT NULL,
  `kms_driven` bigint NOT NULL,
  `ownership` text COLLATE utf8mb4_general_ci NOT NULL,
  `engine` text COLLATE utf8mb4_general_ci NOT NULL,
  `transmission` text COLLATE utf8mb4_general_ci NOT NULL,
  `mileage` mediumint NOT NULL,
  `wheel_size` int NOT NULL,
  `seats` int NOT NULL,
  `price` double NOT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sold_cars`
--

INSERT INTO `sold_cars` (`cid`, `owner_name`, `phone`, `brand`, `model`, `reg_year`, `RTO`, `fuel_type`, `kms_driven`, `ownership`, `engine`, `transmission`, `mileage`, `wheel_size`, `seats`, `price`, `img_url`) VALUES
(21, 'Vignesh', 2147483647, 'Maruti', 'Suzuki Invicto', '2020', 'KA20', 'Diesel', 67000, 'Signle', '1353cc', 'Automatic', 19, 14, 5, 150000, 'uploads/Maruti Suzuki Invicto.jpg'),
(22, 'Varun', 2147483647, 'Hyundai', 'Exter', '2021', 'KA02', 'Diesel', 89000, 'Signle', '1200cc', 'Automatic', 22, 14, 5, 180000, 'uploads/Hyundai Exter.jpg'),
(25, 'Shikar', 128478921, 'Mahindra', 'Thar', '2018', 'KA19', 'Diesel', 66000, 'Signle', '1600cc', 'Automatic', 17, 14, 4, 200000, 'uploads/Mahindra Thar.jpg'),
(26, 'Vedang', 1234567890, 'Tata', 'Nexon', '2016', 'KA20', 'Diesel', 25000, 'Signle', '2000cc', 'Automatic', 15, 12, 4, 160000, 'uploads/Tata Nexon.jpg'),
(32, 'Shikar', 123456789, 'Mahindra ', 'Scorpio', '2018', 'KA02', 'Diesel', 10000, 'Single', '1000cc', 'Manual', 16, 12, 4, 120000, 'uploads/Mahindra Scorpio.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked_bikes`
--
ALTER TABLE `booked_bikes`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `booked_cars`
--
ALTER TABLE `booked_cars`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `manager_info`
--
ALTER TABLE `manager_info`
  ADD PRIMARY KEY (`mgr_id`);

--
-- Indexes for table `signininfo`
--
ALTER TABLE `signininfo`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `sold_bikes`
--
ALTER TABLE `sold_bikes`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `sold_cars`
--
ALTER TABLE `sold_cars`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `signininfo`
--
ALTER TABLE `signininfo`
  MODIFY `sno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `sold_bikes`
--
ALTER TABLE `sold_bikes`
  MODIFY `bid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sold_cars`
--
ALTER TABLE `sold_cars`
  MODIFY `cid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked_bikes`
--
ALTER TABLE `booked_bikes`
  ADD CONSTRAINT `fk_booked_bikes_sold_bikes` FOREIGN KEY (`bid`) REFERENCES `sold_bikes` (`bid`) ON DELETE CASCADE;

--
-- Constraints for table `booked_cars`
--
ALTER TABLE `booked_cars`
  ADD CONSTRAINT `fk_booked_cars_sold_cars` FOREIGN KEY (`cid`) REFERENCES `sold_cars` (`cid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
