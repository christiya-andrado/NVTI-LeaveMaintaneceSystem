-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 06:51 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `insertemp` (`epf` INT(4), `name` VARCHAR(20), `sex` CHAR(1), `nic` VARCHAR(12), `Address` VARCHAR(50), `fad` DATE, `email` VARCHAR(30), `contact` VARCHAR(10), `center` VARCHAR(20), `desig` VARCHAR(20), `toa` CHAR(1), `pin` VARCHAR(6)) RETURNS VARCHAR(20) CHARSET latin1 BEGIN
    	IF toa ="P" THEN 
        	INSERT INTO employee (P_EPFNo,EmpName,Gender,NIC,Address,FirstAppointment_Date,Email,Contact_No,CenterLocation,Designation,TypeOf_Appointment,PIN)
            VALUES (epf,name,sex,nic,address,fad,email,contact,center,desig,toa,pin);
       ELSE 
        	INSERT INTO employee (C_EPFNo,EmpName,Gender,NIC,Address,FirstAppointment_Date,Email,Contact_No,CenterLocation,Designation,TypeOf_Appointment,PIN)
            VALUES (epf,name,sex,nic,address,fad,email,contact,center,desig,toa,pin);
       END IF;
            RETURN "Success";
       
    END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `retrieve` (`type` CHAR(1)) RETURNS TEXT CHARSET latin1 BEGIN
    	DECLARE ans text;
   		if (Type='p') THEN 
			SET ans='SELECT Empid,P_EPFNo,EmpName,Gender,NIC,Address,FirstAppointment_Date,Email,Contact_No,CenterLocation,Designation,TypeOf_Appointment FROM employee';
        ELSE
          SET ans='SELECT Empid,C_EPFNo,EmpName,Gender,NIC,Address,FirstAppointment_Date,Email,Contact_No,CenterLocation,Designation,TypeOf_Appointment FROM employee';  
                   
        END IF;
        
        RETURN ans;
       
    END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `updateemp` (`epf` INT(4), `name` VARCHAR(20), `sex` CHAR(1), `nic` VARCHAR(12), `Addre` VARCHAR(50), `fad` DATE, `mail` VARCHAR(30), `Contact` VARCHAR(10), `Center` VARCHAR(20), `Desig` VARCHAR(20), `ta` CHAR(1)) RETURNS VARCHAR(10) CHARSET latin1 BEGIN
    	IF ta ="P" THEN 
        	UPDATE employee SET P_EPFNo=epf, EmpName=name, Gender=sex, NIC=nic,Address=addre, FirstAppointment_Date=fad, Email=mail, Contact_No=contact,CenterLocation=center,  				Designation=desig, TypeOf_Appointment=ta WHERE P_EPFNo=epf;
       ELSE 
        	UPDATE employee SET C_EPFNo=epf, EmpName=name, Gender=sex, NIC=nic,Address=addre, FirstAppointment_Date=fad, Email=mail, Contact_No=contact,CenterLocation=center,  				Designation=desig, TypeOf_Appointment=ta WHERE C_EPFNo=epf;
       END IF;
            RETURN "Success";
       
    END$$

DELIMITER ;

