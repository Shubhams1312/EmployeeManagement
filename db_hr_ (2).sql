 

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


 
--
 
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_master`
--

CREATE TABLE `bank_master` (
  `id` int(50) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `active` int(10) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_on` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_on` varchar(255) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bank_master`
--

INSERT INTO `bank_master` (`id`, `bank_name`, `active`, `created_by`, `created_on`, `updated_by`, `updated_on`, `last_login`) VALUES
(1, 'State Bank of India', 1, '', '2023-05-18 16:19:06', '', '2023-05-18 16:19:06', '2023-05-18 10:49:06'),
(2, 'Punjab National Bank', 1, '', '2023-05-18 16:19:22', '', '2023-05-18 16:19:22', '2023-05-18 10:49:22'),
(3, 'Union Bank of India', 1, '', '2023-05-18 16:19:36', '', '2023-05-18 16:19:36', '2023-05-18 10:49:36'),
(4, 'HDFC Bank', 1, '', '2023-05-18 16:19:48', '', '2023-05-18 16:19:48', '2023-05-18 10:49:48'),
(5, 'ICICI Bank', 1, '', '2023-05-18 16:20:02', '', '2023-05-18 16:20:02', '2023-05-18 10:50:02'),
(6, 'Kotak Bank', 1, '', '2023-05-18 16:20:21', '', '2023-05-18 16:20:21', '2023-05-18 10:50:21'),
(7, 'Bank of Baroda', 1, '', '2023-05-18 16:20:34', '', '2023-05-18 16:20:34', '2023-05-18 10:50:34'),
(8, 'Bank of India', 1, '', '2023-05-18 16:20:46', '', '2023-05-18 16:20:46', '2023-05-18 10:50:46'),
(9, 'Axis Bank', 1, '', '2023-05-18 16:20:59', '', '2023-05-18 16:20:59', '2023-05-18 10:50:59'),
(10, 'Canara Bank', 1, '', '2023-05-18 16:21:22', '', '2023-05-18 16:21:22', '2023-05-18 10:51:22');

-- --------------------------------------------------------

--
-- Table structure for table `branch_master`
--

