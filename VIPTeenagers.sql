-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 21, 2019 at 12:01 AM
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
  `AdvisorID` int(11) NOT NULL,
  `Rate` float NOT NULL,
  `Income` float NOT NULL,
  `N1` varchar(45) DEFAULT NULL,
  `N2` varchar(45) DEFAULT NULL,
  `N3` varchar(45) DEFAULT NULL,
  `N4` varchar(45) DEFAULT NULL,
  `N5` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Advisor`
--

INSERT INTO `Advisor` (`AdvisorID`, `Rate`, `Income`, `N1`, `N2`, `N3`, `N4`, `N5`) VALUES
(3000004, 2, 0, NULL, NULL, NULL, NULL, NULL),
(3000005, 2, 3000, NULL, NULL, NULL, NULL, NULL),
(3000006, 2, 3000, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('2d946f7fc55f72e03b39dbe334825d772b2776e9', '::1', 1562989558, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323938393535383b),
('6d76642be964a80876d7d74b102f0a8040ed3321', '::1', 1562988027, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323938383032373b),
('808c2d6f22918d5fd87a499eb85eed117415c134', '::1', 1562988673, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323938383637333b),
('bd088bd75f06352baa7fff9aa25fcdc4488ca12b', '::1', 1562989022, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323938393032323b),
('3f51a35759718dc0f442eda548aeb1b60418b57a', '::1', 1562989335, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323938393333353b),
('86fe9bca0921c4388b9d0ee615bb27c72e17136d', '::1', 1562989669, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323938393636393b),
('82fbeb29f2a96430eb524e5fb81099d8f9a6a27a', '::1', 1562989569, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323938393535383b5573657249447c733a373a2231303030303030223b456d61696c7c733a31383a2274696d3735303234407961686f6f2e636f6d223b50686f6e657c733a31303a2234363933383033363630223b557365725f747970657c733a303a22223b49636f6e7c733a303a22223b4c6173745f6e616d657c733a323a224c69223b46697273745f6e616d657c733a353a22416c6c656e223b4167657c733a323a223137223b5765436861745f49447c733a393a227368756e5f30343136223b526567697374726174696f6e5f646174657c733a31393a22323031392d30372d31322032323a32303a3237223b446174655f6f665f42697274687c733a31303a22313933372d30372d3031223b47656e6465727c733a343a224d616c65223b6c6f676765645f696e7c623a313b),
('819a2b41669a071a524f31d0161a1666b1c40ad3', '::1', 1562989946, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323938393636393b),
('90b8bbdd8e24fd9844ca44da846a3ce08128a629', '::1', 1563066882, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333036363838323b),
('96a3c95f84e9ed876f023645fa1f8e117cfe2b38', '::1', 1563067920, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333036373932303b5573657249447c733a373a2232303030303033223b456d61696c7c733a31383a227465616368657231407961686f6f2e636f6d223b50686f6e657c733a31303a2234363733333336363636223b557365725f747970657c733a373a2254656163686572223b49636f6e7c733a333a22616161223b4c6173745f6e616d657c733a323a224c69223b46697273745f6e616d657c733a353a22416c6c656e223b4167657c733a323a223131223b5765436861745f49447c733a393a227368756e5f30343136223b526567697374726174696f6e5f646174657c733a31393a22323031392d30372d31332031383a33393a3137223b446174655f6f665f42697274687c733a31303a22303030302d30302d3030223b47656e6465727c733a343a224d616c65223b6c6f676765645f696e7c623a313b),
('a155f3ee475f198ac60af9c0b7eebe79bd2b3321', '::1', 1563071029, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333037313032393b5573657249447c733a373a2232303030303033223b456d61696c7c733a31383a227465616368657231407961686f6f2e636f6d223b50686f6e657c733a31303a2234363733333336363636223b557365725f747970657c733a373a2254656163686572223b49636f6e7c733a333a22616161223b4c6173745f6e616d657c733a323a224c69223b46697273745f6e616d657c733a353a22416c6c656e223b4167657c733a323a223131223b5765436861745f49447c733a393a227368756e5f30343136223b526567697374726174696f6e5f646174657c733a31393a22323031392d30372d31332031383a33393a3137223b446174655f6f665f42697274687c733a31303a22303030302d30302d3030223b47656e6465727c733a343a224d616c65223b6c6f676765645f696e7c623a313b),
('340177e58b4a1f5e4b56f667ef61b576966fd3fc', '::1', 1563071042, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333037313032393b),
('7a4767e08b7630e641a717ee54bb3438560a8166', '::1', 1563396022, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333339363031323b),
('5f82c09e44227514eefaf9df922d26b4c8cbe73c', '::1', 1563398232, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333339383233323b),
('4803615dddd29c8dd95c54626185ce8c198982d4', '::1', 1563398243, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333339383233323b),
('f74ae571bb1dbda9ab1d637baed64d4ece02ba4a', '::1', 1563415159, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333431353135393b),
('3a603146afee68c27f77615e8f3343999574a250', '::1', 1563415349, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333431353135393b),
('2a40d266eb0c336da91c1f60c18618b61a417b70', '::1', 1563483542, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333438333531313b),
('a21e1bbca985d4079609861a595af6a8e94ac178', '::1', 1563500000, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333530303030303b5573657249447c733a373a2233303030303033223b456d61696c7c733a31383a2261647669736f7231407961686f6f2e636f6d223b557365725f747970657c733a373a2241647669736f72223b),
('129007bfd3ba8f1007c4d8243311586f909c3cb2', '::1', 1563500455, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333530303435353b5573657249447c733a373a2233303030303033223b456d61696c7c733a31383a2261647669736f7231407961686f6f2e636f6d223b557365725f747970657c733a373a2241647669736f72223b),
('7cd271ed185edc4c3daf7f76c3c5a179747ef3f3', '::1', 1563500600, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333530303630303b),
('612bbf6b7bab2f22cd77a692c571af0fb4540f81', '::1', 1563500918, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333530303931383b5573657249447c733a373a2233303030303033223b456d61696c7c733a31383a2261647669736f7231407961686f6f2e636f6d223b557365725f747970657c733a373a2241647669736f72223b),
('57d2842a44c1d46d36a5d6b8f3951432195d6ab3', '::1', 1563500929, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333530303932393b),
('82867af37cb76abb0619be150c03264c3d1a50f8', '::1', 1563501143, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333530313134333b),
('63675f51856403e9e7a1f797cd698daffc869ea4', '::1', 1563501583, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333530313538333b5573657249447c733a373a2233303030303033223b456d61696c7c733a31383a2261647669736f7231407961686f6f2e636f6d223b557365725f747970657c733a373a2241647669736f72223b),
('85cdf65820060e573e9b123aecf7147aa1e4d8ea', '::1', 1563503222, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333530333232323b5573657249447c733a373a2233303030303030223b456d61696c7c733a31363a22616c6c656e393837364071712e636f6d223b557365725f747970657c733a373a2241647669736f72223b),
('fda894e865ddfad78a9c281035e0c64ef0b9ea12', '::1', 1563504024, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333530343032343b5573657249447c733a373a2233303030303030223b456d61696c7c733a31363a22616c6c656e393837364071712e636f6d223b557365725f747970657c733a373a2241647669736f72223b),
('c0d4a8f01518e72afbd72dc073a80f9c5d2cd8e4', '::1', 1563504204, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333530343230343b),
('7b0b2381dcd400a50f291bac09bf69a1fd1a55c7', '::1', 1563504298, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333530343239383b),
('2ea3d0899f79c15b574b5da14d000b3f583db042', '::1', 1563504501, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333530343530313b),
('0168abfbad8408681e0304cde31adc82f5631ee8', '::1', 1563504611, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333530343631313b),
('cca076193acabd96d985219e55f0ce0f82f23384', '::1', 1563504987, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333530343938373b5573657249447c733a373a2233303030303030223b456d61696c7c733a31363a22616c6c656e393837364071712e636f6d223b557365725f747970657c733a373a2241647669736f72223b),
('6220f83cd4a91882c0b1301b7dfb59b44f6f174a', '::1', 1563505685, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333530353638353b5573657249447c733a373a2233303030303030223b456d61696c7c733a31363a22616c6c656e393837364071712e636f6d223b557365725f747970657c733a373a2241647669736f72223b),
('9e1bdcf2f5cf80a00548c601f3be65a5396a3432', '::1', 1563505759, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333530353735393b),
('71c68c560091c0e4e27d3003d1ef0fca383e40fa', '::1', 1563505822, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333530353832323b),
('b6343a5bf339a09d6a050630d359b14893e3ac36', '::1', 1563505865, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333530353833323b5573657249447c733a373a2231303030303033223b456d61696c7c733a31383a2273747564656e7433407961686f6f2e636f6d223b557365725f747970657c733a373a2253747564656e74223b),
('6a18641c90b0b82eb147036fd4b94e5e30580c20', '::1', 1563567699, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333536373636333b5573657249447c733a373a2233303030303030223b456d61696c7c733a31363a22616c6c656e393837364071712e636f6d223b557365725f747970657c733a373a2241647669736f72223b),
('ca39afb3a64c1b99a770c01b3138e8ca39f898d3', '::1', 1563651192, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333635313139323b5573657249447c733a373a2232303030303033223b456d61696c7c733a31383a227465616368657231407961686f6f2e636f6d223b557365725f747970657c733a373a2254656163686572223b),
('173de32d6b4beb212c334f616461062139a9618b', '::1', 1563652218, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333635323231383b5573657249447c733a373a2232303030303033223b456d61696c7c733a31383a227465616368657231407961686f6f2e636f6d223b557365725f747970657c733a373a2254656163686572223b6f6e65577c733a303a22223b6f6e65537c733a303a22223b),
('df193e18019b7345d11a487a4d3fab40569f23b9', '::1', 1563652313, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333635323231383b5573657249447c733a373a2232303030303033223b456d61696c7c733a31383a227465616368657231407961686f6f2e636f6d223b557365725f747970657c733a373a2254656163686572223b),
('e4940a90fa45d02abffc6862513d3e4e7de4a002', '::1', 1563660005, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536333635393937363b5573657249447c733a373a2232303030303033223b456d61696c7c733a31383a227465616368657231407961686f6f2e636f6d223b557365725f747970657c733a373a2254656163686572223b);

-- --------------------------------------------------------

--
-- Table structure for table `Class`
--

CREATE TABLE `Class` (
  `ClassID` int(10) UNSIGNED NOT NULL,
  `ClassName` varchar(45) NOT NULL,
  `ClassLevel` int(2) NOT NULL,
  `PackageID` int(10) UNSIGNED NOT NULL,
  `TeacherID` int(10) UNSIGNED NOT NULL,
  `AdvisorID` int(10) UNSIGNED NOT NULL,
  `Student1ID` int(10) UNSIGNED NOT NULL,
  `Student2ID` int(10) UNSIGNED DEFAULT NULL,
  `Student3ID` int(10) UNSIGNED DEFAULT NULL,
  `Student4ID` int(10) DEFAULT NULL,
  `ZoomID` int(11) NOT NULL,
  `ZoomCode` varchar(30) NOT NULL,
  `Confirm` tinyint(1) NOT NULL DEFAULT '0',
  `LastModify` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `CreateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Class`
--

INSERT INTO `Class` (`ClassID`, `ClassName`, `ClassLevel`, `PackageID`, `TeacherID`, `AdvisorID`, `Student1ID`, `Student2ID`, `Student3ID`, `Student4ID`, `ZoomID`, `ZoomCode`, `Confirm`, `LastModify`, `CreateTime`) VALUES
(345, 'myfirstclass', 1, 788, 2000000, 3000000, 1000001, 1000002, 1000003, 0, 0, '', 0, '2019-07-12 00:02:21', '2019-07-11 05:12:22'),
(555, 'dfdafas', 8, 120, 250, 3000001, 1000001, 0, 0, 0, 0, '', 1, '2019-07-13 01:05:28', '2019-07-11 06:42:12'),
(650, 'MyClass222', 7, 4, 2000001, 3000003, 1000001, 1000002, 1000003, 0, 1111, 'aaaa', 1, '2019-07-19 01:40:55', '2019-07-19 08:30:04'),
(651, 'MyFirstClass22222', 7, 4, 2000002, 3000000, 1000004, 1000002, 1000003, 0, 1111, 'aaaa', 1, '2019-07-19 02:51:33', '2019-07-19 09:35:04'),
(666, '1122ddcc', 8, 120, 250, 3000000, 888, 0, 0, 0, 0, '', 0, '2019-07-11 01:24:30', '2019-07-11 08:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `Content`
--

CREATE TABLE `Content` (
  `PackageID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
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
  `CourseID` int(11) NOT NULL,
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
-- Table structure for table `Forgetpass`
--

