-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2018 at 08:18 AM
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
(2012, 81, 'joy', '01824134362');

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
  `relation` enum('spouse','child') NOT NULL,
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
(110, 'Dipta Justin Gomes', 'child', 22, 40);

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
  `trxID` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `total_amount` double NOT NULL,
  `paid_amount` double NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`regid`, `batch`, `batch_repname`, `name`, `photo`, `father`, `mother`, `gender`, `mstat`, `occupation`, `designation`, `contact`, `spouse_count`, `child_count`, `total_amount`, `paid_amount`, `date`) VALUES
(2, 2012, '', 'joy', '', 'jyoti', 'mukta', 'male', 'married', 'std', 'bsc', '', 0, 0, 800, 0, '2018-11-26 00:00:00'),
(4, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)16.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 0, 0, 1900, 0, '2018-12-04 11:16:58'),
(5, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)17.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 0, 0, 1900, 0, '2018-12-04 11:18:48'),
(6, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)18.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 0, 0, 1900, 0, '2018-12-04 11:20:54'),
(7, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)19.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 0, 0, 1900, 0, '2018-12-04 11:22:08'),
(8, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)20.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 0, 0, 1900, 0, '2018-12-04 11:22:39'),
(9, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)2.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 0, 0, 1900, 0, '2018-12-04 12:32:33'),
(10, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)3.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 0, 0, 1900, 0, '2018-12-04 12:34:34'),
(11, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)4.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 0, 0, 1900, 0, '2018-12-04 12:41:28'),
(12, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)5.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 0, 0, 1900, 0, '2018-12-04 12:49:06'),
(13, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)6.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 0, 0, 1900, 0, '2018-12-04 12:51:48'),
(14, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)7.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1900, 0, '2018-12-04 13:09:07'),
(15, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)8.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1900, 0, '2018-12-04 13:13:09'),
(16, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)9.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1900, 0, '2018-12-04 13:22:18'),
(17, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)10.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1900, 0, '2018-12-04 13:22:39'),
(18, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)11.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1900, 0, '2018-12-04 13:28:43'),
(19, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)12.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1900, 0, '2018-12-04 13:29:22'),
(20, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)13.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1900, 0, '2018-12-04 13:32:37'),
(21, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)14.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1900, 0, '2018-12-04 13:34:32'),
(22, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)15.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1900, 0, '2018-12-04 13:38:57'),
(23, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)16.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1900, 0, '2018-12-04 13:40:14'),
(24, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)17.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1900, 0, '2018-12-04 13:45:40'),
(25, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)18.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1900, 0, '2018-12-04 14:50:03'),
(26, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)19.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1900, 0, '2018-12-04 14:51:53'),
(27, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)20.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1900, 0, '2018-12-04 14:52:30'),
(28, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)21.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1900, 0, '2018-12-04 14:55:53'),
(29, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)22.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1900, 0, '2018-12-04 15:13:01'),
(30, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)23.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1900, 0, '2018-12-04 15:21:03'),
(31, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)24.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1900, 0, '2018-12-04 15:21:20'),
(32, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)25.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1900, 0, '2018-12-04 15:22:07'),
(33, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)26.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1900, 0, '2018-12-04 15:23:53'),
(34, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)27.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1900, 0, '2018-12-04 15:24:50'),
(35, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)28.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1900, 0, '2018-12-04 15:25:15'),
(36, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)29.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1900, 0, '2018-12-04 15:25:45'),
(37, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)30.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1900, 0, '2018-12-04 15:26:16'),
(38, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)31.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1900, 0, '2018-12-04 15:31:29'),
(39, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)32.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 2, 1900, 0, '2018-12-04 15:31:53'),
(40, 2012, '', 'Jyoti Gomes', 'C:/xampp/htdocs/CI/uploads/dp001_-_Copy_(2)1.jpg', 'Gabriel Gomes', 'Leticia Palma ', 'male', 'married', 'Private Service', 'Regional Director', '01713384009', 1, 3, 2200, 0, '2018-12-04 15:42:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batchrepresentative`
--
ALTER TABLE `batchrepresentative`
  ADD PRIMARY KEY (`batch`),
  ADD UNIQUE KEY `rep_id` (`rep_id`);

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
-- AUTO_INCREMENT for table `bkash_no`
--
ALTER TABLE `bkash_no`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `moderator`
--
ALTER TABLE `moderator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `regid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