CREATE TABLE `branch_master` (
  `id` int(50) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `active` int(10) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_on` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_on` varchar(255) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `branch_master`
--

INSERT INTO `branch_master` (`id`, `branch_name`, `active`, `created_by`, `created_on`, `updated_by`, `updated_on`, `last_login`) VALUES
(1, 'Mumbai', 1, '', '2023-05-18 16:17:25', '', '2023-05-18 16:17:25', '2023-05-18 10:47:25'),
(2, 'Delhi', 1, '', '2023-05-18 16:17:33', '', '2023-05-18 16:17:33', '2023-05-18 10:47:33'),
(3, 'test123', 0, '', '2023-05-18 16:17:47', '', '2023-05-18 16:17:56', '2023-05-18 10:47:56');

-- --------------------------------------------------------

--
-- Table structure for table `country_master`
--

CREATE TABLE `country_master` (
  `id` int(50) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `active` int(10) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_on` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_on` varchar(255) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `country_master`
--

INSERT INTO `country_master` (`id`, `country_name`, `active`, `created_by`, `created_on`, `updated_by`, `updated_on`, `last_login`) VALUES
(1, 'India', 1, '', '2023-05-11 17:47:09', '', '2023-05-11 17:47:09', '2023-05-11 12:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `department_master`
--

CREATE TABLE `department_master` (
  `id` int(50) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `active` int(10) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_on` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_on` varchar(255) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `department_master`
--

INSERT INTO `department_master` (`id`, `department_name`, `active`, `created_by`, `created_on`, `updated_by`, `updated_on`, `last_login`) VALUES
(1, 'Monitoring', 1, '', '', '', '', '2023-05-11 10:29:23'),
(2, 'Analysis', 1, '', '', '', '', '2023-05-11 10:29:23'),
(3, 'IT', 1, '', '', '', '', '2023-05-11 10:29:23'),
(4, 'Client Servicing', 1, '', '', '', '', '2023-05-11 10:29:23'),
(5, 'HR', 1, '', '', '', '', '2023-05-11 10:29:23'),
(6, 'Accounting', 1, '', '', '', '', '2023-05-11 10:29:23'),
(7, 'test123', 0, '', '2023-05-11 16:34:50', '', '2023-05-11 16:35:03', '2023-05-11 11:05:03');

-- --------------------------------------------------------

--
-- Table structure for table `designation_master`
--

CREATE TABLE `designation_master` (
  `id` int(50) NOT NULL,
  `designation_name` varchar(255) NOT NULL,
  `active` int(10) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_on` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_on` varchar(255) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `designation_master`
--

INSERT INTO `designation_master` (`id`, `designation_name`, `active`, `created_by`, `created_on`, `updated_by`, `updated_on`, `last_login`) VALUES
(1, 'Associate', 1, '', '2023-05-18 16:23:18', '', '2023-05-18 16:23:18', '2023-05-18 10:53:18'),
(2, 'Developer', 1, '', '2023-05-18 16:23:36', '', '2023-05-18 16:23:36', '2023-05-18 10:53:36'),
(3, 'Support', 1, '', '2023-05-18 16:23:58', '', '2023-05-18 16:23:58', '2023-05-18 10:53:58'),
(4, 'Admin', 1, '', '2023-05-18 16:24:24', '', '2023-05-18 16:24:24', '2023-05-18 10:54:24'),
(5, 'Content Writer', 1, '', '2023-05-18 16:25:25', '', '2023-05-18 16:25:25', '2023-05-18 10:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `division_master`
--

CREATE TABLE `division_master` (
  `id` int(50) NOT NULL,
  `division_name` varchar(255) NOT NULL,
  `active` int(10) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_on` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_on` varchar(255) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `division_master`
--

INSERT INTO `division_master` (`id`, `division_name`, `active`, `created_by`, `created_on`, `updated_by`, `updated_on`, `last_login`) VALUES
(1, 'Head Office', 1, '', '2023-05-18 16:26:23', '', '2023-05-18 16:26:23', '2023-05-18 10:56:23'),
(2, 'Mumbai Consultant', 1, '', '2023-05-18 16:26:43', '', '2023-05-18 16:26:43', '2023-05-18 10:56:43'),
(3, 'Consultant Night', 1, '', '2023-05-18 16:27:05', '', '2023-05-18 16:27:05', '2023-05-18 10:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `document_master`
--

CREATE TABLE `document_master` (
  `id` int(50) NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `active` int(10) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_on` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_on` varchar(255) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `document_master`
--

INSERT INTO `document_master` (`id`, `document_name`, `active`, `created_by`, `created_on`, `updated_by`, `updated_on`, `last_login`) VALUES
(1, 'Aadhar Card', 1, '', '2023-05-11 17:35:04', '', '2023-05-11 17:35:04', '2023-05-11 12:05:04'),
(2, 'PAN Card', 1, '', '2023-05-11 17:35:13', '', '2023-05-11 17:35:13', '2023-05-11 12:05:13'),
(3, 'SSC', 1, '', '2023-05-11 17:35:22', '', '2023-05-11 17:35:22', '2023-05-11 12:05:22'),
(4, 'HSC', 1, '', '2023-05-11 17:35:32', '', '2023-05-11 17:35:32', '2023-05-11 12:05:32'),
(5, 'Driving License', 1, '', '2023-05-11 17:35:44', '', '2023-05-11 17:35:44', '2023-05-11 12:05:44'),
(6, 'test123', 0, '', '2023-05-12 16:37:58', '', '2023-05-12 16:41:50', '2023-05-12 11:11:50'),
(7, 'Test', 0, '', '2023-05-15 18:08:49', '', '2023-05-15 18:10:20', '2023-05-15 12:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `emp_org_details`
--

CREATE TABLE `emp_org_details` (
  `id` int(255) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `empcode` varchar(100) NOT NULL,
  `punch_card` varchar(100) NOT NULL,
  `employee_type` varchar(100) NOT NULL,
  `joining_date` varchar(100) NOT NULL,
  `confirm_date` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL,
  `divison` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `off_email` varchar(255) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `reporting` varchar(100) NOT NULL,
  `epf_no` varchar(255) NOT NULL,
  `join_date_epf` varchar(255) NOT NULL,
  `leaving_date_epf` varchar(255) NOT NULL,
  `reason_epf` varchar(255) NOT NULL,
  `esic_no` varchar(100) NOT NULL,
  `join_date_esic` varchar(100) NOT NULL,
  `leaving_date_esic` varchar(255) NOT NULL,
  `reason_esic` varchar(255) NOT NULL,
  `vpf_no` varchar(100) NOT NULL,
  `join_date_vpf` varchar(100) NOT NULL,
  `leaving_date_vpf` varchar(100) NOT NULL,
  `reason_vpf` varchar(255) NOT NULL,
  `uan_no` varchar(100) NOT NULL,
  `uan_mobile` varchar(100) NOT NULL,
  `gratuity_no` varchar(100) NOT NULL,
  `previous_experience` varchar(255) NOT NULL,
  `other_join_date` varchar(255) NOT NULL,
  `other_date_leaving` varchar(100) NOT NULL,
  `reason_leaving` varchar(100) NOT NULL,
  `esschck1` varchar(10) NOT NULL,
  `notice_period` varchar(255) NOT NULL,
  `leaving_remark` varchar(255) NOT NULL,
  `applicable_leave` varchar(255) NOT NULL,
  `state` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `location_city` varchar(100) NOT NULL,
  `esschck2` varchar(10) NOT NULL,
  `active` int(10) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_on` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_on` varchar(255) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `emp_org_details`
--

INSERT INTO `emp_org_details` (`id`, `emp_id`, `empcode`, `punch_card`, `employee_type`, `joining_date`, `confirm_date`, `grade`, `divison`, `designation`, `off_email`, `branch`, `department`, `reporting`, `epf_no`, `join_date_epf`, `leaving_date_epf`, `reason_epf`, `esic_no`, `join_date_esic`, `leaving_date_esic`, `reason_esic`, `vpf_no`, `join_date_vpf`, `leaving_date_vpf`, `reason_vpf`, `uan_no`, `uan_mobile`, `gratuity_no`, `previous_experience`, `other_join_date`, `other_date_leaving`, `reason_leaving`, `esschck1`, `notice_period`, `leaving_remark`, `applicable_leave`, `state`, `region`, `district`, `location_city`, `esschck2`, `active`, `created_by`, `created_on`, `updated_by`, `updated_on`, `last_login`) VALUES
(15, 5, '23', '245', 'new_employee', '2023-05-16', '2023-05-16', 'leaving_staff', 'head_office', 'Content Int Exe', '324', 'Mumbai', 'IT', 'Ashutosh', '45', '2023-05-16', '2023-05-16', 'DEF', '45', '2023-05-16', '2023-05-16', 'abc', '2345', '2023-05-16', '2023-05-16', 'ert', '567', '1234567890', '345', '5year(s) 2022month(s) 7day(s)', '', '2023-05-16', 'Relocation', 'true', '6', 'yupp', '', 'Maharashtra', 'ABC', 'borivali', 'mumbai', 'false', 1, '', '', '', '', '2023-05-16 13:25:15'),
(18, 7, '112', '234567', 'transferred', '2023-05-02', '2023-05-08', 'leaving_staff', 'head_office', 'Content Int Exe', 'shubhamsukla74@gmail.com', 'Delhi', 'IT', 'Manish', '24678', '2023-05-15', '2023-05-03', 'DEF', '24678', '', '', '', '987654', '', '', 'ert', '5679', '1234567890', '512', '2year(s) 1month(s) 3day(s)', '2023-05-16', '2023-05-07', 'Relocation', '', '3 Months', 'Good', '', 'Maharashtra', 'DEF', 'Thane', 'Vasai', '', 1, '', '', '', '', '2023-05-18 06:55:02'),
(19, 7, '112', '234567', 'transferred', '2023-05-02', '2023-05-08', 'leaving_staff', 'head_office', 'Content Int Exe', 'shubhamsukla74@gmail.com', 'Delhi', 'IT', 'Manish', '24678', '2023-05-15', '2023-05-03', 'DEF', '24678', '', '', '', '987654', '', '', 'ert', '5679', '1234567890', '512', '2year(s) 1month(s) 3day(s)', '2023-05-16', '2023-05-07', 'Relocation', '', '3 Months', 'Good', '', 'Maharashtra', 'DEF', 'Thane', 'Vasai', '', 1, '', '', '', '', '2023-05-18 06:55:41'),
(20, 7, 'wfqw', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'year(s) month(s) day(s)', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', '', '', '', '2023-05-18 06:55:55'),
(21, 0, '2345', '2345', 'New Employee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'year(s) month(s) day(s)', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', '', '', '', '2023-05-19 12:26:17'),
(22, 0, '1234', '1234', 'New Employee', '2023-05-19', '2023-05-19', '', '', '', 'shubhamsukla74@gmail.com', '', '', '', '1234567', '2023-05-19', '2023-05-19', 'hello', '1234567', '2023-05-19', '2023-05-19', 'hello', '12345', '2023-05-19', '2023-05-19', 'hello', '12345', '07021739728', '12345678', '2year(s) 1month(s) 2day(s)', '2023-05-19', '2023-05-19', 'no reason', '', '6', 'good', '', 'Maharashtra', 'east', 'mum', 'mumbai', '', 1, '', '', '', '', '2023-05-19 12:31:12'),
(23, 0, '1234', '1234', 'New Employee', '2023-05-19', '2023-05-19', '', '', '', 'shubhamsukla74@gmail.com', '', '', '', '1234567', '2023-05-19', '2023-05-19', 'hello', '1234567', '2023-05-19', '2023-05-19', 'hello', '12345', '2023-05-19', '2023-05-19', 'hello', '12345', '07021739728', '12345678', '2year(s) 1month(s) 2day(s)', '2023-05-19', '2023-05-19', 'no reason', '', '6', 'good', '', 'Maharashtra', 'east', 'mum', 'mumbai', '', 1, '', '', '', '', '2023-05-19 12:35:41'),
(24, 10, '1234', '1234', 'New Employee', '2023-05-19', '2023-05-19', '', '', '', 'shubhamsukla74@gmail.com', '', '', '', '1234567', '2023-05-19', '2023-05-19', 'hello', '1234567', '2023-05-19', '2023-05-19', 'hello', '12345', '2023-05-19', '2023-05-19', 'hello', '12345', '07021739728', '12345678', '2year(s) 1month(s) 2day(s)', '2023-05-19', '2023-05-19', 'no reason', '', '6', 'good', '', 'Maharashtra', 'east', 'mum', 'mumbai', '', 1, '', '', '', '', '2023-05-19 12:38:35'),
(25, 11, '1234', '1234', 'New Employee', '2023-05-22', '2023-05-22', 'Consultant Mumbai', 'Consultant Night', 'Associate', 'qwer@gmail', 'Delhi', 'Client Servicing', '', '1234567', '2023-05-22', '2023-05-22', 'hello', '1234567', '2023-05-22', '2023-05-22', 'hello', '12345', '', '', '', '12345', '1234567890', 'wer', '2021year(s) 1month(s) 21day(s)', '2023-05-22', '2023-05-22', 'no reason', '', '6', 'good', 'EL', 'Odisha', 'west', 'mum', 'mumbai', '', 1, '', '', '', '', '2023-05-22 07:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `master_user`
--

CREATE TABLE `master_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `encrypted_password` text NOT NULL,
  `captcha` varchar(10) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `last_login` datetime(6) NOT NULL,
  `created_at` datetime(6) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime(6) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `master_user`
--

INSERT INTO `master_user` (`id`, `username`, `password`, `encrypted_password`, `captcha`, `active`, `last_login`, `created_at`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 'testing', '@test', 'b7ef7e9117491321ffb55bee54c8deed', '', 1, '2023-06-09 21:29:29.000000', '2023-05-24 14:14:49.000000', 2147483647, '2023-05-17 14:14:49.000000', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `reporting_master`
--

CREATE TABLE `reporting_master` (
  `id` int(50) NOT NULL,
  `reporting_name` varchar(255) NOT NULL,
  `active` int(10) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_on` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_on` varchar(255) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reporting_master`
--

INSERT INTO `reporting_master` (`id`, `reporting_name`, `active`, `created_by`, `created_on`, `updated_by`, `updated_on`, `last_login`) VALUES
(1, 'ADMIN', 1, '', '2023-05-18 17:21:12', '', '2023-05-18 17:21:12', '2023-05-18 11:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `state_master`
--

CREATE TABLE `state_master` (
  `id` int(255) NOT NULL,
  `state_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `state_master`
--

INSERT INTO `state_master` (`id`, `state_name`) VALUES
(1, 'Andhra Pradesh'),
(2, 'Arunachal Pradesh'),
(3, 'Assam'),
(4, 'Bihar'),
(5, 'Chhattisgarh'),
(6, 'Goa'),
(7, 'Gujarat'),
(8, 'Haryana'),
(9, 'Himachal Pradesh'),
(10, 'Jharkhand'),
(11, 'Karnataka'),
(12, 'Kerala'),
(13, 'Madhya Pradesh'),
(14, 'Maharashtra'),
(15, 'Manipur'),
(16, 'Meghalaya'),
(17, 'Mizoram'),
(18, 'Nagaland'),
(19, 'Odisha'),
(20, 'Punjab'),
(21, 'Rajasthan'),
(22, 'Sikkim'),
(23, 'Tamil Nadu'),
(24, 'Telangana'),
(25, 'Tripura'),
(26, 'Uttar Pradesh'),
(27, 'Uttarakhand'),
(28, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

CREATE TABLE `tbl_image` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` text NOT NULL,
  `active` int(10) NOT NULL,
  `created_on` timestamp(6) NULL DEFAULT NULL ON UPDATE current_timestamp(6),
  `created_by` varchar(100) NOT NULL,
  `updated_on` timestamp(6) NULL DEFAULT NULL ON UPDATE current_timestamp(6),
  `updated_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`id`, `emp_id`, `name`, `path`, `active`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(7, 0, '1_Aadhar Ca', 'C:/xampp/htdocs/hr_management/images/', 0, '2023-06-09 06:47:45.801619', '', '2023-06-09 06:47:45.000000', '1'),
(8, 0, '5_Driving License_Re5.png', 'C:/xampp/htdocs/hr_management/images/', 1, '2023-05-19 11:24:33.740032', '', NULL, ''),
(9, 0, '4_HSC_1.png', 'C:/xampp/htdocs/hr_management/images/', 1, '2023-05-19 11:24:33.742562', '', NULL, ''),
(10, 0, '4_HSC_peakpx.jpg', 'C:/xampp/htdocs/hr_management/images/', 1, '2023-05-19 11:24:33.744789', '', NULL, ''),
(11, 0, '5_Driving License_130 name.png', 'C:/xampp/htdocs/hr_management/images/', 0, '2023-05-19 11:25:55.875397', '', '2023-05-19 11:25:55.000000', '1'),
(12, 0, '4_HSC_Blockchain_1254.pdf', 'C:/xampp/htdocs/hr_management/images/4_HSC_Blockchain_1254.pdf', 1, '2023-05-19 11:35:38.000000', '1', NULL, ''),
(13, 0, '4_HSC_Trial Assignment Machine Learning NLP.pdf', 'C:/xampp/htdocs/hr_management/images/4_HSC_Trial Assignment Machine Learning NLP.pdf', 1, '2023-05-19 11:35:23.000000', '1', NULL, ''),
(14, 11, '5_Driving License_A1B4F9F2-FA56-421D-8E6F-B729E6027494.pdf', 'C:/xampp/htdocs/hr_management/images/5_Driving License_A1B4F9F2-FA56-421D-8E6F-B729E6027494.pdf', 0, '2023-06-02 06:39:28.584151', '1', '2023-06-02 06:39:28.000000', '1'),
(16, 11, '1_Aadhar Card_Hardik Mhatre_CV.pdf', 'C:/xampp/htdocs/hr_management/images/document/1_Aadhar Card_Hardik Mhatre_CV.pdf', 0, '2023-06-02 06:39:31.630895', '1', '2023-06-02 06:39:31.000000', '1'),
(17, 11, '2_PAN Card_noc23-cs42.pdf', 'C:/xampp/htdocs/hr_management/images/document/2_PAN Card_noc23-cs42.pdf', 0, '2023-06-02 06:39:34.581808', '1', '2023-06-02 06:39:34.000000', '1'),
(18, 11, '2_PAN Card_v.pdf', 'C:/xampp/htdocs/hr_management/images/document/2_PAN Card_v.pdf', 0, '2023-06-02 06:39:37.082871', '1', '2023-06-02 06:39:37.000000', '1'),
(19, 11, '1_Aadhar Card_result mca.pdf', 'C:/xampp/htdocs/hr_management/images/document/1_Aadhar Card_result mca.pdf', 0, '2023-06-02 06:39:39.991669', '1', '2023-06-02 06:39:39.000000', '1'),
(20, 11, '5_Driving License_energies-15-05730-v2.pdf', 'C:/xampp/htdocs/hr_management/images/document/5_Driving License_energies-15-05730-v2.pdf', 0, '2023-06-02 06:39:42.681876', '1', '2023-06-02 06:39:42.000000', '1'),
(21, 11, '4_HSC_NPTEL_CC_Assignment10.pdf', 'C:/xampp/htdocs/hr_management/images/document/4_HSC_NPTEL_CC_Assignment10.pdf', 0, '2023-06-02 06:39:45.081274', '1', '2023-06-02 06:39:45.000000', '1'),
(22, 11, '1_Aadhar Card_Re6.png', 'C:/xampp/htdocs/hr_management/images/document/1_Aadhar Card_Re6.png', 0, '2023-06-02 06:39:48.311089', '1', '2023-06-02 06:39:48.000000', '1'),
(23, 11, '3_SSC_Re5.png', 'C:/xampp/htdocs/hr_management/images/document/3_SSC_Re5.png', 0, '2023-05-25 08:58:09.654819', '1', '2023-05-25 08:58:09.000000', '1'),
(24, 11, '4_HSC_3.png', '../images/document/4_HSC_3.png', 1, '2023-05-26 12:35:54.000000', '1', NULL, ''),
(25, 11, '5_Driving License_3.png', '../images/document/5_Driving License_3.png', 1, '2023-05-26 12:35:13.000000', '1', NULL, ''),
(26, 11, '11_PAN Card_(28-36)_AI_Applications_Does_it_affect_Carbon_Emissions.pdf', '../images/document/11_PAN Card_(28-36)_AI_Applications_Does_it_affect_Carbon_Emissions.pdf', 1, '2023-05-27 05:35:37.000000', '1', NULL, ''),
(27, 11, '11_Aadhar Card_OD126078374541636000.pdf', '../images/document/11_Aadhar Card_OD126078374541636000.pdf', 1, '2023-06-01 09:36:40.000000', '1', NULL, ''),
(28, 11, '11_HSC_NPTEL_CC_Assignment5.pdf', '../images/document/11_HSC_NPTEL_CC_Assignment5.pdf', 1, '2023-06-01 09:36:17.000000', '1', NULL, ''),
(29, 13, '13_Driving License_NPTEL_CC_Assignment2.pdf', '../images/document/13_Driving License_NPTEL_CC_Assignment2.pdf', 1, '2023-06-01 09:36:38.000000', '1', NULL, ''),
(30, 13, '13_Driving License_v.pdf', '../images/document/13_Driving License_v.pdf', 1, '2023-06-01 09:36:25.000000', '1', NULL, ''),
(31, 11, '11_PAN Card_NPTEL_CC_Assignment2.pdf', '../images/document/11_PAN Card_NPTEL_CC_Assignment2.pdf', 1, '2023-06-02 10:36:47.000000', '1', NULL, ''),
(32, 15, '15_Aadhar Card_OD126078374541636000.pdf', '../images/document/15_Aadhar Card_OD126078374541636000.pdf', 1, '2023-06-09 09:36:09.000000', '1', NULL, ''),
(33, 15, '15_HSC_NPTEL_CC_Assignment4.pdf', '../images/document/15_HSC_NPTEL_CC_Assignment4.pdf', 1, '2023-06-09 09:36:42.000000', '1', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_emp_details`
--

CREATE TABLE `tb_emp_details` (
  `id` int(255) NOT NULL,
  `title` varchar(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `profile_pic` text NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `blood_group` varchar(50) NOT NULL,
  `education_qualification` varchar(255) NOT NULL,
  `professional_qualification` varchar(255) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `marital` varchar(100) NOT NULL,
  `spouse` varchar(255) NOT NULL,
  `anniversary` date DEFAULT NULL,
  `father_name` varchar(255) NOT NULL,
  `pancard` varchar(100) NOT NULL,
  `add_line1` text NOT NULL,
  `add_line2` text NOT NULL,
  `add_line3` text NOT NULL,
  `add_line4` text NOT NULL,
  `permanent_add_line1` text NOT NULL,
  `permanent_add_line2` text NOT NULL,
  `permanent_add_line3` text NOT NULL,
  `permanent_add_line4` text NOT NULL,
  `personal_email` varchar(50) NOT NULL,
  `telephone` int(10) NOT NULL,
  `mobile_no` int(10) NOT NULL,
  `driving_licence` varchar(50) NOT NULL,
  `dl_expiry` date NOT NULL,
  `passport_no` varchar(100) NOT NULL,
  `passport_expiry` date NOT NULL,
  `aadhar_card` varchar(50) NOT NULL,
  `visa` varchar(50) NOT NULL,
  `visa_type` varchar(50) NOT NULL,
  `visa_expiry` date DEFAULT NULL,
  `voter_id` int(50) NOT NULL,
  `disability` varchar(50) NOT NULL,
  `disability_percentage` varchar(50) NOT NULL,
  `worker_type` varchar(100) NOT NULL,
  `child_education` int(50) NOT NULL,
  `child_in_hostel` int(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_on` varchar(6) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_on` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_emp_details`
--

INSERT INTO `tb_emp_details` (`id`, `title`, `first_name`, `middle_name`, `last_name`, `profile_pic`, `gender`, `dob`, `blood_group`, `education_qualification`, `professional_qualification`, `religion`, `marital`, `spouse`, `anniversary`, `father_name`, `pancard`, `add_line1`, `add_line2`, `add_line3`, `add_line4`, `permanent_add_line1`, `permanent_add_line2`, `permanent_add_line3`, `permanent_add_line4`, `personal_email`, `telephone`, `mobile_no`, `driving_licence`, `dl_expiry`, `passport_no`, `passport_expiry`, `aadhar_card`, `visa`, `visa_type`, `visa_expiry`, `voter_id`, `disability`, `disability_percentage`, `worker_type`, `child_education`, `child_in_hostel`, `nationality`, `active`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, 'Mr.', 'ttt', 'k', 'M', '02062023102550Re4.png', 'Male', '2023-05-09', 'O+', 'scc', 'mca', 'Hindu', 'Married', 'yes', '2023-03-10', 'Shubham Shukla', 'myupsc1278', 'Rawalpada, Radha krishna Nagar, Sant Namdev marg', 'mumbai', '400068', '-- Select --', 'Rawalpada, Radha krishna Nagar, Sant Namdev marg', 'mumbai', '400068', 'Maharashtra', 'ttt@gmail.com', 2147483647, 1234567890, '2134567', '2023-05-10', '12345678dcfvgb', '2023-05-09', '1234567890987', 'fdfgbh45678', 'working', '2023-05-11', 122344567, 'Select', '', 'wfh', 1, 1, 'India', 1, '', '2023-0', '', '2023-06-09 22:08:15'),
(2, 'Mr.', 'test', 't', 'test', '02062023102603Re7.png', 'Male', '2023-05-09', 'O+', 'scc', 'mca', 'Hindu', 'Married', 'yes', '2023-03-10', 'Shubham Shukla', 'myupsc1278', 'Dahisar', 'mumbai', '400068', '-- Select --', 'Dahisar', 'mumbai', '400068', 'Maharashtra', 'shu4@gmail.com', 1234567890, 1234567890, '2134567', '2023-05-10', '12345678dcfvgb', '2023-05-09', '1234567890987', 'fdfgbh45678', 'working', '2023-05-11', 122344567, 'Select', '0', 'wfh', 1, 1, 'India', 1, '', '2023-0', '', '2023-05-12 18:38:34'),
(3, 'Mr.', 'hbk', 'eee', 'ee', '02062023102616image-220x220.jpg', 'Male', '2023-05-12', 'A+', 'Bsc.(IT)', 'MCA', 'Hindu', 'Single', '', '0000-00-00', 'XYZ', 'MYPANCARD12', 'Dahisar', 'mumbai', '400068', 'Manipur', 'Dahisar', 'mumbai', '400068', 'Manipur', 'wer@gmail.com', 2147483647, 1234567890, '123456789', '2023-05-12', '123456789098765', '2023-05-12', '123456789098765', '23r4t5t4', '2e3r4t5yy5t4r3', '2023-05-13', 123456789, 'Select', '', 'Media', 0, 0, 'India', 1, ' ', '2023-0', '', '2023-06-09 22:08:53');

-- --------------------------------------------------------

--
-- Table structure for table `tb_famliy_emp`
--

CREATE TABLE `tb_famliy_emp` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(100) NOT NULL,
  `member_name` varchar(100) NOT NULL,
  `realtion_with_emp` varchar(100) NOT NULL,
  `residing_with_emp` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `dependent_on_emp` varchar(100) NOT NULL,
  `pf_nominee` varchar(100) NOT NULL,
  `esi_nominee` varchar(100) NOT NULL,
  `gratuity_nominee` varchar(100) NOT NULL,
  `nominee_aadhaar_card` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_on` varchar(100) NOT NULL,
  `active` int(10) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_on` varchar(100) NOT NULL,
  `last_login` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_famliy_emp`
--

INSERT INTO `tb_famliy_emp` (`id`, `emp_id`, `member_name`, `realtion_with_emp`, `residing_with_emp`, `address`, `dependent_on_emp`, `pf_nominee`, `esi_nominee`, `gratuity_nominee`, `nominee_aadhaar_card`, `created_by`, `created_on`, `active`, `updated_by`, `updated_on`, `last_login`) VALUES
(7, '11', 'xxx', 'frnd', 'yes', 'hbk ', 'no', 'no', 'no', 'no', '0000000000', ' 1', '2023-05-23 16:04:29', 0, '', '2023-06-02 17:10:00', '1'),
(8, '13', 'shukla', 'frnd', 'yes', 'Dahisar cccc', 'no', 'no', 'no', 'no', '12345', ' 1', '2023-06-01 17:08:00', 1, '1', '2023-06-01 17:38:18', '1'),
(9, '13', 'hbk', 'b', 'yes', 'yy ', 'no', 'no', 'no', 'no', '0000000000', ' 1', '2023-06-01 17:14:55', 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_previous_emp`
--

CREATE TABLE `tb_previous_emp` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `name_employer` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `join_date` varchar(100) NOT NULL,
  `leave_date` varchar(100) NOT NULL,
  `salary_drawn` int(255) DEFAULT NULL,
  `department` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `job_profile` varchar(100) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_on` varchar(255) NOT NULL,
  `active` int(10) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_on` varchar(255) NOT NULL,
  `last_login` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_previous_emp`
--

INSERT INTO `tb_previous_emp` (`id`, `emp_id`, `name_employer`, `address`, `join_date`, `leave_date`, `salary_drawn`, `department`, `designation`, `job_profile`, `created_by`, `created_on`, `active`, `updated_by`, `updated_on`, `last_login`) VALUES
(11, '11', 'test', 'Dahisar', '2023-05-23', '2023-05-23', 67000, 'IT', 'it', ' it', '1', '2023-05-23 13:04:32', 1, '', '', '1'),
(12, '11', 'TEST', 'ADDRESS', '2023-05-23', '2023-05-01', 67000, 'IT', 'it', ' it', '1', '2023-05-23 15:37:32', 1, '', '', '1'),
(16, '13', 'hbk', 'ram-mandir', '2023-06-01', '2023-06-01', 67000, 'IT', 'Intern', ' backend ', '1', '2023-06-01 15:41:54', 1, '', '', '1'),
(17, '13', 'wp', 'ram-mandir', '2023-06-01', '2023-06-01', 8000, 'it', 'Intern', ' MERN Stack developer', '1', '2023-06-01 15:50:57', 1, '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_test`
--

CREATE TABLE `tb_test` (
  `id` int(100) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_master`
--
ALTER TABLE `bank_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_master`
--
ALTER TABLE `branch_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_master`
--
ALTER TABLE `country_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_master`
--
ALTER TABLE `department_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation_master`
--
ALTER TABLE `designation_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `division_master`
--
ALTER TABLE `division_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_master`
--
ALTER TABLE `document_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_org_details`
--
ALTER TABLE `emp_org_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reporting_master`
--
ALTER TABLE `reporting_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_master`
--
ALTER TABLE `state_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_emp_details`
--
ALTER TABLE `tb_emp_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_famliy_emp`
--
ALTER TABLE `tb_famliy_emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_previous_emp`
--
ALTER TABLE `tb_previous_emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_test`
--
ALTER TABLE `tb_test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_master`
--
ALTER TABLE `bank_master`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `branch_master`
--
ALTER TABLE `branch_master`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `country_master`
--
ALTER TABLE `country_master`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department_master`
--
ALTER TABLE `department_master`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `designation_master`
--
ALTER TABLE `designation_master`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `division_master`
--
ALTER TABLE `division_master`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `document_master`
--
ALTER TABLE `document_master`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `emp_org_details`
--
ALTER TABLE `emp_org_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `master_user`
--
ALTER TABLE `master_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reporting_master`
--
ALTER TABLE `reporting_master`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `state_master`
--
ALTER TABLE `state_master`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_image`
--
ALTER TABLE `tbl_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_emp_details`
--
ALTER TABLE `tb_emp_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_famliy_emp`
--
ALTER TABLE `tb_famliy_emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_previous_emp`
--
ALTER TABLE `tb_previous_emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_test`
--
ALTER TABLE `tb_test`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
