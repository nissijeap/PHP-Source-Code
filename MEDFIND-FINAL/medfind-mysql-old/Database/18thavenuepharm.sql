-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 02:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `18thavenuepharm`
--

-- --------------------------------------------------------

--
-- Table structure for table `classification`
--

CREATE TABLE `classification` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classification`
--

INSERT INTO `classification` (`class_id`, `class_name`) VALUES
(1, 'Liquid'),
(2, 'Tablet'),
(3, 'Capsules'),
(4, 'Injections'),
(5, 'Implants'),
(6, 'Drops'),
(7, 'Topical'),
(8, 'Suppositories'),
(9, 'Inhalers');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `med_id` int(11) NOT NULL,
  `med_name` varchar(100) DEFAULT NULL,
  `med_quan` int(11) DEFAULT NULL,
  `med_price` varchar(50) DEFAULT NULL,
  `med_pack` int(11) DEFAULT NULL,
  `med_dosage` varchar(50) DEFAULT NULL,
  `med_class` int(50) DEFAULT NULL,
  `med_stat` varchar(50) DEFAULT NULL,
  `med_added` date DEFAULT NULL,
  `med_exp` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`med_id`, `med_name`, `med_quan`, `med_price`, `med_pack`, `med_dosage`, `med_class`, `med_stat`, `med_added`, `med_exp`) VALUES
(1, 'Adfren', 500, '100', 203, '500mg', 3, 'Available', '2022-11-15', '2023-06-24'),
(2, 'Admox', 390, '150', 203, '500mg', 3, 'Available', '2022-11-15', '2023-06-24'),
(3, 'Adnyst', 100, '405', 202, '100000mL', 1, 'Available', '2022-11-15', '2023-06-24'),
(4, 'Lefoxin', 50, '1560', 208, '500mg/100mL', 2, 'Available', '2022-11-15', '2023-09-14'),
(5, 'Nazovac', 38, '1235', 201, '4.5g', 1, 'Available', '2022-11-15', '2023-12-02'),
(6, 'Quinosole', 1, '198', 203, '100mL', 3, 'Available', '2022-11-15', '2024-09-25'),
(7, 'Semithine', 56, '5.20', 202, '25mg', 2, 'Available', '2022-11-15', '2023-03-26'),
(12, 'Paracetamol', 12, '34', 203, '34mg', 8, 'Available', '2022-11-16', '2022-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `packaging`
--

CREATE TABLE `packaging` (
  `pack_id` int(11) NOT NULL,
  `pack_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packaging`
--

INSERT INTO `packaging` (`pack_id`, `pack_name`) VALUES
(201, 'Vials'),
(202, 'Bottles'),
(203, 'Blister Packs'),
(204, 'Sachets'),
(205, 'Syringes'),
(206, 'Ampoules'),
(207, 'Cartons'),
(208, 'Boxes');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_details`
--

CREATE TABLE `pharmacy_details` (
  `pharm_id` int(11) NOT NULL,
  `pharm_name` varchar(255) NOT NULL,
  `pharm_address` varchar(255) NOT NULL,
  `pharm_no` varchar(255) NOT NULL,
  `pharm_email` varchar(255) NOT NULL,
  `pharm_open` time NOT NULL,
  `pharm_close` time NOT NULL,
  `cover` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacy_details`
--

INSERT INTO `pharmacy_details` (`pharm_id`, `pharm_name`, `pharm_address`, `pharm_no`, `pharm_email`, `pharm_open`, `pharm_close`, `cover`) VALUES
(1, '18th Avenue Pharmacy', '66RW+HMG, Tibanga Highway, Iligan City, Lanao del Norte', '063 123 456', '18thap@gmail.com', '08:00:00', '22:00:00', 'download.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classification`
--
ALTER TABLE `classification`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`med_id`);

--
-- Indexes for table `packaging`
--
ALTER TABLE `packaging`
  ADD PRIMARY KEY (`pack_id`);

--
-- Indexes for table `pharmacy_details`
--
ALTER TABLE `pharmacy_details`
  ADD PRIMARY KEY (`pharm_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classification`
--
ALTER TABLE `classification`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `packaging`
--
ALTER TABLE `packaging`
  MODIFY `pack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `pharmacy_details`
--
ALTER TABLE `pharmacy_details`
  MODIFY `pharm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
