-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 10:41 AM
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

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `insertemp` (`epf` INT(4), `name` VARCHAR(20), `sex` CHAR(1), `nic` VARCHAR(12), `Address` VARCHAR(50), `fad` DATE, `email` VARCHAR(30), `contact` VARCHAR(10), `center` VARCHAR(20), `desig` VARCHAR(20), `toa` CHAR(1)) RETURNS VARCHAR(20) CHARSET latin1  BEGIN
    	IF toa ="P" THEN 
        	INSERT INTO employee (P_EPFNo,EmpName,Gender,NIC,Address,FirstAppointment_Date,Email,Contact_No,CenterLocation,Designation,TypeOf_Appointment)
            VALUES (epf,name,sex,nic,address,fad,email,contact,center,desig,toa);
       ELSE 
        	INSERT INTO employee (C_EPFNo,EmpName,Gender,NIC,Address,FirstAppointment_Date,Email,Contact_No,CenterLocation,Designation,TypeOf_Appointment)
            VALUES (epf,name,sex,nic,address,fad,email,contact,center,desig,toa);
       END IF;
            RETURN "Success";
       
    END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `retrieve` (`type` CHAR(1)) RETURNS TEXT CHARSET latin1  BEGIN
    	DECLARE ans text;
   		if (Type='p') THEN 
			SET ans='SELECT Empid,P_EPFNo,EmpName,Gender,NIC,Address,FirstAppointment_Date,Email,Contact_No,CenterLocation,Designation,TypeOf_Appointment FROM employee';
        ELSE
          SET ans='SELECT Empid,C_EPFNo,EmpName,Gender,NIC,Address,FirstAppointment_Date,Email,Contact_No,CenterLocation,Designation,TypeOf_Appointment FROM employee';  
                   
        END IF;
        
        RETURN ans;
       
    END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `updateemp` (`epf` INT(4), `name` VARCHAR(20), `sex` CHAR(1), `nic` VARCHAR(12), `Addre` VARCHAR(50), `fad` DATE, `mail` VARCHAR(30), `Contact` VARCHAR(10), `Center` VARCHAR(20), `Desig` VARCHAR(20), `ta` CHAR(1)) RETURNS VARCHAR(10) CHARSET latin1  BEGIN
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
('CL4', 'Special Leave', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Empid` int(11) NOT NULL,
  `P_EPFNo` int(11) NOT NULL,
  `C_EPFNo` int(11) NOT NULL,
  `EmpName` varchar(30) NOT NULL,
  `Gender` char(1) NOT NULL,
  `NIC` varchar(12) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `FirstAppointment_Date` date NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Contact_No` varchar(10) NOT NULL,
  `CenterLocation` varchar(20) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  `TypeOf_Appointment` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Empid`, `P_EPFNo`, `C_EPFNo`, `EmpName`, `Gender`, `NIC`, `Address`, `FirstAppointment_Date`, `Email`, `Contact_No`, `CenterLocation`, `Designation`, `TypeOf_Appointment`) VALUES
(1, 4001, 0, 'Rani', 'F', '20001456215', 'Batticaloa', '2022-12-06', 'abc@gmail.com', '0778342102', 'Batticaloa', 'Instractor', 'P'),
(2, 4002, 0, 'Mala', 'M', '123654789', 'Batticaloa', '0000-00-00', 'abc@gmail.com', '0778342102', 'Batticaloa', 'Instractor', 'p'),
(3, 0, 4003, 'Mala', 'M', '14528', 'Batticaloa', '0000-00-00', 'abc@gmail.com', '0778342102', 'Batticaloa', 'Instractor', 'C'),
(4, 7001, 4004, 'Jeya', 'f', '142546', 'batti', '0000-00-00', 'abc@gmail.com', '0772345156', 'batti', 'clark', 'P'),
(5, 1400, 0, 'Raja', 'M', '123654', 'Batticaloa', '0000-00-00', 'abc@gmail.com', '0778342102', 'Batticaloa', 'Instractor', 'P'),
(6, 0, 1401, 'Gobal', 'M', '32564', 'Batticaloa', '0000-00-00', 'abc@gmail.com', '0778342102', 'Batticaloa', 'Instractor', 'C'),
(7, 0, 1402, 'Mala', 'F', '78956412', 'Batticaloa', '0000-00-00', 'abc@gmail.com', '0778342102', 'Batticaloa', 'Instractor', 'C'),
(8, 0, 1402, 'Mala', 'F', '78956412', 'Batticaloa', '0000-00-00', 'abc@gmail.com', '0778342102', 'Batticaloa', 'Instractor', 'C'),
(9, 0, 1402, 'Mala', 'F', '78956412', 'Batticaloa', '0000-00-00', 'abc@gmail.com', '0778342102', 'Batticaloa', 'Instractor', 'C'),
(10, 0, 1402, 'Mala', 'F', '78956412', 'Batticaloa', '0000-00-00', 'abc@gmail.com', '0778342102', 'Batticaloa', 'Instractor', 'C'),
(11, 0, 1402, 'Mala', 'F', '78956412', 'Batticaloa', '0000-00-00', 'abc@gmail.com', '0778342102', 'Batticaloa', 'Instractor', 'C'),
(12, 0, 1402, 'Mala', 'F', '78956412', 'Batticaloa', '0000-00-00', 'abc@gmail.com', '0778342102', 'Batticaloa', 'Instractor', 'C'),
(13, 0, 1402, 'Mala', 'F', '78956412', 'Batticaloa', '0000-00-00', 'abc@gmail.com', '0778342102', 'Batticaloa', 'Instractor', 'C'),
(14, 0, 1402, 'Mala', 'F', '78956412', 'Batticaloa', '0000-00-00', 'abc@gmail.com', '0778342102', 'Batticaloa', 'Instractor', 'C'),
(15, 0, 1402, 'Mala', 'F', '78956412', 'Batticaloa', '0000-00-00', 'abc@gmail.com', '0778342102', 'Batticaloa', 'Instractor', 'C'),
(16, 0, 1402, 'Mala', 'F', '78956412', 'Batticaloa', '0000-00-00', 'abc@gmail.com', '0778342102', 'Batticaloa', 'Instractor', 'C'),
(17, 1119, 0, 'Sulo', 'F', '230256', 'Batti', '0000-00-00', 'sulo@gmil.com', '0772277987', 'Batti', 'Web Developer', 'P'),
(18, 1990, 0, 'Kamala', 'F', '256486', 'Batticaloa', '0000-00-00', 'kamal@gmail.com', '0771456952', 'kandy', 'Clark', 'P'),
(19, 0, 5855, 'Lila', 'F', '5645645', 'Kandy', '0000-00-00', 'lila@gmail.com', '0778584103', 'Batticaloa', 'Clark', 'C'),
(20, 2212, 0, 'Rani', 'F', '2525', 'Batti', '0000-00-00', 'rani@gmail.com', '0772536149', 'Batti', 'Instractor', 'P'),
(21, 1425, 0, 'Raja', 'M', '12345', 'Batti', '0000-00-00', 'raja@gmail.com', '0772564896', 'Batti', 'Clark', 'P'),
(22, 2514, 0, 'sulo1', 'F', '12365', 'Batticaloa', '2013-01-08', 'sulo1@gmail.com', '0773265145', 'Badulla', 'Clark', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `leave_details`
--

CREATE TABLE `leave_details` (
  `LD_Id` int(4) NOT NULL,
  `Empid` int(11) NOT NULL,
  `LC_Id` varchar(4) NOT NULL,
  `FromDate` date NOT NULL,
  `ToDate` date NOT NULL,
  `total_days` int(11) NOT NULL,
  `Reason` varchar(100) NOT NULL,
  `AppliedDate` date NOT NULL,
  `Acting_Person` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leave_status`
--

CREATE TABLE `leave_status` (
  `LS_id` varchar(4) NOT NULL,
  `Rec_by` varchar(15) NOT NULL,
  `Rec_status` varchar(10) NOT NULL,
  `Rec_date` date NOT NULL,
  `App_by` varchar(15) NOT NULL,
  `App_status` varchar(10) NOT NULL,
  `App_date` date NOT NULL,
  `Final_Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `manageuser`
--

CREATE TABLE `manageuser` (
  `U_Id` int(11) NOT NULL,
  `EPFNo` int(11) NOT NULL,
  `PIN` varchar(8) NOT NULL,
  `UserType` char(1) NOT NULL,
  `Image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manageuser`
--

INSERT INTO `manageuser` (`U_Id`, `EPFNo`, `PIN`, `UserType`, `Image`) VALUES
(1, 2550, '123', 'O', ''),
(2, 1425, '12345', 'O', ''),
(3, 2514, '12365', 'O', '');

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
-- Indexes for table `leave_status`
--
ALTER TABLE `leave_status`
  ADD PRIMARY KEY (`LS_id`);

--
-- Indexes for table `manageuser`
--
ALTER TABLE `manageuser`
  ADD PRIMARY KEY (`U_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Empid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `leave_details`
--
ALTER TABLE `leave_details`
  MODIFY `LD_Id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manageuser`
--
ALTER TABLE `manageuser`
  MODIFY `U_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
