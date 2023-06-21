-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2023 at 12:54 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medfind2`
--

-- --------------------------------------------------------

--
-- Table structure for table `classification`
--

CREATE TABLE `classification` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(108, 'Suppositories'),
(110, 'Cream'),
(112, 'Syrup'),
(114, 'Suspension'),
(115, 'Powder'),
(116, 'Gel'),
(117, 'Solution'),
(118, 'Inhaler'),
(119, 'Nebules');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `med_id` int(11) NOT NULL,
  `med_name` varchar(100) DEFAULT NULL,
  `med_pack` int(11) DEFAULT NULL,
  `med_dosage` varchar(50) DEFAULT NULL,
  `med_class` int(50) DEFAULT NULL,
  `med_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`med_id`, `med_name`, `med_pack`, `med_dosage`, `med_class`, `med_desc`) VALUES
(119, 'Biogesic', 202, '250mg/60mL', 101, 'medicine for flu'),
(120, 'Biogesic', 203, '500mg', 102, 'medicine for flu'),
(121, 'BL Cream Rx', 207, '7g', 110, 'moisturizer, diaper rash, skin burns'),
(122, 'BL Cream', 209, '10g', 110, 'moisturizer, diaper rash, skin burns'),
(123, 'Blood Set Terumo', 210, 'n/a', 104, 'blood'),
(126, 'Broncaire Expectorant', 202, '60mL', 101, 'bronchitis, pneumonia, influenza'),
(127, 'Bronchofen', 202, '1mg/0.8mg/mL/15mL', 106, 'allergy'),
(128, 'Burinex', 203, '1mg', 102, 'heart condiitons, heart failure, liver disease, kidney disease'),
(129, 'Buscopan', 203, '10mg', 102, 'painful stomach cramps'),
(130, 'Aciclovir', 203, '200mg', 102, 'chicken pox, herpes infection'),
(131, 'Aciclovir', 203, '500mg', 102, 'chicken pox, herpes infection'),
(132, 'Advil Liquigel', 203, '200mg', 103, 'body pain, headache'),
(133, 'Alaxan FR', 203, '200mg/325mg', 103, 'body pain, headache'),
(134, 'Ambroxol', 203, '15mg', 102, 'cough'),
(135, 'Ambroxol', 203, '75mg', 102, 'cough'),
(136, 'Ambroxol', 207, '15ml', 106, 'cough'),
(138, 'Advil', 203, '250mg', 102, 'body pain, headache'),
(139, 'Enalapril', 203, '20mg', 102, 'hypertension, heart failure'),
(140, 'Rebamipide', 203, '100mg', 102, 'hyperacidity, ulcer'),
(141, 'Aciclovir', 203, '400mg', 102, 'chicken pox, herpes infection'),
(142, 'Aciclovir', 203, '800mg', 102, 'chicken pox, herpes infection'),
(143, 'Ambroxol', 207, '15mg/120ml', 112, 'cough'),
(144, 'Ambroxol', 207, '15mg/60ml', 112, 'cough'),
(145, 'Ambroxol', 203, '30mg', 102, 'cough'),
(146, 'Ambroxol', 207, '30mg/120ml', 112, 'cough'),
(147, 'Ambroxol', 207, '30mg/60ml', 112, 'cough'),
(150, 'Amoxicillin', 203, '250mg', 103, 'antibacterial'),
(152, 'Appetite Stimulant', 203, 'n/a', 102, 'vitamins'),
(153, 'Ascorbic + Zinc', 203, '500mg', 102, 'adult vitamins'),
(154, 'Ascorbic Acid', 207, '100mg/120ml', 112, 'vitamins'),
(156, 'Zinc-C', 207, '120ml', 112, 'vitamins'),
(157, 'Atenolol', 203, '100mg', 102, 'heart conditions'),
(158, 'Atenolol', 203, '50mg', 102, 'heart conditions'),
(159, 'Atorvastatin', 203, '10mg', 102, 'heart conditions'),
(160, 'Atorvastatin', 203, '20mg', 102, 'heart conditions'),
(161, 'Atorvastatin', 203, '40mg', 102, 'heart conditions'),
(162, 'Azithromycin', 203, '500mg', 102, 'infections'),
(163, 'Betamethasone', 203, '250mcg/2mg', 102, 'allergy'),
(164, 'Betamethasone', 209, '500mcg/5g', 110, 'dermatologicals'),
(165, 'Bisacodyl', 203, '5mg', 102, 'constipation'),
(166, 'Bisoprolol', 203, '5mg', 102, 'heart conditions'),
(167, 'Captopril', 203, '25mg', 102, 'heart conditions'),
(168, 'Carbamazepine', 203, '200mg', 102, 'anti-epilepsy, anti-convulsant'),
(169, 'Carbocisteine', 203, '500mg', 102, 'cough'),
(170, 'Cefaclor', 207, '250mg', 114, 'infections'),
(171, 'Cefalexin', 207, '100mg/10ml', 106, 'infections'),
(172, 'Cefalexin', 207, '125mg/60ml', 114, 'infections'),
(173, 'Cefalexin', 203, '250mg', 103, 'anti-infectives'),
(174, 'Cefalexin', 207, '250mg/60ml', 114, 'infections'),
(175, 'Cefepime', 201, '1g', 115, 'infections, antibacterial'),
(176, 'Cefepime', 201, '2g', 115, 'infections, antibacterial'),
(177, 'Cefepime', 203, '200mg', 103, 'infections, antibacterial'),
(178, 'Ceftriaxone', 201, '1g', 101, 'infections, antibacterial'),
(179, 'Cefuroxime', 201, '150mg', 115, 'infections, antibacterial'),
(180, 'Cefuroxime', 203, '250mg', 102, 'infections, antibacterial'),
(181, 'Cefuroxime', 203, '500mg', 102, 'infections, antibacterial'),
(182, 'Celecoxib', 203, '200mg', 103, 'body pain, arthritis'),
(183, 'Cetirizine', 203, '10mg', 102, 'allergy'),
(184, 'Cetirizine', 207, '5mg/60ml', 112, 'allergy'),
(185, 'Cinnarizine', 203, '25mg', 102, 'anti-epilepsy, anti-convulsant'),
(186, 'Ciprofloxacin', 203, '500mg', 102, 'infections, antibacterial'),
(187, 'Clarithromycin', 203, '500mg', 102, 'infections, antibacterial'),
(188, 'Clindamycin', 203, '150mg', 103, 'infections, antibacterial'),
(189, 'Clindamycin', 203, '300mg', 103, 'infections, antibacterial'),
(190, 'Clobetasol Propionate', 209, '500mcg/10g', 110, 'antipruritic'),
(191, 'Clonidine', 203, '150mg', 102, 'antihypersentive'),
(192, 'Clonidine', 203, '75mg', 102, 'antihypertensive, heart conditions'),
(193, 'Clopidogrel', 203, '75mg', 102, 'antihypertensive, heart conditions'),
(194, 'Cloxacillin', 203, '500mg', 103, 'infections, antibacterial'),
(195, 'Co-amoxiclav', 203, '1g', 102, 'infections, antibacterial'),
(196, 'Co-amoxiclav', 203, '625mg', 102, 'infections, antibacterial'),
(197, 'Colchicine', 203, '500mg', 102, 'anti-gout'),
(198, 'Diclofenac', 203, '50mg', 102, 'body pain, arthritis'),
(199, 'Dicycloverine', 202, '10mg', 102, 'anticholinergic'),
(200, 'Diphenhydramine', 203, '50mg', 103, 'allergy'),
(201, 'Domperidone', 203, '10mg', 102, 'anti-emetic'),
(202, 'Doxycycline', 203, '100mg', 103, 'infections, antibacterial'),
(203, 'Erythromycin', 203, '500mg', 102, 'infections, antibacterial'),
(204, 'Escitalopram', 203, '10mg', 102, 'anti-epilepsy, anti-convulsant'),
(205, 'Felodipine', 203, '5mg', 102, 'heart conditions'),
(206, 'Fibermate', 204, 'n/a', 115, 'supplement'),
(207, 'Fluoxetine', 203, '20mg', 103, 'anti-epilepsy, anti-convulsant'),
(208, 'Folic Acid', 203, '5mg', 102, 'vitamins'),
(209, 'Frusema', 203, '10mg', 102, 'hypertension'),
(210, 'Frusema', 203, '40mg', 102, 'hypertension'),
(211, 'Glibenclamide', 203, '5mg', 102, 'diabetes'),
(212, 'Gliclazide', 203, '80mg', 102, 'diabetes'),
(213, 'Glimepiride', 203, '2mg', 102, 'diabetes'),
(214, 'Glimepiride', 203, '3mg', 102, 'diabetes'),
(215, 'Glucosamine', 204, '1.5g', 115, 'body pain, arthritis'),
(216, 'Hexetidine', 207, '120ml', 112, 'sore throat'),
(217, 'Hexeditine', 207, '60ml', 112, 'sore throat'),
(218, 'Hydrocort', 209, '10mg/15g', 110, 'allergy'),
(219, 'Ibuprofen', 203, '200mg', 103, 'somatics'),
(220, 'Irbesartan', 203, '150mg', 102, 'cardio'),
(221, 'Irbesartan', 203, '300mg', 102, 'cardio'),
(222, 'Iron + Folic', 203, 'n/a', 102, 'vitamins'),
(223, 'Isoniazid + Pyridoxine Hydrochloride', 207, '200mg/12mg', 112, 'tuberculosis'),
(224, 'Lagundi', 207, '120ml', 112, 'anti-cough, anti-asthma, cough'),
(225, 'Lagundi', 207, '60ml', 112, 'anti-cough, anti-asthma, cough'),
(226, 'Lansoprazole', 203, '30mg', 103, 'inhibitor'),
(227, 'Levocetirizine', 203, '5mg', 102, 'allergy'),
(228, 'Levofloxacin', 203, '500mg', 102, 'infections, antibacterial'),
(229, 'Loratadine', 203, '10mg', 102, 'allergy'),
(230, 'Losartan + Hydrochlorothiazide', 203, '100mg', 102, 'heart conditions'),
(231, 'Losartan + Hydrochlorothiazide', 203, '50mg', 102, 'heart conditions'),
(232, 'Losartan', 203, '100mg', 102, 'heart conditions'),
(233, 'Losartan', 203, '50mg', 102, 'heart conditions'),
(234, 'Mefenamic Acid', 203, '250mg', 102, 'body pain, arthritis'),
(235, 'Mefenamic Acid', 203, '500mg', 102, 'body pain, arthritis'),
(236, 'Meloxicam', 203, '15mg', 102, 'body pain, arthritis'),
(237, 'Meloxicam', 203, '7.5mg', 102, 'body pain, arthritis'),
(238, 'Meropenem', 201, '1g', 115, 'anti-infectives, infections'),
(239, 'Meropenem', 201, '500mg', 115, 'anti-infectives, infections'),
(240, 'Metformin', 203, '500mg', 102, 'diabetes'),
(241, 'Metformin', 203, '850mg', 102, 'diabetes'),
(243, 'Metropolol Tartrate', 203, '100mg', 102, 'heart conditions'),
(244, 'Metropolol Tartrate', 203, '50mg', 102, 'heart conditions'),
(245, 'Metronidazole', 209, '10mg/10g', 116, 'dermatologicals'),
(246, 'Metronidazole', 203, '500mg', 102, 'amoebiasis'),
(247, 'Mometasone', 209, '5g', 110, 'dermatologicals'),
(248, 'Montelukast', 203, '10mg', 102, 'asthma'),
(249, 'Montelukast Chew', 203, '5mg', 102, 'asthma'),
(250, 'Multivitamins + CGF', 207, '120ml', 112, 'vitamins'),
(251, 'Mupirocin', 209, '5g', 110, 'anti-infectives, infections'),
(252, 'Naproxen Sodium', 203, '500mg', 102, 'body pain, arthritis'),
(253, 'Neutracid', 203, '200mg', 102, 'hyperacidity, ulcer'),
(254, 'Nicardia XL', 203, '30mg', 102, 'cardio'),
(255, 'Omeprazole', 203, '20mg', 102, 'hyperacidity, ulcer'),
(256, 'Omeprazole', 203, '40mg', 103, 'hyperacidity, ulcer'),
(257, 'Pantoprazole', 201, '40mg', 115, 'hyperacidity, ulcer'),
(258, 'Paracetamol', 207, '120mg/60ml', 112, 'fever, pain'),
(259, 'Paracetamol', 209, '125mg', 108, 'fever, pain'),
(260, 'Paracetamol', 207, '250mg/60ml', 112, 'fever, pain'),
(261, 'Paracetamol', 203, '500mg', 102, 'fever, pain'),
(262, 'Paramax', 203, '325mg/200mg', 102, 'fever, headache'),
(263, 'Potassium Citrate', 203, 'n/a', 102, 'anti-urolithic'),
(264, 'Povidone Iodine 30%', 202, '30ml', 101, 'home remedies'),
(265, 'Povidone Iodine 30%', 202, '60ml', 101, 'home remedies'),
(266, 'Pregabalin', 203, '150mg', 103, 'antiepileptic'),
(267, 'Pregabalin', 203, '75mg', 103, 'antiepileptic'),
(268, 'Risperidone', 203, '2mg', 102, 'anti-epilepsy, anti-convulsant'),
(269, 'Rosuvastatin', 203, '10mg', 102, 'cholesterol'),
(270, 'Rosuvastatin', 203, '20mg', 102, 'cholesterol'),
(271, 'Salbutamol', 203, '2mg', 102, 'asthma'),
(272, 'Sildenafil', 203, '100mg', 102, 'erectile dysfunction'),
(273, 'Sildenafil', 203, '50mg', 102, 'erectile dysfunction'),
(274, 'Simvastatin', 203, '20mg', 102, 'heart conditions'),
(275, 'Simvastatin', 203, '40mg', 102, 'heart conditions'),
(276, 'Terazosin', 203, '2mg', 102, 'prostate enlargement'),
(277, 'Terazosin', 203, '5mg', 102, 'prostate enlargement'),
(278, 'Tolnaftate', 207, '10mg/15g', 110, 'dermatologicals'),
(279, 'Tramadol + Paracetamol', 203, '325mg', 102, 'somatics'),
(280, 'Tri-V', 209, 'n/a', 108, 'anti-fungal, anti-protozoal'),
(281, 'Trimetazidine', 203, '35mg', 102, 'heart conditions'),
(282, 'Valsartan', 203, '160mg', 102, 'cardio'),
(283, 'Valsartan', 203, '80mg', 102, 'cardio'),
(284, 'Verapamil', 203, '240mg', 102, 'heart conditions'),
(285, 'Vitamin B Complex', 203, 'n/a', 102, 'vitamins'),
(286, 'Zelexin', 203, '250mg', 103, 'antibacterial, infections'),
(287, 'Zelexin', 203, '500mg', 103, 'antibacterial, infections'),
(288, 'Clopidogrel', 203, '75mg', 102, 'infections'),
(289, 'Losartan', 203, '100mg', 102, ''),
(290, 'Losartan', 203, '50mg', 102, ''),
(292, 'Amlodipine', 203, '10mg', 102, ''),
(294, 'Clarithromycin', 203, '500mg', 102, ''),
(295, 'Irbesartan', 203, '300mg', 102, ''),
(297, 'Ciprofloxacin', 203, '500mg', 102, ''),
(298, 'Clopidogrel', 203, '75mg', 102, ''),
(299, 'Irbesartan', 203, '150mg', 102, ''),
(300, 'Losartan', 203, '100mg', 102, ''),
(301, 'Omeprazole', 203, '20mg', 102, ''),
(302, 'Turmeric', 203, '500mg', 102, 'home remedies'),
(303, 'Mangosteen + Malunggay', 203, '500mg', 102, 'home remedies'),
(305, 'Pantroprazole Sodium', 203, '40mg', 102, ''),
(307, 'Losartan', 203, '50mg', 102, ''),
(308, 'Naproxen Sodium', 203, '550mg', 102, ''),
(309, 'Simvastatin', 203, '20mg', 102, ''),
(310, 'D-Alpha Vitamin E', 203, '400lu', 103, ''),
(311, 'Ampalaya', 203, '500mg', 103, 'home remedies'),
(313, 'Loperamide', 203, '2mg', 103, ''),
(314, 'Mefenamic', 203, '500mg', 103, ''),
(317, 'Metropolol', 203, '50mg', 102, '');