-- --------------------------------------------------------

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
  `P_EPFNo` varchar(11) DEFAULT NULL,
  `C_EPFNo` varchar(11) DEFAULT NULL,
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
  `PIN` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Empid`, `P_EPFNo`, `C_EPFNo`, `EmpName`, `Gender`, `NIC`, `Address`, `FirstAppointment_Date`, `Email`, `Contact_No`, `CenterLocation`, `Designation`, `TypeOf_Appointment`, `PIN`) VALUES
(1, '1', '1', 'Azfara', 'F', '992147369V', 'Kattankudy', '2022-12-08', 'sahabdeenabdurrahman@gmail.com', '0722627139', 'o1', 'Instructor', 'P', '142507'),
(2, '1111', NULL, 'SAAM', 'F', '991456789V', 'Kattankudy', '2022-12-05', 'alishasehrish7199@gmail.com', '0741258963', 'Kattankudy NVTI', 'Instructor', 'P', '222003'),
(3, NULL, '655', 'althaf', 'M', '6558996512', 'Kattankudy', '2022-04-06', 'fathlaf099@gmail.com', '0564565852', 'Kattankudy VTC', 'Instructor', 'C', '147147'),
(4, NULL, '210', 'Althaf1', 'M', '789654123v', 'Galle', '2021-11-18', 'althafalf224@gmail.com', '0785465221', 'Galle VTC', 'Instructor', 'C', '110011'),
(10, NULL, '2000', 'Amaan', 'M', '789845623V', 'Galle', '2022-08-15', 'keerthanastephen21@gmail.com', '0784565123', 'Galle VTC', 'Instructor', 'C', '147741'),
(11, NULL, '12345', 'afry', 'M', '78956445', 'Galle', '2022-08-15', 'afrymuhamath@gmail.com', '0745896321', 'Galle VTC', 'Instructor', 'C', '414141'),
(111, '1896', NULL, 'Althaf1', 'M', '789845623V', 'Colombo', '2022-08-15', 'fathlaf0991@gmail.com', '0784565123', 'VTA', 'Instructor', 'P', '147896'),
(112, '7458', NULL, 'afry', 'M', '78956445', 'Colombo', '2023-01-11', 'fathlaf0919@gmail.com', '0745896321', 'VTA', 'Instructor', 'P', '786545'),
(113, '2587', NULL, 'Althaf1', 'M', '789845623V', 'Colombo', '2022-08-15', 'fathlaf0929@gmail.com', '0784565123', 'VTA', 'Instructor', 'P', '456875'),
(115, NULL, '1748', 'RAM', 'M', '741582369V', 'Kandy', '2023-01-11', 'fathlaf0939@gmail.com', '0745896213', 'Kandy VTC', 'Instructor', 'C', '789456'),
(116, '2135', '', 'Amaan', 'M', '789845623V', 'Colombo', '2023-01-11', 'fathlaf0994@gmail.com', '0745896321', 'VTA', 'Instructor', 'P', '999996'),
(117, NULL, '2000', 'Amaan', 'M', '789845623V', 'Kandy', '2023-01-20', 'hatunsehrish12@gmail.com', '0745896321', 'Kandy VTC', 'Instructor', 'C', '745698'),
(118, '1568', '2000', 'FGYFGYF', 'M', 'TYFTY', 'Kandy', '2023-01-13', 'althaf224@gmail.com', '0754812369', 'Kandy VTC', 'Instructor', 'P', '565464'),
(119, NULL, '258', 'GVGV', 'M', '5465465', 'Jaffna', '2023-01-09', 'fathlaf09779@gmail.com', '0745896321', 'Jaffna VTC', 'Student', 'C', '565467'),
(120, '5445', '45', 'GHG', 'M', '56546546', 'Kandy', '2023-01-11', 'gytyuHGVtui@gmail.com', '0778565646', 'Kandy VTC', 'Instructor', 'P', '44658'),
(121, '4984', '6544', 'GHCFG', 'F', '3654654', 'Jaffna', '2023-01-04', 'gyDtyutui@gmail.com', '0748564545', 'Jaffna VTC', 'Instructor', 'P', '21321'),
(122, '45646', '464', 'gvgftv', 'F', '65656546', 'Jaffna', '2023-01-18', 'hadtunsehrish@gmail.com', '078456556', 'Jaffna VTC', 'Instructor', 'P', '456465'),
(123, '8489', '4584', 'ggyfhg', 'F', '65465464', 'Jaffna', '2023-01-04', 'althdafalf224@gmail.com', '0745896321', 'Jaffna VTC', 'Instructor', 'P', '786547'),
(124, '4654', NULL, 'Amaan', 'F', '78956445', 'Nuwara-Eliya', '2023-01-04', 'fathlaf0599@gmail.com', '0745896321', 'Nuwara-Eliya VTC', 'Instructor', 'P', '999994'),
(125, NULL, '12346', 'Amaan', 'M', '789845623V', 'Nuwara-Eliya', '2023-01-13', 'fathlaf0999@gmail.com', '0784565123', 'Nuwara-Eliya VTC', 'Instructor', 'C', '999997'),
(126, '6346', NULL, 'xsdcddsfc', 'M', '567678', 'dfgfdgbd', '2023-02-02', 'sabdrahman333@gmail.com', '0722627139', 'Kaluwanchikudy', 'Store Keeper', 'P', '115577'),
(127, NULL, '5002', 'Osman', 'M', '992890550V', 'Colombo', '0000-00-00', 'sahabdeenabdurrahman2@gmail.co', '0722627139', 'Vellavely', 'Store Keeper', 'C', '595160');

-- --------------------------------------------------------

--
-- Table structure for table `leave_details`
--

CREATE TABLE `leave_details` (
  `LD_Id` int(4) NOT NULL,
  `Empid` int(11) NOT NULL,
  `FromDate` date NOT NULL,
  `ToDate` date NOT NULL,
  `total_days` decimal(11,2) NOT NULL,
  `Reason` varchar(100) NOT NULL,
  `AppliedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Acting_Person` varchar(20) NOT NULL,
  `CL_id` varchar(4) NOT NULL,
  `is_read` int(1) NOT NULL DEFAULT '0',
  `Remark` varchar(255) NOT NULL,
  `Approved_on` datetime NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `nopay` tinyint(1) NOT NULL,
  `nopay_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_details`
--

INSERT INTO `leave_details` (`LD_Id`, `Empid`, `FromDate`, `ToDate`, `total_days`, `Reason`, `AppliedDate`, `Acting_Person`, `CL_id`, `is_read`, `Remark`, `Approved_on`, `Status`, `nopay`, `nopay_days`) VALUES
(1, 1, '2023-01-30', '2023-02-07', '1.00', 'hjyfhjgh', '2023-04-26 09:12:48', 'dfgyrytfry', 'CL2', 1, '', '0000-00-00 00:00:00', 1, 0, 0),
(2, 1, '2022-12-26', '2022-12-15', '1.00', 'UFGVJJ', '2023-04-17 04:55:45', 'GJVJ', 'CL1', 1, '', '0000-00-00 00:00:00', 2, 1, 2),
(3, 3, '2022-12-19', '2022-12-21', '1.00', 'Personal', '2023-01-30 07:55:42', 'SAAM', 'CL3', 1, 'NO Comments', '0000-00-00 00:00:00', 2, 0, 0),
(4, 4, '2023-01-28', '2023-02-07', '1.00', 'personal', '2023-01-30 04:04:33', 'Azfara', 'CL1', 1, '', '0000-00-00 00:00:00', 1, 0, 0),
(5, 2, '2022-12-30', '2023-01-02', '1.00', 'lunch', '2023-02-01 03:34:03', 'Azfara', 'CL3', 1, '', '0000-00-00 00:00:00', 0, 0, 0),
(6, 1, '2022-06-09', '2022-09-07', '1.00', 'GHYHGVHBVCGTYHVYY', '2023-03-29 09:17:15', 'UYUYHJNHHJ', 'CL2', 1, '', '0000-00-00 00:00:00', 0, 0, 0),
(7, 1, '2023-01-24', '2023-04-04', '1.00', 'WEWRTRT', '2023-03-17 05:40:00', 'UYUYHJNHHJ', 'CL2', 1, '', '0000-00-00 00:00:00', 2, 0, 0),
(8, 115, '2023-03-01', '2023-03-24', '1.00', 'fever', '2023-03-29 09:16:47', '', 'CL2', 1, 'Kumar', '0000-00-00 00:00:00', 2, 1, 0),
(9, 118, '2023-02-03', '2023-02-07', '1.00', 'fever', '2023-02-06 21:37:52', 'asfara', 'CL2', 1, '', '0000-00-00 00:00:00', 1, 0, 0),
(10, 122, '2023-01-14', '2023-01-20', '1.00', 'fever', '2023-01-16 08:33:57', 'asfara', 'CL2', 0, '', '0000-00-00 00:00:00', 1, 0, 0),
(11, 119, '2022-12-14', '2022-12-15', '1.00', 'fever', '2023-04-27 05:09:13', 'asfara', 'CL2', 1, '', '0000-00-00 00:00:00', 1, 0, 0),
(12, 120, '2023-01-14', '2023-01-28', '1.00', 'fever', '2023-01-16 08:33:13', 'asfara', 'CL1', 1, '', '0000-00-00 00:00:00', 1, 0, 0),
(13, 121, '2023-01-04', '2023-01-10', '1.00', 'fever', '2023-01-12 06:14:55', 'asfara', 'CL1', 1, '', '0000-00-00 00:00:00', 1, 0, 0),
(14, 111, '2023-01-06', '2023-01-10', '1.00', 'fever', '2023-01-13 08:48:44', 'asfara', 'CL1', 1, '', '0000-00-00 00:00:00', 1, 0, 0),
(15, 112, '2023-01-02', '2023-01-10', '1.00', 'fever', '2023-01-12 06:15:40', 'asfara', 'CL1', 1, '', '0000-00-00 00:00:00', 1, 0, 0),
(16, 113, '2023-01-01', '2023-01-10', '1.00', 'fever', '2023-01-12 06:15:42', 'asfara', 'CL1', 1, '', '0000-00-00 00:00:00', 1, 0, 0),
(17, 125, '2023-01-03', '2023-01-10', '1.00', 'Nsad', '2023-04-03 04:22:55', 'asfara', 'CL2', 1, 'mkjl', '0000-00-00 00:00:00', 2, 1, 1),
(21, 4, '2023-02-08', '2023-02-15', '10.00', 'maternity', '2023-02-07 07:28:41', 'UYUYHJNHHJ', 'CL4', 1, '', '0000-00-00 00:00:00', 0, 0, 0),
(22, 2, '2023-02-02', '2023-02-09', '6.00', 'chummaa', '2023-02-06 21:40:29', 'UYUYHJNHHJ', 'CL2', 1, '', '0000-00-00 00:00:00', 1, 0, 0),
(30, 1, '2023-02-08', '2023-02-10', '2.00', 'Casual', '2023-02-02 08:40:06', 'GJVJ', 'CL3', 0, '', '0000-00-00 00:00:00', 0, 0, 0),
(31, 1, '2023-02-10', '2023-02-13', '1.00', 'Casual', '2023-05-02 04:17:19', 'UYUYHJNHHJ', 'CL3', 1, '', '0000-00-00 00:00:00', 0, 0, 0),
(32, 1, '2023-02-24', '2023-02-27', '1.00', 'Annual', '2023-02-02 08:41:57', 'UYUYHJNHHJ', 'CL2', 0, '', '0000-00-00 00:00:00', 0, 0, 0),
(33, 1, '2023-02-15', '2023-02-16', '1.00', 'Annual', '2023-02-02 08:49:44', 'GJVJ', 'CL2', 0, '', '0000-00-00 00:00:00', 0, 0, 0),
(34, 1, '2023-02-10', '2023-02-13', '1.00', 'htgvh', '2023-02-07 08:56:56', 'GJVJ', 'CL1', 1, '', '0000-00-00 00:00:00', 0, 0, 0),
(35, 1, '2023-02-21', '2023-02-22', '1.00', 'sdfg', '2023-02-02 09:05:10', 'sgtrg', 'CL3', 0, '', '0000-00-00 00:00:00', 0, 0, 0),
(36, 1, '2023-02-14', '2023-02-15', '1.00', 'czxfvsf', '2023-02-02 09:07:59', '546456', 'CL2', 0, '', '0000-00-00 00:00:00', 0, 0, 0),
(38, 1, '2023-02-17', '2023-02-21', '2.00', 'wsqasd', '2023-02-02 09:12:03', 'fryhrfvyh', 'CL3', 0, '', '0000-00-00 00:00:00', 0, 0, 0),
(39, 1, '2023-02-10', '2023-02-13', '1.00', 'Annual', '2023-02-03 07:02:05', 'GJVJ', 'CL2', 0, '', '0000-00-00 00:00:00', 0, 0, 0),
(40, 1, '2023-02-16', '2023-02-17', '1.00', 'Annual', '2023-02-03 07:11:44', 'fryhrfvyh', 'CL2', 0, '', '0000-00-00 00:00:00', 0, 0, 0),
(41, 1, '2023-02-08', '2023-02-09', '1.00', 'Annual', '2023-02-07 08:56:50', 'fryhrfvyh', 'CL1', 1, '', '0000-00-00 00:00:00', 0, 0, 0),
(42, 1, '2023-02-28', '2023-03-01', '1.00', 'Annual', '2023-02-07 08:56:01', 'fryhrfvyh', 'CL2', 1, '', '0000-00-00 00:00:00', 0, 0, 0),
(43, 1, '2023-02-28', '2023-03-01', '1.00', 'Annual', '2023-02-07 06:36:28', 'fryhrfvyh', 'CL2', 1, '', '0000-00-00 00:00:00', 0, 0, 0),
(44, 10, '2023-02-05', '2023-02-09', '3.00', 'Fever', '2023-02-06 21:42:24', 'Staff1', 'CL1', 1, 'OK', '0000-00-00 00:00:00', 1, 0, 0),
(45, 1, '2023-04-10', '2023-04-02', '5.00', 'werertg', '2023-04-17 07:29:51', 'sgtrg', 'CL3', 0, '', '0000-00-00 00:00:00', 0, 0, 0),
(46, 1, '2023-04-10', '2023-04-02', '5.00', 'werertg', '2023-04-17 07:29:57', 'sgtrg', 'CL3', 0, '', '0000-00-00 00:00:00', 0, 0, 0),
(47, 1, '2023-04-09', '2023-04-11', '2.00', 'terryftryut', '2023-04-17 07:31:19', 'dgfdhgkuip', 'CL2', 0, '', '0000-00-00 00:00:00', 0, 0, 0),
(51, 1, '2023-04-05', '2023-04-06', '2.50', 'rhtyju', '2023-04-27 05:54:44', 'fryhrfvyh', 'CL1', 0, '', '0000-00-00 00:00:00', 1, 0, 0),
(52, 1, '2023-04-05', '2023-04-06', '2.00', 'rhtyju', '2023-04-18 03:42:34', 'fryhrfvyh', 'CL1', 0, '', '0000-00-00 00:00:00', 0, 0, 0),
(53, 1, '2023-04-05', '2023-04-06', '2.00', 'rhtyju', '2023-04-18 03:42:45', 'fryhrfvyh', 'CL1', 0, '', '0000-00-00 00:00:00', 0, 0, 0),
(54, 1, '2023-04-12', '2023-04-18', '1.00', 'ygfdsjytuo', '2023-04-27 04:06:17', 'GJVJ', 'CL3', 0, '', '0000-00-00 00:00:00', 1, 0, 0),
(55, 1, '2023-04-20', '2023-04-23', '0.50', 'hhuhuhoihju', '2023-04-18 05:01:09', 'hjjhkjl;k', 'CL2', 0, '', '0000-00-00 00:00:00', 1, 0, 0),
(56, 1, '2023-04-10', '2023-04-20', '12.00', 'hgfgh', '2023-04-26 09:10:02', 'UYUYHJNHHJ', 'CL2', 0, '', '0000-00-00 00:00:00', 0, 0, 0),
(57, 1, '2023-05-10', '2023-06-08', '0.50', 'gthgv', '2023-05-02 02:46:04', 'gth', 'CL3', 0, '', '0000-00-00 00:00:00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `manageuser`
--

CREATE TABLE `manageuser` (
  `U_Id` int(11) NOT NULL,
  `EPFNo` int(11) NOT NULL,
  `PIN` varchar(6) NOT NULL,
  `UserType` char(1) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manageuser`
