-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2020 at 06:19 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoiments`
--

CREATE TABLE `appoiments` (
  `id` int(11) NOT NULL,
  `for_doc` varchar(11) DEFAULT NULL,
  `p_name` varchar(255) DEFAULT NULL,
  `p_mobile` varchar(50) DEFAULT NULL,
  `a_status` varchar(11) DEFAULT NULL,
  `a_date` timestamp NULL DEFAULT NULL,
  `byuser` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appoiments`
--

INSERT INTO `appoiments` (`id`, `for_doc`, `p_name`, `p_mobile`, `a_status`, `a_date`, `byuser`) VALUES
(1, '1', 'cccc', '01831586368', '0', '2019-12-28 18:00:00', '1'),
(2, '3', 'daaa', '01825262728', '0', '2019-12-28 18:00:00', '1'),
(3, '3', 'aaaa', '91018272627', '0', '2019-12-10 18:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `title`) VALUES
(1, 'Department One');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `mobile2` varchar(50) DEFAULT NULL,
  `consult_in_lab` int(11) DEFAULT NULL,
  `slot` int(11) DEFAULT NULL,
  `assistantname` varchar(255) DEFAULT NULL,
  `assistantmobile` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `doctorid` varchar(50) DEFAULT 'NULL',
  `commission` varchar(50) DEFAULT NULL,
  `degree` text DEFAULT NULL,
  `chambername` varchar(255) DEFAULT NULL,
  `paid` varchar(50) DEFAULT NULL,
  `pending` varchar(50) DEFAULT NULL,
  `last_pay_amount` varchar(50) DEFAULT NULL,
  `last_pay_by` int(11) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `email`, `mobile`, `mobile2`, `consult_in_lab`, `slot`, `assistantname`, `assistantmobile`, `gender`, `doctorid`, `commission`, `degree`, `chambername`, `paid`, `pending`, `last_pay_amount`, `last_pay_by`, `address`) VALUES
(5, 'Dr. Rajat Das', 'rajatdas@gmail.com', '01831586368', '01981267261', 1, 30, 'JOy Das', '012928271', 'male', 'DRD4242', '10', 'MBBS IN CSE', 'Golpahar Chamber', '100', '1240', '100', 1, 'ADDRESS IN ADDRESS');

-- --------------------------------------------------------

--
-- Table structure for table `dpayhistory`
--

CREATE TABLE `dpayhistory` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `doc_u_id` varchar(50) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `by_user` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dpayhistory`
--

INSERT INTO `dpayhistory` (`id`, `doc_id`, `doc_u_id`, `amount`, `by_user`, `date`) VALUES
(8, 5, 'DRD4242', 100, 1, '2019-12-28 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `employeeid` varchar(50) DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `is_active` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `mobile`, `gender`, `position`, `employeeid`, `salary`, `address`, `is_active`) VALUES
(6, 'Joy Das', 'joyd451@gmail.com', '01862144684', 'male', 'Duty Doctor', 'DOC002', '100000', 'aaaa				  			 \r\n				  						  			 \r\n				  						  			 \r\n				  						  			 \r\n				  						  			 \r\n				  						  			 \r\n				  		', 'active'),
(8, 'Prothom Achyarjya', 'prothom@mail.com', '12345', 'female', 'nurse', 'NUR001', '200', 'prothom Nurse.				  						  			 \r\n				  						  			 \r\n				  						  			 \r\n				  						  			 \r\n				  						  			 \r\n				  						  			 \r\n				  						  			 \r\n				  						  			 \r\n				  						  			 \r\n				  		', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `hisab`
--

CREATE TABLE `hisab` (
  `id` int(11) NOT NULL,
  `invoice` varchar(255) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `cost_type` varchar(50) DEFAULT NULL,
  `income` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hisab`
--