-- --------------------------------------------------------

--
-- Table structure for table `med_pharm`
--

CREATE TABLE `med_pharm` (
  `med_pharm_id` int(11) NOT NULL,
  `med_name` int(11) DEFAULT NULL,
  `med_quan` int(11) DEFAULT NULL,
  `med_price` decimal(10,2) DEFAULT NULL,
  `med_stat` varchar(50) DEFAULT NULL,
  `med_added` date DEFAULT NULL,
  `med_exp` date DEFAULT NULL,
  `pharmacy` int(11) DEFAULT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `med_pharm`
--

INSERT INTO `med_pharm` (`med_pharm_id`, `med_name`, `med_quan`, `med_price`, `med_stat`, `med_added`, `med_exp`, `pharmacy`, `images`) VALUES
(2010, 119, 121, '140.00', 'Available', '2022-12-15', '2024-07-23', 2, 'Biogesic 60ml Susp.jpg'),
(2011, 120, 500, '4.50', 'Available', '2022-12-15', '2023-08-15', 2, 'Biogesic-Tablet-Product-Shot-New.jpg'),
(2015, 121, 34, '44.00', 'Available', '2022-12-15', '2024-03-13', 2, 'BL Cream Rx.jpg'),
(2016, 122, 68, '60.00', 'Available', '2022-12-15', '2025-03-11', 2, 'BL Cream Tube.jpg'),
(2017, 123, 10, '120.00', 'Available', '2022-12-15', '2024-06-15', 2, 'Blood set.png'),
(2024, 126, 59, '115.00', 'Available', '2022-12-15', '2022-12-05', 2, 'Broncaire 60ml.webp'),
(2025, 127, 270, '121.00', 'Available', '2022-12-15', '2025-01-13', 2, 'Bronchofen-Drops.jpg'),
(2026, 128, 100, '25.90', 'Available', '2022-12-15', '2024-08-30', 2, 'Burinex.jpg'),
(2027, 129, 15, '28.00', 'Available', '2022-12-15', '2022-12-10', 2, 'Buscopan 10 mg.jpg'),
(2028, 130, 5, '7.50', 'Available', '2022-12-15', '2022-12-05', 1, 'Aciclovir.jpg'),
(2029, 131, 38, '20.25', 'Available', '2022-12-15', '2024-08-01', 1, 'aciclovir-400mg.jpg'),
(2030, 132, 7, '36.00', 'Available', '2022-12-15', '2024-05-05', 1, 'advil 200mg.webp'),
(2031, 133, 53, '8.00', 'Available', '2022-12-15', '2025-06-13', 1, 'alaxan capsule 200-325 mg.webp'),
(2037, 134, 234, '1.00', 'Available', '2022-12-15', '2022-12-01', 1, 'ambroxol 30mg.jpg'),
(2038, 135, 167, '12.00', 'Available', '2022-12-15', '2023-10-04', 1, 'ambroxol 75mg.webp'),
(2044, 136, 56, '30.00', 'Available', '2022-12-15', '2024-09-20', 1, 'ambroxol drop.png'),
(2045, 119, 65, '3.60', 'Available', '2022-12-15', '2024-01-30', 1, 'Biogesic-Tablet-Product-Shot-New.jpg'),
(2046, 138, 673, '23.00', 'Available', '2022-12-16', '2022-12-31', 1, 'advil 200mg.webp'),
(2047, 139, 25, '16.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_044058.png'),
(2048, 140, 54, '20.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_044351.png'),
(2049, 141, 0, '68.00', 'Not Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_044422.png'),
(2050, 142, 12, '125.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_044525.png'),
(2051, 143, 15, '120.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_044544.png'),
(2052, 144, 16, '72.00', 'Available', '2023-01-18', '2023-02-11', 1, 'Screenshot_20230109_044604.png'),
(2053, 145, 89, '8.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_044630.png'),
(2054, 146, 41, '150.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_044650.png'),
(2055, 147, 21, '80.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_044705.png'),
(2056, 146, 91, '9.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_050436.png'),
(2057, 147, 21, '6.47', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_050457.png'),
(2058, 150, 42, '5.50', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_050522.png'),
(2059, 150, 154, '7.50', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_050547.png'),
(2060, 152, 45, '15.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_050605.png'),
(2061, 153, 120, '6.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_050617.png'),
(2075, 154, 41, '95.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_050635.png'),
(2082, 154, 121, '2.25', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_050653.png'),
(2083, 156, 54, '106.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_050714.png'),
(2084, 157, 41, '12.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_050732.png'),
(2085, 158, 41, '6.50', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_050750.png'),
(2086, 159, 96, '13.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_050807.png'),
(2087, 160, 47, '16.50', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_050828.png'),
(2088, 161, 47, '22.75', 'Available', '2023-01-18', '2023-02-11', 1, 'Screenshot_20230109_050849.png'),
(2089, 162, 74, '106.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_060142.png'),
(2090, 163, 45, '15.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_060156.png'),
(2091, 164, 21, '245.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_060206.png'),
(2092, 165, 74, '15.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_060306.png'),
(2093, 166, 45, '15.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_060317.png'),
(2094, 167, 87, '11.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_060329.png'),
(2095, 168, 74, '10.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_060342.png'),
(2096, 169, 85, '6.50', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_060352.png'),
(2097, 170, 12, '630.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_060402.png'),
(2098, 171, 41, '103.75', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_060421.png'),
(2099, 172, 45, '114.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_060430.png'),
(2100, 173, 74, '14.50', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_060442.png'),
(2101, 174, 41, '186.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_061931.png'),
(2102, 175, 12, '1400.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_061943.png'),
(2103, 176, 11, '2700.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_061953.png'),
(2104, 177, 21, '90.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_062002.png'),
(2105, 178, 4, '770.71', 'Available', '2023-01-18', '2023-12-21', 1, 'Screenshot_20230109_062011.png'),
(2106, 179, 7, '242.86', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_062023.png'),
(2107, 180, 74, '31.00', 'Available', '2023-01-18', '2023-12-21', 1, 'Screenshot_20230109_062036.png'),
(2108, 181, 74, '52.75', 'Available', '2023-01-18', '2023-12-21', 1, 'Screenshot_20230109_062044.png'),
(2109, 182, 45, '23.50', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_062055.png'),
(2110, 183, 112, '16.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_062106.png'),
(2111, 184, 54, '200.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_062114.png'),
(2112, 185, 41, '36.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_062133.png'),
(2113, 186, 41, '24.26', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_063829.png'),
(2114, 187, 74, '57.55', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_063843.png'),
(2115, 188, 12, '21.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_063853.png'),
(2116, 189, 41, '37.75', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_063904.png'),
(2117, 190, 14, '250.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_063914.png'),
(2118, 191, 41, '25.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_063925.png'),
(2119, 192, 41, '17.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_063935.png'),
(2120, 193, 47, '20.50', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_063943.png'),
(2121, 194, 41, '17.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_063952.png'),
(2122, 195, 74, '58.75', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_064001.png'),
(2123, 196, 45, '36.50', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_064013.png'),
(2124, 197, 78, '4.35', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_064022.png'),
(2125, 198, 14, '16.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_064031.png'),
(2126, 199, 74, '10.00', 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_064040.png'),
(2127, 200, 121, '8.50', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_064050.png'),
(2128, 201, 65, '13.50', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_064059.png'),
(2129, 202, 14, '45.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_064109.png'),
(2130, 203, 87, '18.50', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_064117.png'),
(2131, 204, 47, '45.20', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_064126.png'),
(2132, 205, 74, '12.75', 'Available', '2023-01-18', '2023-12-13', 1, 'Screenshot_20230109_071027.png'),
(2133, 206, 53, '20.75', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071039.png'),
(2134, 207, 47, '30.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071049.png'),
(2135, 208, 120, '5.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071057.png'),
(2136, 209, 45, '3.44', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071105.png'),
(2137, 210, 41, '5.20', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071116.png'),
(2138, 211, 74, '5.80', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071124.png'),
(2139, 212, 45, '6.75', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071133.png'),
(2140, 213, 45, '11.50', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071153.png'),
(2141, 214, 41, '12.50', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071201.png'),
(2142, 215, 74, '50.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071209.png'),
(2143, 216, 75, '148.00', 'Available', '2023-01-18', '2023-12-14', 1, 'Screenshot_20230109_071217.png'),
(2144, 217, 41, '89.00', 'Available', '2023-01-18', '2023-12-14', 1, 'Screenshot_20230109_071225.png'),
(2145, 218, 14, '215.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071235.png'),
(2146, 219, 47, '4.50', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071309.png'),
(2147, 220, 47, '17.20', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071317.png'),
(2148, 221, 120, '28.20', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071325.png'),
(2149, 222, 74, '4.00', 'Available', '2023-01-18', '2023-02-21', 1, 'Screenshot_20230109_071335.png'),
(2150, 223, 41, '50.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071343.png'),
(2151, 224, 23, '136.50', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071349.png'),
(2152, 225, 41, '94.50', 'Available', '2023-01-18', '2023-12-04', 1, 'Screenshot_20230109_071359.png'),
(2153, 226, 74, '76.67', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071459.png'),
(2154, 227, 12, '18.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071506.png'),
(2155, 228, 14, '54.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071516.png'),
(2156, 229, 41, '19.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071525.png'),
(2157, 230, 47, '16.25', 'Available', '2023-01-18', '2023-10-10', 1, 'Screenshot_20230109_071535.png'),
(2158, 231, 41, '13.25', 'Available', '2023-01-18', '2023-10-10', 1, 'Screenshot_20230109_071544.png'),
(2190, 232, 132, '15.23', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071553.png'),
(2191, 233, 42, '11.66', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071601.png'),
(2192, 234, 146, '3.75', 'Available', '2023-01-18', '2023-10-10', 1, 'Screenshot_20230109_071610.png'),
(2193, 235, 141, '4.75', 'Available', '2023-01-18', '2023-10-10', 1, 'Screenshot_20230109_071616.png'),
(2194, 236, 41, '43.50', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071624.png'),
(2195, 237, 45, '29.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071632.png'),
(2196, 238, 15, '1600.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071924.png'),
(2197, 239, 11, '950.00', 'Available', '2023-01-18', '2023-10-12', 1, 'Screenshot_20230109_071934.png'),
(2198, 240, 121, '3.50', 'Available', '2023-01-18', '2023-10-10', 1, 'Screenshot_20230109_071944.png'),
(2201, 241, 124, '7.50', 'Available', '2023-01-18', '2023-10-10', 1, 'Screenshot_20230109_071952.png'),
(2203, 241, 43, '6.25', 'Available', '2023-01-18', '2023-10-10', 1, 'Screenshot_20230109_072001.png'),
(2204, 243, 41, '4.90', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072011.png'),
(2205, 244, 12, '3.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072018.png'),
(2206, 245, 14, '328.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072027.png'),
(2207, 246, 54, '14.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072039.png'),
(2208, 247, 12, '290.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072137.png'),
(2209, 248, 54, '32.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072146.png'),
(2210, 249, 45, '22.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072154.png'),
(2211, 250, 51, '105.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072207.png'),
(2212, 251, 14, '225.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072218.png'),
(2213, 252, 41, '13.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072230.png'),
(2214, 253, 41, '3.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072240.png'),
(2215, 254, 54, '31.25', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072248.png'),
(2216, 255, 41, '27.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072256.png'),
(2217, 256, 14, '39.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072309.png'),
(2218, 257, 14, '730.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072323.png'),
(2219, 258, 24, '50.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072332.png'),
(2220, 259, 145, '9.50', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072341.png'),
(2221, 260, 14, '75.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072349.png'),
(2222, 261, 45, '2.50', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072358.png'),
(2223, 262, 45, '5.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_081924.png'),
(2224, 263, 45, '14.88', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_081936.png'),
(2225, 264, 17, '55.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_081944.png'),
(2226, 265, 15, '90.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_081953.png'),
(2227, 266, 45, '52.90', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082038.png'),
(2228, 267, 12, '36.61', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082048.png'),
(2229, 268, 45, '75.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082105.png'),
(2230, 269, 26, '28.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082113.png'),
(2231, 270, 74, '34.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082121.png'),
(2232, 271, 45, '4.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082129.png'),
(2233, 272, 56, '223.21', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082137.png'),
(2234, 273, 42, '133.93', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082149.png'),
(2235, 274, 45, '16.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082200.png'),
(2236, 275, 47, '24.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082208.png'),
(2237, 276, 78, '26.79', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082216.png'),
(2238, 277, 46, '32.14', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082224.png'),
(2239, 278, 74, '250.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082232.png'),
(2240, 279, 45, '40.00', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082241.png'),
(2241, 280, 45, '157.50', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082251.png'),
(2242, 281, 45, '13.39', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082300.png'),
(2243, 282, 14, '25.00', 'Available', '2023-01-18', '2023-11-12', 1, 'Screenshot_20230109_082307.png'),
(2244, 283, 14, '17.86', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082318.png'),
(2245, 284, 45, '42.50', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082327.png'),
(2268, 285, 45, '4.95', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082334.png'),
(2269, 286, 78, '14.50', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082416.png'),
(2270, 287, 54, '20.50', 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082442.png'),
(2271, 288, 47, '153.75', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_092158.png'),
(2272, 289, 47, '120.50', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_092210.png'),
(2273, 290, 104, '88.50', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_092218.png'),
(2274, 290, 47, '79.00', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_092227.png'),
(2275, 292, 78, '58.00', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_093720.png'),
(2276, 292, 47, '39.25', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_093807.png'),
(2277, 294, 45, '35.75', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_093816.png'),
(2278, 295, 45, '21.75', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_093826.png'),
(2279, 295, 47, '19.75', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_093835.png'),
(2280, 297, 48, '17.75', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_093843.png'),
(2281, 298, 51, '14.75', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_093853.png'),
(2282, 299, 45, '14.00', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_093901.png'),
(2283, 300, 45, '12.50', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_093926.png'),
(2284, 301, 56, '12.28', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_093935.png'),
(2285, 302, 47, '12.00', 'Available', '2023-01-18', '2023-02-12', 2, 'Screenshot_20230109_093943.png'),
(2286, 303, 87, '12.00', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_093950.png'),
(2287, 303, 59, '11.75', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_093958.png'),
(2288, 305, 56, '10.71', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_094010.png'),
(2289, 307, 56, '9.25', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_094018.png'),
(2290, 307, 54, '9.25', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_094027.png'),
(2291, 308, 45, '8.93', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_094034.png'),
(2292, 309, 45, '8.75', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_094042.png'),
(2293, 310, 123, '247.50', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_094050.png'),
(2294, 311, 56, '7.00', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_094058.png'),
(2295, 310, 26, '6.25', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_094112.png'),
(2296, 313, 46, '50.00', 'Available', '2023-01-18', '2023-12-31', 2, 'Screenshot_20230109_094120.png'),
(2297, 314, 65, '4.75', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_094127.png'),
(2298, 314, 65, '4.50', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_094134.png'),
(2299, 317, 56, '55.00', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_094142.png'),
(2300, 317, 59, '2.50', 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_094152.png'),
(2301, 119, 234, '70.00', 'Available', '2023-01-18', '2023-02-11', 1, 'Screenshot_20230109_094105.png');

-- --------------------------------------------------------

--
-- Table structure for table `packaging`
--

CREATE TABLE `packaging` (
  `pack_id` int(11) NOT NULL,
  `pack_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(208, 'Boxes'),
(209, 'Tube'),
(210, 'Set');

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
  `cover` varchar(100) DEFAULT NULL,
  `map` varchar(255) NOT NULL,
  `direction` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pharmacy_details`
--

INSERT INTO `pharmacy_details` (`pharm_id`, `pharm_name`, `pharm_address`, `pharm_no`, `pharm_email`, `pharm_open`, `pharm_close`, `cover`, `map`, `direction`) VALUES
(1, 'RM Health & Med', '66RW+43X, Tibanga Highway, Iligan City', '0906839123', 'rmpharmacy@gmail.com', '08:00:00', '22:00:00', 'rm.png', 'RM Pharmacy, Tibanga, Iligan City', '/66RW%2B43X+RM+Pharmacy+Health+%26+Med,+Iligan+City,+Lanao+del+Norte/@8.2403664,124.2430481'),
(2, '18th Avenue Pharmacy', '66RW+HMG, Tibanga Highway, Iligan City', '(063) 228-6293', '18thavepharmacy@gmail.com', '08:00:00', '22:00:00', '18thave.jpg', '18th Avenue Pharmacy, Tibanga, Iligan City', '/66RW%2BHMG+18th+Avenue+Pharmacy,+Tibanga+Highway,+Iligan+City,+Lanao+del+Norte/@8.2414538,124.2445');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pharmacy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `pharmacy`) VALUES
(1, 'RM Health & Med Pharmacy', 'rmpharmacy@gmail.com', 'medfind', 1),
(2, '18th Avenue Pharmacy', '18thavenue@gmail.com', 'medfind', 2);

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
  ADD PRIMARY KEY (`med_id`),
  ADD KEY `med_pack` (`med_pack`,`med_class`),
  ADD KEY `med_class` (`med_class`);

--
-- Indexes for table `med_pharm`
--
ALTER TABLE `med_pharm`
  ADD PRIMARY KEY (`med_pharm_id`),
  ADD KEY `med_name` (`med_name`,`pharmacy`),
  ADD KEY `pharmacy` (`pharmacy`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pharmacy` (`pharmacy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classification`
--
ALTER TABLE `classification`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;

--
-- AUTO_INCREMENT for table `med_pharm`
--
ALTER TABLE `med_pharm`
  MODIFY `med_pharm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2302;

--
-- AUTO_INCREMENT for table `packaging`
--
ALTER TABLE `packaging`
  MODIFY `pack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `pharmacy_details`
--
ALTER TABLE `pharmacy_details`
  MODIFY `pharm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medicine`
--
ALTER TABLE `medicine`
  ADD CONSTRAINT `medicine_ibfk_1` FOREIGN KEY (`med_class`) REFERENCES `classification` (`class_id`),
  ADD CONSTRAINT `medicine_ibfk_2` FOREIGN KEY (`med_pack`) REFERENCES `packaging` (`pack_id`);

--
-- Constraints for table `med_pharm`
--
ALTER TABLE `med_pharm`
  ADD CONSTRAINT `med_pharm_ibfk_1` FOREIGN KEY (`med_name`) REFERENCES `medicine` (`med_id`),
  ADD CONSTRAINT `med_pharm_ibfk_2` FOREIGN KEY (`pharmacy`) REFERENCES `pharmacy_details` (`pharm_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`pharmacy`) REFERENCES `pharmacy_details` (`pharm_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
