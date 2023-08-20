-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2023 at 04:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `issue_id`, `nama`, `week`, `type`, `ap`, `cp`, `csc`, `progress`, `status`, `request_date`, `submission_date`, `ontime_submission`, `deadline`, `approved_date`, `ontime_approved`, `note`, `report`, `timestamp`) VALUES
(14, '08182023025614', 'Lutfi Bukhori', '2023-W33', 'NORMAL EXCEPTION', 'FGDFGDFG', 'FDGHG', 'GHGHG', 'cts', 'Task Baru !', '2023-08-17', '', '', '2023-08-17', '', '', '', '', '2023.08.18_02.56.14_::1'),
(15, '08182023_030438', 'Endri Susanto', '2023-W33', 'SMR', 'ERWERWER', 'ERWER', 'EWRWEREW', '', 'Task Baru !', '2023-08-17', 'N/A', '', '', 'N/A', '', '', '', '2023.08.20_11.36.11_::1'),
(16, '18082023_030536', 'Fazlur Rahman', '2023-W33', 'SIMPLE EXCEPTION', 'FDHGH', 'GFHFGHFG', 'HGFH', '', 'Task Baru !', '2023-08-17', '', '', '2023-08-17', '', '', '', '', '2023.08.18_03.05.36_::1'),
(17, '18082023_093124', 'Dhanar Kurnia', '2023-W33', 'REGULAR', 'GFDGDFGDF', 'GFDGFDGFD', 'DFGDFGFDG', '', 'Task Baru !', '2023-08-18', '', '', '2023-08-18', '', '', '', '', '2023.08.18_09.31.24_::1'),
(18, '19082023_074030', 'Endri Susanto', '2023-W33', 'NORMAL EXCEPTION', 'DG', 'DFG', 'DFG', 'gtsv,sdt,svt,bootimage', 'Task Baru !', '2023-08-19', '', '', '', '', '', '', '2023.08.20_17.51.45_sdsd.php', '2023.08.20_17.51.45_::1'),
(19, '19082023_074046', 'Endri Susanto', '2023-W33', 'NORMAL EXCEPTION', 'dsfsdfsd', 'sdfsdfsdf', 'sdfsdfsdf', '', 'Task Baru !', '2023-08-19', 'N/A', '', '', 'N/A', '', '', '', '2023.08.20_11.36.07_::1'),
(20, '19082023_074117', 'Endri Susanto', '2023-W33', 'NORMAL EXCEPTION', 'sdf', '-', 'sdf', '', 'Task Baru !', '2023-08-19', 'N/A', '', '', 'N/A', '', '', '', '2023.08.20_11.36.06_::1'),
(21, '19082023_074147', 'Endri Susanto', '2023-W33', 'NORMAL EXCEPTION', 'sdf', 'sdf', 'd', 'getprop,sdt', 'Task Baru !', '2023-08-19', 'N/A', '', '', 'N/A', '', '', '', '2023.08.20_18.41.50_::1'),
(22, '19082023_090831', 'Endri Susanto', '2023-W33', 'NORMAL EXCEPTION', 'sdf', 'sdfdfsd', 'sdfdfsdf', 'cts,gts,ctsv,gtsv,bvt,getprop,sdt,svt,bootimage,sts', 'APPROVED', '2023-08-19', 'N/A', '', '', 'N/A', '', '', '', '2023.08.20_17.09.12_::1'),
(23, '19082023_090909', 'Endri Susanto', '2023-W33', 'SMR', 'ewrewrewr', 'werewrew', 'fefef', 'cts,gts,ctsv', 'Task Baru !', '2023-08-19', 'N/A', '', '', 'N/A', '', '', '', '2023.08.20_17.06.14_::1'),
(24, '19082023_164611', 'Endri Susanto', '2023-W33', 'NORMAL EXCEPTION', 'sw', 's', 's', '', 'SUBMITED', '2023-08-19', 'N/A', '', '', 'N/A', '', '', '', '2023.08.20_12.09.51_::1'),
(25, '20082023_113724', 'Endri Susanto', '2023-W33', 'NORMAL EXCEPTION', 'aa', 'sds', 's', 'gtsv', 'PROGRESS', '2023-08-20', '2023-08-14', '', '', '', '', '', '2023.08.20_12.23.49_edit php.txt', '2023.08.20_17.51.55_::1'),
(26, '20082023_185214', 'Endri Susanto', '2023-W33', 'NORMAL EXCEPTION', 'fdfd', 'dfdf', 'dfdf', '', 'Task Baru !', '2023-08-20', '', '', '2023-08-20', '', '', '', '', '2023.08.20_18.52.14_::1'),
(27, '20082023_185226', 'Endri Susanto', '2023-W33', 'NORMAL EXCEPTION', 'd', '', '', 'ctsv,getprop', 'Task Baru !', '2023-08-20', 'N/A', '', '', 'N/A', '', '', '', '2023.08.20_20.36.23_::1');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `level`) VALUES
(7, 'Dhanar Kurnia', 'danar.kurnia', 'danar.kurnia@samsung.com', '81dc9bdb52d04dc20036dbd8313ed055', 'super user'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