CREATE TABLE `Forgetpass` (
  `Vcode` varchar(6) NOT NULL,
  `Email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Forgetpass`
--

INSERT INTO `Forgetpass` (`Vcode`, `Email`) VALUES
('ki2ybm', 'tim75024@yahoo.com'),
('M8wbfC', 'timabc@yahoo.com'),
('ucbFXC', 'tim75024@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `Lesson`
--

CREATE TABLE `Lesson` (
  `LessonID` int(11) NOT NULL,
  `PackageID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `ClassID` int(11) NOT NULL,
  `Start` tinyint(1) NOT NULL,
  `Confirm` tinyint(1) NOT NULL,
  `Timestamp` datetime NOT NULL,
  `N1` varchar(45) DEFAULT NULL,
  `N2` varchar(45) DEFAULT NULL,
  `N3` varchar(45) DEFAULT NULL,
  `N4` varchar(45) DEFAULT NULL,
  `N5` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Lesson`
--

INSERT INTO `Lesson` (`LessonID`, `PackageID`, `CourseID`, `ClassID`, `Start`, `Confirm`, `Timestamp`, `N1`, `N2`, `N3`, `N4`, `N5`) VALUES
(100, 0, 0, 345, 1, 1, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `LessonConfirm`
--

CREATE TABLE `LessonConfirm` (
  `LessonID` int(11) NOT NULL,
  `Student1Confirm` tinyint(1) NOT NULL,
  `Student2Confirm` tinyint(1) NOT NULL,
  `Student3Confirm` tinyint(1) NOT NULL,
  `Timestamp` datetime DEFAULT NULL,
  `N1` varchar(45) DEFAULT NULL,
  `N2` varchar(45) DEFAULT NULL,
  `N3` varchar(45) DEFAULT NULL,
  `N4` varchar(45) DEFAULT NULL,
  `N5` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `LessonConfirm`
--

INSERT INTO `LessonConfirm` (`LessonID`, `Student1Confirm`, `Student2Confirm`, `Student3Confirm`, `Timestamp`, `N1`, `N2`, `N3`, `N4`, `N5`) VALUES
(100, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Message`
--

CREATE TABLE `Message` (
  `MessageID` int(11) NOT NULL,
  `SenderID` int(11) NOT NULL,
  `ReceiverID` int(11) NOT NULL,
  `Subject` varchar(100) DEFAULT NULL,
  `Content` varchar(500) DEFAULT NULL,
  `SendDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Read` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `OrderID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `PackageID` int(11) NOT NULL,
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
  `PackageID` int(11) NOT NULL,
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
  `StudentID` int(11) NOT NULL,
  `Grade` varchar(45) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Class_Level` int(11) NOT NULL,
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

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`StudentID`, `Grade`, `Description`, `Class_Level`, `Intitial_deposit_date`, `Tuition`, `Balance`, `Course`, `Advisor`, `N1`, `N2`, `N3`, `N4`, `N5`) VALUES
(1000004, '99', 'I am a good student', 7, '0000-00-00', 3000, 5000, '111', '3000004', NULL, NULL, NULL, NULL, NULL),
(1000005, '99', 'I\'m good', 7, '1999-10-01', 1000, 1000, '100001', '300005', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE `syllabus` (
  `TeacherID` int(11) NOT NULL,
  `Schedule` varchar(500) NOT NULL,
  `Total` int(11) DEFAULT NULL,
  `State` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `syllabus`
--

INSERT INTO `syllabus` (`TeacherID`, `Schedule`, `Total`, `State`) VALUES
(2000000, 'a:7:{s:6:\"Monday\";a:0:{}s:7:\"Tuesday\";a:1:{i:0;s:2:\"13\";}s:9:\"Wednesday\";a:1:{i:1;s:1:\"7\";}s:8:\"Thursday\";a:0:{}s:6:\"Friday\";a:0:{}s:8:\"Saturday\";a:1:{i:0;s:2:\"18\";}s:6:\"Sunday\";a:1:{i:0;s:2:\"21\";}}', 4, 'Applied'),
(2000001, 'a:7:{s:6:\"Monday\";a:0:{}s:7:\"Tuesday\";a:2:{i:0;s:2:\"13\";i:1;s:2:\"22\";}s:9:\"Wednesday\";a:0:{}s:8:\"Thursday\";a:0:{}s:6:\"Friday\";a:0:{}s:8:\"Saturday\";a:0:{}s:6:\"Sunday\";a:1:{i:1;s:1:\"7\";}}', 4, 'Applied');

-- --------------------------------------------------------

--
-- Table structure for table `Teacher`
--

CREATE TABLE `Teacher` (
  `TeacherID` int(11) NOT NULL,
  `Type` varchar(45) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Title` varchar(45) NOT NULL,
  `Schedule` varchar(100) NOT NULL,
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

--
-- Dumping data for table `Teacher`
--

INSERT INTO `Teacher` (`TeacherID`, `Type`, `Description`, `Title`, `Schedule`, `Rate`, `Status`, `Income`, `Audit`, `Audit_passed_date`, `N1`, `N2`, `N3`, `N4`, `N5`) VALUES
(2000003, 'Advanced', 'I\'m good', 'Professor', 'Monday', 2, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(2000004, 'English', 'I am a good teacher', 'Professor', 'Monday', 2, 'Professor', 0, '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(2000005, 'Advanced', 'I\'m good', 'Professor', 'Monday', 2, 'Advanced', 3000, '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(2000006, 'Advanced', 'I\'m good', 'Professor', 'Monday', 2, 'Advanced', 3000, '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `UserID` int(10) UNSIGNED NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `User_type` varchar(45) NOT NULL,
  `Icon` varchar(45) DEFAULT NULL,
  `Last_name` varchar(45) NOT NULL,
  `First_name` varchar(45) NOT NULL,
  `Age` int(3) DEFAULT NULL,
  `WeChat_ID` varchar(45) DEFAULT NULL,
  `Registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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

INSERT INTO `User` (`UserID`, `Email`, `Password`, `Phone`, `User_type`, `Icon`, `Last_name`, `First_name`, `Age`, `WeChat_ID`, `Registration_date`, `Date_of_Birth`, `Gender`, `N1`, `N2`, `N3`, `N4`, `N5`) VALUES
(1000000, 'tim75024@yahoo.com', 'abcd', '4693803660', '', '', 'Li', 'Allen', 17, 'shun_0416', '2019-07-13 03:20:27', '1937-07-01', 'Male', NULL, NULL, NULL, NULL, NULL),
(1000001, 'student1@yahoo.com', 'aaaa', '4693803660', 'Student', NULL, 'Li', 'Allen', NULL, NULL, '2019-07-12 00:00:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1000002, 'student2@yahoo.com', 'aaaa', '4693803660', 'Student', NULL, 'Li', 'Allen', NULL, NULL, '2019-07-12 00:00:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1000003, 'student3@yahoo.com', 'aaaa', '4693803660', 'Student', NULL, 'Li', 'Allen', NULL, NULL, '2019-07-12 00:00:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1000004, 'student520@yahoo.com', 'aaaa', '3334443333', 'Student', 'aaa.jpg', 'Li', 'Allen', 23, 'ssaadd', '2019-07-17 21:17:23', '1996-04-16', 'Male', NULL, NULL, NULL, NULL, NULL),
(1000005, 'student222@yahoo.com', 'aaaa', '4673336666', 'Student', '555.jpg', 'Li', 'Allen', 11, 'shun_0416', '2019-07-18 02:02:29', '1937-07-01', 'Male', NULL, NULL, NULL, NULL, NULL),
(2000000, 'tim567983@yahoo.com', 'aaaa', '2223332222', '', '', 'Li', 'Tianhao', 11, '', '0000-00-00 00:00:00', '0000-00-00', 'Male', NULL, NULL, NULL, NULL, NULL),
(2000001, 'allen223322@gmail.com', 'aaa', '3334445555', 'Teacher', '', 'Li', 'Allen', 22, 'asadsa', '2019-07-13 00:51:24', '0000-00-00', 'Male', NULL, NULL, NULL, NULL, NULL),
(2000002, 'teacher@yahoo.com', 'aaaa', '4673336666', 'Teacher', 'aaa', 'Li', 'Allen', 11, 'shun_0416', '2019-07-13 23:38:04', '0000-00-00', 'Male', NULL, NULL, NULL, NULL, NULL),
(2000003, 'teacher1@yahoo.com', 'aaaa', '4673336666', 'Teacher', 'aaa', 'Li', 'Allen', 11, 'shun_0416', '2019-07-13 23:39:17', '0000-00-00', 'Male', NULL, NULL, NULL, NULL, NULL),
(2000004, 'teacher520@yahoo.com', 'aaaa', '3334443333', 'Teacher', 'aaa.jpg', 'Li', 'Allen', 23, 'ssaadd', '2019-07-17 21:11:56', '1996-04-16', 'Male', NULL, NULL, NULL, NULL, NULL),
(2000005, 'teacher222@yahoo.com', 'aaaa', '2223332222', 'Teacher', '555.jpg', 'Li', 'Allen', 23, 'shun_0416', '2019-07-18 02:00:43', '1937-07-01', 'Male', NULL, NULL, NULL, NULL, NULL),
(2000006, 'teacher718@yahoo.com', 'aaaa', '4673336666', 'Teacher', '555.jpg', 'Li', 'Allen', 23, 'shun_0416', '2019-07-18 20:56:15', '1937-07-01', 'Male', NULL, NULL, NULL, NULL, NULL),
(3000000, 'allen9876@qq.com', 'aaaa', '4353332222', 'Advisor', '', 'Lee', 'Allen', 22, '', '2019-07-13 01:06:44', '0000-00-00', 'Male', NULL, NULL, NULL, NULL, NULL),
(3000001, 'timabc@gmail.com', 'aaaa', '2223332222', 'Advisor', '', 'Li', 'Tianhao', 11, '', '0000-00-00 00:00:00', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(3000002, 'allen111@gmail.com', 'aaaa', '2223332222', 'Advisor', '', 'Li', 'Tianhao', 11, '', '2019-07-10 22:21:40', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(3000003, 'advisor1@yahoo.com', 'aaaa', '4673336666', 'Advisor', '', 'Lee', 'Allen', 33, '', '2019-07-12 18:11:56', '0000-00-00', 'Male', NULL, NULL, NULL, NULL, NULL),
(3000004, 'advisor520@yahoo.com', 'aaaa', '3334443333', 'Advisor', 'aaa.jpg', 'Li', 'Allen', 23, 'ssaadd', '2019-07-17 21:14:27', '1996-04-16', 'Male', NULL, NULL, NULL, NULL, NULL),
(3000005, 'advisor521@yahoo.com', 'aaaa', '3334443333', 'Advisor', 'aaa.jpg', 'Li', 'Allen', 23, 'ssaadd', '2019-07-17 21:15:08', '1996-04-16', 'Male', NULL, NULL, NULL, NULL, NULL),
(3000006, 'advisor222@yahoo.com', 'aaaa', '4673336666', 'Advisor', '555.jpg', 'Li', 'Allen', 11, 'shun_0416', '2019-07-18 02:01:25', '1937-07-01', 'Male', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Advisor`
--
ALTER TABLE `Advisor`
  ADD PRIMARY KEY (`AdvisorID`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

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
-- Indexes for table `Forgetpass`
--
ALTER TABLE `Forgetpass`
  ADD PRIMARY KEY (`Vcode`,`Email`);

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
  ADD PRIMARY KEY (`LessonID`);

--
-- Indexes for table `Message`
--
ALTER TABLE `Message`
  ADD PRIMARY KEY (`MessageID`);

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
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD PRIMARY KEY (`TeacherID`);

--
-- Indexes for table `Teacher`
--
ALTER TABLE `Teacher`
  ADD PRIMARY KEY (`TeacherID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `UserID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3000007;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
