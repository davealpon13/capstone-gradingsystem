-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2024 at 05:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osrs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_student`
--

CREATE TABLE `admin_student` (
  `id` int(11) NOT NULL,
  `student_code` varchar(50) NOT NULL,
  `admin` varchar(50) NOT NULL,
  `message_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_student`
--

INSERT INTO `admin_student` (`id`, `student_code`, `admin`, `message_text`, `created_at`) VALUES
(10, '202010692', 'admin', 'ok po', '2023-12-06 03:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `admin_teacher`
--

CREATE TABLE `admin_teacher` (
  `id` int(11) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `admin` varchar(50) NOT NULL,
  `message_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_teacher`
--

INSERT INTO `admin_teacher` (`id`, `teacher_name`, `admin`, `message_text`, `created_at`) VALUES
(6, 'CEZAR, MARK ANTHONY', 'dave', 'what is the problem', '2023-12-08 02:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(30) NOT NULL,
  `level` varchar(200) NOT NULL,
  `section` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `level`, `section`, `date_created`) VALUES
(8, 'BSIT', '4A', '2023-10-14 12:12:25'),
(9, 'BSIT', '4B', '2023-10-14 12:12:55'),
(10, 'BSIT', '4C', '2023-10-14 12:13:02'),
(11, 'BSIT', '4D', '2023-10-14 12:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `finals`
--

CREATE TABLE `finals` (
  `id` int(11) NOT NULL,
  `student_code` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `attendance_days` int(11) DEFAULT NULL,
  `weighted_attendance` float DEFAULT NULL,
  `participation_score` int(11) DEFAULT NULL,
  `weighted_participation` float DEFAULT NULL,
  `quiz_1` int(11) DEFAULT NULL,
  `quiz_2` int(11) DEFAULT NULL,
  `quiz_3` int(11) DEFAULT NULL,
  `quiz_4` int(11) DEFAULT NULL,
  `quiz_5` int(11) DEFAULT NULL,
  `quiz_6` int(11) DEFAULT NULL,
  `quiz_7` int(11) DEFAULT NULL,
  `quiz_8` int(11) DEFAULT NULL,
  `quiz_9` int(11) DEFAULT NULL,
  `quiz_10` int(11) DEFAULT NULL,
  `total_quiz` int(11) DEFAULT NULL,
  `weighted_quizzes` float DEFAULT NULL,
  `output_1` int(11) DEFAULT NULL,
  `output_2` int(11) DEFAULT NULL,
  `output_3` int(11) DEFAULT NULL,
  `output_4` int(11) DEFAULT NULL,
  `output_5` int(11) DEFAULT NULL,
  `output_6` int(11) DEFAULT NULL,
  `output_7` int(11) DEFAULT NULL,
  `output_8` int(11) DEFAULT NULL,
  `output_9` int(11) DEFAULT NULL,
  `output_10` int(11) DEFAULT NULL,
  `total_output` int(11) DEFAULT NULL,
  `weighted_outputs` float DEFAULT NULL,
  `finals_score` int(11) DEFAULT NULL,
  `weighted_finals` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `finals`
--

INSERT INTO `finals` (`id`, `student_code`, `lastname`, `section`, `subject`, `attendance_days`, `weighted_attendance`, `participation_score`, `weighted_participation`, `quiz_1`, `quiz_2`, `quiz_3`, `quiz_4`, `quiz_5`, `quiz_6`, `quiz_7`, `quiz_8`, `quiz_9`, `quiz_10`, `total_quiz`, `weighted_quizzes`, `output_1`, `output_2`, `output_3`, `output_4`, `output_5`, `output_6`, `output_7`, `output_8`, `output_9`, `output_10`, `total_output`, `weighted_outputs`, `finals_score`, `weighted_finals`) VALUES
(94, '201010409', 'FALLER, RAYMART', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 10, 10, 10, 10, 7, 8, 0, 0, 0, 0, 0, 0, 0, 0, 30, 10, 100, 100, 0, 0, 0, 0, 0, 0, 0, 0, 374, 23.38, 45, 15),
(95, '202010375', 'SANTILLAN', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 10, 10, 10, 10, 10, 9, 0, 0, 0, 0, 0, 0, 0, 0, 36, 12, 100, 100, 0, 0, 0, 0, 0, 0, 0, 0, 385, 24.06, 55, 18.33),
(96, '202010690', 'ACOSTA', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(97, '202010400', 'BARRENO', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(98, '202010392', 'BELALE', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(99, '201911375', 'CACHAPERO', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(100, '202010798', 'CAMINGAO', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(101, '201911388', 'CARABBAY', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(102, '202010382', 'CEA', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(103, '202010371', 'CHING', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(104, '202010361', 'DAYAP', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(105, '202010370', 'DELA CRUZ', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(106, '202010397', 'ESCORIAL', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(107, '202010828', 'ESGUERRA', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(108, '202010696', 'FORBES', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(109, '202010692', 'MACALIMA', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(110, '202010390', 'MAQUERME', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(111, '201911288', 'MATEO', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(112, '202010874', 'MORCOSO', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(113, '202010689', 'PANTALEON', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(114, '202010385', 'RIVERA', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(115, '202010378', 'SABAS', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(116, '202010372', 'SOLAS', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(117, '202010827', 'SULTAN', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(118, '202010799', 'TINDUGAN', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(119, '202010873', 'VALDEMORO', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(120, '202010758', 'VILLEGAS', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(121, '201010409', 'FALLER, RAYMART', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 10, 10, 10, 10, 7, 8, 0, 0, 0, 0, 0, 0, 0, 0, 30, 10, 100, 100, 0, 0, 0, 0, 0, 0, 0, 0, 374, 23.38, 45, 15),
(122, '202010375', 'SANTILLAN', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 100, 10, 100, 10, 10, 9, 10, 0, 0, 0, 0, 0, 0, 0, 36, 12, 100, 100, 0, 0, 0, 0, 0, 0, 0, 0, 385, 24.06, 55, 18.33),
(123, '202010690', 'ACOSTA', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(124, '202010400', 'BARRENO', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(125, '202010392', 'BELALE', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(126, '201911375', 'CACHAPERO', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(127, '202010798', 'CAMINGAO', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(128, '201911388', 'CARABBAY', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(129, '202010382', 'CEA', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(130, '202010371', 'CHING', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(131, '202010361', 'DAYAP', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(132, '202010370', 'DELA CRUZ', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(133, '202010397', 'ESCORIAL', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(134, '202010828', 'ESGUERRA', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(135, '202010696', 'FORBES', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(136, '202010692', 'MACALIMA', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(137, '202010390', 'MAQUERME', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(138, '201911288', 'MATEO', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(139, '202010874', 'MORCOSO', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(140, '202010689', 'PANTALEON', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(141, '202010385', 'RIVERA', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(142, '202010378', 'SABAS', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(143, '202010372', 'SOLAS', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(144, '202010827', 'SULTAN', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(145, '202010799', 'TINDUGAN', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(146, '202010873', 'VALDEMORO', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(147, '202010758', 'VILLEGAS', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(148, '201010409', 'FALLER, RAYMART', 'BSIT-4D', 'IT ELECTIVE 4', 10, 10, 10, 10, 7, 8, 0, 0, 0, 0, 0, 0, 0, 0, 30, 10, 100, 100, 0, 0, 0, 0, 0, 0, 0, 0, 374, 23.38, 45, 15),
(149, '202010375', 'SANTILLAN', 'BSIT-4D', 'IT ELECTIVE 4', 10, 10, 10, 10, 10, 9, 0, 0, 0, 0, 0, 0, 0, 0, 36, 12, 100, 100, 0, 0, 0, 0, 0, 0, 0, 0, 385, 24.06, 55, 18.33),
(150, '202010690', 'ACOSTA', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(151, '202010400', 'BARRENO', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(152, '202010392', 'BELALE', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(153, '201911375', 'CACHAPERO', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(154, '202010798', 'CAMINGAO', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(155, '201911388', 'CARABBAY', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(156, '202010382', 'CEA', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(157, '202010371', 'CHING', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(158, '202010361', 'DAYAP', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(159, '202010370', 'DELA CRUZ', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(160, '202010397', 'ESCORIAL', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(161, '202010828', 'ESGUERRA', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(162, '202010696', 'FORBES', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(163, '202010692', 'MACALIMA', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(164, '202010390', 'MAQUERME', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(165, '201911288', 'MATEO', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(166, '202010874', 'MORCOSO', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(167, '202010689', 'PANTALEON', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(168, '202010385', 'RIVERA', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(169, '202010378', 'SABAS', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(170, '202010372', 'SOLAS', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(171, '202010827', 'SULTAN', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(172, '202010799', 'TINDUGAN', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(173, '202010873', 'VALDEMORO', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(174, '202010758', 'VILLEGAS', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(175, '201010409', 'FALLER, RAYMART', 'BSIT-4D', 'IT ELECTIVE 3', 10, 10, 10, 10, 7, 8, 0, 0, 0, 0, 0, 0, 0, 0, 30, 10, 100, 100, 0, 0, 0, 0, 0, 0, 0, 0, 374, 23.38, 45, 15),
(176, '202010375', 'SANTILLAN', 'BSIT-4D', 'IT ELECTIVE 3', 10, 10, 10, 10, 10, 9, 0, 0, 0, 0, 0, 0, 0, 0, 36, 12, 100, 100, 0, 0, 0, 0, 0, 0, 0, 0, 385, 24.06, 55, 18.33),
(177, '202010690', 'ACOSTA', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(178, '202010400', 'BARRENO', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(179, '202010392', 'BELALE', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(180, '201911375', 'CACHAPERO', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(181, '202010798', 'CAMINGAO', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(182, '201911388', 'CARABBAY', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(183, '202010382', 'CEA', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(184, '202010371', 'CHING', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(185, '202010361', 'DAYAP', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(186, '202010370', 'DELA CRUZ', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(187, '202010397', 'ESCORIAL', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(188, '202010828', 'ESGUERRA', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(189, '202010696', 'FORBES', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(190, '202010692', 'MACALIMA', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(191, '202010390', 'MAQUERME', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(192, '201911288', 'MATEO', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(193, '202010874', 'MORCOSO', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(194, '202010689', 'PANTALEON', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(195, '202010385', 'RIVERA', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(196, '202010378', 'SABAS', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(197, '202010372', 'SOLAS', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(198, '202010827', 'SULTAN', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(199, '202010799', 'TINDUGAN', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(200, '202010873', 'VALDEMORO', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(201, '202010758', 'VILLEGAS', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `grading_sheet`
--

CREATE TABLE `grading_sheet` (
  `id` int(11) NOT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `student_code` varchar(20) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `section` varchar(20) DEFAULT NULL,
  `grade` varchar(5) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grading_sheet`
--

