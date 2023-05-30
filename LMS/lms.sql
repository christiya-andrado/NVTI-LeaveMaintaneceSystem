-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 11:51 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--


--
-- Table structure for table `commanleave`
--

CREATE TABLE `commanleave` (
  `CL_id` varchar(4) NOT NULL,
  `LeaveType` varchar(20) NOT NULL,
  `TotalNo_ofDays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commanleave`
--

INSERT INTO `commanleave` (`CL_id`, `LeaveType`, `TotalNo_ofDays`) VALUES
('CL1', 'Medical Leave', 21),
('CL2', 'Annual Leave', 14),
('CL3', 'Casual Leave', 7),
('CL4', 'Maternity Leave', 0),
('CL5', 'Duty Leave', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Empid` int(11) NOT NULL,
  `P_EPFNo` varchar(11) NOT NULL,
  `C_EPFNo` varchar(11) NOT NULL,
  `EmpName` varchar(30) NOT NULL,
  `Gender` char(1) NOT NULL,
  `NIC` varchar(12) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `FirstAppointment_Date` date NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Contact_No` varchar(10) NOT NULL,
  `CenterLocation` varchar(20) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  `TypeOf_Appointment` char(1) NOT NULL,
  `PIN` varchar(6) NOT NULL,
  `user_type` char(1) NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Empid`, `P_EPFNo`, `C_EPFNo`, `EmpName`, `Gender`, `NIC`, `Address`, `FirstAppointment_Date`, `Email`, `Contact_No`, `CenterLocation`, `Designation`, `TypeOf_Appointment`, `PIN`, `user_type`, `image`) VALUES
(1, '', '1', 'Azfara', 'F', '992147369V', 'Kattankudy', '2022-12-08', 'a@gmail.com', '0754869325', 'NVTI ', 'Student', 'C', '251406', 'O', '');

-- --------------------------------------------------------

--
-- Table structure for table `leave_details`
--

CREATE TABLE `leave_details` (
  `LD_Id` int(4) NOT NULL,
  `EPFNo` int(11) NOT NULL,
  `FromDate` date NOT NULL,
  `ToDate` date NOT NULL,
  `total_days` int(11) NOT NULL,
  `Reason` varchar(100) NOT NULL,
  `AppliedDate` date NOT NULL,
  `Acting_Person` varchar(20) NOT NULL,
  `leave_type` varchar(25) NOT NULL,
  `is_read_by_spradmin` int(11) NOT NULL,
  `recommend_by` varchar(20) NOT NULL,
  `recommend_status` int(11) NOT NULL,
  `recommmend_date` date NOT NULL,
  `is_read_by_admin` int(11) NOT NULL,
  `approved_by` varchar(20) NOT NULL,
  `approved_status` int(11) NOT NULL,
  `admin_remark` varchar(255) NOT NULL,
  `approved_date` date NOT NULL,
  `remarked_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_details`
--

INSERT INTO `leave_details` (`LD_Id`, `EPFNo`, `FromDate`, `ToDate`, `total_days`, `Reason`, `AppliedDate`, `Acting_Person`, `leave_type`, `is_read_by_spradmin`, `recommend_by`, `recommend_status`, `recommmend_date`, `is_read_by_admin`, `approved_by`, `approved_status`, `admin_remark`, `approved_date`, `remarked_by`) VALUES
(1, 0, '2022-12-08', '2023-01-04', 0, 'hjyfhjgh', '0000-00-00', 'dfgyrytfry', 'Casual Leave', 0, '', 0, '0000-00-00', 0, '', 0, '', '0000-00-00', ''),
(2, 0, '2022-12-26', '2022-12-15', 0, 'UFGVJJ', '0000-00-00', 'GJVJ', 'Maternity Leave', 0, '', 0, '0000-00-00', 0, '', 0, '', '0000-00-00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commanleave`
--
ALTER TABLE `commanleave`
  ADD PRIMARY KEY (`CL_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Empid`);

--
-- Indexes for table `leave_details`
--
ALTER TABLE `leave_details`
  ADD PRIMARY KEY (`LD_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Empid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leave_details`
--
ALTER TABLE `leave_details`
  MODIFY `LD_Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
