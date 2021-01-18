-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2021 at 04:58 PM
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
  `result_id` int(15) NOT NULL,
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
  `fname` int(100) NOT NULL,
  `lname` int(100) NOT NULL,
  `cnic` varchar(100) NOT NULL,
  `email_id` varchar(200) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
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
-- Table structure for table `lab_test_reports`
--

CREATE TABLE `lab_test_reports` (
  `report_id` int(15) NOT NULL,
  `test_id` int(15) NOT NULL,
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
  `addmission_id` int(15) NOT NULL,
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
  `type` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