INSERT INTO `hisab` (`id`, `invoice`, `cost`, `cost_type`, `income`, `date`) VALUES
(9, '20191229-48524', 1400, 'lab', 1000, '2019-12-28 18:00:00'),
(10, '20191229-48524', 0, 'none', 1100, '2019-12-28 18:00:00'),
(11, '8', 100, 'doctor', 0, '2019-12-28 18:00:00'),
(12, '20191230-74739', 600, 'lab', 500, '2019-12-29 18:00:00'),
(13, '20191230-74739', 0, 'none', 400, '2019-12-29 18:00:00'),
(14, '20191230-26075', 600, 'lab', 0, '2019-12-29 18:00:00'),
(15, '20191230-26075', 0, 'none', 1000, '2019-12-30 18:00:00'),
(16, '20200101-67076', 1400, 'lab', 1000, '2019-12-31 18:00:00'),
(17, '20200101-70530', 600, 'lab', 500, '2019-12-31 18:00:00'),
(18, '20200101-53722', 1400, 'lab', 11, '2019-12-31 18:00:00'),
(19, '20200109-68424', 600, 'lab', 100, '2020-01-08 19:00:29'),
(20, '20200109-78455', 600, 'lab', 500, '2020-01-08 21:47:43'),
(21, '20200109-78546', 600, 'lab', 500, '2020-01-08 21:49:13'),
(22, '20200303-56078', 600, 'lab', 500, '2020-03-03 15:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `is_paid` tinyint(1) NOT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` varchar(50) DEFAULT 'NULL',
  `gender` varchar(20) NOT NULL,
  `blood_group` varchar(50) DEFAULT NULL,
  `patientid` varchar(255) DEFAULT NULL,
  `guardian_name` varchar(255) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `maritial_status` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `emer_name` varchar(255) DEFAULT NULL,
  `emer_relation` varchar(255) DEFAULT NULL,
  `emer_mobile_one` varchar(50) DEFAULT NULL,
  `emer_mobile_two` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `age`, `gender`, `blood_group`, `patientid`, `guardian_name`, `mobile`, `email`, `maritial_status`, `religion`, `nationality`, `address`, `emer_name`, `emer_relation`, `emer_mobile_one`, `emer_mobile_two`) VALUES
(4, 'Xaved Hossain', '24', 'female', 'AB+', 'XH7303', 'Joy Das Shanta', '01831586368', 'joyd451@gmail.com', 'unmarried', 'Islam', 'Bangladeshi', 'Xaved Hossain Address.', 'Joy Das Shanta', 'Friend', '01782840097', '01572697889'),
(6, 'Faruk Hossain Javed', '25', 'male', 'A-', 'FHB6B7', 'Joy Das Shanta', '01862144684', 'joyd451@gmail.com', 'married', 'Hinduism', 'Bangladeshi', 'aaa', NULL, 'Friend', '01782840097', '01572697889');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `employeeid` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `paidstatus` varchar(50) DEFAULT NULL,
  `amount` varchar(50) DEFAULT NULL,
  `month` varchar(11) DEFAULT NULL,
  `year` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `name`, `position`, `employeeid`, `mobile`, `salary`, `paidstatus`, `amount`, `month`, `year`) VALUES