--

INSERT INTO `manageuser` (`U_Id`, `EPFNo`, `PIN`, `UserType`, `Image`, `status`) VALUES
(2, 210, '110011', 'O', '63d8bdf478fd1alf.jpg', 1),
(3, 1, '142507', 'A', '63e07e65d45edpic2.jpg', 1),
(5, 2000, '147741', 'O', '63b696ff0342f1.PNG', 1),
(6, 1111, '222003', 'A', '63b69fccb2b44happy-and-enjoy-cat-in-beach-in-the-summer-cartoon-illustration-vector.jpg', 1),
(18, 6346, '115577', 'O', '641d6e3e04b84product-2.jpg', 1),
(19, 5002, '595160', 'O', '', 1),
(42, 655, '147147', 'O', '', 1),
(43, 210, '110011', 'O', '', 1),
(44, 2000, '147741', 'O', '', 1),
(45, 12345, '414141', 'O', '', 1),
(46, 1896, '147896', 'O', '', 1),
(47, 7458, '786545', 'O', '', 1),
(48, 2587, '456875', 'O', '', 1),
(49, 1748, '789456', 'O', '', 1),
(50, 2135, '999996', 'O', '', 1),
(51, 2000, '745698', 'O', '', 1),
(52, 1568, '565464', 'O', '', 1),
(53, 258, '565467', 'O', '', 1),
(54, 45, '44658', 'O', '', 1),
(55, 6544, '21321', 'O', '', 1),
(56, 464, '456465', 'O', '', 1),
(57, 4584, '786547', 'O', '', 0),
(58, 4654, '999994', 'O', '', 1),
(59, 12346, '999997', 'O', '', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwcentre_dutyinfo`
--
CREATE TABLE `vwcentre_dutyinfo` (
`CenterLocation` varchar(20)
,`Employees_On_Duty` bigint(21)
,`Total_Employees` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwcentre_info`
--
CREATE TABLE `vwcentre_info` (
`CenterLocation` varchar(20)
,`Total_Employees` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwcentre_leaveinfo`
--
CREATE TABLE `vwcentre_leaveinfo` (
`CenterLocation` varchar(20)
,`Employees_On_Leave` bigint(21)
,`Total_Employees` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwcentre_lvdutyinfo`
--
CREATE TABLE `vwcentre_lvdutyinfo` (
`CenterLocation` varchar(20)
,`Employees_On_Duty` bigint(22)
,`Total_Employees` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `vwcentre_dutyinfo`
--
DROP TABLE IF EXISTS `vwcentre_dutyinfo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwcentre_dutyinfo`  AS  select `e`.`CenterLocation` AS `CenterLocation`,count(`e`.`Empid`) AS `Employees_On_Duty`,`v`.`Total_Employees` AS `Total_Employees` from (`employee` `e` join `vwcentre_info` `v` on((`e`.`CenterLocation` = `v`.`CenterLocation`))) where (not(`e`.`CenterLocation` in (select `e`.`CenterLocation` from (`leave_details` `l` left join `employee` `e` on((`l`.`Empid` = `e`.`Empid`))) where ((`l`.`Status` = 1) and (curdate() between `l`.`FromDate` and `l`.`ToDate`)) group by `e`.`CenterLocation`))) group by `e`.`CenterLocation` ;

-- --------------------------------------------------------

--
-- Structure for view `vwcentre_info`
--
DROP TABLE IF EXISTS `vwcentre_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwcentre_info`  AS  select `employee`.`CenterLocation` AS `CenterLocation`,count(`employee`.`Empid`) AS `Total_Employees` from `employee` group by `employee`.`CenterLocation` ;

-- --------------------------------------------------------

--
-- Structure for view `vwcentre_leaveinfo`
--
DROP TABLE IF EXISTS `vwcentre_leaveinfo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwcentre_leaveinfo`  AS  select `e`.`CenterLocation` AS `CenterLocation`,count(distinct `l`.`Empid`) AS `Employees_On_Leave`,`v`.`Total_Employees` AS `Total_Employees` from ((`leave_details` `l` left join `employee` `e` on((`l`.`Empid` = `e`.`Empid`))) join `vwcentre_info` `v` on((`e`.`CenterLocation` = `v`.`CenterLocation`))) where ((`l`.`Status` = 1) and (curdate() between `l`.`FromDate` and `l`.`ToDate`)) group by `e`.`CenterLocation` ;

-- --------------------------------------------------------

--
-- Structure for view `vwcentre_lvdutyinfo`
--
DROP TABLE IF EXISTS `vwcentre_lvdutyinfo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwcentre_lvdutyinfo`  AS  select `e`.`CenterLocation` AS `CenterLocation`,(`v`.`Total_Employees` - count(distinct `l`.`Empid`)) AS `Employees_On_Duty`,`v`.`Total_Employees` AS `Total_Employees` from ((`leave_details` `l` left join `employee` `e` on((`l`.`Empid` = `e`.`Empid`))) join `vwcentre_info` `v` on((`e`.`CenterLocation` = `v`.`CenterLocation`))) where ((`l`.`Status` = 1) and (curdate() between `l`.`FromDate` and `l`.`ToDate`)) group by `e`.`CenterLocation` ;

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
  ADD PRIMARY KEY (`Empid`),
  ADD UNIQUE KEY `PIN` (`PIN`);

--
-- Indexes for table `leave_details`
--
ALTER TABLE `leave_details`
  ADD PRIMARY KEY (`LD_Id`);

--
-- Indexes for table `manageuser`
--
ALTER TABLE `manageuser`
  ADD PRIMARY KEY (`U_Id`),
  ADD KEY `PIN` (`PIN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Empid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT for table `leave_details`
--
ALTER TABLE `leave_details`
  MODIFY `LD_Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `manageuser`
--
ALTER TABLE `manageuser`
  MODIFY `U_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `manageuser`
--
ALTER TABLE `manageuser`
  ADD CONSTRAINT `manageuser_ibfk_1` FOREIGN KEY (`PIN`) REFERENCES `employee` (`PIN`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
