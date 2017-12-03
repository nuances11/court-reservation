-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2017 at 07:51 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_court`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_court`
--

CREATE TABLE `tbl_court` (
  `court_id` int(11) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `court_name` varchar(255) NOT NULL,
  `timestamp_created` varchar(255) NOT NULL,
  `timestamp_updated` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_court`
--

INSERT INTO `tbl_court` (`court_id`, `barangay`, `court_name`, `timestamp_created`, `timestamp_updated`, `status`) VALUES
(1, 'asdasdas', 'sadasds', '2017-11-30 06:08:14pm', '2017-11-30 07:41:36pm', 1),
(2, 'dasdasdsqeqweqwe', 'dasdasdasd', '2017-11-30 06:08:52pm', '2017-11-30 07:42:54pm', 0),
(3, '1212333', 'sadasd', '2017-11-30 06:09:14pm', '2017-11-30 07:42:32pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation`
--

CREATE TABLE `tbl_reservation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time_start` varchar(255) NOT NULL,
  `time_end` varchar(255) NOT NULL,
  `sport` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reservation`
--

INSERT INTO `tbl_reservation` (`id`, `user_id`, `date`, `time_start`, `time_end`, `sport`, `status`) VALUES
(1, 1, '2017-11-04', '17:00:00', '19:00:00', 'basketball', 1),
(2, 1, '2017-11-05', '17:00:00', '19:00:00', 'volleyball', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `add_barangay` varchar(255) NOT NULL,
  `add_town` varchar(255) NOT NULL,
  `md5_hash` varchar(255) NOT NULL,
  `timestamp_created` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `full_name`, `contact`, `email`, `add_barangay`, `add_town`, `md5_hash`, `timestamp_created`, `active`, `user_type`) VALUES
(1, 'sample', '202cb962ac59075b964b07152d234b70', 'sample', '09982912553', 'sample@sample.com', '', '', '07502efecefda07480ca56e8aaf9efcb', '2017-11-20 04:53:51pm', 1, 0),
(2, 'admin', '202cb962ac59075b964b07152d234b70', 'Admin Mo Lang', '09982827336', 'admin@admin.com', '', '', '', '', 1, 1),
(3, 'username', '202cb962ac59075b964b07152d234b70', 'sample name', '09982726331', 'user@user.com', '', '', 'f27e9e46a8d4dc69ef5961c449af14f0', '2017-11-21 07:35:40pm', 1, 0),
(4, 'username1', '202cb962ac59075b964b07152d234b70', 'sample', '09928128117', 'user@user.com', '', '', '3dc0a891021e4b684898cbf63d09de3d', '2017-11-21 07:37:15pm', 1, 0),
(5, 'admin1', '202cb962ac59075b964b07152d234b70', 'Admin Mo Lang', '09982726335', 'adminmolang@gmail.com', '', '', '', '', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_court`
--
ALTER TABLE `tbl_court`
  ADD PRIMARY KEY (`court_id`);

--
-- Indexes for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_court`
--
ALTER TABLE `tbl_court`
  MODIFY `court_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
