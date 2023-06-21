SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `med_id` int(11) NOT NULL,
  `med_name` varchar(100) DEFAULT NULL,
  `med_brand` varchar(50) DEFAULT NULL,
  `med_type` varchar(50) DEFAULT NULL,
  `med_count` int(11) DEFAULT NULL,
  `med_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`med_id`, `med_name`, `med_brand`, `med_type`, `med_count`, `med_price`) VALUES
(101, 'Paracetamol', 'Biogesic', 'Tablet', 100, '10.00'),
(102, 'Cotrimoxazole', 'Septrin', 'Antibiotic', 23, '50.00'),
(115, 'hatdog', 'virginia', 'Food', 12, '50.00');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_details`
--

CREATE TABLE `pharmacy_details` (
  `pharm_id` int(11) NOT NULL,
  `pharm_name` varchar(100) NOT NULL,
  `pharm_address` varchar(100) NOT NULL,
  `pharm_landmark` varchar(100) NOT NULL,
  `pharm_no` varchar(50) DEFAULT NULL,
  `pharm_website` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacy_details`
--

INSERT INTO `pharmacy_details` (`pharm_id`, `pharm_name`, `pharm_address`, `pharm_landmark`, `pharm_no`, `pharm_website`) VALUES
(1, 'Mercury Drug Store', 'Tibanga, Iligan City', 'Near 7/11', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`med_id`);

--
-- Indexes for table `pharmacy_details`
--
ALTER TABLE `pharmacy_details`
  ADD PRIMARY KEY (`pharm_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `pharmacy_details`
--
ALTER TABLE `pharmacy_details`
  MODIFY `pharm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