(3, 'Joy Das', 'doctor', 'DOC002', '01862144684', '100000', 'full', '100000', '12', '2019'),
(4, 'Prothom Achyarjya', 'nurse', 'NUR001', '12345', '200', 'half', '200', '12', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `sales_items`
--

CREATE TABLE `sales_items` (
  `id` int(11) NOT NULL,
  `test_patient_id` int(11) DEFAULT NULL,
  `test_id` varchar(255) DEFAULT NULL,
  `lab_cost` varchar(11) DEFAULT NULL,
  `test_price` varchar(11) DEFAULT NULL,
  `test_discount` varchar(11) DEFAULT NULL,
  `net_amount` varchar(11) DEFAULT NULL,
  `data_input_s` varchar(11) DEFAULT NULL,
  `by_user` varchar(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales_items`
--

INSERT INTO `sales_items` (`id`, `test_patient_id`, `test_id`, `lab_cost`, `test_price`, `test_discount`, `net_amount`, `data_input_s`, `by_user`, `date`) VALUES
(118, 86, '4', '600', '1000', '0', '1000', '1', '1', '2019-12-31 18:00:00'),
(119, 86, '5', '800', '1200', '0', '1200', '1', '1', '2019-12-31 18:00:00'),
(120, 87, '4', '600', '1000', '0', '1000', '1', '1', '2019-12-31 18:00:00'),
(121, 88, '4', '600', '1000', '0', '1000', '1', '1', '2019-12-31 18:00:00'),
(122, 88, '5', '800', '1200', '0', '1200', '1', '1', '2019-12-31 18:00:00'),
(123, 89, '4', '600', '1000', '0', '1000', '1', '1', '2020-01-08 19:00:29'),
(124, 90, '4', '600', '1000', '0', '1000', '0', '1', '2020-01-08 21:47:43'),
(125, 91, '4', '600', '1000', '0', '1000', '0', '1', '2020-01-08 21:49:13'),
(126, 92, '4', '600', '1000', '0', '1000', '0', '1', '2020-03-03 15:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `testpatients`
--

CREATE TABLE `testpatients` (
  `id` int(11) NOT NULL,
  `p_name` varchar(255) DEFAULT NULL,
  `p_mobile` varchar(50) DEFAULT 'NULL',
  `p_age` varchar(11) DEFAULT NULL,
  `p_gender` varchar(50) DEFAULT NULL,
  `p_blood_group` varchar(50) DEFAULT NULL,
  `patientid` varchar(50) DEFAULT NULL,
  `ref_doc_id` varchar(50) DEFAULT NULL,
  `grossamount` varchar(50) DEFAULT NULL,
  `discountamount` varchar(50) DEFAULT NULL,
  `netamount` varchar(50) DEFAULT NULL,
  `paidamount` varchar(50) DEFAULT NULL,
  `dueamount` varchar(50) DEFAULT NULL,
  `invoice` varchar(255) DEFAULT NULL,
  `byuser` varchar(50) DEFAULT NULL,
  `d_status` varchar(11) DEFAULT NULL,
  `r_d_by` varchar(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testpatients`
--

INSERT INTO `testpatients` (`id`, `p_name`, `p_mobile`, `p_age`, `p_gender`, `p_blood_group`, `patientid`, `ref_doc_id`, `grossamount`, `discountamount`, `netamount`, `paidamount`, `dueamount`, `invoice`, `byuser`, `d_status`, `r_d_by`, `created_at`) VALUES
(86, 'Xaved Hossain', '01831586368', '24', 'female', 'AB+', 'XH7303', '5', '2200', '0', '2200', '1000', '1200', '20200101-67076', '1', '0', '0', '2019-12-31 18:00:00'),
(87, 'Xaved Hossain', '01831586368', '24', 'female', 'AB+', 'XH7303', '5', '1000', '0', '1000', '500', '500', '20200101-70530', '1', '0', '0', '2019-12-31 18:00:00'),
(88, 'joy', '10928039810298', '23', 'male', 'A-', '', '5', '2200', '0', '2200', '11', '2189', '20200101-53722', '1', '0', '0', '2019-12-31 18:00:00'),
(89, 'Xaved Hossain', '01831586368', '24', 'female', 'AB+', 'XH7303', '5', '1000', '0', '1000', '100', '900', '20200109-68424', '1', '0', '0', '2020-01-08 19:00:29'),
(90, 'Xaved Hossain', '01831586368', '24', 'female', 'AB+', 'XH7303', '5', '1000', '0', '1000', '500', '500', '20200109-78455', '1', '0', '0', '2020-01-08 21:47:42'),
(91, 'Xaved Hossain', '01831586368', '24', 'female', 'AB+', 'XH7303', '5', '1000', '0', '1000', '500', '500', '20200109-78546', '1', '0', '0', '2020-01-08 21:49:12'),
(92, 'Faruk Hossain Javed', '01862144684', '25', 'male', 'A-', 'FHB6B7', '5', '1000', '0', '1000', '500', '500', '20200303-56078', '1', '0', '0', '2020-03-03 15:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `testresult`
--

CREATE TABLE `testresult` (
  `id` int(11) NOT NULL,
  `pat_id` int(11) DEFAULT NULL,
  `sales_item_id` int(11) DEFAULT NULL,
  `testunit_id` int(11) DEFAULT NULL,
  `unit_value` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testresult`
--

INSERT INTO `testresult` (`id`, `pat_id`, `sales_item_id`, `testunit_id`, `unit_value`, `date`, `userId`) VALUES
(3, 86, 118, 1, '0.11', '2019-12-31 18:00:00', 1),
(4, 86, 118, 2, '0.45', '2019-12-31 18:00:00', 1),
(5, 86, 119, 5, '0.24', '2019-12-31 18:00:00', 1),
(6, 86, 119, 6, '0.45', '2019-12-31 18:00:00', 1),
(7, 87, 120, 1, '0.12', '2019-12-31 18:00:00', 1),
(8, 87, 120, 2, '0.11', '2019-12-31 18:00:00', 1),
(9, 88, 121, 1, '0.11', '2019-12-31 18:00:00', 1),
(10, 88, 121, 2, '0.98', '2019-12-31 18:00:00', 1),
(11, 88, 122, 5, '90', '2019-12-31 18:00:00', 1),
(12, 88, 122, 6, '11', '2019-12-31 18:00:00', 1),
(13, 89, 123, 1, '0.11', '2020-01-08 19:00:53', 1),
(14, 89, 123, 2, '0.11', '2020-01-08 19:00:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `cost` varchar(50) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `name`, `description`, `cost`, `price`, `is_active`, `duration`, `created_at`) VALUES
(4, 'Complete Blood Count', 'Complete Blood Test.', '600', '1000', 1, '1', '2019-12-29 20:07:21'),
(5, 'xyz', 'xyz test', '800', '1200', 1, '1', '2019-12-31 18:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `test_units`
--

CREATE TABLE `test_units` (
  `id` int(11) NOT NULL,
  `test_id` varchar(11) DEFAULT NULL,
  `unit_name` varchar(255) DEFAULT NULL,
  `measure_id` varchar(11) DEFAULT NULL,
  `base_value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_units`
--

INSERT INTO `test_units` (`id`, `test_id`, `unit_name`, `measure_id`, `base_value`) VALUES
(1, '4', 'Carbon', '4', '0.12'),
(2, '4', 'Himoglobin', '3', '0.11'),
(5, '5', 'xyzunit1', '2', '0.67'),
(6, '5', 'xyzunit2', '3', '0.54');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`) VALUES
(1, 'Femtoliters'),
(2, 'Grams (g)'),
(3, 'Grams per deciliter (g/dL)'),
(4, 'Grams per liter (g/L)'),
(5, 'International units per liter (IU/L)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admintype` varchar(255) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `email`, `username`, `password`, `admintype`, `mobile`, `address`, `created_at`) VALUES
(1, 'Joy Das', 'male', 'super@mail.com', 'super', 'super', 'super', '+8801831586368', 'Super Admin Address.', '2019-11-04 17:59:03'),
(2, 'Prothom', 'male', 'admin@admin.com', 'admin', 'admin', 'admin', '+88018615423676', 'prothom address.', '2019-11-04 18:42:42'),
(3, 'Dr. John Doe', 'male', 'doctor@mail.com', 'doctor', 'doctor', 'doctor', '01831586368', 'Doctor Address.', '2019-11-04 20:44:38'),
(4, 'Xaved Hossain', 'female', 'nurse@email.com', 'nurse', 'nurse', 'nurse', '+8871615131', 'nurse address', '2019-11-05 21:09:55'),
(5, 'Joy Das', 'male', 'joyd451@gmail.com', 'joy', 'joy', 'admin', '01862144684', 'Joy Das address.', '2019-11-07 12:48:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appoiments`
--
ALTER TABLE `appoiments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dpayhistory`
--
ALTER TABLE `dpayhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hisab`
--
ALTER TABLE `hisab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_items`
--
ALTER TABLE `sales_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testpatients`
--
ALTER TABLE `testpatients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testresult`
--
ALTER TABLE `testresult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_units`
--
ALTER TABLE `test_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appoiments`
--
ALTER TABLE `appoiments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dpayhistory`
--
ALTER TABLE `dpayhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hisab`
--
ALTER TABLE `hisab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales_items`
--
ALTER TABLE `sales_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `testpatients`
--
ALTER TABLE `testpatients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `testresult`
--
ALTER TABLE `testresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test_units`
--
ALTER TABLE `test_units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
