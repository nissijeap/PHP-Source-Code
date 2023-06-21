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
-- Database: `rmpharm`
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
(101, 'Liquid'),
(102, 'Tablet'),
(103, 'Capsules'),
(104, 'Injections'),
(105, 'Implants'),
(106, 'Drops'),
(107, 'Topical'),
(108, 'Suppositories');

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
(1, 'Advil', 500, '85', 203, '60ML', 102, 'Available', '2022-11-23', '2023-09-20'),
(2, 'Allerkid', 300, '169', 202, '1.5MG DROPS 10 ML', 101, 'Available', '2022-11-23', '2023-10-12'),
(3, 'Allerkid', 240, '154.75', 202, '30ML', 101, 'Available', '2022-11-23', '2023-07-13'),
(4, 'Biotermin Pus', 35, '152', 202, '120ML', 101, 'Available', '2022-11-23', '2023-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `packaging`
--

CREATE TABLE `packaging` (
  `pack_id` int(11) NOT NULL,
  `pack_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packaging`
--

INSERT INTO `packaging` (`pack_id`, `pack_name`) VALUES
(201, 'Vials'),
(202, 'Bottles'),
(203, 'Blister'),
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
  `pharm_name` varchar(255) DEFAULT NULL,
  `pharm_address` varchar(255) DEFAULT NULL,
  `pharm_no` varchar(255) DEFAULT NULL,
  `pharm_email` varchar(255) DEFAULT NULL,
  `pharm_open` time DEFAULT NULL,
  `pharm_close` time DEFAULT NULL,
  `cover` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacy_details`
--

INSERT INTO `pharmacy_details` (`pharm_id`, `pharm_name`, `pharm_address`, `pharm_no`, `pharm_email`, `pharm_open`, `pharm_close`, `cover`) VALUES
(1, 'RM Health & Med', '66RW+43X, Iligan City, Lanao del Norte', '', 'rm@gmail.com', '08:00:00', '22:00:00', '4010889.png');

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
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packaging`
--
ALTER TABLE `packaging`
  MODIFY `pack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `pharmacy_details`
--
ALTER TABLE `pharmacy_details`
  MODIFY `pharm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
