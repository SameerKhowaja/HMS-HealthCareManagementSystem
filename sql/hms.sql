-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2021 at 12:18 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

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
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnic` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` blob DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `fname`, `lname`, `email_id`, `cnic`, `password`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Sameer', 'Khowaja', 'sameerkhowaja@gmail.com', '1000', 'pass', NULL, '2021-05-21 09:36:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announcement_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_histories`
--

CREATE TABLE `appointment_histories` (
  `appointment_history_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_date` date NOT NULL,
  `day` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `Description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirm` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'request pending',
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_requests`
--

CREATE TABLE `appointment_requests` (
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_date` date NOT NULL,
  `day` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `Description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirm` tinyint(1) NOT NULL DEFAULT 0,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `beds`
--

CREATE TABLE `beds` (
  `bed_id` int(11) NOT NULL,
  `bed_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT 1,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_table`
--

CREATE TABLE `contact_table` (
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `primary_id` bigint(20) UNSIGNED NOT NULL,
  `specialist` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_availability`
--

CREATE TABLE `doctor_availability` (
  `doctor_available_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `monday_start` time DEFAULT NULL,
  `monday_end` time DEFAULT NULL,
  `tuesday_start` time DEFAULT NULL,
  `tuesday_end` time DEFAULT NULL,
  `wednesday_start` time DEFAULT NULL,
  `wednesday_end` time DEFAULT NULL,
  `thursday_start` time DEFAULT NULL,
  `thursday_end` time DEFAULT NULL,
  `friday_start` time DEFAULT NULL,
  `friday_end` time DEFAULT NULL,
  `saturday_start` time DEFAULT NULL,
  `saturday_end` time DEFAULT NULL,
  `sunday_start` time DEFAULT NULL,
  `sunday_end` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospital_datas`
--

CREATE TABLE `hospital_datas` (
  `primary_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` int(11) NOT NULL,
  `fname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnic` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` blob DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_report_params`
--

CREATE TABLE `lab_report_params` (
  `report_param_id` bigint(20) UNSIGNED NOT NULL,
  `param_value` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `param_id` bigint(20) UNSIGNED NOT NULL,
  `report_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_technicians`
--

CREATE TABLE `lab_technicians` (
  `technician_id` bigint(20) UNSIGNED NOT NULL,
  `primary_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_test_names`
--

CREATE TABLE `lab_test_names` (
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `test_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_type` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test_sample` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `methodology` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_test_parameters`
--

CREATE TABLE `lab_test_parameters` (
  `param_id` bigint(20) UNSIGNED NOT NULL,
  `param` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lower_bound` double(20,4) DEFAULT NULL,
  `upper_bound` double(20,4) DEFAULT NULL,
  `test_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_test_reports`
--

CREATE TABLE `lab_test_reports` (
  `report_id` bigint(20) UNSIGNED NOT NULL,
  `result` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `technician_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_test_requests`
--

CREATE TABLE `lab_test_requests` (
  `test_req_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `test_names` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`test_names`)),
  `test_performed` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`test_performed`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `medicine_id` bigint(20) UNSIGNED NOT NULL,
  `medicine` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_type` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `drug_use` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_02_01_192538_create_admins_table', 1),
(2, '2021_02_01_202031_create_types_table', 1),
(3, '2021_02_01_203203_create_hospital_datas_table', 1),
(4, '2021_02_01_204158_create_rooms_table', 1),
(5, '2021_02_01_204213_create_beds_table', 1),
(6, '2021_02_01_205445_create_contact_table_table', 1),
(7, '2021_02_01_210011_create_patients_table', 1),
(8, '2021_02_01_210022_create_doctors_table', 1),
(9, '2021_02_01_210048_create_receptionists_table', 1),
(10, '2021_02_01_210108_create_lab_technicians_table', 1),
(11, '2021_02_01_211356_create_doctor_availability_table', 1),
(12, '2021_02_04_070840_create_announcements_table', 1),
(13, '2021_02_09_153742_create_lab_test_names_table', 1),
(14, '2021_02_09_153908_create_lab_test_parameters_table', 1),
(15, '2021_02_09_153950_create_appointment_requests_table', 1),
(16, '2021_02_11_120753_create_past_events_table', 1),
(17, '2021_02_13_061605_create_appointment_histories_table', 1),
(18, '2021_02_19_065440_create_medicines_table', 1),
(19, '2021_02_19_131227_create_treatments_table', 1),
(20, '2021_02_19_132227_create_prescriptions_table', 1),
(21, '2021_03_09_043611_create_other_roles_table', 1),
(22, '2021_03_09_044242_create_others_table', 1),
(23, '2021_04_01_175538_create_lab_test_reports_table', 1),
(24, '2021_04_01_175625_create_lab_report_params_table', 1),
(25, '2021_04_08_152412_create_lab_test_requests_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `others`
--

CREATE TABLE `others` (
  `other_id` bigint(20) UNSIGNED NOT NULL,
  `primary_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `createPatient` tinyint(1) NOT NULL DEFAULT 0,
  `viewPatient` tinyint(1) NOT NULL DEFAULT 0,
  `editPatient` tinyint(1) NOT NULL DEFAULT 0,
  `deletePatient` tinyint(1) NOT NULL DEFAULT 0,
  `viewDocTime` tinyint(1) NOT NULL DEFAULT 0,
  `editDocTime` tinyint(1) NOT NULL DEFAULT 0,
  `viewAppointment` tinyint(1) NOT NULL DEFAULT 0,
  `viewLabTest` tinyint(1) NOT NULL DEFAULT 0,
  `createRoomBed` tinyint(1) NOT NULL DEFAULT 0,
  `viewRoomBed` tinyint(1) NOT NULL DEFAULT 0,
  `editRoomBed` tinyint(1) NOT NULL DEFAULT 0,
  `deleteRoomBed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_roles`
--

CREATE TABLE `other_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `roleName` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `past_events`
--

CREATE TABLE `past_events` (
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `event_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_date` date NOT NULL DEFAULT current_timestamp(),
  `event_time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `primary_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `prescription_id` bigint(20) UNSIGNED NOT NULL,
  `treatment_id` bigint(20) UNSIGNED NOT NULL,
  `medicine_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receptionists`
--

CREATE TABLE `receptionists` (
  `receptionist_id` bigint(20) UNSIGNED NOT NULL,
  `primary_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `treatments`
--

CREATE TABLE `treatments` (
  `treatment_id` bigint(20) UNSIGNED NOT NULL,
  `medical_condition` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `appointment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cured` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`type_id`, `type_name`) VALUES
(1, 'Admin'),
(3, 'Doctor'),
(5, 'Lab Technician'),
(6, 'Other'),
(2, 'Patient'),
(4, 'Receptionist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admins_email_id_unique` (`email_id`),
  ADD UNIQUE KEY `admins_cnic_unique` (`cnic`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcement_id`),
  ADD KEY `announcements_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `appointment_histories`
--
ALTER TABLE `appointment_histories`
  ADD PRIMARY KEY (`appointment_history_id`),
  ADD KEY `appointment_histories_appointment_id_foreign` (`appointment_id`),
  ADD KEY `appointment_histories_patient_id_foreign` (`patient_id`),
  ADD KEY `appointment_histories_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `appointment_requests`
--
ALTER TABLE `appointment_requests`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `appointment_requests_patient_id_foreign` (`patient_id`),
  ADD KEY `appointment_requests_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `beds`
--
ALTER TABLE `beds`
  ADD PRIMARY KEY (`bed_id`),
  ADD KEY `beds_room_id_foreign` (`room_id`);

--
-- Indexes for table `contact_table`
--
ALTER TABLE `contact_table`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`),
  ADD UNIQUE KEY `doctors_primary_id_unique` (`primary_id`);

--
-- Indexes for table `doctor_availability`
--
ALTER TABLE `doctor_availability`
  ADD PRIMARY KEY (`doctor_available_id`),
  ADD UNIQUE KEY `doctor_availability_doctor_id_unique` (`doctor_id`);

--
-- Indexes for table `hospital_datas`
--
ALTER TABLE `hospital_datas`
  ADD PRIMARY KEY (`primary_id`),
  ADD KEY `hospital_datas_type_id_foreign` (`type_id`);

--
-- Indexes for table `lab_report_params`
--
ALTER TABLE `lab_report_params`
  ADD PRIMARY KEY (`report_param_id`),
  ADD KEY `lab_report_params_param_id_foreign` (`param_id`),
  ADD KEY `lab_report_params_report_id_foreign` (`report_id`);

--
-- Indexes for table `lab_technicians`
--
ALTER TABLE `lab_technicians`
  ADD PRIMARY KEY (`technician_id`),
  ADD UNIQUE KEY `lab_technicians_primary_id_unique` (`primary_id`);

--
-- Indexes for table `lab_test_names`
--
ALTER TABLE `lab_test_names`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `lab_test_parameters`
--
ALTER TABLE `lab_test_parameters`
  ADD PRIMARY KEY (`param_id`),
  ADD KEY `lab_test_parameters_test_id_foreign` (`test_id`);

--
-- Indexes for table `lab_test_reports`
--
ALTER TABLE `lab_test_reports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `lab_test_reports_test_id_foreign` (`test_id`),
  ADD KEY `lab_test_reports_patient_id_foreign` (`patient_id`),
  ADD KEY `lab_test_reports_technician_id_foreign` (`technician_id`);

--
-- Indexes for table `lab_test_requests`
--
ALTER TABLE `lab_test_requests`
  ADD PRIMARY KEY (`test_req_id`),
  ADD KEY `lab_test_requests_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`medicine_id`),
  ADD UNIQUE KEY `medicines_medicine_unique` (`medicine`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `others`
--
ALTER TABLE `others`
  ADD PRIMARY KEY (`other_id`),
  ADD UNIQUE KEY `others_primary_id_unique` (`primary_id`),
  ADD UNIQUE KEY `others_role_id_unique` (`role_id`);

--
-- Indexes for table `other_roles`
--
ALTER TABLE `other_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `past_events`
--
ALTER TABLE `past_events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `past_events_primary_id_foreign` (`primary_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `patients_primary_id_unique` (`primary_id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`prescription_id`),
  ADD KEY `prescriptions_treatment_id_foreign` (`treatment_id`),
  ADD KEY `prescriptions_medicine_id_foreign` (`medicine_id`);

--
-- Indexes for table `receptionists`
--
ALTER TABLE `receptionists`
  ADD PRIMARY KEY (`receptionist_id`),
  ADD UNIQUE KEY `receptionists_primary_id_unique` (`primary_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD UNIQUE KEY `rooms_room_number_unique` (`room_number`);

--
-- Indexes for table `treatments`
--
ALTER TABLE `treatments`
  ADD PRIMARY KEY (`treatment_id`),
  ADD KEY `treatments_appointment_id_foreign` (`appointment_id`),
  ADD KEY `treatments_patient_id_foreign` (`patient_id`),
  ADD KEY `treatments_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`type_id`),
  ADD UNIQUE KEY `types_type_name_unique` (`type_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcement_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointment_histories`
--
ALTER TABLE `appointment_histories`
  MODIFY `appointment_history_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointment_requests`
--
ALTER TABLE `appointment_requests`
  MODIFY `appointment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `beds`
--
ALTER TABLE `beds`
  MODIFY `bed_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_table`
--
ALTER TABLE `contact_table`
  MODIFY `contact_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_availability`
--
ALTER TABLE `doctor_availability`
  MODIFY `doctor_available_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospital_datas`
--
ALTER TABLE `hospital_datas`
  MODIFY `primary_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_report_params`
--
ALTER TABLE `lab_report_params`
  MODIFY `report_param_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_technicians`
--
ALTER TABLE `lab_technicians`
  MODIFY `technician_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_test_names`
--
ALTER TABLE `lab_test_names`
  MODIFY `test_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_test_parameters`
--
ALTER TABLE `lab_test_parameters`
  MODIFY `param_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_test_reports`
--
ALTER TABLE `lab_test_reports`
  MODIFY `report_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_test_requests`
--
ALTER TABLE `lab_test_requests`
  MODIFY `test_req_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `medicine_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `others`
--
ALTER TABLE `others`
  MODIFY `other_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_roles`
--
ALTER TABLE `other_roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `past_events`
--
ALTER TABLE `past_events`
  MODIFY `event_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `prescription_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receptionists`
--
ALTER TABLE `receptionists`
  MODIFY `receptionist_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `treatments`
--
ALTER TABLE `treatments`
  MODIFY `treatment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`) ON DELETE CASCADE;

--
-- Constraints for table `appointment_histories`
--
ALTER TABLE `appointment_histories`
  ADD CONSTRAINT `appointment_histories_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointment_requests` (`appointment_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `appointment_histories_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointment_histories_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`) ON DELETE CASCADE;

--
-- Constraints for table `appointment_requests`
--
ALTER TABLE `appointment_requests`
  ADD CONSTRAINT `appointment_requests_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointment_requests_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`) ON DELETE CASCADE;

--
-- Constraints for table `beds`
--
ALTER TABLE `beds`
  ADD CONSTRAINT `beds_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`) ON DELETE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_primary_id_foreign` FOREIGN KEY (`primary_id`) REFERENCES `hospital_datas` (`primary_id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor_availability`
--
ALTER TABLE `doctor_availability`
  ADD CONSTRAINT `doctor_availability_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`) ON DELETE CASCADE;

--
-- Constraints for table `hospital_datas`
--
ALTER TABLE `hospital_datas`
  ADD CONSTRAINT `hospital_datas_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`type_id`) ON DELETE CASCADE;

--
-- Constraints for table `lab_report_params`
--
ALTER TABLE `lab_report_params`
  ADD CONSTRAINT `lab_report_params_param_id_foreign` FOREIGN KEY (`param_id`) REFERENCES `lab_test_parameters` (`param_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lab_report_params_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `lab_test_reports` (`report_id`) ON DELETE CASCADE;

--
-- Constraints for table `lab_technicians`
--
ALTER TABLE `lab_technicians`
  ADD CONSTRAINT `lab_technicians_primary_id_foreign` FOREIGN KEY (`primary_id`) REFERENCES `hospital_datas` (`primary_id`) ON DELETE CASCADE;

--
-- Constraints for table `lab_test_parameters`
--
ALTER TABLE `lab_test_parameters`
  ADD CONSTRAINT `lab_test_parameters_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `lab_test_names` (`test_id`) ON DELETE CASCADE;

--
-- Constraints for table `lab_test_reports`
--
ALTER TABLE `lab_test_reports`
  ADD CONSTRAINT `lab_test_reports_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lab_test_reports_technician_id_foreign` FOREIGN KEY (`technician_id`) REFERENCES `lab_technicians` (`technician_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `lab_test_reports_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `lab_test_names` (`test_id`) ON DELETE CASCADE;

--
-- Constraints for table `lab_test_requests`
--
ALTER TABLE `lab_test_requests`
  ADD CONSTRAINT `lab_test_requests_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`) ON DELETE CASCADE;

--
-- Constraints for table `others`
--
ALTER TABLE `others`
  ADD CONSTRAINT `others_primary_id_foreign` FOREIGN KEY (`primary_id`) REFERENCES `hospital_datas` (`primary_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `others_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `other_roles` (`role_id`) ON DELETE CASCADE;

--
-- Constraints for table `past_events`
--
ALTER TABLE `past_events`
  ADD CONSTRAINT `past_events_primary_id_foreign` FOREIGN KEY (`primary_id`) REFERENCES `hospital_datas` (`primary_id`) ON DELETE CASCADE;

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_primary_id_foreign` FOREIGN KEY (`primary_id`) REFERENCES `hospital_datas` (`primary_id`) ON DELETE CASCADE;

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_medicine_id_foreign` FOREIGN KEY (`medicine_id`) REFERENCES `medicines` (`medicine_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prescriptions_treatment_id_foreign` FOREIGN KEY (`treatment_id`) REFERENCES `treatments` (`treatment_id`) ON DELETE CASCADE;

--
-- Constraints for table `receptionists`
--
ALTER TABLE `receptionists`
  ADD CONSTRAINT `receptionists_primary_id_foreign` FOREIGN KEY (`primary_id`) REFERENCES `hospital_datas` (`primary_id`) ON DELETE CASCADE;

--
-- Constraints for table `treatments`
--
ALTER TABLE `treatments`
  ADD CONSTRAINT `treatments_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointment_requests` (`appointment_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `treatments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `treatments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