INSERT INTO `grading_sheet` (`id`, `lastname`, `student_code`, `subject`, `section`, `grade`, `credit`, `remarks`) VALUES
(190, 'FALLER, RAYMART', '201010409', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '1.75', 3, 'Passed'),
(191, 'SANTILLAN', '202010375', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '1.25', 3, 'Passed'),
(192, 'ACOSTA', '202010690', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '5.00', 0, 'Failed'),
(193, 'BARRENO', '202010400', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '5.00', 0, 'Failed'),
(194, 'BELALE', '202010392', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '5.00', 0, 'Failed'),
(195, 'CACHAPERO', '201911375', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '5.00', 0, 'Failed'),
(196, 'CAMINGAO', '202010798', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '5.00', 0, 'Failed'),
(197, 'CARABBAY', '201911388', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '5.00', 0, 'Failed'),
(198, 'CEA', '202010382', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '5.00', 0, 'Failed'),
(199, 'CHING', '202010371', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '5.00', 0, 'Failed'),
(200, 'DAYAP', '202010361', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '5.00', 0, 'Failed'),
(201, 'DELA CRUZ', '202010370', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '5.00', 0, 'Failed'),
(202, 'ESCORIAL', '202010397', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '5.00', 0, 'Failed'),
(203, 'ESGUERRA', '202010828', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '5.00', 0, 'Failed'),
(204, 'FORBES', '202010696', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '5.00', 0, 'Failed'),
(205, 'MACALIMA', '202010692', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '5.00', 0, 'Failed'),
(206, 'MAQUERME', '202010390', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '5.00', 0, 'Failed'),
(207, 'MATEO', '201911288', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '5.00', 0, 'Failed'),
(208, 'MORCOSO', '202010874', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '5.00', 0, 'Failed'),
(209, 'PANTALEON', '202010689', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '5.00', 0, 'Failed'),
(210, 'RIVERA', '202010385', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '5.00', 0, 'Failed'),
(211, 'SABAS', '202010378', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '5.00', 0, 'Failed'),
(212, 'SOLAS', '202010372', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '5.00', 0, 'Failed'),
(213, 'SULTAN', '202010827', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '5.00', 0, 'Failed'),
(214, 'TINDUGAN', '202010799', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '5.00', 0, 'Failed'),
(215, 'VALDEMORO', '202010873', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '5.00', 0, 'Failed'),
(216, 'VILLEGAS', '202010758', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', '5.00', 0, 'Failed'),
(244, 'FALLER, RAYMART', '201010409', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '1.75', 3, 'Passed'),
(245, 'SANTILLAN', '202010375', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '1.25', 3, 'Passed'),
(246, 'ACOSTA', '202010690', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '5.00', 0, 'Failed'),
(247, 'BARRENO', '202010400', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '5.00', 0, 'Failed'),
(248, 'BELALE', '202010392', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '5.00', 0, 'Failed'),
(249, 'CACHAPERO', '201911375', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '5.00', 0, 'Failed'),
(250, 'CAMINGAO', '202010798', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '5.00', 0, 'Failed'),
(251, 'CARABBAY', '201911388', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '5.00', 0, 'Failed'),
(252, 'CEA', '202010382', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '5.00', 0, 'Failed'),
(253, 'CHING', '202010371', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '5.00', 0, 'Failed'),
(254, 'DAYAP', '202010361', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '5.00', 0, 'Failed'),
(255, 'DELA CRUZ', '202010370', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '5.00', 0, 'Failed'),
(256, 'ESCORIAL', '202010397', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '5.00', 0, 'Failed'),
(257, 'ESGUERRA', '202010828', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '5.00', 0, 'Failed'),
(258, 'FORBES', '202010696', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '5.00', 0, 'Failed'),
(259, 'MACALIMA', '202010692', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '5.00', 0, 'Failed'),
(260, 'MAQUERME', '202010390', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '5.00', 0, 'Failed'),
(261, 'MATEO', '201911288', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '5.00', 0, 'Failed'),
(262, 'MORCOSO', '202010874', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '5.00', 0, 'Failed'),
(263, 'PANTALEON', '202010689', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '5.00', 0, 'Failed'),
(264, 'RIVERA', '202010385', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '5.00', 0, 'Failed'),
(265, 'SABAS', '202010378', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '5.00', 0, 'Failed'),
(266, 'SOLAS', '202010372', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '5.00', 0, 'Failed'),
(267, 'SULTAN', '202010827', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '5.00', 0, 'Failed'),
(268, 'TINDUGAN', '202010799', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '5.00', 0, 'Failed'),
(269, 'VALDEMORO', '202010873', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '5.00', 0, 'Failed'),
(270, 'VILLEGAS', '202010758', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', '5.00', 0, 'Failed'),
(271, 'FALLER, RAYMART', '201010409', 'IT ELECTIVE 4', 'BSIT-4D', '1.75', 3, 'Passed'),
(272, 'SANTILLAN', '202010375', 'IT ELECTIVE 4', 'BSIT-4D', '1.25', 3, 'Passed'),
(273, 'ACOSTA', '202010690', 'IT ELECTIVE 4', 'BSIT-4D', '5.00', 0, 'Failed'),
(274, 'BARRENO', '202010400', 'IT ELECTIVE 4', 'BSIT-4D', '5.00', 0, 'Failed'),
(275, 'BELALE', '202010392', 'IT ELECTIVE 4', 'BSIT-4D', '5.00', 0, 'Failed'),
(276, 'CACHAPERO', '201911375', 'IT ELECTIVE 4', 'BSIT-4D', '5.00', 0, 'Failed'),
(277, 'CAMINGAO', '202010798', 'IT ELECTIVE 4', 'BSIT-4D', '5.00', 0, 'Failed'),
(278, 'CARABBAY', '201911388', 'IT ELECTIVE 4', 'BSIT-4D', '5.00', 0, 'Failed'),
(279, 'CEA', '202010382', 'IT ELECTIVE 4', 'BSIT-4D', '5.00', 0, 'Failed'),
(280, 'CHING', '202010371', 'IT ELECTIVE 4', 'BSIT-4D', '5.00', 0, 'Failed'),
(281, 'DAYAP', '202010361', 'IT ELECTIVE 4', 'BSIT-4D', '5.00', 0, 'Failed'),
(282, 'DELA CRUZ', '202010370', 'IT ELECTIVE 4', 'BSIT-4D', '5.00', 0, 'Failed'),
(283, 'ESCORIAL', '202010397', 'IT ELECTIVE 4', 'BSIT-4D', '5.00', 0, 'Failed'),
(284, 'ESGUERRA', '202010828', 'IT ELECTIVE 4', 'BSIT-4D', '5.00', 0, 'Failed'),
(285, 'FORBES', '202010696', 'IT ELECTIVE 4', 'BSIT-4D', '5.00', 0, 'Failed'),
(286, 'MACALIMA', '202010692', 'IT ELECTIVE 4', 'BSIT-4D', '5.00', 0, 'Failed'),
(287, 'MAQUERME', '202010390', 'IT ELECTIVE 4', 'BSIT-4D', '5.00', 0, 'Failed'),
(288, 'MATEO', '201911288', 'IT ELECTIVE 4', 'BSIT-4D', '5.00', 0, 'Failed'),
(289, 'MORCOSO', '202010874', 'IT ELECTIVE 4', 'BSIT-4D', '5.00', 0, 'Failed'),
(290, 'PANTALEON', '202010689', 'IT ELECTIVE 4', 'BSIT-4D', '5.00', 0, 'Failed'),
(291, 'RIVERA', '202010385', 'IT ELECTIVE 4', 'BSIT-4D', '5.00', 0, 'Failed'),
(292, 'SABAS', '202010378', 'IT ELECTIVE 4', 'BSIT-4D', '5.00', 0, 'Failed'),
(293, 'SOLAS', '202010372', 'IT ELECTIVE 4', 'BSIT-4D', '5.00', 0, 'Failed'),
(294, 'SULTAN', '202010827', 'IT ELECTIVE 4', 'BSIT-4D', '5.00', 0, 'Failed'),
(295, 'TINDUGAN', '202010799', 'IT ELECTIVE 4', 'BSIT-4D', '5.00', 0, 'Failed'),
(296, 'VALDEMORO', '202010873', 'IT ELECTIVE 4', 'BSIT-4D', '5.00', 0, 'Failed'),
(297, 'VILLEGAS', '202010758', 'IT ELECTIVE 4', 'BSIT-4D', '5.00', 0, 'Failed'),
(298, 'FALLER, RAYMART', '201010409', 'IT ELECTIVE 3', 'BSIT-4D', '1.75', 3, 'Passed'),
(299, 'SANTILLAN', '202010375', 'IT ELECTIVE 3', 'BSIT-4D', '1.25', 3, 'Passed'),
(300, 'ACOSTA', '202010690', 'IT ELECTIVE 3', 'BSIT-4D', '5.00', 0, 'Failed'),
(301, 'BARRENO', '202010400', 'IT ELECTIVE 3', 'BSIT-4D', '5.00', 0, 'Failed'),
(302, 'BELALE', '202010392', 'IT ELECTIVE 3', 'BSIT-4D', '5.00', 0, 'Failed'),
(303, 'CACHAPERO', '201911375', 'IT ELECTIVE 3', 'BSIT-4D', '5.00', 0, 'Failed'),
(304, 'CAMINGAO', '202010798', 'IT ELECTIVE 3', 'BSIT-4D', '5.00', 0, 'Failed'),
(305, 'CARABBAY', '201911388', 'IT ELECTIVE 3', 'BSIT-4D', '5.00', 0, 'Failed'),
(306, 'CEA', '202010382', 'IT ELECTIVE 3', 'BSIT-4D', '5.00', 0, 'Failed'),
(307, 'CHING', '202010371', 'IT ELECTIVE 3', 'BSIT-4D', '5.00', 0, 'Failed'),
(308, 'DAYAP', '202010361', 'IT ELECTIVE 3', 'BSIT-4D', '5.00', 0, 'Failed'),
(309, 'DELA CRUZ', '202010370', 'IT ELECTIVE 3', 'BSIT-4D', '5.00', 0, 'Failed'),
(310, 'ESCORIAL', '202010397', 'IT ELECTIVE 3', 'BSIT-4D', '5.00', 0, 'Failed'),
(311, 'ESGUERRA', '202010828', 'IT ELECTIVE 3', 'BSIT-4D', '5.00', 0, 'Failed'),
(312, 'FORBES', '202010696', 'IT ELECTIVE 3', 'BSIT-4D', '5.00', 0, 'Failed'),
(313, 'MACALIMA', '202010692', 'IT ELECTIVE 3', 'BSIT-4D', '5.00', 0, 'Failed'),
(314, 'MAQUERME', '202010390', 'IT ELECTIVE 3', 'BSIT-4D', '5.00', 0, 'Failed'),
(315, 'MATEO', '201911288', 'IT ELECTIVE 3', 'BSIT-4D', '5.00', 0, 'Failed'),
(316, 'MORCOSO', '202010874', 'IT ELECTIVE 3', 'BSIT-4D', '5.00', 0, 'Failed'),
(317, 'PANTALEON', '202010689', 'IT ELECTIVE 3', 'BSIT-4D', '5.00', 0, 'Failed'),
(318, 'RIVERA', '202010385', 'IT ELECTIVE 3', 'BSIT-4D', '5.00', 0, 'Failed'),
(319, 'SABAS', '202010378', 'IT ELECTIVE 3', 'BSIT-4D', '5.00', 0, 'Failed'),
(320, 'SOLAS', '202010372', 'IT ELECTIVE 3', 'BSIT-4D', '5.00', 0, 'Failed'),
(321, 'SULTAN', '202010827', 'IT ELECTIVE 3', 'BSIT-4D', '5.00', 0, 'Failed'),
(322, 'TINDUGAN', '202010799', 'IT ELECTIVE 3', 'BSIT-4D', '5.00', 0, 'Failed'),
(323, 'VALDEMORO', '202010873', 'IT ELECTIVE 3', 'BSIT-4D', '5.00', 0, 'Failed'),
(324, 'VILLEGAS', '202010758', 'IT ELECTIVE 3', 'BSIT-4D', '5.00', 0, 'Failed');

-- --------------------------------------------------------

--
-- Table structure for table `hps_totals`
--

CREATE TABLE `hps_totals` (
  `id` int(11) NOT NULL,
  `section` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `hps_lecture_attendance` int(11) NOT NULL,
  `hps_lecture_participation` int(11) NOT NULL,
  `hps_lecture_quiz` int(11) NOT NULL,
  `hps_lecture_output` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hps_totals`
--

INSERT INTO `hps_totals` (`id`, `section`, `subject`, `hps_lecture_attendance`, `hps_lecture_participation`, `hps_lecture_quiz`, `hps_lecture_output`) VALUES
(1, 'BSIT-4D', 'SYSTEMS ADMINISTRATION AND MAINTENANCE', 0, 0, 0, 0),
(2, 'BSIT-4D', 'SYSTEMS ADMINISTRATION AND MAINTENANCE', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lab_finals`
--

CREATE TABLE `lab_finals` (
  `id` int(11) NOT NULL,
  `student_code` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `total_attendance_participation` int(11) DEFAULT NULL,
  `weighted_attendance_participation` float DEFAULT NULL,
  `lab_1` int(11) DEFAULT NULL,
  `lab_2` int(11) DEFAULT NULL,
  `lab_3` int(11) DEFAULT NULL,
  `lab_4` int(11) DEFAULT NULL,
  `lab_5` int(11) DEFAULT NULL,
  `lab_6` int(11) DEFAULT NULL,
  `lab_7` int(11) DEFAULT NULL,
  `lab_8` int(11) DEFAULT NULL,
  `lab_9` int(11) DEFAULT NULL,
  `lab_10` int(11) DEFAULT NULL,
  `total_lab` int(11) DEFAULT NULL,
  `weighted_lab` float DEFAULT NULL,
  `practical_1` int(11) DEFAULT NULL,
  `practical_2` int(11) DEFAULT NULL,
  `practical_3` int(11) DEFAULT NULL,
  `practical_4` int(11) DEFAULT NULL,
  `practical_5` int(11) DEFAULT NULL,
  `total_practical` float DEFAULT NULL,
  `weighted_practical` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab_finals`
--

INSERT INTO `lab_finals` (`id`, `student_code`, `lastname`, `section`, `subject`, `total_attendance_participation`, `weighted_attendance_participation`, `lab_1`, `lab_2`, `lab_3`, `lab_4`, `lab_5`, `lab_6`, `lab_7`, `lab_8`, `lab_9`, `lab_10`, `total_lab`, `weighted_lab`, `practical_1`, `practical_2`, `practical_3`, `practical_4`, `practical_5`, `total_practical`, `weighted_practical`) VALUES
(117, '201010409', 'FALLER, RAYMART', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 10, 20, 100, 100, 0, 0, 0, 0, 0, 0, 0, 0, 400, 50, 100, 0, 0, 0, 0, 295, 29.5),
(118, '202010375', 'SANTILLAN', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 9, 18, 100, 100, 0, 0, 0, 0, 0, 0, 0, 0, 390, 48.75, 100, 0, 0, 0, 0, 295, 29.5),
(119, '202010690', 'ACOSTA', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 4, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 12.5, 0, 0, 0, 0, 0, 0, 0),
(120, '202010400', 'BARRENO', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 3, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 90, 11.25, 0, 0, 0, 0, 0, 0, 0),
(121, '202010392', 'BELALE', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 2, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 90, 11.25, 0, 0, 0, 0, 0, 0, 0),
(122, '201911375', 'CACHAPERO', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 4, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 12.5, 0, 0, 0, 0, 0, 0, 0),
(123, '202010798', 'CAMINGAO', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 12.5, 0, 0, 0, 0, 0, 0, 0),
(124, '201911388', 'CARABBAY', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 12.5, 0, 0, 0, 0, 0, 0, 0),
(125, '202010382', 'CEA', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 12.5, 0, 0, 0, 0, 0, 0, 0),
(126, '202010371', 'CHING', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 6, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 12.5, 0, 0, 0, 0, 0, 0, 0),
(127, '202010361', 'DAYAP', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 7, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(128, '202010370', 'DELA CRUZ', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 7, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(129, '202010397', 'ESCORIAL', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 8, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(130, '202010828', 'ESGUERRA', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 9, 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(131, '202010696', 'FORBES', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 10, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(132, '202010692', 'MACALIMA', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(133, '202010390', 'MAQUERME', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 4, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(134, '201911288', 'MATEO', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(135, '202010874', 'MORCOSO', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 4, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(136, '202010689', 'PANTALEON', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(137, '202010385', 'RIVERA', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(138, '202010378', 'SABAS', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(139, '202010372', 'SOLAS', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(140, '202010827', 'SULTAN', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(141, '202010799', 'TINDUGAN', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 3, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(142, '202010873', 'VALDEMORO', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 4, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(143, '202010758', 'VILLEGAS', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(144, '201010409', 'FALLER, RAYMART', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 10, 20, 100, 100, 0, 0, 0, 0, 0, 0, 0, 0, 400, 50, 100, 0, 0, 0, 0, 295, 29.5),
(145, '202010375', 'SANTILLAN', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 9, 18, 100, 100, 0, 0, 0, 0, 0, 0, 0, 0, 390, 48.75, 100, 0, 0, 0, 0, 295, 29.5),
(146, '202010690', 'ACOSTA', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 4, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 12.5, 0, 0, 0, 0, 0, 0, 0),
(147, '202010400', 'BARRENO', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 3, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 90, 11.25, 0, 0, 0, 0, 0, 0, 0),
(148, '202010392', 'BELALE', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 2, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 90, 11.25, 0, 0, 0, 0, 0, 0, 0),
(149, '201911375', 'CACHAPERO', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 4, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 12.5, 0, 0, 0, 0, 0, 0, 0),
(150, '202010798', 'CAMINGAO', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 12.5, 0, 0, 0, 0, 0, 0, 0),
(151, '201911388', 'CARABBAY', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 12.5, 0, 0, 0, 0, 0, 0, 0),
(152, '202010382', 'CEA', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 12.5, 0, 0, 0, 0, 0, 0, 0),
(153, '202010371', 'CHING', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 6, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 12.5, 0, 0, 0, 0, 0, 0, 0),
(154, '202010361', 'DAYAP', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 7, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(155, '202010370', 'DELA CRUZ', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 7, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(156, '202010397', 'ESCORIAL', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 8, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(157, '202010828', 'ESGUERRA', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 9, 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(158, '202010696', 'FORBES', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 10, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(159, '202010692', 'MACALIMA', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(160, '202010390', 'MAQUERME', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 4, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(161, '201911288', 'MATEO', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(162, '202010874', 'MORCOSO', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 4, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(163, '202010689', 'PANTALEON', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(164, '202010385', 'RIVERA', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(165, '202010378', 'SABAS', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(166, '202010372', 'SOLAS', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(167, '202010827', 'SULTAN', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(168, '202010799', 'TINDUGAN', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 3, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(169, '202010873', 'VALDEMORO', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 4, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(170, '202010758', 'VILLEGAS', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(171, '201010409', 'FALLER, RAYMART', 'BSIT-4D', 'IT ELECTIVE 4', 10, 20, 100, 100, 0, 0, 0, 0, 0, 0, 0, 0, 400, 50, 100, 0, 0, 0, 0, 295, 29.5),
(172, '202010375', 'SANTILLAN', 'BSIT-4D', 'IT ELECTIVE 4', 9, 18, 100, 100, 0, 0, 0, 0, 0, 0, 0, 0, 390, 48.75, 100, 0, 0, 0, 0, 295, 29.5),
(173, '202010690', 'ACOSTA', 'BSIT-4D', 'IT ELECTIVE 4', 4, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 12.5, 0, 0, 0, 0, 0, 0, 0),
(174, '202010400', 'BARRENO', 'BSIT-4D', 'IT ELECTIVE 4', 3, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 90, 11.25, 0, 0, 0, 0, 0, 0, 0),
(175, '202010392', 'BELALE', 'BSIT-4D', 'IT ELECTIVE 4', 2, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 90, 11.25, 0, 0, 0, 0, 0, 0, 0),
(176, '201911375', 'CACHAPERO', 'BSIT-4D', 'IT ELECTIVE 4', 4, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 12.5, 0, 0, 0, 0, 0, 0, 0),
(177, '202010798', 'CAMINGAO', 'BSIT-4D', 'IT ELECTIVE 4', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 12.5, 0, 0, 0, 0, 0, 0, 0),
(178, '201911388', 'CARABBAY', 'BSIT-4D', 'IT ELECTIVE 4', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 12.5, 0, 0, 0, 0, 0, 0, 0),
(179, '202010382', 'CEA', 'BSIT-4D', 'IT ELECTIVE 4', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 12.5, 0, 0, 0, 0, 0, 0, 0),
(180, '202010371', 'CHING', 'BSIT-4D', 'IT ELECTIVE 4', 6, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 12.5, 0, 0, 0, 0, 0, 0, 0),
(181, '202010361', 'DAYAP', 'BSIT-4D', 'IT ELECTIVE 4', 7, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(182, '202010370', 'DELA CRUZ', 'BSIT-4D', 'IT ELECTIVE 4', 7, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(183, '202010397', 'ESCORIAL', 'BSIT-4D', 'IT ELECTIVE 4', 8, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(184, '202010828', 'ESGUERRA', 'BSIT-4D', 'IT ELECTIVE 4', 9, 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(185, '202010696', 'FORBES', 'BSIT-4D', 'IT ELECTIVE 4', 10, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(186, '202010692', 'MACALIMA', 'BSIT-4D', 'IT ELECTIVE 4', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(187, '202010390', 'MAQUERME', 'BSIT-4D', 'IT ELECTIVE 4', 4, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(188, '201911288', 'MATEO', 'BSIT-4D', 'IT ELECTIVE 4', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(189, '202010874', 'MORCOSO', 'BSIT-4D', 'IT ELECTIVE 4', 4, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(190, '202010689', 'PANTALEON', 'BSIT-4D', 'IT ELECTIVE 4', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(191, '202010385', 'RIVERA', 'BSIT-4D', 'IT ELECTIVE 4', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(192, '202010378', 'SABAS', 'BSIT-4D', 'IT ELECTIVE 4', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(193, '202010372', 'SOLAS', 'BSIT-4D', 'IT ELECTIVE 4', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(194, '202010827', 'SULTAN', 'BSIT-4D', 'IT ELECTIVE 4', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(195, '202010799', 'TINDUGAN', 'BSIT-4D', 'IT ELECTIVE 4', 3, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(196, '202010873', 'VALDEMORO', 'BSIT-4D', 'IT ELECTIVE 4', 4, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(197, '202010758', 'VILLEGAS', 'BSIT-4D', 'IT ELECTIVE 4', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(198, '201010409', 'FALLER, RAYMART', 'BSIT-4D', 'IT ELECTIVE 3', 10, 20, 100, 100, 0, 0, 0, 0, 0, 0, 0, 0, 400, 50, 100, 0, 0, 0, 0, 295, 29.5),
(199, '202010375', 'SANTILLAN', 'BSIT-4D', 'IT ELECTIVE 3', 9, 18, 100, 100, 0, 0, 0, 0, 0, 0, 0, 0, 390, 48.75, 100, 0, 0, 0, 0, 295, 29.5),
(200, '202010690', 'ACOSTA', 'BSIT-4D', 'IT ELECTIVE 3', 4, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 12.5, 0, 0, 0, 0, 0, 0, 0),
(201, '202010400', 'BARRENO', 'BSIT-4D', 'IT ELECTIVE 3', 3, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 90, 11.25, 0, 0, 0, 0, 0, 0, 0),
(202, '202010392', 'BELALE', 'BSIT-4D', 'IT ELECTIVE 3', 2, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 90, 11.25, 0, 0, 0, 0, 0, 0, 0),
(203, '201911375', 'CACHAPERO', 'BSIT-4D', 'IT ELECTIVE 3', 4, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 12.5, 0, 0, 0, 0, 0, 0, 0),
(204, '202010798', 'CAMINGAO', 'BSIT-4D', 'IT ELECTIVE 3', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 12.5, 0, 0, 0, 0, 0, 0, 0),
(205, '201911388', 'CARABBAY', 'BSIT-4D', 'IT ELECTIVE 3', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 12.5, 0, 0, 0, 0, 0, 0, 0),
(206, '202010382', 'CEA', 'BSIT-4D', 'IT ELECTIVE 3', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 12.5, 0, 0, 0, 0, 0, 0, 0),
(207, '202010371', 'CHING', 'BSIT-4D', 'IT ELECTIVE 3', 6, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 12.5, 0, 0, 0, 0, 0, 0, 0),
(208, '202010361', 'DAYAP', 'BSIT-4D', 'IT ELECTIVE 3', 7, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(209, '202010370', 'DELA CRUZ', 'BSIT-4D', 'IT ELECTIVE 3', 7, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(210, '202010397', 'ESCORIAL', 'BSIT-4D', 'IT ELECTIVE 3', 8, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(211, '202010828', 'ESGUERRA', 'BSIT-4D', 'IT ELECTIVE 3', 9, 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(212, '202010696', 'FORBES', 'BSIT-4D', 'IT ELECTIVE 3', 10, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(213, '202010692', 'MACALIMA', 'BSIT-4D', 'IT ELECTIVE 3', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(214, '202010390', 'MAQUERME', 'BSIT-4D', 'IT ELECTIVE 3', 4, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(215, '201911288', 'MATEO', 'BSIT-4D', 'IT ELECTIVE 3', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(216, '202010874', 'MORCOSO', 'BSIT-4D', 'IT ELECTIVE 3', 4, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(217, '202010689', 'PANTALEON', 'BSIT-4D', 'IT ELECTIVE 3', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(218, '202010385', 'RIVERA', 'BSIT-4D', 'IT ELECTIVE 3', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(219, '202010378', 'SABAS', 'BSIT-4D', 'IT ELECTIVE 3', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(220, '202010372', 'SOLAS', 'BSIT-4D', 'IT ELECTIVE 3', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(221, '202010827', 'SULTAN', 'BSIT-4D', 'IT ELECTIVE 3', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(222, '202010799', 'TINDUGAN', 'BSIT-4D', 'IT ELECTIVE 3', 3, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(223, '202010873', 'VALDEMORO', 'BSIT-4D', 'IT ELECTIVE 3', 4, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(224, '202010758', 'VILLEGAS', 'BSIT-4D', 'IT ELECTIVE 3', 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lab_midterm`
--

CREATE TABLE `lab_midterm` (
  `id` int(11) NOT NULL,
  `student_code` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `total_attendance_participation` int(11) DEFAULT NULL,
  `weighted_attendance_participation` float DEFAULT NULL,
  `lab_1` int(11) DEFAULT NULL,
  `lab_2` int(11) DEFAULT NULL,
  `lab_3` int(11) DEFAULT NULL,
  `lab_4` int(11) DEFAULT NULL,
  `lab_5` int(11) DEFAULT NULL,
  `lab_6` int(11) DEFAULT NULL,
  `lab_7` int(11) DEFAULT NULL,
  `lab_8` int(11) DEFAULT NULL,
  `lab_9` int(11) DEFAULT NULL,
  `lab_10` int(11) DEFAULT NULL,
  `total_lab` int(11) DEFAULT NULL,
  `weighted_lab` float DEFAULT NULL,
  `practical_1` int(11) DEFAULT NULL,
  `practical_2` int(11) DEFAULT NULL,
  `practical_3` int(11) DEFAULT NULL,
  `practical_4` int(11) DEFAULT NULL,
  `practical_5` int(11) DEFAULT NULL,
  `total_practical` float DEFAULT NULL,
  `weighted_practical` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab_midterm`
--

INSERT INTO `lab_midterm` (`id`, `student_code`, `lastname`, `section`, `subject`, `total_attendance_participation`, `weighted_attendance_participation`, `lab_1`, `lab_2`, `lab_3`, `lab_4`, `lab_5`, `lab_6`, `lab_7`, `lab_8`, `lab_9`, `lab_10`, `total_lab`, `weighted_lab`, `practical_1`, `practical_2`, `practical_3`, `practical_4`, `practical_5`, `total_practical`, `weighted_practical`) VALUES
(338, '201010409', 'FALLER, RAYMART', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 5, 20, 100, 100, 0, 0, 0, 0, 0, 0, 0, 0, 200, 50, 100, 95, 0, 0, 0, 195, 29.25),
(339, '202010375', 'SANTILLAN', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 10, 16, 90, 100, 10, 0, 0, 0, 0, 0, 0, 0, 190, 47.5, 100, 95, 0, 0, 0, 195, 29.25),
(340, '202010690', 'ACOSTA', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 4, 16, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 25, 0, 0, 0, 0, 0, 0, 0),
(341, '202010400', 'BARRENO', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 3, 12, 90, 0, 0, 0, 0, 0, 0, 0, 0, 0, 90, 22.5, 0, 0, 0, 0, 0, 0, 0),
(342, '202010392', 'BELALE', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 2, 8, 90, 0, 0, 0, 0, 0, 0, 0, 0, 0, 90, 22.5, 0, 0, 0, 0, 0, 0, 0),
(343, '201911375', 'CACHAPERO', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 4, 16, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 25, 0, 0, 0, 0, 0, 0, 0),
(344, '202010798', 'CAMINGAO', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 5, 20, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 25, 0, 0, 0, 0, 0, 0, 0),
(345, '201911388', 'CARABBAY', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 5, 20, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 25, 0, 0, 0, 0, 0, 0, 0),
(346, '202010382', 'CEA', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 5, 20, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 25, 0, 0, 0, 0, 0, 0, 0),
(347, '202010371', 'CHING', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 6, 20, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 25, 0, 0, 0, 0, 0, 0, 0),
(348, '202010361', 'DAYAP', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 7, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(349, '202010370', 'DELA CRUZ', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 7, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(350, '202010397', 'ESCORIAL', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 8, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(351, '202010828', 'ESGUERRA', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 9, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(352, '202010696', 'FORBES', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 10, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(353, '202010692', 'MACALIMA', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(354, '202010390', 'MAQUERME', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 4, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(355, '201911288', 'MATEO', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(356, '202010874', 'MORCOSO', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 4, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(357, '202010689', 'PANTALEON', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(358, '202010385', 'RIVERA', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(359, '202010378', 'SABAS', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(360, '202010372', 'SOLAS', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(361, '202010827', 'SULTAN', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(362, '202010799', 'TINDUGAN', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 3, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(363, '202010873', 'VALDEMORO', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 4, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(364, '202010758', 'VILLEGAS', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(419, '201010409', 'FALLER, RAYMART', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 5, 20, 100, 100, 0, 0, 0, 0, 0, 0, 0, 0, 200, 50, 100, 95, 0, 0, 0, 195, 29.25),
(420, '202010375', 'SANTILLAN', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 4, 16, 90, 100, 0, 0, 0, 0, 0, 0, 0, 0, 190, 47.5, 100, 95, 0, 0, 0, 195, 29.25),
(421, '202010690', 'ACOSTA', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 4, 16, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 25, 0, 0, 0, 0, 0, 0, 0),
(422, '202010400', 'BARRENO', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 3, 12, 90, 0, 0, 0, 0, 0, 0, 0, 0, 0, 90, 22.5, 0, 0, 0, 0, 0, 0, 0),
(423, '202010392', 'BELALE', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 2, 8, 90, 0, 0, 0, 0, 0, 0, 0, 0, 0, 90, 22.5, 0, 0, 0, 0, 0, 0, 0),
(424, '201911375', 'CACHAPERO', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 4, 16, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 25, 0, 0, 0, 0, 0, 0, 0),
(425, '202010798', 'CAMINGAO', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 5, 20, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 25, 0, 0, 0, 0, 0, 0, 0),
(426, '201911388', 'CARABBAY', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 5, 20, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 25, 0, 0, 0, 0, 0, 0, 0),
(427, '202010382', 'CEA', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 5, 20, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 25, 0, 0, 0, 0, 0, 0, 0),
(428, '202010371', 'CHING', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 6, 20, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 25, 0, 0, 0, 0, 0, 0, 0),
(429, '202010361', 'DAYAP', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 7, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(430, '202010370', 'DELA CRUZ', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 7, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(431, '202010397', 'ESCORIAL', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 8, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(432, '202010828', 'ESGUERRA', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 9, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(433, '202010696', 'FORBES', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 10, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(434, '202010692', 'MACALIMA', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(435, '202010390', 'MAQUERME', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 4, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(436, '201911288', 'MATEO', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(437, '202010874', 'MORCOSO', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 4, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(438, '202010689', 'PANTALEON', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(439, '202010385', 'RIVERA', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(440, '202010378', 'SABAS', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(441, '202010372', 'SOLAS', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(442, '202010827', 'SULTAN', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(443, '202010799', 'TINDUGAN', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 3, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(444, '202010873', 'VALDEMORO', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 4, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(445, '202010758', 'VILLEGAS', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(446, '201010409', 'FALLER, RAYMART', 'BSIT-4D', 'IT ELECTIVE 4', 5, 20, 100, 100, 0, 0, 0, 0, 0, 0, 0, 0, 200, 50, 100, 95, 0, 0, 0, 195, 29.25),
(447, '202010375', 'SANTILLAN', 'BSIT-4D', 'IT ELECTIVE 4', 4, 16, 90, 100, 0, 0, 0, 0, 0, 0, 0, 0, 190, 47.5, 100, 95, 0, 0, 0, 195, 29.25),
(448, '202010690', 'ACOSTA', 'BSIT-4D', 'IT ELECTIVE 4', 4, 16, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 25, 0, 0, 0, 0, 0, 0, 0),
(449, '202010400', 'BARRENO', 'BSIT-4D', 'IT ELECTIVE 4', 3, 12, 90, 0, 0, 0, 0, 0, 0, 0, 0, 0, 90, 22.5, 0, 0, 0, 0, 0, 0, 0),
(450, '202010392', 'BELALE', 'BSIT-4D', 'IT ELECTIVE 4', 2, 8, 90, 0, 0, 0, 0, 0, 0, 0, 0, 0, 90, 22.5, 0, 0, 0, 0, 0, 0, 0),
(451, '201911375', 'CACHAPERO', 'BSIT-4D', 'IT ELECTIVE 4', 4, 16, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 25, 0, 0, 0, 0, 0, 0, 0),
(452, '202010798', 'CAMINGAO', 'BSIT-4D', 'IT ELECTIVE 4', 5, 20, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 25, 0, 0, 0, 0, 0, 0, 0),
(453, '201911388', 'CARABBAY', 'BSIT-4D', 'IT ELECTIVE 4', 5, 20, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 25, 0, 0, 0, 0, 0, 0, 0),
(454, '202010382', 'CEA', 'BSIT-4D', 'IT ELECTIVE 4', 5, 20, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 25, 0, 0, 0, 0, 0, 0, 0),
(455, '202010371', 'CHING', 'BSIT-4D', 'IT ELECTIVE 4', 6, 20, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 25, 0, 0, 0, 0, 0, 0, 0),
(456, '202010361', 'DAYAP', 'BSIT-4D', 'IT ELECTIVE 4', 7, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(457, '202010370', 'DELA CRUZ', 'BSIT-4D', 'IT ELECTIVE 4', 7, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(458, '202010397', 'ESCORIAL', 'BSIT-4D', 'IT ELECTIVE 4', 8, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(459, '202010828', 'ESGUERRA', 'BSIT-4D', 'IT ELECTIVE 4', 9, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(460, '202010696', 'FORBES', 'BSIT-4D', 'IT ELECTIVE 4', 10, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(461, '202010692', 'MACALIMA', 'BSIT-4D', 'IT ELECTIVE 4', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(462, '202010390', 'MAQUERME', 'BSIT-4D', 'IT ELECTIVE 4', 4, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(463, '201911288', 'MATEO', 'BSIT-4D', 'IT ELECTIVE 4', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(464, '202010874', 'MORCOSO', 'BSIT-4D', 'IT ELECTIVE 4', 4, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(465, '202010689', 'PANTALEON', 'BSIT-4D', 'IT ELECTIVE 4', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(466, '202010385', 'RIVERA', 'BSIT-4D', 'IT ELECTIVE 4', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(467, '202010378', 'SABAS', 'BSIT-4D', 'IT ELECTIVE 4', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(468, '202010372', 'SOLAS', 'BSIT-4D', 'IT ELECTIVE 4', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(469, '202010827', 'SULTAN', 'BSIT-4D', 'IT ELECTIVE 4', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(470, '202010799', 'TINDUGAN', 'BSIT-4D', 'IT ELECTIVE 4', 3, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(471, '202010873', 'VALDEMORO', 'BSIT-4D', 'IT ELECTIVE 4', 4, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(472, '202010758', 'VILLEGAS', 'BSIT-4D', 'IT ELECTIVE 4', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(473, '201010409', 'FALLER, RAYMART', 'BSIT-4D', 'IT ELECTIVE 3', 5, 20, 100, 100, 0, 0, 0, 0, 0, 0, 0, 0, 200, 50, 100, 95, 0, 0, 0, 195, 29.25),
(474, '202010375', 'SANTILLAN', 'BSIT-4D', 'IT ELECTIVE 3', 4, 16, 90, 100, 0, 0, 0, 0, 0, 0, 0, 0, 190, 47.5, 100, 95, 0, 0, 0, 195, 29.25),
(475, '202010690', 'ACOSTA', 'BSIT-4D', 'IT ELECTIVE 3', 4, 16, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 25, 0, 0, 0, 0, 0, 0, 0),
(476, '202010400', 'BARRENO', 'BSIT-4D', 'IT ELECTIVE 3', 3, 12, 90, 0, 0, 0, 0, 0, 0, 0, 0, 0, 90, 22.5, 0, 0, 0, 0, 0, 0, 0),
(477, '202010392', 'BELALE', 'BSIT-4D', 'IT ELECTIVE 3', 2, 8, 90, 0, 0, 0, 0, 0, 0, 0, 0, 0, 90, 22.5, 0, 0, 0, 0, 0, 0, 0),
(478, '201911375', 'CACHAPERO', 'BSIT-4D', 'IT ELECTIVE 3', 4, 16, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 25, 0, 0, 0, 0, 0, 0, 0),
(479, '202010798', 'CAMINGAO', 'BSIT-4D', 'IT ELECTIVE 3', 5, 20, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 25, 0, 0, 0, 0, 0, 0, 0),
(480, '201911388', 'CARABBAY', 'BSIT-4D', 'IT ELECTIVE 3', 5, 20, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 25, 0, 0, 0, 0, 0, 0, 0),
(481, '202010382', 'CEA', 'BSIT-4D', 'IT ELECTIVE 3', 5, 20, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 25, 0, 0, 0, 0, 0, 0, 0),
(482, '202010371', 'CHING', 'BSIT-4D', 'IT ELECTIVE 3', 6, 20, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 25, 0, 0, 0, 0, 0, 0, 0),
(483, '202010361', 'DAYAP', 'BSIT-4D', 'IT ELECTIVE 3', 7, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(484, '202010370', 'DELA CRUZ', 'BSIT-4D', 'IT ELECTIVE 3', 7, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(485, '202010397', 'ESCORIAL', 'BSIT-4D', 'IT ELECTIVE 3', 8, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(486, '202010828', 'ESGUERRA', 'BSIT-4D', 'IT ELECTIVE 3', 9, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(487, '202010696', 'FORBES', 'BSIT-4D', 'IT ELECTIVE 3', 10, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(488, '202010692', 'MACALIMA', 'BSIT-4D', 'IT ELECTIVE 3', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(489, '202010390', 'MAQUERME', 'BSIT-4D', 'IT ELECTIVE 3', 4, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(490, '201911288', 'MATEO', 'BSIT-4D', 'IT ELECTIVE 3', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(491, '202010874', 'MORCOSO', 'BSIT-4D', 'IT ELECTIVE 3', 4, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(492, '202010689', 'PANTALEON', 'BSIT-4D', 'IT ELECTIVE 3', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(493, '202010385', 'RIVERA', 'BSIT-4D', 'IT ELECTIVE 3', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(494, '202010378', 'SABAS', 'BSIT-4D', 'IT ELECTIVE 3', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(495, '202010372', 'SOLAS', 'BSIT-4D', 'IT ELECTIVE 3', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(496, '202010827', 'SULTAN', 'BSIT-4D', 'IT ELECTIVE 3', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(497, '202010799', 'TINDUGAN', 'BSIT-4D', 'IT ELECTIVE 3', 3, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(498, '202010873', 'VALDEMORO', 'BSIT-4D', 'IT ELECTIVE 3', 4, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(499, '202010758', 'VILLEGAS', 'BSIT-4D', 'IT ELECTIVE 3', 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lab_midterm_attendance`
--

CREATE TABLE `lab_midterm_attendance` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_number` int(11) NOT NULL,
  `section` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `final_total_attendance` int(11) NOT NULL,
  `final_weighted_attendance` decimal(5,2) NOT NULL,
  `hps_final_total_attendance` int(11) DEFAULT NULL,
  `hps_final_weighted_attendance` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab_midterm_attendance`
--

INSERT INTO `lab_midterm_attendance` (`id`, `student_name`, `student_number`, `section`, `subject`, `final_total_attendance`, `final_weighted_attendance`, `hps_final_total_attendance`, `hps_final_weighted_attendance`) VALUES
(10, 'santillan', 202010375, 'BSIT-4D', 'SYSTEMS ADMINISTRATION AND MAINTENANCE', 90, 18.00, 100, 20);

-- --------------------------------------------------------

--
-- Table structure for table `lab_midterm_exam`
--

CREATE TABLE `lab_midterm_exam` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_number` int(11) NOT NULL,
  `section` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `exam_1` int(11) NOT NULL,
  `exam_2` int(11) NOT NULL,
  `exam_3` int(11) NOT NULL,
  `exam_4` int(11) NOT NULL,
  `exam_5` int(11) NOT NULL,
  `exam_total` int(11) NOT NULL,
  `exam_weighted` decimal(5,2) NOT NULL,
  `HPSexam_1` int(11) DEFAULT NULL,
  `HPSexam_2` int(11) DEFAULT NULL,
  `HPSexam_3` int(11) DEFAULT NULL,
  `HPSexam_4` int(11) DEFAULT NULL,
  `HPSexam_5` int(11) DEFAULT NULL,
  `HPSexam_total_maxscore` int(11) DEFAULT NULL,
  `HPSexam_weighted` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab_midterm_exam`
--

INSERT INTO `lab_midterm_exam` (`id`, `student_name`, `student_number`, `section`, `subject`, `exam_1`, `exam_2`, `exam_3`, `exam_4`, `exam_5`, `exam_total`, `exam_weighted`, `HPSexam_1`, `HPSexam_2`, `HPSexam_3`, `HPSexam_4`, `HPSexam_5`, `HPSexam_total_maxscore`, `HPSexam_weighted`) VALUES
(26, 'santillan', 202010375, 'BSIT-4D', 'SYSTEMS ADMINISTRATION AND MAINTENANCE', 10, 0, 0, 0, 0, 10, 30.00, 10, 0, 0, 0, 0, 10, 30);

-- --------------------------------------------------------

--
-- Table structure for table `lab_midterm_lab`
--

CREATE TABLE `lab_midterm_lab` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `student_number` varchar(20) DEFAULT NULL,
  `section` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `lab_activity_1` int(11) DEFAULT NULL,
  `lab_activity_2` int(11) DEFAULT NULL,
  `lab_activity_3` int(11) DEFAULT NULL,
  `lab_activity_4` int(11) DEFAULT NULL,
  `lab_activity_5` int(11) DEFAULT NULL,
  `lab_activity_6` int(11) DEFAULT NULL,
  `lab_activity_7` int(11) DEFAULT NULL,
  `lab_activity_8` int(11) DEFAULT NULL,
  `lab_activity_9` int(11) DEFAULT NULL,
  `lab_activity_10` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `weighted` int(11) DEFAULT NULL,
  `hps_lab_lab1` double DEFAULT NULL,
  `hps_lab_lab2` double DEFAULT NULL,
  `hps_lab_lab3` double DEFAULT NULL,
  `hps_lab_lab4` double DEFAULT NULL,
  `hps_lab_lab5` double DEFAULT NULL,
  `hps_lab_lab6` double DEFAULT NULL,
  `hps_lab_lab7` double DEFAULT NULL,
  `hps_lab_lab8` double DEFAULT NULL,
  `hps_lab_lab9` double DEFAULT NULL,
  `hps_lab_lab10` double DEFAULT NULL,
  `hps_lab_lab_total` double DEFAULT NULL,
  `hps_lab_lab_weighted` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab_midterm_lab`
--

INSERT INTO `lab_midterm_lab` (`id`, `student_name`, `student_number`, `section`, `subject`, `lab_activity_1`, `lab_activity_2`, `lab_activity_3`, `lab_activity_4`, `lab_activity_5`, `lab_activity_6`, `lab_activity_7`, `lab_activity_8`, `lab_activity_9`, `lab_activity_10`, `total`, `weighted`, `hps_lab_lab1`, `hps_lab_lab2`, `hps_lab_lab3`, `hps_lab_lab4`, `hps_lab_lab5`, `hps_lab_lab6`, `hps_lab_lab7`, `hps_lab_lab8`, `hps_lab_lab9`, `hps_lab_lab10`, `hps_lab_lab_total`, `hps_lab_lab_weighted`) VALUES
(34, 'santillan', '202010375', 'BSIT-4D', 'SYSTEMS ADMINISTRATION AND MAINTENANCE', 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `lecture_midterm_attendance`
--

CREATE TABLE `lecture_midterm_attendance` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_number` int(11) NOT NULL,
  `section` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `attendance_total` int(11) NOT NULL,
  `attendance_weighted` float NOT NULL,
  `participation_total` int(11) NOT NULL,
  `participation_weighted` float NOT NULL,
  `HPSattendanceTotal` int(11) DEFAULT NULL,
  `HPSparticipationTotal` int(11) DEFAULT NULL,
  `HPSattendanceWeighted` decimal(10,2) NOT NULL DEFAULT 0.00,
  `HPSparticipationWeighted` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecture_midterm_attendance`
--

INSERT INTO `lecture_midterm_attendance` (`id`, `student_name`, `student_number`, `section`, `subject`, `attendance_total`, `attendance_weighted`, `participation_total`, `participation_weighted`, `HPSattendanceTotal`, `HPSparticipationTotal`, `HPSattendanceWeighted`, `HPSparticipationWeighted`) VALUES
(35, 'santillan', 202010375, 'BSIT-4D', 'SYSTEMS ADMINISTRATION AND MAINTENANCE', 10, 10, 10, 10, 10, 10, 10.00, 10.00),
(36, 'forbes', 202010321, 'BSIT-4D', 'SYSTEMS ADMINISTRATION AND MAINTENANCE', 10, 5, 10, 5, 20, 20, 10.00, 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `lecture_midterm_exam`
--

CREATE TABLE `lecture_midterm_exam` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_number` varchar(10) NOT NULL,
  `section` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `exam_score` int(11) NOT NULL,
  `exam_weighted` decimal(5,2) NOT NULL,
  `hpsexam_score` int(11) DEFAULT NULL,
  `hpsexam_weighted` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecture_midterm_exam`
--

INSERT INTO `lecture_midterm_exam` (`id`, `student_name`, `student_number`, `section`, `subject`, `exam_score`, `exam_weighted`, `hpsexam_score`, `hpsexam_weighted`) VALUES
(23, 'santillan', '202010375', 'BSIT-4D', 'SYSTEMS ADMINISTRATION AND MAINTENANCE', 90, 18.00, 100, 20);

-- --------------------------------------------------------

--
-- Table structure for table `lecture_midterm_output`
--

CREATE TABLE `lecture_midterm_output` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_number` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `output_1` int(11) NOT NULL,
  `output_2` int(11) NOT NULL,
  `output_3` int(11) NOT NULL,
  `output_4` int(11) NOT NULL,
  `output_5` int(11) NOT NULL,
  `output_6` int(11) NOT NULL,
  `output_7` int(11) NOT NULL,
  `output_8` int(11) NOT NULL,
  `output_9` int(11) NOT NULL,
  `output_10` int(11) NOT NULL,
  `output_total` int(11) NOT NULL,
  `output_weighted` decimal(5,2) NOT NULL,
  `hpsoutput_1` int(11) DEFAULT NULL,
  `hpsoutput_2` int(11) DEFAULT NULL,
  `hpsoutput_3` int(11) DEFAULT NULL,
  `hpsoutput_4` int(11) DEFAULT NULL,
  `hpsoutput_5` int(11) DEFAULT NULL,
  `hpsoutput_6` int(11) DEFAULT NULL,
  `hpsoutput_7` int(11) DEFAULT NULL,
  `hpsoutput_8` int(11) DEFAULT NULL,
  `hpsoutput_9` int(11) DEFAULT NULL,
  `hpsoutput_10` int(11) DEFAULT NULL,
  `hpsoutput_total` int(11) DEFAULT NULL,
  `hpsoutput_weighted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecture_midterm_output`
--

INSERT INTO `lecture_midterm_output` (`id`, `student_name`, `student_number`, `section`, `subject`, `output_1`, `output_2`, `output_3`, `output_4`, `output_5`, `output_6`, `output_7`, `output_8`, `output_9`, `output_10`, `output_total`, `output_weighted`, `hpsoutput_1`, `hpsoutput_2`, `hpsoutput_3`, `hpsoutput_4`, `hpsoutput_5`, `hpsoutput_6`, `hpsoutput_7`, `hpsoutput_8`, `hpsoutput_9`, `hpsoutput_10`, `hpsoutput_total`, `hpsoutput_weighted`) VALUES
(13, 'santillan', 202010375, 'BSIT-4D', 'SYSTEMS ADMINISTRATION AND MAINTENANCE', 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 25.00, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 25);

-- --------------------------------------------------------

--
-- Table structure for table `lecture_midterm_quiz`
--

CREATE TABLE `lecture_midterm_quiz` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_number` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `quiz_1` int(11) NOT NULL,
  `quiz_2` int(11) NOT NULL,
  `quiz_3` int(11) NOT NULL,
  `quiz_4` int(11) NOT NULL,
  `quiz_5` int(11) NOT NULL,
  `quiz_6` int(11) NOT NULL,
  `quiz_7` int(11) NOT NULL,
  `quiz_8` int(11) NOT NULL,
  `quiz_9` int(11) NOT NULL,
  `quiz_10` int(11) NOT NULL,
  `quiz_total` int(11) NOT NULL,
  `quiz_weighted` decimal(5,2) NOT NULL,
  `hpsquiz_1` int(11) DEFAULT NULL,
  `hpsquiz_2` int(11) DEFAULT NULL,
  `hpsquiz_3` int(11) DEFAULT NULL,
  `hpsquiz_4` int(11) DEFAULT NULL,
  `hpsquiz_5` int(11) DEFAULT NULL,
  `hpsquiz_6` int(11) DEFAULT NULL,
  `hpsquiz_7` int(11) DEFAULT NULL,
  `hpsquiz_8` int(11) DEFAULT NULL,
  `hpsquiz_9` int(11) DEFAULT NULL,
  `hpsquiz_10` int(11) DEFAULT NULL,
  `hpsquiz_total` int(11) DEFAULT NULL,
  `hpsquiz_weighted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecture_midterm_quiz`
--

INSERT INTO `lecture_midterm_quiz` (`id`, `student_name`, `student_number`, `section`, `subject`, `quiz_1`, `quiz_2`, `quiz_3`, `quiz_4`, `quiz_5`, `quiz_6`, `quiz_7`, `quiz_8`, `quiz_9`, `quiz_10`, `quiz_total`, `quiz_weighted`, `hpsquiz_1`, `hpsquiz_2`, `hpsquiz_3`, `hpsquiz_4`, `hpsquiz_5`, `hpsquiz_6`, `hpsquiz_7`, `hpsquiz_8`, `hpsquiz_9`, `hpsquiz_10`, `hpsquiz_total`, `hpsquiz_weighted`) VALUES
(20, 'santillan', 202010375, 'BSIT-4D', 'SYSTEMS ADMINISTRATION AND MAINTENANCE', 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 15.00, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 15);

-- --------------------------------------------------------

--
-- Table structure for table `manual_attend_part`
--

CREATE TABLE `manual_attend_part` (
  `id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_number` int(11) NOT NULL,
  `attendance_total` int(11) NOT NULL,
  `attendance_weighted` decimal(5,2) NOT NULL,
  `participation_total` int(11) NOT NULL,
  `participation_weighted` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manual_output`
--

CREATE TABLE `manual_output` (
  `id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_number` int(11) NOT NULL,
  `output_1` int(11) NOT NULL DEFAULT 0,
  `output_2` int(11) NOT NULL DEFAULT 0,
  `output_3` int(11) NOT NULL DEFAULT 0,
  `output_4` int(11) NOT NULL DEFAULT 0,
  `output_5` int(11) NOT NULL DEFAULT 0,
  `output_6` int(11) NOT NULL DEFAULT 0,
  `output_7` int(11) NOT NULL DEFAULT 0,
  `output_8` int(11) NOT NULL DEFAULT 0,
  `output_9` int(11) NOT NULL DEFAULT 0,
  `output_10` int(11) NOT NULL DEFAULT 0,
  `output_total` int(11) NOT NULL DEFAULT 0,
  `output_weighted` decimal(5,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manual_quiz`
--

CREATE TABLE `manual_quiz` (
  `id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_number` int(11) NOT NULL,
  `quiz_1` int(11) NOT NULL DEFAULT 0,
  `quiz_2` int(11) NOT NULL DEFAULT 0,
  `quiz_3` int(11) NOT NULL DEFAULT 0,
  `quiz_4` int(11) NOT NULL DEFAULT 0,
  `quiz_5` int(11) NOT NULL DEFAULT 0,
  `quiz_6` int(11) NOT NULL DEFAULT 0,
  `quiz_7` int(11) NOT NULL DEFAULT 0,
  `quiz_8` int(11) NOT NULL DEFAULT 0,
  `quiz_9` int(11) NOT NULL DEFAULT 0,
  `quiz_10` int(11) NOT NULL DEFAULT 0,
  `quiz_total` int(11) NOT NULL DEFAULT 0,
  `quiz_weighted` decimal(5,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `midterm`
--

CREATE TABLE `midterm` (
  `id` int(11) NOT NULL,
  `student_code` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `attendance_days` int(11) DEFAULT NULL,
  `weighted_attendance` float DEFAULT NULL,
  `participation_score` int(11) DEFAULT NULL,
  `weighted_participation` float DEFAULT NULL,
  `quiz_1` int(11) DEFAULT NULL,
  `quiz_2` int(11) DEFAULT NULL,
  `quiz_3` int(11) DEFAULT NULL,
  `quiz_4` int(11) DEFAULT NULL,
  `quiz_5` int(11) DEFAULT NULL,
  `quiz_6` int(11) DEFAULT NULL,
  `quiz_7` int(11) DEFAULT NULL,
  `quiz_8` int(11) DEFAULT NULL,
  `quiz_9` int(11) DEFAULT NULL,
  `quiz_10` int(11) DEFAULT NULL,
  `total_quiz` int(11) DEFAULT NULL,
  `weighted_quizzes` float DEFAULT NULL,
  `output_1` int(11) DEFAULT NULL,
  `output_2` int(11) DEFAULT NULL,
  `output_3` int(11) DEFAULT NULL,
  `output_4` int(11) DEFAULT NULL,
  `output_5` int(11) DEFAULT NULL,
  `output_6` int(11) DEFAULT NULL,
  `output_7` int(11) DEFAULT NULL,
  `output_8` int(11) DEFAULT NULL,
  `output_9` int(11) DEFAULT NULL,
  `output_10` int(11) DEFAULT NULL,
  `total_output` int(11) DEFAULT NULL,
  `weighted_outputs` float DEFAULT NULL,
  `midterm_score` int(11) DEFAULT NULL,
  `weighted_midterm` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `midterm`
--

INSERT INTO `midterm` (`id`, `student_code`, `lastname`, `section`, `subject`, `attendance_days`, `weighted_attendance`, `participation_score`, `weighted_participation`, `quiz_1`, `quiz_2`, `quiz_3`, `quiz_4`, `quiz_5`, `quiz_6`, `quiz_7`, `quiz_8`, `quiz_9`, `quiz_10`, `total_quiz`, `weighted_quizzes`, `output_1`, `output_2`, `output_3`, `output_4`, `output_5`, `output_6`, `output_7`, `output_8`, `output_9`, `output_10`, `total_output`, `weighted_outputs`, `midterm_score`, `weighted_midterm`) VALUES
(508, '201010409', 'FALLER, RAYMART', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 10, 10, 5, 10, 15, 5, 0, 0, 0, 0, 0, 0, 0, 0, 15, 11.25, 85, 89, 0, 0, 0, 0, 0, 0, 0, 0, 174, 21.75, 55, 18.33),
(509, '202010375', 'SANTILLAN', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 5, 10, 5, 10, 8, 9, 0, 0, 0, 0, 0, 0, 0, 0, 17, 12.75, 90, 95, 0, 0, 0, 0, 0, 0, 0, 0, 185, 23.12, 59, 19.67),
(510, '202010690', 'ACOSTA', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(511, '202010400', 'BARRENO', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(512, '202010392', 'BELALE', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(513, '201911375', 'CACHAPERO', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(514, '202010798', 'CAMINGAO', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(515, '201911388', 'CARABBAY', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(516, '202010382', 'CEA', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(517, '202010371', 'CHING', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(518, '202010361', 'DAYAP', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(519, '202010370', 'DELA CRUZ', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(520, '202010397', 'ESCORIAL', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(521, '202010828', 'ESGUERRA', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(522, '202010696', 'FORBES', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(523, '202010692', 'MACALIMA', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(524, '202010390', 'MAQUERME', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(525, '201911288', 'MATEO', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(526, '202010874', 'MORCOSO', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(527, '202010689', 'PANTALEON', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(528, '202010385', 'RIVERA', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(529, '202010378', 'SABAS', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(530, '202010372', 'SOLAS', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(531, '202010827', 'SULTAN', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(532, '202010799', 'TINDUGAN', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(533, '202010873', 'VALDEMORO', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(534, '202010758', 'VILLEGAS', 'BSIT-4D', 'SOCIAL AND PROFESSIONAL ISSUES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(562, '201010409', 'FALLER, RAYMART', 'BSIT-4D', 'IT ELECTIVE 4', 5, 10, 5, 10, 10, 5, 0, 0, 0, 0, 0, 0, 0, 0, 15, 11.25, 85, 89, 0, 0, 0, 0, 0, 0, 0, 0, 174, 21.75, 55, 18.33),
(563, '202010375', 'SANTILLAN', 'BSIT-4D', 'IT ELECTIVE 4', 5, 10, 5, 10, 8, 9, 0, 0, 0, 0, 0, 0, 0, 0, 17, 12.75, 90, 95, 0, 0, 0, 0, 0, 0, 0, 0, 185, 23.12, 59, 19.67),
(564, '202010690', 'ACOSTA', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(565, '202010400', 'BARRENO', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(566, '202010392', 'BELALE', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(567, '201911375', 'CACHAPERO', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(568, '202010798', 'CAMINGAO', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(569, '201911388', 'CARABBAY', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(570, '202010382', 'CEA', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(571, '202010371', 'CHING', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(572, '202010361', 'DAYAP', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(573, '202010370', 'DELA CRUZ', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(574, '202010397', 'ESCORIAL', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(575, '202010828', 'ESGUERRA', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(576, '202010696', 'FORBES', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(577, '202010692', 'MACALIMA', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(578, '202010390', 'MAQUERME', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(579, '201911288', 'MATEO', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(580, '202010874', 'MORCOSO', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(581, '202010689', 'PANTALEON', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(582, '202010385', 'RIVERA', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(583, '202010378', 'SABAS', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(584, '202010372', 'SOLAS', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(585, '202010827', 'SULTAN', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(586, '202010799', 'TINDUGAN', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(587, '202010873', 'VALDEMORO', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(588, '202010758', 'VILLEGAS', 'BSIT-4D', 'IT ELECTIVE 4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(591, '201010409', 'FALLER, RAYMART', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 5, 10, 5, 10, 10, 5, 0, 0, 0, 0, 0, 0, 0, 0, 15, 11.25, 85, 89, 0, 0, 0, 0, 0, 0, 0, 0, 174, 21.75, 55, 18.33),
(592, '202010375', 'SANTILLAN', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 5, 10, 5, 10, 8, 9, 0, 0, 0, 0, 0, 0, 0, 0, 17, 12.75, 90, 95, 0, 0, 0, 0, 0, 0, 0, 0, 185, 23.12, 59, 19.67),
(593, '202010690', 'ACOSTA', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(594, '202010400', 'BARRENO', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(595, '202010392', 'BELALE', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(596, '201911375', 'CACHAPERO', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(597, '202010798', 'CAMINGAO', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(598, '201911388', 'CARABBAY', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(599, '202010382', 'CEA', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(600, '202010371', 'CHING', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(601, '202010361', 'DAYAP', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(602, '202010370', 'DELA CRUZ', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(603, '202010397', 'ESCORIAL', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(604, '202010828', 'ESGUERRA', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(605, '202010696', 'FORBES', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(606, '202010692', 'MACALIMA', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(607, '202010390', 'MAQUERME', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(608, '201911288', 'MATEO', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(609, '202010874', 'MORCOSO', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(610, '202010689', 'PANTALEON', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(611, '202010385', 'RIVERA', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(612, '202010378', 'SABAS', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(613, '202010372', 'SOLAS', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(614, '202010827', 'SULTAN', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(615, '202010799', 'TINDUGAN', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(616, '202010873', 'VALDEMORO', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(617, '202010758', 'VILLEGAS', 'BSIT-4D', 'CAPSTONE PROJECT AND RESEARCH 2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(618, '201010409', 'FALLER, RAYMART', 'BSIT-4D', 'IT ELECTIVE 3', 5, 10, 5, 10, 10, 5, 0, 0, 0, 0, 0, 0, 0, 0, 15, 11.25, 85, 89, 0, 0, 0, 0, 0, 0, 0, 0, 174, 21.75, 55, 18.33),
(619, '202010375', 'SANTILLAN', 'BSIT-4D', 'IT ELECTIVE 3', 5, 10, 5, 10, 8, 9, 0, 0, 0, 0, 0, 0, 0, 0, 17, 12.75, 90, 95, 0, 0, 0, 0, 0, 0, 0, 0, 185, 23.12, 59, 19.67),
(620, '202010690', 'ACOSTA', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(621, '202010400', 'BARRENO', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(622, '202010392', 'BELALE', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(623, '201911375', 'CACHAPERO', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(624, '202010798', 'CAMINGAO', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(625, '201911388', 'CARABBAY', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(626, '202010382', 'CEA', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(627, '202010371', 'CHING', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(628, '202010361', 'DAYAP', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(629, '202010370', 'DELA CRUZ', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(630, '202010397', 'ESCORIAL', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(631, '202010828', 'ESGUERRA', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(632, '202010696', 'FORBES', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(633, '202010692', 'MACALIMA', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(634, '202010390', 'MAQUERME', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(635, '201911288', 'MATEO', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(636, '202010874', 'MORCOSO', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(637, '202010689', 'PANTALEON', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(638, '202010385', 'RIVERA', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(639, '202010378', 'SABAS', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(640, '202010372', 'SOLAS', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(641, '202010827', 'SULTAN', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(642, '202010799', 'TINDUGAN', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(643, '202010873', 'VALDEMORO', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(644, '202010758', 'VILLEGAS', 'BSIT-4D', 'IT ELECTIVE 3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(645, NULL, NULL, 'BSIT-4D', 'IT ELECTIVE 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(646, NULL, NULL, 'BSIT-4D', 'IT ELECTIVE 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(647, NULL, NULL, 'BSIT-4D', 'IT ELECTIVE 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(648, NULL, NULL, 'BSIT-4D', 'IT ELECTIVE 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(649, NULL, NULL, 'BSIT-4D', 'IT ELECTIVE 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(650, NULL, NULL, 'BSIT-4D', 'IT ELECTIVE 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(651, NULL, NULL, 'BSIT-4D', 'IT ELECTIVE 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(652, NULL, NULL, 'BSIT-4D', 'IT ELECTIVE 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(30) NOT NULL,
  `student_id` int(30) NOT NULL,
  `marks_percentage` varchar(5) NOT NULL,
  `class_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `student_id`, `marks_percentage`, `class_id`, `date_created`) VALUES
(1, 1, '87.67', 1, '2020-11-21 16:57:05'),
(2, 2, '90.33', 1, '2020-11-25 16:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `result_items`
--

CREATE TABLE `result_items` (
  `id` int(30) NOT NULL,
  `result_id` int(30) NOT NULL,
  `subject_id` int(30) NOT NULL,
  `mark` float NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result_items`
--

INSERT INTO `result_items` (`id`, `result_id`, `subject_id`, `mark`, `date_created`) VALUES
(1, 1, 2, 88, '2020-11-21 16:57:05'),
(2, 1, 1, 85, '2020-11-21 16:57:05'),
(3, 1, 3, 90, '2020-11-21 16:57:05'),
(4, 2, 2, 90, '2020-11-25 16:45:52'),
(5, 2, 1, 88, '2020-11-25 16:45:52'),
(6, 2, 3, 93, '2020-11-25 16:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(30) NOT NULL,
  `student_code` varchar(50) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `class_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `archive` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Active, 1: Archived'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_code`, `firstname`, `middlename`, `lastname`, `gender`, `address`, `class_id`, `date_created`, `archive`) VALUES
(1, '202010690', 'DANIELLA CATHERINE', '', 'ACOSTA', 'Female', 'N/A', 11, '2023-10-17 13:40:55', 0),
(2, '202010400', 'WAYNE ROSE', 'GUMATAY', 'BARRENO', 'Female', 'N/A', 11, '2023-10-17 13:41:39', 0),
(3, '202010392', 'JAMES PATRICK', 'VILLASENOR', 'BELALE', 'Male', 'N/A', 11, '2023-10-17 13:42:27', 0),
(4, '201911375', 'VINCENT', 'SUING', 'CACHAPERO', 'Male', 'N/A', 11, '2023-10-17 13:43:47', 0),
(5, '202010798', 'JAN RIAN', 'DOCUN', 'CAMINGAO', 'Female', 'N/A', 11, '2023-10-17 13:44:33', 0),
(6, '201911388', 'AARON PAUL', 'REYES', 'CARABBAY', 'Male', 'N/A', 11, '2023-10-17 13:45:48', 0),
(7, '202010382', 'JUNERICK', 'SAN BUENAVENTURA', 'CEA', 'Male', 'N/A', 11, '2023-10-17 13:46:42', 0),
(8, '202010371', 'RICARDO', 'PADILLA', 'CHING', 'Male', 'N/A', 11, '2023-10-17 13:47:42', 0),
(9, '202010361', 'JENICA', 'ROMANO', 'DAYAP', 'Female', 'N/A', 11, '2023-10-17 13:51:21', 0),
(10, '202010370', 'DANIELLA', 'BULTRON', 'DELA CRUZ', 'Female', 'N/A', 11, '2023-10-17 13:52:18', 0),
(11, '202010397', 'PREITY ANTOINETTE', 'MAGTALAS', 'ESCORIAL', 'Female', 'N/A', 11, '2023-10-17 13:53:30', 0),
(12, '202010828', 'STEVEN', 'SUICO', 'ESGUERRA', 'Male', 'N/A', 11, '2023-10-17 13:54:34', 0),
(13, '202010696', 'JOHN PATRICK', '', 'FORBES', 'Male', 'N/A', 11, '2023-10-17 13:55:20', 0),
(14, '202010692', 'JOHN PATRICK', 'ABAD', 'MACALIMA', 'Male', 'N/A', 11, '2023-10-17 13:56:22', 0),
(15, '202010390', 'FAITH', 'TALIMUDAO', 'MAQUERME', 'Female', 'N/A', 11, '2023-10-17 13:57:32', 0),
(16, '201911288', 'CAMELA', 'TERIO', 'MATEO', 'Female', 'N/A', 11, '2023-10-17 13:58:41', 0),
(17, '202010874', 'CLOYD ANDREI', 'FLORES', 'MORCOSO', 'Male', 'N/A', 11, '2023-10-17 13:59:41', 0),
(18, '202010689', 'LORE AXEL', 'UY', 'PANTALEON', 'Male', 'N/A', 11, '2023-10-17 14:00:19', 0),
(19, '202010385', 'ALBERT SON ', 'PURIFICACION', 'RIVERA', 'Male', 'N/A', 11, '2023-10-17 14:01:24', 0),
(20, '202010378', 'JAYMIE', 'OLEDAN', 'SABAS', 'Female', 'N/A', 11, '2023-10-17 14:02:00', 0),
(21, '202010375', 'ALPON DAVE', 'REMOROZA', 'SANTILLAN', 'Male', 'N/A', 11, '2023-10-17 14:02:25', 0),
(22, '202010372', 'CLYDE', 'SAULLAS', 'SOLAS', 'Male', 'N/A', 11, '2023-10-17 14:03:27', 0),
(23, '202010827', 'MOHAIMEN ', 'RINAYONG', 'SULTAN', 'Male', 'N/A', 11, '2023-10-17 14:04:02', 0),
(24, '202010799', 'JAYSON', 'PALMA', 'TINDUGAN', 'Male', 'N/A', 11, '2023-10-17 14:04:50', 0),
(25, '202010873', 'LOVELY ', 'CABAYARAN', 'VALDEMORO', 'Female', 'N/A', 11, '2023-10-17 14:05:33', 0),
(26, '202010758', 'KYLA FRANCES', '', 'VILLEGAS', 'Female', 'N/A', 11, '2023-10-17 14:06:14', 0),
(27, '202010301', 'MARK ANTHONY', 'GOMONIT', 'ABOGADO', 'Male', 'N/A', 8, '2023-11-15 10:50:43', 0),
(28, '202010315', 'KIM ABIGAYLE', 'SASIS', 'ARGUELLES', 'Female', 'N/A', 8, '2023-11-15 10:51:40', 0),
(29, '202010310', 'JOSHUA ', 'LABASTIDA', 'BACALA', 'Male', 'N/A', 8, '2023-11-15 10:52:26', 0),
(30, '202010322', 'DAPHNE', 'PLAZA', 'BARIQUIT', 'Female', 'N/A', 8, '2023-11-15 10:53:23', 0),
(31, '202010327', 'MARK ANDREI', 'CARUNGCONG', 'CABIGAT', 'Male', 'N/A', 8, '2023-11-15 10:54:08', 0),
(32, '202010345', 'FRANCIS BIEN', 'PANTIG', 'CAGUIAT', 'Male', 'N/A', 8, '2023-11-15 10:55:01', 0),
(33, '202010342', 'MAY JHANE', 'PORAZO', 'CALUYO', 'Female', 'N/A', 8, '2023-11-15 10:55:43', 0),
(34, '202010337', 'MARY MAY ', 'TIMBANG', 'CANDA', 'Female', 'N/A', 8, '2023-11-15 10:56:35', 0),
(35, '202210770', 'MIGUEL', 'GACOSTA', 'CERVANTES', 'Male', 'N/A', 8, '2023-11-15 10:57:29', 0),
(36, '202010336', 'WILFRED', 'BOLO', 'DELOS REYES', 'Male', 'N/A', 8, '2023-11-15 10:58:05', 0),
(37, '202010376', 'DARWIN', 'ALBIOS', 'DESIERTO', 'Male', 'N/A', 8, '2023-11-15 10:58:54', 0),
(38, '202211216', 'ANGELLO', 'ALONZAGAY', 'DOROTEO', 'Male', 'N/A', 8, '2023-11-15 10:59:55', 0),
(39, '202010348', 'JOANNA ROSE', 'CASERO', 'DRIO', 'Female', 'N/A', 8, '2023-11-15 11:01:04', 0),
(40, '202210771', 'BEA FRANCESKA', 'GARCIA', 'ENCIO', 'Female', 'N/A', 8, '2023-11-15 11:02:18', 0),
(41, '202010320', 'JOLLYVHER ', 'ALAMO', 'FORTEZA', 'Female', 'N/A', 8, '2023-11-15 11:03:33', 0),
(42, '202010331', 'JAMAICA ELLA', 'ISON', 'GONZAGA', 'Female', 'N/A', 8, '2023-11-15 11:04:15', 0),
(43, '202010334', 'GODWIN MAYSON', 'ALERAMA', 'LIWANAG', 'Male', 'N/A', 8, '2023-11-15 11:04:54', 0),
(44, '202010316', 'RICA MAE', 'BESIN', 'LUMAMPAO', 'Female', 'N/A', 8, '2023-11-15 11:05:39', 0),
(45, '202010311', 'SHAINE ASHLEY', 'RIVERA', 'MARTINEZ', 'Female', 'N/A', 8, '2023-11-15 11:06:20', 0),
(46, '202010313', 'FRANKLIN JR.', 'APLAL', 'MONTANO', 'Male', 'N/A', 8, '2023-11-15 11:07:14', 0),
(47, '202010380', 'LOIZA MARIE', 'BRUAN', 'NALDO', 'Female', 'N/A', 8, '2023-11-15 11:07:49', 0),
(48, '202010368', 'JOHN PAUL', 'OLESCO', 'NICOLAS', 'Male', 'N/A', 8, '2023-11-15 11:08:35', 0),
(49, '202010351', 'JHAZIEL ', 'LLANITA', 'NUNES', 'Female', 'N/A', 8, '2023-11-15 11:09:29', 0),
(50, '202010379', 'JEMAICA', 'ISIDORO', 'PABLO', 'Female', 'N/A', 8, '2023-11-15 11:10:26', 0),
(51, '202010329', 'JERICHO NINO', 'OLEDAN', 'PATAPAT', 'Male', 'N/A', 8, '2023-11-15 11:11:16', 0),
(52, '202010325', 'JAMESLY', 'RAMIREZ', 'PAUS', 'Female', 'N/A', 8, '2023-11-15 11:12:00', 0),
(53, '202010381', 'RYAN JOHN', 'TARCITA', 'POLONDAYA', 'Male', 'N/A', 8, '2023-11-15 11:12:34', 0),
(54, '202010343', 'MELWIN', 'SERRANO', 'PRESENTACION', 'Male', 'N/A', 8, '2023-11-15 11:13:12', 0),
(55, '202010365', 'CRYSTAL KAYE', 'SALES', 'PRONDA', 'Female', 'N/A', 8, '2023-11-15 11:13:46', 0),
(56, '202210776', 'BENNETH JAMAICA', 'LONGATANG', 'PUNZALAN', 'Female', 'N/A', 8, '2023-11-15 11:14:48', 0),
(57, '202010298', 'JASON', 'BANZON', 'REFORMADO', 'Male', 'N/A', 8, '2023-11-15 11:15:23', 0),
(58, '202010338', 'SHANELL ANN', 'LOPEZ', 'RAGONA', 'Female', 'N/A', 8, '2023-11-15 11:15:54', 0),
(59, '202221075', 'JAN IVERSON', 'MACABANGUN', 'REMOJO', 'Male', 'N/A', 8, '2023-11-15 11:16:53', 0),
(60, '202010299', 'MARY VIANNEY', 'CLIMACO', 'REVILLEZA', 'Female', 'N/A', 8, '2023-11-15 11:18:11', 0),
(61, '202010800', 'EUNICE JANE', '', 'ROSAL', 'Female', 'N/A', 8, '2023-11-15 11:18:46', 0),
(62, '202010350', 'KAYE ANGELLI', 'VALDEZ', 'SALVE', 'Female', 'N/A', 8, '2023-11-15 11:19:20', 0),
(63, '202010341', 'CHARLIE', 'TORRES', 'VALDEZ', 'Male', 'N/A', 8, '2023-11-15 11:19:59', 0),
(64, '202010353', 'JAZZEL', 'R.', 'VALENCIA', 'Female', 'N/A', 8, '2023-11-15 11:20:39', 0),
(65, '202010363', 'CHRISTIAN BERT', 'EDESA', 'VILLOTE', 'Male', 'N/A', 8, '2023-11-15 11:21:13', 0),
(69, '202010396', 'RONIE', 'NABOR', 'CELIZ', 'Male', 'N/A', 11, '2023-11-30 16:36:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `students_registration`
--

CREATE TABLE `students_registration` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `archived` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students_registration`
--

INSERT INTO `students_registration` (`id`, `username`, `password`, `archived`) VALUES
(3, '202010692', '$2y$10$J1ygYvF4BNYuKJhFh3mTBu2SxDzpUiLfC/ukfvIIALgA8jeV5wgP.', 0),
(5, '202010696', '$2y$10$pXpAo/pGVHfGyra1lxwymOktym5x17CgntBPZ9vSKYwdvQWdoCKxu', 0),
(11, '202010690', '$2y$10$/S5c5jWPPvU8fN6kXkiYkOyU/OEQmA4SwbEDe3Uhv0qK3P98YnqnC', 0),
(12, '202010400', '$2y$10$Hy8GNPmB7yZK26H.hM4mNeXiDecBpv4qH2BGeGPNcoB1FzLtwQG72', 0),
(25, '202010392', '$2y$10$ANaotgSmqirz4JMlVz3udO2ZecKc2fcemRS8uNtDzPRown7SL/woW', 0),
(26, '201911375', '$2y$10$YgAPOyrg/u5tCQAU1rmpbuRvXI/B0ujD8Bp99aJPvMygQ6917pTgq', 0),
(27, '202010798', '$2y$10$2e6goJTi3lk4QBz3EfZ9lOp6JjmT22mYVfA8b4/OU6pN6sMWLMgBq', 0),
(31, '201911388', '$2y$10$kWCfSDvUX17miBeh386nr.6JANGAgBArsKnMeoy5RqC6iQApnNsqm', 0),
(32, '202010375', '$2y$10$LhZkgFodT3m6CPaMU1Kbe.HEgwVALsErQ6rwPabJy230DOI8Uoblu', 0),
(33, '202010382', '$2y$10$58wMR74QVaiYd9ogDJOhR.wZcl5SW6tU5JjUri7BPKJmJ/oy/3NBS', 0),
(34, '202010371', '$2y$10$twhfa7lzcm46OlB116TQ7e3meKr09Kl4EMe4JlA4MXMcis6LwAfse', 0),
(35, '202010361', '$2y$10$VNwerF0Y/dyyyl8NSP2csuJesUxufQWDqANFpfEbvSm.5j1ysUVSe', 0),
(36, '202010370', '$2y$10$26/Tuloge6RDmB1WZhFXXOd51kY102lYY9bH6yD74pzdYGn8sRoZO', 0),
(37, '202010397', '$2y$10$WQF8M1NBpezTfnFeS9C4ne7pHdGSCgLbj6VZVvnzIQUwctN38ke3q', 0),
(38, '202010828', '$2y$10$i.0KPG6wyVSAukpyBb5l2O3uLmbFQVzv6S4TZShV4u/XrfBmr/ciO', 0),
(39, '202010390', '$2y$10$odUWwtl1G3U19cVwsnE0j.lQUHHLDAL.MQRGZpJfehAF6/VxL./5C', 0),
(40, '201911288', '$2y$10$67L2z2P/xtSbigk5aUXcteVKYhKKOL2LUW1L9E4e43GcXV3q3F4yC', 0),
(41, '202010874', '$2y$10$PeWWhZ/.tFqRikWVwUwzxOKJs8y934zJBq4EeCkQ44ltj4jp.KUY.', 0),
(42, '202010689', '$2y$10$623zGQ2.W1Vpy6R5xYabHOULG2CSzKAzW.oYKe1rE78svyTDC.DJK', 0),
(43, '202010385', '$2y$10$ghA5dA6JZfrs9YSSOGA08OwvczD2EnXdxmtVwu1kpo91IHctRaEia', 0),
(44, '202010378', '$2y$10$ivWezDwD7xzOba5oniwePeHqT96VqgKkE35FHmuBxI2u2bMT5T15e', 0),
(45, '202010372', '$2y$10$yto.3Yhw37n.L2VyxLgLM.vNRpQBy.oXQq5IlqCx3uGA/0QrJK2i2', 0),
(46, '202010827', '$2y$10$5EJl80B.NfnSBsXaDeBgF.2pcMQAsG7TlKLb1sgIGshmgfu7JJQVW', 0),
(47, '202010799', '$2y$10$nMg.N8X4DEAMbZL53nL8.u24YFvGGCO6879wJEisj1nMMHMSPwqPW', 0),
(50, '202010873', '$2y$10$DRfdh8i8muU2AnnTMwM0reocenoi7A.VHkFPoSP00m33XFhKSAdxy', 0),
(51, '202010345', '$2y$10$w37sWZkffe16OQj062/MceMFzIDU5Zgc4EN20fk6J2nGwoKTRB/3K', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_admin`
--

CREATE TABLE `student_admin` (
  `id` int(11) NOT NULL,
  `student_code` varchar(50) NOT NULL,
  `message_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_admin`
--

INSERT INTO `student_admin` (`id`, `student_code`, `message_text`, `created_at`) VALUES
(2, '202010692', 'i forgot my password send help', '2023-12-06 00:32:27'),
(15, '202010375', 'hi', '2024-01-13 22:38:25'),
(16, '202010375', 'please help', '2024-01-13 23:30:16'),
(17, '202010375', 'please help', '2024-01-13 23:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `student_messages`
--

CREATE TABLE `student_messages` (
  `id` int(11) NOT NULL,
  `student_code` varchar(100) NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `message_text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_messages`
--

INSERT INTO `student_messages` (`id`, `student_code`, `teacher_name`, `message_text`, `created_at`) VALUES
(10, '202010375', 'MALABANAN,CARLO - CAPSTONE PROJECT AND RESEARCH 2', 'okay', '2024-01-13 03:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(30) NOT NULL,
  `subject_code` varchar(50) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_code`, `subject`, `description`, `date_created`) VALUES
(1, 'DCIT 65A', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT', '2023-11-30 15:15:13'),
(5, 'ITEC111', 'IT ELECTIVE 3', 'BSIT', '2023-10-14 12:26:11'),
(6, 'ITEC116', 'IT ELECTIVE 4', 'BSIT', '2023-10-14 12:26:30'),
(7, 'ITEC 110', 'SYSTEMS ADMINISTRATION AND MAINTENANCE', 'BSIT', '2023-10-14 12:26:44'),
(8, 'ITEC 200-B', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT', '2023-10-14 12:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `cover_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `address`, `cover_img`) VALUES
(1, 'Online Student Result System', 'info@sample.comm', '+6948 8542 623', '2102  Caldwell Road, Rochester, New York, 14608', '1605927480_download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `archived` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `subject`, `section`, `archived`) VALUES
(40, 'MALABANAN,CARLO', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4D', 0),
(41, 'MODESTO, SHAINA MARIE', 'IT ELECTIVE 3', 'BSIT-4D', 0),
(42, 'DALLEGO, JOHN VINCENT', 'IT ELECTIVE 4', 'BSIT-4D', 0),
(43, 'CEZAR, MARK ANTHONY', 'SYSTEMS ADMINISTRATION AND MAINTENANCE', 'BSIT-4D', 0),
(44, 'MALABANAN,CARLO', 'CAPSTONE PROJECT AND RESEARCH 2', 'BSIT-4D', 0),
(45, 'MALABANAN,CARLO', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4A', 1),
(46, 'DALLEGO, JOHN VINCENT', 'IT ELECTIVE 4', 'BSIT-4C', 1),
(47, 'DALLEGO, JOHN VINCENT', 'IT ELECTIVE 4', 'BSIT-4B', 1),
(48, 'CEZAR, MARK ANTHONY', 'SYSTEMS ADMINISTRATION AND MAINTENANCE', 'BSIT-4C', 1),
(49, 'DALLEGO, JOHN VINCENT', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4B', 1),
(50, 'MALABANAN,CARLO', 'IT ELECTIVE 4', 'BSIT-4B', 1),
(51, 'MALABANAN,CARLO', 'IT ELECTIVE 3', 'BSIT-4D', 1),
(52, 'CEZAR, MARK ANTHONY', 'SOCIAL AND PROFESSIONAL ISSUES', 'BSIT-4A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_admin`
--

CREATE TABLE `teacher_admin` (
  `id` int(11) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `message_text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_admin`
--

INSERT INTO `teacher_admin` (`id`, `teacher_name`, `message_text`, `created_at`) VALUES
(8, 'CEZAR, MARK ANTHONY', 'ok po ', '2023-12-08 02:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_messages`
--

CREATE TABLE `teacher_messages` (
  `id` int(11) NOT NULL,
  `student_code` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `message_text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` int(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `type`, `date_created`) VALUES
(1, 'Administrator', '', 'admin', '0192023a7bbd73250516f069df18b500', 1, '2020-11-20 13:25:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `archived` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `image`, `archived`) VALUES
(3, 'MALABANAN,CARLO', 'malabanan_carlo@cvsu.com', 'a78c6024564cc3e31936d78124bfe763', '', 0),
(4, 'MODESTO, SHAINA MARIE', 'modesto_shaina@cvsu.com', 'cee4ba0cccdba9f3955d498c89fae725', '', 0),
(5, 'DALLEGO, JOHN VINCENT', 'dallego_vincent@cvsu.com', '20a3436a5ece13367d7d6843cd242f6d', '', 0),
(6, 'CEZAR, MARK ANTHONY', 'cezar_anthony@cvsu.com', '7f265fbb659e47a6136ada8a681671e2', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_student`
--
ALTER TABLE `admin_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_teacher`
--
ALTER TABLE `admin_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finals`
--
ALTER TABLE `finals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grading_sheet`
--
ALTER TABLE `grading_sheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hps_totals`
--
ALTER TABLE `hps_totals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_finals`
--
ALTER TABLE `lab_finals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_midterm`
--
ALTER TABLE `lab_midterm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_midterm_attendance`
--
ALTER TABLE `lab_midterm_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_midterm_exam`
--
ALTER TABLE `lab_midterm_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_midterm_lab`
--
ALTER TABLE `lab_midterm_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecture_midterm_attendance`
--
ALTER TABLE `lecture_midterm_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecture_midterm_exam`
--
ALTER TABLE `lecture_midterm_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecture_midterm_output`
--
ALTER TABLE `lecture_midterm_output`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecture_midterm_quiz`
--
ALTER TABLE `lecture_midterm_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manual_attend_part`
--
ALTER TABLE `manual_attend_part`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manual_output`
--
ALTER TABLE `manual_output`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manual_quiz`
--
ALTER TABLE `manual_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `midterm`
--
ALTER TABLE `midterm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_items`
--
ALTER TABLE `result_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_registration`
--
ALTER TABLE `students_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_admin`
--
ALTER TABLE `student_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_messages`
--
ALTER TABLE `student_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_admin`
--
ALTER TABLE `teacher_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_messages`
--
ALTER TABLE `teacher_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_student`
--
ALTER TABLE `admin_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `admin_teacher`
--
ALTER TABLE `admin_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `finals`
--
ALTER TABLE `finals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `grading_sheet`
--
ALTER TABLE `grading_sheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- AUTO_INCREMENT for table `hps_totals`
--
ALTER TABLE `hps_totals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lab_finals`
--
ALTER TABLE `lab_finals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `lab_midterm`
--
ALTER TABLE `lab_midterm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=500;

--
-- AUTO_INCREMENT for table `lab_midterm_attendance`
--
ALTER TABLE `lab_midterm_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lab_midterm_exam`
--
ALTER TABLE `lab_midterm_exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `lab_midterm_lab`
--
ALTER TABLE `lab_midterm_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `lecture_midterm_attendance`
--
ALTER TABLE `lecture_midterm_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `lecture_midterm_exam`
--
ALTER TABLE `lecture_midterm_exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `lecture_midterm_output`
--
ALTER TABLE `lecture_midterm_output`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `lecture_midterm_quiz`
--
ALTER TABLE `lecture_midterm_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `manual_attend_part`
--
ALTER TABLE `manual_attend_part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `manual_output`
--
ALTER TABLE `manual_output`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manual_quiz`
--
ALTER TABLE `manual_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `midterm`
--
ALTER TABLE `midterm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=653;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `students_registration`
--
ALTER TABLE `students_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `student_admin`
--
ALTER TABLE `student_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student_messages`
--
ALTER TABLE `student_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `teacher_admin`
--
ALTER TABLE `teacher_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teacher_messages`
--
ALTER TABLE `teacher_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
