-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 03, 2019 at 05:42 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `VIPTeenagers`
--

-- --------------------------------------------------------

--
-- Table structure for table `Advisor`
--

CREATE TABLE `Advisor` (
  `AdvisorID` varchar(7) NOT NULL,
  `Rate` float NOT NULL,
  `Income` float NOT NULL,
  `N1` varchar(45) DEFAULT NULL,
  `N2` varchar(45) DEFAULT NULL,
  `N3` varchar(45) DEFAULT NULL,
  `N4` varchar(45) DEFAULT NULL,
  `N5` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Class`
--

CREATE TABLE `Class` (
  `ClassID` varchar(3) NOT NULL,
  `TeacherID` varchar(7) NOT NULL,
  `AdvisorID` varchar(7) NOT NULL,
  `Student1ID` varchar(7) DEFAULT NULL,
  `Student2ID` varchar(45) DEFAULT NULL,
  `Student3ID` varchar(45) DEFAULT NULL,
  `PackageID` varchar(45) NOT NULL,
  `N1` varchar(45) DEFAULT NULL,
  `N2` varchar(45) DEFAULT NULL,
  `N3` varchar(45) DEFAULT NULL,
  `N4` varchar(45) DEFAULT NULL,
  `N5` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Content`
--

CREATE TABLE `Content` (
  `PackageID` varchar(7) NOT NULL,
  `CourseID` varchar(7) NOT NULL,
  `N1` varchar(45) DEFAULT NULL,
  `N2` varchar(45) DEFAULT NULL,
  `N3` varchar(45) DEFAULT NULL,
  `N4` varchar(45) DEFAULT NULL,
  `N5` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

CREATE TABLE `Course` (
  `CourseID` varchar(3) NOT NULL,
  `Course_name` varchar(45) NOT NULL,
  `Level` int(11) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Rate` float NOT NULL,
  `N1` varchar(45) DEFAULT NULL,
  `N2` varchar(45) DEFAULT NULL,
  `N3` varchar(45) DEFAULT NULL,
  `N4` varchar(45) DEFAULT NULL,
  `N5` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Lesson`
--

CREATE TABLE `Lesson` (
  `LessonID` varchar(45) NOT NULL,
  `PackageID` varchar(7) NOT NULL,
  `CourseID` varchar(7) NOT NULL,
  `ClassID` varchar(7) NOT NULL,
  `Timestamp` datetime NOT NULL,
  `N1` varchar(45) DEFAULT NULL,
  `N2` varchar(45) DEFAULT NULL,
  `N3` varchar(45) DEFAULT NULL,
  `N4` varchar(45) DEFAULT NULL,
  `N5` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `LessonConfirm`
--

CREATE TABLE `LessonConfirm` (
  `LessonID` varchar(45) NOT NULL,
  `UserID` varchar(7) NOT NULL,
  `Timestamp` datetime DEFAULT NULL,
  `N1` varchar(45) DEFAULT NULL,
  `N2` varchar(45) DEFAULT NULL,
  `N3` varchar(45) DEFAULT NULL,
  `N4` varchar(45) DEFAULT NULL,
  `N5` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `OrderID` varchar(5) NOT NULL,
  `StudentID` varchar(7) NOT NULL,
  `PackageID` varchar(7) NOT NULL,
  `Amount` float NOT NULL,
  `Payment` float NOT NULL,
  `Time` datetime NOT NULL,
  `N1` varchar(45) DEFAULT NULL,
  `N2` varchar(45) DEFAULT NULL,
  `N3` varchar(45) DEFAULT NULL,
  `N4` varchar(45) DEFAULT NULL,
  `N5` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Package`
--

CREATE TABLE `Package` (
  `PackageID` varchar(3) NOT NULL,
  `Price` float NOT NULL,
  `Level` int(11) NOT NULL,
  `N1` varchar(45) DEFAULT NULL,
  `N2` varchar(45) DEFAULT NULL,
  `N3` varchar(45) DEFAULT NULL,
  `N4` varchar(45) DEFAULT NULL,
  `N5` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `StudentID` varchar(7) NOT NULL,
  `Grade` varchar(45) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Class_Level` int(11) NOT NULL,
  `ClassID` varchar(3) NOT NULL,
  `Intitial_deposit_date` date NOT NULL,
  `Tuition` float NOT NULL,
  `Balance` float NOT NULL,
  `Course` varchar(45) NOT NULL,
  `Advisor` varchar(45) NOT NULL,
  `N1` varchar(45) DEFAULT NULL,
  `N2` varchar(45) DEFAULT NULL,
  `N3` varchar(45) DEFAULT NULL,
  `N4` varchar(45) DEFAULT NULL,
  `N5` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Teacher`
--

CREATE TABLE `Teacher` (
  `TeacherID` varchar(7) NOT NULL,
  `Type` varchar(45) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Title` varchar(45) NOT NULL,
  `Schedule` varchar(100) NOT NULL,
  `ClassID` varchar(7) NOT NULL,
  `Rate` float NOT NULL,
  `Status` varchar(45) NOT NULL,
  `Income` float NOT NULL,
  `Audit` varchar(45) NOT NULL,
  `Audit_passed_date` datetime NOT NULL,
  `N1` varchar(45) DEFAULT NULL,
  `N2` varchar(45) DEFAULT NULL,
  `N3` varchar(45) DEFAULT NULL,
  `N4` varchar(45) DEFAULT NULL,
  `N5` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `UserID` varchar(7) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `User_type` varchar(45) NOT NULL,
  `Icon` varchar(45) DEFAULT NULL,
  `Last_name` varchar(45) NOT NULL,
  `First_name` varchar(45) NOT NULL,
  `Age` int(3) DEFAULT NULL,
  `WeChat_ID` varchar(45) DEFAULT NULL,
  `Registration_date` date NOT NULL,
  `Date_of_Birth` date DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `N1` varchar(45) DEFAULT NULL,
  `N2` varchar(45) DEFAULT NULL,
  `N3` varchar(45) DEFAULT NULL,
  `N4` varchar(45) DEFAULT NULL,
  `N5` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`UserID`, `Password`, `Email`, `Phone`, `User_type`, `Icon`, `Last_name`, `First_name`, `Age`, `WeChat_ID`, `Registration_date`, `Date_of_Birth`, `Gender`, `N1`, `N2`, `N3`, `N4`, `N5`) VALUES
('', 'aaaa', 'tim7501124@yahoo.com', '4563334567', '3', 'Icon', 'Shi', 'Weitao', 22, 'abc111', '2019-06-29', '2019-06-29', 'Male', NULL, NULL, NULL, NULL, NULL),
('1000001', 'aaaa', 'allaaaenti7511101124@yahoo.com', '4563334567', '3', 'Icon', 'Shi', 'Weitao', 22, 'abc111', '2019-06-29', '2019-06-29', 'Male', NULL, NULL, NULL, NULL, NULL),
('1000003', 'aaaa', 'timabc@yahoo.com', '4563334567', '3', 'Icon', 'Shi', 'Weitao', 22, 'abc111', '2019-06-29', '2019-06-29', 'Male', NULL, NULL, NULL, NULL, NULL),
('1000004', 'aaaa', 'bcda@yahoo.com', '4563334567', 'Teacher', 'Icon', 'Shi', 'Weitao', 22, 'abc111', '2019-06-29', '2019-06-29', 'Male', NULL, NULL, NULL, NULL, NULL),
('1000005', 'aaaa', 'tim2222@yahoo.com', '4673336666', 'Teacher', '', 'lll', 'aaaa', 23, '', '0000-00-00', '0000-00-00', 'Male', NULL, NULL, NULL, NULL, NULL),
('1000006', 'aaaa', 'aaaa78@qq.com', '4563334567', '1', '', 'Shi', 'Weitao', 22, '', '2019-06-29', '2019-06-29', 'Male', NULL, NULL, NULL, NULL, NULL),
('1000009', 'aaaa', 'timabc111@yahoo.com', '4563334567', '3', 'Icon', 'Shi', 'Weitao', 22, 'abc111', '2019-06-29', '2019-06-29', 'Male', NULL, NULL, NULL, NULL, NULL),
('3000002', 'aaaa', 'allen998@gmail.com', '4673336666', 'Teacher', '', 'Lee', 'Tianhao', 32, 'shun_0417', '0000-00-00', '0000-00-00', 'Female', NULL, NULL, NULL, NULL, NULL),
('3000006', 'aaaa', '12345678@qq.com', '4563334567', 'Teacher', '', 'Shi', 'Weitao', 22, '', '2019-06-29', '2019-06-29', 'Male', NULL, NULL, NULL, NULL, NULL),
('3000018', 'aaaa', 'allen11111@gmail.com', '1113332222', 'Teacher', '', 'Li', 'Allen', 22, '', '0000-00-00', '0000-00-00', 'Male', NULL, NULL, NULL, NULL, NULL),
('tim7511', 'aaaa', 'tim7511101124@yahoo.com', '4563334567', 'Teacher', 'Icon', 'Shi', 'Weitao', 22, 'abc111', '2019-06-29', '2019-06-29', 'Male', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Advisor`
--
ALTER TABLE `Advisor`
  ADD PRIMARY KEY (`AdvisorID`);

--
-- Indexes for table `Class`
--
ALTER TABLE `Class`
  ADD PRIMARY KEY (`ClassID`),
  ADD KEY `CAtoA_idx` (`AdvisorID`),
  ADD KEY `CTtoT_idx` (`TeacherID`),
  ADD KEY `CS1toS_idx` (`Student1ID`),
  ADD KEY `CS2toS_idx` (`Student2ID`),
  ADD KEY `CS3toS_idx` (`Student3ID`),
  ADD KEY `CPtoP_idx` (`PackageID`);

--
-- Indexes for table `Content`
--
ALTER TABLE `Content`
  ADD PRIMARY KEY (`PackageID`,`CourseID`),
  ADD KEY `CCtoC` (`CourseID`);

--
-- Indexes for table `Course`
--
ALTER TABLE `Course`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `Lesson`
--
ALTER TABLE `Lesson`
  ADD PRIMARY KEY (`LessonID`),
  ADD KEY `PackageID` (`PackageID`),
  ADD KEY `CourseID` (`CourseID`),
  ADD KEY `ClassID` (`ClassID`);

--
-- Indexes for table `LessonConfirm`
--
ALTER TABLE `LessonConfirm`
  ADD PRIMARY KEY (`LessonID`,`UserID`),
  ADD KEY `LCUtoL` (`UserID`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `OStoS_idx` (`StudentID`),
  ADD KEY `OPtoP_idx` (`PackageID`);

--
-- Indexes for table `Package`
--
ALTER TABLE `Package`
  ADD PRIMARY KEY (`PackageID`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`StudentID`),
  ADD KEY `SCtoC_idx` (`ClassID`);

--
-- Indexes for table `Teacher`
--
ALTER TABLE `Teacher`
  ADD PRIMARY KEY (`TeacherID`),
  ADD KEY `TCtoC_idx` (`ClassID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Advisor`
--
ALTER TABLE `Advisor`
  ADD CONSTRAINT `AtoU` FOREIGN KEY (`AdvisorID`) REFERENCES `User` (`UserID`);

--
-- Constraints for table `Class`
--
ALTER TABLE `Class`
  ADD CONSTRAINT `ClAtoA` FOREIGN KEY (`AdvisorID`) REFERENCES `Advisor` (`AdvisorID`),
  ADD CONSTRAINT `ClPtoP` FOREIGN KEY (`PackageID`) REFERENCES `Package` (`PackageID`),
  ADD CONSTRAINT `ClS1toS` FOREIGN KEY (`Student1ID`) REFERENCES `Student` (`StudentID`),
  ADD CONSTRAINT `ClS2toS` FOREIGN KEY (`Student2ID`) REFERENCES `Student` (`StudentID`),
  ADD CONSTRAINT `ClS3toS` FOREIGN KEY (`Student3ID`) REFERENCES `Student` (`StudentID`),
  ADD CONSTRAINT `ClTtoT` FOREIGN KEY (`TeacherID`) REFERENCES `Teacher` (`TeacherID`);

--
-- Constraints for table `Content`
--
ALTER TABLE `Content`
  ADD CONSTRAINT `CCtoC` FOREIGN KEY (`CourseID`) REFERENCES `Course` (`CourseID`),
  ADD CONSTRAINT `CPtoP` FOREIGN KEY (`PackageID`) REFERENCES `Package` (`PackageID`);

--
-- Constraints for table `Lesson`
--
ALTER TABLE `Lesson`
  ADD CONSTRAINT `LCltoCl` FOREIGN KEY (`ClassID`) REFERENCES `Class` (`ClassID`),
  ADD CONSTRAINT `LCotoCo` FOREIGN KEY (`CourseID`) REFERENCES `Course` (`CourseID`),
  ADD CONSTRAINT `LPtoP` FOREIGN KEY (`PackageID`) REFERENCES `Package` (`PackageID`);

--
-- Constraints for table `LessonConfirm`
--
ALTER TABLE `LessonConfirm`
  ADD CONSTRAINT `LCLtoL` FOREIGN KEY (`LessonID`) REFERENCES `Lesson` (`LessonID`),
  ADD CONSTRAINT `LCUtoL` FOREIGN KEY (`UserID`) REFERENCES `Student` (`StudentID`);

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `OPtoP` FOREIGN KEY (`PackageID`) REFERENCES `Package` (`PackageID`),
  ADD CONSTRAINT `OStoS` FOREIGN KEY (`StudentID`) REFERENCES `Student` (`StudentID`);

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `SCtoC` FOREIGN KEY (`ClassID`) REFERENCES `Class` (`ClassID`),
  ADD CONSTRAINT `StoU` FOREIGN KEY (`StudentID`) REFERENCES `User` (`UserID`);

--
-- Constraints for table `Teacher`
--
ALTER TABLE `Teacher`
  ADD CONSTRAINT `TCtoC` FOREIGN KEY (`ClassID`) REFERENCES `Class` (`ClassID`),
  ADD CONSTRAINT `TtoU` FOREIGN KEY (`TeacherID`) REFERENCES `User` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
