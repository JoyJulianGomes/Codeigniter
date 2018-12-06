-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2018 at 08:49 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `batchrepresentative`
--

CREATE TABLE `batchrepresentative` (
  `batch` int(4) NOT NULL,
  `rep_id` int(11) NOT NULL,
  `rep_name` text NOT NULL,
  `rep_phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batchrepresentative`
--

INSERT INTO `batchrepresentative` (`batch`, `rep_id`, `rep_name`, `rep_phone`) VALUES
(1997, 84, '', ''),
(2011, 85, 'Joyce', '01834929564'),
(2012, 81, 'joy', '01824134362'),
(2013, 82, '', ''),
(2014, 83, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `bkash_no`
--

CREATE TABLE `bkash_no` (
  `id` int(11) NOT NULL,
  `number` varchar(14) NOT NULL,
  `moderator` text NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('valid','invalid') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bkash_no`
--

INSERT INTO `bkash_no` (`id`, `number`, `moderator`, `date`, `status`) VALUES
(1, '01824134362', 'Joy', '2018-12-04 00:00:00', 'valid'),
(2, '01824134363', 'Joy', '2018-12-04 00:00:00', 'valid');

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `guest_id` int(11) NOT NULL,
  `guest_name` text NOT NULL,
  `relation` enum('spouse','child','other') NOT NULL,
  `age` int(11) NOT NULL,
  `reg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`guest_id`, `guest_name`, `relation`, `age`, `reg_id`) VALUES
(1, 'someone', 'spouse', 32, 2),
(2, 'Mukta Maria Peris', 'spouse', 47, 5),
(3, 'Joyce Gertrude Gomes ', 'child', 23, 5),
(4, 'Joy Julian Gomes', 'child', 22, 5),
(5, 'Mukta Maria Peris', 'spouse', 47, 6),
(6, 'Joyce Gertrude Gomes ', 'child', 23, 6),
(7, 'Joy Julian Gomes', 'child', 22, 6),
(8, 'Mukta Maria Peris', 'spouse', 47, 7),
(9, 'Joyce Gertrude Gomes ', 'child', 23, 7),
(10, 'Joy Julian Gomes', 'child', 22, 7),
(11, 'Mukta Maria Peris', 'spouse', 47, 8),
(12, 'Joyce Gertrude Gomes ', 'child', 23, 8),
(13, 'Joy Julian Gomes', 'child', 22, 8),
(14, 'Mukta Maria Peris', 'spouse', 47, 9),
(15, 'Joyce Gertrude Gomes ', 'child', 23, 9),
(16, 'Joy Julian Gomes', 'child', 22, 9),
(17, 'Mukta Maria Peris', 'spouse', 44, 10),
(18, 'Joyce Gertrude Gomes ', 'child', 44, 10),
(19, 'Joy Julian Gomes', 'child', 44, 10),
(20, 'Mukta Maria Peris', 'spouse', 44, 11),
(21, 'Joyce Gertrude Gomes ', 'child', 44, 11),
(22, 'Joy Julian Gomes', 'child', 44, 11),
(23, 'Mukta Maria Peris', 'spouse', 44, 12),
(24, 'Joyce Gertrude Gomes ', 'child', 44, 12),
(25, 'Joy Julian Gomes', 'child', 44, 12),
(26, 'Mukta Maria Peris', 'spouse', 44, 13),
(27, 'Joyce Gertrude Gomes ', 'child', 44, 13),
(28, 'Joy Julian Gomes', 'child', 44, 13),
(29, 'Mukta Maria Peris', 'spouse', 44, 14),
(30, 'Joyce Gertrude Gomes ', 'child', 44, 14),
(31, 'Joy Julian Gomes', 'child', 44, 14),
(32, 'Mukta Maria Peris', 'spouse', 44, 15),
(33, 'Joyce Gertrude Gomes ', 'child', 44, 15),
(34, 'Joy Julian Gomes', 'child', 44, 15),
(35, 'Mukta Maria Peris', 'spouse', 44, 16),
(36, 'Joyce Gertrude Gomes ', 'child', 44, 16),
(37, 'Joy Julian Gomes', 'child', 44, 16),
(38, 'Mukta Maria Peris', 'spouse', 44, 17),
(39, 'Joyce Gertrude Gomes ', 'child', 44, 17),
(40, 'Joy Julian Gomes', 'child', 44, 17),
(41, 'Mukta Maria Peris', 'spouse', 44, 18),
(42, 'Joyce Gertrude Gomes ', 'child', 44, 18),
(43, 'Joy Julian Gomes', 'child', 44, 18),
(44, 'Mukta Maria Peris', 'spouse', 12, 19),
(45, 'Joyce Gertrude Gomes ', 'child', 12, 19),
(46, 'Joy Julian Gomes', 'child', 12, 19),
(47, 'Mukta Maria Peris', 'spouse', 12, 20),
(48, 'Joyce Gertrude Gomes ', 'child', 12, 20),
(49, 'Joy Julian Gomes', 'child', 12, 20),
(50, 'Mukta Maria Peris', 'spouse', 12, 21),
(51, 'Joyce Gertrude Gomes ', 'child', 12, 21),
(52, 'Joy Julian Gomes', 'child', 12, 21),
(53, 'Mukta Maria Peris', 'spouse', 12, 22),
(54, 'Joyce Gertrude Gomes ', 'child', 12, 22),
(55, 'Joy Julian Gomes', 'child', 12, 22),
(56, 'Mukta Maria Peris', 'spouse', 12, 23),
(57, 'Joyce Gertrude Gomes ', 'child', 12, 23),
(58, 'Joy Julian Gomes', 'child', 12, 23),
(59, 'Mukta Maria Peris', 'spouse', 12, 24),
(60, 'Joyce Gertrude Gomes ', 'child', 12, 24),
(61, 'Joy Julian Gomes', 'child', 12, 24),
(62, 'Mukta Maria Peris', 'spouse', 12, 25),
(63, 'Joyce Gertrude Gomes ', 'child', 12, 25),
(64, 'Joy Julian Gomes', 'child', 12, 25),
(65, 'Mukta Maria Peris', 'spouse', 12, 26),
(66, 'Joyce Gertrude Gomes ', 'child', 12, 26),
(67, 'Joy Julian Gomes', 'child', 12, 26),
(68, 'Mukta Maria Peris', 'spouse', 12, 27),
(69, 'Joyce Gertrude Gomes ', 'child', 12, 27),
(70, 'Joy Julian Gomes', 'child', 12, 27),
(71, 'Mukta Maria Peris', 'spouse', 12, 28),
(72, 'Joyce Gertrude Gomes ', 'child', 12, 28),
(73, 'Joy Julian Gomes', 'child', 12, 28),
(74, 'Mukta Maria Peris', 'spouse', 12, 29),
(75, 'Joyce Gertrude Gomes ', 'child', 12, 29),
(76, 'Joy Julian Gomes', 'child', 12, 29),
(77, 'Mukta Maria Peris', 'spouse', 12, 30),
(78, 'Joyce Gertrude Gomes ', 'child', 12, 30),
(79, 'Joy Julian Gomes', 'child', 12, 30),
(80, 'Mukta Maria Peris', 'spouse', 12, 31),
(81, 'Joyce Gertrude Gomes ', 'child', 12, 31),
(82, 'Joy Julian Gomes', 'child', 12, 31),
(83, 'Mukta Maria Peris', 'spouse', 12, 32),
(84, 'Joyce Gertrude Gomes ', 'child', 12, 32),
(85, 'Joy Julian Gomes', 'child', 12, 32),
(86, 'Mukta Maria Peris', 'spouse', 12, 33),
(87, 'Joyce Gertrude Gomes ', 'child', 12, 33),
(88, 'Joy Julian Gomes', 'child', 12, 33),
(89, 'Mukta Maria Peris', 'spouse', 12, 34),
(90, 'Joyce Gertrude Gomes ', 'child', 12, 34),
(91, 'Joy Julian Gomes', 'child', 12, 34),
(92, 'Mukta Maria Peris', 'spouse', 12, 35),
(93, 'Joyce Gertrude Gomes ', 'child', 12, 35),
(94, 'Joy Julian Gomes', 'child', 12, 35),
(95, 'Mukta Maria Peris', 'spouse', 12, 36),
(96, 'Joyce Gertrude Gomes ', 'child', 12, 36),
(97, 'Joy Julian Gomes', 'child', 12, 36),
(98, 'Mukta Maria Peris', 'spouse', 12, 37),
(99, 'Joyce Gertrude Gomes ', 'child', 12, 37),
(100, 'Joy Julian Gomes', 'child', 12, 37),
(101, 'Mukta Maria Peris', 'spouse', 12, 38),
(102, 'Joyce Gertrude Gomes ', 'child', 12, 38),
(103, 'Joy Julian Gomes', 'child', 12, 38),
(104, 'Mukta Maria Peris', 'spouse', 12, 39),
(105, 'Joyce Gertrude Gomes ', 'child', 12, 39),
(106, 'Joy Julian Gomes', 'child', 12, 39),
(107, 'Mukta Maria Peris', 'spouse', 45, 40),
(108, 'Joyce Gertrude Gomes ', 'child', 23, 40),
(109, 'Joy Julian Gomes', 'child', 22, 40),
(110, 'Dipta Justin Gomes', 'child', 22, 40),
(111, 'Mukta Maria Peris', 'spouse', 47, 41),
(112, 'Joyce Gertrude Gomes ', 'child', 23, 41),
(113, 'Joy Julian Gomes', 'child', 22, 41),
(114, 'Mukta Maria Peris', 'spouse', 47, 42),
(115, 'Joyce Gertrude Gomes ', 'child', 23, 42),
(116, 'Joy Julian Gomes', 'child', 22, 42),
(117, 'Mukta Maria Peris', 'spouse', 32, 43),
(118, 'Joyce Gertrude Gomes ', 'child', 23, 43),
(119, 'Joy Julian Gomes', 'child', 23, 43),
(120, 'Mukta Maria Peris', 'spouse', 23, 44),
(121, 'Joyce Gertrude Gomes ', 'child', 23, 44),
(122, 'Joy Julian Gomes', 'child', 23, 44),
(123, 'Nirup', 'child', 22, 45),
(124, 'Mukta Maria Peris', 'spouse', 45, 46),
(125, 'Nirup', 'child', 3, 50),
(126, 'Nirup', 'child', 23, 51),
(127, 'Joy Julian Gomes', 'other', 23, 51),
(128, 'Nirup', 'child', 23, 52),
(129, 'Liune', 'spouse', 45, 52),
(130, 'Joy Julian Gomes', 'other', 23, 52),
(131, 'Nirup', 'child', 23, 53),
(132, 'Liune', 'spouse', 45, 53),
(133, 'Joy Julian Gomes', 'other', 23, 53),
(134, 'Mukta Maria Peris', 'other', 48, 55),
(135, 'Nirup', 'other', 23, 56);

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

CREATE TABLE `moderator` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `contact` varchar(14) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moderator`
--

INSERT INTO `moderator` (`id`, `name`, `contact`, `pass`) VALUES
(1, 'prodip', '01478541236', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `regid` int(11) NOT NULL,
  `trxID` varchar(14) NOT NULL,
  `amount` int(11) NOT NULL,
  `moderator` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`regid`, `trxID`, `amount`, `moderator`, `date`) VALUES
(2, '1', 1, '', '0000-00-00 00:00:00'),
(31, '12345', 1340, '', '0000-00-00 00:00:00'),
(6, '12354', 12, '', '0000-00-00 00:00:00'),
(31, '1313', 10, 'prodip', '2018-12-06 00:14:35'),
(31, '132', 100, 'prodip', '2018-12-06 00:18:47'),
(42, '132456789', 1900, '', '0000-00-00 00:00:00'),
(45, '13465848', 800, 'prodip', '2018-12-06 09:21:22'),
(31, '153', 10, 'prodip', '2018-12-06 00:09:28'),
(31, '1547', 460, 'prodip', '2018-12-06 00:15:59'),
(25, '156', 123, 'prodip', '2018-12-06 09:23:48'),
(41, '156489', 1900, '', '0000-00-00 00:00:00'),
(31, '159', 10, 'prodip', '2018-12-06 00:07:23'),
(11, '2', 2, '', '0000-00-00 00:00:00'),
(44, '2134665', 1900, 'prodip', '2018-12-06 09:15:06'),
(31, '23423', 10, '', '0000-00-00 00:00:00'),
(31, '3123124', 10, '', '0000-00-00 00:00:00'),
(4, '4', 4, '', '0000-00-00 00:00:00'),
(5, '5', 5, '', '0000-00-00 00:00:00'),
(31, '753', 10, 'prodip', '2018-12-06 00:06:53'),
(31, '794613', 10, 'prodip', '2018-12-06 00:00:59'),
(31, '89761', 10, '', '0000-00-00 00:00:00'),
(31, 'aszf32', 10, 'prodip', '2018-12-06 00:04:48'),
(42, 'dbdbfbf', 123, 'prodip', '2018-12-06 09:03:26'),
(46, 'jhvh46546', 1300, 'prodip', '2018-12-06 09:48:56'),
(25, 'lhjljbl', 1777, 'prodip', '2018-12-06 09:25:14'),
(31, 'sfdSV', 10, 'prodip', '2018-12-06 00:05:35');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `regid` int(11) NOT NULL,
  `batch` int(11) NOT NULL,
  `batch_repname` text NOT NULL,
  `name` text NOT NULL,
  `photo` text NOT NULL,
  `father` text NOT NULL,
  `mother` text NOT NULL,
  `gender` text NOT NULL,
  `mstat` enum('married','unmarried') NOT NULL,
  `occupation` text NOT NULL,
  `designation` text NOT NULL,
  `contact` varchar(14) NOT NULL,
  `spouse_count` int(11) NOT NULL,
  `child_count` int(11) NOT NULL,
  `other_count` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `paid_amount` double NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`regid`, `batch`, `batch_repname`, `name`, `photo`, `father`, `mother`, `gender`, `mstat`, `occupation`, `designation`, `contact`, `spouse_count`, `child_count`, `other_count`, `total_amount`, `paid_amount`, `date`, `status`) VALUES
(2, 2012, '', 'joy', '', 'jyoti', 'mukta', 'male', 'married', 'std', 'bsc', '', 0, 0, 0, 800, 1, '2018-11-26 00:00:00', 0),
(4, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)16.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 0, 0, 0, 1900, 4, '2018-12-04 11:16:58', 0),
(5, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)17.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 0, 0, 0, 1900, 5, '2018-12-04 11:18:48', 0),
(6, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)18.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 0, 0, 0, 1900, 12, '2018-12-04 11:20:54', 0),
(7, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)19.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 0, 0, 0, 1900, 0, '2018-12-04 11:22:08', 0),
(8, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)20.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 0, 0, 0, 1900, 0, '2018-12-04 11:22:39', 0),
(9, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)2.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 0, 0, 0, 1900, 0, '2018-12-04 12:32:33', 0),
(10, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)3.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 0, 0, 0, 1900, 0, '2018-12-04 12:34:34', 0),
(11, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)4.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 0, 0, 0, 1900, 2, '2018-12-04 12:41:28', 0),
(12, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)5.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 0, 0, 0, 1900, 0, '2018-12-04 12:49:06', 0),
(13, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)6.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 0, 0, 0, 1900, 0, '2018-12-04 12:51:48', 0),
(14, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)7.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 0, '2018-12-04 13:09:07', 0),
(15, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)8.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 0, '2018-12-04 13:13:09', 0),
(16, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)9.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 0, '2018-12-04 13:22:18', 0),
(17, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)10.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 0, '2018-12-04 13:22:39', 0),
(18, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)11.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 0, '2018-12-04 13:28:43', 0),
(19, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)12.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 0, '2018-12-04 13:29:22', 0),
(20, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)13.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 0, '2018-12-04 13:32:37', 0),
(21, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)14.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 0, '2018-12-04 13:34:32', 0),
(22, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)15.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 0, '2018-12-04 13:38:57', 0),
(23, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)16.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 0, '2018-12-04 13:40:14', 0),
(24, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)17.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 0, '2018-12-04 13:45:40', 0),
(25, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)18.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 1900, '2018-12-04 14:50:03', 1),
(26, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)19.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 0, '2018-12-04 14:51:53', 0),
(27, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)20.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 0, '2018-12-04 14:52:30', 0),
(28, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)21.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 0, '2018-12-04 14:55:53', 0),
(29, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)22.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 0, '2018-12-04 15:13:01', 0),
(30, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)23.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 0, '2018-12-04 15:21:03', 0),
(31, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)24.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 2000, '2018-12-04 15:21:20', 1),
(32, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)25.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 0, '2018-12-04 15:22:07', 0),
(33, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)26.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 0, '2018-12-04 15:23:53', 0),
(34, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)27.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 0, '2018-12-04 15:24:50', 0),
(35, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)28.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 0, '2018-12-04 15:25:15', 0),
(36, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)29.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 0, '2018-12-04 15:25:45', 0),
(37, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)30.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 0, '2018-12-04 15:26:16', 0),
(38, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)31.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 0, '2018-12-04 15:31:29', 0),
(39, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)32.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 0, '2018-12-04 15:31:53', 0),
(40, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)1.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 3, 0, 2200, 0, '2018-12-04 15:42:26', 0),
(41, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2).jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 1900, '2018-12-05 20:47:42', 1),
(42, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2).jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 2023, '2018-12-05 21:12:48', 1),
(43, 2013, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)1.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 0, '2018-12-06 09:02:56', 0),
(44, 2014, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)2.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 0, 1900, 1900, '2018-12-06 09:14:20', 1),
(45, 1997, '', 'Prodip', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)3.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Teaching', 'Senior Teacher', '01713384009', 0, 1, 0, 800, 800, '2018-12-06 09:19:48', 1),
(46, 2013, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)4.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 0, 0, 1300, 1300, '2018-12-06 09:41:52', 1),
(47, 2013, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)1.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 1, 1, 1632, 0, '2018-12-06 12:56:00', 0),
(48, 2013, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)2.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1, 1938, 0, '2018-12-06 12:56:50', 0),
(49, 2014, '', 'Prodip', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)3.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Teaching', 'Senior Teacher', '01713384009', 0, 1, 0, 510, 0, '2018-12-06 13:02:08', 0),
(50, 2014, '', 'Prodip', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)4.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Teaching', 'Senior Teacher', '01713384009', 0, 1, 0, 510, 0, '2018-12-06 13:04:21', 0),
(51, 2014, '', 'Prodip', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)5.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Teaching', 'Senior Teacher', '01713384009', 0, 1, 1, 1326, 0, '2018-12-06 13:06:40', 0),
(52, 2014, '', 'Prodip', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)6.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Teaching', 'Senior Teacher', '01713384009', 1, 1, 1, 1632, 0, '2018-12-06 13:08:05', 0),
(53, 2014, '', 'Prodip', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2).jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Teaching', 'Senior Teacher', '01713384009', 1, 1, 1, 1632, 0, '2018-12-06 13:20:45', 0),
(54, 2014, '', 'Jyoti Gomes', './uploads/', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 0, 0, 0, 510, 0, '2018-12-06 13:34:42', 0),
(55, 2014, '', 'Prodip', './uploads/', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 0, 0, 1, 1020, 0, '2018-12-06 13:36:40', 0),
(56, 2012, 'joy', 'Jyoti Gomes', './uploads/', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 0, 0, 1, 1020, 0, '2018-12-06 13:44:02', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batchrepresentative`
--
ALTER TABLE `batchrepresentative`
  ADD PRIMARY KEY (`batch`),
  ADD UNIQUE KEY `rep_id` (`rep_id`),
  ADD KEY `rep_id_2` (`rep_id`);

--
-- Indexes for table `bkash_no`
--
ALTER TABLE `bkash_no`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`guest_id`),
  ADD KEY `reg_id` (`reg_id`);

--
-- Indexes for table `moderator`
--
ALTER TABLE `moderator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`trxID`) USING BTREE,
  ADD KEY `regid` (`regid`) USING BTREE;

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`regid`),
  ADD KEY `batch` (`batch`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batchrepresentative`
--
ALTER TABLE `batchrepresentative`
  MODIFY `rep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `bkash_no`
--
ALTER TABLE `bkash_no`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `moderator`
--
ALTER TABLE `moderator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `regid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guests`
--
ALTER TABLE `guests`
  ADD CONSTRAINT `guests_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `userinfo` (`regid`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`regid`) REFERENCES `userinfo` (`regid`);

--
-- Constraints for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD CONSTRAINT `userinfo_ibfk_1` FOREIGN KEY (`batch`) REFERENCES `batchrepresentative` (`batch`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
