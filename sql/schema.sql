-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2021 at 08:04 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(15) UNSIGNED NOT NULL,
  `fname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` blob DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `fname`, `lname`, `email_id`, `password`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Sameer', 'Khowaja', 'sameerkhowaja@gmail.com', 'password', '', '2021-01-18 04:46:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(15) NOT NULL,
  `patient_id` int(15) NOT NULL,
  `doctor_id` int(15) NOT NULL,
  `receptionist_id` int(15) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `confrim` varchar(10) NOT NULL,
  `current_datetime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_results`
--

CREATE TABLE `appointment_results` (
  `appointment_result_id` int(15) NOT NULL,
  `appointment_id` int(15) NOT NULL,
  `prescribe_medicine` varchar(500) NOT NULL,
  `prescribe_test` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `result_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `beds`
--

CREATE TABLE `beds` (
  `bed_id` int(15) NOT NULL,
  `bed_number` varchar(100) NOT NULL,
  `room_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(15) NOT NULL,
  `primary_id` int(15) NOT NULL,
  `specialist` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hospital_datas`
--

CREATE TABLE `hospital_datas` (
  `primary_id` int(15) NOT NULL,
  `type_id` int(15) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `cnic` varchar(100) NOT NULL,
  `email_id` varchar(200) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` blob DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lab_technicians`
--

CREATE TABLE `lab_technicians` (
  `technician_id` int(15) NOT NULL,
  `primary_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lab_tests`
--

CREATE TABLE `lab_tests` (
  `lab_test_id` int(15) NOT NULL,
  `test_id` int(15) NOT NULL,
  `patient_id` int(15) NOT NULL,
  `doctor_id` int(15) NOT NULL,
  `technician_id` int(15) NOT NULL,
  `test_date` date NOT NULL,
  `test_time` time NOT NULL,
  `result_date` date NOT NULL,
  `result_time` time NOT NULL,
  `result_posted` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lab_test_names`
--

CREATE TABLE `lab_test_names` (
  `test_id` int(15) NOT NULL,
  `test_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lab_test_reports`
--

CREATE TABLE `lab_test_reports` (
  `lab_report_id` int(15) NOT NULL,
  `lab_test_id` int(15) NOT NULL,
  `report_image` blob NOT NULL,
  `description` varchar(500) NOT NULL,
  `result_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(15) NOT NULL,
  `primary_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient_addmissions`
--

CREATE TABLE `patient_addmissions` (
  `admission_id` int(15) NOT NULL,
  `patient_id` int(15) NOT NULL,
  `room_id` int(15) NOT NULL,
  `bed_id` int(15) NOT NULL,
  `date_admitted` timestamp NULL DEFAULT NULL,
  `date_discharged` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `receptionists`
--

CREATE TABLE `receptionists` (
  `receptionist_id` int(15) NOT NULL,
  `primary_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(15) NOT NULL,
  `room_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `type_id` int(15) NOT NULL,
  `type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`type_id`, `type_name`) VALUES
(1, 'Admin'),
(2, 'Doctor'),
(3, 'Patient'),
(4, 'Receptionist'),
(5, 'Lab Technician');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `appointment_results`
--
ALTER TABLE `appointment_results`
  ADD PRIMARY KEY (`appointment_result_id`);

--
-- Indexes for table `beds`
--
ALTER TABLE `beds`
  ADD PRIMARY KEY (`bed_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `hospital_datas`
--
ALTER TABLE `hospital_datas`
  ADD PRIMARY KEY (`primary_id`);

--
-- Indexes for table `lab_technicians`
--
ALTER TABLE `lab_technicians`
  ADD PRIMARY KEY (`technician_id`);

--
-- Indexes for table `lab_tests`
--
ALTER TABLE `lab_tests`
  ADD PRIMARY KEY (`lab_test_id`);

--
-- Indexes for table `lab_test_names`
--
ALTER TABLE `lab_test_names`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `lab_test_reports`
--
ALTER TABLE `lab_test_reports`
  ADD PRIMARY KEY (`lab_report_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `patient_addmissions`
--
ALTER TABLE `patient_addmissions`
  ADD PRIMARY KEY (`admission_id`);

--
-- Indexes for table `receptionists`
--
ALTER TABLE `receptionists`
  ADD PRIMARY KEY (`receptionist_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointment_results`
--
ALTER TABLE `appointment_results`
  MODIFY `appointment_result_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `beds`
--
ALTER TABLE `beds`
  MODIFY `bed_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospital_datas`
--
ALTER TABLE `hospital_datas`
  MODIFY `primary_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_technicians`
--
ALTER TABLE `lab_technicians`
  MODIFY `technician_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_tests`
--
ALTER TABLE `lab_tests`
  MODIFY `lab_test_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_test_names`
--
ALTER TABLE `lab_test_names`
  MODIFY `test_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_test_reports`
--
ALTER TABLE `lab_test_reports`
  MODIFY `lab_report_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_addmissions`
--
ALTER TABLE `patient_addmissions`
  MODIFY `admission_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receptionists`
--
ALTER TABLE `receptionists`
  MODIFY `receptionist_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `type_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
