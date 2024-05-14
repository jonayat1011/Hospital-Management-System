-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 13, 2024 at 10:33 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `HMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `admin_id` varchar(20) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
('1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `Appointment`
--

CREATE TABLE `Appointment` (
  `appointment_id` varchar(50) NOT NULL,
  `patient_id` varchar(20) NOT NULL,
  `doctor_id` varchar(20) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` varchar(10) NOT NULL,
  `appointment_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Appointment`
--

INSERT INTO `Appointment` (`appointment_id`, `patient_id`, `doctor_id`, `appointment_date`, `appointment_time`, `appointment_status`) VALUES
('1', '3', '2', '2024-05-05', '15:30', 'confirmed'),
('2', '3', '2', '2024-05-06', '11:30', 'cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `Billing`
--

CREATE TABLE `Billing` (
  `billing_id` varchar(20) NOT NULL,
  `billing_receipt` varchar(1000) NOT NULL,
  `billing_status` varchar(20) NOT NULL,
  `patieni_id` varchar(20) NOT NULL,
  `billing_amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Billing`
--

INSERT INTO `Billing` (`billing_id`, `billing_receipt`, `billing_status`, `patieni_id`, `billing_amount`) VALUES
('1', '', 'paid', '3', 200),
('2', '', 'due', '3', 100),
('3', '', 'paid', '3', 9000);

-- --------------------------------------------------------

--
-- Table structure for table `Department`
--

CREATE TABLE `Department` (
  `department_id` varchar(20) NOT NULL,
  `department_name` varchar(50) NOT NULL,
  `department_ description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Department`
--

INSERT INTO `Department` (`department_id`, `department_name`, `department_ description`) VALUES
('1', 'cardiology', ' a branch of medicine that concerns diseases and disorders of the heart');

-- --------------------------------------------------------

--
-- Table structure for table `Doctor`
--

CREATE TABLE `Doctor` (
  `doctor_id` varchar(20) NOT NULL,
  `doctor_username` varchar(100) NOT NULL,
  `doctor_password` varchar(100) NOT NULL,
  `department_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Doctor`
--

INSERT INTO `Doctor` (`doctor_id`, `doctor_username`, `doctor_password`, `department_id`) VALUES
('2', '2', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `Inventory`
--

CREATE TABLE `Inventory` (
  `inventory_id` varchar(20) NOT NULL,
  `inventory_name` varchar(100) NOT NULL,
  `available_inventory_quantity` int(20) NOT NULL,
  `inventory_ description` varchar(500) NOT NULL,
  `used_inventory_quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Inventory`
--

INSERT INTO `Inventory` (`inventory_id`, `inventory_name`, `available_inventory_quantity`, `inventory_ description`, `used_inventory_quantity`) VALUES
('1', 'bandage', 1000, 'a strip of woven material used to bind up a wound or to protect an injured part of the body.', 10);

-- --------------------------------------------------------

--
-- Table structure for table `MedicalRecord`
--

CREATE TABLE `MedicalRecord` (
  `record_id` varchar(20) NOT NULL,
  `patient_id` varchar(20) NOT NULL,
  `doctor_id` varchar(20) NOT NULL,
  `record_date` varchar(20) NOT NULL,
  `details` varchar(10000) NOT NULL,
  `patient_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `MedicalRecord`
--

INSERT INTO `MedicalRecord` (`record_id`, `patient_id`, `doctor_id`, `record_date`, `details`, `patient_status`) VALUES
('1', '3', '2', '05/05/2024', '1. fever\r\n2. cold', 'admitted');

-- --------------------------------------------------------

--
-- Table structure for table `Patient`
--

CREATE TABLE `Patient` (
  `patient_id` varchar(20) NOT NULL,
  `patient_username` varchar(100) NOT NULL,
  `patient_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Patient`
--

INSERT INTO `Patient` (`patient_id`, `patient_username`, `patient_password`) VALUES
('3', '3', '3');

-- --------------------------------------------------------

--
-- Table structure for table `Staff`
--

CREATE TABLE `Staff` (
  `staff_id` varchar(20) NOT NULL,
  `staff_username` varchar(100) NOT NULL,
  `staff_password` varchar(100) NOT NULL,
  `staff_role` varchar(50) NOT NULL,
  `department_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Staff`
--

INSERT INTO `Staff` (`staff_id`, `staff_username`, `staff_password`, `staff_role`, `department_id`) VALUES
('4', '4', '4', '4', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `user_age` int(3) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_ phone` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `ProfilePicture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_type`, `user_age`, `user_gender`, `user_ phone`, `user_email`, `ProfilePicture`) VALUES
('1', '1', 'admin', 1, '1', 1, '1', '1'),
('2', '2', 'doctor', 2, '2', 2, '2', '2'),
('3', '3', 'patient', 3, '3', 3, '3', '3'),
('4', '4', 'staff', 4, '4', 4, '4', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `Appointment`
--
ALTER TABLE `Appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `Billing`
--
ALTER TABLE `Billing`
  ADD PRIMARY KEY (`billing_id`);

--
-- Indexes for table `Department`
--
ALTER TABLE `Department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `Doctor`
--
ALTER TABLE `Doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `Inventory`
--
ALTER TABLE `Inventory`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Indexes for table `MedicalRecord`
--
ALTER TABLE `MedicalRecord`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `Patient`
--
ALTER TABLE `Patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `Staff`
--
ALTER TABLE `Staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
