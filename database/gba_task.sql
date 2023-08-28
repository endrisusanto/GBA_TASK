-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2023 at 11:42 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gba_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `issue_id` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `week` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `ap` varchar(100) NOT NULL,
  `cp` varchar(100) NOT NULL,
  `csc` varchar(100) NOT NULL,
  `baseid` varchar(100) NOT NULL,
  `sid` varchar(100) NOT NULL,
  `reviewer` varchar(100) NOT NULL,
  `progress` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `request_date` varchar(100) NOT NULL,
  `submission_date` varchar(100) NOT NULL,
  `ontime_submission` varchar(100) NOT NULL,
  `deadline` varchar(100) NOT NULL,
  `approved_date` varchar(100) NOT NULL,
  `ontime_approved` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL,
  `report` varchar(100) NOT NULL,
  `timestamp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `issue_id`, `nama`, `week`, `type`, `ap`, `cp`, `csc`, `baseid`, `sid`, `reviewer`, `progress`, `status`, `request_date`, `submission_date`, `ontime_submission`, `deadline`, `approved_date`, `ontime_approved`, `note`, `report`, `timestamp`) VALUES
(52, 'N230828_103601', 'Endri Susanto', '2023-W35', 'NORMAL EXCEPTION', 'F926BOLE5FWH5', 'F926BOLE5FWH5', 'F926BOLE5FWH5', '', '', '', 'inprogress,cts,gts,ctsv,gtsv,bvt,getprop,sdt,svt,bootimage', 'APPROVED', '2023-08-28', '2023-08-28', 'ONTIME', '2023-09-04', '2023-08-28', 'ONTIME', 'TOP_PRA', '2023.08.28_10.59.54_Boot Image.jpg', '2023.08.28_12.43.50_::1'),
(54, 'M230828_103614', 'Dhanar Kurnia', '2023-W35', 'SMR', 'F926BOLE5FWH5', 'F926BOLE5FWH5', 'F926BOLE5FWH5', '', '', '', 'cts,gts,scat,sts,inprogress', 'SUBMITED', '2023-08-28', '2023-08-28', 'ONTIME', '2023-09-04', '', 'TBD', 'TOP_PRA', '2023.08.28_10.59.59_Boot Image.jpg', '2023.08.28_11.00.27_::1'),
(55, 'N230828_103629', 'Fazlur Rahman', '2023-W35', 'NORMAL EXCEPTION', 'F926BOLE5FWH5', 'F926BOLE5FWH5', 'F926BOLE5FWH5', '', '', '', 'inprogress,cts,gts,ctsv,gtsv,bvt,getprop,sdt,svt,bootimage', 'APPROVED', '2023-08-28', '2023-08-28', 'ONTIME', '2023-09-04', '2023-08-28', 'ONTIME', 'TOP_PRA', '2023.08.28_10.59.48_Boot Image.jpg', '2023.08.28_12.36.36_107.102.39.55'),
(61, 'N230828_123653', 'Dhanar Kurnia', '2023-W35', 'NORMAL EXCEPTION', 'F926BOLE5FWH5', '', '', '', '', '', 'inprogress,cts,gts,ctsv,gtsv,bvt,getprop,sdt,svt,bootimage', 'SUBMITED', '2023-08-28', '2023-08-28', 'ONTIME', '2023-09-04', '', 'TBD', 'TOP_PRA', '2023.08.28_12.42.17_Boot Image.jpg', '2023.08.28_12.42.24_107.102.39.55'),
(62, 'N230828_133036', 'Dhanar Kurnia', '2023-W35', 'NORMAL EXCEPTION', 'F926BOLE5FWH5', '', 'F926BOLE5FWH5', '', '', '', 'inprogress,cts,gts,ctsv,gtsv,bvt,getprop,sdt,svt,bootimage', 'SUBMITED', '2023-08-28', '2023-08-28', 'ONTIME', '2023-09-05', '', 'TBD', '', '', '2023.08.28_13.32.27_::1'),
(63, 'N230828_133332', 'Dhanar Kurnia', '2023-W35', 'NORMAL EXCEPTION', 'F926BOLE5FWH5', '', '', '', '', '', '', 'Task Baru !', '2023-08-28', 'TBD', 'TBD', '2023-08-27', 'TBD', 'TBD', '', '', '2023.08.28_13.33.32_::1'),
(64, 'N230828_133535', 'Dhanar Kurnia', '2023-W35', 'NORMAL EXCEPTION', 'F926BOLE5FWH5', '', 'F926BOLE5FWH5', '', '', '', 'inprogress', 'Task Baru !', '2023-09-02', '', 'TBD', '2023-08-27', '', 'TBD', '', '', '2023.08.28_13.36.14_::1'),
(65, 'N230828_133652', 'Dhanar Kurnia', '2023-W35', 'NORMAL EXCEPTION', 'F926BOLE5FWH5', '', '', '', '', '', 'inprogress,cts,gts,ctsv,gtsv,bvt,getprop,sdt,svt,bootimage', 'SUBMITED', '2023-09-08', '2023-08-28', 'DELAY', '2023-08-21', '', 'TBD', '', '', '2023.08.28_13.37.33_::1'),
(66, 'N230828_134456', 'Dhanar Kurnia', '2023-W35', 'NORMAL EXCEPTION', 'F926BOLE5FWH5', '', '', '', '', '', '', 'Task Baru !', '2023-08-28', 'TBD', 'TBD', '2023-09-04', 'TBD', 'TBD', '', '', '2023.08.28_13.44.56_::1'),
(67, 'N230828_140837', 'Dhanar Kurnia', '2023-W35', 'NORMAL EXCEPTION', 'F926BXXU5FWH5', '', 'F926BXXU5FWH5', '', '', '', 'inprogress,getprop,svt', 'Task Baru !', '2023-08-28', '', 'TBD', '2023-09-04', '', 'TBD', '', '', '2023.08.28_15.22.42_::1'),
(68, 'N230828_141629', 'Dhanar Kurnia', '2023-W35', 'NORMAL EXCEPTION', 's', '', '', '', '', '', '', 'Task Baru !', '2023-08-28', 'TBD', 'TBD', '2023-09-04', 'TBD', 'TBD', '', '', '2023.08.28_14.16.29_::1'),
(69, 'N230828_141633', 'Dhanar Kurnia', '2023-W35', 'NORMAL EXCEPTION', 'v', '', '', '', '', '', 'inprogress,cts,gts,ctsv,gtsv,bvt,getprop,sdt,svt,bootimage', 'SUBMITED', '2023-08-28', '2023-08-28', 'ONTIME', '2023-09-04', '', 'TBD', '', '', '2023.08.28_15.20.52_::1'),
(70, 'N230828_152448', 'Dhanar Kurnia', '2023-W35', 'NORMAL EXCEPTION', 'F926BOLE5FWH5', '', 'F926BOLE5FWH5', '5850179097329664', '', '', 'inprogress', 'Task Baru !', '2023-08-28', '', 'TBD', '2023-09-04', '', 'TBD', '', '', '2023.08.28_15.33.44_::1'),
(71, 'N230828_153743', 'Dhanar Kurnia', '2023-W35', 'NORMAL EXCEPTION', 'F926BOLE5FWH5', '', '', '4234324322343423423432', '234324234234', 'tu.nv1@samsung.com', 'inprogress', 'Task Baru !', '2023-08-28', '', 'TBD', '2023-09-04', '', 'TBD', '', '', '2023.08.28_15.48.04_::1'),
(72, 'N230828_155139', 'Endri Susanto', '2023-W35', 'NORMAL EXCEPTION', 'F926BXXU5FWH5', '', '', 'TBD', '', '', '', 'Task Baru !', '2023-08-28', 'TBD', 'TBD', '2023-09-04', 'TBD', 'TBD', '', '', '2023.08.28_15.51.39_::1'),
(73, 'N230828_155142', 'Endri Susanto', '2023-W35', 'NORMAL EXCEPTION', 'F926BXXU5FWH5', '', '', 'TBD', '', '', '', 'Task Baru !', '2023-08-28', 'TBD', 'TBD', '2023-09-04', 'TBD', 'TBD', '', '', '2023.08.28_15.51.42_::1'),
(74, 'N230828_155144', 'Endri Susanto', '2023-W35', 'NORMAL EXCEPTION', 'F926BXXU5FWH5', '', '', 'TBD', '', '', '', 'Task Baru !', '2023-08-28', 'TBD', 'TBD', '2023-09-04', 'TBD', 'TBD', '', '', '2023.08.28_15.51.44_::1'),
(75, 'N230828_155147', 'Endri Susanto', '2023-W35', 'NORMAL EXCEPTION', 'F926BXXU5FWH5', '', '', 'TBD', '', '', 'inprogress,cts,gts,ctsv,gtsv,bvt,getprop,sdt,svt,bootimage', 'PROGRESS', '2023-08-28', '', 'TBD', '2023-09-04', '', 'TBD', '', '2023.08.28_15.52.35_Boot Image.jpg', '2023.08.28_15.53.12_::1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `level`) VALUES
(7, 'Dhanar Kurnia', 'danar.kurnia', 'danar.kurnia@samsung.com', '6512bd43d9caa6e02c990b0a82652dca', 'super user'),
(8, 'Endri Susanto', 'endrisusanto', 'endri.s@samsung.com', 'c4ca4238a0b923820dcc509a6f75849b', 'member'),
(9, 'Lutfi Bukhori', 'lutfi', 'lutfi.b@samsung.com', 'c4ca4238a0b923820dcc509a6f75849b', 'member'),
(10, 'Fazlur Rahman', 'fazlur', 'fazlur.r@samsung.com', 'c4ca4238a0b923820dcc509a6f75849b', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task`
--
ALTER TABLE `task`
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
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
