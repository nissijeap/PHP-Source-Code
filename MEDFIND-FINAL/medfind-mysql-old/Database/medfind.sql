-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2023 at 12:45 PM
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
-- Database: `medfind`
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
  `med_quan` int(11) DEFAULT NULL,
  `med_price` decimal(10,2) DEFAULT NULL,
  `med_pack` int(11) DEFAULT NULL,
  `med_dosage` varchar(50) DEFAULT NULL,
  `med_class` int(50) DEFAULT NULL,
  `med_stat` varchar(50) DEFAULT NULL,
  `med_added` date DEFAULT NULL,
  `med_exp` date DEFAULT NULL,
  `pharmacy` int(11) DEFAULT NULL,
  `images` varchar(255) NOT NULL,
  `med_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`med_id`, `med_name`, `med_quan`, `med_price`, `med_pack`, `med_dosage`, `med_class`, `med_stat`, `med_added`, `med_exp`, `pharmacy`, `images`, `med_desc`) VALUES
(119, 'Biogesic', 120, '140.00', 202, '250mg/60mL', 101, 'Available', '2022-12-15', '2024-07-23', 2, 'Biogesic 60ml Susp.jpg', 'medicine for flu'),
(120, 'Biogesic', 500, '4.50', 203, '500mg', 102, 'Available', '2022-12-15', '2023-08-15', 2, 'Biogesic-Tablet-Product-Shot-New.jpg', 'medicine for flu'),
(121, 'BL Cream Rx', 34, '44.00', 207, '7g', 110, 'Available', '2022-12-15', '2024-03-13', 2, 'BL Cream Rx.jpg', 'moisturizer, diaper rash, skin burns'),
(122, 'BL Cream', 68, '60.00', 209, '10g', 110, 'Available', '2022-12-15', '2025-03-11', 2, 'BL Cream Tube.jpg', 'moisturizer, diaper rash, skin burns'),
(123, 'Blood Set Terumo', 10, '120.00', 210, 'n/a', 104, 'Available', '2022-12-15', '2024-06-15', 2, 'Blood set.png', ''),
(124, 'Bonamine', 280, '15.00', 203, '25mg', 102, 'Available', '2022-12-15', '2024-12-25', 2, 'Bonamin 25mg chew.webp', 'prevention and relief of nausea, dizziness and vomiting associated with motion sickness'),
(125, 'Boostavit', 0, '208.00', 202, '120mL', 101, 'Not Available', '2022-12-15', '2022-12-31', 2, 'Boostavit 120ml.jpg', ''),
(126, 'Broncaire Expectorant', 59, '115.00', 202, '60mL', 101, 'Available', '2022-12-15', '2022-12-05', 2, 'Broncaire 60ml.webp', ''),
(127, 'Bronchofen', 270, '121.00', 202, '1mg/0.8mg/mL/15mL', 106, 'Available', '2022-12-15', '2025-01-13', 2, 'Bronchofen-Drops.jpg', ''),
(128, 'Burinex', 100, '25.90', 203, '1mg', 102, 'Available', '2022-12-15', '2024-08-30', 2, 'Burinex.jpg', ''),
(129, 'Buscopan', 15, '28.00', 203, '10mg', 102, 'Available', '2022-12-15', '2022-12-10', 2, 'Buscopan 10 mg.jpg', ''),
(130, 'Aciclovir', 5, '7.50', 203, '200mg', 102, 'Available', '2022-12-15', '2022-12-05', 1, 'Aciclovir.jpg', ''),
(131, 'Aciclovir', 38, '20.25', 203, '400mg', 102, 'Available', '2022-12-15', '2024-08-01', 1, 'aciclovir-400mg.jpg', ''),
(132, 'Advil Liquigel', 7, '36.00', 203, '200mg', 103, 'Available', '2022-12-15', '2024-05-05', 1, 'advil 200mg.webp', ''),
(133, 'Alaxan FR', 53, '8.00', 203, '200mg/325mg', 103, 'Available', '2022-12-15', '2025-06-13', 1, 'alaxan capsule 200-325 mg.webp', ''),
(134, 'Ambroxol', 234, '1.00', 203, '30mg', 102, 'Available', '2022-12-15', '2022-12-01', 1, 'ambroxol 30mg.jpg', ''),
(135, 'Ambroxol', 167, '12.00', 203, '75mg', 102, 'Available', '2022-12-15', '2023-10-04', 1, 'ambroxol 75mg.webp', ''),
(136, 'Ambroxol', 56, '30.00', 207, '15ml', 106, 'Available', '2022-12-15', '2024-09-20', 1, 'ambroxol drop.png', ''),
(137, 'Biogesic', 65, '3.60', 203, '500mg', 102, 'Available', '2022-12-15', '2024-01-30', 1, 'Biogesic-Tablet-Product-Shot-New.jpg', ''),
(138, 'Advil', 673, '23.00', 203, '250mg', 102, 'Available', '2022-12-16', '2022-12-31', 1, 'advil 200mg.webp', ''),
(139, 'Enalapril', 25, '16.00', 203, '20mg', 102, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_044058.png', 'hypertension, heart failure'),
(140, 'Rebamipide', 54, '20.00', 203, '100mg', 102, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_044351.png', 'hyperacidity, ulcer'),
(141, 'Aciclovir', 0, '68.00', 203, '400mg', 102, 'Not Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_044422.png', 'chicken pox, herpes infection'),
(142, 'Aciclovir', 12, '125.00', 203, '800mg', 102, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_044525.png', 'chicken pox, herpes infection'),
(143, 'Ambroxol', 15, '120.00', 207, '15mg/120ml', 112, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_044544.png', 'cough'),
(144, 'Ambroxol', 16, '72.00', 207, '15mg/60ml', 112, 'Available', '2023-01-18', '2023-02-11', 1, 'Screenshot_20230109_044604.png', 'cough'),
(145, 'Ambroxol', 89, '8.00', 203, '30mg', 102, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_044630.png', 'cough'),
(146, 'Ambroxol', 41, '150.00', 207, '30mg/120ml', 112, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_044650.png', 'cough'),
(147, 'Ambroxol', 21, '80.00', 207, '30mg/60ml', 112, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_044705.png', 'cough'),
(148, 'Amlodipine', 91, '9.00', 203, '10mg', 102, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_050436.png', 'heart conditions'),
(149, 'Amlodipine', 21, '6.47', 203, '10mg', 102, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_050457.png', 'heart conditions'),
(150, 'Amoxicillin', 42, '5.50', 203, '250mg', 103, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_050522.png', 'antibacterial'),
(151, 'Amoxicillin', 154, '7.50', 203, '500mg', 103, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_050547.png', 'antibacterial'),
(152, 'Appetite Stimulant', 45, '15.00', 203, 'n/a', 102, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_050605.png', 'vitamins'),
(153, 'Ascorbic + Zinc', 120, '6.00', 203, '500mg', 102, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_050617.png', 'adult vitamins'),
(154, 'Ascorbic Acid', 41, '95.00', 207, '100mg/120ml', 112, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_050635.png', 'vitamins'),
(155, 'Ascorbic Acid', 121, '2.25', 203, '500mg', 102, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_050653.png', 'vitamins'),
(156, 'Zinc-C', 54, '106.00', 207, '120ml', 112, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_050714.png', 'vitamins'),
(157, 'Atenolol', 41, '12.00', 203, '100mg', 102, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_050732.png', 'heart conditions'),
(158, 'Atenolol', 41, '6.50', 203, '50mg', 102, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_050750.png', 'heart conditions'),
(159, 'Atorvastatin', 96, '13.00', 203, '10mg', 102, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_050807.png', 'heart conditions'),
(160, 'Atorvastatin', 47, '16.50', 203, '20mg', 102, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_050828.png', 'heart conditions'),
(161, 'Atorvastatin', 47, '22.75', 203, '40mg', 102, 'Available', '2023-01-18', '2023-02-11', 1, 'Screenshot_20230109_050849.png', 'heart conditions'),
(162, 'Azithromycin', 74, '106.00', 203, '500mg', 102, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_060142.png', 'infections'),
(163, 'Betamethasone', 45, '15.00', 203, '250mcg/2mg', 102, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_060156.png', 'allergy'),
(164, 'Betamethasone', 21, '245.00', 209, '500mcg/5g', 110, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_060206.png', 'dermatologicals'),
(165, 'Bisacodyl', 74, '15.00', 203, '5mg', 102, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_060306.png', 'constipation'),
(166, 'Bisoprolol', 45, '15.00', 203, '5mg', 102, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_060317.png', 'heart conditions'),
(167, 'Captopril', 87, '11.00', 203, '25mg', 102, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_060329.png', 'heart conditions'),
(168, 'Carbamazepine', 74, '10.00', 203, '200mg', 102, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_060342.png', 'anti-epilepsy, anti-convulsant'),
(169, 'Carbocisteine', 85, '6.50', 203, '500mg', 102, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_060352.png', 'cough'),
(170, 'Cefaclor', 12, '630.00', 207, '250mg', 114, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_060402.png', 'infections'),
(171, 'Cefalexin', 41, '103.75', 207, '100mg/10ml', 106, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_060421.png', 'infections'),
(172, 'Cefalexin', 45, '114.00', 207, '125mg/60ml', 114, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_060430.png', 'infections'),
(173, 'Cefalexin', 74, '14.50', 203, '250mg', 103, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_060442.png', 'anti-infectives'),
(174, 'Cefalexin', 41, '186.00', 207, '250mg/60ml', 114, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_061931.png', 'infections'),
(175, 'Cefepime', 12, '1400.00', 201, '1g', 115, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_061943.png', 'infections, antibacterial'),
(176, 'Cefepime', 11, '2700.00', 201, '2g', 115, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_061953.png', 'infections, antibacterial'),
(177, 'Cefepime', 21, '90.00', 203, '200mg', 103, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_062002.png', 'infections, antibacterial'),
(178, 'Ceftriaxone', 4, '770.71', 201, '1g', 101, 'Available', '2023-01-18', '2023-12-21', 1, 'Screenshot_20230109_062011.png', 'infections, antibacterial'),
(179, 'Cefuroxime', 7, '242.86', 201, '150mg', 115, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_062023.png', 'infections, antibacterial'),
(180, 'Cefuroxime', 74, '31.00', 203, '250mg', 102, 'Available', '2023-01-18', '2023-12-21', 1, 'Screenshot_20230109_062036.png', 'infections, antibacterial'),
(181, 'Cefuroxime', 74, '52.75', 203, '500mg', 102, 'Available', '2023-01-18', '2023-12-21', 1, 'Screenshot_20230109_062044.png', 'infections, antibacterial'),
(182, 'Celecoxib', 45, '23.50', 203, '200mg', 103, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_062055.png', 'body pain, arthritis'),
(183, 'Cetirizine', 112, '16.00', 203, '10mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_062106.png', 'allergy'),
(184, 'Cetirizine', 54, '200.00', 207, '5mg/60ml', 112, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_062114.png', 'allergy'),
(185, 'Cinnarizine', 41, '36.00', 203, '25mg', 102, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_062133.png', 'anti-epilepsy, anti-convulsant'),
(186, 'Ciprofloxacin', 41, '24.26', 203, '500mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_063829.png', 'infections, antibacterial'),
(187, 'Clarithromycin', 74, '57.55', 203, '500mg', 102, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_063843.png', 'infections, antibacterial'),
(188, 'Clindamycin', 12, '21.00', 203, '150mg', 103, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_063853.png', 'infections, antibacterial'),
(189, 'Clindamycin', 41, '37.75', 203, '300mg', 103, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_063904.png', 'infections, antibacterial'),
(190, 'Clobetasol Propionate', 14, '250.00', 209, '500mcg/10g', 110, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_063914.png', 'antipruritic'),
(191, 'Clonidine', 41, '25.00', 203, '150mg', 102, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_063925.png', 'antihypersentive'),
(192, 'Clonidine', 41, '17.00', 203, '75mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_063935.png', 'antihypertensive, heart conditions'),
(193, 'Clopidogrel', 47, '20.50', 203, '75mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_063943.png', 'antihypertensive, heart conditions'),
(194, 'Cloxacillin', 41, '17.00', 203, '500mg', 103, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_063952.png', 'infections, antibacterial'),
(195, 'Co-amoxiclav', 74, '58.75', 203, '1g', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_064001.png', 'infections, antibacterial'),
(196, 'Co-amoxiclav', 45, '36.50', 203, '625mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_064013.png', 'infections, antibacterial'),
(197, 'Colchicine', 78, '4.35', 203, '500mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_064022.png', 'anti-gout'),
(198, 'diclofenac', 14, '16.00', 203, '50mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_064031.png', 'body pain, arthritis'),
(199, 'Dicycloverine', 74, '10.00', 202, '10mg', 102, 'Available', '2023-01-18', '2023-12-31', 1, 'Screenshot_20230109_064040.png', 'anticholinergic'),
(200, 'Diphenhydramine', 121, '8.50', 203, '50mg', 103, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_064050.png', 'allergy'),
(201, 'Domperidone', 65, '13.50', 203, '10mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_064059.png', 'anti-emetic'),
(202, 'Doxycycline', 14, '45.00', 203, '100mg', 103, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_064109.png', 'infections, antibacterial'),
(203, 'Erythromycin', 87, '18.50', 203, '500mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_064117.png', 'infections, antibacterial'),
(204, 'Escitalopram', 47, '45.20', 203, '10mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_064126.png', 'anti-epilepsy, anti-convulsant'),
(205, 'Felodipine', 74, '12.75', 203, '5mg', 102, 'Available', '2023-01-18', '2023-12-13', 1, 'Screenshot_20230109_071027.png', 'heart conditions'),
(206, 'Fibermate', 53, '20.75', 204, 'n/a', 115, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071039.png', 'supplement'),
(207, 'Fluoxetine', 47, '30.00', 203, '20mg', 103, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071049.png', 'anti-epilepsy, anti-convulsant'),
(208, 'Folic Acid', 120, '5.00', 203, '5mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071057.png', 'vitamins'),
(209, 'Frusema', 45, '3.44', 203, '10mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071105.png', 'hypertension'),
(210, 'Frusema', 41, '5.20', 203, '40mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071116.png', 'hypertension'),
(211, 'Glibenclamide', 74, '5.80', 203, '5mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071124.png', 'diabetes'),
(212, 'Gliclazide', 45, '6.75', 203, '80mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071133.png', 'diabetes'),
(213, 'Glimepiride', 45, '11.50', 203, '2mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071153.png', 'diabetes'),
(214, 'Glimepiride', 41, '12.50', 203, '3mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071201.png', 'diabetes'),
(215, 'Glucosamine', 74, '50.00', 204, '1.5g', 115, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071209.png', 'body pain, arthritis'),
(216, 'Hexetidine', 75, '148.00', 207, '120ml', 112, 'Available', '2023-01-18', '2023-12-14', 1, 'Screenshot_20230109_071217.png', 'sore throat'),
(217, 'Hexeditine', 41, '89.00', 207, '60ml', 112, 'Available', '2023-01-18', '2023-12-14', 1, 'Screenshot_20230109_071225.png', 'sore throat'),
(218, 'Hydrocort', 14, '215.00', 209, '10mg/15g', 110, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071235.png', 'allergy'),
(219, 'Ibuprofen', 47, '4.50', 203, '200mg', 103, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071309.png', 'somatics'),
(220, 'Irbesartan', 47, '17.20', 203, '150mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071317.png', 'cardio'),
(221, 'Irbesartan', 120, '28.20', 203, '300mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071325.png', 'cardio'),
(222, 'Iron + Folic', 74, '4.00', 203, 'n/a', 102, 'Available', '2023-01-18', '2023-02-21', 1, 'Screenshot_20230109_071335.png', 'vitamins'),
(223, 'Isoniazid + Pyridoxine Hydrochloride', 41, '50.00', 207, '200mg/12mg', 112, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071343.png', 'tuberculosis'),
(224, 'Lagundi', 23, '136.50', 207, '120ml', 112, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071349.png', 'anti-cough, anti-asthma, cough'),
(225, 'Lagundi', 41, '94.50', 207, '60ml', 112, 'Available', '2023-01-18', '2023-12-04', 1, 'Screenshot_20230109_071359.png', 'anti-cough, anti-asthma, cough'),
(226, 'Lansoprazole', 74, '76.67', 203, '30mg', 103, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071459.png', 'inhibitor'),
(227, 'Levocetirizine', 12, '18.00', 203, '5mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071506.png', 'allergy'),
(228, 'Levofloxacin', 14, '54.00', 203, '500mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071516.png', 'infections, antibacterial'),
(229, 'Loratadine', 41, '19.00', 203, '10mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071525.png', 'allergy'),
(230, 'Losartan + Hydrochlorothiazide', 47, '16.25', 203, '100mg', 102, 'Available', '2023-01-18', '2023-10-10', 1, 'Screenshot_20230109_071535.png', 'heart conditions'),
(231, 'Losartan + Hydrochlorothiazide', 41, '13.25', 203, '50mg', 102, 'Available', '2023-01-18', '2023-10-10', 1, 'Screenshot_20230109_071544.png', 'heart conditions'),
(232, 'Losartan', 132, '15.23', 203, '100mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071553.png', 'heart conditions'),
(233, 'Losartan', 42, '11.66', 203, '50mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071601.png', 'heart conditions'),
(234, 'Mefenamic Acid', 146, '3.75', 203, '250mg', 102, 'Available', '2023-01-18', '2023-10-10', 1, 'Screenshot_20230109_071610.png', 'body pain, arthritis'),
(235, 'Mefenamic Acid', 141, '4.75', 203, '500mg', 102, 'Available', '2023-01-18', '2023-10-10', 1, 'Screenshot_20230109_071616.png', 'body pain, arthritis'),
(236, 'Meloxicam', 41, '43.50', 203, '15mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071624.png', 'body pain, arthritis'),
(237, 'Meloxicam', 45, '29.00', 203, '7.5mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071632.png', 'body pain, arthritis'),
(238, 'Meropenem', 15, '1600.00', 201, '1g', 115, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_071924.png', 'anti-infectives, infections'),
(239, 'Meropenem', 11, '950.00', 201, '500mg', 115, 'Available', '2023-01-18', '2023-10-12', 1, 'Screenshot_20230109_071934.png', 'anti-infectives, infections'),
(240, 'Metformin', 121, '3.50', 203, '500mg', 102, 'Available', '2023-01-18', '2023-10-10', 1, 'Screenshot_20230109_071944.png', 'diabetes'),
(241, 'Metformin', 124, '7.50', 203, '850mg', 102, 'Available', '2023-01-18', '2023-10-10', 1, 'Screenshot_20230109_071952.png', 'diabetes'),
(242, 'Metformin', 43, '6.25', 203, '500mg', 102, 'Available', '2023-01-18', '2023-10-10', 1, 'Screenshot_20230109_072001.png', 'diabetes'),
(243, 'Metropolol Tartrate', 41, '4.90', 203, '100mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072011.png', 'heart conditions'),
(244, 'Metropolol Tartrate', 12, '3.00', 203, '50mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072018.png', 'heart conditions'),
(245, 'Metronidazole', 14, '328.00', 209, '10mg/10g', 116, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072027.png', 'dermatologicals'),
(246, 'Metronidazole', 54, '14.00', 203, '500mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072039.png', 'amoebiasis'),
(247, 'Mometasone', 12, '290.00', 209, '5g', 110, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072137.png', 'dermatologicals'),
(248, 'Montelukast', 54, '32.00', 203, '10mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072146.png', 'asthma'),
(249, 'Montelukast Chew', 45, '22.00', 203, '5mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072154.png', 'asthma'),
(250, 'Multivitamins + CGF', 51, '105.00', 207, '120ml', 112, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072207.png', 'vitamins'),
(251, 'Mupirocin', 14, '225.00', 209, '5g', 110, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072218.png', 'anti-infectives, infections'),
(252, 'Naproxen Sodium', 41, '13.00', 203, '500mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072230.png', 'body pain, arthritis'),
(253, 'Neutracid', 41, '3.00', 203, '200mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072240.png', 'hyperacidity, ulcer'),
(254, 'Nicardia XL', 54, '31.25', 203, '30mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072248.png', 'cardio'),
(255, 'Omeprazole', 41, '27.00', 203, '20mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072256.png', 'hyperacidity, ulcer'),
(256, 'Omeprazole', 14, '39.00', 203, '40mg', 103, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072309.png', 'hyperacidity, ulcer'),
(257, 'Pantoprazole', 14, '730.00', 201, '40mg', 115, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072323.png', 'hyperacidity, ulcer'),
(258, 'Paracetamol', 24, '50.00', 207, '120mg/60ml', 112, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072332.png', 'fever, pain'),
(259, 'Paracetamol', 145, '9.50', 209, '125mg', 108, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072341.png', 'fever, pain'),
(260, 'Paracetamol', 14, '75.00', 207, '250mg/60ml', 112, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072349.png', 'fever, pain'),
(261, 'Paracetamol', 45, '2.50', 203, '500mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_072358.png', 'fever, pain'),
(262, 'Paramax', 45, '5.00', 203, '325mg/200mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_081924.png', 'fever, headache'),
(263, 'Potassium Citrate', 45, '14.88', 203, 'n/a', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_081936.png', 'anti-urolithic'),
(264, 'Povidone Iodine 30%', 17, '55.00', 202, '30ml', 101, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_081944.png', 'home remedies'),
(265, 'Povidone Iodine 30%', 15, '90.00', 202, '60ml', 101, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_081953.png', 'home remedies'),
(266, 'Pregabalin', 45, '52.90', 203, '150mg', 103, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082038.png', 'antiepileptic'),
(267, 'Pregabalin', 12, '36.61', 203, '75mg', 103, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082048.png', 'antiepileptic'),
(268, 'Risperidone', 45, '75.00', 203, '2mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082105.png', 'anti-epilepsy, anti-convulsant'),
(269, 'Rosuvastatin', 26, '28.00', 203, '10mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082113.png', 'cholesterol'),
(270, 'Rosuvastatin', 74, '34.00', 203, '20mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082121.png', 'cholesterol'),
(271, 'Salbutamol', 45, '4.00', 203, '2mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082129.png', 'asthma'),
(272, 'Sildenafil', 56, '223.21', 203, '100mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082137.png', 'erectile dysfunction'),
(273, 'Sildenafil', 42, '133.93', 203, '50mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082149.png', 'erectile dysfunction'),
(274, 'Simvastatin', 45, '16.00', 203, '20mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082200.png', 'heart conditions'),
(275, 'Simvastatin', 47, '24.00', 203, '40mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082208.png', 'heart conditions'),
(276, 'Terazosin', 78, '26.79', 203, '2mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082216.png', 'prostate enlargement'),
(277, 'Terazosin', 46, '32.14', 203, '5mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082224.png', 'prostate enlargement'),
(278, 'Tolnaftate', 74, '250.00', 207, '10mg/15g', 110, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082232.png', 'dermatologicals'),
(279, 'Tramadol + Paracetamol', 45, '40.00', 203, '325mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082241.png', 'somatics'),
(280, 'Tri-V', 45, '157.50', 209, 'n/a', 108, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082251.png', 'anti-fungal, anti-protozoal'),
(281, 'Trimetazidine', 45, '13.39', 203, '35mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082300.png', 'heart conditions'),
(282, 'Valsartan', 14, '25.00', 203, '160mg', 102, 'Available', '2023-01-18', '2023-11-12', 1, 'Screenshot_20230109_082307.png', 'cardio'),
(283, 'Valsartan', 14, '17.86', 203, '80mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082318.png', 'cardio'),
(284, 'Verapamil', 45, '42.50', 203, '240mg', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082327.png', 'heart conditions'),
(285, 'Vitamin B Complex', 45, '4.95', 203, 'n/a', 102, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082334.png', 'vitamins'),
(286, 'Zelexin', 78, '14.50', 203, '250mg', 103, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082416.png', 'antibacterial, infections'),
(287, 'Zelexin', 54, '20.50', 203, '500mg', 103, 'Available', '2023-01-18', '2023-12-12', 1, 'Screenshot_20230109_082442.png', 'antibacterial, infections'),
(288, 'Clopidogrel', 47, '153.75', 203, '75mg', 102, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_092158.png', 'infections'),
(289, 'Losartan', 47, '120.50', 203, '100mg', 102, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_092210.png', ''),
(290, 'Losartan', 104, '88.50', 203, '50mg', 102, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_092218.png', ''),
(291, 'Ascorbic', 47, '79.00', 203, '500mg', 102, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_092227.png', 'vitamins'),
(292, 'Amlodipine', 78, '58.00', 203, '10mg', 102, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_093720.png', ''),
(293, 'Cefuroxime', 47, '39.25', 203, '500mg', 102, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_093807.png', ''),
(294, 'Clarithromycin', 45, '35.75', 203, '500mg', 102, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_093816.png', ''),
(295, 'Irbesartan', 45, '21.75', 203, '300mg', 102, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_093826.png', ''),
(296, 'Clindamycin', 47, '19.75', 203, '300mg', 102, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_093835.png', ''),
(297, 'Ciprofloxacin', 48, '17.75', 203, '500mg', 102, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_093843.png', ''),
(298, 'Clopidogrel', 47, '14.75', 203, '75mg', 102, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_093853.png', ''),
(299, 'Irbesartan', 45, '14.00', 203, '150mg', 102, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_093901.png', ''),
(300, 'Losartan', 45, '12.50', 203, '100mg', 102, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_093926.png', ''),
(301, 'Omeprazole', 56, '12.28', 203, '20mg', 102, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_093935.png', ''),
(302, 'Turmeric', 47, '12.00', 203, '500mg', 102, 'Available', '2023-01-18', '2023-02-12', 2, 'Screenshot_20230109_093943.png', 'home remedies'),
(303, 'Mangosteen + Malunggay', 87, '12.00', 203, '500mg', 102, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_093950.png', 'home remedies'),
(304, 'Clonidine', 59, '11.75', 203, '75mg', 102, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_093958.png', ''),
(305, 'Pantroprazole Sodium', 56, '10.71', 203, '40mg', 102, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_094010.png', ''),
(306, 'Amoxicillin', 56, '9.25', 203, '500mg', 102, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_094018.png', ''),
(307, 'Losartan', 54, '9.25', 203, '50mg', 102, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_094027.png', ''),
(308, 'Naproxen Sodium', 45, '8.93', 203, '550mg', 102, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_094034.png', ''),
(309, 'Simvastatin', 45, '8.75', 203, '20mg', 102, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_094042.png', ''),
(310, 'D-Alpha Vitamin E', 123, '247.50', 203, '400lu', 103, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_094050.png', ''),
(311, 'Ampalaya', 56, '7.00', 203, '500mg', 103, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_094058.png', 'home remedies'),
(312, 'Amlodipine', 26, '6.25', 203, '10mg', 102, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_094112.png', ''),
(313, 'Loperamide', 46, '50.00', 203, '2mg', 103, 'Available', '2023-01-18', '2023-12-31', 2, 'Screenshot_20230109_094120.png', ''),
(314, 'Mefenamic', 65, '4.75', 203, '500mg', 103, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_094127.png', ''),
(315, 'Ascorbic Acid', 65, '4.50', 203, '500mg', 102, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_094134.png', ''),
(316, 'Paracetamol', 56, '55.00', 203, '500mg', 102, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_094142.png', ''),
(317, 'Metropolol', 59, '2.50', 203, '50mg', 102, 'Available', '2023-01-18', '2023-12-12', 2, 'Screenshot_20230109_094152.png', ''),
(318, 'Cetirizine', 234, '70.00', 203, '10mg', 102, 'Available', '2023-01-18', '2023-02-11', 1, 'Screenshot_20230109_094105.png', 'allergy');

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
(210, 'Set'),
(211, 'sample');

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
  ADD KEY `med_pack` (`med_pack`),
  ADD KEY `med_class` (`med_class`),
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
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;

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
-- Constraints for dumped tables
--

--
-- Constraints for table `medicine`
--
ALTER TABLE `medicine`
  ADD CONSTRAINT `medicine_ibfk_1` FOREIGN KEY (`pharmacy`) REFERENCES `pharmacy_details` (`pharm_id`),
  ADD CONSTRAINT `medicine_ibfk_2` FOREIGN KEY (`med_class`) REFERENCES `classification` (`class_id`),
  ADD CONSTRAINT `medicine_ibfk_3` FOREIGN KEY (`med_pack`) REFERENCES `packaging` (`pack_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`pharmacy`) REFERENCES `pharmacy_details` (`pharm_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
